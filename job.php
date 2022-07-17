<?php
   include "controller/sessioncheck.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Job:CV App</title>

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
                        <?php
                            if(isset($_GET['recid'])){
                            include("manage/_db-conf/dbconf.php");
                            $db = new DBconnect();
                            $prefix = $db->prefix;
                            $userid = $_SESSION['user'];

                            $jobid = $_GET['recid'];
                            $sql = "SELECT * FROM ".$prefix."jobs WHERE id = '$jobid'";

                            $result = $db->conn->query($sql);
                            $rws = $result->fetch_array();

                            $sql3="SELECT * FROM ".$prefix."userjobs WHERE jobid='$jobid' AND userid='$userid'";
                            $result3= $db->conn->query($sql3);
                            $numrows = mysqli_num_rows($result3);

                        ?>
                        <?php
                        if($numrows==0){?> 
                        <p class='alignright'><a href="applyjob.php?jobid=<?php echo $rws['id']; ?>" class="btn-yellow_rounded">Apply Job</a></p>
                        <?php }else{echo "<p class='alignright'><i>Applied</i></p>";}
                        ?>
                        
                        <h2><?php echo $rws['job_title']; ?></h2>
                        <p class="smalltext">Posted on: <?php echo date('D d-M-Y', strtotime($rws['createdon']))  ?> &nbsp;&nbsp;Tags: <?php echo $rws['job_tags']; ?></p>
                        <p>
                            Departmnent: <b><?php echo $rws['job_category']; ?></b> <br />
                            City: <b><?php echo $rws['job_city'] ?></b> <br />
                            Country: <b><?php echo $rws['job_country'] ?></b> <br />
                            Submission deadline: <b><?php echo date('D d-M-Y', strtotime($rws['submitdate']))  ?></b> <br />
                        </p>
                        <hr />
                        <?php echo $rws['job_desc']; 
                        ?>
                        <br /><br />
                        <?php
                        if($numrows==0){?> 
                        <p class='alignright'><a href="applyjob.php?jobid=<?php echo $rws['id']; ?>" class="btn-yellow_rounded">Apply Job</a></p>
                        <?php }
                        ?>

                        <?php
                        }else{
                            header("location:viewjobs.php?error=Select a job to view");
                            }
                        ?>
                    </div> 
                </div>
            </article>
        </div>
    </div>
    <?php include "includes/footer.inc"; ?>
</body>
</html>