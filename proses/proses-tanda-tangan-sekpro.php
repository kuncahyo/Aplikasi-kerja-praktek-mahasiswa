<?php
include('../koneksi/koneksi.php');
session_start();
$kodesesi=$_SESSION['id'];
$nama=$_SESSION['nama'];

// menyetujui
if (isset($_POST['tambah-form-ttd'])) {
    // $maxsql =mysqli_query($koneksi,"SELECT max(id)+1 as nomor FROM `tanda_tangan`;");
    //     while ($row = mysqli_fetch_array($maxsql))
    //     {
    //         $no = number_format($row['nomor']);
    //     };
    $file=$_FILES['form-ttd']['name'];
    $tgl=date('Y-m-d');
    $id=$_POST['id_ttd'];
    $info=$_POST['info'];
    $direktory="../ttd/";

    echo $file;
    $cari =mysqli_query($koneksi,"SELECT file FROM `tanda_tangan` where id=$id;");
    $data= $cari -> fetch_assoc();
    $hapus= $data['file'];

    if(file_exists("../ttd/$hapus")){
        unlink("../ttd/$hapus");
    }

    $sql2 = "UPDATE `tanda_tangan` SET `file`='$file',`info`=' $info',`tanggal`='$tgl',`status`='Approve' where id=$id";
    if( move_uploaded_file($_FILES['form-ttd']['tmp_name'],$direktory.$_FILES['form-ttd']['name']) and mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Form-tanda-tangan-sekpro.php');</script>";

  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
 
  }
};

// ditolak
if (isset($_POST['salah'])) {
    // $maxsql =mysqli_query($koneksi,"SELECT max(id)+1 as nomor FROM `tanda_tangan`;");
    //     while ($row = mysqli_fetch_array($maxsql))
    //     {
    //         $no = number_format($row['nomor']);
    //     };

    $file=$_FILES['form-ttd']['name'];
    $tgl=date('Y-m-d');
    $id=$_POST['id_ttd'];
    $info=$_POST['info'];
    $direktory="../ttd/";

    echo $file;
    $cari =mysqli_query($koneksi,"SELECT file FROM `tanda_tangan` where id=$id;");
    $data= $cari -> fetch_assoc();
    $hapus= $data['file'];

    if(file_exists("../ttd/$hapus")){
        unlink("../ttd/$hapus");
    }

    $sql2 = "UPDATE `tanda_tangan` SET `file`='$file',`info`=' $info',`tanggal`='$tgl',`status`='Decline' where id=$id";
    if( move_uploaded_file($_FILES['form-ttd']['tmp_name'],$direktory.$_FILES['form-ttd']['name']) and mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Form-tanda-tangan-sekpro.php');</script>";

  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
 
  }
};
?>