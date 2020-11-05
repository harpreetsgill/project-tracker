-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 05, 2020 at 11:52 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projtracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `course_color_code` text NOT NULL,
  `course_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_color_code`, `course_user_id`) VALUES
(41, 'Test', '#fc9877', 24);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `proj_id` int(11) NOT NULL,
  `proj_title` text,
  `proj_desc` text,
  `proj_duedate` date DEFAULT NULL,
  `proj_startdate` date DEFAULT NULL,
  `proj_duetime` time DEFAULT NULL,
  `proj_course_code` text NOT NULL,
  `proj_status_id` int(11) NOT NULL,
  `proj_prior_id` int(11) NOT NULL,
  `proj_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`proj_id`, `proj_title`, `proj_desc`, `proj_duedate`, `proj_startdate`, `proj_duetime`, `proj_course_code`, `proj_status_id`, `proj_prior_id`, `proj_user_id`) VALUES
(61, 'Test', 'Test', '2020-11-17', '2020-11-16', '07:44:00', '#fc9877', 1, 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` tinytext NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`) VALUES
(23, 'Alpha', '$2y$10$CF7elafFCW6C3HP4tjmI2.8U37UcLQbFv6DOW7pnR.lB6qosX9t0O'),
(24, 'Beta', '$2y$10$7yzn1dK0bfUj4fDfKPJgn.ds6StwaPKKSYsUGtp.aVqSuqEsd3E0W'),
(25, 'Charlie', '$2y$10$BKOd.J5EOdPbdxf4mXhTAe6qOQbEjnwVF2SVwazAr1ww96hOx6Zvy'),
(26, 'delta', '$2y$10$d0hDezAI7wLKVzB1fzBgA.LEExi1yR/WgYRxRUojyTt.KnIXdasP2'),
(27, 'echo', '$2y$10$2cimJAPvuuEenerFUCO55eNwt.KzKnI7qOif2H8WlFoB.DoifXjei'),
(28, 'fire', '$2y$10$cZWFek9azFrtEWkAtS.9Qu./1VgbEPSUcLqJY.AKzPM3Kq3ypFfIO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`proj_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
