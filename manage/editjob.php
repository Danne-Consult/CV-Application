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
    <title>Edit job</title>

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
                <h3>Edit Job</h3>

                        <?php 
                           if(isset($_POST['editjb'])){
                              
                                date_default_timezone_set('Africa/Nairobi');
                                $recid = $db->escape_string($_POST["recid"]);
                                $jbtitle = $db->escape_string($_POST["jobtitle"]);
                                $jbdesc = $db->escape_string($_POST["jobdesk"]);
                                $jbcategory = $db->escape_string($_POST["jobcategory"]);
                                $jbcity = $db->escape_string($_POST["jobcity"]);
                                $jbcountry = $db->escape_string($_POST["jobcountry"]);
                                $jbdue = $db->escape_string($_POST["duedate"]);
                                $jbtags = $db->escape_string($_POST["tags"]);
                                $status = "";

                                if(isset($_POST["status"])){
                                   $status = $_POST["status"];
                                }else{
                                    $status = '0';    
                                }

                                $currdate = date("y-m-d h:i:s");

                                $sql = "UPDATE ".$prefix."jobs SET job_title = '$jbtitle', job_desc = '$jbdesc', job_category = '$jbcategory', job_city = '$jbcity', job_country = '$jbcountry', job_tags ='$jbtags', submitdate = '$jbdue', status = '$status' WHERE id = '$recid'";
                        
                                $addjb = $db->conn->query($sql);
                            
                                if($addjb){  
                                    echo "Job Updated!";  
                                }else{  
                                    echo "Error: Cannot save information";  
                                }
                            }
                        ?>
                <?php include "includes/editjob.inc"; ?>
            </article>
        </div>
    </div>
    <?php include "includes/footer.inc"; ?>
    <script src="assets/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        
        $(document).ready(function() {
            			
			tinymce.init({
            selector: 'textarea#editor', 
            add_form_submit_trigger : true,
            plugins: 'lists advlist',
            toolbar: 'insertfile a11ycheck undo redo | bold italic | forecolor backcolor | template codesample | alignleft aligncenter alignright alignjustify | bullist numlist | link image'

            });
        });
    </script>
</body>
</html>