<?php
include('login_script.php');
?>
<!doctype html>
<html lang="">
<?php
$doctitle = "Login";
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
										<h4 class="form-signin-heading">Welcome! Please Log in to your account</h4>
										<?php
										if (isset($_GET['msg'])) {
											echo '
											<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<strong>Error! </strong>' . $_GET['msg'] . '
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>';
										}
										?>
										<form action="login_script.php" method="post" name="Login_Form" class="">


											<input type="email" class="form-control mb-3" name="Email" placeholder="Email" required="" autofocus="" />
											<input type="password" class="form-control mb-3" name="Password" placeholder="Password" required="" />

											<input class="btn btn-lg btn-success btn-block" name="Submit" value="Login" type="submit" />
											<br />
											<p style="text-align:center">Create an account <a href="sign_up.php"> Sign Up </a> <br /> <a href="forget-password.php"> Forgot Password</a>
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