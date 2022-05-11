<?php

$memberEmail = $_POST['memberEmail'];
$memberPassword = $_POST['memberPassword'];

include "../dbConn.php";

$returnMsg = "";

$checkmemberEmail = mysqli_query($db, "SELECT * FROM members WHERE memberEmail ='$memberEmail'");

if (mysqli_num_rows($checkmemberEmail)) {

    while ($row = mysqli_fetch_array($checkmemberEmail)) {
        $getMemberID = $row['memberID'];
        $getMemberEmail = $row['memberEmail'];
        $getMemberPassword = $row['memberPassword'];
    }

    if ($getMemberPassword == $memberPassword) {
        $memberID = $getMemberID;

        $row = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `members` WHERE memberID = '$getMemberID'")); 

        if (!empty($row)) {
           if ($row['status'] == "0") {
                // remove all session variables
                session_unset();

                // destroy the session
                // session_destroy();
                session_start();
                $messages = 'Account Deactived.';
                echo $messages;
           }else{
                session_start();
                $_SESSION['id'] = $memberID;
                echo "Login successful!";
           }
        }

        
    } else {
       echo "Email or password are entered wrong.";
    }
} else {
   echo "Email or password are entered wrong.";
}

