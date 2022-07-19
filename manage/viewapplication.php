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
    <title>View Application : Manager CV App</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
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
                        <h2>View Application</h2>
                        <?php 
                            if(isset($_GET['jobapp'])){
                                $jobapp=$_GET['jobapp'];

                                $sql1="SELECT * FROM ".$prefix."userjobs a LEFT JOIN ".$prefix."cvappusers b ON a.userid = b.id  LEFT JOIN ".$prefix."jobs c ON a.jobid = c.id LEFT JOIN ".$prefix."cvuserrec d ON a.userrecid = d.id  WHERE a.id='$jobapp'";
                                $result1 = $db->conn->query($sql1);
                                $rws1 = $result1->fetch_array();
                            ?>
                            <p class='alignright'><a href="controller/shortlist.php?application=<?php echo $rws1['id']; ?>" class="btn-grey_rounded">Reject Applicant &nbsp;&nbsp;<i class="fas fa-times-circle"></i></a>&nbsp; &nbsp;<a href="controller/shortlist.php?application=<?php echo $rws1['id']; ?>" class="btn-yellow_rounded">Shorlist Applicant &nbsp;&nbsp;<i class="fas fa-check-circle"></i></a></p>
                            <h4><span>Applicant Name:</span><br /><?php echo $rws1['firstname'] ." ".$rws1['lastname'];?></h4>
                            <p><b>Sector in:</b> <?php echo $rws1['sector']; ?><br />
                                <b>Email:</b> <?php echo $rws1['email']; ?><br />
                            <b>Gender:</b> <?php echo $rws1['gender']; ?><br />
                            <b>Telephone:</b> <?php echo $rws1['mobile']; ?><br />
                            <b>Nationality:</b> <?php echo $rws1['nationality']; ?><br />
                            <b>Applied On:</b> <?php echo date('D d-M-Y', strtotime($rws1['appliedon'])); ?><br />                        
                        </p>
                        <h4>Cover Letter</h4>
                        <div><?php echo $rws1['usercover']; ?></div>
                        <div><h5>Attached CV</h5>
                            <a href="controller/viewcv.php?cvid=<?php echo $rws1['userrecid']; ?>" id="modalopen" rel="modal:open" >
                                <div class="attacheddoc"><i class="fas fa-file-alt"></i><br />View CV</div>
                            </a>
                        </div>
                            <?php
                            }else{
                               echo "<div class='error-red'>No applicant selected!</div>";
                            }
                        ?>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <?php include "includes/footer.inc"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
</body>
</html>