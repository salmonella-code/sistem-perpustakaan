<?php
include "../controller/connection.php";
include('../controller/bukuController.php');

$id = $_GET["id"];
$buku = query("SELECT * FROM tbbuku WHERE idbuku = '$id'")[0];
?>

<link rel="stylesheet" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" href="../asset/css/style.css">

<div class="border border-dark w-25">
    <img src="../asset/images/Logo-Unindra.png" width="50px" height="50px" alt="logo unindar" class="d-block mx-auto mt-3">
    <h6 class="text-center font-weight-bold">Perpustakaan <br> Universitas Indraprasta PGRI</h6>
    <div class="border-bottom border-dark"></div>
    <div class="d-flex align-items-center px-3">
        <div>
            <p class="mb-0 font-weight-bold">ID Buku</p>
            <p class="mb-0 font-weight-bold">Judul Buku</p>
            <p class="mb-0 font-weight-bold">Kategori</p>
            <p class="mb-0 font-weight-bold">Pengarang</p>
            <p class="mb-0 font-weight-bold">Penerbit</p>
        </div>
        <div>
            <p class="mb-0">: <?= $buku['idbuku']; ?></p>
            <p class="mb-0">: <?= $buku['judulbuku']; ?></p>
            <p class="mb-0">: <?= $buku['kategori']; ?></p>
            <p class="mb-0">: <?= $buku['pengarang']; ?></p>
            <p class="mb-0">: <?= $buku['penerbit']; ?></p>
        </div>
    </div>
</div>
<script>
    window.print();
</script>