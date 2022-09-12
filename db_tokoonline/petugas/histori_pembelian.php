<?php
    include "navbar.php";
?>
<h2 align='center'>Histori Pembelian Produk</h2>
<table class="table table-hover table-striped">
    <thead>
        <th>NO</th><th>Tanggal Beli</th><th>Nama Produk</th><th>Status</th><th>Aksi</th>
    </thead>
    <tbody>
        <?php 
        include "koneksi.php";
        $no=0;
        while($dt_histori=mysqli_fetch_array($qry_histori)){
            $no++;
            //menampilkan buku yang dipinjam
            $produk_dibeli="<ol>";
            $qry_buku=mysqli_query($koneksi,"select * from detail_pembelian_produk join produk on produk.id_produk=detail_pembelian_produk.id_produk where id_pembelian_produk = '".$dt_histori['id_pembelian_produk']."'");
            while($dt_buku=mysqli_fetch_array($qry_buku)){
                $produk_dibeli.="<li>".$dt_buku['nama_produk']."</li>";
            }
            $produk_dibeli.="</ol>";
            //menampilkan status sudah kembali atau belum
            $qry_cek_kembali=mysqli_query($koneksi,"select * from pengembalian_buku where id_pembelian_produk = '".$dt_histori['id_pembelian_produk']."'");
            if(mysqli_num_rows($qry_cek_kembali)>0){
                $dt_kembali=mysqli_fetch_array($qry_cek_kembali);
                $denda="denda Rp. ".$dt_kembali['denda'];
                $status_kembali="<label class='alert alert-success'>Sudah kembali <br>".$denda."</label>";
                $button_kembali="";
            } else {
                $status_kembali="<label class='alert alert-danger'>Belum kembali</label>";
                $button_kembali="<a href='kembali.php?id=".$dt_histori['id_pembelian_produk']."' class='btn btn-warning' onclick='return confirm(\"hello\")'>Kembalikan</a>";
            }
        ?>
            <tr>
                <td><?=$no?></td><td><?=$dt_histori['tanggal_pinjam']?></td><td><?=$dt_histori['tanggal_kembali']?></td><td><?=$produk_dibeli?></td><td><?=$status_kembali?></td><td><?=$button_kembali?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>