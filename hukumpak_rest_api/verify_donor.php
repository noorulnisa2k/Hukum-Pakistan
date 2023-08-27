<?php
    include ("hukumpak_db_conn.php");

    $loginID = $_POST['LogiID'];
    //$loginID = 10;

    $sql = "SELECT * FROM hukumpakistanapp_donor WHERE user_id = $loginID";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Success";
    } else {
        echo "Error";
    }

?>