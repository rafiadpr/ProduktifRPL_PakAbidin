<?php 
session_start();
    if($_SESSION['status_login']!=true){
        header('location: login.php');
    }
?>
<h2 align='center'>Selamat datang Admin di website Perpus Online.</h2>