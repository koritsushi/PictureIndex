<?php
include "../../dbConn.php";
$baseUrlPic = 'http://localhost/PictureIndex/staff_management/shows';

$output = '';

$sqlSearch = "SELECT showsID, showsName, showsPic, MONTH(STR_TO_DATE(releaseDate, '%d/%m/%Y')) showsMonth, YEAR(STR_TO_DATE(releaseDate, '%d/%m/%Y')) showsYear FROM shows WHERE status = '1' AND showsName LIKE '%" . $_POST['search'] . "%' ORDER BY showsName";
$resultSearch = mysqli_query($db, $sqlSearch);

if (mysqli_num_rows($resultSearch) > 0) {

    $currentDate = date("Y/m/d");
    $getCurrentMonth = date("n", strtotime($currentDate));
    $getCurrentYear = date("Y", strtotime($currentDate));

    while ($row = mysqli_fetch_array($resultSearch)) {
        $showsMonth = $row['showsMonth'];
        $showsYear = $row['showsYear'];
        
        if ($getCurrentMonth >= 1 && $getCurrentMonth <= 3) {
            if ($showsMonth >= 1 && $showsMonth <= 3 && $showsYear == $getCurrentYear) {
                include "currentSeasonShowsDisplay.php";
            }
        } else if ($getCurrentMonth >= 4 && $getCurrentMonth <= 6) {
            if ($showsMonth >= 4 && $showsMonth <= 6 && $showsYear == $getCurrentYear) {
                include "currentSeasonShowsDisplay.php";
            }
        } else if ($getCurrentMonth >= 7 && $getCurrentMonth <= 9) {
            if ($showsMonth >= 7 && $showsMonth <= 9 && $showsYear == $getCurrentYear) {
                include "currentSeasonShowsDisplay.php";
            }
        } else if ($getCurrentMonth >= 10 && $getCurrentMonth <= 12) {
            if ($showsMonth >= 10 && $showsMonth <= 12 && $showsYear == $getCurrentYear) {
                include "currentSeasonShowsDisplay.php";
            }
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