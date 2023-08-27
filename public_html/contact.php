<!doctype html>
<html lang="">
<?php
$doctitle = "Contact us";
include('head.php'); ?>

<body>
  <?php include('header.php'); ?>

  <nav id="breadcrumbs" class="breadcrumbs">
    <div class="container page-wrapper">
      <a href="/">Home</a> » <span class="breadcrumb_last" aria-current="page">Contact us</span>
    </div>
  </nav>


  <!-- ======= Contact Section ======= -->
  <section class="hukumPakistan-hp-m-main">
    <div class="hp-content py-5">
      <div class="container py-lg-5">
        <div class="title-content text-center mb-lg-5 mt-4">
          <div class="container">
            <div class="row mb-4">
              <div class="col-lg-6" style="box-shadow: 0 0 40px 3px rgb(0 0 0 / 5%);">
                <div class="info-box my-4">
                  <i class="bx bx-map"></i>
                  <h3>Address</h3>
                  <p>Sukkur IBA Physical Department, Opposite SRSO Head Office, Shikarpur Road, Sukkur, Pakistan.</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6" style="box-shadow: 0 0 40px 3px rgb(0 0 0 / 5%);">
                <div class="info-box my-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>hukumpakistan@gmail.com</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6" style="box-shadow: 0 0 40px 3px rgb(0 0 0 / 5%);">
                <div class="info-box my-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+92 333 7142055</p>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-lg-12 ">
                <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.0250652839445!2d68.80795241506299!3d27.747372882775352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc578a0378752aad5!2zMjfCsDQ0JzUwLjUiTiA2OMKwNDgnMzYuNSJF!5e0!3m2!1sen!2s!4v1650007267495!5m2!1sen!2s" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
              </div>

              <!-- div start -->
              <!-- <div class="col-lg-6">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                  </div> -->
              <!-- <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div> -->
              <!-- <div class="servehny-1 mt-3 col-lg-4">
                    <div class="read">
                      <a class="btn btn-success mt-4" href="#">Message</a>
                    </div>
                  </div>
                </form>
              </div> -->
              <!-- div end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Section -->


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
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.countup.js"></script>
<script>
  $('.counter').countUp();
</script>
<script src="assets/js/bootstrap.min.js"></script>