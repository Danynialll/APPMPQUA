<?php

namespace App\Modules\Auth\Controllers;

use App\Models\MPQUAModel;
use App\Models\AssessorModel;
use App\Models\AuthUserModel;
use App\Models\ProviderModel;
use App\Models\QvcAdminModel;
use App\Controllers\BaseController;
use App\Models\AssessorExpertiseFieldModel;

class LoginController extends BaseController
{
    // User Authentication
    protected $auth_user_model;
    // Assessor
    protected $assessor_model;
    protected $assessor_expertise_model;

    // Qvc Admin
    protected $qvc_admin;

    // Provider
    protected $provider_model;

    //MPQUA
    protected $MPQUA_model;

    public function __construct()
    {
        $this->session = service('session');
        // Auth User model
        $this->auth_user_model                = new AuthUserModel();
        // Assessor model
        $this->assessor_model                 = new AssessorModel();
        // Provider model
        $this->provider_model                 = new ProviderModel();
        // Qvc Admin model
        $this->qvc_admin                      = new QvcAdminModel();
        $this->assessor_expertise_model       = new AssessorExpertiseFieldModel();
        // MPQUA model
        $this->MPQUA_model                    = new MPQUAModel();

    }

    public function sign_in()
    {
        // Fetch All Available Field
        $samc_field = $this->assessor_expertise_model
            ->select('DISTINCT ON (aef_ef_id) aef_ef_id, ef_desc')
            ->join('qvc_upsi.expertise_field', 'expertise_field.ef_id = assessor_expertise_field.aef_ef_id', 'left')
            ->orderBy('aef_ef_id, ef_desc') // Ensures consistent selection
            ->findAll();

        $data = [
            'samc_field'    => $samc_field
        ];
        $this->render_auth('sign_in', $data);
    }

    public function attempt_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Check if the user exists
        $user = $this->auth_user_model->where('au_username', $username)->first();

        if ($user) {
            // Verify the password
            if (password_verify($password, $user->au_password)) {

                // check if user is provider or assessor
                if ($user->au_type == 'assessor') {
                    $assessor = $this->assessor_model->where('asr_id', $user->au_user_id)->first();
                    $this->session->set([
                        'user_id'   => $assessor->asr_id,
                        'user_name'   => $assessor->asr_name,
                        'logged_in' => true,

                    ]);
                    $this->session->setFlashdata('success', 'Login successful!');
                    return redirect()->to('assessor/dashboard'); // Redirect to the dashboard




                } elseif ($user->au_type == 'provider') {
                    $provider = $this->provider_model->where('pvd_id', $user->au_user_id)->first();
                    $this->session->set([
                        'user_id'   => $provider->pvd_id,
                        'user_name'   => $provider->pvd_name,
                        'logged_in' => true,

                    ]);
                    $this->session->setFlashdata('success', 'Login successful!');
                    return redirect()->to('provider/dashboard'); // Redirect to the dashboard



                    
                } elseif ($user->au_type == 'mpqua') {
                    $mpqua = $this->MPQUA_model->where('mpq_id', $user->au_user_id)->first();
                    $this->session->set([
                        'user_id'   => $mpqua->mpq_id,
                        'user_name'   => $mpqua->mpq_address,
                        'logged_in' => true,

                    ]);
                    $this->session->setFlashdata('success', 'Login successful!');
                    return redirect()->to('appmpqua/viewUniNew'); // Redirect to the dashboard
                } elseif ($user->au_type == 'admin') {
                    $admin = $this->qvc_admin->where('qa_id', $user->au_user_id)->first();
                    $this->session->set([
                        'user_id'   => $admin->qa_id,
                        'user_name'   => $admin->qa_name,
                        'logged_in' => true,

                    ]);
                    $this->session->setFlashdata('success', 'Login successful!');
                    // Check admin level
                    if ($admin->qa_level == 'super_admin') {
                        return redirect()->to('qvcSuperAdmin/dashboard'); // Redirect to the dashboard
                    } elseif ($admin->qa_level == 'admin') {
                        return redirect()->to('qvcAdmin/dashboard'); // Redirect to the dashboard
                    }
                }
            } else {
                $this->session->setFlashdata('error', 'Invalid password.');
                return redirect()->back();
            }
        } else {
            $this->session->setFlashdata('error', 'User not found.');
            return redirect()->back();
        }
    }
}
