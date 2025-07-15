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
            // echo $statuslogin;
            ?>
            
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pengajuan Tanda Tangan Validasi</h1>
                        
                        <div class="content-wrapper ">
                            <div class="card shadow mb-4" style="background-color:#F8F8FF;">
                                <div class="card-body tab-content" id="myTabContent">
                            <form method="POST" action="proses/proses-tanda-tangan-sekpro.php" enctype="multipart/form-data">
                            
                                <label class="form-label col-11 offset-1">Ketikkan informasi Berkas</label>
                                <textarea class="form-label col-10 offset-1" id="info" name="info"></textarea>
                                <br>
                                <div class="row col-12">
                                <label class="form-label col-10 offset-1">Upload Berkas</label>
                                <br>
                                <input type="file" class="form-control-file col-8 offset-1" id="form-ttd" name="form-ttd">
                                <div class="row"><br></div>
                                <div class="row col-12"> 
                                <input type="text" hidden class="form-input col-1 offset-1" id="id_ttd" name="id_ttd" value="<?php echo $_GET['id_ttd']?>">
                                
                                    <input type="submit" class="btn btn-danger col-1 offset-1" id="salah" name="salah" value="decline">
                                    <input type="submit" class="btn btn-success col-1" style="margin-left:1%;" id="tambah-form-ttd" name="tambah-form-ttd" value="upload">
                                </div>
                            </div>
                            </form>
                            </div>
                        </div>
                        <br>
                        <!-- tabel pengajuan -->
                        <div class="content-header">
                                <div class="container-fluid">
                                    <h3>Daftar Pengajuan</h3>
                                </div>
                            </div>
                        <div class="card-body">
                        <table id="datatablesSimple" class="display table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Pengaju</th>
                                            <th>Penerima</th>
                                            <th>tipe</th>
                                            <th>File</th>
                                            <th>Tanggal</th>
                                            <th>status</th>
                                            <th>Info</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                            //echo $koneksi;
                            $no=1;
                            $kodesesi=$_SESSION['id'];
                            //    echo $kodesesi;
                                $sql = 'SELECT t.id, m.nama_mahasiswa, d.nama, t.tipe, t.file, t.tanggal, 
                                t.status, t.info FROM `tanda_tangan` t join `sekpro` d on d.id_user=t.penerima join `mahasiswa_kp` m on t.mengajukan=m.id_user where d.id_user='.$id_log.' and t.id='.$_GET['id_ttd'].';';
                                $query = mysqli_query($koneksi, $sql);
                                    while ($row = mysqli_fetch_array($query))
                                        {
                                        ?>
                                        <tr>
                                        <td><?php echo $no++;?></td>
                                            <td><?php echo $row['nama_mahasiswa'];?></td>
                                            <td><?php echo $row['nama'];?></td>
                                            <td><?php echo $row['tipe'];?></td>
                                            <td><?php echo $row['file'];?></td>
                                            <td><?php echo $row['tanggal'];?></td>
                                            <td><?php echo $row['status'];?></td>
                                            <td class="col-3"><?php echo $row['info'];?></td>
                                            <td><a class="btn btn-success" href="view/view-ttd-kp.php?nama=<?php echo $row['file'];?>">Aksi</a></td>
                                        </tr>
                                <?php 
                                    }
                                    ?>
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
