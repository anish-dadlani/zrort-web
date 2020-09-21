<?php namespace App\Controllers\Businessadmin;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;
use App\Models\BusinessModel;
use App\Models\ProductsunitsModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Products extends BaseController
{
	public function index()
	{
		$model = new ProductsModel();
		$displaydata['products'] = $model->getProducts();
		$data['pageTitle'] = 'Products Listing';
		$data['fileToLoad'] = '/products/overview';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}

	public function view($slug = null)
	{
		$model = new ProductsModel();
		$data['products'] = $model->getProducts($slug);
	}
	public function add_products()
	{
		$categoriesmodel = new CategoriesModel();
		$data['get_categories'] = $categoriesmodel->getCategories();
		$business_model = new BusinessModel();
		$data['business'] = $business_model->getBusiness();
		$productsunits_model = new ProductsunitsModel();
		$data['get_productsunits'] = $productsunits_model->getProductsunits();
		$data['pageTitle'] = 'Products Add';
		$data['fileToLoad'] = '/products/add_products';
		$data['data'] = $data;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function products_save()
	{
		//print_r($_POST); exit();
		helper(['form', 'url']);
		$model = new ProductsModel();
		if (! $this->validate([
			'name' => 'required',
			'description'  => 'required',
			'shortname'  => 'required',
			'product_type'  => 'required',
			'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
		]))
		{
			$data['pageTitle'] = 'Products Add';
			$data['fileToLoad'] = '/products/add_products';
			$data['data'] = $data;
			echo view('templates/admin/zarorat_template', $data);

		}
		else
		{ 	
			$avatar = $this->request->getFile('file');
            $avatar->move('includes/images/BusinessAdmin/products/');
			$filenname =$avatar->getClientName();
            $path  = $avatar->getTempName();
			$fullimgpath = $path . $filenname;
			$data = array(
				'name' => $this->request->getPost('name'),
				'shortname' => $this->request->getPost('shortname'),
				'description' => $this->request->getPost('description'),
				'unit_quantity' => $this->request->getPost('unit_quantity'),
				'product_type' => $this->request->getPost('product_type'),
				'on_sale' => $this->request->getPost('on_sale'),
				'discount_type' => $this->request->getPost('discount_type'),
				'discount_amount' => $this->request->getPost('discount_amount'),
				'discount_percent' => $this->request->getPost('discount_percent'),
				'unit_price' => $this->request->getPost('unit_price'),
				'is_active' => $this->request->getPost('is_active'),
				'product_sku' => $this->request->getPost('product_sku'),
				'product_category_id' => $this->request->getPost('product_category_id'),
				'product_unit_id' => $this->request->getPost('product_unit_id'),
				'bussiness_id' => $this->request->getPost('bussiness_id'),
				'image_path' =>  $fullimgpath,
				'thumbnail_path' =>  $fullimgpath,
				'created_by' => 1,
				'updated_by' => 1
			);
			$save = $model->products_save($data); 
			return redirect()->route('products');
		}
	}
	public function view_products($id=null)
	{ 
		$model = new ProductsModel();
		$displaydata['products_view'] = $model->getProducts($id);
		$categoriesmodel = new CategoriesModel();
		$displaydata['get_categories'] = $categoriesmodel->getCategories();
		$business_model = new BusinessModel();
		$displaydata['business'] = $business_model->getBusiness();
		$productsunits_model = new ProductsunitsModel();
		$displaydata['get_productsunits'] = $productsunits_model->getProductsunits();
		$data['pageTitle'] = 'Products View';
		$data['fileToLoad'] = '/products/products_view';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function edit_products($id=null)
	{ 
		$model = new ProductsModel();
		$displaydata['products_edit'] = $model->getProducts($id);
		$categoriesmodel = new CategoriesModel();
		$displaydata['get_categories'] = $categoriesmodel->getCategories();
		$business_model = new BusinessModel();
		$displaydata['business'] = $business_model->getBusiness();
		$productsunits_model = new ProductsunitsModel();
		$displaydata['get_productsunits'] = $productsunits_model->getProductsunits();
		$data['pageTitle'] = 'Products Edit';
		$data['fileToLoad'] = '/products/products_edit';
		$data['data'] = $displaydata;
		echo view('templates/admin/zarorat_template', $data);
	}
	public function delete_products($id=null)
	{
		$model = new ProductsModel();
		$data = array(
				'is_active'=>"0",
				'udpated_datetime'=> date('Y-m-d h:i:s') 
		);
		$save =$model->delete_products($id,$data);
		return redirect()->route('products');
	}
	public function update_products()
	{
		$model = new ProductsModel();
		$id = $this->request->getPost('pk_id');
		$avatar=$this->request->getFile('file');
		$check_file =$avatar->getClientName();
		if(!empty($check_file)){
			$avatar = $this->request->getFile('file');
			$avatar->move('includes/images/BusinessAdmin/products/');
			$filenname =$avatar->getClientName();
			$path  = $avatar->getTempName();
			$fullimgpath = $path . $filenname;
		}else{ 
			$fullimgpath =$this->request->getPost('updatepic');
		}
			$data = array(
				'name' => $this->request->getPost('name'),
				'shortname' => $this->request->getPost('shortname'),
				'description' => $this->request->getPost('description'),
				'unit_quantity' => $this->request->getPost('unit_quantity'),
				'product_type' => $this->request->getPost('product_type'),
				'on_sale' => $this->request->getPost('on_sale'),
				'discount_type' => $this->request->getPost('discount_type'),
				'discount_amount' => $this->request->getPost('discount_amount'),
				'discount_percent' => $this->request->getPost('discount_percent'),
				'unit_price' => $this->request->getPost('unit_price'),
				'is_active' => $this->request->getPost('is_active'),
				'product_sku' => $this->request->getPost('product_sku'),
				'product_category_id' => $this->request->getPost('product_category_id'),
				'product_unit_id' => $this->request->getPost('product_unit_id'),
				'bussiness_id' => $this->request->getPost('bussiness_id'),
				'image_path' =>  $fullimgpath,
				'thumbnail_path' =>  $fullimgpath,
				'created_by' => 1,
				'updated_by' => 1
			);
		$save = $model->update_products($data,$id);
		return redirect()->route('products');
	}
}