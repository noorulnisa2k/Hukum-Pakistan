<?php
    include ("hukumpak_db_conn.php");
    
    $cateID = $_POST['cate_ID'];
  
    $sql = "SELECT * FROM lbs_subcategories WHERE cate_ID = $cateID";
    
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