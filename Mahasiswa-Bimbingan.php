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
            $id_login=$_SESSION['id'];
            // echo $idawal;
            $sqlawal= mysqli_query($koneksi,"select * from dosen where id_user=$id_login and status_akun='approve'");
            // while ($row = mysqli_fetch_array($sqlawal))

            // menghitung jumlah data yang ditemukan
            $cek = mysqli_num_rows($sqlawal);
            // echo $cek;
            if($cek > 0){
            // echo $id_login;
            ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Request Bimbingan Mahasiswa</h1>
                        <hr>
                    </div>
                    <div class="card mb-4">
                        <div class="row col-md-12">    
                            <div class="card-header col-md-12">
                                <i class="fas fa-table me-1"></i>
                               Request bimbingan Mahasiswa
                            </div>
                        </div>
                        <!-- table 1 -->
                            <div class="card-body">
                                <?php
                                $maxno =mysqli_query($koneksi,"SELECT * FROM `request_pembimbing` where id_dosen=".$id_login." and  status ='approve';");
                                if (mysqli_num_rows($maxno)>=10){
                                    echo '<p style="color:red;">mahasiswa Bimbingan anda akan melebihi batas 10 orang</p>';
                                }else{
                                }
                                ?>
                                <table id="datatablesSimple" class="display table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                       //echo $koneksi;
                       $no=1;
                    //    echo $kodesesi;
                          $sql = 'Select m.*,d.id as id_d,u.id as id_login from mahasiswa_kp m join dosen d on m.id_dosen=d.id join users u on d.id_user=u.id where status_dosen= "Request" and u.id='.$id_login;
                          //and id_dosen= $_Session['id']
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                  <td><?php echo $no++;?></td>
                                      <td><?php echo $row['nim_mahasiswa'];?></td>
                                      <td><?php echo $row['nama_mahasiswa'];?></td>
                                      <td><?php echo $row['judu_kp'];?></td>
                                      <td><?php echo $row['status_dosen'];?></td>
                                      <td><?php echo $id_login;?></td>

                                      <td><a class="btn btn-success" data-toggle="modal" data-target="#exampleModal1<?php echo $row['id'];?>">Aksi</a></td>
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
                            <div class="card-header col-md-12">
                                <i class="fas fa-table me-1"></i>
                               Mahasiswa Bimbingan
                            </div>
                        </div>
                        <!-- table 2 -->
                            <div class="card-body">
                                <table id="datatablesSimple" class="display table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        <th>NO</th>
                                        <th>Mahasiswa</th>
                                        <th>Dosen</th>
                                        <th>Status</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                       //echo $koneksi;
                       $no=1;
                    //    echo $kodesesi;
                          $sqla = 'Select r.status,d.name,r.id_dosen,r.id_mahasiswa,m.nama_mahasiswa from request_pembimbing r join mahasiswa_kp m on r.id_mahasiswa=m.id_user join dosen d on d.id=m.id_dosen where r.status="approve" and d.id_user='.$id_login;
                          // id_dosen= $_Session['id']
                          $querya = mysqli_query($koneksi, $sqla);
                             while ($rowa = mysqli_fetch_array($querya))
                                {
                                 ?>
                                  <tr>
                                  <td><?php echo $no++;?></td>
                                  <td><?php echo $rowa['nama_mahasiswa'];?></td>
                                <td><?php echo $rowa['name'];?></td>
                                <td><?php echo $rowa['status'];?></td>
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
                            <div class="card-header col-md-12">
                                <i class="fas fa-table me-1"></i>
                               Mahasiswa Ditolak
                            </div>
                        </div>
                        <!-- table 3 -->
                            <div class="card-body">
                                <table id="datatablesSimple" class="display table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        <th>NO</th>
                                        <th>Mahasiswa</th>
                                        <th>Dosen</th>
                                        <th>Status</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                       //echo $koneksi;
                       $no=1;
                    //    echo $kodesesi;
                          $sqla = 'Select r.status,d.name,r.id_dosen,r.id_mahasiswa,m.nama_mahasiswa from request_pembimbing r join mahasiswa_kp m on r.id_mahasiswa=m.id_user join dosen d on d.id=m.id_dosen where r.status="decline" and d.id_user='.$id_login;
                          // id_dosen= $_Session['id']
                          $querya = mysqli_query($koneksi, $sqla);
                             while ($rowa = mysqli_fetch_array($querya))
                                {
                                 ?>
                                  <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $rowa['nama_mahasiswa'];?></td>
                                    <td><?php echo $rowa['name'];?></td>
                                    <td><?php echo $rowa['status'];?></td>
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
                $sql = 'Select m.*,d.id as id_d,u.id as id_login from mahasiswa_kp m join dosen d on m.id_dosen=d.id join users u on d.id_user=u.id where status_dosen= "Request" and u.id='.$id_login;
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
                        <form class="col-12" role="form" action="proses/aprove-mahasiswa.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                            <?php echo $row['id']?>
                            <input type="text" hidden name="id" id="id" value="<?php echo $row['id']?>">
                            <label class="form-label col-12">NIM :</label>
                            <input type="text" disabled name="nim" id="nim" value="<?php echo $row['nim_mahasiswa']?>">
                            <label class="form-label col-12">Nama :</label>
                            <input type="text" disabled name="nama" id="nama" value="<?php echo $row['nama_mahasiswa']?>">
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
                <script>
                $(document).ready(function() {
                    $('table.display').DataTable();
                } );    
                </script>
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
