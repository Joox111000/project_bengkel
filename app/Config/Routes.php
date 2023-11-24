<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/login', 'Login::index');

// $routes->post('/auth', 'Login::auth');
