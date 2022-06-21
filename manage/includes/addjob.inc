<form action="#" method="POST" class="contactForm">
    <div class="row">
        <div class="col-lg-6">
            <label for="jobtitle">Job Title</label><br />
            <input type="text" name="jobtitle" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <label for="jobdesc">Job Description</label><br />
            <textarea name="jobdesk" id="editor" cols="30" rows="3"></textarea><br />
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <label for="duedate">Category:</label><br />
            <input type="text" name="jobcategory" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <label for="jobcity">City</label><br />
            <input type="text" name="jobcity" />
        </div>
    
        <div class="col-lg-3">
            <label for="jobcountry">Country</label><br />
            <input type="text" name="jobcountry" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label for="duedate">Submission Due Date:</label><br />
            <input type="date" name="duedate" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label for="tags">Short tags</label><br />
            <input type="input" name="tags" />
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-lg-6">
            <label for="tags">Published</label>
            <input type="checkbox" name="status" value="1" />
        </div>
    </div>

    <br>
    <input type="submit" class="submit" name="jobsubmit" value="Save Job">
</form>