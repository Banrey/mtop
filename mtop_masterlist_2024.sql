-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 08:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtop`
--

-- --------------------------------------------------------

--
-- Table structure for table `mtop_masterlist_2024`
--

CREATE TABLE `mtop_masterlist_2024` (
  `BODY NUMBER` varchar(8) NOT NULL,
  `NAMES` varchar(37) DEFAULT NULL,
  `ROUTE` varchar(25) DEFAULT NULL,
  `DATE OF EXPIRY` varchar(18) DEFAULT NULL,
  `RESOLUTION NO.` varchar(6) DEFAULT NULL,
  `DATE RECEIVED` varchar(18) DEFAULT NULL,
  `DATE RELEASED` varchar(18) DEFAULT NULL,
  `LATEST TRANSACTION` varchar(33) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mtop_masterlist_2024`
--

INSERT INTO `mtop_masterlist_2024` (`BODY NUMBER`, `NAMES`, `ROUTE`, `DATE OF EXPIRY`, `RESOLUTION NO.`, `DATE RECEIVED`, `DATE RELEASED`, `LATEST TRANSACTION`) VALUES
('0001-08', 'FLORES, AIREEN', 'SILAY CITY PROPER', 'March 16, 2024', '', '', '', 'RENEWAL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mtop_masterlist_2024`
--
ALTER TABLE `mtop_masterlist_2024`
  ADD PRIMARY KEY (`BODY NUMBER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
