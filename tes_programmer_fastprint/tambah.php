<?php 
// koneksi ke mysql
require 'connection.php';
// cek apakah tombol submit sudah ditekan atu belum
if (isset($_POST['submit'])) {
	//ambil data dari tiap elemen form
	$id = $_POST['id_produk'];
	$nama = $_POST['nama_produk'];
	$harga = $_POST['harga'];
	$kategori = $_POST['kategori'];
	$status = $_POST['status'];
	//queri insert data
	$query = "INSERT INTO fastprint VALUES
				('$id','$nama','$harga','$kategori','$status')";

	// cek apakah inputan harga berupa angka atu tidak
	if(!preg_match("/^[0-9]*$/", $harga)){
		echo "INPUT GAGAL !!! harga hanya diisi dengan angka";
	}
	else  {
		mysqli_query($conn,$query);
		echo "<script>
	alert('data berhasil ditambahkan');
	document.location.href = 'index.php';
	</script>";
	}

}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>tambah produk</title>
</head>
<body>
	<h1>Tambah Produk</h1>
	<form action="" method="post">
		<table style="margin-top: 50px;">
			<tr>
				<td><label for="id_produk">ID PRODUK</label></td>
				<td>:</td>
				<td><input type="text" name="id_produk" ></td>
			</tr>
			<tr>
				<!-- nama harus diisi -->
				<td><label for="nama_produk">NAMA PRODUK</label></td>
				<td>:</td>
				<td><input type="text" name="nama_produk" required></td>
			</tr>
			<tr>
				<td><label for="harga">HARGA</label></td>
				<td>:</td>
				<td><input type="text" name="harga" ></td>
			</tr>
			<tr>
				<td><label for="kategori">KATEGORI</label></td>
				<td>:</td>
				<td><input type="text" name="kategori" ></td>
			</tr>
			<tr>
				<td><label for="status">STATUS</label></td>
				<td>:</td>
				<td><input type="text" name="status" ></td>
			</tr>
			<tr>
				<td> <button type="submit" name="submit">Tambah Produk</button> </td>
			</tr>
			<tr>
				<td><button><a href="index.php">kembali</a></button></td></tr>
		</table>

	</form>

</body>
</html>