<?php include('auth.php'); ?>
<?php include("connection.php"); ?>
<?php
$showError = false;
// Donor Form

if (isset($_POST['donor'])) {
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


            $sql = "INSERT INTO `hukumpakistanapp_donor` (user_id, `name`, `email`, `contact_number`, `age`, `blood_grp`, `gender`, `city`, `date_time`, `donated`, `last_Donate`, `Note`) 
          VALUES ('$user_id', '$name', '$email', '$phone', '$age', '$options', '$gender', '$city', current_timestamp(), '$donation', '$last_donate', '$note')";
            $result = mysqli_query($co, $sql);
            if ($result) {
                $_SESSION['success']= "Donor data Successfully added!";
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
<?php $title = "Add Donor"; ?>
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
                    <h6 class="mb-4">Add Donor</h6>
                    <form action="add-donor.php" method="post">
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($_POST['donor'])) {
                                                                                                            echo $name;
                                                                                                        } ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($_POST['donor'])) {
                                                                                                            echo $email;
                                                                                                        } ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="contact_number" class="col-sm-2 col-form-label">Contact Number</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="tel" pattern="[0-9]{11}" placeholder="03XXXXXXXXX" class="form-control" id="contact_number" name="phone" value="<?php if (isset($_POST['donor'])) {
                                                                                                                                                                    echo $phone;
                                                                                                                                                                } ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="age" class="col-sm-2 col-form-label">Age</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="number" class="form-control" id="age" name="age" value="<?php if (isset($_POST['donor'])) {
                                                                                                            echo $age;
                                                                                                        } ?>" required>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                            <div class="col-sm-10 col-xl-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" checked>
                                    <label class="form-check-label" for="gender">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
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
                                    <input class="form-check-input" type="radio" name="donation" id="donated" value="Yes" checked>
                                    <label class="form-check-label" for="donated">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="donation" id="donated" value="No">
                                    <label class="form-check-label" for="donated">
                                        No
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="last_donated" class="col-sm-2 col-form-label">Last donated</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="date" class="form-control" id="last donated" name="last_donate" value="<?php if (isset($_POST['donor'])) {
                                                                                                                        echo $last_donate;
                                                                                                                    } ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="note" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10 col-xl-6">
                                <input type="text" class="form-control" id="note" name="note" value="<?php if (isset($_POST['donor'])) {
                                                                                                            echo $note;
                                                                                                        } ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 pt-3">
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
                                                <option value="<?php echo $cityName; ?>" ><?php echo $cityName; ?></option>
                                        <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="donor">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->



    <?php include('includes/footer.php'); ?>
    <?php include('includes/scripts.php'); ?>