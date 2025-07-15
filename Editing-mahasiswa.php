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
                        <h1 class="mt-4">Edit Mahasiswa</h1>
                        <hr>
                    </div>
                    <div class="card mb-4">
                        <div class="row col-md-12">    
                          
                        </div>
                            <div class="card-body">
                            <table id="datatablesSimple" class="display table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dosen</th>
                                            <th>Nim</th>
                                            <th>Prodi</th>

                                            <th>Nama Mahasiswa</th>
                                            <th>Judul KP</th>
                                            <th>Lokasi KP</th>
                                            <th>Alamat Perusahaan</th>
                                            <th>Kontak Perusahaan</th>
                                            <th>Status KP</th>
                                            <th>Status Dosen</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                       //echo $koneksi;
                       $no=1;
                    //    echo $kodesesi;
                          $sql = 'SELECT m.id as id_mahasiswa,d.id as id_dosen,name,m.prodi,nim_mahasiswa,nama_mahasiswa,judu_kp,lokasi_kp,alamat,kontak,status_kp,status_dosen from mahasiswa_kp m LEFT JOIN dosen d on m.id_dosen = d.id';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                  <td>
                                
                                    <?= $no++;?></td>
                                      <td><?= $row['name']; ?></td>
                                      <td><?= $row['nim_mahasiswa'];?></td>
                                      <td><?= $row['prodi'];?></td>
                                      <td><?= $row['nama_mahasiswa'];?></td>
                                      <td><?= $row['judu_kp'];?></td>
                                      <td><?= $row['lokasi_kp']; ?></td>
                                      <td><?= $row['alamat']; ?></td>
                                      <td><?= $row['kontak']; ?></td>
                                      <td><?= $row['status_kp']; ?></td>
                                      <td><?= $row['status_dosen']; ?></td>
                                      <td><a class="btn btn-success" data-toggle="modal" data-target="#modal<?php echo $row['id_mahasiswa'];?>"><i class="fa fa-pencil"></i></a>
                                      <a href="delete/delete-mhs.php?hal=delete&id=<?= $row['id_mahasiswa'];?>"
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
                $sql = 'SELECT m.id as id_mahasiswa,d.id as id_dosen,name,m.prodi,nim_mahasiswa,nama_mahasiswa,judu_kp,lokasi_kp,alamat,kontak,status_kp,status_dosen from mahasiswa_kp m LEFT JOIN dosen d on m.id_dosen = d.id';
                $query = mysqli_query($koneksi, $sql);
                    while ($row = mysqli_fetch_array($query))
                        {
                        ?>
                <div class="modal fade" id="modal<?php echo $row['id_mahasiswa'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form class="col-12" role="form" action="edit/edit-mhs.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                            <input type="text" hidden name="id" id="id" value="<?php echo $row['id_mahasiswa']?>">
                            <label class="form-label col-12">Nama Dosen :</label>
                            <select class="custom-select form-control" id="nama_dosen" name="nama_dosen" required>
                                <?php
                                      $sql2 = "SELECT * FROM dosen";
                                      $result2 = $koneksi->query($sql2);
                                      if ($result2->num_rows > 0) {
                                        while($row2 = $result2->fetch_assoc()) {
                                          if($row["id_dosen"] == $row2["id"]){
                                            echo   '<option value="'.  $row2["id"].'" selected>'.  $row2["name"].'</option>';
                                          }else{
                                            echo   '<option value="'.  $row2["id"].'" >'.  $row2["name"].'</option>';
                                          }

                                        }
                                      } else {
                                        echo "0 results";
                                      }
                                  ?>
                              </select>
                            <label class="form-label col-12">NIM :</label>
                            <input type="text" name="nim" id="nim" class="form-control" value="<?php echo $row['nim_mahasiswa']?>">
                            <label class="form-label col-12">Nama :</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $row['nama_mahasiswa']?>">
                            <!-- prodi -->
                            <label class="form-label col-12">Prodi :</label>
                            <select id="status" name="prodi" class="form-select">
                                <option value="<?php echo $row['prodi']?>" disabled selected="selected"><?php echo $row['prodi']?></option>
                                <option value="sistem informasi">sistem informasi</option>
                                <option value="teknik komputer">teknik komputer</option>
                                <option value="manajemen informatika">manajemen informatika</option>
                                <option value="Akuntansi">Akuntansi</option>
                                <option value="Manajemen Bisnis">Manajemen Bisnis</option>
                                <option value="Manajemen Pariwisata">Manajemen Pariwisata</option>
                                <option value="Produksi Film dan Televisi">Produksi Film dan Televisi</option>
                                <option value="Desain Produk">Desain Produk</option>
                                <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                            </select>
                            <!-- end prodi -->
                            <label class="form-label col-12">Judul KP :</label>
                            <input type="text" name="judulkp" id="judulkp" class="form-control" value="<?php echo $row['judu_kp']?>">
                            <label class="form-label col-12">Lokasi KP :</label>
                            <input type="text" name="lokasikp" id="lokasikp" class="form-control" value="<?php echo $row['lokasi_kp']?>">
                            <label class="form-label col-12">Alamat :</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $row['alamat']?>">
                            <label class="form-label col-12">Kontak Perusahaan :</label>
                            <input type="text" name="kontak" id="kontak" class="form-control" value="<?php echo $row['kontak']?>">
                            <label class="form-label col-12">Status KP :</label>
                            <select class="custom-select form-control" id="statuskp" name="statuskp" >
                          <?php if($row["status_kp"] == 'approve') { ?>
                              <option value="approve" selected>Approve</option>
                              <option value="decline">Decline</option>
                              <option value="lulus">Lulus</option>
                              <option value="mengulang">Mengulang</option>
                              <option value="RequestLogin">Request</option>
                          <?php }else if($row["status_kp"] == 'decline'){ ?>
                            <option value="approve">Approve</option>
                              <option value="decline" selected>Decline</option>
                              <option value="lulus">Lulus</option>
                              <option value="mengulang">Mengulang</option>
                              <option value="RequestLogin">Request</option>
                          <?php }else if($row["status_kp"] == 'lulus'){ ?>
                            <option value="approve">Approve</option>
                              <option value="decline" >Decline</option>
                              <option value="lulus" selected>Lulus</option>
                              <option value="mengulang">Mengulang</option>
                              <option value="RequestLogin">Request</option>
                          <?php }else if($row["status_kp"] == 'mengulang'){ ?>
                            <option value="approve">Approve</option>
                              <option value="decline" >Decline</option>
                              <option value="lulus">Lulus</option>
                              <option value="mengulang" selected>Mengulang</option>
                              <option value="RequestLogin">Request</option>
                          <?php }else { ?>
                            <option value="approve">Approve</option>
                              <option value="decline" selected>Decline</option>
                              <option value="lulus">Lulus</option>
                              <option value="mengulang">Mengulang</option>
                              <option value="RequestLogin" selected>Request</option>
                            <?php }?>
                        </select>
                            <label class="form-label col-12">Status Dosen :</label>
                            <select class="custom-select form-control" id="statusdosen" name="statusdosen" >
                          <?php if($row["status_dosen"] == 'approve') { ?>
                              <option value="approve" selected>Approve</option>
                              <option value="decline">Decline</option>
                              <option value="lulus">Lulus</option>
                              <option value="mengulang">Mengulang</option>
                              <option value="request">Request</option>
                          <?php }else if($row["status_dosen"] == 'decline'){ ?>
                            <option value="approve">Approve</option>
                              <option value="decline" selected>Decline</option>
                              <option value="lulus">Lulus</option>
                              <option value="mengulang">Mengulang</option>
                              <option value="request">Request</option>
                          <?php }else if($row["status_dosen"] == 'lulus'){ ?>
                            <option value="approve">Approve</option>
                              <option value="decline" >Decline</option>
                              <option value="lulus" selected>Lulus</option>
                              <option value="mengulang">Mengulang</option>
                              <option value="request">Request</option>
                          <?php }else if($row["status_dosen"] == 'mengulang'){ ?>
                            <option value="approve">Approve</option>
                              <option value="decline" >Decline</option>
                              <option value="lulus">Lulus</option>
                              <option value="mengulang" selected>Mengulang</option>
                              <option value="request">Request</option>
                          <?php }else { ?>
                            <option value="approve">Approve</option>
                              <option value="decline">Decline</option>
                              <option value="lulus">Lulus</option>
                              <option value="mengulang">Mengulang</option>
                              <option value="request"selected>Request</option>
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
