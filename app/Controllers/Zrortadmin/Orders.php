<?php namespace App\Controllers\Zrortadmin;
use App\Models\Zrortadmin\OrdersModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Orders extends BaseController
{
	public function __construct(...$params)
	{
		helper('zarorat_functions_helper');
	}
	public function index()
	{
		$model = new OrdersModel();
		$displaydata['orders'] = $model->getOrders();
		$data['pageTitle'] = 'Order Listing';
		$data['fileToLoad'] = '/Zrortadmin/orders/orders_listing';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}

	public function view($slug = null)
	{
		$model = new OrdersModel();
		$data['orders'] = $model->getOrders($slug);
	}
	public function add_orders()
	{
		$data['pageTitle'] = 'Orders Add';
		$data['fileToLoad'] = '/Zrortadmin/orders/add_orders';
		$data['data'] = $data;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function orders_save()
	{
		//print_r($_POST); exit();
		$model = new OrdersModel();

		if (! $this->validate([
			/* 'goal' => 'required',
			'description'  => 'required',
			'priorityid'  => 'required',
			'color'  => 'required' */
		]))
		{
			$data['pageTitle'] = 'Orders Add';
			$data['fileToLoad'] = '/Zrortadmin/orders/add_orders';
			$data['data'] = $data;
			echo view('templates/admin/zarorat_template', $data);

		}
		else
		{
			$data = array(
				/* 'goal' => $this->request->getPost('goal'),
				'description' => $this->request->getPost('description'),
				'priorityid' => $this->request->getPost('priorityid'),
				'color' => $this->request->getPost('color'),
				'pk_desc_link' => $this->request->getPost('pk_desc_link'),
				'un_desc_link' => $this->request->getPost('un_desc_link'),
				'is_active'=>"1",
				'is_active_date'=> date('Y-m-d h:i:s') */
			);
			$save = $model->orders_save($data); 
			return redirect()->route('Orders');
		}
	}
	public function view_orders($id=null)
	{ 
		$model = new OrdersModel();
		$displaydata['orders_view'] = $model->getOrders($id);
		//$prioritiesmodel = new PrioritiesModel();
		//$data['get_priorities'] = $prioritiesmodel->getPriorities();
		$data['pageTitle'] = 'Order View';
		$data['fileToLoad'] = '/Zrortadmin/orders/orders_view';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function edit_goals($id=null)
	{ 
		$model = new OrdersModel();
		$displaydata['orders_edit'] = $model->getOrders($id);
		//$prioritiesmodel = new PrioritiesModel();
		//$data['get_priorities'] = $prioritiesmodel->getPriorities();
		$data['pageTitle'] = 'Orders Edit';
		$data['fileToLoad'] = '/Zrortadmin/orders/goals_edit';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function delete_goals($id=null)
	{
		//print_r($id); exit();
		$model = new OrdersModel();
		$data = array(
				/* 'is_active'=>"0",
				'is_active_date'=> date('Y-m-d h:i:s') */
		);
		$save =$model->delete_orders($id,$data);
		return redirect()->route('Orders');
	}
	public function update_orders()
	{
		$model = new OrdersModel();
		$id = $this->request->getPost('pk_id');
			$data = array(
				/* 'goal' => $this->request->getPost('goal'),
				'description' => $this->request->getPost('description'),
				'priorityid' => $this->request->getPost('priorityid'),
				'pk_desc_link' => $this->request->getPost('pk_desc_link'),
				'un_desc_link' => $this->request->getPost('un_desc_link'),
				'color' => $this->request->getPost('color'),
				'is_active'=>"1",
				'is_active_date'=> date('Y-m-d h:i:s') */
			);
		$save = $model->update_orders($data,$id);
		return redirect()->route('Orders');
	}
}