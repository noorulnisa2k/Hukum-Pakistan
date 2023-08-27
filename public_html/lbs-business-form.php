<!doctype html>
<html lang="">
<?php
$doctitle = "LBS-Form";
include('auth.php');
include('head.php'); ?>


<body>


	<?php include('header.php'); ?>
	<?php
	$userid = $_SESSION['user_id'];

	// Checking if user has already submitted business form
	$query = "SELECT * from `user_business` WHERE user_id='$userid' ";
	$result = mysqli_query($co, $query);
	if (mysqli_num_rows($result) == 0) {
		if (isset($_POST['lbs-business-form'])) {

			$name = mysqli_real_escape_string($co, $_POST['name']);
			$phone = mysqli_real_escape_string($co, $_POST['phone']);
			$product = mysqli_real_escape_string($co, $_POST['product']);
			$city = mysqli_real_escape_string($co, $_POST['city']);
			$address = mysqli_real_escape_string($co, $_POST['address']);
			$availability = mysqli_real_escape_string($co, $_POST['availability']);
			$working_days = mysqli_real_escape_string($co, $_POST['working_days']);

			// saving category according to user input
			if (mysqli_real_escape_string($co, $_POST['subCategory']) != "") {
				$category = mysqli_real_escape_string($co, $_POST['subCategory']);
			} else {
				// getting name of category by category ID 
				$cateID = mysqli_real_escape_string($co, $_POST['category']);
				$query = "SELECT * FROM `lbs_categories` WHERE cateID='$cateID'";
				$dt = mysqli_query($co, $query);
				$result = mysqli_fetch_array($dt);
				$category = $result['categoryName'];
			}

			$sql = "INSERT INTO `lbs_locations`(`loc_name`, `contact_no`, `product_name`, `city`, `loc_address`, `locsub_category`, `availability_hours`, `working_days`) VALUES ('$name','$phone','$product','$city','$address', '$category', '$availability','$working_days')";
			$result = mysqli_query($co, $sql);
			// $sql2 = "INSERT INTO `user_business`(`user_id`, `loc_id`) VALUES ('$userid','[value-3]')";
			if ($result) {
				// echo "submit";
				// $showAlert = "Submitted Succesfully";
				$loc_id = mysqli_insert_id($co);
				$query = "INSERT INTO `user_business`(`user_id`, `loc_id`) VALUES ('$userid','$loc_id')";
				$sql = mysqli_query($co, $query);
				if ($sql) {
					$query2 = "UPDATE `cities`  SET `lbsActive`=1 WHERE cityName='$city'";
					$sql2 = mysqli_query($co, $query2);
					if ($sql2) {
						echo ("<script>window.location.href='lbs.php?registered=Success';</script>");
						exit();
					} else {
						echo "error in city";
					}
				} else {
					echo "error in business";
				}
			} else {
				$showError = "Something went wrong";
				echo "Error: " . $sql . "<br>" . mysqli_error($co);
			}
		}
	} else {
		echo ("<script>window.location.href='lbs.php?registered=registered';</script>");
		exit();
	}



	?>
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
			color: black;
			font-weight: bold;
		}
	</style>

	<nav id="breadcrumbs" class="breadcrumbs">
		<div class="container page-wrapper">
			<a href="/">Home</a> » <span class="breadcrumb_last" aria-current="page">LBS-Business Form</span>
		</div>
	</nav>

	<section class="hukumPakistan-hp-m-main">
		<div class="hp-content py-5">
			<div class="container">
				<?php
				// if (isset($showAlert)) {
				// 	echo '
				//       <div class="alert alert-success alert-dismissible fade show" role="alert">
				//       <strong></strong>' . $showAlert . ' 
				//       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				//         <span aria-hidden="true">&times;</span>
				//       </button>
				//     </div>';
				// }
				if (isset($showError)) {
					echo '
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Error! </strong>' . $showError . '
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
				}
				?>
				<div class="hp-content">
					<div class="container py-lg-5">

						<div class="title-content text-center mb-lg-5 mt-4">
							<img src="assets/images/lbs-banner.jpg" class="img-fluid" alt="" />


							<div class="row justify-content-center">
								<div class="col-md-12">
									<span class="anchor" id="formComplex"></span>
									<form action="lbs-business-form.php" method="post">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<h1 class="col-sm-12 justify-content-center py-4" style="color: #0c8040;">What is your business?</h1>
													<div class="col-sm-3">
														<label for="exampleAmount">Business Name</label>
														<input class="form-control" id="exampleAccount" placeholder="Business Name" type="text" name="name" required>
													</div>

													<div class="col-sm-3 pb-3">
														<label for="exampleAmount">Contact No</label>
														<input type="tel" id="exampleCtrl" name="phone" pattern="[0-9]{11}" class="form-control" placeholder="03XXXXXXXXX" required>
													</div>

													<div class="col-sm-3">
														<label for="exampleAmount">Product or Services</label>
														<input class="form-control" id="exampleAccount" placeholder="Product/Services" type="text" name="product" required>
													</div>

													<div class="col-sm-3">
														<label for="message-text" class="col-form-label">Select City</label>
														<select class="form-control custom-select" id="city" name="city" required>
															<option value="" disabled selected> --Select--</option>
															<?php
															$sql = "SELECT * FROM `cities`";
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

													<div class="col-sm-3">
														<label for="exampleAmount">Address</label>
														<input class="form-control" id="exampleAccount" placeholder="Complete Business Address" type="text" name="address" required>
													</div>

													<div class="col-sm-3">
														<label for="exampleAmount">Availability Hours</label>
														<input class="form-control" id="exampleAccount" placeholder="9am - 5pm" type="text" name="availability" required>
													</div>

													<div class="col-sm-3 pb-3">
														<label for="exampleAmount">Working Days</label>
														<input class="form-control" id="exampleAccount" placeholder="Mon - Fri" type="text" name="working_days" required>
													</div>

													<div class="col-sm-3 pb-3">
														<label for="exampleFirst">Business Category</label>
														<select class="form-control custom-select" id="category" name="category" required>
														</select>
													</div>
													<div class="col-sm-3 pb-3" id="subCat" style="display: none;">
														<label for="exampleFirst">Sub Category</label>
														<select class="form-control custom-select" id="subCategory" name="subCategory">
														</select>
													</div>
												</div>
											</div>
											<div class="card-footer">
												<div class="float-center">
													<button class="btn btn-success" type="submit" name="lbs-business-form">Submit</button>

												</div>
											</div>
										</div>
										<!--/card-->
									</form>
								</div>
							</div>
							<!--/row-->

						</div>
					</div>
	</section>






	<?php include('footer.php'); ?>

	<!-- Ajax Script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#category').change(function() {
				loadSubCategory($(this).find(':selected').val());
			});

		});

		function loadCategory() {
			$.ajax({
				type: "POST",
				url: "ajax.php",
				data: "get=category",
				success: function(result) {
					$("#category").html(result);
					// alert("Category done");
				}
			});
		}

		function loadSubCategory(categoryId) {
			$("#subCategory").html('');
			// alert("sub - "+categoryId);
			$.ajax({
				type: "POST",
				url: "ajax.php",
				data: "get=subCategory&categoryId=" + categoryId,
				success: function(result) {
					$("#subCategory").html(result);
					var length = $('#subCategory > option').length;
					console.log(length);
					// alert("Sub Alert done");
					if (length > 1) {
						$("#subCat").css("display", "");
						$("#subCategory").prop('required', true);
					} else {
						$("#subCat").css("display", "none");
						$("#subCategory").prop('required', false);
					}

				}
			});
		}
		// init the categories
		loadCategory();
		var length = $('#subCategory > option').length;
		console.log(length);
	</script>




</body>

</html>
<!-- <script src="assets/js/jquery-3.3.1.min.js"></script> -->
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
<script src="assets/js/bootstrap.min.js"></script>