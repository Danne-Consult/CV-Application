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
    <title>CV Templates : Manager CV App</title>

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
                    <div class="alignright"><a href="addtemplate.php" class="btn-yellow_rounded" title="Add Job">Add Template <i class="fas fa-plus"></i></a></div>
                        <h3>All Templates</h3>
                        <div class="row">
                            <div class="col-md-3 cvbx">
                                <div class="contbx">
                                    <div class="cvimg"></div>
                                    <div class="cont">
                                        
                                        <h5 class="aligncenter">Templatename</h5>
                                        <div class="floatleft"><p><b>Author:</b> Authrname<br /><b>Created on:</b> 27 Jan 2022<br /><b>Cost:</b></b> <i>Free</i></p></div>
                                        <div class="floatright alignright"><a href="#" title="Edit Template"><i class='fa-solid fa-pen-to-square'></i></a></p>&nbsp;&nbsp;<a href="#" title="Delete Template"><i class='fa-solid fa-trash'></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <?php include "includes/footer.inc"; ?>
    <script>
        $('.confirmation').on('click', function () {
            return confirm('Are you sure you want to delete this CV template?');
        });
    </script>
</body>
</html>