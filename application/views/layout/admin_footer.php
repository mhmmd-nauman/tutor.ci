<!-- Javascript  -->
		<script src="<?php echo base_url(); ?>assets/js/initialize-loginpage.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.easing.js"></script>
		<!-- Load Animo -->
		<script src="<?php echo base_url(); ?>plugins/animo/animo.js"></script>
		<script>
					function errorMessage() {
						$('.login-wrap').animo({animation: 'tada'});
					}

					function Validate(frm) {
						var userName = $('input#userName').val();
						var pswd = $('input#userPswd').val();

						if (userName == "" || pswd == "") {
							errorMessage();
							return false;
						}
						return true;
					}
		</script>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url(); ?>dist/js/bootstrap.min.js"></script>
	</body>
</html>