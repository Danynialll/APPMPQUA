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
use App\Models\SamcReviewModel;

class AssessorSamcController extends BaseController
{
    // Assessor
    protected $notification_model;
    protected $assessor_model;
    protected $samc_model;
    protected $samc_reject_record_model;
    protected $assessor_expertise_model;
    protected $expertise_model;
    protected $course_content_outline_model;
    protected $samc_assessment_model;
    protected $samc_review;


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
        $this->samc_review                      = new SamcReviewModel();
        $this->session = service('session');
    }

    // Display Assessor Manage SAMC Page
    public function manage_samc()
    {
        $asr_id = $this->session->get('user_id');
        // Get assigned SAMC
        $pending_assignation = $this->samc_model
            ->where('samc_asr_id', $asr_id)
            ->where('samc_status', 'AWAITING_REVIEWER_RESPONSE')
            ->findAll();

        // Get all accepted assignation
        $samc_assigned = $this->samc_model
            ->where('samc_asr_id', $asr_id)
            ->groupStart()
            ->where('samc_status', 'AWAITING_REVIEWER_REVIEW')  // ✅ Use `where()` first
            ->orWhere('samc_status', 'REVIEW_COMPLETED')
            ->groupEnd()
            ->findAll();


        $data = [
            'pending_assignation'   => $pending_assignation,
            'samc_info'         => $samc_assigned,
        ];
        $this->render_assessor('samc/samc_management', $data);
    }

    public function accept_samc()
    {
        // Get the SAMC ID from the POST request
        $samcId = $this->request->getPost('samc_id');

        // Update the status in the database
        $data = [
            'samc_status'       => 'AWAITING_REVIEWER_REVIEW', // Update to the desired status
            'samc_updated_at'   => date('Y-m-d H:i:s'), // Update to the desired status
        ];

        // Perform the update
        $updated = $this->samc_model->update($samcId, $data);

        // Return the response
        if ($updated) {

            // Add notification to QVC Admin
            $notification_data = [
                'n_user_type'           => 'admin',
                'n_title'               => 'SAMC ACCEPTANCE',
                'n_message'             => 'A new SAMC Acceptance has been made by ' . $this->session->get('user_name'),
                'n_created_at'          => date('Y-m-d H:i:s'),
                'n_user_id'             => 3
            ];

            $notification_update = $this->notification_model->insert($notification_data);

            // Add notification to Provider
            // Get provider id based on samc_id
            $samc_info = $this->samc_model->where('samc_id', $samcId)->first();
            $provider_id = $samc_info->samc_pvd_id;

            $pvd_notification_data = [
                'n_user_type'           => 'provider',
                'n_title'               => 'SAMC ACCEPTANCE',
                'n_message'             => 'An Assessor has accepted your SAMC for review',
                'n_created_at'          => date('Y-m-d H:i:s'),
                'n_user_id'             => $provider_id
            ];

            $pvd_notification_update = $this->notification_model->insert($pvd_notification_data);

            if ($notification_update && $pvd_notification_update) {
                return $this->response->setJSON(['success' => true]);
            } else {
                return $this->response->setJSON(['success' => false]);
            }
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }

    public function rejectSamc()
    {
        $samcId = $this->request->getPost('samc_id');
        $reason = $this->request->getPost('reason');

        // Update the status in the database
        $data = [
            'samc_status'       => 'REJECTED', // Update to the desired status
            'samc_updated_at'   => date('Y-m-d H:i:s'), // Update to the desired status
        ];

        // Perform the update
        $updated = $this->samc_model->update($samcId, $data);

        // Return the response
        if ($updated) {
            $insert_reject_record = $this->samc_reject_record_model->insert([
                'srr_samc_id' => $samcId,
                'srr_asr_id' => session()->get('user_id'), // Assuming logged-in user ID
                'srr_rejection_date' => date('Y-m-d H:i:s'),
                'srr_reason' => $reason,
            ]);

            // Return the response
            if ($insert_reject_record) {
                // Add notification to QVC Admin
                $notification_data = [
                    'n_user_type'           => 'admin',
                    'n_title'               => 'SAMC ACCEPTANCE',
                    'n_message'             => 'A new SAMC Rejection has been made by ' . $this->session->get('user_name'),
                    'n_created_at'          => date('Y-m-d H:i:s'),
                    'n_user_id'             => 3
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
        } else {
            return $this->response->setJSON(['success' => false]);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    public function set_samc_id($samc_id)
    {
        $this->session->set('samc_id', $samc_id);
        return redirect()->to(base_url('assessor/samc/reviewed_samc')); // Redirect without parameter
    }

    public function reviewed_samc()
    {
        $samc_id = session()->get('samc_id');

        if (!$samc_id) {
            return redirect()->to(base_url('admin/some_error_page')); // Handle missing session case
        }

        $samc_data = $this->samc_model->find($samc_id);

        // Fetch samc field
        $samc_field = $this->expertise_model->select('ef_desc')->where('ef_id', $samc_data->samc_ef_id)->first();

        // Fetch Course Outline Info
        $samc_cco_data = $this->course_content_outline_model->where('cco_samc_id', $samc_id)->findAll();

        // Fetch  continuous assessment data
        $samc_continuous_assessment_data = $this->samc_assessment_model->where('sa_samc_id', $samc_id)->where('sa_type', 'continuous')->findAll();

        // Fetch  final assessment data
        $samc_final_assessment_data = $this->samc_assessment_model->where('sa_samc_id', $samc_id)->where('sa_type', 'final')->findAll();

        /* Fetch review data
        Indicator
        First time review - Review 1
        0 - Review Draft
        1 - Review Submitted

        Second time review - Review 2
        2 - Review Draft
        3 - Review Submitted
        */
        $reviews_1 = $this->samc_review
            ->where('sr_samc_id', $samc_id)
            ->whereIn('sr_counter', ['0', '1'])
            ->first();

        $reviews_2 = [];

        if ($reviews_1 && $reviews_1->sr_counter == 1) {
            // Fetch review 2
            $reviews_2 = $this->samc_review
                ->where('sr_samc_id', $samc_id)
                ->whereIn('sr_counter', ['2', '3'])
                ->first();
        }

        // Fetch Samc Part 2 details
        $data = [
            'samc_data'                         => $samc_data,
            'samc_cco_data'                     => $samc_cco_data,
            'samc_continuous_assessment_data'   => $samc_continuous_assessment_data,
            'samc_final_assessment_data'        => $samc_final_assessment_data,
            'samc_field'                        => $samc_field->ef_desc,
            'reviews_1'                         => $reviews_1,
            'reviews_2'                         => $reviews_2,
        ];

        // Check SAMC Review Status
        if ($samc_data->samc_status == 'AWAITING_REVIEWER_REVIEW' && $samc_data->samc_review_count == null) {
            // First Review
            $this->render_assessor('samc/samc_first_review', $data);
        } elseif ($samc_data->samc_status != 'AWAITING_REVIEWER_REVIEW' && $samc_data->samc_review_count == 1) {
            // Review one completed
            $this->render_assessor('samc/samc_review_one_completed', $data);
        } elseif ($samc_data->samc_status == 'AWAITING_REVIEWER_REVIEW' && $samc_data->samc_review_count == 1) {
            // Second Review
            $this->render_assessor('samc/samc_second_review', $data);
        } else {
            // Review one and two completed
            $this->render_assessor('samc/samc_review_completed', $data);
        }
    }

    public function saveReviewAsDraft()
    {
        // check if review has already save as draft or not
        $samc_id        = $this->request->getPost('samc_id');
        $sr_counter     = $this->request->getPost('sr_counter');
        $status         = $this->request->getPost('status') ?? []; // Ensure it is an array
        $remarks        = $this->request->getPost('remarks') ?? []; // Ensure it is an array
        $review_status  = strtoupper($this->request->getPost('result') ?? []);
        $data = [
            'sr_samc_id'                            => $samc_id,

            // Fetch data for each item status
            'sr_samc_name_status'                   =>  $status[0] ?? 'decide_later',
            'sr_mqf_level_status'                   =>  $status[1] ?? 'decide_later',
            'sr_duration_hours_status'              =>  $status[2] ?? 'decide_later',
            'sr_teaching_methods_status'            =>  $status[3] ?? 'decide_later',
            'sr_academic_credits_status'            =>  $status[4] ?? 'decide_later',
            'sr_synopsis_status'                    =>  $status[5] ?? 'decide_later',
            'sr_intended_learning_outcomes_status'  =>  $status[6] ?? 'decide_later',
            'sr_content_outline_status'             =>  $status[7] ?? 'decide_later',
            'sr_assessment_status'                  =>  $status[8] ?? 'decide_later',

            // Fetch remarks
            'sr_samc_name'                          =>  $remarks[0] ?? null,
            'sr_mqf_level'                          =>  $remarks[1] ?? null,
            'sr_duration_hours'                     =>  $remarks[2] ?? null,
            'sr_teaching_methods'                   =>  $remarks[3] ?? null,
            'sr_academic_credits'                   =>  $remarks[4] ?? null,
            'sr_synopsis'                           =>  $remarks[5] ?? null,
            'sr_intended_learning_outcomes'         =>  $remarks[6] ?? null,
            'sr_content_outline'                    =>  $remarks[7] ?? null,
            'sr_assessment'                         =>  $remarks[8] ?? null,

            'sr_review_status'                      =>  $review_status,
            'sr_created_at'                         =>  date('Y-m-d H:i:s'),
        ];

        // Determine sr_counter reference
        $sr_reference = ($sr_counter == 1) ? '0' : (($sr_counter == 3) ? '2' : null);

        if ($sr_reference !== null) {
            // Check if review exists
            $sr_review = $this->samc_review->where('sr_counter', $sr_reference)->first();

            // ✅ Add sr_counter inside the if statement
            $data['sr_counter'] = $sr_reference;

            if ($sr_review) {
                // Update existing review
                $this->samc_review->update($sr_review->sr_id, $data);
                $message = 'Review draft updated successfully';
            } else {
                // Insert new review
                $this->samc_review->insert($data);
                $message = 'Review draft saved successfully';
            }

            return $this->response->setJSON([
                'status' => 'success',
                'message' => $message
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to save draft'
            ]);
        }
    }

    public function submit_review()
    {
        // check if review has already save as draft or not
        $samc_id    = $this->request->getPost('samc_id');
        $sr_counter = $this->request->getPost('sr_counter');
        $status     = $this->request->getPost('status') ?? []; // Ensure it is an array
        $remarks    = $this->request->getPost('remarks') ?? []; // Ensure it is an array
        $review_status  = strtoupper($this->request->getPost('result') ?? []);

        $data = [
            'sr_samc_id'                            => $samc_id,
            'sr_counter'                            => $sr_counter,

            // Fetch data for each item status
            'sr_samc_name_status'                   =>  $status[0] ?? 'decide_later',
            'sr_mqf_level_status'                   =>  $status[1] ?? 'decide_later',
            'sr_duration_hours_status'              =>  $status[2] ?? 'decide_later',
            'sr_teaching_methods_status'            =>  $status[3] ?? 'decide_later',
            'sr_academic_credits_status'            =>  $status[4] ?? 'decide_later',
            'sr_synopsis_status'                    =>  $status[5] ?? 'decide_later',
            'sr_intended_learning_outcomes_status'  =>  $status[6] ?? 'decide_later',
            'sr_content_outline_status'             =>  $status[7] ?? 'decide_later',
            'sr_assessment_status'                  =>  $status[8] ?? 'decide_later',

            // Fetch remarks
            'sr_samc_name'                          =>  $remarks[0] ?? null,
            'sr_mqf_level'                          =>  $remarks[1] ?? null,
            'sr_duration_hours'                     =>  $remarks[2] ?? null,
            'sr_teaching_methods'                   =>  $remarks[3] ?? null,
            'sr_academic_credits'                   =>  $remarks[4] ?? null,
            'sr_synopsis'                           =>  $remarks[5] ?? null,
            'sr_intended_learning_outcomes'         =>  $remarks[6] ?? null,
            'sr_content_outline'                    =>  $remarks[7] ?? null,
            'sr_assessment'                         =>  $remarks[8] ?? null,

            'sr_review_status'                      => $review_status,
            'sr_created_at'                         =>  date('Y-m-d H:i:s'),
        ];

        // Determine sr_counter reference
        $sr_reference = ($sr_counter == 1) ? '0' : (($sr_counter == 3) ? '2' : null);

        if ($sr_reference !== null) {
            // Check if review exists
            $sr_review = $this->samc_review->where('sr_counter', $sr_reference)->first();

            if ($sr_review) {
                // Update existing review
                $this->samc_review->update($sr_review->sr_id, $data);
                $message = 'Review submit successfully';
            } else {
                // Insert new review
                $this->samc_review->insert($data);
                $message = 'Review submit successfully';
            }

            // Update SAMC table
            $samc_data = [
                'samc_reviewed_date'    => date('Y-m-d H:i:s'),
                'samc_review_count'     => ($sr_counter == 1) ? '1' : '2',
                'samc_status'           => 'REVIEW_COMPLETED',
            ];

            if ($this->samc_model->update($samc_id, $samc_data)) {
                // Send Notification to admin
                $notification_data = [
                    'n_user_type'  => 'admin',
                    'n_title'      => 'Review Submitted',
                    'n_message'    => 'The assessor has completed the review. You may now review their feedback and take necessary actions.',
                    'n_created_at' => date('Y-m-d H:i:s'),
                    'n_user_id'    => 3
                ];

                $this->notification_model->insert($notification_data);

                // return $this->response->setJSON(['success' => (bool) $notification_update]);
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => $message
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to submit'
                ]);
            }
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to submit'
            ]);
        }
    }
}
