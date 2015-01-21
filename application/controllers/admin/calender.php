 <?php 

class Calender extends CI_Controller {
   
	
	public function index($year = null, $month = null)
	{  
	  if(!$year)
	  {
		  $year=date('y');
	  }
	   if(!$month)
	  {
		  $month=date('m');
	  }
	  $this->load->model('Calender_model'); 
	  if($day=$this->input->post('day'))
	  {
	      $this->Calender_model->add_calendar_data(
		  "$year-$month-$day",
		  $this->input->post('data')
		 );	  
	  }  
       $data['cal']=$this->Calender_model->generate($year, $month);
	   $this->load->view('admin/calender', $data);
		
	}
	
    
}