<?php
include "../../dbConn.php";
$baseUrlPic = 'http://localhost/PictureIndex/staff_management/shows';

$output = '';

$sqlSearch = "SELECT * FROM shows WHERE status = '1' AND showsName LIKE '%" . $_POST['search'] . "%' ORDER BY score DESC LIMIT 10";
$resultSearch = mysqli_query($db, $sqlSearch);

if (mysqli_num_rows($resultSearch) > 0) {

    while ($row = mysqli_fetch_array($resultSearch)) {
        $output .= '<table id="' . $row['showsID'] . '" class="displayShows">
    <tr>
        <th class="showsTitle">' . $row['showsName'] . '</th>
    </tr>';

        if ($row["showsPic"] == "") {
            $output .= '<tr>
            <td><img src="../../../../No Image.jpg" alt="No Image.jpg" height="320px" width="240px"/></td>
        </tr>';
        } else {
            $output .= '<tr>
            <td class="colPic"><img src="' . $baseUrlPic . $row["showsPic"] . '" alt="' . $baseUrlPic . $row["showsPic"] . '" height="320px" width="240px"/></td>
        </tr>';
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