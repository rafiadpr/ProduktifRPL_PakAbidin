<?php 
    if($_GET['id_kelas']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($conn,"delete from kelas where id_kelas='".$_GET['id_kelas']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus kelas');location.href='tampil_kelas.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus kelas');location.href='tampil_kelas.php';</script>";
        }
    }
?>