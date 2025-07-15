<?php
//memanggil file example.pdf yang berada di folder bernama file
include ('../koneksi/koneksi.php');
// $sql ="SELECT * FROM `uploadkp`";
// $query = mysqli_query($koneksi, $sql);
//     while ($row = mysqli_fetch_array($query))
//     {
//         $filePath = '../berkas/example.pdf';
//     }

$filePath = '../panduan/'.$_GET['nama'];
//Membuat kondisi jika file tidak ada
if (!file_exists($filePath)) {
    echo "The file $filePath does not exist";
    die();
}
//nama file untuk tampilan
$filename=$_GET['nama'];
header('Content-type:application/pdf');
header('Content-disposition: inline; filename="'.$filename.'"');
header('content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
//membaca dan menampilkan file
readfile($filePath);
?>