<table id="<?= $row['showsID'] ?>" class="displayShows">
    <tr>
        <th class="showsTitle"><?= $row['showsName'] ?></th>
    </tr>

    <?php if ($row["showsPic"] == "") { ?>
        <tr>
            <td><img src="../../../../No Image.jpg" alt="No Image.jpg" height="320px" width="240px" /></td>
        </tr>
    <?php } else { ?>
        <tr>
            <td class="colPic"><img src="http://localhost/PictureIndex/staff_management/shows<?= $row["showsPic"] ?>" alt="<?= $row["showsPic"] ?>" height="320px" width="240px" /></td>
        </tr>
</table>
<?php }
