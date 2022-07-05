<?php
   include "controller/sessioncheck.php";
   include("manage/_db-conf/dbconf.php");
   $db = new DBconnect();
   $prefix = $db->prefix;
   $userid = $_SESSION["user"];
   $recid = $_GET['recid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update CV:CV App</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
   <?php
        include "includes/navigation.inc";
   ?>
    <div class="container12 bodybox">
        <?php
            include "includes/sidenav.inc";
        ?>
        <div class="mainbar">
            <article>
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Update CV</h3>
                        <?php 
                        if(isset($_GET['recid'])){
                           if(isset($_POST['submit'])){
                              
                            
                            date_default_timezone_set('Africa/Nairobi');
                           
                               $title = $db->escape_string($_POST["cvtitle"]);
                               $dob = $db->escape_string($_POST["dob"]);
                               $nationality = $db->escape_string($_POST["nationality"]);
                               $mobile = $db->escape_string($_POST["mobileno"]);
                               $address = $db->escape_string($_POST["address"]);
                               $postalcode = $db->escape_string($_POST["postalcode"]);
                               $languages = $db->escape_string($_POST["languages"]);
                               $aboutme = $db->escape_string($_POST["aboutme"]);
                               $educationlevel = $_POST["educationlevel"];
                               $institution = $_POST["institution"];
                               $comyearfrom = $_POST["comyearfrom"];
                               $comyearto = $_POST["comyearto"];
                               $schoolcomment = $_POST["schoolcomment"];
                               $company = $_POST["company"];
                               $occupation = $_POST["occupation"];
                               $workyearfrom = $_POST["workyearfrom"];
                               $workyearto = $_POST["workyearto"];
                               $workcomment = $_POST["workcomment"];
                               $achievements = $db->escape_string($_POST["achievements"]);
                               $skill = $_POST["skill"];
                               $capacity = $_POST["capacity"];
                               $facebook = $db->escape_string($_POST["facebook"]);
                               $twitter = $db->escape_string($_POST["twitter"]);
                               $linkedin = $db->escape_string($_POST["linkedin"]);
                               $interests = $db->escape_string($_POST["interests"]);
                               $refname = $_POST["refname"];
                               $reftitle = $_POST["reftitle"];
                               $refemail = $_POST["refemail"];
                               $reftel = $_POST["reftel"];
                               
                               $numinstitute = count($institution);
                               $numwork = count($company);
                               $numskills = count($skill);
                               $refnum = count($refname);
                           
                               $instcontext = "";
                               $workcontext = "";
                               $skillcontext = "";

                               $currdate = date("y-m-d h:i:s");
                           
                               for($i=0;$i<$numinstitute;$i++){
                                    if($institution[$i]!=""){
                                        $edulevel = $educationlevel[$i];  
                                        $inst = $institution[$i];
                                        $comyearfr = $comyearfrom[$i];
                                        $comto = $comyearto[$i];
                                        $schoolcom = $schoolcomment[$i];
                                    }
                                    $instcontext .=  "||/~". $edulevel ."/~" . $inst ."/~". $comyearfr ."-". $comto ."/~". $schoolcom; 
                                }
                                
                                for($x=0;$x<$numwork;$x++){
                                    if($company[$x]!=""){
                                        $companys = $company[$x];
                                        $occupations = $occupation[$x];
                                        $workyfr = $workyearfrom[$x];
                                        $workyto = $workyearto[$x];
                                        $workcom = $workcomment[$x];
                                    }
                                    $workcontext .=  "||/~". $companys ."/~" . $occupations ."/~" . $workyfr ."-". $workyto ."/~". $workcom; 
                                }

                                for($y=0;$y<$numskills;$y++){
                                    if($skill[$y]!=""){
                                        $skills = $skill[$y];
                                        $range = $capacity[$y];
                                    }
                                    $skillcontext .=  "||/~". $skills ."/~" . $range; 
                                }

                                for($z=0;$z<$refnum;$z++){
                                    if($refname[$z]!=""){
                                        $refnames = $refname[$z];
                                        $reftitles = $reftitle[$z];
                                        $refemails = $refemail[$z];
                                        $reftels = $reftel[$z];
                                    }
                                    $refs .=  "||/~". $refnames ."/~" . $reftitles ."/~" . $refemails ."/~" . $reftels; 
                                }

                               

                               $sql = "UPDATE ".$prefix."cvuserrec SET 
                               title = '$title',
                               dateofbirth = '$dob',
                               mobile = '$mobile',
                               nationality = '$nationality',
                               address = '$address',
                               postalcode = '$postalcode',
                               languages = '$languages',
                               interests = '$interests',
                               aboutme = '$aboutme',
                               educationlevel = '$instcontext',
                               experience = '$workcontext',
                               achievements = '$achievements',
                               skills = '$skillcontext',
                               referencesx = '$refs',
                               facebook = '$facebook',
                               twitter = '$twitter',
                               linkedin = '$linkedin',
                               lastupdate = '$currdate'

                               WHERE id = '$recid'";

                                                    
                              $register = $db->conn->query($sql);
                           
                                if($register){  
                                    echo "<div class='success-green'>Update Successful!</div>";  
                                }else{  
                                    echo "<div class='error-red'>Error: Cannot update information</div>";  
                                }
                           }
                            include "includes/updatecv.inc";

                        }else{
                            echo "No CV selected!";
                        }
                        ?>

                    </div> 
                </div>
            </article>
        </div>
    </div>
    <footer>
        <article>
            <div class="copy">&copy;2022. Open Talent Africa</div>
        </article>
    </footer>
    <script src="manage/assets/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        
        $(document).ready(function() {
            			
			tinymce.init({
            selector: 'textarea#editor',
            menubar: false, 
            add_form_submit_trigger : true,
            plugins: 'lists advlist',
            toolbar: 'insertfile a11ycheck undo redo | bold italic | forecolor backcolor | template codesample | alignleft aligncenter alignright alignjustify | bullist numlist | link image'
  
            });

			$(document).on('click', '.moreschool' ,function(){
				$('.com-edu').append('<div class="educont"> <hr /> <div class="row"> <div class="col-lg-6"> <label for="work">Education Level</label><br /> <select name="educationlevel[]" required> <option>...</option> <option value="Secondary">Secondary</option> <option value="Certificate">Certificate</option> <option value="Diploma">Diploma</option> <option value="Undergraduate">Undergraduate</option> <option value="Post graduate Diploma">Post graduate Diploma</option> <option value="Masters">Masters</option> </select> <br /> <label for="Institution">School/Institution</label><br /> <input type="text" name="institution[]" required /> </div> <div class="col-lg-4"> <div class="row"> <div class="col-lg-6"> <label for="comyearfrom">From</label><br /> <input type="number" name="comyearfrom[]" min="1900" max="2099" step="1" required /> </div> <div class="col-lg-6"> <label for="comyearto">To</label><br /> <input type="number" name="comyearto[]" min="1900" max="2099" step="1" required /> </div> </div> </div> </div> <div class="row"> <div class="col-lg-6"> <label for="schoolcomment">Achievements/Comments</label><br /> <textarea rowspan="3"  name="schoolcomment[]" ></textarea> </div> <div class="col-lg-6">  <div class="addbtnbx moreschool"><i class="fa-solid fa-circle-plus"></i></div><div class="delbtnbx deleteedu"><i class="fa-solid fa-circle-minus"></i></div> </div></div></div>');
			});
			$(document).on('click','.deleteedu', function(){
                if(confirm("Are you sure you want to delete this?") == true){
				    $(this).closest(".educont").remove();
                };
			});

            $(document).on('click', '.morework' ,function(){
				$('.com-work').append('<div class="workcont"><hr /> <div class="row"> <div class="col-lg-6"> <label for="work">Company/Organization</label><br /> <input type="text" name="company[]" /> <br /> <label for="occupation">Position</label><br /> <input type="text" name="occupation[]" /> </div> <div class="col-lg-4"> <div class="row"> <div class="col-lg-6"> <label for="workyearcorfrom">From</label><br /> <input type="number" name="workyearfrom[]" min="1900" max="2099" step="1" /> </div> <div class="col-lg-6"> <label for="workyearto">To</label><br /> <input type="number" name="workyearto[]" min="1900" max="2099" step="1" /> </div> </div> </div> </div> <div class="row"> <div class="col-lg-6"> <label for="workcomment">Achievements/Comments</label><br /> <textarea rowspan="3"  name="workcomment[]" ></textarea> </div> <div class="col-lg-6"> <div class="addbtnbx morework"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div><div class="delbtnbx deletework"><i class="fa-solid fa-circle-minus"></i></div> </div>  </div></div>');
			});
			$(document).on('click','.deletework', function(){
                if(confirm("Are you sure you want to delete this record?") == true){
				    $(this).closest(".workcont").remove();
                };
			});
            
            
            $(document).on('click', '.moreskills' ,function(){
				$('.skillbar').append('<div class="skillcont" ><div class="row"><div class="col-lg-4"><label for="skilltitle">Skill Name</label><br /><input type="text" name="skill[] "/></div><div class="col-lg-4"><label for="capacity">Capacity</label><br /><input class="range" type="range" name="capacity[]" min="0" max="100" /></div><div class="col-lg-4"><div class="addbtnbx moreskills"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div><div class="delbtnbx deleteskill"><i class="fa-solid fa-circle-minus"></i></div></div></div></div>');
			});
			$(document).on('click','.deleteskill', function(){
                if(confirm("Are you sure you want to delete this record?") == true){
                    $(this).closest(".skillcont").remove(); 
                };
				
			});

            $(document).on('click', '.moreref' ,function(){
				$('.refbar').append('<div class="refmore"><hr /> <div class="row"> <div class="col-lg-5"> <label for="refname">Referee Name</label><br /> <input type="text" name="refname[]" /> </div> <div class="col-lg-3"> <label for="reftitle">Occupation Title</label><br /> <input type="text" name="reftitle[]" /> </div> </div> <div class="row"> <div class="col-lg-4"> <label for="refemail">Email</label><br /> <input type="email" name="refemail[]" /> </div> <div class="col-lg-4"> <label for="refnareftelme">Telephone</label><br /> <input type="tel" name="reftel[]" /> </div> <div class="col-lg-4"> <div class="addbtnbx moreref"><i class="fa-solid fa-circle-plus"></i></div> <div class="delbtnbx deleteref"><i class="fa-solid fa-circle-minus"></i></div> </div> </div>');
			});
			$(document).on('click','.deleteref', function(){
                if(confirm("Are you sure you want to delete this record?") == true){
				    $(this).closest(".refmore").remove();
                };
			});
        });
    </script> 
</body>
</html>