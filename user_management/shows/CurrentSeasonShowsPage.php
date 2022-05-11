<!DOCTYPE html>
<html lang="en">

<?php 
include('../../userhead.php');
include "../../dbConn.php";
$baseUrl = 'http://localhost/PictureIndex';
$distUrl = 'http://localhost/PictureIndex/dist/'; ?>

<head>
    <style>
        .line-bottom {
            border-bottom-style: solid;
            border-color: red;
            border-width: 2px;
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

        .format-pre pre {
            padding: 10px;
            font-size: 16px;
            text-align: left;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
        }
    </style>

    <script>
        function loadTable() {
            var txt = $('#searchBox').val();
            if (txt == '' || txt != '') {
                $.ajax({
                    url: "searchCurrentSeason.php",
                    method: "post",
                    data: {
                        search: txt
                    },
                    dataType: "text",
                    success: function(data) {
                        $('#list').html(data);
                    }
                })
            } else {
                $('#list').html('');
            }
        }
        window.onload = loadTable;
    </script>

    <link rel="stylesheet" href="<?= $distUrl ?>sweetalert2.css">
    <link rel="stylesheet" href="http://localhost/PictureIndex/StyleSheet.css">
</head>

<body>
    <div class="wrapper">
        <?php include('../../userHeader.php'); ?>

        <div>
            <div class="line-bottom" style="margin-top: 10px; margin-bottom: 10px;">
                <h2 style="text-align: justify;">Current Season Shows</h2>
            </div>
        </div>

        <div class="row" id="list"></div>

        <?php include "../../userFooter.php"; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?= $distUrl ?>sweetalert2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#searchBox').keyup(function() {
                loadTable()
            });
        });
    </script>

</html>