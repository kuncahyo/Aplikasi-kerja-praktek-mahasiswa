<?php
include('../koneksi/koneksi.php');
session_start();

if (isset($_POST['approve'])) {
    $id = $_POST['id'];
    $id_user = $_POST['id_user'];
    $isi = $_POST['isi'];
    $hariIni = date('Y-m-d H:i');
    $sql2 = "UPDATE `bimbingan` SET `status`='approve',`waktu_selesai`='$hariIni',`komentar`='$isi' WHERE id=$id";
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Bimbingan_Upload.php?id=$id_user');</script>";
        // echo $hariIni;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};
if (isset($_POST['decline'])){
    $id = $_POST['id'];
    $id_user = $_POST['id_user'];
    $isi = $_POST['isi'];
    $hariIni = date('Y-m-d H:i');
    $sql2 = "UPDATE `bimbingan` SET `status`='decline',`waktu_selesai`='$hariIni',`komentar`='$isi' WHERE id=$id";
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Bimbingan_Upload.php?id=$id_user');</script>";
        // echo $hariIni;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};
?>