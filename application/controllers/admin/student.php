<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('student_model');
    }

    function index() {
        
        $data['student_list'] = $this->student_model->get_student_list();
        
        
        $this->load->view('layout/admin_header_internal');
        $this->load->view('admin/student/student_list',$data);
        $this->load->view('layout/admin_footer_internal');
    }

    

    public function do_save_student() {
        $login['email'] = $this->input->post('userName');
        $login['pass'] = $this->input->post('password');
        //$login['group_id'] = $_REQUEST['group_id'];
        $login['status'] = '1';
        
        $result = $this->student_model->insert_student($login);
           
                
        redirect("admin/student");
            
        
    }

    public function insert_student() {

        
        $data['title'] = "Insert New Student";
        $this->load->view('layout/admin_header_internal');
        $this->load->view('admin/login_page',$data);
        $this->load->view('layout/admin_footer');

    }
    public function insert_dummy_student(){
        // a hard code login code
        $data['parent_id'] = "1";
        $data['first_name'] = "Student";
        $data['last_name'] = "One";
        $data['mobile'] = "923134086188";
        $data['email'] = "student1@gmail.com";
        $data['phone'] = "123456";
        
        $data['creation_date'] = date("Y-m-d h:i:s");
        $data['last_activity'] = date("Y-m-d h:i:s");
        
        
        $this->student_model->insert_student($data);
    }
    
}

    

?>