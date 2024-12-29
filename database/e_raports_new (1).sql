-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2024 at 09:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_raports_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idguru` int NOT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `tmp_lhr` varchar(128) DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idguru`, `nip`, `nama`, `tmp_lhr`, `tgl_lhr`, `jk`, `alamat`) VALUES
(7, '92060112710970001', 'Eka Saputra, S.Pd.', 'Pati', '1984-07-26', 'L', 'Jl. Merdeka '),
(8, '92060112710970002', 'Bagus Prihandoko, S.Pd.', 'Pati', '1989-08-30', 'L', 'Jl. Penjawi'),
(9, '92060112710970003', 'Silvani Violita, S.Pd.', 'Pati', '1997-10-29', 'P', 'Jl. Ratu Kalinyamat'),
(10, '92060112710970004', 'Dwi Agus Salim, S.Pd.', 'Pati', '1998-01-07', 'L', 'Jl. Merdeka'),
(12, '92060112710970005', 'Zahra Amelia, S.Pd.', 'Pati', '1995-07-13', 'L', 'Jl. Kaliurang'),
(13, '92060112710970006', 'Putri Yulia Sari, S.Pd.', 'Pati', '1998-08-20', 'P', 'Jl. Kaliurang'),
(14, '92060112710970007', 'Hafidzah, S.Pd.', 'Pati', '1995-12-28', 'P', 'Jl. Pandawa'),
(15, '92060112710970008', 'Lina Noor Afifah, S.Pd.', 'Pati', '1999-06-24', 'P', 'Jl. Gunungsari'),
(16, '92060112710970009', 'Intan Erviatun, S.H.', 'Pati', '1999-06-16', 'P', 'Jl. Ratu Kalinyamat'),
(17, '92060112710970010', 'Reza Alfiana, S.E.', 'Pati', '1999-08-20', 'P', 'Jl. Ratu Kalinyamat'),
(18, '92060112710970011', 'Muhammad Adam, S.Kom.', 'Pati', '1998-11-04', 'L', 'Jl. Merdeka Barat'),
(19, '92060112710970012', 'Risa Yunianti, S.Pd.', 'Pati', '1998-07-23', 'P', 'Jl. Ratu Kalinyamat'),
(20, '92060112710970013', 'Nur Wahyudha, S.Pd.', 'Pati', '1999-12-02', 'L', 'Jl. Ratu Kalinyamat');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idkelas` int NOT NULL,
  `kelas_kd` varchar(10) DEFAULT NULL,
  `kelas_nama` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idkelas`, `kelas_kd`, `kelas_nama`) VALUES
(1, '1A', 'Kelas 1 '),
(2, '1B', 'Kelas 1 B'),
(9, '2', 'Kelas 2');

-- --------------------------------------------------------

--
-- Table structure for table `kitab`
--

CREATE TABLE `kitab` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_mapel` int NOT NULL,
  `id_tahun_akademik` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kitab`
--

INSERT INTO `kitab` (`id`, `name`, `id_mapel`, `id_tahun_akademik`) VALUES
(4, 'القرآن الكريم', 6, 9),
(5, 'ناهو سياراف', 13, 9),
(6, 'القرآن الكريم والتفسير', 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `idmapel` int NOT NULL,
  `mapel_kd` varchar(10) DEFAULT NULL,
  `mapel_nama` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`idmapel`, `mapel_kd`, `mapel_nama`) VALUES
(6, 'Al-Quran', 'Al-Quran'),
(7, 'tafsir ', 'Ilmu Al-Qur\'an dan Tafsir'),
(8, 'Hadits', 'Hadits dan Ilmu Hadits'),
(9, 'Tauhid', 'Tauhid'),
(10, 'akhlak', 'Adab dan Akhlak'),
(11, 'Fiqih', 'Fiqih'),
(12, 'Sejarah', 'Sejarah Islam'),
(13, 'Nahwu', 'Nahwu Shorof'),
(14, 'Ibadah', 'Ibadah'),
(15, 'Imlak', 'Imlak');

-- --------------------------------------------------------

--
-- Table structure for table `mengajar`
--

