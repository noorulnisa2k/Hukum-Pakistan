<?php
include('signup_script.php');
?>
<!doctype html>
<html lang="">
<?php
$doctitle = "Sign Up";
include('head.php'); ?>

<body style="height:100%; width:100%; background-image: url('assets/images/polygon-bg.jpg'); background-size: cover;">

	<section class="vh-100">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col col-xl-10">
					<div class="card">
						<div class="row g-0">
							<div class="col-md-6 col-lg-5 d-none d-md-block text-center align-self-center px-1 py-0">
								<img src="assets/images/logo.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
							</div>
							<div class="col-md-6 col-lg-7 d-flex align-items-center">
								<div class="card-body p-4 p-lg-5 text-black" style="background-color: #ebebeb;">
									<div class="container">
										<h4 class="form-signin-heading">Sign Up</h4>
										<?php
										if ($showAlert) {
											echo '
											<div class="alert alert-success alert-dismissible fade show" role="alert">
											<strong></strong>' . $showAlert . ' 
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>';
										}

										if ($showError) {
											echo '
												<div class="alert alert-danger alert-dismissible fade show" role="alert">
												<strong>Error! </strong>' . $showError . '
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												</div>';
										}
										?>


										<form action="sign_up.php" method="post" name="signup_Form" class="">


											<input type="text" class="form-control mb-2" name="firstname" placeholder="First Name" required autofocus />

											<input type="text" class="form-control mb-2" name="lastname" placeholder="Last Name" required />

											<input type="email" class="form-control mb-2" name="email" placeholder="Email" required />

											<input type="password" class="form-control mb-2" name="password" placeholder="Password" required />

											<input type="password" class="form-control mb-2" name="cpassword" placeholder="Confirm Password" required />

											<button class="btn btn-lg btn-success btn-block" name="Submit" value="Sign Up" type="Submit">Sign Up</button>
											<br />
											<p style="text-align:center">Already have an account? <a href="login.php"> Login </a>
										</form>
									</div>



								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>





</body>

</html>

<script src="assets/js/jquery-3.3.1.min.js"></script>
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