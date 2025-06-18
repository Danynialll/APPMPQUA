<?php

namespace App\Modules\AppMPQUA\Controllers;

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

    public function __construct()
    {
        $this->assessor_model                   = new AssessorModel();
        $this->assessorExpertiseModel           = new AssessorExpertiseFieldModel();
        $this->expertise_model                  = new ExpertiseFieldModel();
        $this->asrNECMapping_model              = new AsrNECMappingModel();
        $this->NECBroad_model                  = new NECBroadModel();
        $this->NECNarrow_model                  = new NECNarrowModel();
        $this->NECDetail_model                  = new NECDetailModel();
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
