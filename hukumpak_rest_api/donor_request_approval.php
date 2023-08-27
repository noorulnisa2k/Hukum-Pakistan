<?php
    include ("hukumpak_db_conn.php");

    $APPROVAL = $_POST['APPROVAL'];
    $REQ_ID = $_POST['REQ_ID'];
    $PATIENT_ID = $_POST['PATIENT_ID'];

    // $APPROVAL = 'Y';
    // $REQ_ID = 11;
    // $PATIENT_ID = 51;

    $status = 0;
    if($APPROVAL == 'Y'){
        $status = 1;
    }
    

    $sql_req = "UPDATE request_tbl SET status = $status, request_status= '$APPROVAL', d_endorsement='ACCEPTED'
    WHERE req_id = $REQ_ID";

    if (mysqli_query($conn, $sql_req)) {
        echo "Success";
    } else {
        echo "Error: " . $sql_req . "<br>" . mysqli_error($conn);
    }

?>  