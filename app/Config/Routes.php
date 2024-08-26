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

$routes->get('/kategori', 'KategoriController::index'); // Menampilkan daftar kategori
$routes->get('kategori/create', 'KategoriController::create'); // Menampilkan form untuk menambah kategori baru
$routes->post('kategori/store', 'KategoriController::store'); // Menyimpan kategori baru
$routes->get('kategori/edit/(:num)', 'KategoriController::edit/$1'); // Menampilkan form edit kategori berdasarkan ID
$routes->post('kategori/update/(:num)', 'KategoriController::update/$1'); // Menyimpan perubahan kategori
$routes->get('kategori/delete/(:num)', 'KategoriController::delete/$1'); // Menghapus kategori berdasarkan ID

$routes->get('pemasukan', 'PemasukanController::index');
$routes->get('pemasukan/create', 'PemasukanController::create');
$routes->post('pemasukan/store', 'PemasukanController::store');
$routes->get('pemasukan/edit/(:num)', 'PemasukanController::edit/$1');
$routes->post('pemasukan/update/(:num)', 'PemasukanController::update/$1');
$routes->get('pemasukan/delete/(:num)', 'PemasukanController::delete/$1');

$routes->get('pengeluaran', 'PengeluaranController::index');
$routes->get('pengeluaran/create', 'PengeluaranController::create');
$routes->post('pengeluaran/store', 'PengeluaranController::store');
$routes->get('pengeluaran/edit/(:num)', 'PengeluaranController::edit/$1');
$routes->post('pengeluaran/update/(:num)', 'PengeluaranController::update/$1');
$routes->get('pengeluaran/delete/(:num)', 'PengeluaranController::delete/$1');

$routes->get('penggunaan_dana', 'PenggunaanDanaController::index');
$routes->get('penggunaan_dana/create', 'PenggunaanDanaController::create');
$routes->post('penggunaan_dana/store', 'PenggunaanDanaController::store');
$routes->get('penggunaan_dana/edit/(:num)', 'PenggunaanDanaController::edit/$1');
$routes->post('penggunaan_dana/update/(:num)', 'PenggunaanDanaController::update/$1');
$routes->get('penggunaan_dana/delete/(:num)', 'PenggunaanDanaController::delete/$1');
