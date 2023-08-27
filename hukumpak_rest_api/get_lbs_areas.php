<?php
    include ("hukumpak_db_conn.php");
    
    $cateID = $_POST['cate_ID'];
    $cityName = $_POST['cityName'];
  
    $sql = "SELECT * FROM lbs_areas WHERE subCat_ID = $cateID AND TRIM(city) = TRIM('" . $cityName . "')";
    
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