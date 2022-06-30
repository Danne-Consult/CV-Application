<?php
    if(isset($_POST['applyjb'])){
        session_start();

        include("../manage/_db-conf/dbconf.php");
        $db = new DBconnect;
        $prefix = $db->prefix;

        $jobid = $db->escape_string($_POST['jobid']);
        $cvid = $db->escape_string($_POST['cvselect']);
        $cover = $db->escape_string($_POST['coverletter']);

        $userid = $_SESSION['user'];
        
        $currentdate = date("y-m-d h:i:s");

        $sql = "INSERT INTO ".$prefix."userjobs (jobid,userid,userrecid,usercover,appliedon) VALUES ('$jobid','$userid','$cvid','$cover','$currentdate')";
        $result = $db->conn->query($sql);

        if($result){
            header("Location:".$_SERVER['HTTP_REFERER']."?message=Successfully applied");
        }else{
            header("Location:".$_SERVER['HTTP_REFERER']."?error=Error applying for job");     
        }

    }else{
        header("Location:".$_SERVER['HTTP_REFERER']."?error=Error applying for job"); 
    }
?>