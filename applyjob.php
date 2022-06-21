<?php
   include "controller/sessioncheck.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Job:CV App</title>

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
                        <h3>Job Application</h3><br />
                        <?php 
                            if(isset($_GET['jobid'])){
                                include("manage/_db-conf/dbconf.php");
                                $db = new DBconnect();
                                $prefix = $db->prefix;
                                $userid = $_SESSION['user'];

                                $jobid = $_GET['jobid'];
                                $sql = "SELECT * FROM ".$prefix."jobs WHERE id = '$jobid'";
                                $result = $db->conn->query($sql);
                                $rws = $result->fetch_array();
                                
                                $sql2 = "SELECT * FROM ".$prefix."cvuserrec WHERE userid= '$userid'";
                                $result2 = $db->conn->query($sql2);                            
                        ?>
                        
                        <form action="controller/applyjob.php" method="POST" class="contactForm">
                            <input type="hidden" name="jobid" value="<?php echo $jobid;?>" />
                            <p>You are applying for: <b><?php echo $rws['job_title']; ?></b></p><br />

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="cvselect">Select a CV to apply attach to the application</label><br />
                                    <select name="cvselect">
                                        <option>...</option>
                                        <?php 
                                            while($rws2 = $result2->fetch_array()){
                                                echo "<option value='".$rws2['id']."'>".$rws2['title']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-lg-12">
                                <label for="coverletter">Share your reason to apply for this job</label><br />
                                    <textarea name="coverletter" id="editor" cols="30" rows="10"></textarea><br /><br />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="submit" class="submit confirmation" name="applyjb" value="Send Application">
                                </div>
                            </div>
                        </form>

                        <?php 
                            }else{
                                header("location:viewjobs.php?error=Select a job apply for");
                            }
                        ?>
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
    <script src="manage/assets/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
         $(document).ready(function() {
            			
                tinymce.init({
                selector: 'textarea#editor',
                menubar: false, 
                add_form_submit_trigger : true,
                plugins: 'lists advlist',
                toolbar: 'insertfile a11ycheck undo redo | bold italic | forecolor backcolor | template codesample | alignleft aligncenter alignright alignjustify | bullist numlist | link image'
        
                });


                $('.confirmation').on('click', function () {
                    return confirm('Are you sure you want to send this application');
                });

            });
    </script>
</body>
</html>