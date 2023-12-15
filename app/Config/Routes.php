<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Login::index');
$routes->get('Admin/resetPencarian', 'Admin::pencarian');

// $routes->post('/auth', 'Login::auth');
