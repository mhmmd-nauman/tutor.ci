<!-- 100% Width & Height container  -->
		<div class="login-fullwidith">

			<!-- Login Wrap  -->
			<div class="login-wrap">
                            <?php 
                                $attributes = array('method' => 'post');
                                $hidden = array(
                                    //'username' => 'Joe', 'member_id' => '234'
                                    );
                                echo form_open('admin/login/dologin',$attributes,$hidden);?>
				

					<div class="login-c1">
						<div class="h3 center padding20title lblue">Administrator</div>
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
							
							<br/>
                                                        <?php 
                                                        $data = array(
                                                                    'name'        => 'password',
                                                                    'type'        => 'password',
                                                                    'value'       => '',
                                                                    'placeholder' => 'Password',
                                                                    'id'          => 'userPswd',
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
								<div class="alignbottom2">
									<div class="checkbox">
										<label>
											<input type="checkbox">Remember
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="login-c3">
						<div class="left"><a href="../" class="whitelink"><span></span>Go to Website</a></div>
						<div class="right"><a href="#" class="whitelink">Lost password?</a></div>
						<div class="clearfix center"><br><img src="<?php echo base_url(); ?>images/logo-white.png" class="login-img" alt="logo"/></div>
					</div>	

				</form>
			</div>
			<!-- End of Login Wrap  -->

		</div>	
		<!-- End of Container  -->
