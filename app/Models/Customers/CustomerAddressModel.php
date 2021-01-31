<?php namespace App\Models\Customers;
use CodeIgniter\Model;
 
class CustomerAddressModel extends Model
{
    protected $table = 'customer_addresses';
    protected $primaryKey = 'pk_id';

    protected $returnType = 'array';

    protected $allowedFields = ['country', 'city', 'sector_colony', 'street', 'house_no', 'phone1', 'phone2', 'mobile1', 
                                'mobile2', 'zipcode', 'other_detail', 'customer_id', 'created_datetime', 'is_default', 'address_type'];

    protected $validationRules  = [];
    protected $validationMessages   = [];
    protected $skipValidation   = false;
}
?>