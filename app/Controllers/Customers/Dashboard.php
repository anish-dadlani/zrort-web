<?php namespace App\Controllers\Customers;
use App\Models\Customers\CustomerModel;
use App\Models\Customers\CustomerFavoritiesModel;
use App\Models\Businessadmin\CategoriesModel;
use App\Models\Zrortadmin\BusinessModel;
use App\Models\Customers\ProductsModel;
use App\Models\Customers\CustomerCartModel;
use App\Models\Customers\OrderModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Dashboard extends BaseController
{
    public function __construct(...$params)
	{
		helper('business_function_helper');
    }

    public function index()
    {
        if($this->session->get('UserAuth') == 'Yes')
            return redirect()->route('customer/dashboard');
        else
            echo view('customers/authentication/login');	
    }

    public function getBusinessListing()
    {
        $business_model = new BusinessModel();
        $categories_model = new CategoriesModel();
        $productModel = new ProductsModel();
        $customerCartModel = new CustomerCartModel();
        
        $displaydata['business'] = $business_model->getBusiness();
        $displaydata['categories'] = $categories_model->getCategories();
        $displaydata['products'] = $productModel->orderBy('created_datetime', 'DESC')->findAll();
        $displaydata['cart'] = $customerCartModel->select('*')->join('products', 'products.pk_id=customer_cart.product_id')->where('customer_id', $_SESSION['user_id'])->findAll();
		// $displaydata = [
        //     'business' => $business_model;//->paginate(5),
        //     'pager' => $business_model->pager
        // ];
        //print_r($displaydata['business']); exit;
        $data['pageTitle'] = 'Dashboard';
		$data['fileToLoad'] = '/customers/dashboard';
		$data['data'] = $displaydata;
		echo view('templates/customers/customer_template', $data);
    }

    public function customer_overview()
    {
        $business_model = new BusinessModel();
        $categories_model = new CategoriesModel();
        $customerCartModel = new CustomerCartModel();
        $orderModel = new OrderModel();

        $displaydata['business'] = $business_model->getBusiness();
        $displaydata['categories'] = $categories_model->getCategories();
        $displaydata['cart'] = $customerCartModel->select('*')->join('products', 'products.pk_id=customer_cart.product_id')->where('customer_id', $_SESSION['user_id'])->findAll();
    
        $displaydata['order_placed'] = $orderModel->select('o.total as t, p.name, count(distinct(od.product_id)) as total_items')
        ->from('orders o')
        ->join('customer_addresses ca ', 'ca.pk_id = o.address_id')
        ->join('order_detail od', 'o.pk_id = od.order_id')
        ->join('products p', 'p.pk_id = od.product_id')
        ->where('o.customer_id', $_SESSION['user_id'])
        ->orderby('o.created_datetime', 'desc')
        ->first();

        $displaydata['order_placed_pr'] = $orderModel->select('distinct(p.name)')
        ->from('orders o')
        ->join('order_detail od', 'o.pk_id = od.order_id')
        ->join('products p', 'p.pk_id = od.product_id')
        ->where('o.customer_id', $_SESSION['user_id'])
        ->orderby('o.created_datetime', 'desc')
        ->findAll();

        $data['pageTitle'] = 'Customer Profile';
		$data['fileToLoad'] = '/customers/profile/customer_profile';
		$data['data'] = $displaydata;
		echo view('templates/customers/main_template', $data);
    }

    public function customer_wishlist()
    {
        $business_model = new BusinessModel();
        $categories_model = new CategoriesModel();
        $productModel = new ProductsModel();
        $customerFavorities = new CustomerFavoritiesModel();
        $customerCartModel = new CustomerCartModel();
        $displaydata['cart'] = $customerCartModel->select('*')->join('products', 'products.pk_id=customer_cart.product_id')
                                        ->where('customer_id', $_SESSION['user_id'])->findAll();
        $id = $_SESSION['user_id'];
        $displaydata['business'] = $business_model->getBusiness();
        $displaydata['categories'] = $categories_model->getCategories();
        $displaydata['products'] = $customerFavorities->select('*')->join('products', 'products.pk_id = customer_favourities.product_id')
                                                    ->where('customer_favourities.customer_id',  $id)->findAll();
       //print_r($displaydata['products']); exit;

        $data['pageTitle'] = 'Customer Wishlist';
		$data['fileToLoad'] = '/customers/profile/customer_wishlist';
		$data['data'] = $displaydata;
		echo view('templates/customers/main_template', $data);
    }
}
?>