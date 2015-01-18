<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classes extends CI_Controller {
    public function __construct()
	{
            
            parent::__construct();
            if($this->session->userdata('sess_ci_admin_islogged') != true ) {
                    redirect('admin/login', 'refresh');
            }
			 $this->load->model('Classes_model');
	}
	
	public function index()
	{       
	    $data_class_type_id = $this->Classes_model->get_class_type();
		$data_class_level_id = $this->Classes_model->get_class_level_id();
		$data_class_type=$this->Classes_model->class_Type_show_record();
		$data_class_level=$this->Classes_model->class_level_show_record();			
		$data=$this->Classes_model->class_show_record();
		$this->load->view('layout/admin_header_internal');
		$this->load->view('admin/classes', array('data'=>$data, 'data_class_type'=>$data_class_type, 'data_class_level'=>$data_class_level, 'data_class_level_id'=>$data_class_level_id, 'data_class_type_id'=>$data_class_type_id));
		$this->load->view('layout/admin_footer');
		
	}
	public function add()
	{
		    $this->form_validation->set_rules("language","Language","required|xss_clear");
            $this->form_validation->set_rules("class_title","Title","required|xss_clear");
                      
            if($this->form_validation->run()==FALSE)
            {
                $this->session->set_userdata(array(
						'sess_error_type'  => "error",
						'sess_error_msges' => "Please Fill Entries",
						
						 ));
			
				redirect('admin/classes', 'refresh');
            }  
            else 
            {
               
			    		
					
               // $config = array(
//                       // 'upload_path'   => "./assets/upload_img",
//						'upload_path'   => dirname($_SERVER["SCRIPT_FILENAME"])."/assets/upload_img/",
//						'upload_url'    => base_url()."assets/upload_img/",
//                        'allowed_types' => "gif|jpg|png",
//                        'max_size'      => "20000000",
//                        'encrypt_name'  => true,
//                        'remove_spaces' => TRUE,
//                        'overwrite'     => false,
//                        );
//								
//                    $this->load->library('upload', $config);
//                    if (!($this->upload->do_upload('image')))
//                    {
//                        echo 'error';
//                        exit;
//
//                    }
//                    else
//                    {
//                        $upload_data = $this->upload->data();
//
//                        //var_dump($upload_data);
//
//                        //exit;
//                        $file = $upload_data['orig_name'];		
//                        
                           
                            $photo=$_FILES['image']['name'];
							
							$data = array(
								'language'          => $this->input->post('language'),
								'class_title'       => $this->input->post('class_title'),
								'class_description' => $this->input->post('class_description'),
								'photo'             => $photo,
								'method'            => $this->input->post('class_method'),
	
							);
	                        copy($_FILES['image']['tmp_name'], "assets/upload_img/".$photo);
						    $this->Classes_model->add_class($data);
	                        $this->session->set_userdata(array(
						   'sess_msges_type' => "success",
						   'sess_msges'      => "Data inserted successfully....",
							));
								redirect('admin/classes', 'refresh');	
						
							$this->session->set_userdata(array(
						   'sess_msges_type' => "error",
						   'sess_msges'      => "This image is already exist.Try another",
							));
							 redirect('admin/classes', 'refresh');
				
            }   
		
	}
	public function update()
	{
		    $this->session->set_userdata(array(
                    'sess_update_type' => "update",
				    'sess_update'      => "Data updated successfully....",
				
			 ));
		    $id= $this->input->post('class_id');
		   	$data = array(
					  'language'          => $this->input->post('language'),
					  'class_title'       => $this->input->post('class_title'),
					  'class_description' => $this->input->post('class_description'),
					  'photo'             => $this->input->post('img'),
					  'method'            => $this->input->post('class_method'),
			);
			
			$this->Classes_model->update_class($id,$data);
			 redirect('admin/classes', 'refresh');
			
		  
	}
	public function delete()
    {
		$this->session->set_userdata(array(
                    'sess_delete_type' => "delete",
					'sess_delete'      => "Data deleted successfully....",
				
			   ));
                    $id=$this->input->post('class_id');
                    $this->Classes_model->delete_class($id);
               
                    redirect('admin/classes', 'refresh');
                         
    }
	
	public function add_level()
	{
		 
		    $this->form_validation->set_rules("class_level_id","class id","required|xss_clear");
            $this->form_validation->set_rules("class_level","class level","required|xss_clear");
			$this->form_validation->set_rules("creation_date","creation date","required|xss_clear");
			$this->form_validation->set_rules("created_by","create by","required|xss_clear");
                      
            if($this->form_validation->run()==FALSE)
            {
				            $data = array(
										'class_level_id' => $this->input->post('class_level_id'),
										'class_level'    => $this->input->post('class_level'),
										'creation_date'  => $this->input->post('creation_date'),
										'created_by'     => $this->input->post('created_by'),
										
							         	 );
										if(isset($_POST['add_class_level'])==$data)
				                         {
											  $this->session->set_userdata(array(
													'sess_error_type1'  => "error",
													'sess_error_msges1' => "All Field Requied",
													
													 ));
						
				                         }
			
				redirect('admin/classes', 'refresh');
            }  
            else 
            {
				                
								       $this->session->set_userdata(array(
								        
										'sess_delete_level_id' => "",
					                    'sess_delete_level' => "",
										'sess_msges_type1' => "success",
										'sess_msges1' => "Data inserted successfully....",
										
										 ));
										
										$data = array(
										'class_level_id' => $this->input->post('class_level_id'),
										'class_level'    => $this->input->post('class_level'),
										'creation_date'  => $this->input->post('creation_date'),
										'created_by'     => $this->input->post('created_by'),
										
										);
									    
									    $this->Classes_model->add_class_level($data);
									    redirect('admin/classes/add_level', 'refresh');		
			
            }   
		
	}
	public function delete_class_level()
    {
		     $this->session->set_userdata(array(
			       
				    'sess_error_type1'     => "",
					'sess_error_msges1'    => "",
                    'sess_delete_level_id' => "delete",
					'sess_delete_level'    => "Data deleted successfully....",
				    
			   ));
                    $id=$this->input->post('class_level_id');
                    $this->Classes_model->delete_class_level_id($id);
               
                   redirect('admin/classes/add_level', 'refresh');	
                         
    }
	
	public function update_class_level()
	{
		    $this->session->set_userdata(array(
                    'sess_update_class_level'    => "update_level",
				    'sess_update_mgs_level'      => "Data updated successfully....",
				
			 ));
		                                echo $id= $this->input->post('class_level_id');
		                                $data = array(
										'class_level'    => $this->input->post('class_level'),
										'creation_date'  => $this->input->post('creation_date'),
										'created_by'     => $this->input->post('created_by'),
										
										);
			
			$this->Classes_model->update_class_level($id,$data);
			redirect('admin/classes/add_level', 'refresh');	
			
		  
	}
	public function add_class_type()
	{
		 
		    $this->form_validation->set_rules("class_type_id","class id","required|xss_clear");
            $this->form_validation->set_rules("class_type","class type","required|xss_clear");
			
            if($this->form_validation->run()==FALSE)
            {
				            $data = array(
										'class_type_id' => $this->input->post('class_type_id'),
										'class_type'    => $this->input->post('class_type'),
										
							         	 );
										if(isset($_POST['add_class_type'])==$data)
				                         {
											  $this->session->set_userdata(array(
													'sess_error_type1type'  => "error",
													'sess_error_msges1type' => "All Field Requied",
													
													 ));
						
				                         }
			
				redirect('admin/classes', 'refresh');
            }  
            else 
            {
				                
								       $this->session->set_userdata(array(
								        
										'sess_delete_level_idtype' => "",
					                    'sess_delete_leveltype' => "",
										'sess_msges_type1type' => "success",
										'sess_msges1type' => "Data inserted successfully....",
										
										 ));
										
										$data = array(
										'class_type_id' => $this->input->post('class_type_id'),
										'class_type'    => $this->input->post('class_type'),
										
										);
									    
									    $this->Classes_model->add_class_type($data);
									    redirect('admin/classes/add_class_type', 'refresh');		
			
            }   
		
	}
	public function delete_class_type()
    {
		     $this->session->set_userdata(array(
			       
				    'sess_error_type1type'     => "",
					'sess_error_msges1type'    => "",
                    'sess_delete_level_idtype' => "delete",
					'sess_delete_leveltype'    => "Data deleted successfully....",
				    
			   ));
                    $id=$this->input->post('class_type_id');
                    $this->Classes_model->delete_class_type_id($id);
               
                   redirect('admin/classes/add_class_type', 'refresh');	
                         
    }
	public function update_class_type()
	{
		    $this->session->set_userdata(array(
                    'sess_update_class_leveltype'    => "update_level",
				    'sess_update_mgs_leveltype'      => "Data updated successfully....",
				
			 ));
		                                $id= $this->input->post('class_type_id');
		                                $data = array(
										'class_type'    => $this->input->post('class_type'),
										);
			      		
			$this->Classes_model->update_class_type($id,$data);
			redirect('admin/classes/add_class_type', 'refresh');	
			
		  
	}
	  
}