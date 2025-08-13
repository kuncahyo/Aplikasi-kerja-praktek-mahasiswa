-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Feb 2023 pada 00.39
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppkp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nim` bigint(20) NOT NULL,
  `namalengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namafile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bimbingan` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT current_timestamp(),
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bimbingan`
--

INSERT INTO `bimbingan` (`id`, `id_mahasiswa`, `id_dosen`, `nim`, `namalengkap`, `namafile`, `tanggal_bimbingan`, `waktu_selesai`, `status`, `komentar`) VALUES
(17, 47, 11, 111, 'kun cahyo', 'CEK SETELAH TYPO.docx', '2022-12-05 11:16:09', '2022-12-05 16:54:56', 'approve', 'ok'),
(18, 47, 12, 111, 'kun cahyo', '17410100141-Kuncahyo Adi Prihutomo.pdf', '2023-01-23 11:16:09', '2023-01-23 04:55:30', 'approve', 'yes'),
(19, 47, 12, 111, 'kun cahyo', 'KP-17410100141-Revisi (1) (1).docx', '2023-02-04 04:39:00', '2023-02-03 22:53:00', 'approve', 'ok helmi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nidn` bigint(20) NOT NULL,
  `prodi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_akun` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `id_user`, `nidn`, `prodi`, `name`, `email`, `status`, `status_akun`) VALUES
(11, 49, 1111, 'sistem informasi', 'dosen kun', 'dosen@gmail.com', 'Dosen', 'approve'),
(12, 52, 123123445, 'sistem informasi', 'tri sagirani', 'tri@dinamika.ac.id', 'Dosen', 'approve'),
(13, 53, 101, 'teknik komputer', 'dosen 10', 'dosen10@dinamika.ac.id', 'Dosen', 'RequestLogin'),
(14, 54, 102, 'teknik komputer', 'dosen 11', 'dosen10@dinamika.ac.id', 'Dosen', 'RequestLogin'),
(15, 55, 103, 'teknik komputer', 'dosen 12', 'dosen12@dinamika.ac.id', 'Dosen', 'RequestLogin'),
(16, 56, 104, 'sistem informasi', 'dosen 13', 'dosen13@dinamika.ac.id', 'Dosen', 'RequestLogin'),
(17, 57, 105, 'Desain Komunikasi Visual', 'dosen 14', 'dosen14@dinamika.ac.id', 'Dosen', 'RequestLogin'),
(18, 58, 106, 'sistem informasi', 'dosen 15', 'dosen15@dinamika.ac.id', 'Dosen', 'RequestLogin'),
(19, 59, 107, 'sistem informasi', 'dosen 16', 'dosen16@dinamika.ac.id', 'Dosen', 'RequestLogin'),
(20, 60, 108, 'sistem informasi', 'dosen 17', 'dosen117@dinamika.ac.id', 'Dosen', 'RequestLogin'),
(21, 61, 109, 'sistem informasi', 'dosen 18', 'dosen18@dinamika.ac.id', 'Dosen', 'RequestLogin'),
(22, 62, 110, 'sistem informasi', 'dosen 19', 'dosen119@dinamika.ac.id', 'Dosen', 'RequestLogin'),
(23, 65, 543266, 'sistem informasi', 'tutut tut', 'tutut@dinamika.ac.id', 'Dosen', 'approve');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kaprodi`
--

CREATE TABLE `kaprodi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nidn` varchar(50) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_akun` varchar(50) NOT NULL DEFAULT 'RequestLogin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kaprodi`
--

INSERT INTO `kaprodi` (`id`, `id_user`, `nidn`, `prodi`, `nama`, `email`, `status`, `status_akun`) VALUES
(4, 51, '999', 'sistem informasi', 'anjik kaprodi', 'kaprodi@dinamika.ac.id', 'Kaprodi', 'approve');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_kp`
--

CREATE TABLE `mahasiswa_kp` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `nim_mahasiswa` bigint(20) NOT NULL,
  `nama_mahasiswa` varchar(250) NOT NULL,
  `judu_kp` varchar(200) NOT NULL,
  `lokasi_kp` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kontak` varchar(12) NOT NULL,
  `status_kp` varchar(50) NOT NULL,
  `status_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa_kp`
