<!DOCTYPE html>
<html>

<?php 
$distUrl = 'http://localhost/PictureIndex/dist/';
include "../loginHead.php";
?>


<style>
  .format-pre pre {
    padding: 10px;
    font-size: 16px;
    text-align: left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
  }

  body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: honeydew;
  }

  * {
    box-sizing: border-box;
  }


  input[type=text],
  input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
  }


  input[type=text]:focus,
  input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }


  button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }

  button:hover {
    opacity: 1;
  }


  .cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
  }


  .cancelbtn,
  .signupbtn {
    float: left;
    width: 50%;
    border-radius: 15px;
  }


  .container {
    padding: 16px;

  }


  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: #474e5d;
    padding-top: 50px;
  }


  .modal-content {
    background-color: #fefefe;
    margin: 0% auto 15% auto;
    border: 1px solid #888;
    width: 35%;
  }


  hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
  }


  .close:hover,
  .close:focus {
    color: #f44336;
    cursor: pointer;
  }


  .clearfix::after {
    content: "";
    clear: both;
    display: table;
  }


  @media screen and (max-width: 300px) {

    .cancelbtn,
    .signupbtn {
      width: 100%;
    }
  }
</style>
<link rel="stylesheet" href="<?= $distUrl ?>sweetalert2.css">


<body>

  <form class="modal-content" id="mmSignup" name="mmSignup" novalidate>
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="memberName"><b>Name</b></label>
      <input type="text" id="memberName" name="memberName" placeholder="Enter Name" required>

      <label for="memberEmail"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" id="memberEmail" name="memberEmail" required>

      <label for="memberPhone"><b>Phone Number</b></label><br>
      <input type="text" placeholder="Enter Phone Number" id="memberPhone" name="memberPhone" required><br>

      <label for="memberAddress"><b>Country</b></label>
      <input type="text" placeholder="Enter Country" id="memberAddress" name="memberAddress" required><br>

      <p style="font-weight: bold;">Please select your gender</p>
      
      <label for="radioGender1" >
      <input type="radio" id="optradioGender" name="optradioGender" value="Male"checked>Male
      </label>
      
      <label for="radioGender2" >
      <input type="radio" id="optradioGender" name="optradioGender" value="Female">Female
      </label><br> <br>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="memberPassword" id="memberPassword" required>

      <!-- <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required> -->

      <div class="clearfix">
        <button type="button" class="cancelbtn" id="cancelButton" onclick="history.back()">Cancel</button>
        <button class="signupbtn" name="submit" id="submit">Sign Up</button>
      </div>
    </div>
  </form>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="<?= $distUrl ?>sweetalert2.min.js"></script>



  <script>
    $(document).ready(function() {
      $('#submit').click(function(event) {
        event.preventDefault();
        var form = $('#mmSignup');
        var formData = new FormData(form[0]);


        Swal.fire({
          title: 'Do you want to add this member information?',
          showCancelButton: true,
          confirmButtonText: 'Yes',
        }).then((result) => {
          if (result.isConfirmed) {

            $.ajax({
              type: "POST",
              url: "signup.php",
              processData: false,
              contentType: false,
              data: formData,
              dataType: "json",
              success: function(x) {
                var delay = 500;
                if (x.a == "Account has successfully created!") {
                  Swal.fire(x.a, '', 'success').then((result => {
                    if (result.isConfirmed) {
                      window.location = "memberLogin.php?memberID=" + x.b;
                    } else {
                      setTimeout(function() {
                        window.location = "memberLogin.php?memberID=" + x.b;
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