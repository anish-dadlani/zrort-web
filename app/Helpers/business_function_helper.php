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
		$db      = \Config\Database::connect();
		$query = $db->query("SELECT name FROM business where pk_id=$pk_id");
		$business_name= $query->getRowArray();
		return $business_name['name'];
	}
}
if(!function_exists('get_product_categories_name')){
	function get_product_categories_name($pk_id="")
	{  
		$db      = \Config\Database::connect();
		$query = $db->query("SELECT name FROM product_categories where pk_id=$pk_id");
		$product_categories= $query->getRowArray();
		return $product_categories['name'];
	}
}
if(!function_exists('get_product_unit_name')){
	function get_product_unit_name($pk_id="")
	{  
		$db      = \Config\Database::connect();
		$query = $db->query("SELECT unit_title FROM products_units where pk_id=$pk_id");
		$product_unit= $query->getRowArray();
		return $product_unit['unit_title'];
	}
}
?>