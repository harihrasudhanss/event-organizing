-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 12:23 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `csreg`
--

CREATE TABLE `csreg` (
  `id` int(3) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `roll_no` int(3) NOT NULL,
  `college` varchar(30) NOT NULL,
  `section` varchar(1) NOT NULL,
  `payment` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csreg`
--

INSERT INTO `csreg` (`id`, `name`, `phone_number`, `email`, `roll_no`, `college`, `section`, `payment`) VALUES
(1, 'hariharasudhan', '4651654116', 'kavin@gmail.com', 104, 'sece', 'a', '12000');

-- --------------------------------------------------------

--
-- Table structure for table `ecereg`
--

CREATE TABLE `ecereg` (
  `id` int(11) NOT NULL,
  `name` varchar(3) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `roll_no` int(3) NOT NULL,
  `college` varchar(40) NOT NULL,
  `section` varchar(1) NOT NULL,
  `payment` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecereg`
--

INSERT INTO `ecereg` (`id`, `name`, `phone_number`, `email`, `roll_no`, `college`, `section`, `payment`) VALUES
(1, 'hhh', '9524052065', 'hari@gmail.com', 103, 'sri eshwar college engineering', 'a', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `eeereg`
--

CREATE TABLE `eeereg` (
  `id` int(3) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `roll_no` int(3) NOT NULL,
  `college` varchar(40) NOT NULL,
  `section` varchar(1) NOT NULL,
  `payment` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eeereg`
--

INSERT INTO `eeereg` (`id`, `name`, `phone_number`, `email`, `roll_no`, `college`, `section`, `payment`) VALUES
(1, 'hhh', '9524052065', 'hari@gmail.com', 103, 'sri eshwar college engineering', 'a', 'not paid (500)'),
(2, 'hhh', '4656465477', 'har2i@gmail.com', 106, 'sri eshwar college engineering', 'a', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `mechreg`
--

CREATE TABLE `mechreg` (
  `id` int(3) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `roll_no` int(3) NOT NULL,
  `college` varchar(70) NOT NULL,
  `section` varchar(1) NOT NULL,
  `payment` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mechreg`
--

INSERT INTO `mechreg` (`id`, `name`, `phone_number`, `email`, `roll_no`, `college`, `section`, `payment`) VALUES
(3, 'hhh', '9524052065', 'hari@gmail.com', 103, 'sri eshwar college of engineering', 'a', 'not paid(7000)'),
(4, 'hariharasudhan', '8778370145', 'hariharasudhan18042001@gmail.com', 101, 'sri eshwar college of engineering', 'a', 'paid'),
(5, 'senthil', '9524052064', 'har2i@gmail.com', 104, 'sri eshwar college of engineering', 'a', 'paid'),
(6, 'athesh', '9524052067', 'athesh@gmail.com', 710, 'sece', 'b', 'not paid(12000)'),
(7, 'hariharasudhan', '9524055420', 'mus@gmail.com', 106, 'sece', 'v', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(15) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `phone_number`, `email`, `password`, `reg_date`) VALUES
(1, 'abcd', '2147483647', 'hariharamass243@gmail.com', '123456', '2023-03-18 06:41:15'),
(2, 'hariharasudhan', '2147483647', 'hariharamass243@gmail.com', '123456', '2023-03-18 06:41:24'),
(3, 'athesh', '2147483647', 'athesh@gMAIL.COM', '123456Ha@', '2023-03-17 03:38:43'),
(4, 'yamaha', '9883554545', 'yamaha@gMAIL.COM', '123456Ha@', '2023-03-17 03:41:50'),
(5, 'dsbhkfds', '8778370145', 'hariharamass243@gmail.con', '123456', '2023-03-18 07:44:34'),
(6, 'hariharasudhan', '8778370145', 'hariharasudhan@gmail.com', '8778370145', '2023-03-19 17:34:09'),
(7, 'selvanayakam', '9688821181', 'selvanayakam@gmail.com', '9688821181', '2023-03-25 07:35:35'),
(8, 'jayan', '5055356545', 'hariharasudhan180422@gmail.com', '123456', '2023-04-09 02:54:45'),
(9, 'lkfkllkded', '684534', 'p@gmail.com', '123456', '2023-04-09 05:39:07'),
(10, 'kjgkhg', '35425', 'gvjhgkgkvg@gmail.com', '123456', '2023-04-09 05:42:41'),
(11, 'fdsssd', '3545465', 'fvfzvfzvz@gmail.com', '123456', '2023-04-09 05:46:15'),
(12, 'mani', '546546545', 'mani@gmail.com', '123456', '2023-04-09 05:47:50'),
(13, 'ajesh', '7785757', 'ajesh@gmail.com', '123456', '2023-04-09 05:50:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csreg`
--
ALTER TABLE `csreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecereg`
--
ALTER TABLE `ecereg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eeereg`
--
ALTER TABLE `eeereg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mechreg`
--
ALTER TABLE `mechreg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll_no` (`roll_no`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csreg`
--
ALTER TABLE `csreg`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ecereg`
--
ALTER TABLE `ecereg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eeereg`
--
ALTER TABLE `eeereg`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mechreg`
--
ALTER TABLE `mechreg`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
