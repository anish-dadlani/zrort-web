<?php namespace App\Controllers\Customers;
use App\Models\Customers\OrderModel;
use App\Models\Customers\CustomerModel;
use App\Models\Customers\ProductsModel;
use App\Models\Zrortadmin\BusinessModel;
use App\Models\Customers\OrderDetailModel;
use App\Models\Customers\CustomerCartModel;
use App\Models\Businessadmin\CategoriesModel;
use App\Models\Customers\CustomerAddressModel;
use App\Models\Customers\PaymentMethodModel;
use App\Models\Customers\PaymentDetailModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;
class Orders extends BaseController
{
    public function __construct(...$params)
	{
        // helper('business_function_helper');
    }
    
    public function set()
    {
        // unset($_SESSION['checkout']); 
        // $displaydata = [
        //     'checkout'=> [
        //         'finalTotal' => $this->request->getPost('finalTotal'),
        //         'sumSaving' => $this->request->getPost('sumSaving'),
        //     ]
        // ];
        // $this->session->set($displaydata);
    }

    public function set_quantity()
    {
        foreach($_SESSION['cart'] as $key => $item)
        {
            if($item['product_id'] == $this->request->getPost('product_id')) 
            {
                if($this->request->getPost('qty') == 'minus')
                    $_SESSION['cart'][$key]['quantity'] = $_SESSION['cart'][$key]['quantity'] - 1;
                else if($this->request->getPost('qty') == 'plus')
                    $_SESSION['cart'][$key]['quantity'] = $_SESSION['cart'][$key]['quantity'] + 1;
            }
        }
    }

    public function checkout() 
    {
        $paymentMethodModel = new PaymentMethodModel();
        $displaydata['paymentMethod'] = $paymentMethodModel->findAll();

        if(empty($_SESSION['cart'])){
            $displaydata['empty'] = "Yes";
        }

        $data['pageTitle'] = 'Checkout';
        $data['fileToLoad'] = '/customers/orders/checkout';
        $data['data'] = $displaydata;

        echo view('templates/products/template', $data);
    }

    public function saveOrder()
    {
        // print_r($_REQUEST); exit;
        $orderModel = new OrderModel();
        $PaymentDetailModel = new PaymentDetailModel();
        $customerCartModel = new CustomerCartModel();
        $customerAddressModel = new CustomerAddressModel();
        $PaymentMethodModel = new PaymentMethodModel();
        $OrderDetailModel = new OrderDetailModel();
        
        if(isset($_SESSION['cart']))
        {
            if(isset($_REQUEST['placeOrder']))
            {
                $this->db->transStart();
                $address_data = [
                    'address_type' => $this->request->getPost('address1')??NULL,
                    'country' => $this->request->getPost('country')??NULL,
                    'city' => $this->request->getPost('locality')??NULL,
                    'sector_colony' => $this->request->getPost('sector_colony')??NULL,
                    'street' => $this->request->getPost('street')??NULL,
                    'house_no' => $this->request->getPost('flat')??NULL,
                    'mobile1' => $_SESSION['phone']??NULL,
                    'zipcode' => $this->request->getPost('pincode')??NULL,
                    'customer_id' => $_SESSION['user_id']??NULL,
                ];
                $customerAddressModel->save($address_data);
                $address_id = $customerAddressModel->insertID();

                if($this->request->getPost('paymentmethod') > 1)
                {
                    $paymentMethodDetails = [
                        'card_holdername' => $this->request->getPost('holdername')??NULL,
                        'card_number' => $this->request->getPost('cardnumber')??NULL,
                        'expiry_month' => $this->request->getPost('card[expire-month]')??NULL,
                        'expiry_year' => $this->request->getPost('card[expire-year]')??NULL,
                        'cvv_number' => $this->request->getPost('card[cvc]')??NULL,
                        'method_id' => get_method_id($this->request->getPost('paymentmethod'))??NULL,
                    ];
                    $PaymentDetailModel->save($paymentMethodDetails);
                    $payment_method_detail_id = $PaymentDetailModel->insertID();
                }
                $order_no = 'Order-'.Date('H').Date('d').Date('i').Date('s');

                $subTotal = 0; $sumTotal = 0; $sumSaving = 0; $charges=0; $business_ids = array();
                if(isset($_SESSION['cart']))
                {
                    foreach($_SESSION['cart'] as $key => $item):
                        $business_ids[] = $item['bussiness_id'];
                        $business_ids = array_unique($business_ids);
                        if(isset($item['discount_amount']) && $item['discount_amount'] != "" && $item['discount_amount'] > 0)
                        {
                            $sumTotal = $sumTotal + ($item['discount_amount'] * $item['quantity']); 
                            $subTotal = $subTotal + ($item['discount_amount'] * $item['quantity']);
                            $sumSaving = $sumSaving + (($item['unit_price'] - $item['discount_amount']) * $item['quantity']);
                        }
                        else{
                            $subTotal = $subTotal + ($item['unit_price'] * $item['quantity']);
                            $sumTotal = $sumTotal + ($item['unit_price'] * $item['quantity']);
                        }
                    endforeach;

                    foreach($business_ids as $id){
                        $charges = $charges + get_business_delivery_charges($id);
                    }
                    $sumTotal = $sumTotal + $charges;
                }
                if($this->request->getPost('date111') == 'Instant'){
                    $instantDelivery = 1;
                }
                $orderData = [
                    'order_no' => $order_no??NULL,
                    'date_time' => $this->request->getPost('date111').', '.$this->request->getPost('time')??NULL,
                    'address' => $this->request->getPost('flat').', '.$this->request->getPost('street').', '.$this->request->getPost('sector_colony').', '.$this->request->getPost('locality'),
                    'sub_total' => $subTotal??NULL,
                    'delivery_fee' => $charges??NULL,
                    'total' => $sumTotal??NULL,
                    'status' => 'Order Placed'??NULL,
                    'customer_id' => $_SESSION['user_id']??NULL,
                    'business_category_id' => NULL,
                    'business_id' => NULL,
                    'address_id' => $address_id??NULL, 
                    'order_platform' => $this->request->getPost('order_platform')??NULL, 
                    'payment_method_id' => get_method_id($this->request->getPost('paymentmethod'))??NULL, 
                    'payment_method_detail_id' => $payment_method_detail_id??NULL, 
                    'instant_delivery' => $instantDelivery??0, 
                    'instant_delivery_charges'=> $this->request->getPost('instant_delivery_charges')??NULL,
                ];
                $orderModel->save($orderData);
                $order_id = $orderModel->insertID();

                if(isset($_SESSION['cart']))
                {
                    foreach($_SESSION['cart'] as $key => $item)
                    {
                        $sumTotal = 0; $sumSaving = 0; 
                        if(isset($item['discount_amount']) && $item['discount_amount'] != "" && $item['discount_amount'] > 0)
                        {
                            $sumTotal = $sumTotal + $item['discount_amount']; 
                            $sumSaving = $sumSaving + ($item['unit_price'] - $item['discount_amount']);
                        }
                        else {
                            $sumTotal = $sumTotal + $item['unit_price']; 
                        }
                        $orderDetailsData = [
                            'order_id' =>  $order_id,
                            'product_id' =>  $item['product_id']??NULL, 
                            'product_category_id' =>  $item['product_category_id']??NULL,
                            'business_id' =>  $item['bussiness_id']??NULL,
                            'business_category_id' => get_business_category_id($item['bussiness_id'])??NULL,
                            'customer_id' =>  $item['customer_id']??NULL,
                            'unit_price' =>  $sumTotal??NULL,
                            'quantity' =>  $item['quantity'],
                            'total' => $sumTotal * $item['quantity'],
                        ];
                        $OrderDetailModel->save($orderDetailsData);
                    }
                }
                $this->db->transComplete();
                $customerCartModel->where('customer_id', $_SESSION['user_id'])->delete();
                unset($_SESSION['cart']);
            }
        }
        $this->ordersPlaced();
    }

