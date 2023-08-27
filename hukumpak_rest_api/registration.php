<?php
    include ("hukumpak_db_conn.php");

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    date_default_timezone_set("Asia/Karachi");
    $date_joined = date("Y-m-d H:i:s");
    
    $otp = rand(pow(10, 4-1), pow(10, 4)-1);

    $sql = "INSERT INTO auth_user(email, password, username, first_name, last_name, OTP, date_joined)  
    VALUES ('$email', '$password', '$user_name', '$first_name', '$last_name','$otp', '$date_joined')";

    if (mysqli_query($conn, $sql)) {
        $user_id = mysqli_insert_id($conn);
        include ("email_verification.php");
        echo $user_id;
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    
?>