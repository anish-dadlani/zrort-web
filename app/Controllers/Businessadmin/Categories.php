<?php namespace App\Controllers\Businessadmin;
use App\Models\CategoriesModel;
use App\Models\BusinessModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Categories extends BaseController
{
	public function index()
	{
		$model = new CategoriesModel();
		$displaydata['categories'] = $model->getCategories();
		$data['pageTitle'] = 'Categories Listing';
		$data['fileToLoad'] = '/categories/overview';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}

	public function view($slug = null)
	{
		$model = new CategoriesModel();
		$data['categories'] = $model->getCategories($slug);
	}
	public function add_categories()
	{
		//$user_id =   $this->session->get('user_id');
		//print_r($user_id); exit();
		$business_model = new BusinessModel();
		$data['business'] = $business_model->getBusiness();
		$data['pageTitle'] = 'Categories Add';
		$data['fileToLoad'] = '/categories/add_categories';
		$data['data'] = $data;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function categories_save()
	{
		//print_r($_POST); exit();
		helper(['form', 'url']);
		$model = new CategoriesModel();

		if (! $this->validate([
			'name' => 'required',
			'description'  => 'required',
			'shortname'  => 'required',
			'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
		]))
		{
			$data['pageTitle'] = 'Categories Add';
			$data['fileToLoad'] = '/categories/add_categories';
			$data['data'] = $data;
			echo view('templates/admin/zarorat_template', $data);

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
				'bussiness_id' => $this->request->getPost('bussiness_id'),
				'is_active' => $this->request->getPost('is_active'),
				'description' => $this->request->getPost('description'),
				'image_path' =>  $fullimgpath,
				'thumbnail_path' =>  $fullimgpath,
				'created_by' => 1,
				'updated_by' => 1,
				'created_datetime' => date('Y-m-d H:i:s')
			);
			$save = $model->categories_save($data); 
			return redirect()->route('categories');
		}
	}
	public function view_categories($id=null)
	{ 
		$model = new CategoriesModel();
		$displaydata['categories_view'] = $model->getCategories($id);
		$business_model = new BusinessModel();
		$data['business'] = $business_model->getBusiness();
		$data['pageTitle'] = 'Categories View';
		$data['fileToLoad'] = '/categories/categories_view';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function edit_categories($id=null)
	{ 
		$model = new CategoriesModel();
		$displaydata['categories_edit'] = $model->getCategories($id);
		$business_model = new BusinessModel();
		$data['business'] = $business_model->getBusiness();
		$data['pageTitle'] = 'Categories Edit';
		$data['fileToLoad'] = '/categories/categories_edit';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function delete_categories($id=null)
	{
		$model = new CategoriesModel();
		$data = array(
				'is_active'=>"0",
				'udpated_datetime'=> date('Y-m-d h:i:s') 
		);
		$save =$model->delete_categories($id,$data);
		return redirect()->route('categories');
	}
	public function update_categories()
	{
		//print_r($_POST); exit();
		$model = new CategoriesModel();
		$id = $this->request->getPost('pk_id');
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
				'bussiness_id' => $this->request->getPost('bussiness_id'),
				'is_active' => $this->request->getPost('is_active'),
				'description' => $this->request->getPost('description'),
				'image_path' =>  $fullimgpath,
				'thumbnail_path' =>  $fullimgpath,
				'created_by' => 1,
				'updated_by' => 1,
				'udpated_datetime' => date('Y-m-d H:i:s')
			);		
		$save = $model->update_categories($data,$id);
		return redirect()->route('categories');
	}
}