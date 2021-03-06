<?php namespace App\Models\Businessadmin;
use CodeIgniter\Model;
 
class BusinessCategoriesModel extends Model
{
    protected $table = 'business_categories';
    protected $primaryKey = 'pk_id';

    protected $returnType = 'array';

    protected $allowedFields = ['title', 'description', 'image_path', 'thumbnail_path', 'is_active'];

    protected $validationRules  = [];
    protected $validationMessages   = [];
    protected $skipValidation   = false;
}
?>