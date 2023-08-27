<!doctype html>
<html lang="">
<?php
$doctitle = "Professional Services";
include('head.php'); ?>


<body>
	<?php include('header.php'); ?>
	<style>
		.donor-li .area-box:hover {
			background-color: #1b4f9d;
			color: #fff;
			transition: .3s;
		}

		.hukumPakistan-bottom-grids-6 p {
			font-size: 20px;
			cursor: pointer;
			line-height: 25px;
			display: inline-block;
			color: black;
			font-weight: bold;
		}
	</style>

	<nav id="breadcrumbs" class="breadcrumbs">
		<div class="container page-wrapper">
			<a href="/">Home</a> » <span class="breadcrumb_last" aria-current="page">Professional Services</span>
		</div>
	</nav>

	<section class="hukumPakistan-content-with-video">
		<div class="content-video-info py-5">
			<div class="container">
				<div class="title-content text-center mb-lg-5 mt-4">
					<img src="assets/images/professional services.jpg" class="img-fluid" alt="" />
				</div>
				<!-- <div class="col-lg-12 title-content text-center py-4">
					<h1 style="color: #1b4f9d;">Professional Services</h1>
				</div> -->
				<div class="content-photo-grids row" id="pbs">
					<div class="photo-6-inf-left col-lg-6 pr-lg-4">
						<video width="600" controls>
							<source src="video/pro_based.mp4" type="video/mp4">
							Your browser does not support the video tag.
						</video>
					</div>
					<div class="photo-6-inf-right col-lg-6 text-left pl-lg-5 mt-lg-0 mt-4">
						<h3 class="hny-title" style="color: #1b4f9d;">Profession Based Services</h3>
						<!--<h6 class="sub-title">Services</h6><br/>-->
						<p>It includes services of individuals from any profession such as daily repair and maintenance or intellectual services.</p>
						<div class="servehny-1 mt-3">
							<div class="read">
								<a class="btn btn-success mt-4" href="https://play.google.com/store/apps/details?id=com.pakistan.hukumpakistan">Download app</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="hukumPakistan-hp-m-main">
		<div class="hp-content ">
			<div class="hukumPakistan-bottom-grids-6">
				<div class="container py-lg-3">
					<div class="grids-area-hny main-cont-wthree-fea row mb-lg-5 mt-4">
						<div class="col-lg-12 title-content text-center py-5">
							<h2 style="color: #1b4f9d;"><br>Meet Our Professionals</h2>
						</div>

						<?php
						$sql = "SELECT * FROM `professions_list`";
						$result = mysqli_query($co, $sql);
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								$prof_id = $row["prof_ID"];
								$profession_name = $row["profession_name"];
						?>

								<div class="col-lg-3 col-md-6 grids-feature donor-li">
									<a href="list.php?ps-list=<?php echo $prof_id ?>">
										<div class="area-box" style="padding: 30px 50px; overflow: hidden;">

											<p><?php echo $profession_name; ?></p>
											<div class="text-center ml-3" style="display: inline;">
												<img src="assets/images/ps_images/<?php echo $profession_name; ?>.png" class="rounded" alt="..." style="width: 30%;">
											</div>

										</div>
									</a>
								</div>


						<?php
							}
						}
						?>

					</div>
				</div>
			</div>
		</div>
	</section>






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