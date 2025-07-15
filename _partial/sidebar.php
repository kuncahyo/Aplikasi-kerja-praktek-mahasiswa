<div id="layoutSidenav">
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
            <?php 
            session_start();
            include('koneksi/koneksi.php');
            if ($_SESSION["status"] == "Mahasiswa" ) { ?>
                <div class="sb-sidenav-menu-heading">Menu Mahasiswa PPKP</div>
                <a class="nav-link" href="Pengumuman.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Pengumuman
                </a>
                <a class="nav-link" href="Dosen.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dosen Pembimbing
                </a>
                <a class="nav-link" href="Informasi-Panduan-PPKP.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Informasi Panduan PPKP  
                </a>
                <a class="nav-link" href="Bimbingan.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Bimbingan
                </a>
                <a class="nav-link" href="Pengajuan-Data.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Pengajuan Data
                </a>
                <a class="nav-link" href="Hasil-Akhir.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Hasil Akhir
                </a>
                <a class="nav-link" href="Pengajuan-Validasi.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Pengajuan Validasi
                </a>
                <a class="nav-link" href="Pengajuan-Tanda-Tangan.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Pengajuan Tanda Tangan
                </a>
                <?php
            }else if ($_SESSION["status"] =="PPKP" ){
                ?>
                <div class="sb-sidenav-menu-heading">Menu ppkp</div>
                <a class="nav-link" href="Request-Login-Mahasiswa.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Request-Login-Mahasiswa
                </a>
                <a class="nav-link" href="Request-Login-Dosen.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Request-Login-Dosen
                </a>
                <a class="nav-link" href="Request-Login-Sekpro.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Request-Login-Sekpro
                </a>
                <a class="nav-link" href="Request-Login-Kaprodi.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Request-Login-Kaprodi
                </a>
                
                <a class="nav-link" href="Project-KP-Mahasiswa.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Project KP Mahasiswa
                </a>
                <!-- togle -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Editing
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link" href="Private-message.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-message-alt"></i></div>
                    Pesan Private
                </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                    <div class="sb-nav-link-icon"><i class="fas fa-atlas"></i></div> 
                    Broadcasting
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <!-- <a class="nav-link" href="login.html">Pengumuman</a> -->
                            <a class="nav-link" href="Control-Panduan.php">Panduan</a>
                            <a class="nav-link" href="Control-Pengumuman.php">
                            Pengumuman Kerja Praktek
                            </a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                    <div class="sb-nav-link-icon"><i class="far fa-address-card"></i></div> 
                    Akun
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="editing-mahasiswa.php">Mahasiswa</a>
                            <a class="nav-link" href="editing-dosen.php">Dosen</a>
                            <a class="nav-link" href="editing-ppkp.php">PPKP</a>
                            <a class="nav-link" href="editing-sekpro.php">Sekertaris Prodi</a>
                            <a class="nav-link" href="editing-kaprodi.php">Kaprodi</a>
                        </nav>
                    </div>
                </nav>
            </div>
            <!-- end togle -->
                <!-- <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div> -->
                <?php
            }else if($_SESSION["status"] =="Kaprodi" ){
                ?>
                <div class="sb-sidenav-menu-heading">Menu Kaprodi ppkp</div>
                <a class="nav-link" href="Pengumuman.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Pengumuman
                </a>
                <a class="nav-link" href="Form-tanda-tangan-kaprodi.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tanda Tangan
                </a>
                <!-- <a class="nav-link" href=" Project-KP.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Project KP
                </a> -->
                
<!-- sesudah -->
                <?php
            }else if($_SESSION["status"] =="Sekpro" ){
                ?>
                <div class="sb-sidenav-menu-heading">Menu Sekpro ppkp</div>
                <a class="nav-link" href="Pengumuman.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Pengumuman
                </a>
                <a class="nav-link" href="Form-tanda-tangan-sekpro.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tanda Tangan
                </a>
                <!-- <a class="nav-link" href=" Project-KP.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Project KP
                </a> -->
                
<!-- sesudah -->
                <?php
            }else{
                ?>
                <div class="sb-sidenav-menu-heading">Menu Dosen ppkp</div>
                <a class="nav-link" href="Pengumuman.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Pengumuman
                </a>
                <a class="nav-link" href="Mahasiswa-Bimbingan.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Mahasiswa Bimbingan
                </a>
                <a class="nav-link" href="Form-Bimbingan_mahasiswa.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Form Bimbingan Mahasiswa
                </a>
                <a class="nav-link" href="Form-tanda-tangan-dosen.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tanda Tangan
                </a>
                <!-- <a class="nav-link" href=" Project-KP.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Project KP
                </a> -->
                <?php
            }
                ?>
                <hr class="sidebar-divider">
            <li class="nav-item">
          <a class="nav-link" href="proses/logout.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Logout</span></a>
          </li>
            </div>
        </div>
    </nav>
</div>
<div id="layoutSidenav_content">