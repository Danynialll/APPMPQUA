<?php

namespace App\Modules\AppMPQUA\Controllers;

use App\Models\MPQUAModel;
use App\Models\AssessorModel;
use App\Models\NECBroadModel;
use App\Models\NECDetailModel;
use App\Models\NECNarrowModel;
use App\Models\AsrNECMappingModel;
use App\Controllers\BaseController;
use App\Models\ExpertiseFieldModel;
use App\Models\AssessorExpertiseFieldModel;

class AppMPQUAController extends BaseController
{
    protected $assessor_model;
    protected $expertise_model;
    protected $asrNECMapping_model;
    protected $NECDetail_model;
    protected $NECBroad_model;
    protected $NECNarrow_model;
    protected $assessorExpertiseModel;
    protected $mpqua_model;

    public function __construct()
    {
        $this->assessor_model                   = new AssessorModel();
        $this->assessorExpertiseModel           = new AssessorExpertiseFieldModel();
        $this->expertise_model                  = new ExpertiseFieldModel();
        $this->asrNECMapping_model              = new AsrNECMappingModel();
        $this->NECBroad_model                   = new NECBroadModel();
        $this->NECNarrow_model                  = new NECNarrowModel();
        $this->NECDetail_model                  = new NECDetailModel();
        $this->mpqua_model                      = new MPQUAModel();
        $this->session                          = service('session');
    }

    public function viewAll()
    {
        $builder = $this->assessor_model->table('assessor');
        $builder->select('assessor.*, qvc_university.qu_name, qvc_university.qu_code');
        $builder->join('qvc_university', 'qvc_university.qu_id = assessor.asr_qu_id', 'left');
        $assessor_list = $builder->get()->getResult();

        $total_assessors = $this->assessor_model->countAllResults();
        $male_assessors = $this->assessor_model->where('asr_gender', 'Male')->countAllResults();
        $female_assessors = $this->assessor_model->where('asr_gender', 'Female')->countAllResults();

        foreach ($assessor_list as &$assessor) {
            // Get all expertise for this assessor
            $expertise = $this->assessorExpertiseModel
                ->select('expertise_field.ef_desc')
                ->join('qvc_upsi.expertise_field', 'expertise_field.ef_id = assessor_expertise_field.aef_ef_id', 'left')
                ->where('aef_asr_id', $assessor->asr_id)
                ->findAll();
            $assessor->expertise_list = array_column($expertise, 'ef_desc');

            // Get all NEC mappings for this assessor
            $nec_mappings = $this->asrNECMapping_model->where('anm_asr_id', $assessor->asr_id)->findAll();
            $nec_list = [];
            foreach ($nec_mappings as $nec) {
                $detail = $this->NECDetail_model->find($nec->anm_nd_id);
                if ($detail) {
                    $nec_list[] = [
                        'nec_code' => $detail->nd_code,
                        'nec_name' => $detail->nd_name
                    ];
                }
            }
            $assessor->nec_list = $nec_list;
        }
        unset($assessor);

        $data = [
            'assessor_list' => $assessor_list,
            'total_assessors' => $total_assessors,
            'male_assessors' => $male_assessors,
            'female_assessors' => $female_assessors,
        ];

        $this->render_mpqua('listAll', $data);
    }

    public function necAssessorFilter()
    {
        $nec_broad = $this->NECBroad_model->findAll();
        $nec_narrow = $this->NECNarrow_model->findAll();
        $nec_detail = $this->NECDetail_model->findAll();

        $data = [
            'nec_broad' => $nec_broad,
            'nec_narrow' => $nec_narrow,
            'nec_detail' => $nec_detail,
        ];

        return $this->render_mpqua('necPage', $data);
    }

    public function get_assessors_by_nec_detail()
    {
        $nec_detail_id = $this->request->getPost('nec_detail_id');
        $assessor_ids = $this->asrNECMapping_model
            ->where('anm_nd_id', $nec_detail_id)
            ->findAll();
        $ids = array_column($assessor_ids, 'anm_asr_id');
        $assessors = [];
        if (!empty($ids)) {
            $assessors = $this->assessor_model
                ->select('assessor.*, qvc_university.qu_name')
                ->join('qvc_university', 'qvc_university.qu_id = assessor.asr_qu_id', 'left')
                ->whereIn('asr_id', $ids)
                ->findAll();
        }
        // Get expertise for each assessor
        foreach ($assessors as &$assessor) {
            $expertise = $this->assessorExpertiseModel
                ->select('expertise_field.ef_desc')
                ->join('qvc_upsi.expertise_field', 'expertise_field.ef_id = assessor_expertise_field.aef_ef_id', 'left')
                ->where('aef_asr_id', $assessor->asr_id)
                ->findAll();
            $assessor->expertise_list = array_column($expertise, 'ef_desc');
        }

        // Get NEC for each assessor
        foreach ($assessors as &$assessor) {
            $nec_mappings = $this->asrNECMapping_model->where('anm_asr_id', $assessor->asr_id)->findAll();
            $nec_list = [];
            foreach ($nec_mappings as $nec) {
                $detail = $this->NECDetail_model->find($nec->anm_nd_id);
                if ($detail) {
                    $nec_list[] = [
                        'nec_code' => $detail->nd_code,
                        'nec_name' => $detail->nd_name
                    ];
                }
            }
            $assessor->nec_list = $nec_list;
        }
        

        // Return all variables for debugging
        return $this->response->setJSON([
            'success' => true,
            'nec_detail_id' => $nec_detail_id,
            'assessor_ids' => $assessor_ids,
            'ids' => $ids,
            'assessors' => $assessors,
            'csrf_token' => csrf_hash()
        ]);
    }

