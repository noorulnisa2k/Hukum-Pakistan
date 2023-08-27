<?php include('auth.php'); ?>
<?php include("connection.php"); ?>
<?php
$showError = false;

// Patient Form
if (isset($_POST['patient'])) {
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

            $sql = "INSERT INTO `hukumpakistanapp_patient` (`user_id`, `picture`, `name`, `email`, `contact_number`, `blood_grp`, `quantity`, `city`, `hospital_name`, `urgency`, `doctor_name`, `transportation`, `note`, `timestamp`, `isSettled`)  VALUES ('$user_id', '$img', '$name', '$email', '$phone', '$options', '1', '$city', '$hospital_name', '$urgency', '$doctor_name', '$transport', '$note', current_timestamp(), 'N')";
            $result = mysqli_query($co, $sql);
            if ($result) {
                $_SESSION['success']= "Patient data Successfully added!";
                header('Location: tbl-patients.php');
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
<?php $title = "Add Patient"; ?>
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
                    <h6 class="mb-4">Add Patient</h6>
                    <form action="add-patient.php" method="post">
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
                                <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($_POST['patient'])) {
                                                                                                            echo $name;
                                                                                                        } ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($_POST['patient'])) {
                                                                                                            echo $email;
                                                                                                        } ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="contact_number" class="col-sm-2 col-form-label">Contact Number</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="tel" pattern="[0-9]{11}" placeholder="03XXXXXXXXX" class="form-control" id="contact_number" name="phone" value="<?php if (isset($_POST['patient'])) {
                                                                                                                                                                    echo $phone;
                                                                                                                                                                } ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="age" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="number" class="form-control" id="quantity" name="quantity" value="<?php if (isset($_POST['patient'])) {
                                                                                                                    echo $quantity;
                                                                                                                } ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="hospital_name" class="col-sm-2 col-form-label">Hospital Name</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="text" class="form-control" id="quantity" name="hospital_name" value="<?php if (isset($_POST['patient'])) {
                                                                                                                        echo $hospital_name;
                                                                                                                    } ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="doctor_name" class="col-sm-2 col-form-label">Recommonded by which Doctor?</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="<?php if (isset($_POST['patient'])) {
                                                                                                                        echo $doctor_name;
                                                                                                                    } ?>" required>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Will you provide transportation?</legend>
                            <div class="col-sm-10 col-xl-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="transport" value="self" name="transport" checked>
                                    <label class="form-check-label" for="transport">
                                        Self pick & drop
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transport" id="transport" value="compensation">
                                    <label class="form-check-label" for="transport">
                                        Compensation
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transport" id="transport" value="no">
                                    <label class="form-check-label" for="transport">
                                        No
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="note" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="text" class="form-control" id="note" name="note" value="<?php if (isset($_POST['patient'])) {
                                                                                                            echo $note;
                                                                                                        } ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded p-2">
                                <select class="form-select form-select-sm " aria-label=".form-select-sm example" name="urgency" value="<?php if (isset($_POST['patient'])) {
                                                                                                                                            echo $urgency;
                                                                                                                                        } ?>" required>
                                    <option value="" disabled selected> Urgency</option>
                                    <option value="2 hrs">within 2 Hours</option>
                                    <option value="6 hrs">within 6 Hours</option>
                                    <option value="12 hrs">within 12 Hours</option>
                                    <option value="24 hrs">within 24 Hours</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded p-2">
                                <select class="form-select form-select-sm " aria-label=".form-select-sm example" name="options" required>
                                    <option value="" disabled selected> --Select Blood Group--</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded p-2">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="city" required>
                                    <option value="" disabled selected> --Select City--</option>
                                    <?php
                                        $sql = "SELECT * FROM `cities`";
                                        $result = mysqli_query($co, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $cityName = $row['cityName'];
                                        ?>
                                                <option value="<?php echo $cityName; ?>" ><?php echo $cityName; ?></option>
                                        <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="patient">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->


    <?php include('includes/footer.php'); ?>
    <?php include('includes/scripts.php'); ?>