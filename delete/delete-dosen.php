<?php
include '../koneksi/koneksi.php';

$id = $_GET['id'];
        $sqlnya = "delete from dosen where id='$id'";
        $hasil = mysqli_query($koneksi,$sqlnya);
        
        if ($hasil){
          echo "<script>
          alert('Hapus Data Suksess !');
          document.location='../Editing-dosen.php';
           </script>";
        } 

// Close connection
mysqli_close($conn);
?>