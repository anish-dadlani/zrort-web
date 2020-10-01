<?php namespace App\Models\Zrortadmin;

use CodeIgniter\Model;

class BusinessadminsModel extends Model
{
    protected $table = 'business_admins';
	
	public function getBusinessadmins($slug = false)
	{
		if ($slug === false)
		{
			//return $this->where(['is_active' => '1'])->orderBy('goalid')->findAll();
			return $this->findAll();
		}
		return $this->asArray()->where(['pk_id' => $slug])->orderBy('pk_id')->findAll();
	}
	public function businessadmins_save($data) {
        $query = $this->db->table($this->table)->insert($data);
		return $this->db->insertID(); 
	}
	public function delete_businessadmins($id,$data) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
	}
	public function update_businessadmins($data,$id) {
		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
	}
}