<?php
    include ("hukumpak_db_conn.php");

    $loginID = $_POST['LogiID'];

    $sql = "SELECT * FROM user_business WHERE user_id = $loginID";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Success";
    } else {
        echo "Error";
    }

?>