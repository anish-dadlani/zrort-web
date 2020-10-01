<?php namespace App\Controllers\Zrortadmin;
use App\Models\Zrortadmin\BusinessModel;
use App\Models\Zrortadmin\BusinessadminsModel;
use App\Models\Zrortadmin\BusinesscategoriesModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Business extends BaseController
{
	public function __construct(...$params)
	{
		helper('zarorat_functions_helper');
	}
	public function index()
	{
		$model = new BusinessModel();
		$displaydata['business'] = $model->getBusiness();
		$data['pageTitle'] = 'Business Listing';
		$data['fileToLoad'] = '/Zrortadmin/business/overview';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}

	public function view($slug = null)
	{
		$model = new BusinessModel();
		$data['business'] = $model->getBusiness($slug);
	}
	public function add_business()
	{
		$businesscategories_model = new BusinesscategoriesModel();
		$data['get_businesscategories'] = $businesscategories_model->getBusinesscategories();
		$data['pageTitle'] = 'Business Add';
		$data['fileToLoad'] = '/Zrortadmin/business/add_business';
		$data['data'] = $data;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function business_save()
	{
		$model = new BusinessModel();
		$businessadmins_model = new BusinessadminsModel();
		$user_id =   $this->session->get('user_id');
		if (! $this->validate([ 
			'business_number' => 'required|numeric',
			'name'  => 'required|alpha|min_length[3]',
			'country'  => 'required|alpha', 
			'state'  => 'required|alpha', 
			'city'  => 'required|alpha', 
			'postalcode'  => 'required|numeric', 
			'lat'  => 'required|numeric', 
			'lang'  => 'required|numeric', 
			'business_website'  => 'required', 
			'business_email'  => 'required|valid_email', 
			'business_mobile'  => 'required|numeric|max_length[10]', 
			'business_landline'  => 'required|numeric|max_length[8]', 
			'business_address'  => 'required|min_length[5]', 
			'status'  => 'required|alpha', 
			'is_active'  => 'required', 
			'delivery_fee'  => 'required|numeric', 
			'min_delivery_price'  => 'required|numeric', 
			'min_delivery_time'  => 'required', 
			'firstname'  => 'required|min_length[3]|alpha', 
			'lastname'  => 'required|min_length[3]|alpha', 
			'username'  => 'required|min_length[3]|alpha', 
			'password_hash'  => 'required',
			'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
		]))
		{   
			$businesscategories_model = new BusinesscategoriesModel();
			$data['get_businesscategories'] = $businesscategories_model->getBusinesscategories();
			$data['pageTitle'] = 'Business Add';
			$data['fileToLoad'] = '/Zrortadmin/business/add_business';
			$data['data'] = $data;
			echo view('templates/admin/zarorat_template', $data);

		}
		else
		{	
			//coverphoto
			$avatar = $this->request->getFile('file');
            $avatar->move('includes/images/ZrortAdmin/businessproducts/');
			$filenname =$avatar->getClientName();
            $path  = $avatar->getTempName();
			$fullimgpath = $path . $filenname;
			//business_logo
			$avatar_logo = $this->request->getFile('logofile');
            $avatar_logo->move('includes/images/ZrortAdmin/businessproductslogo/');
			$logoname =$avatar_logo->getClientName();
            $path_logo  = $avatar_logo->getTempName();
			$business_logo = $path_logo . $logoname;
			
			$password=$this->request->getPost('password_hash');
			$password_hash = md5(md5($password));
			$business_admin_data = array(
				'firstname' => $this->request->getPost('firstname'),
				'lastname' => $this->request->getPost('lastname'),
				'username' => $this->request->getPost('username'),
				'password_hash' => $password_hash,
				'email' => $this->request->getPost('business_email'),
				'contact' => $this->request->getPost('business_mobile'),
				'created_by' =>  $user_id,
				'updated_by' =>  $user_id
			); 
			$business_admin_id = $businessadmins_model->businessadmins_save($business_admin_data); 
			zrortadmin_activityLog('configuration','BusinessAdmin Added',$business_admin_data);;
			$business_data = array(
				'business_number' => $this->request->getPost('business_number'),
				'name' => $this->request->getPost('name'),
				'tagline' => $this->request->getPost('tagline'),
				'description' => $this->request->getPost('description'),
				'country' => $this->request->getPost('country'),
				'state' => $this->request->getPost('state'),
				'city' => $this->request->getPost('city'),
				'postalcode' => $this->request->getPost('postalcode'),
				'lat' => $this->request->getPost('lat'),
				'lang' => $this->request->getPost('lang'),
				'business_website' => $this->request->getPost('business_website'),
				'business_email' => $this->request->getPost('business_email'),
				'business_mobile' => $this->request->getPost('business_mobile'),
				'business_landline' => $this->request->getPost('business_landline'),
				'business_address' => $this->request->getPost('business_address'),
				'status' => $this->request->getPost('status'),
				'is_active' => $this->request->getPost('is_active'),
				'delivery_fee' => $this->request->getPost('delivery_fee'),
				'min_delivery_price' => $this->request->getPost('min_delivery_price'),
				'min_delivery_time' => $this->request->getPost('min_delivery_time'),
				'business_admin_id' => $business_admin_id,
				'business_category_id' =>$this->request->getPost('business_category_id'),
				'cover_photo' => $fullimgpath,
				'business_logo' => $business_logo,
				'created_by' => $user_id,
				'updated_by' => $user_id
			);  
			$save = $model->business_save($business_data);
			zrortadmin_activityLog('configuration','Business Added',$business_data);			
			return redirect()->route('Business');
		}
	}
	public function view_business($id=null)
	{ 
		$model = new BusinessModel();
		$displaydata['business_view'] = $model->getBusiness($id);
		$business_admin_id=$displaydata['business_view'][0]['business_admin_id'];
		$businessadmins_model = new BusinessadminsModel();
		$displaydata['get_businessadmin'] = $businessadmins_model->getBusinessadmins($business_admin_id);
		$businesscategories_model = new BusinesscategoriesModel();
		$displaydata['get_businesscategories'] = $businesscategories_model->getBusinesscategories();
		$data['pageTitle'] = 'Business View';
		$data['fileToLoad'] = '/Zrortadmin/business/business_view';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function edit_business($id=null)
	{ 
		$model = new BusinessModel();
		$displaydata['business_edit'] = $model->getBusiness($id);
		$business_admin_id=$displaydata['business_edit'][0]['business_admin_id'];
		$businessadmins_model = new BusinessadminsModel();
		$displaydata['get_businessadmin'] = $businessadmins_model->getBusinessadmins($business_admin_id);
		$businesscategories_model = new BusinesscategoriesModel();
		$displaydata['get_businesscategories'] = $businesscategories_model->getBusinesscategories();
		$data['pageTitle'] = 'Business Edit';
		$data['fileToLoad'] = '/Zrortadmin/business/business_edit';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function delete_business($id=null)
	{
		$model = new BusinessModel();
		$data = array(
				'is_active'=>"0",
				'udpated_datetime'=> date('Y-m-d h:i:s')
		);
		$save =$model->delete_business($id,$data);
		zrortadmin_activityLog('configuration','Business Deleted',$data);
		return redirect()->route('Business');
	}
	public function update_business()
	{
		$model = new BusinessModel();
		$businessadmins_model = new BusinessadminsModel();
		$id = $this->request->getPost('pk_id');
		$user_id =   $this->session->get('user_id');
		//cover photo
		$avatar=$this->request->getFile('file');
		$check_file =$avatar->getClientName();
		if(!empty($check_file)){
			$avatar = $this->request->getFile('file');
			$avatar->move('includes/images/ZrortAdmin/businessproducts/');
			$filenname =$avatar->getClientName();
			$path  = $avatar->getTempName();
			$fullimgpath = $path . $filenname;
		}else{ 
			$fullimgpath =$this->request->getPost('updatepic');
		}
		// logofile
		
		$avatar_logo=$this->request->getFile('logofile');
		$check_logo =$avatar_logo->getClientName();
		if(!empty($check_logo)){
			$avatar_logo = $this->request->getFile('logofile');
			$avatar_logo->move('includes/images/ZrortAdmin/businessproductslogo/');
			$logoname =$avatar_logo->getClientName();
			$path_logo  = $avatar_logo->getTempName();
			$business_logo = $path_logo . $logoname;
		}else{ 
			$business_logo =$this->request->getPost('updatepic_logo');
		}
		
		$password=$this->request->getPost('password_hash');
		$business_admin_id=$this->request->getPost('business_admin_id');
			$password_hash = md5(md5($password));
			$business_admin_data = array(
				'firstname' => $this->request->getPost('firstname'),
				'lastname' => $this->request->getPost('lastname'),
				'username' => $this->request->getPost('username'),
				'password_hash' => $password_hash,
				'email' => $this->request->getPost('business_email'),
				'contact' => $this->request->getPost('business_mobile'),
				'created_by' => $user_id,
				'updated_by' => $user_id
			); 
			$update_admindata = $businessadmins_model->update_businessadmins($business_admin_data,$business_admin_id); 
			zrortadmin_activityLog('configuration','BusinessAdmin Updated',$business_admin_data);
			$business_data = array(
				'business_number' => $this->request->getPost('business_number'),
				'name' => $this->request->getPost('name'),
				'tagline' => $this->request->getPost('tagline'),
				'description' => $this->request->getPost('description'),
				'country' => $this->request->getPost('country'),
				'state' => $this->request->getPost('state'),
				'city' => $this->request->getPost('city'),
				'postalcode' => $this->request->getPost('postalcode'),
				'lat' => $this->request->getPost('lat'),
				'lang' => $this->request->getPost('lang'),
				'business_website' => $this->request->getPost('business_website'),
				'business_email' => $this->request->getPost('business_email'),
				'business_mobile' => $this->request->getPost('business_mobile'),
				'business_landline' => $this->request->getPost('business_landline'),
				'business_address' => $this->request->getPost('business_address'),
				'status' => $this->request->getPost('status'),
				'is_active' => $this->request->getPost('is_active'),
				'delivery_fee' => $this->request->getPost('delivery_fee'),
				'min_delivery_price' => $this->request->getPost('min_delivery_price'),
				'min_delivery_time' => $this->request->getPost('min_delivery_time'),
				'business_admin_id' => $business_admin_id,
				'business_category_id' =>$this->request->getPost('business_category_id'),
				'cover_photo' => $fullimgpath,
				'business_logo' => $business_logo,
				'created_by' => $user_id,
				'updated_by' => $user_id
			);  
		$save = $model->update_business($business_data,$id);
		zrortadmin_activityLog('configuration','Business Updated',$business_data);
		return redirect()->route('Business');
	}
}