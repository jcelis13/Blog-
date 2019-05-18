<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
parent::__construct();
$this->load->database();
$this->load->model('users_model');
$this->load->library('session');
$this->load->library('encrypt');
}
    public function index() 
    {

        $this->load->view('layout/header');
        $this->load->view('pages/index');
        $this->load->view('layout/footer');
    }
    public function registration(){
    	$this->load->library('form_validation');

    	$this->form_validation->set_rules('firstname', 'firstName', 'required');
    	$this->form_validation->set_rules('lastname', 'lastName', 'required');
    	$this->form_validation->set_rules('username', 'userName', 'required');
    	$this->form_validation->set_rules('password', 'passWord', 'required|matches[confirmpassword]');
    	$this->form_validation->set_rules('confirmpassword', 'confirmpassword', 'required');

    	if($this->form_validation->run() === FALSE){
    			$this->load->view('layout/header');
		        $this->load->view('pages/registration');
		        $this->load->view('layout/footer');
    	}else{
    		$data['firstname'] = $this->input->post('firstname');
    	$data['lastname'] = $this->input->post('lastname');
    	$data['username'] = $this->input->post('username');
    	$data['password'] = $this->input->post('password');
    	$data['confirmpassword'] = $this->input->post('confirmpassword');
/*
    	if($data['password']==$data['confirmpassword']){
			$this->users_model->insert($data);
			$this->load->view('layout/header');
		    $this->load->view('pages/registration');
		    $this->load->view('layout/footer');

    	}
    	else{
    		
    		echo '<script>alert("password did not match");</script>';
          	/*$this->load->view('layout/header');
	        $this->load->view('pages/registration');
	        $this->load->view('layout/footer');*/

    	//}*/
    }
  }
    //blog/index.php/user/edit_user
    public function login(){


   /*     $this->load->helper('security');  
        $this->load->library('form_validation');  

         $this->form_validation->set_rules('username', 'Username:', 'required|trim|xss_clean|callback_validation');  
        $this->form_validation->set_rules('password', 'Password:', 'required|trim');  

         if ($this->form_validation->run())   
        {  
            $data = array(  
                'username' => $this->input->post('username'),  
                'currently_logged_in' => 1  
                );    
                    $this->session->set_userdata($data);  
                   
        }       
        else {  
            $this->load->view('layout/header');
            $this->load->view('pages/signin');
            $this->load->view('layout/footer');  
        }  
      
    }
    public function validation(){
         $this->load->model('users_model');  
         if ($this->users_model->login())  
        {  
  
            return true;  
              $this->load->view('layout/header');
            $this->load->view('pages/main');
            $this->load->view('layout/footer');  
        } else {  
            $this->form_validation->set_message('validation', 'Incorrect username/password.');  
            return false;  
        }  
    }*/}
    public function signin(){

        $this->load->view('layout/header');
        $this->load->view('pages/signin');
        $this->load->view('layout/footer');
    }
        }

