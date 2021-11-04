<?php
require('./controller/peminjamanController.php');
$id = $_GET["id"];

$transaksi = query("SELECT * FROM tbtransaksi JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota JOIN tbbuku ON tbtransaksi.idbuku = tbbuku.idbuku WHERE idtransaksi = '$id'")[0];

$anggota = mysqli_query($con, "SELECT * FROM tbanggota WHERE status = 'Tidak Meminjam'");
$buku = mysqli_query($con, "SELECT * FROM tbbuku WHERE status = 'Tersedia'");

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "
			<script>
				alert('data peminjaman berhasil diubah!');
				document.location.href = './index.php?p=peminjaman';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data peminjaman gagal diubah!');
				document.location.href = './index.php?p=peminjaman';
			</script>
		";
    }
}
?>

<div>
    <h3>Input Data Peminjaman Buku</h3>
</div>

<div class="card border-0 shadow">
    <div class="card-body">
        <form action="" method="post">

        <input type="hidden" value="<?= $transaksi['idtransaksi']; ?>" name="id" id="id">
        <input type="hidden" value="<?= $transaksi['idanggota']; ?>" name="peminjamLama" id="peminjamLama">
        <input type="hidden" value="<?= $transaksi['idbuku']; ?>" name="bukuLama" id="bukuLama">

            <div class="form-group">
                <label for="idTransaksi" class="font-weight-bold">ID Transaksi<span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="<?= $transaksi['idtransaksi']; ?>" id="idTransaksi" name="idTransaksi" placeholder="Masukkan ID Transaksi" disabled>
            </div>

            <div class="form-group">
                <label for="peminjam" class="font-weight-bold">Peminjam<span class="text-danger">*</span></label>
                <select class="form-control" id="peminjam" name="peminjam" placeholder="Masukkan peminjam" required>
                <option value="<?= $transaksi['idanggota']; ?>" selected><?= $transaksi['nama']; ?></option>    
                <option value="" disabled>-- Pilih Peminjam --</option>
                    <?php foreach ($anggota as $key => $value) : ?>
                        <option value="<?= $value['idanggota']; ?>" <?php echo ($value['idanggota'] ==  $transaksi['idanggota']) ? ' selected="selected"' : '';?> ><?= $value['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="buku" class="font-weight-bold">buku<span class="text-danger">*</span></label>
                <select class="form-control" id="buku" name="buku" placeholder="Masukkan buku" required>
                <option value="<?= $transaksi['idbuku']; ?>" selected><?= $transaksi['judulbuku']; ?></option>
                <option value="" disabled>-- Pilih Buku --</option>
                    <?php foreach ($buku as $key => $value) : ?>
                        <option value="<?= $value['idbuku']; ?>"><?= $value['judulbuku']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="tglPinjam" class="font-weight-bold">Tanggal Peminjaman<span class="text-danger">*</span></label>
                <input type="date" class="form-control" value="<?= $transaksi['tglpinjam']; ?>" id="tglPinjam" name="tglPinjam">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>