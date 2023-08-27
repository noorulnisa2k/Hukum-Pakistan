<?php include('auth.php'); ?>
<?php include("connection.php"); ?>
<?php
$showError = false;

// Patient Form
if (isset($_POST['update-data'])) {
    $id = mysqli_real_escape_string($co, $_POST['id']);
    $img = mysqli_real_escape_string($co, $_POST['img']);
    $name = mysqli_real_escape_string($co, $_POST['name']);
    $email = mysqli_real_escape_string($co, $_POST['email']);
    $phone = mysqli_real_escape_string($co, $_POST['phone']);
    $options = mysqli_real_escape_string($co, $_POST['options']);
    $quantity = mysqli_real_escape_string($co, $_POST['quantity']);
    $city = mysqli_real_escape_string($co, $_POST['city']);
    $hospital_name = mysqli_real_escape_string($co, $_POST['hospital_name']);
    $urgency = mysqli_real_escape_string($co, $_POST['urgency']);
    $transport = mysqli_real_escape_string($co, $_POST['transport']);
    $doctor_name = mysqli_real_escape_string($co, $_POST['doctor_name']);
    $note = mysqli_real_escape_string($co, $_POST['note']);
    $existSql = "SELECT * FROM `auth_user` WHERE email = '$email'";
    $result = mysqli_query($co, $existSql);
    $numExistRows = mysqli_num_rows($result);

    if ($numExistRows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row["id"];

            $sql = "UPDATE `hukumpakistanapp_patient` SET `user_id`='$user_id',`picture`='$img',`name`='$name',`email`='$email',`contact_number`='$phone',`blood_grp`='$options',`quantity`='1',`city`='$city',`hospital_name`='$hospital_name',`urgency`='$urgency',`doctor_name`='$doctor_name',`transportation`='$transport',`note`='$note',`isSettled`='N' WHERE id='$id' ";
            $result = mysqli_query($co, $sql);
            if ($result) {
                $_SESSION['success']= "Patient: <b>".$email."</b> Successfully Updated!";
                header('Location: tbl-patients.php');
            } else {
                $showError = 'Something went wrong you are not added, Try again';
                echo "Error: " . $sql . "<br>" . mysqli_error($co);
            }
        }
    } else {
        $showError = "This email address is not registered";
    }
}
?>
<?php $title = "Edit Patient data"; ?>
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
                    <h6 class="mb-4">Edit Patient data</h6>
                    <form action="edit-patient.php" method="post">
                    <?php
                        if (isset($_POST['edit_btn'])) {
                            $edit_id = $_POST['edit_id'];
                            $sql = "SELECT * FROM `hukumpakistanapp_patient` WHERE id='$edit_id' ";
                            $result = mysqli_query($co, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["id"];
                                    $user_id = $row["user_id"];
                                    $picture = $row["picture"];
                                    $name = $row["name"];
                                    $email = $row["email"];
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
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $edit_id; ?>" required>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded ">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Patient Image</label>
                                    <input class="form-control" type="file" id="formFile" name="img" accept=".jpg,.png" >
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Patient Name</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="text" class="form-control" id="name" name="name" value="<?php  echo $name;  ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="email" class="form-control" id="email" name="email" value="<?php  echo $email;?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="contact_number" class="col-sm-2 col-form-label">Contact Number</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="tel" pattern="[0-9]{11}" placeholder="03XXXXXXXXX" class="form-control" id="contact_number" name="phone" value="<?php echo $contact_number; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="age" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $quantity; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="hospital_name" class="col-sm-2 col-form-label">Hospital Name</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="text" class="form-control" id="quantity" name="hospital_name" value="<?php echo $hospital_name; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="doctor_name" class="col-sm-2 col-form-label">Recommonded by which Doctor?</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="<?php echo $doctor_name; ?>" required>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Will you provide transportation?</legend>
                            <div class="col-sm-10 col-xl-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="transport" value="self" name="transport" <?php if($transportation == 'self'){ echo 'checked'; }?> >
                                    <label class="form-check-label" for="transport">
                                        Self pick & drop
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transport" id="transport" value="compensation" <?php if($transportation == 'compensation'){ echo 'checked'; }?> >
                                    <label class="form-check-label" for="transport">
                                        Compensation
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transport" id="transport" value="no" <?php if($transportation == 'no'){ echo 'checked'; }?> >
                                    <label class="form-check-label" for="transport">
                                        No
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="note" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="text" class="form-control" id="note" name="note" value="<?php echo $note; ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded p-2">
                                <select class="form-select form-select-sm " aria-label=".form-select-sm example" name="urgency"  required>
                                    <option value="" disabled > Urgency</option>
                                    <option value="2 hrs" <?php if($urgency == '2 hrs'){ echo 'selected'; }?> >within 2 Hours</option>
                                    <option value="6 hrs" <?php if($urgency == '6 hrs'){ echo 'selected'; }?> >within 6 Hours</option>
                                    <option value="12 hrs" <?php if($urgency == '12 hrs'){ echo 'selected'; }?> >within 12 Hours</option>
                                    <option value="24 hrs" <?php if($urgency == '24 hrs'){ echo 'selected'; }?> >within 24 Hours</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded p-2">
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
                            <div class="bg-light rounded p-2">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="city" required>
                                    <option value="" disabled> --Select City--</option>
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
                        <a href="tbl-patients.php" class="btn btn-danger">Cancel</a>
                        <button type="submit" name="update-data" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->


    <?php include('includes/footer.php'); ?>
    <?php include('includes/scripts.php'); ?>