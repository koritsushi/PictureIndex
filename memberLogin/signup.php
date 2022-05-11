<?php

$memberName = $_POST['memberName'];
$memberPassword = $_POST['memberPassword'];
$memberEmail = $_POST['memberEmail'];
$memberPhone = $_POST['memberPhone'];
$memberGender = $_POST['optradioGender'];
$memberAddress = $_POST['memberAddress'];

include "../dbConn.php";
$returnMsg = "";

$memberName = str_replace("'", "''", $memberName);
$duplicateEmail = mysqli_query($db, "SELECT * FROM `members` WHERE memberEmail ='$memberEmail'");

if ($memberName == "") {
    $returnMsg .= "- Name is required.\n";
}

if (mysqli_num_rows($duplicateEmail) > 0) {
    $returnMsg .= "- Email is dulplicate. Please enter again.\n";
}

if (!preg_match("/^[a-zA-Z-\'\.\s]+$/", $memberName)) {
    $returnMsg .= "- Member name can only have letters, dash(-), \nsingle quotes('), and dot(.).\n";
}

if ($memberPassword == "") {
    $returnMsg .= "- Password is required.\n";
} elseif (strlen($memberPassword) < 5) {
    $returnMsg .= "- Password need at least 5 characters.\n";
}

if ($memberEmail == "") {
    $returnMsg .= "- Email is required.\n";
} else if (!filter_var($memberEmail, FILTER_VALIDATE_EMAIL)) {
    $returnMsg .= "- Member email invalid.\n";
}

$filtered_phone_number = filter_var($memberPhone, FILTER_SANITIZE_NUMBER_INT);
$phone_to_check = str_replace("-", "", $filtered_phone_number);

if ($memberPhone == "") {
    $returnMsg .= "- Phone Number is required.\n";
} elseif (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
    $returnMsg .= "- Phone Number Invalid.\n";
}

if ($memberAddress == "") {
    $returnMsg .= "- Address is required.\n";
}




if (!empty($returnMsg)) {
    echo json_encode($returnMsg);
} else {

    $status = "1";

    $insert = "INSERT INTO `members`
                        (`memberName`, `memberPassword`, `memberEmail`, `memberPhone`, `memberGender`, 
                        `memberAddress`, `status`) 
                        VALUES ('$memberName','$memberPassword', '$memberEmail', '$memberPhone', '$memberGender', '$memberAddress', 
                         '$status')";

    if (mysqli_query($db, $insert)) {
        $memberID = mysqli_insert_id($db);
        $returnMsg = array("a" => "Account has successfully created!", "b" => "$memberID");
    } else {
        $returnMsg .= "Error.";
    }


    echo json_encode($returnMsg);
}
