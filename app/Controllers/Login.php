<?php namespace App\Controllers;
use App\Models\LoginModel;

class Login extends BaseController
{
	public function index(){
		//print_r($this->session); //exit();
		if($this->session->get('UserAuth') == 'Yes' && $this->session->get('role')> 0){
			//echo 'ab'; exit(); 
			return redirect()->to('orders');
			//return redirect()->to(base_url().'/'.$this->session->get('basePath'));
		}else{ //echo $this->session(); exit();
			//echo 'a'; exit(); 
			echo view('login/login');
		}
	}
	public function login_user()
	{	
		$model = new LoginModel();
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$curr_date = date("Y-m-d");
		//$ip = $_SERVER['REMOTE_ADDR'];
		//$this -> session -> expire = time() + (120 * 120);
		$row = $model -> authenticate_user($username, $password);
		$row=$row[0];
		//print_r($row); exit();
		if($row > 0){
			$sessionData = array(
				'userLevel' => $row['is_super_admin'],
				//'logid' 	=> $row['user_id'],
				'username'  => $row['username'],
				'user_id' 	=> $row['pk_id'],
				'UserAuth'  => 'Yes',
				'role' => $row['role_id']
			);
			//print_r($sessionData); exit();
			$this->session-> set($sessionData);
			//print_r($this->session);
			return redirect()->to(base_url())->with('msg', 'Logged in Successful');
		}else{
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