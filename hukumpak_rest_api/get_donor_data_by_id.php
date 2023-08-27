<?php
    include ("hukumpak_db_conn.php");

    $donorID = $_POST['donorID'];
   

    $sql = "SELECT * FROM hukumpakistanapp_donor WHERE id = $donorID";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $myArray = $row;
        }
        //$output = json_encode($myArray);
        echo json_encode($myArray);
    } else {
        echo "0 results";
    }

?>