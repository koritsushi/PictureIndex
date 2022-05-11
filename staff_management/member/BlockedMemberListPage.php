<!DOCTYPE html>
<html lang="en">

<?php include('../../staffHead.php') ?>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
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
            if (txt == '' || txt != '') {
                $.ajax({
                    url: "searchDeactivate.php",
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

</head>

<body>
    <div class="wrapper">
        <?php include('../../staffHeader.php') ?>

        <div style="margin-bottom: 50px;">
            <div class="form-inline">
                <h2 style="margin-top: 20px;">Blocked Member Account List</h2>
            </div>

            <hr style="width:100%;height: 1px;text-align:left;margin-left:0;background-color:darkturquoise;">
            <?php include "../../dbConn.php"; ?>

            <div class="form-inline">
                <input type="text" class="form-control" style="margin-left: 34%;" size="50" placeholder="Enter member Name or ID" name="searchBox" id="searchBox" autofocus>
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