<?php

use App\Modules\Auth\Controllers\LoginController;
use App\Modules\Auth\Controllers\RegisterController;
use App\Modules\Auth\Controllers\LoginMPQUAController;

//Portfolio Route Groups
$routes->group('auth', function ($routes) {
    $routes->get('/',                           [LoginController::class,     'sign_in']);

    $routes->group('appmpqua', function ($routes) {
        $routes->get('/',                           [LoginMPQUAController::class,     'sign_in_MPQUA']);

        $routes->post('attempt_login_MPQUA',              [LoginMPQUAController::class, 'attempt_login_MPQUA']);

    });

    $routes->post('attempt_login',              [LoginController::class, 'attempt_login']);

    $routes->get('register_provider',            [RegisterController::class,     'register_provider']);
    $routes->get('register_assessor',            [RegisterController::class,     'register_assessor']);

    $routes->post('attempt_register_assessor', [RegisterController::class, 'attempt_register_assessor']);
    $routes->post('attempt_register_provider', [RegisterController::class, 'attempt_register_provider']);
});




