<footer class="hukumPakistan-footer-66">
		<div class="footer-28-main">
			<div class="container">
				<div class="row footer-hny-top">
					<div class="col-lg-4 footer-logo pl-lg-0">
						<a class="navbar-brand" href="/">
							<img src="assets/images/logo_white.png" alt="Hukum Pakistan" title="Hukum Pakistan" style="height:75px;" />
						</a>
					</div>
                    <div class="col-lg-4 footer-logo pl-lg-0">
						<p style="color:#FFF; text-align:center">We aspire to make available top-quality services through our software application.</p>
					</div>
					<div class="col-lg-4 main-social-footer-28 pr-lg-0">
						<a href="https://www.facebook.com/hukumpakistan" target="_blank"><span class="fa fa-facebook"></a>
						<a href="https://twitter.com/HukumPakistan" target="_blank"><span class="fa fa-twitter"></a>
						<a href="https://www.linkedin.com/company/hukum-pakistan" target="_blank"><span class="fa fa-linkedin"></a>
						<a href="https://www.instagram.com/hukumpakistan/" target="_blank"><span class="fa fa-instagram"></a>
					</div>
				</div>
				<div class="row footer-top-28">
					<div class="col-lg-3 col-md-6 footer-list-28 pl-lg-0">
						<h6 class="footer-title-28">Hukum Pakistan</h6>
						<ul>
							<li><a href="about.php">About Us</a></li>
							<li><a href="term_and_condition.php">Terms & Conditions</a></li>
							<li><a href="privacy_policy.php">Privacy Policy</a></li>
							<li><a href="cookies_policy.php">Cookies Policy</a></li>
							<li><a href="faq.php">FAQ</a></li>
                            
						</ul>
					</div>
					<div class="col-lg-3 col-md-6 footer-list-28">
						<h6 class="footer-title-28">Services</h6>
						<ul>
							<li><a href="pbn.php">Pakistan Blood Network</a></li>
							<li><a href="pbs.php">Profession Based Services</a></li>
							<li><a href="lbs.php">Location Based Services</a></li>
						</ul>
					</div>
					<div class="col-lg-3 col-md-6 footer-list-28">
						<h6 class="footer-title-28">Quick Links</h6>
						<ul>
							<li><a href="/">Home</a></li>
							<li><a href="services.php">Services</a></li>
							<li><a href="contact.php">Contact</a></li>
					<?php 
					if (isset($_SESSION['username']) && !empty($_SESSION['email'])) {

					}else{
					    ?>
					    <li><a href="login.php">Login/Registration</a></li>
					    <?php
					}
					?>
						</ul>
					</div>
					<div class="col-lg-3 col-md-6 footer-list-28 pr-lg-0">
						<h6 class="footer-title-28">CONTACT</h6>
						<ul>
							<li>Sukkur IBA Physical Department, Opposite SRSO Head Office, Shikarpur Road, Sukkur, Pakistan.</li>
                            <li>Phone: <a href="tel:+92 333 7142055 ">+92 333 7142055 </a></li>
							<li>Email: <a
								href="mailto:contact@hukumpakistan.pk" class="mail"> contact@hukumpakistan.pk</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="midd-footer-28 align-center">
				<p class="copy-footer-28">© <?php echo date("Y"); ?> Hukum Pakistan | All rights reserved.</p>
			</div>
		</div>
		<button onclick="topFunction()" id="movetop" title="Go to top">
			<span class="fa fa-angle-up"></span>
		</button>
		<script>
			window.onscroll = function () {
				scrollFunction()
			};

			function scrollFunction() {
				if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
					document.getElementById("movetop").style.display = "block";
				} else {
					document.getElementById("movetop").style.display = "none";
				}
			}
			function topFunction() {
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
			}
		</script>
	</footer>