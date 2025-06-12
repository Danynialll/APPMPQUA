<?php

use App\Modules\User\Controllers\DashboardController;
use App\Modules\User\Controllers\ProfileController;


//Portfolio Route Groups
$routes->group('user', function ($routes) {
    $routes->get('dashboard',                   [DashboardController::class,     'dashboard']);
    $routes->get('profile',                   [ProfileController::class,     'profile']);
    $routes->get('provider_dashboard',                   [DashboardController::class,     'provider_dashboard']);
});
