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
    <title>View Jobs</title>

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
                        <h3>All Jobs</h3>
                        <table>
                            <tr>
                                <th>Job title</th>
                                <th>Created on</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            <?php
                                $status = "";
                                $sql = "SELECT * FROM ".$prefix."jobs";

                                $result = $db->conn->query($sql);
                                while ($rws = $result->fetch_array()) {
                                    if($rws['status']==1){ 
                                            $status = "Published";
                                        }else{
                                            $status = "Unpublished";
                                        }

                                    $tr ="<tr><td>".$rws['job_title']."</td><td>".$rws['createdon']."</td>";
                                    $tr .="<td>".$status."</td>";
                                    $tr .="<td><a title='View CV' href='viewjob.php?recid=".$rws['id']."'><i class='fa-solid fa-eye'></i></a> &nbsp; &nbsp; <a title='Edit CV' href='editjob.php?recid=".$rws['id']."'><i class='fa-solid fa-pen-to-square'></i></a>  &nbsp; &nbsp; <a title='Unpublish Job' href='' class='unpublish'><i class='fas fa-times-circle'></i></a> &nbsp;&nbsp; <a class='confirmation' title='Delete CV' href='controller/deletejob.php?recid=".$rws['id']."'><i class='fa-solid fa-trash'></i></a></td></tr>";

                                    echo $tr;

                                }
                            ?>
                        </table>
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