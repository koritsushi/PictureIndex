<?php
$genreName = $_POST['name'];

$returnMsg = "";

include "../../dbConn.php";
if ($genreName == "") {
    $returnMsg .= "- Please enter genre name.\n";
}
else if (!preg_match("/^[a-zA-Z-\s]+$/", $genreName)) {
    $returnMsg .= "- Genre name can only have letters.\n";
} else {
    $upText = ucwords($genreName);

    $duplicateName = mysqli_query($db, "SELECT genreName FROM `genres` WHERE genreName ='$upText'");

    if (mysqli_num_rows($duplicateName) >= 1) {
        $returnMsg .= "- The Genre name is duplicate. Please enter again.\n";
    } else {
        $insert = "INSERT INTO `genres` (`genreName`) VALUES ('$upText')";
        if (mysqli_query($db, $insert)) {
            $returnMsg .= "- New Genre has successfully added.";
        } else {
            $returnMsg .= "- Error.";
        }
    }
}

echo json_encode($returnMsg);
