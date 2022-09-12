<?php
    $host="localhost";
    $user="root";
    $pass="";
    $database="db_tokoonline";
    $koneksi=mysqli_connect($host,$user,$pass,$database);

    //login
    if(isset($_POST['login'])){
        $username = $_POST['uname'];
        $password = $_POST['psw'];

        $cekuser = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
        $hitung = mysqli_num_rows($cekuser);

        if($hitung>0){
            $ambildatarole = mysqli_fetch_array($cekuser);
            $role = $ambildatarole['role'];
            if($role=='petugas'){
                $_SESSION['log'] = 'Logged';
                $_SESSION['role'] = 'Admin';
                header('location:pelanggan');
            }
            else { //masuk ke user
                $_SESSION['log'] = 'Logged';
                $_SESSION['role'] = 'User';
                header('location:petugas');
            }
        }
        else{
            echo 'Data tidak ditemukan';
        }
    }
?>