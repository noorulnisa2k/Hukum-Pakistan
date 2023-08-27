<?php
    include ("hukumpak_db_conn.php");
    $sqlDonor = "SELECT * FROM hukumpakistanapp_donor WHERE active = 'N'";
    $result2 = mysqli_query($conn, $sqlDonor);

    if (mysqli_num_rows($result2) > 0) {
    // output data of each row
        while($row2 = mysqli_fetch_assoc($result2)) {    
            $donated = $row2['donated'];
            $lastDonateDate = $row2['last_Donate'];  

            $date1=date_create(date("Y-m-d"));
            $date2=date_create($lastDonateDate);
            $diff=date_diff($date1,$date2)->format("%a");
            
            if ( !( $donated == 'Yes' && intval($diff) <90 ) ){
                $sql_req = "UPDATE hukumpakistanapp_donor SET active = 'Y'";
            
                if (mysqli_query($conn, $sql_req)) {
                    echo "Success";
                } else {
                    echo "Error: " . $sql_req . "<br>" . mysqli_error($conn);
                }
            }
        }
    } else {
        echo "Error";
    }
?>