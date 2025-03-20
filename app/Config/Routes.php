<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'siswa::index');
$routes->post('login/process', 'Login::process');
$routes->get('admin', 'Admin::index');
$routes->get('operator', 'Operator::index');
$routes->get('kepsek', 'Kepsek::index');
$routes->get('siswa', 'siswa::index');
$routes->get('logout', 'Login::logout');
$routes->get('orangtua', 'Siswa::orangTuaKandung');
$routes->get('orangtuawali', 'Siswa::orangTuaWali');
$routes->get('uploadimg', 'Upload::index');


// $routes->get('/login', 'LoginController::index');
// $routes->post('/login/auth', 'LoginController::auth');
// $routes->get('/logout', 'LoginController::logout');
// $routes->get('/dashboard', function () {
//     if (!session()->get('logged_in')) {
//         return redirect()->to('/login');
//     }
//     return view('dashboard');
// });
