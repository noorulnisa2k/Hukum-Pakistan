<?php
session_start();
include("connection.php");
$showError = "";
if (isset($_SESSION["admin_loggedin"])) {
    header("Location: index.php");
    exit();
}
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "Select * from auth_user where email='$email' AND password = '$password' AND is_superuser=1";
    $result = mysqli_query($co, $sql);
    $num = mysqli_num_rows($result);
    $data = mysqli_fetch_array($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['admin_loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['firstname'] = $data["first_name"];
        header("location: index.php");
    } else {
        $showError = "<strong>Invalid Credentials</strong>\n only admin can login";
    }
}
?>
<?php $title = "Admin Login"; ?>
<?php include('includes/header.php'); ?>

<!-- Sign In Start -->
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="/" class="">
                        <img src="img/logo.png" alt="Hukum Pakistan" title="Hukum Pakistan" style="height:80px;" />
                    </a>
                    <h3>Sign In</h3>
                </div>
                <?php
                if ($showError) {
                    echo '
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ' . $showError . '
                            </div>';
                }
                ?>
                <form action="signin.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="<?php if (isset($_POST['signin'])) { echo $email;  } ?>" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" value="<?php if (isset($_POST['signin'])) { echo $password;  } ?>" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <!-- <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->
                        <a href="">Forgot Password</a>
                    </div>
                    <button type="submit" name="signin" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                    <!-- <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p> -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Sign In End -->
</div>

<?php include('includes/scripts.php'); ?>