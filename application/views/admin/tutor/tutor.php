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
</div>
<!-- TAB 2 -->					  
<div id="tutors">
	<div class="dash-ct page-title">
		<span class="tutor-icon left"></span>									  
		<span class="dtxt">Tutor</span>
	</div>
	<div class="searchPan">

		<div class="padding20">
			<div class="col-md-4">
				<div class="w50percent">
					<div class="wh90percent textleft">
						<span class="opensans size13"><b>Tutor Name</b></span>
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
					<button class="btn-search4 margleft15" type="submit">Search</button>&nbsp;&nbsp;
                                        <a href="" class="glyphicon glyphicon-floppy-save" data-toggle="modal" data-target="#tutor_add">Insert Tutor</a>
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
                                $id=$row->user_id;
                                $first_name=$row->first_name;
                                $last_name=$row->last_name;
                                $email=$row->email;
                        ?>
			<tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $first_name; ?></td>
                            <td><?php echo $email; ?></td> 
                            <td></td> 
                            <td></td> 
                            <td>2 Sessions<br>0 One2One</td>
                            
                            <td>
                                <a href="" class="glyphicon glyphicon-search modalLink" data-toggle="modal" data-target="#tutor_view<?php echo $id;?>">Preview</a> 
                                <a href="" class="glyphicon glyphicon-search modalLink" data-toggle="modal" data-target="#tutor_edit<?php echo $id;?>">Edit</a>
                                <a href="" class="glyphicon glyphicon-remove-sign" data-toggle="modal" data-target="#tutor_delete<?php echo $id;?>">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
		</table>
	</div>
	
	
	
	
<!-- user Edit popup  -->
<?php
        foreach ($view as $row)
        {   
            $i++;
            $id=$row->user_id;
            $first_name=$row->first_name;
            $last_name=$row->last_name;
            $email=$row->email;
?>
<div class="modal fade" id="tutor_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                            <?php

                                echo form_open("admin/tutor/do_save_tutor");
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
<?php } ?>
<!-- //user Update popup -->
	
<!-- user Delete  -->
<?php
        foreach ($view as $row)
        { 
            $id=$row->user_id;
?>
<div class="modal fade" id="tutor_delete<?php echo $id;?>"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                <br>
                                <div class="avatar"></div>
                                <div class="userInfo">
                                        <div class="center">
                                            <?php

                                                echo form_open("admin/tutor/delete_tutor");
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

                        <!--<div class="modal-footer"></div>-->
        </div><?php } ?>
<!-- //user Delete popup -->
	<!-- //user Add popup -->
<script>
            $(function() {
                <?php
                    if ($this->session->userdata('t_sess_add_record_type') == 'error') { ?>
                    //$('#stu_add').modal('show');
                    });
                    <?php } ?>
</script>

<div class="modal fade" id="tutor_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
                                    <?php
                                        $this->load->helper("form");
                                        echo form_open("admin/tutor/do_insert_tutor");
                                    ?>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<br>
                                        <?php
                                                if ($this->session->userdata('t_sess_add_record_type') == 'error') {
                                            ?>
                                                <div class="alert alert-danger">
                                                      <strong><?php echo $this->session->userdata('t_sess_add_record_msg');?></strong> 
                                                </div>
                                            <?php }?>
                                        <div class="avatar"> <img src="<?php echo base_url(); ?>images/dash/avatar.jpg"/> </div>
					<div class="form-group">
                                            <h3><small> Insert New Guardian</small></h3>
                                            <div class="form-group col-md-3">
                                                <?php 
                                                    $firstname=$this->session->userdata('t_first_name');
                                                    $lastname=$this->session->userdata('t_last_name');
                                                    $mail=$this->session->userdata('t_email');
                                                ?>
                                                
                                                <?php
                                                echo form_label("First Name:","firstname");
                                                $data=array(
                                                    "class"=>"form-control input-sm",
                                                    "name"=>"t_first_name",
                                                    "id"=>"t_first_name",
                                                    "value"=>"$firstname",
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
                                                    "value"=>"$lastname",
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
                                                    "value"=>"$mail",
                                                );
                                                echo form_input($data); ?>
                                            </div><div class="clearfix"></div>
                                            <div class="row" style="margin-left:150px">
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
