<?php namespace App\Models\Zrortadmin;

use CodeIgniter\Model;

class BusinessModel extends Model
{
    protected $table = 'business';
	
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
}