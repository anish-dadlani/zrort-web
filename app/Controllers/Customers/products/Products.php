<?php namespace App\Controllers\Customers\products;
use App\Models\Customers\CustomerModel;
use App\Models\Customers\ProductsModel;
use App\Models\Businessadmin\CategoriesModel;
use App\Models\Customers\CustomerFavoritiesModel;
use App\Models\Zrortadmin\BusinessModel;
use App\Models\Customers\CustomerCartModel;
use App\Libraries\Cart;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Products extends BaseController
{
    public function __construct(...$params)
	{
        helper('business_function_helper');       
    }
    
    public function index(){}

    public function recent_products($id)
    {
        $productModel = new ProductsModel();
        $displaydata['products'] = $productModel->where('bussiness_id', $id)->orderBy('created_datetime', 'DESC')->findAll();

        $data['pageTitle'] = 'New Products';
        $data['fileToLoad'] = '/customers/products/recent_products';
        $data['data'] = $displaydata;

        echo view('templates/products/template', $data);
    }

    public function featured_products($id)
    {
        $productModel = new ProductsModel();
        $displaydata['products'] = $productModel->where('is_featured', '1')->where('bussiness_id', $id)->findAll();

        $data['pageTitle'] = 'Featured Products';
        $data['fileToLoad'] = '/customers/products/featured_products';
        $data['data'] = $displaydata;

        echo view('templates/products/template', $data);
    }

    public function all_products()
    {
        $productModel = new ProductsModel();
        $displaydata['products'] = $productModel->orderBy('pk_id', 'asc')->findAll();

        $data['pageTitle'] = 'All Products';
        $data['fileToLoad'] = '/customers/products/all_products';
        $data['data'] = $displaydata;

        echo view('templates/products/template', $data);
    }

    public function getProductByCatID($id=null)
    {
        $business_model = new BusinessModel();
        $categories_model = new CategoriesModel();
        $productModel = new ProductsModel();

        $displaydata['products'] = $productModel->where('product_category_id', $id)->orderBy('created_datetime', 'DESC')->findAll();
        $displaydata['cat_id'] = $id;

        $data['pageTitle'] = 'Products Based on Category';
        $data['fileToLoad'] = '/customers/products/productsByCatId';
        $data['data'] = $displaydata;

        echo view('templates/products/template', $data);
    }

    public function getSingleProductDetails($id=null)
    {
        $productModel = new ProductsModel();
        $displaydata['products'] = $productModel->where('pk_id', $id)->findAll();
        $displaydata['product_by_category'] = $productModel->where('product_category_id',$displaydata['products'][0]['product_category_id'])->findAll();
        $displaydata['product_id'] = $id;

        $data['pageTitle'] = 'Product Detail';
        $data['fileToLoad'] = '/customers/products/single_product';
        $data['data'] = $displaydata;

        echo view('templates/products/template', $data);
    }

    public function add_to_wishlist($productID)
    {
        $CustomerFavoritiesModel = new CustomerFavoritiesModel();
        $db    = \Config\Database::connect();
        $id = $_SESSION['user_id'];
        $check_product_exist_in_wishlist = $CustomerFavoritiesModel->where('customer_id',$id)->where('product_id', $productID)->first();
  
        if(!empty($check_product_exist_in_wishlist)){
            echo "Yes";
        }else{
            $db->query("insert into customer_favourities(customer_id, product_id) values($id,$productID)");
        }
    }

    public function remove_from_wishlist($productID)
    {
        $db    = \Config\Database::connect();
        $id = $_SESSION['user_id'];
        $db->query("delete from customer_favourities where customer_id = $id and product_id = $productID");
    }

    public function getProductsByBusinessID($business_id)
    {
        $businessModel = new BusinessModel();
        $categories_model = new CategoriesModel();

        $displaydata['products'] = $businessModel->join('products', 'products.bussiness_id = business.pk_id')->where('business.pk_id', $business_id)->orderBy('products.created_datetime', 'DESC')->findAll();
        $displaydata['featured'] = $businessModel->join('products', 'products.bussiness_id = business.pk_id')->where('business.pk_id', $business_id)->where('products.is_featured', '1')->findAll();
        $displaydata['categories'] = $categories_model->select('product_categories.*')->join('business', 'bussiness_id = business.pk_id')->where('business.pk_id', $business_id)->findAll();
        $displaydata['business_id'] = $business_id;

        $data['pageTitle'] = 'Business Products';
        $data['fileToLoad'] = '/customers/dashboard';
        $data['data'] = $displaydata;

        echo view('templates/customers/customer_template_two', $data);
    }

    public function view_all_business()
    {
        $displaydata = [];
        $data['pageTitle'] = 'Business';
        $data['fileToLoad'] = '/customers/products/show_business';
        $data['data'] = $displaydata;

        echo view('templates/products/template', $data);
    }

    public function addToCart($product_id=null)
    {
        $productModel = new ProductsModel();
        $customerCartModel = new CustomerCartModel();
        $product = $productModel -> where('pk_id', $product_id) -> first();
        
        $data = [
            'customer_id' => $_SESSION['user_id'],
            'product_id' => $product_id,
            'quantity' => '1',
        ];

        $check_product_exist_in_cart = $customerCartModel -> where($data) -> first();
        if (!empty($check_product_exist_in_cart)){
            echo "Yes";
        }else{
            $customerCartModel->insert($data);
            $cart = $customerCartModel->select('*, customer_cart.quantity')->join('products', 'products.pk_id=customer_cart.product_id')->where('customer_id', $_SESSION['user_id'])->findAll();
            $_SESSION['cart'] = $cart;
        }
    }

    public function removeFromCart($product_id=null)
    {
        $customerCartModel = new CustomerCartModel();
        $data = [
            'customer_id' => $_SESSION['user_id'],
            'product_id' => $product_id,
        ];
        $customerCartModel->where($data)->delete();
        $cart = $customerCartModel->select('*')->join('products', 'products.pk_id=customer_cart.product_id')->where('customer_id', $_SESSION['user_id'])->findAll();
        $_SESSION['cart'] = $cart;
    }

    public function count_product_wishlist()
    {
        $customerFavorities = new CustomerFavoritiesModel();
        $favoritiesCount = $customerFavorities->select('count(product_id) as num')->where('customer_id', $_SESSION['user_id'])->findAll();
        return $favoritiesCount[0]['num'];
    }

    public function searchForProducts()
    {
        $search = $this->request->getPost('search');
        $productModel = new ProductsModel();
        $searchResult = $productModel->like('name', $search)->findAll();
        foreach ($searchResult as $key => $row):
            echo "<li><a href='" . base_url('products/view/'.$row['pk_id']) . "'>" . $row['name'] . "</a></li>";
        endforeach;
    }

    public function count_product_cart()
    {
        $customerCart = new CustomerCartModel();
        $cartCount = $customerCart->select('count(product_id) as num')->where('customer_id', $_SESSION['user_id'])->findAll();
        return $cartCount[0]['num'];
    }

    public function getProductPrice($product_id)
    {
        $productModel = new ProductsModel();
        $data = $productModel -> select('unit_price, discount_amount') -> where('pk_id', $product_id) -> first();
        echo json_encode($data);
    }
}
?>