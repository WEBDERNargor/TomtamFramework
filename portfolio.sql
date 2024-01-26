-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 02:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` float NOT NULL,
  `m_email` varchar(255) NOT NULL,
  `m_password` varchar(255) NOT NULL,
  `m_sult` varchar(4) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_auth` set('user','admin') NOT NULL DEFAULT 'user',
  `m_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_email`, `m_password`, `m_sult`, `m_name`, `m_auth`, `m_datetime`) VALUES
(3, 'tomhorrorza@gmail.com', '$2y$10$X//u2DVJdh/Ka14cMjjprOCPVGBLs7eam5hONdmPEQduNL9KUerFa', '2571', 'Ditsarut Sukkong', 'admin', '2023-09-09 03:17:59'),
(4, 'ditsarutsukkong@gmail.com', '$2y$10$7LYh9/YxvzJknD31iMuoi.fMpaj8JsHmQX1yJmeXnGroGbhJ8mQku', '391', 'ddd', 'user', '2023-09-09 03:21:44'),
(5, 'tomditsarut1@hotmail.com', '$2y$10$qTyw3BwH49Cb.6lvEQBmweZnbUAx/MZbjSRUAkcFGss4KjgKxocAm', '6534', 'Ditsarut Sukkong', 'user', '2023-10-20 19:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `p_id` float NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_detail` text NOT NULL DEFAULT '{}',
  `p_image` varchar(255) NOT NULL,
  `p_status` set('on','off') NOT NULL DEFAULT 'on',
  `p_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_id`, `p_name`, `p_title`, `p_detail`, `p_image`, `p_status`, `p_time`) VALUES
(27, 'Ditsarut Sukkong', 'คนดำ', '{\"time\":1697880981172,\"blocks\":[{\"id\":\"1qByHGEJJK\",\"type\":\"paragraph\",\"data\":{\"text\":\"การนอนที่ดีก็คือนอน\"}},{\"id\":\"pkjw_9zvB8\",\"type\":\"paragraph\",\"data\":{\"text\":\"นองหลัง\"}},{\"id\":\"MrQpR4vy4a\",\"type\":\"embed\",\"data\":{\"url\":\"https://www.youtube.com/embed/R8OjOViCMuM?si=Fa_EoHT5Q--DJUO3\",\"caption\":\"\"}},{\"id\":\"8GKcHYOsZQ\",\"type\":\"paragraph\",\"data\":{\"text\":\"fdgdfgdfgdfgdf\"}},{\"id\":\"pXVdZ1BmWf\",\"type\":\"paragraph\",\"data\":{\"text\":\"ghlgkh;lklk;lgkdgdfgdfg\"}}],\"version\":\"2.28.0\"}', 'http://localhost/project/uploads/1695215920.png', 'on', '2023-09-20 14:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `post_type`
--

CREATE TABLE `post_type` (
  `pt_id` float NOT NULL,
  `tp_id` float NOT NULL,
  `p_id` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_type`
--

INSERT INTO `post_type` (`pt_id`, `tp_id`, `p_id`) VALUES
(1, 1, 27);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` float NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_detail` text NOT NULL DEFAULT '[]',
  `product_price` float NOT NULL DEFAULT 0,
  `product_status` set('on','off') NOT NULL DEFAULT 'on',
  `product_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_title`, `product_detail`, `product_price`, `product_status`, `product_time`) VALUES
(1, 'ร้านค้าออนไลน์พร้อมระบบชำระเงิน', 'ร้านค้าออนไลน์พร้อมระบบชำระเงินจาก GBPRIME พร้อมใช้งานติดตั้งใช้ได้เลย', '[]', 6000, 'on', '2023-10-22 16:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `pimg_id` float NOT NULL,
  `pimg_use` set('on','off') NOT NULL DEFAULT 'off',
  `pimg_image` text NOT NULL,
  `product_id` float NOT NULL,
  `pimg_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`pimg_id`, `pimg_use`, `pimg_image`, `product_id`, `pimg_time`) VALUES
(1, 'on', 'https://fastly.picsum.photos/id/290/200/200.jpg?hmac=-TTlqENxUe4ZacR5I1zAWsw9xtd-MOFEPRWogmAIKsw', 1, '2023-10-22 16:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `type_post`
--

CREATE TABLE `type_post` (
  `tp_id` float NOT NULL,
  `tp_name` varchar(255) NOT NULL,
  `tp_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_post`
--

INSERT INTO `type_post` (`tp_id`, `tp_name`, `tp_time`) VALUES
(1, 'PHP', '2023-09-15 13:45:37'),
(2, 'JS', '2023-09-15 13:45:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `post_type`
--
ALTER TABLE `post_type`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`pimg_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `type_post`
--
ALTER TABLE `type_post`
  ADD PRIMARY KEY (`tp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `p_id` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `post_type`
--
ALTER TABLE `post_type`
  MODIFY `pt_id` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `pimg_id` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type_post`
--
ALTER TABLE `type_post`
  MODIFY `tp_id` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
