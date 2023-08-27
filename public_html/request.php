<?php
session_start();
    require('conn.php');
    
    $showAlert = false;
    $showError = false;
    
    if (isset($_POST['request'])){
        $id = $_SESSION['user_id'];
        $donor_ID = $_POST['id'];
        
            $resCount = mysqli_query($co, "SELECT count(*) as total from request_tbl WHERE sender_pk_id = $id AND request_status = 'N'");
            $rox = mysqli_fetch_assoc($resCount);
            $count = $rox['total'];
            if($count == 3 || $count >= 3){
                $showError = "Request limit exceeded, you can only send 3 request.";
            }else{
        
                // data insert into request table
                $sql = "INSERT INTO `request_tbl` (`sender_pk_id`, `requested_to_pk_id`, `req_type`, `status`, `request_status`, `requested_on`) VALUES ('$id', '$donor_ID', 'BLOOD_DONATION', '1', 'N', current_timestamp());";
                    $result = mysqli_query($co, $sql);
                    if($result){
                      $showAlert = true;
                    }
                    else{
                        echo "Error: " . $sql . "<br>" . mysqli_error($co);
                        $showError = "Request not sent, Try again";
                    }
            }
    }
    // SELECT * FROM request_tbl RT INNER JOIN auth_user AU ON RT.sender_pk_id=AU.id WHERE RT.requested_to_pk_id = 39 AND RT.status = '1'
?>