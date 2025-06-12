<?php

namespace App\Modules\QvcAdmin\Controllers;

use App\Models\SamcModel;
use App\Models\AssessorModel;
use App\Models\ProviderModel;
use App\Models\NotificationModel;
use App\Controllers\BaseController;
use App\Models\ExpertiseFieldModel;
use App\Models\SamcAssessmentModel;
use App\Models\CourseContentOutlineModel;
use App\Models\AssessorExpertiseFieldModel;

class QvcAdminSAMCController extends BaseController
{
    protected $assessor_model;
    protected $assessor_expertise_model;
    protected $expertise_model;
    protected $provider_model;
    protected $samc_model;
    protected $notification_model;
    protected $course_content_outline_model;
    protected $samc_assessment_model;

    public function __construct()
    {
        $this->session = service('session');
        $this->provider_model                   = new ProviderModel();
        $this->samc_model                       = new SamcModel();
        // Assessor model
        $this->assessor_model                   = new AssessorModel();
        $this->assessor_expertise_model         = new AssessorExpertiseFieldModel();
        $this->expertise_model                  = new ExpertiseFieldModel();
        $this->notification_model               = new NotificationModel();
        $this->course_content_outline_model     = new CourseContentOutlineModel();
        $this->samc_assessment_model            = new SamcAssessmentModel();
    }

    public function samc_management()
    {
        // Select All Submitted SAMC
        $samc = $this->samc_model
            ->select('samc.*, provider.pvd_name, provider.pvd_type')  // Select columns from both tables
            ->join('qvc_upsi.provider', 'provider.pvd_id = samc.samc_pvd_id', 'left')  // Join with courses table
            ->where('samc_status !=', 'DRAFT')
            ->findAll();

        $data = [
            'samc_info'  => $samc,
        ];
        $this->render_admin('samc\manage_samc', $data);
    }

    public function getAppData()
    {
        $apps = $this->assessor_model->select('asr_id, asr_name, asr_university')->findAll();
        return $this->response->setJSON($apps);
    }

    public function assignApp()
    {
        try {
            // Validate incoming request
            $samcId = $this->request->getPost('samc_id');
            $appId = $this->request->getPost('app_id');

            if (empty($samcId) || empty($appId)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid input: SAMC ID and APP ID are required.',
                ]);
            }

            // Check if the SAMC ID exists
            $samc = $this->samc_model->find($samcId);

