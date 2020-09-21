<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
//routes for logout
$routes->get('logout', 'Login::logout');
//routes for orders
$routes->get('orders/(:segment)', 'Orders::view/$1');
$routes->get('orders', 'Orders::index');
$routes->get('orders_add', 'Orders::add_orders');
$routes->get('orders_view/(:segment)', 'Orders::view_orders/$1'); 
$routes->get('orders_delete/(:segment)', 'Orders::delete_orders/$1');
$routes->get('orders_edit/(:segment)', 'Orders::edit_orders/$1');
//routes for products
$routes->get('products/(:segment)', 'Businessadmin/Products::view/$1');
$routes->get('products', 'Businessadmin/Products::index'); 
$routes->get('products_add', 'Businessadmin/Products::add_products');
$routes->get('products_view/(:segment)', 'Businessadmin/Products::view_products/$1');
$routes->get('products_delete/(:segment)', 'Businessadmin/Products::delete_products/$1');
$routes->get('products_edit/(:segment)', 'Businessadmin/Products::edit_products/$1');
//routes for categories
$routes->get('categories/(:segment)', 'Businessadmin/Categories::view/$1');
$routes->get('categories', 'Businessadmin/Categories::index'); 
$routes->get('categories_add', 'Businessadmin/Categories::add_categories');
$routes->get('categories_view/(:segment)', 'Businessadmin/Categories::view_categories/$1');
$routes->get('categories_delete/(:segment)', 'Businessadmin/Categories::delete_categories/$1');
$routes->get('categories_edit/(:segment)', 'Businessadmin/Categories::edit_categories/$1');
//routes for business
$routes->get('business/(:segment)', 'Zrortadmin/Business::view/$1');
$routes->get('business', 'Zrortadmin/Business::index'); 
$routes->get('business_add', 'Zrortadmin/Business::add_business');
$routes->get('business_view/(:segment)', 'Zrortadmin/Business::view_business/$1');
$routes->get('business_delete/(:segment)', 'Zrortadmin/Business::delete_business/$1');
$routes->get('business_edit/(:segment)', 'Zrortadmin/Business::edit_business/$1');
//routes for productsunits
$routes->get('productsunits/(:segment)', 'Businessadmin/Productsunits::view/$1');
$routes->get('productsunits', 'Businessadmin/Productsunits::index'); 
$routes->get('productsunits_add', 'Businessadmin/Productsunits::add_productsunits');
$routes->get('productsunits_view/(:segment)', 'Businessadmin/Productsunits::view_productsunits/$1');
$routes->get('productsunits_delete/(:segment)', 'Businessadmin/Productsunits::delete_productsunits/$1');
$routes->get('productsunits_edit/(:segment)', 'Businessadmin/Productsunits::edit_productsunits/$1');
//routes for businesscategories
$routes->get('businesscategories/(:segment)', 'Zrortadmin/Businesscategories::view/$1');
$routes->get('businesscategories', 'Zrortadmin/Businesscategories::index'); 
$routes->get('businesscategories_add', 'Zrortadmin/Businesscategories::add_businesscategories');
$routes->get('businesscategories_view/(:segment)', 'Zrortadmin/Businesscategories::view_businesscategories/$1');
$routes->get('businesscategories_delete/(:segment)', 'Zrortadmin/Businesscategories::delete_businesscategories/$1');
$routes->get('businesscategories_edit/(:segment)', 'Zrortadmin/Businesscategories::edit_businesscategories/$1');
/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
