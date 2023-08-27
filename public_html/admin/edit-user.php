<?php include('auth.php'); ?>
<?php include("connection.php"); ?>
<?php
date_default_timezone_set("Asia/Karachi");
$showError = false;
if (isset($_POST['update-data'])) {
    $id = mysqli_real_escape_string($co, $_POST['id']);
    $firstname = mysqli_real_escape_string($co, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($co, $_POST['lastname']);
    $username = $firstname . "_" . $lastname;
    $email = mysqli_real_escape_string($co, $_POST['email']);
    $password = mysqli_real_escape_string($co, $_POST['password']);
    $is_superuser = mysqli_real_escape_string($co, $_POST['is_superuser']);
    $otp = rand(pow(10, 4 - 1), pow(10, 4) - 1);

    $sql = "UPDATE `auth_user` SET `email`='$email',`password`='$password',`username`='$username',`first_name`='$firstname',`last_name`='$lastname',`is_active`=1,`is_superuser`='$is_superuser',`OTP`='$otp',`email_verified`=1 WHERE id = '$id' ";
    $result = mysqli_query($co, $sql);
    if ($result) {
        $_SESSION['success']= "User <b>".$email."</b> Successfully Updated!";
        header('Location: tbl-users.php');
    } else {
        $showError = "Something went wrong";
        echo "Error: " . $sql . "<br>" . mysqli_error($co);
    }
            
}
?>
<?php $title = "Edit User"; ?>
<?php include('includes/header.php'); ?>
<?php 
include('includes/sidebar.php'); 
?>

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
                    <h6 class="mb-4">Edit User Data</h6>
                    <form action="edit-user.php" method="post">
                        <?php
                        if (isset($_POST['edit_btn'])) {
                            $edit_id = $_POST['edit_id'];
                            $sql = "SELECT * FROM `auth_user` WHERE id='$edit_id' ";
                            $result = mysqli_query($co, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["id"];
                                    $first_name = $row["first_name"];
                                    $last_name = $row["last_name"];
                                    $username = $row["username"];
                                    $email = $row["email"];
                                    $super_user = $row['is_superuser'];
                                    $password = $row['password'];
                                    $status = $row['is_active'];
                        ?>
                        
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $edit_id; ?>" required>
                                    <div class="row mb-3">
                                        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="first_name" name="firstname" value="<?php echo $first_name; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="last_name" name="lastname" value="<?php echo $last_name; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Is Super User</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gridCheck1" name="is_superuser" value="1" <?php if($super_user == '1'){ echo 'checked'; }?>>
                                                <label class="form-check-label" for="gridCheck1">
                                                    is Super User
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        }
                        ?>
                        <a href="tbl-users.php" class="btn btn-danger">Cancel</a>
                        <button type="submit" name="update-data" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->


    <?php include('includes/footer.php'); ?>
    <?php include('includes/scripts.php'); ?>