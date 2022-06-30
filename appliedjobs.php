<?php
   include "controller/sessioncheck.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applied Jobs:CV App</title>

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
                        <h3>My Applied Jobs</h3>
                            <?php 
                                include("manage/_db-conf/dbconf.php");
                                $db = new DBconnect();
                                $prefix = $db->prefix;
                                $userid = $_SESSION['user'];
                                $resultsperpage = 10; 

                                $sqljb = "SELECT * FROM ".$prefix."userjobs WHERE userid='$userid'";  
                                $resultjb = $db->conn->query($sqljb);  
                                $numrows = mysqli_num_rows($resultjb);

                                $pagemumber = ceil ($numrows / $resultsperpage);  
                                
                                if (!isset ($_GET['page']) ) {  
                                    $page = 1;  
                                } else {  
                                    $page = $_GET['page'];  
                                }  
                                $firstresult = ($page-1) * $resultsperpage; 

                                $sql = "SELECT * FROM ".$prefix."userjobs uj LEFT JOIN ".$prefix."jobs j ON uj.jobid  = j.id LEFT JOIN ".$prefix."cvuserrec cv ON cv.id = uj.userrecid WHERE uj.userid='$userid' ORDER BY uj.id DESC LIMIT " . $firstresult . ',' . $resultsperpage;

                                $result=$db->conn->query($sql);
                                if($numrows>0){
                                while($rws = $result->fetch_array()){
                            ?>
                            <div class="appliedjb">
                                <h4><span>Job Title: </span><br /><?php echo $rws['job_title']; ?></h4>
                                <p class="smalltext">Created on: <?php echo date('D d-M-Y', strtotime($rws['createdon']))?><br />
                                Job tags: <?php echo $rws['job_tags']; ?></p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>Status: <b>
                                        <?php 
                                            if($rws['shortlist'] == ""){
                                                echo "<span>Pending</span>";
                                            }
                                            if($rws['shortlist'] == "0"){
                                                echo "<span style='color:#ccc'>Not Successful</span>";
                                            }
                                            if($rws['shortlist'] == "1"){
                                                echo "<span style='color:green'>Shortlisted</span>";
                                            }
                                        ?></b></p>
                                    </div>
                                    <div class="col-lg-6 alignright">
                                    <p class="smalltext">CV Title: <?php echo $rws['title']; ?></p>
                                    <p class="smalltext">Applied on: <?php echo date('D d-M-Y', strtotime($rws['appliedon']))?></p>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <?php 
                             }
                            ?>

                            <div class="paginationbx">
                                <?php
                                    if($page>=2){   
                                        echo "<a class='nextprevbtn' href='?page=".($page-1)."'>Prev </a>";   
                                    }                      
                                    for ($i=1; $i<=$pagemumber; $i++) {   
                                        if ($i == $page) {   
                                            $pagLink .= "<a class='pagelink active' href='?page=".$i."'>".$i."</a>";   
                                        }               
                                        else  {   
                                            $pagLink .= "<a class='pagelink' href='?page=".$i."'>".$i."</a>";     
                                        }   
                                    }     
                                    echo $pagLink;   
                                    if($page<$pagemumber){   
                                        echo "<a class='nextprevbtn' href='?page=".($page+1)."'>Next</a>";   
                                    }  
                                ?>
                            </div>
                            <?php 
                                }else{
                                    echo "No jobs applied";
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
</body>
</html>