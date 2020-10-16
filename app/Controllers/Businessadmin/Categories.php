<?php namespace App\Controllers\Businessadmin;
use App\Models\Businessadmin\CategoriesModel;
use App\Models\Zrortadmin\BusinessModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Categories extends BaseController
{
	public function __construct(...$params)
	{
		helper('business_function_helper');
	}
	public function index()
	{
		$model = new CategoriesModel();
		$displaydata['categories'] = $model->getCategories();
		$data['pageTitle'] = 'Categories Listing';
		$data['fileToLoad'] = '/Businessadmin/categories/overview';
		$data['data'] = $displaydata;
		echo view('templates/business/business_template', $data);
	}

	public function view($slug = null)
	{
		$model = new CategoriesModel();
		$data['categories'] = $model->getCategories($slug);
	}
	public function add_categories()
	{
		$business_model = new BusinessModel();
		$data['business'] = $business_model->getBusiness();
		$data['pageTitle'] = 'Categories Add';
		$data['fileToLoad'] = '/Businessadmin/categories/add_categories';
		$data['data'] = $data;
		echo view('templates/business/business_template', $data);
	}
	public function categories_save()
	{
		//print_r($_POST); exit();
		$model = new CategoriesModel();
		$businessuser_id =   $this->session->get('businessuser_id');
		if (! $this->validate([
			'name' => 'required',
			'description'  => 'required|min_length[40]',
			'shortname'  => 'required',
			'tags'  => 'required',
			'list_order_numb'  => 'required|numeric',
			'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
		]))
		{
			$business_model = new BusinessModel();
			$data['business'] = $business_model->getBusiness();
			$data['pageTitle'] = 'Categories Add';
			$data['fileToLoad'] = '/Businessadmin/categories/add_categories';
			$data['data'] = $data;
			echo view('templates/business/business_template', $data);

		}
		else
		{
			$avatar = $this->request->getFile('file');
            $avatar->move('includes/images/BusinessAdmin/categories/');
			$filenname =$avatar->getClientName();
            $path  = $avatar->getTempName();
			$fullimgpath = $path . $filenname;
			$data = array(
				'name' => $this->request->getPost('name'),
				'shortname' => $this->request->getPost('shortname'),
				'list_order_numb' => $this->request->getPost('list_order_numb'),
				'tags' => $this->request->getPost('tags'),
				'bussiness_id' => $this->request->getPost('bussiness_id'),
				'is_active' => $this->request->getPost('is_active'),
				'description' => $this->request->getPost('description'),
				'image_path' =>  $fullimgpath,
				'thumbnail_path' =>  $fullimgpath,
				'created_by' => $businessuser_id,
				'updated_by' => $businessuser_id
			);
			$save = $model->categories_save($data); 
			businessadmin_activityLog('configuration','Categories Added',$data);
			return redirect()->route('Categories');
		}
	}
	public function view_categories($id=null)
	{ 
		$model = new CategoriesModel();
		$displaydata['categories_view'] = $model->getCategories($id);
		$business_model = new BusinessModel();
		$data['business'] = $business_model->getBusiness();
		$data['pageTitle'] = 'Categories View';
		$data['fileToLoad'] = '/Businessadmin/categories/categories_view';
		$data['data'] = $displaydata;
		echo view('templates/business/business_template', $data);
	}
	public function edit_categories($id=null)
	{ 
		$model = new CategoriesModel();
		$displaydata['categories_edit'] = $model->getCategories($id);
		$business_model = new BusinessModel();
		$data['business'] = $business_model->getBusiness();
		$data['pageTitle'] = 'Categories Edit';
		$data['fileToLoad'] = '/Businessadmin/categories/categories_edit';
		$data['data'] = $displaydata;
		echo view('templates/business/business_template', $data);
	}
	public function delete_categories($id=null)
	{
		$model = new CategoriesModel();
		$data = array(
				'is_active'=>"0",
				'udpated_datetime'=> date('Y-m-d h:i:s') 
		);
		$save =$model->delete_categories($id,$data);
		businessadmin_activityLog('configuration','Categories Deleted',$data);
		return redirect()->route('Categories');
	}
	public function update_categories()
	{
		//print_r($_POST); exit();
		$model = new CategoriesModel();
		$id = $this->request->getPost('pk_id');
		$businessuser_id =   $this->session->get('businessuser_id');
		$avatar=$this->request->getFile('file');
		$check_file =$avatar->getClientName();
		if(!empty($check_file)){
			$avatar = $this->request->getFile('file');
			$avatar->move('includes/images/BusinessAdmin/categories/');
			$filenname =$avatar->getClientName();
			$path  = $avatar->getTempName();
			$fullimgpath = $path . $filenname;
		}else{ 
			$fullimgpath =$this->request->getPost('updatepic');
		}
			$data = array(
				'name' => $this->request->getPost('name'),
				'shortname' => $this->request->getPost('shortname'),
				'list_order_numb' => $this->request->getPost('list_order_numb'),
				'tags' => $this->request->getPost('tags'),
				'bussiness_id' => $this->request->getPost('bussiness_id'),
				'is_active' => $this->request->getPost('is_active'),
				'description' => $this->request->getPost('description'),
				'image_path' =>  $fullimgpath,
				'thumbnail_path' =>  $fullimgpath,
				'created_by' => $businessuser_id,
				'updated_by' => $businessuser_id
			);		
		$save = $model->update_categories($data,$id);
		businessadmin_activityLog('configuration','Categories Updated',$data);
		return redirect()->route('Categories');
	}
}