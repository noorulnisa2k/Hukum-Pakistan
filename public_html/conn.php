<?php

// session_start();

$servername = "localhost";
$database= "hukumpakistan";
$username = "root";
$password = "";

// Create connection
$co = new mysqli($servername, $username, $password, $database);

// Check connection
if ($co->connect_error) {

  die("Connection failed: " . $co->connect_error);

}
// echo "Connected successfully";
?>
