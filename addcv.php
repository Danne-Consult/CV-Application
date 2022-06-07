<?php
   include "controller/sessioncheck.php";
   include("manage/_db-conf/dbconf.php");
   $db = new DBconnect();
   $prefix = $db->prefix;
   $userid = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add CV:CV App</title>

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
                        <h3>Add CV</h3>
                        <?php 
                           if(isset($_POST['submit'])){
                              
                            
                            date_default_timezone_set('Africa/Nairobi');
                           
                               $title = $db->escape_string($_POST["cvtitle"]);
                               $email = $db->escape_string($_POST["email"]);
                               $dob = $db->escape_string($_POST["dob"]);
                               $nationality = $db->escape_string($_POST["nationality"]);
                               $mobile = $db->escape_string($_POST["mobileno"]);
                               $address = $db->escape_string($_POST["address"]);
                               $postalcode = $db->escape_string($_POST["postalcode"]);
                               $languages = $db->escape_string($_POST["languages"]);
                               $institution = $_POST["institution"];
                               $schoolcomment = $_POST["schoolcomment"];
                               $comyear = $_POST["comyear"];
                               $work = $_POST["work"];
                               $workyear = $_POST["workyear"];
                               $workcomment = $_POST["workcomment"];
                               $achievements = $db->escape_string($_POST["achievements"]);
                               $facebook = $db->escape_string($_POST["facebook"]);
                               $twitter = $db->escape_string($_POST["twitter"]);
                               $linkedin = $db->escape_string($_POST["linkedin"]);
                               $interests = $db->escape_string($_POST["interests"]);
                               $references = $db->escape_string($_POST["references"]);
                               
                               $numinstitute = count($institution);
                               $numwork = count($work);
                           
                               $instcontext = "";
                               $workcontext = "";

                               $currdate = date("y-m-d h:i:s");
                           
                               for($i=0;$i<$numinstitute;$i++){
                                   if($institution[$i]!=""){
                                      $inst = $institution[$i];
                                      $comyear = $comyear[$i];
                                      $schoolcom = $schoolcomment[$i];
                                   }
                                  $instcontext .=  "||/~". $inst ."/~" . $comyear ."/~". $schoolcom; 
                              }
                           
                              for($x=0;$x<$numwork;$x++){
                                   if($work[$x]!=""){
                                   $works = $work[$x];
                                   $workyr = $workyear[$x];
                                   $workcom = $workcomment[$x];
                                   }
                                   $workcontext .=  "||/~". $works ."/~" . $workyr ."/~". $workcom; 
                               }


                               $sql = "INSERT INTO ".$prefix."cvuserrec (userid, title, dateofbirth, mobile, email, nationality, address, postalcode, languages, interests, educationlevel, experience, referencesx, facebook, twitter, linkedin, datecreated) VALUES ('$userid','$title','$dob','$mobile','$email','$nationality','$address','$postalcode','$languages','$interests','$instcontext','$workcontext','$references','$facebook','$twitter','$linkedin','$currdate')";

                               $register = $db->conn->query($sql);
                           
                               if($register){  
                                   echo "Registration Successful!";  
                                }else{  
                                   echo "Error: Cannot save information";  
                                }
                           }
                            include "includes/addcv.inc";
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

    <script>
        $(document).ready(function() {
            			
						
			$(document).on('click', '.moreschool' ,function(){
				$('.com-edu').append('<div class="educont" ><hr /><div class="row"><div class="col-lg-6"><label for="work">School/institution</label><br /><input type="text" name="institution[]" /></div><div class="col-lg-4"><label for="comyear">Year of completion</label><br /><input type="text" name="comyear[]" /></div></div><div class="row"><div class="col-lg-6">  <label for="schoolcomment">Achievements/Comments</label><br /><textarea rowspan="3"  name="schoolcomment[]" ></textarea></div><div class="col-lg-6">       <div class="addbtnbx moreschool"><i class="fa-solid fa-circle-plus"></i></div><div class="delbtnbx deleteedu"><i class="fa-solid fa-circle-minus"></i></div>      </div>    </div></div>');
			});
			$(document).on('click','.deleteedu', function(){
                confirm("Are you sure you want to delete this?");
				$(this).closest(".educont").remove();
			});

            $(document).on('click', '.morework' ,function(){
				$('.com-work').append('<div class="workcont" ><hr /><div class="row">   <div class="col-lg-6"> <label for="work">Job/Occupation</label><br />   <input type="text" name="work[]" /> </div> <div class="col-lg-4"> <label for="workyear">Year of completion</label><br />  <input type="text" name="workyear[]" /> </div>  </div> <div class="row"> <div class="col-lg-6">  <label for="workcomment">Achievements/Comments</label><br /> <textarea rowspan="3"  name="workcomment[]" ></textarea>  </div> <div class="col-lg-6">  <div class="addbtnbx morework"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div> <div class="delbtnbx deletework"><i class="fa-solid fa-circle-minus"></i></div> </div> </div></div>');
			});
			$(document).on('click','.deletework', function(){
                confirm("Are you sure you want to delete this record?");
				$(this).closest(".workcont").remove();
			});
        });
    </script> 
</body>
</html>