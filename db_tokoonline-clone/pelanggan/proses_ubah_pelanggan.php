<?php
if($_POST){
    $id_pelanggan=$_POST['id_pelanggan'];
    $nama_pelanggan=$_POST['nama_pelanggan'];
    $alamat=$_POST['alamat'];
    $telp=$_POST['telp'];
    $username=$_POST['username'];
    $password=$_POST['password'];
        include "../koneksi.php";
        if(empty($password)){
            $update=mysqli_query($koneksi,"update pelanggan set nama_pelanggan='".$nama_pelanggan ."', alamat='".$alamat."', username='".$username."' where id_pelanggan = '".$id_pelanggan."' ") or die(mysqli_error($koneksi));
            mysqli_error($koneksi);
            if($update){
                echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";
            } else {
                echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
            }
        } else {
            $update=mysqli_query($koneksi,"update pelanggan set nama_pelanggan='".$nama_pelanggan ."', alamat='".$alamat."', username='".$username."', password='".md5($password)."' where id_pelanggan = '".$id_pelanggan."'") or die(mysqli_error($koneksi));
            if($update){
                echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";
            } else {
                echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
            }
        }
        
    } 
?>