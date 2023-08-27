<?php
    include ("hukumpak_db_conn.php");

    $email = $_POST['EMAIL'];
    $password = $_POST['PASSWORD'];


    $sql = "SELECT * FROM `auth_user` 
    WHERE `email` = '$email' 
    AND `password` = '$password'
    AND `email_verified` = 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $myArray = $row;
        }

        echo json_encode($myArray);
    } else {
        echo "Error";
    }

?>