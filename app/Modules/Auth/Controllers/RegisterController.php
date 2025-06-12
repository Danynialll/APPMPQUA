<?php

namespace App\Modules\Auth\Controllers;

use App\Models\AssessorModel;
use App\Models\AuthUserModel;
use App\Models\ProviderModel;
use App\Controllers\BaseController;
use App\Models\AssessorExpertiseFieldModel;
use App\Models\QvcUniversityModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class RegisterController extends BaseController
{
    // User Authentication
    protected $auth_user_model;
    // Assessor
    protected $assessor_model;
    protected $assessor_expertise_model;

    // Provider
    protected $provider_model;

    // IPT List
    protected $ipt_model;

    public function __construct()
    {

        $this->session = service('session');
        // Auth User model
        $this->auth_user_model                = new AuthUserModel();
        // Assessor model
        $this->assessor_model                 = new AssessorModel();
        $this->assessor_expertise_model       = new AssessorExpertiseFieldModel();
        // Provider model
        $this->provider_model                 = new ProviderModel();
        // IPT model
        $this->ipt_model                      = new QvcUniversityModel();
    }

    public function register_provider()
    {
        $data = [];
        $this->render_auth('register_provider', $data);
    }

    public function register_assessor()
    {
        // get IPT list
        $ipt_list = $this->ipt_model->findAll();
        $data = [
            'ipt_list' => $ipt_list
        ];
        $this->render_auth('register_assessor', $data);
    }

    public function attempt_register_assessor()
    {

        // Validate the request
        $validation = \Config\Services::validation();

        $validation->setRules([
            // 'title'      => 'required',
            'fullName'          => 'required|string|max_length[255]',
            'phone'             => 'required|string|max_length[15]',
            'university'        => 'required|string',
            'gender'            => 'required|string',
            'service_address'   => 'required|string',
            'username'          => 'required|string',
            // 'dob'        => 'required|valid_date',
            'email'             => 'required|valid_email|max_length[255]',
            'password'          => 'required|min_length[8]',
        ]);


        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('errors', $validation->getErrors())->withInput();
        }

        // ✅ Check if the email already exists before inserting
        $existingUser = $this->assessor_model->where('asr_email', $this->request->getPost('email'))->first();

        if ($existingUser) {
            session()->setFlashdata('error', 'Email already exists! Please use a different email.');
            return redirect()->back()->withInput();
        }

        $data_assessor = [
            'asr_name'              => $this->request->getPost('fullName'),
            'asr_phone'             => $this->request->getPost('phone'),
            'asr_qu_id'             => $this->request->getPost('university'),
            'asr_service_address'   => $this->request->getPost('service_address'),
            'asr_email'             => $this->request->getPost('email'),
        ];

        // Save to the database
        if ($this->assessor_model->insert($data_assessor)) {

            $user_id = $this->assessor_model->getInsertID();

            $data_auth_user = [
                'au_user_id'    => $user_id,
                'au_type'       => 'assessor',
                'au_username'   => $this->request->getPost('username'),
                'au_password'   => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            ];

            // Save username and password
            if ($this->auth_user_model->insert($data_auth_user)) {
                session()->setFlashdata('success', 'Data inserted successfully!');
                return redirect()->to('/auth');
            } else {
                // Delete User data and return redirect back
                $this->assessor_model->delete($this->assessor_model->insertID());
                session()->setFlashdata('error', 'Failed to save user credentials. Please try again.');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Failed to save user. Please try again.');
            return redirect()->back();
        }
    }

    public function attempt_register_provider()
    {


        // Validate the request
        $validation = \Config\Services::validation();

        $validation->setRules([
            'pvd_name'          => 'required|string|max_length[255]',
            'pvd_ssm_number'    => 'required|string|max_length[15]',
            // 'pvd_ssm_cert'      => 'required',
            'pvd_type'          => 'required|string',
            'pvd_email'         => 'required|valid_email|max_length[255]',
            'pvd_address'       => 'required|string',
            'pvd_doe'           => 'required|valid_date',
            'pvd_phone'         => 'required|string',
            'username'          => 'required|string',
            'password'          => 'required|min_length[8]',
        ]);



        if (!$validation->withRequest($this->request)->run()) {
            $this->session->setFlashdata('error',  $validation->getErrors());
            return redirect()->back();
        }

        // Get the file from the post request
        $file = $this->request->getFile('pvd_ssm_cert');

        // Check if the file is uploaded successfully
        if ($file->isValid() && ! $file->hasMoved()) {
            // Generate a unique file name by appending a timestamp or random string
            $newName = time() . '_' . $file->getName(); // Example: append timestamp to original file name

            // Define the path where the file will be stored
            $filePath = FCPATH . 'uploads/pvd_cert/' . $newName; // FCPATH points to the public folder

            // Ensure the directory exists (create it if it doesn't)
            if (!is_dir(FCPATH . 'uploads/pvd_cert/')) {
                mkdir(FCPATH . 'uploads/pvd_cert/', 0755, true); // Create directory with appropriate permissions
            }

            // Move the uploaded file to the destination folder with the new name
            $file->move(FCPATH . 'uploads/pvd_cert/', $newName);

            // Store the relative path in the database
            $relativePath = 'uploads/pvd_cert/' . $newName;
        } else {
            // Handle the error, file not valid or already moved
            echo 'Error uploading file.';
        }

        $data_provider = [
            'pvd_name'          => $this->request->getPost('pvd_name'),
            'pvd_ssm_number'    => $this->request->getPost('pvd_ssm_number'),
            'pvd_ssm_cert'      => $relativePath,
            'pvd_type'          => $this->request->getPost('pvd_type'),
            'pvd_email'         => $this->request->getPost('pvd_email'),
            'pvd_address'       => $this->request->getPost('pvd_address'),
            'pvd_doe'           => $this->request->getPost('pvd_doe'),
            'pvd_phone'         => $this->request->getPost('pvd_phone'),
        ];

        try {
            // Insert provider data
            if (!$this->provider_model->insert($data_provider)) {
                session()->setFlashdata('error', 'Failed to save provider data. Please try again.');
                return redirect()->back()->withInput();
            }

            $user_id = $this->provider_model->getInsertID();

            $data_auth_user = [
                'au_user_id'    => $user_id,
                'au_type'       => 'provider', // Consider using a constant if applicable
                'au_username'   => $this->request->getPost('username'),
                'au_password'   => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            ];

            // Save username and password
            if ($this->auth_user_model->insert($data_auth_user)) {
                session()->setFlashdata('success', 'Data inserted successfully!');
                return redirect()->to('/auth');
            } else {
                // Delete provider entry if auth_user insert fails
                $this->provider_model->delete($user_id);
                session()->setFlashdata('error', 'Failed to save user credentials. Please try again.');
                return redirect()->back()->withInput();
            }
        } catch (DatabaseException $e) {
            // Handle duplicate key error
            if (strpos($e->getMessage(), 'duplicate key value') !== false) {
                session()->setFlashdata('error', 'The email address is already registered.');
            } else {
                session()->setFlashdata('error', 'An unexpected error occurred. Please try again.');
            }

            return redirect()->back()->withInput();
        }
    }
}
