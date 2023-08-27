<?php
    include ("hukumpak_db_conn.php");

    $loginID = $_POST['loginID'];


    $select = "SELECT 
        CONCAT(us.first_name, ' ', us.last_name) AS full_name, 
        DATE_FORMAT(us.date_joined,'%d-%M-%Y') AS date_joined, 
        us.email , 
        IFNULL(don.donated, '-') AS donated,
        IFNULL(don.id, 0) AS donor_id
    FROM auth_user us
    LEFT JOIN hukumpakistanapp_donor don
    ON us.id = don.user_id
    WHERE us.id = $loginID";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $myArray = $row;
        }
        echo json_encode($myArray);
    } else {
        echo "Error";
    }

?>

