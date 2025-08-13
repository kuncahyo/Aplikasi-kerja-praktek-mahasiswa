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
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
    
        $("#tombol").click(function() {
        $("#dataTable").toggle("slow");
              document.getElementById("dataTable").style.display = "show";
        })
    
    });

    $(document).ready(function() {
    
        $("#tombol2").click(function() {
        $("#dataTable2").toggle("slow");
            document.getElementById("dataTable2").style.display = "show";
        })

    });
    </script>
    <?php
    // $id_login=$_SESSION['id'];
    include 'koneksi/koneksi.php';
        require('_partial/navbar.php');
            require('_partial/sidebar.php');
            ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pengumuman</h1>
                        <hr>
                    </div>
                    <div class="container-fluid px-4">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <?php
                                 $no=1;
                                 $kodesesi=$_SESSION['id'];
                                 echo $kodesesi;
                                    $sql = "select max(tanggal_pelaksanaan) as tgl from pengumuman where jenis_pengumuman = 'Berita KP'" ;
                                    $query = mysqli_query($koneksi, $sql);
                                       while ($row = mysqli_fetch_array($query))
                                          {
                                           ?>
                                           <h1><?php echo $row['tgl']?></h1> 
                                    <?php 
                                      }
                                ?>
                                
                                <div class="card-body">Pengumuman</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <button class="btn btn_primary text-white stretched-link" id="tombol">View Details</button>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <h1>20</h1>
                                <div class="card-body">Pemberitahuan Mandiri</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <button class="btn btn_primary text-white stretched-link" id="tombol2">View Details</button>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card shadow mb-4">
                            <div class="card-body tab-content" id="myTabContent">
                                    <table class="table table-bordered" style="display:none;" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Subject</th>
                                            <th>Aksi</th>
                                    </thead>
                                
                                    <tbody>
                                        <?php
                                        $sql = "select * from pengumuman where jenis_pengumuman = 'Berita KP' ORDER BY id DESC";
                                        $query = mysqli_query($koneksi, $sql);
                                            while ($row = mysqli_fetch_array($query))
                                            {
                                            ?>
                                  <tr>
                                        <td><?php echo $row['tanggal_pelaksanaan'];?></td>
                                        <td><?php echo $row['tanggal_berakhir'];?></td>
                                        <td><?php echo $row['isi_pengumuman'];?></td>
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
                    <div class="col-xl-12">
                        <div class="card shadow mb-4">
                            <div class="card-body tab-content" id="myTabContent">
                                    <table class="table table-bordered" style="display:none;" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Berakhir</th>
                                            <th>Pengumuman</th>
                                    </thead>
                                
                                    <tbody>
                                        <?php
                                        $no=1;
                                        $sql = "select distinct p.subject, u.email from pesan p join users u on p.id_pertama=u.id where id_pertama=".$kodesesi." or id_kedua=".$kodesesi." group by p.subject, u.email;";
                                        $query = mysqli_query($koneksi, $sql);
                                            while ($row = mysqli_fetch_array($query))
                                            {
                                            ?>
                                    <tr>
                                    <td><?php echo $no++;?></td>
                                        <td><?php echo $row['subject'];?></td>
                                        <td><a class="btn btn-success" href="proses/cari-pesan.php?id=<?php echo $kodesesi;?>&subject=<?php echo $row['subject'];?>">Buka</a></td>
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
    </body>
</html>
