<?php
include "../controller/connection.php";
$anggota = mysqli_query($con, "SELECT * FROM tbanggota ORDER BY idanggota DESC");
?>

<link rel="stylesheet" href="../asset/css/bootstrap.min.css">
<link rel="stylesheet" href="../asset/css/style.css">

<h3 class="font-weight-bold">Data Anggota</h3>
<table class="table-bordered border-dark">
	<thead>
		<tr>
			<th class="text-capitalize px-2">No</th>
			<th class="px-2">ID Anggota</th>
			<th class="text-capitalize px-2">Nama</th>
			<th class="text-capitalize px-2">foto</th>
			<th class="text-capitalize px-2">jenis kelamin</th>
			<th class="text-capitalize px-2">alamat</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($anggota as $key => $value) : ?>
			<tr>
				<td class="px-2"><?= $key + 1; ?></td>
				<td class="px-2"><?= $value['idanggota']; ?></td>
				<td class="px-2"><?= $value['nama']; ?></td>
				<td>
					<div class="wrapper-lg-img m-3">
						<?php
						$foto = $value['foto'];
						if ($foto == null || $foto == '-') {
							$foto = 'admin-no-photo.jpg';
						}
						?>
						<img src="../asset/images/<?= $foto; ?>" alt="foto anggota">
					</div>
				</td>
				<td class="px-2"><?= $value['jeniskelamin']; ?></td>
				<td class="px-2"><?= $value['alamat']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<script>
	window.print();
</script>