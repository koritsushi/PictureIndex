<?php
$personalWatchListID = $_POST['personalWatchListID'];

$returnMsg = "";

include "../../dbConn.php";

$delete = "DELETE FROM personal_watch_list WHERE personalWatchListID = '$personalWatchListID'";

if (mysqli_query($db, $delete)) {
    $returnMsg .= "This show has been successfully removed from your watch list.";
} else {
    $returnMsg .= mysqli_error($db);
}

echo json_encode($returnMsg);
