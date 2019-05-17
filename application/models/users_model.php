<?php
class Users_model extends CI_Model{
	function __construct() {
	parent::__construct();
	$this->load->database(); 
}

public function insert($data){
	$this->db->insert('blog', $data);
	header('location:http://localhost/blog/index.php/user');
}
}


?>