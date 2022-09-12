<?php
    include "navbar.php";
?>
<h2 align='center'>Daftar Produk di Keranjang</h2>
<table class="table table-hover striped">
    <thead>
        <tr>
            <th>NO</th><th>Nama Produk</th><th>Jumlah</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        session_start();
        foreach (@$_SESSION['cart'] as $key_produk => $val_produk): ?>
            <tr>
                <td><?=($key_produk+1)?></td><td><?=$val_produk['nama_produk']?></td><td><?=$val_produk['qty']?></td><td><a href="hapus_cart.php?id=<?=$key_produk?>" class="btn btn-danger"><strong>X</strong></a></td>
            </tr>

        <?php endforeach ?>
    </tbody>
</table>
<a href="checkout.php" class="btn btn-primary">Check Out</a>    