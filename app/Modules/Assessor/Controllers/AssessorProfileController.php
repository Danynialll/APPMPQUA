<?php

namespace App\Modules\Assessor\Controllers;

use App\Models\AssessorModel;
use App\Models\NECBroadModel;
use App\Models\NECDetailModel;
use App\Models\NECNarrowModel;
use App\Models\AsrNECMappingModel;
use App\Controllers\BaseController;
use App\Models\ExpertiseFieldModel;
use App\Models\AssessorExpertiseFieldModel;

class AssessorProfileController extends BaseController
{
    // Assessor
    protected $assessor_model;
    protected $assessor_expertise_model;
    protected $expertise_model;
    protected $nec_broad_model;
    protected $nec_narrow_model;
    protected $nec_detail_model;
    protected $asr_nec_mapping_model;

    public function __construct()
    {
        $this->session = service('session');
        // Assessor model
        $this->assessor_model                 = new AssessorModel();
        $this->assessor_expertise_model       = new AssessorExpertiseFieldModel();
        $this->expertise_model                = new ExpertiseFieldModel();
        $this->nec_broad_model                = new NECBroadModel();
        $this->nec_narrow_model               = new NECNarrowModel();
        $this->nec_detail_model               = new NECDetailModel();
        $this->asr_nec_mapping_model          = new AsrNECMappingModel();
    }

    public function profile()
    {
        $asr_id = session()->get('user_id');

        // Fecth user data
        $assessor_info = $this->assessor_model->where('asr_id', $asr_id)->first();
        $assessor_expertise = $this->assessor_expertise_model
            ->select('assessor_expertise_field.aef_id, expertise_field.ef_desc')
            ->join('qvc_upsi.expertise_field', 'expertise_field.ef_id = assessor_expertise_field.aef_ef_id', 'left')
            ->where('aef_asr_id', $asr_id)
            ->findAll();

        // Fetch Expertise list from expertise table
        $expertise_list = $this->expertise_model->findAll();

        // Fetch NEC Broad, Narrow, and Detail
        $nec_broad = $this->nec_broad_model->findAll();
        $nec_narrow = $this->nec_narrow_model->findAll();
        $nec_detail = $this->nec_detail_model->findAll();
        $nec_display = $this->asr_nec_mapping_model->where('anm_asr_id', $asr_id)->findAll();

        // Get provider details from the session
        $data = [
            'assessor_info'         => $assessor_info,
            'assessor_expertise'    => $assessor_expertise,
            'expertise_list'        => $expertise_list,
            'nec_broad'            => $nec_broad,
            'nec_narrow'           => $nec_narrow,
            'nec_detail'           => $nec_detail,
            'nec_display'          => $nec_display,
        ];

        $this->render_assessor('profile/view_profile', $data);
    }

    public function get_nec_narrow()
    {
        if ($this->request->isAJAX()) {
            $broad_id = $this->request->getPost('broad_id');
            $narrow = $this->nec_narrow_model->where('nn_nb_id', $broad_id)->findAll();
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
            $detail = $this->nec_detail_model->where('nd_nn_id', $narrow_id)->findAll();
            return $this->response->setJSON([
                'success' => true,
                'data' => $detail,
                'csrf_token' => csrf_hash()
            ]);
        }
        return $this->response->setJSON(['success' => false]);
    }

    public function update_profile()
    {
        $asr_id = session()->get('user_id');

        $asr_phone            = $this->request->getPost('asr_phone');
        $asr_fax              = $this->request->getPost('asr_fax');
        $asr_email            = $this->request->getPost('asr_email');
        $asr_service_address  = $this->request->getPost('asr_service_address');
        $asr_retirement_date  = $this->request->getPost('asr_retirement_date');
        $expertise            = $this->request->getPost('expertise'); // Retrieves an array
        $nec_detail_id        = $this->request->getPost('nec_detail');

        // Update main profile info
        $assessor_info = [
            'asr_phone'           => $asr_phone,
            'asr_email'           => $asr_email,
            'asr_service_address' => $asr_service_address,
            'asr_fax'             => $asr_fax,
            'asr_retirement_date' => $asr_retirement_date,
        ];

        $this->assessor_model->update($asr_id, $assessor_info);

        // Filter out empty expertise values
        $expertise = array_filter($expertise, function ($value) {
            return trim($value) !== "";
        });

        // Insert new expertise records if available
        if (!empty($expertise) && is_array($expertise)) {
            $expertise_data = [];
            foreach ($expertise as $exp_id) {
                $expertise_data[] = [
                    'aef_asr_id' => $asr_id,
                    'aef_ef_id'  => $exp_id
                ];
            }

            if (!empty($expertise_data)) {
                $this->assessor_expertise_model->insertBatch($expertise_data);
            }
        }

        // Save NEC mapping (just add new, don't remove old)
        if (!empty($nec_detail_id)) {
            // Always treat as array for multiple support
            $nec_detail_ids = (array)$nec_detail_id;

            $nec_data = [];
            foreach ($nec_detail_ids as $nd_id) {
                if (trim($nd_id) !== "") {
                    $nec_data[] = [
                        'anm_asr_id' => $asr_id,
                        'anm_nd_id'  => $nd_id
                    ];
                }
            }
            if (!empty($nec_data)) {
                $this->asr_nec_mapping_model->insertBatch($nec_data);
            }
        }

        // Return a JSON response
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Profile updated successfully.'
        ]);
    }


    public function delete_expertise()
    {
        if ($this->request->isAJAX()) {
            $expertiseId = $this->request->getPost('id');

            if ($expertiseId) {
                $deleted = $this->assessor_expertise_model->delete($expertiseId, true); // Force hard delete

                return $this->response->setJSON([
                    'success' => $deleted ? true : false,
                    'csrf_token' => csrf_hash()
                ]);
            }
        }

        return $this->response->setJSON([
            'success' => false,
            'csrf_token' => csrf_hash()
        ]);
    }

    public function delete_nec()
    {
        if ($this->request->isAJAX()) {
            $necId = $this->request->getPost('id');

            if ($necId) {
                $deleted = $this->asr_nec_mapping_model->delete($necId, true); // Force hard delete

                return $this->response->setJSON([
                    'success' => $deleted ? true : false,
                    'csrf_token' => csrf_hash()
                ]);
            }
        }

        return $this->response->setJSON([
            'success' => false,
            'csrf_token' => csrf_hash()
        ]);
    }
}
