<!doctype html>
<html lang="">
<?php
$doctitle = "Professional Services";
include('head.php'); ?>


<body>
    <style>
        .hukumPakistan-hp-m-main p {
            font-size: 20px;
            cursor: pointer;
            line-height: 10px;
            display: inline-block;
            color: #1b4f9d;
            font-weight: bold;
        }
        .hukumPakistan-hp-m-main a.btn{
            width: 80%;
        }
        .read a.btn{
            background-color: #1b4f9d;
            border: 2px solid #1b4f9d;
        }
        .read a.btn:hover{
            color: #1b4f9d;
            background-color: #fff;
            border: 2px solid #1b4f9d;
        }
    </style>
    <?php include('header.php'); ?>

    <nav id="breadcrumbs" class="breadcrumbs">
        <div class="container page-wrapper">
            <a href="/">Home</a> » <span class="breadcrumb_last" aria-current="page">Professional Services</span>
        </div>
    </nav>
    <section class="hukumPakistan-hp-m-main">
        <div class="container p-5">
            <div class="container py-lg-3">
                <div class="col-lg-12 title-content text-center py-4">
                    <h2 style="color: #1b4f9d;">What do you want to be fixed?</h2>
                </div>
            </div>



            <?php
            if (isset($_GET['ps-list'])) {
                $list_id = $_GET['ps-list'];
                $sql = "SELECT * FROM `tasks` WHERE prof_id = '$list_id'";
                $result = mysqli_query($co, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $prof_id = $row["prof_id"];
                        $task_name = $row["task_name"];
                        $task_price = $row["task_price"];
                        $task_pricetype = $row["task_pricetype"];
            ?>
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-9 col-md-6 grids-feature">
                                    <p><?php echo $task_name; ?></p>

                                    <?php
                                    echo "<br><b>Price:</b> " . "Rs. " . $task_price . "<br><b>Task Price Type:</b> " . $task_pricetype;
                                    ?>
                                </div>
                                <div class="col-lg-3 col-md-6 grids-feature">
                                    <div class="servehny-1 ">
                                        <div class="read">
                                            <a class="btn m-3" href="https://play.google.com/store/apps/details?id=com.pakistan.hukumpakistan" target="blank">Download app</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
            <?php
                    }
                }
            }

            if (isset($_GET['lbs-list'])) {
                $list_id = $_GET['lbs-list'];
                $sql = "SELECT * FROM `lbs_subcategories` WHERE cate_ID = '$list_id'";
                $result = mysqli_query($co, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cate_ID = $row["cate_ID"];
                        $categoryName = $row["categoryName"];
                        echo $categoryName . "<br>";
                    }
                }
            }
            ?>
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