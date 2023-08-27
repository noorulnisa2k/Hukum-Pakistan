<?php include_once('conn.php');
session_start();
    $showAlert = "";
    if (isset($_GET['verification'])){
        $otp = $_GET['verification'];
        $update = "UPDATE auth_user SET email_verified = 1 WHERE otp = '$otp' ";
        if (mysqli_query($co, $update)) {
                    echo "Success";
                    $_SESSION['msg'] = "You are successfuly registered, please login";
                    header("Location: login.php");
                } else {
                    echo "Failed to update";
                    header("Location: sign_up.php");
                }
    }
    

    

    mysqli_close($conn);
?>