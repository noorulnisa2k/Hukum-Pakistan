<?php
session_start();
include('conn.php');
if (isset($_SESSION["email"]) && isset($_SESSION["username"]) && isset($_SESSION["user_id"])) {
	$first_name = $_SESSION['first_name'];
	$email = $_SESSION['email'];
	$username = $_SESSION['username'];
	$user_id = $_SESSION['user_id'];
}
?>
<style>
	@media all and (min-width: 992px) {
		.navbar .nav-item .dropdown-menu {
			display: none;
		}

		.navbar .nav-item:hover .nav-link {}

		.navbar .nav-item:hover .dropdown-menu {
			display: block;
		}

		.navbar .nav-item .dropdown-menu {
			margin-top: 0;
		}
	}

	.dropdown-menu {
		text-align: left;
		background: #fff;
		z-index: 100;
		min-width: 200px;
		border-radius: 0;
		border: 0;
		border-top: 2px solid #028b39;
		/* padding: 20px 20px; */
		margin: 0;
		box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
	}

	/*.navbar .dropdown-menu a:hover{*/
	/*    color: #fff;*/
	/*}*/

	.menu-color1:hover {
		color: #fff;
		background: #df1d2a;
	}

	.menu-color2:hover {
		color: #fff;
		background: #1b4f9d;
	}

	.menu-color3:hover {
		color: #fff;
		background: #faa636;
	}

	.dropdown-menu-center {
		left: 50% !important;
		right: auto !important;
		text-align: center !important;
		transform: translate(-50%, 0) !important;
	}

	.menu-style {
		background-color: #f4f5f7;
	}

	.menu-style:hover {
		border: 2px solid #1e7e34;
		border-radius: 5px;
	}


	@media (max-width: 991px) {
		.dropdown-menu {
			box-shadow: 0 6px 12px rgba(0, 0, 0, 0.05);
		}
	}
</style>
<section class="hukumPakistan-top-header-content">
	<div class="hny-top-menu">
		<div class="container">
			<div class="row">
				<ul class="accounts col-sm-8">
					<li class="top_li mr-lg-0"><span class="fa fa-envelope-o"></span> <a href="mailto:contact@hukumpakistan.pk" class="mail"> contact@hukumpakistan.pk</a>
					</li>
					<li class="top_li"><span class="fa fa-phone"></span> <a href="tel:+92 333 7142055 ">+92 333 7142055 </a>
					</li>
				</ul>



				<ul class="social-top col-sm-4">
					<li><a href="https://www.facebook.com/hukumpakistan" target="_blank"><span class="fa fa-facebook"></span></a></li>
					<li><a href="https://www.instagram.com/hukumpakistan/" target="_blank"><span class="fa fa-instagram"></span></a> </li>
					<li><a href="https://twitter.com/HukumPakistan" target="_blank"><span class="fa fa-twitter"></span></a></li>
					<li><a href="https://www.linkedin.com/company/hukum-pakistan" target="_blank"><span class="fa fa-linkedin"></span></a></li>
				</ul>


			</div>
		</div>
	</div>
</section>

<header class="hukumPakistan-header-nav">
	<nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
		<div class="container">

			<a class="navbar-brand" href="/">
				<img src="assets/images/logo_header.png" alt="Hukum Pakistan" title="Hukum Pakistan" style="height:60px;" />
			</a>
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa icon-expand fa-bars"></span>
				<span class="fa icon-close fa-times"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav  mx-auto text-center">
					<li class="nav-item">
						<a class="nav-link" href="/">Home</a>
					</li>

					<li class="nav-item px-4 dropdown  position-static">
						<!-- <a class="nav-link dropdown-toggle" href="services.php" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a> -->
						<a class="nav-link" href="services.php" id="navbarDropdownMenuLink">
							Services
							<!--<i class="fa fa-caret-down" aria-hidden="true"></i>-->
						</a>
						<div class="dropdown-menu dropdown-menu-center mt-0" aria-labelledby="servicesDropdown" style="border-top-left-radius: 0; border-top-right-radius: 0;">
							<!-- <div class="d-md-flex align-items-start justify-content-start"> -->
							<div class="container">
								<div class="row my-3">
									<div class="col-md-4">
										<div class="bg-image hover-overlay shadow-1-strong rounded ripple menu-style" data-mdb-ripple-color="light">
											<a href="pbn.php" style="padding: 8px 1px;"><img src="assets/images/pbn-thumbnail.png" class="img-fluid p-0" /></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="bg-image hover-overlay shadow-1-strong rounded ripple menu-style" data-mdb-ripple-color="light">
											<a href="pbs.php" style="padding: 8px 1px;"><img src="assets/images/pbs-thumbnail.png" class="img-fluid p-0" /></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="bg-image hover-overlay shadow-1-strong rounded ripple menu-style" data-mdb-ripple-color="light">
											<a href="lbs.php" style="padding: 8px 1px;"><img src="assets/images/lbs-thumbnail.png" class="img-fluid p-0" /></a>
										</div>
									</div>
								</div>
							</div>
							<!-- </div> -->
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php">About</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact</a>
					</li>

				</ul>
				<?php
				if (isset($_SESSION['username']) && !empty($_SESSION['email'])) {

				?>


					<div class="navbar-nav">
						<a href="requests_list.php" class="nav-item nav-link notifications"><i class="fa fa-bell-o"></i>
							<?php
							$sql_count = "SELECT * FROM request_tbl RT INNER JOIN auth_user AU ON RT.sender_pk_id=AU.id WHERE RT.requested_to_pk_id = $user_id AND RT.status = '1' AND request_status = 'N'";
							if ($res_count = mysqli_query($co, $sql_count)) {
								$rowcount = mysqli_num_rows($res_count);
								if ($rowcount > 0) {
							?>
									<span class="badge"><?php echo $rowcount; ?></span>
							<?php
								}
							}
							?>
						</a>
						<div class="nav-item dropdown">
							<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="" class="avatar" alt="">
								<?php echo $first_name; ?> <i class="fa fa-caret-down" aria-hidden="true"></i></a>
							<div class="dropdown-menu">
								<a href="/profile.php" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>
								<div class="dropdown-divider"></div>
								<a href="logout.php" class="dropdown-item"><i class="fa fa-sign-out" aria-hidden="true"></i>
									Logout</a></a>
							</div>
						</div>
					</div>

				<?php
				} else {
				?>
					<a href="login.php" class="ml-lg-3 mt-lg-0 mt-3 book btn btn-success btn-style">Get started</a>
				<?php } ?>
			</div>
		</div>
	</nav>

</header>