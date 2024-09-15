<?php 
class Auth extends CI_Model 
{
	
	public function __construct()
	{
        parent::__construct();
	}
 
	function register($username,$password,$nama_lengkap,$no_hp,$email)
	{
		$data_user = array(
			'username'=>$username,
			'password'=>$password,
			'nama_lengkap'=>$nama_lengkap,
			'no_hp'=>$no_hp,
			'email'=>$email
		);
		$this->db->insert('users',$data_user);
	}
}
?>