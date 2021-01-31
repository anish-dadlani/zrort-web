<?php namespace App\Models\Zrortadmin;

use CodeIgniter\Model;

class BusinessModel extends Model
{
	protected $table = 'business';
	protected $primaryKey   = 'pk_id';
    protected $returnType   = 'array';

    protected $allowedFields = [
		'pk_id', 'business_number', 'name', 'tagline', 'description', 'business_logo', 'cover_photo', 'country', 'state', 'city', 
		'postalcode', 'lat', 'lang', 'business_website', 'business_email', 'business_mobile', 'business_landline', 'business_address', 
		'status', 'is_active', 'delivery_fee', 'min_delivery_price', 'min_delivery_time', 'business_admin_id', 'business_category_id', 
		'created_by', 'updated_by', 'created_datetime', 'udpated_datetime'];
	
	public function getBusiness($slug = false)
	{
		if ($slug === false)
		{
			//return $this->where(['is_active' => '1'])->orderBy('pk_id')->findAll();
			return $this->orderBy('pk_id')->findAll();
		}
		return $this->asArray()->where(['pk_id' => $slug])->orderBy('pk_id')->findAll();
	}
	public function business_save($data) {
		$query = $this->db->table($this->table)->insert($data);
	}
	public function delete_business($id) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->delete();
	}
	public function update_business($data,$id) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
	}

	protected $validationRules  = [];
    protected $validationMessages   = [];
    protected $skipValidation   = false;
}