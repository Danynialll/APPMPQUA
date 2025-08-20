<?php

namespace App\Modules\AppMPQUA\Controllers;

use App\Models\AssessorModel;
use App\Models\NECBroadModel;
use App\Models\NECDetailModel;
use App\Models\NECNarrowModel;
use App\Models\AsrNECMappingModel;
use App\Models\MPQUAModel;
use App\Controllers\BaseController;
use App\Models\AsrTypeMappingModel;
use App\Models\AsrTypesModel;
use App\Models\ExpertiseFieldModel;
use App\Models\AssessorExpertiseFieldModel;

class MPQUA_UniController extends BaseController
{
    protected $assessor_model;
    protected $expertise_model;
    protected $asrNECMapping_model;
    protected $asrTypeMapping_model;
    protected $asrType_model;
    protected $NECBroad_model;
    protected $NECNarrow_model;
    protected $NECDetail_model;
    protected $assessorExpertiseModel;
    protected $MPQUA_model;

    public function __construct()
    {
        $this->assessor_model                   = new AssessorModel();
        $this->asrTypeMapping_model             = new AsrTypeMappingModel();
        $this->asrType_model                    = new AsrTypesModel();
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

        $totalAssessors = $this->assessor_model
            ->where('asr_qu_id', $user_university_id)
            ->where('asr_deleted_at', null)
            ->countAllResults();
        $maleAssessors = $this->assessor_model
            ->where('asr_gender', 'Male')
            ->where('asr_qu_id', $user_university_id)
            ->where('asr_deleted_at', null)
            ->countAllResults();
        $femaleAssessors = $this->assessor_model
            ->where('asr_gender', 'Female')
            ->where('asr_qu_id', $user_university_id)
            ->where('asr_deleted_at', null)
            ->countAllResults();

        // Filter assessors by the same university and exclude soft-deleted
        $builder = $this->assessor_model->table('assessor');
        $builder->select('assessor.*, qvc_university.qu_name');
        $builder->join('qvc_university', 'qvc_university.qu_id = assessor.asr_qu_id', 'left');
        if ($user_university_id) {
            $builder->where('assessor.asr_qu_id', $user_university_id);
        }
        $builder->where('assessor.asr_deleted_at', null); // Exclude soft-deleted

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
            'qu_name'              => get_university_name($user_university_id),
            'qu_id'                => $user_university_id,
        ];

        $this->render_mpqua('listUni', $data);
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
            $user_id = $this->session->get('user_id');
            $user = $this->MPQUA_model->find($user_id);
            $user_university_id = $user ? $user->mpq_qu_id : null;
            $narrow = $this->NECNarrow_model->where('nn_nb_id', $broad_id)->findAll();
            $nec_detail = $this->NECDetail_model->where('nd_nn_id', $narrow[0]->nn_id)->findAll();
            $detail_counts = [];
            foreach ($nec_detail as $detail) {
                $detail_counts[$detail->nd_id] = $this->asrNECMapping_model
                    ->where('anm_nd_id', $detail->nd_id)
                    ->countAllResults();
            }

            // 2. Sum up counts for each NEC Narrow (by its details)
            $narrow_counts = [];
            foreach ($narrow as $nrrw) {
                $narrow_counts[$nrrw->nn_id] = 0;
                foreach ($nec_detail as $detail) {
                    if ($detail->nd_nn_id == $nrrw->nn_id) {
                        $narrow_counts[$nrrw->nn_id] += $detail_counts[$detail->nd_id] ?? 0;
                    }
                }
            }


            // Count assessors for each NEC Detail in this university
            $detail_counts_uni = [];
            foreach ($nec_detail as $detail) {
                $detail_counts_uni[$detail->nd_id] = $this->asrNECMapping_model
                    ->select('assessor.asr_id')
                    ->join('assessor', 'assessor.asr_id = asr_nec_mapping.anm_asr_id')
                    ->where('anm_nd_id', $detail->nd_id)
                    ->where('assessor.asr_qu_id', $user_university_id)
                    ->where('assessor.asr_deleted_at', null)
                    ->countAllResults();
            }

            // Sum up counts for each NEC Narrow (by its details)
            $narrow_counts_uni = [];
            foreach ($narrow as $nrrw) {
                $narrow_counts_uni[$nrrw->nn_id] = 0;
                foreach ($nec_detail as $detail) {
                    if ($detail->nd_nn_id == $nrrw->nn_id) {
                        $narrow_counts_uni[$nrrw->nn_id] += $detail_counts_uni[$detail->nd_id] ?? 0;
                    }
                }
            }
            
