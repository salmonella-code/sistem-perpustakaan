<?php
require('./controller/connection.php');
$anggota = mysqli_query($con, "SELECT * FROM tbanggota");
?>
<div>
    <h3>Tampil Data Anggota</h3>
</div>

<div class="card border-0 shadow">
    <div class="card-header">
        <a href="index.php?p=anggotaCreate" class="btn btn-success rounded-pill"><i class="fas fa-fw fa-plus"></i> Tambah Anggota</a>
        <a target="_blank" href="pages/cetakSemuaAnggota.php" class="btn btn-info rounded-pill"><i class="fas fa-fw fa-print"></i> Cetak Anggota</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr class="bg-blue">
                        <th class="text-capitalize">No</th>
                        <th>ID Anggota</th>
                        <th class="text-capitalize">Nama</th>
                        <th class="text-capitalize">foto</th>
                        <th class="text-capitalize">jenis kelamin</th>
                        <th class="text-capitalize">alamat</th>
                        <th class="text-capitalize">opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($anggota as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $value['idanggota']; ?></td>
                            <td><?= $value['nama']; ?></td>
                            <td>
                                <div class="wrapper-lg-img shadow">
                                    <?php
                                    $foto = $value['foto'];
                                    if ($foto == null || $foto == '-') {
                                        $foto = 'admin-no-photo.jpg';
                                    }
                                    ?>
                                    <img src="asset/images/<?= $foto; ?>" alt="foto anggota">
                                </div>
                            </td>
                            <td><?= $value['jeniskelamin']; ?></td>
                            <td><?= $value['alamat']; ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a target="_blank" href="pages/cetakAnggota.php?id=<?= $value['idanggota']; ?>" class="btn btn-sm btn-success"><i class="fas fa-fw fa-print"></i></a>
                                    <a href="index.php?p=anggotaEdit&id=<?= $value['idanggota']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit text-white"></i></a>
                                    <a href="index.php?p=anggotaDelete&id=<?= $value['idanggota']; ?>" onclick="return confirm('Apakah anda yakin ingin menhapus anggota ini ?');" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>