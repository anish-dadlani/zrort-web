<?php namespace App\Models\Zrortadmin;
use CodeIgniter\Model;
 
class LoginModel extends Model
{
    protected $table = 'zrort_admins';
	
	public function authenticate_user($username, $password)
	{
		//echo 'aa'; exit();
		$hashPassword = md5(md5($password));
		$allparam = $username."-".$password;
		date_default_timezone_set("Asia/Karachi");
		$curr_date = date("Y-m-d");
		$system_info = $this->browser();
		//$ip = $this->input->ip_address();
		//$ip = $this->$request->getIPAddress();
		//$ip= $request->getIPAddress();
		$ip= NULL;
		$this->db->table($this->table);
		$this->select('*');
		$query = $this->getWhere(['username' => $username,'password_hash' => $hashPassword]);
		$row = $query->getResultArray();
		//print_r($row); exit();
		$data = array(
					'ip'=> $ip,
					'browser'=> $system_info,
					'admin_id'=> (isset($row['pk_id']) && $row['pk_id'])?$row['pk_id']:0,
					'login_attempt_result'=> (count($row) > 0)?'Success':'Neglect',
					'query_string' => md5($allparam)
				);
		if (count($row) > 0)
		{
			$row['pk_id'] = $this->db->table('zrort_admin_login_log')->insert($data);
			return $row;
		}elseif(count($row) ==0)
		{
			$data['login_attempt_result'] = 'Neglect';
			$this->db->table('zrort_admin_login_log')->insert($data);
			return 0;
		}
		else {
			return 0;
		}
	}

	public function  update_authenticate_user($user_id){
		$data = array(
			'logout_time'=> date('Y-m-d H:i:s')
		);
		$query =$this->db->table('zrort_admin_login_log')->where(['admin_id' => $user_id])->update($data);
	} 
	
	public function browser() {
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$browsers = array('Chrome' => array('Google Chrome', 'Chrome/(.*)\s'), 'MSIE' => array('Internet Explorer', 'MSIE\s([0-9\.]*)'), 'Firefox' => array('Firefox', 'Firefox/([0-9\.]*)'), 'Safari' => array('Safari', 'Version/([0-9\.]*)'), 'Opera' => array('Opera', 'Version/([0-9\.]*)'));
		$browser_details = array();
		foreach ($browsers as $browser => $browser_info) {
			if (preg_match('@' . $browser . '@i', $user_agent)) {
				$browser_details['name'] = $browser_info[0];
				preg_match('@' . $browser_info[1] . '@i', $user_agent, $version);
				$browser_details['version'] = $version[1];
				break;
			} else {
				$browser_details['name'] = 'Unknown';
				$browser_details['version'] = 'Unknown';
			}
		}
		return 'Browser: ' . $browser_details['name'] . ' Version: ' . $browser_details['version'];
	}
}	