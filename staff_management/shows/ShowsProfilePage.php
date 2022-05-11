<!DOCTYPE html>
<html lang="en">

<?php include('../../staffHead.php');
$distUrl = 'http://PictureIndex/NexusNet/dist/'; ?>

<head>
    <style>
        .line {
            border-right-style: solid;
            border-color: darkturquoise;
            border-width: 2px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 95%;
        }

        td {
            border: 1px solid #dddddd;
            text-align: left;
            font-size: 18px;
            padding: 10px;
            border-color: skyblue
        }

        th {
            border: 1px solid #dddddd;
            text-align: left;
            font-size: 18px;
            width: 30%;
            border-color: skyblue
        }

        .format-pre pre {
            padding: 10px;
            font-size: 16px;
            text-align: left;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
        }
    </style>
    <link rel="stylesheet" href="<?= $distUrl ?>sweetalert2.css">
</head>

<body>
    <div class="wrapper">
        <?php include('../../staffHeader.php') ?>

        <?php include "../../dbConn.php";

        $showsID = $_GET['showsID'];

        $result = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'");
        ?>

        <div>
            <h2 style="margin-top: 20px;">
                <?php if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo $row['showsName'];
                    }
                } ?>
            </h2>
            <hr style="width:100%;height: 1px;text-align:left;margin-left:0;background-color:darkturquoise;">

            <div class="row" style="margin-bottom: 100px;">

                <div class="col-3 line">
                    <div>
                        <?php
                        $showsID = $_GET['showsID'];

                        $result = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'");
                        $status = mysqli_query($db, "SELECT status FROM shows WHERE showsID = '$showsID'");

                        while ($row = mysqli_fetch_array($result)) {
                            if ($row["showsPic"] == "") {
                                echo '<img src="../../../No Image.jpg" alt="No Image.jpg" height="400px" width="280px"/>';
                            } else {
                                echo '<img src="' . $row["showsPic"] . '" alt="' . $row["showsPic"] . '" height="400px" width="280px" style="object-fit: contain;" />';
                            }
                        } ?>

                        <div class="col-12" style="padding-top: 30px; padding-left: 8px">
                            <?php
                            $row = mysqli_fetch_array($status);
                            if ($row['status'] == "1") {
                                $btn = "Disable";
                                $btnColor = "btn-danger";
                            } else {
                                $btn = "Enable";
                                $btnColor = "btn-success";
                            }
                            ?>
                            <button class="btn btn-primary col-5" style="margin-right: 10px;" onclick="window.location='ShowsProfileEditPage.php?showsID=<?php echo $showsID ?>'">Edit</button>
                            <button name="submit" id="submit" value="<?php echo "$btn" ?>" data-id="<?php echo "$showsID" ?>" class="btn <?=$btnColor?> col-5"><?php echo "$btn" ?></button>
                        </div>

                        <div class="col-12" style="margin-top: 20px;">
                            <button class="btn btn-warning col-10" name="btnCharLst" id="btnCharLst" onclick="window.location='http://localhost/NexusNet/staff_management/character/ShowsCharacterListPage.php?showsID=<?php echo $showsID ?>'">Character List</button>
                        </div>

                    </div>

                </div>

                <div class="col-9">
                    <?php

                    $showsID = $_GET['showsID'];

                    $result = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'");
                    $resultGenre = mysqli_query($db, "SELECT * FROM genreshows WHERE showsID = '$showsID'"); ?>

                    <h3>Shows Information</h3>
                    <hr style="width:100%;height: 1px;text-align:left;margin-left:0;background-color:darkturquoise;">

                    <table>
                        <?php if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <th>Shows ID &emsp;&emsp;&emsp;&emsp;&emsp;:</th>
                                    <td><?php echo $row['showsID']; ?></td>
                                </tr>
                                <tr>
                                    <th>Shows Name &emsp;&emsp;&emsp;&nbsp;:</th>
                                    <td><?php echo $row['showsName']; ?></td>
                                </tr>
                                <tr>
                                    <th>Shows Type &emsp;&emsp;&emsp;&ensp;&nbsp;:</th>
                                    <td><?php echo $row['showsType']; ?></td>
                                </tr>
                                <tr>
                                    <th>Episode(s) &emsp;&emsp;&emsp;&emsp;&ensp;:</th>
                                    <td><?php echo $row['episodes']; ?></td>
                                </tr>
                                <tr>
                                    <th>Shows Status &emsp;&emsp;&emsp;:</th>
                                    <td><?php echo $row['showStatus']; ?></td>
                                </tr>
                                <tr>
                                    <th>Release Date &emsp;&emsp;&emsp;&ensp;:</th>
                                    <td><?php echo $row['releaseDate']; ?></td>
                                </tr>
                                <tr>
                                    <th>Finished Date &emsp;&emsp;&emsp;&nbsp;:</th>
                                    <td><?php echo $row['finishedDate']; ?></td>
                                </tr>
                                <tr>
                                    <th>Broadcast Day &emsp;&emsp;&ensp;&nbsp;:</th>
                                    <td><?php echo $row['broadcastDay']; ?></td>
                                </tr>
                                <tr>
                                    <th>Broadcast Time &emsp;&emsp;&nbsp;:</th>
                                    <td><?php echo $row['broadcastTime']; ?></td>
                                </tr>
                                <tr>
                                    <th>Studio &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;&emsp;:</th>
                                    <td><?php echo $row['studios']; ?></td>
                                </tr>
                                <tr>
                                    <th>Genre(s) &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;:</th>
                                    <td>
                                        <?php
                                        $n = 1;
                                        while ($rowGenre = mysqli_fetch_array($resultGenre)) {
                                            $final = $rowGenre['genreID'];
                                            $resultGenreName = mysqli_query($db, "SELECT * FROM genres WHERE genreID = '$final'");
                                            if (mysqli_num_rows($resultGenreName) > 0) {
                                                while ($rowFinal = mysqli_fetch_array($resultGenreName)) {
                                                    echo $rowFinal['genreName'];
                                                    echo ($n != $resultGenre->num_rows) ? ', ' : '';
                                                    $n++;
                                                }
                                            } else if (mysqli_num_rows($resultGenreName) <= 0 || $resultGenreName == "") {
                                                echo "Unconfirmed";
                                            }
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Score &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&ensp;&nbsp;:</th>
                                    <td><?php echo $row['score']; ?></td>
                                </tr>
                                <tr>
                                    <th>Ranking &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</th>
                                    <td>
                                        <?php
                                        $getRank =  mysqli_query($db, "SELECT showsID, rank from (SELECT showsID, RANK() OVER (ORDER BY score DESC) rank FROM shows)shows WHERE showsID = '$showsID';");
                                        while ($rowRank = mysqli_fetch_array($getRank)) {
                                            $ranking = $rowRank['rank'];
                                        }
                                        echo $ranking; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Synopsis &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;:</th>
                                    <td style="white-space:pre-wrap; text-align: justify;"><?php echo $row['synopsis']; ?></td>
                                </tr>
                                <tr>
                                    <th>Status &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</th>
                                    <?php
                                    if ($row['status'] == "1") { ?>
                                        <td><?php echo "Enable"; ?></td>
                                    <?php } else { ?>
                                        <td><?php echo "Disable"; ?></td>
                                    <?php } ?>
                                </tr>

                        <?php }
                        } ?>

                    </table>

                    <?php mysqli_close($db); ?>

                    <button class="btn btn-secondary col-2" style="margin-top: 20px; margin-left: 79%" onclick="history.back();">Back</button>
                </div>
            </div>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?= $distUrl ?>sweetalert2.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#submit").click(function(event) {
                event.preventDefault();
                var statusValue = $("#submit").val()
                var idValue = $(this).data('id')

                Swal.fire({
                    title: 'Do you want to make this show will become "<?php echo $btn ?>"?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: "POST",
                            url: "showStatus.php",
                            data: {
                                status: statusValue,
                                id: idValue
                            },
                            dataType: "json",
                            success: function(x) {
                                var delay = 500;
                                if (x == "Record updated successfully. Please refresh the page to see the updated infomation.") {
                                    Swal.fire(x, '', 'success').then((result => {
                                        if (result.isConfirmed) {
                                            location.reload();
                                        } else {
                                            setTimeout(function() {
                                                location.reload();
                                            }, delay);
                                        }
                                    }))

                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Somethings are wrong!',
                                        html: '<pre>' + x + '</pre>',
                                        customClass: {
                                            popup: 'format-pre'
                                        }
                                    })
                                }
                            }
                        });
                    }
                })
            });
        });
    </script>

</html>