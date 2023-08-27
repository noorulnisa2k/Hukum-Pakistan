<?php
session_start();
include('conn.php');

$otp = mysqli_real_escape_string($co, $_POST['otp']);
$email = mysqli_real_escape_string($co, $_POST['email']);
$password = mysqli_real_escape_string($co, $_POST['password']);
$cPassword = mysqli_real_escape_string($co, $_POST['cPassword']);

if ($password != '' && $cPassword != '') {
    if ($password == $cPassword) {
        $update = "UPDATE auth_user SET `password` = '$password' WHERE `email` = '$email' AND `OTP` = $otp";
        if (mysqli_query($co, $update)) {
            echo 'success';
        } else {
            echo "Error: " . mysqli_error($co);;
        }
    } else {
        $msg = "<i class='bi bi-exclamation-circle'></i> Password doesn't match.";
        echo $msg;
    }
}
else{
    echo "<i class='bi bi-exclamation-circle'></i> Fields are required.";
}
