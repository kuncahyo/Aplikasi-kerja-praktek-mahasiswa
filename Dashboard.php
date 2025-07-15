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
            $statuslogin=$_SESSION['status'];
            $statusnama=$_SESSION['nama'];
            // echo $statuslogin;
            // echo $statusnama;
             $id_log= $_SESSION['id'];
            // echo $id_log;
            ?>
            
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        
                        <div class="content-wrapper ">            
                            <!-- <div class="content-header">
                                <div class="container-fluid">
                                    <h3>Dasboard</h3>
                                </div>
                            </div> -->
                
                            
                            <div class="content">
                                <div class="container-fluid">
                                                    
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                                <div class="row">
                                <div class="col-md-12">
                                    <h1>Welcome To Pusat Pelayanan Kerja Praktek</h1>
                                </div>
                                </div>
                                <hr>
                                <?php
                                      // echo $statuslogin."<br>";
                                      if($statuslogin=='Mahasiswa'){
                                        $sql = 'Select status_kp from Mahasiswa_kp where id_user='.$id_log;
                                          $query = mysqli_query($koneksi, $sql);
                                            $row = mysqli_fetch_assoc($query);
                                              $status= $row['status_kp'];
                                        if($status=='approve'){
                                          echo "<h2>Status KP anda Disetujui</h2>";
                                        }else if($status=='RequestLogin'){
                                          echo "<h2>Status KP anda sedang menunggu persetujuan PPKP</h2>";
                                        }else{
                                        echo "<h2>Status KP anda ditolak. Periksa menu pengumuman anda atau Hubungi PPKP Untuk informasi lebih lanjut</h2>";
                                      }
                                    }else if($statuslogin=='Dosen'){
                                        $sql = 'Select status_akun from dosen where id_user='.$id_log;
                                          $query = mysqli_query($koneksi, $sql);
                                              $row = mysqli_fetch_assoc($query);
                                        $status = $row['status_akun'];
                                      // echo $status;
                                      if($status=='approve'){
                                        echo "<h2>Status Akun anda Disetujui</h2>";
                                      }else if($status=='RequestLogin'){
                                        echo "<h2>Status Akun anda sedang menunggu persetujuan PPKP</h2>";
                                      }else{
                                        echo "<h2>Status Akun anda ditolak. Periksa menu pengumuman anda atau Hubungi PPKP Untuk informasi lebih lanjut</h2>";
                                      }
                                    }else if($statuslogin=='Sekpro'){
                                      $sql = 'Select status_akun from sekpro where id_user='.$id_log;
                                        $query = mysqli_query($koneksi, $sql);
                                            $row = mysqli_fetch_assoc($query);
                                      $status = $row['status_akun'];
                                    // echo $status;
                                    if($status=='approve'){
                                      echo "<h2>Status Akun anda Disetujui</h2>";
                                    }else if($status=='RequestLogin'){
                                      echo "<h2>Status Akun anda sedang menunggu persetujuan PPKP</h2>";
                                    }else{
                                      echo "<h2>Status Akun anda ditolak. Periksa menu pengumuman anda atau Hubungi PPKP Untuk informasi lebih lanjut</h2>";
                                    }
                                  }else if($statuslogin=='Kaprodi'){
                                      $sql = 'Select status_akun from kaprodi where id_user='.$id_log;
                                        $query = mysqli_query($koneksi, $sql);
                                            $row = mysqli_fetch_assoc($query);
                                      $status = $row['status_akun'];
                                    // echo $status;
                                    if($status=='approve'){
                                      echo "<h2>Status Akun anda Disetujui</h2>";
                                    }else if($status=='RequestLogin'){
                                      echo "<h2>Status Akun anda sedang menunggu persetujuan PPKP</h2>";
                                    }else{
                                      echo "<h2>Status Akun anda ditolak. Periksa menu pengumuman anda atau Hubungi PPKP Untuk informasi lebih lanjut</h2>";
                                    }
                                  }else{
                                        echo "<h2>Selamat datang staf PPKP</h2>";
                                    }
                                ?>
                                
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
    </body>
</html>