CREATE TABLE `mengajar` (
  `idmengajar` int NOT NULL,
  `idtahun_akademik` int NOT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL,
  `idguru` int NOT NULL,
  `idmapel` int NOT NULL,
  `idkelas` int NOT NULL,
  `kkm` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `mengajar`
--

INSERT INTO `mengajar` (`idmengajar`, `idtahun_akademik`, `semester`, `idguru`, `idmapel`, `idkelas`, `kkm`) VALUES
(18, 5, 'Ganjil', 7, 3, 1, 60),
(22, 5, 'Genap', 7, 1, 1, NULL),
(23, 5, 'Genap', 7, 1, 2, NULL),
(24, 5, 'Genap', 7, 3, 1, NULL),
(25, 5, 'Genap', 7, 3, 2, NULL),
(28, 5, 'Genap', 8, 2, 1, NULL),
(29, 5, 'Genap', 7, 2, 2, NULL),
(30, 5, 'Ganjil', 9, 2, 1, 65),
(31, 5, 'Ganjil', 10, 2, 2, 60),
(32, 5, 'Ganjil', 7, 1, 1, 60),
(33, 5, 'Ganjil', 7, 1, 2, 65),
(34, 5, 'Ganjil', 8, 3, 2, 0),
(41, 7, 'Ganjil', 7, 3, 1, 75),
(42, 7, 'Ganjil', 9, 2, 1, NULL),
(43, 7, 'Ganjil', 10, 2, 2, NULL),
(44, 7, 'Ganjil', 7, 1, 1, NULL),
(45, 7, 'Ganjil', 7, 1, 2, NULL),
(46, 7, 'Ganjil', 8, 3, 2, NULL),
(47, 9, 'Genap', 8, 6, 9, 66),
(48, 9, 'Genap', 9, 7, 9, 66),
(49, 9, 'Genap', 10, 8, 9, 60),
(50, 9, 'Genap', 13, 6, 1, NULL),
(51, 9, 'Genap', 7, 13, 9, 70),
(52, 9, 'Genap', 10, 9, 9, 70),
(53, 9, 'Genap', 14, 10, 9, 70),
(54, 9, 'Genap', 15, 11, 9, 70),
(55, 9, 'Genap', 16, 12, 9, 70),
(56, 9, 'Genap', 18, 14, 9, 70),
(57, 9, 'Genap', 18, 15, 9, 70);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `idnilai` int NOT NULL,
  `idtahun_akademik` int NOT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL,
  `idkelas` int NOT NULL,
  `idmapel` int NOT NULL,
  `idsiswa` int NOT NULL,
  `nilai_tp1` int DEFAULT NULL,
  `nilai_tp2` int DEFAULT NULL,
  `nilai_tp3` int DEFAULT NULL,
  `nilai_tp4` int DEFAULT NULL,
  `nilai_tp5` int DEFAULT NULL,
  `nilai_tp6` int DEFAULT NULL,
  `nilai_tp7` int DEFAULT NULL,
  `rata_tp` int DEFAULT NULL,
  `nilai_uh1` int DEFAULT NULL,
  `nilai_uh2` int DEFAULT NULL,
  `nilai_uh3` int DEFAULT NULL,
  `nilai_uh4` int DEFAULT NULL,
  `nilai_uh5` int DEFAULT NULL,
  `nilai_uh6` int DEFAULT NULL,
  `nilai_uh7` int DEFAULT NULL,
  `rata_uh` int DEFAULT NULL,
  `nilai_pts` int DEFAULT NULL,
  `nilai_uas` int DEFAULT NULL,
  `nilai_akhir` int DEFAULT NULL,
  `nilai_huruf` enum('A','B','C','D','E') DEFAULT NULL,
  `deskripsi` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`idnilai`, `idtahun_akademik`, `semester`, `idkelas`, `idmapel`, `idsiswa`, `nilai_tp1`, `nilai_tp2`, `nilai_tp3`, `nilai_tp4`, `nilai_tp5`, `nilai_tp6`, `nilai_tp7`, `rata_tp`, `nilai_uh1`, `nilai_uh2`, `nilai_uh3`, `nilai_uh4`, `nilai_uh5`, `nilai_uh6`, `nilai_uh7`, `rata_uh`, `nilai_pts`, `nilai_uas`, `nilai_akhir`, `nilai_huruf`, `deskripsi`) VALUES
