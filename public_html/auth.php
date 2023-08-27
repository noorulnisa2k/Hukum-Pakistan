<?php
    session_start();
    if(!isset($_SESSION["email"]) && !isset($_SESSION["username"]) && !isset($_SESSION["user_id"])){
        header("Location:login.php");
        exit(); 
    }
?>