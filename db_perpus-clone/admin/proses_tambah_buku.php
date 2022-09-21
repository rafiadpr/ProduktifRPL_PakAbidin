<?php
if($_POST){
    $nama_buku=$_POST['nama_buku'];
    $pengarang=$_POST['pengarang'];
    $deskripsi=$_POST['deskripsi'];
    $foto=$_POST['foto'];
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into buku (nama_buku, pengarang, deskripsi, foto) value ('".$nama_buku."','".$pengarang."','".$deskripsi."','".$foto."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan buku');location.href='tampil_buku.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan buku');location.href='tambah_buku.php';</script>";
        }
    }
?>