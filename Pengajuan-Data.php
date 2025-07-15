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
                        <h1 class="mt-4">Pengajuan Syarat Kerja Praktek</h1>
                        <div class="content-wrapper">
                        <br>
                            <div class="card shadow mb-4" style="background-color:#F8F8FF;">
                                <div class="card-body tab-content" id="myTabContent">
                                <?php
                                $sql = 'Select m.*,d.name from Mahasiswa_kp m join dosen d on m.id_dosen=d.id where m.id_user='.$kodesesi;
                                $query = mysqli_query($koneksi, $sql);
                                   while ($row = mysqli_fetch_array($query))
                                      {
                                        // $status = $row['m.status_kp'];
                                    //   }
                                      ?>  
                                <label class="form-label col-3 offset-1">Nama Mahasiswa :</label>
                                    <i type="text" id="nama" name="nama" class="form-label col-5"><?php echo $row['nama_mahasiswa'];?></i>
                                    <br>
                                    <label class="form-label col-3 offset-1">Nama Dosen :</label>
                                    <i type="text" id="namadosen" name="namadosen" class="form-label col-5"><?php echo $row['name'];?></i>
                                    <br>
                                    <label class="form-label col-3 offset-1">Judul Kerja Praktek :</label>
                                    <input type="text" id="namadosen" name="namadosen" disabled class="form-input col-5" value="<?php echo $row['judu_kp'];?>">
                                    <?php
                                      };
                                    ?>
                                    <br>
                                    <!-- <div class="row">
                                    <label class="form-label col-3 offset-1">Prodi :</label>
                                    <div class="col-5">
                                    <select id="type" name="type" class="form-select ">
                                        <option value="SI">Sistem Informasi</option>
                                        <option value="DKV">DKV</option>
                                        <option value="SK">Sistem Komputer</option>
                                        <option value="DG">Desain Grafis</option>
                                    </select>
                                    </div>
                                    </div> -->
                                    <br>
                                    <!-- <form method="POST" action="proses/tambah-form.php" enctype="multipart/form-data">
                                        <div class="row col-12">
                                        <label class="form-label col-3 offset-1">FORM KP 1 Permohonan Surat Ijin KP</label>
                                        <input type="file" class="form-control-file col-4" id="form-1" name="form-1">
                                        <input type="submit" class="btn btn-success col-1" id="tambah-form-1" name="tambah-form-1" value="upload">
                                        </div>
                                    </form> -->
                                    <!-- proposal -->
                                    <form method="POST" action="proses/tambah-form.php?idset=<?php echo $kodesesi;?>" enctype="multipart/form-data">
                                        <div class="row col-12">
                                        <label class="form-label col-3 offset-1">Proposal KP</label>
                                        <input type="file" class="form-control-file col-4" id="form-0" name="form-1">
                                        <input type="submit" class="btn btn-success col-1" id="tambah-form-0" name="tambah-form-0" value="upload">
                                        </div>
                                    </form>
                                    <div class="row col-12">
                                        <a class="form-label col-4 offset-4">
                                        <?php
                                        $sql = (mysqli_query($koneksi,"select * from uploadkp where id_user=$kodesesi and kode=0"));
                                        while ($row = mysqli_fetch_array($sql))
                                            {
                                                echo $row['namafile'];
                                                $status=$row['status'];
                                            
                                        ?>
                                        </a>
                                        
                                        <?php
                                        if($status=="pending"){
                                            echo "<a style='color:red ;' class='form-label a col-2'>".$status;
                                        }elseif($status=="approve"){
                                            echo "<a style='color:blue ;' class='form-label b col-2'>".$status;
                                        }else{
                                            echo "<a style='color:black ;' class='form-label b col-2'>".$status;;
                                        }
                                            };
                                        ?>
                                        </a>
                                    </div>
                                    <br>
                                    <!-- end proposal -->
                                    <form method="POST" action="proses/tambah-form.php?idset=<?php echo $kodesesi;?>" enctype="multipart/form-data">
                                        <div class="row col-12">
                                        <label class="form-label col-3 offset-1">FORM KP 1 Permohonan Surat Ijin</label>
                                        <input type="file" class="form-control-file col-4" id="form-1" name="form-1">
                                        <input type="submit" class="btn btn-success col-1" id="tambah-form-1" name="tambah-form-1" value="upload">
                                        </div>
                                    </form>
                                    <div class="row col-12">
                                        <a class="form-label col-4 offset-4">
                                        <?php
                                        $sql = (mysqli_query($koneksi,"select * from uploadkp where id_user=$kodesesi and kode=1"));
                                        while ($row = mysqli_fetch_array($sql))
                                            {
                                                echo $row['namafile'];
                                                $status=$row['status'];
                                            
                                        ?>
                                        </a>
                                        
                                        <?php
                                        if($status=="pending"){
                                            echo "<a style='color:red ;' class='form-label a col-2'>".$status;
                                        }elseif($status=="approve"){
                                            echo "<a style='color:blue ;' class='form-label b col-2'>".$status;
                                        }else{
                                            echo "<a style='color:black ;' class='form-label b col-2'>".$status;
                                        }
                                            };
                                        ?>
                                        </a>
                                    </div>
                                    <br>
                                    <form method="POST" action="proses/tambah-form.php?idset=<?php echo $kodesesi;?>" enctype="multipart/form-data">
                                        <div class="row col-12">
                                        <label class="form-label col-3 offset-1">FORM KP 2 Surat Pengantar KP</label>
                                        <input type="file" class="form-control-file col-4" id="form-2" name="form-2">
                                        <input type="submit" class="btn btn-success col-1" id="tambah-form-2" name="tambah-form-2" value="upload">
                                        </div>
                                    </form>
                                    <div class="row col-12">
                                        <a class="form-label col-4 offset-4">
                                        <?php
                                        $sql = (mysqli_query($koneksi,"select * from uploadkp where id_user=$kodesesi and kode=2"));
                                        while ($row = mysqli_fetch_array($sql))
                                            {
                                                echo $row['namafile'];
                                                $status=$row['status'];
                                            
                                        ?>
                                        </a>
                                        <?php
                                        if($status=="pending"){
                                            echo "<a style='color:red ;' class='form-label col-2'>".$status;
                                        }elseif($status=="approve"){
                                            echo "<a style='color:blue ;' class='form-label col-2'>".$status;
                                        }else{
                                            echo "<a style='color:black ;' class='form-label b col-2'>".$status;
                                        }
                                            }
                                        ?>
                                        </a>
                                    </div>
                                    <br>
                                    <form method="POST" action="proses/tambah-form.php?idset=<?php echo $kodesesi;?>" enctype="multipart/form-data">
                                        <div class="row col-12">
                                        <label class="form-label col-3 offset-1">FORM KP 3 Penilaian</label>
                                        <input type="file" class="form-control-file col-4" id="form-3" name="form-3">
                                        <input type="submit" class="btn btn-success col-1" id="tambah-form-3" name="tambah-form-3" value="upload">
                                        </div>
                                    </form>
                                    <div class="row col-12">
                                        <a class="form-label col-4 offset-4">
                                        <?php
                                        $sql = (mysqli_query($koneksi,"select * from uploadkp where id_user=$kodesesi and kode=3"));
                                        while ($row = mysqli_fetch_array($sql))
                                            {
                                                echo $row['namafile'];
                                                $status=$row['status'];
                                            
                                        ?>
                                        </a>
                                        <?php
                                        // echo "<p>".$row['namafile'].$row['status'].$status."</p>";
                                        if($status=="pending"){
                                            echo "<a style='color:red ;' class='form-label col-2'>".$status;
                                        }elseif($status=="approve"){
                                            echo "<a style='color:blue ;' class='form-label col-2'>".$status;
                                        }else{
                                            echo "<a style='color:black ;' class='form-label b col-2'>".$status;
                                        }
                                            }
                                        ?>
                                        </a>
                                    </div>
                                    <br>
                                    <form method="POST" action="proses/tambah-form.php?idset=<?php echo $kodesesi;?>" enctype="multipart/form-data">
                                        <div class="row col-12">
                                        <label class="form-label col-3 offset-1">FORM KP 4 Formulir Akhir Masa KP</label>
                                        <input type="file" class="form-control-file col-4" id="form-4" name="form-4">
                                        <input type="submit" class="btn btn-success col-1" id="tambah-form-4" name="tambah-form-4" value="upload">
                                        </div>
                                    </form>
                                    <div class="row col-12">
                                        <a class="form-label col-4 offset-4">
                                        <?php
                                        $sql = (mysqli_query($koneksi,"select * from uploadkp where id_user=$kodesesi and kode=4"));
                                        while ($row = mysqli_fetch_array($sql))
                                            {
                                                echo $row['namafile'];
                                                $status=$row['status'];
                                            
                                        ?>
                                        </a>
                                        <?php
                                        if($status=="pending"){
                                            echo "<a style='color:red ;' class='form-label col-2'>".$status;
                                        }elseif($status=="approve"){
                                            echo "<a style='color:blue ;' class='form-label col-2'>".$status;
                                        }else{
                                            echo "<a style='color:black ;' class='form-label b col-2'>".$status;
                                        }
                                            }
                                        ?>
                                        </a>
                                    </div>
                                    <br>
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
