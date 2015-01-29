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
		<span class="dtxt">Message</span>
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
			
			<tr>
                            <td><?php //echo $i; ?></td>
                            <td><?php //echo $first_name; ?></td>
                            <td><?php //echo $email; ?></td> 
                            <td></td> 
                            <td></td> 
                            <td>2 Sessions<br>0 One2One</td>
                            
                            <td>
                                <a href="" class="glyphicon glyphicon-search modalLink" data-toggle="modal" data-target="#tutor_view">Preview</a> 
                                <a href="" class="glyphicon glyphicon-search modalLink" data-toggle="modal" data-target="#tutor_edit">Edit</a>
                                <a href="" class="glyphicon glyphicon-remove-sign" data-toggle="modal" data-target="#tutor_delete">Delete</a>
                            </td>
                        </tr>
                        
		</table>
	</div>
	
	
	
	
<!-- user Edit popup  -->

<!-- //user Update popup -->
	

<!-- END OF TAB 2 -->	
