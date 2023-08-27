<!doctype html>
<html lang="">
<?php
$doctitle = "LBS-subCategories";
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

    <nav id="breadcrumbs" class="breadcrumbs">
        <div class="container page-wrapper">
            <a href="/">Home</a> » <span class="breadcrumb_last" aria-current="page">Location Based Services-subCategories</span>
        </div>
    </nav>

    <?php
    if (isset($_GET['cat-id'])) {
        $cateID =  $_GET['cat-id'];

    ?>
        <section class="hukumPakistan-hp-m-main">
            <div class="hp-content py-5 my-5">
                <div class="hukumPakistan-bottom-grids-6">
                    <div class="container py-lg-5">
                        <div class="grids-area-hny main-cont-wthree-fea row mb-lg-5 mt-4">
                            <div class="col-lg-12 title-content text-center py-4">
                                <h2 style="color: #faa636;">Select Sub Category</h2>
                            </div>


                            <?php
                            $cat_sql = "SELECT * FROM `lbs_subcategories` WHERE cate_ID=$cateID";
                            $cat_result = mysqli_query($co, $cat_sql);
                            if (mysqli_num_rows($cat_result) > 0) {
                                while ($row = mysqli_fetch_assoc($cat_result)) {
                                    $sub_catID = $row["sub_catID"];
                                    $cate_ID = $row["cate_ID"];
                                    $categoryName = $row["categoryName"];

                            ?>
                                    <div class="col-lg-3 col-md-6 grids-feature lbs-li">
                                        <a href="lbs-area.php?sub-cat-id=<?php echo $sub_catID; ?>&cat-name=<?php echo $categoryName; ?>">
                                            <div class="area-box" style="padding: 30px 50px; overflow: hidden;">
                                                <p><?php echo $categoryName; ?></p>
                                            </div>
                                        </a>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "redirect";
                            }
                            ?>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php
    } else {
        echo "<a href='lbs.php'>Try again</a>";
    }
    ?>



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