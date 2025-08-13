<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php
    require('koneksi/koneksi.php');
        require('_partial/navbar.php');
            require('_partial/sidebar.php');
            $idses=$_SESSION['id'];
            // echo $idawal;
            $sqlawal= mysqli_query($koneksi,"select * from dosen where id_user=$idses and status_akun='approve'");
            // while ($row = mysqli_fetch_array($sqlawal))

            // menghitung jumlah data yang ditemukan
            $cek = mysqli_num_rows($sqlawal);
            // echo $cek;
            if($cek > 0){
            // echo $id_login;
            ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Form Bimbingan Mahasiswa</h1>
                        <hr>
                    </div>
                    <div class="card mb-4">
                        <div class="row col-md-12">    
                            <div class="card-header col-md-12">
                                <i class="fas fa-table me-1"></i>
                                Form Bimbingan Mahasiswa
                            </div>
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Permintaan Tanggal Bimbingan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                       //echo $koneksi;
                       $no=1;
                    //    echo $kodesesi;
                        $sqldosen ="SELECT * FROM `dosen` where id_user=$idses";
                        $query = mysqli_query($koneksi, $sqldosen);
                             while ($row = mysqli_fetch_array($query))
                                {
                                    $iddosen= $row['id'];
                                }
                          $sql ="SELECT DISTINCT * FROM `bimbingan` where id_dosen=$iddosen";
                          //id_dosen = id login
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                  <td><?php echo $no++;?></td>
                                      <td><?php echo $row['nim'];?></td>
                                      <td><?php echo $row['namalengkap'];?></td>
                                      <td><?php echo $row['tanggal_bimbingan'];?></td>
                                      <td><a class="btn btn-success" href="Bimbingan_Upload.php?id=<?php echo $row['id_mahasiswa'];?>">Aksi</a></td>
                                  </tr>
                          <?php 
                            }
                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </main>
                <!-- modal -->
                <!-- akhir modal -->
                <?php
            }else{?>
                <div class="row col-md-12">    
                    <div class="card-header col-md-10">
                        <i class="fas fa-table me-1"></i>
                        Status akun Anda tidak aktif 
                    </div>
                </div>
            <?php
            }
                require('_partial/footer.php')
                ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

          <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <!-- <script src="js/sb-admin-2.min.js"></script> -->
    </body>
</html>