    public function ordersPlaced()
    {
        $orderModel = new OrderModel();
        $displaydata['order_placed'] = $orderModel->select('o.order_no, o.date_time, ca.house_no, ca.street, ca.sector_colony, 
        ca.mobile1, ca.city, ca.zipcode, o.payment_method_id, o.total')
        ->from('orders o')
        ->join('customer_addresses ca ', 'ca.pk_id = o.address_id')
        ->where('o.customer_id', $_SESSION['user_id'])
        ->groupBy('o.order_no')
        ->orderby('o.created_datetime','desc')
        ->findAll();

        $data['pageTitle'] = 'Orders Placed';
        $data['fileToLoad'] = '/customers/orders/placed';
        $data['data'] = $displaydata;

        echo view('templates/products/template', $data);
    }

    public function billInvoice($order_no=null)
    {
        $orderModel = new OrderModel();
        $OrderDetailModel = new OrderDetailModel();
        $ProductsModel = new ProductsModel();
        $displaydata['order_placed'] = $orderModel->select('o.order_no, o.sub_total, o.date_time, o.total as t, ca.address_type, ca.house_no, ca.street, 
        ca.sector_colony, ca.mobile1, ca.city, ca.zipcode, o.delivery_fee, o.payment_method_id, p.name, od.quantity, count(distinct(od.product_id)) as total_items')
        ->from('orders o')
        ->join('customer_addresses ca ', 'ca.pk_id = o.address_id')
        ->join('order_detail od', 'o.pk_id = od.order_id')
        ->join('products p', 'p.pk_id = od.product_id')
        ->where('o.order_no', $order_no)
        ->first();

        $order_id = $orderModel->select('o.pk_id')->from('orders o')
        ->join('order_detail od', 'o.pk_id = od.order_id')
        ->where('o.order_no', $order_no)
        ->first();

        $displaydata['products'] = $ProductsModel->select('distinct(p.name) as name, p.pk_id, od.quantity')->from('products p')
        ->join('order_detail od', 'p.pk_id = od.product_id')
        ->where('order_id', $order_id['pk_id'])
        ->findAll();

        $data['pageTitle'] = 'Bill Invoice';
        $data['fileToLoad'] = '/customers/orders/invoice';
        $data['data'] = $displaydata;

        echo view('templates/products/template', $data);
    }
}
?>