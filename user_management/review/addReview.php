<?php
date_default_timezone_set("Asia/Kuala_Lumpur");

$showsID = $_POST['showsID'];
$reviewPostedDate = date("d/m/Y");
$reviewPostedTime = date("h:i:sa");
$memberID = $_POST['memberID'];
$reviewText = $_POST['reviewText'];

$returnMsg = "";

include "../../dbConn.php";

if (empty($reviewText)) {
    $returnMsg .= 'Please write your review before click the "Post" button. ';
} else {
    $insert = "INSERT INTO `reviews`(`reviewText`, `reviewPostedDate`, `reviewPostedTime`, `memberID`, `showsID`) VALUES ('$reviewText', '$reviewPostedDate', '$reviewPostedTime', '$memberID', '$showsID')";

    if (mysqli_query($db, $insert)) {
        $returnMsg .= "Your review has posted successfully.";
    } else {
        $returnMsg .= mysqli_error($db);
    }
}


echo json_encode($returnMsg);
