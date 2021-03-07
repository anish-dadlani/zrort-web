<?php namespace App\Models\Businessadmin;
use CodeIgniter\Model;
 
class MarkersModel extends Model
{
    protected $table = 'markers';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['name', 'address', 'lat', 'lng', 'type'];

    protected $validationRules  = [];
    protected $validationMessages   = [];
    protected $skipValidation   = false;
}
?>