(17, 5, 'Ganjil', 1, 3, 4, 12, 0, 0, 0, 0, 0, 0, 12, 34, 0, 0, 0, 0, 0, 0, 34, 56, 78, 45, 'D', 'Kurang Baik'),
(18, 5, 'Ganjil', 1, 3, 5, 23, 0, 0, 0, 0, 0, 0, 23, 45, 0, 0, 0, 0, 0, 0, 45, 67, 89, 56, 'D', 'Kurang Baik'),
(19, 5, 'Ganjil', 1, 3, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(20, 5, 'Ganjil', 1, 3, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(21, 5, 'Ganjil', 1, 3, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(22, 5, 'Ganjil', 1, 3, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(23, 5, 'Ganjil', 1, 3, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(24, 5, 'Ganjil', 1, 3, 16, 89, 21, 0, 0, 0, 0, 0, 55, 98, 89, 0, 0, 0, 0, 0, 94, 95, 95, 85, 'B', 'Baik'),
(25, 5, 'Ganjil', 2, 3, 9, 12, 11, 0, 0, 0, 0, 0, 12, 21, 90, 0, 0, 0, 0, 0, 56, 55, 55, 44, 'B', 'Baik'),
(26, 5, 'Ganjil', 2, 3, 10, 23, 21, 0, 0, 0, 0, 0, 22, 32, 89, 0, 0, 0, 0, 0, 61, 60, 60, 51, 'B', 'Baik'),
(27, 5, 'Ganjil', 2, 3, 11, 34, 32, 0, 0, 0, 0, 0, 33, 43, 78, 0, 0, 0, 0, 0, 61, 65, 65, 56, 'B', 'Baik'),
(28, 5, 'Ganjil', 2, 3, 12, 45, 43, 0, 0, 0, 0, 0, 44, 54, 67, 0, 0, 0, 0, 0, 61, 70, 70, 61, 'B', 'Baik'),
(29, 5, 'Ganjil', 2, 3, 13, 56, 54, 0, 0, 0, 0, 0, 55, 65, 56, 0, 0, 0, 0, 0, 61, 75, 75, 66, 'B', 'Baik'),
(30, 5, 'Ganjil', 2, 3, 17, 67, 65, 0, 0, 0, 0, 0, 66, 76, 45, 0, 0, 0, 0, 0, 61, 80, 80, 72, 'A', 'Sangat Baik'),
(31, 5, 'Ganjil', 2, 3, 18, 78, 76, 0, 0, 0, 0, 0, 77, 87, 34, 0, 0, 0, 0, 0, 61, 85, 85, 77, 'A', 'Sangat Baik'),
(32, 5, 'Ganjil', 2, 3, 19, 89, 87, 0, 0, 0, 0, 0, 88, 98, 23, 0, 0, 0, 0, 0, 61, 90, 90, 82, 'A', 'Sangat Baik'),
(33, 5, 'Ganjil', 2, 3, 20, 90, 98, 0, 0, 0, 0, 0, 94, 90, 12, 0, 0, 0, 0, 0, 51, 95, 95, 84, 'A', 'Sangat Baik'),
(34, 5, 'Ganjil', 1, 2, 4, 56, 78, 0, 0, 0, 0, 0, 67, 76, 77, 0, 0, 0, 0, 0, 77, 87, 89, 80, 'B', 'Baik'),
(35, 5, 'Ganjil', 1, 2, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(36, 5, 'Ganjil', 1, 2, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(37, 5, 'Ganjil', 1, 2, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(38, 5, 'Ganjil', 1, 2, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(39, 5, 'Ganjil', 1, 2, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(40, 5, 'Ganjil', 1, 2, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(41, 5, 'Ganjil', 1, 2, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(42, 5, 'Ganjil', 2, 1, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 5, 'Ganjil', 2, 1, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 5, 'Ganjil', 2, 1, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 5, 'Ganjil', 2, 1, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 5, 'Ganjil', 2, 1, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 5, 'Ganjil', 2, 1, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 5, 'Ganjil', 2, 1, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 5, 'Ganjil', 2, 1, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 5, 'Ganjil', 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 5, 'Ganjil', 2, 2, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 5, 'Ganjil', 2, 2, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 5, 'Ganjil', 2, 2, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 5, 'Ganjil', 2, 2, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 5, 'Ganjil', 2, 2, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 5, 'Ganjil', 2, 2, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 5, 'Ganjil', 2, 2, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 5, 'Ganjil', 1, 1, 4, 56, 78, 0, 0, 0, 0, 0, 67, 89, 87, 0, 0, 0, 0, 0, 88, 80, 86, 80, 'B', 'Baik'),
(68, 5, 'Ganjil', 1, 1, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(69, 5, 'Ganjil', 1, 1, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(70, 5, 'Ganjil', 1, 1, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(71, 5, 'Ganjil', 1, 1, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(72, 5, 'Ganjil', 1, 1, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(73, 5, 'Ganjil', 1, 1, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(74, 5, 'Ganjil', 1, 1, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(75, 7, 'Ganjil', 1, 3, 5, 80, 80, 81, 97, 75, 80, 80, 82, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(76, 7, 'Ganjil', 1, 3, 6, 80, 85, 75, 80, 75, 80, 89, 81, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(77, 7, 'Ganjil', 1, 3, 7, 85, 83, 89, 80, 89, 85, 80, 84, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(78, 7, 'Ganjil', 1, 3, 8, 80, 87, 80, 85, 89, 80, 81, 83, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(79, 7, 'Ganjil', 1, 3, 14, 80, 89, 80, 81, 80, 80, 89, 83, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(80, 7, 'Ganjil', 1, 3, 15, 80, 80, 75, 85, 80, 80, 80, 80, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(81, 7, 'Ganjil', 1, 3, 16, 75, 80, 85, 81, 80, 80, 80, 80, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(82, 9, 'Genap', 9, 6, 22, 70, 70, 80, 70, 70, 70, 80, 73, 70, 60, 70, 70, 70, 70, 80, 70, 70, 70, 70, 'C', 'Cukup Baik'),
(83, 9, 'Genap', 9, 6, 23, 70, 70, 70, 70, 70, 70, 60, 69, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 'C', 'Cukup Baik'),
(84, 9, 'Genap', 9, 13, 22, 80, 0, 0, 0, 0, 0, 0, 80, 80, 0, 0, 0, 0, 0, 0, 80, 80, 80, 80, 'B', 'Baik'),
(85, 9, 'Genap', 9, 13, 23, 80, 0, 0, 0, 0, 0, 0, 80, 80, 0, 0, 0, 0, 0, 0, 80, 80, 80, 80, 'B', 'Baik'),
(86, 9, 'Genap', 9, 7, 22, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 'B', 'Baik'),
(87, 9, 'Genap', 9, 7, 23, 100, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(88, 9, 'Genap', 9, 8, 22, 80, 0, 0, 0, 0, 0, 0, 80, 80, 0, 0, 0, 0, 0, 0, 80, 80, 80, 80, 'B', 'Baik'),
(89, 9, 'Genap', 9, 8, 23, 80, 0, 0, 0, 0, 0, 0, 80, 80, 0, 0, 0, 0, 0, 0, 80, 80, 80, 80, 'B', 'Baik'),
(90, 9, 'Genap', 9, 14, 22, 70, 0, 0, 0, 0, 0, 0, 70, 70, 0, 0, 0, 0, 0, 0, 70, 70, 70, 70, 'C', 'Cukup Baik'),
(91, 9, 'Genap', 9, 14, 23, 70, 0, 0, 0, 0, 0, 0, 70, 70, 0, 0, 0, 0, 0, 0, 70, 70, 70, 70, 'C', 'Cukup Baik'),
(92, 9, 'Genap', 9, 11, 22, 70, 0, 0, 0, 0, 0, 0, 70, 70, 0, 0, 0, 0, 0, 0, 70, 70, 70, 70, 'C', 'Cukup Baik'),
(93, 9, 'Genap', 9, 11, 23, 70, 0, 0, 0, 0, 0, 0, 70, 70, 0, 0, 0, 0, 0, 0, 70, 70, 70, 70, 'C', 'Cukup Baik'),
(94, 9, 'Genap', 9, 12, 22, 70, 0, 0, 0, 0, 0, 0, 70, 70, 0, 0, 0, 0, 0, 0, 70, 70, 70, 70, 'C', 'Cukup Baik'),
(95, 9, 'Genap', 9, 12, 23, 70, 0, 0, 0, 0, 0, 0, 70, 70, 0, 0, 0, 0, 0, 0, 70, 70, 70, 70, 'C', 'Cukup Baik'),
(96, 9, 'Genap', 9, 15, 22, 70, 0, 0, 0, 0, 0, 0, 70, 70, 0, 0, 0, 0, 0, 0, 70, 70, 70, 70, 'C', 'Cukup Baik'),
(97, 9, 'Genap', 9, 15, 23, 70, 0, 0, 0, 0, 0, 0, 70, 70, 0, 0, 0, 0, 0, 0, 70, 70, 70, 70, 'C', 'Cukup Baik'),
(98, 9, 'Genap', 9, 9, 22, 70, 0, 0, 0, 0, 0, 0, 70, 70, 0, 0, 0, 0, 0, 0, 70, 70, 70, 70, 'C', 'Cukup Baik'),
(99, 9, 'Genap', 9, 9, 23, 70, 0, 0, 0, 0, 0, 0, 70, 70, 0, 0, 0, 0, 0, 0, 70, 70, 70, 70, 'C', 'Cukup Baik'),
(100, 9, 'Genap', 9, 10, 22, 70, 0, 0, 0, 0, 0, 0, 70, 70, 0, 0, 0, 0, 0, 0, 70, 70, 70, 70, 'C', 'Cukup Baik'),
(101, 9, 'Genap', 9, 10, 23, 73, 0, 0, 0, 0, 0, 0, 73, 69, 0, 0, 0, 0, 0, 0, 69, 70, 83, 74, 'C', 'Cukup Baik');

-- --------------------------------------------------------

--
-- Table structure for table `profil_sekolah`
--

CREATE TABLE `profil_sekolah` (
  `idprofil_sekolah` int NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `npsn` varchar(10) DEFAULT NULL,
  `status` enum('Negeri','Swasta') DEFAULT NULL,
  `nama_kepsek` varchar(128) DEFAULT NULL,
  `nip_kepsek` varchar(25) DEFAULT NULL,
  `akreditasi` enum('kosong','A','B','C') DEFAULT NULL,
  `logo` varchar(128) DEFAULT NULL,
  `provinsi` varchar(128) DEFAULT NULL,
  `kabupaten` varchar(128) DEFAULT NULL,
  `kecamatan` varchar(128) DEFAULT NULL,
  `kelurahan` varchar(128) DEFAULT NULL,
  `dusun` varchar(128) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `alamat` varchar(256) DEFAULT NULL,
  `kodepos` varchar(10) DEFAULT NULL,
  `lintang` varchar(15) DEFAULT NULL,
  `bujur` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `profil_sekolah`
--

INSERT INTO `profil_sekolah` (`idprofil_sekolah`, `nama`, `npsn`, `status`, `nama_kepsek`, `nip_kepsek`, `akreditasi`, `logo`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `dusun`, `rt`, `rw`, `alamat`, `kodepos`, `lintang`, `bujur`) VALUES
(1, 'YAYASAN YANURIS SRIMAJU', '60401524', 'Swasta', 'Muhammad Amiruddin, S.Ag', '-', 'A', 'logo-sekolah.png', 'Sumatera Selatan', 'Musi Banyuasin', 'Kec. Bayung Lencir', 'Bayung Lencir', '', '', '', 'Jl. Palembang - Jambi', '30578', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `idrombel` int NOT NULL,
  `idwali_kelas` int NOT NULL,
  `idsiswa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`idrombel`, `idwali_kelas`, `idsiswa`) VALUES
(1, 1, 4),
(2, 1, 5),
(19, 5, 5),
(3, 1, 6),
(20, 5, 6),
(4, 1, 7),
(21, 5, 7),
(5, 1, 8),
(22, 5, 8),
(6, 2, 9),
(26, 6, 9),
(7, 2, 10),
(27, 6, 10),
(8, 2, 11),
(28, 6, 11),
(9, 2, 12),
(29, 6, 12),
(10, 2, 13),
(30, 6, 13),
(11, 1, 14),
(23, 5, 14),
(12, 1, 15),
(24, 5, 15),
(13, 1, 16),
(25, 5, 16),
(14, 2, 17),
(31, 6, 17),
(15, 2, 18),
(32, 6, 18),
(16, 2, 19),
(33, 6, 19),
(17, 2, 20),
(58, 7, 22),
(59, 7, 23);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int NOT NULL,
  `foto` varchar(128) DEFAULT NULL,
  `nis` varchar(5) DEFAULT NULL,
  `nisn` varchar(15) DEFAULT NULL,
  `nik` varchar(25) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `tmp_lhr` varchar(128) DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `hobi` varchar(128) DEFAULT NULL,
  `citacita` varchar(128) DEFAULT NULL,
  `sts_anak` enum('Anak Kandung','Anak Tiri','Anak Angkat') DEFAULT NULL,
  `jml_sdr` int DEFAULT NULL,
  `anak_ke` int DEFAULT NULL,
  `alamat` text,
  `nik_ayah` varchar(25) DEFAULT NULL,
  `nama_ayah` varchar(128) DEFAULT NULL,
  `pend_ayah` varchar(50) DEFAULT NULL,
  `pekr_ayah` varchar(50) DEFAULT NULL,
  `nik_ibu` varchar(25) DEFAULT NULL,
  `nama_ibu` varchar(128) DEFAULT NULL,
  `pend_ibu` varchar(50) DEFAULT NULL,
  `pekr_ibu` varchar(50) DEFAULT NULL,
  `alamat_ortu` text,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `status` enum('Aktif','Nonaktif','Pindah','Keluar','Alumni') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `foto`, `nis`, `nisn`, `nik`, `nama`, `tmp_lhr`, `tgl_lhr`, `jk`, `hobi`, `citacita`, `sts_anak`, `jml_sdr`, `anak_ke`, `alamat`, `nik_ayah`, `nama_ayah`, `pend_ayah`, `pekr_ayah`, `nik_ibu`, `nama_ibu`, `pend_ibu`, `pekr_ibu`, `alamat_ortu`, `tgl_masuk`, `tgl_keluar`, `status`) VALUES
(22, 'siswa-22.jpeg', '1234', '9206011271', '1509070307010003', 'Prasetyo Adi Wibowo', 'Rimbo Bujang', '2024-12-08', 'L', '', '', NULL, 0, 0, 'ads', '', '', NULL, '', '', '', NULL, '', '', '2024-12-24', NULL, 'Aktif'),
(23, 'siswa-23.jpeg', '44444', '222222', '', 'zaki', 'Rimbo Bujang', '2024-11-25', 'L', '', '', NULL, 0, 0, 'd', '', '', NULL, '', '', '', NULL, '', '', '2024-12-24', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `idtahun_akademik` int NOT NULL,
  `tahun_akademik` varchar(10) DEFAULT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL,
  `semester_aktif` tinyint DEFAULT NULL,
  `tempat` varchar(128) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`idtahun_akademik`, `tahun_akademik`, `semester`, `semester_aktif`, `tempat`, `tanggal`) VALUES
(5, '2018-2019', 'Ganjil', 0, 'Manokwari', '2020-04-02'),
(7, '2019-2020', 'Ganjil', 0, '', '2020-04-02'),
(8, '2022-2023', 'Genap', 0, NULL, '2022-08-20'),
(9, '2024-2025', 'Genap', 1, 'Bayung Lencir', '2024-12-24'),
(10, '2017-2018', 'Ganjil', 0, NULL, '2024-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int NOT NULL,
  `user_name` varchar(25) DEFAULT NULL,
  `user_password` varchar(128) DEFAULT NULL,
  `user_fullname` varchar(128) DEFAULT NULL,
  `user_type` enum('super_user','guru','siswa') DEFAULT NULL,
  `is_block` tinyint(1) DEFAULT NULL,
  `create_at` int DEFAULT NULL,
  `update_at` int DEFAULT NULL,
  `create_by` int DEFAULT NULL,
  `update_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `user_name`, `user_password`, `user_fullname`, `user_type`, `is_block`, `create_at`, `update_at`, `create_by`, `update_by`) VALUES
(1, 'admin', '$2y$10$ePYvbmZHzPxjanA.aCprMO9p0Z7Q9JgzlzyCevd7Jqf.Wb2huO8t.', 'Madin Nurul Islam', 'super_user', 0, 1556509343, 1586934959, 1, 1),
(18, 'guru', '$2y$10$k6jo/S9Bme1fUCLFMrzWvOGdKpz5N5e96LaAMBuzAx/4NwCFjyjZK', 'guru', 'guru', 0, 1586150893, 1660960218, 1, 1),
(29, 'guru1', '$2y$10$hTwF1b8UKv66utTJfA9t8O92VJFqp/1nUhWuS37TUCVEvR8Opa2Zi', 'guru1', 'guru', 0, 1586151104, NULL, 1, NULL),
(30, 'guru2', '$2y$10$e79TkCEI2gBpSzb06eaGIOE4UDQXPUzU0944QdSBp/Ir1rYzT/qWa', 'guru2', 'guru', 0, 1586151104, NULL, 1, NULL),
(31, 'guru3', '$2y$10$K7wLEa5sjGF.DpvNL1pkPek3Fc5iGzNzLiogwW.4LDt/8IfUr9fe.', 'guru3', 'guru', 0, 1586151104, NULL, 1, NULL),
(32, 'guru4', '$2y$10$3v47kVI.v0DDxM.lkDV.ruFB5RKrCOCAxcrQNomvOCkJwJVj77WPa', 'guru4', 'guru', 0, 1586151104, NULL, 1, NULL),
(33, 'siswa', '$2y$10$CXBNfEgUwvQjtdtF3uPWxu84wz1dzsUk9cA.ZWPEu3MhUU6NJHIPi', 'Siswa', 'siswa', 0, 1586151396, 1660960885, 1, 1),
(38, '92060112710970006', '$2y$10$eFStSKpabDiXeVNwSGElt.G32otg/iIBMyoJkXX9fJ/D.y.BKYgqi', 'Putri Yulia Sari, S.Pd.', 'guru', 0, 1660958133, NULL, 1, NULL),
(39, '92060112710970007', '$2y$10$05YwUdblVOyPLwgYAX6MWuOUt/gGRgNbmwtj9XaCvhtbhYOZzQ6L6', 'Hafidzah, S.Pd.', 'guru', 0, 1660958386, NULL, 1, NULL),
(40, '92060112710970008', '$2y$10$GmFfKNLJHhzuJ2K6wSTbiufeEGKFYGfFx7wFJffErUDgiCLQlR1Zi', 'Lina Noor Afifah, S.Pd.', 'guru', 0, 1660958389, NULL, 1, NULL),
(41, '92060112710970009', '$2y$10$xiXV5IHUCtUbGdnF4v7D8OQCszRwqWgmwmB2e/gJQ9eG6uTti5s9y', 'Intan Erviatun, S.H.', 'guru', 0, 1660958457, NULL, 1, NULL),
(42, '92060112710970010', '$2y$10$Grp6TvB.FEuz/PAc06A/be93oc7H9cz.i.lQGQyDwW2uTIvRatJH.', 'Reza Alfiana, S.E.', 'guru', 0, 1660958521, NULL, 1, NULL),
(43, '92060112710970011', '$2y$10$Sbc7XroehO6UfiLV35BRfOj1dL3FTKlHFUfXDEsCXaWzCXOpWafGi', 'Muhammad Adam, S.Kom.', 'guru', 0, 1660958754, NULL, 1, NULL),
(44, '92060112710970012', '$2y$10$EVzphBpmeOiaxjKBPg4h6OwU/2vLQ8fYQ0.Xm3qtzTG/oIgVzNksG', 'Risa Yunianti, S.Pd.', 'guru', 0, 1660958759, NULL, 1, NULL),
(45, '92060112710970013', '$2y$10$PZqbkLBFKGpn5bPR8kOYYuWGPaT7rEvRyd7LZaSc/DRR/dxX0jO6O', 'Nur Wahyudha, S.Pd.', 'guru', 0, 1660958760, NULL, 1, NULL),
(46, '92060112710970001', '$2y$10$0wgO41WCumbzibUlTUys.eIq7WpDlFVFh8a1VYSdrW9RGRElAPJyy', 'Eka Saputra, S.Pd.', 'guru', 0, 1660961250, NULL, 1, NULL),
(47, '92060112710970002', '$2y$10$5DJBQXxqSac43DpgWf2Gg.7NSko7vNp2Es3DwN7yrLIzlrSznn9UC', 'Bagus Prihandoko, S.Pd.', 'guru', 0, 1660961251, NULL, 1, NULL),
(48, '92060112710970004', '$2y$10$cHjGcQQfuzJg/Cj3y0ag3ugP/J5srCVJ140XVXFtgWBb5ueLRxxyi', 'Dwi Agus Salim, S.Pd.', 'guru', 0, 1660961253, NULL, 1, NULL),
(49, '92060112710970003', '$2y$10$2gVdYiBLig7a3p19cpVUm.UC3ddUo7OPpzfr489OeuQ8zxslINsPi', 'Silvani Violita, S.Pd.', 'guru', 0, 1660961255, NULL, 1, NULL),
(50, '92060112710970005', '$2y$10$KuEW62nWA5WHQPHwJyvvkOcl7KTZMwpslzr6hVQx3Se32nAKB5UXi', 'Zahra Amelia, S.Pd.', 'guru', 0, 1660961257, NULL, 1, NULL),
(51, '1234', '$2y$10$UyBKCEhTZQbwhlCYTbx4YOG4KxjL882Ci7/yjIFMUgeZCv1WQPIa2', 'Eka Saputra', 'siswa', 0, 1660961278, NULL, 1, NULL),
(52, '1235', '$2y$10$xDT.YbBSEXgUTbLGphCpyOaZ7oUwBnPQ82cQ6Hz/jDk3eXWqaYZgC', 'Bagus Saputra', 'siswa', 0, 1660961278, NULL, 1, NULL),
(53, '1236', '$2y$10$b.syT/0bYZF/A.D4/P6e4uFf2a.7b6b38AAbWw/xEeHT87Jf0aBRW', 'Ahmad Saputra', 'siswa', 0, 1660961278, NULL, 1, NULL),
(54, '1237', '$2y$10$iJ0JJWiOe.IsbXTmM9Ua7O916qd8MOvt367CSP9dNcrYmaebtAhAi', 'Mega Purnama', 'siswa', 0, 1660961278, NULL, 1, NULL),
(55, '1238', '$2y$10$tiLH91WKkJuvrRFUF2680.yhiq88905vkToqKLvfIgM7sD5nvturO', 'Mualifatul Ulya', 'siswa', 0, 1660961278, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `idwali_kelas` int NOT NULL,
  `idtahun_akademik` int NOT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL,
  `idkelas` int NOT NULL,
  `idguru` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`idwali_kelas`, `idtahun_akademik`, `semester`, `idkelas`, `idguru`) VALUES
(1, 5, 'Ganjil', 1, 7),
(2, 5, 'Ganjil', 2, 7),
(5, 7, 'Ganjil', 1, 7),
(6, 7, 'Ganjil', 2, 7),
(7, 9, 'Genap', 9, 7),
(8, 9, 'Genap', 1, 8),
(9, 9, 'Genap', 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `_sessions`
--

CREATE TABLE `_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `_sessions`
--

INSERT INTO `_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0f1vrp48bu2dute6q7d3t06nalat77nl', '::1', 1735462712, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353436323435343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b6163636573737c733a31303a2273757065725f75736572223b737563636573737c733a32343a224e696c616920626572686173696c2064692073696d70616e223b5f5f63695f766172737c613a323a7b733a373a2273756363657373223b733a333a226f6c64223b733a353a226572726f72223b733a333a226f6c64223b7d6572726f727c733a32333a22546572646170617420646174612079616e672073616d61223b),
('1s7ndg58ttpv401fsgj57ahtpmu2e6h5', '::1', 1735100472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353130303432393b),
('64583ucfqk0gnfks83f1llha8q5rg75h', '::1', 1735316548, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353331363533323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b6163636573737c733a31303a2273757065725f75736572223b737563636573737c733a32303a2254616d626168206261727520626572686173696c223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('7n7ipd07egad7735amfml3g3qorld7ta', '::1', 1735142525, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353134323433383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b6163636573737c733a31303a2273757065725f75736572223b737563636573737c733a32343a224e696c616920626572686173696c2064692073696d70616e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('88ff4iuk8k4ige8rc1fc4c7cf696fn0m', '::1', 1735102312, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353130323133303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b6163636573737c733a31303a2273757065725f75736572223b),
('93f7g741gpd7rd91u15t2rkh7prv168n', '127.0.0.1', 1735443734, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353434333530373b6d73677c733a3139343a223c64697620636c6173733d22616c65727420616c6572742d64616e67657220616c6572742d6469736d69737369626c65223e3c627574746f6e20747970653d22627574746f6e2220636c6173733d22636c6f73652220646174612d6469736d6973733d22616c6572742220617269612d68696464656e3d2274727565223e2674696d65733b3c2f627574746f6e3e3c6920636c6173733d2266612066612d62616e223e3c2f693e2050617373776f726420616e64612073616c61682e3c2f6469763e223b5f5f63695f766172737c613a313a7b733a333a226d7367223b733a333a226f6c64223b7d69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b6163636573737c733a31303a2273757065725f75736572223b),
('ab7dokc314fsgptptieip0g7jck7mbgk', '::1', 1735100867, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353130303832343b),
('ba2ojvgjff9ljhnsqj3017no4kku1gqj', '::1', 1735400539, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353430303237313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b6163636573737c733a31303a2273757065725f75736572223b),
('bg4ts1ct86qbcte40f7b92cvnkbp3au2', '::1', 1735219480, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353231393436383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b6163636573737c733a31303a2273757065725f75736572223b),
('dcnn06egn7p68u6pdqsms10c6g74tv9t', '::1', 1735303624, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353330333435343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b6163636573737c733a31303a2273757065725f75736572223b),
('dl3p6pnu2jikf6of7sr8p75d79ccgr99', '::1', 1735055826, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353035353734303b69647c733a323a223436223b757365726e616d657c733a31373a223932303630313132373130393730303031223b6163636573737c733a343a2267757275223b737563636573737c733a32323a224b4b4d20626572686173696c2064692073696d70616e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('doj1smr3uls01v6bo4sf58erhq4sri6a', '::1', 1735055842, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353035353631303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b6163636573737c733a31303a2273757065725f75736572223b),
('e12v15ui20jqqpe5c0oijsq8ujce4m8b', '::1', 1735099562, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353039393531383b),
('f534ojvdqf0f8ovt0ldbk1isng64nvmr', '::1', 1735098866, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353039383832333b),
('i5hhhkq8fpki2om2c12dsbaibi875t4r', '::1', 1735098134, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353039383032323b),
('ld22f6ob7fn32rv7e3g7q1uerb07i3rh', '::1', 1735221506, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353232313231313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b6163636573737c733a31303a2273757065725f75736572223b),
('le4n3kj4kngsvauri7kjvn4koa3ckmje', '::1', 1735014866, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353031343536393b),
('n8av9pph92r4mngigho5v16glc3853jf', '::1', 1735101505, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353130313234353b),
('tcqh6fc945pe1hnlnpmtnq6cncrr1meq', '::1', 1735215107, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733353231353036323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b6163636573737c733a31303a2273757065725f75736572223b);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idguru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indexes for table `kitab`
--
ALTER TABLE `kitab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_tahun_akademik` (`id_tahun_akademik`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`idmapel`);

--
-- Indexes for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`idmengajar`,`idtahun_akademik`,`idguru`,`idmapel`,`idkelas`),
  ADD KEY `fk_guru_has_mapel_mapel1_idx` (`idmapel`),
  ADD KEY `fk_guru_has_mapel_guru1_idx` (`idguru`),
  ADD KEY `fk_mengajar_tahun_akademik1_idx` (`idtahun_akademik`),
  ADD KEY `fk_mengajar_kelas1_idx` (`idkelas`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`idnilai`,`idtahun_akademik`,`idkelas`,`idmapel`,`idsiswa`),
  ADD KEY `fk_mapel_has_siswa_siswa1_idx` (`idsiswa`),
  ADD KEY `fk_mapel_has_siswa_mapel1_idx` (`idmapel`),
  ADD KEY `fk_nilai_tahun_akademik1_idx` (`idtahun_akademik`),
  ADD KEY `fk_nilai_kelas1_idx` (`idkelas`);

--
-- Indexes for table `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  ADD PRIMARY KEY (`idprofil_sekolah`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`idrombel`,`idwali_kelas`,`idsiswa`),
  ADD KEY `fk_rombel_siswa1_idx` (`idsiswa`),
  ADD KEY `fk_rombel_wali_kelas1_idx` (`idwali_kelas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`idtahun_akademik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`idwali_kelas`,`idtahun_akademik`,`idkelas`,`idguru`),
  ADD KEY `fk_rombel_has_guru_guru1_idx` (`idguru`),
  ADD KEY `fk_wali_kelas_kelas1_idx` (`idkelas`),
  ADD KEY `fk_tahun_akademik_tahun_akademik1_idx` (`idtahun_akademik`);

--
-- Indexes for table `_sessions`
--
ALTER TABLE `_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_TIMESTAMP` (`timestamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idguru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kitab`
--
ALTER TABLE `kitab`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `idmapel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `idmengajar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `idnilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  MODIFY `idprofil_sekolah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `idrombel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `idtahun_akademik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `idwali_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kitab`
--
ALTER TABLE `kitab`
  ADD CONSTRAINT `kitab_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`idmapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kitab_ibfk_2` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`idtahun_akademik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD CONSTRAINT `fk_guru_has_mapel_guru1` FOREIGN KEY (`idguru`) REFERENCES `guru` (`idguru`),
  ADD CONSTRAINT `fk_guru_has_mapel_mapel1` FOREIGN KEY (`idmapel`) REFERENCES `mapel` (`idmapel`),
  ADD CONSTRAINT `fk_mengajar_kelas1` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`idkelas`),
  ADD CONSTRAINT `fk_mengajar_tahun_akademik1` FOREIGN KEY (`idtahun_akademik`) REFERENCES `tahun_akademik` (`idtahun_akademik`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_mapel_has_siswa_mapel1` FOREIGN KEY (`idmapel`) REFERENCES `mapel` (`idmapel`),
  ADD CONSTRAINT `fk_mapel_has_siswa_siswa1` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`),
  ADD CONSTRAINT `fk_nilai_kelas1` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`idkelas`),
  ADD CONSTRAINT `fk_nilai_tahun_akademik1` FOREIGN KEY (`idtahun_akademik`) REFERENCES `tahun_akademik` (`idtahun_akademik`);

--
-- Constraints for table `rombel`
--
ALTER TABLE `rombel`
  ADD CONSTRAINT `fk_rombel_siswa1` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`),
  ADD CONSTRAINT `fk_rombel_wali_kelas1` FOREIGN KEY (`idwali_kelas`) REFERENCES `wali_kelas` (`idwali_kelas`);

--
-- Constraints for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `fk_rombel_has_guru_guru1` FOREIGN KEY (`idguru`) REFERENCES `guru` (`idguru`),
  ADD CONSTRAINT `fk_tahun_akademik_tahun_akademik1` FOREIGN KEY (`idtahun_akademik`) REFERENCES `tahun_akademik` (`idtahun_akademik`),
  ADD CONSTRAINT `fk_wali_kelas_kelas1` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`idkelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
