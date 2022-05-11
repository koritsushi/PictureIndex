<?php
include "../../dbConn.php";
include "../../simple_html_dom.php";
$baseUrlPic = 'http://localhost/PictureIndex/staff_management/shows';

$output = '';

$sqlSearch = "SELECT showsID, showsName, showsPic, MONTH(STR_TO_DATE(releaseDate, '%d/%m/%Y')) showsMonth, YEAR(STR_TO_DATE(releaseDate, '%d/%m/%Y')) showsYear FROM shows WHERE status = '1' AND showsName LIKE '%" . $_POST['search'] . "%' ORDER BY showsName";
$sqlDateYear = "SELECT YEAR(STR_TO_DATE(releaseDate, '%d/%m/%Y')) getYear, MONTH(STR_TO_DATE(releaseDate, '%d/%m/%Y')) getMonth FROM shows WHERE status = '1' GROUP BY YEAR(STR_TO_DATE(releaseDate, '%d/%m/%Y')) desc";

$resultSearch = mysqli_query($db, $sqlSearch);
$resultYear = (mysqli_query($db, $sqlDateYear));

if (mysqli_num_rows($resultSearch) > 0) {
    while ($row = mysqli_fetch_assoc($resultYear)) {
        $getYear = $row['getYear'];
        $getMonth = $row['getMonth'];
    }

    $currentDate = date("Y/m/d");
    $getCurrentMonth = date("n", strtotime($currentDate));
    $getCurrentYear = date("Y", strtotime($currentDate));

    while ($row = mysqli_fetch_array($resultSearch)) {
        $showsMonth = $row['showsMonth'];
        $showsYear = $row['showsYear'];

        if ($showsMonth >= 10 && $showsMonth <= 12 && $showsYear == $getCurrentYear) {
            include "showsDisplay.php";
        }
    }
    echo $output;
} else {
    echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;No Record Found!";
}
?>

<script>
    $(document).ready(function() {
        $('table').click(function() {
            var id = $(this).attr('id');
            var url = new URL('http://localhost/PictureIndex/user_management/shows/ShowsProfilePage.php');

            url.searchParams.set('showsID', id)
            window.location.href = url

            return false;
        });
    });
</script>