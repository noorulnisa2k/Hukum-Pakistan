<?php
  include ("hukumpak_db_conn.php");

  $login_id = $_POST['loginID'];
  $patient_name = $_POST['patient_name'];
  $email = "";
  $blood_grp = $_POST['blood_group'];
  $blood_unit = $_POST['blood_unit'];
  $city = $_POST['city'];
  $hospital = $_POST['hospital'];
  $urgency = $_POST['urgency'];
  $doctor_name = $_POST['doctor_name'];
  $imageString = $_POST['imageString'];
  $note = $_POST['note'];
  $contact_no = $_POST['contact_no'];
  $transportation = $_POST['transportation'];
  
  

  $select = "SELECT us.email FROM auth_user us WHERE us.id = $login_id";
  $result = mysqli_query($conn, $select);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          $email = $row["email"];
      }
  }

  $sql = "INSERT INTO `hukumpakistanapp_patient`(`user_id`, `name`, `email`, `blood_grp`, `quantity`, `city`, `hospital_name`, `urgency`, `doctor_name`, `picture`, `note`, `contact_number`, `transportation`) 
  VALUES ('$login_id', '$patient_name', '$email', '$blood_grp', '$blood_unit', '$city', '$hospital', '$urgency', '$doctor_name', '$imageString', '$note', '$contact_no', '$transportation')";

  if (mysqli_query($conn, $sql)) {
    echo "Success";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>