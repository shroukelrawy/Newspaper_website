-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2024 at 10:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(5, 'Travel'),
(6, 'Science'),
(7, 'Health'),
(9, 'Business'),
(10, 'Politics'),
(11, 'Corporate'),
(12, 'Education'),
(13, 'Foods');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(10) UNSIGNED NOT NULL,
  `newsdate` date NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(200) NOT NULL,
  `active` enum('YES','NO','','') NOT NULL,
  `newsimage` blob NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `newsdate`, `title`, `content`, `author`, `active`, `newsimage`, `user_id`, `category_id`) VALUES
(6, '2024-03-03', 'LOREM IPSUM DOLOR ', 'Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem. \r\n', 'John Doe', 'YES', 0x6e6577732d373030783433352d342e6a7067, 5, 9),
(7, '2024-03-04', 'Voluptua est takimata ', 'vero stet consetetur elitr takimata rebum sanctus. Sit sed accusam stet sit nonumy kasd diam dolores. ', 'Mohamed', 'YES', 0x6e6577732d373030783433352d352e6a7067, 5, 10),
(8, '2024-03-05', 'Lorem ipsum dolor ', 'Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd', 'jody', 'YES', 0x6e6577732d373030783433352d322e6a7067, 5, 6),
(9, '2024-03-06', 'Ipsum sit gubergren dolores', 'Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem.', 'Hala', 'YES', 0x6e6577732d373030783433352d332e6a7067, 5, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `register_date` date NOT NULL,
  `active` enum('YES','NO','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `email`, `password`, `register_date`, `active`) VALUES
(1, 'aly mohamed', 'aly', 'aly@ddd.hjk', '67889', '2024-03-01', 'YES'),
(5, 'Shrouk Abd Elmoez ', 'shrouk', 'hh@oiu.com', '7878768', '2024-03-01', 'YES'),
(6, 'omar mohamed', 'omr', 'omr@fghk.ghjk', '97657788', '2024-03-01', 'YES'),
(7, 'hala', 'hhh', 'hala@hhh.kkk', '5688987', '2024-03-01', 'YES'),
(8, 'omr', 'omr', 'omr@fghk.ghjk', '76764323', '2024-03-01', 'YES'),
(9, 'adam', 'adam', 'adam@jjk.nom', '666666', '2024-03-01', 'YES'),
(10, 'yassen', 'yassen', 'yassen@jjk.nom', '77777777', '2024-03-01', 'YES'),
(11, 'malak', 'malak', 'malak@fgh.njj', '556778', '2024-03-01', 'YES'),
(13, 'jody', 'jody', 'jody@ddd.hjk', '555566', '2024-03-01', 'YES'),
(14, 'test', 'hhh', 'hala@hhh.kkk', '5688987', '2024-03-01', 'YES'),
(18, 'hala', 'hhh', 'hala@hhh.kkk', '986554', '2024-03-01', 'YES'),
(20, 'nonyy', 'nona', 'dfg@ghjk.jkk', '678899', '2024-03-01', 'YES'),
(23, 'test', 'test', 'test@ttt.com', '888888', '2024-03-06', 'YES'),
(24, 'aya', 'aya', 'aya@test.com', '567788', '2024-03-06', 'YES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`Category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
