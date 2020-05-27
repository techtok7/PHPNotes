-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2020 at 09:07 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `note_id` int(11) NOT NULL,
  `note_user` int(11) NOT NULL,
  `note_title` varchar(100) NOT NULL,
  `note_dis` varchar(500) NOT NULL,
  `note_users` varchar(1000) NOT NULL DEFAULT '[]'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`note_id`, `note_user`, `note_title`, `note_dis`, `note_users`) VALUES
(7, 1, 'hello', 'Hey \r\n', '[\"3\",\"4\",\"5\",\"6\",\"7\",\"9\"]'),
(8, 1, 'This is 8th', 'This is 8th', '[]'),
(9, 2, 'This  is 9th Note', 'hello', '[]'),
(10, 2, 'Solve it. And Send me Your Code', 'Again Error', '[]'),
(11, 1, 'hello', 'hellos', '[]'),
(12, 1, 'Hello\'s', 'Hii \"How Are You\" <h1>hello</h1>', '[]'),
(13, 1, 'new Update', 'Featueres', '[\"2\",\"3\",\"8\",\"9\"]'),
(14, 2, 'This is my Note(tech2)', 'i Shared to tech', '[\"1\"]'),
(15, 9, 'This is ', 'Test7', '[\"1\",\"2\",\"3\"]');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'tech', 'pass'),
(2, 'tech2', 'pass2'),
(3, 'test1', 'test'),
(4, 'test2\r\n                                           ', 'test'),
(5, 'test3', 'test'),
(6, 'test4', 'test'),
(7, 'test5', 'test'),
(8, 'test6', 'test'),
(9, 'test7', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
