<?php 
    if($_POST){
        $email=$_POST['email'];
        $password=$_POST['password'];
            include "koneksi.php";
            $qry_login=mysqli_query($conn,"select * from petugas where email = '".$email."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_login)>0){
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['status_login']=true;
                header("location: home.php");
            }
             else {
                echo "<script>alert('email dan Password tidak benar');location.href='login.php';</script>";
            }
        }
    // perbedaan method get dan post

?>