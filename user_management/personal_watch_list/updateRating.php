<?php
$rating = $_POST['rating'];
$memberID = $_POST['memberID'];
$showsID = $_POST['showsID'];

$returnMsg = "";

include "../../dbConn.php";

$update = "UPDATE personal_watch_list SET rating = '$rating' WHERE memberID = '$memberID' AND showsID = '$showsID'";

if (mysqli_query($db, $update)) {
    include "updateScore.php";
} else {
    $returnMsg .= mysqli_error($db);
}

echo json_encode($returnMsg);
