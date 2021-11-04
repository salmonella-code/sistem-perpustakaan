<?php
require('./controller/bukuController.php');

$id = $_GET["id"];

$buku = query("SELECT * FROM tbbuku WHERE idbuku = '$id'")[0];

if (isset($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "
			<script>
				alert('data buku berhasil diubah!');
				document.location.href = './index.php?p=buku';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data buku gagal diubah!');
				document.location.href = './index.php?p=buku';
			</script>
		";
    }
}
?>

<div>
    <h3>Edit Data Buku</h3>
</div>

<div class="card border-0 shadow">
    <div class="card-body">
        <form action="" method="post">
            <input type="text" value="<?= $buku['idbuku']; ?>" id="id" name="id">
            <div class="form-group">
                <label for="idBuku" class="font-weight-bold">ID Buku<span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="<?= $buku['idbuku']; ?>" id="idBuku" name="idBuku" placeholder="Masukkan ID Buku" required disabled>
            </div>

            <div class="form-group">
                <label for="judul" class="font-weight-bold">Judul Buku<span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="<?= $buku['judulbuku']; ?>" id="judul" name="judul" placeholder="Masukkan Judul Buku" required>
            </div>

            <div class="form-group">
                <label for="kategori" class="font-weight-bold">Kategori Buku<span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="<?= $buku['kategori']; ?>" id="kategori" name="kategori" placeholder="Masukkan Kategori Buku" required>
            </div>

            <div class="form-group">
                <label for="pengarang" class="font-weight-bold">Pengarang Buku<span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="<?= $buku['pengarang']; ?>" id="pengarang" name="pengarang" placeholder="Masukkan Pengarang Buku" required>
            </div>

            <div class="form-group">
                <label for="penerbit" class="font-weight-bold">Penerbit Buku<span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="<?= $buku['penerbit']; ?>" id="penerbit" name="penerbit" placeholder="Masukkan Penerbit Buku" required>
            </div>

            <div class="mb-3">
                <label for="status" class="font-weight-bold">Status Ketersediaan<span class="text-danger">*</span></label>
                <div class="custom-control custom-radio">
                    <input type="radio" id="status1" name="status" value="Tersedia" class="custom-control-input" <?= ($buku['status'] == 'Tersedia') ? "checked" : ""; ?> required>
                    <label class="custom-control-label" for="status1">Tersedia</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="status2" name="status" value="Dipinjam" class="custom-control-input" <?= ($buku['status'] == 'Dipinjam') ? "checked" : ""; ?> required>
                    <label class="custom-control-label" for="status2">Dipinjam</label>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>