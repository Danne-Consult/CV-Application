<form action="#" method="POST" class="contactForm">
    <input type="hidden" name="recid" value="<?php echo $_GET['recid']?>" />
    <?php
        $sql1=$sql = "SELECT * FROM  ".$prefix."jobs";
        $jresult=$db->conn->query($sql1);
        $rws =  $jresult->fetch_array();
    ?>
    <div class="row">
        <div class="col-lg-6">
            <label for="jobtitle">Job Title</label><br />
            <input type="text" name="jobtitle" value="<?php echo $rws['job_title']; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <label for="jobdesc">Job Description</label><br />
            <textarea name="jobdesk" id="editor" cols="30" rows="3"><?php echo $rws['job_desc']; ?></textarea><br />
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <label for="duedate">Category:</label><br />
            <input type="text" name="jobcategory" value="<?php echo $rws['job_category']; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <label for="jobcity">City</label><br />
            <input type="text" name="jobcity" value="<?php echo $rws['job_city']; ?>" />
        </div>
    
        <div class="col-lg-3">
            <label for="jobcountry">Country</label><br />
            <input type="text" name="jobcountry" value="<?php echo $rws['job_country']; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label for="duedate">Submission Due Date: <span class="smalltext">current <?php echo $rws['submitdate']; ?></span></label><br />
            <input type="date" name="duedate" value="<?php echo $rws['submitdate']; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label for="tags">Short tags</label><br />
            <input type="input" name="tags" value="<?php echo $rws['job_tags']; ?>" />
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-lg-6">
            <label for="tags">Published</label>
            <input type="checkbox" name="status" value="1" <?php if($rws['status']==1){echo "checked";} ?> />
        </div>
    </div>

    <br>
    <input type="submit" class="submit" name="editjb" value="Update Job">
</form>