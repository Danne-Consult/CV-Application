<form class="contactForm" action="#" method="POST">
    <?php
        $sql="SELECT * FROM ".$prefix."cvappusers WHERE id='$userid'";
        $result=$db->conn->query($sql);
        $rws =  $result->fetch_array();
    ?>
    <div class="row">
        <div class="col-lg-6">
            <label for="cvtitle">CV Title</label><br />
            <input type="text" name="cvtitle" required />
        </div>
    </div>
    <h4>Personal Information</h4>
    <div class="row">
        <div class="col-lg-3">
            <label for="fname">First name</label><br />
            <input type="text" name="fname" value="<?php echo $rws['firstname']; ?>" disabled />
        </div>
        <div class="col-lg-3">
            <label for="lname">Last Name</label><br />
            <input type="text" name="lname" value="<?php echo $rws['lastname']; ?>" disabled />
        </div>
        <div class="col-lg-3">
            <label for="email">Email</label><br />
            <input type="email" name="email" value="<?php echo $rws['email']; ?>" disabled />
        </div>
        <div class="col-lg-3">
            <label for="dob">Date of Birth</label><br />
            <input type="date" name="dob" />
        </div>
    </div>
    <div class="row">
        
        <div class="col-lg-3">
            <label for="lname">Tel/Mobile</label><br />
            <input type="tel" name="mobileno" placeholder="eg. +25407..." required />
        </div>
        <div class="col-lg-3">
            <label for="nationality">Nationality</label><br />
            <input type="text" name="nationality" required />
        </div>
        <div class="col-lg-3">
            <label for="address">Address</label><br />
            <input type="text" name="address" />
        </div>
        <div class="col-lg-3">
            <label for="postalcode">Postal Code</label><br />
            <input type="number" name="postalcode" />
        </div>
        
        
        <div class="col-lg-6">
            <label for="languages">Languages <i class="italic">*Separated with a comma(,)</i></label><br />
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
    <h4>Brief About Me</h4>
    <div class="row">
        <div class="col-lg-12">
            <textarea name="aboutme" class="editor" cols="30" rows="3" maxlength="500"></textarea><br /><i class="italic">*Max 500 characters</i>
        </div>
    </div>
    <hr />
    <h4>Education Background</h4>
    <div class="com-edu">
        <div class="row">
            <div class="col-lg-6">
                <label for="work">Education Level</label><br />
                <select name="educationlevel[]" required>
                    <option>...</option>
                    <option value="Secondary">Secondary</option>
                    <option value="Certificate">Certificate</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Bachelors">Bachelors</option>
                    <option value="Post Graduate Diploma">Post Graduate Diploma</option>
                    <option value="Masters">Masters</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="Institution">School/Institution</label><br />
                <input type="text" name="institution[]" required />
            </div>        
            
            <div class="col-lg-2">
                <label for="comyearfrom">From</label><br />
                <input type="number" name="comyearfrom[]" min="1960" max="2099" step="1" required />
            </div>
            <div class="col-lg-2">
                <label for="comyearto">To</label><br />
                <input type="number" name="comyearto[]" min="1960" max="2099" step="1" required />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <label for="schoolcomment">Achievements/Comments</label><br />
                <textarea rowspan="3" class="editor" name="schoolcomment[]" ></textarea>
            </div>
            <div class="col-lg-2">
                <div class="addbtnbx moreschool"><i class="fa-solid fa-circle-plus"></i></div>
            </div>
        </div>
    </div> 
    <hr />
    <h4>Work Experience</h4>
    <div class="com-work">
        <div class="row">
            <div class="col-lg-6">
            <label for="work">Company/Organization</label><br />
            <input type="text" name="company[]" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
            <label for="occupation">Position</label><br />
            <input type="text" name="occupation[]" />
            </div>
            <div class="col-lg-2">
                <label for="workyearcorfrom">From</label><br />
                <input type="month" name="workyearfrom[]" />
            </div>
            <div class="col-lg-2">
                <label for="workyearto">To</label><br />
                <input type="month" name="workyearto[]" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <label for="workcomment">Achievements/Comments</label><br />
                <textarea rowspan="3" class="editor" name="workcomment[]" ></textarea>
            </div>
            <div class="col-lg-2">
                <div class="addbtnbx morework"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div>
            </div>
        </div>
    </div> 
    <hr />
    <h4>Other Accreditations/Personal Achievements</h4>
    <div class="row">
        <div class="col-lg-12">
            <textarea name="achievements" class="editor" cols="30" rows="3" maxlength="200"></textarea><br /><i class="italic">*Max 500 characters</i>
        </div>
    </div>
    <hr />
    <h4>Skills Aquired</h4>
    <div class="skillbar">
        <div class="row">
            <div class="col-lg-4">
                <label for="skilltitle">Skill Name</label><br />
                <input type="text" name="skill[] "/>
            </div>
            <div class="col-lg-4">
                <label for="capacity">Proficiency</label><br />
                <input class="range" type="range" name="capacity[]" min="0" max="100" />
            </div>
             <div class="col-lg-4">
                <div class="addbtnbx moreskills"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div>
            </div>
        </div>
    </div>
    <hr />
    <h4>Social Media</h4>

    <div class="row">
        <div class="col-lg-4">
            <label for="facebook">Facebook</label><br />
            <input type="url" name="facebook" placeholder="https://...." />
        </div>
        <div class="col-lg-4">
            <label for="twitter">Twitter</label><br />
            <input type="url" name="twitter" placeholder="https://...." />
        </div>
        <div class="col-lg-4">
            <label for="linkedin">Linkedin</label><br />
            <input type="url" name="linkedin" placeholder="https://...." />
        </div>
    </div>
    
    <hr />
    <h4>Interests</h4>
    <div class="row">
        <div class="col-lg-12">
            <textarea name="interests" class="editor" cols="30" rows="3" maxlength="500"></textarea><br /><i class="italic">*Max 500 characters</i>
        </div>
    </div>

    <hr />
    <h4>References</h4>
    <div class="refbar">
        <div class="row">
            <div class="col-lg-8">
                <label for="refname">Referee Name</label><br />
                <input type="text" name="refname[]" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <label for="orgcom">Organization/Company</label><br />
                <input type="text" name="orgcom[]" />
            </div>
            <div class="col-lg-4">
                <label for="reftitle">Occupation Title</label><br />
                <input type="text" name="reftitle[]" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <label for="refemail">Email</label><br />
                <input type="email" name="refemail[]" />
            </div>
            <div class="col-lg-4">
                <label for="refnareftelme">Telephone</label><br />
                <input type="tel" name="reftel[]" />
            </div>
            <div class="col-lg-4">
                <div class="addbtnbx moreref"><i class="fa-solid fa-circle-plus"></i></div>
            </div>
        </div>
        
    </div>

    <br />
    <input type="submit" class="submit" name="submit" value="Save CV" />
</form>

