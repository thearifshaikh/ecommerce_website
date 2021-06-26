-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 07:32 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tstamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `user_id`, `title`, `description`, `tstamp`) VALUES
(1, 7, 'BIOMETRIC ELECTRONIC VOTING MACHINE', 'kkk', '2020-07-13'),
(2, 7, 'BIOMETRIC ELECTRONIC VOTING MACHINE', 'kkk', '2020-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(37, 1, 3),
(87, 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `oderid` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `item_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`oderid`, `user_id`, `item_id`, `name`, `phone`, `address`, `city`, `state`, `pincode`, `status`, `tstamp`) VALUES
(1, 2, 5, 'Arif', '9508560258', 'Abc', 'Guwahati', 'Assam', 781025, 'Not delivered', '2020-07-14 00:26:45'),
(3, 7, 11, 'Rahul', '9876543210', 'S S Road', 'Guwahati', 'Assam', 781001, 'Not delivered', '2020-07-14 01:08:17'),
(4, 7, 11, 'Rahul', '9876543210', 'S S Road', 'Guwahati', 'Assam', 781001, 'Not delivered', '2020-07-14 01:09:44'),
(5, 7, 11, 'Rahul', '9876543210', 'S S Road', 'Guwahati', 'Assam', 781001, 'Not delivered', '2020-07-14 01:10:15'),
(6, 7, 5, 'Rahul', '9876543210', 'S S Road', 'Guwahati', 'Assam', 781001, 'Not delivered', '2020-07-14 01:10:15'),
(7, 7, 9, 'Rahul', '9876543210', 'S S Road', 'Guwahati', 'Assam', 781001, 'Not delivered', '2020-07-14 01:10:15'),
(8, 7, 11, 'SEKH ARIF MAHAMMAD', '9508560258', 'DEBEN KHAKLARI PATH,DHIRENPARA,GUWAHATI.', 'Guwahati', 'ASSAM', 781025, 'Not delivered', '2020-07-14 01:13:30'),
(9, 7, 5, 'SEKH ARIF MAHAMMAD', '9508560258', 'DEBEN KHAKLARI PATH,DHIRENPARA,GUWAHATI.', 'Guwahati', 'ASSAM', 781025, 'Not delivered', '2020-07-14 01:13:30'),
(10, 7, 9, 'SEKH ARIF MAHAMMAD', '9508560258', 'DEBEN KHAKLARI PATH,DHIRENPARA,GUWAHATI.', 'Guwahati', 'ASSAM', 781025, 'Not delivered', '2020-07-14 01:13:31'),
(11, 5, 7, 'Hunter', '9876543210', 'S S Road', 'Guwahati', 'Assam', 781001, 'Not delivered', '2020-07-14 01:19:21'),
(12, 5, 4, 'Hunter', '9876543210', 'S S Road', 'Guwahati', 'Assam', 781001, 'Not delivered', '2020-07-14 01:19:22'),
(13, 5, 6, 'Hunter', '9876543210', 'S S Road', 'Guwahati', 'Assam', 781001, 'Not delivered', '2020-07-14 01:19:22'),
(14, 5, 3, 'Hunter', '9876543210', 'S S Road', 'Guwahati', 'Assam', 781001, 'Not delivered', '2020-07-14 01:19:22'),
(15, 5, 5, 'Hunter', '9876543210', 'S S Road', 'Guwahati', 'Assam', 781001, 'Not delivered', '2020-07-14 01:20:15'),
(16, 5, 3, 'Hunter', '9876543210', 'S S Road', 'Guwahati', 'Assam', 781001, 'Not delivered', '2020-07-14 01:20:15'),
(17, 6, 4, 'SEKH ARIF MAHAMMAD', '9508560258', 'Jalpaiguri Government Engineering College, Hostel Number 1', 'Jalpaiguri', 'West Bengal', 735102, 'Not delivered', '2020-08-16 11:27:57'),
(18, 6, 7, 'SEKH ARIF MAHAMMAD', '9508560258', 'Jalpaiguri Government Engineering College, Hostel Number 1', 'Jalpaiguri', 'West Bengal', 735102, 'Not delivered', '2020-08-16 11:27:58'),
(19, 7, 11, 'SEKH ARIF MAHAMMAD', '9508560258', 'Jalpaiguri Government Engineering College, Hostel Number 1', 'Jalpaiguri', 'West Bengal', 735102, 'Not delivered', '2020-08-16 22:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1, 'Samsung', 'Samsung Galaxy 10', 9999.00, './assets/products/1.png', '2020-03-28 11:08:57'),
(2, 'Redmi', 'Redmi Note 7', 10999.00, './assets/products/2.png', '2020-03-28 11:08:57'),
(3, 'Redmi', 'Redmi Note 6', 12999.00, './assets/products/3.png', '2020-03-28 11:08:57'),
(4, 'Redmi', 'Redmi Note 5', 15999.00, './assets/products/4.png', '2020-03-28 11:08:57'),
(5, 'Redmi', 'Redmi Note 4', 10999.00, './assets/products/5.png', '2020-03-28 11:08:57'),
(6, 'Redmi', 'Redmi Note 8', 13999.00, './assets/products/6.png', '2020-03-28 11:08:57'),
(7, 'Redmi', 'Redmi Note 9', 14999.00, './assets/products/8.png', '2020-03-28 11:08:57'),
(8, 'Redmi', 'Redmi Note', 6999.00, './assets/products/10.png', '2020-03-28 11:08:57'),
(9, 'Samsung', 'Samsung Galaxy S6', 7999.00, './assets/products/11.png', '2020-03-28 11:08:57'),
(10, 'Samsung', 'Samsung Galaxy S7', 8999.00, './assets/products/12.png', '2020-03-28 11:08:57'),
(11, 'Apple', 'Apple iPhone 5', 24999.00, './assets/products/13.png', '2020-03-28 11:08:57'),
(12, 'Apple', 'Apple iPhone 6', 30999.00, './assets/products/14.png', '2020-03-28 11:08:57'),
(13, 'Apple', 'Apple iPhone 7', 40999.00, './assets/products/15.png', '2020-03-28 11:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `username`, `user_pass`, `register_date`) VALUES
(1, '', 'Daily', '', '2020-03-28 13:07:17'),
(2, '', 'Akshay', '', '2020-03-28 13:07:17'),
(5, 'arif1998154@gmail.com', 'Arif', '$2y$10$wMN7i9e/wkgu18LsW5Oa6uBCq3i/rkZZYdMU3gGaB/0n6g9zY44zG', NULL),
(6, 'arif@gmail.com', 'Hunter', '$2y$10$1gaEKWb/522yM6VO93/0cu7fkuTqWTri/caExFkWsSsq/6mN893q6', NULL),
(7, 'arifofficial1998@gmail.com', 'Rohan', '$2y$10$Sno5WHn0ImYJYYrUwV2HA.qGvh2116A42MEzZFoxOuvbg/V9NGmqe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`oderid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `oderid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
