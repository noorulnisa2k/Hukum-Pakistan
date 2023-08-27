<?php

    include ("hukumpak_db_conn.php");
    $user_id = $_POST['user_id'];
    $OTP = $_POST['OTP'];

    $sql = "SELECT OTP FROM auth_user WHERE id = $user_id";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       // output data of each row
        $row = mysqli_fetch_assoc($result);
        //echo "Post OTP: " . $OTP . " Select OTP: " . $row['OTP'];
        if($OTP == $row['OTP']){
            $update = "UPDATE auth_user SET email_verified = 1 
            WHERE id = $user_id";

            if (mysqli_query($conn, $update)) {
                echo "Success";
            } else {
                echo "Failed";
            }
        }else{
            echo "Failed";
        }
        
    } else {
        echo "Error";
    }

    

    mysqli_close($conn);
?>