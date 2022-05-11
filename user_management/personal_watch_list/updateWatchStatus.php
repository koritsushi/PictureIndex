<?php
$watchStatus = $_POST['watchStatus'];
$memberID = $_POST['memberID'];
$showsID = $_POST['showsID'];
$watchedEpisode = $_POST['watchedEpisode'];

$returnMsg = "";

include "../../dbConn.php";

if ($watchStatus == "3") {
    $update = "UPDATE personal_watch_list SET watchStatus = '$watchStatus', watchedEpisode = '$watchedEpisode' WHERE memberID = '$memberID' AND showsID = '$showsID'";
} else if ($watchStatus == "2") {
    $update = "UPDATE personal_watch_list SET watchStatus = '$watchStatus' WHERE memberID = '$memberID' AND showsID = '$showsID'";
} else {
    $update = "UPDATE personal_watch_list SET watchStatus = '$watchStatus', watchedEpisode = '0' WHERE memberID = '$memberID' AND showsID = '$showsID'";
}

if (mysqli_query($db, $update)) {
    $returnMsg .= "Watch status has successfully updated.";
} else {
    $returnMsg .= mysqli_error($db);
}

echo json_encode($returnMsg);
