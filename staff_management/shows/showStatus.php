<?php
$status = $_POST['status'];
$id = $_POST['id'];

include "../../dbConn.php";

if ($status == "Disable") {
    $update = "UPDATE shows SET status = '0' WHERE showsID = '$id'";
    if (mysqli_query($db, $update)) {
        $return_data = "Record updated successfully. Please refresh the page to see the updated infomation.";
      } else {
        $return_data = "Error updating record: " . mysqli_error($db);
    }
} else {
    $update = "UPDATE shows SET status = '1' WHERE showsID = '$id'";
    if (mysqli_query($db, $update)) {
        $return_data = "Record updated successfully. Please refresh the page to see the updated infomation.";
      } else {
        $return_data = "Error updating record: " . mysqli_error($db);
    }
}

echo json_encode($return_data);
?>