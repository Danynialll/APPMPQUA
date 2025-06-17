<?php

use App\Modules\AppMPQUA\Controllers\AppMPQUAController;
use App\Modules\AppMPQUA\Controllers\MPQUA_UniController;

//Portfolio Route Groups
$routes->group('appmpqua', function ($routes) {

    $routes->get('viewAll',                 [AppMPQUAController::class,      'viewAll']);

    $routes->get('viewUni',                 [MPQUA_UniController::class,     'viewUni']);
    $routes->post('get_nec_narrow',         [MPQUA_UniController::class,     'get_nec_narrow']);
    $routes->post('get_nec_detail',         [MPQUA_UniController::class,     'get_nec_detail']);
    $routes->post('get_expertise_list',     [MPQUA_UniController::class,     'get_expertise_list']);
    $routes->post('createAssessor',         [MPQUA_UniController::class,     'createAssessor']);
    $routes->post('editAssessor',           [MPQUA_UniController::class,     'editAssessor']);
    $routes->post('deleteAssessor/(:num)',  [MPQUA_UniController::class,     'deleteAssessor/$1']);
    $routes->get('get_assessor/(:num)',     [MPQUA_UniController::class,     'getAssessor/$1']);
    
    $routes->get('necFilter',               [MPQUA_UniController::class,     'necAssessorFilter']);
    $routes->post('get_assessors_by_nec_detail', [MPQUA_UniController::class, 'get_assessors_by_nec_detail']);

});
