<?php
if(!function_exists('zrortadmin_activityLog')){
	function zrortadmin_activityLog($module, $requested_path = NULL,$requested_string = NULL) {
		if($requested_string != NULL)
		{
			$requested_string = json_encode($requested_string);
		}
		$data = array(
				'action_module' 	=> $module,
				'requested_path' 	=> $requested_path,
				'ip' 				=> NULL,
				'browser' 			=> NULL,
				'requested_string' 	=> ($requested_string!=NULL)?$requested_string:'',
				'admin_id' 			=> 1
			);
		$return ='<script type="text/javascript" language="javascript">alert("Please Provide Required Data!") </script>';
		if($module !=NULL){
			$ci      = \Config\Database::connect();
			$return = $ci->table('zrort_admin_activity_log')->insert($data);
		}
		return $return;
	}
}

?>