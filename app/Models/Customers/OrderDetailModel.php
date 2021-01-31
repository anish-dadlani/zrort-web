<?php namespace App\Models\Customers;
use CodeIgniter\Model;
 
class OrderDetailModel extends Model
{
    protected $table    = 'order_detail';
    protected $primaryKey   = 'pk_id';

    protected $returnType   = 'array';

    protected $allowedFields    = ['order_id', 'product_id', 'product_category_id', 'business_id', 'business_category_id', 
    'customer_id', 'unit_price', 'quantity', 'total'];

    protected $validationRules  = [];
    protected $validationMessages   = [];
    protected $skipValidation   = false;
}
?>