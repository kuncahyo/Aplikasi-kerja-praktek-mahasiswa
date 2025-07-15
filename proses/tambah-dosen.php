<?php

include '../koneksi/koneksi.php';

session_start();
$id = mysqli_real_escape_string($koneksi, $_REQUEST['status']);
$id_user=$_SESSION['id'];
// echo $id."<br>";
// echo $id_user;
    // Proses upload
    $ceksql =mysqli_query($koneksi,"SELECT id_user FROM `dosen` where id=$id;");
    $dos = mysqli_fetch_assoc($ceksql);
        $cekdos =$dos['id_user'];
    $maxsql =mysqli_query($koneksi,"SELECT max(id)+1 as nomor FROM `request_pembimbing`;");
    while ($row = mysqli_fetch_array($maxsql))
    {
        $no = number_format($row['nomor']);
    };
    $sql = "UPDATE `mahasiswa_kp` SET `id_dosen`=$id, status_dosen='Request' WHERE id_user=$id_user";
    mysqli_query($koneksi,$sql2 = "INSERT INTO `request_pembimbing`(`id`, `id_mahasiswa`, `id_dosen`, `status`) 
    VALUES ('".$no."','".$id_user."','".$cekdos."','Request')");
// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('../Dosen.php');</script>";
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('jasa.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }


?>