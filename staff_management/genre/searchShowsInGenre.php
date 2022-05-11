<?php
include "../../dbConn.php";
$baseUrl = 'http://localhost/PictureIndex/staff_management/shows';

$output = '';

// $sqlSearch = "SELECT * FROM shows WHERE status = '1' AND showsName LIKE '%" . $_POST["search"] . "%' ORDER BY showsID desc";
// $sqlSearchID = "SELECT * FROM shows WHERE status = '1' AND showsID LIKE '%" . $_POST["search"] . "%' ORDER BY showsID desc";
// $sqlSearchGenre = "SELECT s.* FROM shows s LEFT JOIN (SELECT * FROM genreshows gs where genreID = '$genreID') gs on gs.showsID  WHERE s.status = '1' AND s.showsName LIKE '%" . $_POST["search"] . "%' ORDER BY s.showsID desc";
// $sqlSearchGenre = "SELECT * FROM genreshows WHERE showsID = " . $_POST['genreID'] . " AND showsName LIKE '%" . $_POST["search"] . "%' 
// ORDER BY genreShowsID desc";

$genreID = $_POST['genreID'];

$queryWithGenreID = '';
if($genreID){
    $queryWithGenreID  = " JOIN (SELECT * FROM genreshows gs where genreID = $genreID) gs on gs.showsID = s.showsID ";
}

$keywordSearch = $_POST['search'];

$queryWithSearch ='';
if($keywordSearch){
    $queryWithSearch = " WHERE s.showsName LIKE '%$keywordSearch%' OR s.showsID LIKE '%$keywordSearch%' ";
}

$sqlSearchGenre = "SELECT s.* FROM shows s $queryWithGenreID  $queryWithSearch  ORDER BY s.showsID desc;";

$resultSearch = mysqli_query($db, $sqlSearchGenre);
$resultSearchID = mysqli_query($db, $sqlSearchGenre);

if (mysqli_num_rows($resultSearch) > 0) {
    $output .= '<div class="table-responsive">
    <table id="myTable">
    <thead>
        <th>No.</th>
        <th>Shows ID</th>
        <th>Shows Picture</th>
        <th>Shows Name</th>
        <th>Shows Type</th>
        <th>Show Status</th>
    </thead>';

    while ($row = mysqli_fetch_array($resultSearch)) {
        if ($row["showsPic"] == "") {
            $output .= '<tr id="' . $row["showsID"] . '" >
            <td class="colNo"></td>
            <td class="colId">' . $row["showsID"] . '</td>
            <td class="colPic"><img src="../No Image.jpg" alt="No Image.jpg" height="180px" width="130px"/></td>
            <td class="colName">' . $row["showsName"] . '</td>
            <td>' . $row["showsType"] . '</td>
            <td>' . $row["showStatus"] . '</td>
        </tr>';
        } else {
            $output .= '<tr id="' . $row["showsID"] . '" >
            <td class="colNo"></td>
            <td class="colId">' . $row["showsID"] . '</td>
            <td class="colPic"><img src="' . $baseUrl . $row["showsPic"] . '" alt="' . $baseUrl . $row["showsPic"] . '" height="180px" width="130px"/></td>
            <td class="colName">' . $row["showsName"] . '</td>
            <td>' . $row["showsType"] . '</td>
            <td>' . $row["showStatus"] . '</td>
        </tr>';
        }
    }
    echo $output;
} elseif (mysqli_num_rows($resultSearchID) > 0) {
    $output .= '<div class="table-responsive">
    <table id="myTable">
    <thead>
        <th>No.</th>
        <th>Shows ID</th>
        <th>Shows Picture</th>
        <th>Shows Name</th>
        <th>Shows Type</th>
        <th>Show Status</th>
    </thead>';

    while ($row = mysqli_fetch_array($resultSearchID)) {
        if ($row["showsPic"] == "") {
            $output .= '<tr id="' . $row["showsID"] . '" >
            <td class="colNo"></td>
            <td class="colId">' . $row["showsID"] . '</td>
            <td class="colPic"><img src="../../../../No Image.jpg" alt="No Image.jpg" height="180px" width="130px"/></td>
            <td class="colName">' . $row["showsName"] . '</td>
            <td>' . $row["showsType"] . '</td>
            <td>' . $row["showStatus"] . '</td>
        </tr>';
        } else {
            $output .= '<tr id="' . $row["showsID"] . '" >
            <td class="colNo"></td>
            <td class="colId">' . $row["showsID"] . '</td>
            <td class="colPic"><img src="' . $baseUrl . $row["showsPic"] . '" alt="' . $baseUrl . $row["showsPic"] . '" height="180px" width="130px"/></td>
            <td class="colName">' . $row["showsName"] . '</td>
            <td>' . $row["showsType"] . '</td>
            <td>' . $row["showStatus"] . '</td>
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
        $('table tbody tr').click(function() {
            var id = $(this).attr('id');
            var url = new URL('<?=$baseUrl?>/ShowsProfilePage.php');

            url.searchParams.set('showsID', id)
            window.location.href = url

            return false;
        });
    });
</script>