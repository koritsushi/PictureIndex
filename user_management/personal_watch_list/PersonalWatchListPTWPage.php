<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../../userHead.php');
    include "../../dbConn.php";
    $baseUrl = 'http://localhost/PictureIndex/user_management';
    $baseUrlIcon = 'http://localhost/PictureIndex/Icon';
    $distUrl = 'http://localhost/PictureIndex/dist/'; ?>

    <style>
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

        th {
            text-align: center;
        }

        .td-No {
            width: 1px;
            text-align: center;
        }

        .td-long {
            width: 45%;
            text-align: justify;
        }

        .td-shot {
            width: 15%;
            text-align: center;
        }

        .table-hover tbody tr:hover td {
            background-color: deepskyblue;
            cursor: pointer;
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
            var memberID = <?= $_SESSION['id'] ?>;
            if (txt == '' || txt != '') {
                $.ajax({
                    url: "searchPTWShows.php",
                    method: "post",
                    data: {
                        search: txt,
                        memberID: memberID,
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

        <div style="margin-top:20px">

            <?php include "statusNavbarPWL.php"; ?>

            <div style="margin-top:10px;">

                <div id="list"></div>

            </div>
        </div>

        <?php include "../../userFooter.php"; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#searchBox').keyup(function() {
                loadTable()
            });
        });
    </script>
</body>

</html>