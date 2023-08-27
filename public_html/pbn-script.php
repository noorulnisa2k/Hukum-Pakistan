<?php

session_start();
include('conn.php');

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    // echo $user_id;

    $sql_count = "SELECT * FROM hukumpakistanapp_patient INNER JOIN request_tbl ON hukumpakistanapp_patient.user_id = request_tbl.sender_pk_id WHERE hukumpakistanapp_patient.user_id = $user_id AND request_tbl.d_endorsement='Donated' AND request_tbl.p_endorsement='Donated'";
    if ($res_count = mysqli_query($co, $sql_count)) {
        $rowcount = mysqli_num_rows($res_count);
        if ($rowcount >= 3) {

            $sql = "SELECT * FROM hukumpakistanapp_donor INNER JOIN request_tbl ON hukumpakistanapp_donor.user_id = request_tbl.sender_pk_id WHERE hukumpakistanapp_patient.user_id = $user_id AND request_tbl.d_endorsement='Donated' AND request_tbl.p_endorsement='Donated'";
            if ($verify = mysqli_query($co, $sql)) {
                $rowcount = mysqli_num_rows($verify);
                if ($rowcount > 0) {
                    // echo "you have donated blood you can now submit patient form";
                    echo "success";
                } else {
                    // echo $rowcount . " your have reached your limit , now first Regester as a donor";
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> Your have reached your limit, now first you need to regester as a donor. </strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                }
            }
        } else {
            // echo "you can submit patient form, you didn't reached your limit ";
            echo "success";
        }
    }
}
