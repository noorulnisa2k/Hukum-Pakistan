<?php
session_start();
?>
<!doctype html>
<html lang="">
<?php
$doctitle = "Recover Password";
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
										<h4 class="form-signin-heading">Recover your password</h4>
										<?php
										if (isset($_SESSION['success']) && $_SESSION['success'] != "" ) {
											echo '
											<div class="alert alert-success alert-dismissible fade show" role="alert">
											<strong>' . $_SESSION["success"] . '</strong>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>';
                                            unset($_SESSION['success']);
										}
										if (isset($_SESSION['status']) && $_SESSION['status'] != "" ) {
											echo '
											<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<strong>' . $_SESSION["status"] . '</strong>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>';
                                            unset($_SESSION['status']);
										}
										?>
										<form action="forget-password-script.php" method="post" name="password-reset" class="">


											<input type="email" class="form-control mb-3" name="Email" placeholder="Email" required="" autofocus="" />
											<!-- <input type="password" class="form-control mb-3" name="Password" placeholder="Password" required="" /> -->

											<input class="btn btn-lg btn-success btn-block" name="Submit"  value="Recover Password" type="submit" />
											<br />
											<p style="text-align:center"> <a href="login.php"> Back to login </a> </p>
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