<?php
require('./controller/bukuController.php');

if (isset($_POST["submit"])) {
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('data buku berhasil ditambahkan!');
				document.location.href = './index.php?p=buku';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data buku gagal ditambahkan!');
				document.location.href = './index.php?p=buku';
			</script>
		";
	}
}
?>

<div>
	<h3>Input Data Buku</h3>
</div>

<div class="card border-0 shadow">
	<div class="card-body">
		<form action="" method="post">
		
			<div class="form-group">
				<label for="idBuku" class="font-weight-bold">ID Buku<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="idBuku" name="idBuku" placeholder="Masukkan ID Buku" required>
			</div>

			<div class="form-group">
				<label for="judul" class="font-weight-bold">Judul Buku<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Buku" required>
			</div>

            <div class="form-group">
				<label for="kategori" class="font-weight-bold">Kategori Buku<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori Buku" required>
			</div>

            <div class="form-group">
				<label for="pengarang" class="font-weight-bold">Pengarang Buku<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukkan Pengarang Buku" required>
			</div>

            <div class="form-group">
				<label for="penerbit" class="font-weight-bold">Penerbit Buku<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan Penerbit Buku" required>
			</div>

			<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>