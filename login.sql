-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 05:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `kartu_keluarga`
--

CREATE TABLE `kartu_keluarga` (
  `id_kk` int(11) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `id_kepala_kk` int(11) NOT NULL,
  `alamat_kk` text NOT NULL,
  `desa_kelurahan_kk` varchar(50) NOT NULL,
  `kec_kk` varchar(50) NOT NULL,
  `kab_kk` varchar(50) NOT NULL,
  `prov_kk` varchar(50) NOT NULL,
  `negara_kk` varchar(50) NOT NULL,
  `rt_kk` varchar(3) NOT NULL,
  `rw_kk` varchar(3) NOT NULL,
  `kode_pos_kk` varchar(5) NOT NULL,
  `diinput` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `diupdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartu_keluarga`
--

INSERT INTO `kartu_keluarga` (`id_kk`, `no_kk`, `id_kepala_kk`, `alamat_kk`, `desa_kelurahan_kk`, `kec_kk`, `kab_kk`, `prov_kk`, `negara_kk`, `rt_kk`, `rw_kk`, `kode_pos_kk`, `diinput`, `diupdate`) VALUES
(4, '8101061001080596', 14, 'DUSUN PARIGI', 'WAHAI', 'SERAM UTARA', 'MALUKU TENGAH', 'MALUKU', 'INDONESIA', '002', '000', '97557', '2024-08-04 03:13:59', '2024-07-21 12:03:20'),
(5, '8171044209000002', 20, 'Dusun Kranjang', 'Wayame', 'Teluk Ambon', 'Ambon', 'MALUKU', 'INDONESIA', '016', '009', '97234', '2024-08-03 10:52:50', '2024-08-03 10:52:50'),
(6, '8101061001080747', 18, 'DUSUN PARIGI', 'WAHAI', 'SERAM UTARA', 'MALUKU TENGAH', 'MALUKU', 'INDONESIA', '002', '000', '97557', '2024-08-05 05:14:34', '2024-08-05 05:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(256) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan` varchar(256) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `perihal` varchar(256) NOT NULL,
  `file_surat` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `nomor_surat`, `tanggal_surat`, `tujuan`, `penerima`, `perihal`, `file_surat`) VALUES
(12, '001', '2023-09-14', 'GUB', 'Sekretaris', 'Undangan', 'Daftar_Transaksi_Paket_Murah_Lebaran_2024_Seram_Utara.pdf'),
(13, '003', '2024-08-01', 'mars', 'adudu', 'party', 'surat_drawio.png');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(9) UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `file_surat` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `nomor_surat`, `tanggal_surat`, `asal_surat`, `penerima`, `perihal`, `file_surat`) VALUES
(120, '001', '2023-09-14', 'Gub', 'Sekretaris', 'Undangan', 'WhatsApp_Image_2023-09-13_at_14_57_12.jpeg'),
(121, '005', '2024-07-20', 'Desa Wahai', 'Rifai', 'Rapat', '200101022-MOHAMMAD_TASLIM_ULUMANDO.pdf'),
(122, '003', '2024-07-30', 'BPPMHKP Ambon', 'taslim', 'undangan', 'usecase_drawio.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(31, 'Moh Taslim', 'taslim.moh11@gmail.com', 'WhatsApp_Image_2023-09-13_at_14_57_10.jpeg', '$2y$10$Vi673JjIakJqT4kwq87eIeX1YXW.1iL6vbMsUo04upOZXceUpONvS', 1, 1, 1690962929),
(43, 'Nathan', 'nathan@gmail.com', 'default.jpg', '$2y$10$1YmsQKhGPKJerugiQmtXEev7SAGSwJPNRmbLC2CGfii49xN4.b.6G', 2, 1, 1714807626),
(44, 'Brody', 'brody@gmail.com', 'default.jpg', '$2y$10$ISkkGKWKyzdYZf3vVMrUrurBznBJfpl0ShhJmLFwmqIhViPywwigS', 13, 1, 1714807653);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(5, 1, 4),
(8, 3, 2),
(9, 3, 5),
(17, 1, 5),
(20, 1, 7),
(21, 1, 8),
(23, 5, 2),
(24, 1, 9),
(25, 1, 10),
(26, 1, 11),
(27, 4, 2),
(31, 1, 14),
(32, 3, 14),
(33, 1, 15),
(34, 3, 15),
(35, 2, 4),
(36, 13, 5),
(37, 13, 2),
(38, 1, 16),
(45, 1, 2),
(46, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Surat'),
(5, 'Penduduk');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Admin Surat'),
(13, 'Admin Penduduk');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Ubah Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(9, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(10, 2, 'Ganti Password', 'user/changepassword', 'fas fa-fw fa-user-lock ', 1),
(27, 1, 'Akun', 'admin/akun', 'fas fa-fw fa-user', 1),
(35, 4, 'Surat Masuk', 'surat/suratmasuk', 'fas fa-fw fa-envelope', 1),
(36, 4, 'Surat Keluar', 'surat/suratkeluar', 'fas fa-fw fa-envelope-open-text', 1),
(59, 14, 'BA 95% 5%', 'document/ba955', 'fas fa-fw fa-file', 1),
(60, 15, 'BA Uang Muka', 'document/bauangmuka', 'fas fa-fw fa-file', 1),
(61, 14, 'Kwitansi 95% 5%', 'document/kwitansi955', 'fas fa-fw fa-file', 1),
(62, 15, 'Kwitansi Uang Muka', 'document/kwitansi', 'fas fa-fw fa-file', 1),
(63, 15, 'Resume Uang Muka', 'document/resume', 'fas fa-fw fa-file', 1),
(64, 14, 'Resume 95% 5%', 'document/resume955', 'fas fa-fw fa-file', 1),
(65, 15, 'SPP Uang Muka', 'document/spp', 'fas fa-fw fa-file', 1),
(66, 14, 'SPP 95% 5%', 'document/spp955', 'fas fa-fw fa-file', 1),
(67, 15, 'SPM Uang Muka', 'document/spm', 'fas fa-fw fa-file', 1),
(68, 14, 'SPM 95% 5%', 'document/spm955', 'fas fa-fw fa-file', 1),
(69, 15, 'SP2D Uang Muka', 'document/sp2d', 'fas fa-fw fa-file', 1),
(70, 14, 'SP2D 95% 5%', 'document/sp2d955', 'fas fa-fw fa-file', 1),
(74, 5, 'Data Penduduk', 'penduduk', 'fas fa-fw fa-users', 1),
(76, 5, 'Data Kartu Keluarga', 'penduduk/kk', 'fas fa-fw fa-users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat_ktp` varchar(255) NOT NULL,
  `alamat_warga` varchar(255) NOT NULL,
  `desa_kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `agama` enum('Islam','Kristen','Katholik','Hindu','Budha','Kong Hu Chu') NOT NULL,
  `pendidikan_terakhir` enum('Tidak Sekolah','Tidak Tamat SD','SD','SMP','SMA','D1','D2','D3','S1','S2','S3') NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `status_perkawinan` enum('Menikah','Belum Menikah') NOT NULL,
  `input` timestamp NOT NULL DEFAULT current_timestamp(),
  `perbarui` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat_ktp`, `alamat_warga`, `desa_kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `negara`, `rt`, `rw`, `agama`, `pendidikan_terakhir`, `pekerjaan`, `status_perkawinan`, `input`, `perbarui`) VALUES
(14, '8101060108800003', 'SALIM TOMIA', 'PARIGI', '1980-06-01', 'L', 'DUSUN PARIGI', 'DUSUN PARIGI', 'WAHAI', 'SERAM UTARA', 'MALUKU TENGAH', 'MALUKU', 'INDONESIA', '002', '002', 'Islam', 'SD', 'NELAYAN', 'Menikah', '2024-07-21 11:46:25', '2024-07-27 12:03:53'),
(15, '8101061106000001', 'MOHAMMAD TASLIM ULUMANDO', 'KUPANG', '2000-06-11', 'L', 'DUSUN PARIGI', 'DUSUN PARIGI', 'WAHAI', 'SERAM UTARA', 'MALUKU TENGAH', 'MALUKU', 'INDONESIA', '004', '000', 'Islam', 'SMA', 'MAHASISWA', 'Belum Menikah', '2024-07-28 02:24:32', '2024-07-28 02:24:32'),
(16, '8101064607830001', 'WA YATI', 'PARIGI', '1983-07-06', 'P', 'DUSUN PARIGI', 'DUSUN PARIGI', 'WAHAI', 'SERAM UTARA', ' MALUKU TENGAH', 'MALUKU', 'INDONESIA', '002', '000', 'Islam', 'SD', 'IBU RUMAH TANGGA', 'Menikah', '2024-07-29 01:05:42', '2024-07-29 01:05:42'),
(17, '8101060606060006', 'IRSAN TOMIA', 'DUSUN PARIGI', '2006-06-06', 'L', 'DUSUN PARIGI', 'DUSUN PARIGI', 'WAHAI', 'SERAM UTARA', 'MALUKU TENGAH', 'MALUKU', 'INDONESIA', '002', '000', 'Islam', 'SMA', 'PELAJAR/MAHASISWA', 'Belum Menikah', '2024-07-29 01:08:34', '2024-07-29 01:08:34'),
(18, '8101060107780001', 'LA AMAT WALLY', 'PARIGI', '1978-06-01', 'L', 'DUSUN PARIGI', 'DUSUN PARIGI', 'WAHAI', 'SERAM UTARA', 'MALUKU TENGAH', 'MALUKU', 'INDONESIA', '002', '000', 'Islam', 'SD', 'NELAYAN', 'Menikah', '2024-07-29 04:26:55', '2024-07-29 04:26:55'),
(19, '8101065606790002', 'SANATIA', 'PARIGI', '1979-06-16', 'P', 'DUSUN PARIGI', 'DUSUN PARIGI', 'WAHAI', 'SERAM UTARA', 'MALUKU TENGAH', 'MALUKU', 'INDONESIA', '002', '000', 'Islam', 'SD', 'IBU RUMAH TANGGA', 'Menikah', '2024-07-29 07:03:55', '2024-07-29 07:03:55'),
(20, '8171044207000001', 'Julieta La Abdullah', 'Ambon', '2000-07-02', 'P', 'Wayame', 'Dusun Parigi', 'Wahai', 'Seram Utara', 'Maluku Tengah', 'Maluku', 'Indonesia', '004', '000', 'Islam', 'S1', 'CEO', 'Belum Menikah', '2024-08-03 10:46:43', '2024-08-03 10:46:43'),
(21, '8101064107040003', 'WA ASRIA WALLY', 'PARIGI', '2001-06-24', 'P', 'DUSUN PARIGI', 'DUSUN PARIGI', 'WAHAI', 'SERAM UTARA', 'MALUKU TENGAH', 'MALUKU', 'INDONESIA', '002', '000', 'Islam', 'S1', 'MAHASISWA', 'Belum Menikah', '2024-08-05 05:00:52', '2024-08-05 05:00:52'),
(22, '8101064107060004', 'JULFAN WALLY', 'PARIGI', '2005-08-31', 'L', 'DUSUN PARIGI', 'DUSUN PARIGI', 'WAHAI', 'SERAM UTARA', 'MALUKU TENGAH', 'MALUKU', 'INDONESIA', '002', '000', 'Islam', 'SMA', 'PELAJAR', 'Belum Menikah', '2024-08-05 05:02:58', '2024-08-05 05:02:58'),
(23, '8101065606110002', 'WA ASIFA WALLY', 'DUSUN PARIGI', '2011-06-16', 'P', 'DUSUN PARIGI', 'DUSUN PARIGI', 'WAHAI', 'SERAM UTARA', 'MALUKU TENGAH', 'MALUKU', 'INDONESIA', '002', '000', 'Islam', 'SD', 'PELAJAR', 'Belum Menikah', '2024-08-05 05:04:40', '2024-08-05 05:04:40'),
(24, '8101066211170001', 'RAISA WALLY', 'DUSUN PARIGI', '2017-11-22', 'P', 'DUSUN PARIGI', 'DUSUN PARIGI', 'WAHAI', 'SERAM UTARA', 'MALUKU TENGAH', 'MALUKU', 'INDONESIA', '002', '000', 'Islam', 'Tidak Sekolah', 'BELUM BEKERJA', 'Belum Menikah', '2024-08-05 05:07:16', '2024-08-05 05:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `warga_kartu_keluarga`
--

CREATE TABLE `warga_kartu_keluarga` (
  `warga_has_kk` int(111) NOT NULL,
  `id` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warga_kartu_keluarga`
--

INSERT INTO `warga_kartu_keluarga` (`warga_has_kk`, `id`, `id_kk`) VALUES
(26, 16, 4),
(27, 17, 4),
(29, 20, 5),
(30, 19, 6),
(31, 21, 6),
(32, 22, 6),
(33, 23, 6),
(34, 24, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`id_kk`),
  ADD KEY `id_kepala_kk` (`id_kepala_kk`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `warga_kartu_keluarga`
--
ALTER TABLE `warga_kartu_keluarga`
  ADD PRIMARY KEY (`warga_has_kk`),
  ADD KEY `id` (`id`),
  ADD KEY `id_kk` (`id_kk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `warga_kartu_keluarga`
--
ALTER TABLE `warga_kartu_keluarga`
  MODIFY `warga_has_kk` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD CONSTRAINT `kartu_keluarga_ibfk_1` FOREIGN KEY (`id_kepala_kk`) REFERENCES `warga` (`id`);

--
-- Constraints for table `warga_kartu_keluarga`
--
ALTER TABLE `warga_kartu_keluarga`
  ADD CONSTRAINT `warga_kartu_keluarga_ibfk_1` FOREIGN KEY (`id`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `warga_kartu_keluarga_ibfk_2` FOREIGN KEY (`id_kk`) REFERENCES `kartu_keluarga` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
