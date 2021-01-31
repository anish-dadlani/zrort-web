<?php namespace App\Controllers\Customers\authentication;
use App\Models\Customers\CustomerModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Register extends BaseController
{
    public function index()
    {
		  echo view('customers/authentication/signup');
    }
    
    public function register_customer()
    {
      $customer_model = new CustomerModel();
      $data = [
        'firstname' => $this->request->getPost('firstname'),
        'lastname'  => $this->request->getPost('lastname'),
        'username'  => $this->request->getPost('username'),
        'email' => $this->request->getPost('email'),
        'phone' => $this->request->getPost('phone'),
        'password_hash' => md5(md5($this->request->getPost('password_hash'))),
      ];

      if ($customer_model->save($data) === false)
      {
        return view('customers/authentication/signup', [
          'data'  => $data,
          'errors' => $customer_model->errors(),
        ]);
      }
      return redirect()->to(base_url('customer/'));
    }
}