<?php
    include "navbar.php";
?>
<h2 align='center'>Daftar Produk</h2>
<div class="row">
    <?php 
    include "../koneksi.php";
    $qry_produk=mysqli_query($koneksi,"select * from produk");
    while($dt_produk=mysqli_fetch_array($qry_produk)){
        ?>
        <div class="col-md-3">
            <div class="card" >
              <img src="img/<?=$dt_produk['foto_produk']?>">
              <div class="card-body">
                <h5 class="card-title"><?=$dt_produk['nama_produk']?></h5>
                <h6 class="card-title"><?=$dt_produk['harga']?></h6>
                <p class="card-text"><?=substr($dt_produk['deskripsi'], 0,1000)?></p>
                <a href="beli_produk.php?id_produk=<?=$dt_produk['id_produk']?>" class="btn btn-primary">Tambahkan</a>
              </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
