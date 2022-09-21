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
                <h3 align='center'>Data Kelas</h3>
                    <form method="post" action="tampil_kelas.php" class="d-flex">
                        <input class="form-control" type="search" name="cari" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type ="submit">Search</button>
                    </form>
        <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th><th>NAMA KELAS</th><th>Kelompok</th><th>Aksi</th>
            </tr>
        </thead>
        
        <tbody>
        <?php
            include "koneksi.php";
            if(isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $qry_kelas=mysqli_query($conn, "select * from kelas where id_kelas = '$cari' or nama_kelas like '%$cari%' or kelompok like '%$cari%'");
            }
            else{
                $qry_kelas = mysqli_query($conn, "select * from kelas");
            }
            $no = 0;
            while ($data_kelas = mysqli_fetch_array($qry_kelas)) { 
        ?>
            <tr>
                <td><?=$data_kelas['id_kelas']?></td>
                <td><?=$data_kelas['nama_kelas']?></td>
                <td><?=$data_kelas['kelompok']?></td>
                <td>
                    <a href="./ubah_kelas.php?id_kelas=<?= $data_kelas['id_kelas'] ?>" class="btn btn-success">Ubah</a>
                    <a href="./hapus_kelas.php?id_kelas=<?= $data_kelas['id_kelas'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php 
            }
            ?>
            </div>
        </tbody>
    </table>
    <?php
        include "koneksi.php";
        $qry_kelas = mysqli_query($conn, "select * from kelas");
        $no = 0;
        $data_kelas = mysqli_fetch_array($qry_kelas); {
        $no++; ?>
        <a href="./tambah_kelas.php?id_kelas=<?= $data_kelas['id_kelas'] ?>" class="btn btn-success">Tambah Kelas</a>
    <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
