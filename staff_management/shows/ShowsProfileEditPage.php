<!DOCTYPE html>
<html lang="en">

<?php include('../../staffHead.php');
$distUrl = 'http://localhost/PictureIndex/dist/' ?>

<head>
    <style>
        .imgBox {
            height: 340px;
            width: 250px;
            text-align: center;
            color: darkcyan;
            object-fit: contain;
        }

        .profile-pic {
            float: left;
        }

        label {
            font-weight: bold;
        }

        .insertInfo {
            padding-left: 30px;
        }

        .validation {
            margin-left: 95px;
            margin-bottom: 10px;
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
        <?php include('../../staffHeader.php') ?>

        <?php include "../../dbConn.php";

        $showsID = $_GET['showsID'];

        $result = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'");
        ?>

        <div>
            <h2 style="margin-top: 20px;">Edit Show Information</h2>
            <hr style="width:100%;height: 1px;text-align:left;margin-left:0;background-color:darkturquoise;">

            <form class="row" id="addShowForm" name="addShowForm">

                <?php include('editShowPageLoad.php') ?>

                <input type="hidden" id="showsID" name="showsID" value="<?php echo $showsID ?>">

            </form>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="<?= $distUrl ?>sweetalert2.min.js"></script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#showsPic").change(function() {
            readURL(this);
        });
    </script>

    <script>
        document.getElementById("releaseDate").onchange = function() {
            var input = document.getElementById("finishedDate");
            input.setAttribute("min", this.value);
        }
    </script>

    <script>
        $(document).ready(function() {
            $("#submit").click(function(event) {
                event.preventDefault();
                var form = $("#addShowForm");
                var formData = new FormData(form[0]);
                formData.append("showsPic", $('#showsPic')[0].files[0]);

                Swal.fire({
                    title: 'Do you want to update the changes?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: "POST",
                            url: "showsEditValidation.php",
                            processData: false,
                            contentType: false,
                            data: formData,
                            dataType: "json",
                            success: function(x) {
                                var delay = 2000;                                
                                if (x == "Shows Information has been updated successfully.") {
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