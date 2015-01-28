 <?php 

class Weekly_calendar extends CI_Controller {
   
	
	public function index()
	{  
        $this->load->view('layout/admin_header_internal');
		$this->load->view('admin/weekly_view');
		$this->load->view('layout/admin_footer');
	}
	
    
}