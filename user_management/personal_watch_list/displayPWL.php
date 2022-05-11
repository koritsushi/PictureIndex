<?php
if (mysqli_num_rows($resultSearch) > 0) {
    $output .= '<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead>
        <th>No.</th>
        <th>Image</th>
        <th>Shows Title</th>
        <th>Score</th>
        <th>Watched Episodes</th>
        <th>Watch Status</th>
        <th>Rating</th>
    </thead>';

    while ($row = mysqli_fetch_array($resultSearch)) {
        $watchStatus = "";
        if ($row['watchStatus'] == 1) {
            $watchStatus = "Plan to Watch";
        } else if ($row['watchStatus'] == 2) {
            $watchStatus = "Watching";
        } else {
            $watchStatus = "Complete";
        }

        $watchedEpisode = "";
        if (empty($row['watchedEpisode'])) {
            $watchedEpisode = "0";
        } else {
            $watchedEpisode = $row["watchedEpisode"];
        }

        if ($row["showsPic"] == "") {
            $output .= '<tr id="' . $row["showsID"] . '" >
            <td class="td-No"></td>
            <td class="td-No"><img src="../../../../No Image.jpg" alt="No Image.jpg" height="90px" width="65px" style="object-fit: contain;"/></td>
            <td class="td-long">' . $row["showsName"] . '</td>
            <td class="td-shot">' . $row["score"] . '</td>
            <td class="td-shot">' . $watchedEpisode . '</td>
            <td class="td-shot">' . $watchStatus . '</td>
            <td class="td-shot">' . $row["rating"] . '</td>
        </tr>';
        } else {
            $output .= '<tr id="' . $row["showsID"] . '" >
            <td class="td-No"></td>
            <td class="td-No"><img src="' . $baseUrlPic . $row["showsPic"] . '" alt="' . $baseUrlPic . $row["showsPic"] . '" height="90px" width="65px" style="object-fit: contain;"/></td>
            <td class="td-long">' . $row["showsName"] . '</td>
            <td class="td-shot">' . $row["score"] . '</td>
            <td class="td-shot">' . $watchedEpisode . '</td>
            <td class="td-shot">' . $watchStatus . '</td>
            <td class="td-shot">' . $row["rating"] . '</td>
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