    public function profile()
    {
        // Get current user's university ID from session or user profile
        $user_id = $this->session->get('user_id');
        $user = $this->mpqua_model->find($user_id);
        $user_university_id = $user ? $user->mpq_qu_id : null;

        $builder = $this->mpqua_model->table('mpqua');
        $builder->select('mpqua.*, qvc_university.qu_name, qvc_university.qu_code');
        $builder->join('qvc_university', 'qvc_university.qu_id = mpqua.mpq_qu_id', 'left');
        if ($user_university_id) {
            $builder->where('mpqua.mpq_qu_id', $user_university_id);
        }

        $user_info = $builder->get()->getRow();

        $now = date('Y-m-d');

        $male_assessors = $this->assessor_model
            ->where('asr_gender', 'Male')
            ->where('asr_qu_id', $user_university_id)
            ->countAllResults();
        $female_assessors = $this->assessor_model
            ->where('asr_gender', 'Female')
            ->where('asr_qu_id', $user_university_id)
            ->countAllResults();
        $active_assessors = $this->assessor_model
            ->groupStart()
                ->where('asr_qu_id', $user_university_id)
                ->where('asr_retirement_date IS NULL')
                ->orWhere('asr_retirement_date >', $now)
            ->groupEnd()
            ->countAllResults();
        $retired_assessors = $this->assessor_model
            ->groupStart()
                ->where('asr_qu_id', $user_university_id)
                ->where('asr_retirement_date IS NOT NULL')
                ->where('asr_retirement_date <=', $now)
            ->groupEnd()
            ->countAllResults();
        $nec_counts = [];
        $nec_details = $this->NECDetail_model->findAll();
        foreach ($nec_details as $nec) {
            // Get all assessors in this university mapped to this NEC detail
            $assessor_ids = $this->asrNECMapping_model
                ->select('anm_asr_id')
                ->where('anm_nd_id', $nec->nd_id)
                ->findAll();
            $ids = array_column($assessor_ids, 'anm_asr_id');
            if (!empty($ids)) {
                // Count only assessors belonging to this university
                $count = $this->assessor_model
                    ->whereIn('asr_id', $ids)
                    ->where('asr_qu_id', $user_university_id)
                    ->countAllResults();
                if ($count > 0) {
                    $nec_counts[] = [
                        'nec_code' => $nec->nd_code,
                        'nec_name' => $nec->nd_name,
                        'count'    => $count,
                    ];
                }
            }
        }
        

        // Prepare data for view
        $data = [
            'user_info' => $user_info,
            'male_assessors' => $male_assessors,
            'female_assessors' => $female_assessors,
            'active_assessors' => $active_assessors,
            'retired_assessors' => $retired_assessors,
            'nec_counts' => $nec_counts,
        ];


        $this->render_mpqua('profile', $data);
    }

    public function updateProfile()
    {
        $user_id = $this->session->get('user_id');
        $mpq_address = $this->request->getPost('mpq_address');
        $mpq_email = $this->request->getPost('mpq_email');
        $mpq_phone = $this->request->getPost('mpq_phone');
        $mpq_fax = $this->request->getPost('mpq_fax');

        // Validate input
        if (!$user_id || !$mpq_address || !$mpq_email || !$mpq_phone || !$mpq_fax) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'All fields are required.',
                'csrf_token' => csrf_hash()
            ]);
        }

        // Update user profile
        $data = [
            'mpq_address' => $mpq_address,
            'mpq_email' => $mpq_email,
            'mpq_phone' => $mpq_phone,
            'mpq_fax' => $mpq_fax,
        ];

        if ($this->mpqua_model->update($user_id, $data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Profile updated successfully.',
                'csrf_token' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to update profile.',
                'csrf_token' => csrf_hash()
            ]);
        }
    }
}
