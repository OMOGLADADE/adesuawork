-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 12:26 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adesua`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE `admin_panel` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `post` varchar(10000) NOT NULL,
  `status` varchar(5) NOT NULL,
  `approvedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`, `status`, `approvedby`) VALUES
(29, 'April-03-2022 04:11:52', 'The wonderful place called Aberdeen', 'Tourist attractions in Scotland', 'Adesua', 'img-1.jpg', 'The attractive North Sea port city of Aberdeen is well worth including on your Scotland travel itinerary. Like so many of the country\'s top city destinations, Aberdeen is a delightful place to explore on foot. Lacing up the walking shoes will not only allow you to explore its many fine examples of old, well-preserved architecture, but also to spend time in its many pleasant parks and gardens.\r\n\r\nA highlight of a self-guided walking tour is St. Machar\'s Cathedral. Built in the 1300s, it\'s one of the best-preserved examples of medieval architecture construction in Scotland. You\'ll also see many fine examples of old homes and merchant buildings made from the unique local granite that seems to sparkle in sunlight, giving the town its affectionate Silver City nickname.\r\n\r\nAberdeen has a second, equally complimentary nickname: \"The Flower of Scotland.\" And it\'s certainly well-deserved thanks to the presence of the city\'s many lovely green spaces, most notably the David Welch Winter Gardens at Duthie Park. Here, you can wander one of the biggest indoor gardens in all of Europe, home to numerous species of domestic and exotic plants. Set on some 44 acres, it\'s a wonderful place to explore, and in the warmer months makes a great picnic spot, especially during the park\'s concert season.\r\n\r\nOther places for a good walk include Aberdeen\'s two miles of beaches, around one of the many nearby golf courses, or simply up and down the Old High Street. Dating from the late 1400s, it\'s popular for its shopping and dining experiences.', 'ON', 'admin'),
(30, 'April-03-2022 04:13:18', 'Edinburgh in Spring', 'Tourist attractions in Scotland', 'Adesua', 'img-3.jpg', 'The attractive North Sea port city of Aberdeen is well worth including on your Scotland travel itinerary. Like so many of the country\'s top city destinations, Aberdeen is a delightful place to explore on foot. Lacing up the walking shoes will not only allow you to explore its many fine examples of old, well-preserved architecture, but also to spend time in its many pleasant parks and gardens.\r\n\r\nA highlight of a self-guided walking tour is St. Machar\'s Cathedral. Built in the 1300s, it\'s one of the best-preserved examples of medieval architecture construction in Scotland. You\'ll also see many fine examples of old homes and merchant buildings made from the unique local granite that seems to sparkle in sunlight, giving the town its affectionate Silver City nickname.\r\n\r\nAberdeen has a second, equally complimentary nickname: \"The Flower of Scotland.\" And it\'s certainly well-deserved thanks to the presence of the city\'s many lovely green spaces, most notably the David Welch Winter Gardens at Duthie Park. Here, you can wander one of the biggest indoor gardens in all of Europe, home to numerous species of domestic and exotic plants. Set on some 44 acres, it\'s a wonderful place to explore, and in the warmer months makes a great picnic spot, especially during the park\'s concert season.\r\n\r\nOther places for a good walk include Aberdeen\'s two miles of beaches, around one of the many nearby golf courses, or simply up and down the Old High Street. Dating from the late 1400s, it\'s popular for its shopping and dining experiences.', 'ON', 'admin'),
(31, 'April-03-2022 04:13:36', 'Lochness', 'Religious Places in Scotland', 'Adesua', 'img-4.jpg', 'The attractive North Sea port city of Aberdeen is well worth including on your Scotland travel itinerary. Like so many of the country\'s top city destinations, Aberdeen is a delightful place to explore on foot. Lacing up the walking shoes will not only allow you to explore its many fine examples of old, well-preserved architecture, but also to spend time in its many pleasant parks and gardens.\r\n\r\nA highlight of a self-guided walking tour is St. Machar\'s Cathedral. Built in the 1300s, it\'s one of the best-preserved examples of medieval architecture construction in Scotland. You\'ll also see many fine examples of old homes and merchant buildings made from the unique local granite that seems to sparkle in sunlight, giving the town its affectionate Silver City nickname.\r\n\r\nAberdeen has a second, equally complimentary nickname: \"The Flower of Scotland.\" And it\'s certainly well-deserved thanks to the presence of the city\'s many lovely green spaces, most notably the David Welch Winter Gardens at Duthie Park. Here, you can wander one of the biggest indoor gardens in all of Europe, home to numerous species of domestic and exotic plants. Set on some 44 acres, it\'s a wonderful place to explore, and in the warmer months makes a great picnic spot, especially during the park\'s concert season.\r\n\r\nOther places for a good walk include Aberdeen\'s two miles of beaches, around one of the many nearby golf courses, or simply up and down the Old High Street. Dating from the late 1400s, it\'s popular for its shopping and dining experiences.', 'ON', 'admin'),
(32, 'April-03-2022 04:13:50', 'St. Andrews', 'Religious Places in Scotland', 'Adesua', 'img-7.jpg', 'The attractive North Sea port city of Aberdeen is well worth including on your Scotland travel itinerary. Like so many of the country\'s top city destinations, Aberdeen is a delightful place to explore on foot. Lacing up the walking shoes will not only allow you to explore its many fine examples of old, well-preserved architecture, but also to spend time in its many pleasant parks and gardens.\r\n\r\nA highlight of a self-guided walking tour is St. Machar\'s Cathedral. Built in the 1300s, it\'s one of the best-preserved examples of medieval architecture construction in Scotland. You\'ll also see many fine examples of old homes and merchant buildings made from the unique local granite that seems to sparkle in sunlight, giving the town its affectionate Silver City nickname.\r\n\r\nAberdeen has a second, equally complimentary nickname: \"The Flower of Scotland.\" And it\'s certainly well-deserved thanks to the presence of the city\'s many lovely green spaces, most notably the David Welch Winter Gardens at Duthie Park. Here, you can wander one of the biggest indoor gardens in all of Europe, home to numerous species of domestic and exotic plants. Set on some 44 acres, it\'s a wonderful place to explore, and in the warmer months makes a great picnic spot, especially during the park\'s concert season.\r\n\r\nOther places for a good walk include Aberdeen\'s two miles of beaches, around one of the many nearby golf courses, or simply up and down the Old High Street. Dating from the late 1400s, it\'s popular for its shopping and dining experiences.', 'ON', 'admin'),
(33, 'April-03-2022 04:14:40', 'Stirling in Summer', 'Religious Places in Scotland', 'Adesua', 'img-5.jpg', 'The attractive North Sea port city of Aberdeen is well worth including on your Scotland travel itinerary. Like so many of the country\'s top city destinations, Aberdeen is a delightful place to explore on foot. Lacing up the walking shoes will not only allow you to explore its many fine examples of old, well-preserved architecture, but also to spend time in its many pleasant parks and gardens.\r\n\r\nA highlight of a self-guided walking tour is St. Machar\'s Cathedral. Built in the 1300s, it\'s one of the best-preserved examples of medieval architecture construction in Scotland. You\'ll also see many fine examples of old homes and merchant buildings made from the unique local granite that seems to sparkle in sunlight, giving the town its affectionate Silver City nickname.\r\n\r\nAberdeen has a second, equally complimentary nickname: \"The Flower of Scotland.\" And it\'s certainly well-deserved thanks to the presence of the city\'s many lovely green spaces, most notably the David Welch Winter Gardens at Duthie Park. Here, you can wander one of the biggest indoor gardens in all of Europe, home to numerous species of domestic and exotic plants. Set on some 44 acres, it\'s a wonderful place to explore, and in the warmer months makes a great picnic spot, especially during the park\'s concert season.\r\n\r\nOther places for a good walk include Aberdeen\'s two miles of beaches, around one of the many nearby golf courses, or simply up and down the Old High Street. Dating from the late 1400s, it\'s popular for its shopping and dining experiences.', 'ON', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `creatorname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `datetime`, `name`, `creatorname`) VALUES
(32, 'April-03-2022 02:07:26', 'Tourist attractions in Scotland', 'admin'),
(33, 'April-03-2022 02:07:57', 'Best restaurants in Scotland', 'admin'),
(34, 'April-03-2022 02:08:13', 'Best parks in Scotland', 'admin'),
(35, 'April-03-2022 02:08:26', 'Best Hotels in Scotland', 'admin'),
(36, 'April-03-2022 02:08:41', 'Religious Places in Scotland', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approvedby` varchar(200) NOT NULL,
  `status` varchar(5) NOT NULL,
  `admin_panel_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `feedback` varchar(20) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `addedby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `datetime`, `username`, `password`, `addedby`) VALUES
(6, 'July-26-2020 10:14:07', 'admin', '$2y$10$YzE0M2JkYWE4ZTZiYmVmN.oPsQRIEjs7blSwJ4J/x7tqKC9HFG.RO', ''),
(11, 'April-03-2022 02:09:44', 'Adesua', '$2y$10$N2QyMzE5NDNiYzEwNTVmNO2Xnw5xEOc3V0ptEvt3igx0ueIp4Myia', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(130) NOT NULL,
  `token` varchar(200) NOT NULL,
  `active` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `token`, `active`) VALUES
(15, 'Adesua', 'Adesua@gmail.com', '$2y$10$MDZmZmUxNjBjYmE3Mzc3MuHm1nzQwBkeYD56VcWxLrweEx2hbGduG', '7bc831d329228f67603f134f945cee91ea4f2b07233768b086b55b712a023c583ba40d410aa6fd29', 'ON');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_panel_id` (`admin_panel_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Foreign Key to admin_panel table` FOREIGN KEY (`admin_panel_id`) REFERENCES `admin_panel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
