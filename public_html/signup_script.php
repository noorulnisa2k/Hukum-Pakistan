<?php
session_start();
    require('conn.php');
    
    date_default_timezone_set("Asia/Karachi");
    $showError = false;
    $showAlert = "";
    
    
    if(isset($_SESSION["email"]) && isset($_SESSION["username"]) && isset($_SESSION["user_id"])){
        header("Location: /");
        exit(); 
    }
    
    if (isset($_POST['Submit'])) {
        
      
      $firstname = mysqli_real_escape_string($co,$_POST['firstname']);
      $lastname = mysqli_real_escape_string($co,$_POST['lastname']);
      $username = $firstname."_". $lastname;
      $email = mysqli_real_escape_string($co,$_POST['email']);
      $password = mysqli_real_escape_string($co,$_POST['password']);
      $cpassword = mysqli_real_escape_string($co,$_POST['cpassword']);
      
      $otp = rand(pow(10, 4-1), pow(10, 4)-1);
    // $code = md5( rand() );
    
      if (!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password)) {
        $existSql = "SELECT * FROM `auth_user` WHERE email = '$email' or username = '$username'";
        $result = mysqli_query($co, $existSql);
        $numExistRows = mysqli_num_rows($result);
        
    
        if ($numExistRows >0) {
          $showError = "User already Exists";
        //   echo "Error: " . $sql . "<br>" . mysqli_error($co);
        }
        else {
          if (($password == $cpassword)) {
            $sql = "INSERT INTO `auth_user` (`first_name`, `last_name`, `username`, `email`, `password`, `OTP`, `date_joined`) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$otp', current_timestamp())";
            $result = mysqli_query($co, $sql);
            if($result){
                $showAlert = "We have send a verification link on you email"; 
              
            $_SESSION['user_id'] = mysqli_insert_id($co);
            include ("email_verification.php");
            // header("Location:http://hukumpakistan.pk/otp_verification.php");
            }
            else{
                $showError = "Something went wrong";
                // echo "Error: " . $sql . "<br>" . mysqli_error($co);
            }
          }
          else {
          
            $showError = "Password doesn't match";
            // echo "Error: " . $sql . "<br>" . mysqli_error($co);
          }
          }
        }
      
      else {
        $showError = "All Fields required";
        // echo "Error: " . $sql . "<br>" . mysqli_error($co);
      }  
    }
    
?>