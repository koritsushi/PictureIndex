<?php
$reviewID = $_POST['reviewID'];

$returnMsg = "";

include "../../dbConn.php";

$deleteReview = "DELETE FROM reviews WHERE reviewID ='" . $reviewID . "'";

if (mysqli_query($db, $deleteReview)) {
    $returnMsg .= "Your review has been deleted.";
} else {
    $returnMsg .= mysqli_error($db);
}

echo json_encode($returnMsg);
