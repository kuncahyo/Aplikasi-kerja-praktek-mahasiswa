<?php
include('../koneksi/koneksi.php');
session_start();
$kodesesi=$_SESSION['id'];
$nama=$_SESSION['nama'];
$tgl=date('Y-m-d');
$maxsql =mysqli_query($koneksi,"SELECT max(id)+1 as nomor FROM `uploadkp`;");
while ($row = mysqli_fetch_array($maxsql))
{
    $no = number_format($row['nomor']);
};
$direktory="../berkas/";

if (isset($_POST['tambah-form-0'])) {
  $file=$_FILES['form-1']['name'];
  $sql = (mysqli_query($koneksi,"DELETE FROM `uploadkp` WHERE id_user=$kodesesi and kode=0"));

  move_uploaded_file($_FILES['form-0']['tmp_name'],$direktory.$_FILES['form-0']['name']);
  $sql2 = "INSERT INTO `uploadkp`(`id`, `id_user`, `namalengkap`, `namafile`, `tanggal`, `kode`, `status`) 
  VALUES ('$no','$kodesesi','$nama','$file','$tgl','0','pending')";
  if(mysqli_query($koneksi, $sql2)){
      echo "<script type='text/javascript'>location.replace('../Pengajuan-Data.php');</script>";
      // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
} else{
  echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
  // echo("Error description: " . $koneksi->error);
  //  echo $sql;
}
};

if (isset($_POST['tambah-form-1'])) {
    $file=$_FILES['form-1']['name'];
    $sql = (mysqli_query($koneksi,"DELETE FROM `uploadkp` WHERE id_user=$kodesesi and kode=1"));

    move_uploaded_file($_FILES['form-1']['tmp_name'],$direktory.$_FILES['form-1']['name']);
    $sql2 = "INSERT INTO `uploadkp`(`id`, `id_user`, `namalengkap`, `namafile`, `tanggal`, `kode`, `status`) 
    VALUES ('$no','$kodesesi','$nama','$file','$tgl','1','pending')";
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Pengajuan-Data.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};

if (isset($_POST['tambah-form-2'])) {
    $file=$_FILES['form-2']['name'];
    $sql = (mysqli_query($koneksi,"DELETE FROM `uploadkp` WHERE id_user=$kodesesi and kode=2"));

    move_uploaded_file($_FILES['form-2']['tmp_name'],$direktory.$_FILES['form-2']['name']);
    $sql2 = "INSERT INTO `uploadkp`(`id`, `id_user`, `namalengkap`, `namafile`, `tanggal`, `kode`, `status`) 
    VALUES ('$no','$kodesesi','$nama','$file','$tgl','2','pending')";
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Pengajuan-Data.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};

if (isset($_POST['tambah-form-3'])) {
    $file=$_FILES['form-3']['name'];
    $sql = (mysqli_query($koneksi,"DELETE FROM `uploadkp` WHERE id_user=$kodesesi and kode=3"));

    move_uploaded_file($_FILES['form-3']['tmp_name'],$direktory.$_FILES['form-3']['name']);
    $sql2 = "INSERT INTO `uploadkp`(`id`, `id_user`, `namalengkap`, `namafile`, `tanggal`, `kode`, `status`) 
    VALUES ('$no','$kodesesi','$nama','$file','$tgl','3','pending')";;
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Pengajuan-Data.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};

if (isset($_POST['tambah-form-4'])) {
    $file=$_FILES['form-4']['name'];
    $sql = (mysqli_query($koneksi,"DELETE FROM `uploadkp` WHERE id_user=$kodesesi and kode=4"));

    move_uploaded_file($_FILES['form-4']['tmp_name'],$direktory.$_FILES['form-4']['name']);
    $sql2 = "INSERT INTO `uploadkp`(`id`, `id_user`, `namalengkap`, `namafile`, `tanggal`, `kode`, `status`) 
    VALUES ('$no','$kodesesi','$nama','$file','$tgl','4','pending')";;
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Pengajuan-Data.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};

if (isset($_POST['tambah-form-5'])) {
    $file=$_FILES['form-5']['name'];
    $sql = (mysqli_query($koneksi,"DELETE FROM `uploadkp` WHERE id_user=$kodesesi and kode=5"));

    move_uploaded_file($_FILES['form-5']['tmp_name'],$direktory.$_FILES['form-5']['name']);
    $sql2 = "INSERT INTO `uploadkp`(`id`, `id_user`, `namalengkap`, `namafile`, `tanggal`, `kode`, `status`) 
    VALUES ('$no','$kodesesi','$nama','$file','$tgl','5','pending')";;
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Hasil-Akhir.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};

if (isset($_POST['tambah-form-bimbingan'])) {
    $file=$_FILES['form-bimbingan']['name'];
    $sql = (mysqli_query($koneksi,"DELETE FROM `uploadkp` WHERE id_user=$kodesesi and kode=6"));

    move_uploaded_file($_FILES['form-bimbingan']['tmp_name'],$direktory.$_FILES['form-bimbingan']['name']);
    $sql2 = "INSERT INTO `uploadkp`(`id`, `id_user`, `namalengkap`, `namafile`, `tanggal`, `kode`, `status`) 
    VALUES ('$no','$kodesesi','$nama','$file','$tgl','6','pending')";;
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Hasil-Akhir.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};

if (isset($_POST['tambah-form-akhir'])) {
    $file=$_FILES['form-akhir']['name'];
    $sql = (mysqli_query($koneksi,"DELETE FROM `uploadkp` WHERE id_user=$kodesesi and kode=7"));

    move_uploaded_file($_FILES['form-akhir']['tmp_name'],$direktory.$_FILES['form-akhir']['name']);
    $sql2 = "INSERT INTO `uploadkp`(`id`, `id_user`, `namalengkap`, `namafile`, `tanggal`, `kode`, `status`) 
    VALUES ('$no','$kodesesi','$nama','$file','$tgl','7','pending')";;
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Hasil-Akhir.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};
?>