<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('ControllerShop');
$routes->setDefaultMethod('dashboard');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'ControllerAccount::signIn');
$routes->get('/signin', 'ControllerAccount::signIn');
$routes->get('/signup', 'ControllerAccount::signUp');

$routes->get('/dashboard', 'ControllerShop::dashboard');
$routes->get('/about', 'ControllerShop::about');
$routes->get('/shop', 'ControllerShop::shop/');
$routes->get('/shop/(:any)', 'ControllerShop::shop/$1');
$routes->get('/contact', 'ControllerShop::contact');
$routes->get('/shop-single/(:any)', 'ControllerShop::shopSingle/$1');
$routes->get('/cart', 'ControllerShop::cart');
$routes->get('/profile', 'ControllerShop::profile');
$routes->get('/stock/product', 'ControllerShop::stockProduct');
$routes->get('/stock/transaction', 'ControllerShop::stockTransaction');
$routes->get('/addproduct', 'ControllerShop::addProduct');
$routes->get('/updateProduct/(:any)', 'ControllerShop::updateProduct/$1');
$routes->get('/deliver/(:any)', 'ControllerShop::deliver/$1');
$routes->get('/buy', 'ControllerShop::buy');

$routes->post('/signingin', 'ControllerAccount::signingIn');
$routes->post('/signingup', 'ControllerAccount::signingUp');

$routes->post('/addnewproduct', 'ControllerShop::addNewProduct');
$routes->post('/updateexistingproduct', 'ControllerShop::updateExistingProduct');
$routes->post('/addToCart', 'ControllerShop::addToCart');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
