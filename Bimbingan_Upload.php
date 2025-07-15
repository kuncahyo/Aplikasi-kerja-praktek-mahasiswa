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
            $id_user=$_GET['id'];
            // echo $id_user;
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
                                Permintaan Bimbingan
                            </div>
                            <div class="card-header col-md-4">
                            <!-- <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">1Tambah Data Bimbingan</a> -->
                                <!-- <a class="btn btn-success" href="#">Tambah Data Bimbingan</a> -->
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
                                            <th>Tanggal</th>
                                            <th>Detail</th>
                                            <th>Aksi</th>
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
                                    <td><a class="btn btn-success" data-toggle="modal" data-target="#exampleModal1<?php echo $row['id'];?>">Aksi</a></td>
                                  </tr>
                          <?php 
                            }
                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <!-- tabel 2 -->
                    <div class="card mb-4">
                        <div class="row col-md-12">    
                            <div class="card-header col-md-8">
                                <i class="fas fa-table me-1"></i>
                                Sudah Bimbingan
                            </div>
                            <div class="card-header col-md-4">
                            <!-- <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">1Tambah Data Bimbingan</a> -->
                                <!-- <a class="btn btn-success" href="#">Tambah Data Bimbingan</a> -->
                            </div>
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="display table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Name</th>
                                            <th>Nama File</th>
                                            <th>Tanggal Bimbingan</th>
                                            <th>Selesai</th>
                                            <th>Status</th>
                                            <th>Komentar</th>
                                            <th>Detail</th>
                                            <th>Aksi</th>
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
                                    <td><a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1<?php echo $row['id'];?>">Perubahan</a></td>
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
                <?php
                $sql = 'SELECT * FROM bimbingan';
                $query = mysqli_query($koneksi, $sql);
                    while ($row = mysqli_fetch_array($query))
                        {
                        ?>
                <div class="modal fade" id="exampleModal1<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form class="col-12" role="form" action="proses/aprove-bimbingan-mahasiswa.php" method="post">
                            <div class="row">
                            <input type="text" hidden name="id_user" id="id_user" value="<?php echo $id_user?>">
                            <input type="text" hidden name="id" id="id" value="<?php echo $row['id']?>">
                            <label class="form-label col-12">Nama :</label>
                            <input type="text" disabled name="nama" id="nama" value="<?php echo $row['namalengkap']?>">
                            <label class="form-label col-12">File :</label>
                            <input type="text" disabled name="namafile" id="namafile" value="<?php echo $row['namafile']?>">
                            <label class="form-label col-12">alasan :</label>
                            <textarea class="form-control" name="isi"></textarea>
                                <label class="form-label col-12">aksi :</label>
                                <div class="col-12">
                                <button type="submit" class="btn btn-success" name="approve">Aprove</button>
                                <button type="submit" class="btn btn-danger" name="decline">Decline</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                    <?php
                        };
                    ?>
                <!-- akhir modal -->
                <?php
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
