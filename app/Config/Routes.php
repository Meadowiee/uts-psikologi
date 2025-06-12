<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['filter' => 'admin'], function($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('dashboard', 'AdminController::dashboard');
});

$routes->group('login', static function($routes) {
    $routes->get('/', '\App\Modules\Auth\Controllers\Login::index');
    $routes->post('auth', '\App\Modules\Auth\Controllers\Login::auth');
});

$routes->group('signup', static function($routes) {
    $routes->get('/', '\App\Modules\Auth\Controllers\Signup::index');
    $routes->post('auth', '\App\Modules\Auth\Controllers\Signup::auth');
});

$routes->group('landing-page', static function($routes) {
    $routes->get('/', '\App\Modules\LandingPage\Controllers\LandingPage::index');
});