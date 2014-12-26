<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
	{
            
            parent::__construct();
            if($this->session->userdata('sess_ci_admin_islogged') != true ) {
                    redirect('login', 'refresh');
            }
            //$this->load->model('client_model');
	}
	
	public function index()
	{  
            $data['message']  = "";
            $this->load->view('layout/admin_header');
            $this->load->view('admin/dashboard',$data);
            $this->load->view('layout/admin_footer');
	}
	public function insert_client_info ()
	{
            $data['name']    =  $this->input->post('name');
            $data['email']           =  $this->input->post('email');
            $data['company']         =  $this->input->post('company');
            $data['address_one']     =  $this->input->post('address_one');
            $data['address_two']    =  $this->input->post('address_two');
            $data['city']          =  $this->input->post('city');
            $data['state']          =  $this->input->post('state');
            $data['country']        =  $this->input->post('country');
            $data['postcode']        =  $this->input->post('postcode');
            $data['phone']          =  $this->input->post('phone');
            $data['group_id']       =  $this->input->post('group_id');
            $data['registration_date'] = date('Y-m-d');
            $data['status']         =  $this->input->post('status');
            $data['currency']       =  $this->input->post('currency');
            $data['password']        =  $this->input->post('password');
	
	$insert = $this->client_model->insert_client($data);
	if ($insert){
	  redirect(base_url());
	} else {
	
	 $data['message']  = "something went wrong";
	 redirect(base_url());
      }
	
	}
	
	public function insert_group_title ()
	{
	 $data['group_name'] = $this->input->post('title');
	 $title_id = $this->client_model->insert_group_title($data);
	 if ($title_id){
	  redirect(base_url());
	
	} else {
	
	 $data['message']  = "something went wrong";
	 redirect(base_url());
      }
	}
	
	
	function update_group ($id)
	{
	
	 $data['group_info'] = $this->client_model->group_by_id ($id);
	  $data['message'] = "";
	 $this->load->view('layout/header');
	 $this->load->view('layout/left_sidebar');
	 $this->load->view('update_group',$data);
	
	}
	
	function make_update_title(){
	
	$id = $this->input->post('id');
	$group_name = $this->input->post('title');
	$this->client_model->make_update_title($group_name , $id);
	 redirect(base_url());
	
	}
	
	function delete_group ($id)
	{
	
	$this->client_model->delete_group($id);
	redirect(base_url());
	
	}
	
    function filter_client(){ 
	//  $data['group_info'] = $this->client_model->group_by_id ($id);
	 // $data['message'] = "";
      $data['group_list'] = $this->client_model->group_list();
     /* echo "<pre>";
      print_r($data);exit;
	 */
      $this->load->view('layout/header');
	  $this->load->view('layout/left_sidebar');
	  $this->load->view('client_filter',$data);	
	}	
	public function filter_client_info(){
		
		$name    =  $this->input->post('name');
        $email           =  $this->input->post('email');
	    $company         =  $this->input->post('company');
	    $status         =  $this->input->post('status'); 
		$group_id         =  $this->input->post('client_group');
		
		$data_filter['filter_res']=$this->client_model->client_filter_by_id($name,$email,$company,$status,$group_id);
		$data_filter['group_list'] = $this->client_model->group_list();
	/*echo "<pre>";
	print_r($data_filter);exit;*/
	 $this->load->view('layout/header');
	  $this->load->view('layout/left_sidebar');
		$this->load->view('client_filter',$data_filter);					
	}
	 public function lookup(){  
        // process posted form data  
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response  
        $query = $this->client_model->lookup($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id'=>$row->id,  
                                        'value' => $row->name,
                                        ''  
                                     );  //Add a row to array  
            }  
        }  
        if('IS_AJAX')  
        {  
            echo json_encode($data); //echo json string if ajax request  
               
        }  
        else  
        {  
            $this->load->view('autocomplete/index',$data); //Load html view of search results  
        }  
    }
	//company Name start here
	public function company(){  
        // process posted form data  
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response  
        $query = $this->client_model->company($keyword); //Search DB 
		/*echo "<pre>";
		print_r($query); 
		exit;*/
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id'=>$row->id,                                          
										'company'=>$row->company);  //Add a row to array  
            }  
        }  
        if('IS_AJAX')  
        {  
            echo json_encode($data); //echo json string if ajax request  
               
        }  
        else  
        {  
            $this->load->view('autocomplete/index',$data); //Load html view of search results  
        }  
    }
	//company Name end here
	
	  
}