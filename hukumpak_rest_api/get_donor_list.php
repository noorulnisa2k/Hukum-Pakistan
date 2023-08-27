<?php
    include ("hukumpak_db_conn.php");

    $patientID = $_POST['patientID'];
    //$patientID = 2;

    $sql = "SELECT blood_grp, city FROM hukumpakistanapp_patient WHERE user_id = $patientID AND isSettled = 'N'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $blood_grp = $row['blood_grp'];
            $city = $row['city'];

            $sqlDonor = "SELECT * FROM hukumpakistanapp_donor WHERE blood_grp = RTRIM('" . $blood_grp . "') AND city = RTRIM('" . $city . "') AND active = 'Y'";
            $result2 = mysqli_query($conn, $sqlDonor);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
                while($row2 = mysqli_fetch_assoc($result2)) {
                    $myArray[] = $row2;
                }
                echo json_encode($myArray);
            } else {
                echo "Error";
            }
        }
        
        
    } else {
        echo "Error";
    }

?>


