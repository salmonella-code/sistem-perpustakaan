<?php
include "../controller/connection.php";

$buku = mysqli_query($con, "SELECT tbtransaksi.idtransaksi, tbtransaksi.tglpinjam, tbtransaksi.tglkembali, tbbuku.judulbuku, tbanggota.nama FROM tbtransaksi JOIN tbbuku ON tbbuku.idbuku =  tbtransaksi.idbuku JOIN tbanggota ON tbanggota.idanggota = tbtransaksi.idanggota");

?>

<link rel="stylesheet" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" href="../asset/css/style.css">

<h3 class="font-weight-bold">Data Pengembalian Buku</h3>
<table class="table-bordered border-dark">
    <thead>
        <tr>
            <th class="text-capitalize">No</th>
            <th>ID Transaksi</th>
            <th class="text-capitalize">Peminjam</th>
            <th class="text-capitalize">Judul Buku</th>
            <th class="text-capitalize">Tanggal Pinjam</th>
            <th class="text-capitalize">Tanggal Kembali</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($buku as $key => $value) : ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $value['idtransaksi']; ?></td>
                <td><?= $value['nama']; ?></td>
                <td><?= $value['judulbuku']; ?></td>
                <td><?= date('d F Y', strtotime($value['tglpinjam'])); ?></td>
                <td><?= ($value['tglkembali'] == '1970-01-01') ? "Buku Belum Kembali" : date('d F Y', strtotime($value['tglkembali'])); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    window.print();
</script>