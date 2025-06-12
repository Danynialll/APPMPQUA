<?php

namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{

    public function __construct()
    {
        $this->session = service('session');
    }

    public function profile()
    {
        $data = [];
        $this->render('profile', $data);
    }
}
