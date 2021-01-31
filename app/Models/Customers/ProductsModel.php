<?php namespace App\Models\Customers;
use CodeIgniter\Model;
 
class ProductsModel extends Model
{
    protected $table    = 'products';
    protected $primaryKey   = 'pk_id';

    protected $returnType   = 'array';

    protected $allowedFields    = ['pk_id', 'name', 'shortname', 'description', 'image_path', 'thumbnail_path', 
    'created_datetime', 'udpated_datetime', 'unit_quantity', 'product_type', 'on_sale', 'unit_price', 'is_active', 
    'list_order_numb', 'favorities', 'tags', 'product_sku', 'product_category_id', 'is_featured', 'created_by', 
    'updated_by', 'discount_type', 'discount_amount', 'discount_percent', 'product_unit_id', 'bussiness_id'];

    protected $validationRules  = [];
    protected $validationMessages   = [];
    protected $skipValidation   = false;
}
?>