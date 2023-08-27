<?php include('auth.php'); ?>
<?php include("connection.php"); ?>
<?php $title = "Patients Data"; ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<!-- Content Start -->
<div class="content">
    <?php include('includes/nav.php'); ?>

    <?php 
    if (isset($_POST['delete_btn'])) {
        $id = mysqli_real_escape_string($co, $_POST['delete_id']);
        $email = mysqli_real_escape_string($co, $_POST['delete_email']);

        $sql = "DELETE FROM `hukumpakistanapp_patient` WHERE id = '$id' ";
        $result = mysqli_query($co, $sql);
        if ($result) {
            $_SESSION['status']= "Patient <b>".$email."</b> Deleted!";
        } else {
            $_SESSION['status']= "Unable to delete patient <b>".$email."</b>.";
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
                    <h6 class="mb-4">Patients Data
                        <a href="add-patient.php">
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
                                    <th scope="col">picture</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Blood Group</th>
                                    <!-- <th scope="col">Quantity</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Hospital</th>
                                    <th scope="col">Urgency</th>
                                    <th scope="col">Doctor Name</th>
                                    <th scope="col">Transportation</th>
                                    <th scope="col">Note</th>
                                    <th scope="col">Date Added</th>
                                    <th scope="col">Is Settled</th> -->
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //fetching patient information
                                $sql = "SELECT * FROM `hukumpakistanapp_patient`";
                                $result = mysqli_query($co, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row["id"];
                                        $user_id = $row["user_id"];
                                        $picture = $row["picture"];
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        $contact_number = $row['contact_number'];
                                        $blood_grp = $row['blood_grp'];
                                        $quantity = $row['quantity'];
                                        $city = $row['city'];
                                        $hospital_name = $row['hospital_name'];
                                        $urgency = $row['urgency'];
                                        $doctor_name = $row['doctor_name'];
                                        $transportation = $row['transportation'];
                                        $note = $row['note'];
                                        $timestamp = $row['timestamp'];
                                        $isSettled = $row['isSettled'];
                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $id; ?></th>
                                            <td><?php echo $user_id; ?></td>
                                            <td><?php echo $picture; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $contact_number; ?></td>
                                            <td><?php echo $blood_grp; ?></td>
                                            <!-- <td><?php echo $quantity; ?></td>
                                    <td><?php echo $city; ?></td>
                                    <td><?php echo $hospital_name; ?></td>
                                    <td><?php echo $urgency; ?></td>
                                    <td><?php echo $doctor_name; ?></td>
                                    <td><?php echo $transportation; ?></td>
                                    <td><?php echo $note; ?></td>
                                    <td><?php echo $timestamp; ?></td>
                                    <td><?php echo $isSettled; ?></td> -->
                                            <td>
                                                <form action="edit-patient.php" method="post">
                                                    <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                                                    <button type="submit" name="edit_btn" class="btn btn-success m-2">Edit</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="tbl-patients.php" method="post">
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