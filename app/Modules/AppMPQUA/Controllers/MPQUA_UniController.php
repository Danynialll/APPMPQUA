<?php

namespace App\Modules\AppMPQUA\Controllers;

use App\Models\AssessorModel;
use App\Models\NECBroadModel;
use App\Models\NECDetailModel;
use App\Models\NECNarrowModel;
use App\Models\AsrNECMappingModel;
use App\Models\MPQUAModel;
use App\Controllers\BaseController;
use App\Models\ExpertiseFieldModel;
use App\Models\AssessorExpertiseFieldModel;

class MPQUA_UniController extends BaseController
{
    protected $assessor_model;
    protected $expertise_model;
    protected $asrNECMapping_model;
    protected $NECBroad_model;
    protected $NECNarrow_model;
    protected $NECDetail_model;
    protected $assessorExpertiseModel;
    protected $MPQUA_model;

    public function __construct()
    {
        $this->assessor_model                   = new AssessorModel();
        $this->assessorExpertiseModel           = new AssessorExpertiseFieldModel();
        $this->expertise_model                  = new ExpertiseFieldModel();
        $this->expertise_model                  = new ExpertiseFieldModel();
        $this->asrNECMapping_model              = new AsrNECMappingModel();
        $this->NECDetail_model                  = new NECDetailModel();
        $this->NECBroad_model                   = new NECBroadModel();
        $this->NECNarrow_model                  = new NECNarrowModel();
        $this->MPQUA_model                      = new MPQUAModel();
        $this->session                          = service('session');
    }

    public function viewUni()
    {
        // Get current user's university ID from session or user profile
        $user_id = $this->session->get('user_id');
        $user = $this->MPQUA_model->find($user_id);
        $user_university_id = $user ? $user->mpq_qu_id : null;

        $expertise_list = $this->expertise_model->findAll();
        $nec_broad = $this->NECBroad_model->findAll();
        $nec_narrow = $this->NECNarrow_model->findAll();
        $nec_detail = $this->NECDetail_model->findAll();

        $totalAssessors = $this->assessor_model->where('asr_qu_id', $user_university_id)->countAllResults();
        $maleAssessors = $this->assessor_model->where('asr_gender', 'Male')->where('asr_qu_id', $user_university_id)->countAllResults();
        $femaleAssessors = $this->assessor_model->where('asr_gender', 'Female')->where('asr_qu_id', $user_university_id)->countAllResults();

        // Filter assessors by the same university
        $builder = $this->assessor_model->table('assessor');
        $builder->select('assessor.*, qvc_university.qu_name');
        $builder->join('qvc_university', 'qvc_university.qu_id = assessor.asr_qu_id', 'left');
        if ($user_university_id) {
            $builder->where('assessor.asr_qu_id', $user_university_id);
        }
        // Exclude soft-deleted assessors
        $builder->where('assessor.asr_deleted_at', null);

        $assessor_list = $builder->get()->getResult();


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
            $nec_detail_list = [];
            foreach ($nec_mappings as $nec) {
                $detail = $this->NECDetail_model->find($nec->anm_nd_id);
                if ($detail) {
                    $nec_detail_list[] = [
                        'nd_id' => $detail->nd_id,
                        'nd_desc' => $detail->nd_code . ' ' . $detail->nd_name
                    ];
                }
            }
            $assessor->nec_detail_list = $nec_detail_list;
        }
        unset($assessor);

        $data = [
            'total_assessors'      => $totalAssessors,
            'male_assessors'      => $maleAssessors,
            'female_assessors'    => $femaleAssessors,
            'assessor_list'        => $assessor_list,
            'expertise_list'       => $expertise_list,
            'nec_broad'            => $nec_broad,
            'nec_narrow'           => $nec_narrow,
            'nec_detail'           => $nec_detail,
        ];

