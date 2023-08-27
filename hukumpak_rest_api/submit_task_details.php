<?php
  include ("hukumpak_db_conn.php");

  $login_id = $_POST['loginID'];
  $prof_id = $_POST['profID'];
  $task_id = $_POST['taskID'];
  $customer_name = $_POST['customer_name'];
  $contact_no = $_POST['contact_no'];
  $task_type = $_POST['task_type'];
  $task_descripton = mysqli_real_escape_string($conn,$_POST['task_description']);
  $address = mysqli_real_escape_string($conn,$_POST['address']);
  

  $sql = "INSERT INTO `assign_task`(`user_id`, `prof_id`, `task_id`, `customer_name`, `contact_number`, `task_type`, `task_description`, `address`) 
  VALUES ('$login_id', '$prof_id', ' $task_id', '$customer_name', '$contact_no', '$task_type', '$task_descripton', '$address')";

  if (mysqli_query($conn, $sql)) {
    echo "Success";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>