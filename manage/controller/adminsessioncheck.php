<?php
session_start();

if (!isset($_SESSION['adminname'])){
    session_destroy();
    header('location:login.php');
}

?>