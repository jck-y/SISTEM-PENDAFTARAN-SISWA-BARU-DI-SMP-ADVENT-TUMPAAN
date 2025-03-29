<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/** ROUTES FOR AUTH */
$routes->get('/', 'Auth::index');
$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');

/** MAIN ROUTES */
$routes->get('/kepsek', 'Kepsek::index');
$routes->get('/admin', 'Admin::index');
$routes->get('/home', 'Home::index');
$routes->get('/operator', 'Operator::index');

/** ROUTES FOR SISWA */
$routes->get('/siswa', 'Siswa::index');
$routes->post('/siswa/save_siswa', 'Siswa::save_siswa');
$routes->get('/siswa/orangtua_kandung', 'Siswa::orangtua_kandung');
$routes->post('/siswa/save_orangtua_kandung', 'Siswa::save_orangtua_kandung');
$routes->get('/siswa/orangtua_wali', 'Siswa::orangtua_wali');
$routes->post('/siswa/save_orangtua_wali', 'Siswa::save_orangtua_wali');
$routes->get('/siswa/uploadimg', 'Siswa::uploadimg');
$routes->post('/siswa/upload', 'Siswa::upload');
$routes->get('/siswa/done', 'Siswa::done');
$routes->get('/siswa/detail/(:num)', 'Siswa::detail/$1');

/** ROUTES FOR OPERATOR */
$routes->post('/operator/update_status', 'Operator::update_status');

/** ROUTES FOR ADMIN */
$routes->post('/admin/set_password_siswa/(:num)', 'Admin::set_password_siswa/$1');
$routes->post('/admin/set_password_kepsek/(:num)', 'Admin::set_password_kepsek/$1');
$routes->post('/admin/set_password_operator/(:num)', 'Admin::set_password_operator/$1');
$routes->post('/admin/add_kepsek', 'Admin::add_kepsek');
$routes->post('/admin/add_operator', 'Admin::add_operator');
$routes->post('/admin/delete_siswa/(:num)', 'Admin::delete_siswa/$1');
$routes->post('/admin/delete_kepsek/(:num)', 'Admin::delete_kepsek/$1');
$routes->post('/admin/delete_operator/(:num)', 'Admin::delete_operator/$1');

$routes->get('/admin/operator', 'Admin::index2');
$routes->get('/admin/siswa', 'Admin::index3');

$routes->get('/admin/admin_detail_siswa/(:num)', 'Admin::detailSiswa/$1');