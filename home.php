<?php
   include "controller/sessioncheck.php";
   include "manage/_db-conf/dbconf.php";
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
    <title>Home:CV App</title>

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
                    <div class="col-lg-6">
                        <div class="dash">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php
                                        $sql1="SELECT * FROM ".$prefix."cvappusers WHERE id='$userid'";
                                        $result = $db->conn->query($sql1);
                                        $row = $result->fetch_array();
                                    ?>
                                    <h3>My Profile</h3>
                                    <h4><?php echo $row['firstname'] ." ". $row['lastname']; ?></h4>
                                    <p><b>Sector:</b> <?php echo $row['sector']; ?><br />
                                    <b>Email</b>: <?php echo $row['email']; ?><br />
                                    <b>gender</b>: <?php echo $row['gender']; ?><br />
                                    <b>Country</b>: <?php echo $row['country']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                
                    <div class="col-lg-6">
                        <div class="dash">
                            <h4>My CVs</h4>
                            <?php
                            $sql2 = "SELECT * FROM ".$prefix."cvuserrec WHERE userid = '$userid'";
                            $result2 = $db->conn->query($sql2);
                            $numrows2 = mysqli_num_rows($result2);

                            if($numrows2!==0){
                            echo "<p class='smalltext'>".$numrows."/3 CVs Created</p>";
                            ?>
                            <table>
                                <tr>
                                    <th>CV Title</th>
                                    <th>Action</th>
                                </tr>
                                <?php 
                                    
                                    while ($rws2 = $result2->fetch_array()) {
                                        $tr ="<tr><td>".$rws2['title']."</td><td><a title='View CV' href='viewcv.php?recid=".$rws2['id']."'><i class='fa-solid fa-eye'></i></a> &nbsp; &nbsp; <a title='Edit CV' href='updatecv.php?recid=".$rws2['id']."'><i class='fa-solid fa-pen-to-square'></i></a> &nbsp;&nbsp; <a class='confirmation' title='Delete CV' href='controller/deletecv.php?recid=".$rws2['id']."'><i class='fa-solid fa-trash'></i></a></td></tr>";

                                        echo $tr;

                                    }
                                ?>
                            </table>
                            <?php }else{
                                echo "No CVs Added!";
                            }
                            if($numrows2<=3){
                                echo '<div class="alignright"><a href="addcv.php" class="btn-yellow_rounded" title="Add CV">Add CV <i class="fas fa-plus"></i></a></div>';
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-6">
                        <div class="dash jobboard">
                            <h4>Job Board</h4>
                            <?php
                                $sql3 = "SELECT * FROM ".$prefix."jobs ORDER BY id DESC LIMIT 3";  
                                $result3 = $db->conn->query($sql3); 
                                $numrows3 = mysqli_num_rows($result3);
                                if($numrows3!==0){
                                    while ($row3 = mysqli_fetch_array($result3)) {  
                                        $jobtab =  "<h5>".$row3['job_title']."</h5><p class='smalltext'>Added on ".$row3['createdon']." &nbsp; Tags: ".$row3['job_tags']."</p>";  
                                        $jobtab .="<p><a class='readmore' href='job.php?recid=".$row3['id']."'>See Job <i class='fa-solid fa-arrow-right-long'></i></a></p><hr />";
                                        echo $jobtab; 
                                    } 
                                }else{
                                    echo "<p>No jobs listed</p>";
                                }
                            ?>
                            <div class="alignright"><a href="viewjobs.php" class="btn-yellow_rounded" title="View Jobs">See More <i class="fas fa-eye"></i></a></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="dash jobboard">
                            <h4>Applied Jobs</h4>
                            <?php
                                $sql4 = "SELECT * FROM ".$prefix."userjobs WHERE userid='$userid'";  
                                $resultjb = $db->conn->query($sql4);  
                                $numrows4 = mysqli_num_rows($resultjb);

                                $sql5 = "SELECT * FROM ".$prefix."userjobs uj LEFT JOIN ".$prefix."jobs j ON uj.jobid = j.id LEFT JOIN ".$prefix."cvuserrec cv ON cv.id = uj.userrecid WHERE uj.userid='$userid' ORDER BY uj.id DESC LIMIT 3";

                                $result5=$db->conn->query($sql5);
                                if($numrows4>0){
                                while($rws5 = $result5->fetch_array()){
                            ?>
                            <div class="appliedjb">
                                <a href="job.php?recid=<?php echo $rws5[1]; ?>"><h5><span>Job Title: </span><br /><?php echo $rws5['job_title']; ?></h5></a>
                                <p class="smalltext">Created on: <?php echo date('D d-M-Y', strtotime($rws5['createdon']))?><br />
                                Job tags: <?php echo $rws5['job_tags']; ?></p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>Status: <b>
                                        <?php 
                                            if($rws5['shortlist'] == ""){
                                                echo "<span>Pending</span>";
                                            }
                                            if($rws5['shortlist'] == "0"){
                                                echo "<span style='color:#ccc'>Not Successful</span>";
                                            }
                                            if($rws5['shortlist'] == "1"){
                                                echo "<span style='color:green'>Shortlisted</span>";
                                            }
                                        ?></b></p>
                                    </div>
                                    <div class="col-lg-6 alignright">
                                    <p class="smalltext">CV Title: <?php echo $rws5['title']; ?></p>
                                    <p class="smalltext">Applied on: <?php echo date('D d-M-Y', strtotime($rws5['appliedon']))?></p>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="alignright"><a href="appliedjobs.php" class="btn-yellow_rounded" title="View applied Jobs">See More <i class="fas fa-eye"></i></a></div>
                            <?php 
                             }
                            }else{
                                echo "No jobs applied!";
                            }
                            ?>


                        </div>
                    </div>
                    
                </div>
            </article>
        </div>
    </div>
    <?php include "includes/footer.inc"; ?>
    <script>
        $('.confirmation').on('click', function () {
            return confirm('Are you sure you want to delete this CV?');
        });
    </script>
</body>
</html>