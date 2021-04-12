-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 04:50 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aaabashon`
--

-- --------------------------------------------------------

--
-- Table structure for table `amounts`
--

CREATE TABLE `amounts` (
  `No` int(11) NOT NULL,
  `rent` varchar(25) NOT NULL,
  `service` varchar(25) NOT NULL,
  `water` varchar(10) NOT NULL,
  `electricity` varchar(10) NOT NULL,
  `gas` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amounts`
--

INSERT INTO `amounts` (`No`, `rent`, `service`, `water`, `electricity`, `gas`, `date`) VALUES
(2, '12000', '1000', '250', '500', '700', '2021-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `No` int(11) NOT NULL,
  `Month` varchar(25) NOT NULL,
  `rent` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `service` varchar(10) NOT NULL,
  `serviced` date NOT NULL,
  `water` varchar(10) NOT NULL,
  `waterd` date NOT NULL,
  `electricity` varchar(10) NOT NULL,
  `electricityd` date NOT NULL,
  `gas` varchar(10) NOT NULL,
  `gasd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`No`, `Month`, `rent`, `Date`, `service`, `serviced`, `water`, `waterd`, `electricity`, `electricityd`, `gas`, `gasd`) VALUES
(10, 'May2021', '12000', '0000-00-00', '1000', '2021-04-12', '250', '0000-00-00', '500', '0000-00-00', '700', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amounts`
--
ALTER TABLE `amounts`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amounts`
--
ALTER TABLE `amounts`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
