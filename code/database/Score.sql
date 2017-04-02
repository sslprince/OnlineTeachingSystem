-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2017 at 11:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sourcefile`
--

-- --------------------------------------------------------

--
-- Table structure for table `Score`
--

CREATE TABLE `Score` (
  `ID` int(8) NOT NULL,
  `filename` varchar(256) NOT NULL,
  `studentname` varchar(256) NOT NULL,
  `score` int(8) NOT NULL,
  `class` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Score`
--

INSERT INTO `Score` (`ID`, `filename`, `studentname`, `score`, `class`) VALUES
(1, 'c1.c', 'lalala', 89, ''),
(2, 'c2.c', 'nana', 90, ''),
(3, 'c1.c', 'nana', 60, ''),
(4, 'c2.c', 'lalala', 78, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Score`
--
ALTER TABLE `Score`
  ADD PRIMARY KEY (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
