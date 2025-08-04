<?php

namespace App\Modules\QvcAdmin\Controllers;

use App\Models\AssessorModel;
use App\Models\NECDetailModel;
use App\Models\AsrNECMappingModel;
use App\Models\QvcUniversityModel;
use App\Controllers\BaseController;

class QvcProfileController extends BaseController
{

    protected $session;
    protected $assessor_model;
    protected $QVC_University_model;
    protected $NECDetail_model;
    protected $asrNECMapping_model;

    public function __construct()
    {
        $this->session = service('session');
        $this->assessor_model = new AssessorModel();
        $this->NECDetail_model = new NECDetailModel();
        $this->asrNECMapping_model = new AsrNECMappingModel();
        $this->QVC_University_model = new QvcUniversityModel();
    }

    public function profile()
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

        $universities = $this->QVC_University_model->findAll();
        $university_list = $this->QVC_University_model->where('qu_type', 'Public University')->findAll();
        $uni_labels = [];
        $uni_data = [];
        foreach ($universities as $uni) {
            $count = $this->assessor_model->where('asr_qu_id', $uni->qu_id)->countAllResults();
            if ($count > 0) {
                $uni_labels[] = $uni->qu_code; // Use qu_code instead of qu_name
                $uni_data[] = $count;
            }
        }
        

        // Prepare data for view
        $data = [
            'male_assessors' => $male_assessors,
            'female_assessors' => $female_assessors,
            'active_assessors' => $active_assessors,
            'retired_assessors' => $retired_assessors,
            'nec_counts' => $nec_counts,
            'university_list' => $university_list,
            'uni_labels' => $uni_labels,
            'uni_data' => $uni_data,
        ];


        $this->render_admin('profile', $data);
    }
}
