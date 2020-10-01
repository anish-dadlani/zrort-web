<?php namespace App\Models\Zrortadmin;

use CodeIgniter\Model;

class ZrortprofileModel extends Model
{
    protected $table = 'zrort_admins';
	
	public function getZrortprofile($slug = false)
	{
		if ($slug === false)
		{
			//return $this->where(['is_active' => '1'])->orderBy('pk_id')->findAll();
			return $this->findAll();
		}
		return $this->asArray()->where(['pk_id' => $slug])->orderBy('pk_id')->findAll();
	}
	public function update_zrortprofile($data,$id) {

		$query =$this->db->table($this->table)->where(['pk_id' => $id])->update($data);
	}
	public function getzrortprofil_data($userName,$oldPassword)
	{
		return $this->asArray()->where(['username' => $userName,'password_hash' => $oldPassword])->findAll();
	}
}