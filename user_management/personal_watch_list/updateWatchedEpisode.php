<?php
$watchedEpisode = $_POST['watchedEpisode'];
$memberID = $_POST['memberID'];
$showsID = $_POST['showsID'];

$returnMsg = "";

include "../../dbConn.php";

$getShowEp = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'");
while ($row = mysqli_fetch_array($getShowEp)) {
    $episodes = $row['episodes'];
}

if ($watchedEpisode < $episodes && $watchedEpisode > 0) {
    $watchStatus = "2";
    $update = "UPDATE personal_watch_list SET watchedEpisode = '$watchedEpisode', watchStatus = '$watchStatus' WHERE memberID = '$memberID' AND showsID = '$showsID'";
} else if ($watchedEpisode == $episodes) {
    $watchStatus = "3";
    $update = "UPDATE personal_watch_list SET watchedEpisode = '$watchedEpisode', watchStatus = '$watchStatus' WHERE memberID = '$memberID' AND showsID = '$showsID'";
} else {
    $watchStatus = "1";
    $update = "UPDATE personal_watch_list SET watchedEpisode = '$watchedEpisode', watchStatus = '$watchStatus' WHERE memberID = '$memberID' AND showsID = '$showsID'";
}

if (mysqli_query($db, $update)) {
    $returnMsg .= "Your watched episode has successfully updated.";
} else {
    $returnMsg .= mysqli_error($db);
}

echo json_encode($returnMsg);
