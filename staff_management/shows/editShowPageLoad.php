<div class="col-3">
    <?php if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if ($row["showsPic"] == "") {
                echo '<img id="blah" class="imgBox" src="../../../No Image.jpg" alt="No Image.jpg" height="400px" width="280px"/>';
            } else {
                echo '<img id="blah" class="imgBox" src="' . $row["showsPic"] . '" alt="' . $row["showsPic"] . '" height="400px" width="280px"/>';
            }
        }
    } ?>
    <p>Click on the "Choose File" button to upload a file:</p>
    <input type="file" id="showsPic" name="showsPic">
</div>

<div class="col-9">
    <h3>Show Details</h3>
    <hr style="width:100%;height: 1px;text-align:left;margin-left:0;background-color:darkturquoise;">

    <?php $result = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'"); ?>
    <div>
        <label for="showsName" class="mb-2 mr-sm-2">Show's Name<span style="color: red;">&nbsp;*</span> &emsp;&ensp;:</label>
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <input type="text" class="form-control mb-2 mr-sm-2" size="100" id="showsName" placeholder="Enter show's name" name="showsName" value="<?php echo $row["showsName"]; ?>" required>
        <?php }
        } ?>
    </div>
    </br>

    <?php $result = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'"); ?>
    <div class="form-inline dropdown">
        <label for="showStatus" class="mb-2 mr-sm-2">Show's Status &emsp;&nbsp;:</label>
        <select class="form-control" name="showStatus" id="showStatus">
            <?php if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) { ?>
                    <option value="On Aired" <?php if ($row['showStatus'] == "On Aired") echo "selected=\"selected\""; ?>>On Aired</option>
                    <option value="Finish Aired" <?php if ($row['showStatus'] == "Finish Aired") echo "selected=\"selected\""; ?>>Finish Aired</option>
                    <option value="N/A" <?php if ($row['showStatus'] == "N/A") echo "selected=\"selected\""; ?>>N/A</option>
            <?php }
            } ?>
        </select>
    </div>
    </br>

    <?php $result = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'"); ?>
    <div class="form-inline dropdown">
        <label for="showType" class="mb-2 mr-sm-2">Show's Type<span style="color: red;">&nbsp;*</span> &emsp;&ensp;&ensp;:</label>
        <select class="form-control" name="showType" id="showType">
            <?php if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) { ?>
                    <option value="0">---Select the type of the show---</option>
                    <label><?php echo $row["showsType"] ?></label>
                    <option value="TV Shows" <?php if ($row['showsType'] == "TV Shows") echo "selected"; ?>>TV Shows</option>
                    <option value="Movie" <?php if ($row['showsType'] == "Movie") echo "selected"; ?>>Movie</option>
                    <option value="Online Shows" <?php if ($row['showsType'] == "Online Shows") echo "selected"; ?>>Online Shows</option>
            <?php }
            } ?>
        </select>
    </div>
    </br>

    <?php $result = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'"); ?>
    <div class="form-inline">
        <label for="episodes" class="mb-2 mr-sm-2">Episode(s)<span style="color: red;">&nbsp;*</span> &emsp;&emsp;&emsp;:</label>
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <input type="number" step="0" min="0" class="form-control mb-2 mr-sm-2" id="episodes" name="episodes" placeholder="Enter episodes" value="<?php echo $row["episodes"] ?>" required>
        <?php }
        } ?>
        <label>&nbsp;(If have choose<span style="color: blue;">&nbsp;"N/A"</span>&nbsp;or&nbsp;<span style="color: blue;">"On Aired"</span>&nbsp;in&nbsp;<span style="color: red;">"Show's Status"</span>, can just leave it be&nbsp;<span style="color:limegreen">"Blank"</span>.)</label>
    </div>
    </br>

    <?php 
    function validateDate($date, $format = 'd/m/Y'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    };
    ?>
    
    <?php $result = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'"); ?>
    <div class="form-inline" style="padding-top: 10px;">
        <label for="releaseDate" style="padding-right: 10px;">Release Date<span style="color: red;">&nbsp;*</span> &emsp;&emsp;: </label>
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if (!validateDate($row['releaseDate'])) {  ?>
                    <input class="form-control" type="date" id="releaseDate" name="releaseDate" required>
                <?php } else {
                    $strReplace = str_replace('/', '-', $row["releaseDate"]);
                    $rowDate = date("Y-m-d", strtotime($strReplace)); ?>
                    <input class="form-control" type="date" id="releaseDate" name="releaseDate" value="<?php echo $rowDate; ?>" required>
                <?php } ?>

        <?php }
        } ?>
    </div>
    </br>

    <?php $result = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'"); ?>
    <div class="form-inline" style="padding-top: 10px;">
        <label for="finishedDate" style="padding-right: 10px;">Finished Date<span style="color: red;">&nbsp;*</span> &emsp;&ensp;&nbsp;: </label>
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if (!validateDate($row['finishedDate'])) { ?>
                    <input class="form-control" type="date" id="finishedDate" name="finishedDate" required>
                <?php } else {
                    $strReplace = str_replace('/', '-', $row["finishedDate"]);
                    $rowDate = date("Y-m-d", strtotime($strReplace)); ?>
                    <input class="form-control" type="date" id="finishedDate" name="finishedDate" min="" value="<?php echo $rowDate; ?>" required>
                <?php } ?>
        <?php }
        } ?>
        <label>&nbsp;(If have choose&nbsp;<span style="color: blue;">"On Aired"</span>&nbsp;in&nbsp;<span style="color: red;">"Show's Status"</span>, can just leave it be&nbsp;<span style="color:limegreen">"Blank"</span>.)</label>
    </div>
    </br>

    <?php $result = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'"); ?>
    <div class="form-inline" style="padding-top: 10px;">
        <label for="broadcastTime" style="padding-right: 10px;">Aired Time<span style="color: red;">&nbsp;*</span> &emsp;&emsp;&emsp;: </label>
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <input class="form-control" type="time" id="broadcastTime" name="broadcastTime" value="<?php echo $row['broadcastTime']; ?>" required>
        <?php }
        } ?>
    </div>
    </br>

    <?php $result = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'"); ?>
    <div class="form-inline" style="padding-top: 10px;">
        <div class="form-inline">
            <label for="studios" style="padding-right: 10px;">Studio<span style="color: red;">&nbsp;*</span> &emsp;&emsp;&emsp;&emsp;&emsp;: </label>
            <select class="form-control" name="studios" id="studios">
                <option value="0">---Select studio---</option>
                <?php
                include('../../dbConn.php');

                $resultStudio = mysqli_query($db, "SELECT * FROM shows GROUP BY studios ORDER BY studios"); ?>
                <?php while ($row = mysqli_fetch_array($result)) {
                    while ($rowStudio = mysqli_fetch_array($resultStudio)) { ?>
                        <option id="studio" name="studio" <?php if ($row['studios'] == $rowStudio['studios']) echo "selected=\"selected\""; ?>><?php echo $rowStudio['studios'] ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
            <label style="margin-left: 20px;">Or</label>
            <input type="text" class="form-control" style="margin-left: 20px;" id="newStudios" name="newStudios" placeholder="Enter studio's name" required>
        </div>
    </div>
    </br>

    <?php $result = mysqli_query($db, "SELECT * FROM shows WHERE showsID = '$showsID'"); ?>
    <div class="form-inline" style="padding-top:10px;">
        <label for="synopsis" style="padding-right: 10px;">Synopsis<span style="color: red;">&nbsp;*</span> &emsp;&emsp;&emsp;&emsp;: </label>
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <textarea id="synopsis" name="synopsis" rows="10" cols="45" style="resize: none;" placeholder="Enter synopsis" class="form-control mb-2 mr-sm-3 col-8 form_data" required><?php echo $row["synopsis"]; ?></textarea>
        <?php }
        } ?>
    </div>
    </br>

    <?php 
    $query = "SELECT g.genreName,g.genreID,if(p.showsID is not null,1,2) as checked from genres g LEFT JOIN (SELECT gs.genreID,gs.showsID 
    FROM `genreshows` gs left join shows s on s.showsID = gs.showsID WHERE gs.showsID = '$showsID') p on p.genreID = g.genreID ORDER BY g.genreName";
    $resultGenre = mysqli_query($db, $query);
     ?>
    <div class="form-inline row" style="padding-top:10px;">
        <label for="genres" class="col-2" style="padding-right: 10px;">Genres<span style="color: red;">&nbsp;*</span> &emsp;&emsp;&emsp;&emsp;&emsp;: </label>
        <?php
        include('../../dbConn.php'); ?>
        <div class="form-inline col-9">

        <?php foreach($resultGenre as $item): ?>
            <div class="form-inline">
                    <input type="checkbox" style="margin-left: 15px;" id="genres[]" name="genres[]"
                     value="<?php echo $item['genreID'] ?>" <?= ($item['checked']==1)?'checked':'' ?>>
                    <label style="margin-left: 3px;"><?php echo $item['genreName'] ?></label>
                </div>
        <?php endforeach; ?>
        
        </div>

    </div>
    </br>

    <div class="col-12" style="padding-top: 30px;padding-bottom: 50px;">
        <button name="submit" id="submit" class="btn btn-primary col-2">Update</button>
        <button type="reset" name="reset" id="reset" class="btn btn-danger col-2">Reset</button>
        <button type="reset" class="btn btn-secondary col-2" onclick="history.back();">Back</button>
    </div>

</div>