            return $this->response->setJSON([
                'success' => true,
                'data' => $narrow,
                'narrow_counts_uni' => $narrow_counts_uni,
                'narrow_counts' => $narrow_counts,
                'csrf_token' => csrf_hash()
            ]);
        }
        return $this->response->setJSON(['success' => false]);
    }

    public function get_nec_detail()
    {
        if ($this->request->isAJAX()) {
            $user_id = $this->session->get('user_id');
            $user = $this->MPQUA_model->find($user_id);
            $user_university_id = $user ? $user->mpq_qu_id : null;
            $narrow_id = $this->request->getPost('narrow_id');

            if (empty($narrow_id)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Missing narrow_id'
                ]);
            }

            $detail = $this->NECDetail_model->where('nd_nn_id', $narrow_id)->findAll();
            $detail_counts = [];

            foreach ($detail as $row) {
                $detail_counts[$row->nd_id] = $this->asrNECMapping_model
                    ->where('anm_nd_id', $row->nd_id)
                    ->countAllResults();
            }

            $detail_counts_uni = [];
            foreach ($detail as $row) {
                $detail_counts_uni[$row->nd_id] = $this->asrNECMapping_model
                    ->select('assessor.asr_id')
                    ->join('assessor', 'assessor.asr_id = asr_nec_mapping.anm_asr_id')
                    ->where('anm_nd_id', $row->nd_id)
                    ->where('assessor.asr_qu_id', $user_university_id)
                    ->where('assessor.asr_deleted_at', null)
                    ->countAllResults();
            }

            return $this->response->setJSON([
                'success' => true,
                'data' => $detail,
                'counts' => $detail_counts,
                'counts_uni' => $detail_counts_uni,
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
        $asr_title_desc         = $this->request->getPost('asr_title_desc');

        $asr_path = null;
        $imgFile = $this->request->getFile('asr_image');
        if ($imgFile && $imgFile->isValid() && !$imgFile->hasMoved()) {
            $newImgName = uniqid('img_') . '.' . $imgFile->getExtension();
            $uploadImgPath = FCPATH . 'uploads/assessors/images/';
            if (!is_dir($uploadImgPath)) {
                mkdir($uploadImgPath, 0777, true);
            }
            $imgFile->move($uploadImgPath, $newImgName);
            $asr_path = 'uploads/assessors/images/' . $newImgName;
        }

        // --- Handle file upload ---
        $cvPath = null;
        $cvFile = $this->request->getFile('asr_cv');
        if ($cvFile && $cvFile->isValid() && !$cvFile->hasMoved()) {
            $newCvName = uniqid('cv_') . '.' . $cvFile->getExtension();
            $uploadCvPath = FCPATH . 'uploads/assessors/cv/';
            if (!is_dir($uploadCvPath)) {
                mkdir($uploadCvPath, 0777, true);
            }
            $cvFile->move($uploadCvPath, $newCvName);
            $cvPath = 'uploads/assessors/cv/' . $newCvName;
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
            'asr_image'           => $asr_path, // Save path to DB
            'asr_title_desc'      => $asr_title_desc,
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

        if (!empty($assessor->asr_image)) {
            $imgFullPath = FCPATH . $assessor->asr_image;
            if (file_exists($imgFullPath)) {
                @unlink($imgFullPath);
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
            ->select('expertise_field.ef_id, expertise_field.ef_desc')
            ->join('qvc_upsi.expertise_field', 'expertise_field.ef_id = assessor_expertise_field.aef_ef_id', 'left')
            ->where('aef_asr_id', $asr_id)
            ->findAll();
        $assessor->expertise_list = $expertise;

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
        $asr_title_desc        = $this->request->getPost('asr_title_desc');
        $asr_name              = $this->request->getPost('asr_name');
        $asr_phone             = $this->request->getPost('asr_phone');
        $asr_fax               = $this->request->getPost('asr_fax');
        $asr_email             = $this->request->getPost('asr_email');
        $asr_service_address   = $this->request->getPost('asr_service_address');
        $asr_retirement_date   = $this->request->getPost('asr_retirement_date');
        $expertise             = $this->request->getPost('expertise');
        $nec_detail_id         = $this->request->getPost('nec_detail');
        $asr_type              = $this->request->getPost('asr_type');

        // --- Handle file upload ---
        $cvPath = null;
        $cvFile = $this->request->getFile('asr_cv');
        if ($cvFile && $cvFile->isValid() && !$cvFile->hasMoved()) {
            $newCvName = uniqid('cv_') . '.' . $cvFile->getExtension();
            $uploadCvPath = FCPATH . 'uploads/assessors/cv/';
            if (!is_dir($uploadCvPath)) {
                mkdir($uploadCvPath, 0777, true);
            }
            $cvFile->move($uploadCvPath, $newCvName);
            $cvPath = 'uploads/assessors/cv/' . $newCvName;
        } else {
            // Keep old path if no new file uploaded
            $cvPath = $this->assessor_model->find($assessor_id)->asr_cv_path ?? null;
        }

        $imgPath = null;
        $imgFile = $this->request->getFile('asr_image');
        if ($imgFile && $imgFile->isValid() && !$imgFile->hasMoved()) {
            $newImgName = uniqid('cv_') . '.' . $imgFile->getExtension();
            $uploadImgPath = FCPATH . 'uploads/assessors/images/';
            if (!is_dir($uploadImgPath)) {
                mkdir($uploadImgPath, 0777, true);
            }
            $imgFile->move($uploadImgPath, $newImgName);
            $imgPath = 'uploads/assessors/images/' . $newImgName;
        } else {
            // Keep old path if no new file uploaded
            $imgPath = $this->assessor_model->find($assessor_id)->asr_image ?? null;
        }

        // Update main assessor data
        $data = [
            'asr_title_desc'      => $asr_title_desc,
            'asr_name'            => $asr_name,
            'asr_phone'           => $asr_phone,
            'asr_fax'             => $asr_fax,
            'asr_email'           => $asr_email,
            'asr_service_address' => $asr_service_address,
            'asr_retirement_date' => $asr_retirement_date,
            'asr_cv_path'         => $cvPath,
            'asr_image'           => $imgPath,
            'asr_type'            => $asr_type,
        ];

        $this->assessor_model->update($assessor_id, $data);

        // --- Update expertise ---
        // Remove all old expertise for this assessor
        $this->assessorExpertiseModel->where('aef_asr_id', $assessor_id)->delete();

        // Insert new expertise
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

    public function necAssessorFilterUni()
    {
        $nec_broad = $this->NECBroad_model->findAll();
        $nec_narrow = $this->NECNarrow_model->findAll();
        $nec_detail = $this->NECDetail_model->findAll();

        $user_id = $this->session->get('user_id');
        $user = $this->MPQUA_model->find($user_id);
        $user_university_id = $user ? $user->mpq_qu_id : null;

        // 1. Count assessors for each NEC Detail (filtered by university)
        $detail_counts = [];
        foreach ($nec_detail as $detail) {
            $detail_counts[$detail->nd_id] = $this->asrNECMapping_model
                ->select('assessor.asr_id')
                ->join('assessor', 'assessor.asr_id = asr_nec_mapping.anm_asr_id')
                ->where('anm_nd_id', $detail->nd_id)
                ->where('assessor.asr_qu_id', $user_university_id)
                ->where('assessor.asr_deleted_at', null)
                ->countAllResults();
        }

        // 2. Sum up counts for each NEC Narrow (by its details)
        $narrow_counts = [];
        foreach ($nec_narrow as $narrow) {
            $narrow_counts[$narrow->nn_id] = 0;
            foreach ($nec_detail as $detail) {
                if ($detail->nd_nn_id == $narrow->nn_id) {
                    $narrow_counts[$narrow->nn_id] += $detail_counts[$detail->nd_id] ?? 0;
                }
            }
        }

        // 3. Sum up counts for each NEC Broad (by its narrows)
        $broad_counts = [];
        foreach ($nec_broad as $broad) {
            $broad_counts[$broad->nb_id] = 0;
            foreach ($nec_narrow as $narrow) {
                if ($narrow->nn_nb_id == $broad->nb_id) {
                    $broad_counts[$broad->nb_id] += $narrow_counts[$narrow->nn_id] ?? 0;
                }
            }
        }

        $data = [
            'nec_broad' => $nec_broad,
            'nec_narrow' => $nec_narrow,
            'nec_detail' => $nec_detail,
            'detail_counts' => $detail_counts,
            'narrow_counts' => $narrow_counts,
            'broad_counts' => $broad_counts,
        ];

        return $this->render_mpqua('necPageUni', $data);
    }

    public function get_assessors_by_nec_detail_uni()
    {
        $user_id = $this->session->get('user_id');
        $user = $this->MPQUA_model->find($user_id);
        $user_university_id = $user ? $user->mpq_qu_id : null;

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
                ->where('asr_qu_id', $user_university_id)
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

}

