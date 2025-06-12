<?php

namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{

    public function __construct()
    {
        $this->session = service('session');
    }

    public function dashboard()
    {
        $data = [];
        $this->render('home', $data);
    }
    public function provider_dashboard()
    {
        $data = [];
        $this->render('provider_home', $data);
    }
}
