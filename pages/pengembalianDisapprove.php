<?php 
require ('./controller/pengembalianController.php');

$id = $_GET["id"];

if( disapprove($id) > 0 ) {
	echo "
		<script>
			alert('data pengembalian berhasil diedit!');
			document.location.href = './index.php?p=pengembalian';
		</script>
	";
} else {
	echo "
		<script>
			alert('data pengembalian gagal diedit!');
			document.location.href = './index.php?p=pengembalian';
		</script>
	";
}

?>