<?php include('auth.php'); ?>
<?php include("connection.php"); ?>
<?php $title = "Donors Data"; ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<!-- Content Start -->
<div class="content">
    <?php include('includes/nav.php'); ?>

    <?php 
    if (isset($_POST['delete_btn'])) {
        $id = mysqli_real_escape_string($co, $_POST['delete_id']);
        $email = mysqli_real_escape_string($co, $_POST['delete_email']);

        $sql = "DELETE FROM `hukumpakistanapp_donor` WHERE id = '$id' ";
        $result = mysqli_query($co, $sql);
        if ($result) {
            $_SESSION['status']= "Donor <b>".$email."</b> Deleted!";
        } else {
            $_SESSION['status']= "Unable to delete donor <b>".$email."</b>.";
            echo "Error: " . $sql . "<br>" . mysqli_error($co);
        }

    }
    ?>

    <!-- Success Alert Start -->
    <?php
    if (isset($_SESSION['success']) && $_SESSION["success"] != '') {
    ?>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class=" rounded h-100">
                        <!-- <div class="alert alert-success" role="alert">
                            User Successfully added
                        </div> -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['success'];
                            unset($_SESSION['success']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Success Alert End -->

    <!-- Delete Alert Start -->
    <?php
    if (isset($_SESSION['status']) && $_SESSION["status"] != '') {
    ?>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class=" rounded h-100">
                        <!-- <div class="alert alert-success" role="alert">
                            User Successfully added
                        </div> -->
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['status'];
                            unset($_SESSION['status']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Delete Alert End -->

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Donors Data
                        <a href="add-donor.php">
                            <button type="button" class="btn btn-outline-primary m-2" style="float: right;">
                            <i class="bi-plus-square-dotted me-2"></i>Create
                            </button>
                        </a>
                    </h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Blood Group</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">City</th>
                                    <!-- <th scope="col">Location</th>
                                    <th scope="col">Latitude</th>
                                    <th scope="col">Longitude</th>
                                    <th scope="col">Adress Line</th>
                                    <th scope="col">Date added</th>
                                    <th scope="col">Donated</th>
                                    <th scope="col">Last Donate</th>
                                    <th scope="col">Note</th> -->
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    //fetching patient information
                                    $sql = "SELECT * FROM `hukumpakistanapp_donor`";
                                    $result = mysqli_query($co, $sql);           	
                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            $id = $row["id"];
                                            $user_id = $row["user_id"];
                                            $name = $row['name'];
                                            $email = $row['email'];
                                            $contact_number = $row['contact_number'];
                                            $age = $row['age'];
                                            $blood_grp = $row['blood_grp'];
                                            $gender = $row['gender'];
                                            $city = $row['city'];
                                            $location = $row['location'];
                                            $lat = $row['lat'];
                                            $lng = $row['lng'];
                                            $address_line = $row['address_line'];
                                            $date_time = $row['date_time'];
                                            $donated = $row['donated'];
                                            $last_Donate = $row['last_Donate'];
                                            $Note = $row['Note'];
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $id; ?></th>
                                    <td><?php echo $user_id; ?></td>
                                    <td><?php echo substr($name, 0, 10); ?></td>
                                    <td><?php echo substr($email, 0, 10); ?></td>
                                    <td><?php echo $contact_number; ?></td>
                                    <td><?php echo $age; ?></td>
                                    <td><?php echo $blood_grp; ?></td>
                                    <td><?php echo $gender; ?></td>
                                    <td><?php echo $city; ?></td>
                                    <!-- <td><?php echo substr($location, 0, 10); ?></td>
                                    <td><?php echo $lat; ?></td>
                                    <td><?php echo $lng; ?></td>
                                    <td><?php echo substr($address_line, 0, 10); ?></td>
                                    <td><?php echo $date_time; ?></td>
                                    <td><?php echo $donated; ?></td>
                                    <td><?php echo $last_Donate; ?></td>
                                    <td><?php echo $Note; ?></td> -->
                                    <td>
                                        <form action="edit-donor.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                                            <button type="submit" name="edit_btn" class="btn btn-success m-2">Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="tbl-donors.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                                            <input type="hidden" name="delete_email" value="<?php echo $email; ?>">
                                            <button type="submit" name="delete_btn" class="btn btn-danger m-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php 
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Table End -->




<?php include('includes/footer.php'); ?>
<?php include('includes/scripts.php'); ?>