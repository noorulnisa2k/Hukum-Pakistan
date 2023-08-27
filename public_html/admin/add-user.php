<?php include('auth.php'); ?>
<?php include("connection.php"); ?>
<?php
date_default_timezone_set("Asia/Karachi");
$showError = false;
if (isset($_POST['Submit'])) {
    $firstname = mysqli_real_escape_string($co, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($co, $_POST['lastname']);
    $username = $firstname."_". $lastname;
    $email = mysqli_real_escape_string($co, $_POST['email']);
    $password = mysqli_real_escape_string($co, $_POST['password']);
    $cpassword = mysqli_real_escape_string($co, $_POST['cpassword']);
    $is_superuser = mysqli_real_escape_string($co, $_POST['is_superuser']);
    $otp = rand(pow(10, 4 - 1), pow(10, 4) - 1);

    if (!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password)) {
        $existSql = "SELECT * FROM `auth_user` WHERE email = '$email'";
        $result = mysqli_query($co, $existSql);
        $numExistRows = mysqli_num_rows($result);


        if ($numExistRows > 0) {
            $showError = "User already Exists" . $code;
            //   echo "Error: " . $sql . "<br>" . mysqli_error($co);
        } else {
            if (($password == $cpassword)) {
                $sql = "INSERT INTO `auth_user` (`first_name`, `last_name`, `username`, `email`, `password`, `OTP`, `email_verified`, `is_superuser`, `date_joined`) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$otp', 1, '$is_superuser', current_timestamp())";
                $result = mysqli_query($co, $sql);
                if ($result) {
                    $_SESSION['success']= "User Successfully added!";
                    header('Location: tbl-users.php');
                } else {
                    $showError = "Something went wrong. User is not added";
                    echo "Error: " . $sql . "<br>" . mysqli_error($co);
                }
            } else {

                $showError = "Password doesn't match";
                // echo "Error: " . $sql . "<br>" . mysqli_error($co);
            }
        }
    }
}
?>
<?php $title = "Add Users"; ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<!-- Content Start -->
<div class="content">
    <?php include('includes/nav.php'); ?>

    <!-- Error Alert start -->
    <?php if ($showError) { ?>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="rounded h-100 ">
                        <div class="alert alert-danger" role="alert">
                            <?php echo $showError; ?>
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
                    <h6 class="mb-4">Add User</h6>
                    <form action="add-user.php" method="post">
                        <div class="row mb-3">
                            <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="first_name" name="firstname" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="last_name" name="lastname" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Comfirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="cpassword" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Is Super User</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck1" name="is_superuser" value="1" >
                                    <label class="form-check-label" for="gridCheck1">
                                        is Super User
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="Submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->


    <?php include('includes/footer.php'); ?>
    <?php include('includes/scripts.php'); ?>