<?php namespace App\Controllers\Zrortadmin;
use App\Models\Zrortadmin\LoginModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Login extends BaseController
{
	public function index(){
		if($this->session->get('UserAuth') == 'Yes' && $this->session->get('role')> 0){
			return redirect()->route('Orders');
			//return redirect()->to(base_url().'/'.$this->session->get('basePath'));
		}else{ 
			echo view('Zrortadmin/zrortlogin/login');
		}
	}
	public function login_user()
	{	
		$model = new LoginModel();
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$curr_date = date("Y-m-d");
		//$ip = $_SERVER['REMOTE_ADDR'];
		$this -> session -> expire = time() + (120 * 120);
		$row = $model -> authenticate_user($username, $password);
		// $row=$row[0];
		// print_r($row); exit();
		if($row > 0){
			$sessionData = array(
				'userLevel' => $row[0]['is_super_admin'],
				//'logid' 	=> $row[0]['user_id'],
				'username'  => $row[0]['username'],
				'user_id' 	=> $row[0]['pk_id'],
				'UserAuth'  => 'Yes',
				'role' => $row[0]['role_id']
			);
			$this->session-> set($sessionData);
			return redirect()->to(base_url())->with('msg', 'Logged in Successful');
		}
		else{
			return redirect()->to(base_url())->with('message', 'Wrong Credentials! Try Again');
		}
	}
	public function logout()
	{
		$user_id = session('user_id');
		$model = new LoginModel();
		$model -> update_authenticate_user($user_id);
		$this->session->destroy();
		return redirect()->to(base_url())->with('msg', 'Logged out Successful');
	}
}