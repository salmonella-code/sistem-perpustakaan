<?php 
require ('./controller/bukuController.php');

$id = $_GET["id"];

if( hapus($id) > 0 ) {
	echo "
		<script>
			alert('data buku berhasil dihapus!');
			document.location.href = './index.php?p=buku';
		</script>
	";
} else {
	echo "
		<script>
			alert('data buku gagal dihapus!');
			document.location.href = './index.php?p=buku';
		</script>
	";
}

?>