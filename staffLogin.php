<html lang="en">

<head>
   <?php
   include "loginHead.php";
   include "dbConn.php";

   $messages = '';
   if (isset($_POST['login']) || isset($_SESSION['id'])) {
      // set session login id
      if (!empty($_POST['login'])) {
         $staffID = $_SESSION['id'] = $_POST['login'];
      } else {
         $_SESSION['id'] = $_POST['login'];
         $staffID = $_SESSION['id'];
      }

      // check account status if Deactivate not allow login.
      $row = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `staff` WHERE staffID = '$staffID'"));

      if (!empty($row)) {
         if ($row['status'] == "Deactivate") {
            // remove all session variables
            session_unset();

            // destroy the session
            session_destroy();
            session_start();
            $messages = 'Account Deactived.';
         }
      }
   }

   if (!empty($_SESSION['id'])) {

      //redirect page.
      header("Location: staff_management/StaffManagementHomePage.php");
   }

   ?>

   <title>Login</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">

   <style>
      body {
         padding-top: 40px;
         padding-bottom: 40px;
      }

      .form-signin {
         max-width: 330px;
         padding: 15px;
         margin: 0 auto;
         color: #017572;
      }

      .form-signin .form-signin-heading,
      .form-signin .checkbox {
         margin-bottom: 10px;
      }

      .form-signin .checkbox {
         font-weight: normal;
      }

      .form-signin .form-control {
         position: relative;
         height: auto;
         -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
         padding: 10px;
         font-size: 16px;
      }

      .form-signin .form-control:focus {
         z-index: 2;
      }

      .form-signin input[type="email"] {
         margin-bottom: -1px;
         border-bottom-right-radius: 0;
         border-bottom-left-radius: 0;
         border-color: #017572;
      }

      .form-signin input[type="password"] {
         margin-bottom: 10px;
         border-top-left-radius: 0;
         border-top-right-radius: 0;
         border-color: #017572;
      }

      h2 {
         text-align: center;
         color: #017572;
      }

      h3 {
         text-align: center;
         color: red;
      }
   </style>

</head>

<body>

   <h2>Choose a staff account to login</h2>
   <div class="container form-signin">

      <div class="container">

         <h3><?= $messages ?></h3>
         <form class="form-signin" role="form" method="post">
            <button class="btn btn-primary" type="submit" name="login" id="1" value="100021">Staff 1</button>
            <button class="btn btn-primary" type="submit" name="login" id="2" value="100022">Staff 2</button>
            <button class="btn btn-primary" type="submit" name="login" id="3" value="100023">Staff 3</button>
         </form>

      </div>
   </div>

</body>

</html>