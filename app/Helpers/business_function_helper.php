<?php
if(!function_exists('businessadmin_activityLog')){
	function businessadmin_activityLog($module, $requested_path = NULL,$requested_string = NULL) {
		if($requested_string != NULL)
		{
			$requested_string = json_encode($requested_string);
		}
		$businessuser_id = session('businessuser_id');
		$data = array(
				'action_module' 	=> $module,
				'requested_path' 	=> $requested_path,
				'ip' 				=> NULL,
				'browser' 			=> NULL,
				'requested_string' 	=> ($requested_string!=NULL)?$requested_string:'',
				'admin_id' 			=> $businessuser_id
			);
		$return ='<script type="text/javascript" language="javascript">alert("Please Provide Required Data!") </script>';
		if($module !=NULL){
			$ci      = \Config\Database::connect();
			$return = $ci->table('business_admins_activity_log')->insert($data);
		}
		return $return;
	}
}
if(!function_exists('get_business_name')){
	function get_business_name($pk_id="")
	{  
		$db    = \Config\Database::connect();
		$query = $db->query("SELECT name FROM business where pk_id=$pk_id");
		$business_name= $query->getRowArray();
		return $business_name['name'];
	}
}
if(!function_exists('get_product_categories_name')){
	function get_product_categories_name($pk_id="")
	{  
		$db    = \Config\Database::connect();
		$query = $db->query("SELECT name FROM product_categories where pk_id=$pk_id");
		$product_categories= $query->getRowArray();
		return $product_categories['name'];
	}
}
if(!function_exists('get_product_unit_name')){
	function get_product_unit_name($pk_id="")
	{  //print_r($pk_id); exit;
		$db    = \Config\Database::connect();
		$query = $db->query("SELECT unit_title FROM products_units where pk_id=$pk_id");
		$product_unit= $query->getRowArray();
		// print_r($product_unit['unit_title']); exit;
		return $product_unit['unit_title'];
	}
}

if(!function_exists('get_product_name')){
	function get_product_name($pk_id="")
	{  
		$db    = \Config\Database::connect();
		$query = $db->query("SELECT name FROM products where pk_id=$pk_id");
		$product= $query->getRowArray();
		return $product['name'];
	}
}

if(!function_exists('get_category_name_by_product_id')){
	function get_category_name_by_product_id($pk_id="")
	{  
		$db    = \Config\Database::connect();
		$query = $db->query("SELECT pc.name as name FROM product_categories pc
		inner join products p on pc.pk_id = p.product_category_id where p.pk_id=$pk_id");
		$product= $query->getRowArray();
		return $product['name'];
	}
}

if(!function_exists('get_business_name_by_product_id')){
	function get_business_name_by_product_id($pk_id="")
	{  
		$db    = \Config\Database::connect();
		$query = $db->query("SELECT b.name as name FROM business b
		inner join products p on b.pk_id = p.bussiness_id where p.pk_id=$pk_id");
		$product= $query->getRowArray();
		return $product['name'];
	}
}

if(!function_exists('get_product_unit_by_product_id')){
	function get_product_unit_by_product_id($pk_id="")
	{  
		$db    = \Config\Database::connect();
		$query = $db->query("SELECT b.unit_title as unit_title FROM products_units b
		inner join products p on b.pk_id = p.product_unit_id where p.pk_id=$pk_id");
		$product= $query->getRowArray();
		return $product['unit_title'];
	}
}

if(!function_exists('get_customer_favorities')){
	function get_customer_favorities()
	{  
		$db    = \Config\Database::connect();
		$id = $_SESSION['user_id'];
		$query = $db->query("SELECT b.pk_id , p.name, p.unit_price, p.image_path FROM customer_favourities b
		inner join products p on b.product_id = p.pk_id where b.customer_id=$id");
		$favorities['items'] = $query->getRowArray();
		return $favorities;
	}
}

if(!function_exists('get_business_delivery_charges')){
	function get_business_delivery_charges($id)
	{  
		$db    = \Config\Database::connect();
		$query = $db->query("SELECT b.delivery_fee as charges FROM business b
		inner join products p on p.bussiness_id = b.pk_id where p.bussiness_id=$id");
		$delivery_fee = $query->getRowArray();
		return $delivery_fee['charges'];
	}
}

// if(!function_exists('get_business_delivery_charges')){
// 	function get_business_delivery_charges($product_id)
// 	{  
// 		$db    = \Config\Database::connect();
// 		$query = $db->query("SELECT b.delivery_fee as charges FROM business b
// 		inner join products p on p.bussiness_id = b.pk_id where p.pk_id=$product_id");
// 		$delivery_fee = $query->getRowArray();
// 		return $delivery_fee['charges'];
// 	}
// }

if(!function_exists('get_business_category_id')){
	function get_business_category_id($business_id)
	{  
		$db    = \Config\Database::connect();
		$query = $db->query("SELECT b.business_category_id as cat_id FROM business b
		inner join products p on p.bussiness_id = b.pk_id where b.pk_id='{$business_id}'");
		$delivery_fee = $query->getRowArray();
		return $delivery_fee['cat_id'];
	}
}

if(!function_exists('get_method_id')){
	function get_method_id($paymentmethod)
	{  
		$db    = \Config\Database::connect();
		$query = $db->query("SELECT pk_id FROM payment_methods where description='{$paymentmethod}'");
		$delivery_fee = $query->getRowArray();
		return $delivery_fee['pk_id'];
	}
}

if(!function_exists('get_method_name')){
	function get_method_name($paymentmethod)
	{  
		$db    = \Config\Database::connect();
		$query = $db->query("SELECT method_title FROM payment_methods where pk_id='{$paymentmethod}'");
		$delivery_fee = $query->getRowArray();
		return $delivery_fee['method_title'];
	}
}

if(!function_exists('authentication')){
	function authentication()
	{  
        if(isset($_SESSION) && $this->session->get('UserAuth') == 'Yes')
            return redirect()->route('customer/dashboard');
        else
            echo view('customers/authentication/login');
	}
}

if(!function_exists('get_unit_by_product_id')){
	function get_unit_by_product_id($product_id)
	{  
		$db    = \Config\Database::connect();
		$query = $db->query("SELECT unit_title FROM products_units pu join products p on pu.pk_id = p.product_unit_id
		where p.pk_id='{$product_id}'");
		$unit_title = $query->getRowArray();
		if(!empty($unit_title))
			return $unit_title['unit_title'];
		else 
			return;
	}
}

if(!function_exists('customerDashboard')){
	function customerDashboard()
	{  
		$business_model = new App\Models\Zrortadmin\BusinessModel();
		$categories_model = new App\Models\Businessadmin\CategoriesModel();
		$productModel = new App\Models\Customers\ProductsModel();
		$customerCartModel = new App\Models\Customers\CustomerCartModel();
		$BusinessCategoriesModel = new App\Models\Businessadmin\BusinessCategoriesModel();

		$displaydata['business'] = $business_model->getBusiness();
		$displaydata['categories'] = $categories_model->getCategories();
		$displaydata['products'] = $productModel->orderBy('created_datetime', 'DESC')->findAll();
		$displaydata['business_catgories'] = $BusinessCategoriesModel->where('is_active', '1')->findAll();

		return $displaydata;
	}
}
?>