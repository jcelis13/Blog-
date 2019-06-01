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
	public function showAllBlogs()
	{
		$result = $this->blog_model->showAllBlogs();
		echo json_encode($result);
		
	}
}