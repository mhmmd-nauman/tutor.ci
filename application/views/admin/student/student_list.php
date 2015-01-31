<?php
    if ($this->session->userdata('sess_msg_type') == 'success') {
?>
    <div class="alert alert-success">
          <strong><?php echo $this->session->userdata('sess_msg');?></strong> 
    </div>
        <?php 
           $this->session->set_userdata(array(
               'sess_msg' => "",
               'sess_msg_type' => ''
            ));
    } ?>
</div>
<!-- TAB 3 -->					  
<div>
	<div class="dash-ct page-title">
		<span class="profile-icon left"></span>									  
		<span class="dtxt">Students</span>
	</div>
	<div class="searchPan">

		<div class="padding20">
			<div class="col-md-4">
				<div class="w50percent">
					<div class="wh90percent textleft">
						<span class="opensans size13"><b>Student Name</b></span>
						<input type="text" placeholder="Name..." class="form-control">
					</div>
				</div>

				<div class="w50percentlast">
					<div class="wh90percent textleft right">
						<span class="opensans size13"><b>Postcode</b></span>
						<input type="text" placeholder="i.e. E14 9ET" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="w50percent">
					<div class="wh90percent textleft">
						<span class="opensans size13"><b>Email</b></span>
						<input type="text" placeholder="example@example.com" class="form-control">
					</div>
				</div>

				<div class="w50percentlast">
					<div class="wh90percent textleft right">
						<span class="opensans size13"><b>Tel</b></span>
						<input type="text" placeholder="i.e. 02456..." class="form-control">
					</div>
				</div>
			</div>


			<div class="col-md-4">
				<div class="padding20">
                                    <button class="btn-search4 margleft15" type="submit">Search</button> &nbsp;&nbsp;
                                        <a href="" class="glyphicon glyphicon-floppy-save" data-toggle="modal" data-target="#stu_add">Add Record</a> 
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
				<th>#</th> <th>Name</th> <th>Email</th> <th>Tel</th> <th>Address</th> <th>Activities</th> <th></th>
			</tr>
                        
                        <?php
                            $i=0;
                            foreach ($view as $row)
                            {   
                                $i++;
                                $id=$row->student_id;
                                $parent_id=$row->parent_id;
                                $first_name=$row->first_name;
                                $last_name=$row->last_name;
                                $address=$row->address;
                                $mobile=$row->mobile;
                                $email=$row->email;
                                $phone=$row->phone;
                                $creation_date=$row->creation_date;
                                $last_activity=$row->last_activity;
                        ?>
			<tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $first_name; ?></td>
                            <td><?php echo $email; ?></td> 
                            <td><?php echo $mobile; ?></td> 
                            <td><?php echo $address; ?></td> 
                            <td>2 Sessions<br>0 One2One</td>
                            
                            <td>
                                <a href="" class="glyphicon glyphicon-search modalLink" data-toggle="modal" data-target="#stu_view<?php echo $id;?>">Preview</a> 
                                <a href="" class="glyphicon glyphicon-search modalLink" data-toggle="modal" data-target="#stu_edit<?php echo $id;?>">Edit</a>
                                <a href="" class="glyphicon glyphicon-remove-sign" data-toggle="modal" data-target="#stu_delete<?php echo $id;?>">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                </table>
	</div>
	
	
	
	<!-- user preview  -->
        <?php
                foreach ($view as $row)
                { 
                    $id=$row->student_id;
                    $parent_id=$row->parent_id;
                    $first_name=$row->first_name;
                    $last_name=$row->last_name;
                    $address=$row->address;
                    $mobile=$row->mobile;
                    $email=$row->email;
                    $phone=$row->phone;
                    $creation_date=$row->creation_date;
                    $last_activity=$row->last_activity;
        ?>
	<div class="modal fade" id="stu_view<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<br>
					<div class="avatar"> <img src="http://cache2.asset-cache.net/xt/107058455.jpg?v=1&g=fs1|0|FKS|58|455&s=1" /> </div>
					<div class="userInfo">
						<div class="center">
							<h2 class="modal-title" id="myModalLabel"><?php echo $first_name;?></h2>
							<div class="row"><label>Address:</label> <span><?php echo $address;?></span></div>
							<div class="row"><label>Email:</label> <span><?php echo $email;?></span></div>
							<div class="row"><label>Tel:</label> <span><?php echo $mobile;?></span></div>
						</div>
					</div>
					<div class="userStat">
						<div class="column"><label>Private Lessons</label><span>7</span></div>
						<div class="column"><label>Group Classes</label><span>12</span></div>
						<div class="column"><label>Member Since</label><label class="blue">02 Sep 2014</label></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
						<table class="table-striped">
							<tr>
								<th>Date</th> <th>Time</th> <th>Tutor</th> <th>Session Type</th> <th>Price</th> <th>Status</th> <th></th>
							</tr>
							<tr><td>4 Jan 2015</td> <td>12:00 am</td> <td>Mr. James Recardo</td><td>Private Session</td> <td>&pound; 14.00</td> <td><span class="glyphicon glyphicon-time"></span></td>         </tr>
							<tr><td>2 Dec 2014</td> <td>2:00 pm</td>  <td>Mr. Philip</td><td>Group Class</td><td>&pound; 6.00</td>  <td><span class="glyphicon glyphicon-ok"></span></td>    </tr>
						</table>
					</div>
				</div>
				<!--<div class="modal-footer"></div>-->
			</div>
		</div>
	</div><?php } ?>
	<!-- //user preview popup -->
	
	<!-- user Edit popup  -->
        <?php
                foreach ($view as $row)
                { 
                    $id=$row->student_id;
                    $parent_id=$row->parent_id;
                    $first_name=$row->first_name;
                    $last_name=$row->last_name;
                    $address=$row->address;
                    $mobile=$row->mobile;
                    $email=$row->email;
                    $phone=$row->phone;
                    $creation_date=$row->creation_date;
                    $last_activity=$row->last_activity;
        ?>
	<div class="modal fade" id="stu_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
                                    <?php
                                        
                                        echo form_open("admin/student/do_save_student");
                                    ?>
                                    <input type="hidden" name="s_id" value="<?php echo $id;?>" id="s_id">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<br>
                                        <div class="avatar"> <img src="<?php echo base_url(); ?>images/dash/avatar.jpg"/> </div>
					<div class="form-group">
                                            <h3><small> Update Information</small></h3>
                                            <div class="form-group col-md-3">
                                                <?php
                                                echo form_label("First Name:","firstname");
                                                $data=array(
                                                    "class"=>"form-control input-sm",
                                                    "name"=>"first_name",
                                                    "id"=>"first_name",
                                                    "value"=>"$first_name",
                                                );
                                                echo form_input($data); ?>
                                                 
                                            </div>
                                            <div class="form-group col-md-3">
                                                <?php
                                                echo form_label("Last Name:","lastname");
                                                $data=array(
                                                    "class"=>"form-control input-sm",
                                                    "name"=>"last_name",
                                                    "id"=>"last_name",
                                                    "value"=>"$last_name",
                                                );
                                                echo form_input($data); ?>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <?php
                                                echo form_label("Garudain Name:","garudian_name");
                                                echo form_dropdown('parent_id', $parent, set_value('parent_id', 0),'class=form-control input-sm');
                                                ?>
                                                 
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" style="margin-left:117px">
                                            <div class="form-group col-md-7">
                                                <?php
                                                echo form_label("Address:","addr");
                                                $data=array(
                                                    "class"=>"form-control input-sm",
                                                    "name"=>"address",
                                                    "id"=>"address",
                                                    "value"=>"$address",
                                                );
                                                echo form_input($data); ?>
                                            </div>

                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="margin-left:117px">
                                            <div class="form-group col-md-3">
                                                <?php
                                                echo form_label("Mobile #:","mobil");
                                                $data=array(
                                                    "class"=>"form-control input-sm",
                                                    "name"=>"mobile",
                                                    "id"=>"mobile",
                                                    "value"=>"$mobile",
                                                );
                                                echo form_input($data); ?>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <?php
                                                echo form_label("Email :","email");
                                                $data=array(
                                                    "class"=>"form-control input-sm",
                                                    "name"=>"email",
                                                    "id"=>"email",
                                                    "value"=>"$email",
                                                );
                                                echo form_input($data); ?>
                                            </div><div class="clearfix"></div>
                                            <div class="row" style="margin-left:50px">
                                                <?php 
                                                $data = array(
                                                    'name' => 'update_record',
                                                    'id' => 'update_record',
                                                    'type' => 'submit',
                                                    'content' => 'Update',
                                                    'class'=>'btn btn-primary '
                                                );

                                                echo form_button($data);
                                                
                                                ?>
                                            </div>
                                        </div>
                                        <?php echo form_close();?><div class="clearfix"></div>
				</div>
				
			</div>
		</div>
	</div>
        <?php } ?>
	<!-- //user Update popup -->
        
<!-- user Delete  -->
<?php
        foreach ($view as $row)
        { 
            $id=$row->student_id;
?>
<div class="modal fade" id="stu_delete<?php echo $id;?>"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                <br>
                                <div class="avatar"></div>
                                <div class="userInfo">
                                        <div class="center">
                                            <?php

                                                echo form_open("admin/student/delete_student");
                                            ?>
                                            <input type="hidden" name="s_id" value="<?php echo $id;?>" id="s_id">
                                            <h4 class="modal-title" id="myModalLabel">R u Sure You Want Delete??</h4><br>
                                            <div class="row" style="margin-left:50px">
                                                    <input type="submit" name="delete_record" value="Yes" class="btn btn-primary "/>&nbsp;&nbsp;
                                                    <input type="submit" name="cancel_record" value="NO" class="btn btn-primary"/>
                                                </div>
                                        </div>
                                </div>
                                <?php echo form_close();?><div class="clearfix"></div>
                        </div>

                </div>
        </div>

                        <!--<div class="modal-footer"></div>-->
        </div><?php } ?>
<!-- //user Delete popup -->
	<!-- //user Add popup -->

<div class="modal fade" id="stu_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
                                    <?php
                                        $this->load->helper("form");
                                        echo form_open("admin/student/do_insert_student");
                                    ?>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<br>
                                        <?php
                                                if ($this->session->userdata('sess_add_record_type') == 'error') {
                                            ?>
                                                <div class="alert alert-warning">
                                                      <strong><?php echo $this->session->userdata('sess_add_record_msg');?></strong> 
                                                </div>
                                            <?php }?>
                                        <div class="avatar"> <img src="<?php echo base_url(); ?>images/dash/avatar.jpg"/> </div>
					<div class="form-group">
                                            <h3><small> Add New Student Record</small></h3>
                                            <?php 
                                                    $firstname=$this->session->userdata('first_name');
                                                    $lastname=$this->session->userdata('last_name');
                                                    $address=$this->session->userdata('address');
                                                    $phone=$this->session->userdata('mobile');
                                                    $mail=$this->session->userdata('email');
                                                ?>
                                            <div class="form-group col-md-3">
                                                
                                                <?php
                                                echo form_label("First Name:","firstname");
                                                $data=array(
                                                    "class"=>"form-control input-sm",
                                                    "name"=>"first_name",
                                                    "id"=>"first_name",
                                                    "value"=>"$firstname",
                                                );
                                                echo form_input($data); ?>
                                                 
                                            </div>
                                            
                                            <div class="form-group col-md-3">
                                                <?php
                                                echo form_label("Last Name:","lastname");
                                                $data=array(
                                                    "class"=>"form-control input-sm",
                                                    "name"=>"last_name",
                                                    "id"=>"last_name",
                                                    "value"=>"$lastname",
                                                );
                                                echo form_input($data); ?>
                                            </div>
                                        <div class="form-group col-md-3">
                                                <?php
                                                echo form_label("Garudain Name:","garudian_name");
                                                echo form_dropdown('parent_id', $parent, set_value('parent_id', 0),'class=form-control input-sm');
                                                ?>
                                                 
                                            </div>
                                            </div>
                                        <div class="form-group" style="margin-left:117px">
                                            <div class="form-group col-md-7">
                                                <?php
                                                echo form_label("Address:","addr");
                                                $data=array(
                                                    "class"=>"form-control input-sm",
                                                    "name"=>"address",
                                                    "id"=>"address",
                                                    "value"=>"$address",
                                                );
                                                echo form_input($data); ?>
                                            </div>

                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group" style="margin-left:117px">
                                            <div class="form-group col-md-3">
                                                <?php
                                                echo form_label("Mobile #:","mobil");
                                                $data=array(
                                                    "class"=>"form-control input-sm",
                                                    "name"=>"mobile",
                                                    "id"=>"mobile",
                                                    "value"=>"$phone",
                                                );
                                                echo form_input($data); ?>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <?php
                                                echo form_label("Email :","email");
                                                $data=array(
                                                    "class"=>"form-control input-sm",
                                                    "name"=>"email",
                                                    "id"=>"email",
                                                    "value"=>"$mail",
                                                );
                                                echo form_input($data); ?>
                                            </div><div class="clearfix"></div>
                                            <div class="row" style="margin-left:50px">
                                                <?php 
                                                $data = array(
                                                    'name' => 'insert_record',
                                                    'id' => 'insert_record',
                                                    'type' => 'submit',
                                                    'content' => 'Save',
                                                    'class'=>'btn btn-primary '
                                                );

                                                echo form_button($data);
                                                ?>
                                            </div>
                                        </div>
                                        <?php echo form_close();?><div class="clearfix"></div>
				</div>
				
			</div>
		</div>
	</div>
</div>
<!-- END OF TAB 3 -->	