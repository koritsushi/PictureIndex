<!DOCTYPE html>
<html lang="en">

<head>
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

        .navbar-wordDistance {
            padding-left: 18px;
            padding-right: 18px;
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
            background-color: cornflowerblue;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .userLogStat {
            float: right;
            margin-right: 100px;
            margin-top: 80px;
        }
    </style>

</head>

<body>
    <?php include "dbConn.php";
    $baseUrl = 'http://localhost/PictureIndex/staff_management'; ?>

    <header>
        <div>
            <a class="navbar-brand" href="<?= $baseUrl ?>/StaffManagementHomePage.php"><img src="http://localhost/logo.png" alt="PictureIndex" style="width:250px;height:100px;"></a>

            <div class="dropdown navbar-item userLogStat">
                <?php
                $staffID = $_SESSION['id'];
                $result = mysqli_query($db, "SELECT * FROM staff WHERE staffID = '$staffID'");

                while ($row = mysqli_fetch_array($result)) {
                    $staffID = $row['staffID'];
                    $staffName = $row['staffName'];
                    $staffRole = $row['staffRole'];
                }
                echo $staffName; ?>
                
                <div class="dropdown-content">
                    <a class="nav-link" href="<?= $baseUrl ?>/staff/StaffProfilePage.php?staffID=<?= $staffID ?>">PROFILE</a>
                    <?php
                    if ($staffRole == "Admin") { ?>
                        <a class="nav-link" href="<?= $baseUrl ?>/staff/StaffProfileEditPage.php?staffID=<?= $staffID ?>">MODIFY INFO</a>
                   <?php } ?>
                    <a class="nav-link" href="http://localhost/PictureIndex/staffLogout.php">LOGOUT</a>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-sm bg-primary navbar-light">

            <div class="dropdown navbar-wordDistance navbar-item">
                SHOWS
                <div class="dropdown-content">
                    <a class="nav-link" href="<?= $baseUrl ?>/shows/ShowsListPage.php">SHOWS LIST</a>
                    <a class="nav-link" href="<?= $baseUrl ?>/shows/AddNewShowPage.php">ADD NEW SHOWS</a>
                    <a class="nav-link" href="<?= $baseUrl ?>/genre/ShowsGenresManagePage.php">SHOW'S GENRES MANAGE</a>
                    <a class="nav-link" href="<?= $baseUrl ?>/shows/DisableShowsListPage.php">DISABLE SHOWS LIST</a>
                </div>
            </div>

            <div class="dropdown navbar-wordDistance navbar-item" style="cursor:pointer;" onclick="location.href='<?= $baseUrl ?>/member/MemberListPage.php';">
                MEMBER ACCOUNT
            </div>

            <div class="dropdown navbar-wordDistance navbar-item" style="cursor:pointer;" onclick="location.href='<?= $baseUrl ?>/member/BlockedMemberListPage.php';">
                BANNED ACCOUNT
            </div>

        </nav>

    </header>
</body>