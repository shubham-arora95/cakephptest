-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2016 at 07:03 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_app`
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
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `writer`, `edition`, `course`, `description`, `price`, `status`, `user_id`) VALUES
(15, 'NEW BOOK', 'ABCD', '12', 'B.Tech', 'description 1213456789', 300, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `transaction_id`, `book_id`, `borrower_id`, `owner_id`, `Weeks`, `ownerAck`, `rentPaid`, `created`, `payment_date`) VALUES
(41, 52, 15, 2, 1, 2, 0, 0, '2016-07-08 10:23:50', '2016-07-12 22:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL,
  `review` text NOT NULL,
  `book_id` int(11) NOT NULL
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `request_id`, `book_id`, `status`, `owner_id`, `borrower_id`, `issue_date`, `return_date`, `random`) VALUES
(49, 41, 15, 0, 1, 2, '2016-07-08 15:55:21', '2016-07-22 15:55:21', 'a91a50a'),
(50, 41, 15, 0, 1, 2, '2016-07-08 15:59:10', '2016-07-22 15:59:10', '98b17f0'),
(51, 41, 15, 0, 1, 2, '2016-07-08 16:08:00', '2016-07-22 16:08:00', 'e254990'),
(52, 41, 15, 0, 1, 2, '2016-07-12 22:58:42', '2016-07-26 22:58:42', '66f041e');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `name` varchar(265) NOT NULL,
  `email` varchar(265) NOT NULL,
  `password` varchar(265) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `created`, `modified`) VALUES
(1, 1, 'Shubham1', 'arora.shubham95@gmail.com', '$2y$10$Oa0OhSyTj46/lq3pCRAjke31MIslhhmN1S.zONJNNm5asuYsQBT7.', '2016-06-21 08:01:44', '2016-06-22 10:37:45'),
(2, 0, 'Shubham2', 'arora.shubham96@gmail.com', '$2y$10$fCDml9f8SwUci29fVTk9OuRA59npsM96T0w3OI7Hjj3s31pHyrNJG', '2016-06-21 10:27:38', '2016-06-22 10:37:51'),
(3, 0, 'Shubham3', 'arora.shubham97@gmail.com', '$2y$10$fWmy7.nFAImzPb6axMDJNuoUF6zXJWBF30jEAsC8i4owLoDRpIOja', '2016-06-22 07:08:59', '2016-06-22 10:37:58');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
