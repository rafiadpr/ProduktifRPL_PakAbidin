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
                <h3 align='center'>Data Siswa</h3>
                    <form method="post" action="tampil_siswa.php" class="d-flex">
                        <input class="form-control" type="search" name="cari" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type ="submit">Search</button>
                    </form>
        <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th><th>NAMA SISWA</th><th>TANGGAL LAHIR</th>
                <th>ALAMAT</th><th>GENDER</th>
                <th>USERNAME</th><th>KELAS</th><th>AKSI</th>
            </tr>
        </thead>
        
        <tbody>
        <?php
            include "koneksi.php";
            if(isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $qry_siswa=mysqli_query($conn, "select * from siswa where id_siswa = '$cari' or nama_siswa like '%$cari%' or tanggal_lahir like '%$cari%' or alamat like '%$cari%' or gender like '%$cari%' or username like '%$cari%' or id_kelas like '%$cari%'");
            }
            else{
                $qry_siswa = mysqli_query($conn, "select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas");
            }
            $no = 0;
            while ($data_siswa = mysqli_fetch_array($qry_siswa)) {
                $no++; 
        ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$data_siswa['nama_siswa']?></td> 
                <td><?=$data_siswa['tanggal_lahir']?></td> 
                <td><?=$data_siswa['alamat']?></td>
                <td><?=$data_siswa['gender']?></td> 
                <td><?=$data_siswa['username']?></td> 
                <td><?=$data_siswa['id_kelas']?></td>
                <td>
                        <a href="./ubah_siswa.php?id_siswa=<?= $data_siswa['id_siswa'] ?>" class="btn btn-success">Ubah</a> |
                        <a href="./hapus_siswa.php?id_siswa=<?= $data_siswa['id_siswa'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
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
        $qry_siswa = mysqli_query($conn, "select * from siswa");
        $no = 0;
        $data_siswa = mysqli_fetch_array($qry_siswa); {
        $no++; ?>
        <a href="./tambah_siswa.php?id_kelas=<?= $data_siswa['id_siswa'] ?>" class="btn btn-success">Tambah Siswa</a>
    <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
