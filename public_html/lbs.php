<!doctype html>
<html lang="">
<?php
$doctitle = "Location Base Services";
include('head.php'); ?>


<body>
	<?php include('header.php'); ?>
	<style>
		.lbs_button {
			background-color: #4CAF50;
			/* Green */
			border: none;
			color: white;
			padding: 18px 42px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 4px;
			transition-duration: 0.4s;
			cursor: pointer;
		}

		.button-lbs {
			background-color: white;
			color: #0c8040;
			border: 2px solid #faa636;
			font-weight: bold;
			font-size: 18px;
		}

		.button-lbs:hover {
			background: #faa636;
			color: #FFF;
		}
	</style>
	<nav id="breadcrumbs" class="breadcrumbs">
		<div class="container page-wrapper">
			<a href="/">Home</a> » <span class="breadcrumb_last" aria-current="page">Location Base Services</span>
		</div>
	</nav>

	<section class="hukumPakistan-hp-m-main">
		<div class="hp-content py-5">
			<div class="container ">
				<?php
				if (isset($_GET['registered'])) {
					if ($_GET['registered'] == "Success") {
						echo '
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Your Business is registered @Location Based Servcies by Hukum Pakistan. </strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
					} else {
						echo '
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>You are already registered @Location Based Servcies. </strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
					}
				}
				?>
				<div class="title-content text-center mb-lg-5 mt-4">
					<img src="assets/images/lbs_logo.png" width="250" />
					<h3 class="hny-title" style="color:#faa636">Location Based Services</h3><br />
					<p style="color: #000000; font-weight: bold; font-size:19px;">It include third party location-specific services like restaurants, guest houses, hospitals, and tourist destinations. It uses GPS technology to suggest nearby services.</p>
					<a id="lbs" class="lbs_button button-lbs" href="lbs-business-form.php">Boost Your Business</a>
					<a href="" class="lbs_button button-lbs" data-toggle="modal" data-target="#exampleModalCenter">Search for Desired Location</a>

				</div>
			</div>
		</div>
	</section>
	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="lbs-categories.php" method="post">
						<div class="form-group">
							<label for="message-text" class="col-form-label">Select City</label>
							<select class="form-control custom-select" id="exampleSt" name="city" required>
								<option value="" disabled selected> --Select--</option>
								<?php
								$sql = "SELECT * FROM `cities` WHERE lbsActive=1";
								$result = mysqli_query($co, $sql);
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										$city = $row['cityName'];
								?>
										<option value="<?php echo $city; ?>"><?php echo $city; ?></option>
								<?php
									}
								}
								?>
							</select>
						</div>
						<button type="submit" name="select-city" class="btn btn-success mx-1" style="float: right;">Search</button>
						<button type="button" class="btn btn-primary mx-1" data-dismiss="modal" style="float: right;">Cancel</button>
					</form>
				</div>
			</div>
		</div>
	</div>




	<?php include('footer.php'); ?>
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
<script src="assets/js/owl.carousel.js"></script>
<script>
	$(document).ready(function() {
		$('.owl-one').owlCarousel({
			loop: true,
			margin: 0,
			nav: false,
			responsiveClass: true,
			autoplay: false,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: false,
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				480: {
					items: 1,
					nav: false
				},
				667: {
					items: 1,
					nav: true
				},
				1000: {
					items: 1,
					nav: true
				}
			}
		})
	})
</script>
<script>
	$(document).ready(function() {
		$('.owl-two').owlCarousel({
			loop: true,
			margin: 30,
			nav: false,
			responsiveClass: true,
			autoplay: false,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: false,
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				480: {
					items: 1,
					nav: false
				},
				667: {
					items: 1,
					nav: false
				},
				1000: {
					items: 1,
					nav: false
				}
			}
		})
	})
</script>
<script src="assets/js/bootstrap.min.js"></script>