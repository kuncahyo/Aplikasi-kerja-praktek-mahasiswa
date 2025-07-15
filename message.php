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
            // require('_partial/sidebar.php');
            session_start();
            $kodesesi=$_SESSION['id'];
            $id=$_GET['id'];
            $subject=$_GET['subject'];
            // echo $subject;
            // echo $kodesesi;
            ?>
                <main>
                <div class="container-fluid">
                    <!-- <h1>Pesan</h1> -->
                    <h2><?php
                    echo "Subject: ".$subject;
                    ?></h2>
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                            <?php
                                    $no=1;
                            // $kodesesi=$_SESSION['id'];
                            //    echo $kodesesi;
                                $sql = 'select p.*,u.email from pesan p JOIN users u on p.id_pertama=u.id where subject="'.$subject.'";';
                                $query = mysqli_query($koneksi, $sql);
                                    while ($row = mysqli_fetch_array($query))
                                        {
                                        ?>
                                        <hr style="margin-bottom:0%;">
                            <div class="message">
                                <div class="panel-body">
                                    <ul class="chat">
                                        <?php
                                        if ($id==$row['id_pertama']){
                                        ?>
                                        <li class="left clearfix" style="background-color:azure;">
                                            <div class="chat-body clearfix" style="background-color:azure;">
                                                <div class="header">
                                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo $row['waktu'];?></small>
                                                    <strong class="pull-right primary-font"><?php echo $row['email']; ?></strong>
                                                </div>
                                                <p>
                                                    <?php
                                                    echo $row['isi'];
                                                    ?>
                                                </p>
                                            </div>
                                        </li>
                                        <?php
                                        }else{
                                        ?>
                                        <li class="right clearfix"  style="background-color:#FBF6F5;">
                                            <div class="chat-body clearfix" style="margin-left: 2%;">
                                                <div class="header">
                                                    <strong class="primary-font"><?php echo $row['email']; ?></strong> <small class="pull-right text-muted">
                                                        <span class="glyphicon glyphicon-time"></span><?php echo $row['waktu'];?></small>
                                                </div>
                                                <p>
                                                <?php
                                                    // echo $row['id_pertama']."<br>";
                                                    // echo $row['id_kedua']."<br>";
                                                    echo $row['isi'];
                                                    ?>
                                                </p>
                                            </div>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <!-- <div class="panel-footer">
                                    <div class="input-group">
                                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                        <span class="input-group-btn">
                                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                                Send</button>
                                        </span>
                                    </div>
                                </div> -->
                            </div>
                            <hr style="margin-top:0%;">
                            <?php
                                        };
                            ?>
                            <div class="panel-footer">
                                    <div class="input-group">
                                        <form class="col-12" method="POST" action="proses/proses-pesan.php">
                                        <input id="btn-input" hidden name="pengirim" type="text" class="form-control input-sm" value="<?php echo $kodesesi;?>" placeholder="" />
                                        <input id="btn-input" hidden name="penerima" type="text" class="form-control input-sm" value="<?php echo $id;?>" placeholder="" />
                                        <input id="btn-input" hidden name="subject" type="text" class="form-control input-sm" value="<?php echo $subject;?>" placeholder="" />
                                        <input id="btn-input" name="pesan" type="text" class="form-control input-sm col-md-8" placeholder="Type your message here..." />
                                        <span class="input-group-btn">
                                            <br>
                                            <button class="btn btn-warning btn-sm col-2 offset-5" id="btn-chat">
                                                Send</button>
                                        </span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <hr>
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
