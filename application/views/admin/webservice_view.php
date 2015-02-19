
<?php
        $format = strtolower('json'); 
		if($format == 'json') 
		{
		header('Content-type: application/json');
		echo json_encode(array('post'=>$post));
	    }
		
?>
