-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2021 at 09:37 AM
-- Server version: 8.0.25-0ubuntu0.20.10.1
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int NOT NULL,
  `nm_admin` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nm_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'salman', 'salman', 'salman');

-- --------------------------------------------------------

--
-- Table structure for table `tbanggota`
--

CREATE TABLE `tbanggota` (
  `idanggota` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbanggota`
--

INSERT INTO `tbanggota` (`idanggota`, `nama`, `jeniskelamin`, `alamat`, `status`, `foto`) VALUES
('A1x', 'risa', 'Wanita', 'alamat risa', 'Tidak Meminjam', 'A1x.jpg'),
('AG001', 'edit Abdul', 'Pria', 'fredrere', 'Tidak Meminjam', '432432.jpg'),
('AG002', 'salman', 'Pria', 'aa', 'Sedang Meminjam', 'A1.png'),
('AG003', 'Rudi Hartono', 'Pria', 'Jl.Manggis 98', 'Sedang Meminjam', NULL),
('AG004', 'Dino Riano', 'Pria', 'Jl.Melon No 33', 'Tidak Meminjam', NULL),
('AG005', 'Agus Wardoyo', 'Pria', 'Jl.Cempedak No 88', 'Tidak Meminjam', NULL),
('AG006', 'Shinta Riani', 'Wanita', 'JL.Jeruk No 1', 'Sedang Meminjam', NULL),
('AG007', 'Irwan Hakim', 'Pria', 'Jl.Salak No 34', 'Tidak Meminjam', NULL),
('AG008', 'Indah Dian', 'Wanita', 'Jl.Semangka No 23', 'Tidak Meminjam', NULL),
('AG009', 'Rina Auliah', 'Wanita', 'Jl.Merpati No 44', 'Tidak Meminjam', NULL),
('AG010', 'Septi Putri', 'Wanita', 'Jl.Beringin No 2', 'Tidak Meminjam', NULL),
('ww', 'ww', 'Pria', 'www', 'Tidak Meminjam', 'ww.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbbuku`
--

CREATE TABLE `tbbuku` (
  `idbuku` varchar(5) NOT NULL,
  `judulbuku` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pengarang` varchar(40) NOT NULL,
  `penerbit` varchar(40) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbuku`
--

INSERT INTO `tbbuku` (`idbuku`, `judulbuku`, `kategori`, `pengarang`, `penerbit`, `status`) VALUES
('BK001', 'Belajar PHP', 'Ilmu Komputer', 'Candra', 'Media Baca', 'Tersedia'),
('BK002', 'Belajar HTML', 'Ilmu Komputer', 'Rahmat Hakim', 'Media Baca', 'Tersedia'),
('BK003', 'Kumpulan Puisi', 'Karya Sastra', 'Bejo', 'Media Kita', 'Dipinjam'),
('BK004', 'Sejarah Islam', 'Ilmu Agama', 'Sutejo', 'Media Kita', 'Dipinjam'),
('BK005', 'Pintar CSS', 'Ilmu Komputer', 'Anton', 'Graha Buku', 'Dipinjam'),
('BK006', 'Kumpulan Cerpen', 'Karya Sastra', 'Rudi', 'Media Aksara', 'Tersedia'),
('BK007', 'Keamanan Data', 'Ilmu Komputer', 'Nusron', 'Media Cipta', 'Tersedia'),
('BK008', 'Dasar-Dasar Database', 'Ilmu Komputer', 'Andi', 'Graha Media', 'Tersedia'),
('BK009', 'Kumpulan Cerpen 2', 'Karya Sastra', 'Sutejo', 'Media Cipta', 'Tersedia'),
('BK010', 'Peradaban Islam', 'Ilmu Agama', 'Aminnudin', 'Media Baca', 'Tersedia'),
('BK011', 'Kumpulan Cerpen 3', 'Karya Sastra', 'Rudi', 'Media Baca', 'Tersedia'),
('BK012', 'Teknologi Informasi', 'Ilmu Komputer', 'Andi A', 'Media Baca', 'Dipinjam'),
('BK013', 'Dermaga Biru', 'Karya Sastra', 'Sutejo', 'Media Cipta', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `idtransaksi` varchar(5) NOT NULL,
  `idanggota` varchar(5) NOT NULL,
  `idbuku` varchar(5) NOT NULL,
  `tglpinjam` date NOT NULL,
  `tglkembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtransaksi`
--

INSERT INTO `tbtransaksi` (`idtransaksi`, `idanggota`, `idbuku`, `tglpinjam`, `tglkembali`) VALUES
('TR002', 'A1x', 'BK009', '2016-11-04', '2021-11-03'),
('TR003', 'AG001', 'BK001', '2016-11-04', '2021-02-23'),
('TR004', 'AG003', 'BK003', '2016-11-04', '1970-01-01'),
('TR005', 'AG006', 'BK004', '2016-11-04', '1970-01-01'),
('TR006', 'AG002', 'BK005', '2016-11-05', '1970-01-01'),
('TR007', 'AG008', 'BK013', '2016-11-05', '2021-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `iduser` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `password` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `nama`, `alamat`, `password`) VALUES
('US001', 'Andi Rahman Hakim', 'Jl.Pramuka No 9', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`idanggota`);

--
-- Indexes for table `tbbuku`
--
ALTER TABLE `tbbuku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
