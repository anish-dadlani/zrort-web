<?php namespace App\Controllers\Businessadmin;
use App\Models\Businessadmin\LoginModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Login extends BaseController
{
	public function index(){
		//print_r($this->session); //exit();
		if($this->session->get('UserAuth') == 'Yes'){
			//print_r('a'); exit();
			return redirect()->route('Products');
		}else{  //print_r('b'); exit();
			echo view('Businessadmin/businesslogin/login');
		}
	}
	public function login_user()
	{	
		$model = new LoginModel();
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$curr_date = date("Y-m-d");
		$this -> session -> expire = time() + (120 * 120);
		$row = $model -> authenticate_user($username, $password);
		$row=$row[0];
		//print_r($row); exit();
		if($row > 0){
			$sessionData = array(
				'username'  => $row['username'],
				'businessuser_id' 	=> $row['pk_id'],
				'zrortuser_id' 	=> $row['created_by'],
				'UserAuth'  => 'Yes'
			);
			//print_r($sessionData); exit();
			$this->session-> set($sessionData);
			//print_r($this->session); exit();
			return redirect()->to('index')->with('msg', 'Logged in Successful');
		}else{
			return redirect()->to('index')->with('message', 'Wrong Credentials! Try Again');
		}
	}
	public function logout()
	{
		$businessuser_id = session('businessuser_id');
		$model = new LoginModel();
		$model -> update_authenticate_user($businessuser_id);
		$this->session->destroy();
		return redirect()->to(base_url())->with('msg', 'Logged out Successful');
	}
}