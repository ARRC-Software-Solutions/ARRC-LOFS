-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 01:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lafts`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_claimant`
--

CREATE TABLE `tb_claimant` (
  `Claimant_ID` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_item`
--

CREATE TABLE `tb_item` (
  `item_ID` int(11) NOT NULL,
  `item_Type` varchar(100) NOT NULL,
  `item_room_no` varchar(100) NOT NULL,
  `item_desc` varchar(100) NOT NULL,
  `item_dateFound` date NOT NULL,
  `item_dateClaimed` date NOT NULL,
  `item_timeClaimed` date NOT NULL,
  `item_security` varchar(100) NOT NULL,
  `item_semester` int(11) NOT NULL,
  `claimant_ID` int(11) NOT NULL,
  `item_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_security`
--

CREATE TABLE `tb_security` (
  `security_ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_security`
--

INSERT INTO `tb_security` (`security_ID`, `Username`, `first_name`, `last_name`, `password`) VALUES
(0, 'test', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6'),
(2018170411, 'SG-Kyrilios', 'Cyril ', 'Amoronio', '7200629b94bf95ef6e87140b8c2b5a8b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_claimant`
--
ALTER TABLE `tb_claimant`
  ADD PRIMARY KEY (`Claimant_ID`);

--
-- Indexes for table `tb_item`
--
ALTER TABLE `tb_item`
  ADD PRIMARY KEY (`item_ID`);

--
-- Indexes for table `tb_security`
--
ALTER TABLE `tb_security`
  ADD PRIMARY KEY (`security_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
