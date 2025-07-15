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
            // echo $id_user;
            ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pesan Mahasiswa</h1>
                        <hr>
                    </div>
                    
                    <!-- tabel 2 -->
                    <div class="card mb-4">
                    <div class="card shadow mb-4 col-12" style="float: left;">
                        <div class="card-header py-3">
                        <!--tabs tabel-->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" style="font-size: .8rem;" id="home-tab" data-toggle="tab" href="#mh" role="tab" aria-controls="mh" aria-selected="true">Mahasiswa</a>
                                </li>
                            </ul>
                        <!--akhir tabs tabel-->
                        </div>
                        <div class="card-body tab-content col-12" id="myTabContent">
                            <div class="table-responsive tab-pane fade show active" id="mh">
                                <div class="table-bahanbaku col-8" style="float: left">
                                <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID User</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>QTY</th>
                                        <th>Total</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                            
                                <tbody>
                                <?php
                                        $sql = "select * from mahasiswa_kp";
                                        $query = mysqli_query($koneksi, $sql);
                                            while ($row = mysqli_fetch_array($query))
                                            {
                                            ?>
                                    <tr>
                                    <td><?php echo $row['id_user'];?></td>
                                        <td><?php echo $row['nim_mahasiswa'];?></td>
                                        <td><?php echo $row['nama_mahasiswa'];?></td>
                                        <td><?php echo $row['judu_kp'];?></td>
                                        <td><?php echo $row['lokasi_kp'];?></td>
                                        <td><?php echo $row['status_kp'];?></td>
                                        <td><a class="btn btn-primary" href="Control-Message.php?id=<?php echo $row['id_user'];?>">Pesan</a></td>
                                    </tr>      
                                    <?php
                                    };
                                    ?>            
                                <!-- Modal -->
                                    <!--akhir modal-->
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <!-- 2 -->
                        
                        <!-- 3 -->
                    
                        <!-- 4 -->
                        
                        </div>
                    </div>

                    </div>


                </main>
                <!-- modal -->
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
