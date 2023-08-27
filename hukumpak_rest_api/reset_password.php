<?php
    include ("hukumpak_db_conn.php");

    $OTP = $_POST['OTP'];
    $EMAIL = $_POST['EMAIL'];
    $PASSWORD = $_POST['PASSWORD'];

   
    $update = "UPDATE auth_user SET `password` = $PASSWORD WHERE `email` = '$EMAIL' AND `OTP` = $OTP";
    if (mysqli_query($conn, $update)) {
        //include ("forget_password_email.php");
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($conn); ; 
    }

    mysqli_close($conn);
?>