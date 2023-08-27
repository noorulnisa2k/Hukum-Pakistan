<?php
    include ("hukumpak_db_conn.php");

    $sql = "SELECT * FROM cities WHERE lbsActive = 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $myArray[] = $row;
        }
        echo json_encode($myArray);
    } else {
        echo "Error";
    }
    
    mysqli_close($conn);
    
?>