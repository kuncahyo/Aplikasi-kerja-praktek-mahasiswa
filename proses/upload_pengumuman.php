<?php
include('../koneksi/koneksi.php');

if (isset($_POST['tambah-pengumuman'])) {
    $isi= $_POST['isi'];
    $mulai= $_POST['tgl_mulai'];
    $akhir= $_POST['tgl_akhir'];
    $maxsql =mysqli_query($koneksi,"SELECT max(id)+1 as nomor FROM `pengumuman`;");
        while ($row = mysqli_fetch_array($maxsql))
        {
            $no = number_format($row['nomor']);
        };
    $sql2 = "INSERT INTO `pengumuman`(`id`, `jenis_pengumuman`, `isi_pengumuman`, `tanggal_pelaksanaan`, `tanggal_berakhir`) 
    VALUES ('$no','Berita KP','$isi','$mulai','$akhir')";
    if(mysqli_query($koneksi, $sql2)){
        echo "<script type='text/javascript'>location.replace('../Control-Pengumuman.php');</script>";
        // echo $file."<br>".$kodesesi."<br>".$nama."<br>".$no;
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
};
?>