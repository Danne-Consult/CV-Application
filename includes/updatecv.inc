<form class="contactForm" action="#" method="POST">
    <?php
        $sql=$sql = "SELECT * FROM  ".$prefix."cvappusers RIGHT JOIN ".$prefix."cvuserrec  ON ".$prefix."cvuserrec.userid = ".$prefix."cvappusers.id WHERE ".$prefix."cvuserrec.userid = '$userid' && ".$prefix."cvuserrec.id='$recid'";
        $result=$db->conn->query($sql);
        $rws =  $result->fetch_array();
    ?>
    <div class="row">
        <div class="col-lg-6">
            <label for="cvtitle">CV Title</label><br />
            <input type="text" name="cvtitle" value="<?php echo $rws['title']; ?>" />
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
            <input type="date" name="dob" value="<?php echo $rws['dateofbirth']; ?>" />
        </div>
    </div>
    <div class="row">
        
        <div class="col-lg-3">
            <label for="lname">Tel/Mobile</label><br />
            <input type="tel" name="mobileno" placeholder="eg. +25407..." value="<?php echo $rws['mobile']; ?>" required />
        </div>
        <div class="col-lg-3">
            <label for="nationality">Nationality</label><br />
            <input type="text" name="nationality" value="<?php echo $rws['nationality']; ?>" required />
        </div>
        <div class="col-lg-3">
            <label for="address">Address</label><br />
            <input type="text" name="address" value="<?php echo $rws['address']; ?>" />
        </div>
        <div class="col-lg-3">
            <label for="postalcode">Postal Code</label><br />
            <input type="number" name="postalcode" value="<?php echo $rws['postalcode']; ?>" />
        </div>
        
        <div class="col-lg-6">
            <label for="languages">Languages <i class="italic">*Separated with a comma(,)</i></label><br />
            <input type="text" name="languages"  value="<?php echo $rws['languages']; ?>" />
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
            <textarea name="aboutme" class="editor" cols="30" rows="3" maxlength="500"><?php echo $rws['aboutme']; ?></textarea><br /><i class="italic">*Max 500 characters</i>
        </div>
    </div>
    <hr />
    <h4>Education Background</h4>
    <div class="com-edu">
        <?php 
            $edulist= explode("||", $rws['educationlevel']);
            $edulist= array_filter($edulist);
            
            $edulistcount = count($edulist);
            $edu = "";
            foreach($edulist as $key => $value)
                {
                    $edulist = explode("/~",$value);
                    
                    $year=explode("-",$edulist[3]);

                    $edu= '<div class="educont"> <div class="row"> <div class="row"> <div class="col-lg-6"> <label for="work">Education Level</label><br /> <select name="educationlevel[]" required> <option value="'.$edulist[1].'" selected>'.$edulist[1].'</option> <option>...</option> <option value="Secondary">Secondary</option> <option value="Certificate">Certificate</option> <option value="Diploma">Diploma</option> <option value="Bachelors">Bachelors</option> <option value="Post Graduate Diploma">Post Graduate Diploma</option> <option value="Masters">Masters</option> </select> </div> </div> <div class="row"> <div class="col-lg-6"> <label for="Institution">School/Institution</label><br /> <input type="text" name="institution[]" value="'.$edulist[2].'" required /> </div> <div class="col-lg-2"> <label for="comyearfrom">From</label><br /> <input type="number" name="comyearfrom[]" min="1960" max="2099" step="1" value="'.$year[0].'" required /> </div> <div class="col-lg-2"> <label for="comyearto">To</label><br /> <input type="number" name="comyearto[]" min="1960" max="2099" step="1" value="'.$year[1].'" required /> </div> </div> <div class="row"> <div class="col-lg-10"> <label for="schoolcomment">Area of Study/Course</label><br /> <textarea rowspan="3" class="editor" name="schoolcomment[]">'.$edulist[4].'</textarea> </div> <div class="col-lg-2"> <div class="addbtnbx moreschool"><i class="fa-solid fa-circle-plus"></i></div> <div class="delbtnbx deleteedu"><i class="fa-solid fa-circle-minus"></i></div> </div> </div> </div><br /><hr />';
                    echo $edu;
                }
        ?>
            
    </div> 
    <hr />
    <h4>Work Experience</h4>
    <div class="com-work">
    <?php 
            $wklist= explode("||", $rws['experience']);
            $wklist= array_filter($wklist);
            
            $workcount = count($wklist);
            $edu = "";
            foreach($wklist as $key => $value)
                {
                    $wklist = explode("/~",$value);	
                    $yearx = explode("~",$wklist[3]);
    
                    $works= '<div class="workcont"> <div class="row"> <div class="col-lg-6"> <label for="work">Company/Organization</label><br /> <input type="text" name="company[]" value="'.$wklist[1].'" /> </div> </div> <div class="row"> <div class="col-lg-6"> <label for="occupation">Position</label><br /> <input type="text" name="occupation[]" value="'.$wklist[2].'"  /> </div> <div class="col-lg-2"> <label for="workyearcorfrom">From</label><br /> <input type="month" name="workyearfrom[]" value="'.$yearx[0].'" placeholder ="YYYY-MM" /> </div> <div class="col-lg-2"> <label for="workyearto">To</label><br /> <input type="month" name="workyearto[]" value="'.$yearx[1].'" placeholder ="YYYY-MM" /> </div> </div> <div class="row"> <div class="col-lg-10"> <label for="workcomment">Key Responsibilities</label><br /> <textarea rowspan="3" class="editor" name="workcomment[]">'.$wklist[4].'</textarea> </div> <div class="col-lg-2"> <div class="addbtnbx morework"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div> <div class="delbtnbx deletework"><i class="fa-solid fa-circle-minus"></i></div> </div> </div> </div><br /><hr />';
                    echo $works;
                }
        ?>
    </div> 
    <h4>Other Accreditations/Personal Achievements</h4>
    <div class="row">
        <div class="col-lg-12">
            <textarea name="achievements" class="editor" cols="30" rows="3" maxlength="200"><?php echo $rws['achievements']; ?></textarea><br /><i class="italic">*Max 500 characters</i>
        </div>
    </div>
    <hr />
    <h4>Skills Aquired</h4>
    <div class="skillbar">
            <?php 
                $skilllist= explode("||", $rws['skills']);
                $skilllist= array_filter($skilllist);
                
                $arrayskillcount = count($skilllist);
                $list = "";
                foreach($skilllist as $key => $value)
                    {
                        $eachlist = explode("/~",$value);	
        
                        $list= '<div class="skillcont"><div class="row"><div class="col-lg-4"><label for="skilltitle">Skill Name</label><br /><input type="text" name="skill[]" value="'.$eachlist[1].'" /> </div><div class="col-lg-4"><label for="capacity">Proficiency</label><br /><input class="range" type="range" name="capacity[]" min="0" max="100" value="'.$eachlist[2].'" /> </div> <div class="col-lg-4"><div class="addbtnbx moreskills"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div><div class="delbtnbx deleteskill"><i class="fa-solid fa-circle-minus"></i></div></div> </div></div>';

                        echo $list;
                    }
            ?>
    </div>
    <hr />
    <h4>Social Media</h4>

    <div class="row">
        <div class="col-lg-4">
            <label for="facebook">Facebook</label><br />
            <input type="url" name="facebook" placeholder="https://...." value="<?php echo $rws['facebook']; ?>" />
        </div>
        <div class="col-lg-4">
            <label for="twitter">Twitter</label><br />
            <input type="url" name="twitter" placeholder="https://...." value="<?php echo $rws['twitter']; ?>" />
        </div>
        <div class="col-lg-4">
            <label for="linkedin">Linkedin</label><br />
            <input type="url" name="linkedin" placeholder="https://...." value="<?php echo $rws['linkedin']; ?>" />
        </div>
    </div>
    
    <hr />
    <h4>Interests</h4>
    <div class="row">
        <div class="col-lg-12">
            <textarea name="interests" class="editor" cols="30" rows="3" maxlength="500"><?php echo $rws['interests']; ?></textarea><br /><i class="italic">*Max 500 characters</i>
        </div>
    </div>

    <hr />
    <h4>References</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="refbar">
            <?php 
                $refs= explode("||", $rws['referencesx']);
                $refs= array_filter($refs);
                
                $reflist = "";
                foreach($refs as $key => $value)
                    {
                        $refsent = explode("/~",$value);	
        
                        $reflist= '<div class="refmore"> <hr /> <div class="row"> <div class="col-lg-8"> <label for="refname">Referee Name</label><br /> <input type="text" name="refname[]" value="'.$refsent[1].'"  /> </div> </div> <div class="row"> <div class="col-lg-4"> <label for="orgcom">Organization/Company</label><br /> <input type="text" name="orgcom[]" value="'.$refsent[3].'"  /> </div> <div class="col-lg-4"> <label for="reftitle">Occupation Title</label><br /> <input type="text" name="reftitle[]" value="'.$refsent[2].'"  /> </div> </div> <div class="row"> <div class="col-lg-4"> <label for="refemail">Email</label><br /> <input type="email" name="refemail[]" value="'.$refsent[4].'"  /> </div> <div class="col-lg-4"> <label for="refnareftelme">Telephone</label><br /> <input type="tel" name="reftel[]" value="'.$refsent[5].'"  /> </div> <div class="col-lg-4"> <div class="addbtnbx moreref"><i class="fa-solid fa-circle-plus"></i></div> <div class="delbtnbx deleteref"><i class="fa-solid fa-circle-minus"></i></div> </div> </div> </div>';

                        echo $reflist;
                    }
            ?>
            </div>
        </div>
    </div>

    <br />
    <input type="submit" class="submit" name="submit" value="Update CV" />
</form>