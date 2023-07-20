<?php 
// koneksi ke source code pengambilan data dari API
require 'ambildata.php';

// parameter koneksi ke mysql
$host = "localhost";
$user = "root";
$pass = "";
$db = "test_fastprint";

// koneksi ke mysql
$conn = mysqli_connect($host,$user,$pass,$db);

// membaca data dari web
$hasil =  $result["data"];

// pemrosesan data
 foreach($hasil as $row){
    // proses parsing data
    $no = $row['no'];
    $id = $row['id_produk'];
    $nama = $row['nama_produk'];
    $harga = $row['harga'];
    $kategori = $row['kategori'];
    $status = $row['status'];

// insert data hasil parsing ke mysql
    $query = "INSERT INTO fastprint VALUES ('$id','$nama','$harga','$kategori','$status')";

    $result = mysqli_query($conn,$query);

}

echo "import selesai..!!";

mysqli_close($conn);


?>