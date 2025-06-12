<?php

namespace App\Modules\QvcAdmin\Controllers;

use App\Models\SamcModel;
use App\Models\QvcAdminModel;
use App\Models\NotificationModel;
use App\Controllers\BaseController;
use App\Models\AssessorExpertiseFieldModel;

class QvcAdminController extends BaseController
{
    protected $notification_model;
    protected $qvc_admin_model;
    protected $assessor_expertise_model;
    protected $samc_model;

    public function __construct()
    {
        $this->notification_model               = new NotificationModel();
        $this->qvc_admin_model                  = new QvcAdminModel();
        $this->session                          = service('session');
        $this->assessor_expertise_model         = new AssessorExpertiseFieldModel();
        $this->samc_model                       = new SamcModel();
    }

    public function dashboard()
    {
        $qa_id = session()->get('user_id');
        // Fetch Notifications Data
        $notification = $this->notification_model
            ->where('n_user_type', 'admin')  // Filter by user type
            ->orderBy('n_is_read', 'ASC')    // Order by unread (false) notifications first
            ->orderBy('n_created_at', 'DESC')  // Then order by creation date (latest first)
            ->findAll();

        // Count Unread Notifications
        $unread_notifications = $this->notification_model
            ->where('n_is_read', 'f')
            ->where('n_user_type', 'admin')
            ->countAllResults();

        // Admin data
        $admin_info = $this->qvc_admin_model->where('qa_id', $qa_id)->first();

        $data = [
            'notifications'             => $notification,
            'unread_notifications'      => $unread_notifications,
            'admin_info'                => $admin_info
        ];

        $this->render_admin('dashboard', $data);
    }

    // Get samc x expertise bar chart
    public function getSamcExpertiseData()
    {
        $asr_id = session()->get('user_id');

        // Get all assessors expertise data
        $assessor_expertise = $this->assessor_expertise_model
            ->select('expertise_field.ef_id, expertise_field.ef_desc')
            ->join('expertise_field', 'assessor_expertise_field.aef_ef_id = expertise_field.ef_id', 'left')
            ->findAll();

        // Get SAMC assignments for the assessor where status is 'Checking' or 'Assessment Completed'
        $samc_assigned = $this->samc_model
            ->select('samc_ef_id, COUNT(*) as total')
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
