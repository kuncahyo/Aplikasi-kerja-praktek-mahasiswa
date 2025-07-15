<?php
include ('../koneksi/koneksi.php');
$id=$_GET['id'];
$sql = (mysqli_query($koneksi,"DELETE FROM `bimbingan` WHERE id=$id"));
echo "<script type='text/javascript'>location.replace('../Bimbingan.php');</script>";
?>