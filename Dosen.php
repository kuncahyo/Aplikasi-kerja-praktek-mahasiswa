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
            $idawal=$_SESSION['id'];
            // echo $idawal;
            $sqlawal= mysqli_query($koneksi,"select * from mahasiswa_kp where id_user=$idawal and status_kp='approve'");
            // while ($row = mysqli_fetch_array($sqlawal))

            // menghitung jumlah data yang ditemukan
            $cek = mysqli_num_rows($sqlawal);
            // echo $cek;
            if($cek > 0){

            ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dosen</h1>
                        <hr>
                    </div>
                    <div class="card mb-4">
                        <!-- togle -->
                        <?php
                        $sql = "SELECT count(id) as jumlah FROM `request_pembimbing` WHERE id_mahasiswa=".$idawal." and status='approve';";
                        $query = mysqli_query($koneksi, $sql);
                           $cekbim = mysqli_fetch_assoc($query);

                        if($cekbim['jumlah']==0){
                        ?>
                        <div class="row col-md-12">    
                            <div class="card-header col-md-10">
                                <i class="fas fa-table me-1"></i>
                                Data Dosen
                            </div>
                            <div class="card-header col-md-2 ">
                                <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">Tambah Data</a>
                            </div>
                        </div>
                        <?php
                        }else{}
                        ?>
                        <!-- end togle -->
                            <div class="card-body">
                            <table id="datatablesSimple" class="display table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NIDN</th>
                                            <th>Nama</th>
                                            <th>Gmail</th>
                                            <th>Status</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                       //echo $koneksi;
                       $no=1;
                    //    echo $kodesesi;
                        //   $sql = 'Select d.*,m.id_dosen,m.status_dosen from dosen d join mahasiswa_kp m on d.id=m.id_dosen where m.id_user='.$idawal;
                        //   $query = mysqli_query($koneksi, $sql);
                        //      while ($row = mysqli_fetch_array($query))
                        //         {

                            $cekid =mysqli_query($koneksi,'Select * from mahasiswa_kp where id_user ='.$idawal);
                            $cekidawal = mysqli_fetch_assoc($cekid);
                            // echo $cekidawal['id_dosen'];
                            if($cekidawal['id_dosen']==0){
                                echo "<td></td><td></td><td></td><td></td><td></td>";
                            }else{
                        $sql = 'Select d.*,m.id_dosen,m.status_dosen from dosen d join mahasiswa_kp m on d.id=m.id_dosen where m.id_user='.$idawal;
                        $query = mysqli_query($koneksi, $sql);
                            while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                  <td><?php echo $no++;?></td>
                                      <td><?php echo  $row['nidn'];?></td>
                                      <td><?php echo $row['name'];?></td>
                                      <td><?php echo $row['email'];?></td>
                                      <td><?php echo $row['status_dosen'];?></td>
                                  </tr>
                          <?php 
                            }
                        
                            ?>
                                    </tbody>
                                </table>
                            <?php
                            error_reporting(0);
                            ini_set('display_errors', 0);
                            $sql = 'Select d.*,m.id_dosen,m.status_dosen from dosen d join mahasiswa_kp m on d.id=m.id_dosen where m.id_user='.$idawal;
                            $query = mysqli_query($koneksi, $sql);
                            $row0 = mysqli_fetch_assoc($query);
                            $maxno =mysqli_query($koneksi,"SELECT * FROM `request_pembimbing` where status ='approve' and id_dosen=".$row0['id_user'].";");
                                if (mysqli_num_rows($maxno)>10){
                                    echo '<p style="color:red;">Dosen pembimbing ini melebihi batas bimbingan mahasiswa, konsultasikan terlebih dahulu dengan dosen pembimbing bila ingin melanjutkan request bimbingan</p>';
                                }else{
                                }
                            }
                                ?>
                            </div>
                        </div>

                        <!-- histori -->
                        <div class="card-header col-md-10">
                                <i class="fas fa-table me-1"></i>
                                History
                            </div>
                        <div class="card-body">
                        <table id="datatablesSimple" class="display table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Mahasiswa</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                       //echo $koneksi;
                       $no=1;
                    //    echo $kodesesi;
                          $sql = 'Select r.status,d.name,r.id_dosen,r.id_mahasiswa,m.nama_mahasiswa from request_pembimbing r join mahasiswa_kp m on r.id_mahasiswa=m.id_user join dosen d on d.id=m.id_dosen where m.id_user='.$idawal;
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                  <td><?php echo $no++;?></td>
                                      <td><?php echo $row['nama_mahasiswa'];?></td>
                                      <td><?php echo $row['name'];?></td>
                                      <td><?php echo $row['status'];?></td>
                                  </tr>
                          <?php 
                            }
                            ?>
                                    </tbody>
                                </table>
                            </div>

                        <!-- sss -->
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
                        <form class="col-12" role="form" action="proses/tambah-dosen.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <label class="form-label col-12">Identitas :</label>
                                <div class="col-12">
                                
                                <select id="status" name="status" class="form-select">
                                    <option value="Status" disabled selected="selected">Pilih dosen</option>
                                    <?php
                                    $maxsql =mysqli_query($koneksi,"SELECT * FROM `Dosen`;");
                                    while ($row = mysqli_fetch_array($maxsql))
                                    {
                                    ?>
                                    <option value="<?php echo $row['id'];?>"><?php echo $row['nidn']."-".$row['name'];
                                    $maxno =mysqli_query($koneksi,"SELECT * FROM `request_pembimbing` where id_dosen=".$row['id_user']." and  status ='approve';");
                                    // $row2 = mysqli_fetch_assoc($maxno);
                                    echo "--Jumlah bimbingan ".mysqli_num_rows($maxno)." orang.";
                                    ?></option>
                                    <?php
                                    };
                                    ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                        Status KP Anda tidak aktif 
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
