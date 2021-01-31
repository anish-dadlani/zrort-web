<?php namespace App\Models\Customers;
use CodeIgniter\Model;
 
class CustomerCartModel extends Model
{
    protected $table    = 'customer_cart';
    protected $primaryKey   = 'pk_id';

    protected $returnType   = 'array';

    protected $allowedFields    = ['customer_id','product_id', 'quantity'];

    protected $validationRules  = [];
    protected $validationMessages   = [];
    protected $skipValidation   = false;
}
?>