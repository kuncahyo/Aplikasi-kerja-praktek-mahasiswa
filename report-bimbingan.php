<?php
// memanggil library FPDF
require('vendor/fpdf184/fpdf.php');
include 'koneksi/koneksi.php';
$id_awal=$_GET['id'];
// header footer
class PDF extends FPDF{
function Header()
{
    // logo atau gambar, 
    // 'logo.php' di bawah berarti path atau alamat gambar
    // dengan panjang posisi X = 10, Y = 6, dan panjang 30 
    $this->Image('assets\img\logo-dinamika-hitam.png',10,6,50);
    
// kita akan membuat class baru yang mewarisi sifat dari class FPDF
// tujuannya agar lebih memudahkan editing
        // logo atau gambar, 
        // 'logo.php' di bawah berarti path atau alamat gambar
        // dengan panjang posisi X = 10, Y = 6, dan panjang 30 
        // arial bold 15
        $this->SetFont('Arial','B',11);
        // membuat cell kosong dengan panjang 80
        $this->Cell(130);
        // judul
        $this->SetTextColor(200,0,0); // warna tulisan
        $this->Cell(50,8,'SEMESTERKP 21.2',1,0,'C');
        // line break dengan tinggi 20
        $this->Ln(20);
    }
  
    function Footer()
    {
      
        // mengatur posisi 1,5 cm ke bawah
        $this->SetY(-15);
        // arial italic 8
        $this->SetFont('Arial','I',8);
        // penomoran halaman
        $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
    }
  }
  
  $pdf = new PDF();
  $pdf->AliasNbPages(); // fungsi untuk mengitung jumlah total halaman
  $pdf->AddPage(); // membuat halaman
  $pdf->SetFont('Times','U',15); // Times 12
  
  // pengulangan agar dokumen ada isinya dan kelihatan penomorannya
  // $pdf->Cell(200,10,'Semester 21.2',10,6,50);
  $pdf->SetTextColor(200,0,0); // warna tulisan
  $pdf->Cell(200,10,'KARTU BIMBINGAN KERJA PRAKTEK',0,0,'C');
 
  $pdf->Cell(10,15,'',0,1);
  $pdf->SetFont('Times','',11);
  $pdf->SetTextColor(0,0,0); // warna tulisan
  $pdf->Cell(40,7,'Nama Instansi',1,0,'');
  $data = mysqli_query($koneksi,"SELECT  * FROM mahasiswa_kp where id_user=$id_awal");
  while($d = mysqli_fetch_array($data)){
    $pdf->SetFont('Times','B',11);
  $pdf->Cell(145,7,$d['lokasi_kp'] ,1,0,'');
  }
  $pdf->Cell(10,7,'',0,1);
  $pdf->SetFont('Times','',11);
  $data = mysqli_query($koneksi,"SELECT  * FROM mahasiswa_kp where id_user=$id_awal");
  while($d = mysqli_fetch_array($data)){
    $pdf->Cell(40,7,'Alamat Instansi',1,0,'');
    $pdf->SetFont('Times','B',11);
    $pdf->Cell(145,7,$d['alamat'] ,1,0,'');
  }
  $pdf->Cell(10,7,'',0,1);
  $pdf->SetFont('Times','',11);
  $data = mysqli_query($koneksi,"SELECT  * FROM mahasiswa_kp where id_user=$id_awal");
  while($d = mysqli_fetch_array($data)){
    $pdf->Cell(40,7,'Contact Person',1,0,'');
    $pdf->Cell(145,7,$d['kontak'] ,1,0,'');
  }
  $pdf->Cell(10,7,'',0,1);
  $pdf->SetFont('Times','',11);
  $data = mysqli_query($koneksi,"SELECT  * FROM mahasiswa_kp where id_user=$id_awal");
  while($d = mysqli_fetch_array($data)){
    $pdf->Cell(40,7,'Judul Kerja Praktek',1,0,'');
    $pdf->SetFont('Times','B',11);
    $pdf->Cell(145,7,$d['judu_kp'] ,1,0,'');
  }
  $pdf->Cell(10,7,'',0,1);
  $pdf->SetFont('Times','',11);
  $data = mysqli_query($koneksi,"SELECT  * FROM mahasiswa_kp where id_user=$id_awal");
  while($d = mysqli_fetch_array($data)){
    $pdf->Cell(40,7,'Nama Mahasiswa',1,0,'');
    $pdf->SetFont('Times','B',11);
    $pdf->Cell(145,7,$d['nama_mahasiswa'] ,1,0,'');
  }
  $pdf->Cell(10,7,'',0,1);
  $pdf->SetFont('Times','',11);
  $data = mysqli_query($koneksi,"SELECT  * FROM mahasiswa_kp where id_user=$id_awal");
  while($d = mysqli_fetch_array($data)){
    $pdf->Cell(40,7,'NIM',1,0,'');
    $pdf->SetFont('Times','B',11);
    $pdf->Cell(145,7,$d['nim_mahasiswa'] ,1,0,'');
  }
  // end atas
  $pdf->SetFont('Times','B',13);
  $pdf->Cell(200,10,'DATA BIMBINGAN',0,0,'C');
   
  $pdf->Cell(10,20,'',0,1);
  $pdf->SetFont('Times','B',9);
  $pdf->Cell(20,7,'Tanggal',1,0,'C');
  $pdf->Cell(30,7,'JAM' ,1,0,'C');
  $pdf->Cell(75,7,'MATERI BIMBINGAN',1,0,'C');
  $pdf->Cell(30,7,'TTD MAHASISWA',1,0,'C');
  $pdf->Cell(30,7,'PARAF DOSEN',1,0,'C');
   
   
  $pdf->Cell(10,7,'',0,1);
  $pdf->SetFont('Times','',10);
  $no=1;
  $data = mysqli_query($koneksi,"SELECT  * FROM bimbingan");
  while($d = mysqli_fetch_array($data)){
    $pdf->Cell(20,7, date('d-m-Y', strtotime($d["tanggal_bimbingan"])),1,0,'C');
    $pdf->Cell(30,7, date('H:i', strtotime($d["tanggal_bimbingan"]))."-".date('H:i', strtotime($d["waktu_selesai"])),1,0,'C');
    $pdf->Cell(75,7, $d['komentar'],1,0);  
    $pdf->Cell(30,7,'',1,0);
    $pdf->Cell(30,7,'',1,1);
  }
  $tgl=date('d-m-Y');
  $pdf->SetFont('Times','',12); // Times 12
  $pdf->Cell(10,10,'',0,1);
  $pdf->Cell(300,5,'Surabaya, '.$tgl,0,1,'C');
  // $pdf->SetFont('Times','B',13);
  $pdf->Cell(300,10,'Menyetujui,',0,1,'C');
  $pdf->Cell(300,0,'Hasil laporan KP',0,1,'C');
  $data = mysqli_query($koneksi,"SELECT m.id_dosen,d.name FROM mahasiswa_kp m join dosen d on m.id_dosen=d.id where m.id_user=$id_awal;;");
  while($d = mysqli_fetch_array($data)){
    $pdf->Cell(300,50,'________________',0,1,'C');
    $pdf->Cell(300,-40, $d['name'],0,1,'C');
      
  }
  
  $pdf->Output(); // menampilkan hasil...
  ?>