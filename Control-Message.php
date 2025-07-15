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
        <link href="css/message.css" rel="stylesheet" />
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
        require('koneksi/koneksi.php');
        require('_partial/navbar.php');
            require('_partial/sidebar.php');
            $kodesesi=$_SESSION['id'];
            $id=$_GET['id'];
            
            // echo $kodesesi;
            ?>
                <main>
                <div class="container-fluid">
                    <br>
                    <div class="row col-md-2">
                        <a style="margin-left: 5%;" class="btn btn-warning" data-toggle="modal" data-target="#modal<?php echo $id;?>">Create Message</a>
                    </div>
                    <br><hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                            <?php
                                    $no=1;
                            $kodesesi=$_SESSION['id'];
                            //    echo $kodesesi."==".$id;
                                $sql = 'select distinct * from pesan where id_pertama='.$id.' or id_kedua='.$id.' GROUP BY subject;';
                                $query = mysqli_query($koneksi, $sql);
                                    while ($row = mysqli_fetch_array($query))
                                        {
                                        ?>
                                        <hr style="margin-bottom:0%;">
                                <div class="panel-heading" id="accordion">
                                    <span class="glyphicon glyphicon-comment"></span> 
                                    <div class="row col-md-12">
                                        <?php
                                        if($row['id_pertama']=="$kodesesi"){
                                            $warna="aliceblue";
                                        }else{
                                            $warna="antiquewhite";
                                        }
                                        ?>
                                        <a type="button" style="background-color:<?php echo $warna;?>;" class="btn btn-default btn-xs col-md-12"  href="message.php?id=<?php echo $id;?>&subject=<?php echo $row['subject'];?>"><?php echo $row['subject'];?></a>
                                    </div>
                                </div>
                            <hr style="margin-top:0%;">
                            <?php
                                        };
                            ?>
                            </div>
                        </div>
                    </div> 
                    <hr>
                </div>

                </main>
                <!-- modal -->
                <?php
                    $sql = 'SELECT * from users where id='.$id;
                    $query = mysqli_query($koneksi, $sql);
                        $row = mysqli_fetch_assoc($query);
                ?>
                <div class="modal fade" id="modal<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form class="col-12" role="form" action="proses/proses-pesan.php" method="post">
                            <div class="row">
                            <input type="text" hidden name="pengirim" id="pengirim" value="<?php echo $kodesesi;?>">
                            <label class="form-label col-12">Kepada :</label>
                            <input type="text" hidden name="penerima" id="penerima" class="form-control" value="<?php echo $id;?>">
                            <input type="text" disabled name="tampil" id="tampil" class="form-control" value="<?php echo $row['email'];?>">
                            <label class="form-label col-12">Subject :</label>
                            <input type="text" name="subject" id="subject" class="form-control">
                            <label class="form-label col-12">Isi :</label>
                            <textarea class="form-control" name="pesan"></textarea>
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
