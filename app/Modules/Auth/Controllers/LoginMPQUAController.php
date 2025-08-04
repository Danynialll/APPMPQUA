<?php

namespace App\Modules\Auth\Controllers;

use App\Models\MPQUAModel;
use App\Models\AuthUserModel;
use App\Controllers\BaseController;

class LoginMPQUAController extends BaseController
{
    // User Authentication
    protected $auth_user_model;
    //MPQUA
    protected $MPQUA_model;

    public function __construct()
    {
        $this->session = service('session');
        // Auth User model
        $this->auth_user_model                = new AuthUserModel();
        $this->MPQUA_model                    = new MPQUAModel();

    }


    public function sign_in_MPQUA()
    {
        $data = [
            'title'    => 'mpqua'
        ];
        $this->render_auth('appmpqua/sign_in', $data);
    }



    public function attempt_login_MPQUA()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Check if the user exists
        $user = $this->auth_user_model->where('au_username', $username)->first();

        if ($user) {
            // Verify the password
            if (password_verify($password, $user->au_password)) {
                if ($user->au_type == 'mpqua') {
                    $mpqua = $this->MPQUA_model->where('mpq_id', $user->au_user_id)->first();
                    $this->session->set([
                        'user'   => $user,
                        'user_id'   => $mpqua->mpq_id,
                        'user_name'   => $mpqua->mpq_address,
                        'mpq_qu_id' => $mpqua->mpq_qu_id,
                        'logged_in' => true,
                    ]);
                    $this->session->setFlashdata('success', 'Login successful!');
                    return redirect()->to('appmpqua/profile'); // Redirect to the dashboard
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
