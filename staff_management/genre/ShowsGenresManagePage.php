<!DOCTYPE html>
<html lang="en">

<?php include('../../staffHead.php');
$distUrl = 'http://localhost/PictureIndex/dist/';  ?>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 50%;
            margin-left: 30%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            border-color: skyblue
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

        label {
            font-weight: bold;
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
                    url: "searchGenre.php",
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
</head>

<body>
    <div class="wrapper">
        <?php include('../../staffHeader.php') ?>

        <div>
            <h2 style="margin-top: 20px;">Show's Genres Manage Page</h2>
            <hr style="width:100%;height: 1px;text-align:left;margin-left:0;background-color:darkturquoise;">

            <div class="row" style="margin-bottom: 50px;">

                <div class="col-7">

                    <div class="form-inline">
                        <input type="text" class="form-control" style="margin-left: 36%;" size="30" placeholder="Enter genre name" onkeyup="myFunction()" name="searchBox" id="searchBox" autofocus>
                    </div>
                    </br>
                    <div id="list"></div>

                </div>

                <div class="col-5">
                    <h3>Add New Show's Genre</h3>
                    <hr style="width:100%;height: 1px;text-align:left;margin-left:0;background-color:darkturquoise;">

                    <div>
                        <label for="genreName" class="mr-sm-2">Genre's Name :</label>
                        <input type="text" class="form-control mr-sm-2" id="genreName" name="genreName" placeholder="Enter new show's genre">
                        <div style="margin-top: 10px;">
                            <button name="submit" id="submit" class="btn btn-primary">Add</button>
                            <button type="reset" id="reset" class="btn btn-secondary" style="margin-left: 10px;">Reset</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="<?= $distUrl ?>sweetalert2.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#reset").click(function() {
                document.getElementById("genreName").value = "";
                $("#genreName").focus();
            })
        })
    </script>

    <script>
        var input = document.getElementById("genreName");
        input.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("submit").click();
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#submit").click(function() {
                var nameValue = $("#genreName").val()

                Swal.fire({
                    title: 'Do you want to add this genre?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: "POST",
                            url: "addGenre.php",
                            data: {name: nameValue},
                            dataType: "json",
                            success: function(x) {
                                var delay = 500;                                
                                if (x == "New Genre has successfully added.") {
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
            $('#searchBox').keyup(function() {
                loadTable()
            });
        });
    </script>

</body>

</html>