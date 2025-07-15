<?php
include('../koneksi/koneksi.php');
$id=$_GET['id'];
$subject=$_GET['subject'];

$sql =mysqli_query($koneksi,"SELECT id_pertama , id_kedua, subject FROM `pesan` WHERE id_pertama=".$id." or id_kedua=".$id." and subject='".$subject."';");
$row = mysqli_fetch_assoc($sql);
    $satu = $row['id_pertama'];
    $dua = $row['id_kedua'];

    $sql2 =mysqli_query($koneksi,"SELECT id_user FROM `ppkp` WHERE id_user=".$satu." or id_user=".$dua);
    $row2 = mysqli_fetch_assoc($sql2);

    $id_target=$row2['id_user'];
    echo $id_target;
    echo "<script type='text/javascript'>location.replace('../message.php?id=$id_target&subject=$subject');</script>";


?>