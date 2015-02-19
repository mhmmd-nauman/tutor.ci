<!DOCTYPE html >
<html>
<head>

	<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/calendar_file/reset.css' />
	<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/calendar_file/jquery.weekcalendar.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/calendar_file/demo.css' />
	
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js'></script>
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>assets/calendar_file/jquery.weekcalendar.js'></script>
    
	<script type='text/javascript' src='<?php echo base_url();?>assets/calendar_file/demo.js'></script>
    
	
    
    
</head>
<body> 
	
	<div id='calendar'></div>
	<div id="event_edit_container">
		<form method="post" enctype="multipart/form-data">
			<input type="hidden" />
			<ul>
				<li>
					<span>Date: </span><span class="date_holder"></span> 
				</li>
				<li>
					<label for="start">Start Time: </label><select name="start"><option value="">Select Start Time</option></select>
				</li>
				<li>
					<label for="end">End Time: </label><select name="end"><option value="">Select End Time</option></select>
				</li>
				<li>
					<label for="title">Title: </label><input type="text" name="title" />
				</li>
				<li>
					<label for="body">Body: </label><textarea name="body"></textarea>
				</li>
			</ul>
		</form>
	</div>
	
	
</body>
</html>



