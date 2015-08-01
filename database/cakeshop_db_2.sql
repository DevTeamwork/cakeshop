-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

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

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

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
  `limit_date` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`order_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

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
INSERT INTO `order` VALUES (40, 7, '2015-07-04 13:55:29', 0, '2015-07-10 00:00:00');
INSERT INTO `order` VALUES (41, 7, '2015-07-04 13:56:17', 0, '2015-07-10 00:00:00');
INSERT INTO `order` VALUES (42, 8, '2015-07-26 09:33:44', 0, '2015-08-02 00:00:00');

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
  `send_date` date NOT NULL,
  PRIMARY KEY  (`order_detail_id`),
  KEY `order_id` (`order_id`),
  KEY `order_id_2` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

-- 
-- dump ตาราง `order_detail`
-- 

INSERT INTO `order_detail` VALUES (29, 36, 1, 350, 1, '', '2015-07-04');
INSERT INTO `order_detail` VALUES (30, 38, 1, 350, 1, '', '2015-07-04');
INSERT INTO `order_detail` VALUES (31, 42, 1, 350, 1, '', '2015-07-26');

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

INSERT INTO `order_topping` VALUES (0, 31, 1, 0);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `payments_comfirm`
-- 

CREATE TABLE `payments_comfirm` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `payments_comfirm`
-- 

INSERT INTO `payments_comfirm` VALUES (1, '1', '2015-07-03', '02:29:23', 3, 10, '2000', '', '', '', '', '');
INSERT INTO `payments_comfirm` VALUES (13, '1', '2015-07-25', '15:29:00', 3, 48, '400', 'C:/xampp/htdocs/cakeshop/images/slips/slip55b38f423fe45.jpg', '25 มิ.ย 55', '12.00', 'teeeee', 'test');

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
  `photo_emty` varchar(255) NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
