<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class blogs extends CI_Controller{

	function __construct(){
		 parent::__construct();
        $this->load->database();


        $this->load->model('blog_model');
	}

	public function index()
	{
        $this->load->view('pages/list_of_all_blogs');
	}
	public function showAllBlogs($id)
	{
		$result = $this->blog_model->showAllBlogs($id);
		echo json_encode($result);
		
	}
	public function getdata($blog_id = 0)
	{
	

		 $user_id = ($this->session->userdata('status') =='1') 
            ? 0 
            : $this->session->userdata('id');
		$result = $this->blog_model->getdata($user_id, $blog_id);

		 $this->output->set_content_type('application/json')
            ->set_output(json_encode($result));
		
	}
}