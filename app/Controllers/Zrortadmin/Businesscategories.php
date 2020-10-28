<?php namespace App\Controllers\Zrortadmin;
use App\Models\Zrortadmin\BusinesscategoriesModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Businesscategories extends BaseController
{
	public function __construct(...$params)
	{
		helper('zarorat_functions_helper');
	}
	public function index()
	{
		$pager = \Config\Services::pager();
		$model = new BusinesscategoriesModel();
		$displaydata['businesscategories'] = $model->getBusinesscategories();
		$displaydata = [
            'businesscategories' => $model->paginate(5),
            'pager' => $model->pager
        ];
		$data['pageTitle'] = 'Business Categories Listing';
		$data['fileToLoad'] = '/Zrortadmin/businesscategories/overview';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}

	public function view($slug = null)
	{
		$model = new BusinesscategoriesModel();
		$data['businesscategories'] = $model->getBusinesscategories($slug);
	}
	public function add_businesscategories()
	{
		$data['pageTitle'] = 'Business Categories Add';
		$data['fileToLoad'] = '/Zrortadmin/businesscategories/add_businesscategories';
		$data['data'] = $data;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function businesscategories_save()
	{
		$user_id =   $this->session->get('user_id');
		$model = new BusinesscategoriesModel();

		if (! $this->validate([
			'title' => 'required',
			'description'  => 'required|min_length[40]',
			'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
		]))
		{
			$data['pageTitle'] = 'Business Categories Add';
			$data['fileToLoad'] = '/Zrortadmin/businesscategories/add_businesscategories';
			$data['data'] = $data;
			echo view('templates/admin/zarorat_template', $data);

		}
		else
		{
			$avatar = $this->request->getFile('file');
            $avatar->move('includes/images/ZrortAdmin/businesscategories/');
			$filenname =$avatar->getClientName();
            $path  = $avatar->getTempName();
			$fullimgpath = $path . $filenname;
			//thumbnail
			/* $paththumb='./includes/images/ZrortAdmin/businesscategories/thumbs/';
			$files = $this->request->getFile();
			$image=service('image');
			foreach($files['file'] as $file){
				if($file->isValid() && !$file->hasMoved()){
					$file->move($paththumb);
					$fileName=$file->getName();
					
					if(!$file_exists($paththumb.'thumbs/'))
					mkdir($paththumb.'thumbs/',755);
				
				$image->withFile(src($fileName))
					->fit(150, 150, 'center')
					->save($paththumb.'thumbs/'.$fileName);
				}
			} */
			//var_dump($image); exit();
			
			$data = array(
				'title' => $this->request->getPost('title'),
				'description' => $this->request->getPost('description'),
				'is_active' => $this->request->getPost('is_active'),
				'image_path' =>  $fullimgpath,
				'thumbnail_path' =>	$fullimgpath,
				'created_by' => $user_id,
				'updated_by' => $user_id 
			);
			$save = $model->businesscategories_save($data); 
			zrortadmin_activityLog('configuration','Businesscategories Added',$data);
			return redirect()->route('Business-Categories');
		}
	}
	public function view_businesscategories($id=null)
	{ 
		$model = new BusinesscategoriesModel();
		$displaydata['businesscategories_view'] = $model->getBusinesscategories($id);
		$data['pageTitle'] = 'Business Categories View';
		$data['fileToLoad'] = '/Zrortadmin/businesscategories/businesscategories_view';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function edit_businesscategories($id=null)
	{ 
		$model = new BusinesscategoriesModel();
		$displaydata['businesscategories_edit'] = $model->getBusinesscategories($id);
		$data['pageTitle'] = 'Business Categories Edit';
		$data['fileToLoad'] = '/Zrortadmin/businesscategories/businesscategories_edit';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function delete_businesscategories($id=null)
	{
		$model = new BusinesscategoriesModel();
		$data = array(
				'is_active'=>"0",
				'udpated_datetime'=> date('Y-m-d h:i:s') 
		);
		$save =$model->delete_businesscategories($id);
		zrortadmin_activityLog('configuration','Businesscategories Deleted',$data);
		return redirect()->route('Business-Categories');
	}
	public function update_businesscategories()
	{
		$model = new BusinesscategoriesModel();
		$user_id =   $this->session->get('user_id');
		$id = $this->request->getPost('pk_id');
		$avatar=$this->request->getFile('file');
		$check_file =$avatar->getClientName();
		if(!empty($check_file)){
			$avatar = $this->request->getFile('file');
			$avatar->move('includes/images/ZrortAdmin/businesscategories/');
			$filenname =$avatar->getClientName();
			$path  = $avatar->getTempName();
			$fullimgpath = $path . $filenname;
		}else{ 
			$fullimgpath =$this->request->getPost('updatepic');
		}
			$data = array(
				'title' => $this->request->getPost('title'),
				'description' => $this->request->getPost('description'),
				'is_active' => $this->request->getPost('is_active'),
				'image_path' =>  $fullimgpath,
				'thumbnail_path' =>  $fullimgpath,
				'created_by' => $user_id,
				'updated_by' => $user_id
			);	
		$save = $model->update_businesscategories($data,$id);
		zrortadmin_activityLog('configuration','Businesscategories Updated',$data);
		return redirect()->route('Business-Categories');
	}
}