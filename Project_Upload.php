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
            $_GET['id'];
            echo $_GET['id'];
            ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Project KP</h1>
                        <hr>
                    </div>
                    <div class="card mb-4">
                        <div class="row col-md-12">    
                            <div class="card-header col-md-12">
                                <i class="fas fa-table me-1"></i>
                                Project Upload Mahasiswa
                            </div>
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>File</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                       //echo $koneksi;
                       $no=1;
                    //    echo $kodesesi;
                          $sql ="SELECT u.*,m.nim_mahasiswa FROM `uploadkp` u join mahasiswa_kp m on u.id_user=m.id_user where u.id_user=".$_GET['id'];
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                  <td><?php echo $no++;?></td>
                                      <td><?php echo $row['nim_mahasiswa'];?></td>
                                      <td><?php echo $row['namalengkap'];?></td>
                                      <td><?php echo $row['namafile'];?></td>
                                      <td><?php echo $row['status'];?></td>
                                      <td><a class="btn btn-primary" href="view/view-dokument.php?nama=<?php echo $row['namafile'];?>">Detail</a>
                                      <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal1<?php echo $row['id'];?>">Aksi</a>
                                    </td>
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
                $sql = 'SELECT * FROM uploadkp';
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
                        <form class="col-12" role="form" action="proses/aprove-project-mahasiswa.php?idset=<?php echo $_GET['id'];?>" method="post">
                            <div class="row">
                            <input type="text" hidden name="id" id="id" value="<?php echo $row['id']?>">
                            <label class="form-label col-12">Nama :</label>
                            <input type="text" disabled name="nama" id="nama" value="<?php echo $row['namalengkap']?>">
                            <label class="form-label col-12">File :</label>
                            <input type="text" disabled name="namafile" id="namafile" value="<?php echo $row['namafile']?>">
                            <label class="form-label col-12">alasan :</label>
                            <textarea class="form-control" name="comment"></textarea>
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

  <!-- Custom scripts for all pages-->
  <!-- <script src="js/sb-admin-2.min.js"></script> -->
    </body>
</html>
