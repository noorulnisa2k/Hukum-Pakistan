<!doctype html>
<html lang="">
<?php 
$doctitle = "Services";
include('head.php'); ?>
<body>
<?php include('header.php'); ?>

	<nav id="breadcrumbs" class="breadcrumbs">
		<div class="container page-wrapper">
			<a href="/">Home</a> » <span class="breadcrumb_last" aria-current="page">Services</span>
		</div>
	</nav>
    <section class="hukumPakistan-hp-m-main">
		<div class="hp-content py-5">
			<div class="container">
				<div class="title-content text-center">
					<h3 class="hny-title"> All the Services you need</h3><br/>

					<p >A service-based startup that aims to add quality to Profession and Location-based services. We aspire to make available top-quality services through our software application. Moreover, we sincerely aim to serve the nation’s public cause by introducing "Pakistan Blood Network" to ease the process of blood donation for the needy.</p>
                    
   
</div>

 
				

		</div>
		</div>
	</section>
	<section class="hukumPakistan-content-with-video">
		<div class="content-video-info py-5">
			<div class="container py-lg-5">
				<div class="content-photo-grids row mt-0" id="pbn">
					<div class="photo-6-inf-left col-lg-6 pr-lg-4">
						 <video width="600" controls>
                            <source src="video/blood_donation.mp4" type="video/mp4">
                          		Your browser does not support the video tag.
                          </video> 
					</div>
					<div class="photo-6-inf-right col-lg-6 text-left pl-lg-5 mt-lg-0 mt-4">
						<h3 class="hny-title">Pakistan Blood Network</h3>
                        <!--<h6 class="sub-title">Services</h6><br/>-->
                        <p>A platform that connects volunteer donors and people in need of blood through website and mobile application.</p>

						<div class="servehny-1 mt-3">
							<div class="read">
								<a class="btn mt-4" href="be_hero.php">Donate Blood</a>
							</div>
						</div>
                        
					</div>
				</div>
				<div class="content-photo-grids row" id="pbs">
					<div class="photo-6-inf-right col-lg-6 text-left pr-lg-5 mb-lg-0 mb-4">
						<h3 class="hny-title">Profession Based Services</h3>
                        <!--<h6 class="sub-title">Services</h6><br/>-->
                        <p>It includes services of individuals from any profession such as daily repair and maintenance or intellectual services.</p>
						<div class="servehny-1 mt-3">
							<div class="read">
								<a class="btn mt-4" href="#">Launching Soon</a>
							</div>
						</div>
					</div>
					<div class="photo-6-inf-left col-lg-6 pr-lg-4">
						<video width="600" controls>
                            <source src="video/pro_based.mp4" type="video/mp4">
                          		Your browser does not support the video tag.
                          </video> 
					</div>
				</div>
				<div class="content-photo-grids row" id="lbs">
					<div class="photo-6-inf-left col-lg-6 pr-lg-4">
						<video width="600" controls>
                            <source src="video/location_based.mp4" type="video/mp4">
                          		Your browser does not support the video tag.
                          </video>
					</div>
					<div class="photo-6-inf-right col-lg-6 text-left pl-lg-5 mt-lg-0 mt-4">
						<h3 class="hny-title">Location Based Services</h3>
                        <!--<h6 class="sub-title">Services</h6><br/>-->
                        <p>A platform to help businesses promote themselves and a directory of locations where customers can check-in.</p>
						<div class="servehny-1 mt-3">
							<div class="read">
								<a class="btn mt-4" href="#">Launching Soon</a>
							</div>
						</div>
                        
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
	$(function () {
		$('.navbar-toggler').click(function () {
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