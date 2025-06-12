<?php

use App\Modules\QvcAdmin\Controllers\QvcAdminController;
use App\Modules\QvcAdmin\Controllers\QvcAdminSAMCController;
use App\Modules\QvcAdmin\Controllers\QvcAdminMPQUAController;
use App\Modules\QvcAdmin\Controllers\QvcAdminCourseController;
use App\Modules\QvcAdmin\Controllers\QvcAdminInvoiceController;
use App\Modules\QvcAdmin\Controllers\QvcAdminAssessorController;
use App\Modules\QvcAdmin\Controllers\QvcAdminProviderController;
use App\Modules\QvcAdmin\Controllers\QvcAdminNotificationController;


//Portfolio Route Groups
$routes->group('qvcAdmin', function ($routes) {

    $routes->group('samc', function ($routes) {
        $routes->get('samc_management',                     [QvcAdminSAMCController::class,       'samc_management']);
        $routes->get('set_reviewed_samc/(:any)',            [QvcAdminSAMCController::class,       'set_reviewed_samc/$1']);
        $routes->get('reviewed_samc',                       [QvcAdminSAMCController::class,       'reviewed_samc']);
    });

    $routes->group('invoice', function ($routes) {
        $routes->get('invoice_management',                  [QvcAdminInvoiceController::class,    'invoiceManagement']);
        $routes->get('fetch_invoice_details/(:any)',        [QvcAdminInvoiceController::class,    'fetchInvoiceDetails/$1']);
        $routes->get('view_invoice',                        [QvcAdminInvoiceController::class,    'viewInvoice']);
        $routes->post('validate_invoice',                   [QvcAdminInvoiceController::class,    'validateInvoice']);
    });


    $routes->group('mpqua', function ($routes) {
        $routes->get('list',                                [QvcAdminMPQUAController::class,      'list']);
        $routes->post('addUser',                            [QvcAdminMPQUAController::class,      'addUser']);
        $routes->get('getMPQ/(:num)',                       [QvcAdminMPQUAController::class,      'getMPQ/$1']);
        $routes->post('editUser',                           [QvcAdminMPQUAController::class,      'editUser']);
        $routes->post('deleteUser/(:num)',                  [QvcAdminMPQUAController::class,      'deleteUser/$1']);

        $routes->get('listNew',                             [QvcAdminMPQUAController::class,      'listNew']);
    });









    // Display Home Page
    $routes->get('dashboard',                           [QvcAdminController::class,     'dashboard']);
    $routes->get('getSamcExpertiseData',                [QvcAdminController::class,     'getSamcExpertiseData']);
    // Admin SAMC Dashboard
    // $routes->get('samc_management',                     [QvcAdminSAMCController::class,     'samc_management']);
    // Admin Review SAMC
    $routes->get('set_reviewed_samc/(:any)',            [QvcAdminSAMCController::class,     'set_reviewed_samc/$1']);
    // $routes->get('reviewed_samc',                       [QvcAdminSAMCController::class,     'reviewed_samc']);
    // Admin Return Incomplete SAMC to Provider
    $routes->post('returnSamc',                         [QvcAdminSAMCController::class,     'returnSamc']);
    // Fetch SAMC Details
    $routes->get('getSamcData/(:num)',                  [QvcAdminSAMCController::class,     'getSamcData/$1']);
    // Admin Review SAMC
    $routes->get('set_final_reviewed_samc_id/(:any)',                [QvcAdminSAMCController::class,     'set_final_reviewed_samc_id/$1']);
    $routes->get('final_reviewed_samc',                [QvcAdminSAMCController::class,     'final_reviewed_samc']);






    $routes->get('samc_monitoring',                     [QvcAdminController::class,     'samc_monitoring']);

    // Routes.php
    $routes->get('get-app-data',                        [QvcAdminSAMCController::class,     'getAppData']);
    $routes->post('assign-app',                         [QvcAdminSAMCController::class,     'assignApp']);


    // Notification Routes
    $routes->post('notifications/markAsRead',           [QvcAdminNotificationController::class,     'markAsRead']);

    // Assessor Controller
    $routes->get('assessors_list',                   [QvcAdminAssessorController::class,     'assessors_list']);

    // Provider Controller
    $routes->get('providers_list',                   [QvcAdminProviderController::class,     'providers_list']);

    // Course Controller
    //$routes->get('course_list',                   [QvcAdminCourseController::class,     'course_list']);
});
