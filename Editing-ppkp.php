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
            ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit PPKP</h1>
                        <hr>
                    </div>
                    <div class="card mb-4">
                        <div class="row col-md-12">    
                          
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama </th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Status Akun</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                       //echo $koneksi;
                       $no=1;
                    //    echo $kodesesi;
                          $sql = 'SELECT * from PPKP';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                  <td>
                                
                                    <?= $no++;?></td>
                                      <td><?= $row['nip']; ?></td>
                                      <td><?= $row['nama'];?></td>
                                      <td><?= $row['email'];?></td>
                                      <td><?= $row['status'];?></td>
                                      <td><?= $row['status_akun'];?></td>
                                      <td><a class="btn btn-success" data-toggle="modal" data-target="#modal<?php echo $row['id'];?>"><i class="fa fa-pencil"></i></a>
                                      <a href="delete/delete-ppkp.php?hal=delete&id=<?= $row['id'];?>"
                                      class='btn btn-danger p-auto' onclick="return confirm('Data ini akan terhapus anda yakin?');"><i
                                         class='fa fa-trash'></i></a>
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
                $sql = 'SELECT * from PPKP';
                $query = mysqli_query($koneksi, $sql);
                    while ($row = mysqli_fetch_array($query))
                        {
                        ?>
                <div class="modal fade" id="modal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form class="col-12" role="form" action="edit/edit-ppkp.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                            <input type="text" hidden name="id" id="id" value="<?php echo $row['id']?>">
                            <label class="form-label col-12">NIP :</label>
                            <input type="text" name="nip" id="nip" class="form-control" value="<?php echo $row['nip']?>">
                            <label class="form-label col-12">Nama :</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $row['nama']?>">
                            <label class="form-label col-12">Email :</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email']?>">
                            <label class="form-label col-12">status :</label>
                            <select class="custom-select form-control" id="status" name="status" >
                          <?php if($row["status"] == 'Dosen') { ?>
                              <option value="Dosen" selected>Dosen</option>
                              <option value="Mahasiswa">Mahasiswa</option>
                              <option value="PPKP">PPKP</option>
                              <option value="Kaprodi">Kaprodi</option>
                          <?php }else if($row["status"] == 'Mahasiswa'){ ?>
                            <option value="Dosen">Dosen</option>
                              <option value="Mahasiswa" selected>Mahasiswa</option>
                              <option value="PPKP">PPKP</option>
                              <option value="Kaprodi">Kaprodi</option>
                          <?php }else if($row["status"] == 'PPKP'){ ?>
                            <option value="Dosen" >Dosen</option>
                              <option value="Mahasiswa">Mahasiswa</option>
                              <option value="PPKP" selected>PPKP</option>
                              <option value="Kaprodi">Kaprodi</option>
                          <?php }else { ?>
                            <option value="Dosen">Dosen</option>
                              <option value="Mahasiswa">Mahasiswa</option>
                              <option value="PPKP">PPKP</option>
                              <option value="Kaprodi" selected>Kaprodi</option>
                            <?php }?>
                        </select>
            
                            <label class="form-label col-12">Status Akun :</label>
                            <select class="custom-select form-control" id="statusakun" name="statusakun" >
                          <?php if($row["status_akun"] == 'approve') { ?>
                              <option value="approve" selected>Approve</option>
                              <option value="decline">Decline</option>
                              <option value="RequestLogin">RequestLogin</option>
                          <?php }else if($row["status_akun"] == 'decline'){ ?>
                            <option value="approve" >Approve</option>
                              <option value="decline"selected>Decline</option>
                              <option value="RequestLogin">RequestLogin</option>
                          <?php }else { ?>
                             <option value="approve">Approve</option>
                              <option value="decline">Decline</option>
                              <option value="RequestLogin" selected>RequestLogin</option>
                            <?php }?>
                        </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="approve">Submit</button>
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
