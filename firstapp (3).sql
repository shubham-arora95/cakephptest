-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2016 at 08:16 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `writer`, `edition`, `course`, `description`, `price`, `status`, `user_id`, `photo`) VALUES
(25, 'Java The Complete Reference', 'Mc Hill', 'Ninth', 'B.tech CSE', 'Book for Java', 600, 0, 2, 'Jellyfish.jpg'),
(26, 'C++', 'E balaguruswamy', '3rd', 'B.tech CSE', 'Book for C+gfjfgjh gfhfghty', 300, 0, 2, 'Koala.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `transaction_id`, `book_id`, `borrower_id`, `owner_id`, `Weeks`, `ownerAck`, `rentPaid`, `created`, `payment_date`) VALUES
(61, 69, 25, 1, 2, 2, 4, 1, '2016-07-21 07:36:41', '2016-07-21 13:09:57'),
(62, 70, 25, 1, 2, 3, 4, 1, '2016-07-22 05:38:50', '2016-07-22 11:10:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `request_id`, `book_id`, `status`, `owner_id`, `borrower_id`, `issue_date`, `return_date`, `random`) VALUES
(69, 61, 25, 0, 2, 1, '2016-07-21 13:09:57', '2016-08-04 13:09:57', 'aba0914'),
(70, 62, 25, 3, 2, 1, '2016-07-22 11:10:58', '2016-08-12 11:10:58', '310366d');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
