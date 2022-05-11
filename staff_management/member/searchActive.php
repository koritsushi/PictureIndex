<?php
include "../../dbConn.php";
$baseUrl = 'http://localhost/PictureIndex/staff_management/member';

$output = '';

$sqlSearch = "SELECT * FROM members WHERE status = '1' AND memberName LIKE '%" . $_POST["search"] . "%' ORDER BY memberID desc";
$sqlSearchID = "SELECT * FROM members WHERE status = '1' AND memberID LIKE '%" . $_POST["search"] . "%' ORDER BY memberID desc";

$resultSearch = mysqli_query($db, $sqlSearch);
$resultSearchID = mysqli_query($db, $sqlSearchID);

if (mysqli_num_rows($resultSearch) > 0) {
    $output .= '<div class="table-responsive">
    <table id="myTable">
    <thead>
        <th>No.</th>
        <th>Member ID</th>
        <th>Member Name</th>
    </thead>';

    while ($row = mysqli_fetch_array($resultSearch)) {
        $output .= '<tr id="' . $row["memberID"] . '" >
        <td class="colNo"></td>
        <td>' . $row["memberID"] . '</td>
        <td>' . $row["memberName"] . '</td>
        </tr>';
    }
    echo $output;
} elseif (mysqli_num_rows($resultSearchID) > 0) {
    $output .= '<div class="table-responsive">
    <table id="myTable">
    <thead>
        <th>No.</th>
        <th>Member ID</th>
        <th>Member Name</th>
    </thead>';

    while ($row = mysqli_fetch_array($resultSearchID)) {
        $output .= '<tr id="' . $row["memberID"] . '">
        <td class="colNo"></td>
        <td>' . $row["memberID"] . '</td>
        <td>' . $row["memberName"] . '</td>
        </tr>';
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
        $('table tbody tr').click(function() {
            var id = $(this).attr('id');
            var url = new URL('<?= $baseUrl ?>/MemberProfilePage.php');

            url.searchParams.set('memberID', id)
            window.location.href = url

            return false;
        });
    });
</script>