-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 08:02 AM
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
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prerequisite` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` int(11) NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `option_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_count` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_title`, `prerequisite`, `unit`, `group_id`, `option_id`, `part_id`, `session_id`, `description`, `reg_count`, `created_at`, `updated_at`) VALUES
(2, 'MTH 101', 'Elementary mathematics I', NULL, 5, 3, 4, 1, 1, NULL, 0, '2020-01-28 15:47:54', '2020-01-28 18:22:54'),
(3, 'PHY 101', 'General Physics I', NULL, 3, 3, 4, 1, 1, NULL, 0, '2020-01-28 17:20:56', '2020-01-28 18:22:39'),
(4, 'PHY 107', 'Experimental Physics IA', NULL, 1, 3, 4, 1, 1, NULL, 0, '2020-01-28 17:21:41', '2020-01-28 18:22:25'),
(5, 'CHM 101', 'Introductory Chemistry I', NULL, 4, 3, 4, 1, 1, NULL, 0, '2020-01-28 17:24:21', '2020-01-28 18:22:04'),
(6, 'CHM 103', 'Practical Chemistry I', NULL, 1, 3, 4, 1, 1, NULL, 0, '2020-01-28 17:26:05', '2020-01-28 18:21:24'),
(7, 'CSC 101', 'Introduction to Computing I', NULL, 2, 3, 4, 1, 1, NULL, 0, '2020-01-28 17:27:29', '2020-01-28 18:21:10'),
(8, 'TPD 101', 'Engineers in Society', NULL, 1, 3, 4, 1, 1, NULL, 0, '2020-01-28 17:29:16', '2020-01-28 18:20:59'),
(9, 'MTH 102', 'Elementary mathematics II', NULL, 5, 3, 4, 1, 2, NULL, 0, '2020-01-28 17:30:29', '2020-01-28 18:20:47'),
(10, 'MTH 104', 'Vector', NULL, 2, 3, 4, 1, 2, NULL, 0, '2020-01-28 17:31:09', '2020-01-28 18:20:39'),
(11, 'PHY 102', 'General Physics II', NULL, 3, 3, 4, 1, 2, NULL, 0, '2020-01-28 17:31:45', '2020-01-28 18:20:30'),
(12, 'PHY 108', 'Experimental Physics IB', NULL, 1, 3, 4, 1, 2, NULL, 0, '2020-01-28 17:32:35', '2020-01-28 18:20:20'),
(13, 'CHM 102', 'Introductory Chemistry II', NULL, 4, 3, 4, 1, 1, NULL, 0, '2020-01-28 17:33:34', '2020-01-28 18:20:10'),
(14, 'CHM 104', 'Practical Chemistry II', NULL, 1, 3, 4, 1, 2, NULL, 0, '2020-01-28 17:35:21', '2020-01-28 18:19:57'),
(15, 'CSC 102', 'Introduction to Computing II', NULL, 2, 3, 4, 1, 2, NULL, 0, '2020-01-28 18:04:45', '2020-01-28 18:19:47'),
(16, 'CSC 201', 'Computer Programming I', NULL, 3, 3, 4, 2, 1, NULL, 0, '2020-01-28 18:25:14', '2020-01-28 18:25:14'),
(17, 'CPE 203', 'Introduction to Digital Computer System I', NULL, 2, 3, 4, 2, 1, NULL, 0, '2020-01-28 18:26:23', '2020-01-28 18:26:23'),
(18, 'MTH 201', 'Mathematical Methods I', 'MTH 102', 4, 3, 4, 2, 1, NULL, 0, '2020-01-28 18:27:23', '2020-01-28 18:27:23'),
(19, 'MEE 203', 'Engineering Drawing I', NULL, 2, 3, 4, 2, 1, NULL, 0, '2020-01-28 18:28:03', '2020-01-28 18:28:03'),
(20, 'MEE 205', 'Engineering Mechanics I', NULL, 3, 3, 1, 2, 1, NULL, 0, '2020-01-28 18:28:48', '2020-01-28 18:28:48'),
(21, 'CHE 201', 'Intro. to Thermodynamics', NULL, 3, 3, 1, 2, 1, NULL, 0, '2020-01-28 18:29:39', '2020-01-28 18:29:39'),
(22, 'EEE 201', 'Applied Electricity I', 'PHY 102', 2, 3, 1, 2, 1, NULL, 0, '2020-01-28 18:30:52', '2020-01-28 18:30:52'),
(23, 'EEE 291', 'Applied Electricity Lab. I', NULL, 1, 3, 1, 2, 1, NULL, 0, '2020-01-28 18:33:17', '2020-01-28 18:33:17'),
(24, 'CSC 202', 'Computer Programming II', 'CSC 201', 2, 3, 4, 2, 2, NULL, 0, '2020-01-28 18:36:20', '2020-01-28 18:36:20'),
(25, 'CPE 204', 'Introduction to Digital Computer System II', 'CPE 203', 2, 3, 4, 2, 2, NULL, 0, '2020-01-28 18:38:08', '2020-01-28 18:38:08'),
(26, 'MTH 202', 'Mathematical Methods II', 'MTH 201', 4, 3, 4, 2, 2, NULL, 0, '2020-01-28 18:38:55', '2020-01-28 18:38:55'),
(27, 'MEE 204', 'Engineering Drawing II', 'MEE 203', 2, 3, 4, 2, 2, NULL, 0, '2020-01-28 18:39:40', '2020-01-28 18:39:40'),
(28, 'MEE 206', 'Engineering Mechanics II', 'MEE 205', 2, 3, 1, 2, 2, NULL, 0, '2020-01-28 18:40:31', '2020-01-28 18:40:31'),
(29, 'AGE 202', 'Workshop Practice', NULL, 2, 3, 1, 2, 2, NULL, 0, '2020-01-28 18:41:17', '2020-01-28 18:41:17'),
(30, 'EEE 202', 'Applied Electricity II', 'EEE 201', 2, 3, 1, 2, 2, NULL, 0, '2020-01-28 18:42:40', '2020-01-28 18:42:40'),
(31, 'EEE 292', 'Applied Electricity Lab. II', 'EEE 201', 1, 3, 1, 2, 2, NULL, 0, '2020-01-28 18:43:30', '2020-01-28 18:43:30'),
(32, 'CVE 202', 'Strength of Materials', 'MEE 205', 3, 3, 1, 2, 2, NULL, 0, '2020-01-28 18:45:56', '2020-01-28 18:45:56'),
(33, 'CPE 206', 'Digital Laboratory I', NULL, 2, 3, 5, 2, 2, NULL, 0, '2020-01-28 19:44:46', '2020-01-28 19:44:46'),
(34, 'MTH 306', 'Groups and Rings', NULL, 3, 3, 2, 2, 2, NULL, 0, '2020-01-28 19:47:01', '2020-01-28 19:47:01'),
(35, 'STT 202', 'Probability Distribution I', NULL, 4, 3, 2, 2, 2, NULL, 0, '2020-01-28 19:47:42', '2020-01-29 02:02:17'),
(36, 'MTH 205', 'Introduction to Algebra', NULL, 3, 3, 2, 2, 1, NULL, 0, '2020-01-28 19:48:33', '2020-01-28 19:48:33'),
(37, 'STT 201', 'Introduction to Statistics', NULL, 3, 3, 2, 2, 1, NULL, 0, '2020-01-28 19:49:48', '2020-01-28 19:49:48'),
(38, 'ECN 201', 'Principles of Economics I', NULL, 3, 3, 3, 2, 1, NULL, 0, '2020-01-28 19:59:22', '2020-01-28 19:59:22'),
(39, 'ECN 203', 'Introduction to Applied Economics I', NULL, 3, 3, 3, 2, 1, NULL, 0, '2020-01-28 20:00:51', '2020-01-28 20:00:51'),
(40, 'ECN 202', 'Principles of Economics II', 'ECN 201', 3, 3, 3, 2, 2, NULL, 0, '2020-01-28 20:02:18', '2020-01-28 20:02:18'),
(41, 'ECN 204', 'Introduction to Applied Economics II', 'ECN 203', 3, 3, 3, 2, 2, NULL, 0, '2020-01-28 20:03:06', '2020-01-28 20:03:06'),
(42, 'CPE 301', 'Low Level Languages', 'CSC 201', 3, 3, 4, 3, 1, NULL, 0, '2020-01-28 20:07:43', '2020-01-28 20:07:43'),
(43, 'CSC 305', 'Introduction to Database systems', NULL, 3, 3, 5, 3, 1, NULL, 0, '2020-01-28 20:10:15', '2020-01-28 20:10:15'),
(44, 'CSC 307', 'Numerical Computation I', 'MTH 201', 2, 3, 4, 3, 1, NULL, 0, '2020-01-28 20:11:35', '2020-01-28 20:11:35'),
(45, 'CSC 311', 'Introduction to Information Systems', NULL, 2, 3, 5, 3, 1, NULL, 0, '2020-01-28 20:13:13', '2020-01-28 20:13:13'),
(46, 'CSC 315', 'Data Structures & Analysis of Algorithms', NULL, 3, 3, 5, 3, 1, NULL, 0, '2020-01-28 20:15:25', '2020-01-28 20:15:25'),
(47, 'CSC 317', 'Automata Theory & Computability', NULL, 2, 3, 5, 3, 1, NULL, 0, '2020-01-28 20:16:28', '2020-01-28 20:16:51'),
(48, 'ECN 301', 'Microeconomic Theory I', NULL, 3, 3, 3, 3, 1, NULL, 0, '2020-01-28 20:17:54', '2020-01-28 20:17:54'),
(49, 'ECN 313', 'Statistical Theory I', NULL, 3, 3, 3, 3, 1, NULL, 0, '2020-01-28 20:19:00', '2020-01-28 20:19:00'),
(50, 'MTH 301', 'Mathematical Methods III', NULL, 3, 3, 2, 3, 1, NULL, 0, '2020-01-28 20:21:27', '2020-01-28 20:21:27'),
(51, 'CPE 303', 'Introduction to Computer Engineering', NULL, 2, 3, 1, 3, 1, NULL, 0, '2020-01-28 20:23:09', '2020-01-28 20:23:09'),
(52, 'CPE 309', 'Computer Engineering Lab. I', NULL, 1, 3, 1, 3, 1, NULL, 0, '2020-01-28 20:24:33', '2020-01-28 20:24:33'),
(53, 'EEE 301', 'Physical Electronics', 'EEE 201', 2, 3, 1, 3, 1, NULL, 0, '2020-01-28 20:25:18', '2020-01-28 20:25:18'),
(54, 'EEE305', 'Electric Circuit Theory I', 'EEE202', 3, 3, 1, 3, 1, NULL, 0, '2020-01-28 20:26:01', '2020-01-28 20:26:01'),
(55, 'MEE 303', 'Fluid Mechanics I', 'MEE 206', 3, 3, 1, 3, 1, NULL, 0, '2020-01-28 20:27:09', '2020-01-28 20:27:09'),
(56, 'CHE 305', 'Engineering Analysis I', 'MTH 202', 3, 3, 1, 3, 1, NULL, 0, '2020-01-28 20:28:20', '2020-01-28 20:28:20'),
(57, 'MSE 201', 'Elements of Engineering Materials', NULL, 3, 3, 1, 3, 1, NULL, 0, '2020-01-28 20:29:11', '2020-01-28 20:29:11'),
(58, 'CSC 302', 'Object-Oriented Programming', 'CSC 201', 3, 3, 4, 3, 2, NULL, 0, '2020-01-28 20:37:20', '2020-01-28 20:37:20'),
(59, 'CSC 306', 'Intro. to HumanComputer Interaction Design', 'CPE 301', 3, 3, 4, 3, 2, NULL, 0, '2020-01-28 20:39:10', '2020-01-28 20:39:10'),
(60, 'CSC 308', 'Introduction to Agent based Systems', 'CSC 307', 2, 3, 4, 3, 2, NULL, 0, '2020-01-28 20:40:10', '2020-01-28 20:40:10'),
(61, 'CPE 314', 'Computer Engineering Laboratory II', 'CPE 309', 1, 3, 1, 3, 2, NULL, 0, '2020-01-28 20:41:11', '2020-01-28 20:41:11'),
(62, 'CPE 316', 'Introduction to Artiﬁcial Intelligence', 'CPE 301', 2, 3, 4, 3, 2, NULL, 0, '2020-01-28 20:42:39', '2020-01-28 20:42:39'),
(63, 'EEE 302', 'Electronics Engineering', 'EEE 301', 3, 3, 1, 3, 2, NULL, 0, '2020-01-28 20:43:35', '2020-01-28 20:43:35'),
(64, 'AGE 302', 'Engineering Analysis II', 'CHE 305', 3, 3, 1, 3, 2, NULL, 0, '2020-01-28 20:44:16', '2020-01-28 20:44:16'),
(65, 'CSC 304', 'Business & Commercial Programming', NULL, 2, 3, 5, 3, 2, NULL, 0, '2020-01-28 21:02:48', '2020-01-28 21:02:48'),
(66, 'CSC 312', 'Systems Analysis & Design Methodologies', 'CPE 301', 3, 3, 5, 3, 2, NULL, 0, '2020-01-28 21:04:15', '2020-01-28 21:04:15'),
(67, 'ECN 302', 'Microeconomic Theory II', NULL, 3, 3, 3, 3, 2, NULL, 0, '2020-01-28 21:04:59', '2020-01-28 21:04:59'),
(68, 'ECN 314', 'Statistical Theory II', NULL, 3, 3, 3, 3, 2, NULL, 0, '2020-01-28 21:05:39', '2020-01-28 21:05:39'),
(69, 'MTH 302', 'Mathematical Methods IV', NULL, 3, 3, 2, 3, 2, NULL, 0, '2020-01-28 21:07:39', '2020-01-28 21:07:39'),
(70, 'CSC  315', 'Data Structures and Analysis of Algorithms', 'CPE 301', 3, 3, 1, 4, 1, NULL, 0, '2020-01-28 21:09:56', '2020-01-28 21:09:56'),
(71, 'CVE 401', 'Technical Report Writing', NULL, 3, 3, 4, 4, 1, NULL, 0, '2020-01-28 21:10:54', '2020-01-28 21:10:54'),
(72, 'CPE 409', 'Microprocessor Design Laboratory', 'CPE 303', 2, 3, 1, 4, 1, NULL, 0, '2020-01-28 21:12:08', '2020-01-28 21:12:08'),
(73, 'CPE 401', 'Computer Architecture & Organization', 'CPE 204', 3, 3, 4, 4, 1, NULL, 0, '2020-01-28 21:13:29', '2020-01-28 21:13:29'),
(74, 'CSC 403', 'Principles of Compilers', 'CPE 301', 3, 3, 4, 4, 1, NULL, 0, '2020-01-28 21:14:22', '2020-01-28 21:14:22'),
(75, 'CPE 405', 'Introduction to Microprocessor Tech. & Microprogramming', NULL, 3, 3, 4, 4, 1, NULL, 0, '2020-01-28 21:16:11', '2020-01-28 21:16:23'),
(76, 'CSC 415', 'Operating Systems Principles', NULL, 3, 3, 4, 4, 1, NULL, 0, '2020-01-28 21:19:02', '2020-01-28 21:19:02'),
(77, 'CSC 407', 'Techniques in Software Development', NULL, 2, 3, 5, 4, 1, NULL, 0, '2020-01-28 21:20:23', '2020-01-28 21:20:23'),
(78, 'CSC 400', 'Engineering Valuation & Student Industrial Work Experience Scheme III', NULL, 6, 3, 4, 4, 2, NULL, 0, '2020-01-28 21:23:06', '2020-01-28 21:23:30'),
(79, 'CSC 200', 'Student Industrial Work Experience Scheme I', NULL, 3, 3, 4, 4, 2, NULL, 0, '2020-01-28 21:24:44', '2020-01-28 21:24:44'),
(80, 'CSC 300', 'Student Industrial Work Experience Scheme II', NULL, 3, 3, 4, 4, 2, NULL, 0, '2020-01-28 21:25:37', '2020-01-28 21:25:37'),
(81, 'CSC 501', 'Intro. to Operations Research', NULL, 2, 3, 5, 5, 1, NULL, 0, '2020-01-28 21:27:21', '2020-01-28 21:27:21'),
(82, 'CSC 503', 'Individual Project I', NULL, 3, 3, 4, 5, 1, NULL, 0, '2020-01-28 21:27:59', '2020-01-28 21:27:59'),
(83, 'CSC 505', 'Object Oriented Modeling', NULL, 3, 3, 4, 5, 1, NULL, 0, '2020-01-28 21:28:38', '2020-01-28 21:28:38'),
(84, 'CSC 515', 'Database Design & Management', NULL, 2, 3, 5, 5, 1, NULL, 0, '2020-01-28 21:29:25', '2020-01-28 21:29:25'),
(85, 'CPE 517', 'Digital Computer Networks', 'CPE 401', 3, 3, 4, 5, 1, NULL, 0, '2020-01-28 21:30:50', '2020-01-28 21:30:50'),
(86, 'CSC 523', 'Mathematical Programming', NULL, 2, 3, 5, 5, 1, NULL, 0, '2020-01-28 21:31:33', '2020-01-28 21:31:33'),
(87, 'TPD 501', 'Industrial & Engineering Economics', NULL, 2, 3, 4, 5, 1, NULL, 0, '2020-01-28 21:32:47', '2020-01-28 21:32:47'),
(88, 'ECN 421', 'Applied Economics Statistics', NULL, 3, 3, 3, 4, 1, NULL, 0, '2020-01-28 21:34:58', '2020-01-28 21:34:58'),
(89, 'CPE 509', 'Hardware Design Laboratory', 'CPE 405', 2, 3, 1, 5, 1, NULL, 0, '2020-01-28 21:37:10', '2020-01-28 21:37:10'),
(90, 'CPE 511', 'Computer based RealTime System Design', NULL, 3, 3, 1, 5, 1, NULL, 0, '2020-01-28 21:38:55', '2020-01-28 21:38:55'),
(91, 'TPD 503', 'Production/Operations Management & Industrial Law', NULL, 2, 3, 1, 5, 1, NULL, 0, '2020-01-28 21:41:07', '2020-01-28 21:41:07'),
(92, 'CPE 521', 'Modeling & Simulation', 'CSC 308', 2, 3, 1, 5, 1, NULL, 0, '2020-01-28 21:43:03', '2020-01-28 21:43:03'),
(93, 'EEE 409', 'Communications Principles', NULL, 3, 2, 1, 5, 1, NULL, 0, '2020-01-28 21:43:58', '2020-01-28 21:45:09'),
(94, 'EEE 411', 'Servomechanism and Control', NULL, 3, 2, 1, 5, 1, NULL, 0, '2020-01-28 21:44:46', '2020-01-28 21:44:46'),
(95, 'CSC 513', 'Principles & Applications of Data mining', NULL, 2, 2, 5, 5, 1, NULL, 0, '2020-01-28 21:49:31', '2020-01-28 21:49:31'),
(96, 'CSC 507', 'Computers in Society', NULL, 2, 2, 5, 5, 1, NULL, 0, '2020-01-28 21:50:35', '2020-01-28 21:50:35'),
(97, 'CPE  521', 'Modeling and Simulation', NULL, 2, 2, 5, 5, 1, NULL, 0, '2020-01-28 21:51:32', '2020-01-28 21:51:32'),
(98, 'CPE 502', 'Hardware Systems Studie', 'CPE 401', 3, 3, 4, 5, 2, NULL, 0, '2020-01-28 21:53:07', '2020-01-28 21:53:07'),
(99, 'CSC 504', 'Individual Project II', 'CSC 503', 3, 3, 4, 5, 2, NULL, 0, '2020-01-28 21:53:52', '2020-01-28 21:53:52'),
(100, 'CPE 506', 'Industrial Applications Studies', NULL, 2, 3, 4, 5, 2, NULL, 0, '2020-01-28 21:54:33', '2020-01-28 21:54:33'),
(101, 'CPE 508', 'Computer System Project Management', NULL, 3, 3, 4, 5, 2, NULL, 0, '2020-01-28 21:55:23', '2020-01-28 21:55:23'),
(102, 'CPE 510', 'Natural Language Processing & Application', NULL, 3, 3, 4, 5, 2, NULL, 0, '2020-01-28 21:56:14', '2020-01-28 21:56:14'),
(103, 'TPD 502', 'Technology Policy', NULL, 2, 3, 4, 5, 2, NULL, 0, '2020-01-28 21:56:54', '2020-01-29 01:58:48'),
(104, 'CSC 514', 'Computer Graphics', NULL, 2, 2, 4, 5, 2, NULL, 0, '2020-01-28 21:57:48', '2020-01-28 21:57:48'),
(105, 'CSC 520', 'Expert Systems', NULL, 2, 2, 4, 5, 2, NULL, 0, '2020-01-28 21:58:27', '2020-01-28 21:58:27'),
(106, 'CSC 522', 'Information Storage & Retrieval', NULL, 2, 2, 4, 5, 2, NULL, 5, '2020-01-28 21:59:06', '2020-01-28 21:59:06'),
(107, 'CSC 524', 'Techniques in Data Analysis', NULL, 2, 2, 4, 5, 2, NULL, 0, '2020-01-28 21:59:52', '2020-01-28 21:59:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_course_code_unique` (`course_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
