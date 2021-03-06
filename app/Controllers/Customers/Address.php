<?php namespace App\Controllers\Customers;
use App\Models\Customers\CustomerModel;
use App\Models\Customers\CustomerAddressModel;
use App\Models\Businessadmin\CategoriesModel;
use App\Models\Zrortadmin\BusinessModel;
use App\Models\Customers\CustomerCartModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Address extends BaseController
{
    public function __construct(...$params)
	{
        // helper('business_function_helper');
        // authentication();        
    }

    public function index()
    {
        	
    }

    public function address_view()
    {
        $customerAddressModel = new CustomerAddressModel();
        $displaydata['address'] = $customerAddressModel->findAll();

        $data['pageTitle'] = 'Address | Customer Profile';
        $data['fileToLoad'] = '/customers/address/overview';
        $data['data'] = $displaydata;

        echo view('templates/customers/main_template', $data);
    }

    public function address_save()
    {
        $customerAddressModel = new CustomerAddressModel();
        $data = [
            'address_type' => $this->request->getPost('address1')??NULL,
            'country' => $this->request->getPost('country')??NULL,
            'city' => $this->request->getPost('locality')??NULL,
            'sector_colony' => $this->request->getPost('sector_colony')??NULL,
            'street' => $this->request->getPost('street')??NULL,
            'house_no' => $this->request->getPost('flat')??NULL,
            'mobile1' => $this->request->getPost('mobile1')??NULL,
            'zipcode' => $this->request->getPost('pincode')??NULL,
            'customer_id' => $_SESSION['user_id']??NULL,
        ];
        $customerAddressModel -> save ($data);
        return redirect()->route('customer/address/view');
    }

    public function address_edit($id = null)
    {
        $customerAddressModel = new CustomerAddressModel();
        $addressData = $customerAddressModel->where('pk_id', $id)->first();

        $data['pageTitle'] = 'Edit Address | Customer Profile';
        $data['fileToLoad'] = '/customers/address/edit';
        $data['data'] = $displaydata;

        echo view('templates/customers/main_template', $data);
    }

    public function address_delete($id = null)
    {
        $customerAddressModel = new CustomerAddressModel();
        $customerAddressModel->where('pk_id', $id)->delete();
        return redirect()->route('customer/address/view');
    }
}
?>