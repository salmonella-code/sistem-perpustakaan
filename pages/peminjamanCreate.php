<?php
require('./controller/peminjamanController.php');
$anggota = mysqli_query($con, "SELECT * FROM tbanggota WHERE status = 'Tidak Meminjam'");
$buku = mysqli_query($con, "SELECT * FROM tbbuku WHERE status = 'Tersedia'");

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
			<script>
				alert('data peminjaman berhasil ditambahkan!');
				document.location.href = './index.php?p=peminjaman';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data peminjaman gagal ditambahkan!');
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

            <div class="form-group">
                <label for="idTransaksi" class="font-weight-bold">ID Transaksi<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="idTransaksi" name="idTransaksi" placeholder="Masukkan ID Transaksi" required>
            </div>

            <div class="form-group">
                <label for="peminjam" class="font-weight-bold">Peminjam<span class="text-danger">*</span></label>
                <select class="form-control" id="peminjam" name="peminjam" placeholder="Masukkan peminjam" required>
                    <option value="" disabled selected>-- Pilih Peminjam --</option>
                    <?php foreach ($anggota as $key => $value) : ?>
                        <option value="<?= $value['idanggota']; ?>"><?= $value['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="buku" class="font-weight-bold">buku<span class="text-danger">*</span></label>
                <select class="form-control" id="buku" name="buku" placeholder="Masukkan buku" required>
                <option value="" disabled selected>-- Pilih Buku --</option>
                    <?php foreach ($buku as $key => $value) : ?>
                        <option value="<?= $value['idbuku']; ?>"><?= $value['judulbuku']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>