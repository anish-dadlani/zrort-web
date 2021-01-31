<?php namespace App\Models\Customers;
use CodeIgniter\Model;
 
class CustomerFavoritiesModel extends Model
{
    protected $table    = 'customer_favourities';
    protected $primaryKey   = 'pk_id';

    protected $returnType   = 'array';

    protected $allowedFields    = ['customer_id','product_id'];

    protected $validationRules  = [];
    protected $validationMessages   = [];
    protected $skipValidation   = false;
}
?>