<?php
require('./controller/anggotaController.php');

if (isset($_POST["submit"])) {
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = './index.php?p=anggota';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = './index.php?p=anggota';
			</script>
		";
	}
}
?>

<div>
	<h3>Input Data Anggota</h3>
</div>

<div class="card border-0 shadow">
	<div class="card-body">
		<form action="" method="post" enctype="multipart/form-data">
		
			<div class="form-group">
				<label for="fotoAnggota" class="font-weight-bold">Foto Anggota</label>
				<input type="file" class="form-control-file" id="fotoAnggota" name="fotoAnggota">
			</div>

			<div class="form-group">
				<label for="idAnggota" class="font-weight-bold">ID Anggota<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="idAnggota" name="idAnggota" placeholder="Masukkan ID Anggota" required>
			</div>

			<div class="form-group">
				<label for="nama" class="font-weight-bold">Nama<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
			</div>

			<div class="mb-3">
				<label for="jenisKelamin" class="font-weight-bold">Jenis Kelamin<span class="text-danger">*</span></label>
				<div class="custom-control custom-radio">
					<input type="radio" id="jenisKelamin1" name="jenisKelamin" value="Pria" class="custom-control-input" required>
					<label class="custom-control-label" for="jenisKelamin1">Pria</label>
				</div>

				<div class="custom-control custom-radio">
					<input type="radio" id="jenisKelamin2" name="jenisKelamin" value="Wanita" class="custom-control-input" required>
					<label class="custom-control-label" for="jenisKelamin2">Wanita</label>
				</div>
			</div>

			<div class="form-group">
				<label for="alamat" class="font-weight-bold">Alamat<span class="text-danger">*</span></label>
				<textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Masukkan Alamat" required></textarea>
			</div>

			<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>