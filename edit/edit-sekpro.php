<?php
include '../koneksi/koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $_REQUEST['id']);;
    $nidn = mysqli_real_escape_string($koneksi, $_REQUEST['nidn']);
    $name = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_REQUEST['email']);
    $status = mysqli_real_escape_string($koneksi, $_REQUEST['status']);
    $status_akun = mysqli_real_escape_string($koneksi, $_REQUEST['statusakun']);


    // $typelayout = 0;
    // $sql = "SELECT count(*) as total FROM mahasiswa_kp where id = '$id'";
    // $result = $koneksi->query($sql);
    // if ($result->num_rows > 0) {
    //   while($row = $result->fetch_assoc()) {
    //       if ($row["total"] < 1){
                $sql = "update sekpro SET nidn='".$nidn."',nama='".$name."',email='".$email."',status='".$status."',status_akun='".$status_akun."' where id = '".$id."'";
                $result = $koneksi->query($sql);

            
                echo "<script type='text/javascript'>location.replace('../Editing-sekpro.php');</script>";
    //         }else{
    //             echo "<script type='text/javascript'>alert('Data id tidak tidak boleh kembar');location.replace('../Editing-mahasiswa.php');</script>";
    //         }
    //     }
    // }
// Close connection
// mysqli_close($conn);
?>