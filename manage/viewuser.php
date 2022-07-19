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
    <title>View User : Manager CV App</title>

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
                <?php
                    $userid = $_GET['recid'];
                    $sql="SELECT * FROM ".$prefix."cvappusers WHERE id='$userid'";
                    $result= $db->conn->query($sql);
                    $rws = $result->fetch_array();
                ?>

            <div class="row">
                <div class="col-lg-12">
                <div class="alignright"><a href="mailto:<?php echo $rws['email']; ?>" class="btn-yellow_rounded" title="Contact User">Contact User <i class="fas fa-envelope"></i></a></div>
                        <h3>View User</h3><br />
                        <h4><?php echo $rws['firstname'] ." ". $rws['lastname']; ?></h4>
                        <div class="row">
                            <div class="col-lg-4">
                                <p><b>Sector:</b> <?php echo $rws['sector']; ?><br />
                                <b>Email</b>: <?php echo $rws['email']; ?><br /></div>
                            <div class="col-lg-4">
                                <b>gender</b>: <?php echo $rws['gender']; ?><br />
                                <b>Country</b>: <?php echo $rws['country']; ?></p>
                            </div>
                        </div>
                        
                        
                </div>
            </div>
            <br />

            <div class="row">
                <div class="col-lg-12">
                    <h4>User CVs</h4>
                    <?php
                        $sql1="SELECT * FROM ".$prefix."cvuserrec WHERE userid='$userid'";
                        $result1= $db->conn->query($sql1);
                        $numrows1 = mysqli_num_rows($result1);
                        if($numrows1!==0){
                            echo "<p class='smalltext'>".$numrows1."/3 CVs Created</p>";
                            ?>
                            <table>
                                <tr>
                                    <th>CV Title</th>
                                    <th>Action</th>
                                </tr>
                                <?php 
                                    
                                    while ($rws1 = $result1->fetch_array()) {
                                        $tr ="<tr><td>".$rws1['title']."</td><td><a title='View CV' href='viewcv.php?recid=".$rws1['id']."'><i class='fa-solid fa-eye'></i></a> </td></tr>";

                                        echo $tr;

                                    }
                                ?>
                            </table>
                            <?php }else{
                                echo "No CVs Added!";
                            }
                        ?>
                </div>
            </div>
                
            </article>
        </div>
    </div>
    <?php include "includes/footer.inc"; ?>
    <script>
        $(document).ready(function(){
            $('#printcv').click(function(){
                event.preventDefault();
                window.print();
            });
        });
  </script>
</body>
</html>