<?php
require('./controller/connection.php');
$buku = mysqli_query($con, "SELECT * FROM tbbuku");
?>
<div>
    <h3>Tampil Data Buku</h3>
</div>

<div class="card border-0 shadow">
    <div class="card-header">
        <a href="index.php?p=bukuCreate" class="btn btn-success rounded-pill"><i class="fas fa-fw fa-plus"></i> Tambah Buku</a>
        <a target="_blank" href="pages/cetakSemuaBuku.php" class="btn btn-info rounded-pill"><i class="fas fa-fw fa-print"></i> Cetak Buku</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr class="bg-blue">
                        <th class="text-capitalize">No</th>
                        <th>ID Buku</th>
                        <th class="text-capitalize">Judul Buku</th>
                        <th class="text-capitalize">Kategori</th>
                        <th class="text-capitalize">Penggarang</th>
                        <th class="text-capitalize">Penerbit</th>
                        <th class="text-capitalize">Status</th>
                        <th class="text-capitalize">opsi</th>
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
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a target="_blank" href="pages/cetakBuku.php?id=<?= $value['idbuku']; ?>" class="btn btn-sm btn-success"><i class="fas fa-fw fa-print"></i></a>
                                    <a href="index.php?p=bukuEdit&id=<?= $value['idbuku']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit text-white"></i></a>
                                    <a href="index.php?p=bukuDelete&id=<?= $value['idbuku']; ?>" onclick="return confirm('Apakah anda yakin ingin menhapus buku ini ?');" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>