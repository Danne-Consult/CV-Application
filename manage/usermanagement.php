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
    <title>User management : Manager CV App</title>

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
                        <h3>View Users</h3>
                        <table id="sorttable">
                            <thead>
                                <tr>
                                    <th>User Names</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Status</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $status = "";
                                $sql = "SELECT * FROM ".$prefix."cvappusers ORDER BY 'id' DESC";

                                $result = $db->conn->query($sql);
                                while ($rws = $result->fetch_array()) {
                                    if($rws['status']==1){ 
                                            $status = "<span style='color:#2b701b'>Blocked</span>";
                                        }else{
                                            $status = "Unblocked";
                                        }

                                    $tr ="<tr><td>".$rws['firstname']." ".$rws['lastname']."</td><td>".$rws['gender']."</td><td>".$rws['email']."</td><td>".$rws['country']."</td>";
                                    $tr .="<td>".$status."</td>";
                                    $tr .="<td><a title='View CV' href='viewuser.php?recid=".$rws['id']."'><i class='fa-solid fa-eye'></i></a>&nbsp; &nbsp; <a title='Block User' href='controller/blockuder.php' class='unpublish'><i class='fas fa-times-circle'></i></a></td></tr>";

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
    <?php include "includes/footer.inc"; ?>>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function(){
            $('#sorttable').DataTable();
        });
    </script>
</body>
</html>