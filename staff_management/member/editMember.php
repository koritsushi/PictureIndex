<?php

$memberID = $_POST['memberID'];
$memberName = $_POST['memberName'];
$memberPassword = $_POST['memberPassword'];
$memberEmail = $_POST['memberEmail'];
$memberPhone = $_POST['memberPhone'];
$memberGender = $_POST['optradioGender'];
$memberAddress = $_POST['memberAddress'];
$pic = $_FILES["profilePic"]["name"];
$fileTmpPath = $_FILES['profilePic']['tmp_name'];
$returnMsg = "";

include "../../dbConn.php";
$baseUrl = $_SERVER['DOCUMENT_ROOT'] . "/PictureIndex/staff_management/member";

$memberName = str_replace("'", "''", $memberName);
$duplicateName = mysqli_query($db, "SELECT * FROM `members` WHERE memberName ='$memberName'");
$chkMemberidName = mysqli_query($db, "SELECT * FROM `members` WHERE memberID ='$memberID' AND memberName = '$memberName'");

if ($memberName == "") {
    $returnMsg .= "- Member name can not be empty.\n";
}

if (mysqli_num_rows($duplicateName) > 0) {
    if (mysqli_num_rows($chkMemberidName) <= 0) {
        $returnMsg .= "- Member name has been taken. Please enter again.\n";
    }
}

if (!preg_match("/^[a-zA-Z-\'\.\s]+$/", $memberName)) {
    $returnMsg .= "- Member name can only have letters, dash(-), \nsingle quotes('), and dot(.).\n";
}

if ($memberPassword == "") {
    $returnMsg .= "- Password can not be empty.\n";
} elseif (strlen($memberPassword) < 5) {
    $returnMsg .= "- Password need at least 5 characters.\n";
}

if ($memberEmail == "") {
    $returnMsg .= "- Email can not be empty.\n";
}

$filtered_phone_number = filter_var($memberPhone, FILTER_SANITIZE_NUMBER_INT);
$phone_to_check = str_replace("-", "", $filtered_phone_number);

if ($memberPhone == "") {
    $returnMsg .= "- Phone Number can not be empty.\n";
} elseif (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
    $returnMsg .= "- Phone Number Invalid.\n";
}

if ($memberAddress == "") {
    $returnMsg .= "- Address can not be empty.\n";
}

if (!empty($returnMsg)) {
    echo json_encode($returnMsg);
} else {
    function checkName($memberName = null)
    {
        return (bool)($memberName != "" && preg_match("/^[a-zA-Z-\s]+$/", $memberName));
    };

    function checkPassword($memberPassword = null)
    {
        return (bool)($memberPassword != "" && strlen($memberPassword) >= 5);
    };

    function checkEmailAndPhoneNum($memberEmail = null, $memberPhone = null)
    {
        return (bool)($memberEmail != "" && $memberPhone != "");
    };

    function checkPhoneNumFormat($phone_to_check = null)
    {
        return (bool)(strlen($phone_to_check) >= 10 || strlen($phone_to_check) <= 14);
    };

    function checkAddressAndDateJoin($memberAddress = null)
    {
        return (bool)($memberAddress != "");
    };

    if (mysqli_num_rows($duplicateName) > 0 || mysqli_num_rows($duplicateName) <= 0) {
        if (checkName($memberName) && checkPassword($memberPassword) && checkEmailAndPhoneNum($memberEmail, $memberPhone) && checkPhoneNumFormat($phone_to_check) && checkAddressAndDateJoin($memberAddress)) {
            if ($_FILES["profilePic"]["size"] <= 0) {
                $update = "UPDATE members SET memberName = '$memberName', memberPassword = '$memberPassword', memberEmail = '$memberEmail', 
                            memberPhone = '$memberPhone', memberGender = '$memberGender', memberAddress = '$memberAddress'
                            WHERE memberID = '$memberID'";

                if (mysqli_query($db, $update)) {
                    $returnMsg .= "Profile Information has been updated.";
                } else {
                    $returnMsg .= mysqli_error($db);
                }
            } else {
                $uploadFileDir = $baseUrl;
                $pic = '/memberPics/' . $pic;
                $dest_path = $uploadFileDir . $pic;
                $imageFileType = strtolower(pathinfo($dest_path, PATHINFO_EXTENSION));
                move_uploaded_file($fileTmpPath, $dest_path);

                if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") {

                    $update = "UPDATE members SET memberName = '$memberName', memberPassword = '$memberPassword', memberEmail = '$memberEmail', 
                            memberPhone = '$memberPhone', memberGender = '$memberGender', memberAddress = '$memberAddress', 
                            memberPics = '$pic' WHERE memberID = '$memberID'";

                    if (mysqli_query($db, $update)) {
                        $returnMsg .= "Profile Information has been updated.";
                    } else {
                        $returnMsg .= mysqli_error($db);
                    }
                } else {
                    $returnMsg .= "Only JPG, JPEG & PNG files are allowed.";
                }
            }
        }
    }
    echo json_encode($returnMsg);
}