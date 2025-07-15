<?php

include '../koneksi/koneksi.php';

$inputFirstName = mysqli_real_escape_string($koneksi, $_REQUEST['inputFirstName']);
$inputLastName = mysqli_real_escape_string($koneksi, $_REQUEST['inputLastName']);
$inputEmail = mysqli_real_escape_string($koneksi, $_REQUEST['inputEmail']);
$inputPassword = mysqli_real_escape_string($koneksi, md5($_REQUEST['inputPassword']));
$nomorinduk = mysqli_real_escape_string($koneksi, $_REQUEST['nomor-induk']);
$prodi = mysqli_real_escape_string($koneksi, $_REQUEST['prodi']);


$maxsql =mysqli_query($koneksi,"SELECT max(id)+1 as nomor FROM `users`;");
$row = mysqli_fetch_assoc($maxsql);
    $no = number_format($row['nomor']);
echo $no;

$maxsql2 =mysqli_query($koneksi,"SELECT max(id)+1 as nomor FROM `mahasiswa_kp`;");
$row = mysqli_fetch_assoc($maxsql2);
    $nomhs = number_format($row['nomor']);
echo $nomhs;

$maxsql3 =mysqli_query($koneksi,"SELECT max(id)+1 as nomor FROM `Dosen`;");
$row = mysqli_fetch_assoc($maxsql3);
    $nodsn = number_format($row['nomor']);
echo $nodsn;

$maxsql4 =mysqli_query($koneksi,"SELECT max(id)+1 as nomor FROM `ppkp`;");
$row = mysqli_fetch_assoc($maxsql4);
    $noppkp = number_format($row['nomor']);
echo $noppkp;

$maxsql5 =mysqli_query($koneksi,"SELECT max(id)+1 as nomor FROM `kaprodi`;");
$row = mysqli_fetch_assoc($maxsql5);
    $nokaprodi = number_format($row['nomor']);
echo $nokaprodi;


if (isset($_POST['create-user'])) {
    // $id_p = $_POST['id_p'];
    $status = $_POST['status'];
    if ($status =="Mahasiswa") {
        $perusahaan = $_POST['perusahaan'];
        $judul = $_POST['judul'];
        $alamat = $_POST['alamat'];
        $kontak = $_POST['kontak'];
        $sql ="INSERT INTO `users`(`id`, `nim`, `name`, `email`, `email_verified_at`, `password`, `status`) 
        VALUES ('$no','$nomorinduk','$inputFirstName $inputLastName','$inputEmail','','$inputPassword','$status')";
        $sql2 = mysqli_query($koneksi,"INSERT INTO `mahasiswa_kp`(`id`, `id_user`, `id_dosen`,`prodi`, `nim_mahasiswa`, `nama_mahasiswa`, `judu_kp`, `lokasi_kp`, `alamat`, `kontak`, `status_kp`) 
        VALUES ('$nomhs','$no','NULL','$prodi','$nomorinduk','$inputFirstName $inputLastName','$judul','$perusahaan','$alamat','$kontak','RequestLogin')");
    }else if($status =="Dosen"){
        $sql = "INSERT INTO `users`(`id`, `nim`, `name`, `email`, `email_verified_at`, `password`, `status`) 
        VALUES ('$no','$nomorinduk','$inputFirstName $inputLastName','$inputEmail','','$inputPassword','$status')";
        $sql2 = mysqli_query($koneksi,"INSERT INTO `dosen`(`id`, `id_user`, `nidn`, `prodi`, `name`, `email`, `status`, `status_akun`) 
        VALUES ('$nodsn','$no','$nomorinduk','$prodi','$inputFirstName $inputLastName','$inputEmail','$status','RequestLogin')");
    }else if($status=="PPKP"){
        $sql = "INSERT INTO `users`(`id`, `nim`, `name`, `email`, `email_verified_at`, `password`, `status`) 
        VALUES ('$no','$nomorinduk','$inputFirstName $inputLastName','$inputEmail','','$inputPassword','$status')";
        $sql2 = mysqli_query($koneksi,"INSERT INTO `ppkp`(`id`, `id_user`, `nip`, `nama`, `email`, `status`, `status_akun`) 
        VALUES ('$noppkp','$no','$nomorinduk','$inputFirstName $inputLastName','$inputEmail','$status','RequestLogin')");
    }else if($status=="Sekpro"){
        $sql = "INSERT INTO `users`(`id`, `nim`, `name`, `email`, `email_verified_at`, `password`, `status`) 
        VALUES ('$no','$nomorinduk','$inputFirstName $inputLastName','$inputEmail','','$inputPassword','$status')";
        $sql2 = mysqli_query($koneksi,"INSERT INTO `sekpro`(`id`, `id_user`, `nidn`, `prodi`, `nama`, `email`, `status`,`status_akun`) 
        VALUES ('$nokaprodi','$no','$nomorinduk','$prodi','$inputFirstName $inputLastName','$inputEmail','$status','RequestLogin')");
    }else{
        $sql = "INSERT INTO `users`(`id`, `nim`, `name`, `email`, `email_verified_at`, `password`, `status`) 
        VALUES ('$no','$nomorinduk','$inputFirstName $inputLastName','$inputEmail','$status','$inputPassword','$status')";
        $sql2 = mysqli_query($koneksi,"INSERT INTO `kaprodi`(`id`, `id_user`, `nidn`, `prodi`, `nama`, `email`, `status`,`status_akun`) 
        VALUES ('$nokaprodi','$no','$nomorinduk','$prodi','$inputFirstName $inputLastName','$inputEmail','$status','RequestLogin')");
    };

   
// echo $no."<br>".$nomorinduk."<br>".$inputFirstName."<br>".$inputLastName."<br>".$inputEmail."<br>".$inputPassword."<br>".$status;
    if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('../index.php');</script>";

  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }

};

// echo $sql;
 


?>