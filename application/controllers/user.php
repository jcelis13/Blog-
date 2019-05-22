<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    public $holder = array();
	function __construct() {
parent::__construct();
$this->load->database();
$this->load->model('users_model');
$this->load->library('session');
   $this->load->library('form_validation');

// $this->load->library('encrypt');
}
    public function index() 
    {

        $this->load->view('layout/header');
        $this->load->view('pages/index');
        $this->load->view('layout/footer');
    }
    public function registration(){
    	

    	$this->form_validation->set_rules('firstname', 'firstName', 'required');
    	$this->form_validation->set_rules('lastname', 'lastName', 'required');
    	$this->form_validation->set_rules('username', 'userName', 'required|is_unique[blog.username]');
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

    	}
    }
  }
    //blog/index.php/user/edit_user
    public function login(){
     

    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');
    if($this->form_validation->run()){
        //true
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->load->model('users_model');

        if($this->users_model->login($username, $password)){

            $sql = "SELECT * FROM blog WHERE username = '".$username."'";
            $result = $this->db->query($sql);
            $row = $result->row();

              $sess_data = array(
                'id' => $row->id,
                'firstname' => $row->firstname,
                'lastname' => $row->lastname,
                'username' => $username

        );
        $this->session->set_userdata($sess_data);
            var_dump($this->session->set_userdata($sess_data)); 
            redirect(base_url() . 'index.php/user/main');
        }
        else{
            $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect(base_url(). 'index.php/user/signin');
        }
    }
    else{
        $this->signin();
    }
    

        
    }
    public function signin(){

        $this->load->view('layout/header');
        $this->load->view('pages/signin');
        $this->load->view('layout/footer');
    }
    public function main(){
           
        $this->load->view('pages/main');
       
        }
    public function logout(){   
      $this->session->sess_destroy();
          redirect(base_url(). 'index.php/user/main');
    }

    }

