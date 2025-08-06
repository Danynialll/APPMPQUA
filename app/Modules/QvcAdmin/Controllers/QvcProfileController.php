<?php

namespace App\Modules\QvcAdmin\Controllers;

use App\Models\AssessorModel;
use App\Models\NECBroadModel;
use App\Models\NECDetailModel;
use App\Models\NECNarrowModel;
use App\Models\AsrNECMappingModel;
use App\Models\QvcUniversityModel;
use App\Controllers\BaseController;
use App\Models\AssessorExpertiseFieldModel;
use App\Models\ExpertiseFieldModel;

class QvcProfileController extends BaseController
{

    protected $session;
    protected $assessor_model;
    protected $QVC_University_model;
    protected $NECDetail_model;
    protected $asrNECMapping_model;
    protected $expertise_model;
    protected $NECBroad_model;
    protected $NECNarrow_model;
    protected $assessorExpertiseModel;

    public function __construct()
    {
        $this->session = service('session');
        $this->assessor_model = new AssessorModel();
        $this->NECDetail_model = new NECDetailModel();
        $this->asrNECMapping_model = new AsrNECMappingModel();
        $this->QVC_University_model = new QvcUniversityModel();
        $this->expertise_model = new ExpertiseFieldModel();
        $this->NECBroad_model = new NECBroadModel();
        $this->NECNarrow_model = new NECNarrowModel();
        $this->assessorExpertiseModel = new AssessorExpertiseFieldModel();
    }

    public function adminDashboard()
    {
        $now = date('Y-m-d');

        $male_assessors = $this->assessor_model
            ->where('asr_gender', 'Male')
            ->countAllResults();
        $female_assessors = $this->assessor_model
            ->where('asr_gender', 'Female')
            ->countAllResults();
        $active_assessors = $this->assessor_model
            ->groupStart()
                ->where('asr_retirement_date IS NULL')
                ->orWhere('asr_retirement_date >', $now)
            ->groupEnd()
            ->countAllResults();
        $retired_assessors = $this->assessor_model
            ->groupStart()
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

        $university_list = $this->QVC_University_model->where('qu_type', 'Public University')->findAll();
        foreach ($university_list as $uni) {
            $count = $this->assessor_model
                ->where('asr_qu_id', $uni->qu_id)
                ->countAllResults();

            if ($count >= 0) {
                $uni_summary[] = [
                    'id' => $uni->qu_id,
                    'name' => $uni->qu_name,
                    'code' => $uni->qu_code,
                    'count' => $count,
                ];
            }
        }
        

        // Prepare data for view
        $data = [
            'university_list' => $university_list,
            'male_assessors' => $male_assessors,
            'female_assessors' => $female_assessors,
            'active_assessors' => $active_assessors,
            'retired_assessors' => $retired_assessors,
            'nec_counts' => $nec_counts,
            'uni_summary' => $uni_summary,
        ];


        $this->render_admin('dashboard/adminDashboard', $data);
    }

    public function filterData()
    {
        $qu_id = $this->request->getPost('qu_id');

        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false]);
        }

        $now = date('Y-m-d');
        $qu_id = $this->request->getPost('qu_id');

        // Use fresh model instances to avoid query carryover
        $male_assessors = (new \App\Models\AssessorModel())
            ->where('asr_gender', 'Male')
            ->when($qu_id, fn($q) => $q->where('asr_qu_id', $qu_id))
            ->countAllResults();

        $female_assessors = (new \App\Models\AssessorModel())
            ->where('asr_gender', 'Female')
            ->when($qu_id, fn($q) => $q->where('asr_qu_id', $qu_id))
            ->countAllResults();

        $active_assessors = (new \App\Models\AssessorModel())
            ->groupStart()
                ->where('asr_retirement_date IS NULL')
                ->orWhere('asr_retirement_date >', $now)
            ->groupEnd()
            ->when($qu_id, fn($q) => $q->where('asr_qu_id', $qu_id))
            ->countAllResults();

        $retired_assessors = (new \App\Models\AssessorModel())
            ->groupStart()
                ->where('asr_retirement_date IS NOT NULL')
                ->where('asr_retirement_date <=', $now)
            ->groupEnd()
            ->when($qu_id, fn($q) => $q->where('asr_qu_id', $qu_id))
            ->countAllResults();

        // NEC counts
        $nec_counts = [];
        $nec_details = $this->NECDetail_model->findAll();
        foreach ($nec_details as $nec) {
            $assessor_ids = $this->asrNECMapping_model
                ->select('anm_asr_id')
                ->where('anm_nd_id', $nec->nd_id)
                ->findAll();

            $ids = array_column($assessor_ids, 'anm_asr_id');

            if (!empty($ids)) {
                $builder = (new \App\Models\AssessorModel())
                    ->whereIn('asr_id', $ids);

                if ($qu_id) {
                    $builder->where('asr_qu_id', $qu_id);
                }

                $count = $builder->countAllResults();

                if ($count > 0) {
                    $nec_counts[] = [
                        'nec_code' => $nec->nd_code,
                        'nec_name' => $nec->nd_name,
                        'count'    => $count,
                    ];
                }
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'male' => $male_assessors,
            'female' => $female_assessors,
            'active' => $active_assessors,
            'retired' => $retired_assessors,
            'nec_labels' => array_column($nec_counts, 'nec_code'),
            'nec_counts' => array_column($nec_counts, 'count'),
            'csrfHash' => csrf_hash()
        ]);
    }

    public function assessors_list()
    {
        $qu_id = $this->request->getPost('qu_id');

        if (!$qu_id) {
            return redirect()->back()->with('error', 'University ID is required.');
        }

        $expertise_list = $this->expertise_model->findAll();
        $nec_broad = $this->NECBroad_model->findAll();
        $nec_narrow = $this->NECNarrow_model->findAll();
        $nec_detail = $this->NECDetail_model->findAll();

        $totalAssessors = $this->assessor_model
            ->where('asr_qu_id', $qu_id)
            ->where('asr_deleted_at', null)
            ->countAllResults();
        $maleAssessors = $this->assessor_model
            ->where('asr_gender', 'Male')
            ->where('asr_qu_id', $qu_id)
            ->where('asr_deleted_at', null)
            ->countAllResults();
        $femaleAssessors = $this->assessor_model
            ->where('asr_gender', 'Female')
            ->where('asr_qu_id', $qu_id)
            ->where('asr_deleted_at', null)
            ->countAllResults();

        // Filter assessors by the same university and exclude soft-deleted
        $builder = $this->assessor_model->table('assessor');
        $builder->select('assessor.*, qvc_university.qu_name');
        $builder->join('qvc_university', 'qvc_university.qu_id = assessor.asr_qu_id', 'left');
        if ($qu_id) {
            $builder->where('assessor.asr_qu_id', $qu_id);
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
            'qu_name'              => get_university_name($qu_id),
            'qu_id'                => $qu_id,
        ];

        session()->set('assessors_data', $data);
        return redirect()->to(base_url('qvcAdmin/adminDashboard/assessors_list_page'));
    }

    public function assessors_list_page()
    {
        $data = session()->get('assessors_data');
        if (!$data) {
            return redirect()->to('/dashboard')->with('error', 'No data available.');
        }
        $this->render_admin('dashboard\assessors_list', $data);
    }


}
