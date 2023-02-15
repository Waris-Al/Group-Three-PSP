-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 04:57 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group3`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pass` varchar(45) NOT NULL,
  `cname` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `postal` varchar(45) NOT NULL,
  `btype` varchar(45) NOT NULL,
  `ran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `email`, `pass`, `cname`, `city`, `postal`, `btype`, `ran`) VALUES
(7, 'ajharul@gmail.com', '1234', 'abc', 'xyz', '44220', 'res', NULL),
(13, 'test1@gmail.com', '1234', 'Andro Tech', 'London', '1212', 'restaurant', NULL),
(14, 'Sample@gmail.com', '12345', 'Ad Tech', 'Worcter', '425545', 'cinema', NULL),
(18, 'shoaibnike1122@gmail.com', '123', 'Air Tech', 'Islamabad', '44220', 'venue', NULL),
(19, 'test2@gmail.com', '1234', 'Test Tech', 'Barmigham', '1245', 'venue', NULL),
(20, 'test3@gmail.com', '1234', 'Def Tech', 'Halifax', '4545', 'venue', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `cid` varchar(11) NOT NULL,
  `wchair` varchar(35) NOT NULL,
  `video` varchar(35) NOT NULL,
  `audio` varchar(20) NOT NULL,
  `hearing` varchar(20) NOT NULL,
  `parking` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `cid`, `wchair`, `video`, `audio`, `hearing`, `parking`) VALUES
(8, '18', 'yes', 'yes', 'no', 'yes', 'yes'),
(9, '19', 'yes', 'no', 'yes', 'no', 'no'),
(10, '20', 'no', 'no', 'yes', 'yes', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
