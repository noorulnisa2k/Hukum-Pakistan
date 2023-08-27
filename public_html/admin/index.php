<?php include('auth.php'); ?>
<?php include("connection.php"); ?>
<?php $title = "Dashboard"; ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

        <!-- Content Start -->
        <div class="content">
            <?php include('includes/nav.php'); ?>


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi-person-fill fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2"> <b> Total User </b></p>
                                <h6 class="mb-0">
                                    <?php  
                                    $sql = "SELECT COUNT(*)  FROM auth_user";
                                    $result = mysqli_query($co, $sql);
                                    if($result){
                                        $row = mysqli_fetch_array($result);
                                        $total = $row[0];
                                        echo $total;
                                    }
                                    ?>
                            </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi-person-fill fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2"><b>Total Donors</b></p>
                                <h6 class="mb-0">
                                <?php  
                                    $sql = "SELECT COUNT(*) FROM hukumpakistanapp_donor";
                                    $result = mysqli_query($co, $sql);
                                    if($result){
                                        $row = mysqli_fetch_array($result);
                                        $total = $row[0];
                                        echo $total;
                                    }
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi-person-fill fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2"><b>Total Patients</b></p>
                                <h6 class="mb-0">
                                <?php  
                                    $sql = "SELECT COUNT(*) FROM hukumpakistanapp_patient";
                                    $result = mysqli_query($co, $sql);
                                    if($result){
                                        $row = mysqli_fetch_array($result);
                                        $total = $row[0];
                                        echo $total;
                                    }
                                    ?>
                                </h6>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi-person-fill fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2"><b>Total Professionals</b></p>
                                <h6 class="mb-0">
                                <?php  
                                    $sql = "SELECT COUNT(*) FROM professions_list";
                                    $result = mysqli_query($co, $sql);
                                    if($result){
                                        $row = mysqli_fetch_array($result);
                                        $total = $row[0];
                                        echo $total;
                                    }
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Tables Name Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Home</h6>
                            <div class="p-2 mb-2 bg-white text-dark"> <a href="tbl-users.php">Users</a> </div>
                            <div class="p-2 mb-2 bg-white text-dark"> <a href="tbl-donors.php">Donors</a> </div>
                            <div class="p-2 mb-2 bg-white text-dark"> <a href="tbl-patients.php">Patients</a> </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tables Name End -->

<?php include('includes/footer.php'); ?>
<?php include('includes/scripts.php'); ?>