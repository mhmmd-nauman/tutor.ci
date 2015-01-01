<!-- TAB 3 -->					  

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
					<button class="btn-search4 margleft15" type="submit">Search</button>
                                        <!--
                                        <a href="" class="glyphicon glyphicon-search modalLink" data-toggle="modal" data-target="#add_stu_Modal">Add New Student</a>
                                        -->
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
                        <?php foreach ($student_list as $student) { ?>
                        
			<tr><td>1 <?php echo $student->student_id; ?></td> <td><?php echo $student->first_name; ?> <?php echo $student->last_name; ?></td> <td><?php echo $student->email; ?></td> <td><?php echo $student->mobile; ?></td> <td>SE12 4ER, London</td> <td>5 Sessions<br>3 One2One</td>          <td><a href="" class="glyphicon glyphicon-search modalLink" data-toggle="modal" data-target="#stu_Modal<?php echo $student->student_id; ?>">Preview</a> <a href="" class="glyphicon glyphicon-pencil">Edit</a></td></tr>
                        <?php }?>
                        
		</table>
	</div>
	
	
	
	<!-- user preview popup 1 -->
         <?php foreach ($student_list as $student) { ?>
	<div class="modal fade" id="stu_Modal<?php echo $student->student_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<br>
					<div class="avatar"> <img src="http://cache2.asset-cache.net/xt/107058455.jpg?v=1&g=fs1|0|FKS|58|455&s=1" /> </div>
					<div class="userInfo">
						<div class="center">
							<h2 class="modal-title" id="myModalLabel"><?php echo $student->first_name; ?> <?php echo $student->last_name; ?></h2>
							<div class="row"><label>Address:</label> <span>sE12 4ER, London</span></div>
							<div class="row"><label>Email:</label> <span><?php echo $student->email; ?></span></div>
							<div class="row"><label>Tel:</label> <span><?php echo $student->mobile; ?></span></div>
						</div>
					</div>
					<div class="userStat">
						<div class="column"><label>Private Lessons</label><span>7</span></div>
						<div class="column"><label>Group Classes</label><span>12</span></div>
						<div class="column"><label>Member Since</label><label class="blue"><?php echo date("d M Y",strtotime($student->creation_date)); ?></label></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
						<table class="table-striped">
							<tr>
								<th>Date</th> <th>Time</th> <th>Tutor</th> <th>Session Type</th> <th>Price</th> <th>Status</th> <th></th>
							</tr>
							<tr><td>4 Jan 2015</td> <td>12:00 am</td> <td>Mr. James Recardo</td>		<td>Private Session</td> <td>&pound; 14.00</td> <td><span class="glyphicon glyphicon-time"></span></td>         </tr>
							<tr><td>2 Dec 2014</td> <td>2:00 pm</td>  <td>Mr. Philip</td>				<td>Group Class</td>     <td>&pound; 6.00</td>  <td><span class="glyphicon glyphicon-ok"></span></td>    </tr>
						</table>
					</div>
				</div>
				<!--<div class="modal-footer"></div>-->
			</div>
		</div>
	</div>
	<?php }?>
        <!-- //user preview popup 1 -->
	<div class="modal fade" id="add_stu_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<br>
					<div class="avatar"> <img src="http://cache2.asset-cache.net/xt/107058455.jpg?v=1&g=fs1|0|FKS|58|455&s=1" /> </div>
					<div class="userInfo">
						<div class="center">
							<h2 class="modal-title" id="myModalLabel"></h2>
							<div class="row"><label>Address:</label> <span>sE12 4ER, London</span></div>
							<div class="row"><label>Email:</label> <span></span></div>
							<div class="row"><label>Tel:</label> <span></span></div>
						</div>
					</div>
					<div class="userStat">
						<div class="column"><label>Private Lessons</label><span>7</span></div>
						<div class="column"><label>Group Classes</label><span>12</span></div>
						<div class="column"><label>Member Since</label><label class="blue">jj</label></div>
					</div>
					<div class="clearfix"></div>
				</div>
				
				<!--<div class="modal-footer"></div>-->
			</div>
		</div>
	</div>
	




<!-- END OF TAB 3 -->	