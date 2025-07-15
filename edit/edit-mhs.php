<?php
include '../koneksi/koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $_REQUEST['id']);;
    $nama_dosen = mysqli_real_escape_string($koneksi, $_REQUEST['nama_dosen']);
    $nim = mysqli_real_escape_string($koneksi, $_REQUEST['nim']);
    $nama = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);
    $judul_kp = mysqli_real_escape_string($koneksi, $_REQUEST['judulkp']);
    $lokasi_kp = mysqli_real_escape_string($koneksi, $_REQUEST['lokasikp']);
    $statuskp = mysqli_real_escape_string($koneksi, $_REQUEST['statuskp']);
    $statusdosen = mysqli_real_escape_string($koneksi, $_REQUEST['statusdosen']);
    $alamat = mysqli_real_escape_string($koneksi, $_REQUEST['alamat']);
    $kontak = mysqli_real_escape_string($koneksi, $_REQUEST['kontak']);
    $prodi = mysqli_real_escape_string($koneksi, $_REQUEST['prodi']);

    // $typelayout = 0;
    // $sql = "SELECT count(*) as total FROM mahasiswa_kp where id = '$id'";
    // $result = $koneksi->query($sql);
    // if ($result->num_rows > 0) {
    //   while($row = $result->fetch_assoc()) {
    //       if ($row["total"] < 1){
                $sql = "update mahasiswa_kp SET id_dosen='".$nama_dosen."',prodi='".$prodi."',nim_mahasiswa='".$nim."',nama_mahasiswa='".$nama."',judu_kp='".$judul_kp."',lokasi_kp='".$lokasi_kp."',alamat='".$alamat."',kontak='".$kontak."',status_kp='".$statuskp."',status_dosen='".$statusdosen."' where id = '".$id."'";
                $result = $koneksi->query($sql);

            
                    echo "<script type='text/javascript'>location.replace('../Editing-mahasiswa.php');</script>";
    //         }else{
    //             echo "<script type='text/javascript'>alert('Data NPK tidak tidak boleh kembar');location.replace('../Editing-mahasiswa.php');</script>";
    //         }
    //     }
    // }
// Close connection
// mysqli_close($);
?>