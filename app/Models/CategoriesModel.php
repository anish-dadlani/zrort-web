<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table = 'product_categories';
	
	public function getCategories($slug = false)
	{
		if ($slug === false)
		{
			return $this->where(['is_active' => '1'])->orderBy('pk_id')->findAll();
			//return $this->findAll();
		}
		return $this->asArray()->where(['pk_id' => $slug])->orderBy('pk_id')->findAll();
	}
	public function categories_save($data) {
        $query = $this->db->table($this->table)->insert($data);
	}
	public function delete_categories($id,$data) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
	}
	public function update_categories($data,$id) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
	}
}