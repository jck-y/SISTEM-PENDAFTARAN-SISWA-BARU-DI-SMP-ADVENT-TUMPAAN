<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Login::index');
$routes->post('login/process', 'Login::process');
$routes->get('admin', 'Admin::index');
$routes->get('operator', 'Operator::index');
$routes->get('kepsek', 'Kepsek::index');
$routes->get('siswa', 'siswa::index');
$routes->get('logout', 'Login::logout');