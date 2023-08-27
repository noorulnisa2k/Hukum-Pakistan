<?php
    include ("hukumpak_db_conn.php");
    
    $subCatName = $_POST['subCat_Name'];
    $cityName = $_POST['cityName'];

    $sql = "SELECT * FROM lbs_locations WHERE TRIM(city) = TRIM('" . $cityName . "') AND TRIM(locsub_category) = TRIM('" . $subCatName . "')";
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