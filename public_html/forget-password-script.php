<?php
session_start();
include('conn.php');

if (isset($_POST['Submit'])){
		
    $email = mysqli_real_escape_string($co,$_POST['Email']);  
    $otp = rand(pow(10, 4-1), pow(10, 4)-1); 

    $query = "SELECT * FROM `auth_user` WHERE email='$email' and email_verified= 1 ";
    $result = mysqli_query($co,$query);
    $rows = mysqli_num_rows($result);
    
    if($rows==1){
        $update = "UPDATE auth_user SET `OTP` = $otp WHERE `email` = '$email'";
        if (mysqli_query($co, $update)) {
            include ("forget_password_email.php");
            echo "Success";
            $_SESSION['success'] = "Your requests has been accepted. Please check you email!";
            header('Location: forget-password.php'); 
        } else {
            echo "Error: " . mysqli_error($co); ; 
        }  
    }else{
        $_SESSION['status'] = "We can't find a user with that email address.";
        header('Location: forget-password.php');

        }
}

?>