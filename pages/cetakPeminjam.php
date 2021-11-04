<?php
include "../controller/connection.php";
include('../controller/peminjamanController.php');

$id = $_GET["id"];
$buku = query("SELECT tbtransaksi.idtransaksi, tbtransaksi.tglpinjam, tbbuku.judulbuku, tbanggota.nama FROM tbtransaksi JOIN tbbuku ON tbbuku.idbuku =  tbtransaksi.idbuku JOIN tbanggota ON tbanggota.idanggota = tbtransaksi.idanggota WHERE idtransaksi = '$id'")[0];

?>

<link rel="stylesheet" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" href="../asset/css/style.css">

<div class="border border-dark w-50">
    <img src="../asset/images/Logo-Unindra.png" width="50px" height="50px" alt="logo unindar" class="d-block mx-auto mt-3">
    <h6 class="text-center font-weight-bold">Kartu Peminjaman Buku <br>Perpustakaan Universitas Indraprasta PGRI</h6>
    <div class="border-bottom border-dark"></div>
    <div class="d-flex align-items-center px-3">
        <div>
            <p class="mb-0 font-weight-bold">ID Transaksi</p>
            <p class="mb-0 font-weight-bold">Peminjam</p>
            <p class="mb-0 font-weight-bold">Judul buku</p>
            <p class="mb-0 font-weight-bold">Tanggal Pinjam</p>
        </div>
        <div>
            <p class="mb-0">: <?= $buku['idtransaksi']; ?></p>
            <p class="mb-0">: <?= $buku['nama']; ?></p>
            <p class="mb-0">: <?= $buku['judulbuku']; ?></p>
            <p class="mb-0">: <?= date('d F Y', strtotime($buku['tglpinjam'])); ?></p>
        </div>
    </div>
</div>
<script>
    window.print();
</script>