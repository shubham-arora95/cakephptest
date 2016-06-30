-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2016 at 01:25 PM
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
  `is_borrowed` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `writer`, `edition`, `course`, `description`, `price`, `is_borrowed`, `user_id`) VALUES
(1, 'finearts', 'abcd', '2', 'b.tech', 'book for finearts in english', 250, 0, 0),
(2, 'C++', 'E balaguruswamy', '3rd', 'B.tech CSE', 'Very good book for C++', 300, 0, 0),
(3, 'new book', 'abcd', '11', 'B.tech CSE', 'abcd1234567890', 500, 1, 1),
(4, 'new book2', 'abcd', '2', 'B.tech CSE', 'abcd1234', 200, 0, 2),
(5, 'C++', 'E balaguruswamy', '3rd', 'b.tech', 'abcd1234 test desc 1', 300, 1, 1),
(7, 'new book for user_id test', 'abcd', '11', 'b.tech', 'abcd1234', 300, 0, 1),
(8, 'new book2 for user_id test', 'E balaguruswamy', '11', 'B.tech CSE', 'dfertgrshgrst', 250, 0, 3),
(9, 'logging testing', 'abcd', '11', 'B.tech CSE', 'abcd 1234567890000', 200, 0, 1),
(10, 'logging testing', 'abcd', '11', 'B.tech CSE', 'abcd 1234567890000', 200, 0, 1),
(11, 'logging testing', 'abcd', '11', 'B.tech CSE', 'abcd 1234567890000', 200, 0, 1),
(12, 'logging testing', 'abcd', '11', 'B.tech CSE', 'abcd 1234567890000', 200, 0, 1),
(13, 'logging testing', 'abcd', '11', 'B.tech CSE', 'abcd 1234567890000', 200, 0, 1),
(14, 'logging testing', 'abcd', '11', 'B.tech CSE', 'abcd 1234567890000', 200, 0, 1);

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
  `name` varchar(255) NOT NULL DEFAULT '',
  `controller` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `controller`, `action`, `created`, `modified`) VALUES
(1, 'List All Books', 'Books', 'index', '2016-06-24 07:30:12', '2016-06-24 07:30:12'),
(2, 'My Books', 'Books', 'myBooks', '2016-06-24 07:30:52', '2016-06-24 07:30:52'),
(3, 'Share Book', 'Books', 'add', '2016-06-24 08:56:09', '2016-06-24 08:59:06'),
(4, 'Add Review', 'Reviews', 'add', '2016-06-24 08:57:04', '2016-06-24 08:57:04'),
(5, 'Add Menu', 'Menus', 'add', '2016-06-24 09:00:31', '2016-06-24 09:00:31'),
(6, 'Home', 'home', 'index', '2016-06-24 11:19:35', '2016-06-24 11:19:35'),
(7, 'Borrow Book', 'Books', 'searchBook', '2016-06-28 06:22:35', '2016-06-28 06:22:35');

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
  `book_id` int(11) NOT NULL,
  `borrowerid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Weeks` int(11) NOT NULL,
  `ownerAck` tinyint(1) NOT NULL,
  `rentPaid` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `book_id`, `borrowerid`, `user_id`, `Weeks`, `ownerAck`, `rentPaid`) VALUES
(1, 4, 1, 2, 1, 0, 0),
(2, 4, 1, 2, 1, 0, 0),
(3, 4, 1, 2, 3, 0, 0),
(4, 4, 1, 2, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL,
  `review` text NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `book_id`) VALUES
(1, 'abcd1234', 0),
(3, 'abcd review', 6),
(4, 'abcd test review 1for item new book2', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `book_id`, `issue_date`, `return_date`) VALUES
(1, 1, 4, '0000-00-00', '0000-00-00'),
(2, 1, 8, '2016-06-28', '2016-06-28'),
(3, 1, 4, '2016-06-28', '2016-06-28'),
(4, 1, 4, '2016-06-30', '2016-06-30'),
(5, 1, 8, '2016-06-30', '2016-06-30');

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
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created`, `modified`) VALUES
(1, 'Shubham1', 'arora.shubham95@gmail.com', '$2y$10$Oa0OhSyTj46/lq3pCRAjke31MIslhhmN1S.zONJNNm5asuYsQBT7.', '2016-06-21 08:01:44', '2016-06-22 10:37:45'),
(2, 'Shubham2', 'arora.shubham96@gmail.com', '$2y$10$fCDml9f8SwUci29fVTk9OuRA59npsM96T0w3OI7Hjj3s31pHyrNJG', '2016-06-21 10:27:38', '2016-06-22 10:37:51'),
(3, 'Shubham3', 'arora.shubham97@gmail.com', '$2y$10$fWmy7.nFAImzPb6axMDJNuoUF6zXJWBF30jEAsC8i4owLoDRpIOja', '2016-06-22 07:08:59', '2016-06-22 10:37:58');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
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
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
