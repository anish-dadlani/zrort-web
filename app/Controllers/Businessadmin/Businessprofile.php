<?php namespace App\Controllers\Businessadmin;
use App\Models\Businessadmin\BusinessprofileModel;
use App\Models\Zrortadmin\BusinessModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Businessprofile extends BaseController
{
	public function __construct(...$params)
	{
		helper('business_function_helper');
	}
	public function add_Businessprofile()
	{
		$model = new BusinessprofileModel();
		$business_model = new BusinessModel();
		$data['businessprofile'] = $model->getBusinessprofile();
		$data['businessadminimage'] = $business_model->getBusiness();
		$data['pageTitle'] = 'Business Profile';
		$data['fileToLoad'] = '/Businessadmin/businessprofile/update_businessprofile';
		$data['data'] = $data;
		echo view('templates/business/business_template', $data);
	}
	public function update_businessprofile()
	{
		//print_r($_POST); exit();
		$model = new BusinessprofileModel();
		$id = $this->request->getPost('pk_id');
		/* $avatar= $this->request->getFile('file');
		$check_file =$avatar->getClientName();
		if(!empty($check_file)){
			$avatar = $this->request->getFile('file');
			$avatar->move('includes/images/BusinessAdmin/admin/');
			$filenname =$avatar->getClientName();
			$path  = $avatar->getTempName();
			$fullimgpath = $path . $filenname;
		}else{ 
			$fullimgpath =$this->request->getPost('updatepic');
		} */
		$data = array(
			'username' => $this->request->getPost('username'),
			'firstname' => $this->request->getPost('firstname'),
			'lastname' => $this->request->getPost('lastname'),
			'contact' => $this->request->getPost('contact'),
			'email' => $this->request->getPost('email')
		);
		//print_r($data); exit();
		$save = $model->update_businessprofile($data,$id); 
		businessadmin_activityLog('configuration','BusinessProfile Updated',$data);
		return redirect()->route('BusinessProfile-Add');
		
	}
	public function update_businesschangepassword()
	{
		$model = new BusinessprofileModel();
		$data['businessprofile'] = $model->getBusinessprofile();
		$data['pageTitle'] = 'Business Change Password';
		echo view('Businessadmin/businessprofile/update_businesschangepassword', $data);
	}
	public function change_businessprofilepassword()
	{
		$model = new BusinessprofileModel();
		$oldPassword1 = $this->request->getPost('oldpassword');
		$oldPassword = md5(md5($oldPassword1));
		$newPassword = $this->request->getPost('newpassword');
		$reNewpassword = $this->request->getPost('repeatnewpassword');
		$userName = $this->request->getPost('username');
		$data = $model->getbusinessprofil_data($userName,$oldPassword);
		if(empty($data)){
			$script = '<script language="javascript" type="text/javascript">';
			$script .= 'alert("You Entered Wrong Old Password");';
			$script .= '</script>';
			echo $script;
			$location =base_url(). "/Products";
			echo '<script> window.location.href = "'.$location.'"</script>';
			exit();	
		}else{
			$passwordDb = $data[0]['password_hash'];
		}
		if ($oldPassword == $passwordDb) {
			if ($newPassword == $reNewpassword) {
				$newPassword = md5(md5($newPassword));
				$reNewpassword = md5(md5($reNewpassword));
				$data = array(
					'password_hash'=>$newPassword
				);
				$query =$this->db->table('business_admins')->where(['username' => $userName])->update($data);
				businessadmin_activityLog('configuration','Business Change Password Updated',$data);
				if($this -> db -> affectedRows() > 0){
					$script = '<script language="javascript" type="text/javascript">';
					$script .= 'alert("Password Changed Successfully!");';
					$script .= '</script>';
					echo $script;
					$location =base_url(). "/Products";
					echo '<script> window.location.href = "'.$location.'"</script>';
					exit();	
					
				} else {
					$script = '<script language="javascript" type="text/javascript">';
					$script .= 'alert("Error While Updating Password!");';
					$script .= '</script>';
					echo $script;
					$location =base_url(). "/BusinessChange-Password";
					echo '<script> window.location.href = "'.$location.'"</script>';
					exit();	
				}
			} else {
				$script = '<script language="javascript" type="text/javascript">';
				$script .= 'alert("Confirm Password does not match!");';
				$script .= '</script>';
				echo $script;
				$location =base_url(). "/BusinessChange-Password";
				echo '<script> window.location.href = "'.$location.'"</script>';
				exit();	
			}
		} 
		return redirect()->route('Products');
	}
}