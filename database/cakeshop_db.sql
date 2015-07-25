-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
<<<<<<< HEAD
=======
<<<<<<< HEAD
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2015 at 11:45 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8
=======
>>>>>>> origin/master
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6
<<<<<<< HEAD
=======
>>>>>>> 27b5f6e65b5817c3fb6e216691d8552e456b58d4
>>>>>>> origin/master

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `cakeshop_db`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `banks`
-- 

CREATE TABLE `banks` (
  `bank_id` int(5) NOT NULL auto_increment,
  `bank_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_no` varchar(10) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY  (`bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- dump ตาราง `banks`
-- 

INSERT INTO `banks` VALUES (1, 'ธนาคารกสิกรไทย', 'ขอนแก่น', '1234567890', 'นายเค้ก ขายดีมาก', '/cakeshop/uploads/profile_5533ee31eeed5.jpeg');
INSERT INTO `banks` VALUES (3, 'กรุงไทย', 'ขอนแก่น', '1234567890', 'นายเค้ก ขายดีมาก', '/cakeshop/uploads/profile_5533ee407a4d0.jpeg');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `category`
-- 

<<<<<<< HEAD
=======
<<<<<<< HEAD
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
=======
>>>>>>> origin/master
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`category_id`)
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;
=======
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;
>>>>>>> 27b5f6e65b5817c3fb6e216691d8552e456b58d4
>>>>>>> origin/master

-- 
-- dump ตาราง `category`
-- 

INSERT INTO `category` VALUES (7, 'เครป');
INSERT INTO `category` VALUES (8, 'พาย');
INSERT INTO `category` VALUES (9, 'คุกกี้');
INSERT INTO `category` VALUES (14, 'วุ้น');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `notifications`
-- 

CREATE TABLE `notifications` (
  `notificatioin_id` int(11) NOT NULL auto_increment,
  `create_date` date NOT NULL,
  `create_time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  PRIMARY KEY  (`notificatioin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `notifications`
-- 

INSERT INTO `notifications` VALUES (1, '2015-04-19', '23:54:00', 1, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `order`
-- 

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL auto_increment,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `order_status` int(1) NOT NULL COMMENT '0 = not comfirm, 1 = confirmed, 2 = send',
<<<<<<< HEAD
=======
<<<<<<< HEAD
  `limit_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

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
(41, 3, '2015-07-04 06:56:17', 0, '2015-07-04'),
(42, 3, '2015-07-04 08:09:38', 0, '2015-07-11'),
(43, 3, '2015-07-19 09:13:31', 0, '2015-07-26'),
(44, 3, '2015-07-19 09:15:28', 0, '2015-07-26'),
(45, 3, '2015-07-19 09:17:20', 0, '2015-07-26');
=======
>>>>>>> origin/master
  `limit_date` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`order_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

-- 
-- dump ตาราง `order`
-- 

INSERT INTO `order` VALUES (32, 3, '2015-07-04 13:31:13', 0, '2015-07-21 00:00:00');
INSERT INTO `order` VALUES (33, 3, '2015-07-04 13:33:34', 0, '2015-07-15 00:00:00');
INSERT INTO `order` VALUES (34, 3, '2015-07-04 13:48:09', 0, '2015-07-22 00:00:00');
INSERT INTO `order` VALUES (35, 3, '2015-07-04 13:48:29', 0, '2015-07-30 00:00:00');
INSERT INTO `order` VALUES (36, 3, '2015-07-04 13:49:30', 0, '2015-07-13 00:00:00');
INSERT INTO `order` VALUES (37, 3, '2015-07-04 13:52:18', 0, '2015-07-20 00:00:00');
INSERT INTO `order` VALUES (38, 3, '2015-07-04 13:54:51', 0, '2015-07-21 00:00:00');
INSERT INTO `order` VALUES (39, 3, '2015-07-04 13:55:14', 0, '2015-07-06 00:00:00');
<<<<<<< HEAD
INSERT INTO `order` VALUES (40, 7, '2015-07-04 13:55:29', 0, '2015-07-10 00:00:00');
INSERT INTO `order` VALUES (41, 7, '2015-07-04 13:56:17', 0, '2015-07-10 00:00:00');
=======
INSERT INTO `order` VALUES (40, 3, '2015-07-04 13:55:29', 0, '2015-07-05 00:00:00');
INSERT INTO `order` VALUES (41, 3, '2015-07-04 13:56:17', 0, '2015-07-05 00:00:00');
>>>>>>> 27b5f6e65b5817c3fb6e216691d8552e456b58d4
>>>>>>> origin/master

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `order_detail`
-- 

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL auto_increment,
  `order_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_id` int(11) NOT NULL,
  `greeting_text` varchar(255) NOT NULL,
<<<<<<< HEAD
=======
<<<<<<< HEAD
  `send_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
=======
>>>>>>> origin/master
  `send_date` date NOT NULL,
  PRIMARY KEY  (`order_detail_id`),
  KEY `order_id` (`order_id`),
  KEY `order_id_2` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;
<<<<<<< HEAD
=======
>>>>>>> 27b5f6e65b5817c3fb6e216691d8552e456b58d4
>>>>>>> origin/master

-- 
-- dump ตาราง `order_detail`
-- 

<<<<<<< HEAD
INSERT INTO `order_detail` VALUES (29, 36, 1, 350, 1, '', '2015-07-04');
INSERT INTO `order_detail` VALUES (30, 38, 1, 350, 1, '', '2015-07-04');
=======
<<<<<<< HEAD
INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `order_qty`, `product_price`, `product_id`, `greeting_text`, `send_date`) VALUES
(29, 36, 1, 350, 1, '', '2015-07-04'),
(30, 38, 1, 350, 1, '', '2015-07-04'),
(31, 42, 1, 350, 1, '', '2015-07-04'),
(32, 43, 1, 300, 2, '', '2015-07-19'),
(33, 44, 1, 350, 1, '', '2015-07-19'),
(34, 44, 1, 300, 2, '', '2015-07-19'),
(35, 45, 1, 350, 1, '', '2015-07-19');
=======
INSERT INTO `order_detail` VALUES (29, 36, 1, 350, 1, '', '2015-07-04');
INSERT INTO `order_detail` VALUES (30, 38, 1, 350, 1, '', '2015-07-04');
>>>>>>> 27b5f6e65b5817c3fb6e216691d8552e456b58d4
>>>>>>> origin/master

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `order_topping`
-- 

CREATE TABLE `order_topping` (
  `order_topping_id` int(11) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `topping_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `order_topping`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `payments_comfirm`
-- 

CREATE TABLE `payments_comfirm` (
  `id` int(11) NOT NULL auto_increment,
  `bank_id` varchar(20) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_account` varchar(100) NOT NULL,
  `create_date` date NOT NULL,
  `create_time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `price` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `payments_comfirm`
-- 

INSERT INTO `payments_comfirm` VALUES (1, '1', '23434', 'agkasit tontan', '2015-07-03', '02:29:23', 3, 10, '2000');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `products`
-- 

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL auto_increment,
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
<<<<<<< HEAD
  `photo_emty` varchar(255) NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
=======
<<<<<<< HEAD
  `photo_emty` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
=======
  `photo_emty` varchar(255) NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;
>>>>>>> 27b5f6e65b5817c3fb6e216691d8552e456b58d4
>>>>>>> origin/master

-- 
-- dump ตาราง `products`
-- 

INSERT INTO `products` VALUES (1, 'เค้กทั่วไป', 'เค้กทั่วไป', 1, 350, '2015-07-03', '19:25:00', 1, 0, '2', '/cakeshop/images/products/general.png', '/cakeshop/images/products/general_burned.png');
INSERT INTO `products` VALUES (2, 'เค้กผลไม้', 'เค้กผลไม้', 2, 300, '2015-04-06', '22:21:51', 1, 1, '2', '/cakeshop/images/products/fruit.png', '/cakeshop/images/products/fruit_burned.png');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `toppings`
-- 

CREATE TABLE `toppings` (
  `toping_id` int(11) NOT NULL auto_increment,
  `toping_name` varchar(255) NOT NULL,
  `toping_url` varchar(255) NOT NULL,
  `product_id` varchar(11) NOT NULL,
  PRIMARY KEY  (`toping_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `toppings`
-- 

INSERT INTO `toppings` VALUES (1, 'เซอร์รี่', '/images/toppings/download_burned.png', '2');
INSERT INTO `toppings` VALUES (2, 'ส้ม', '/images/toppings/download_burned.png', '2');
INSERT INTO `toppings` VALUES (3, 'เบอรี่', '/images/toppings/download_burned.png', '2');
INSERT INTO `toppings` VALUES (4, 'เย็นรี่', '/images/toppings/download_burned.png', '1');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `users`
-- 

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `nickname` varchar(50) default NULL,
  `birthday` date default NULL,
  `address` varchar(255) default NULL,
  `tel` varchar(15) default NULL,
  `identification_card` varchar(13) default NULL,
  `image_profile` varchar(255) default NULL,
  `rote` varchar(5) NOT NULL,
<<<<<<< HEAD
  `active` varchar(1) default NULL,
  `latitude` varchar(15) default NULL,
  `longtitude` varchar(15) default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- dump ตาราง `users`
-- 

INSERT INTO `users` VALUES (1, 'admin', '123456', 'cakeshow_admin@gmail.com', 'admin', 'cakeshop', 'admin', '2000-03-17', 'khon kean', '0893453453', '1234567890123', '', 'admin', 'y', '0', '0');
INSERT INTO `users` VALUES (2, 'user', '123456', 'user@gmail.com', 'user', 'name', 'user', '2015-04-27', 'khon kean', '0893453453', '1234567890123', '', 'user', 'y', '0', '0');
INSERT INTO `users` VALUES (3, 'surasak', '1234', 'surasak.ict.msu@gmail.com', 'Surasak', 'La-ongkham', 'M', '2013-12-12', 'KKS Company', '0801953624', '', '', 'cust', 'y', '', '');
INSERT INTO `users` VALUES (6, 'mm', 'mm', 'mm@gmail.com', 'mm', 'mm', NULL, NULL, NULL, NULL, NULL, NULL, 'cust', 'y', NULL, NULL);
INSERT INTO `users` VALUES (7, 'agkasit', '123456', 'agkasit.ecp7@gmail.com', 'เจ้าสัว', 'ใหญ่', NULL, NULL, NULL, NULL, NULL, NULL, 'cust', 'y', NULL, NULL);
INSERT INTO `users` VALUES (8, 'user', '1234qwer', 'user.cakeshop@gmail.com', 'southida', 'chomphuphet', NULL, NULL, NULL, NULL, NULL, NULL, 'cust', 'y', NULL, NULL);

-- 
=======
<<<<<<< HEAD
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
-- Indexes for table `order_topping`
--
ALTER TABLE `order_topping`
  ADD PRIMARY KEY (`order_topping_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificatioin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `order_topping`
--
ALTER TABLE `order_topping`
  MODIFY `order_topping_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payments_comfirm`
--
ALTER TABLE `payments_comfirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
=======
  `active` varchar(1) default NULL,
  `latitude` varchar(15) default NULL,
  `longtitude` varchar(15) default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- dump ตาราง `users`
-- 

INSERT INTO `users` VALUES (1, 'admin', '123456', 'cakeshow_admin@gmail.com', 'admin', 'cakeshop', 'admin', '2000-03-17', 'khon kean', '0893453453', '1234567890123', '', 'admin', 'y', '0', '0');
INSERT INTO `users` VALUES (2, 'user', '123456', 'user@gmail.com', 'user', 'name', 'user', '2015-04-27', 'khon kean', '0893453453', '1234567890123', '', 'user', 'y', '0', '0');
INSERT INTO `users` VALUES (3, 'surasak', '1234', 'surasak.ict.msu@gmail.com', 'Surasak', 'La-ongkham', 'M', '2013-12-12', 'KKS Company', '0801953624', '', '', 'cust', 'y', '', '');
INSERT INTO `users` VALUES (6, 'mm', 'mm', 'mm@gmail.com', 'mm', 'mm', NULL, NULL, NULL, NULL, NULL, NULL, 'cust', 'y', NULL, NULL);
INSERT INTO `users` VALUES (7, 'agkasit', '123456', 'agkasit.ecp7@gmail.com', 'Agkasit', 'Tontan', NULL, NULL, NULL, NULL, NULL, NULL, 'cust', 'y', NULL, NULL);

-- 
>>>>>>> 27b5f6e65b5817c3fb6e216691d8552e456b58d4
>>>>>>> origin/master
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
