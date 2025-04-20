<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/register', 'Auth::register');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('home', 'Home::index');

/** ROUTES FOR SISWA */
$routes->group('siswa', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Siswa::index');
    $routes->post('save_siswa', 'Siswa::save_siswa');
    $routes->get('orangtua_kandung', 'Siswa::orangtua_kandung');
    $routes->post('save_orangtua_kandung', 'Siswa::save_orangtua_kandung');
    $routes->get('orangtua_wali', 'Siswa::orangtua_wali');
    $routes->post('save_orangtua_wali', 'Siswa::save_orangtua_wali');
    $routes->get('uploadimg', 'Siswa::uploadimg');
    $routes->post('upload', 'Siswa::upload');
    $routes->get('done', 'Siswa::done');
    $routes->get('detail/(:num)', 'Siswa::detail/$1');
    $routes->get('dashboard', 'Siswa::dashboard');
});

/** ROUTES FOR OPERATOR */
$routes->group('operator', ['filter' => 'operator'], function ($routes) {
    $routes->get('/', 'Operator::index');
    $routes->post('update_status', 'Operator::update_status');
    $routes->get('detail_siswa/(:num)', 'Operator::detailSiswa/$1');
});

/** ROUTES FOR ADMIN */
$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('operator', 'Admin::index2');
    $routes->get('siswa', 'Admin::index3');
    $routes->post('set_password_siswa/(:num)', 'Admin::set_password_siswa/$1');
    $routes->post('set_password_kepsek/(:num)', 'Admin::set_password_kepsek/$1');
    $routes->post('set_password_operator/(:num)', 'Admin::set_password_operator/$1');
    $routes->post('add_kepsek', 'Admin::add_kepsek');
    $routes->post('add_operator', 'Admin::add_operator');
    $routes->post('add_siswa', 'Admin::add_siswa'); // Rute baru untuk add_siswa
    $routes->post('delete_siswa/(:num)', 'Admin::delete_siswa/$1');
    $routes->post('delete_kepsek/(:num)', 'Admin::delete_kepsek/$1');
    $routes->post('delete_operator/(:num)', 'Admin::delete_operator/$1');
    $routes->get('detail_siswa/(:num)', 'Admin::detailSiswa/$1');
    $routes->post('add_user_only', 'Admin::add_user_only');
    $routes->post('update_siswa', 'Admin::update_siswa');
});

/** ROUTES FOR KEPSEK */
$routes->group('kepsek', ['filter' => 'kepsek'], function ($routes) {
    $routes->get('/', 'Kepsek::index');
    $routes->get('detail_siswa/(:num)', 'Kepsek::detailSiswa/$1');
});