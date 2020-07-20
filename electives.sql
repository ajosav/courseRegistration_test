-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 08:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_recommender`
--

-- --------------------------------------------------------

--
-- Table structure for table `electives`
--

CREATE TABLE IF NOT EXISTS `electives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_count` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `electives`
--

INSERT INTO `electives` (`id`, `course_code`, `session_id`, `title`, `reg_count`, `faculty`, `created_at`, `updated_at`) VALUES
(1, 'SER001', 1, 'use of English', '2', 'general', NULL, NULL),
(2, 'SEA001', 1, '', '1', 'administration', NULL, NULL),
(3, 'SEA002', 2, '', '1', 'administration', NULL, NULL),
(4, 'SEO001', 1, 'fundamentals of human behaviour', '2', 'social sciences', NULL, NULL),
(5, 'SEO002', 2, 'man and his environment', '1', 'social sciences', NULL, NULL),
(6, 'SEO003', 1, 'principle and practice of entepreneurship', '4', 'social sciences', NULL, NULL),
(7, 'SEG001', 1, 'human and its biological environment', '1', 'agriculture', NULL, NULL),
(8, 'SEO004', 2, 'business environment and approaches to business startup', '1', 'social sciences', NULL, NULL),
(9, 'SEG002', 2, 'food for the nation', '1', 'agriculture', NULL, NULL),
(10, 'SEE001', 1, 'indigenous education in Nigeria', '1', 'education', NULL, NULL),
(11, 'SER002', 2, 'history of africa', '1', 'arts', NULL, NULL),
(12, 'SEL001', 1, 'introduction to law', '1', 'law', NULL, NULL),
(13, 'SEL002', 2, 'introduction to legal institution and processes', '1', 'law', NULL, NULL),
(14, 'SEP001', 1, 'drug and society I', '1', 'pharmacy', NULL, NULL),
(15, 'SEP002', 2, 'drug and society II', '1', 'pharmacy', NULL, NULL),
(16, 'SEH001', 1, 'man and his health', '1', 'health sciences', NULL, NULL),
(17, 'SED001', 1, '', '1', 'dentistry', NULL, NULL),
(18, 'SES001', 1, '', '1', 'science', NULL, NULL),
(19, 'SES002', 2, '', '2', 'science', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `electives`
--
ALTER TABLE `electives`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `electives`
--
ALTER TABLE `electives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
