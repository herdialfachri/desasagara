<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pengguna', 'PenggunaController::index', ['filter' => 'auth']);
$routes->get('/addpengguna', 'Home::addpengguna', ['filter' => 'auth']);
$routes->get('/dashboard_master', 'DashboardController::master', ['filter' => 'auth']);
$routes->get('/dashboard_admin', 'DashboardController::admin', ['filter' => 'auth']);
$routes->get('/login', 'LoginController::login');
$routes->post('/login/auth', 'LoginController::auth');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/users/edit/(:num)', 'PenggunaController::edit/$1', ['filter' => 'auth']);
$routes->post('/users/update/(:num)', 'PenggunaController::update/$1');
$routes->get('/users/delete/(:num)', 'PenggunaController::delete/$1');
$routes->get('/users/create', 'PenggunaController::create', ['filter' => 'auth']);
$routes->post('/users/store', 'PenggunaController::store');

$routes->get('/masukan', 'MasukanController::masukan', ['filter' => 'auth']);
$routes->post('/masukan/submit', 'MasukanController::submit');





