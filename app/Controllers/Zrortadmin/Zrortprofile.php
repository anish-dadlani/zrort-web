<?php namespace App\Controllers\Zrortadmin;
use App\Models\Zrortadmin\ZrortprofileModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Zrortprofile extends BaseController
{
	public function __construct(...$params)
	{
		helper('zarorat_functions_helper');
	}
	public function add_zrortprofile()
	{
		$model = new ZrortprofileModel();
		$data['zrortprofile'] = $model->getZrortprofile();
		$data['pageTitle'] = 'Zrort Profile';
		$data['fileToLoad'] = '/Zrortadmin/zrortprofile/update_zrortprofile';
		$data['data'] = $data;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function update_zrortprofile()
	{
		//print_r($_POST); exit();
		$model = new ZrortprofileModel();
		$id = $this->request->getPost('pk_id');
		$avatar= $this->request->getFile('file');
		$check_file =$avatar->getClientName();
		if(!empty($check_file)){
			$avatar = $this->request->getFile('file');
			$avatar->move('includes/images/ZrortAdmin/admin/');
			$filenname =$avatar->getClientName();
			$path  = $avatar->getTempName();
			$fullimgpath = $path . $filenname;
		}else{ 
			$fullimgpath =$this->request->getPost('updatepic');
		}
		$data = array(
			'username' => $this->request->getPost('username'),
			'first_name' => $this->request->getPost('first_name'),
			'middle_name' => $this->request->getPost('middle_name'),
			'last_name' => $this->request->getPost('last_name'),
			'is_super_admin' => $this->request->getPost('is_super_admin'),
			'contact_no' => $this->request->getPost('contact_no'),
			'email' => $this->request->getPost('email'),
			'image_path' =>  $fullimgpath,
			'thumbnail_path' =>  $fullimgpath
		);
		//print_r($data); exit();
		$save = $model->update_zrortprofile($data,$id); 
		zrortadmin_activityLog('configuration','ZrortProfile Updated',$data);
		return redirect()->route('ZrortProfile-Add');
		
	}
	public function update_zrortchangepassword()
	{
		$model = new ZrortprofileModel();
		$data['zrortprofile'] = $model->getZrortprofile();
		$data['pageTitle'] = 'Zrort Change Password';
		echo view('Zrortadmin/zrortprofile/update_zrortchangepassword', $data);
	}
	public function change_zrortprofilepassword()
	{
		$model = new ZrortprofileModel();
		$oldPassword1 = $this->request->getPost('oldpassword');
		$oldPassword = md5(md5($oldPassword1));
		$newPassword = $this->request->getPost('newpassword');
		$reNewpassword = $this->request->getPost('repeatnewpassword');
		$userName = $this->request->getPost('username');
		$data = $model->getzrortprofil_data($userName,$oldPassword);
		if(empty($data)){
			$script = '<script language="javascript" type="text/javascript">';
			$script .= 'alert("You Entered Wrong Old Password");';
			$script .= '</script>';
			echo $script;
			$location =base_url(). "/orders";
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
				$query =$this->db->table('zrort_admins')->where(['username' => $userName])->update($data);
				zrortadmin_activityLog('configuration','Zrort Change Password Updated',$data);
				if($this -> db -> affectedRows() > 0){
					$script = '<script language="javascript" type="text/javascript">';
					$script .= 'alert("Password Changed Successfully!");';
					$script .= '</script>';
					echo $script;
					$location =base_url(). "/Orders";
					echo '<script> window.location.href = "'.$location.'"</script>';
					exit();	
					
				} else {
					$script = '<script language="javascript" type="text/javascript">';
					$script .= 'alert("Error While Updating Password!");';
					$script .= '</script>';
					echo $script;
					$location =base_url(). "/ZrortChange-Password";
					echo '<script> window.location.href = "'.$location.'"</script>';
					exit();	
				}
			} else {
				$script = '<script language="javascript" type="text/javascript">';
				$script .= 'alert("Confirm Password does not match!");';
				$script .= '</script>';
				echo $script;
				$location =base_url(). "/ZrortChange-Password";
				echo '<script> window.location.href = "'.$location.'"</script>';
				exit();	
			}
		} 
		return redirect()->route('Orders');
	}
}