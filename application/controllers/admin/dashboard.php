<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
	{
            
            parent::__construct();
            if($this->session->userdata('sess_ci_admin_islogged') != true ) {
                    redirect('admin/login', 'refresh');
            }
            //$this->load->model('client_model');
	}
	
	public function index()
	{  
            $data['message']  = "";
            $this->load->view('layout/admin_header_internal');
            $this->load->view('admin/dashboard',$data);
            $this->load->view('layout/admin_footer');
	}
	
	
	
	  
}