--

INSERT INTO `mahasiswa_kp` (`id`, `id_user`, `id_dosen`, `prodi`, `nim_mahasiswa`, `nama_mahasiswa`, `judu_kp`, `lokasi_kp`, `alamat`, `kontak`, `status_kp`, `status_dosen`) VALUES
(8, 47, 12, 'sistem informasi', 111, 'kun cahyo', 'aplikasi helmi', 'hhheeee', 'sidoarjo', '085778677', 'approve', 'approve'),
(9, 48, 12, 'sistem informasi', 222, 'helmi syahputra', 'ert app', 'ert', 'surabaya, jalan jendral sudirman', '08975645000', 'approve', 'approve'),
(10, 64, 12, 'sistem informasi', 17410100141, 'muji agung', 'aplikasi kas kantor', 'PT stikom dinamika', 'Jl. raya popoh dsn. blumbang rt/rw 03/05', '081335777781', 'approve', 'approve');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `jenis_pengumuman` varchar(100) NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `tanggal_berakhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `jenis_pengumuman`, `isi_pengumuman`, `tanggal_pelaksanaan`, `tanggal_berakhir`) VALUES
(1, 'Berita KP', 'Pembukaan Pendaftaran Kerja Praktik', '2022-09-05', '2022-10-20'),
(2, 'Berita KP', 'Pelaksanaan Pembekalan KP di ruang M502\r\nPukul 15.00 - selesai', '2022-09-05', '2022-09-07'),
(3, 'Pengumuman', 'Panduan_Watermark_Adobe_Acrobat_Pro_DC_UNDIKA.pdf', '2022-09-01', '2023-09-30'),
(4, 'Pengumuman', 'ACC_17410100155-RizdhanHernanda - Tri Sagirani.pdf', '2022-09-22', '2022-10-05'),
(5, 'Pengumuman', 'CEK SETELAH TYPO.docx', '2022-12-07', '2022-12-20'),
(6, 'Berita KP', 'aaaaaaa', '2022-12-05', '2022-12-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `id_pertama` int(11) NOT NULL,
  `id_kedua` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `id_pertama`, `id_kedua`, `subject`, `isi`, `waktu`) VALUES
(1, 50, 47, 'kp 1', 'ini kp 1 mu', '2022-12-02 23:43:37'),
(2, 47, 50, 'kp 1', 'yoi', '2022-12-02 23:43:37'),
(3, 50, 47, 'kp 2', 'sudah kah', '2022-12-02 23:43:37'),
(4, 50, 47, 'kp 1', 'cek 2', '2022-12-05 02:04:04'),
(8, 50, 47, 'kp 1', 'proses', '2022-12-05 02:43:12'),
(9, 50, 47, 's2', 'tes ke 2', '2022-12-05 04:00:53'),
(10, 50, 47, 's2', 'ini 2', '2022-12-05 04:01:47'),
(11, 47, 50, 'kp 1', 'siap', '2022-12-05 06:56:00'),
(12, 47, 50, 'kp 1', 'helmi', '2022-12-05 21:09:24'),
(13, 50, 47, 'kp 1', 'ok hekmi', '2022-12-05 22:03:15'),
(14, 50, 47, 'sss2', 'sss2 cek', '2022-12-05 22:03:50'),
(15, 50, 49, 'dos cek', 'cek cek', '2022-12-05 22:49:22'),
(16, 50, 49, 'dos cek', '1 kali', '2022-12-05 22:49:30'),
(17, 50, 51, 'cek kapro', 'cek 2', '2022-12-05 22:52:56'),
(18, 51, 50, 'cek kapro', 'kapro ini', '2022-12-05 22:53:16'),
(19, 50, 63, 'tes sekpro', 'halo sekpro', '2023-01-25 06:35:49'),
(20, 63, 50, 'tes sekpro', 'hai ppkp', '2023-01-25 06:36:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppkp`
--

