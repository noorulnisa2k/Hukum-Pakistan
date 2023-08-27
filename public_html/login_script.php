<?php
session_start();
include('conn.php');
    
    $showError = false;
    
    
    if(isset($_SESSION["email"]) && isset($_SESSION["username"]) && isset($_SESSION["user_id"])){
        header("Location:/");
        exit(); 
    }
    // if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])){
    //   header("location: index.php");
    //   exit;
    // }
    
    
    if (isset($_POST['Email'])){
		
		$email = stripslashes($_POST['Email']); 
		$email = mysqli_real_escape_string($co,$email); 
		$password = stripslashes($_POST['Password']);
		$password = mysqli_real_escape_string($co,$password);
		

        $query = "SELECT * FROM `auth_user` WHERE email='$email' and password='$password' and email_verified= 1 ";
		$result = mysqli_query($co,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        
		if($rows==1){
		
			  while($row = mysqli_fetch_array($result)){
			      
				$_SESSION['loggedin'] = true;
				$_SESSION['city'] = $row['city'];
				$_SESSION['email'] = $email; 
				$_SESSION['username'] = $row['username'];
				$_SESSION['first_name'] = $row['first_name'];
				$_SESSION['user_id'] = $row['id'];
				
			  }
			header('Location: /'); // Redirect user to index.php    
		}else{
		  //  $showError = "Invalid Credentials";
		  //  $_SESSION['msg'] =$showError;
			header('Location: login.php?msg=Invalid Credentials');

			}
	}
?>