<!doctype html>
<html lang="">
<?php
$doctitle = "Home";
include('head.php'); ?>


<body>
	<?php include('header.php');
	?>
	<style>
		.area-box #img1,
		#img2 {
			width: 200px;
			height: auto;
			margin-left: auto;
			margin-right: auto;
		}

		.area-box #img2 {
			display: none;
		}

		.area-box:hover #img1 {
			display: none;
		}

		.area-box:hover #img2 {
			display: block;
		}

		.area-box #img3,
		#img4 {
			width: 125px;
			height: auto;
			margin-left: auto;
			margin-right: auto;
		}

		.area-box #img4 {
			display: none;
		}

		.area-box:hover #img3 {
			display: none;
		}

		.area-box:hover #img4 {
			display: block;
		}
	</style>

	<section class="hukumPakistan-main-slider" id="home">
		<div class="banner-content">
			<div class="owl-one owl-carousel owl-theme">
				<div class="item">
					<li>
						<div class="slider-info banner-view bg bg2">
							<div class="banner-info">
								<div class="container">
									<div class="banner-info-bg">
										<!--<h2 Style="Color:#FFF;">Hukum Pakistan</h2>-->
										<!--<p>A service-based startup that aims to add quality to professional and location-based services. We aspire to make available top-quality services through our software application. Moreover, we sincerely aim to serve the Nation’s public cause by introducing ‘Pakistan Blood Network” to ease the process of blood donation for the needy.
										</p>-->
									</div>
								</div>
							</div>
						</div>
					</li>
				</div>
				<div class="item">
					<li>
						<div class="slider-info  banner-view banner-top1 bg bg2">
							<div class="banner-info">
								<div class="container">
									<div class="banner-info-bg">
										<!--<h2 Style="Color:#ee2f36;" >Blood Donation Services</h2>-->
										<!--<p>Pakistan Blood Network” (PBN), a lifelong CSR project under Hukum Pakistan, is a platform connecting volunteer donors and people needing blood through website and application software</p>-->

									</div>
								</div>
							</div>
						</div>
					</li>
				</div>
				<div class="item">
					<li>
						<div class="slider-info banner-view banner-top3 bg bg2">
							<div class="banner-info">
								<div class="container">
									<div class="banner-info-bg">
										<!-- <h2 Style="Color:#000;">Profession Based Services</h2> -->
										<!--<p>Profession-based Services are services of professionals from different fields. For example services of a carpenter, an electrician, a gardener and a doctor etc. Customers can avail their services anytime through our platform</p>-->

									</div>
								</div>
							</div>
						</div>
					</li>
				</div>
				<div class="item">
					<li>
						<div class="slider-info banner-view banner-top2 bg bg2">
							<div class="banner-info">
								<div class="container">
									<div class="banner-info-bg">
										<!-- <h2 Style="Color:#FFF;">Location Based Services</h2> -->
										<!--<p>Location-based Services are services that are particular to a location in a certain area that require customers to check-in physically and avail the service. For example, restaurants, guest houses, hospitals and tourist destinations etc. Location-based services use GPS technology to suggest service providers near you</p>-->


									</div>
								</div>
							</div>
						</div>
					</li>
				</div>
			</div>
		</div>
	</section>
	<section class="hukumPakistan-bottom-grids-6">
		<div class="container">
			<div class="grids-area-hny main-cont-wthree-fea row">


				<div class="col-lg-4 col-md-6 grids-feature pbn">
					<a href="pbn.php" >
						<div class="area-box">
							<!--<span class="fa fa-tint" aria-hidden="true"></span>-->
							<img src="assets/images/pbn_logo.png" alt="..." class="img-responsive" id="img1">
							<img src="assets/images/pbn_logo_white.png" alt="..." class="img-responsive" id="img2">
							<h4 class="title-head mt-5 mb-3" >Pakistan Blood Network</h4>
							<p>A platform that connects volunteer donors and people in need of blood through website and mobile application.</p>
							<br><br>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-6 grids-feature ps">
					<a href="pbs.php" >
						<div class="area-box">
							<!--<span class="fa fa-user-md" aria-hidden="true"></span>-->
							<img src="assets/images/ps_logo.png" alt="..." class="img-responsive" id="img3">
							<img src="assets/images/ps_logo_white.png" alt="..." class="img-responsive" id="img4">
							<h4 class="title-head my-3" style="font-size:23px;">Profession Based Services</h4>
							<p>It includes services of individuals from any profession such as daily repair and maintenance or intellectual services.</p>
							<br><br>

						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-6 grids-feature lbs">
					<a href="lbs.php">
						<div class="area-box">
							<!--<span class="fa fa-location-arrow" aria-hidden="true"></span>-->
							<img src="assets/images/lbs_logo.png" alt="..." class="img-responsive" id="img3">
							<img src="assets/images/lbs_logo_white.png" alt="..." class="img-responsive" id="img4">
							<h4 class="title-head my-3">Location Based Services</h4>
							<p>A platform to help businesses promote themselves and a directory of locations where customers can check-in.</p>
						</div>
					</a>
				</div>




			</div>
		</div>
	</section>
	<section class="hukumPakistan-content-with-photo-1">
		<div class="ab-content-6-mian py-5">
			<div class="container py-lg-5">
				<div class="welcome-grids row">
					<div class="col-lg-6 welcome-image">
						<img src="assets/images/logo.png" class="img-fluid" alt="" />
					</div>
					<div class="col-lg-6 mt-lg-0 mt-5 pl-lg-4">
						<div class="title-content text-left">
							<h6 class="sub-title">Welcome to Hukum Pakistan</h6>
							<h3 class="hny-title">About Us</h3>
						</div>
						<p class="my-3">Hukum Pakistan is a service-based startup that aims to add quality to profession and location-based services. We aspire to make available top-quality services through our software application. Moreover, we sincerely aim to serve the nation’s public cause by introducing "Pakistan Blood Network" to ease the process of blood donation for the needy.</p>
						<div class="read">
							<a class="btn btn-success mt-4" href="about.php">Read More</a>
						</div>
					</div>


				</div>

			</div>
		</div>
	</section>
	<section class="hukumPakistan-content-6">
		<div class="content-6-mian py-5">
			<div class="container py-lg-5">
				<div class="content-info-in row">

					<div class="content-gd col-lg-6 pl-lg-6">
						<h3>Vision</h3>
						<p>To become a professional leading organization in the services sector all over Pakistan by introducing a top quality e-commerce platform for services that justly delights customers.</p>
					</div>
					<div class="content-gd col-lg-6 pl-lg-6">
						<h3>Mission</h3>
						<p>Hukum Pakistan aims to digitalize the services sector by enhancing the competitive advantage of services through quality augmentation and quick service through E-commerce. <a href="about.php">Read more...</a></p>
					</div>

				</div>
				<div class="features-top_sur d-grid">
					<div class="features-top-left_sur">
						<p>Adding Quality in Services</p>
					</div>
					<div class="features-top-left_sur">
						<p>Creation of Jobs</p>
					</div>
					<div class="features-top-left_sur">
						<p>Standardization of Services</p>
					</div>
					<div class="features-top-left_sur">
						<p>Formalization of Services</p>
					</div>
					<div class="features-top-left_sur">
						<p>Efficiency in Service Delivery</p>
					</div>
					<div class="features-top-left_sur">
						<p>Price Monitoring</p>
					</div>


				</div>

			</div>
		</div>
	</section>
	<div class="page-section banner-home bg-image" style="background-color: white;">
		<div class="container py-5 py-lg-0">
			<div class="row align-items-center">
				<div class="col-lg-4 wow zoomIn">
					<div class="img-banner d-none d-lg-block">
						<img src="assets/images/mobile_app.png" alt="">
					</div>
				</div>
				<div class="col-lg-8 wow fadeInRight">
					<h1 class="font-weight-normal mb-3">Get easy access to all services using Hukum Pakistan application.</h1>
					<a href="#"><img src="assets/images/google_play.svg" alt=""></a>

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