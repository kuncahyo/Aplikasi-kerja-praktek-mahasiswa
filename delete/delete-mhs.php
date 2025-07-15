<?php
include '../koneksi/koneksi.php';

$id = $_GET['id'];
        $sqlnya = "delete from mahasiswa_kp where id='$id'";
        $hasil = mysqli_query($koneksi,$sqlnya);
        
        if ($hasil){
          echo "<script>
          alert('Hapus Data Suksess !');
          document.location='../Editing-mahasiswa.php';
           </script>";
        } 

// Close connection
mysqli_close($conn);
?>