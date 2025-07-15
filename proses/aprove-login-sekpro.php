<?php
include('../koneksi/koneksi.php');
session_start();

if (isset($_POST['approve'])) {
    $id = $_POST['id'];
    $sql2 = "UPDATE `sekpro` SET `status_akun`='approve' WHERE id=$id";
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Request-Login-Sekpro.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};
if (isset($_POST['decline'])){
    $id = $_POST['id'];
    $sql2 = "UPDATE `sekpro` SET `status_akun`='decline' WHERE id=$id";
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Request-Login-Sekpro.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};
?>