<?php namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
	
	public function getOrders($slug = false)
	{
		if ($slug === false)
		{
			//return $this->where(['is_active' => '1'])->orderBy('goalid')->findAll();
			return $this->findAll();
		}
		return $this->asArray()->where(['pk_id' => $slug])->orderBy('pk_id')->findAll();
	}
	public function orders_save($data) {
        $query = $this->db->table($this->table)->insert($data);
	}
	public function delete_orders($id,$data) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
	}
	public function update_orders($data,$id) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
	}
}