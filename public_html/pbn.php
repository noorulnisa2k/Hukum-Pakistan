<!doctype html>
<html lang="">
<?php
$doctitle = "Pakistan Blood Network";
include('head.php'); ?>


<body>
	<?php include('header.php'); ?>
	<style>
		.donor_button {
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

		.button-pbn {
			background-color: white;
			color: black;
			border: 2px solid #f44336;
		}

		.button-pbn:hover {
			background: #f44336;
			color: #FFF;
		}

		.donor_button:focus {
			color: #fff;
			border: 3px solid #df1d2a;
			;
			border-radius: 0px;
			background-color: #df1d2a;
		}

		button,
		button:active,
		button:focus {
			outline: none;
		}
	</style>
	<nav id="breadcrumbs" class="breadcrumbs">
		<div class="container page-wrapper">
			<a href="/">Home</a> » <span class="breadcrumb_last" aria-current="page">Pakistan Blood Network</span>
		</div>
	</nav>



	<?php
	// $sql_count = "SELECT * FROM hukumpakistanapp_patient INNER JOIN request_tbl ON hukumpakistanapp_patient.user_id = request_tbl.sender_pk_id WHERE hukumpakistanapp_patient.user_id = $user_id AND request_tbl.d_endorsement='Donated' AND request_tbl.p_endorsement='Donated'";
	// if ($res_count = mysqli_query($co, $sql_count)) {
	// 	$rowcount = mysqli_num_rows($res_count);
	// 	if ($rowcount >= 3) {

	// 		$sql = "SELECT * FROM hukumpakistanapp_donor INNER JOIN request_tbl ON hukumpakistanapp_donor.user_id = request_tbl.sender_pk_id WHERE hukumpakistanapp_patient.user_id = $user_id AND request_tbl.d_endorsement='Donated' AND request_tbl.p_endorsement='Donated'";
	// 		if ($verify = mysqli_query($co, $sql)) {
	// 			$rowcount = mysqli_num_rows($verify);
	// 			if ($rowcount > 0) {
	// 				echo "you have donated blood you can now submit patient form";
	// 			} else {
	// 				echo $rowcount . " your have reached your limit , now first Regester as a donor";
	// 			}
	// 		}
	// 	} else {
	// 		echo "you can submit patient form, you didn't reached your limit ";
	// 	}
	// }

	?>

	<section class="hukumPakistan-hp-m-main">
		<div class="hp-content py-5">
			<div class="container ">
				<div id="get-msg">

				</div>
				<?php
				if (isset($_GET['registered'])) {
					echo '
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>' . $_GET['registered'] . '</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
				}
				?>
				<div class="title-content text-center mb-lg-5 mt-4">
					<img src="assets/images/pbn_logo.png" width="250" />
					<h3 class="hny-title" style="color:#df1d2a">Pakistan Blood Network</h3><br />
					<p style="color: #000000; font-weight: bold; font-size:19px;">Pakistan Blood Network (PBN) is a platform connecting volunteer donors and people needing blood through website and application software</p>
					<!-- <a id="donor" href="be_hero.php" class="donor_button button-pbn"  >DONOR FORM</a>
					<a id="patient" href="" class="donor_button button-pbn" >PATIENT FORM</a> -->
					<button id="donor" class="donor_button button-pbn">DONOR FORM</button>
					<button id="patient" class="donor_button button-pbn" value="<?php echo $user_id ?>">PATIENT FORM</button>

				</div>
			</div>
		</div>
	</section>




	<?php include('footer.php'); ?>
	<!-- Ajax Script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#patient').click(function(ev) {
				ev.preventDefault();
				console.log('patient button click');
				var user_id = $("#patient").val();
				console.log(user_id);
				$.ajax({
					type: "POST",
					url: "pbn-script.php",
					data: {
						user_id : user_id
					},
					success: function(data) {
						if(data == 'success'){
							window.location.href ="patient_form.php";
						}
						else{
							$("#get-error").html(data);
						}
					},
					error: function(data) {
						alert("some Error");
					}
				});
			});
		});
		$(document).ready(function() {
			$('#donor').click(function(ev) {
				ev.preventDefault();
				console.log('donor button click');
				window.location.href = 'be_hero.php';
			});
		});
	</script>
</body>

</html>
<!-- <script src="assets/js/jquery-3.3.1.min.js"></script>s -->

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