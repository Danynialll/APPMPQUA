<?php

use App\Modules\Assessor\Controllers\AssessorController;
use App\Modules\Assessor\Controllers\AssessorSamcController;
use App\Modules\Assessor\Controllers\AssessorProfileController;

//Portfolio Route Groups
$routes->group('assessor', function ($routes) {

    $routes->group('samc', function ($routes) {
        $routes->get('manage_samc',                 [AssessorSamcController::class,     'manage_samc']);
        $routes->post('accept_samc',                [AssessorSamcController::class,     'accept_samc']);
        $routes->post('reject_samc',                [AssessorSamcController::class,     'rejectSamc']);
        $routes->get('set_samc_id/(:any)',          [AssessorSamcController::class,     'set_samc_id/$1']);
        $routes->get('reviewed_samc',               [AssessorSamcController::class,     'reviewed_samc']);
        $routes->post('submit_review',              [AssessorSamcController::class,     'submit_review']);
        $routes->post('save_review_as_draft',       [AssessorSamcController::class,     'saveReviewAsDraft']);
    });

    $routes->get('dashboard',                   [AssessorController::class,     'dashboard']);
    $routes->get('getSamcExpertiseData',        [AssessorController::class,     'getSamcExpertiseData']);

    // $routes->get('courses',                   [AssessorController::class,     'courses']);
    // $routes->get('my_samc',            [AssessorController::class,     'my_samc']);
    // $routes->get('history',            [AssessorController::class,     'history']);

    //Profile Route Groups ------------------------------------------------------------------------------------------------
    $routes->get('profile',                     [AssessorProfileController::class,     'profile']);
    $routes->post('get_nec_narrow',             [AssessorProfileController::class,     'get_nec_narrow']);
    $routes->post('get_nec_detail',             [AssessorProfileController::class,     'get_nec_detail']);
    $routes->post('update_profile',             [AssessorProfileController::class,     'update_profile']);
    $routes->post('delete_expertise',           [AssessorProfileController::class,     'delete_expertise']);
    $routes->post('delete_nec',                 [AssessorProfileController::class,     'delete_nec']);
});
