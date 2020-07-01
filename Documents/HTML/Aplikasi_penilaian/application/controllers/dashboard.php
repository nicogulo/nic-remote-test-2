<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
    }

    public function index()
    {
        $username = $this->session->userdata('username');
		if(isset($username)) :
			$data['Title'] = "dashboard";
			redirect('welcome','refresh');        

        else : redirect('welcome','refresh');endif;

        
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}