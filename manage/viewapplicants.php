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
    <title>Applied Users : Manager CV App</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
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
                        <h2>View Applicants</h2>
                        <?php 
                            if(isset($_GET['error'])){
                                $error = $_GET['error'];
                                echo "<div class='error-red'>".$error."</div>";
                            }
                            if(isset($_GET['recid'])){
                                $recid=$_GET['recid'];

                                $sql1="SELECT * FROM ".$prefix."jobs WHERE id='$recid'";
                                $result1 = $db->conn->query($sql1);
                                $rws1 = $result1->fetch_array();
                        ?>
                            <h4><span>Job Title:</span><br /><?php echo $rws1['job_title'] ?></h4>
                        <?php
                            $sql2="SELECT * FROM ".$prefix."userjobs a LEFT JOIN ".$prefix."cvappusers b ON a.userid = b.id WHERE a.jobid='$recid'";
                        ?>
                            <br />
                            <table id="sorttable">
                                <thead>
                                    <tr>
                                        <th>Applicant Name</th>
                                        <th>Sector</th>
                                        <th>Applied On</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    
                                    $result2 = $db->conn->query($sql2);
                                    $status = "";
                                    while ($rws2 = $result2->fetch_array()) {
                                        if($rws2['shortlist']==""){
                                            $status = "<i>pending</i>";
                                        }
                                        if($rws2['shortlist'] ==1){
                                            $status = "<span style='color:green'>Shotlisted</span>";
                                        }

                                        $tr ="<tr><td>".$rws2['firstname']." ".$rws2['lastname']."</td><td>".$rws2['sector']."</td>";
                                        $tr .="<td>".$rws2['appliedon']."</td>";
                                        $tr .="<td>".$status."</td>";
                                        $tr .="<td><a title='View CV' href='viewapplication.php?jobapp=".$rws2[0]."'><i class='fa-solid fa-eye'></i></a></td></tr>";

                                        echo $tr;

                                    }
                                ?>
                                </tbody>
                            </table>
                        <?php
                            }else{
                                header("Location:viewappliedjobs.php?error=No selected job to view");
                            }
                        ?>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <?php include "includes/footer.inc"; ?>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function(){
            $('#sorttable').DataTable();
        });
    </script>
</body>
</html>