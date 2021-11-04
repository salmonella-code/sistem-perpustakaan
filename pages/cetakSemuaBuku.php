<?php
include "../controller/connection.php";
$buku = mysqli_query($con, "SELECT * FROM tbbuku ORDER BY idbuku DESC");
?>

<link rel="stylesheet" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" href="../asset/css/style.css">

<h3 class="font-weight-bold">Data Buku</h3>
<table class="table-bordered">
    <thead>
        <tr class="bg-blue">
            <th class="text-capitalize">No</th>
            <th>ID Buku</th>
            <th class="text-capitalize">Judul Buku</th>
            <th class="text-capitalize">Kategori</th>
            <th class="text-capitalize">Penggarang</th>
            <th class="text-capitalize">Penerbit</th>
            <th class="text-capitalize">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($buku as $key => $value) : ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $value['idbuku']; ?></td>
                <td><?= $value['judulbuku']; ?></td>
                <td><?= $value['kategori']; ?></td>
                <td><?= $value['pengarang']; ?></td>
                <td><?= $value['penerbit']; ?></td>
                <td><?= $value['status']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    window.print();
</script>