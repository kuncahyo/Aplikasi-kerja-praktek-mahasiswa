<?php
include '../koneksi/koneksi.php';

$id = $_GET['id'];
        $sqlnya = "delete from ppkp where id='$id'";
        $hasil = mysqli_query($koneksi,$sqlnya);
        
        if ($hasil){
          echo "<script>
          alert('Hapus Data Suksess !');
          document.location='../Editing-ppkp.php';
           </script>";
        } 

// Close connection
mysqli_close($conn);
?>