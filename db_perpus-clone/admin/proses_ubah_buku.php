<?php
if($_POST){
    $id_buku=$_POST['id_buku'];
    $nama_buku=$_POST['nama_buku'];
    $pengarang=$_POST['pengarang'];
    $deskripsi=$_POST['deskripsi'];
    $foto=$_POST['foto'];
        include "koneksi.php";
            $update=mysqli_query($conn,"update buku set nama_buku='".$nama_buku."', pengarang='".$pengarang."', deskripsi='".$deskripsi."', foto='".$foto."' where id_buku = '".$id_buku."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update buku');location.href='tampil_buku.php';</script>";
            } 
            else {
                echo "<script>alert('Gagal update buku');location.href='ubah_buku.php?id_buku=".$id_buku."';</script>";
            }
        } 
?>