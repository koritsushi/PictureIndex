<!DOCTYPE html>
<html lang="en">

<?php include('../../staffHead.php');
$baseUrl = 'http://localhost/PictureIndex/staff_management/shows'; ?>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 70%;
            margin-left: 220px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding-top: 8px;
            padding-bottom: 8px;
            border-color: skyblue;
        }

        th {
            background-color: lightskyblue;
        }

        th:hover {
            cursor: context-menu;
            background-color: lightskyblue;
        }

        tr:nth-child(even) {
            background-color: powderblue
        }

        tr:hover {
            background-color: cornflowerblue;
            cursor: pointer;
        }

        .colNo {
            width: 10px;
            text-align: center
        }

        .colId {
            width: 90px;
            text-align: center
        }

        .colPic {
            width: 15%;
            text-align: center
        }

        .colName {
            width: 40%;
            text-align: center
        }

        table tr:nth-child(1) {
            counter-reset: rowNumber;
        }

        table tr {
            counter-increment: rowNumber;
        }

        table tr td:first-child::before {
            content: counter(rowNumber);

        }
    </style>

    <script>
        function loadTable() {
            var txt = $('#searchBox').val();
            $.ajax({
                url: "searchShowsInGenre.php",
                method: "post",
                data: {
                    search: txt,
                    genreID: '<?= $_GET['genreID'] ?? '' ?>',
                },
                dataType: "text",
                success: function(data) {
                    if (data != '') {
                        $('#list').html(data);
                    } else {
                        $('#list').html('');
                    }
                }
            })
        }

        window.onload = loadTable;
    </script>

</head>

<body>
    <div class="wrapper">
        <?php include('../../staffHeader.php') ?>

        <div style="margin-bottom: 50px;">
            <?php include "../../dbConn.php";

            $genreID = $_GET['genreID'] ?? '';

            $result = mysqli_query($db, "SELECT * FROM genreshows WHERE genreID = '$genreID'");
            $getGenreName = mysqli_query($db, "SELECT * FROM genres WHERE genreID = '$genreID'");
            ?>

            <div class="form-inline">
                <h2 style="margin-top: 20px;">
                    <?php if (mysqli_num_rows($getGenreName) > 0) {
                        while ($row = mysqli_fetch_array($getGenreName)) {
                            echo $row['genreName'];
                        }
                    } ?>
                </h2>
            </div>
            <hr style="width:100%;height: 1px;text-align:left;margin-left:0;background-color:darkturquoise;">

            <div class="form-inline">
                <input type="text" class="form-control" style="margin-left: 34%;" size="50" placeholder="Enter show's Name or ID" onkeyup="myFunction()" name="searchBox" id="searchBox" autofocus>
            </div>
            </br>

            <div id="list"></div>

            <?php mysqli_close($db); ?>

            <button class="btn btn-secondary col-2" style="margin-top: 20px; margin-left: 42%" onclick="history.back();">Back</button>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#searchBox').keyup(function() {
                loadTable();
            });
        });
    </script>

</html>