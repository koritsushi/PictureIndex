<?php
$reviewID = $_POST['reviewID'];
$reviewText = $_POST['reviewText'];

$returnMsg = "";

include "../../dbConn.php";

if (empty($reviewText)) {
    $returnMsg .= 'Please write your review before click the "Update" button. ';
} else {
    $update = "UPDATE reviews SET reviewText = '$reviewText' WHERE reviewID = '$reviewID'";

    if (mysqli_query($db, $update)) {
        $returnMsg .= "Your review has been updated.";
    } else {
        $returnMsg .= mysqli_error($db);
    }
}

echo json_encode($returnMsg);
