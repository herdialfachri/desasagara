<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pengguna', 'Home::pengguna');
$routes->get('/addpengguna', 'Home::addpengguna');
$routes->get('/dashboard_master', 'DashboardController::master', ['filter' => 'auth']);
$routes->get('/dashboard_admin', 'DashboardController::admin', ['filter' => 'auth']);
$routes->get('/login', 'LoginController::login');
$routes->post('/login/auth', 'LoginController::auth');
$routes->get('/logout', 'LoginController::logout');
