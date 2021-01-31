<?php namespace App\Controllers\Customers\authentication;
use App\Models\Customers\CustomerModel;
use App\Models\Zrortadmin\BusinessModel;
use App\Models\Customers\CustomerCartModel;
use App\Models\Businessadmin\CategoriesModel;
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
      $businessModel  = new BusinessModel();
      $categories_model = new CategoriesModel();
      $customerCartModel = new CustomerCartModel();
      $productModel = new ProductsModel();

      $username = $this->request->getPost('username');
      $password = md5(md5($this->request->getPost('password_hash')));

      $this->session->expire = time() + (120 * 120);
      $response = $customer_model->where(['username' => $username,'password_hash' => $password])->first();

      if(isset($response) && !empty($response))
      {
        $cart = $customerCartModel->select('*, customer_cart.quantity')->join('products', 'products.pk_id=customer_cart.product_id')->where('customer_id', $response['pk_id'])->findAll();
        $products = $productModel->orderBy('created_datetime', 'DESC')->findAll();
        $featured = $productModel->where('is_featured', '1')->findAll();
        $business = $businessModel->getBusiness();
        $categories = $categories_model->getCategories();

        $sessionData = array(
          'userLevel' => 'customer',
          'username'  => $response['username'],
          'firstname' => $response['firstname'],
          'lastname'  => $response['lastname'],
          'email'     => $response['email'],
          'phone'     => $response['phone'],
          'user_id' 	=> $response['pk_id'],
          'UserAuth'  => 'Yes',
          'business'  => $business,
          'categories' => $categories,
          'products' => $products,
          'featured' => $featured,
          'cart' => $cart
        );
        $this->session->set($sessionData);
        return redirect()->to(base_url('customer/dashboard'));
      }
      else
        return redirect()->to(base_url('customer/'))->with('message', 'Wrong Credentials! Try Again');
    }
    
    public function reset_password()
    {
      echo view('customers/authentication/forgot_password');
    }

    public function logout()
    {
      $this->session->destroy();
      return redirect()->to(base_url('customer/'))->with('msg', 'Logged out Successful');
    }
}