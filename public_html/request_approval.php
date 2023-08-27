<?php
session_start();
require('conn.php');
$userid = $_SESSION['user_id'];

$showError = false;
$showAlert = false;
$showRejected = false;

$status = "";

if(isset($_POST['req_id']) && isset($_POST['action_perform'])){
    $req_id = $_POST["req_id"];
    $Action = $_POST["action_perform"];
    $sender_id = $_POST["sender"];
    
    if($Action == "Y"){
        $status = "2";
    }else{
        $status = "0";
    }
    
$sql = "UPDATE request_tbl SET status='".$status."', request_status= '".$Action."' WHERE req_id = $req_id";
if (mysqli_query($co, $sql)) {
    if($Action == "Y"){
        $sqlc = "UPDATE request_tbl SET status='4', request_status= 'T' WHERE sender_pk_id = $sender_id AND request_status = 'N'";
        if (mysqli_query($co, $sqlc)) {
        }else{
        }
        $showAlert ="Request Accepted Successfully";
    }else{
        $showRejected = "Request Rejected Successfully";
    }
  
} else {
   $showError ="Something went wrong";
}

mysqli_close($co);
    
    
}

?>