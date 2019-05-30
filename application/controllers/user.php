<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('users_model');
        $this->load->model('blog_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->helper('form');
    }
        public function index() 
        {


            $data['data'] = $this->users_model->getUsers();
            $this->load->view('pages/index', $data);
          
        }
        public function insert_users()
        {
              $this->load->view('pages/add');
          
        }
        public function submit()
        {

                $this->form_validation->set_rules('firstname', 'firstName', 'required');
                $this->form_validation->set_rules('lastname', 'lastName', 'required');
                 $this->form_validation->set_rules('status', 'Status', 'required');
                $this->form_validation->set_rules('username', 'userName', 'required|is_unique[users.username]');
                $this->form_validation->set_rules('password', 'passWord', 'required|matches[confirmpassword]');

                if($this->form_validation->run()==FALSE){
                     $this->load->view('pages/add');
                }
                else{
                     $result = $this->users_model->submit();
                    if($result){
                        $this->session->set_flashdata('success_msg', 'Record added successfully');
                    }else{                
                        $this->session->set_flashdata('error_msg', 'Failed to add record');
                    }
                    redirect(site_url('user/index'));
                }
           
        }
        public function edit($id)
        {
            $data['data'] = $this->users_model->getUsersById($id);
            $this->load->view('pages/edit', $data);
        }
        public function update()
        {
           $result = $this->users_model->update();
            if($result){
                $this->session->set_flashdata('success_msg', 'Record updated successfully');
            }else{
                $this->session->set_flashdata('error_msg', 'Failed to update record');
            }
            redirect(site_url('user/index'));
        }
        public function delete($id)
        {

           $result = $this->users_model->deleteuser($id);
            if($result){
                $this->session->set_flashdata('success_msg', 'Record deleted successfully');
            }else{
                $this->session->set_flashdata('error_msg', 'Failed to delete record');
            }
            redirect(site_url('user/index'));
        }
      
    //blog/index.php/user/edit_user
    public function login()
    {
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            if($this->form_validation->run()){
                //true
            $username = $this->input->post('username');

           
            $password = $this->encrypt->sha1($this->input->post('password'));

           

            $this->load->model('users_model');

                if($this->users_model->login($username, $password)){

                $sql = "SELECT * FROM users WHERE username = '".$username."'";
                $result = $this->db->query($sql);
                $row = $result->row();
                     $sess_data = array(
                        'id' => $row->id,
                        'firstname' => $row->firstname,
                        'lastname' => $row->lastname,
                        'status' => $row->status
      
                    );
                    $this->session->set_userdata($sess_data);
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
    public function signin()
    {

        $this->load->view('layout/header');
        $this->load->view('pages/signin');
        $this->load->view('layout/footer');
    }
    public function main()
    {
        $datablog['datablog'] = $this->blog_model->approvedblogs();
        $this->load->view('pages/main', $datablog);
       
    }
    public function logout()
    {  
        $this->session->sess_destroy();
        $this->load->view('layout/header');
        $this->load->view('pages/signin');
        $this->load->view('layout/footer');
    }
    public function insert_blog()
    {


        $this->form_validation->set_rules('blogtitle', 'Blog Title', 'required');
        $this->form_validation->set_rules('caption', 'Caption', 'required');

        if($this->form_validation->run() === FALSE){
           
                $this->load->view('pages/main');
               
        }else{

              $maxid = 0;
            $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `blogpost`')->row();
            if ($row) {
                $maxid = $row->maxid; 
            }
           
            $picname = $maxid+1;

             $data['usersid'] = $this->session->userdata('id');
            $data['usersname'] = $this->session->userdata('firstname') . " ". $this->session->userdata('lastname');
            $data['title'] = $this->input->post('blogtitle');
            $data['caption'] =  $this->input->post('caption');
            $data['time'] = date("h:i:sa");
            $data['date'] = date("Y-M-d");
            $data['picname'] = $picname.'.jpg';

            $this->blog_model->insertblog($data);
            
         
            

            $config['upload_path'] ='./uploads';
            $config['allowed_types'] ='gif|jpg|png';
            // $config['max_width'] = "1024";
            // $config['max_height'] = "786";
             $config['file_name'] = $picname.'.jpg';
            $this->load->library('upload', $config);
           if(!$this->upload->do_upload('userFile')){
                $error  = array('error' =>$this->upload->display_errors());
           } 
           else{
               $data=array('upload_data'=>$this->upload->data());
                redirect(site_url('user/main'));
           }    
         

            
                
        }

    }
    public function adminpage()
    {   
         $datablog['datablog'] = $this->blog_model->get_blogpost();
         $this->load->view('pages/admin',$datablog);
    }
    public function updatestatus($id)
    {
            $result = $this->blog_model->updateblogstatus($id);
            if($result){
                $this->session->set_flashdata('success_msg', 'Blog has been approved');
            }else{
                $this->session->set_flashdata('error_msg', 'Failed to approved blog');
            }
            redirect(site_url('user/adminpage'));
    }
    public function reviewblog($id)
    {
            $data['data'] = $this->blog_model->getblogid($id);
            $this->load->view('blogreviewpage', $data);
    }
    public function editblogs($id)
    {
            $data['data'] = $this->blog_model->getblogid($id);
            $this->load->view('pages/editblog', $data);
    }
    public function updateblogs()
    {
         $result = $this->blog_model->updateblog();
         redirect(site_url('user/main'));
    }
    public function deleteblogs($id)
    {
        $result = $this->blog_model->deleteblog($id);
      
        
        $file = 'uploads/'.$id.'.jpg';
        unlink($file);
     
         redirect(site_url('user/main'));
    }
  
    
}

