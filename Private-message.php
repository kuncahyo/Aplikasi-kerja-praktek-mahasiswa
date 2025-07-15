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
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Pesan Pribadi</h1>
                    <hr>
                </div>
                    <div class="container-fluid px-5">
                        <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <?php
                                 $no=1;
                                 $kodesesi=$_SESSION['id'];
                              //    echo $kodesesi;
                                    $sql = "select count(id) as jumlah from mahasiswa_kp" ;
                                    $query = mysqli_query($koneksi, $sql);
                                       while ($row = mysqli_fetch_array($query))
                                          {
                                           ?>
                                           <h1><?php echo $row['jumlah']?></h1> 
                                    <?php 
                                      }
                                ?>
                                
                                <div class="card-body">Mahasiswa Kerja Praktek</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <a style="color: white ;" href="pesan-mahasiswa.php"><button class="btn btn_primary text-white stretched-link">View Details</button></a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                            <?php
                                 $no=1;
                                 $kodesesi=$_SESSION['id'];
                              //    echo $kodesesi;
                                    $sql = "SELECT DISTINCT ROUND(((SELECT COUNT(id) FROM dosen)+(SELECT COUNT(id) FROM ppkp)+(SELECT COUNT(id) FROM kaprodi)),0) AS jumlah
                                    FROM users GROUP BY id;" ;
                                    $query = mysqli_query($koneksi, $sql);
                                       while ($row = mysqli_fetch_array($query))
                                          {
                                           ?>
                                           <h1><?php echo $row['jumlah']?></h1> 
                                    <?php 
                                      }
                                ?>
                                <div class="card-body">Staf Undika</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <a style="color: white ;" href="pesan-staf.php"><button class="btn btn_primary text-white stretched-link">View Details</button></a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                        </div>
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
