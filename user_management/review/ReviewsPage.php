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

        .characterImgBox {
            width: 80px;
            height: 110px;
            float: left;
        }

        .colNo {
            width: 10px;
            text-align: center
        }

        .colPic {
            width: 10%;
            text-align: center
        }

        .colName {
            width: 10%;
            text-align: left
        }

        table tr:nth-child(1) {
            counter-reset: rowNumber;
        }

        table th {
            counter-increment: rowNumber;
        }

        table tr td:first-child::before {
            content: counter(rowNumber);
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

            </div>

            <div class="col-9">
                <div>
                    <div class="container line-bottom col-12">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link text-style" style="font-size: 16px;" href="<?= $baseUrl ?>/shows/ShowsProfilePage.php?showsID=<?= $showsID ?>">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link focus text-style" style="font-size: 16px;" href="<?= $baseUrl ?>/review/ReviewsPage.php?showsID=<?= $showsID ?>">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-style" style="font-size: 16px;" href="#">Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-style" style="font-size: 16px;" href="#">Forum</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-12 row" style="margin-top: 10px;margin-left: 0px;">
                        <table class="table table-bordered table-striped">
                            <?php
                            $sqlDisplayReviews = "SELECT members.memberPics, members.memberName, reviews.reviewText, reviews.reviewPostedDate, reviews.reviewPostedTime FROM reviews INNER JOIN members ON reviews.memberID = members.memberID WHERE reviews.showsID = '$showsID' ORDER BY reviewID asc";
                            $displayReviews = mysqli_query($db, $sqlDisplayReviews); ?>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($displayReviews) <= 0) {
                                    echo "No one review yet.";
                                } else {
                                    while ($row = mysqli_fetch_array($displayReviews)) {
                                        $memberPics = "";

                                        if ($row['memberPics'] == "") {
                                            $memberPics .= "../../../../No Image.jpg";
                                        } else {
                                            $memberPics .= $row['memberPics'];
                                        } ?>
                                        <th colspan="4"><?php echo $row['reviewPostedDate'] . " " . $row['reviewPostedTime'] ?></th>
                                        <tr>
                                            <?php $getPicsLink = "http://localhost/PictureIndex/staff_management/member"; ?>
                                            <td class="colNo"></td>
                                            <td class="colPic"><img src="<?php echo $getPicsLink . $memberPics ?>" class="characterImgBox"></td>
                                            <td class="colName"><?php echo $row['memberName'] ?></td>
                                            <td><?php echo $row['reviewText'] ?></td>
                                        </tr>

                                <?php }
                                }
                                ?>
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
    <?php include "../../userFooter.php"; ?>
    </div>

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

</body>

</html>