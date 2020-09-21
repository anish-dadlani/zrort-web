<?php namespace App\Controllers\Businessadmin;
use App\Models\ProductsunitsModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Productsunits extends BaseController
{
	public function index()
	{
		$model = new ProductsunitsModel();
		$displaydata['productsunits'] = $model->getProductsunits();
		$data['pageTitle'] = 'Products Units Listing';
		$data['fileToLoad'] = '/productsunits/overview';
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
		$data['fileToLoad'] = '/productsunits/add_productsunits';
		$data['data'] = $data;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function productsunits_save()
	{
		//print_r($_POST); exit();
		$model = new ProductsunitsModel();

		if (! $this->validate([
			'unit_title' => 'required',
			'description'  => 'required',
			'is_active'  => 'required'
		]))
		{
			$data['pageTitle'] = 'Products Units Add';
			$data['fileToLoad'] = '/productsunits/add_productsunits';
			$data['data'] = $data;
			echo view('templates/admin/zarorat_template', $data);

		}
		else
		{
			$data = array(
				'unit_title' => $this->request->getPost('unit_title'),
				'description' => $this->request->getPost('description'),
				'is_active' => $this->request->getPost('is_active'),
				'created_by' => 1,
				'updated_by' => 1
			);
			$save = $model->productsunits_save($data); 
			return redirect()->route('productsunits');
		}
	}
	public function view_productsunits($id=null)
	{ 
		$model = new ProductsunitsModel();
		$displaydata['productsunits_view'] = $model->getProductsunits($id);
		$data['pageTitle'] = 'Products Units View';
		$data['fileToLoad'] = '/productsunits/productsunits_view';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function edit_productsunits($id=null)
	{ 
		$model = new ProductsunitsModel();
		$displaydata['productsunits_edit'] = $model->getProductsunits($id);
		$data['pageTitle'] = 'Products Units Edit';
		$data['fileToLoad'] = '/productsunits/productsunits_edit';
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
		return redirect()->route('productsunits');
	}
	public function update_productsunits()
	{
		$model = new ProductsunitsModel();
		$id = $this->request->getPost('pk_id');
			$data = array(
				'unit_title' => $this->request->getPost('unit_title'),
				'description' => $this->request->getPost('description'),
				'is_active' => $this->request->getPost('is_active'),
				'created_by' => 1,
				'updated_by' => 1
			);	
		$save = $model->update_productsunits($data,$id);
		return redirect()->route('productsunits');
	}
}