        $this->render_mpqua('listUni', $data);
    }
    public function viewUniNew()
    {
        // Get current user's university ID from session or user profile
        $user_id = $this->session->get('user_id');
        $user = $this->MPQUA_model->find($user_id);
        $user_university_id = $user ? $user->mpq_qu_id : null;

        $expertise_list = $this->expertise_model->findAll();
        $nec_broad = $this->NECBroad_model->findAll();
        $nec_narrow = $this->NECNarrow_model->findAll();
        $nec_detail = $this->NECDetail_model->findAll();

        $totalAssessors = $this->assessor_model->where('asr_qu_id', $user_university_id)->countAllResults();
        $maleAssessors = $this->assessor_model->where('asr_gender', 'Male')->where('asr_qu_id', $user_university_id)->countAllResults();
        $femaleAssessors = $this->assessor_model->where('asr_gender', 'Female')->where('asr_qu_id', $user_university_id)->countAllResults();

        // Filter assessors by the same university
        $builder = $this->assessor_model->table('assessor');
        $builder->select('assessor.*, qvc_university.qu_name');
        $builder->join('qvc_university', 'qvc_university.qu_id = assessor.asr_qu_id', 'left');
        if ($user_university_id) {
            $builder->where('assessor.asr_qu_id', $user_university_id);
        }
        // Exclude soft-deleted assessors
        $builder->where('assessor.asr_deleted_at', null);

        $assessor_list = $builder->get()->getResult();


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
            $nec_detail_list = [];
            foreach ($nec_mappings as $nec) {
                $detail = $this->NECDetail_model->find($nec->anm_nd_id);
                if ($detail) {
                    $nec_detail_list[] = [
                        'nd_id' => $detail->nd_id,
                        'nd_desc' => $detail->nd_code . ' ' . $detail->nd_name
                    ];
                }
            }
            $assessor->nec_detail_list = $nec_detail_list;
        }
        unset($assessor);

        $data = [
            'total_assessors'      => $totalAssessors,
            'male_assessors'      => $maleAssessors,
            'female_assessors'    => $femaleAssessors,
            'assessor_list'        => $assessor_list,
            'expertise_list'       => $expertise_list,
            'nec_broad'            => $nec_broad,
            'nec_narrow'           => $nec_narrow,
            'nec_detail'           => $nec_detail,
        ];

        $this->render_mpqua('listUniNew', $data);
    }

    public function get_expertise_list()
    {

        // Fetch from model
        $expertise_list = $this->assessor_model->get_all_expertise();

        if (!empty($expertise_list)) {
            echo json_encode([
                'success' => true,
                'data' => $expertise_list,
                'csrf_token' => csrf_hash()
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'data' => [],
                'csrf_token' => csrf_hash()
            ]);
        }
    }

    public function get_nec_narrow()
    {
        if ($this->request->isAJAX()) {
            $broad_id = $this->request->getPost('broad_id');
            $narrow = $this->NECNarrow_model->where('nn_nb_id', $broad_id)->findAll();
            return $this->response->setJSON([
                'success' => true,
                'data' => $narrow,
                'csrf_token' => csrf_hash()
            ]);
        }
        return $this->response->setJSON(['success' => false]);
    }

    public function get_nec_detail()
    {
        if ($this->request->isAJAX()) {
            $narrow_id = $this->request->getPost('narrow_id');
            $detail = $this->NECDetail_model->where('nd_nn_id', $narrow_id)->findAll();
            return $this->response->setJSON([
                'success' => true,
                'data' => $detail,
                'csrf_token' => csrf_hash()
            ]);
        }
        return $this->response->setJSON(['success' => false]);
    }


    public function createAssessor()
    {
        $asr_name               = $this->request->getPost('asr_name');
        $asr_qu_id              = $this->request->getPost('asr_qu_id');
        $asr_gender             = $this->request->getPost('asr_gender');
        $asr_phone              = $this->request->getPost('asr_phone');
        $asr_fax                = $this->request->getPost('asr_fax');
        $asr_email              = $this->request->getPost('asr_email');
        $asr_service_address    = $this->request->getPost('asr_service_address');
        $asr_retirement_date    = $this->request->getPost('asr_retirement_date');
        $expertise              = $this->request->getPost('expertise');
        $nec_detail_id          = $this->request->getPost('nec_detail');

        // --- Handle file upload ---
        $cvPath = null;
        $cvFile = $this->request->getFile('asr_cv');
        if ($cvFile && $cvFile->isValid() && !$cvFile->hasMoved()) {
            $newName = uniqid('cv_') . '.' . $cvFile->getExtension();
            $uploadPath = FCPATH . 'uploads/assessors/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $cvFile->move($uploadPath, $newName);
            $cvPath = 'uploads/assessors/' . $newName;
        }

        $data = [
            'asr_name'            => $asr_name,
            'asr_qu_id'           => $asr_qu_id, 
            'asr_gender'          => $asr_gender,
            'asr_phone'           => $asr_phone,
            'asr_fax'             => $asr_fax,
            'asr_email'           => $asr_email,
            'asr_service_address' => $asr_service_address,
            'asr_retirement_date' => $asr_retirement_date,
            'asr_cv_path'         => $cvPath, // Save path to DB
        ];

        $this->assessor_model->insert($data);
        $assessor_id = $this->assessor_model->getInsertID();

        $expertise = array_filter($expertise, function ($value) {
            return trim($value) !== "";
        });

        if ($expertise && is_array($expertise)) {
            foreach ($expertise as $exp_id) {
                $expertise_data[] = [
                    'aef_asr_id' => $assessor_id,
                    'aef_ef_id'  => $exp_id
                ];
            }

            if (!empty($expertise_data)) {
                $this->assessorExpertiseModel->insertBatch($expertise_data);
            }
        }

        if (!empty($nec_detail_id)) {
            // Always treat as array for multiple support
            $nec_detail_ids = (array)$nec_detail_id;

            $nec_data = [];
            foreach ($nec_detail_ids as $nd_id) {
                if (trim($nd_id) !== "") {
                    $nec_data[] = [
                        'anm_asr_id' => $assessor_id,
                        'anm_nd_id'  => $nd_id
                    ];
                }
            }
            if (!empty($nec_data)) {
                $this->asrNECMapping_model->insertBatch($nec_data);
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Assessor added successfully.',
            'csrf_token' => csrf_hash()
        ]);
    }

    public function deleteAssessor($id)
    {
        // Find the assessor
        $assessor = $this->assessor_model->find($id);
        if (!$assessor) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Assessor not found.'
            ]);
        }

        // Delete related expertise
        $this->assessorExpertiseModel->where('aef_asr_id', $id)->delete();

        // Delete related NEC mappings
        $this->asrNECMapping_model->where('anm_asr_id', $id)->delete();

        // Optionally, delete the CV file from the server
        if (!empty($assessor->asr_cv_path)) {
            $cvFullPath = FCPATH . $assessor->asr_cv_path;
            if (file_exists($cvFullPath)) {
                @unlink($cvFullPath);
            }
        }

        // Delete the assessor
        $this->assessor_model->delete($id);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Assessor deleted successfully.'
        ]);
    }

    public function getAssessor($asr_id)
    {
        // Join assessor with university to get qu_name and other attributes
        $builder = $this->assessor_model->table('assessor');
        $builder->select('assessor.*, qvc_university.qu_id, qvc_university.qu_name, qvc_university.qu_code');
        $builder->join('qvc_university', 'qvc_university.qu_id = assessor.asr_qu_id', 'left');
        $builder->where('assessor.asr_id', $asr_id);
        $assessor = $builder->get()->getRow();

        if (!$assessor) {
            return $this->response->setJSON(['success' => false]);
        }

        // Get expertise
        $expertise = $this->assessorExpertiseModel
            ->select('expertise_field.ef_desc')
            ->join('qvc_upsi.expertise_field', 'expertise_field.ef_id = assessor_expertise_field.aef_ef_id', 'left')
            ->where('aef_asr_id', $asr_id)
            ->findAll();
        $assessor->expertise_list = array_column($expertise, 'ef_desc');

        // Get NEC
        $nec_mappings = $this->asrNECMapping_model->where('anm_asr_id', $asr_id)->findAll();
        $nec_detail_list = [];
        foreach ($nec_mappings as $nec) {
            $detail = $this->NECDetail_model->find($nec->anm_nd_id);
            if ($detail) {
                $nec_detail_list[] = [
                    'nd_id' => $detail->nd_id,
                    'nd_desc' => $detail->nd_code . ' ' . $detail->nd_name
                ];
            }
        }
        $assessor->nec_detail_list = $nec_detail_list;

        return $this->response->setJSON([
            'success' => true,
            'data' => $assessor
        ]);
    }

    public function editAssessor()
    {

        $assessor_id           = $this->request->getPost('asr_id');
        $asr_name              = $this->request->getPost('asr_name');
        $asr_phone             = $this->request->getPost('asr_phone');
        $asr_fax               = $this->request->getPost('asr_fax');
        $asr_email             = $this->request->getPost('asr_email');
        $asr_service_address   = $this->request->getPost('asr_service_address');
        $asr_retirement_date   = $this->request->getPost('asr_retirement_date');
        $expertise             = $this->request->getPost('expertise');
        $nec_detail_id         = $this->request->getPost('nec_detail');

        // --- Handle file upload ---
        $cvPath = null;
        $cvFile = $this->request->getFile('asr_cv');
        if ($cvFile && $cvFile->isValid() && !$cvFile->hasMoved()) {
            $newName = uniqid('cv_') . '.' . $cvFile->getExtension();
            $uploadPath = FCPATH . 'uploads/assessors/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $cvFile->move($uploadPath, $newName);
            $cvPath = 'uploads/assessors/' . $newName;
        } else {
            // Keep old path if no new file uploaded
            $cvPath = $this->assessor_model->find($assessor_id)->asr_cv_path ?? null;
        }

        // Update main assessor data
        $data = [
            'asr_name'            => $asr_name,
            'asr_phone'           => $asr_phone,
            'asr_fax'             => $asr_fax,
            'asr_email'           => $asr_email,
            'asr_service_address' => $asr_service_address,
            'asr_retirement_date' => $asr_retirement_date,
            'asr_cv_path'         => $cvPath,
        ];

        $this->assessor_model->update($assessor_id, $data);

        // --- Update expertise ---
        // Remove all old expertise for this assessor
        $this->assessorExpertiseModel->where('aef_asr_id', $assessor_id)->delete();

        // Insert new expertise
        if ($expertise && is_array($expertise)) {
            $expertise_data = [];
            foreach ($expertise as $exp_id) {
                if (trim($exp_id) !== "") {
                    $expertise_data[] = [
                        'aef_asr_id' => $assessor_id,
                        'aef_ef_id'  => $exp_id
                    ];
                }
            }
            if (!empty($expertise_data)) {
                $this->assessorExpertiseModel->insertBatch($expertise_data);
            }
        }

        // --- Update nec ---
        // Remove all old nec for this assessor
        $this->asrNECMapping_model->where('anm_asr_id', $assessor_id)->delete();

        // Insert new expertise
        if ($nec_detail_id && is_array($nec_detail_id)) {
            $nec_data = [];
            foreach ($nec_detail_id as $nec_id) {
                if (trim($nec_id) !== "") {
                    $nec_data[] = [
                        'anm_asr_id' => $assessor_id,
                        'anm_nd_id'  => $nec_id
                    ];
                }
            }
            if (!empty($nec_data)) {
                $this->asrNECMapping_model->insertBatch($nec_data);
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Assessor updated successfully.',
            'csrf_token' => csrf_hash()
        ]);
    }
}

