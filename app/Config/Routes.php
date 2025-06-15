<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('profile', function($routes) {
    $routes->get('/', 'Profile::index'); 
    $routes->get('edit', 'Profile::edit');
    $routes->post('update', 'Profile::update');
});

$routes->group('test', function($routes) {
    $routes->get('/', 'Test::index');
    $routes->get('create', 'Test::create');
    
    $routes->get('take/(:num)', 'Test::take/$1');
    $routes->get('take/(:num)/(:num)', 'Test::take/$1/$2');

    $routes->post('save-answer', 'Test::saveAnswer');
    $routes->get('finish/(:num)', 'Test::finish/$1');
});

$routes->group('login', static function($routes) {
    $routes->get('/', '\App\Controllers\Login::index');
    $routes->post('auth', '\App\Controllers\Login::auth');
});

$routes->group('signup', static function($routes) {
    $routes->get('/', '\App\Controllers\Signup::index');
    $routes->post('auth', '\App\Controllers\Signup::auth');
});

$routes->get('logout', '\App\Controllers\Logout::index');
$routes->get('results', '\App\Controllers\Results::index');
