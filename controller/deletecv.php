<?php
include("../manage/_db-conf/dbconf.php");
function deletecv($rec){
    $db = new DBconnect;
    $prefix = $db->prefix;

    $sql = "DELETE FROM ".$prefix."cvuserrec WHERE id='$rec'";
    $result = $db->conn->query($sql);

    if($result){
        header("Location:".$_SERVER['HTTP_REFERER']."?message=CV deleted");
    }else{
        header("Location:".$_SERVER['HTTP_REFERER']."?error=Error deleting record");
    }
}

if(isset($_GET['recid'])){
    $record = $_GET['recid'];
    deletecv($record);
}else{
    header("location:../cvmanagement.php?error=cannot delete CV");
};
?>