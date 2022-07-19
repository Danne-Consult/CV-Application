<?php
   include "adminsessioncheck.php";
   include("../_db-conf/dbconf.php");
   $db = new DBconnect();
   $prefix = $db->prefix;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User CV : Manager CV App</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../assets/css/slick-theme.css">
    <link rel="stylesheet" href="../assets/css/slick.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery.min.js"></script>
</head>
<body>
<div class="">
            <article>
            <?php
                $cvid = $_GET['cvid'];
                $sql="SELECT * FROM ".$prefix."cvappusers a LEFT JOIN ".$prefix."cvuserrec b ON a.id=b.userid WHERE b.id='$cvid'";
                $result= $db->conn->query($sql);
                $rws = $result->fetch_array();
            ?>

            <div class="row">
                    <div class="col-lg-12">
                        <h3>View User CV</h3>
                        
                        <h2><?php echo $rws['firstname']; ?> <?php echo $rws['lastname']; ?></h2>
                        <p><b>Sector:</b> <?php echo $rws['sector']; ?></p> 
                        <div class="socials">
                            <a href="<?php echo $rws['facebook'];?>" target="_new"><i class="fa-brands fa-facebook"></i></a>&nbsp;
                            <a href="<?php echo $rws['twitter'];?>" target="_new"><i class="fa-brands fa-twitter"></i></a> &nbsp;
                            <a href="<?php echo $rws['linkedin'];?>" target="_new"><i class="fa-brands fa-linkedin"></i></a>
                        </div>
                        <br />
                        <h4><span>CV Title:</span><br /> <?php echo $rws['title'];?></h4>
                    
                        <hr />
                        <h4>General Information</h4>
                        <div class="row">
                            <div class="col-lg-4"> 
                                <p><b>Gender:</b> <?php echo $rws['gender']; ?></p> 
                            </div>
                            <div class="col-lg-4"> 
                                <p><b>Date of Birth:</b> <?php echo date('D d-M-Y', strtotime($rws['dateofbirth'])); ?></p> 
                            </div>
                            <div class="col-lg-4"> 
                                <p><b>Email:</b> <?php echo $rws['email']; ?></p> 
                            </div>
                            <div class="col-lg-4"> 
                                <p><b>Tel:</b> <?php echo $rws['mobile']; ?></p> 
                            </div>
                            <div class="col-lg-4"> 
                                <p><b>Nationality:</b> <?php echo $rws['nationality']; ?></p> 
                            </div>
                            <div class="col-lg-4"> 
                                <p><b>Country:</b> <?php echo $rws['country']; ?></p> 
                            </div>
                            <div class="col-lg-4"> 
                                <p><b>postal Address:</b> <?php echo $rws['address']; ?> - <?php echo $rws['postalcode']; ?></p> 
                            </div>
                            <div class="col-lg-4"> 
                                <p><b>Languages:</b> <?php echo $rws['languages']; ?></p> 
                            </div>
                        </div>
                        <hr >

                        <h4>Brief About me</h4>
                        <?php echo $rws['aboutme']; ?>
                        <hr />
                        <h4>Interests</h4>
                        <?php echo $rws['interests']; ?>
                        <hr />
                        <h4>Education background</h4>
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
                        <hr />
                        <h4>Work Experience</h4>
                        <?php 
                            $wklist= explode("||", $rws['experience']);
                            $wklist= array_filter($wklist);
                            
                            $workcount = count($wklist);
                            $edu = "";
                            foreach($wklist as $key => $value)
                                {
                                    $wklist = explode("/~",$value);	
                                    $monthz = explode("~",$wklist[3]);
                    
                                    $works= '<div class="edubx"><h5>'.$wklist[1].'<br /><span>'. $wklist[2] .' : '. date('M-Y', strtotime($monthz[0])) .' to '. date('M-Y', strtotime($monthz[1])) .' </span></h5><p>'.$wklist[4] .'</p></div>';
                                    echo $works;
                                }
                        ?>
                        <hr />
                        <h4>Other Accreditations</h4>
                        <?php echo $rws['achievements'];?>
                        <hr />
                        <h4>Referees</h4>
                        <div class="row">
                        <?php 
                            $refs= explode("||", $rws['referencesx']);
                            $refs= array_filter($refs);
                            
                            $refcount = count($refs);
                            $reference = "";
                            foreach($refs as $key => $value)
                                {
                                    $reflist = explode("/~",$value);	
                    
                                    $reference= '<div class="col-lg-4 refbx">'.$reflist[1].'<br />'. $reflist[2] .'<br />'. $reflist[3] .'<br /><i class="fas fa-at"></i> '.$reflist[4] .'<br /><i class="fas fa-phone"></i> '.$reflist[5] .'</div>';
                                    echo $reference;
                                }
                        ?>
                        </div>
                       
                    </div>
                </div>
                
            </article>
        </div>
    </body>
</html>