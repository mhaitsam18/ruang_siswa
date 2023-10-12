-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 04:37 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruang_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
('ADM001', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `foto_guru` varchar(255) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `status` enum('Terverifikasi','Belum terverifikasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `username`, `password`, `nama_guru`, `nip`, `email`, `jenis_kelamin`, `foto_guru`, `dokumen`, `status`) VALUES
('GRU001', 'stephen', '$2y$10$fQQh4ipoJfHcpm8g5DyjH.Tz17L0IDjunCBeShYrTMboOl87aL5Oq', 'Stephen lourd', '10902178', '', 'Peremupuan', '', '18_06_191_bab2.pdf', 'Terverifikasi'),
('GRU002', 'putri', '$2y$10$QYYeBDvjyp3p/kMufjgx2uma8aIkpYA5CfojFIWtgbhwC2ISxt0C.', 'Putri', '10902193', 'putri@gmail.com', 'Perempuan', 'users_(1).png', 'PMB___Telkom_University.pdf', 'Terverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_notifikasi`
--

CREATE TABLE `kategori_notifikasi` (
  `id_kategori_notifikasi` int(11) NOT NULL,
  `kategori_notifikasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_notifikasi`
--

INSERT INTO `kategori_notifikasi` (`id_kategori_notifikasi`, `kategori_notifikasi`) VALUES
(1, 'Notifikasi'),
(2, 'Materi'),
(3, 'Tugas'),
(4, 'Nilai');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_tugas`
--

CREATE TABLE `kategori_tugas` (
  `id_kategori_tugas` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_tugas`
--

INSERT INTO `kategori_tugas` (`id_kategori_tugas`, `kategori`) VALUES
(1, 'Tugas Harian'),
(2, 'PR'),
(3, 'Kuis'),
(4, 'Ulangan Harian'),
(5, 'Ujian Tengah Semester'),
(6, 'Ujian Akhir Semester'),
(7, 'Evaluasi'),
(8, 'Remedial');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, 'X IPA 1'),
(2, 'X IPA 2'),
(3, 'X IPA 3'),
(4, 'X IPS 1'),
(5, 'X IPS 2'),
(6, 'XI IPA 1'),
(7, 'XI IPA 2'),
(8, 'XI IPA 3'),
(9, 'XI IPS 1'),
(10, 'XII IPA 1'),
(11, 'XII IPA 2'),
(12, 'XII IPA 3'),
(13, 'XII IPA 4'),
(14, 'XII IPS 1'),
(15, 'XII IPS 2'),
(16, 'X CI-1');

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE `komplain` (
  `id_komplain` varchar(255) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `file_komplain` varchar(255) NOT NULL,
  `id_pengumpulan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komplain`
--

INSERT INTO `komplain` (`id_komplain`, `alasan`, `file_komplain`, `id_pengumpulan`) VALUES
('KMP001', 'Nilai kurang bagus di bagian 1', 'RafifYusufAvandy_6701180060_TugasPekan7.docx', 'PGN001'),
('KMP002', 'aa', '19-Article_Text-270-1-10-20170131.pdf', 'PGN001'),
('KMP003', 'Nilai saya harusnya bukan 90 pak,, tapi 70 CMIWWW :3', 'resize-pas_1.jpg', 'PGN004'),
('KMP004', 'komplain nilai', 'modul-bahasa-inggris-kelas-xii-semester-i_(1).pdf', 'PGN007'),
('KMP005', 'nilai tidak sesuai', 'adoc_pub_soal-latihan-ulangan-ub-1-kelas-xii32.pdf', 'PGN007');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `mapel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `mapel`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Bahasa Inggris'),
(3, 'Bahsa Daerah'),
(5, 'Bahasa Peminatan (Jerman)'),
(6, 'Bahasa Peminatan (Jepang)'),
(7, 'Bahasa Peminatan (Mandarin)'),
(8, 'Pendidikan Pancasila dan Kewarganegaraan'),
(9, 'Matematika Wajib'),
(10, 'Prakarya dan Kewirausahaan'),
(11, 'Pendidikan Jasmani, Olahraga dan Keseharan'),
(12, 'Pendidikan Agama'),
(13, 'Sejarah Indonesia'),
(14, 'Seni Budaya dan Keterampilan'),
(15, 'Matematika (IPA)'),
(16, 'Teknologi Informasi dan Komunikasi'),
(17, 'Fisika (IPA)'),
(18, 'Kimia (IPA)'),
(19, 'Biologi (IPA)'),
(20, 'Sejarah (IPS)'),
(21, 'Sosiologi (IPS)'),
(22, 'Ekonomi (IPS)'),
(23, 'Geografi (IPS)'),
(26, 'Bahasa Peminatan (Spanyol)');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` varchar(255) NOT NULL,
  `nama_materi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `file_materi` varchar(255) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `id_role_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `nama_materi`, `deskripsi`, `file_materi`, `tanggal_upload`, `id_role_guru`) VALUES
('MTR002', 'Use Case', 'Bab 7 Use Case Semester 4', '4__Analisis_Sistem_(1).pdf', '2020-04-07', 1),
('MTR005', 'Isim Isyaroh', 'Kata Tunjuk \"hadza\" dan \"dzalika\"', 'Surat_Pernyataan_Lanjutan_Revisi1.pdf', '2021-07-12', 2),
('MTR009', 'Membaca Cerita', 'Membaca Cerita si Alma dan Eva di suatu kosan', 'Surat_Pernyataan_Lanjutan_Revisi4.pdf', '2021-07-12', 2),
('MTR011', 'Puisi', 'Baca Puisi', 'scan1.pdf', '2021-07-12', 1),
('MTR012', 'Pengertian SPOK', 'oke', 'Form_Revisi_Sidang_Delvira(1)2.pdf', '2021-08-31', 1),
('MTR013', 'Membaca Pantun', 'oke', 'Form_Revisi_Sidang_Delvira(1)3.pdf', '2021-08-31', 1),
('MTR015', 'Grammar', 'Modul Grammar Lengkap', 'modul-bahasa-inggris-kelas-xii-semester-i.pdf', '2021-09-05', 7),
('MTR016', 'Aljabar', 'Rumus Lengkap matematika Aljabar ', 'modul-matematika-kelas-xii.pdf', '2021-09-05', 6),
('MTR017', 'Medan Magnet', 'Medan magnet adalah ruang yang mengelilingi magnet di mana magnet masih memiliki efeknya. ', 'Medan_magnet_kelas-xii-fisika-sma-kolese-loyola-semarang-sma-ko1.pdf', '2021-09-05', 8),
('MTR018', 'Energi', 'Materi ipa kelas X', 'adoc_pub_kelas-xii-fisika-sma-kolese-loyola-semarang-sma-ko.pdf', '2021-09-05', 11),
('MTR019', 'Daya', 'Materi tentang daya', 'Medan_magnet_kelas-xii-fisika-sma-kolese-loyola-semarang-sma-ko2.pdf', '2021-09-05', 11),
('MTR020', 'Pecahan', 'Pecahan ', 'adoc_pub_soal-matematika-kelas-xii-mipa1.pdf', '2021-09-05', 9),
('MTR021', 'Procedure Text', 'Procedure text', 'modul-bahasa-inggris-kelas-xii-semester-i_(1).pdf', '2021-09-06', 7),
('MTR022', 'Logika dan Himpunan', 'Logika dan Himpunan', 'modul-matematika-kelas-xii_(1)1.pdf', '2021-09-06', 6);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` varchar(255) NOT NULL,
  `nilai` float(5,2) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_pengumpulan` varchar(255) NOT NULL,
  `waktu_penilaian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nilai`, `keterangan`, `id_pengumpulan`, `waktu_penilaian`) VALUES
('NL001', 77.11, 'Assesment 2', 'PGN001', '2021-09-12 21:10:29'),
('NL002', 95.00, 'Bagus', 'PGN004', '2021-09-12 21:10:29'),
('NL003', 90.00, 'Tugas 1', 'PGN007', '2021-09-12 21:10:29'),
('NL004', 80.00, 'Tugas 1', 'PGN008', '2021-09-12 21:10:29'),
('NL005', 72.00, 'Latihan', 'PGN009', '2021-09-12 21:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_user` varchar(128) NOT NULL,
  `id_kategori_notifikasi` int(11) NOT NULL,
  `sub_id` varchar(128) NOT NULL,
  `waktu_notifikasi` datetime NOT NULL DEFAULT current_timestamp(),
  `subjek` varchar(128) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `is_read` int(11) NOT NULL,
  `id_creator` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_user`, `id_kategori_notifikasi`, `sub_id`, `waktu_notifikasi`, `subjek`, `pesan`, `is_read`, `id_creator`) VALUES
(1, 'SSW002', 3, 'TGS002', '2021-08-31 07:18:12', 'Nilai', 'Ada Tugas baru', 1, 'GRU001'),
(2, 'SSW002', 2, 'MTR013', '2021-08-31 15:46:43', 'Materi', 'Pak/Bu Stephen lourd memberikan materi baru', 0, 'GRU001'),
(3, 'SSW002', 2, 'MTR014', '2021-09-03 22:40:19', 'Materi', 'Pak/Bu Stephen lourd memberikan materi baru', 0, 'GRU001'),
(4, 'SSW002', 3, 'TGS006', '2021-09-03 22:41:13', 'Tugas', 'Pak/Bu Stephen lourd memberikan tugas baru', 1, 'GRU001'),
(5, 'SSW003', 2, 'MTR015', '2021-09-05 15:01:07', 'Materi', 'Pak/Bu Stephen lourd memberikan materi baru', 1, 'GRU001'),
(6, 'SSW003', 2, 'MTR016', '2021-09-05 15:02:34', 'Materi', 'Pak/Bu Putri memberikan materi baru', 1, 'GRU002'),
(7, 'SSW003', 2, 'MTR017', '2021-09-05 15:05:25', 'Materi', 'Pak/Bu Putri memberikan materi baru', 1, 'GRU002'),
(8, 'SSW003', 3, 'TGS007', '2021-09-05 15:13:02', 'Tugas', 'Pak/Bu Putri memberikan tugas baru', 1, 'GRU002'),
(9, 'SSW003', 3, 'TGS008', '2021-09-05 15:18:00', 'Tugas', 'Pak/Bu Putri memberikan tugas baru', 1, 'GRU002'),
(10, 'SSW002', 2, 'MTR018', '2021-09-05 16:16:37', 'Materi', 'Pak/Bu Putri memberikan materi baru', 0, 'GRU002'),
(11, 'SSW002', 2, 'MTR019', '2021-09-05 16:17:15', 'Materi', 'Pak/Bu Putri memberikan materi baru', 0, 'GRU002'),
(12, 'SSW002', 2, 'MTR020', '2021-09-05 16:17:43', 'Materi', 'Pak/Bu Putri memberikan materi baru', 0, 'GRU002'),
(13, 'SSW002', 3, 'TGS009', '2021-09-05 16:18:57', 'Tugas', 'Pak/Bu Putri memberikan tugas baru', 0, 'GRU002'),
(14, 'SSW003', 3, 'TGS010', '2021-09-05 16:30:06', 'Tugas', 'Pak/Bu Stephen lourd memberikan tugas baru', 1, 'GRU001'),
(15, 'SSW003', 3, 'TGS011', '2021-09-05 16:35:40', 'Tugas', 'Pak/Bu Putri memberikan tugas baru', 1, 'GRU002'),
(16, 'SSW003', 3, 'TGS012', '2021-09-05 16:39:36', 'Tugas', 'Pak/Bu Putri memberikan tugas baru', 1, 'GRU002'),
(17, 'SSW003', 2, 'MTR021', '2021-09-06 09:29:36', 'Materi', 'Pak/Bu Stephen lourd memberikan materi baru', 0, 'GRU001'),
(18, 'SSW003', 3, 'TGS013', '2021-09-06 09:30:31', 'Tugas', 'Pak/Bu Stephen lourd memberikan tugas baru', 0, 'GRU001'),
(19, 'SSW003', 2, 'MTR022', '2021-09-06 09:31:43', 'Materi', 'Pak/Bu Putri memberikan materi baru', 0, 'GRU002'),
(20, 'SSW003', 3, 'TGS014', '2021-09-06 09:32:49', 'Tugas', 'Pak/Bu Putri memberikan tugas baru', 0, 'GRU002');

-- --------------------------------------------------------

--
-- Table structure for table `pengumpulan`
--

CREATE TABLE `pengumpulan` (
  `id_pengumpulan` varchar(255) NOT NULL,
  `tanggal_pengumpulan` date NOT NULL,
  `file_pengumpulan` varchar(255) NOT NULL,
  `id_siswa` varchar(255) NOT NULL,
  `id_tugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumpulan`
--

INSERT INTO `pengumpulan` (`id_pengumpulan`, `tanggal_pengumpulan`, `file_pengumpulan`, `id_siswa`, `id_tugas`) VALUES
('PGN001', '2020-04-08', '9_2_Deskripsi-Skenario_Use_Case.docx', 'SSW001', 'TGS001'),
('PGN004', '2021-07-12', 'scan0001.pdf', 'SSW002', 'TGS003'),
('PGN005', '2021-07-24', 'List_fitur.docx', 'SSW002', 'TGS001'),
('PGN006', '2021-08-31', 'Form_Revisi_Sidang_Delvira(1).pdf', 'SSW002', 'TGS005'),
('PGN007', '2021-09-05', 'adoc_pub_soal-matematika-kelas-xii-mipa.pdf', 'SSW003', 'TGS010'),
('PGN008', '2021-09-05', 'modul-matematika-kelas-xii_(1).pdf', 'SSW003', 'TGS011'),
('PGN009', '2021-09-05', 'adoc_pub_soal-matematika-kelas-xii-mipa1.pdf', 'SSW003', 'TGS012'),
('PGN010', '2021-09-06', 'BUKU_PA_ALMA.docx', 'SSW003', 'TGS008'),
('PGN011', '2021-09-06', 'adoc_pub_soal-latihan-ulangan-ub-1-kelas-xii31.pdf', 'SSW003', 'TGS008'),
('PGN012', '2021-09-06', 'adoc_pub_soal-latihan-ulangan-ub-1-kelas-xii33.pdf', 'SSW003', 'TGS014');

-- --------------------------------------------------------

--
-- Table structure for table `role_guru`
--

CREATE TABLE `role_guru` (
  `id_role_guru` int(11) NOT NULL,
  `id_guru` varchar(255) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_guru`
--

INSERT INTO `role_guru` (`id_role_guru`, `id_guru`, `id_mapel`, `id_kelas`) VALUES
(1, 'GRU001', 1, 1),
(2, 'GRU001', 4, 5),
(3, 'GRU001', 2, 5),
(5, 'GRU001', 4, 14),
(6, 'GRU002', 9, 10),
(7, 'GRU001', 2, 10),
(8, 'GRU002', 17, 10),
(9, 'GRU002', 9, 1),
(11, 'GRU002', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `foto_siswa` varchar(255) NOT NULL,
  `status` enum('Aktif','Alumni') NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `username`, `password`, `nama_siswa`, `nis`, `email`, `jenis_kelamin`, `foto_siswa`, `status`, `id_kelas`) VALUES
('SSW002', 'sam', '$2y$10$5T1WQpyfNl4hoRk6qPcKiuXhp7BniiDJH6iEZ/ziS0R11KPPdoyIe', 'Sam Willian', '180299', 'samwilliam@gmail.com', 'Laki-laki', 'userr.png', 'Aktif', 1),
('SSW003', 'Alma', '$2y$10$bapeOLIoLVfA6wl1aDHenesZdITdjM..9QptdkUJH.8fWgKmA3c3S', 'Alma Septiara', '180300', 'almaseptiara@gmail.com', 'Perempuan', 'image0.jpeg', 'Aktif', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` varchar(255) NOT NULL,
  `nama_tugas` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `file_tugas` varchar(255) NOT NULL,
  `waktu_penugasan` datetime NOT NULL DEFAULT current_timestamp(),
  `batas_pengumpulan` datetime NOT NULL,
  `id_kategori_tugas` int(11) NOT NULL,
  `id_role_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `nama_tugas`, `deskripsi`, `file_tugas`, `waktu_penugasan`, `batas_pengumpulan`, `id_kategori_tugas`, `id_role_guru`) VALUES
('TGS001', 'Asessment Apsi', 'Assesment take home', 'Usecase.docx', '2021-09-12 21:50:33', '2021-04-16 00:00:00', 1, 1),
('TGS002', 'Tugas Alpro 1', 'Tugas objek orientid', 'Abstract_,_Interface_,_Anonymous_inner_type.pptx', '2021-09-12 21:50:33', '2021-04-14 00:00:00', 1, 1),
('TGS003', 'Ulangan Harian 1', 'Apa aja dah', 'Surat_Pernyataan_Lanjutan_Revisi6.pdf', '2021-09-12 21:50:33', '2021-07-22 00:00:00', 4, 1),
('TGS004', 'Ulangan Harian 1', 'ok', 'Form_Revisi_Sidang_Delvira(1).pdf', '2021-09-12 21:50:33', '2021-09-05 00:00:00', 2, 1),
('TGS005', 'Ulangan Harian 1', 'gitu', 'Form_Revisi_Sidang_Delvira(1)1.pdf', '2021-09-12 21:50:33', '2021-09-04 00:00:00', 2, 1),
('TGS006', 'menyusun kotak', 'dikerjakan', 'Form_Revisi_Sidang_Delvira(1)5.pdf', '2021-09-12 21:50:33', '2021-09-04 00:00:00', 3, 1),
('TGS007', 'Soal Latihan Medan Magnet', 'Kerjakan soal dengan teliti dan benar', 'adoc_pub_soal-latihan-ulangan-ub-1-kelas-xii.pdf', '2021-09-12 21:50:33', '2021-09-03 20:12:00', 1, 8),
('TGS008', 'Tugas ', 'Kerjakan kuis dengan teliti', 'adoc_pub_soal-matematika-kelas-xii-mipa.pdf', '2021-09-12 21:50:33', '2021-09-08 21:00:00', 3, 6),
('TGS009', 'Latihan Daya', 'Kerjakan dengan teliti', 'modul-bahasa-inggris-kelas-xii-semester-i1.pdf', '2021-09-12 21:50:33', '2021-09-13 20:00:00', 4, 11),
('TGS010', 'Tugas Grammar', 'Kerjakan PR dengan baik', 'modul-bahasa-inggris-kelas-xii-semester-i2.pdf', '2021-09-12 21:50:33', '2021-09-07 17:30:00', 2, 7),
('TGS011', 'Tugas 1 Matematika', 'Kerjakan dengan teliti', 'adoc_pub_soal-latihan-ulangan-ub-1-kelas-xii1.pdf', '2021-09-12 21:50:33', '2021-09-06 16:40:00', 1, 6),
('TGS012', 'Latihan', 'Kerjakan dengan teliti', 'modul-matematika-kelas-xii_(1).pdf', '2021-09-12 21:50:33', '2021-09-09 20:43:00', 2, 8),
('TGS013', 'Tugas Procedure Text', 'Kerjakan dengan baik dan teliti', 'adoc_pub_soal-latihan-ulangan-ub-1-kelas-xii2.pdf', '2021-09-12 21:50:33', '2021-09-15 00:30:00', 7, 7),
('TGS014', 'Tugas Himpunan', 'Kerjakan tugas berikut dengan teliti ', 'adoc_pub_soal-latihan-ulangan-ub-1-kelas-xii3.pdf', '2021-09-12 21:50:33', '2021-09-10 00:00:00', 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'haitsam03@gmail.com', 'LU7wC+cyKushCABqwz3QqbsdhE1KHZpRrOB9lETIddc=', 1627135803),
(2, 'almaseptiara@gmail.com', 'flB0VCyhpvFYWN3wLPwvmooO7GrXeNCxMgtOD9vZG7U=', 1627136144),
(3, 'almaseptiara@gmail.com', 'yuqeHGcHYYZynDGTNQrqapVBMuoIO9NCV3ZaAwK6Hk4=', 1630827738),
(4, 'almaseptiara@gmail.com', 'ObrAJYvKNj9g/2Q6V7FYxUH025fUL2dDEyoSGYQTS/o=', 1630827853),
(5, 'almaseptiara@gmail.com', 'ALkigruQNV5FQrXHDORZrN9HvDTBvLH2XR2JjnRvajw=', 1630827864),
(6, 'almaseptiara@gmail.com', 'DkBToaY6v5OstlYCithLqRTWK8T+ELSBVMSqHIYywFk=', 1630828165),
(7, 'almaseptiara@gmail.com', 'ax2WKOK6j/ulYHY+V8pkH9MN1GLUHnI0AreDWzVhyKw=', 1630846427);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kategori_notifikasi`
--
ALTER TABLE `kategori_notifikasi`
  ADD PRIMARY KEY (`id_kategori_notifikasi`);

--
-- Indexes for table `kategori_tugas`
--
ALTER TABLE `kategori_tugas`
  ADD PRIMARY KEY (`id_kategori_tugas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id_komplain`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `pengumpulan`
--
ALTER TABLE `pengumpulan`
  ADD PRIMARY KEY (`id_pengumpulan`);

--
-- Indexes for table `role_guru`
--
ALTER TABLE `role_guru`
  ADD PRIMARY KEY (`id_role_guru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `jenis_kelamin` (`jenis_kelamin`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_notifikasi`
--
ALTER TABLE `kategori_notifikasi`
  MODIFY `id_kategori_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori_tugas`
--
ALTER TABLE `kategori_tugas`
  MODIFY `id_kategori_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `role_guru`
--
ALTER TABLE `role_guru`
  MODIFY `id_role_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
