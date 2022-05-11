<?php
include "../../dbConn.php";
$baseUrl = 'http://localhost/PictureIndex/staff_management/genre';

$output = '';

$sqlSearch = "SELECT * FROM genres WHERE genreName LIKE '%" . $_POST["search"] . "%' ORDER BY genreName";
$resultSearch = mysqli_query($db, $sqlSearch);

if (mysqli_num_rows($resultSearch) > 0) {
    $output .= '<div class="table-responsive">
    <table id="myTable">
    <thead>
        <th>No.</th>
        <th>Genre Name</th>
    </thead>';

    while ($row = mysqli_fetch_array($resultSearch)) {
        $output .= '<tr id="' . $row["genreID"] . '">
        <td class="colNo"></td>
        <td>' . $row["genreName"] . '</td>
        </tr>';
    }
    echo $output;
} else {
    echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;No Record Found!";
}
?>

<script>
    $(document).ready(function() {
        $('table tbody tr').click(function() {
            var id = $(this).attr('id');
            var url = new URL('<?=$baseUrl?>/GenreProfilePage.php');

            url.searchParams.set('genreID', id)
            window.location.href = url

            return false;
        });
    });
</script>