CREATE TABLE `ppkp` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_akun` varchar(50) NOT NULL DEFAULT 'RequestLogin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ppkp`
--

INSERT INTO `ppkp` (`id`, `id_user`, `nip`, `nama`, `email`, `status`, `status_akun`) VALUES
(5, 50, '12345', 'ppkp ppkp', 'Ppkp@gmail.com', 'PPKP', 'approve');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_pembimbing`
--

CREATE TABLE `request_pembimbing` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `request_pembimbing`
--

INSERT INTO `request_pembimbing` (`id`, `id_mahasiswa`, `id_dosen`, `status`) VALUES
(5, 47, 52, 'approve'),
(6, 64, 52, 'approve'),
(7, 48, 52, 'approve');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekpro`
--

CREATE TABLE `sekpro` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nidn` varchar(50) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_akun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sekpro`
--

INSERT INTO `sekpro` (`id`, `id_user`, `nidn`, `prodi`, `nama`, `email`, `status`, `status_akun`) VALUES
(5, 63, '09899', 'sistem informasi', 'ko julianto p', 'sekpro@dinamika.ac.id', 'Sekpro', 'approve');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanda_tangan`
--

CREATE TABLE `tanda_tangan` (
  `id` int(11) NOT NULL,
  `mengajukan` varchar(200) NOT NULL,
  `penerima` varchar(200) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `file` varchar(200) NOT NULL,
  `info` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanda_tangan`
--

