<?php namespace App\Models\Customers;
use CodeIgniter\Model;
 
class OrderModel extends Model
{
    protected $table    = 'orders';
    protected $primaryKey   = 'pk_id';

    protected $returnType   = 'array';

    protected $allowedFields    = ['order_no', 'date_time', 'address', 'sub_total', 'delivery_fee', 'total', 
    'status', 'created_datetime', 'udpated_datetime', 'customer_id', 'business_category_id', 'updated_by', 'business_id', 
    'address_id', 'order_platform', 'payment_method_id', 'payment_method_detail_id', 'instant_delivery', 'instant_delivery_charges'];

    protected $validationRules  = [];
    protected $validationMessages   = [];
    protected $skipValidation   = false;
}
?>