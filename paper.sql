-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2019 at 09:37 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paper`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`) VALUES
('admin', 'admin'),
('admin', '21232f297a57a5a74389'),
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(12) NOT NULL,
  `b_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `b_name`) VALUES
(13, 'COMPUTER '),
(14, 'Civil');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(5) NOT NULL,
  `chapternumber` int(5) NOT NULL,
  `chaptername` text NOT NULL,
  `subject` varchar(20) NOT NULL,
  `semester` int(5) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`id`, `chapternumber`, `chaptername`, `subject`, `semester`, `branch`) VALUES
(1, 1, 'INTRODUCTION TO JAVA', 'JAVA', 5, 'COMPUTER'),
(2, 2, 'class', 'JAVA', 5, 'COMPUTER');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(20) NOT NULL,
  `question` text NOT NULL,
  `marks` int(12) NOT NULL,
  `difficultyofquestion` varchar(10) NOT NULL,
  `chapter` varchar(30) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `semester` int(5) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `marks`, `difficultyofquestion`, `chapter`, `subject`, `semester`, `branch`) VALUES
(1, ' what is java?', 4, 'Easy', '1:-INTRODUCTION TO JAVA', 'JAVA', 5, 'COMPUTER'),
(4, ' Explain inheritance and polymorphism features of Java.?', 4, 'Easy', '1:-INTRODUCTION TO JAVA', 'JAVA', 5, 'COMPUTER'),
(8, ' Why java became platform independent language ? Explain.', 4, 'Easy', '2:-class', 'JAVA', 5, 'COMPUTER'),
(11, ' yyyyyyyyyddghdfffffffffffffffhfg', 4, 'Easy', '2:-class', 'JAVA', 5, 'COMPUTER'),
(12, ' ry5reyiruidfdifiudhgdfopduepoee94uol-13-2p9u4ootporeut35dlkfjgoe', 4, 'Easy', '1:-INTRODUCTION TO JAVA', 'JAVA', 5, 'COMPUTER'),
(13, ' ewqewqeqweqeqweqweqwe', 4, 'Easy', '2:-class', 'JAVA', 5, 'COMPUTER'),
(14, ' Write a program to define two thread one to print from 1 to 100 and other to\r\nprint from 100 to 1. First thread transfer control to second thread after delay of\r\n500 ms.', 4, 'Easy', '1:-INTRODUCTION TO JAVA', 'JAVA', 5, 'COMPUTER'),
(15, ' http://localhost/paper/paper.php', 6, 'Easy', '1:-INTRODUCTION TO JAVA', 'JAVA', 5, 'COMPUTER'),
(16, ' oewru eeee wur3eqw90 ruewoijdsakdq2p0 2jsek 23ro42e jrowe rowr20ru 2qroqodk ewro rqepqwoe ewroewriweoi reowirwi rwirw irewoeorkepwrkrew;;kewrl', 6, 'Easy', '1:-INTRODUCTION TO JAVA', 'JAVA', 5, 'COMPUTER'),
(17, ' qwoeiwqeqweq\"\" eqwe', 6, 'Easy', '1:-INTRODUCTION TO JAVA', 'JAVA', 1, 'COMPUTER'),
(19, ' wqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 8, 'Easy', '1:-INTRODUCTION TO JAVA', 'JAVA', 5, 'COMPUTER'),
(20, 'epkrewrlewrlrlewprlewrlwrweprwrewp[r[welrwer[werp[wor[pewr[pwerp[', 8, 'Easy', '1:-INTRODUCTION TO JAVA', 'JAVA', 5, 'COMPUTER'),
(21, ' ew0r89w,-rwe-05i43tv0e4tp[eotp[reot[poer[torett[]rp][erpt][erpt[]erpt[]rep', 8, 'Easy', '1:-INTRODUCTION TO JAVA', 'JAVA', 5, 'COMPUTER'),
(22, ' ewrwe0reworewp[roewporpeworp[eworpeworpweorpweorw', 8, 'Easy', '1:-INTRODUCTION TO JAVA', 'JAVA', 5, 'COMPUTER'),
(23, ' xzjkchc', 4, 'Easy', '2:-class', 'JAVA', 5, 'COMPUTER'),
(24, 'what is mean by class?', 4, 'Easy', '2:-class', 'JAVA', 5, 'COMPUTER');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `s_code` varchar(10) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `s_name`, `s_code`, `semester`, `branch`) VALUES
(2, 'JAVA', '17515', '5', 'COMPUTER'),
(3, 'c', '17122', '2', 'COMPUTER');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `lastname`, `email`, `Username`, `Password`) VALUES
('bharat', '', '', '', ''),
('yash', 'gandu', 'yash@gemail.com', 'as', '02c425157ecd32f259548b33402ff6d3'),
('wqe', 'wqe', 'ewe@gg.c', 'wa', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
