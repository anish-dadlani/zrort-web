<?php namespace App\Controllers\Businessadmin;
use App\Models\Businessadmin\AjaxCallsModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class AjaxCalls extends BaseController
{
	public function categories_list_filter(){
		helper('business_function_helper'); 
		$is_active = $this->request->getPost('is_active');
		$model = new AjaxCallsModel();
		$data = $model-> categories_list_filter($is_active);
		echo $data;
	}
	
	public function product_list_filter(){
		helper('business_function_helper'); 
		$is_active = $this->request->getPost('is_active');
		$model = new AjaxCallsModel();
		$data = $model-> product_list_filter($is_active);
		echo $data;
	}
}