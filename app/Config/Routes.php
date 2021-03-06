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
$routes->get('SuperAdmin', 'Zrortadmin/Login::index');
//routes for logout
$routes->get('logout', 'Zrortadmin/Login::logout');
//routes for orders
$routes->get('Orders/(:segment)', 'Zrortadmin\Orders::view/$1');
$routes->get('Orders', 'Zrortadmin\Orders::index');
$routes->get('Orders-Add', 'Zrortadmin\Orders::add_orders');
$routes->get('Orders-View/(:segment)', 'Zrortadmin\Orders::view_orders/$1'); 
$routes->get('Orders-Delete/(:segment)', 'Zrortadmin\Orders::delete_orders/$1');
$routes->get('Orders-Edit/(:segment)', 'Zrortadmin\Orders::edit_orders/$1');
//routes for products
$routes->get('Products/(:segment)', 'Businessadmin\Products::view/$1');
$routes->get('Products', 'Businessadmin\Products::index'); 
$routes->get('Products-Add', 'Businessadmin\Products::add_products');
$routes->get('Products-View/(:segment)', 'Businessadmin\Products::view_products/$1');
$routes->get('Products-Delete/(:segment)', 'Businessadmin\Products::delete_products/$1');
$routes->get('Products-Edit/(:segment)', 'Businessadmin\Products::edit_products/$1');
//routes for categories
$routes->get('Categories/(:segment)', 'Businessadmin\Categories::view/$1');
$routes->get('Categories', 'Businessadmin\Categories::index'); 
$routes->get('Categories-Add', 'Businessadmin\Categories::add_categories');
$routes->get('Categories-View/(:segment)', 'Businessadmin\Categories::view_categories/$1');
$routes->get('Categories-Delete/(:segment)', 'Businessadmin\Categories::delete_categories/$1');
$routes->get('Categories-Edit/(:segment)', 'Businessadmin\Categories::edit_categories/$1');
//routes for business
$routes->get('Business/(:segment)', 'Zrortadmin\Business::view/$1');
$routes->get('Business', 'Zrortadmin\Business::index'); 
$routes->get('Business-Add', 'Zrortadmin\Business::add_business');
$routes->get('Business-View/(:segment)', 'Zrortadmin\Business::view_business/$1');
$routes->get('Business-Delete/(:segment)', 'Zrortadmin\Business::delete_business/$1');
$routes->get('Business-Edit/(:segment)', 'Zrortadmin\Business::edit_business/$1');
//routes for productsunits
$routes->get('Productsunits/(:segment)', 'Businessadmin\Productsunits::view/$1');
$routes->get('Productsunits', 'Businessadmin\Productsunits::index'); 
$routes->get('Productsunits-Add', 'Businessadmin\Productsunits::add_productsunits');
$routes->get('Productsunits-View/(:segment)', 'Businessadmin\Productsunits::view_productsunits/$1');
$routes->get('Productsunits-Delete/(:segment)', 'Businessadmin\Productsunits::delete_productsunits/$1');
$routes->get('Productsunits-Edit/(:segment)', 'Businessadmin\Productsunits::edit_productsunits/$1');
//routes for businesscategories
$routes->get('Business-Categories/(:segment)', 'Zrortadmin\Businesscategories::view/$1');
$routes->get('Business-Categories', 'Zrortadmin\Businesscategories::index'); 
$routes->get('Business-Categories-Add', 'Zrortadmin\Businesscategories::add_businesscategories');
$routes->get('Business-Categories-View/(:segment)', 'Zrortadmin\Businesscategories::view_businesscategories/$1');
$routes->get('Business-Categories-Delete/(:segment)', 'Zrortadmin\Businesscategories::delete_businesscategories/$1');
$routes->get('Business-Categories-Edit/(:segment)', 'Zrortadmin\Businesscategories::edit_businesscategories/$1'); 
//routes for zrortprofile
//$routes->get('zrortprofile/(:segment)', 'Zrortadmin/Zrortprofile::view/$1');
//$routes->get('zrortprofile', 'Zrortadmin/Zrortprofile::index'); 
$routes->get('ZrortProfile-Add', 'Zrortadmin/Zrortprofile::add_zrortprofile');
$routes->get('ZrortChange-Password', 'Zrortadmin/Zrortprofile::update_zrortchangepassword');
//Businessadmin
$routes->get('BusinessAdmin', 'Businessadmin\Login::index');
//routes for logout
$routes->get('logout', 'Businessadmin\Login::logout');
$routes->get('BusinessProfile-Add', 'Businessadmin\Businessprofile::add_businessprofile');
$routes->get('BusinessChange-Password', 'Businessadmin\Businessprofile::update_businesschangepassword');
//routing for frontend view
$routes->get('Business-Listing/(:segment)', 'Frontend\Businessview::view/$1');
$routes->get('Business-Listing', 'Frontend\Businessview::index');  
$routes->get('Business-View/(:segment)', 'Frontend\Businessview::view_business/$1');
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

