<?php
class Users_model extends CI_Model{

	const USERSTABLE = 'users';
	
	function __construct() {
	parent::__construct();
	$this->load->database(); 
}

public function insert($data){
	$this->db->insert(self::USERSTABLE, $data);
	 
}
public function getUsers(){
		$query = $this->db->get(self::USERSTABLE);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;	
		}
}
public function submit(){
	$encrypted_string = $this->encrypt->sha1($this->input->post('password'));
	if($this->input->post('status')=="Admin"){
		$statusholder = 1;
	}
	else{
		$statusholder = 0;
	}
	$field = array(
		'firstname' =>$this->input->post('firstname'),
		'lastname' =>$this->input->post('lastname'),
		'username' =>$this->input->post('username'),
		'status' => $statusholder,
		'password' => $encrypted_string
	);
	$this->db->insert(self::USERSTABLE, $field);
	if($this->db->affected_rows() > 0){
		return true;
	}else{
		return false;
	}
}
public function getUsersById($id){
	$this->db->where('id', $id);
	$query = $this->db->get(self::USERSTABLE);
	if($query->num_rows() > 0){
		return $query->row();
	}else{
		return false;
	}
}
public function update(){
	$id = $this->input->post('text_hidden');
	$field = array(
		'firstname' =>$this->input->post('firstname'),
		'lastname' =>$this->input->post('lastname'),
		'username' =>$this->input->post('username')
		
	);
	$this->db->where('id', $id);
	$this->db->update(self::USERSTABLE, $field);
	if($this->db->affected_rows() > 0){
		return true;
	}else{
		return false;
	}
}
public function deleteuser($id){
	$this->db->where('id',$id);
	$this->db->delete(self::USERSTABLE);
	if($this->db->affected_rows() > 0){
		return true;
	}else{
		return false;
	}
}
public function login($username, $password){

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get(self::USERSTABLE);
		if($query->num_rows() > 0 ){
			return true;

		}else{
			return false;
		}

}

}


?>