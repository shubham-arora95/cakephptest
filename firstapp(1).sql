-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2016 at 02:16 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `firstapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL,
  `title` varchar(265) NOT NULL,
  `writer` varchar(265) NOT NULL,
  `edition` varchar(265) NOT NULL,
  `course` varchar(265) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `writer`, `edition`, `course`, `description`, `price`, `status`, `user_id`, `photo`) VALUES
(22, '19-7 final 1st test', '19-7 final 1st test writer', '2', 'B.tech CSE', 'dnfcjivhfdkvgfhgh', 100, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `booksavailable`
--

CREATE TABLE IF NOT EXISTS `booksavailable` (
  `id` int(11) NOT NULL,
  `title` varchar(265) NOT NULL,
  `writer` varchar(265) NOT NULL,
  `edition` varchar(265) NOT NULL,
  `course` varchar(265) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `is_borrowed` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booksavailable`
--

INSERT INTO `booksavailable` (`id`, `title`, `writer`, `edition`, `course`, `description`, `price`, `is_borrowed`) VALUES
(1, 'finearts', 'abcd', '2', 'b.tech', 'book for finearts in english', 250, 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_transactions`
--

CREATE TABLE IF NOT EXISTS `book_transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_date` datetime NOT NULL,
  `return_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) unsigned NOT NULL,
  `place` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `controller` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `place`, `name`, `controller`, `action`, `created`, `modified`) VALUES
(2, 3, 'My Books', 'Books', 'myBooks', '2016-06-24 07:30:52', '2016-07-05 04:37:11'),
(3, 1, 'Share Book', 'Books', 'add', '2016-06-24 08:56:09', '2016-07-05 04:36:28'),
(4, 4, 'Add Review', 'Reviews', 'add', '2016-06-24 08:57:04', '2016-07-05 04:37:32'),
(5, 20, 'Add Menu', 'Menus', 'add', '2016-06-24 09:00:31', '2016-07-07 05:32:05'),
(6, 0, 'Home', 'home', 'index', '2016-06-24 11:19:35', '2016-06-24 11:19:35'),
(7, 2, 'Borrow Book', 'Books', 'searchBook', '2016-06-28 06:22:35', '2016-07-05 04:36:52'),
(10, 8, 'My Transactions', 'transactions', 'index', '2016-07-07 05:33:11', '2016-07-07 05:33:11'),
(11, 9, 'My Payments', 'requests', 'payments', '2016-07-07 11:14:09', '2016-07-07 11:14:09'),
(12, 5, 'My Requests', 'requests', 'index', '2016-07-12 17:51:54', '2016-07-12 17:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(265) NOT NULL,
  `body` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `Weeks` int(11) NOT NULL,
  `ownerAck` int(1) NOT NULL,
  `rentPaid` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `transaction_id`, `book_id`, `borrower_id`, `owner_id`, `Weeks`, `ownerAck`, `rentPaid`, `created`, `payment_date`) VALUES
(54, 63, 22, 2, 1, 2, 4, 1, '2016-07-19 11:54:04', '2016-07-19 17:26:19'),
(55, 64, 22, 2, 1, 3, 4, 1, '2016-07-19 11:58:48', '2016-07-19 17:29:09'),
(56, 0, 22, 2, 1, 1, 3, 0, '2016-07-20 06:18:27', '0000-00-00 00:00:00'),
(57, 65, 22, 2, 1, 2, 4, 1, '2016-07-20 06:46:17', '2016-07-20 12:16:48'),
(58, 66, 22, 2, 1, 2, 4, 1, '2016-07-20 06:48:30', '2016-07-20 12:18:54'),
(59, 67, 23, 2, 1, 2, 4, 1, '2016-07-20 08:32:15', '2016-07-20 14:03:29'),
(60, 68, 23, 2, 1, 1, 4, 1, '2016-07-20 10:09:02', '2016-07-20 15:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `review` text NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `issue_date` datetime NOT NULL,
  `return_date` datetime NOT NULL,
  `random` varchar(265) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `request_id`, `book_id`, `status`, `owner_id`, `borrower_id`, `issue_date`, `return_date`, `random`) VALUES
(63, 54, 22, 3, 1, 2, '2016-07-19 17:26:19', '2016-08-02 17:26:19', 'e649284'),
(64, 55, 22, 3, 1, 2, '2016-07-19 17:29:09', '2016-08-09 17:29:09', 'e140dba'),
(65, 57, 22, 3, 1, 2, '2016-07-20 12:16:48', '2016-08-03 12:16:48', 'ac65fa3'),
(66, 58, 22, 0, 1, 2, '2016-07-20 12:18:54', '2016-08-03 12:18:54', '5557b67'),
(67, 59, 23, 3, 1, 2, '2016-07-20 14:03:29', '2016-08-03 14:03:29', '15a676c'),
(68, 60, 23, 3, 1, 2, '2016-07-20 15:40:11', '2016-07-27 15:40:11', '2d95666');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(265) NOT NULL,
  `email` varchar(265) NOT NULL,
  `password` varchar(265) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `phone` int(10) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created`, `modified`, `phone`, `address`, `photo`) VALUES
(1, 'Shubham1', 'arora.shubham95@gmail.com', '$2y$10$fCDml9f8SwUci29fVTk9OuRA59npsM96T0w3OI7Hjj3s31pHyrNJG', '2016-06-21 08:01:44', '2016-07-20 09:59:42', 5, 'vdvrrrrrrrfggggggggg', 'Penguins.jpg'),
(2, 'Shubham2', 'arora.shubham96@gmail.com', '$2y$10$fCDml9f8SwUci29fVTk9OuRA59npsM96T0w3OI7Hjj3s31pHyrNJG', '2016-06-21 10:27:38', '2016-07-20 11:26:16', 15, 'dsdfdgvfg', 'Penguins.jpg'),
(3, 'Shubham3', 'arora.shubham97@gmail.com', '$2y$10$fWmy7.nFAImzPb6axMDJNuoUF6zXJWBF30jEAsC8i4owLoDRpIOja', '2016-06-22 07:08:59', '2016-06-22 10:37:58', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booksavailable`
--
ALTER TABLE `booksavailable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_transactions`
--
ALTER TABLE `book_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `booksavailable`
--
ALTER TABLE `booksavailable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book_transactions`
--
ALTER TABLE `book_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
