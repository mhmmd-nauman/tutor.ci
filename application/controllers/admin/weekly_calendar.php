 <?php 

class Weekly_calendar extends CI_Controller {
   
	
	public function index($start_time = '', $start_time  = '', $title  = '', $description  = '')
	{ 
	        $this->load->model('Weekly_model');
            if($start_time=$this->input->post('start_time'))
            {
				    $this->Weekly_model->add_weekly_calendar_data(
                    "$start_time-$start_time",
                    $this->input->post('end_time'),
					$this->input->post('title'),
					$this->input->post('description')
                   );	  
            }   
	   
        $this->load->view('layout/admin_header_internal');
		$this->load->view('admin/weekly_view');
		$this->load->view('layout/admin_footer');
	}
	
    
}