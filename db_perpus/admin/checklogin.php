<?php
    session_start();
    if($_SESSION['proses_login.php']){
        header('location: db_perpus/login.php');
    }
?>