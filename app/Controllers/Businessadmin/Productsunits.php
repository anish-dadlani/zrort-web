<?php namespace App\Controllers\Businessadmin;
use App\Models\Businessadmin\ProductsunitsModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Productsunits extends BaseController
{
	public function __construct(...$params)
	{
		helper('zarorat_functions_helper');
	}
	public function index()
	{
		$model = new ProductsunitsModel();
		$displaydata['productsunits'] = $model->getProductsunits();
		$data['pageTitle'] = 'Products Units Listing';
		$data['fileToLoad'] = '/Businessadmin/productsunits/overview';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}

	public function view($slug = null)
	{
		$model = new ProductsunitsModel();
		$data['productsunits'] = $model->getProductsunits($slug);
	}
	public function add_productsunits()
	{
		$data['pageTitle'] = 'Products Units Add';
		$data['fileToLoad'] = '/Businessadmin/productsunits/add_productsunits';
		$data['data'] = $data;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function productsunits_save()
	{
		//print_r($_POST); exit();
		$model = new ProductsunitsModel();
		$user_id =   $this->session->get('user_id');
		if (! $this->validate([
			'unit_title' => 'required|min_length[3]',
			'description'  => 'required|min_length[20]',
			'is_active'  => 'required'
		]))
		{
			$data['pageTitle'] = 'Products Units Add';
			$data['fileToLoad'] = '/Businessadmin/productsunits/add_productsunits';
			$data['data'] = $data;
			echo view('templates/admin/zarorat_template', $data);

		}
		else
		{
			$data = array(
				'unit_title' => $this->request->getPost('unit_title'),
				'description' => $this->request->getPost('description'),
				'is_active' => $this->request->getPost('is_active'),
				'created_by' => $user_id,
				'updated_by' => $user_id 
			);
			$save = $model->productsunits_save($data); 
			zrortadmin_activityLog('configuration','ProductsUnits Added',$data);
			return redirect()->route('Productsunits');
		}
	}
	public function view_productsunits($id=null)
	{ 
		$model = new ProductsunitsModel();
		$displaydata['productsunits_view'] = $model->getProductsunits($id);
		$data['pageTitle'] = 'Products Units View';
		$data['fileToLoad'] = '/Businessadmin/productsunits/productsunits_view';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function edit_productsunits($id=null)
	{ 
		$model = new ProductsunitsModel();
		$displaydata['productsunits_edit'] = $model->getProductsunits($id);
		$data['pageTitle'] = 'Products Units Edit';
		$data['fileToLoad'] = '/Businessadmin/productsunits/productsunits_edit';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function delete_productsunits($id=null)
	{
		//print_r($id); exit();
		$model = new ProductsunitsModel();
		$data = array(
				/* 'is_active'=>"0",
				'is_active_date'=> date('Y-m-d h:i:s') */
		);
		$save =$model->delete_productsunits($id,$data);
		zrortadmin_activityLog('configuration','ProductsUnits Deleted',$data);
		return redirect()->route('Productsunits');
	}
	public function update_productsunits()
	{
		$model = new ProductsunitsModel();
		$id = $this->request->getPost('pk_id');
		$user_id =   $this->session->get('user_id');
			$data = array(
				'unit_title' => $this->request->getPost('unit_title'),
				'description' => $this->request->getPost('description'),
				'is_active' => $this->request->getPost('is_active'),
				'created_by' => $user_id,
				'updated_by' => $user_id
			);	
		$save = $model->update_productsunits($data,$id);
		zrortadmin_activityLog('configuration','ProductsUnits Updated',$data);
		return redirect()->route('Productsunits');
	}
}