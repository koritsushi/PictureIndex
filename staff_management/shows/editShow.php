<?php

if ($_FILES["showsPic"]["size"] <= 0) {

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

    $updateShow = "UPDATE shows SET showsName = '$showsName', showsType = '$showType', episodes = '$episodes', 
            showStatus = '$showStatus', releaseDate = '$releaseDate', finishedDate = '$finishedDate', broadcastDay = '$broadcastDay', 
            broadcastTime = '$broadcastTime', studios = '$studiosInsert', synopsis = '$synopsis' WHERE showsID = '$showsID'";

    if (mysqli_query($db, $updateShow)) {
        $deleteGenre = "DELETE FROM genreshows WHERE showsID ='" . $showsID . "'";
        if (!empty($_POST['genres'])) {
            if (mysqli_query($db, $deleteGenre)) {
                foreach ($chkInsert as $item) {
                    $updateGenre = "INSERT INTO `genreshows` (`genreID`, `showsID`) VALUES ('$item', '$showsID')";
                    $confirmation = mysqli_query($db, $updateGenre);

                    if (!$confirmation) {
                        $returnMsg .= mysqli_error($db);
                    }
                }
            }
            if ($confirmation) {
                $returnMsg = "Shows Information has been updated successfully.";
            }
        } else {
            if (mysqli_query($db, $deleteGenre)) {
                $returnMsg = "Shows Information has been updated successfully.";
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

        $updateShow = "UPDATE shows SET showsName = '$showsName', showsPic = '$dest_path', showsType = '$showType', episodes = '$episodes', 
        showStatus = '$showStatus', releaseDate = '$releaseDate', finishedDate = '$finishedDate', broadcastDay = '$broadcastDay', 
        broadcastTime = '$broadcastTime', studios = '$studiosInsert', synopsis = '$synopsis' WHERE showsID = '$showsID'";

        if (mysqli_query($db, $updateShow)) {
            $deleteGenre = "DELETE FROM genreshows WHERE showsID ='" . $showsID . "'";
            if (!empty($_POST['genres'])) {
                if (mysqli_query($db, $deleteGenre)) {
                    foreach ($chkInsert as $item) {
                        $updateGenre = "INSERT INTO `genreshows` (`genreID`, `showsID`) VALUES ('$item', '$showsID')";
                        $confirmation = mysqli_query($db, $updateGenre);

                        if (!$confirmation) {
                            $returnMsg .= mysqli_error($db);
                        }
                    }
                }

                if ($confirmation) {
                    $returnMsg = "Shows Information has been updated successfully.";
                }
            } else {
                if (mysqli_query($db, $deleteGenre)) {
                     $returnMsg = "Shows Information has been updated successfully.";
                }
            }
        } else {
            $returnMsg .= mysqli_error($db);
        }
    } else {
        $returnMsg .= "Only JPG, JPEG & PNG files are allowed.";
    }
}
