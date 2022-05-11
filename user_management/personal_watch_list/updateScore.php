<?php

$scoreCount = "SELECT SUM(rating) FROM personal_watch_list WHERE showsID = '$showsID'";
$rowCount = mysqli_query($db, "SELECT * FROM personal_watch_list WHERE showsID = '$showsID'");
$numRow = mysqli_num_rows($rowCount);

foreach ($db->query($scoreCount) as $row) {
    $score = $row['SUM(rating)'] / $numRow;
}

$score = number_format((float)$score, 2);

$updateScore = "UPDATE shows SET score = '$score' WHERE showsID = '$showsID'";

if (mysqli_query($db, $updateScore)) {
    $returnMsg .= "Rating has successfully updated.";
} else {
    $returnMsg .= mysqli_error($db);
}
