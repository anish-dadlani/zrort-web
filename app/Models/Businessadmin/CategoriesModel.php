<?php namespace App\Models\Businessadmin;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table = 'product_categories';
	
	public function getCategories($slug = false)
	{
		if ($slug === false)
		{
			//return $this->where(['is_active' => '1'])->orderBy('pk_id')->findAll();
			return $this->orderBy('pk_id')->findAll();
		}
		return $this->asArray()->where(['pk_id' => $slug])->orderBy('pk_id')->findAll();
	}
	public function categories_save($data) {
        $query = $this->db->table($this->table)->insert($data);
	}
	public function delete_categories($id) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->delete();
	}
	public function update_categories($data,$id) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
	}
}