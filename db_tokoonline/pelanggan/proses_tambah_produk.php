<?php
if($_POST){
    $nama_kelas=$_POST['nama_produk'];

        include "../koneksi.php";
        $insert=mysqli_query($koneksi,"insert into produk (nama_produk, deskripsi, harga) value ('".$nama_produk."','".$deskripsi."','".$harga."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan produk');location.href='tambah_produk.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan produk');location.href='tambah_produk.php';</script>";
        }
    }
?>
