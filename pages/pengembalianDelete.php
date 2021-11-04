<?php 
require ('./controller/pengembalianController.php');

$id = $_GET["id"];

if( hapus($id) > 0 ) {
	echo "
		<script>
			alert('data transaksi berhasil dihapus!');
			document.location.href = './index.php?p=pengembalian';
		</script>
	";
} else {
	echo "
		<script>
			alert('data transaksi gagal dihapus!');
			document.location.href = './index.php?p=pengembalian';
		</script>
	";
}

?>