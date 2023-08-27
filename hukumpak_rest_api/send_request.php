<?php
    include ("hukumpak_db_conn.php");
    
    $patient_pk_id = $_POST['login_user_id'];
    $doner_pk_id = $_POST['donor_pk_id'];
    $request_type = $_POST['request_type'];
    
    $resCount = mysqli_query($conn, "SELECT count(*) as total from request_tbl WHERE sender_pk_id = $patient_pk_id AND request_status = 'N' AND requested_to_pk_id != $doner_pk_id");
    $rox = mysqli_fetch_assoc($resCount);
    $count = $rox['total'];
    if($count >= 3){
        echo "Request limit exceeded, you can only send 3 request.";
    }else{

        $sql = "INSERT INTO request_tbl(sender_pk_id, requested_to_pk_id, req_type, status, request_status) 
        VALUES ($patient_pk_id, $doner_pk_id, '$request_type' , 0, 'N')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Success";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
    mysqli_close($conn);
?>