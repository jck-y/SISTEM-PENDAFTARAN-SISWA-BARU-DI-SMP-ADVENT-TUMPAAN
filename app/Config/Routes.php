<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', 'Login::index');
// $routes->post('login/process', 'Login::process');
// $routes->get('admin', 'Admin::index');
// $routes->get('operator', 'Operator::index');
// $routes->get('kepsek', 'Kepsek::index');
// $routes->get('siswa', 'siswa::index');
// $routes->get('logout', 'Login::logout');

$routes->get('/', 'Auth::index');
$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/siswa', 'Dashboard::siswa');

$routes->get('/kepsek', 'Kepsek::index');


$routes->get('/siswa', 'Siswa::index');
$routes->post('/siswa/save_siswa', 'Siswa::save_siswa');
$routes->get('/siswa/orangtua_kandung', 'Siswa::orangtua_kandung');
$routes->post('/siswa/save_orangtua_kandung', 'Siswa::save_orangtua_kandung');
$routes->get('/siswa/orangtua_wali', 'Siswa::orangtua_wali');
$routes->post('/siswa/save_orangtua_wali', 'Siswa::save_orangtua_wali');
$routes->get('/siswa/uploadimg', 'Siswa::uploadimg');
$routes->post('/siswa/upload', 'Siswa::upload');