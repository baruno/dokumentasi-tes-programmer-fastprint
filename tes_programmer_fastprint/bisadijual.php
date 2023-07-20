<?php 
// koneksi ke mysql dan function
require 'connection.php';
// query untuk menampilkan data dengan status bisa dijual
$result = mysqli_query($conn, "SELECT * FROM fastprint where status = 'bisa dijual'" );

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
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
		</tr>
<!-- tampilkan semua data dengan status "bisa dijual"-->
        <?php while($row = mysqli_fetch_assoc($result)):?>
        <tr>
            <td><?php echo $row["id_produk"];?></td>
            <td><?php echo $row["nama_produk"];?></td>
            <td><?php echo $row["harga"];?></td>
            <td><?php echo $row["kategori"];?></td>
            <td><?php echo $row["status"];?></td>
        </tr>
        <?php endwhile; ?>
	</table>
	<button><a href="index.php">kembali</a></button>
	</div>
</body>
</html>