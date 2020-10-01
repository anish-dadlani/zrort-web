<?php namespace App\Models\Businessadmin;

use CodeIgniter\Model;

class ProductsunitsModel extends Model
{
    protected $table = 'products_units';
	
	public function getProductsunits($slug = false)
	{
		if ($slug === false)
		{
			//return $this->where(['is_active' => '1'])->orderBy('ph_id')->findAll();
			return $this->findAll();
		}
		return $this->asArray()->where(['pk_id' => $slug])->orderBy('pk_id')->findAll();
	}
	public function productsunits_save($data) {
        $query = $this->db->table($this->table)->insert($data);
	}
	public function delete_productsunits($id,$data) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
	}
	public function update_productsunits($data,$id) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
	}
}