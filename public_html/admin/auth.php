<?php
    session_start();
    if(!isset($_SESSION["email"]) && !isset($_SESSION["admin_loggedin"])){
        header("Location:signin.php");
        exit(); 
    }
?>