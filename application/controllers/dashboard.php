<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function index() 
    {
        $this->laod->view('layout/header');
        $this->laod->view('pages/dashboard/index');
        $this->laod->view('layout/footer');
    }

}