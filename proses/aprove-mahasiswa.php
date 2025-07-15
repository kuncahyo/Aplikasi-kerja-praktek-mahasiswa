<?php
include('../koneksi/koneksi.php');
session_start();

if (isset($_POST['approve'])) {
    $id = $_POST['id'];
    $maxsql =mysqli_query($koneksi,"SELECT m.id, r.id_mahasiswa, r.id_dosen FROM `request_pembimbing` r join `mahasiswa_kp` m on m.id_user=r.id_mahasiswa where m.id=$id");
    $rowcek = mysqli_fetch_assoc($maxsql);
    $id_mahasiswa=$rowcek['id_mahasiswa'];
    $id_dosen=$rowcek['id_dosen'];
  
    $sql2 = "UPDATE `mahasiswa_kp` SET `status_dosen`='approve' WHERE id=$id";
    mysqli_query($koneksi,"UPDATE `request_pembimbing` SET `status`='approve' WHERE id_mahasiswa=$id_mahasiswa and id_dosen=$id_dosen");
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Mahasiswa-Bimbingan.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
        echo $id_mahasiswa.$id_dosen;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};
if (isset($_POST['decline'])){
    $id = $_POST['id'];
    $maxsql =mysqli_query($koneksi,"SELECT m.id, r.id_mahasiswa, r.id_dosen FROM `request_pembimbing` r join `mahasiswa_kp` m on m.id_user=r.id_mahasiswa where m.id=$id");
    $rowcek = mysqli_fetch_assoc($maxsql);
    $id_mahasiswa=$rowcek['id_mahasiswa'];
    $id_dosen=$rowcek['id_dosen'];

    $sql2 = "UPDATE `mahasiswa_kp` SET `status_dosen`='decline' WHERE id=$id";
    mysqli_query($koneksi,"UPDATE `request_pembimbing` SET `status`='decline' WHERE id_mahasiswa=$id_mahasiswa and id_dosen=$id_dosen");
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Mahasiswa-Bimbingan.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};
?>