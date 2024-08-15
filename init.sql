-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 15, 2024 at 06:02 AM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u512687887_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` float NOT NULL,
  `m_id` float NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_type` set('narmal','profile','post') NOT NULL,
  `profile_use` set('on','off') NOT NULL DEFAULT 'off',
  `img_upload_at` datetime NOT NULL DEFAULT current_timestamp(),
  `thumbnail_use` set('on','off') NOT NULL DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `m_id`, `img_name`, `img_type`, `profile_use`, `img_upload_at`, `thumbnail_use`) VALUES
(1, 0, 'profile.webp', 'profile', 'off', '2024-07-19 00:00:00', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(11) NOT NULL,
  `m_socail_id` varchar(255) NOT NULL,
  `m_email` varchar(255) NOT NULL,
  `m_password` text NOT NULL,
  `m_sult` varchar(255) NOT NULL,
  `m_fname` varchar(255) NOT NULL,
  `m_lname` varchar(255) NOT NULL,
  `m_login_by` set('web','google','facebook','discord','vk') NOT NULL,
  `m_create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `m_auth` set('superadmin','admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_socail_id`, `m_email`, `m_password`, `m_sult`, `m_fname`, `m_lname`, `m_login_by`, `m_create_at`, `m_auth`) VALUES
(7, '', 'tomhorrorza@gmail.com', '$2y$10$3priHLdkxpdDUfRkKhdW4Oz0dnZXTGL5J9TlWeQ9AldEscyOWQ2IK', '689053', 'Ditsarut', 'Sukkong', 'web', '2024-08-08 10:01:27', 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
