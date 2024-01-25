<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Wallapop::index');
$routes->get('/Register', 'Wallapop::register');
$routes->post('/RegisterArticle', 'Wallapop::registerArticle');
$routes->get('/Compras', 'Wallapop::Vista');
$routes->get('/UserPage', 'Wallapop::UserPage');
$routes->get('/NewProducto', 'Wallapop::Compras');
