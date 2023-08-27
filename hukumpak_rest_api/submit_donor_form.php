<?php
  include ("hukumpak_db_conn.php");

  $login_id = $_POST['loginID'];
  $name = $_POST['name'];
  $email = "";
  $contact_number = $_POST['contactNo'];
  $age = $_POST['age'];
  $blood_grp = $_POST['blood_group'];
  $gender = $_POST['gender'];
  $city = $_POST['city'];
  $lat = $_POST['latitude'];
  $lng = $_POST['longitude'];
  $address_line = $_POST['address'];
  $donated = $_POST['donated'];
  $lastDonated = $_POST['lastDonated'];
  $note = $_POST['note'];

  // $name = "Moiz";
  // $email = "moizwaseem94@gmail.com";
  // $contact_number = "03337588041";
  // $age = 28;
  // $blood_grp = "B-Positive";
  // $gender = "Male";
  // $city = "Khairpur";
  // $lat = "27.529951";
  // $lng = "68.758141";
  // $address_line = "Sachal Town";
  // $never_donated = "N";
  // $note = "";
  
  $select = "SELECT us.email FROM auth_user us WHERE us.id = $login_id";
  $result = mysqli_query($conn, $select);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          $email = $row["email"];
      }
  }
  
  $lastDonatedDate = date("Y-m-d", strtotime($lastDonated));
  
    //echo $lastDonatedDate;

  $sql = "INSERT INTO hukumpakistanapp_donor(`user_id`, `name`, `email`, `contact_number`, `age`, `blood_grp`, `gender`, `city`, `lat`, `lng`, `address_line`, `donated`, `last_Donate`, `Note`) 
  VALUES ('$login_id', '$name', '$email', '$contact_number', $age, '$blood_grp', '$gender', '$city', '$lat', '$lng', '$address_line', '$donated', '$lastDonatedDate', '$note')";

  if (mysqli_query($conn, $sql)) {
    echo "Success";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>