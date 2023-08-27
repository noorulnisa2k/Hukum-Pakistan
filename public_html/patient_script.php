<?php
session_start();
    require('conn.php');
    
    $userid = $_SESSION['user_id'];
    
    $showError = false;
    $showAlert = false;
    // Patient Form

    if(isset($_POST['patient'])){
        $img = mysqli_real_escape_string($co,$_POST['img']);
      $name = mysqli_real_escape_string($co,$_POST['name']);
      $email = mysqli_real_escape_string($co,$_SESSION['email']);
      $phone = mysqli_real_escape_string($co,$_POST['phone']);
      $options = mysqli_real_escape_string($co,$_POST['options']);
      $quantity = mysqli_real_escape_string($co,$_POST['quantity']);
      $city = mysqli_real_escape_string($co,$_POST['city']);
      $hospital_name = mysqli_real_escape_string($co,$_POST['hospital_name']);
      $urgency = mysqli_real_escape_string($co,$_POST['urgency']);
      $transport = mysqli_real_escape_string($co,$_POST['transport']);
      $doctor_name = mysqli_real_escape_string($co,$_POST['doctor_name']);
      $note = mysqli_real_escape_string($co,$_POST['note']);
      
    
      if (isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])) {
        
          $sql = "INSERT INTO `hukumpakistanapp_patient` (`user_id`, `picture`, `name`, `email`, `contact_number`, `blood_grp`, `quantity`, `city`, `hospital_name`, `urgency`, `doctor_name`, `transportation`, `note`, `timestamp`, `isSettled`) 
          VALUES ('$userid', '$img', '$name', '$email', '$phone', '$options', '1', '$city', '$hospital_name', '$urgency', '$doctor_name', '$transport', '$note', current_timestamp(), 'N')";
          $result = mysqli_query($co, $sql);
          if ($result) {
            $showAlert = 'Submitted Successfully';
            header("location: donors_list.php");
          }
          else{
            $showError ='Some thing went wrong you are not added, Try again';
            echo "Error: " . $sql . "<br>" . mysqli_error($co);
          }
      }
      else {
        $showError = "login youself";
      }
    }


?>