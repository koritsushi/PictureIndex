<!DOCTYPE html>
<html lang="en">

<?php include('../../staffHead.php');
$distUrl = 'http://localhost/PictureIndex/dist/'; ?>

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

        <div>
            <h2 style="margin-top: 20px;">Add New Show</h2>
            <hr style="width:100%;height: 1px;text-align:left;margin-left:0;background-color:darkturquoise;">

            <form class="row" id="addShowForm" name="addShowForm">

                <div class="col-3">
                    <img class="imgBox" id="blah" src="../../../No Image.jpg" alt="Profile Picture" />
                    <p>Click on the "Choose File" button to upload a file :</p>
                    <input type="file" id="showsPic" name="showsPic">
                </div>

                <div class="col-9">
                    <h3>Show Details</h3>
                    <hr style="width:100%;height: 1px;text-align:left;margin-left:0;background-color:darkturquoise;">

                    <div>
                        <label for="showsName" class="mb-2 mr-sm-2">Show's Name<span style="color: red;">&nbsp;*</span> &emsp;&ensp;:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" size="100" id="showsName" placeholder="Enter show's name" name="showsName" required>
                    </div>
                    </br>

                    <div class="form-inline dropdown">
                        <label for="showStatus" class="mb-2 mr-sm-2">Show's Status &emsp;&nbsp;:</label>
                        <select class="form-control" name="showStatus" id="showStatus">
                            <option value="On Aired">On Aired</option>
                            <option value="Finish Aired">Finish Aired</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>
                    </br>

                    <div class="form-inline dropdown">
                        <label for="showType" class="mb-2 mr-sm-2">Show's Type<span style="color: red;">&nbsp;*</span> &emsp;&ensp;&ensp;:</label>
                        <select class="form-control" name="showType" id="showType">
                            <option value="0">---Select the type of the show---</option>
                            <option value="TV Shows">TV Shows</option>
                            <option value="Movie">Movie</option>
                            <option value="Online Shows">Online Shows</option>
                        </select>
                    </div>
                    </br>

                    <div class="form-inline">
                        <label for="episodes" class="mb-2 mr-sm-2">Episode(s)<span style="color: red;">&nbsp;*</span> &emsp;&emsp;&emsp;:</label>
                        <input type="number" step="0" min="0" class="form-control mb-2 mr-sm-2" id="episodes" name="episodes" placeholder="Enter episodes" required>
                        <label>&nbsp;(If have choose<span style="color: blue;">&nbsp;"N/A"</span>&nbsp;or&nbsp;<span style="color: blue;">"On Aired"</span>&nbsp;in&nbsp;<span style="color: red;">"Show's Status"</span>, can just leave it be&nbsp;<span style="color:limegreen">"Blank"</span>.)</label>
                    </div>
                    </br>

                    <div class="form-inline" style="padding-top: 10px;">
                        <label for="releaseDate" style="padding-right: 10px;">Release Date<span style="color: red;">&nbsp;*</span> &emsp;&emsp;: </label>
                        <input class="form-control" type="date" id="releaseDate" name="releaseDate" required>
                    </div>
                    </br>

                    <div class="form-inline" style="padding-top: 10px;">
                        <label for="finishedDate" style="padding-right: 10px;">Finished Date<span style="color: red;">&nbsp;*</span> &emsp;&ensp;&nbsp;: </label>
                        <input class="form-control" type="date" id="finishedDate" name="finishedDate" min="" required>
                        <label>&nbsp;(If have choose&nbsp;<span style="color: blue;">"On Aired"</span>&nbsp;in&nbsp;<span style="color: red;">"Show's Status"</span>, can just leave it be&nbsp;<span style="color:limegreen">"Blank"</span>.)</label>
                    </div>
                    </br>

                    <div class="form-inline" style="padding-top: 10px;">
                        <label for="broadcastTime" style="padding-right: 10px;">Aired Time<span style="color: red;">&nbsp;*</span> &emsp;&emsp;&emsp;: </label>
                        <input class="form-control" type="time" id="broadcastTime" name="broadcastTime" required>
                    </div>
                    </br>

                    <div class="form-inline" style="padding-top: 10px;">
                        <div class="form-inline">
                            <label for="studios" style="padding-right: 10px;">Studio<span style="color: red;">&nbsp;*</span> &emsp;&emsp;&emsp;&emsp;&emsp;: </label>
                            <select class="form-control" name="studios" id="studios">
                                <option value="0">---Select studio---</option>
                                <?php
                                include('../../dbConn.php');

                                $result = mysqli_query($db, "SELECT * FROM shows GROUP BY studios ORDER BY studios "); ?>
                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                    <option id="studio" name="studio" value="<?php echo $row['studios'] ?>"><?php echo $row['studios'] ?></option>
                                <?php
                                } ?>
                            </select>
                            <label style="margin-left: 20px;">Or</label>
                            <input type="text" class="form-control" style="margin-left: 20px;" id="newStudios" name="newStudios" placeholder="Enter studio's name" required>
                        </div>
                    </div>
                    </br>

                    <div class="form-inline" style="padding-top:10px;">
                        <label for="synopsis" style="padding-right: 10px;">Synopsis<span style="color: red;">&nbsp;*</span> &emsp;&emsp;&emsp;&emsp;: </label>
                        <textarea id="synopsis" name="synopsis" rows="10" cols="45" style="resize: none;" placeholder="Enter synopsis" class="form-control mb-2 mr-sm-3 col-8 form_data" required></textarea>
                    </div>
                    </br>

                    <div class="form-inline row" style="padding-top:10px;">
                        <label for="genres" class="col-2" style="padding-right: 10px;">Genres<span style="color: red;">&nbsp;*</span> &emsp;&emsp;&emsp;&emsp;&emsp;: </label>
                        <?php
                        include('../../dbConn.php');

                        $result = mysqli_query($db, "SELECT * FROM genres ORDER BY genreName"); ?>
                        <div class="form-inline col-9">
                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <div class="form-inline">
                                    <input type="checkbox" style="margin-left: 15px;" id="genres[]" name="genres[]" value="<?php echo $row['genreID'] ?>">
                                    <label style="margin-left: 3px;"><?php echo $row['genreName'] ?></label>
                                </div>
                            <?php
                            } ?>
                        </div>

                    </div>
                    </br>

                    <div class="col-12" style="padding-top: 30px;padding-bottom: 50px;">
                        <button name="submit" id="submit" class="btn btn-primary col-2">Add</button>
                        <button type="reset" class="btn btn-secondary col-2" onclick="history.back()">Cancel</button>
                    </div>

                </div>

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
                    title: 'Do you want to add this show information?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: "POST",
                            url: "showsAddValidation.php",
                            processData: false,
                            contentType: false,
                            data: formData,
                            dataType: "json",
                            success: function(x) {
                                var delay = 2000;
                                if (x == "New Show has successfully added.") {
                                    Swal.fire(x, '', 'success').then((result => {
                                        if (result.isConfirmed) {
                                            window.location = "ShowsListPage.php";
                                        } else {
                                            setTimeout(function() {
                                                window.location = "ShowsListPage.php";
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