-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2015 at 09:56 AM
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
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `bank_id` int(5) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_no` varchar(10) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `bank_name`, `branch`, `account_no`, `account_name`, `image`) VALUES
(1, 'ธนาคารกสิกรไทย', 'ขอนแก่น', '1234567890', 'นายเค้ก ขายดีมาก', '/cakeshop/uploads/profile_5533ee31eeed5.jpeg'),
(3, 'กรุงไทย', 'ขอนแก่น', '1234567890', 'นายเค้ก ขายดีมาก', '/cakeshop/uploads/profile_5533ee407a4d0.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(7, 'เครป'),
(8, 'พาย'),
(9, 'คุกกี้'),
(14, 'วุ้น');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `notificatioin_id` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `create_time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificatioin_id`, `create_date`, `create_time`, `user_id`, `bill_id`) VALUES
(1, '2015-04-19', '23:54:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_status` int(1) NOT NULL COMMENT '0 = not comfirm, 1 = confirmed, 2 = send',
  `limit_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `order_date`, `order_status`, `limit_date`) VALUES
(32, 3, '2015-07-04 06:31:13', 0, '0000-00-00'),
(33, 3, '2015-07-04 06:33:34', 0, '0000-00-00'),
(34, 3, '2015-07-04 06:48:09', 0, '0000-00-00'),
(35, 3, '2015-07-04 06:48:29', 0, '0000-00-00'),
(36, 3, '2015-07-04 06:49:30', 0, '0000-00-00'),
(37, 3, '2015-07-04 06:52:18', 0, '0000-00-00'),
(38, 3, '2015-07-04 06:54:51', 0, '0000-00-00'),
(39, 3, '2015-07-04 06:55:14', 0, '0000-00-00'),
(40, 3, '2015-07-04 06:55:29', 0, '0000-00-00'),
(41, 3, '2015-07-04 06:56:17', 0, '2015-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_id` int(11) NOT NULL,
  `greeting_text` varchar(255) NOT NULL,
  `send_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `order_qty`, `product_price`, `product_id`, `greeting_text`, `send_date`) VALUES
(29, 36, 1, 350, 1, '', '2015-07-04'),
(30, 38, 1, 350, 1, '', '2015-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `order_topping`
--

CREATE TABLE IF NOT EXISTS `order_topping` (
  `order_topping_id` int(11) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `topping_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments_comfirm`
--

CREATE TABLE IF NOT EXISTS `payments_comfirm` (
  `id` int(11) NOT NULL,
  `bank_id` varchar(20) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_account` varchar(100) NOT NULL,
  `create_date` date NOT NULL,
  `create_time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments_comfirm`
--

INSERT INTO `payments_comfirm` (`id`, `bank_id`, `bank_name`, `bank_account`, `create_date`, `create_time`, `user_id`, `bill_id`, `price`) VALUES
(1, '1', '23434', 'agkasit tontan', '2015-07-03', '02:29:23', 3, 10, '2000');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `time` int(3) NOT NULL,
  `price` float NOT NULL,
  `create_date` date NOT NULL,
  `create_time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `size` varchar(10) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo_emty` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `discription`, `time`, `price`, `create_date`, `create_time`, `user_id`, `category_id`, `size`, `photo`, `photo_emty`) VALUES
(1, 'เค้กทั่วไป', 'เค้กทั่วไป', 1, 350, '2015-07-03', '19:25:00', 1, 0, '2', '/cakeshop/images/products/general.png', '/cakeshop/images/products/general_burned.png'),
(2, 'เค้กผลไม้', 'เค้กผลไม้', 2, 300, '2015-04-06', '22:21:51', 1, 1, '2', '/cakeshop/images/products/fruit.png', '/cakeshop/images/products/fruit_burned.png');

-- --------------------------------------------------------

--
-- Table structure for table `toppings`
--

CREATE TABLE IF NOT EXISTS `toppings` (
  `toping_id` int(11) NOT NULL,
  `toping_name` varchar(255) NOT NULL,
  `toping_url` varchar(255) NOT NULL,
  `product_id` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `toppings`
--

INSERT INTO `toppings` (`toping_id`, `toping_name`, `toping_url`, `product_id`) VALUES
(1, 'เซอร์รี่', '/images/toppings/download_burned.png', '2'),
(2, 'ส้ม', '/images/toppings/download_burned.png', '2'),
(3, 'เบอรี่', '/images/toppings/download_burned.png', '2'),
(4, 'เย็นรี่', '/images/toppings/download_burned.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `identification_card` varchar(13) DEFAULT NULL,
  `image_profile` varchar(255) DEFAULT NULL,
  `rote` varchar(5) NOT NULL,
  `active` varchar(1) DEFAULT NULL,
  `latitude` varchar(15) DEFAULT NULL,
  `longtitude` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `firstname`, `lastname`, `nickname`, `birthday`, `address`, `tel`, `identification_card`, `image_profile`, `rote`, `active`, `latitude`, `longtitude`) VALUES
(1, 'admin', '123456', 'cakeshow_admin@gmail.com', 'admin', 'cakeshop', 'admin', '2000-03-17', 'khon kean', '0893453453', '1234567890123', '', 'admin', 'y', '0', '0'),
(2, 'user', '123456', 'user@gmail.com', 'user', 'name', 'user', '2015-04-27', 'khon kean', '0893453453', '1234567890123', '', 'user', 'y', '0', '0'),
(3, 'surasak', '1234', 'surasak.ict.msu@gmail.com', 'Surasak', 'La-ongkham', 'M', '2013-12-12', 'KKS Company', '0801953624', '', '', 'cust', 'y', '', ''),
(4, 'eeeeeee', 'eeeee', 'eeeeeeeee', 'eeeeeee', 'eeeeeeeee', NULL, NULL, NULL, NULL, NULL, NULL, 'cust', 'y', NULL, NULL),
(5, 'eeeeeee', 'eeeee', 'eeeeeeeee', 'eeeeeee', 'eeeeeeeee', NULL, NULL, NULL, NULL, NULL, NULL, 'cust', 'y', NULL, NULL),
(6, 'mm', 'mm', 'mm@gmail.com', 'mm', 'mm', NULL, NULL, NULL, NULL, NULL, NULL, 'cust', 'y', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificatioin_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`), ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`), ADD KEY `order_id` (`order_id`), ADD KEY `order_id_2` (`order_id`), ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payments_comfirm`
--
ALTER TABLE `payments_comfirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `toppings`
--
ALTER TABLE `toppings`
  ADD PRIMARY KEY (`toping_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bank_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificatioin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `payments_comfirm`
--
ALTER TABLE `payments_comfirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `toppings`
--
ALTER TABLE `toppings`
  MODIFY `toping_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
ADD CONSTRAINT `USER_PK` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
ADD CONSTRAINT `ORDER_PK` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `PRODUCT_PK` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
