-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2015 at 11:20 AM
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
(6, 'เครป'),
(7, 'เครป'),
(8, 'พาย'),
(9, 'คุกกี้'),
(10, 'พุดดิ้ง'),
(11, 'มาการอง'),
(12, 'บัตเตอร์'),
(13, 'มูส'),
(14, 'วุ้น'),
(15, 'คัพเค้ก');

-- --------------------------------------------------------

--
-- Table structure for table `gallerys`
--

CREATE TABLE IF NOT EXISTS `gallerys` (
  `gallery_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallerys`
--

INSERT INTO `gallerys` (`gallery_id`, `image_path`, `product_id`) VALUES
(1, 'image2.png', 1),
(2, 'image3.png', 1);

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
  `order_status` int(1) NOT NULL COMMENT '0 = not comfirm, 1 = confirmed, 2 = send'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `order_date`, `order_status`) VALUES
(10, 3, '2015-06-20 08:31:01', 0),
(11, 3, '2015-06-20 08:31:14', 0),
(12, 3, '2015-06-20 08:32:14', 0),
(13, 3, '2015-06-20 08:33:32', 0),
(14, 3, '2015-06-20 08:34:31', 0),
(15, 3, '2015-06-20 08:39:26', 0),
(16, 3, '2015-06-20 09:01:05', 0),
(17, 3, '2015-06-20 09:01:29', 0),
(18, 3, '2015-06-20 09:05:28', 0),
(19, 3, '2015-06-20 09:06:15', 0),
(20, 3, '2015-06-20 09:06:32', 0),
(21, 3, '2015-06-20 09:06:41', 0),
(22, 3, '2015-06-20 09:18:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(3) NOT NULL,
  `create_date` date NOT NULL,
  `create_time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `greeting_word` varchar(255) DEFAULT NULL,
  `font` varchar(100) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `discription` text,
  `create_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `count`, `create_date`, `create_time`, `user_id`, `bill_id`, `greeting_word`, `font`, `color`, `discription`, `create_by`) VALUES
(1, 1, 1, '2015-04-19', '23:54:00', 1, 1, '็Happy Happy', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `order_qty`, `product_price`, `product_id`) VALUES
(12, 10, 5, 300, 8),
(13, 10, 2, 300, 9),
(14, 11, 5, 300, 8),
(15, 11, 3, 300, 9),
(16, 12, 5, 300, 8),
(17, 12, 3, 300, 9),
(18, 13, 1, 300, 8),
(19, 14, 1, 300, 8),
(20, 15, 1, 300, 8),
(21, 16, 1, 300, 9),
(22, 16, 1, 300, 8),
(23, 18, 12, 300, 9),
(24, 22, 15, 300, 9);

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
  `bill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `discription`, `time`, `price`, `create_date`, `create_time`, `user_id`, `category_id`, `size`) VALUES
(8, 'เค้กช็อกโกแลต โอริโอ้ edit', 'เค้กช็อกโกแลต โอริโอ้ edit', 1, 300, '2015-04-03', '11:00:09', 1, 2, '2'),
(9, 'เค้กช็อกโกแลต โอริโอ้ 2', 'เค้กช็อกโกแลต โอริโอ้ 2', 2, 300, '2015-04-06', '22:21:51', 1, 1, '2');

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
  `nickname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `identification_card` varchar(13) NOT NULL,
  `image_profile` varchar(255) NOT NULL,
  `rote` varchar(5) NOT NULL,
  `active` varchar(1) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `longtitude` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `firstname`, `lastname`, `nickname`, `birthday`, `address`, `tel`, `identification_card`, `image_profile`, `rote`, `active`, `latitude`, `longtitude`) VALUES
(1, 'admin', '123456', 'cakeshow_admin@gmail.com', 'admin', 'cakeshop', 'admin', '2000-03-17', 'khon kean', '0893453453', '1234567890123', '', 'admin', 'y', '0', '0'),
(2, 'user', '123456', 'user@gmail.com', 'user', 'name', 'user', '2015-04-27', 'khon kean', '0893453453', '1234567890123', '', 'user', 'y', '0', '0'),
(3, 'surasak', '1234', 'surasak.ict.msu@gmail.com', 'Surasak', 'La-ongkham', 'M', '2013-12-12', 'KKS Company', '0801953624', '', '', 'cust', 'y', '', '');

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
-- Indexes for table `gallerys`
--
ALTER TABLE `gallerys`
  ADD PRIMARY KEY (`gallery_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

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
-- AUTO_INCREMENT for table `gallerys`
--
ALTER TABLE `gallerys`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificatioin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `payments_comfirm`
--
ALTER TABLE `payments_comfirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
