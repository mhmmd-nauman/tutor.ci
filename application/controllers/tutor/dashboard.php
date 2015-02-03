<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        if($this->session->userdata('sess_ci_admin_islogged') != true ) {
                    redirect('admin/login', 'refresh');
            }
        $this->load->model('tutor_model');
    }

    function index() {
                $email=$this->session->userdata('sess_ci_admin_vEmailaddress');
                $id=$this->session->userdata('sess_ci_admin_iadminid');
                $data['tutorview'] = $this->tutor_model->get_tutor_list($email);
//                $data['view'] = $this->student_model->get_student($id);
                
                $this->load->view('layout/user_header_internal');
                $this->load->view('tutor/dashboard',$data);
                $this->load->view('layout/admin_footer_internal');
    }
    public function change_password()
            {
                $this->form_validation->set_rules("old_password","Old Password","required|xss_clear");
                $this->form_validation->set_rules("new_password","Password","required");

            if($this->form_validation->run()==FALSE)
            {   
                $this->session->set_userdata(array(
                    't_sess_add_record_type'=>'error',
                    't_sess_add_record_msg'=>'Please Fill Correct Data',

               ));
                $this->index();
            }  
            else 
            {

                $t_id=$this->session->userdata('sess_ci_admin_iadminid');  
                $data=array
                    (
                    'password'  =>md5($this->input->post('new_password')),
                    );
                $this->gardian_model->update_password($t_id,$data);
                $this->session->set_userdata(array(
                    't_sess_msg' => " Password Successfully Updated",
                    't_sess_msg_type' => 'success'
                ));
                redirect("tutor/dashboard");

            }
            }
    public function  do_save_tutor()
    {

        $this->form_validation->set_rules("t_first_name","First Name","required|xss_clear");
        $this->form_validation->set_rules("t_last_name","Last Name");
        $this->form_validation->set_rules("t_email","Email Address");

        if($this->form_validation->run()==FALSE)
        {   
            $this->session->set_userdata(array(
                't_first_name'  =>$this->input->post('t_first_name'),
                't_last_name'  =>$this->input->post('t_last_name'),
                't_email'  =>$this->input->post('t_email'),
                't_sess_add_record_type'=>'error',
                't_sess_add_record_msg'=>'Please Fill Correct Data',

           ));
            $this->index();
        }  
        else 
        {
            
            $t_id=$this->input->post('t_id');
            $data=array
                (
                'first_name'  =>$this->input->post('t_first_name'),
                'last_name'  =>$this->input->post('t_last_name'),
                'email'  =>$this->input->post('t_email'),
                );
            $this->tutor_model->update_tutor_record($t_id,$data);
            $this->session->set_userdata(array(
                't_sess_msg' => " Record Successfully Updated",
                't_sess_msg_type' => 'success'
            ));
            redirect("admin/tutor");
            
        }   
    }
    public function  do_insert_tutor()
    {

        $this->form_validation->set_rules("t_first_name","First Name","required|xss_clear");
        $this->form_validation->set_rules("t_last_name","Last Name");
        $this->form_validation->set_rules("t_email","Email Address");

        if($this->form_validation->run()==FALSE)
        {
            $this->session->set_userdata(array(
                't_first_name'  =>$this->input->post('t_first_name'),
                't_last_name'  =>$this->input->post('t_last_name'),
                't_email'  =>$this->input->post('t_email'),
                't_sess_add_record_type'=>'error',
                't_sess_add_record_msg'=>'Please Fill Correct Data',

           ));
            $this->index();

        }  
        else 
        {
            
            $data=array
                (
                'first_name'  =>$this->input->post('t_first_name'),
                'last_name'  =>$this->input->post('t_last_name'),
                'email'  =>$this->input->post('t_email'),
                'role_type'=>'Tutor',
                );
            $this->tutor_model->do_insert_tutor($data);
            
            $this->session->set_userdata(array(
                    't_first_name'  =>'',
                    't_last_name'  =>'',
                    't_email'  =>'',
                    't_sess_add_record_type'=>'',
                    't_sess_add_record_msg'=>'',
               ));
            $this->session->set_userdata(array(
                't_sess_msg' => "New Record Successfully Inserted",
                't_sess_msg_type' => 'success'
            ));
            redirect("admin/tutor"); 
        }   
    }
    public function  delete_tutor()
    {
        
        $t_id=$this->input->post('t_id');

        $this->tutor_model->delete_tutor_record($t_id);

        $this->session->set_userdata(array(
            't_sess_msg' => "Record Successfully Deleted",
            't_sess_msg_type' => 'success'
        ));
        redirect("admin/tutor");
    }   

    
}

    

?>