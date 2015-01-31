<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
	{
            
            parent::__construct();
            if($this->session->userdata('sess_ci_admin_islogged') != true ) {
                    redirect('admin/login', 'refresh');
            }
             $this->load->model('gardian_model');
             $this->load->model('student_model');
    }

        function index() 
            {
                $email=$this->session->userdata('sess_ci_admin_vEmailaddress');
                $id=$this->session->userdata('sess_ci_admin_iadminid');
                $data['gardianview'] = $this->gardian_model->get_gardian($email);
                $data['view'] = $this->student_model->get_student($id);

                $this->load->view('layout/user_header_internal');
                $this->load->view('guardian/dashboard',$data);
                $this->load->view('layout/admin_footer_internal');
            }
    
        public function change_password()
            {
                $this->form_validation->set_rules("old_password","Old Password","required|xss_clear");
                $this->form_validation->set_rules("new_password","Password","required");

            if($this->form_validation->run()==FALSE)
            {   
                $this->session->set_userdata(array(
                    'g_sess_add_record_type'=>'error',
                    'g_sess_add_record_msg'=>'Please Fill Correct Data',

               ));
                $this->index();
            }  
            else 
            {

                $p_id=$this->session->userdata('sess_ci_admin_iadminid');  
                $data=array
                    (
                    'password'  =>md5($this->input->post('new_password')),
                    );
                $this->gardian_model->update_password($p_id,$data);
                $this->session->set_userdata(array(
                    'g_sess_msg' => " Password Successfully Updated",
                    'g_sess_msg_type' => 'success'
                ));
                redirect("guardian/dashboard");

            }
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
                redirect("guardian/dashboard");

            }   
        }

        public function  delete_guardian()
        {

            $p_id=$this->input->post('p_id');
            $data=array
                    (
                    'is_active'  =>"0",
                    );
            $this->gardian_model->delete_gardian_record($p_id,$data);

            $this->session->set_userdata(array(
                'g_sess_msg' => "Record Successfully Deleted",
                'g_sess_msg_type' => 'success'
            ));
            redirect("admin/login/logout");
        }
	
	
	
	  
}