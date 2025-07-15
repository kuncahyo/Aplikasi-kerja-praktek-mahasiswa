<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <script>
        function cekdata($id){
            if($id == "Mahasiswa"){
              document.getElementById("info_kp").style.display = "inline";
            }else{
              document.getElementById("info_kp").style.display = "none";
            }
        }
    </script>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form class="create-user" action="proses/create-user-login.php" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" name="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Last name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="inputPassword" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="form-label col-12">Prodi :</label>
                                                <div class="col-12">
                                                <select id="status" name="prodi" class="form-select" onchange="cekdata(this.value)">
                                                    <option value="Status" disabled selected="selected">Prodi</option>
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
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <label class="form-label col-12">Status :</label>
                                                <div class="col-12">
                                                <select id="status" name="status" class="form-select" onchange="cekdata(this.value)">
                                                    <option value="Status" disabled selected="selected">Status</option>
                                                    <option value="Mahasiswa">Mahasiswa</option>
                                                    <option value="Dosen">Dosen</option>
                                                    <option value="Sekpro">Sekertaris Prodi</option>
                                                    <option value="PPKP">PPKP</option>
                                                    <option value="Kaprodi">Kaprodi</option>
                                                </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="info_kp" style="display:none;">
                                                <div class="form-floating mb-3">
                                                <input type="text" id="perusahaan" name="perusahaan" class="form-control col-3">
                                                <label for="perusahaan">Lokasi Kerja Praktek</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                <input type="text" id="alamat" name="alamat" class="form-control col-3">
                                                <label for="alamat">Alamat Perusahaan/Instansi</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                <input type="text" id="kontak" name="kontak" class="form-control col-3">
                                                <label for="kontak">Contact Person Perusahaan/Instansi</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                <input type="text" id="judul" name="judul" class="form-control col-3">
                                                <label for="judul">Judul Kerja Praktek</label>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="number" id="nomor-induk" name="nomor-induk" class="form-control col-3">
                                                <label for="nomor-induk">Nomor Induk (NIM/NIDN/NIP)</label>
                                            </div>
                                            <div class="align-items-center justify-content-between mt-4 mb-0 offset-5">
                                                <input type="submit" name="create-user" class="btn btn-primary btn-user btn-block" value="Create Account">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
