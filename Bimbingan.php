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
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php
      require('koneksi/koneksi.php');
        require('_partial/navbar.php');
            require('_partial/sidebar.php');
            $id_user=$_SESSION['id'];
            echo $id_user;
            $sqlawal= mysqli_query($koneksi,"select * from mahasiswa_kp where id_user=$id_user and status_dosen='approve'");
            // while ($row = mysqli_fetch_array($sqlawal))

            // menghitung jumlah data yang ditemukan
            $cek = mysqli_num_rows($sqlawal);
            // echo $cek;
            if($cek > 0){
            ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Bimbingan Kerja Praktek</h1>
                        <hr>
                    </div>
                    <div class="card mb-4">
                        <div class="row col-md-12">    
                            <div class="card-header col-md-8">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-header col-md-4">
                            <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">Tambah Data Bimbingan</a>
                                <!-- <a class="btn btn-success" href="#">Tambah Data Bimbingan</a> -->
                            </div>
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>NIM</th>
                                            <th>Nama File</th>
                                            <th>Tanggal</th>
                                            <th>Detail</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                       //echo $koneksi;
                       $no=1;
                          $sql = "Select * from bimbingan where id_mahasiswa=$id_user and status='Request'";
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $row['nim'];?></td>
                                    <td><?php echo $row['namalengkap'];?></td>
                                    <td><?php echo $row['namafile'];?></td>
                                    <td><?php echo $row['tanggal_bimbingan'];?></td>
                                    <td><a class="btn btn-primary" href="view/detail-bimbingan.php?nama=<?php echo $row['namafile'];?>">Detail</a></td>
                                    <td><a class="btn btn-danger" href="delete/delete-bimbingan.php?id=<?php echo $row['id'];?>">Delete</a></td>
                                  </tr>
                          <?php 
                            }
                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-4">
                        <div class="row col-md-12">    
                            <div class="card-header col-md-8">
                                <i class="fas fa-table me-1"></i>
                                Sudah Bimbingan
                            </div>
                            <div class="card-header col-md-4">
                            <!-- <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">1Tambah Data Bimbingan</a> -->
                                <a class="btn btn-primary" href="report-bimbingan.php?id=<?php echo $id_user;?>">print</a>
                            </div>
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="display table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>NIM</th>
                                            <th>Nama File</th>
                                            <th>Tanggal Bimbingan</th>
                                            <th>Selesai</th>
                                            <th>Status</th>
                                            <th>Komentar</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                       //echo $koneksi;
                       $no=1;
                          $sql = "Select * from bimbingan where id_mahasiswa=$id_user and status='approve'";
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $row['nim'];?></td>
                                    <td><?php echo $row['namalengkap'];?></td>
                                    <td><?php echo $row['namafile'];?></td>
                                    <td><?php echo $row['tanggal_bimbingan'];?></td>
                                    <td><?php echo $row['waktu_selesai'];?></td>
                                    <td><?php echo $row['status'];?></td>
                                    <td style="background-color:#E8DBD8 ;"><?php echo $row['komentar'];?></td>
                                    <td><a class="btn btn-primary" href="view/detail-bimbingan.php?nama=<?php echo $row['namafile'];?>">Detail</a></td>
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
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form method="POST" action="proses/tambah-bimbingan.php" enctype="multipart/form-data">
                            <label class="form-label col-4">Upload Data</label>
                            <input type="file" class="form-control-file" id="form" name="form">
                            <label class="form-label col-4">Tanggal Bimbingan</label>
                            <input type="datetime-local" class="form-control-file col-5" id="tgl" name="tgl">
                            <br>
                            <input type="submit" class="btn btn-success" id="tambah-form-1" name="tambah-form-1" value="upload">
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- akhir modal -->
                <?php
            }else{?>
                <div class="row col-md-12">    
                    <div class="card-header col-md-10">
                        <i class="fas fa-table me-1"></i>
                        Dosen Anda Belum Melakukan Approve Bimbingan 
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
    </body>
</html>
