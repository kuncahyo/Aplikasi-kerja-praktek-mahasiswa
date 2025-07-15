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
            $kodesesi=$_SESSION['id'];
            // echo $kodesesi;
            ?>
                <main>
                    <div class="container-fluid px-5">
                        <h1 class="mt-4">Panduan Kerja Praktek</h1>
                        <div class="content-wrapper">
                        <br>
                            <div class="card shadow mb-4 col-8 offset-2" style="background-color:#F8F8FF;">
                                <div class="card-body tab-content offset-1" id="myTabContent">
                                <form method="POST" action="proses/upload-panduan.php" enctype="multipart/form-data">
                                    <br>
                                    <input type="file" class="form-control-file" id="nama" name="nama">
                                    <br><br>
                                    <label class="form-label col-12">Tanggal Pelaksanaan :</label>
                                    <input class="col-3" type="date" name="tgl_mulai" id="tgl_mulai">
                                    <label class="form-label col-12">Tanggal Berakhir :</label>
                                    <input  class="col-3" type="date" name="tgl_akhir" id="tgl_akhir">
                                    <br><br>
                                    <input type="submit" class="btn btn-success" name="tambah-panduan">
                                </form>
                                </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card shadow mb-4">
                            <div class="card-body tab-content" id="myTabContent">
                                    <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Berakhir</th>
                                            <th>Pengumuman</th>
                                            <th>Aksi</th>
                                    </thead>
                                
                                    <tbody>
                                        <?php
                                        $sql = "select * from pengumuman where jenis_pengumuman = 'Pengumuman' ORDER BY id DESC";
                                        $query = mysqli_query($koneksi, $sql);
                                            while ($row = mysqli_fetch_array($query))
                                            {
                                            ?>
                                  <tr>
                                        <td><?php echo $row['tanggal_pelaksanaan'];?></td>
                                        <td><?php echo $row['tanggal_berakhir'];?></td>
                                        <td><?php echo $row['isi_pengumuman'];?></td>
                                        <td><a class="btn btn-success" href="view/view-panduan-kp.php?nama=<?php echo $row['isi_pengumuman'];?>">Detail</a><a class="btn btn-danger" href="delete/delete_panduan.php?id=<?php echo $row['id'];?>">Hapus</a></td>
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
                    </div>
                </main>
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
