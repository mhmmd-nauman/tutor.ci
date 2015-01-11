


<!-- TAB 4 -->					  
<div >
	<div class="dash-ct page-title">
		<span class="class-icon left"></span>									  
		<span class="dtxt">Group Classes</span>
	</div>
	<div class="searchPan">

		<div class="padding20">
			<div class="col-md-4">
				<div class="w50percent">
					<div class="wh90percent textleft">
						<span class="opensans size13"><b>From Date</b></span>
						<input type="text" class="form-control mySelectCalendar" id="datepicker3" placeholder="mm/dd/yyyy"/>
                        <br />
                        <a href="#" data-target="#new_class_model" data-toggle="modal" class="btn btn-success">&nbsp;&nbsp;&nbsp;Add New class&nbsp;&nbsp;&nbsp;</i></a>&nbsp;
					</div>
				</div>

				<div class="w50percentlast">
					<div class="wh90percent textleft right">
						<span class="opensans size13"><b>To Date</b></span>
						<input type="text" class="form-control mySelectCalendar" id="datepicker4" placeholder="mm/dd/yyyy"/>
                        <br />
                                               
                        <a href="#" data-target="#new_class_type_model" data-toggle="modal" class="btn btn-success">&nbsp;&nbsp;View Class Type&nbsp;</i></a>&nbsp;
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="w50percent">
					<div class="wh90percent textleft">
						<span class="opensans size13"><b>Tutor Name</b></span>
						<input type="text" placeholder="Name..." class="form-control">
                        <br />
                        <a href="#" data-target="#new_class_level_model" data-toggle="modal" class="btn btn-success">&nbsp;&nbsp;View Class Level&nbsp;</i></a>&nbsp;
					</div>
				</div>

				<div class="w50percentlast">
					<div class="wh90percent textleft right">
						<span class="opensans size13"><b>Student Name</b></span>
						<input type="text" placeholder="Name..." class="form-control">
					</div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="w50percent">
					<div class="wh90percent textleft">
						<span class="opensans size13"><b>Class Type</b></span>
						<select class="form-control mySelectBoxClass">
						  <option>Trial</option>
						  <option>Paid</option>
						  <option selected>Any</option>
						</select>
					</div>
				</div>
                
				<div class="w50percentlast">
					<div class="padding20">
						<button class="btn-search4 margleft15" type="submit">Search</button>
                        </div>
                        
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
		<br/>  
	</div> <!-- end of search pan -->
	<br/>  
	<div class="table-responsive">
		<table class="table-striped">
			<tr>
             
				<th>#</th> <th>Language</th> <th>Class Title</th> <th>Class Description</th> <th>photo</th>  <th></th>
			</tr>
            <?php
										//print_r($persons);
										for($i=0; $i<count($data);$i++) {
										?>
			<tr><td><?php echo $data[$i]->class_id;?></td> <td><?php echo $data[$i]->language;?></td> <td><?php echo $data[$i]->class_title;?></td> <td><?php echo $data[$i]->class_description;?></td> <td><?php echo $data[$i]->photo;?></td>
             <td><a href="" class="glyphicon glyphicon-search modalLink" data-toggle="modal" data-target="#preview_model<?php echo $data[$i]->class_id;?>">Preview</a>
             <a href="" class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#edit_model<?php echo $data[$i]->class_id;?>">Edit</a>
             <a href="" class="glyphicon glyphicon-remove" data-toggle="modal" data-target="#delete_class_Modal<?php echo $data[$i]->class_id;?>">Delete</a></td></tr>
			</tr>
            <?php }?>
		</table>
	</div>
	<!--<?php
										//print_r($persons);
										for($i=0; $i<count($data);$i++) {
										?><!-- user preview popups -->
	<div class="modal fade" id="preview_model<?php echo $data[$i]->class_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<br>
					<div class="avatar"> <img src="http://cache4.asset-cache.net/xt/170747324.jpg?v=1&g=fs1|0|OJO|47|324&s=1" /> </div>
					<div class="userInfo">
						<div class="center">
							<h2 class="modal-title" id="myModalLabel">Philip</h2>
							<div class="row"><label>Language:</label> <span><?php echo $data[$i]->language;?></span></div>
							<div class="row"><label>Class Title:</label> <span><?php echo $data[$i]->class_title;?></span></div>
							<div class="row"><label>Class Description:</label> <span><?php echo $data[$i]->class_description;?></span></div>
						</div>
					</div>
					<div class="userStat">
						<div class="column"><label>Private Lessons</label><span>7</span></div>
						<div class="column"><label>Group Classes</label><span>12</span></div>
						<div class="column"><label>Member Since</label><label class="blue">12 Sep 2014</label></div>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="modal-body">
					<div class="table-responsive">
						<table class="table-striped">
							<tr>
								<th>Date</th> <th>Time</th> <th>Student</th> <th>Session Type</th> <th>Price</th> <th>Status</th> <th></th>
							</tr>
							<tr><td>4 Jan 2015</td> <td>12:00 am</td> <td>Reena</td> <td>Private Session</td> <td>&pound; 14.00</td> <td><span class="glyphicon glyphicon-time"></span></td>         </tr>
							<tr><td>2 Dec 2014</td> <td>2:00 pm</td>  <td>Jhon</td>  <td>Group Class</td>     <td>&pound; 5.00</td>  <td><span class="glyphicon glyphicon-ok"></span></td>    </tr>
						</table>
					</div>
				</div>
				<!--<div class="modal-footer"></div>-->
			</div>
		</div>
	</div>
    <?php }?>
	<!-- //user preview popups -->
    <?php 
		$attributes = array('method' => 'post','enctype'=>'multipart/form-data');
		$hidden = array(
			//'username' => 'Joe', 'member_id' => '234'
			);
		echo form_open('admin/classes/update',$attributes,$hidden);?>
   
   <?php
	for($i=0; $i<count($data);$i++) {
	?>
    
	<div class="modal fade" id="edit_model<?php echo $data[$i]->class_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<br>
					<div class="avatar"> <img src="http://cache4.asset-cache.net/xt/493189933.jpg?v=1&g=fs1|0|FPG|89|933&s=1" /> </div>
					<div class="userInfo">
						<div >
                          <div class="col-md-10" style="margin-left:20px">
                            
                            <div class="row"><input type="hidden" name="class_id" value="<?php echo $data[$i]->class_id; ?>"></div>
 							<div class="row"><label>Language:</label><input type="text" name="language" value="<?php echo $data[$i]->language;?>" class="form-control col-md-2"/></div>
							<div class="row"><label>Class Title:</label> <input type="text" name="class_title" value="<?php echo $data[$i]->class_title;?>" class="form-control"/></div>
							<div class="row"><label>Class Description:</label> <input type="text" name="class_description" value="<?php echo $data[$i]->class_description;?>" class="form-control"/></div>
                            <div class="row"><label>Photo:</label> <input type="file" name="img" value="" /></div><br />
                            <div class="row"><input type="submit" name="update_class" value="Update" class="btn btn-primary "/></div>
                            </div>
                            
                           
						</div>
                        
					</div>
                                  
					
					<div class="clearfix"></div>
				</div>
				
				<!--<div class="modal-footer"></div>-->
                
			</div>
		</div>
	</div>
    
    <?php } ?>
    </form>
    
     <?php 
		$attributes = array('method' => 'post','enctype'=>'multipart/form-data');
		$hidden = array(
			//'username' => 'Joe', 'member_id' => '234'
			);
		echo form_open('admin/classes/add',$attributes,$hidden);?>
        
    <div class="modal fade" id="new_class_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
                
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                      
					<br>
                     <?php
                                                if ($this->session->userdata('sess_error_type') == 'error') {
                                                    ?>
                                                <div class="alert alert-danger">
                                                    <strong><?php echo $this->session->userdata('sess_error_msges');?></strong> 
                                                </div>
                                                <?php 
												$this->session->set_userdata(array(
                                                   'sess_error_type' => "",
                                                   'sess_error_msges' =>""
                                                ));
                                                } ?>
					<div class="avatar"> <img src="http://cache4.asset-cache.net/xt/493189933.jpg?v=1&g=fs1|0|FPG|89|933&s=1" /> </div>
					<div class="userInfo">
						<div >
                          <div class="col-md-10" style="margin-left:40px">
                           
                            <div class="row"><input type="hidden" name="class_id" value=""></div>
 							<div class="row"><label>Language:</label><input type="text" name="language" value="" class="form-control "/></div>
							<div class="row"><label>Class Title:</label> <input type="text" name="class_title" value="" class="form-control"/></div>
							<div class="row"><label>Class Description:</label><textarea name="class_description" class="form-control"></textarea></div>
                            
                            <div class="row"><label>Photo:</label> <input type="file" name="img" value="" /></div><br />
                            <div class="row"><input type="submit" name="add" value="Add" class="btn btn-primary "/>&nbsp;<input type="submit" name="cancel_" value="Cancel" class="btn btn-danger" data-dismiss="modal"/></div>
                            
                           
                            </div>
                          
						</div>
                         
					</div>
					<div class="clearfix"></div>
				</div>
				
				<!--<div class="modal-footer"></div>-->
                
			</div>
		</div>
	</div>
    </form>
    
     <?php 
		$attributes = array('method' => 'post','enctype'=>'multipart/form-data');
		$hidden = array(
			//'username' => 'Joe', 'member_id' => '234'
			);
		echo form_open('admin/classes/delete',$attributes,$hidden);?>
    
    <?php
	for($i=0; $i<count($data);$i++) {
	?>
    <div class="modal fade" id="delete_class_Modal<?php echo $data[$i]->class_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<br>
					<div class="avatar"> <img src="http://cache4.asset-cache.net/xt/493189933.jpg?v=1&g=fs1|0|FPG|89|933&s=1" /> </div>
					<div class="userInfo">
						<div >
                          <div class="col-md-11" style="margin-left:20px">
                            
                            <div class="row"><input type="hidden" name="class_id" value="<?php echo $data[$i]->class_id;?>"></div>
                                              
                             <div class="row alert alert-error"><h5>Are you sure! You want to delete it</h5>
                             <input type="submit" name="delete_student" value="Yes" class="btn btn-danger "/>
                                             <input type="submit" name="cancel" value="NO" class="btn btn-success"/>
                            </div>
                            
                            </div>
                           
						</div>
                        
					</div>
					
					<div class="clearfix"></div>
                    <div class="modal-body">
					<div class="table-responsive">
						<table class="table-striped">
							<tr>
								<th>Language</th> <th>Class Title</th> <th>Class Description</th> <th>Photo</th>
							</tr>
							<tr><td><?php echo $data[$i]->language;?></td> <td><?php echo $data[$i]->class_title;?></td> <td><?php echo $data[$i]->class_description;?></td>		<td><?php echo $data[$i]->photo;?></td> <td><span class="glyphicon glyphicon-time"></span></td>         </tr>
							
						</table>
					</div>
				</div>
				</div>
				
				<!--<div class="modal-footer"></div>-->
                
			</div>
		</div>
	</div>
    <?php } ?>

 </form>
 
 
 <div class="modal fade" id="new_class_type_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<br>
					<div class="avatar"> <img src="http://cache4.asset-cache.net/xt/493189933.jpg?v=1&g=fs1|0|FPG|89|933&s=1" /> </div>
					<div class="userInfo">
						<div >
                          <div class="col-md-11" style="margin-left:20px">
                            
                            <div class="row"><input type="hidden" name="class_id" value=""></div>
                                              
                                  <div class="row"><input type="hidden" name="class_id" value=""></div>
                                  <div class="row"><label>Class Type :</label> <input type="text" name="class_title" value="" class="form-control"/></div>
                           
                            </div>
                           
						</div>
                        
					</div>
					
					<div class="clearfix"></div>
                    <div class="modal-body">
					<div class="table-responsive">
						<table class="table-striped">
							<tr>
								<th># Class Type Id</th> <th>Class Type</th> <th></th> <th></th>
							</tr>
                             <?php
										//print_r($persons);
										for($i=0; $i<count($data_class_type);$i++) {
										?>
							<tr><td><?php echo $data_class_type[$i]->class_type_id;?></td> <td><?php echo $data_class_type[$i]->class_type;?></td><td></td> <td><span class="glyphicon glyphicon-time"></span></td>         </tr>
							<?php }?>
						</table>
					</div>
				</div>
				</div>
				
				<!--<div class="modal-footer"></div>-->
                
			</div>
		</div>
	</div>
     <script>
        $(function() {
                <?php
                    if ($this->session->userdata('sess_msges_type1') == 'success') { ?>
                    $('#new_class_level_model').modal('show');
                    });
                    <?php } ?>
				<?php
                    if ($this->session->userdata('sess_msges_type1') == 'dublicate') { ?>
                    $('#new_class_level_model').modal('show');
                    });
                    <?php } ?>
		         <?php
                    if ($this->session->userdata('sess_delete_level_id') == 'delete') { ?>
                    $('#new_class_level_model').modal('show');
                    });
                    <?php } ?>
				 <?php
                    if ($this->session->userdata('sess_error_type1') == 'error') { ?>
                    $('#new_class_level_model').modal('show');
                    });
                    <?php } ?>
				 <?php
                    if ($this->session->userdata('sess_update_class_level') == 'update_level') { ?>
                    $('#new_class_level_model').modal('show');
                    });
                    <?php } ?>
					
		
    </script>
     <?php 
		$attributes = array('method' => 'post','enctype'=>'multipart/form-data');
		$hidden = array(
			//'username' => 'Joe', 'member_id' => '234'
			);
		echo form_open('admin/classes/add_level',$attributes,$hidden);?>
   
  <div class="modal fade" id="new_class_level_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<br>
                                              
                                                 <?php
                                                if ($this->session->userdata('sess_msges_type1') == 'success') {
                                                    ?>
                                                <div class="alert alert-success">
                                                    <strong><?php echo $this->session->userdata('sess_msges1');?></strong> 
                                                </div>
                                                <?php 
												$this->session->set_userdata(array(
                                                   'sess_msges_type1' => "",
                                                   'sess_msges1' =>"",
												   
                                                ));
                                                } ?>
                                                 <?php
                                                if ($this->session->userdata('sess_msges_type1') == 'dublicate') {
                                                    ?>
                                                <div class="alert alert-danger">
                                                    <strong><?php echo $this->session->userdata('sess_msges1');?></strong> 
                                                </div>
                                                <?php 
												$this->session->set_userdata(array(
                                                   'sess_msges_type1' => "",
                                                   'sess_msges1' =>"",
												   
                                                ));
                                                } ?>
                                                <?php
                                                if ($this->session->userdata('sess_delete_level_id') == 'delete') {
                                                    ?>
                                                <div class="alert alert-success">
                                                    <strong><?php echo $this->session->userdata('sess_delete_level');?></strong> 
                                                </div>
                                                <?php 
												$this->session->set_userdata(array(
                                                   'sess_delete_level_id' => "",
                                                   'sess_delete_level' =>""
                                                ));
                                                } ?>
                                                 <?php
                                                if ($this->session->userdata('sess_error_type1') == 'error') {
                                                    ?>
                                                <div class="alert alert-danger">
                                                    <strong><?php echo $this->session->userdata('sess_error_msges1');?></strong> 
                                                </div>
                                                <?php 
												$this->session->set_userdata(array(
                                                   'sess_error_type1' => "",
                                                   'sess_error_msges1' =>""
                                                ));
                                                } ?>
                                                <?php
                                                if ($this->session->userdata('sess_update_class_level') == 'update_level') {
                                                    ?>
                                                <div class="alert alert-success">
                                                    <strong><?php echo $this->session->userdata('sess_update_mgs_level');?></strong> 
                                                </div>
                                                <?php 
												$this->session->set_userdata(array(
                                                   'sess_update_class_level' => "",
                                                   'sess_update_mgs_level' =>""
                                                ));
                                                } ?>
                                               
                                               
					<div class="avatar"> <img src="http://cache4.asset-cache.net/xt/493189933.jpg?v=1&g=fs1|0|FPG|89|933&s=1" /> </div>
					
                                    
                                            <div class="form-group col-md-5">
                                                <label>Class Level Id:</label> 
												<select name='class_level_id' id='id' class="form-control input-sm">
                                                <option></option>
                                                <?php 
													
													if (count($data_class_level_id)) {
														foreach ($data_class_level_id as $list) { ?>
                                                   <option value="<?php echo $list['user_id'];?>"><?php echo $list['class_level_id'];?></option>
                                                   <?php }}?> 
                                                </select>
												
												
                                            </div>
                                            
                                            <div class="form-group col-md-5">
                                                <label>Class Level:</label><input type="text" placeholder="class level" name="class_level" value="" class="form-control input-sm"> 
                                            </div>
                                           <div class="form-group col-md-5">
                                            <label>Creation Date:</label><input type="date" name="creation_date" value="" class="form-control input-sm" > 
                                              <br />
                                            <input type="submit" name="add_class_level" value="ADD" class="btn btn-success" />
                                            <input type="submit" name="cancel_class_level" value="Cancel" class="btn btn-danger" data-dismiss="modal"/>
                                            </div>
                                            <div class="form-group col-md-5">
                                            <label>Created By:</label><input type="text" name="created_by" value="" placeholder="created by" class="form-control input-sm" > 
                                          
                                            </div> 
                                                  

					
					<div class="clearfix"></div>
                    <div class="modal-body">
					<div class="table-responsive">
						<table class="table-striped">
							<tr>
								<th># Class Level Id</th> <th>Class Level</th> <th>Creation Date</th> <th>Created By</th><th></th><th></th>
							</tr>
                             <?php
										//print_r($persons);
										for($i=0; $i<count($data_class_level);$i++) {
										?>
							<tr><td><?php echo $data_class_level[$i]->class_level_id;?></td> <td><?php echo $data_class_level[$i]->class_level;?></td> <td><?php echo $data_class_level[$i]->creation_date;?></td> <td><?php echo $data_class_level[$i]->created_by;?></td><td>  <a href="" class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#update_class_level_model<?php echo $data_class_level[$i]->class_level_id;?>">Edit</a><a href="" class="glyphicon glyphicon-remove" data-toggle="modal" data-target="#delete_class_level_id<?php echo $data_class_level[$i]->class_level_id;?>">Delete</a>&nbsp;</td><td></td>         </tr>
							<?php }?>
						</table>
					</div>
				</div>
				</div>
				
				<!--<div class="modal-footer"></div>-->
                
			</div>
		</div>
	</div>
   </form>
   
    <?php 
		$attributes = array('method' => 'post','enctype'=>'multipart/form-data');
		$hidden = array(
			//'username' => 'Joe', 'member_id' => '234'
			);
		echo form_open('admin/classes/delete_class_level',$attributes,$hidden);?>
    
    <?php
	for($i=0; $i<count($data_class_level);$i++) {
	?>
   <div class="modal fade" id="delete_class_level_id<?php echo $data_class_level[$i]->class_level_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<br>
                      
					<div class="avatar"> <img src="http://cache4.asset-cache.net/xt/493189933.jpg?v=1&g=fs1|0|FPG|89|933&s=1" /> </div>
					<div class="userInfo">
						<div >
                         <div class="col-md-11" style="margin-left:20px">
                            
                            <div class="row"><input type="hidden" name="class_level_id" value="<?php echo $data_class_level[$i]->class_level_id;?>"></div>
                                              
                             <div class="row alert alert-error"><h5>Are you sure! You want to delete it</h5>
                             <input type="submit" name="delete_student" value="Yes" class="btn btn-danger " />
                             <input type="submit" name="cancel_class_level" value="No" class="btn btn-success" data-dismiss="modal"/>
                            </div>
                            
                            </div>
                           
						</div>
                        
					</div>
					
					<div class="clearfix"></div>
                    <div class="modal-body">
					<div class="table-responsive">
						<table class="table-striped">
							<tr>
								<th># Class Level Id</th> <th>Class Level</th> <th>Creation Date</th> <th>Created By</th><th></th><th></th>
							</tr>
                            
							<tr><td><?php echo $data_class_level[$i]->class_level_id;?></td> <td><?php echo $data_class_level[$i]->class_level;?></td><td><?php echo $data_class_level[$i]->creation_date;?></td> <td><?php echo $data_class_level[$i]->created_by;?></td>         </tr>
						
						</table>
					</div>
				</div>
				</div>
				
				<!--<div class="modal-footer"></div>-->
                
			</div>
		</div>
	</div>
    <?php }?>
     </form>
				  <?php 
                    $attributes = array('method' => 'post','enctype'=>'multipart/form-data');
                    $hidden = array(
                        //'id' => 'Joe',
                        );
                    ?>
               
				   <?php
                    for($i=0; $i<count($data_class_level);$i++) {
						echo form_open('admin/classes/update_class_level',$attributes,$hidden);
                    ?>
                                                   
   <div class="modal fade" id="update_class_level_model<?php echo $data_class_level[$i]->class_level_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<br>
                                              
					<div class="avatar"> <img src="http://cache4.asset-cache.net/xt/493189933.jpg?v=1&g=fs1|0|FPG|89|933&s=1" /> </div>
					
                                    
                                            
                                           
                                           <input type="hidden" name="class_level_id" value="<?php echo $data_class_level[$i]->class_level_id;?>" />
                                           
                                            <div class="form-group col-md-5">
                                                <label>Class Level:</label><input type="text" placeholder="class level" name="class_level" value="<?php echo $data_class_level[$i]->class_level;?>" class="form-control input-sm"> 
                                            </div>
                                             <div class="form-group col-md-5">
                                            <label>Created By:</label><input type="text" name="created_by" value="<?php echo $data_class_level[$i]->created_by;?>" placeholder="created by" class="form-control input-sm" > 
                                             
                                            </div>
                                           <div class="form-group col-md-5">
                                            <label>Creation Date:</label><input type="text" name="creation_date" value="<?php echo $data_class_level[$i]->creation_date;?>" class="form-control input-sm" > 
                                            
                                            </div>
                                            <div class="form-group col-md-5">
                                             <br />
                                            <input type="submit" name="add_class_level" value="ADD" class="btn btn-success" />
                                            <input type="submit" name="cancel_class_level" value="Cancel" class="btn btn-danger" data-dismiss="modal"/>
                                            
                                            </div>
                                           

					
					<div class="clearfix"></div>
                    
				</div>
				
				<!--<div class="modal-footer"></div>-->
                
			</div>
		</div>
	</div>
     </form>
    <?php } ?>


</div>
<!-- END OF TAB 4 -->	
