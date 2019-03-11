-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2019 at 05:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `managebooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `standard` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `description`, `subject`, `standard`, `company_name`, `state`, `price`, `user_id`, `quantity`, `image`) VALUES
(1, 'MTG LEARNING COMPUTER FOR SMARTER LIFE 2', '<p>MTG Learning Computer for Smarter Life is a smart series of computer books for class 1 to 8. This series is designed to encourage the young mind and exposes them to various applications of computer in day to day life</p>', 'History', 4, 'sundaram', 'second_hand', 20, 1, 2, 'download.jpg'),
(2, 'MTG LEARNING COMPUTER FOR SMARTER LIFE 2', '<p>MTGï¿½s Learning Computer for Smarter Life is a smart series of computer books for class 1 to 8. This series is designed to encourage the young mind and exposes them to various applications of computer in day to day life</p>', 'civics', 10, 'navnit', 'second_hand', 450, 1, 10, 'images (1).jpg'),
(3, 'MTG LEARNING COMPUTER FOR SMARTER LIFE 2', 'MTG’s Learning Computer for Smarter Life is a smart series of computer books for class 1 to 8. This series is designed to encourage the young mind and exposes them to various applications of computer in day to day life', 'GEO', 2, 'navnit', 'second hand', 100, 4, 2, 'download (6).jpg'),
(8, 'Kum', 'Do you like to read? Everyone should like to read, there are too many wonderful books in this world worth our reading and thinking. Everyone has their own favorite books, but sometimes we want to read some random good books, this tool can help you. We have collected the most highly rated 1250 books, this page generate 6 books randomly each time, click Refresh to get new 6 books. Each book shows the author and year of publication.', 'sci', 1, 'Navnit', 'New', 400, 2, 1, 'download.jpg'),
(9, 'A Modest ProposalA Modest Proposal (Paperback)', '', 'a', 10, '', '0', 0, 2, 0, 'images (1).jpg'),
(10, 'A Modest ProposalA Modest Proposal (Paperback)', '<p>lorem</p>', 'science', 2, 'na', 'new', 220, 3, 2, 'download (5).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(11) NOT NULL,
  `empname` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `bloodgroup` varchar(50) NOT NULL,
  `contactinfo` bigint(50) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `doj` date NOT NULL,
  `address` text NOT NULL,
  `empimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`) VALUES
(1, 'users'),
(2, 'book_store'),
(3, 'company'),
(4, 'donor');

-- --------------------------------------------------------

--
-- Table structure for table `placed_orders`
--

CREATE TABLE `placed_orders` (
  `id` int(11) NOT NULL,
  `buyer_user` int(11) NOT NULL,
  `seller_user` int(11) NOT NULL,
  `placed_quantity` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placed_orders`
--

INSERT INTO `placed_orders` (`id`, `buyer_user`, `seller_user`, `placed_quantity`, `book_id`, `status`, `address`) VALUES
(1, 1, 3, 1, 2, 'Order Placed', 'ulhas 3'),
(2, 3, 5, 1, 1, 'Order Placed', 'ulhasnagar =5'),
(3, 2, 4, 1, 1, 'Order Placed', 'ulhas'),
(4, 4, 6, 1, 2, 'Order Placed', 'cst'),
(5, 6, 8, 1, 3, 'Order Placed', 'dadar'),
(6, 8, 2, 1, 1, 'Order Placed', 'kurla'),
(7, 1, 7, 1, 3, 'Order Placed', 'mulund');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_type`, `image`) VALUES
(1, 'tarun.kachhela2000@gmail.com', '$2y$10$/PEpKE8xjK3gZGHfUpCdkOqktvVesHiAWOkcHnjn2JBjOw7ao4X62', '4', ''),
(2, 't@gmai.com', '$2y$10$EyiVkbFWZKJDd6KNKIna.ecoDud54pnmWrIUv4I1p4Q5Adzm4nvGq', '1', ''),
(3, 'p@gmail.com', '$2y$10$fgvwPzPsWxl3SGh1vNf5leZAO2INJhrXKNWki.44k264eTa/0pVTO', '1', ''),
(4, 'rohi@gmail.com', '$2y$10$iNolfsObH6CUJmdmnFi3EeOjzke0.S7g2.Y.7aZ8wRE8i/I7Bjszq', '2', ''),
(5, 'kachhela@gmail.com', '$2y$10$uAGxxE7.Oy1J8607JVLrtOKY04RTbWrG1IJIeeWng5UjOgTt7wvfC', '2', ''),
(6, 'nikhil@gmail.com', '$2y$10$yaUL7BozkzcLPhfx3gr8lO0A5Hk9694NzTfi0jnp58cnGEDbOUuLO', '3', ''),
(7, 'siya@gmail.com', '$2y$10$wx3auMEB4bGZZcW/bcu5R.rK8elByREFoT3lFOkiamJtItYX2YLIy', '3', ''),
(8, 'mohit@gmail.com', '$2y$10$Fg1MIuuTMRX..xDJaQk3xOGHYRnRElXINrfzPKaY8piDb9748Zi8y', '4', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placed_orders`
--
ALTER TABLE `placed_orders`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `placed_orders`
--
ALTER TABLE `placed_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
