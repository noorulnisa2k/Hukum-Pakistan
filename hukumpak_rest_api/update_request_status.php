<?php
    include ("hukumpak_db_conn.php");
    
    $donorID = $_POST['donorID'];
    //$donorID = 10;

    $sql = "UPDATE request_tbl
    SET status = 1
    WHERE requested_to_pk_id = $donorID
    AND req_type = 'BLOOD_DONATION'";
    //$sql = "SELECT * FROM hukumpakistanapp_donor";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo "Success";
    } else {
        echo "Error";
    }
?>