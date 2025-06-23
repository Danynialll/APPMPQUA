<?php

namespace App\Modules\QvcAdmin\Controllers;

use App\Models\MPQUAModel;
use App\Models\AssessorModel;
use App\Models\AuthUserModel;
use App\Models\QvcUniversityModel;
use App\Controllers\BaseController;

class QvcAdminMPQUAController extends BaseController
{

    protected $session;
    protected $authUser_model;
    protected $assessor_model;
    protected $QVC_University_model;
    protected $MPQUA_model;

    public function __construct()
    {
        $this->session = service('session');
        $this->authUser_model = new AuthUserModel();
        $this->assessor_model = new AssessorModel();
        $this->QVC_University_model = new QvcUniversityModel();
        $this->MPQUA_model = new MPQUAModel();
    }

    public function list()
    {
        $total_users = $this->authUser_model
            ->where('au_type', 'mpqua')
            ->countAllResults();
        $total_assessors = $this->assessor_model
            ->countAllResults();

        // Get all universities
        $university_list = $this->QVC_University_model->where('qu_type', 'Public University')->findAll();

        // Get all used university IDs from auth_user where au_type is 'mpqua'
        $used_university_ids = $this->authUser_model
            ->select('au_qu_id')
            ->where('au_type', 'mpqua')
            ->findAll();

        $used_ids = array_map(function($row) {
            return $row->au_qu_id;
        }, $used_university_ids);

        // Filter out universities that are already used
        $filtered_university_list = array_filter($university_list, function($uni) use ($used_ids) {
            return !in_array($uni->qu_id, $used_ids);
        });

        // join auth_user and qvc_university
        $mpqua_list = $this->authUser_model
            ->select('qvc_upsi.auth_user.*, qvc_upsi.qvc_university.qu_id, qvc_upsi.qvc_university.qu_code, qvc_upsi.qvc_university.qu_name')
            ->join('qvc_upsi.qvc_university', 'qvc_upsi.auth_user.au_qu_id = qvc_upsi.qvc_university.qu_id', 'left')
            ->where('au_type', 'mpqua')
            ->findAll();

        // count each assessor in a university
        $mpqua_count = [];
        foreach ($mpqua_list as $mpqua) {
            $mpqua_id = $mpqua->qu_id;
            $assessor_count = $this->assessor_model->where('asr_qu_id', $mpqua_id)->countAllResults();
            $mpqua_count[] = [
                'au_id' => $mpqua->au_id,
                'qu_id' => $mpqua_id,
                'qu_code' => $mpqua->qu_code,
                'qu_name' => $mpqua->qu_name,
                'au_username' => $mpqua->au_username,
                'au_password' => $mpqua->au_password,
                'assessor_count' => $assessor_count,
                'au_plain_password' => $mpqua->au_plain_password,
            ];
        }

        $data = [
            'university_list' => $filtered_university_list,
            'mpqua_list' => $mpqua_list,
            'mpqua_count' => $mpqua_count,
            'total_assessors'    => $total_assessors,
            'total_users'        => $total_users,
        ];

        $this->render_admin('mpqua/list', $data);
    }

    public function getMPQ($mpq_id){
        $mpq_id = $this->request->getPost('mpq_id');

        if (!$mpq_id) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'MPQ ID is required.',
                'csrf_token' => csrf_hash()
            ]);
        }

        $mpq = $this->MPQUA_model->find($mpq_id);

        if (!$mpq) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'MPQ not found.',
                'csrf_token' => csrf_hash()
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'data' => $mpq,
            'csrf_token' => csrf_hash()
        ]);
    }

    public function addUser(){
        $au_qu_id               = $this->request->getPost('au_qu_id');
        $au_username            = $this->request->getPost('au_username');
        $au_password            = $this->request->getPost('au_password');

        $mpq_address = $this->request->getPost('mpq_address');
        $mpq_email = $this->request->getPost('mpq_email');
        $mpq_phone = $this->request->getPost('mpq_phone');

        $data = [
            'au_user_id'          => $au_qu_id,
            'au_qu_id'            => $au_qu_id,
            'au_username'         => $au_username,
            'au_password'         => password_hash($au_password, PASSWORD_BCRYPT), // Hash the password
            'au_type'             => 'mpqua',
            'au_plain_password'   => $au_password, // Store plain password for display purposes
        ];

        $mpqData = [
            'mpq_address'    => $mpq_address,
            'mpq_email'      => $mpq_email,
            'mpq_phone'      => $mpq_phone,
            'mpq_qu_id'      => $au_qu_id,
        ];

        $this->authUser_model->insert($data);
        $this->MPQUA_model->insert($mpqData);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'MPQ added successfully.',
            'csrf_token' => csrf_hash()
        ]);
    }

    public function editUser()
    {
        $au_id                  = $this->request->getPost('au_id');
        $au_username            = $this->request->getPost('au_username');
        $au_password            = $this->request->getPost('au_password');

        if (!$au_password) {
            $data = [
                'au_username' => $au_username,
            ];
        }else{
            $data = [
                'au_username' => $au_username,
                'au_password' => password_hash($au_password, PASSWORD_BCRYPT), // Hash the password
                'au_plain_password' => $au_password, // Store plain password for display purposes
            ];
        }

        $this->authUser_model->update($au_id, $data);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'User updated successfully.'
        ]);
    }

    public function deleteUser($id){
        $authUser = $this->authUser_model->find($id);
        if (!$authUser) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'User not found.'
            ]);
        }

        $university_id = $authUser->au_qu_id;

        $this->authUser_model->delete($id);
        $this->MPQUA_model->where('mpq_qu_id', $university_id)->delete();

        return $this->response->setJSON([
            'success' => true,
            'message' => 'User deleted successfully.'
        ]);
    }
}
