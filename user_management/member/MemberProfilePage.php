<!DOCTYPE html>
<html lang="en">

<?php include('../../userHead.php');
include "../../dbConn.php";
$baseUrl = 'http://localhost/PictureIndex/staff_management/member';
$distUrl = 'http://localhost/PictureIndex/dist/'; ?>

<head>
    <style>
        body {
            margin: 0;
            color: #2e323c;
            background: #f5f6fa;
            position: relative;
            height: 100%;
        }

        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }

        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 90px;
            height: 90px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }

        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }

        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }

        .account-settings .about p {
            font-size: 0.825rem;
        }

        .form-control {
            border: 1px solid #cfd1d8;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: .825rem;
            background: #ffffff;
            color: #2e323c;
        }

        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }



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
    </style>
    <link rel="stylesheet" href="<?= $distUrl ?>sweetalert2.css">
</head>

<body>
    <div class="wrapper">

        <?php include('../../userHeader.php') ?>

        <?php $memberID = $_GET['memberID'];

        $result = mysqli_query($db, "SELECT * FROM members WHERE memberID = '$memberID'");

        while ($row = mysqli_fetch_array($result)) {
            $memberName = $row['memberName'];
            $memberEmail = $row['memberEmail'];
            $memberPhone = $row['memberPhone'];
            $memberAddress = $row['memberAddress'];
            $memberPassword = $row['memberPassword'];
            $memberGender = $row['memberGender'];
            $memberPics = $row['memberPics'];
        }
        ?>

        <div>
            <h2 style="margin-left: 105px; margin-top: 20px;">Member Profile</h2>
        </div>

        <div class="container">
            <form class="row gutters" id="editMemberForm">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <?php
                                        if ($memberPics == "") {
                                            echo '<img id="blah" src="unknownProfilePic.png" alt="No Image.jpg" height="400px" width="280px" style="object-fit: contain;"/>';
                                        } else {
                                            echo '<img id="blah" src="http://localhost/NexusNet/staff_management/member' . $memberPics . '" alt="' . $memberPics . '" height="400px" width="280px" style="object-fit: contain;"/>';
                                        } ?> </div>
                                    <h5 class="user-name"><?php echo $memberName ?></h5>
                                    <h6 class="user-email"><?php echo $memberEmail ?></h6>
                                    <input type="hidden" id="memberID" name="memberID" value="<?php echo $memberID ?>">

                                    <div class="form-group">

                                        <p class="user-name"> upload a file:</p>
                                        <input type="file" id="profilePic" name="profilePic">


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Profile Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Full Name</label>
                                        <input type="text" class="form-control" id="memberName" name="memberName" placeholder="Enter full name" value="<?php echo $memberName ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" class="form-control" id="memberEmail" name="memberEmail" placeholder="Enter email ID" value="<?php echo $memberEmail ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="memberPhone" name="memberPhone" placeholder="Enter phone number" value="<?php echo $memberPhone ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website">Gender</label><br>
                                        <input type="radio" id="optradioGender" name="optradioGender" <?php if ($memberGender == "Male") {
                                                                                                            echo "checked";
                                                                                                        } ?> value="Male"><label for="male">Male</label>
                                        <input type="radio" id="optradioGender" name="optradioGender" <?php if ($memberGender == "Female") {
                                                                                                            echo "checked";
                                                                                                        } ?> value="Female"><label for="fenmale">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Street">Country</label>
                                        <input type="name" class="form-control" id="memberAddress" name="memberAddress" placeholder="Enter Street" value="<?php echo $memberAddress ?>">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <label for="inputPassword4">Password</label>
                                    <input type="text" class="form-control" id="memberPassword" name="memberPassword" value="<?php echo $memberPassword ?>">
                                </div>

                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right"><br>
                                        <button type="reset" name="reset" id="reset" class="btn btn-danger">Reset</button>
                                        <button type="reset" class="btn btn-secondary" onclick="history.back();">Cancel</button>
                                        <button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php include "../../userFooter.php"; ?>
    </div>

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
                                if (x == "Your Profile Information has been updated.") {
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