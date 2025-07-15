<?php
include('../koneksi/koneksi.php');
session_start();

if (isset($_POST['approve'])) {
    $id = $_POST['id'];
    $idset=$_GET['idset'];
    $sql2 = "UPDATE `uploadkp` SET `status`='approve' WHERE id=$id";
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Project_Upload.php?id=$idset;');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};
if (isset($_POST['decline'])){
    $id = $_POST['id'];
    $idset=$_GET['idset'];
    $isi = $_POST['isi'];
    $sql2 = "UPDATE `uploadkp` SET `status`='decline' WHERE id=$id";
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Project_Upload.php?id=$idset;');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};
?>