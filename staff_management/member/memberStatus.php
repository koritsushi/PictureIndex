<?php
$status = $_POST['status'];
$id = $_POST['id'];

include "../../dbConn.php";

if ($status == "0") {
    $update = "UPDATE members SET status = '0' WHERE memberID = '$id'";
    if (mysqli_query($db, $update)) {
        $return_data = "Record updated successfully. Please refresh the page to see the updated infomation.";
      } else {
        $return_data = mysqli_error($db);
    }
} else {
    $update = "UPDATE members SET status = '1' WHERE memberID = '$id'";
    if (mysqli_query($db, $update)) {
        $return_data = "Record updated successfully. Please refresh the page to see the updated infomation.";
      } else {
        $return_data = mysqli_error($db);
    }
}

echo json_encode($return_data);
?>