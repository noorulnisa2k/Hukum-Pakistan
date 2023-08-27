<?php
    include ("hukumpak_db_conn.php");

    if(isset($_POST['EMAIL'])){
        $EMAIL = $_POST['EMAIL'];
        //echo $_POST['EMAIL'];
    }
    

    function valid_email($str) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    
    }

    $otp = rand(pow(10, 4-1), pow(10, 4)-1);

    if( !valid_email($EMAIL)){
        echo "Invalid Email Address";
        return;
    }
    $update = "UPDATE auth_user SET `OTP` = $otp WHERE `email` = '$EMAIL'";
    if (mysqli_query($conn, $update)) {
        include ("forget_password_email.php");
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($conn); ; 
    }

    mysqli_close($conn);
?>