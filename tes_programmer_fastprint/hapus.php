<?php 
//koneksi ke mysql
require 'connection.php';
// ambil data
$id = $_GET["id_produk"];
//fungsi untuk menghapus produk
function hapus($id){
	global $conn;
	mysqli_query($conn,"DELETE FROM fastprint where id_produk = $id");
	return mysqli_affected_rows($conn);
}

if (hapus($id) > 0) {
	echo "
	<script>
	alert('data berhasil dihapus');
	document.location.href = 'index.php';
	</script>";

}
else {
	echo "
	<script>
	alert('data gagal dihapus');
	document.location.href = 'index.php';
	</script>";

}


 ?>