<?php
  include ("hukumpak_db_conn.php");

  $login_id = $_POST['loginID'];
  $businessName = $_POST['business_name'];
  $contact_no = $_POST['contact_no'];
  $product = $_POST['product'];
  $city = $_POST['city'];
  $category = $_POST['category'];
  $availability = mysqli_real_escape_string($conn,$_POST['availability']);
  $address = mysqli_real_escape_string($conn,$_POST['address']);
  $working_days = mysqli_real_escape_string($conn,$_POST['working_days']);
  

  $sql = "INSERT INTO `lbs_locations`(`loc_name`, `contact_no`, `product_name`, `city`, `loc_address`, `locsub_category`, `availability_hours`, `working_days`) 
  VALUES ('$businessName', '$contact_no', '$product', '$city', '$address', '$category', '$availability', '$working_days')";
  
  

  if (mysqli_query($conn, $sql)) {
    $loc_id = mysqli_insert_id($conn);
    $insert = "INSERT INTO `user_business`(`user_id`, `loc_id`) VALUES ('$login_id', '$loc_id')";
    mysqli_query($conn, $insert);
    if($result == 0){
    $update = "UPDATE cities SET lbsActive = 1 WHERE cityName = '$city'";
    mysqli_query($conn,$update);
    }
    echo "Success";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>