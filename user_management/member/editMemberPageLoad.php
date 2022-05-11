<div class="col-3">
    <?php if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo '<img id="blah" src="' . $row["memberPics"] . '" alt="' . $row["memberPics"] . '" class="imgBox" />';
        }
    } ?>
    <p>Click on the "Choose File" button to upload a file:</p>
    <input type="file" id="profilePic" name="profilePic">
</div>

<div class="col-9 row">
    <h3>Information</h3>
    <hr style="width:100%;height: 1px;text-align:left;margin-left:0;background-color:darkturquoise;">

    <?php $result = mysqli_query($db, "SELECT * FROM members WHERE memberID = '$memberID'"); ?>
    <div class="form-inline col-6 row">
        <label for="memberName" class="mb-2 mr-sm-2 col-4">Staff Name :</label>
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <input type="text" class="form-control mb-2 mr-sm-2 col-6 form_data" id="memberName" placeholder="Enter staff name" name="memberName" value="<?php echo $row["memberName"]; ?>" required>
        <?php }
        } ?>
    </div>

    <?php $result = mysqli_query($db, "SELECT * FROM members WHERE memberID = '$memberID'"); ?>
    <div class="form-inline col-6 row">
        <label for="staffPwd" class="mb-2 mr-sm-3 col-4">Password :</label>
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <input type="text" class="form-control mb-2 mr-sm-2 col-6 form_data" id="memberPassword" placeholder="At least 3 character" name="memberPassword" value="<?php echo $row["memberPassword"]; ?>" required>
        <?php }
        } ?>
    </div>

    <?php $result = mysqli_query($db, "SELECT * FROM members WHERE memberID = '$memberID'"); ?>
    <div class="form-inline col-6 row">
        <label for="memberEmail" class="mb-2 mr-sm-3 col-4">Email Address :</label>
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <input type="email" class="form-control mb-2 mr-sm-2 col-7 form_data" id="memberEmail" placeholder="Enter email" name="memberEmail" value="<?php echo $row["memberEmail"]; ?>" required>
        <?php }
        } ?>
    </div>

    <?php $result = mysqli_query($db, "SELECT * FROM members WHERE memberID = '$memberID'"); ?>
    <div class="form-inline col-6 row">
        <label for="memberPhone" class="mb-2 mr-sm-3 col-4">Phone No. :</label>
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <input type="tel" class="form-control mb-2 mr-sm-2 col-6 form_data" id="memberPhone" placeholder="012-3456789" pattern="[0-9]{3}-[0-9]{7}" name="memberPhone" value="<?php echo $row["memberPhone"]; ?>" required>
        <?php }
        } ?>
    </div>

    <?php $result = mysqli_query($db, "SELECT * FROM members WHERE memberID = '$memberID'"); ?>
    <div class="form-inline col-12">
        <div class="form-check-inline" style="padding-left: 9px;">
            <label class="form-check-label" for="radioGender1">
                <?php if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <input type="radio" class="form-check-input form_data" id="optradioGender" name="optradioGender" <?php if ($row['memberGender'] == "Male") {
                                                                                                                                echo "checked";
                                                                                                                            } ?> value="Male" checked>Male
            </label>
        </div>
        <div class="form-check-inline col-5">
            <label class="form-check-label" for="radioGender2">
                <input type="radio" class="form-check-input form_data" id="optradioGender" name="optradioGender" <?php if ($row['memberGender'] == "Female") {
                                                                                                                        echo "checked";
                                                                                                                    } ?> value="Female">Female
        <?php }
                } ?>
            </label>
        </div>

    </div>

    <?php $result = mysqli_query($db, "SELECT * FROM members WHERE memberID = '$memberID'"); ?>
    <div class="form-inline col-6 row" style="padding-top:10px;">
        <label for="memberAddress" class="mb-2 mr-sm-3 col-3">Address :</label>
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <textarea id="memberAddress" name="memberAddress" rows="5" cols="45" style="resize: none;" placeholder="Enter address" class="form-control mb-2 mr-sm-3 col-8 form_data" required><?php echo $row["memberAddress"]; ?></textarea>
        <?php }
        } ?>
    </div>


    
</div>