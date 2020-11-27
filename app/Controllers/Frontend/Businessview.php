<?php namespace App\Controllers\Frontend;
use App\Models\Zrortadmin\BusinessModel;
use App\Models\Zrortadmin\BusinessadminsModel;
use App\Models\Zrortadmin\BusinesscategoriesModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Businessview extends BaseController
{
	public function __construct(...$params)
	{
		helper('zarorat_functions_helper'); 
	}
	public function index()
	{
		$pager = \Config\Services::pager();
		$model = new BusinessModel();
		$displaydata['business'] = $model->getBusiness();
		$displaydata = [
            'business' => $model->paginate(5),
            'pager' => $model->pager
        ];
		$data['pageTitle'] = 'Business Listing';
		$data['fileToLoad'] = '/Frontend/business/overview';
		$data['data'] = $displaydata;
		echo view('templates/frontend/frontend_template', $data);
	}

	public function view($slug = null)
	{   
		$model = new BusinessModel();
		$data['business'] = $model->getBusiness($slug);
	}
	
}