<?php include('auth.php'); ?>
<?php include("connection.php"); ?>
<?php
$showError = false;
// Donor Form

if (isset($_POST['update-data'])) {
    $id = mysqli_real_escape_string($co, $_POST['id']);
    $name = mysqli_real_escape_string($co, $_POST['name']);
    $email = mysqli_real_escape_string($co, $_POST['email']);
    $phone = mysqli_real_escape_string($co, $_POST['phone']);
    $gender = mysqli_real_escape_string($co, $_POST['gender']);
    $city = mysqli_real_escape_string($co, $_POST['city']);
    $age = mysqli_real_escape_string($co, $_POST['age']);
    $donation = mysqli_real_escape_string($co, $_POST['donation']);
    $last_donate = mysqli_real_escape_string($co, $_POST['last_donate']);
    $options = mysqli_real_escape_string($co, $_POST['options']);
    $note = mysqli_real_escape_string($co, $_POST['note']);

    $existSql = "SELECT * FROM `auth_user` WHERE email = '$email'";
    $result = mysqli_query($co, $existSql);
    $numExistRows = mysqli_num_rows($result);

    if ($numExistRows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row["id"];


            $sql = "UPDATE `hukumpakistanapp_donor` SET `user_id`='$user_id',`name`='$name',`email`='$email',`contact_number`='$phone', `gender`='$gender', `blood_grp`='$options',`city`='$city',`age`='$age',`donated`='$donation',`last_Donate`='$last_donate',`Note`='$note' WHERE id='$id' ";
            $result = mysqli_query($co, $sql);
            if ($result) {
                $_SESSION['success']= "Donor: <b>".$email."</b> data Successfully Updated!";
                header('Location: tbl-donors.php');
            } else {
                $showError = 'Some thing went wrong you are not added, Try again';
                echo "Error: " . $sql . "<br>" . mysqli_error($co);
            }
        }
    } else {
        $showError = "This email address is not registered";
    }
}
?>
<?php $title = "Edit Donor Data"; ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<!-- Content Start -->
<div class="content">
    <?php include('includes/nav.php'); ?>

    <!-- Error Alert Start -->
    <?php if ($showError) { ?>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="rounded h-100">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa fa-exclamation-circle me-2"></i><?php echo $showError; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Error Alert End -->

    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Donor Data</h6>
                    <form action="edit-donor.php" method="post">
                    <?php
                        if (isset($_POST['edit_btn'])) {
                            $edit_id = $_POST['edit_id'];
                            $sql = "SELECT * FROM `hukumpakistanapp_donor` WHERE id='$edit_id' ";
                            $result = mysqli_query($co, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["id"];
                                    $user_id = $row["user_id"];
                                    $name = $row["name"];
                                    $email = $row["email"];
                                    $contact_number = $row['contact_number'];
                                    $blood_grp = $row['blood_grp'];
                                    $age = $row['age'];
                                    $city = $row['city'];
                                    $gender = $row['gender'];
                                    $donated = $row['donated'];
                                    $last_Donate = $row['last_Donate'];
                                    $note = $row['Note'];
                        ?>
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $edit_id; ?>" required>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="contact_number" class="col-sm-2 col-form-label">Contact Number</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="tel" pattern="[0-9]{11}" placeholder="03XXXXXXXXX" class="form-control" id="contact_number" name="phone" value="<?php echo $contact_number; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="age" class="col-sm-2 col-form-label">Age</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="number" class="form-control" id="age" name="age" value="<?php echo $age; ?>" required>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                            <div class="col-sm-10 col-xl-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" <?php if($gender == 'Male'){ echo 'checked'; }?> >
                                    <label class="form-check-label" for="gender">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" <?php if($gender == 'Female'){ echo 'checked'; }?> >
                                    <label class="form-check-label" for="gender">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Have you donated before?</legend>
                            <div class="col-sm-10 col-xl-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="donation" id="donated" value="Yes"  <?php if($donated == 'Yes'){ echo 'checked'; }?> >
                                    <label class="form-check-label" for="donated">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="donation" id="donated" value="No"  <?php if($donated == 'No'){ echo 'checked'; }?> >
                                    <label class="form-check-label" for="donated">
                                        No
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="last_donated" class="col-sm-2 col-form-label">Last donated</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="date" class="form-control" id="last donated" name="last_donate" value="<?php echo $last_Donate; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="note" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="text" class="form-control" id="note" name="note" value="<?php  echo $note; ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 pt-3">
                                <select class="form-select form-select-sm " aria-label=".form-select-sm example" name="options" required>
                                    <option value="" disabled> --Select Blood Group--</option>
                                    <option value="A+" <?php if($blood_grp == '24 hrs'){ echo 'selected'; }?> >A+</option>
                                    <option value="A-" <?php if($blood_grp == '24 hrs'){ echo 'selected'; }?> >A-</option>
                                    <option value="B+" <?php if($blood_grp == '24 hrs'){ echo 'selected'; }?> >B+</option>
                                    <option value="B-" <?php if($blood_grp == '24 hrs'){ echo 'selected'; }?> >B-</option>
                                    <option value="AB+" <?php if($blood_grp == '24 hrs'){ echo 'selected'; }?> >AB+</option>
                                    <option value="AB-" <?php if($blood_grp == '24 hrs'){ echo 'selected'; }?> >AB-</option>
                                    <option value="O+" <?php if($blood_grp == '24 hrs'){ echo 'selected'; }?> >O+</option>
                                    <option value="O-" <?php if($blood_grp == '24 hrs'){ echo 'selected'; }?> >O-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 py-3">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="city" required>
                                    <option value="" disabled selected> --Select City--</option>
                                    <?php
                                        $sql = "SELECT * FROM `cities`";
                                        $result = mysqli_query($co, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $cityName = $row['cityName'];
                                        ?>
                                                <option value="<?php echo $cityName; ?>" <?php if($cityName == $city){ echo 'selected'; }?> ><?php echo $cityName; ?></option>
                                        <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php
                                }
                            }
                        }
                        ?>
                        <a href="tbl-donors.php" class="btn btn-danger">Cancel</a>
                        <button type="submit" name="update-data" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->



    <?php include('includes/footer.php'); ?>
    <?php include('includes/scripts.php'); ?>