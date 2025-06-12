<?php

namespace App\Modules\QvcAdmin\Controllers;

use App\Models\AssessorModel;
use App\Controllers\BaseController;
use App\Models\ExpertiseFieldModel;
use App\Models\AssessorExpertiseFieldModel;

class QvcAdminAssessorController extends BaseController
{
    // Assessor
    protected $assessor_model;
    protected $assessor_expertise_model;
    protected $expertise_model;

    public function __construct()
    {
        $this->session = service('session');
        // Assessor model
        $this->assessor_model                 = new AssessorModel();
        $this->assessor_expertise_model       = new AssessorExpertiseFieldModel();
        $this->expertise_model                = new ExpertiseFieldModel();
    }

    public function assessors_list()
    {
        $assessor_info = $this->assessor_model->findAll();

        // foreach assessor info, get their expertise
        foreach ($assessor_info as $key => $assessor) {
            // Get expertise for each assessor
            $expertise = $this->assessor_expertise_model
                ->where('aef_asr_id', $assessor->asr_id)
                ->findAll();  // This will fetch the expertise fields associated with the assessor

            // Assign expertise to the assessor info (using object notation to access)
            $assessor_info[$key]->expertise = $expertise;
        }

        $data = [
            'assessor_info' => $assessor_info
        ];

        $this->render_admin('samc\assessor_list', $data);
    }
}
