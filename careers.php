<?php
   include "controller/sessioncheck.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Boards:CV App</title>

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
                        <h3>Job Board</h3>
                        <div class="row">
                            <div class="col-lg-4">
                                <a href="viewjobs.php">
                                    <div class="useractions">
                                        <h4>View Jobs</h4>
                                        <p>Sort through our available jobs</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-4">
                                <a href="appliedjobs.php">
                                    <div class="useractions">
                                        <h4>View applied jobs</h4>
                                        <p>See jobs you applied for</p>
                                    </div>
                                </a>
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