<?php
    include 'navbar.php';
    session_start();
    if($_SESSION['status_login']!=true){
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
<div class="container">
        <div class="card">
            <div class="card-header">
                <h3 align='center'>Data Buku</h3>
                    <form method="post" action="tampil_buku.php" class="d-flex">
                        <input class="form-control" type="search" name="cari" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type ="submit">Search</button>
                    </form>
        <table class="table table-hover table-striped"><br>
        <?php
        include "koneksi.php";
        $qry_buku = mysqli_query($conn, "select * from buku");
        $no = 0;
        $data_buku = mysqli_fetch_array($qry_buku); {
        $no++; ?>
        <a href="./tambah_buku.php?id_buku=<?= $data_buku['id_buku'] ?>" class="btn btn-success">Tambah buku</a>
    <?php
    }
    ?>
        <thead>
            <tr>
                <th>NO</th><th>NAMA BUKU</th><th>PENGARANG</th><th>DESKRIPSI</th><th>FOTO</th><th>AKSI</th>
            </tr>
        </thead>

        <tbody>
        <?php
            include "koneksi.php";
            if(isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $qry_buku=mysqli_query($conn, "select * from buku where id_buku = '$cari' or nama_buku like '%$cari%' or pengarang like '%$cari%'");
            }
            else{
                $qry_buku = mysqli_query($conn, "select * from buku");
            }
            $no = 0;
            while ($data_buku = mysqli_fetch_array($qry_buku)) {
                $no++; 
        ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$data_buku['nama_buku']?></td>
                <td><?=$data_buku['pengarang']?></td>
                <td><?=$data_buku['deskripsi']?></td>
                <td><img src="../user/img/<?=$data_buku['foto']?>" style="width:100px"></td>
                <td>
                    <a href="./ubah_buku.php?id_buku=<?= $data_buku['id_buku'] ?>" class="btn btn-success">Ubah</a>
                    <a href="./hapus_buku.php?id_buku=<?= $data_buku['id_buku'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php 
            }
            ?>
            
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
