<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('student_model');
    }

    function index() {
        
        $data['view'] = $this->student_model->get_student_list();
        
        
        $this->load->view('layout/admin_header_internal');
        $this->load->view('admin/student/student_list',$data);
        $this->load->view('layout/admin_footer_internal');
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
    
    public function  do_save_student()
    {

        $this->form_validation->set_rules("first_name","First Name","required|xss_clear");
        $this->form_validation->set_rules("last_name","Last Name");
        $this->form_validation->set_rules("email","Email Address");

        if($this->form_validation->run()==FALSE)
        {   
            $this->session->set_userdata(array(
                        'first_name'  =>$this->input->post('first_name'),
                        'last_name'  =>$this->input->post('last_name'),
                        'address'  =>$this->input->post('address'),
                        'mobile'  =>$this->input->post('mobile'),
                        'email'  =>$this->input->post('email'),
                        'sess_add_record_type'=>'error',
                        'sess_add_record_msg'=>'Please Fill Correct Data',

           ));
            $this->index();
        }  
        else 
        {
            
            $s_id=$this->input->post('s_id');
            $data=array
                (
                    'first_name'  =>$this->input->post('first_name'),
                    'last_name'  =>$this->input->post('last_name'),
                    'address'  =>$this->input->post('address'),
                    'mobile'  =>$this->input->post('mobile'),
                    'email'  =>$this->input->post('email'),
                );
            $this->student_model->update_student_record($s_id,$data);
            $this->session->set_userdata(array(
                'sess_msg' => " Record Successfully Updated",
                'sess_msg_type' => 'success'
            ));
            redirect("admin/student");
            
        }   
    }
    public function  do_insert_student()
    {

        $this->form_validation->set_rules("first_name","First Name","required|xss_clear");
        $this->form_validation->set_rules("last_name","Last Name");
        $this->form_validation->set_rules("email","Email Address");

        if($this->form_validation->run()==FALSE)
        {
            $this->session->set_userdata(array(
                        'first_name'  =>$this->input->post('first_name'),
                        'last_name'  =>$this->input->post('last_name'),
                        'address'  =>$this->input->post('address'),
                        'mobile'  =>$this->input->post('mobile'),
                        'email'  =>$this->input->post('email'),
                        'sess_add_record_type'=>'error',
                        'sess_add_record_msg'=>'Please Fill Correct Data',

           ));
            $this->index();

        }  
        else 
        {
            
            $data=array
                (
                    'first_name'  =>$this->input->post('first_name'),
                    'last_name'  =>$this->input->post('last_name'),
                    'address'  =>$this->input->post('address'),
                    'mobile'  =>$this->input->post('mobile'),
                    'email'  =>$this->input->post('email'),
                );
            $this->student_model->add_student_record($data);
            
            $this->session->set_userdata(array(
                            'first_name'  =>'',
                            'last_name'  =>'',
                            'address'  =>'',
                            'mobile'  =>'',
                            'email'  =>'',
                            'sess_add_record_type'=>'',
                            'sess_add_record_msg'=>'',
               ));
            $this->session->set_userdata(array(
                'sess_msg' => "New Record Successfully Inserted",
                'sess_msg_type' => 'success'
            ));
            redirect("admin/student"); 
        }   
    }
    public function  delete_student()
    {
        
        $s_id=$this->input->post('s_id');

        $this->student_model->delete_student_record($s_id);

        $this->session->set_userdata(array(
            'sess_msg' => "Record Successfully Deleted",
            'sess_msg_type' => 'success'
        ));
        redirect("admin/student");
    }   

    
}

    

?>