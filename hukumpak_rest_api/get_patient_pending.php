<?php
    include ("hukumpak_db_conn.php");

    //$PATIENT_ID = $_POST['USER_ID'];
    $PATIENT_ID = 6;

    $sql = "SELECT *
    FROM request_tbl rt
    INNER JOIN hukumpakistanapp_donor dn
    ON dn.user_id = rt.requested_to_pk_id
    WHERE rt.sender_pk_id = $PATIENT_ID
    AND rt.req_type = 'BLOOD_DONATION'
    AND rt.status = 0
    AND rt.d_endorsement != 'PENDING'";
    
    

    /*
        SELECT *
        FROM request_tbl rt
        INNER JOIN hukumpakistanapp_donor dn
        ON dn.user_id = rt.requested_to_pk_id
        WHERE rt.sender_pk_id = $PATIENT_ID
        AND rt.req_type = 'BLOOD_DONATION'
        AND rt.status = 0
        AND rt.d_endorsement != 'PENDING'   //  Add this line in query after testing
        
        
        SELECT *
        FROM request_tbl
        WHERE sender_pk_id = $PATIENT_ID
        AND req_type = 'BLOOD_DONATION'
        AND status = 0

        $sql = "SELECT * FROM hukumpakistanapp_donor";
    */

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