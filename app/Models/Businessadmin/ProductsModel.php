<?php namespace App\Models\Businessadmin;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'products';
	
	public function getProducts($slug = false)
	{
		if ($slug === false)
		{
			return $this->where(['is_active' => '1'])->orderBy('pk_id')->findAll();
			//return $this->findAll();
		}
		return $this->asArray()->where(['pk_id' => $slug])->orderBy('pk_id')->findAll();
	}
	public function products_save($data) {
        $query = $this->db->table($this->table)->insert($data);
		return $this->db->insertID(); 
	}
	public function delete_products($id,$data) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
	}
	public function update_products($data,$id) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
		return $this->db->insertID();
	}
}