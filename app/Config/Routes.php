<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// In app/Config/Routes.php

$routes->get('/orders', 'OrderController::index');  // Show all orders
$routes->get('/orders/create', 'OrderController::create');  // Create new order
$routes->post('/orders/store', 'OrderController::store');  // Store new order
$routes->get('/checkout/(:num)', 'PaymentController::checkout/$1');  // Checkout page
$routes->post('/checkout/process', 'PaymentController::processPayment');  // Process payment via PayTabs
