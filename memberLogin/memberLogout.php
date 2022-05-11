<html lang="en">

<head>
   <?php include "../userHead.php"; ?>
   <title>Logout</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">

   <style>
      body {
         padding-top: 40px;
         padding-bottom: 40px;
      }

      h2 {
         text-align: center;
         color: #017572;
      }

      h3 {
         text-align: center;
         color: blue;
      }
   </style>
</head>

<body>
   <?php
   unset($_SESSION["id"]); ?>

   <h2>You have successfully logout</h2>
   <h3>Redirecting to Login Page.....</h3>
   <?php header('Refresh: 2; URL = LoginPage.php'); ?>
</body>

</html>