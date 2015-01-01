<!-- 100% Width & Height container  -->
		<div class="login-fullwidith">

			<!-- Login Wrap  -->
			<div class="login-wrap">
                            
                            <?php 
                                $attributes = array('method' => 'post','onsubmit'=>'return Validate(this);');
                                $hidden = array(
                                    //'username' => 'Joe', 'member_id' => '234'
                                    );
                                echo form_open('admin/login/process_forgot_password',$attributes,$hidden);?>
				

					<div class="login-c1">
                                            <?php
                                            if ($this->session->userdata('sess_ci_admin_msg_type') == 'error') {
                                                ?>
                                            <div class="alert alert-error">
                                                <strong>Error!</strong> <?php echo $this->session->userdata('sess_ci_admin_msg');?>
                                            </div>
                                            <?php 
                                             $this->session->set_userdata(array(
                                                'sess_ci_admin_msg' => "",
                                                'sess_ci_admin_msg_type' => ''
                                            ));
                                            } ?>
                                            <?php
                                            if ($this->session->userdata('sess_ci_admin_msg_type') == 'success') {
                                                ?>
                                            <div class="alert alert-error">
                                                <strong>Success!</strong> <?php echo $this->session->userdata('sess_ci_admin_msg');?>
                                            </div>
                                            <?php 
                                             $this->session->set_userdata(array(
                                                'sess_ci_admin_msg' => "",
                                                'sess_ci_admin_msg_type' => ''
                                            ));
                                            } ?>
						<div class="h3 center padding20title lblue">Enter Email</div>
                                                <br/><br/>
						<div class="chpadding50">
                                                    <?php 
                                                    $data = array(
                                                                'name'        => 'userName',
                                                                'id'          => 'userName',
                                                                'value'       => '',
                                                                'placeholder'   => 'Username or Email',
                                                               // 'size'        => '50',
                                                                'class'       => 'form-control logpadding',
                                                              );
                                                    echo form_input($data);?>
							
							
							
						</div>
					</div>
					<div class="login-c2">
						<div class="logmargfix">
							<div class="chpadding50">
								<div class="alignbottom">
                                                                    
                                                                    
									<button class="btn-search4"  type="submit">Submit</button>
                                                                    
								</div>
								
							</div>
						</div>
					</div>
					<div class="login-c3">
						<div class="left"><a href="../" class="whitelink"><span></span>Go to Website</a></div>
						
						<div class="clearfix center"><br><img src="<?php echo base_url(); ?>images/logo-white.png" class="login-img" alt="logo"/></div>
					</div>	

				</form>
			</div>
			<!-- End of Login Wrap  -->

		</div>	
		<!-- End of Container  -->
