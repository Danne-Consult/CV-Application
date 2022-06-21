<?php 
session_start();
if(isset($_SESSION['adminname']) || $_SESSION['type'] == 'admin' ){
    header('location:home.php');
}else{
    header('location:login.php');
}
?>