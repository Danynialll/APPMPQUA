<?php

namespace App\Modules\QvcAdmin\Controllers;

use App\Controllers\BaseController;

class QvcAdminProviderController extends BaseController
{

    public function __construct()
    {
        $this->session = service('session');
    }

    public function providers_list()
    {
        $data = [];
        $this->render('samc\provider_list', $data);
    }
}
