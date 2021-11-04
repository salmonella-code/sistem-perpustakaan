<?php
include "../controller/connection.php";
include('../controller/anggotaController.php');

$id = $_GET["id"];
$anggota = query("SELECT * FROM tbanggota WHERE idanggota = '$id'")[0];
?>

<link rel="stylesheet" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" href="../asset/css/style.css">

<div class="border border-dark w-50">
    <img src="../asset/images/Logo-Unindra.png" width="50px" height="50px" alt="logo unindar" class="d-block mx-auto mt-3">
    <h6 class="text-center font-weight-bold">Kartu Anggota <br>Perpustakaan Universitas Indraprasta PGRI</h6>
    <div class="border-bottom border-dark"></div>
    <div class="d-flex">
        <div class="wrapper-lg-img m-3">
            <?php
            $foto = $anggota['foto'];
            if ($foto == null || $foto == '-') {
                $foto = 'admin-no-photo.jpg';
            }
            ?>
            <img src="../asset/images/<?= $foto; ?>" alt="foto anggota">
        </div>
        <div class="d-flex align-items-center">
            <div>
                <p class="mb-0 font-weight-bold">ID Anggota</p>
                <p class="mb-0 font-weight-bold">Nama</p>
                <p class="mb-0 font-weight-bold">Jenis Kelamin</p>
                <p class="mb-0 font-weight-bold">Alamat</p>
            </div>
            <div>
                <p class="mb-0">: <?= $anggota['idanggota']; ?></p>
                <p class="mb-0">: <?= $anggota['nama']; ?></p>
                <p class="mb-0">: <?= $anggota['jeniskelamin']; ?></p>
                <p class="mb-0">: <?= $anggota['alamat']; ?></p>
            </div>
        </div>
    </div>
</div>
<script>
    window.print();
</script>