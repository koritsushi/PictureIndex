<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../../userHead.php');
    include "../../dbConn.php";
    $baseUrl = 'http://localhost/PictureIndex/user_management';
    $baseUrlIcon = 'http://localhost/PictureIndex/Icon';
    $distUrl = 'http://localhost/PictureIndex/dist/'; ?>

    <style>
        .square {
            height: 300px;
            width: 250px;
            background-color: #555;
            text-align: center;
            color: darkcyan;
        }

        .profile-pic {
            float: left;
        }

        .focus {
            background-color: bisque;
        }

        div>div>div>ul>li>a {
            color: #e60000;
        }

        .line {
            border-right-style: solid;
            border-color: red;
            border-width: 2px;
        }

        .line-bottom {
            border-bottom-style: solid;
            border-color: red;
            border-width: 2px;
        }

        .line-right {
            border-right-style: solid;
            border-color: silver;
            border-width: 2px;
        }

        .text-style {
            font-weight: bold;
            font-size: 17px;
        }

        .data {
            font-size: 17px;
        }

        .PVLnavbar-wordDistance {
            padding-left: 30px;
            padding-right: 30px;
        }

        .PVLnavbar-item {
            color: black;
            background-color: inherit;
            font-family: inherit;
        }

        .PVLnavbar-item a:hover {
            color: deepskyblue;
            text-decoration: none;
        }

        .td-No {
            width: 1px;
        }

        .td-long {
            width: 50%;
        }

        .td-shot {
            width: 20%;
        }

        td>a {
            color: black;
            font-weight: bold;
        }

        td>a:hover {
            color: deepskyblue;
            text-decoration: none;
        }

        .characterImgBox {
            width: 80px;
            height: 110px;
            float: left;
            margin-right: 10px;
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
        <?php include('../../userHeader.php');

        $showsID = $_GET['showsID'];

        $result = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'");
        $resultGenre = mysqli_query($db, "SELECT * FROM genreshows WHERE showsID = '$showsID'");

        while ($row = mysqli_fetch_array($result)) {
            $showsName = $row['showsName'];
            $showsPic = $row['showsPic'];
            $showsType = $row['showsType'];
            $episodes = $row['episodes'];
            $showStatus = $row['showStatus'];
            $releaseDate = $row['releaseDate'];
            $finishedDate = $row['finishedDate'];
            $broadcastDay = $row['broadcastDay'];
            $broadcastTime = $row['broadcastTime'];
            $studios = $row['studios'];
            $score = $row['score'];
            $synopsis = $row['synopsis'];
        } ?>

        <div>
            <div class="line-bottom" style="margin-bottom: 10px;background-color:wheat;">
                <h2 style="text-align: justify;"><?= $showsName ?></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-3 line">
                <div>
                    <?php
                    if ($showsPic == "") {
                        echo '<img src="../../../No Image.jpg" alt="No Image.jpg" height="400px" width="280px" style="object-fit: contain;"/>';
                    } else {
                        echo '<img src="http://localhost/PictureIndex/staff_management/shows' . $showsPic . '" alt="' . $showsPic . '" height="400px" width="280px" style="object-fit: contain;"/>';
                    } ?>
                </div>

                <br>
                <h4><strong>Information</strong></h4>
                <hr style="width:100%;height: 1px;text-align:left;margin-left:0;background-color:red;">
                <div class="data">
                    <span class="text-style">Type: </span><?php echo $showsType ?>
                </div>

                <div class="data">
                    <span class="text-style">Episodes: </span>
                    <?php echo $episodes ?>
                </div>

                <div class="data">
                    <span class="text-style">Status: </span><?php echo $showStatus ?>
                </div>

                <div class="data">
                    <span class="text-style">Release Date: </span><?php echo $releaseDate ?>
                </div>

                <div class="data">
                    <span class="text-style">Finished Date: </span><?php echo $finishedDate ?>
                </div>

                <div class="data">
                    <span class="text-style">Broadcast: </span><?php echo $broadcastDay . ', at ' . $broadcastTime ?>
                </div>

                <div class="data">
                    <span class="text-style">Studios: </span><?php echo $studios ?>
                </div>

                <div class="data">
                    <span class="text-style">Genres: </span>
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
                </div>

                <div class="data text-style" style="padding-top: 20px;">
                    <?php
                    $memberID = $_SESSION['id'];
                    $getWatchedEp = mysqli_query($db, "SELECT * FROM personal_watch_list WHERE memberID = '$memberID' AND showsID = '$showsID'");
                    while ($row = mysqli_fetch_array($getWatchedEp)) {
                        $watchedEpisode = $row['watchedEpisode'];
                    }
                    $displayEp = "";
                    if (empty($watchedEpisode)) {
                        $displayEp .= "0";
                    } else {
                        $displayEp .= $watchedEpisode;
                    }
                    ?>
                    <div style="margin-bottom: 5px;">Your watched episode(s):</div>
                    <input class="col-3" type="number" id="epNum" value="<?= $displayEp ?>" min="0" max="<?= $episodes ?>" maxlength="4" />
                    <button class="btn btn-primary" type="submit" id="btnUpdateEp" style="margin-top: 10px;">Update</button>
                </div>
            </div>

            <div class="col-9">
                <div>
                    <div class="container line-bottom col-12">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link focus text-style" style="font-size: 16px;" href="<?= $baseUrl ?>/shows/ShowsProfilePage.php?showsID=<?= $showsID ?>">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-style" style="font-size: 16px;" href="<?= $baseUrl ?>/review/ReviewsPage.php?showsID=<?= $showsID ?>">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-style" style="font-size: 16px;" href="#">Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-style" style="font-size: 16px;" href="#">Forum</a>
                            </li>
                            <li>
                                <?php
                                $getID = $_SESSION['id'];
                                $chkList = mysqli_query($db, "SELECT * FROM personal_watch_list WHERE memberID = '$getID' AND showsID = '$showsID'");

                                while ($row = mysqli_fetch_array($chkList)) {
                                    $personalWatchListID = $row['personalWatchListID'];
                                }

                                if (mysqli_num_rows($chkList) > 0) { ?>
                                    <button type="button" id="btnRemove" name="btnRemove" class="btn btn-danger" style="padding:5px 20px;margin-left: 394px">Remove Show From List</button>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>

                    <div class="col-12 row" style="margin-top: 10px;margin-left: 0px; background-color:bisque">
                        <div class="col-2 line-right" style="text-align: center;">
                            <h4><strong>Score</strong></h4>
                            <?php
                            if ($score != 0.00) { ?>
                                <h2><strong><?php echo $score ?></strong></h2>
                            <?php } else { ?>
                                <h2><strong><?php echo "N/A" ?></strong></h2>
                            <?php }
                            ?>
                        </div>

                        <div class="col-2 line-right" style="text-align: center;">
                            <h4><strong>Ranking</strong></h4>
                            <?php
                            $getRank =  mysqli_query($db, "SELECT showsID, rank from (SELECT showsID, RANK() OVER (ORDER BY score DESC) rank FROM shows)shows WHERE showsID = '$showsID';");
                            while ($row = mysqli_fetch_array($getRank)) {
                                $ranking = $row['rank'];
                            }

                            if ($score != 0.00) { ?>
                                <h2><strong><?php echo $ranking ?></strong></h2>
                            <?php } else { ?>
                                <h2><strong><?php echo "N/A" ?></strong></h2>
                            <?php }
                            ?>
                        </div>

                        <div class="col-2 line-right" style="text-align: center;">
                            <h4><strong>User Add</strong></h4>
                            <?php
                            $rowCount = mysqli_query($db, "SELECT * FROM personal_watch_list WHERE showsID = '$showsID'");
                            $countUser = mysqli_num_rows($rowCount); ?>
                            <h2><strong><?= $countUser ?></strong></h2>
                        </div>

                        <div class="col-3 dropdown" style="padding-top: 20px; padding-left:30px;">
                            <?php
                            $getID = $_SESSION['id'];
                            $chkList = mysqli_query($db, "SELECT * FROM personal_watch_list WHERE memberID = '$getID' AND showsID = '$showsID'");

                            while ($row = mysqli_fetch_array($chkList)) {
                                $watchStatus = $row['watchStatus'];
                            }

                            if (mysqli_num_rows($chkList) <= 0) { ?>
                                <button type="button" id="btnAddShow" name="btnAddShow" value="1" data-id="1" class="btn btn-primary" style="padding:5px 40px;">Add to List</button>
                            <?php } else {
                                switch ($watchStatus) {
                                    case "1":
                                        $btnValue = "1";
                                        $btnName = "Plan to Watch";
                                        break;
                                    case "2":
                                        $btnValue = "2";
                                        $btnName = "Watching";
                                        break;
                                    case "3":
                                        $btnValue = "3";
                                        $btnName = "Complete";
                                        break;
                                } ?>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="padding:5px 40px;" value="<?= $btnValue ?>"><?php echo $btnName ?></button>
                                <ul class="dropdown-menu" id="watchStatus" style="cursor:pointer">
                                    <li class="dropdown-item" value="1">Plan to Watch</li>
                                    <li class="dropdown-item" value="2">Watching</li>
                                    <li class="dropdown-item" value="3">Complete</option>
                                </ul>
                            <?php } ?>
                        </div>

                        <div class="col-3 dropdown" style="padding-top: 20px;">
                            <?php
                            $getID = $_SESSION['id'];
                            $chkList = mysqli_query($db, "SELECT * FROM personal_watch_list WHERE memberID = '$getID' AND showsID = '$showsID'");

                            while ($row = mysqli_fetch_array($chkList)) {
                                $rating = $row['rating'];
                            }

                            if (mysqli_num_rows($chkList) <= 0) { ?>
                                <button type="button" id="btnRating" name="btnRating" class="btn btn-primary" style="padding:5px 40px;">
                                    <img src="<?= $baseUrlIcon ?>/Star.png" style="width:20px;height:20px;"> Rating
                                </button>
                            <?php } else {
                                if (empty($rating)) {
                                    $btnValue = "0";
                                    $btnName = "Rating";
                                } else {
                                    switch ($rating) {
                                        case "1":
                                            $btnValue = "1";
                                            $btnName = "1 - Appalling";
                                            break;
                                        case "2":
                                            $btnValue = "2";
                                            $btnName = "2 - Horrible";
                                            break;
                                        case "3":
                                            $btnValue = "3";
                                            $btnName = "3 - Very Bad";
                                            break;
                                        case "4":
                                            $btnValue = "4";
                                            $btnName = "4 - Bad";
                                            break;
                                        case "5":
                                            $btnValue = "5";
                                            $btnName = "5 - Average";
                                            break;
                                        case "6":
                                            $btnValue = "6";
                                            $btnName = "6 - Fine";
                                            break;
                                        case "7":
                                            $btnValue = "7";
                                            $btnName = "7 - Good";
                                            break;
                                        case "8":
                                            $btnValue = "8";
                                            $btnName = "8 - Very Good";
                                            break;
                                        case "9":
                                            $btnValue = "9";
                                            $btnName = "9 - Great";
                                            break;
                                        case "10":
                                            $btnValue = "10";
                                            $btnName = "10 - Masterpiece";
                                            break;
                                    }
                                } ?>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="padding:5px 30px;" value="<?= $btnValue ?>">
                                    <img src="<?= $baseUrlIcon ?>/Star.png" style="width:20px;height:20px;"> <?php echo $btnName ?>
                                </button>
                                <ul class="dropdown-menu" id="rating" style="cursor:pointer">
                                    <li class="dropdown-item" value="10">10 - Masterpiece</li>
                                    <li class="dropdown-item" value="9">9 - Great</li>
                                    <li class="dropdown-item" value="8">8 - Very Good</li>
                                    <li class="dropdown-item" value="7">7 - Good</li>
                                    <li class="dropdown-item" value="6">6 - Fine</li>
                                    <li class="dropdown-item" value="5">5 - Average</li>
                                    <li class="dropdown-item" value="4">4 - Bad</li>
                                    <li class="dropdown-item" value="3">3 - Very Bad</li>
                                    <li class="dropdown-item" value="2">2 - Horrible</li>
                                    <li class="dropdown-item" value="1">1 - Appalling</li>
                                </ul>
                            <?php } ?>
                        </div>

                    </div>

                    <div class="line-bottom" style="padding-top: 30px;">
                        <h5><strong>Synopsis</strong></h5>
                    </div>
                    <p style="text-align: justify; white-space: pre-line">
                        <?php echo $synopsis ?>
                    </p>

                    <div class="line-bottom" style="padding-top: 30px;">
                        <h5><strong>Characters & Actors</strong></h5>
                    </div>
                    <div class="row" style="margin-left:0px;margin-top: 10px;margin-right: 0px;">
                        <div class="col-6">
                            <table class="table table-striped">
                                <?php
                                $sqlDisplayCharacterLeft = "SELECT * FROM characters WHERE showsID = '$showsID' ORDER BY characterPosition desc LIMIT 5";
                                $displayCharacterLeft = mysqli_query($db, $sqlDisplayCharacterLeft); ?>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($displayCharacterLeft) <= 0) {
                                        echo "Pending to up-to-date...";
                                    } else {
                                        while ($row = mysqli_fetch_array($displayCharacterLeft)) {
                                            $characterPic = "";
                                            $characterName = "";
                                            $actorName = "";
                                            $actorPic = "";
                                            if ($row['characterPic'] == "") {
                                                $characterPic .= "../../../../No Image.jpg";
                                            } else {
                                                $characterPic .= $row['characterPic'];
                                            } ?>

                                            <tr>
                                                <?php $getPicsLink = "http://localhost/PictureIndex/staff_management/character"; ?>
                                                <td><img src="<?php echo $getPicsLink . $characterPic ?>" style="" class="characterImgBox"><?php echo $row['characterName'] ?>
                                                    <br><span style="color: blue; font-size: 13px;"><?php if ($row['characterPosition'] == "1") {
                                                                                                        echo "Main";
                                                                                                    } else {
                                                                                                        echo "Supporting";
                                                                                                    } ?></span>
                                                </td>

                                                <?php
                                                $actorID = $row['actorID'];
                                                $sqlDisplayActor = "SELECT * FROM actors WHERE actorID = '$actorID'";
                                                $displayActor = mysqli_query($db, $sqlDisplayActor);

                                                $rowActor = mysqli_fetch_array($displayActor);
                                                if ($actorID == "") {
                                                    $actorName .= "Unconfirmed";
                                                    $actorPic .= "../../../No Image.jpg";
                                                } else {
                                                    $actorName .= $rowActor['actorName'];
                                                    if ($rowActor['actorPic'] == "") {
                                                        $actorPic .= "../../../No Image.jpg";
                                                    } else {
                                                        $actorPic .= "http://localhost/PictureIndex/staff_management/actor" . $rowActor['actorPic'];
                                                    }
                                                } ?>

                                                <td><?php echo $actorName ?><img src="<?php echo $actorPic ?>" style="width:80px;height:110px;float: right;"></td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-6">
                            <table class="table table-striped">
                                <?php
                                $sqlDisplayCharacterRight = "SELECT * FROM characters WHERE showsID = '$showsID' ORDER BY characterPosition desc LIMIT 5, 5";
                                $displayCharacterRight = mysqli_query($db, $sqlDisplayCharacterRight); ?>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($displayCharacterRight)) {
                                        $characterPic = "";
                                        $characterName = "";
                                        $actorName = "";
                                        $actorPic = "";
                                        if ($row['characterPic'] == "") {
                                            $characterPic .= "../../../../No Image.jpg";
                                        } else {
                                            $characterPic .= $row['characterPic'];
                                        } ?>

                                        <tr>
                                            <?php $getPicsLink = "http://localhost/PictureIndex/staff_management/character"; ?>
                                            <td><img src="<?php echo $getPicsLink . $characterPic ?>" class="characterImgBox"><?php echo $row['characterName'] ?>
                                                <br><span style="color: blue; font-size: 13px;"><?php if ($row['characterPosition'] == "1") {
                                                                                                    echo "Main";
                                                                                                } else {
                                                                                                    echo "Supporting";
                                                                                                } ?></span>
                                            </td>

                                            <?php
                                            $actorID = $row['actorID'];
                                            $sqlDisplayActor = "SELECT * FROM actors WHERE actorID = '$actorID'";
                                            $displayActor = mysqli_query($db, $sqlDisplayActor);

                                            $rowActor = mysqli_fetch_array($displayActor);
                                            if ($actorID == "") {
                                                $actorName .= "Unconfirmed";
                                                $actorPic .= "../../../No Image.jpg";
                                            } else {
                                                $actorName .= $rowActor['actorName'];
                                                if ($rowActor['actorPic'] == "") {
                                                    $actorPic .= "../../../No Image.jpg";
                                                } else {
                                                    $actorPic .= "http://localhost/PictureIndex/staff_management/actor" . $rowActor['actorPic'];
                                                }
                                            } ?>

                                            <td><?php echo $actorName ?><img src="<?php echo $actorPic ?>" style="width:80px;height:110px;float: right;"></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="line-bottom" style="padding-top: 30px;">
                        <?php
                        $name = "";
                        $memberID = $_SESSION['id'];
                        $result = mysqli_query($db, "SELECT * FROM reviews WHERE memberID = '$memberID' AND showsID = '$showsID'");

                        while ($row = mysqli_fetch_array($result)) {
                            $reviewID = $row['reviewID'];
                            $reviewText = $row['reviewText'];
                            $reviewPostedDate = $row['reviewPostedDate'];
                            $reviewPostedTime = $row['reviewPostedTime'];
                        }

                        if (!empty($reviewText)) {
                            $name = "Your Reviews";
                        } else {
                            $name = "Reviews";
                        } ?>
                        <h5><strong><?= $name ?></strong></h5>
                    </div>
                    <div>
                        <form id="postReviews" name="postReviews">
                            <?php
                            $memberID = $_SESSION['id'];
                            $result = mysqli_query($db, "SELECT * FROM reviews WHERE memberID = '$memberID' AND showsID = '$showsID'");

                            while ($row = mysqli_fetch_array($result)) {
                                $reviewID = $row['reviewID'];
                                $reviewText = $row['reviewText'];
                                $reviewPostedDate = $row['reviewPostedDate'];
                                $reviewPostedTime = $row['reviewPostedTime'];
                            } ?>

                            <input type="hidden" id="reviewID" name="reviewID" value="<?= $reviewID ?>" />
                            <input type="hidden" id="showsID" name="showsID" value="<?= $showsID ?>" />
                            <input type="hidden" id="memberID" name="memberID" value="<?= $memberID ?>" />

                            <?php
                            if (!empty($reviewText)) { ?>
                                <button type="submit" id="deleteReview" class="btn btn-danger" style="width: 100px; margin-top: 10px; float: right;">Delete</button>
                                <label style="float: left;margin-right:30px;margin-top: 30px"><strong>Posted date and time : </strong><?php echo $reviewPostedDate . " " . $reviewPostedTime ?></label>
                                <textarea id="reviewText" name="reviewText" rows="7" cols="100%" class="col-12" style="resize: none;margin-top: 10px;" placeholder="Write your own reviews for this show"><?php echo $reviewText ?></textarea>
                                <button type="submit" id="updateReview" class="btn btn-primary" style="width: 100px;">Update</button>
                            <?php } else { ?>
                                <textarea id="reviewText" name="reviewText" rows="7" cols="100%" class="col-12" style="resize: none;margin-top: 10px;" placeholder="Write your own reviews for this show"></textarea>
                                <button type="submit" id="submitReview" class="btn btn-primary" style="width: 100px;">Post</button>
                            <?php } ?>

                            <button type="reset" class="btn btn-secondary" style="width: 100px;">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <?php include "../../userFooter.php"; ?>
</body>

<script src="http://localhost/PictureIndex/src/bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>

<script>
    $(document).ready(function() {
        $("#btnAddShow").click(function(event) {
            event.preventDefault();
            var watchStatus = $(this).data('id')
            var memberID = <?= $_SESSION['id'] ?>;
            var showsID = <?= $showsID ?>;

            $.ajax({
                type: "POST",
                url: "http://localhost/PictureIndex/user_management/personal_watch_list/addShowToList.php",
                data: {
                    watchStatus: watchStatus,
                    memberID: memberID,
                    showsID: showsID,
                },
                dataType: "json",
                success: function(x) {
                    delay = 500
                    Swal.fire(x, '', 'success').then((result => {
                        if (result.isConfirmed) {
                            location.reload();
                        } else {
                            setTimeout(function() {
                                location.reload();
                            }, delay);
                        }
                    }))
                }
            });

        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#watchStatus li").click(function(event) {
            event.preventDefault();
            var watchStatus = $(this).val();
            var memberID = <?= $_SESSION['id'] ?>;
            var showsID = <?= $showsID ?>;
            var watchedEpisode = <?= $episodes ?>;

            $.ajax({
                type: "POST",
                url: "http://localhost/PictureIndex/user_management/personal_watch_list/updateWatchStatus.php",
                data: {
                    watchStatus: watchStatus,
                    memberID: memberID,
                    showsID: showsID,
                    watchedEpisode,
                    watchedEpisode,
                },
                dataType: "json",
                success: function(x) {
                    delay = 500
                    Swal.fire(x, '', 'success').then((result => {
                        if (result.isConfirmed) {
                            location.reload();
                        } else {
                            setTimeout(function() {
                                location.reload();
                            }, delay);
                        }
                    }))
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#btnRating").click(function() {
            Swal.fire('Please add the show first before you give the rating.', '', 'info')
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#rating li").click(function(event) {
            event.preventDefault();
            var rating = $(this).val();
            var memberID = <?= $_SESSION['id'] ?>;
            var showsID = <?= $showsID ?>;

            $.ajax({
                type: "POST",
                url: "http://localhost/PictureIndex/user_management/personal_watch_list/updateRating.php",
                data: {
                    rating: rating,
                    memberID: memberID,
                    showsID: showsID,
                },
                dataType: "json",
                success: function(x) {
                    delay = 500
                    Swal.fire(x, '', 'success').then((result => {
                        if (result.isConfirmed) {
                            location.reload();
                        } else {
                            setTimeout(function() {
                                location.reload();
                            }, delay);
                        }
                    }))
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#btnRemove").click(function(event) {
            event.preventDefault();
            var personalWatchListID = <?= $personalWatchListID ?>;

            Swal.fire({
                title: 'Do you want to remove this show from your watch list?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        type: "POST",
                        url: "http://localhost/PictureIndex/user_management/personal_watch_list/removeShow.php",
                        data: {
                            personalWatchListID: personalWatchListID
                        },
                        dataType: "json",
                        success: function(x) {
                            var delay = 500;
                            if (x == "This show has been successfully removed from your watch list.") {
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

<script>
    $(document).ready(function() {
        $("#btnUpdateEp").click(function(event) {
            event.preventDefault();
            var watchedEpisode = $("#epNum").val()
            var memberID = <?= $_SESSION['id'] ?>;
            var showsID = <?= $showsID ?>;

            $.ajax({
                type: "POST",
                url: "http://localhost/PictureIndex/user_management/personal_watch_list/updateWatchedEpisode.php",
                data: {
                    watchedEpisode: watchedEpisode,
                    memberID: memberID,
                    showsID: showsID,
                },
                dataType: "json",
                success: function(x) {
                    delay = 500
                    Swal.fire(x, '', 'success').then((result => {
                        if (result.isConfirmed) {
                            location.reload();
                        } else {
                            setTimeout(function() {
                                location.reload();
                            }, delay);
                        }
                    }))
                }
            });

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#submitReview').click(function(event) {
            event.preventDefault();
            var form = $('#postReviews');
            var formData = new FormData(form[0]);

            $.ajax({
                type: "POST",
                url: "http://localhost/PictureIndex/user_management/review/addReview.php",
                processData: false,
                contentType: false,
                data: formData,
                dataType: "json",
                success: function(x) {
                    var delay = 500;
                    if (x == "Your review has posted successfully.") {
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
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#updateReview').click(function(event) {
            event.preventDefault();
            var form = $('#postReviews');
            var formData = new FormData(form[0]);

            $.ajax({
                type: "POST",
                url: "http://localhost/PictureIndex/user_management/review/updateReview.php",
                processData: false,
                contentType: false,
                data: formData,
                dataType: "json",
                success: function(x) {
                    var delay = 500;
                    if (x == "Your review has been updated.") {
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
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#deleteReview').click(function(event) {
            event.preventDefault();
            var form = $('#postReviews');
            var formData = new FormData(form[0]);

            Swal.fire({
                title: 'Do you confirm want to delete your review for this show?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        type: "POST",
                        url: "http://localhost/PictureIndex/user_management/review/deleteReview.php",
                        processData: false,
                        contentType: false,
                        data: formData,
                        dataType: "json",
                        success: function(x) {
                            var delay = 500;
                            if (x == "Your review has been deleted.") {
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