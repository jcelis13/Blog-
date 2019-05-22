<?php
class Users_model extends CI_Model{
	function __construct() {
	parent::__construct();
	$this->load->database(); 
}

public function insert($data){
	$this->db->insert('blog', $data);
	 
}
public function login($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('blog');
		if($query->num_rows() > 0 ){
			return true;
			

		}else{
			return false;
		}

}

}


?>