 <input type="submit" name="add" value="ADD" class="btn btn-primary" data-target="#new_class_model" data-toggle="modal"/>
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
                                <label>Username:</label><input type="text" name="username" value="" class="form-control input-sm"/>
                             </div>
                             <div class="form-group col-md-5"  >
                             <label>Password:</label> <input type="text" name="password" value="" class="form-control input-sm"/> 
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