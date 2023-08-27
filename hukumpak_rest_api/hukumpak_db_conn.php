<?php
  $servername = "localhost";
  $username = "hukumpak_user";
  $password = "1;6[RtnR~AuJ";
  $dbname = "hukumpak_db";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>