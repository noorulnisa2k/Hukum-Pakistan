<?php
    include ("hukumpak_db_conn.php");
    
    $profID = $_POST['prof_id'];

    $sql = "SELECT * FROM tasks WHERE prof_id = $profID";
    $result = mysqli_query($conn, $sql);

 
   if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $myArray[] = $row;
        }
        echo json_encode($myArray);
    } else {
        echo "Error";
    }
    
    mysqli_close($conn);
?>