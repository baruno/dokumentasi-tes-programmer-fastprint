<?php 
// koneksi ke mysql
require 'connection.php';
// ambil data 
$id = $_GET['id_produk'];
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['submit'])) {
	//ambil data dari tiap elemen form
	$nama = $_POST['nama_produk'];
	$harga = $_POST['harga'];
	$kategori = $_POST['kategori'];
	$status = $_POST['status'];
	// query untuk menguabh data
	$query = "UPDATE fastprint SET
				nama_produk = '$nama',
				harga = '$harga',
				kategori = '$kategori',
				status = '$status'
				where id_produk = $id
				";

	// cek apakah inputan berupa angka atau tidak
	if(!preg_match("/^[0-9]*$/", $harga)){
		echo "UBAH GAGAL !!! harga hanya diisi dengan angka";
	}
	else  {
		mysqli_query($conn,$query);
		echo "<script>
	alert('data berhasil diubah');
	document.location.href = 'index.php';
	</script>";
	}

}


// query data produk berdasarkan id produk
$data = mysqli_query($conn,"SELECT * FROM fastprint where id_produk = $id");



 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ubah produk</title>
</head>
<body>
	<h1>Ubah Produk</h1>
	<?php while($result = mysqli_fetch_assoc($data)):?>
	<form action="" method="post">
		<table style="margin-top: 50px;">
			<tr>
				<td><label for="id_produk">ID PRODUK</label></td>
				<td>:</td>
				<td><input type="text" name="id_produk" disabled  value="<?php echo $result["id_produk"]; ?>"></td>
			</tr>
			<tr>
				<!-- nama produk tidak boleh kosong -->
				<td><label for="nama_produk">NAMA PRODUK</label></td>
				<td>:</td>
				<td><input type="text" name="nama_produk" required value="<?php echo $result["nama_produk"]; ?>"></td>
			</tr>
			<tr>
				<td><label for="harga">HARGA</label></td>
				<td>:</td>
				<td><input type="text" name="harga"  value="<?php echo $result["harga"]; ?>"></td>
			</tr>
			<tr>
				<td><label for="kategori">KATEGORI</label></td>
				<td>:</td>
				<td><input type="text" name="kategori"  value="<?php echo $result["kategori"]; ?>"></td>
			</tr>
			<tr>
				<td><label for="status">STATUS</label></td>
				<td>:</td>
				<td><input type="text" name="status"  value="<?php echo $result["status"]; ?>"></td>
			</tr>
			<tr>
				<td> <button type="submit" name="submit">Ubah Produk</button> </td>
			</tr>
			<tr>
				<td><button><a href="index.php">kembali</a></button></td></tr>
		</table>

	</form>
	<?php endwhile; ?>

</body>
</html>