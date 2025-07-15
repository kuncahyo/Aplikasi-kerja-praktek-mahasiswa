<?php

include '../koneksi/koneksi.php';

$kirim = mysqli_real_escape_string($koneksi, $_REQUEST['pengirim']);
$terima = mysqli_real_escape_string($koneksi, $_REQUEST['penerima']);
$subject = mysqli_real_escape_string($koneksi, $_REQUEST['subject']);
$pesan = mysqli_real_escape_string($koneksi, $_REQUEST['pesan']);
echo $kirim.$terima.$subject.$pesan;
// echo $id."<br>";
// echo $id_user;
    // Proses upload
    $sql = "INSERT INTO `pesan`(`id_pertama`, `id_kedua`, `subject`, `isi`) VALUES (".$kirim.",".$terima.",'".$subject."','".$pesan."')";
// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('../message.php?id=".$terima."&subject=".$subject."');</script>";
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('jasa.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }


?>