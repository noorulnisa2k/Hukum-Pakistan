<?php

session_start();
include('conn.php');

$statement = "SELECT * FROM `lbs_categories` WHERE inForm=1";
$dt = mysqli_query($co, $statement);
 
$categoryId = isset($_POST['categoryId']) ? $_POST['categoryId'] : 0;
$command = isset($_POST['get']) ? $_POST['get'] : "";

switch ($command) {
    case "category":
        $result1 = "<option value='' disabled selected>Select Category</option>";
        $statement = "SELECT * FROM `lbs_categories` WHERE inForm=1";
        $dt = mysqli_query($co, $statement);
        while ($result = mysqli_fetch_array($dt)) {
            $result1 .= "<option value='" . $result['cateID'] . "'>" . $result['categoryName'] . "</option>";
        }
        echo $result1;
        break;

    case "subCategory":
        $result1 = "<option value='' disabled selected>Select Sub Category</option>";
        $statement = "SELECT * FROM `lbs_subcategories` WHERE cate_ID=" . $categoryId;
        $dt = mysqli_query($co, $statement);

        while ($result = mysqli_fetch_array($dt)) {
            $result1 .= "<option value='" . $result['categoryName'] . "'>" . $result['categoryName'] . "</option>";
        }
        echo $result1;
        break;
}

exit();
?>

