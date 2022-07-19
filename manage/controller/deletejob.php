<?php
	session_start();
    if (!isset($_SESSION['adminname']) || $_SESSION['type'] == 'admin'){
        session_destroy();
        header('location:login.php');
    }

    function deletejb($rec){
        include("../_db-conf/dbconf.php");
        $db = new DBconnect;
        $prefix = $db->prefix;
    
        $sql = "DELETE FROM ".$prefix."jobs WHERE id='$rec'";
        $result = $db->conn->query($sql);
    
        if($result){
            header("Location:".$_SERVER['HTTP_REFERER']."&message=CV deleted");
        }else{
            header("Location:".$_SERVER['HTTP_REFERER']."&error=Error deleting record");
        }
    }

    if(isset($_GET['recid'])){
        $recid=$_GET['recid'];
        deletejb($recid);
    }else{
        header("Location:".$_SERVER['HTTP_REFERER']);
    }

?>