INSERT INTO `tanda_tangan` (`id`, `mengajukan`, `penerima`, `tipe`, `file`, `info`, `tanggal`, `status`) VALUES
(0, '47', '51', 'lainnya', 'PPT SIDANG 111.pptx', ' ', '2022-12-05', 'Decline'),
(1, '47', '51', 'Hasil-Akhir', 'Kristin Angelina_18410100228_M503.pdf', ' ', '2022-12-05', 'Decline'),
(2, '47', '49', 'form-1', 'kuncahyo tes turnitin.pdf', ' aaa', '2022-12-05', 'Approve'),
(3, '47', '51', 'lainnya', 'NAMA PEMATERI SEMINAR TA.pdf', ' okkkkkkkapro', '2022-12-05', 'Approve'),
(4, '47', '51', 'form-3', 'ACC_17410100155-RizdhanHernanda - Tri Sagirani.pdf', ' sudah benar', '2022-12-05', 'Approve'),
(5, '47', '52', 'form-1', '111.pdf', ' saya setuju', '2023-01-23', 'Approve'),
(6, '47', '52', 'form-2', 'kuncahyo tes turnitin.pdf', ' ', '2023-01-23', 'Decline'),
(7, '47', '63', '', '111-sudah sekpro.pdf', ' sudah', '2023-01-24', 'Approve'),
(8, '47', '63', '', '111-sualah sekpro.pdf', ' salah ya', '2023-01-24', 'Decline'),
(9, '47', '63', 'Tanda-Tangan', '111.pdf', 'ini', '2023-01-24', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploadkp`
--

CREATE TABLE `uploadkp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `namalengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namafile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `kode` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `uploadkp`
--

INSERT INTO `uploadkp` (`id`, `id_user`, `namalengkap`, `namafile`, `tanggal`, `kode`, `status`) VALUES
(52, 47, 'kun cahyo', 'CEK SETELAH TYPO.docx', '2023-01-25', 1, 'approve'),
(53, 47, 'kun cahyo', '17410100141-Kuncahyo Adi Prihutomo.pdf', '2023-01-25', 2, 'approve'),
(54, 48, 'helmi syahputra', 'CEK SETELAH TYPO.docx', '2023-01-25', 1, 'pending'),
(56, 47, 'kun cahyo', '111.pdf', '2023-01-24', 3, 'approve'),
(57, 47, 'kun cahyo', '111-sualah sekpro.pdf', '2023-01-24', 4, 'approve'),
(59, 47, 'kun cahyo', 'ACC_17410100155-RizdhanHernanda - Tri Sagirani.pdf', '2023-01-24', 6, 'decline'),
(60, 47, 'kun cahyo', 'Kristin Angelina_18410100228_M503.pdf', '2023-01-24', 7, 'pending'),
(63, 47, 'kun cahyo', 'MANUAL BOOK-17410100155.docx', '2023-01-25', 0, 'decline'),
(64, 48, 'helmi syahputra', 'Kristin Angelina_18410100228_M503.pdf', '2023-01-25', 5, 'pending'),
(65, 47, 'kun cahyo', '111.pdf', '2023-01-25', 5, 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nim`, `name`, `email`, `email_verified_at`, `password`, `status`) VALUES
(47, 111, 'kun cahyo', 'mahasiswa@gmail.com', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Mahasiswa'),
(48, 222, 'helmi syahputra', 'mahasiswa2@gmail.com', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Mahasiswa'),
(49, 1111, 'dosen kun', 'dosen@gmail.com', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Dosen'),
(50, 12345, 'ppkp ppkp', 'Ppkp@gmail.com', '0000-00-00 00:00:00', '827ccb0eea8a706c4c34a16891f84e7b', 'PPKP'),
(51, 999, 'anjik kaprodi', 'kaprodi@dinamika.ac.id', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Kaprodi'),
(52, 123123445, 'tri sagirani', 'tri@dinamika.ac.id', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Dosen'),
(53, 101, 'dosen 10', 'dosen10@dinamika.ac.id', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Dosen'),
(54, 102, 'dosen 11', 'dosen11@dinamika.ac.id', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Dosen'),
(55, 103, 'dosen 12', 'dosen12@dinamika.ac.id', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Dosen'),
(56, 104, 'dosen 13', 'dosen13@dinamika.ac.id', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Dosen'),
(57, 105, 'dosen 14', 'dosen14@dinamika.ac.id', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Dosen'),
(58, 106, 'dosen 15', 'dosen15@dinamika.ac.id', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Dosen'),
(59, 107, 'dosen 16', 'dosen16@dinamika.ac.id', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Dosen'),
(60, 108, 'dosen 17', 'dosen117@dinamika.ac.id', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Dosen'),
(61, 109, 'dosen 18', 'dosen18@dinamika.ac.id', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Dosen'),
(62, 110, 'dosen 19', 'dosen119@dinamika.ac.id', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Dosen'),
(63, 9899, 'ko julianto', 'sekpro@dinamika.ac.id', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Sekpro'),
(64, 17410100141, 'muji agung', 'mahasiswamj@gmail.com', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Mahasiswa'),
(65, 543266, 'tutut tut', 'tutut@dinamika.ac.id', '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', 'Dosen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kaprodi`
--
ALTER TABLE `kaprodi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa_kp`
--
ALTER TABLE `mahasiswa_kp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ppkp`
--
ALTER TABLE `ppkp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `request_pembimbing`
--
ALTER TABLE `request_pembimbing`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sekpro`
--
ALTER TABLE `sekpro`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tanda_tangan`
--
ALTER TABLE `tanda_tangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `uploadkp`
--
ALTER TABLE `uploadkp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kaprodi`
--
ALTER TABLE `kaprodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_kp`
--
ALTER TABLE `mahasiswa_kp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `ppkp`
--
ALTER TABLE `ppkp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sekpro`
--
ALTER TABLE `sekpro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `uploadkp`
--
ALTER TABLE `uploadkp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
