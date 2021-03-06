<?php 
namespace App\Controllers\Businessadmin;
use App\Models\Businessadmin\LoginModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Login extends BaseController
{
	public function index(){
		if($this->session->get('UserAuth') == 'Yes'){
			return redirect()->route('Products');
		}
		else{
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
		// $row=$row[0];
		if($row > 0){
			$sessionData = array(
				'username' => $row[0]['username'],
				'businessuser_id' => $row[0]['pk_id'],
				'zrortuser_id' => $row[0]['created_by'],
				'UserAuth' => 'Yes'
			);
			// print_r($sessionData); exit;
			$this->session->set($sessionData);
			return redirect()->to('index')->with('msg', 'Logged in Successful');
		}
		else{
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