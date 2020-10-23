<?php namespace App\Controllers\Zrortadmin;
use App\Models\Zrortadmin\AjaxCallsModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class AjaxCalls extends BaseController
{
	public function business_categories_list_filter(){
		$is_active = $this->request->getPost('is_active');
		$model = new AjaxCallsModel();
		$data = $model-> business_categories_list_filter($is_active);
		echo $data;
	}
	public function product_units_list_filter(){
		$is_active = $this->request->getPost('is_active');
		$model = new AjaxCallsModel();
		$data = $model-> product_units_list_filter($is_active);
		echo $data;
	}
	public function business_list_filter(){
		helper('zarorat_functions_helper'); 
		$is_active = $this->request->getPost('is_active');
		$model = new AjaxCallsModel();
		$data = $model-> business_list_filter($is_active);
		echo $data;
	}
}