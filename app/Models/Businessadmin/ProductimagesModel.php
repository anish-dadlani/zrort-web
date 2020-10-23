<?php namespace App\Models\Businessadmin;

use CodeIgniter\Model;

class ProductimagesModel extends Model
{
    protected $table = 'product_images';
	
	public function getProductsimages($slug = false)
	{
		if ($slug === false)
		{
			return $this->findAll();
		}
		return $this->asArray()->where(['pk_id' => $slug])->orderBy('pk_id')->findAll();
	}
	public function productsimages_save($data) {
        $query = $this->db->table($this->table)->insert($data);
	}
	public function delete_productsimages($id) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->delete();
	}
	public function update_productsimages($data,$id) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
	}
}