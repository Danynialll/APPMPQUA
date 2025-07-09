<?php

namespace App\Modules\QvcAdmin\Controllers;

use App\Models\AssessorModel;
use App\Models\NECDetailModel;
use App\Models\AsrNECMappingModel;
use App\Controllers\BaseController;

class QvcProfileController extends BaseController
{

    protected $session;
    protected $authUser_model;
    protected $assessor_model;
    protected $QVC_University_model;
    protected $MPQUA_model;
    protected $NECDetail_model;
    protected $asrNECMapping_model;

    public function __construct()
    {
        $this->session = service('session');
        $this->assessor_model = new AssessorModel();
        $this->NECDetail_model = new NECDetailModel();
        $this->asrNECMapping_model = new AsrNECMappingModel();
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
        

        // Prepare data for view
        $data = [
            'male_assessors' => $male_assessors,
            'female_assessors' => $female_assessors,
            'active_assessors' => $active_assessors,
            'retired_assessors' => $retired_assessors,
            'nec_counts' => $nec_counts,
        ];


        $this->render_admin('profile', $data);
    }
}
