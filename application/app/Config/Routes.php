<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/dashboard', function() {
    return 'Você está logado!';
});
$routes->get('/registrar', 'Auth::register');
$routes->post('/registrar', 'Auth::createAccount');
$routes->get('/posts', 'PostController::index');
$routes->get('/posts/criar', 'PostController::create');
$routes->post('/posts/criar', 'PostController::store');
