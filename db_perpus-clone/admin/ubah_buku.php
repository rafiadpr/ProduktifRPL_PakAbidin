<?php
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
    <?php 
    include "koneksi.php";
    $qry_get_buku=mysqli_query($conn,"select * from buku where id_buku = '".$_GET['id_buku']."'");
    $dt_buku=mysqli_fetch_array($qry_get_buku);
    ?>
    <h3 align='center'>Ubah buku</h3>
    <form action="proses_ubah_buku.php" method="post">
        <input type="hidden" name="id_buku" value= "<?=$dt_buku['id_buku']?>" class="form-control" required>
        Nama Buku :
        <input type="text" name="nama_buku" value="<?=$dt_buku['nama_buku']?>" class="form-control" required>
        Pengarang : 
        <input type="text" name="pengarang" value="<?=$dt_buku['pengarang']?>" class="form-control" required>
        Deskripsi :
        <input type="text" name="deskripsi" value="<?=$dt_buku['deskripsi']?>" class="form-control" required>
        Foto :
        <input type="file" name="foto" value="<?=$dt_buku['foto']?>" class="form-control"><br>
        <input type="submit" name="simpan" value="Ubah buku" class="btn btn-primary">
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>