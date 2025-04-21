-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 08:07 AM
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
-- Table structure for table `individual_transaction`
--

CREATE TABLE `individual_transaction` (
  `body_number` varchar(8) NOT NULL,
  `name` varchar(37) DEFAULT NULL,
  `make` varchar(13) DEFAULT NULL,
  `motor_number` varchar(19) DEFAULT NULL,
  `chasis_number` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `individual_transaction`
--

INSERT INTO `individual_transaction` (`body_number`, `name`, `make`, `motor_number`, `chasis_number`) VALUES
('0001-08', 'FLORES, AIREEN', 'KAWASAKI', 'BC175AEB53070', 'BC175H-B64305');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `individual_transaction`
--
ALTER TABLE `individual_transaction`
  ADD PRIMARY KEY (`body_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
