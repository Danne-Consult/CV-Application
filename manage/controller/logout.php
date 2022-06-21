<?php 
session_start();

$userid = $_SESSION['userid'];
include "../_db-conf/dbconf.php";

logout($userid);

function logout($user){
    $db = new DBconnect;
    $prefix = $db->prefix;
    date_default_timezone_set("Africa/Nairobi");
	$currdatetime= date("y-m-d h:i:s");

    $sql = $sqlx= "UPDATE ".$prefix."manageusers SET lastlogout='$currdatetime' WHERE userid='$user'";
    $db->conn->query($sql);
    session_destroy();
    header('location:../login.php');
}
?>