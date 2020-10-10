-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2020 at 02:54 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `b_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pbname` varchar(50) NOT NULL,
  `pbdate` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `edition` varchar(11) NOT NULL,
  `isbn` int(11) NOT NULL,
  `ncopy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`b_id`, `name`, `pbname`, `pbdate`, `sub`, `edition`, `isbn`, `ncopy`) VALUES
(2, 'seisd', 'pearson', 'Robbins', 'ob', '2009', 789456, 19),
(4, 'English 1st', 'pearson', 'Jonh', 'English', '2008', 4567, 19),
(5, 'SEISD', 'Tom', 'Tom Robbins', 'Science', '2011', 9632, 20),
(6, 'MM', 'Tom', 'Jonh', 'CSE', '2020', 457812, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_borrow`
--

CREATE TABLE `tbl_borrow` (
  `b_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `cd` date NOT NULL,
  `rd` date NOT NULL,
  `ncopy` int(11) NOT NULL,
  `returned_on` date NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_borrow`
--

INSERT INTO `tbl_borrow` (`b_id`, `userid`, `isbn`, `cd`, `rd`, `ncopy`, `returned_on`, `fine`) VALUES
(7, 1, '789456', '2020-10-10', '2020-10-27', 1, '2020-10-12', 0),
(8, 1, '4567', '2020-10-10', '2020-10-14', 2, '0000-00-00', 0),
(9, 1, '9632', '2020-10-10', '2020-10-14', 1, '2020-10-13', 15),
(12, 2, '457812', '2020-10-10', '2020-10-13', 2, '2020-10-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `mobile` int(15) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `address`, `mobile`, `street`, `city`, `age`, `pass`) VALUES
(1, 'mj', 'mj@gmail.com', 'jjfbdb', 145625666, 'jjfbdb', 'gkkjs', '20', 'mj1526'),
(2, 'MJobair', 'jobair@gmail.com', 'jjfbdb', 1578875454, 'jjfbdb', 'gkkjs', '29', 'mj1526');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_borrow`
--
ALTER TABLE `tbl_borrow`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_borrow`
--
ALTER TABLE `tbl_borrow`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
