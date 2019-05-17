<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
parent::__construct();
$this->load->database();
$this->load->model('users_model');
}
    public function index() 
    {

        $this->load->view('layout/header');
        $this->load->view('pages/registration');
        $this->load->view('layout/footer');
    }
    public function insert_user_db(){
    	$data['firstname'] = $this->input->post('firstname');
    	$data['lastname'] = $this->input->post('lastname');
    	$data['username'] = $this->input->post('username');
    	$data['password'] = $this->input->post('password');
    	$data['confirmpassword'] = $this->input->post('confirmpassword');
    	if($data['password']==$data['confirmpassword']){
			$this->users_model->insert($data);

    	}
    	else{
    		
    		$message = "password did not match";
			echo "<script type='text/javascript'>alert('$message');</script>";

    	}
    	
    	
    	
    	
    }

}