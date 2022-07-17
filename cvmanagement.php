<?php
   include "controller/sessioncheck.php";
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
                    <div class="col-lg-12">
                    <div class="alignright"><a href="addcv.php" class="btn-yellow_rounded" title="Add CV">Add CV <i class="fas fa-plus"></i></a></div>
                        <h3>My CVs</h3>
                            <?php
                                include("manage/_db-conf/dbconf.php");
                                $db = new DBconnect();
                                $prefix = $db->prefix;
                                $userid= $_SESSION['user'];
                                $sql1 = "SELECT * FROM ".$prefix."cvuserrec WHERE userid = '$userid'";
                                $result1 = $db->conn->query($sql1);
                                $numrows = mysqli_num_rows($result1);

                                if($numrows != 0){
                            ?>

                        <table>
                            <tr>
                                <th>CV Title</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                                $sql = "SELECT * FROM ".$prefix."cvuserrec WHERE userid = '$userid'";
                                $result = $db->conn->query($sql);
                                while ($rws = $result->fetch_array()) {
                                    $tr ="<tr><td>".$rws['title']."</td><td><a title='View CV' href='viewcv.php?recid=".$rws['id']."'><i class='fa-solid fa-eye'></i></a> &nbsp; &nbsp; <a title='Edit CV' href='updatecv.php?recid=".$rws['id']."'><i class='fa-solid fa-pen-to-square'></i></a> &nbsp;&nbsp; <a class='confirmation' title='Delete CV' href='controller/deletecv.php?recid=".$rws['id']."'><i class='fa-solid fa-trash'></i></a></td></tr>";

                                    echo $tr;

                                }
                            ?>
                        </table>
                        <?php }else{
                            echo "No CVs Added!";
                        }?>
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