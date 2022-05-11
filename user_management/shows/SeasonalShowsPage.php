<!DOCTYPE html>
<html lang="en">

<?php include('../../userHead.php');
include "../../dbConn.php";
$baseUrl = 'http://localhost/PictureIndex';
$distUrl = 'http://localhost/PictureIndex/dist/'; ?>

<head>
    <style>
        .focus {
            background-color: bisque;
        }

        .line-bottom {
            border-bottom-style: solid;
            border-color: red;
            border-width: 2px;
        }

        .text-style {
            font-weight: bold;
            font-size: 17px;
            color: #e60000;
        }

        .displayShows {
            border: 1px solid black;
            text-align: center;
            margin-left: 76px;
            margin-top: 20px;
        }

        .displayShows:hover {
            cursor: pointer;
        }

        .showsTitle {
            border-bottom: 1px solid red;
            max-width: 240px;
            color: blue;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .yearTitle {
            margin-top: 20px;
            color: #e60000;
            border-bottom-style: solid;
            border-color: red;
            border-width: 2px;
        }

        .seasonTitle {
            margin-top: 20px;
            color: #e60000;
            background-color: wheat;
        }
    </style>

    <link rel="stylesheet" href="<?= $distUrl ?>sweetalert2.css">
</head>

<body>
    <div class="wrapper">
        <?php include('../../userHeader.php');
        if (!empty($_GET['getCurrentYear']) && empty($_GET['getSelectYear'])) {
            $getSelectYear = $_GET['getCurrentYear'];
        } else {
            $getSelectYear = $_GET['getSelectYear'];
        }

        $sqlSearch = "SELECT showsID, showsName, showsPic, MONTH(STR_TO_DATE(releaseDate, '%d/%m/%Y')) showsMonth, YEAR(STR_TO_DATE(releaseDate, '%d/%m/%Y')) showsYear FROM shows WHERE status = '1' ORDER BY showsName";
        $sqlDateYear = "SELECT YEAR(STR_TO_DATE(releaseDate, '%d/%m/%Y')) getYear, MONTH(STR_TO_DATE(releaseDate, '%d/%m/%Y')) getMonth FROM shows WHERE status = '1' GROUP BY YEAR(STR_TO_DATE(releaseDate, '%d/%m/%Y')) desc";

        $resultSearch = mysqli_query($db, $sqlSearch);
        $resultYear = (mysqli_query($db, $sqlDateYear));
        ?>

        <div>
            <div class="line-bottom" style="margin-top: 10px; margin-bottom: 10px;">
                <h2 style="text-align: justify;">Seasonal Shows</h2>
            </div>
        </div>

        <div class="container line-bottom col-12">
            <ul class="nav">
                <?php
                while ($row = mysqli_fetch_assoc($resultYear)) {
                    $getYear = $row['getYear'];
                    $getMonth = $row['getMonth']; ?>
                    <li class="nav-item">
                        <a class="nav-link text-style" style="font-size: 16px;" href="SeasonalShowsPage.php?getSelectYear=<?= $getYear ?>"><?= $getYear ?></a>
                    </li>
                <?php }
                ?>
            </ul>
        </div>

        <h2 class="yearTitle"><?= $getSelectYear ?></h2>
        <h3 class="seasonTitle">Winter (Jan - Mar)</h3>
        <div class="row">
            <?php
            $resultSearch = mysqli_query($db, $sqlSearch);

            while ($row = mysqli_fetch_array($resultSearch)) {
                $showsMonth = $row['showsMonth'];
                $showsYear = $row['showsYear'];

                if ($showsMonth >= 1 && $showsMonth <= 3 && $showsYear == $getSelectYear) {
                    include "seasonalShowsDisplay.php";
                }
            }
            ?>
        </div>

        <h3 class="seasonTitle">Spring (Apr - Jun)</h3>
        <div class="row">
            <?php
            $resultSearch = mysqli_query($db, $sqlSearch);

            while ($row = mysqli_fetch_array($resultSearch)) {
                $showsMonth = $row['showsMonth'];
                $showsYear = $row['showsYear'];

                if ($showsMonth >= 4 && $showsMonth <= 6 && $showsYear == $getSelectYear) {
                    include "seasonalShowsDisplay.php";
                }
            }
            ?>
        </div>

        <h3 class="seasonTitle">Summer (Jul - Sep)</h3>
        <div class="row">
            <?php
            $resultSearch = mysqli_query($db, $sqlSearch);

            while ($row = mysqli_fetch_array($resultSearch)) {
                $showsMonth = $row['showsMonth'];
                $showsYear = $row['showsYear'];

                if ($showsMonth >= 7 && $showsMonth <= 9 && $showsYear == $getSelectYear) {
                    include "seasonalShowsDisplay.php";
                }
            }
            ?>
        </div>

        <h3 class="seasonTitle">Fall (Oct - Dec)</h3>
        <div class="row">
            <?php
            $resultSearch = mysqli_query($db, $sqlSearch);

            while ($row = mysqli_fetch_array($resultSearch)) {
                $showsMonth = $row['showsMonth'];
                $showsYear = $row['showsYear'];

                if ($showsMonth >= 10 && $showsMonth <= 12 && $showsYear == $getSelectYear) {
                    include "seasonalShowsDisplay.php";
                }
            } ?>
        </div>

        <?php include "../../userFooter.php"; ?>
    </div>

    <script>
        $(document).ready(function() {
            $('table').click(function() {
                var id = $(this).attr('id');
                var url = new URL('http://localhost/PictureIndex/user_management/shows/ShowsProfilePage.php');

                url.searchParams.set('showsID', id)
                window.location.href = url

                return false;
            });
        });
    </script>

</body>

</html>