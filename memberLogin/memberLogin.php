   <?php
   include "../loginHead.php";
   include "../dbConn.php";

   $messages = '';

   if (isset($_GET['memberID']) || isset($_SESSION['id'])) {

      if (!empty($_GET['memberID'])) {
         $memberID = $_SESSION['id'] = $_GET['memberID'];
      } else {
         $_SESSION['id'] = $_GET['memberID'];
         $memberID = $_SESSION['id'];
      }

      // check account status if Deactivate not allow login.
      $row = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `members` WHERE memberID = '$memberID'")); 

      if (!empty($row)) {
         if ($row['status'] == "0") {
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
      header("Location: http://localhost/PictureIndex/user_management/shows/CurrentSeasonShowsPage.php");
   }

   ?>