$routes->add('/', 'Customers\Dashboard::getBusinessListing');
$routes->group('customer', function($routes)
{
	$routes->add('/', 'Customers\authentication\Login::index');
	$routes->add('login', 'Customers\authentication\Login::authentication');
	$routes->add('register', 'Customers\authentication\Register::index');
	$routes->add('logout', 'Customers\authentication\Login::logout');
	$routes->add('reset_password', 'Customers\authentication\Login::reset_password');
	$routes->add('save', 'Customers\authentication\Register::register_customer');

	// $routes->add('dashboard', 'Customers\Dashboard::getBusinessListing');
	$routes->add('profile', 'Customers\Dashboard::customer_overview');
	$routes->add('wishlist', 'Customers\Dashboard::customer_wishlist');
	
	$routes->group('address', function($routes)
	{
		$routes->add('view', 'Customers\Address::address_view');
		$routes->add('save', 'Customers\Address::address_save');
		$routes->add('edit/(:segment)', 'Customers\Address::address_edit/$1');
		$routes->add('delete/(:segment)', 'Customers\Address::address_delete/$1');
	});
});

$routes->group('products', function($routes)
{
	$routes->add('/', 'Customers\Products::all_products');
	$routes->add('new_products/(:segment)', 'Customers\Products::recent_products/$1');
	$routes->add('featured/(:segment)', 'Customers\Products::featured_products/$1');
	$routes->add('view/(:segment)', 'Customers\Products::getSingleProductDetails/$1');
	$routes->add('cart/(:segment)', 'Customers\Products::addToCart/$1');
	$routes->add('cartRemove/(:segment)', 'Customers\Products::removeFromCart/$1');
	$routes->add('search', 'Customers\Products::searchForProducts'); 
	$routes->add('count', 'Customers\Products::count_product_cart');
	$routes->add('single/(:segment)', 'Customers\Products::getProductPrice/$1');
	
	$routes->group('wishlist', function($routes)
	{
		$routes->add('add/(:segment)', 'Customers\Products::add_to_wishlist/$1');	
		$routes->add('remove/(:segment)', 'Customers\Products::remove_from_wishlist/$1');
		$routes->add('count', 'Customers\Products::count_product_wishlist');
	});

	$routes->group('category', function($routes)
	{
		$routes->add('view/(:segment)', 'Customers\Products::getProductByCatID/$1');
	});
});

$routes->group('business', function($routes)
{
	$routes->add('view', 'Customers\Products::view_all_business');
	$routes->add('search', 'Customers\Products::searchForBusiness');

	$routes->group('products', function($routes)
	{
		$routes->add('view/(:segment)', 'Customers\Products::getProductsByBusinessID/$1');	
	});
});

$routes->group('orders', function($routes)
{
	$routes->add('set', 'Customers\Orders::set');
	$routes->post('set_quantity', 'Customers\Orders::set_quantity');
	$routes->add('checkout', 'Customers\Orders::checkout');
	$routes->add('placed', 'Customers\Orders::ordersPlaced');
	$routes->add('invoice/(:segment)', 'Customers\Orders::billInvoice/$1');
	$routes->add('save', 'Customers\Orders::saveOrder');
});
