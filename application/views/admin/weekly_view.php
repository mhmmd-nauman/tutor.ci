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
	<div class="modal fade" id="new_class_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
                
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                     <div style="color:#09F; margin-left:15px">
                        <span><h4>Add New Class</h4></span>
                    </div> 
					<br>
                            <input type="hidden" name="class_id" value="" class="form-control input-sm"/>
                             <div class="form-group col-md-5"  style="margin-left:80px">
                                <label>Language:</label><input type="text" name="language" value="" class="form-control input-sm"/>
                             </div>
                             <div class="form-group col-md-5"  >
                             <label>Class Title:</label> <input type="text" name="class_title" value="" class="form-control input-sm"/> 
                             </div>
                             <div class="form-group col-md-10"  style="margin-left:80px">
                                <label>Class Description:</label><textarea  name="class_description" class="form-control input-sm"></textarea>
                             </div>
                             <div class="form-group col-md-5"  style="margin-left:80px">
                                 <label>Class Type:</label> 
                                    <select name='class_method' id='id' class="form-control input-sm">
                                           <option value="Reading">Reading</option>
                                           <option value="Speaking">Speaking</option>
                                     </select>
                             </div>
                             <div class="form-group col-md-5">
                                  <label>Photo:</label> <input type="file" name="image" value="" />
                             </div>
                             <div class="form-group col-md-5" >
                             <input type="submit" name="add" value="Add" class="btn btn-primary "/>&nbsp;<input type="submit" name="cancel_" value="Cancel" class="btn btn-danger" data-dismiss="modal"/>
                             </div>
                              <div class="form-group col-md-5" style="margin-top:20px">
                                
                             </div>
                       
					
					<div class="clearfix"></div>
				</div>
				
				<!--<div class="modal-footer"></div>-->
                
			</div>
		</div>
	</div>
	
</body>
</html>



