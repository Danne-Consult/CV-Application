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
    <title>Applied Jobs : Manager CV App</title>

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
                        <h3>Job Applications</h3>
                        <?php 
                            if(isset($_GET['error'])){
                                $error = $_GET['error'];
                                echo "<div class='error-red'>".$error."</div>";
                            }

                            $sql1="SELECT *, COUNT(*) FROM ".$prefix."userjobs a LEFT JOIN ".$prefix."jobs b ON a.jobid=b.id GROUP BY a.jobid";
                            $result1 = $db->conn->query($sql1);
                        ?>
                        <table id="sorttable">
                            <thead>
                                <tr>
                                    <th>Job title</th>
                                    <th>Number of Applicants</th>
                                    <th>Submission End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while($rws = $result1->fetch_array()) {

                                            $tr ="<tr><td>".$rws['job_title']."</td><td>".$rws['COUNT(*)']."</td>";
                                            $tr .="<td>".$rws['submitdate']."</td>";
                                            $tr .="<td><a title='View Applicants' href='viewapplicants.php?recid=".$rws['id']."'><i class='fa-solid fa-eye'></i></a></td></tr>";

                                            echo $tr;

                                        }
                                ?>
                            </tbody>
                        </table>
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