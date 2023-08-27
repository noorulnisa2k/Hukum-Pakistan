<?php
    include ("hukumpak_db_conn.php");
    $patientIDs = $_POST['patientIDs'];
    //$patientIDs = '[{"sender_id":"51"}]';

    $arr = json_decode($patientIDs);
    foreach($arr as $key=>$value){
      //echo $value->sender_id;

        //$sql = "SELECT * FROM hukumpakistanapp_patient WHERE user_id = $value->sender_id AND isSettled = 'N'";
        $sql = "SELECT pt.*, rt.req_id 
        FROM hukumpakistanapp_patient pt
        INNER JOIN request_tbl rt
        ON rt.sender_pk_id = pt.user_id
        WHERE pt.user_id = $value->sender_id 
        AND pt.isSettled = 'N'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $myArray[] = $row;
            }
            $output = json_encode($myArray);
            
        } else {
            echo "Error";
        }
    }
    
    echo $output;
?>