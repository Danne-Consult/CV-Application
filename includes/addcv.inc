<form class="contactForm" method="POST">
    <div class="row">
        <div class="col-lg-6">
            <label for="cvtitle">CV Title</label><br />
            <input type="text" name="cvtitle" />
        </div>
    </div>
    <h4>Personal Information</h4>
    <div class="row">
        <div class="col-lg-3">
            <label for="fname">First name</label><br />
            <input type="text" name="fname" />
        </div>
        <div class="col-lg-3">
            <label for="lname">Last Name</label><br />
            <input type="text" name="lname" />
        </div>
        <div class="col-lg-3">
            <label for="email">Email</label><br />
            <input type="email" name="email" />
        </div>
        <div class="col-lg-3">
            <label for="dob">Date of Birth</label><br />
            <input type="date" name="dob" />
        </div>
    </div>
    <div class="row">
        
        
        <div class="col-lg-4">
            <label for="address">Address</label><br />
            <input type="text" name="address" />
        </div>
        <div class="col-lg-4">
            <label for="postalcode">Postal Code</label><br />
            <input type="text" name="postalcode" />
        </div>
        <div class="col-lg-4">
            <label for="nationality">Nationality</label><br />
            <input type="text" name="nationality" />
        </div>
        
        <div class="col-lg-4">
            <label for="languages">Languages</label><br />
            <input type="text" name="languages" />
        </div>
        <!--<div class="col-lg-3">
            <label for="marital">Marital Status</label><br />
            <select name="marital">
                <option value="">...</option>
                <option value="Married">Married</option>
                <option value="Single">Single</option>
                <option value="null">Rather not say</option>
            </select>
        </div>-->
    </div>
    <hr />
    <h4>Education Background</h4>
    <div class="com-edu">
        <div class="row">
            <div class="col-lg-6">
            <label for="work">School/institution</label><br />
            <input type="text" name="institution[]" />
            </div>
        
            <div class="col-lg-4">
            <label for="comyear">Year of completion</label><br />
            <input type="text" name="comyear[]" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="schoolcomment">Achievements/Comments</label><br />
                <textarea rowspan="3"  name="schoolcomment[]" ></textarea>
            </div>
            <div class="col-lg-6">
                <div class="addbtnbx moreschool"><i class="fa-solid fa-circle-plus"></i></div>
            </div>
        </div>
    </div> 
    <hr />
    <h4>Occupation/Work background</h4>
    <div class="com-work">
        <div class="row">
            <div class="col-lg-6">
            <label for="work">Job/Occupation</label><br />
            <input type="text" name="work[]" />
            </div>
        
            <div class="col-lg-4">
            <label for="workyear">Year of completion</label><br />
            <input type="text" name="workyear[]" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="workcomment">Achievements/Comments</label><br />
                <textarea rowspan="3"  name="workcomment[]" ></textarea>
            </div>
            <div class="col-lg-6">
                <div class="addbtnbx morework"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div>
            </div>
        </div>
    </div> 
    <hr />
    <h4>Personal Achievements</h4>
    <div class="row">
        <div class="col-lg-12">
            <textarea name="achievements" id="" cols="30" rows="3" maxlength="200"></textarea><br />max 200 characters
        </div>
    </div>
    <hr />
    <h4>Social Media</h4>

    <div class="row">
        <div class="col-lg-4">
            <label for="facebook">Facebook</label><br />
            <input type="text" name="facebook" />
        </div>
        <div class="col-lg-4">
            <label for="twitter">Twitter</label><br />
            <input type="text" name="twitter" />
        </div>
        <div class="col-lg-4">
            <label for="linkedin">Linkedin</label><br />
            <input type="text" name="linkedin" />
        </div>
    </div>
    <hr />
    <h4>interests</h4>
    <div class="row">
        <div class="col-lg-12">
            <textarea name="interests" id="" cols="30" rows="3" maxlength="200"></textarea><br />max 200 characters
        </div>
    </div>

    <br />
    <input type="submit" class="submit" name="submit" value="Save CV" />
</form>

