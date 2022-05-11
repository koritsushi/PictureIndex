<?php
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
