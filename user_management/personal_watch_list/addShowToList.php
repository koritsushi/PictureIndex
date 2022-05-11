<?php
$watchStatus = $_POST['watchStatus'];
$memberID = $_POST['memberID'];
$showsID = $_POST['showsID'];

$returnMsg = "";

include "../../dbConn.php";

$insert = "INSERT INTO `personal_watch_list`(`watchStatus`, `memberID`, `showsID`) VALUES ('$watchStatus','$memberID', '$showsID')";

if (mysqli_query($db, $insert)) {
    $returnMsg .= "This show has added successfully into your watch list.";
} else {
    $returnMsg .= mysqli_error($db);
}

echo json_encode($returnMsg);
