<?php   
    session_start();
    include "../koneksi.php";
    $cart=@$_SESSION['cart'];
    if(count($cart)>0){
        $lama_pinjam=5; //satuan hari
        $tgl_harus_kembali=date('Y-m-d',mktime(0,0,0,date('m'),(date('d')+$lama_pinjam),date('Y')));
        mysqli_query($koneksi,"insert into detail_transaksi (id_pelanggan) value('".$_SESSION['id_pelanggan']."','".date('Y-m-d')."','".$tgl_harus_kembali."')");
         $id=mysqli_insert_id($koneksi);
        foreach ($cart as $key_produk => $val_produk) {
            mysqli_query($koneksi,"insert into detail_tranksaksi (id_detail_transaksi,id_transaksi,id_produk,qty,subtotal) value('".$id."','".$val_produk['id_buku']."','".$val_produk['qty']."')");
        }
        unset($_SESSION['cart']);
        echo '<script>alert("Anda berhasil membeli produk");location.href="histori_pembelian.php"</script>';
    }
?>