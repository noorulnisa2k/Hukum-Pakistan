<?php
    include ("hukumpak_db_conn.php");
    
    $cateID = $_POST['cate_ID'];
    
    $hasCategory = "SELECT * FROM lbs_subcategories WHERE cate_ID = $cateID";
    $result = mysqli_query($conn, $hasCategory);
    
    if (mysqli_num_rows($result) > 0) {
      echo "Success";
    } else {
        echo "Error";
    }
    
    mysqli_close($conn);
?>