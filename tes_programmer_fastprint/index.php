<?php 
//koneksi ke mysql
require 'connection.php';
// query untuk mengambil data pada database
$result = mysqli_query($conn, "SELECT * FROM fastprint");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>daftar produk</title>
</head>
<body>

	<div class="container" style="background-color: white;">

	<h1>DAFTAR PRODUK</h1>

	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>ID_PRODUK</th>
			<th>NAMA_PRODUK</th>
			<th>HARGA</th>
			<th>KATEGORI</th>
			<th>STATUS</th>
			<th>Aksi</th>
		</tr>
<!-- menampilkan semua produk -->
        <?php while($row = mysqli_fetch_assoc($result)):?>
        <tr>
            <td><?php echo $row["id_produk"];?></td>
            <td><?php echo $row["nama_produk"];?></td>
            <td><?php echo $row["harga"];?></td>
            <td><?php echo $row["kategori"];?></td>
            <td><?php echo $row["status"];?></td>
            <td>
				<!-- fitur hapus -->
            	<a onclick="return confirm('apakah anda yakin menghapus data ini ..?')" href="hapus.php?id_produk=<?php echo $row["id_produk"];?>">hapus</a> | 
            	<!--fitur edit-->
				<a href="ubah.php?id_produk=<?php echo $row["id_produk"];?>">ubah</a>
            </td>
        </tr>
        <?php endwhile; ?>
	</table>
	<!--menampilkan data dengan status "bisa dijual"-->
	<button><a href="bisadijual.php">barang yang bisa dijual</a></button>
	<!-- fitur tambah-->
	<button><a href="tambah.php">tambah produk</a></button>
</div>

</body>
</html>