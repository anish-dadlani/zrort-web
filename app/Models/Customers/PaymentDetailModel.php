<?php namespace App\Models\Customers;
use CodeIgniter\Model;
 
class PaymentDetailModel extends Model
{
    protected $table    = 'payment_method_detail';
    protected $primaryKey   = 'pk_id';

    protected $returnType   = 'array';

    protected $allowedFields    = ['card_holdername','card_number','expiry_month','expiry_year','cvv_number','method_id'];

    protected $validationRules  = [];
    protected $validationMessages   = [];
    protected $skipValidation   = false;
}
?>