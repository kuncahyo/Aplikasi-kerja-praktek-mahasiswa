<?php
include('../koneksi/koneksi.php');
session_start();
$kodesesi=$_SESSION['id'];
$nama=$_SESSION['nama'];

// mengajukan
if (isset($_POST['tambah-form-ttd'])) {
    $maxsql =mysqli_query($koneksi,"SELECT max(id)+1 as nomor FROM `tanda_tangan`;");
        while ($row = mysqli_fetch_array($maxsql))
        {
            $no = number_format($row['nomor']);
        };
    $file=$_FILES['form-ttd']['name'];
    $tgl=date('Y-m-d');
    $penerima=$_POST['penerima'];
    $tipe=$_POST['tipe'];
    $info=$_POST['info'];
    $direktory="../ttd/";
    move_uploaded_file($_FILES['form-ttd']['tmp_name'],$direktory.$_FILES['form-ttd']['name']);
    $sql2 = "INSERT INTO `tanda_tangan`(`id`, `mengajukan`, `penerima`, `tipe`, `file`, `info`, `tanggal`, `status`) 
    VALUES ('$no','$kodesesi','$penerima','$tipe','$file','$info','$tgl','pending')";
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Pengajuan-Tanda-Tangan.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no."<br>".$tgl1."<br>".$tgl2;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};
?>