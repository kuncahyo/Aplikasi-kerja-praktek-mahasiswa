<?php
include('../koneksi/koneksi.php');
session_start();
$kodesesi=$_SESSION['id'];
$nama=$_SESSION['nama'];
$maxsql =mysqli_query($koneksi,"SELECT max(id)+1 as nomor FROM `pengumuman`;");
while ($row = mysqli_fetch_array($maxsql))
{
    $no = number_format($row['nomor']);
};
$direktory="../panduan/";

if (isset($_POST['tambah-panduan'])) {
    $file=$_FILES['nama']['name'];
    
    $tgl1=$_POST['tgl_mulai'];
    $tgl2=$_POST['tgl_akhir'];

    move_uploaded_file($_FILES['nama']['tmp_name'],$direktory.$_FILES['nama']['name']);
    $sql2 = "INSERT INTO `pengumuman`(`id`, `jenis_pengumuman`, `isi_pengumuman`, `tanggal_pelaksanaan`, `tanggal_berakhir`) 
    VALUES ('$no','Pengumuman','$file','$tgl1','$tgl2')";;
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Control-Panduan.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no."<br>".$tgl1."<br>".$tgl2;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};
?>