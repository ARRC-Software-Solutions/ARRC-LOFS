-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 04:33 PM
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
  `item_place` varchar(100) NOT NULL,
  `item_desc` varchar(100) NOT NULL,
  `item_dateFound` date NOT NULL,
  `item_timeFound` time NOT NULL,
  `item_dateClaimed` date NOT NULL,
  `item_timeClaimed` time NOT NULL,
  `item_security` varchar(100) NOT NULL,
  `item_semester` varchar(10) NOT NULL,
  `claimant_ID` int(11) NOT NULL,
  `item_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_item`
--

INSERT INTO `tb_item` (`item_ID`, `item_Type`, `item_place`, `item_desc`, `item_dateFound`, `item_timeFound`, `item_dateClaimed`, `item_timeClaimed`, `item_security`, `item_semester`, `claimant_ID`, `item_status`) VALUES
(20202347, 'Instrument', 'Parking Lot', 'bluesband silver harmonica', '2020-03-14', '10:41:00', '2020-03-16', '10:42:00', 'SG-Denie', '3', 2018126504, 1),
(20204346, 'Electronics', 'R405', 'Black Acer laptop', '2020-03-11', '10:39:00', '0000-00-00', '10:39:00', 'SG-Ronald', '3', 0, 0),
(20205994, 'Jewelry', 'R406', '21k Gold bracelet', '2020-03-13', '10:40:00', '0000-00-00', '10:40:00', 'SG-Denie', '2', 0, 0),
(20206418, 'School Supplies', 'Cafeteria', 'Black Gtech ballpen', '2020-03-14', '10:40:00', '0000-00-00', '10:40:00', 'SG-Amoronio', '3', 0, 0),
(20208116, 'School Supplies', 'R406', 'apple green notebook', '2020-03-02', '10:41:00', '0000-00-00', '10:41:00', 'SG-Ronald', '3', 0, 0),
(20209514, 'Clothes', 'R601', 'Green Jacket with New York logo', '2020-03-20', '10:41:00', '0000-00-00', '10:41:00', 'SG-Cabig', '3', 0, 0);

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
(1234, 'SG-Dubz', 'Lyle', 'Rallos', '81dc9bdb52d04dc20036dbd8313ed055'),
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
