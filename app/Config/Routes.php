<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
// admin
$routes->get('/admin/dashboard', 'Dashboard::index');
$routes->get('/admin/login', 'AuthController::index');
$routes->post('/admin/Auth', 'AuthController::login');
$routes->get('/admin/logout', 'AuthController::logout');
// analisa kredit
$routes->get('/analisa/data', 'KreditController::index');
$routes->get('/analisa/add', 'KreditController::kredit_add');
$routes->get('/analisa/detail/(:num)', 'KreditController::kredit_detail/$1');
$routes->get('/analisa/laporan/(:num)', 'KreditController::nota_analisa_kredit/$1');
$routes->get('/analisa/delete/(:num)', 'KreditController::hapus/$1');

$routes->post('/analisa/kredit_post', 'KreditController::kredit_post');
$routes->post('/analisa/hubungan_simpan', 'AnalisaController::hubungan_simpan');

$routes->get('/jaminanSHM/data', 'JaminanSHM::index');
$routes->get('/jaminanBPKB/data', 'JaminanBPKB::index');
$routes->get('/jaminanSHM/add', 'JaminanSHM::JaminanSHM_add');
$routes->get('/jaminanBPKB/add', 'JaminanBPKB::JaminanBPKB_add');
$routes->get('/jaminanBPKB/delete/(:num)', 'JaminanBPKB::hapus/$1');
$routes->get('/jaminanSHM/delete/(:num)', 'JaminanSHM::hapus/$1');
$routes->post('/jaminanSHM/post', 'JaminanSHM::JaminanSHM_post');
$routes->post('/jaminanBPKB/post', 'JaminanBPKB::JaminanBPKB_post');
$routes->get('/analisa/pemeriksaan_jaminan_tanah/(:num)', 'JaminanSHM::jaminan_tanah_dan_bangunan/$1');
$routes->get('/analisa/pemeriksaan_jaminan_kendaraan/(:num)', 'JaminanBPKB::jaminan_barang_bergerak/$1');

// user
$routes->get('/user', 'AdminController::index');
$routes->get('/user/add', 'AdminController::add');
$routes->post('/user/add_post', 'AdminController::add_post');
$routes->get('/user/hapus/(:num)', 'AdminController::delete/$1');
$routes->get('/user/edit/(:num)', 'AdminController::edit/$1');
$routes->post('/user/update', 'AdminController::update');

$routes->get('/tes', 'Tes::index');
$routes->post('/tes/add', 'Tes::tes_add');

// , ['filter' => 'otentifikasi']
