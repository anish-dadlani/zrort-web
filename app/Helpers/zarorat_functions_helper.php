<?php
if(!function_exists('zrortadmin_activityLog')){
	function zrortadmin_activityLog($module, $requested_path = NULL,$requested_string = NULL) {
		if($requested_string != NULL)
		{
			$requested_string = json_encode($requested_string);
		}
		$user_id = session('user_id');
		$data = array(
				'action_module' 	=> $module,
				'requested_path' 	=> $requested_path,
				'ip' 				=> NULL,
				'browser' 			=> NULL,
				'requested_string' 	=> ($requested_string!=NULL)?$requested_string:'',
				'admin_id' 			=> $user_id
			);
		$return ='<script type="text/javascript" language="javascript">alert("Please Provide Required Data!") </script>';
		if($module !=NULL){
			$ci      = \Config\Database::connect();
			$return = $ci->table('zrort_admin_activity_log')->insert($data);
		}
		return $return;
	}
}
if(!function_exists('get_business_categories_name')){
	function get_business_categories_name($pk_id="")
	{  
		$db      = \Config\Database::connect();
		$query = $db->query("SELECT title FROM business_categories where pk_id=$pk_id");
		$business_categories= $query->getRowArray();
		return $business_categories['title'];
	}
}
if(!function_exists('get_business_admin_name')){
	function get_business_admin_name($pk_id="")
	{  
		$db      = \Config\Database::connect();
		$query = $db->query("SELECT username FROM business_admins where pk_id=$pk_id");
		$business_admins= $query->getRowArray();
		return $business_admins['username'];
	}
}
?>