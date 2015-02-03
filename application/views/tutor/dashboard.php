</div>

<?php
    if ($this->session->userdata('t_sess_msg_type') == 'success') {
?>
    <div class="alert alert-success">
          <strong><?php echo $this->session->userdata('t_sess_msg');?></strong> 
    </div>
        <?php 
           $this->session->set_userdata(array(
               't_sess_msg' => "",
               't_sess_msg_type' => ''
            ));
    } ?>

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
<!-- TAB 2 -->					  
<div id="tutors">
	<div class="dash-ct page-title">
		<span class="tutor-icon left"></span>									  
		<span class="dtxt">Tutor Panel</span>
	</div>
<div class="padding20">
			

    <div id="row" style="margin: 0px 0px 0px 180px">
        <button name="" id="" class="btn btn-primary" data-toggle="modal" data-target="#tutor_view">View Detail</button>
        <button name="" id="" class="btn btn-primary" data-toggle="modal" data-target="#sub_add">Insert New Subject</button>
        <button name="" id="" class="btn btn-primary" data-toggle="modal" data-target="#change_pass">Change Password</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#tutor_edit">Update Tutor Data</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#tutor_delete">Delete Tutor</button>

</div>
</div> <!-- end of search pan -->
<br/><br/><br/>  
	
<!-- user Edit popup  -->
<?php
        $i=0;
        foreach ($tutorview as $row)
        {   
            $i++;
            $id=$row->user_id;
            $first_name=$row->first_name;
            $last_name=$row->last_name;
            $email=$row->email;
        }
?>
<div class="modal fade" id="tutor_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                            <?php

                                echo form_open("tutor/dashboard/do_save_tutor");
                            ?>
                            <input type="hidden" name="t_id" value="<?php echo $id;?>" id="t_id">
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
                                            "name"=>"t_first_name",
                                            "id"=>"t_first_name",
                                            "value"=>"$first_name",
                                        );
                                        echo form_input($data); ?>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <?php
                                        echo form_label("Last Name:","lastname");
                                        $data=array(
                                            "class"=>"form-control input-sm",
                                            "name"=>"t_last_name",
                                            "id"=>"t_last_name",
                                            "value"=>"$last_name",
                                        );
                                        echo form_input($data); ?>
                                    </div>
                                </div>
                                    <div class="form-group col-md-4">
                                        <?php
                                        echo form_label("Email :","email");
                                        $data=array(
                                            "class"=>"form-control input-sm",
                                            "name"=>"t_email",
                                            "id"=>"t_email",
                                            "value"=>"$email",
                                        );
                                        echo form_input($data); ?>
                                    </div><div class="clearfix"></div>
                                    <div class="row" style="margin-left:150px">
                                        <?php 
                                        $data = array(
                                            'name' => 'update',
                                            'id' => 'update',
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

<!-- //user Update popup -->
<div class="modal fade" id="change_pass"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                <?php

                                    echo form_open("tutor/dashboard/change_password");
                                ?>
                                <div class="form-group">
                                    <h3><small> Change Password</small></h3>
                                    <div class="form-group col-md-3">
                                        <?php
                                        echo form_label("Old Password:","old_password");
                                        $data=array(
                                            "class"=>"form-control input-sm",
                                            "name"=>"old_password",
                                            "id"=>"old_password",
                                            "value"=>"",
                                        );
                                        echo form_password($data); ?>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <?php
                                        echo form_label("New Password:","new_password");
                                        $data=array(
                                            "class"=>"form-control input-sm",
                                            "name"=>"new_password",
                                            "id"=>"new_password",
                                            "value"=>"",
                                        );
                                        echo form_password($data); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <?php
                                        echo form_label("Repeat Password:","repeat_password");
                                        $data=array(
                                            "class"=>"form-control input-sm",
                                            "name"=>"repeat_password",
                                            "id"=>"repeat_password",
                                            "value"=>"",
                                        );
                                        echo form_password($data); ?>
                                    </div>
                                    <div class="form-group col-md-2" style="margin-top: 22px">
                                        <button id="password" class="btn btn-success">Submit</button>
                                    </div>
                                    
                                </div>
                                <?php echo form_close();?>
                                <div class="clearfix"></div>
                        </div>

                </div>
        </div>
</div>
<!-- user Delete  -->
<?php
        foreach ($gardianview as $row)
        { 
            $id=$row->user_id;
        }
?>
<div class="modal fade" id="tutor_delete"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                <br>
                                <div class="avatar"></div>
                                <div class="userInfo">
                                        <div class="center">
                                            <?php

                                                echo form_open("tutor/dashboard/delete_tutor");
                                            ?>
                                            <input type="hidden" name="t_id" value="<?php echo $id;?>" id="t_id">
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
</div>

		
<?php
    $i=0;
    foreach ($tutorview as $row)
    {   
        $i++;
        $id=$row->user_id;
        $first_name=$row->first_name;
        $last_name=$row->last_name;
        $email=$row->email;
    }
?>
<div class="modal fade" id="tutor_view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<br>
					<div class="avatar"> <img src="http://cache2.asset-cache.net/xt/107058455.jpg?v=1&g=fs1|0|FKS|58|455&s=1" /> </div>
					<div class="userInfo">
						<div class="center">
							<h2 class="modal-title" id="myModalLabel"><?php echo $first_name.' '.$last_name;?></h2>
							<div class="row"><label>Email:</label> <span><?php echo $email;?></span></div>
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
								<th>Subject Name</th> <th>Course No</th> <th>Author</th> <th>Session Type</th> <th>Price</th> <th>Status</th> <th></th>
							</tr>
                                                        <?php
                                                            foreach ($view as $row)
                                                            { 
                                                                $id=$row->student_id;
                                                                $first_name=$row->first_name;
                                                                $last_name=$row->last_name;

                                                        ?>
                                                        <tr>
                                                        <td><?php echo $first_name;?></td><td>2:00 pm</td>  <td>Mr. Philip</td><td>Group Class</td><td>&pound; 6.00</td>  
                                                        <td>
                                                            <a href="" class="glyphicon glyphicon-search modalLink" data-toggle="modal" data-target="#sub_edit<?php echo $id;?>">Edit</a>
                                                            <a href="" class="glyphicon glyphicon-remove-sign" data-toggle="modal" data-target="#sub_delete<?php echo $id;?>">Delete</a>
                                                        </td>    
                                                        </tr>
                                                        <?php } ?>
						</table>
					</div>
				</div>
                            
				<!--<div class="modal-footer"></div>-->
			</div>
		</div>

	<!-- //user preview popup -->
<?php
    foreach ($view as $row)
    { 
        $id=$row->student_id;
?>
<div class="modal fade" id="sub_delete<?php echo $id;?>"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                            <br>
                            <div class="avatar"></div>
                            <div class="userInfo">
                                    <div class="center">
                                        <?php

                                            echo form_open("tutor/subject/delete_subject");
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
    </div>
</div>
<?php } ?>
<!-- //user Delete popup -->

<div class="modal fade" id="sub_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
                                    <?php
                                        echo form_open("tutor/subject/do_insert_subject");
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
                                            <h3><small> Add New Subject Record</small></h3>
                                            <?php 
                                                    $firstname=$this->session->userdata('first_name');
                                                    $lastname=$this->session->userdata('last_name');
                                                    $address=$this->session->userdata('address');
                                                    $phone=$this->session->userdata('mobile');
                                                    $mail=$this->session->userdata('email');
                                                ?>
                                            <div class="form-group col-md-3">
                                                
                                                <?php
                                                echo form_label("Subect Name:","firstname");
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
<!-- END OF TAB 2 -->	

