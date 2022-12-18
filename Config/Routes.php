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
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/login', 'Admin\Login::index');

// $routes->get('kategori/(:any)', 'admin\kategori::selectWhere/$1');

$routes->group('admin', ['filter' => 'Auth'], function ($routes) {

    $routes->add('/', 'Admin\adminpage::index');
    $routes->add('kategori', 'Admin\kategori::read');
    $routes->add('kategori/create', 'Admin\kategori::create');
    $routes->add('kategori/find/(:any)', 'Admin\kategori::find/$1');
    $routes->add('kategori/insert', 'admin\kategori::insert');
    $routes->add('kategori/delete/(:any)', 'admin\kategori::delete/$1');
    $routes->add('kategori/update', 'admin\kategori::update');

    $routes->add('menu', 'admin\menu::index');
    $routes->add('menu/read', 'admin\menu::read');
    $routes->add('menu/delete/(:any)', 'admin\menu::delete/$1');
    $routes->add('menu/create', 'admin\menu::create');
    $routes->add('menu/insert', 'admin\menu::insert');
    $routes->add('menu/find/(:any)', 'Admin\menu::find/$1');
    $routes->add('menu/update', 'admin\menu::update');

    $routes->add('pelanggan', 'admin\pelanggan::index');
    $routes->add('pelanggan/delete/(:any)', 'admin\pelanggan::delete/$1');
    $routes->add('pelanggan/update/(:any)', 'admin\pelanggan::update/$1');

    $routes->add('order', 'admin\order::index');
    $routes->add('order/find/(:any)', 'Admin\order::find/$1');
    $routes->add('order/update', 'admin\order::update');

    $routes->add('orderdetail', 'admin\orderdetail::index');
    $routes->add('orderdetail/cari', 'admin\orderdetail::cari');

    $routes->add('user', 'admin\user::index');
    $routes->add('user/create', 'admin\user::create');
    $routes->add('user/insert', 'admin\user::insert');
    $routes->add('user/read', 'admin\user::read');
    $routes->add('user/ubah', 'admin\user::ubah');
    $routes->add('user/delete/(:any)', 'admin\user::delete/$1');
    $routes->add('user/update/(:any)', 'admin\user::update/$1');
    $routes->add('user/find/(:any)', 'Admin\user::find/$1');
    $routes->add('user/destroy', 'admin\user::destroy');
});

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
