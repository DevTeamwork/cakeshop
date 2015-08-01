-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2015 at 03:31 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cakeshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments_comfirm`
--

CREATE TABLE IF NOT EXISTS `payments_comfirm` (
  `id` int(11) NOT NULL,
  `bank_id` varchar(20) NOT NULL,
  `create_date` date NOT NULL,
  `create_time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `price` varchar(10) NOT NULL,
  `slip_imag` varchar(255) NOT NULL,
  `pay_date` varchar(20) NOT NULL,
  `pay_time` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `bank_branch` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments_comfirm`
--

INSERT INTO `payments_comfirm` (`id`, `bank_id`, `create_date`, `create_time`, `user_id`, `bill_id`, `price`, `slip_imag`, `pay_date`, `pay_time`, `comment`, `bank_branch`) VALUES
(1, '1', '2015-07-03', '02:29:23', 3, 10, '2000', '', '', '', '', ''),
(13, '1', '2015-07-25', '15:29:00', 3, 48, '400', 'C:/xampp/htdocs/cakeshop/images/slips/slip55b38f423fe45.jpg', '25 มิ.ย 55', '12.00', 'teeeee', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments_comfirm`
--
ALTER TABLE `payments_comfirm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments_comfirm`
--
ALTER TABLE `payments_comfirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
