<?php namespace App\Models\Businessadmin;

use CodeIgniter\Model;

class BusinessprofileModel extends Model
{
    protected $table = 'business_admins';
	
	public function getBusinessprofile($slug = false)
	{
		if ($slug === false)
		{
			//return $this->where(['is_active' => '1'])->orderBy('pk_id')->findAll();
			return $this->findAll();
		}
		return $this->asArray()->where(['pk_id' => $slug])->orderBy('pk_id')->findAll();
	}
	public function update_businessprofile($data,$id) {

		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
	}
	public function getbusinessprofil_data($userName,$oldPassword)
	{
		return $this->asArray()->where(['username' => $userName,'password_hash' => $oldPassword])->findAll();
	}
}