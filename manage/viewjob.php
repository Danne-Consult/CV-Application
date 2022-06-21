<?php
   include "controller/adminsessioncheck.php"; 
   include("_db-conf/dbconf.php");
   $db = new DBconnect();
   $prefix = $db->prefix;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Job</title>

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
                            $jobid = $_GET['recid'];

                            $sql = "SELECT * FROM ".$prefix."jobs WHERE id = '$jobid'";

                            $result = $db->conn->query($sql);
                            $rws = $result->fetch_array();
                        ?>
                         <p class="alignright"><a href="editjob.php?recid=<?php echo $rws['id']; ?>" class="btn-yellow_rounded"><i class="fa-solid fa-pen-to-square"></i> Edit Job</a>&nbsp; &nbsp; <a href="controller/deletejob.php?recid=<?php echo $rws['id']; ?>" class="btn-grey_rounded confirmation"><i class="fa-solid fa-trash"></i> Delete Job</a></p><br /><br />

                        <h2><?php echo $rws['job_title']; ?></h2>
                        <p class="smalltext">Posted on: <?php echo $rws['createdon']; ?></p>
                        <p>
                            City: <b><?php echo $rws['job_city'] ?></b> <br />
                            Country: <b><?php echo $rws['job_country'] ?></b> <br />
                            Submission deadline: <b><?php echo $rws['submitdate']; ?></b> <br />
                        </p>

                        <br /><hr />
                        <?php echo $rws['job_desc']; ?>
                       <br />
                        <hr />
                        <p class="alignright"><a href="editjob.php?recid=<?php echo $rws['id']; ?>" class="btn-yellow_rounded"><i class="fa-solid fa-pen-to-square"></i> Edit Job</a>&nbsp; &nbsp; <a href="controller/deletejob.php?recid=<?php echo $rws['id']; ?>" class="btn-grey_rounded confirmation"><i class="fa-solid fa-trash"></i> Delete Job</a></p><br /><br />
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
        $('.confirmation').on('click', function () {
            return confirm('Are you sure you want to delete this job?');
        });
    </script>
</body>
</html>