<?php
require('./controller/connection.php');

$buku = mysqli_query($con, "SELECT tbtransaksi.idtransaksi, tbtransaksi.tglpinjam, tbbuku.judulbuku, tbanggota.nama FROM tbtransaksi JOIN tbbuku ON tbbuku.idbuku =  tbtransaksi.idbuku JOIN tbanggota ON tbanggota.idanggota = tbtransaksi.idanggota WHERE tbbuku.status = 'Dipinjam'");

?>
<div>
    <h3>Tampil Data Peminjaman Buku</h3>
</div>

<div class="card border-0 shadow">
    <div class="card-header">
        <a href="index.php?p=peminjamanCreate" class="btn btn-success rounded-pill"><i class="fas fa-fw fa-plus"></i> Tambah Peminjam Buku</a>
        <a target="_blank" href="pages/cetakSemuaPeminjam.php" class="btn btn-info rounded-pill"><i class="fas fa-fw fa-print"></i> Cetak Peminjam Buku</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr class="bg-blue">
                        <th class="text-capitalize">No</th>
                        <th>ID Transaksi</th>
                        <th class="text-capitalize">Peminjam</th>
                        <th class="text-capitalize">Judul Buku</th>
                        <th class="text-capitalize">Tanggal Pinjam</th>
                        <th class="text-capitalize">opsi</th>
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
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a target="_blank" href="pages/cetakPeminjam.php?id=<?= $value['idtransaksi']; ?>" class="btn btn-sm btn-success"><i class="fas fa-fw fa-print"></i></a>
                                    <a href="index.php?p=peminjamanEdit&id=<?= $value['idtransaksi']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit text-white"></i></a>
                                    <a href="index.php?p=peminjamanDelete&id=<?= $value['idtransaksi']; ?>" onclick="return confirm('Apakah anda yakin ingin menhapus transaksi ini ?');" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>