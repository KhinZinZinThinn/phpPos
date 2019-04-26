-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2019 at 04:30 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `myOrder`
--

CREATE TABLE `myOrder` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myOrder`
--

INSERT INTO `myOrder` (`id`, `customer`, `created_at`) VALUES
(1, 'Zin Zin', '2018-08-25 14:30:10'),
(2, 'Su Su', '2018-08-25 14:31:00'),
(3, 'Zin Zin', '2018-08-25 14:33:59'),
(4, 'Mg Mg', '2018-08-26 10:29:42'),
(5, 'Khin Zin Zin Thinn', '2018-08-26 11:53:01'),
(6, 'Aye Aye', '2018-08-26 11:55:38'),
(7, 'Zin', '2019-01-02 21:30:40'),
(8, 'ZZ', '2019-01-04 11:10:04'),
(9, 'xx', '2019-01-04 11:13:41'),
(10, 'cc', '2019-01-04 11:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `item_name`, `price`, `qty`, `order_id`) VALUES
(1, 'Strawberry', 800, 1, 1),
(2, 'Pineapple', 1000, 1, 2),
(3, 'Watermelon', 1500, 1, 2),
(4, 'Strawberry', 800, 2, 2),
(5, 'Strawberry', 800, 1, 3),
(6, 'Pineapple', 1000, 1, 3),
(7, 'Apple', 700, 4, 3),
(8, 'Strawberry', 800, 3, 4),
(9, 'Pineapple', 1000, 1, 4),
(10, 'Noodle', 1500, 2, 4),
(11, 'Lemon', 200, 2, 4),
(12, 'Apple', 700, 1, 4),
(13, 'Chicken', 2800, 1, 4),
(14, 'Apple', 700, 1, 5),
(15, 'Lemon', 200, 1, 5),
(16, 'Pineapple', 1000, 2, 6),
(17, 'Watermelon', 1500, 1, 6),
(18, 'Strawberry', 800, 1, 6),
(19, 'Apple', 700, 1, 6),
(20, 'Lemon', 200, 1, 6),
(21, 'Noodle', 1500, 1, 6),
(22, 'Pineapple', 1000, 1, 7),
(23, 'Pineapple', 1000, 1, 8),
(24, 'Strawberry', 800, 1, 9),
(25, 'Chicken', 2800, 1, 9),
(26, 'Noodle', 1500, 1, 9),
(27, 'AA', 1500, 1, 10),
(28, 'Apple', 700, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `images` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `price`, `user_id`, `images`, `created_at`) VALUES
(6, 'Strawberry', 800, 4, 'index.jpeg', '2018-08-11 12:15:25'),
(7, 'Chicken', 2800, 6, 'food2.jpeg', '2018-08-12 12:12:10'),
(8, 'Noodle', 1500, 6, 'food3.jpeg', '2018-08-11 14:06:37'),
(9, 'Lemon', 200, 6, 'lemon.jpeg', '2018-08-12 09:24:11'),
(10, 'Apple', 700, 7, 'apple.jpg', '2018-08-25 10:52:21'),
(11, 'AA', 1500, 8, 'ZEPETO_-8586569282984428418.png', '2019-01-04 11:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Aye Aye', 'ayeaye@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-08-04 14:20:24'),
(2, 'Mya Mya', 'myamya@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2018-08-04 14:22:46'),
(3, 'Ko Ko', 'koko@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-08-04 14:34:27'),
(4, 'Su Su', 'susu@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-08-04 14:47:41'),
(5, 'Apple', 'apple@gmail.com', '96e79218965eb72c92a549dd5a330112', '2018-08-04 14:49:59'),
(6, 'Zin Zin', 'zinzin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2018-08-05 11:09:34'),
(7, 'Khin Zin Zin Thinn', 'khinzinzinthinn@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2018-08-05 11:11:26'),
(8, 'Zin Zin', 'khinzinzinthinn1@gmail.com', '1bbd886460827015e5d605ed44252251', '2019-01-04 11:11:09'),
(9, 'Aung Aung', 'aung@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-02-03 13:23:31'),
(10, 'Ei Moe', 'eimoe@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-02-13 10:39:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myOrder`
--
ALTER TABLE `myOrder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myOrder`
--
ALTER TABLE `myOrder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
