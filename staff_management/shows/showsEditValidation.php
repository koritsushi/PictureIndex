<?php
$showsID = $_POST['showsID'];
$showPic = $_FILES["showsPic"]["name"];
$fileTmpPath = $_FILES['showsPic']['tmp_name'];

$showsName = $_POST['showsName'];
$showType = $_POST['showType'];
$showStatus = $_POST['showStatus'];
$episodes = $_POST['episodes'];

$releaseDate = $_POST['releaseDate'];
$finishedDate = $_POST['finishedDate'];
$broadcastDay = date("l", strtotime($releaseDate));
$broadcastTime = $_POST['broadcastTime'];

$studios = $_POST['studios'];
$newStudios = $_POST['newStudios'];
$studiosInsert = "";

$synopsis = $_POST['synopsis'];

$chkInsert = "";
$unconfirmedMsg = "Unconfirmed";
$returnMsg = "";

include "../../dbConn.php";

$duplicateName = mysqli_query($db, "SELECT * FROM `shows` WHERE showsName ='$showsName'");
$chkShowidName = mysqli_query($db, "SELECT * FROM `shows` WHERE showsID ='$showsID' AND showsName = '$showsName'");

if ($showsName == "") {
    $returnMsg .= "- Shows Name is needed.\n";
}

if (mysqli_num_rows($duplicateName) > 0) {
    if (mysqli_num_rows($chkShowidName) <= 0) {
        $returnMsg .= "- Shows Name is dulplicate. Please enter again.\n";
    }
}

if ($showStatus == "Finish Aired") {

    if ($showType == "0") {
        $returnMsg .= "- Please select the Show's Type.\n";
    }

    if ($episodes == "") {
        $returnMsg .= "- Episodes is needed.\n";
    } elseif ($episodes <= 0) {
        $returnMsg .= "- Invalid episodes.\n";
    }

    if ($releaseDate == "") {
        $returnMsg .= "- Release Date is needed.\n";
    }

    if ($finishedDate == "") {
        $returnMsg .= "- Finished Date is needed.\n";
    }

    if ($broadcastTime == "") {
        $returnMsg .= "- Aried Time is needed.\n";
    }

    if ($studios == "0" && $newStudios == "") {
        $returnMsg .= "- Studio Name is needed.\n";
    } else if ($studios != "0" && $newStudios != "") {
        $returnMsg .= "- The Studio Name is just allow one of the column to fill in.\n";
    }

    if ($synopsis == "") {
        $returnMsg .= "- Synopsis is needed.\n";
    }

    if (empty($_POST['genres'])) {
        $returnMsg .= "- Please select the genres of the show.\n";
    }
} else if ($showStatus == "On Aired") {

    if ($showType == "0") {
        $returnMsg .= "- Please select the Show's Type.\n";
    }

    if ($episodes == "" || $episodes <= 0) {
        $episodes = $unconfirmedMsg;
    }

    if ($releaseDate == "") {
        $returnMsg .= "- Release Date is needed.\n";
    }

    if ($finishedDate == "") {
        $finishedDate .= $unconfirmedMsg;
    }

    if ($broadcastTime == "") {
        $returnMsg .= "- Please select the Aried Time.\n";
    }

    if ($studios == "0" && $newStudios == "") {
        $returnMsg .= "- Studio Name is needed.\n";
    } else if ($studios != "0" && $newStudios != "") {
        $returnMsg .= "- The Studio Name is just allow one of the column to fill in.\n";
    }

    if ($synopsis == "") {
        $returnMsg .= "- Synopsis is needed.\n";
    }

    if (empty($_POST['genres'])) {
        $returnMsg .= "- Please select the genres of the show.\n";
    }
} else {
    if ($showType == "0") {
        unset($showType);
        $showType = "";
        $showType .= $unconfirmedMsg;
    }

    if ($episodes == "") {
        $episodes = $unconfirmedMsg;
    }

    if ($releaseDate == "") {
        $releaseDate .= $unconfirmedMsg;
        unset($broadcastDay);
        $broadcastDay = "";
        $broadcastDay .= $unconfirmedMsg;
    }

    if ($finishedDate == "") {
        $finishedDate .= $unconfirmedMsg;
    }

    if ($broadcastTime == "") {
        $broadcastTime .= $unconfirmedMsg;
    }

    if ($studios == "0" && $newStudios == "") {
        unset($studios);
        $studios = "";
        $studios .= $unconfirmedMsg;
    }

    if ($studios != "0" && $newStudios != "") {
        $returnMsg .= "- The Studio Name is just allow one of the column to fill in.\n";
    }

    if ($synopsis == "") {
        $synopsis .= "Pending up-to-date.....";
    }

    if (empty($_POST['genres'])) {
        $chkInsert .= $unconfirmedMsg;
    }
}

if (!empty($returnMsg)) {
    echo json_encode($returnMsg);
} else {

    function checkShowTypeAndEpisodes($showType = null, $episodes = null)
    {
        return (bool)($showType != "0" && $episodes != "");
    };

    function checkDates($releaseDate = null, $finishedDate = null)
    {
        return (bool)($releaseDate != "" && $finishedDate != "");
    };

    function checkBroadcastDayAndTime($broadcastDay = null, $broadcastTime = null)
    {
        return (bool)($broadcastDay != "" && $broadcastTime != "");
    };

    function checkStudio($studios = null, $newStudios = null)
    {
        return (bool)($studios != "0" || $newStudios != "");
    };

    if ($showsName != "" && (mysqli_num_rows($duplicateName) <= 0)) {

        if (checkShowTypeAndEpisodes($showType, $episodes) && checkDates($releaseDate, $finishedDate) && checkBroadcastDayAndTime($broadcastDay, $broadcastTime) && checkStudio($studios, $newStudios)) {
            if ($showStatus == "N/A") {
                if ($synopsis != "") {
                    include "editShow.php";
                }
            } else {
                if ($synopsis != "" && !empty($_POST['genres'])) {
                    include "editShow.php";
                }
            }
        }
    } else if ($showsName != "" && (mysqli_num_rows($duplicateName) > 0)) {

        if (checkShowTypeAndEpisodes($showType, $episodes) && checkDates($releaseDate, $finishedDate) && checkBroadcastDayAndTime($broadcastDay, $broadcastTime) && checkStudio($studios, $newStudios)) {
            if ($showStatus == "N/A") {
                if ($synopsis != "") {
                    include "editShow.php";
                }
            } else {
                if ($synopsis != "" && !empty($_POST['genres'])) {
                    include "editShow.php";
                }
            }
        }
    }

    echo json_encode($returnMsg);
}
