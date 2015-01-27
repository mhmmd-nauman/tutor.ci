 <?php 

class Calender extends CI_Controller {
	public function index()
	{
	  $prefs = array (
	           'show_next_prev'  => TRUE,
               'next_prev_url'   => base_url(). 'admin/calender/index',
              // 'start_day'    => 'saturday',
               'week_type'   => 'long',
               'day_type'     => 'short'
             );

$this->load->library('calendar_week', $prefs);

echo $this->calendar_week->generate();	
	}
   
	//
//	public function index($year = null, $month = null)
//	{  
//            if(!$year)
//            {
//                    $year=date('y');
//            }
//             if(!$month)
//            {
//                    $month=date('m');
//            }
//            $this->load->model('Calender_model'); 
//            if($day=$this->input->post('day'))
//            {
//                $this->Calender_model->add_calendar_data(
//                    "$year-$month-$day",
//                    $this->input->post('data')
//                   );	  
//            }  
//            $data['cal']=$this->Calender_model->generate($year, $month);
//            $this->load->view('admin/calender', $data);
//		
//	}
        
         
	//
//      function index($year='', $month='', $day=''){
//        if ($year==null) {
//            $year = date('Y');
//        }
//        
//        if ($month==null) {
//            $month = date('m');
//        }
//        
//        if ($day==null) {
//            $day = date('d');        
//        }    
//
//        $calendarPreference = array (
//		
//                        'start_day'    => 'monday',
//                        'month_type'   => 'long',
//                        'day_type'     => 'long',
//                       // 'date'         => date(mktime(0, 0, 0, $month, $day, $year)),
//                       // 'url'          => 'week/',
//                    );        
//        $this->load->library('calendar_week', $calendarPreference);
//		
//
//        // I need to feed my calndar week with some data
//        // for the example data are empty
//        $weeks = $this->calendar_week->get_week();
//        $arr_Data = Array();
//        for ($i=0;$i<count($weeks);$i++){
//            $arr_Data[$weeks[$i]] = '';
//        }
//
//        $content['data'] = $arr_Data;      
//        //$this->load->view('show_week', $content);
//        $this->load->view('admin/calender', $content);
//       
//    }
}