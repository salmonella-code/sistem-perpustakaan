<?php 
require ('./controller/pengembalianController.php');

$id = $_GET["id"];

if( approve($id) > 0 ) {
	echo "
		<script>
			alert('data pengembalian berhasil ditambahkan!');
			document.location.href = './index.php?p=pengembalian';
		</script>
	";
} else {
	echo "
		<script>
			alert('data pengembalian gagal ditambahkan!');
			document.location.href = './index.php?p=pengembalian';
		</script>
	";
}

?>