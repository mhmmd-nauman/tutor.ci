<!DOCTYPE HTML>
<html lang="en-US">
<head>
   <title>My Calendar</title>
   <meta charset="UTF-8">
   <style type="text/css">
     .calendar{font-family:arial; font-size:12px;}
	 table.calendar{margin:auto; border-collapse:collapse;}
	 .calendar .days td{width:80px; height:80px; padding:4px; border:1px solid #999; vertical-align:top; background-color:#def;}
	 .calendar .days td:hover{background-color:#fff;}
	 .calendar .highlight{color:#F36;}
   </style>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 </head>
<body>
    <?php //echo $this->calendar_week->generate($data); ?> 
   <?php echo $cal;?>
   <script type="text/javascript">
     $(document).ready(function() {
        $('.calendar .day').click(function() {
            day_num= $(this).find('.day_num').html();
			day_data=prompt('Enter data', $(this).find('.content').html());
			if(day_data != null)
			{
				$.ajax({
					  url: window.location,
					  type: 'POST',
					  data: {
						  day: day_num,
						  data: day_data,
						 
						    },
							success: function(msg)
							{
								location.reload();
							} 
					});
			}
			
        });
    });
   </script>
</body>
</html>