<?php
class Users_model extends CI_Model{
	function __construct() {
	parent::__construct();
	$this->load->database(); 
}

public function insert($data){
	$this->db->insert('blog', $data);
	 
}
public function login(){

	$user = $this->input->post('username');
	$pass = $this->input->post('password');


		if($query->num_rows() == 1){
			 $this->load->view('layout/header');
            $this->load->view('pages/main');
            $this->load->view('layout/footer');  
		}
		else{ $this->load->view('layout/header');
            $this->load->view('pages/signin');
            $this->load->view('layout/footer');  
		}
				/*$this->db->where('username', $this->input->post('username'));  
        $this->db->where('password', $this->input->post('password'));  
        $query = $this->db->get('blog');  
  
        if ($query->num_rows() == 1)  
        {  
            return true;  
        } else {  
            return false;  
        }  */

}
}


?>