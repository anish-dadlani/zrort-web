<?php namespace App\Models\Customers;
use CodeIgniter\Model;
 
class PaymentMethodModel extends Model
{
    protected $table    = 'payment_methods';
    protected $primaryKey   = 'pk_id';

    protected $returnType   = 'array';

    protected $allowedFields    = ['method_title','description'];

    protected $validationRules  = [];
    protected $validationMessages   = [];
    protected $skipValidation   = false;
}
?>