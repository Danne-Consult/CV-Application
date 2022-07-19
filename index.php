<?php 
session_start();
if(isset($_SESSION['userid'])){
    header('location:home.php');
}else{
    header('location:login.php');
}
?>