<?php
if ($_FILES["showsPic"]["size"] <= 0) {
    $score = 0.0;

    if ($studios != "0" && $newStudios == "") {
        $studiosInsert .= $studios;
    } else if ($studios == "0" && $newStudios != "") {
        $studiosInsert .= $newStudios;
    }

    if ($chkInsert == "") {
        $chkInsert = $_POST['genres'];
    }

    if ($releaseDate != $unconfirmedMsg) {
        $releaseDate = date("d/m/Y", strtotime($releaseDate));
    }

    if ($finishedDate != $unconfirmedMsg) {
        $finishedDate = date("d/m/Y", strtotime($finishedDate));
    }

    $showsName = str_replace("'", "''", $showsName);
    $studiosInsert = str_replace("'", "''", $studiosInsert);
    $synopsis = str_replace("'", "''", $synopsis);
    $status = "1";

    $insertShow = "INSERT INTO `shows` (`showsName`, `showsType`, `episodes`, `showStatus`, `releaseDate`, 
            `finishedDate`, `broadcastDay`, `broadcastTime`, `studios`, `score`, `synopsis`, `status`) 
            VALUES ('$showsName', '$showType', '$episodes', '$showStatus', '$releaseDate', '$finishedDate', '$broadcastDay', 
            '$broadcastTime', '$studiosInsert', '$score', '$synopsis', '$status')";

    if (mysqli_query($db, $insertShow)) {
        $showsID = mysqli_insert_id($db);
        if (empty($_POST['genres'])) {
            $insertGenre = "INSERT INTO `genreshows` (`showsID`) VALUES ('$showsID')";
            if (mysqli_query($db, $insertGenre)) {
                $returnMsg .= "New Show has successfully added.";
            } else {
                $returnMsg .= mysqli_error($db);
            }
        } else if (!empty($_POST['genres'])) {
            foreach ($chkInsert as $item) {
                $insertGenre = "INSERT INTO `genreshows` (`genreID`, `showsID`) VALUES ('$item', '$showsID')";
                $confirmation = mysqli_query($db, $insertGenre);

                if (!$confirmation) {
                    $returnMsg .= mysqli_error($db);
                }
            }

            if ($confirmation) {
                $returnMsg = array("a" => "New Show has successfully added.", "b" => "$showsID");
            }
        }
    } else {
        $returnMsg .= mysqli_error($db);
    }
} else {
    $uploadFileDir = './showPics/';
    $dest_path = $uploadFileDir . $showPic;
    $imageFileType = strtolower(pathinfo($dest_path, PATHINFO_EXTENSION));
    move_uploaded_file($fileTmpPath, $dest_path);

    if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") {
        $score = 0.0;

        if ($studios != "0" && $newStudios == "") {
            $studiosInsert .= $studios;
        } else if ($studios == "0" && $newStudios != "") {
            $studiosInsert .= $newStudios;
        }

        if ($chkInsert == "") {
            $chkInsert = $_POST['genres'];
        }

        if ($releaseDate != $unconfirmedMsg) {
            $releaseDate = date("d/m/Y", strtotime($releaseDate));
        }

        if ($finishedDate != $unconfirmedMsg) {
            $finishedDate = date("d/m/Y", strtotime($finishedDate));
        }

        $showsName = str_replace("'", "''", $showsName);
        $studiosInsert = str_replace("'", "''", $studiosInsert);
        $synopsis = str_replace("'", "''", $synopsis);
        $status = "1";

        $insertShow = "INSERT INTO `shows` (`showsName`, `showsPic`, `showsType`, `episodes`, `showStatus`, `releaseDate`, 
                `finishedDate`, `broadcastDay`, `broadcastTime`, `studios`, `score`, `synopsis`, `status`) 
                VALUES ('$showsName','$dest_path', '$showType', '$episodes', '$showStatus', '$releaseDate', '$finishedDate', '$broadcastDay', 
                '$broadcastTime', '$studiosInsert', '$score', '$synopsis', '$status')";

        if (mysqli_query($db, $insertShow)) {
            $showsID = mysqli_insert_id($db);
            if (empty($_POST['genres'])) {
                $insertGenre = "INSERT INTO `genreshows` (`showsID`) VALUES ('$showsID')";
                if (mysqli_query($db, $insertGenre)) {
                    $returnMsg = "New Show has successfully added.";
                } else {
                    $returnMsg .= mysqli_error($db);
                }
            } else if (!empty($_POST['genres'])) {
                foreach ($chkInsert as $item) {
                    $insertGenre = "INSERT INTO `genreshows` (`genreID`, `showsID`) VALUES ('$item', '$showsID')";
                    $confirmation = mysqli_query($db, $insertGenre);

                    if (!$confirmation) {
                        $returnMsg .= mysqli_error($db);
                    }
                }

                if ($confirmation) {
                    $returnMsg = "New Show has successfully added.";
                }
            }
        } else {
            $returnMsg .= mysqli_error($db);
        }
    } else {
        $returnMsg .= "Only JPG, JPEG & PNG files are allowed.";
    }
}