            if (!$samc) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'SAMC record not found.',
                ]);
            }

            // Update the SAMC record
            $updateData = [
                'samc_asr_id' => $appId,
                'samc_status' => 'AWAITING_REVIEWER_RESPONSE',
                'samc_assigned_date' => date('Y-m-d H:i:s'),
            ];

            $updateResult = $this->samc_model->update($samcId, $updateData);

            if (!$updateResult) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to assign APP. Please try again.',
                ]);
            }

            // Give Assessor Notification
            $assessor_notify_data = [
                'n_user_type'           => 'assessor',
                'n_title'               => 'SAMC ASSIGNATION NOTICE',
                'n_message'             => 'A new SAMC has been assign to you by Administrator',
                'n_created_at'          => date('Y-m-d H:i:s'),
                'n_user_id'             => $appId
            ];

            $this->notification_model->insert($assessor_notify_data);

            // Give Provider Notification
            $provider_notify_data = [
                'n_user_type'           => 'provider',
                'n_title'               => 'SAMC ASSIGNATION NOTICE',
                'n_message'             => 'Administrator has assigned your SAMC to Assessor',
                'n_created_at'          => date('Y-m-d H:i:s'),
                'n_user_id'             => $samc->samc_pvd_id
            ];

            $this->notification_model->insert($provider_notify_data);

            // Return success response
            return $this->response->setJSON([
                'success' => true,
                'message' => 'APP successfully assigned.',
            ]);
        } catch (\Exception $e) {
            // Log the exception for debugging
            log_message('error', 'Error in assignApp: ' . $e->getMessage());

            // Display a generic error message to the user
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again later.',
            ]);
        }
    }

    public function set_reviewed_samc($samc_id)
    {
        // Store samc_id in session
        session()->set('reviewed_samc_id', $samc_id);

        // Redirect to reviewed_samc without parameter
        return redirect()->to(base_url('qvcAdmin/samc/reviewed_samc'));
    }

    // Display Admin Review Page
    public function reviewed_samc()
    {
        // Retrieve samc_id from session
        $samc_id = session()->get('reviewed_samc_id');


        if (!$samc_id) {
            return redirect()->to(base_url('admin/some_error_page')); // Handle missing session case
        }

        $samc_data = $this->samc_model->find($samc_id);
        // Fetch provider name
        $pvd_info = $this->provider_model->select('pvd_name')->where('pvd_id', $samc_data->samc_pvd_id)->first();

        // Fetch samc field
        $samc_field = $this->expertise_model->select('ef_desc')->where('ef_id', $samc_data->samc_ef_id)->first();

        // Fetch Course Outline Info
        $samc_cco_data = $this->course_content_outline_model->where('cco_samc_id', $samc_id)->findAll();

        // Fetch  continuous assessment data
        $samc_continuous_assessment_data = $this->samc_assessment_model->where('sa_samc_id', $samc_id)->where('sa_type', 'continuous')->findAll();

        // Fetch  final assessment data
        $samc_final_assessment_data = $this->samc_assessment_model->where('sa_samc_id', $samc_id)->where('sa_type', 'final')->findAll();

        // Get APP with selected expertise
        $app_list = $this->assessor_model
            ->select('assessor.asr_id, assessor.asr_name, assessor.asr_qu_id,qvc_university.qu_code,qvc_university.qu_name,')
            ->join('assessor_expertise_field', 'assessor_expertise_field.aef_asr_id = assessor.asr_id')
            ->join('qvc_university', 'qvc_university.qu_id = assessor.asr_qu_id')
            ->where('assessor_expertise_field.aef_ef_id', $samc_data->samc_ef_id)
            ->findAll();

        // Fetch Samc Part 2 details
        $data = [
            'samc_data'                         => $samc_data,
            'samc_cco_data'                     => $samc_cco_data,
            'samc_continuous_assessment_data'   => $samc_continuous_assessment_data,
            'samc_final_assessment_data'        => $samc_final_assessment_data,
            'pvd_name'                          => $pvd_info->pvd_name,
            'samc_field'                        => $samc_field->ef_desc,
            'app_list'                          => $app_list,
        ];

        $this->render_admin('samc/samc_review', $data);
    }


    // Return SAMC to Provider
    public function returnSamc()
    {
        $samcId = $this->request->getPost('samc_id');
        $reason = $this->request->getPost('reason');

        // Check if the SAMC ID exists
        $samc = $this->samc_model->find($samcId);

        if (!$samc) {
            return $this->response->setJSON(['success' => false, 'message' => 'SAMC record not found.']);
        }
        // Update the status in the database
        $data = [
            'samc_admin_remarks'    => $reason,
            'samc_status'           => 'Returned', // Update to the desired status
            'samc_updated_at'       => date('Y-m-d H:i:s'), // Update to the desired status
        ];

        // Perform the update
        $updated = $this->samc_model->update($samcId, $data);

        // Return the response
        if ($updated) {

            // Add notification to QVC Provider
            $notification_data = [
                'n_user_type'           => 'provider',
                'n_title'               => 'SAMC RETURN',
                'n_message'             => 'Your SAMC has been Return by Admin, please Update and Resubmit',
                'n_created_at'          => date('Y-m-d H:i:s'),
                'n_user_id'             => $samc->samc_pvd_id
            ];

            $notification_update = $this->notification_model->insert($notification_data);

            if ($notification_update) {
                return $this->response->setJSON(['success' => true]);
            } else {
                return $this->response->setJSON(['success' => false]);
            }
        } else {
            return $this->response->setJSON(['success' => false]);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    // Get SAMC information
    public function getSamcData($samcId)
    {
        $samcData = $this->samc_model
            ->select('samc.*, provider.*, assessor.asr_name')  // Select columns from both tables
            ->join('qvc_upsi.provider', 'provider.pvd_id = samc.samc_pvd_id', 'left')
            ->join('qvc_upsi.assessor', 'assessor.asr_id = samc.samc_asr_id', 'left')
            ->find($samcId); // Fetch data based on the ID

        if ($samcData) {

            $data = [
                'samcData'   => $samcData,
            ];

            $this->render_admin('samc/samc_details', $data);
        } else {
            return $this->response->setJSON(['error' => 'SAMC data not found']);
        }
    }

    public function set_final_reviewed_samc_id($samc_id)
    {
        $this->session->set('samc_id', $samc_id);
        return redirect()->to(base_url('qvcAdmin/final_reviewed_samc')); // Redirect without parameter
    }
    // Final review samc
    public function final_reviewed_samc()
    {
        $samc_id = $this->session->get('samc_id');
        // Get samc attacment
        $samc_attachments = $this->samc_model
            ->select('samc_proforma')
            ->where('samc_id', $samc_id)
            ->first();

        $data = [
            'attachments'   => $samc_attachments,
            'samc_id'       => $samc_id,
        ];

        $this->render_admin('samc/samc_final_review', $data);
    }
}
