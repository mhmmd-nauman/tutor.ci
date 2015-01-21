<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guardian extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('gardian_model');
    }

    function index() {
        
        $data['gardianview'] = $this->gardian_model->get_gardian_list();
        
        $this->load->view('layout/admin_header_internal');
        $this->load->view('admin/guardian/parent',$data);
        $this->load->view('layout/admin_footer_internal');
    }
    
    public function  do_save_parent()
    {

        $this->form_validation->set_rules("g_first_name","First Name","required|xss_clear");
        $this->form_validation->set_rules("g_last_name","Last Name");
        $this->form_validation->set_rules("g_email","Email Address");

        if($this->form_validation->run()==FALSE)
        {   
            $this->session->set_userdata(array(
                'g_first_name'  =>$this->input->post('g_first_name'),
                'g_last_name'  =>$this->input->post('g_last_name'),
                'g_email'  =>$this->input->post('g_email'),
                'g_sess_add_record_type'=>'error',
                'g_sess_add_record_msg'=>'Please Fill Correct Data',

           ));
            $this->index();
        }  
        else 
        {
            
            $p_id=$this->input->post('p_id');
            $data=array
                (
                'first_name'  =>$this->input->post('g_first_name'),
                'last_name'  =>$this->input->post('g_last_name'),
                'email'  =>$this->input->post('g_email'),
                );
            $this->gardian_model->update_guardian_record($p_id,$data);
            $this->session->set_userdata(array(
                'g_sess_msg' => " Record Successfully Updated",
                'g_sess_msg_type' => 'success'
            ));
            redirect("admin/gardian");
            
        }   
    }
    public function  do_insert_parent()
    {

        $this->form_validation->set_rules("g_first_name","First Name","required|xss_clear");
        $this->form_validation->set_rules("g_last_name","Last Name");
        $this->form_validation->set_rules("g_email","Email Address");

        if($this->form_validation->run()==FALSE)
        {
            $this->session->set_userdata(array(
                'g_first_name'  =>$this->input->post('g_first_name'),
                'g_last_name'  =>$this->input->post('g_last_name'),
                'g_email'  =>$this->input->post('g_email'),
                'g_sess_add_record_type'=>'error',
                'g_sess_add_record_msg'=>'Please Fill Correct Data',

           ));
            $this->index();

        }  
        else 
        {
            
            $data=array
                (
                'first_name'  =>$this->input->post('g_first_name'),
                'last_name'  =>$this->input->post('g_last_name'),
                'email'  =>$this->input->post('g_email'),
                'role_type'=>'PARENT-GUARDIAN',
                );
            $this->gardian_model->do_insert_parent($data);
            
            $this->session->set_userdata(array(
                    'g_first_name'  =>'',
                    'g_last_name'  =>'',
                    'g_email'  =>'',
                    'g_sess_add_record_type'=>'',
                    'g_sess_add_record_msg'=>'',
               ));
            $this->session->set_userdata(array(
                'g_sess_msg' => "New Record Successfully Inserted",
                'g_sess_msg_type' => 'success'
            ));
            redirect("admin/gardian"); 
        }   
    }
    public function  delete_guardian()
    {
        
        $p_id=$this->input->post('p_id');

        $this->gardian_model->delete_gardian_record($p_id);

        $this->session->set_userdata(array(
            'g_sess_msg' => "Record Successfully Deleted",
            'g_sess_msg_type' => 'success'
        ));
        redirect("admin/gardian");
    }   

    
}

    

?>