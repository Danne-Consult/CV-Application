<?php
   include "controller/sessioncheck.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Job/Careers:CV App</title>

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
                        <h3>Job Listings</h3><br />
                            <?php
                                    include("manage/_db-conf/dbconf.php");
                                         
                                    $db = new DBconnect;
                                    $prefix = $db->prefix;
                                    $resultsperpage = 10;   
                                    $sql = "SELECT * FROM ".$prefix."jobs ";  
                                    $result = $db->conn->query($sql);  
                                    $numrows = mysqli_num_rows($result);
                     
                                    $pagemumber = ceil ($numrows / $resultsperpage);  
                                    $pagLink="";
                                
                                    if (!isset ($_GET['page']) ) {  
                                        $page = 1;  
                                    } else {  
                                        $page = $_GET['page'];  
                                    }  
                                    
                                    $firstresult = ($page-1) * $resultsperpage;     
                                    $sql1 = "SELECT * FROM ".$prefix."jobs ORDER BY id DESC  LIMIT " . $firstresult . ',' . $resultsperpage;  
                                    $result = $db->conn->query($sql1); 
                                    if($numrows!=0){
                                        while ($row = mysqli_fetch_array($result)) {  
                                            $jobtab =  "<h4>".$row['job_title']."</h4><p class='smalltext'>Added on ".$row['createdon']." &nbsp; Tags: ".$row['job_tags']."</p>";  
                                            $jobtab .="<p><a class='readmore' href='job.php?recid=".$row['id']."'>See Job <i class='fa-solid fa-arrow-right-long'></i></a></p><hr />";
                                            echo $jobtab; 
                                        } 
                                    }else{
                                        echo "<p>No jobs listed</p>";
                                    }
                            ?>
                            <br />
                            <div class="paginationbx">
                                <?php
                                    if($page>=2){   
                                        echo "<a class='nextprevbtn' href='?page=".($page-1)."'>Prev </a>";   
                                    }                      
                                    for ($i=1; $i<=$pagemumber; $i++) {   
                                        if ($i == $page) {   
                                            $pagLink .= "<a class='pagelink active' href='?page=".$i."'>".$i."</a>";   
                                        }               
                                        else  {   
                                            $pagLink .= "<a class='pagelink' href='?page=".$i."'>".$i."</a>";     
                                        }   
                                    }     
                                    echo $pagLink;   
                                    if($page<$pagemumber){   
                                        echo "<a class='nextprevbtn' href='?page=".($page+1)."'>Next</a>";   
                                    }  
                                ?>
                            </div>
                        </div>
                    </div> 
                </div>
            </article>
        </div>
    </div>
    <?php include "includes/footer.inc"; ?>
</body>
</html>