<?php
session_start();
?>
<!doctype html>
<html lang="">
<?php
$doctitle = "Reset Password";
include('head.php'); ?>

<body style="height:100%; width:100%; background-image: url('assets/images/polygon-bg.jpg'); background-size: cover;">
	<section class="vh-100">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col col-xl-10">
					<div class="card">
						<div class="row g-0">
							<div class="col-md-6 col-lg-5 d-none d-md-block text-center align-self-center px-1 py-0">
								<img src="assets/images/logo.png" alt="password-reset" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
							</div>
							<div class="col-md-6 col-lg-7 d-flex align-items-center">
								<div class="card-body p-4 p-lg-5 text-black" style="background-color: #ebebeb;">
									<div class="container">
										<h4 class="form-signin-heading">Reset Password</h4>
										<?php
										if (isset($_GET['email']) && isset($_GET['otp'])) {
											$email = $_GET['email'];
											$otp = $_GET['otp'];
										}
										?>
										<form action="" method="" name="password-reset" id="password-reset" class="">
											<input type="hidden" class="form-control mb-3" name="email" value="<?php echo $email; ?>" placeholder="Email" required="" />

											<input type="hidden" class="form-control mb-3" name="otp" placeholder="OTP" value="<?php echo $otp; ?>" required="" autofocus="" />

											<input type="password" class="form-control mb-3" name="password" placeholder="Password" required="" />

											<input type="password" class="form-control mb-3" name="cPassword" placeholder="Confirm Password" required="" />
											<p style='color:red;' id="get-error"></p>

											<input class="btn btn-lg btn-success btn-block" name="reset" value="Reset" id="reset"  type="button"/>
										</form>
										<div id="get-data"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Ajax Script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		
		$(document).ready(function() {
			$('#reset').click(function(ev) {
				ev.preventDefault();
				console.log('reset button click');
				$.ajax({
					type: "POST",
					url: "password-reset-script.php",
					data: $('form').serialize(),
					success: function(data) {
						if(data == 'success'){
							location.replace("login.php");
							alert("Password reset successfully. Please Login!")
						}
						else{
							$("#get-error").html(data);
						}
						// $("#get-data").text($("form").serialize());
						// alert($("form").serialize());
					},
					error: function(data) {
						alert("some Error");
					}
				});
			});
		});
	</script>


</body>

</html>

<!-- <script src="assets/js/jquery-3.3.1.min.js"></script> -->
<script>
	$(function() {
		$('.navbar-toggler').click(function() {
			$('body').toggleClass('noscroll');
		})
	});
</script>
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.countup.js"></script>
<script>
	$('.counter').countUp();
</script>
<script src="assets/js/bootstrap.min.js"></script>