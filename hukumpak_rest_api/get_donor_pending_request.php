<?php
    include ("hukumpak_db_conn.php");
    
    $donorID = $_POST['donorID'];
    //$donorID = 51;

    $sql = "SELECT *
    FROM request_tbl
    WHERE requested_to_pk_id = $donorID
    AND sender_pk_id != $donorID
    AND req_type = 'BLOOD_DONATION'
    AND status = 0";
    //$sql = "SELECT * FROM hukumpakistanapp_donor";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $myArray[] = $row;
        }
        //$output = json_encode($myArray);
        echo json_encode($myArray);
    } else {
        echo "Error";
    }
?>