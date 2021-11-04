<?php
require('./controller/connection.php');

$buku = mysqli_query($con, "SELECT tbtransaksi.idtransaksi, tbtransaksi.tglpinjam, tbtransaksi.tglkembali, tbbuku.judulbuku, tbanggota.nama FROM tbtransaksi JOIN tbbuku ON tbbuku.idbuku =  tbtransaksi.idbuku JOIN tbanggota ON tbanggota.idanggota = tbtransaksi.idanggota");

?>
<div>
    <h3>Tampil Data Pengembalian Buku</h3>
</div>

<div class="card border-0 shadow">
    <div class="card-header">
        <a target="_blank" href="pages/cetakSemuaPengembalian.php" class="btn btn-info rounded-pill"><i class="fas fa-fw fa-print"></i> Cetak Pengembalian Buku</a>
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
                        <th class="text-capitalize">Tanggal Kembali</th>
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
                            <td><?= ($value['tglkembali'] == '1970-01-01') ? "Buku Belum Kembali" : date('d F Y', strtotime($value['tglkembali'])); ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a target="_blank" href="pages/cetakPengembalian.php?id=<?= $value['idtransaksi']; ?>" class="btn btn-sm btn-success"><i class="fas fa-fw fa-print"></i></a>
                                    <?php if ($value['tglkembali'] == '1970-01-01') : ?>
                                        <a href="index.php?p=pengembalianApprove&id=<?= $value['idtransaksi']; ?>" onclick="return confirm('Apakah anda yakin buku ini sudah kembali ?');" class="btn btn-sm btn-info"><i class="fas fa-fw fa-thumbs-up text-white"></i></a>
                                    <?php else: ?>
                                        <a href="index.php?p=pengembalianDisapprove&id=<?= $value['idtransaksi']; ?>" onclick="return confirm('Apakah anda yakin buku ini belum kembali ?');" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-thumbs-down text-white"></i></a>
                                    <?php endif; ?>
                                    <a href="index.php?p=pengembalianDelete&id=<?= $value['idtransaksi']; ?>" onclick="return confirm('Apakah anda yakin ingin menhapus transaksi ini ?');" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>