-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 06:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_pswd` varchar(256) COLLATE utf8_bin NOT NULL,
  `a_phn` decimal(15,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_id`, `a_name`, `a_email`, `a_pswd`, `a_phn`) VALUES
(1, 'admin', 'admin@bs.com', '$2y$10$Llr4/S1gZgr3nzJXELp.H.9Q5f6cw8SMCotd2tLcwnPpedwgrGhHi', '9898747412');

-- --------------------------------------------------------

--
-- Table structure for table `metabill_tb`
--

CREATE TABLE `metabill_tb` (
  `b_id` int(10) UNSIGNED NOT NULL,
  `b_date` date NOT NULL,
  `b_time` time NOT NULL,
  `b_of_person` varchar(60) COLLATE utf8_bin NOT NULL,
  `b_amount` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `products_tb`
--

CREATE TABLE `products_tb` (
  `p_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `p_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `p_price` decimal(6,0) UNSIGNED NOT NULL,
  `p_avail` decimal(3,0) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products_tb`
--

INSERT INTO `products_tb` (`p_id`, `p_name`, `p_price`, `p_avail`) VALUES
(0001, 'Cello Notebook', '35', '50'),
(0002, 'N-95 Masks', '50', '100'),
(0003, 'Dabar Toothpaste', '25', '20'),
(0004, 'Water Bottle', '70', '20'),
(0005, 'Type C Charger', '250', '10'),
(0006, 'Iphone 11', '95000', '3'),
(0007, 'Monte Carlo Shirt', '499', '15'),
(0008, 'Cap', '60', '40'),
(0009, 'Nike Shoes', '1499', '90'),
(0010, 'LED', '35', '40'),
(0011, 'Cello Pen', '10', '100'),
(0012, 'Ubon Handsfree', '50', '50'),
(0019, 'Glasses Frame', '300', '20');

-- --------------------------------------------------------

--
-- Table structure for table `usersignup_tb`
--

CREATE TABLE `usersignup_tb` (
  `u_id` int(5) NOT NULL,
  `u_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `u_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `u_phn` decimal(15,0) NOT NULL,
  `u_pswd` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `usersignup_tb`
--

INSERT INTO `usersignup_tb` (`u_id`, `u_name`, `u_email`, `u_phn`, `u_pswd`) VALUES
(10, 'abc', 'abc@abc.com', '9876543210', '$2y$10$QAK9CGugvdDkpzOXsJW7.elVXGRpYpWiaP.01ghy1Krs/9zHRbPw2'),
(11, 'demo', 'demo@demo.com', '9998887770', '$2y$10$2.HO4gY95SHBlF/MzcY9hOxqhwAAnDCtq6b6YI4n9WVJ1sv/VAIJC'),
(12, 'jayu', 'jayu@gmail.com', '8596321545', '$2y$10$OZdxQ3SDI4rvUnqQwVVxBO1Kl7bazPM0vQpld14Y.f0hP4tTEMgx6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `metabill_tb`
--
ALTER TABLE `metabill_tb`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `products_tb`
--
ALTER TABLE `products_tb`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `usersignup_tb`
--
ALTER TABLE `usersignup_tb`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `metabill_tb`
--
ALTER TABLE `metabill_tb`
  MODIFY `b_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_tb`
--
ALTER TABLE `products_tb`
  MODIFY `p_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `usersignup_tb`
--
ALTER TABLE `usersignup_tb`
  MODIFY `u_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
