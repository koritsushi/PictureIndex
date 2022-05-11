<!DOCTYPE html>
<html lang="en">

<?php include('../../staffHead.php');
$distUrl = 'http://localhost/PictureIndex/dist/';
?>

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

        $memberID = $_GET['memberID'];

        $result = mysqli_query($db, "SELECT * FROM members WHERE memberID = '$memberID'");
        ?>

        <div>
            <h2 style="margin-top: 20px;">Edit Member Information</h2>
            <hr style="width:100%;height: 1px;text-align:left;margin-left:0;background-color:darkturquoise;">

            <form class="row" id="editMemberForm" name="editMemberForm" novalidate>

                <?php include('editMemberPageLoad.php') ?>

                <input type="hidden" id="memberID" name="memberID" value="<?php echo $memberID ?>">

                <div class="col-8" style="padding-top: 30px;padding-bottom: 50px;margin-left:30%;">
                    <button name="submit" id="submit" class="btn btn-primary col-2">Update</button>
                    <button type="reset" name="reset" id="reset" class="btn btn-danger col-2">Reset</button>
                    <button type="reset" class="btn btn-secondary col-2" onclick="history.back();">Cancel</button>
                </div>
            </form>
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profilePic").change(function() {
            readURL(this);
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#submit').click(function(event) {
                event.preventDefault();
                var form = $('#editMemberForm');
                var formData = new FormData(form[0]);
                formData.append("profilePic", $('#profilePic')[0].files[0]);

                Swal.fire({
                    title: 'Do you want to update the changes?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: "POST",
                            url: "editMember.php",
                            processData: false,
                            contentType: false,
                            data: formData,
                            dataType: "json",
                            success: function(x) {
                                var delay = 500;
                                if (x == "Profile Information has been updated.") {
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