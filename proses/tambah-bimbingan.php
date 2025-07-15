<?php
include('../koneksi/koneksi.php');
session_start();
$kodesesi=$_SESSION['id'];
$nama=$_SESSION['nama'];
$maxsql =mysqli_query($koneksi,"SELECT max(id)+1 as nomor FROM `bimbingan`;");
while ($row = mysqli_fetch_array($maxsql))
{
    $no = number_format($row['nomor']);
};
$dosen =mysqli_query($koneksi,"SELECT * from mahasiswa_kp where id_user=$kodesesi;");
while ($row = mysqli_fetch_array($dosen))
{
    $id_d = $row['id_dosen'];
    $nim = $row['nim_mahasiswa'];
    echo $id_d."<br>";
    echo $nim."<br>";
};
$direktory="../bimbingan/";

if (isset($_POST['tambah-form-1'])) {
    $file=$_FILES['form']['name'];
    $tgl=$_POST['tgl'];
    

    move_uploaded_file($_FILES['form']['tmp_name'],$direktory.$_FILES['form']['name']);
    $sql2 = "INSERT INTO `bimbingan`(`id`, `id_mahasiswa`, `id_dosen`, `nim`, `namalengkap`, `namafile`, `tanggal_bimbingan`, `status`) 
    VALUES ('$no','$kodesesi','$id_d','$nim','$nama','$file','$tgl','Request')";
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Bimbingan.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};
?>