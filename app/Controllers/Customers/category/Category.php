<?php namespace App\Controllers\Customers\category;
use App\Models\Customers\CustomerModel;
use App\Models\Customers\ProductsModel;
use App\Models\Businessadmin\CategoriesModel;
use App\Models\Zrortadmin\BusinessModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Category extends BaseController
{
    public function __construct(...$params)
	{
        helper('business_function_helper');
        // authentication();        
    }
    
    public function index()
    {

    }

    
}
?>