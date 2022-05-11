<!DOCTYPE html>
<html lang="en">

<head>
    <?php $baseUrl = 'http://localhost';
    session_start();
    include "dbConn.php";
    $staffID = $_SESSION['id'];

    if (empty($_SESSION['id'])) {
        header("Location: $baseUrl/PictureIndex/staffLogin.php");
        exit();
    }

    if (!empty($_SESSION['id'])) {
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

    ?>

    <title>PictureIndex</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="<?= $baseUrl ?>/logo.ico">
</head>

</html>