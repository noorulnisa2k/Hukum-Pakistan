<!doctype html>
<html lang="">
<?php
$doctitle = "LBS-Categories";
include('head.php'); ?>


<body>
	<?php include('header.php'); ?>
	<style>
		.lbs-li .area-box:hover {
			background-color: #faa636;
			color: #fff;
			transition: .3s;
		}

		.hukumPakistan-bottom-grids-6 p {
			font-size: 20px;
			cursor: pointer;
			line-height: 25px;
			display: inline-block;
			color: #0c8040;
			font-weight: bold;
		}
	</style>

	<?php
	if (isset($_POST['select-city'])) {
		$_SESSION['lbs_city'] = $_POST['city'];
	}
	?>
	<script>
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href)
		}
	</script>


	<nav id="breadcrumbs" class="breadcrumbs">
		<div class="container page-wrapper">
			<a href="/">Home</a> » <span class="breadcrumb_last" aria-current="page">Location Based Services-Categoriess</span>
		</div>
	</nav>


	<section class="hukumPakistan-hp-m-main">
		<div class="hp-content py-5 my-5">
			<div class="hukumPakistan-bottom-grids-6">
				<div class="container py-lg-5">
					<div class="grids-area-hny main-cont-wthree-fea row mb-lg-5 mt-4">
						<div class="title-content text-center mb-lg-5 mt-4">
							<img src="assets/images/lbs-category-img.jpg" class="img-fluid" alt="" />
						</div>
						<div class="col-lg-12 title-content text-center py-4">
							<h2 style="color: #faa636;">Select Category</h2>
						</div>
						<?php
						//fetching LBS Categories information
						$sql = "SELECT * FROM `lbs_categories`";
						$result = mysqli_query($co, $sql);
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								$cateID = $row["cateID"];
								$categoryName = $row["categoryName"];

								$cat_sql = "SELECT * FROM `lbs_subcategories` WHERE cate_ID=$cateID";
								$cat_result = mysqli_query($co, $cat_sql);
								// $data = mysqli_fetch_array($cat_result);
								if (mysqli_num_rows($cat_result) > 0) {
						?>
									<div class="col-lg-3 col-md-6 grids-feature lbs-li">
										<a href="lbs-sub-categories.php?cat-id=<?php echo $cateID; ?>">
											<div class="area-box" style="padding: 30px 50px; overflow: hidden;">
												<p><?php echo $categoryName; ?></p>
											</div>
										</a>
									</div>
								<?php
								} else {
								?>
									<div class="col-lg-3 col-md-6 grids-feature lbs-li">
										<a href="lbs-location.php?">
											<div class="area-box" style="padding: 30px 50px; overflow: hidden;">
												<p><?php echo $categoryName; ?></p>
											</div>
										</a>
									</div>
								<?php
								}
								?>

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