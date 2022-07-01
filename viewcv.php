<?php
    include "controller/sessioncheck.php";

    include("manage/_db-conf/dbconf.php");
    $db = new DBconnect();
    $recid = $_GET['recid'];
    $prefix = $db->prefix;
    $userid= $_SESSION['user'];
    $sql = "SELECT * FROM  ".$prefix."cvappusers RIGHT JOIN ".$prefix."cvuserrec  ON ".$prefix."cvuserrec.userid = ".$prefix."cvappusers.id WHERE ".$prefix."cvuserrec.userid = '$userid' && ".$prefix."cvuserrec.id='$recid'";
    $result = $db->conn->query($sql);
    $rws = $result->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View CV:CV App</title>

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
                        <div class="cvtitle">
                            <h3>My CV: <?php echo $rws['title'];?></h3>
                            <div class="alignright"><a href="updatecv.php?recid=<?php echo $recid; ?>" class="" title="Edit CV">Edit CV <i class="fa-solid fa-pen-to-square"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btn-yellow_rounded" id="printcv" title="Print CV">Print CV <i class="fas fa-print"></i></a></div>
                        </div>
                        <div class="cvpage">
                            <div class="row">
                                <div class="col-lg-3 shortcont thintext">
                                    <h4>Bio</h4>
                                    <p class="bio"> 
                                        Gender: <?php echo $rws['gender'];?><br />
                                        Date of Birth: <?php echo date('D d-M-Y', strtotime($rws['dateofbirth'])) ?><br />
                                        Email: <?php echo $rws['email'];?><br />
                                        Mobile: <?php echo $rws['mobile'];?><br />
                                        Nationality: <?php echo $rws['nationality'];?><br />
                                        Postal Address: <?php echo $rws['address'];?>-<?php echo $rws['postalcode'];?><br />
                                    </p>
                                    <hr /><br />
                                    <h4>Skills</h4>
        
                                    <div class="skillset">
                                    <?php 
                                        $skilllist= explode("||", $rws['skills']);
                                        $skilllist= array_filter($skilllist);
                                        
                                        $arrayskillcount = count($skilllist);
                                        $list = "";
                                        foreach($skilllist as $key => $value)
                                            {
                                                $eachlist = explode("/~",$value);	
                                
                                                $list= '<div class="skillbx"><div class="skilldesc">'.$eachlist[1].'</div><div class="progbar"><div class="range" style="width:'. $eachlist[2] .'%;"></div></div></div>';
                                                echo $list;
                                            }
                                    ?>
                                    <div class="clearfix"></div>
                                    </div>
                                    
                                    <hr /><br />
                                    <h4>Languages</h4>
                                    <p><?php echo $rws['languages'];?></p>
                                    
                                </div>
                                <div class="col-lg-9 fullcont">
                                    <h1><?php echo $rws['firstname'];?>&nbsp;<?php echo $rws['lastname'];?></h1>
                                    <div class="socials">
                                        <a href="<?php echo $rws['facebook'];?>" target="_new"><i class="fa-brands fa-facebook"></i></a>&nbsp;
                                        <a href="<?php echo $rws['twitter'];?>" target="_new"><i class="fa-brands fa-twitter"></i></a> &nbsp;
                                        <a href="<?php echo $rws['linkedin'];?>" target="_new"><i class="fa-brands fa-linkedin"></i></a>
                                    </div>
                                    
                                    <br /><br />
                                    <h4>About Me</h4>
                                    <p><?php echo $rws['aboutme'];?></p>
                                    <hr /><br />               
                                    <h4>Interests</h4>
                                    <p><?php echo $rws['interests'];?></p>
                                    <hr /><br />            


                                    <h4>Education</h4>
                                    <?php 
                                        $edulist= explode("||", $rws['educationlevel']);
                                        $edulist= array_filter($edulist);
                                        
                                        $edulistcount = count($edulist);
                                        $edu = "";
                                        foreach($edulist as $key => $value)
                                            {
                                                $edulist = explode("/~",$value);	
                                
                                                $edu= '<div class="edubx"><h5>'.$edulist[1].'<br /><span>'. $edulist[2] .' : '.$edulist[3] .'</span></h5><p>'.$edulist[4] .'</p></div>';
                                                echo $edu;
                                            }
                                    ?>

                                    <hr /><br />             
                                    <h4>Work Experience</h4>
                                    <?php 
                                        $wklist= explode("||", $rws['experience']);
                                        $wklist= array_filter($wklist);
                                        
                                        $workcount = count($wklist);
                                        $edu = "";
                                        foreach($wklist as $key => $value)
                                            {
                                                $wklist = explode("/~",$value);	
                                
                                                $works= '<div class="edubx"><h5>'.$wklist[1].'<br /><span>'. $wklist[2] .' : '. $wklist[3] .' </span></h5><p>'.$wklist[4] .'</p></div>';
                                                echo $works;
                                            }
                                    ?>
                                    <hr /><br />            
                                    <h4>Achievements</h4>
                                    <p><?php echo $rws['achievements'];?></p>
                                    <hr /><br />            
                                    <h4>References</h4>
                                    <div class="row">
                                    <?php 
                                        $refs= explode("||", $rws['referencesx']);
                                        $refs= array_filter($refs);
                                        
                                        $refcount = count($refs);
                                        $reference = "";
                                        foreach($refs as $key => $value)
                                            {
                                                $reflist = explode("/~",$value);	
                                
                                                $reference= '<div class="col-lg-4">'.$reflist[1].'<br />'. $reflist[2] .'<br />'. $reflist[3] .'<br />'.$reflist[4] .'</div>';
                                                echo $reference;
                                            }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        $(document).ready(function(){
            $('#printcv').click(function(){
                event.preventDefault();
                window.print();
            });
        });
  </script>
    </script>
</body>
</html>