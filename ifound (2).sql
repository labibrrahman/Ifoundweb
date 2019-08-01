-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2019 at 01:48 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifound`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `p` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `deskripsi_barang`, `jenis_barang`, `foto`, `p`) VALUES
(1, 'Kartu tanda Mahasiswa', 'Kartu belajar mahasiswa Unikom Atas Nama Labib berwarna biru, dengan foto KTM yang sudah tidak jelas', 'Kartu Tanda Mahasisw', 'IMG_20190411_230111.jpg', '1'),
(2, 'Kartu Tanda Mahasiswa', 'Kartu tanda Mahasiswa An Labib', 'Kartu Tanda Mahasisw', 'IMG_20190411_2301111.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama_user`, `email`, `password`, `hak_akses`) VALUES
(1, 'ab', 'f@gmail.com', 'zxc', 'admin'),
(5, 'Labib', 'fadhlurrahmanlabib13@gmail.com', 'JackWolfskin', 'admin'),
(6, 'Rahadian', 'r@gmail.com', 'zxc', 'user'),
(7, 'rahadian', 'r@gmail.com', 'zxc', 'admin'),
(8, 'labib', 'fadhlurrahmanlabib13@gmail.com', 'zxc', 'user'),
(9, 'doni', 'doni@gmail.com', 'doni321', 'admin'),
(10, 'jajang', 'l@gmail.com', 'zxc', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `l_kehilangan`
--

CREATE TABLE `l_kehilangan` (
  `id_kehilang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_kehilangan` date NOT NULL,
  `lokasi_kehilangan` text NOT NULL,
  `p` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_kehilangan`
--

INSERT INTO `l_kehilangan` (`id_kehilang`, `id_user`, `id_barang`, `tgl_kehilangan`, `lokasi_kehilangan`, `p`) VALUES
(1, 9, 1, '2019-07-12', 'Sekitaran UNIKOM', '1');

-- --------------------------------------------------------

--
-- Table structure for table `l_menemukan`
--

CREATE TABLE `l_menemukan` (
  `id_menemukan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_menemukan` date NOT NULL,
  `lokasi_menemukan` text NOT NULL,
  `p` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_menemukan`
--

INSERT INTO `l_menemukan` (`id_menemukan`, `id_user`, `id_barang`, `tgl_menemukan`, `lokasi_menemukan`, `p`) VALUES
(1, 2, 2, '2019-07-12', 'Sekitaran Unikom', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_ambil`
--

CREATE TABLE `t_ambil` (
  `id_ambil` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `tgl_ambil` date NOT NULL,
  `p` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` char(1) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nik` int(20) NOT NULL,
  `p` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `tempat_lahir`, `tanggal_lahir`, `jk`, `alamat`, `no_telp`, `email`, `nik`, `p`) VALUES
(2, 'ab', 'Bandungl', '1998-07-13', 'L', 'asd', '1234567', 'f@gmail.com', 1111122222, '1'),
(9, 'doni', 'bandung', '1999-11-01', 'L', 'jl.jalan', '098765432123', 'doni@gmail.com', 123456789, '1'),
(10, 'jajang', 'a', '2019-07-12', 'P', 'a', '123', 'l@gmail.com', 123, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `nama_user` (`nama_user`);

--
-- Indexes for table `l_kehilangan`
--
ALTER TABLE `l_kehilangan`
  ADD PRIMARY KEY (`id_kehilang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `l_menemukan`
--
ALTER TABLE `l_menemukan`
  ADD PRIMARY KEY (`id_menemukan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `t_ambil`
--
ALTER TABLE `t_ambil`
  ADD PRIMARY KEY (`id_ambil`),
  ADD KEY `id_laporan` (`id_laporan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `login_ibfk_1` (`email`),
  ADD KEY `nama_ibfk_2` (`nama_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `l_kehilangan`
--
ALTER TABLE `l_kehilangan`
  MODIFY `id_kehilang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `l_menemukan`
--
ALTER TABLE `l_menemukan`
  MODIFY `id_menemukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_ambil`
--
ALTER TABLE `t_ambil`
  MODIFY `id_ambil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `l_kehilangan`
--
ALTER TABLE `l_kehilangan`
  ADD CONSTRAINT `l_kehilangan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `l_kehilangan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `l_menemukan`
--
ALTER TABLE `l_menemukan`
  ADD CONSTRAINT `l_menemukan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `l_menemukan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_ambil`
--
ALTER TABLE `t_ambil`
  ADD CONSTRAINT `l_ambil_ibfk_1` FOREIGN KEY (`id_laporan`) REFERENCES `l_kehilangan` (`id_kehilang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `l_ambil_ibfk_2` FOREIGN KEY (`id_laporan`) REFERENCES `l_menemukan` (`id_menemukan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`email`) REFERENCES `login` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nama_ibfk_2` FOREIGN KEY (`nama_user`) REFERENCES `login` (`nama_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
