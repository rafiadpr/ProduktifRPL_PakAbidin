<?php
if($_POST){
    $nama_produk=$_POST['nama_produk'];
    $deskripsi=$_POST['deskripsi'];
    $harga=$_POST['harga'];
    $foto_produk=$_POST['foto_produk'];
        include "../koneksi.php";
        $insert=mysqli_query($koneksi,"insert into produk (nama_produk, deskripsi, harga, foto_produk) value ('".$nama_produk."','".$deskripsi."','".$harga."', '".$foto_produk."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan produk');location.href='tambah_produk.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan produk');location.href='tambah_produk.php';</script>";
        }
    }
?>
