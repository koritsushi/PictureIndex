<?php
include "../../dbConn.php";
$baseUrlPic = 'http://localhost/PictureIndex/staff_management/shows';

$memberID = $_POST['memberID'];
$output = '';

$sqlSearch = "SELECT shows.showsPic, shows.showsName, shows.score, personal_watch_list.watchedEpisode, personal_watch_list.watchStatus, personal_watch_list.rating, personal_watch_list.memberID, personal_watch_list.showsID
FROM personal_watch_list
INNER JOIN shows ON personal_watch_list.showsID = shows.showsID 
WHERE personal_watch_list.memberID = '$memberID' AND shows.showsName LIKE '%" . $_POST["search"] . "%' ORDER BY showsName";
$resultSearch = mysqli_query($db, $sqlSearch);

include "displayPWL.php";
?>

<script>
    $(document).ready(function() {
        $('table tbody tr').click(function() {
            var id = $(this).attr('id');
            var url = new URL('http://localhost/PictureIndex/user_management/shows/ShowsProfilePage.php');

            url.searchParams.set('showsID', id)
            window.location.href = url

            return false;
        });
    });
</script>