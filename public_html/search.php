<!doctype html>
<html lang="">
<?php 
$doctitle = "Search";
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
			<div class="container py-lg-5">
				<div class="title-content text-center mb-lg-5 mt-4">
					<h3 class="hny-title">We are sorry no result(s) found.</h3><br/>

					
                    
<div class="search__container">
    <p class="search__title">
        Search for Blood Group, Location, and Professional Services
    </p>
    <form method="post" action="search.php">
    <input class="search__input" type="text" name="search" placeholder="Search">
    </form>
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