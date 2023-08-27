<?php
    include ("hukumpak_db_conn.php");

    $APPROVAL = $_POST['APPROVAL'];
    $REQ_ID = $_POST['REQ_ID'];
    $PATIENT_ID = $_POST['PATIENT_ID'];
    $DONOR_ID = $_POST['DONOR_ID'];

    // $APPROVAL = 'N';
    // $REQ_ID = 1;
    // $PATIENT_ID = 6;
    // $DONOR_ID = 2;

    $sql_req;
    if($APPROVAL == 'Y'){
        $sql_req = "UPDATE request_tbl, hukumpakistanapp_patient, hukumpakistanapp_donor
        SET request_tbl.p_endorsement = 'APPROVED',
        hukumpakistanapp_patient.isSettled = 'Y',
        hukumpakistanapp_donor.donated = 'Yes',
        hukumpakistanapp_donor.last_Donate = curDate(),
        hukumpakistanapp_donor.active = 'N',
        hukumpakistanapp_donor.donation_count = hukumpakistanapp_donor.donation_count + 1
        WHERE request_tbl.req_id = $REQ_ID
        AND hukumpakistanapp_patient.user_id = $PATIENT_ID
        AND hukumpakistanapp_donor.user_id = $DONOR_ID";
    }else{
        $sql_req = "UPDATE request_tbl, hukumpakistanapp_patient
        SET request_tbl.p_endorsement = 'REJECTED',
        hukumpakistanapp_patient.isSettled = 'Y'
        WHERE request_tbl.req_id = $REQ_ID
        AND hukumpakistanapp_patient.user_id = $PATIENT_ID";
    }

    if (mysqli_query($conn, $sql_req)) {
        echo "Success";
    } else {
        echo "Error: " . $sql_req . "<br>" . mysqli_error($conn);
    }

?>  