-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 02:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tprajurit`
--

CREATE TABLE `tprajurit` (
  `id_mhs` int(12) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tprajurit`
--

INSERT INTO `tprajurit` (`id_mhs`, `nim`, `nama`, `alamat`, `prodi`) VALUES
(1, '1615061012', 'Jonathan Parhusip', 'Jl. Pramuka Gg. Randu Dermawan III', 'S1 - TI'),
(4, 'Bambang ba', '1782638126', 'Jl. darimana hayo', 'S1 - SI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tprajurit`
--
ALTER TABLE `tprajurit`
  ADD PRIMARY KEY (`id_mhs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tprajurit`
--
ALTER TABLE `tprajurit`
  MODIFY `id_mhs` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
