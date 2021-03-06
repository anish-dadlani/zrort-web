<?php namespace App\Controllers\Customers\authentication;
use App\Models\Customers\CustomerModel;
use App\Models\Zrortadmin\BusinessModel;
use App\Models\Customers\CustomerCartModel;
use App\Models\Businessadmin\CategoriesModel;
use App\Models\Businessadmin\BusinessCategoriesModel;
use App\Models\Customers\ProductsModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Login extends BaseController
{
    public function index()
    {
      if($this->session->get('UserAuth') == 'Yes')
        return redirect()->route('customer/dashboard');
      else
        echo view('customers/authentication/login');		  
    }

    public function authentication()
    {
      $customer_model = new CustomerModel();
      $customerCartModel = new CustomerCartModel();
      $username = $this->request->getPost('username');
      $password = md5(md5($this->request->getPost('password_hash')));
      $response = $customer_model->where(['username' => $username])->first();

      if(isset($response) && !empty($response))
      {
        if($password == $response['password_hash'])
        {
          $this->session->expire = time() + (120 * 120);
          $cart = $customerCartModel->select('*, customer_cart.quantity')->join('products', 'products.pk_id=customer_cart.product_id')->where('customer_id', $response['pk_id'])->findAll();
          $sessionData = array(
            'userLevel' => 'customer',
            'username'  => $response['username'],
            'firstname' => $response['firstname'],
            'lastname'  => $response['lastname'],
            'email'     => $response['email'],
            'phone'     => $response['phone'],
            'user_id' 	=> $response['pk_id'],
            'UserAuth'  => 'Yes',
            'cart' => $cart,
          );
          $this->session->set($sessionData);
          return redirect()->to(base_url('/'));
        }
        else
        {
          return redirect()->to(base_url('customer/'))->with('message', 'Wrong Credentials! Try Again');
        }
      }
      else
      {
        return redirect()->to(base_url('customer/'));
      }
    }
    
    public function reset_password()
    {
      echo view('customers/authentication/forgot_password');
    }

    public function logout()
    {
      $this->session->destroy();
      return redirect()->to(base_url('customer/'))->with('message', 'Logged out Successful');
    }
}