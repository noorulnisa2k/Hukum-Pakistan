<?php
session_start();
    require('conn.php');
    
    $userid = $_SESSION['user_id'];
    
    $showError = false;
    $showAlert = false;
    // Donor Form

    if(isset($_POST['donor'])){
      $name = mysqli_real_escape_string($co,$_POST['name']);
      $email = mysqli_real_escape_string($co,$_SESSION['email']);
      $phone = mysqli_real_escape_string($co,$_POST['phone']);
      $gender = mysqli_real_escape_string($co,$_POST['gender']);
      $city = mysqli_real_escape_string($co,$_POST['city']);
      $age = mysqli_real_escape_string($co,$_POST['age']);
      $donation = mysqli_real_escape_string($co,$_POST['donation']);
      $last_donate = mysqli_real_escape_string($co,$_POST['last_donate']);
      $options = mysqli_real_escape_string($co,$_POST['options']);
      $note = mysqli_real_escape_string($co,$_POST['note']);
    
      if (isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])) {
        
          $sql = "INSERT INTO `hukumpakistanapp_donor` (user_id, `name`, `email`, `contact_number`, `age`, `blood_grp`, `gender`, `city`, `date_time`, `donated`, `last_Donate`, `Note`) 
          VALUES ('$userid', '$name', '$email', '$phone', '$age', '$options', '$gender', '$city', current_timestamp(), '$donation', '$last_donate', '$note')";
          $result = mysqli_query($co, $sql);
          if ($result) {
            $showAlert = 'You are Successfully added as a donor';
          }
          else{
            $showError ='Something went wrong you are not added, Try again';
            echo "Error: " . $sql . "<br>" . mysqli_error($co);
          }
      }
      else {
        $showError = "login youself";
      }
    }

?>