    <style>
        body {
            overflow-x: hidden;
        }

        .wrapper {
            margin-right: auto;
            margin-left: auto;
            max-width: 1400px;
            padding-left: 14px;
            padding-right: 14px;
        }

        .navbar-wordDistance,
        .form-inline {
            padding-left: 30px;
            padding-right: 30px;
        }

        .navbar a {
            color: black;
            padding: 15px 83.4px;
        }

        .navbar-item {
            color: black;
            background-color: inherit;
            font-family: inherit;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            font-size: 12px;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ff9900;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .shoppingcart {
            float: right;
            margin-right: 40px;
            margin-top: 65px;
        }

        .userLogStat {
            float: right;
            margin-right: 120px;
            margin-top: 80px;
        }

        footer {
            border-top: 5px outset #e60000;
            margin-top: 50px;
        }

        .footerInfo {
            margin-top: 30px;
            margin-left: 50px;
        }

        .footerItem {
            float: left;
            padding-top: 3vh;
            padding-left: 50px;
            padding-right: 50px;
        }

        footer>div>div>p>a {
            color: black;
        }

        footer>div>div>p>a:hover {
            color: #ff9900;
        }
    </style>

    <?php $baseUrl = 'http://localhost/PictureIndex/user_management';
    $baseUrlIcon = 'http://localhost/PictureIndex/Icon';
    $baseUrlHeader = 'http://localhost';
    include "../../dbConn.php";

    $currentDate = date("Y/m/d");
    $getCurrentYear = date("Y", strtotime($currentDate));
    ?>

    <header>
        <div>
            <a class="navbar-brand" href="<?= $baseUrl ?>/shows/CurrentSeasonShowsPage.php"><img src="<?= $baseUrlHeader ?>/logo.png" alt="PictureIndex" style="width:250px;height:100px;"></a>

            <div class="dropdown navbar-item userLogStat">
                <?php
                $memberID = $_SESSION['id'];
                $result = mysqli_query($db, "SELECT * FROM members WHERE memberID = '$memberID'");

                while ($row = mysqli_fetch_array($result)) {
                    $memberID = $row['memberID'];
                    $memberName = $row['memberName'];
                }
                echo $memberName; ?>
                <div class="dropdown-content">
                    <a class="nav-link" href="<?= $baseUrl ?>/member/MemberProfilePage.php?memberID=<?= $memberID ?>">PROFILE</a>
                    <a class="nav-link" href="<?= $baseUrl ?>/personal_watch_list/PersonalWatchListHomePage.php">PERSONAL WATCH LIST</a>
                    <a class="nav-link" href="http://localhost/PictureIndex/memberLogin/memberLogout.php">LOGOUT</a>
                </div>
            </div>


        </div>

        <nav class="navbar navbar-expand-sm bg-danger navbar-light">
            <div class="dropdown navbar-wordDistance navbar-item">
                SHOWS
                <div class="dropdown-content">
                    <a class="nav-link" href="<?= $baseUrl ?>/shows/CurrentSeasonShowsPage.php">CURRENT SEASON SHOWS</a>
                    <a class="nav-link" href="<?= $baseUrl ?>/shows/TopShowsPage.php">TOP SHOWS</a>
                    <a class="nav-link" href="<?= $baseUrl ?>/shows/SeasonalShowsPage.php?getCurrentYear=<?= $getCurrentYear ?>">SEASONAL SHOWS</a>
                </div>
            </div>


            <div class="dropdown navbar-wordDistance navbar-item" onclick="location.href='<?= $baseUrl ?>/personal_watch_list/PersonalWatchListHomePage.php';" style="cursor: pointer;">
                PERSONAL WATCH LIST
                <div class="dropdown-content">
                    <a class="nav-link" href="<?= $baseUrl ?>/personal_watch_list/PersonalWatchListWatchingPage.php">WATCHING</a>
                    <a class="nav-link" href="<?= $baseUrl ?>/personal_watch_list/PersonalWatchListCompletePage.php">COMPLETE</a>
                    <a class="nav-link" href="<?= $baseUrl ?>/personal_watch_list/PersonalWatchListPTWPage.php">PLAN TO WATCH</a>
                </div>
            </div>

            <div class="form-inline">
                <input type="text" class="form-control" size="26" placeholder="Search" name="searchBox" id="searchBox">
                <button class="btn btn-warning" style="margin-left: 5px;" type="submit"><img src="<?= $baseUrlIcon ?>/Search_Icon.png" width="20px" height="20px"></button>
            </div>
        </nav>

    </header>