<?php

namespace App\Modules\Assessor\Controllers;

use App\Models\SamcModel;
use App\Models\AssessorModel;
use App\Models\NotificationModel;
use App\Controllers\BaseController;
use App\Models\ExpertiseFieldModel;
use App\Models\SamcAssessmentModel;
use App\Models\SamcRejectRecordModel;
use App\Models\CourseContentOutlineModel;
use App\Models\AssessorExpertiseFieldModel;

class AssessorController extends BaseController
{
    protected $notification_model;
    protected $assessor_model;
    protected $samc_model;
    protected $samc_reject_record_model;
    protected $assessor_expertise_model;
    protected $expertise_model;
    protected $course_content_outline_model;
    protected $samc_assessment_model;

    public function __construct()
    {
        $this->assessor_model                   = new AssessorModel();
        $this->notification_model               = new NotificationModel();
        $this->samc_model                       = new SamcModel();
        $this->samc_reject_record_model         = new SamcRejectRecordModel();
        $this->assessor_expertise_model         = new AssessorExpertiseFieldModel();
        $this->expertise_model                  = new ExpertiseFieldModel();
        $this->course_content_outline_model     = new CourseContentOutlineModel();
        $this->samc_assessment_model            = new SamcAssessmentModel();
        $this->session = service('session');
    }

    public function dashboard()
    {
        $asr_id = $this->session->get('user_id');

        // Fetch Notifications Data
        $notification = $this->notification_model
            ->where('n_user_type', 'assessor')  // Filter by user type
            ->where('n_user_id', $asr_id)  // Filter by user type
            ->orderBy('n_is_read', 'ASC')    // Order by unread (false) notifications first
            ->orderBy('n_created_at', 'DESC')  // Then order by creation date (latest first)
            ->findAll();

        // Count Unread Notifications
        $unread_notifications = $this->notification_model
            ->where('n_is_read', 'f')
            ->where('n_user_id', $asr_id)  // Filter by user type
            ->where('n_user_type', 'assessor')
            ->countAllResults();

        // Assessor Info
        $asr_info = $this->assessor_model->where('asr_id', $asr_id)->first();

        // Dashboard Data
        $new_samc_assign = $this->samc_model
            ->where('samc_asr_id', $asr_id)
            ->where('samc_status', 'Awaiting Confirmation')
            ->countAllResults();

        $review_in_progress = $this->samc_model
            ->where('samc_asr_id', $asr_id)
            ->where('samc_status', 'Checking')
            ->countAllResults();

        $completed_review = $this->samc_model
            ->where('samc_asr_id', $asr_id)
            ->where('samc_status', 'Assessment Completed')
            ->countAllResults();

        $profit = $completed_review * 200;

        $data = [
            'notifications'             => $notification,
            'unread_notifications'      => $unread_notifications,
            'assessor_info'             => $asr_info,
            'new_samc_assign'           => $new_samc_assign,
            'review_in_progress'        => $review_in_progress,
            'completed_review'          => $completed_review,
            'profit'                    => $profit,
        ];

        $this->render_assessor('dashboard', $data);
    }

    // Get samc x expertise bar chart
    public function getSamcExpertiseData()
    {
        $asr_id = session()->get('user_id');

        // Get all assessors expertise data
        $assessor_expertise = $this->assessor_expertise_model
            ->select('expertise_field.ef_id, expertise_field.ef_desc')
            ->join('expertise_field', 'assessor_expertise_field.aef_ef_id = expertise_field.ef_id', 'left')
            ->where('assessor_expertise_field.aef_asr_id', $asr_id)
            ->findAll();

        // Get SAMC assignments for the assessor where status is 'Checking' or 'Assessment Completed'
        $samc_assigned = $this->samc_model
            ->select('samc_ef_id, COUNT(*) as total')
            ->where('samc_asr_id', $asr_id)
            ->groupStart()
            ->where('samc_status', 'Checking')
            ->orWhere('samc_status', 'Assessment Completed')
            ->groupEnd()
            ->groupBy('samc_ef_id')
            ->findAll();

        // Prepare data mapping
        $samc_count_map = [];
        foreach ($samc_assigned as $samc) {
            $samc_count_map[$samc->samc_ef_id] = $samc->total; // Map field ID to count
        }

        // Prepare data for the chart
        $chartData = [];
        foreach ($assessor_expertise as $expertise) {
            $chartData[] = [
                'label' => $expertise->ef_desc,
                'value' => $samc_count_map[$expertise->ef_id] ?? 0
            ];
        }

        // Sort the data in descending order based on value
        usort($chartData, function ($a, $b) {
            return $b['value'] <=> $a['value'];
        });

        // Extract sorted labels and data
        $labels = array_column($chartData, 'label');
        $data = array_column($chartData, 'value');

        return $this->response->setJSON([
            'labels' => $labels,
            'data' => $data
        ]);
    }
}
