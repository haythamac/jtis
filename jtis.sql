-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 04:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jtis`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `activity_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `test_type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `action`, `activity_date`, `user_id`, `test_type`) VALUES
(8, 'chemistry - easy', '2023-03-23 04:45:37', 6, '0'),
(13, 'chemistry - easy', '2023-03-23 10:00:26', 6, '0'),
(14, 'chemistry - easy', '2023-03-26 03:03:17', 6, '0'),
(15, 'chemistry - easy', '2023-03-26 03:14:36', 6, '0'),
(16, 'chemistry - easy', '2023-03-26 03:19:05', 6, '0'),
(17, 'chemistry - medium', '2023-03-26 03:20:19', 6, '0'),
(18, 'chemistry - medium', '2023-03-26 03:22:12', 8, '0'),
(19, 'biology - easy', '2023-04-02 10:14:35', 1, '0'),
(20, 'chemistry - easy', '2023-04-03 08:45:03', 1, '0'),
(21, 'chemistry - easy', '2023-04-03 08:47:22', 1, '0'),
(22, 'chemistry - easy', '2023-04-03 09:07:20', 1, '1'),
(23, 'chemistry - easy', '2023-04-03 09:08:50', 1, '1'),
(24, 'chemistry - easy', '2023-04-03 09:14:47', 1, '1'),
(25, 'Chemistry - Easy', '2023-04-09 09:09:24', 9, ''),
(26, 'Chemistry - Easy', '2023-04-09 09:12:32', 9, ''),
(27, 'Chemistry - Easy', '2023-04-09 09:35:05', 9, ''),
(28, 'Biology - Easy', '2023-04-10 06:23:19', 9, ''),
(29, 'Biology - Easy', '2023-04-10 06:23:29', 9, ''),
(30, 'Biology - ', '2023-04-10 06:25:08', 9, ''),
(31, 'Biology - ', '2023-04-10 06:26:04', 9, ''),
(32, 'Biology - ', '2023-04-10 06:26:18', 9, ''),
(33, 'Biology - Easy', '2023-04-10 06:26:21', 9, ''),
(34, 'Biology - Easy', '2023-04-10 06:29:24', 9, ''),
(35, 'Biology - Easy', '2023-04-10 06:29:27', 9, ''),
(36, 'Biology - Easy', '2023-04-10 07:01:17', 1, ''),
(37, 'Chemistry - Medium', '2023-04-10 14:25:47', 9, ''),
(38, 'Chemistry - ', '2023-04-10 16:09:39', 9, ''),
(39, 'Chemistry - Easy', '2023-04-10 16:10:30', 9, ''),
(40, 'Physics - Easy', '2023-04-10 20:31:28', 2, ''),
(41, ' - Hard', '2023-04-16 21:15:44', 9, ''),
(42, 'Chemistry - Hard', '2023-04-16 21:16:23', 9, ''),
(43, 'Chemistry - Hard', '2023-04-16 21:18:33', 9, ''),
(44, 'Chemistry - Hard', '2023-04-16 21:18:53', 9, ''),
(45, 'Chemistry - Hard', '2023-04-16 21:18:56', 9, ''),
(46, 'Chemistry - Hard', '2023-04-16 21:19:40', 9, ''),
(47, 'Chemistry - Hard', '2023-04-16 21:21:14', 9, ''),
(48, 'Chemistry - Hard', '2023-04-16 21:23:03', 9, ''),
(49, 'Chemistry - Hard', '2023-04-16 21:23:14', 9, ''),
(50, 'Chemistry - Hard', '2023-04-16 21:23:35', 9, ''),
(51, 'Chemistry - Hard', '2023-04-16 21:24:18', 9, ''),
(52, 'Chemistry - Hard', '2023-04-16 21:25:29', 9, ''),
(53, 'Chemistry - Hard', '2023-04-16 21:25:44', 9, ''),
(54, 'Chemistry - Hard', '2023-04-16 21:26:04', 9, ''),
(55, 'Chemistry - Hard', '2023-04-16 21:26:18', 9, ''),
(56, 'Chemistry - Medium', '2023-04-16 21:27:25', 9, ''),
(57, 'Chemistry - Easy', '2023-04-16 21:27:28', 9, ''),
(58, ' - Easy', '2023-04-16 21:28:30', 9, ''),
(59, 'Chemistry - Easy', '2023-04-16 21:28:34', 9, ''),
(60, 'Chemistry - Medium', '2023-04-16 21:44:36', 9, ''),
(61, 'Chemistry - Hard', '2023-04-16 21:44:46', 9, ''),
(62, 'Chemistry - Medium', '2023-04-16 21:47:15', 9, ''),
(63, 'Chemistry - Easy', '2023-04-16 21:47:47', 9, ''),
(64, 'Chemistry - Hard', '2023-04-16 21:47:50', 9, ''),
(65, 'Chemistry - Hard', '2023-04-16 21:48:36', 9, ''),
(66, 'Chemistry - Hard', '2023-04-16 21:48:39', 9, ''),
(67, 'Chemistry - Hard', '2023-04-16 21:48:54', 9, ''),
(68, 'Chemistry - Easy', '2023-04-16 21:50:22', 9, ''),
(69, 'Chemistry - Medium', '2023-04-16 21:50:25', 9, ''),
(70, 'Chemistry - Hard', '2023-04-16 21:50:27', 9, ''),
(71, 'Chemistry - Easy', '2023-04-16 21:50:50', 9, ''),
(72, ' - ', '2023-04-16 21:54:30', 9, ''),
(73, ' - ', '2023-04-16 21:54:34', 9, ''),
(74, ' - ', '2023-04-25 11:48:31', 9, ''),
(75, ' - ', '2023-04-25 12:46:47', 9, ''),
(76, ' - ', '2023-04-25 12:53:14', 9, ''),
(77, ' - ', '2023-04-25 12:54:22', 9, ''),
(78, 'Chemistry - Easy', '2023-04-25 12:54:52', 9, ''),
(79, 'Chemistry - Easy', '2023-04-25 12:55:14', 9, ''),
(80, 'Biology - Easy', '2023-04-25 12:55:18', 9, ''),
(81, 'Biology - Easy', '2023-04-25 12:55:23', 9, ''),
(82, 'Physics - Hard', '2023-04-25 15:36:35', 9, ''),
(83, 'Chemistry - Easy', '2023-04-25 15:36:42', 9, ''),
(84, 'Biology - Easy', '2023-04-25 15:36:45', 9, ''),
(85, 'Physics - Easy', '2023-04-25 17:31:53', 9, ''),
(86, 'Chemistry - Easy', '2023-04-25 21:46:25', 9, ''),
(87, 'Biology - Easy', '2023-04-25 21:46:33', 9, ''),
(88, 'Chemistry - Medium', '2023-04-25 21:46:37', 9, ''),
(89, 'Chemistry - Medium', '2023-04-25 21:46:40', 9, ''),
(90, 'Chemistry - Hard', '2023-04-25 21:46:43', 9, ''),
(91, 'Biology - Hard', '2023-04-25 21:46:47', 9, ''),
(92, 'Biology - Hard', '2023-04-26 10:04:59', 9, ''),
(93, 'Chemistry - Easy', '2023-04-26 10:06:49', 9, ''),
(94, 'Biology - Medium', '2023-04-26 10:06:54', 9, ''),
(95, 'Chemistry - Easy', '2023-05-05 16:39:43', 9, ''),
(96, 'Chemistry - Hard', '2023-05-05 16:46:13', 9, ''),
(97, 'Physics - Hard', '2023-05-05 16:46:18', 9, ''),
(98, 'Physics - Easy', '2023-05-05 16:46:25', 9, ''),
(99, 'Physics - Medium', '2023-05-05 16:46:30', 9, ''),
(100, 'Physics - Medium', '2023-05-05 16:54:47', 9, ''),
(101, 'Chemistry - Easy', '2023-05-05 16:55:55', 9, ''),
(102, 'Chemistry - Medium', '2023-05-05 16:56:15', 9, ''),
(103, 'Biology - Easy', '2023-05-05 16:56:59', 9, ''),
(104, 'Biology - Medium', '2023-05-05 16:57:06', 9, ''),
(105, 'Physics - Hard', '2023-05-05 16:57:10', 9, ''),
(106, 'Chemistry - Easy', '2023-05-10 20:38:48', 9, ''),
(107, 'Biology - Easy', '2023-05-11 14:22:50', 9, ''),
(108, 'Physics - Medium', '2023-05-11 14:22:58', 9, ''),
(109, 'Chemistry - Easy', '2023-05-12 15:00:40', 9, ''),
(110, 'Physics - Hard', '2023-05-12 15:00:46', 9, ''),
(111, 'Biology - Medium', '2023-05-12 15:01:59', 9, ''),
(112, 'Biology - Medium', '2023-05-12 15:09:10', 9, ''),
(113, 'Biology - Medium', '2023-05-12 15:59:01', 9, ''),
(114, 'Biology - Medium', '2023-05-12 15:59:16', 9, ''),
(115, 'Physics - Hard', '2023-05-12 16:16:20', 9, ''),
(116, 'Biology - Medium', '2023-05-12 16:17:29', 9, ''),
(117, 'Biology - Medium', '2023-05-12 16:17:35', 9, ''),
(118, 'Biology - Medium', '2023-05-12 16:17:43', 9, ''),
(119, 'Chemistry - Easy', '2023-05-12 16:17:47', 9, ''),
(120, 'Chemistry - Easy', '2023-05-12 16:17:50', 9, ''),
(121, 'Chemistry - Easy', '2023-05-12 16:17:54', 9, ''),
(122, 'Chemistry - Easy', '2023-05-12 16:17:58', 9, ''),
(123, 'Physics - Hard', '2023-05-12 16:18:02', 9, ''),
(124, 'Chemistry - Easy', '2023-05-12 18:48:25', 9, ''),
(125, 'Biology - Medium', '2023-05-12 18:48:39', 9, ''),
(126, 'Chemistry - Easy', '2023-05-13 22:58:05', 9, ''),
(127, 'Biology - Easy', '2023-05-13 23:20:23', 9, ''),
(128, 'Chemistry - Medium', '2023-05-13 23:20:31', 9, ''),
(129, 'Chemistry - Easy', '2023-05-13 23:20:34', 9, ''),
(130, 'Biology - Hard', '2023-05-13 23:20:39', 9, ''),
(131, 'Biology - Hard', '2023-05-13 23:20:43', 9, ''),
(132, 'Physics - Hard', '2023-05-13 23:20:48', 9, ''),
(133, 'Chemistry - Easy', '2023-05-13 23:50:15', 9, ''),
(134, 'Chemistry - Medium', '2023-05-13 23:50:41', 9, ''),
(135, 'Chemistry - Hard', '2023-05-13 23:50:47', 9, ''),
(136, 'Chemistry - Easy', '2023-05-13 23:52:14', 9, ''),
(137, 'Biology - Hard', '2023-05-13 23:52:23', 9, ''),
(138, 'Chemistry - Hard', '2023-05-13 23:52:32', 9, ''),
(139, 'Biology - Easy', '2023-05-13 23:53:46', 9, ''),
(140, 'Physics - Medium', '2023-05-13 23:53:50', 9, ''),
(141, 'Biology - Easy', '2023-05-13 23:53:54', 9, ''),
(142, 'Chemistry - Easy', '2023-05-14 14:19:18', 9, ''),
(143, 'Chemistry - Medium', '2023-05-14 14:19:40', 9, ''),
(144, 'Chemistry - Hard', '2023-05-14 14:19:45', 9, ''),
(145, 'Biology - Easy', '2023-05-14 14:20:55', 9, ''),
(146, 'Biology - Hard', '2023-05-14 14:20:59', 9, ''),
(147, 'Biology - Hard', '2023-05-14 14:22:00', 9, ''),
(148, 'Chemistry - Easy', '2023-05-14 14:25:59', 9, ''),
(149, 'Biology - Easy', '2023-05-14 14:26:02', 9, ''),
(150, 'Biology - Easy', '2023-05-14 14:28:11', 9, ''),
(151, 'Chemistry - Easy', '2023-05-14 14:34:51', 9, ''),
(152, 'Biology - Easy', '2023-05-14 14:34:55', 9, ''),
(153, 'Physics - Easy', '2023-05-14 14:35:26', 9, ''),
(154, 'Physics - Hard', '2023-05-14 14:35:30', 9, ''),
(155, ' - ', '2023-05-14 14:37:53', 9, ''),
(156, ' - ', '2023-05-14 14:37:57', 9, ''),
(157, 'Chemistry - ', '2023-05-14 14:38:17', 9, ''),
(158, 'Biology - Medium', '2023-05-14 15:27:19', 9, ''),
(159, 'Chemistry - Medium', '2023-05-14 15:51:35', 9, ''),
(160, 'Biology - Easy', '2023-05-14 15:51:39', 9, ''),
(161, 'Biology - Medium', '2023-05-14 15:52:15', 9, ''),
(162, 'Chemistry - ', '2023-05-14 15:52:39', 9, ''),
(163, 'Biology - ', '2023-05-14 15:52:43', 9, ''),
(164, 'Biology - Medium', '2023-05-14 15:56:39', 9, ''),
(165, 'Chemistry - Easy', '2023-05-14 15:56:43', 9, ''),
(166, 'Chemistry - ', '2023-05-14 16:26:32', 9, ''),
(167, 'Chemistry - ', '2023-05-14 16:28:27', 9, ''),
(168, 'Chemistry - Easy', '2023-05-14 16:28:54', 9, ''),
(169, 'Biology - Easy', '2023-05-14 16:29:07', 9, ''),
(170, 'Biology - ', '2023-05-14 16:33:20', 9, ''),
(171, 'Biology - Medium', '2023-05-14 16:33:36', 9, ''),
(172, 'Chemistry - Easy', '2023-05-14 16:33:40', 9, ''),
(173, 'Chemistry - Medium', '2023-05-14 16:33:45', 9, ''),
(174, 'Chemistry - Hard', '2023-05-14 16:33:48', 9, ''),
(175, 'Biology - Easy', '2023-05-14 16:34:09', 9, ''),
(176, 'Chemistry - Easy', '2023-05-14 16:34:33', 9, ''),
(177, 'Chemistry - ', '2023-05-14 16:35:46', 9, ''),
(178, 'Chemistry - ', '2023-05-14 16:48:40', 9, ''),
(179, 'Chemistry - ', '2023-05-14 18:24:42', 9, ''),
(180, 'Chemistry - ', '2023-05-14 18:25:30', 9, ''),
(181, 'Chemistry - ', '2023-05-14 18:27:01', 9, ''),
(182, 'Biology - ', '2023-05-14 18:27:06', 9, ''),
(183, 'Biology - ', '2023-05-14 18:28:20', 9, ''),
(184, 'Chemistry - ', '2023-05-14 18:28:25', 9, ''),
(185, 'Chemistry - ', '2023-05-14 18:29:29', 9, ''),
(186, 'Chemistry - ', '2023-05-14 19:21:16', 9, ''),
(187, 'Biology - ', '2023-05-14 19:49:25', 9, ''),
(188, 'Chemistry - ', '2023-05-14 19:51:34', 9, ''),
(189, 'Biology - ', '2023-05-14 19:51:39', 9, ''),
(190, 'Biology - ', '2023-05-14 19:52:40', 9, ''),
(191, 'Biology - ', '2023-05-14 19:52:55', 9, ''),
(192, 'Physics - ', '2023-05-14 19:53:02', 9, ''),
(193, 'Chemistry - ', '2023-05-14 23:24:46', 9, ''),
(194, 'Physics - ', '2023-05-14 23:24:49', 9, ''),
(195, 'Biology - ', '2023-05-14 23:24:53', 9, ''),
(196, 'Chemistry - ', '2023-05-14 23:25:47', 9, ''),
(197, 'Chemistry - ', '2023-05-14 23:25:53', 9, ''),
(198, 'Chemistry - ', '2023-05-14 23:25:57', 9, ''),
(199, 'Biology - ', '2023-05-14 23:26:01', 9, ''),
(200, 'Biology - ', '2023-05-14 23:26:04', 9, ''),
(201, 'Biology - ', '2023-05-14 23:26:09', 9, ''),
(202, 'Physics - ', '2023-05-14 23:26:12', 9, ''),
(203, 'Physics - ', '2023-05-14 23:26:16', 9, ''),
(204, 'Physics - ', '2023-05-14 23:26:20', 9, ''),
(205, 'Chemistry - ', '2023-05-14 23:31:32', 9, ''),
(206, 'Biology - ', '2023-05-14 23:32:37', 9, ''),
(207, 'Chemistry - ', '2023-05-14 23:36:10', 9, ''),
(208, 'Chemistry - ', '2023-05-14 23:41:25', 9, ''),
(209, 'Chemistry - ', '2023-05-14 23:42:09', 9, ''),
(210, 'Chemistry - ', '2023-05-14 23:42:20', 9, ''),
(211, 'Physics - ', '2023-05-15 14:16:45', 9, ''),
(212, 'Chemistry - ', '2023-05-15 17:17:17', 9, ''),
(213, 'Physics - ', '2023-05-15 18:11:51', 9, ''),
(214, 'Chemistry - ', '2023-05-15 18:46:02', 9, ''),
(215, 'Chemistry - ', '2023-05-15 18:46:05', 9, ''),
(216, 'Physics - ', '2023-05-15 20:43:32', 9, ''),
(217, 'Physics - ', '2023-05-15 20:43:45', 9, ''),
(218, 'Physics - ', '2023-05-15 20:43:49', 9, ''),
(219, 'Chemistry - ', '2023-05-15 20:44:54', 9, ''),
(220, 'Chemistry - ', '2023-05-15 20:46:47', 9, ''),
(221, 'Chemistry - ', '2023-05-15 20:52:07', 9, ''),
(222, 'Chemistry - ', '2023-05-15 20:56:48', 9, 'easy'),
(223, 'Biology - {ucfirst(easy)}', '2023-05-15 21:00:02', 9, 'easy'),
(224, 'Biology - Medium', '2023-05-15 21:00:55', 9, 'medium'),
(225, 'Biology - Hard', '2023-05-15 21:01:07', 9, 'hard'),
(226, 'Biology - Hard', '2023-05-15 21:02:11', 9, 'hard'),
(227, 'Biology - Hard', '2023-05-15 21:02:14', 9, 'hard'),
(228, 'Biology - Hard', '2023-05-15 21:02:15', 9, 'hard'),
(229, 'Biology - Hard', '2023-05-15 21:02:15', 9, 'hard'),
(230, 'Biology - Hard', '2023-05-15 21:02:16', 9, 'hard'),
(231, 'Biology - Hard', '2023-05-15 21:02:17', 9, 'hard'),
(232, 'Biology - Hard', '2023-05-15 21:02:20', 9, 'hard'),
(233, 'Physics - Easy', '2023-05-15 22:01:30', 9, 'easy'),
(234, 'Physics - Medium', '2023-05-15 22:10:05', 43, 'medium'),
(235, 'Physics - Medium', '2023-05-15 22:23:42', 9, 'medium');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(4) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'chemistry'),
(2, 'biology'),
(3, 'physics');

-- --------------------------------------------------------

--
-- Table structure for table `commentsection`
--

CREATE TABLE `commentsection` (
  `cid` int(11) NOT NULL,
  `uid` varchar(120) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL,
  `video_id` int(255) NOT NULL,
  `video_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `commentsection`
--

INSERT INTO `commentsection` (`cid`, `uid`, `date`, `message`, `video_id`, `video_path`) VALUES
(218, 'stud2', '2022-11-29 14:40:37', 'sdfa', 52, ''),
(219, 'stud2', '2022-11-29 14:42:15', 'fsajkakda+', 51, '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `directory_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `topic_name`, `description`, `course_name`, `directory_path`) VALUES
(1, 'Measurement and the Language of Physics', '<div class=\"course-content\">\r\n<h2 class=\"lesson-title\">Measurement and the Language of Physics</h2>\r\n<p class=\"lesson-content\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n</div>', 'physics', ''),
(2, 'Kinematics: The Physics of Motion', '<div class=\"course-content\">\r\n<h2 class=\"lesson-title\">Kinematics: The Physics of Motion</h2>\r\n<p class=\"lesson-content\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n</div>', 'physics', ''),
(34, 'Intro to Atom: What’s Inside?', '<div class=\"course-content\">\r\n<h2>Intro to Atom: What&rsquo;s Inside?</h2>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n</div>\r\n', 'chemistry', ''),
(35, 'Atomic Configuration: What do individual atoms look like?\r\n', '<div class=\"course-content\">\r\n<h2 class=\"lesson-title\">Atomic Configuration: <br>   What do individual atoms look like?</h2>\r\n<p class=\"lesson-content\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n</div>', 'chemistry', ''),
(36, 'Atomic Configuration — Building Atoms\r\n', '<div class=\"course-content\">\r\n<h2 class=\"lesson-title\">LOREM IPSUM</h2>\r\n<p class=\"lesson-content\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n</div>', 'chemistry', ''),
(44, 'Biology and Technology', '<div class=\"course-content\">\r\n<h2 class=\"lesson-title\">Biology and Technology</h2>\r\n<p class=\"lesson-content\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n</div>', 'biology', ''),
(45, ' Cell Biology', '<div class=\"course-content\">\r\n<h2 class=\"lesson-title\"> Cell Biology</h2>\r\n<p class=\"lesson-content\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n</div>', 'biology', ''),
(46, 'Human Biology and Health.', '<div class=\"course-content\">\r\n<h2 class=\"lesson-title\">LOREM IPSUM</h2>\r\n<p class=\"lesson-content\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n</div>', 'biology', ''),
(57, 'Debugging purposes', '<p>Test topic</p>\r\n', 'Physics', ''),
(58, 'Chainsaw Man', '<p>One day the end</p>\r\n', 'Earth Science', ''),
(59, 'Chinsaw man', '<p>Two day the end</p>\r\n', 'Earth Science', ''),
(60, 'Testing lang', '<p>asdasdsd</p>\r\n', 'New grading', ''),
(79, 'Debugging purposes', 'AG_Website_Revamp2023.docx', 'Chemistry', 'AG_Website_Revamp2023.docx'),
(80, 'New', 'Capstone-Draft-1.docx', 'Chemistry', 'Capstone-Draft-1.docx');

-- --------------------------------------------------------

--
-- Table structure for table `difficulty`
--

CREATE TABLE `difficulty` (
  `id` int(11) NOT NULL,
  `difficulty` varchar(20) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `taken` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `difficulty`
--

INSERT INTO `difficulty` (`id`, `difficulty`, `topic_id`, `taken`) VALUES
(1, 'easy', 1, 0),
(2, 'medium', 1, 0),
(3, 'hard', 1, 0),
(4, 'easy', 2, 0),
(5, 'medium', 2, 0),
(6, 'hard', 2, 0),
(7, 'easy', 3, 0),
(8, 'medium', 3, 0),
(9, 'hard', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_taken`
--

CREATE TABLE `exam_taken` (
  `qt_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `difficulty` varchar(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_taken` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_taken`
--

INSERT INTO `exam_taken` (`qt_id`, `course_id`, `difficulty`, `user_id`, `is_taken`) VALUES
(13, 1, 'medium', 9, 'yes'),
(35, 1, 'hard', 9, 'yes'),
(36, 1, 'hard', 9, 'yes'),
(37, 1, 'easy', 9, 'yes'),
(38, 2, 'easy', 9, 'yes'),
(39, 2, 'medium', 9, 'yes'),
(40, 2, 'hard', 9, 'yes'),
(41, 3, 'easy', 9, 'yes'),
(42, 3, 'medium', 9, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `faq_title` varchar(255) NOT NULL,
  `faq_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `faq_title`, `faq_description`) VALUES
(1, 'This website is all about ?', 'To Provide New and Advance way of Learning'),
(2, 'School Motto', 'A Family and God-Centered Institution\r\nPursue Academic Excellence and Adheres\r\nto Values Formation'),
(3, 'How to Log in?', 'Accounts are provided by teachers and you can use it to access the LMS');

-- --------------------------------------------------------

--
-- Table structure for table `grading`
--

CREATE TABLE `grading` (
  `grading_id` int(11) NOT NULL,
  `grading` varchar(20) NOT NULL,
  `current` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grading`
--

INSERT INTO `grading` (`grading_id`, `grading`, `current`) VALUES
(1, 'first', 0),
(2, 'second', 0),
(3, 'third', 1),
(4, 'fourth', 0);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`img`) VALUES
('uploadimg/4.png'),
('uploadimg/4.png'),
('uploadimg/3logo.png'),
('uploadimg/4.png'),
('uploadimg/4.png'),
('uploadimg/3logo.png'),
('uploadimg/4.png'),
('uploadimg/4.png'),
('uploadimg/3logo.png'),
('uploadimg/4.png'),
('uploadimg/4.png'),
('uploadimg/3logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--

CREATE TABLE `mytable` (
  `id` int(255) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`id`, `video_path`, `video_name`, `img`) VALUES
(1, 'path1', 'myvideo', 'httpvideo'),
(2, 'path2', 'myvideo', 'httpvideo');

-- --------------------------------------------------------

--
-- Table structure for table `question_exam`
--

CREATE TABLE `question_exam` (
  `id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `answer` int(100) NOT NULL,
  `course_id` int(255) NOT NULL,
  `difficulty` varchar(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `question_exam`
--

INSERT INTO `question_exam` (`id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `course_id`, `difficulty`) VALUES
(1, 'chem 1', 'Option 2', 'Option 1', 'Option 4', 'Option 3', 0, 1, 'easy'),
(2, 'chem 2', 'Wrong', 'Correct', 'Wrong', 'Wrong', 1, 1, 'medium'),
(15, 'chem 3', 'opt 1', 'opt 2', 'opt 3', 'opt 14', 3, 1, 'hard'),
(20, 'physics 1', 'option 1', 'option 2', 'option 3', 'option 4 ', 1, 3, 'easy'),
(22, 'physics 2', 'option 1', 'option 2', 'option 3', 'option 4 ', 1, 3, 'medium'),
(24, 'physics 3', 'op1', 'op2', 'op3', 'op4', 0, 3, 'hard'),
(31, 'biology 1', 'oo', 'hindi', 'pwede', 'tama', 0, 2, 'easy'),
(32, 'biology 2', 'hindi', 'tama', 'mali', 'oo', 0, 2, 'medium'),
(33, 'biology 3', 'Mali', 'Mali', 'Mali', 'Tama', 3, 2, 'hard'),
(34, 'physics 3', 'hindi', 'tama', 'mali', 'oo', 0, 3, 'hard'),
(35, 'chem 3', 'hindi', 'tama', 'mali', 'oo', 0, 1, 'hard');

-- --------------------------------------------------------

--
-- Table structure for table `question_test`
--

CREATE TABLE `question_test` (
  `id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `answer` int(100) NOT NULL,
  `course_id` int(255) NOT NULL,
  `difficulty` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `question_test`
--

INSERT INTO `question_test` (`id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `course_id`, `difficulty`) VALUES
(1, 'Option 2 is the right answer', 'Option 2', 'Option 1', 'Option 4', 'Option 3', 0, 1, 1),
(2, 'What is correct', 'Wrong', 'Correct', 'Wrong', 'Wrong', 1, 1, 2),
(15, 'q3', 'opt 1', 'opt 2', 'opt 3', 'opt 14', 3, 1, 1),
(20, 'question 1', 'option 1', 'option 2', 'option 3', 'option 4 ', 1, 13, 1),
(22, 'question 1', 'option 1', 'option 2', 'option 3', 'option 4 ', 1, 14, 1),
(24, 'q6', 'op1', 'op2', 'op3', 'op4', 0, 1, 1),
(25, '', '', '', '', '', 0, 0, 1),
(31, 'Testing first', 'oo', 'hindi', 'pwede', 'tama', 0, 2, 1),
(32, 'Pangalawang test', 'hindi', 'tama', 'mali', 'oo', 0, 3, 1),
(33, 'Debugging lang 1', 'Mali', 'Mali', 'Mali', 'Tama', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_taken`
--

CREATE TABLE `quiz_taken` (
  `qt_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `difficulty_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `test_type` int(11) NOT NULL,
  `is_taken` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `science_branch`
--

CREATE TABLE `science_branch` (
  `id` int(255) NOT NULL,
  `language_name` varchar(255) DEFAULT NULL,
  `language_image` varchar(255) DEFAULT NULL,
  `language_description` varchar(255) DEFAULT NULL,
  `lesson_grading` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `science_branch`
--

INSERT INTO `science_branch` (`id`, `language_name`, `language_image`, `language_description`, `lesson_grading`) VALUES
(0, 'Chemistry', 'uploadimg/chemistry2.jpg', '', 'first'),
(3, 'Biology', 'img/biology3.jpg', 'Biology is addictive!', 'second'),
(9, 'Physics', 'img/physics2.jpg', 'Physical damage', 'third');

-- --------------------------------------------------------

--
-- Table structure for table `score_exam`
--

CREATE TABLE `score_exam` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course` varchar(300) NOT NULL,
  `lesson` varchar(300) NOT NULL,
  `difficulty` varchar(20) NOT NULL,
  `score` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date_taken` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score_exam`
--

INSERT INTO `score_exam` (`id`, `student_id`, `course`, `lesson`, `difficulty`, `score`, `correct`, `wrong`, `date_taken`) VALUES
(1, 1, 'chemistry', '', 'easy', 50, 2, 2, '2023-04-03 08:47:39'),
(2, 1, 'chemistry', '', 'easy', 75, 3, 1, '2023-04-03 09:07:25'),
(3, 1, 'chemistry', '', 'easy', 50, 2, 2, '2023-04-03 09:08:55'),
(4, 1, 'chemistry', '', 'easy', 25, 1, 0, '2023-04-03 09:14:57'),
(5, 9, 'chemistry', '', 'easy', 75, 3, 1, '2023-04-09 09:09:31'),
(6, 9, 'chemistry', '', 'easy', 75, 3, 1, '2023-04-09 09:12:39'),
(7, 9, 'chemistry', '', 'easy', 75, 3, 1, '2023-04-09 09:12:56'),
(8, 9, 'chemistry', '', 'easy', 75, 3, 1, '2023-04-09 09:13:25'),
(9, 9, 'chemistry', '', 'easy', 75, 3, 1, '2023-04-09 09:13:40'),
(10, 9, 'chemistry', '', 'easy', 75, 3, 1, '2023-04-09 09:35:12'),
(11, 9, 'biology', '', 'easy', 100, 1, 0, '2023-04-10 06:23:21'),
(12, 9, 'biology', '', 'easy', 100, 1, 0, '2023-04-10 06:23:31'),
(13, 9, 'biology', '', 'easy', 0, 0, 0, '2023-04-10 06:27:55'),
(14, 9, 'biology', '', 'easy', 100, 1, 0, '2023-04-10 06:29:25'),
(15, 9, 'biology', '', 'easy', 0, 0, 0, '2023-04-10 06:29:28'),
(16, 1, 'biology', '', 'easy', 100, 1, 0, '2023-04-10 07:01:19'),
(17, 9, 'chemistry', '', 'medium', 100, 1, 0, '2023-04-10 14:25:49'),
(18, 9, 'chemistry', '', 'easy', 100, 4, 0, '2023-04-10 16:10:35'),
(19, 2, 'physics', '', 'easy', 0, 0, 1, '2023-04-10 20:31:30'),
(20, 9, 'chemistry', '', 'easy', 0, 0, 0, '2023-05-05 16:41:28'),
(21, 9, 'chemistry', '', 'easy', 100, 1, 0, '2023-05-10 20:38:53'),
(22, 9, 'biology', '', 'medium', 0, 0, 1, '2023-05-12 15:09:14'),
(23, 9, 'biology', '', 'medium', 0, 0, 1, '2023-05-12 15:59:24'),
(24, 9, 'chemistry', '', 'easy', 0, 0, 1, '2023-05-14 16:43:55'),
(25, 9, '', '', '', 0, 0, 0, '2023-05-14 23:37:50'),
(26, 9, '', '', '', 100, 1, 0, '2023-05-14 23:42:12'),
(27, 9, '', '', '', 100, 1, 0, '2023-05-14 23:42:21'),
(28, 9, '', '', '', 100, 1, 0, '2023-05-14 23:42:56'),
(29, 9, 'chemistry', '', '', 100, 1, 0, '2023-05-14 23:43:06'),
(30, 9, '', '', '', 100, 1, 0, '2023-05-14 23:43:21'),
(31, 9, 'chemistry', '', '', 100, 1, 0, '2023-05-14 23:43:24'),
(32, 9, 'chemistry', '', 'medium', 100, 1, 0, '2023-05-14 23:43:42'),
(33, 9, 'chemistry', '', 'medium', 100, 1, 0, '2023-05-14 23:43:51'),
(34, 9, 'physics', '', 'medium', 0, 0, 1, '2023-05-15 14:16:48'),
(35, 9, 'physics', '', 'easy', 0, 0, 1, '2023-05-15 18:11:54'),
(36, 9, 'chemistry', '', 'hard', 50, 1, 1, '2023-05-15 20:46:50'),
(37, 9, 'chemistry', '', 'hard', 50, 1, 1, '2023-05-15 20:49:04'),
(38, 9, 'chemistry', '', 'hard', 0, 0, 2, '2023-05-15 20:52:12'),
(39, 9, 'chemistry', '', 'hard', 0, 0, 2, '2023-05-15 20:56:42'),
(40, 9, 'chemistry', '', 'easy', 0, 0, 1, '2023-05-15 20:56:49'),
(41, 9, 'biology', '', 'easy', 100, 1, 0, '2023-05-15 21:00:04'),
(42, 9, 'biology', '', 'medium', 0, 0, 1, '2023-05-15 21:00:57'),
(43, 9, 'biology', '', 'hard', 100, 1, 0, '2023-05-15 21:02:23'),
(44, 9, 'physics', '', 'easy', 0, 0, 1, '2023-05-15 22:01:33'),
(45, 9, 'physics', '', 'medium', 0, 0, 1, '2023-05-15 22:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `score_quiz`
--

CREATE TABLE `score_quiz` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course` varchar(300) NOT NULL,
  `lesson` varchar(300) NOT NULL,
  `difficulty` varchar(20) NOT NULL,
  `score` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date_taken` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score_quiz`
--

INSERT INTO `score_quiz` (`id`, `student_id`, `course`, `lesson`, `difficulty`, `score`, `correct`, `wrong`, `date_taken`) VALUES
(3, 0, 'chemistry', '', 'easy', 50, 2, 2, '2023-03-26 03:14:43'),
(4, 0, 'chemistry', '', 'easy', 25, 1, 3, '2023-03-26 03:19:11'),
(5, 0, 'chemistry', '', 'medium', 100, 1, 0, '2023-03-26 03:20:21'),
(6, 8, 'chemistry', '', 'medium', 100, 1, 0, '2023-03-26 03:22:14'),
(7, 1, 'biology', '', 'easy', 100, 1, 0, '2023-04-02 10:14:39'),
(8, 1, 'chemistry', '', 'easy', 50, 2, 1, '2023-04-03 08:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `grade` int(2) NOT NULL,
  `section` varchar(50) NOT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `studentid` int(11) NOT NULL,
  `image_avatar` varchar(100) NOT NULL DEFAULT 'noprofile.png',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `firstName`, `middleName`, `lastName`, `username`, `password`, `email`, `grade`, `section`, `user_type`, `gender`, `studentid`, `image_avatar`, `status`) VALUES
(1, 'Student', 'Number', 'Two', 'studentno2', 'ewan', 'studentno2@gmail.com', 1, '1', 'user', 'male', 0, '', 0),
(2, 'Student', 'Number', 'Three', 'studentno3', 'ewan', 'studentno3@gmail.com', 1, '1', 'user', 'male', 0, '', 0),
(3, 'Student', 'Number', 'Four', 'studentno4', 'studentno4', 'studentno4@gmail.com', 1, '1', 'user', 'male', 0, '', 0),
(4, 'Student', 'Number', 'Five', 'studentno5', 'studentno5', 'studentno5@gmail.com', 1, '1', 'user', 'male', 0, '', 0),
(5, 'student', 'number', 'nineteen', 'studentno19', 'studentno19', 'studentno19@gmail.com', 1, '1', 'user', 'male', 0, '', 0),
(6, 'student', 'number', 'six', 'studentno6', 'studentno6', 'studentno6@gmail.com', 1, '1', 'user', 'male', 0, '', 0),
(7, 'student', 'number', 'seven', 'studentno7', 'studentno7', 'studentno7@gmail.com', 1, '1', 'user', 'female', 0, '', 0),
(8, 'Jhiane', 'Therese', 'Inter', 'Jhiane', 'jhiane', 'jhiane@gmail.com', 2, '2', 'user', NULL, 123123123, '', 0),
(9, 'Student', 'Number', 'One', 'studentno1', 'studentno1', 'studentno1@gmail.com', 1, '1', 'admin', 'male', 0, 'no-pressure.jpg', 1),
(10, 'GS', 'GS', 'GS', 'GS', 'gs', 'gs@gmail.com', 0, 'A', 'user', NULL, 0, '3197515e62a49e8328ffb29637e1d8f5.jpg', 1),
(12, 'ds', 'ds', 'ds', 'ds', 'ds', 'ds@gmail.com', 1, '1', 'user', NULL, 232232233, '', 0),
(13, 'xz', 'xz', 'xz', 'xz', 'xz', 'xz@gmail.com', 1, '1', 'user', NULL, 232323, '', 0),
(14, 'ja', 'ja', 'ja', 'ja', 'ja', 'ja@gmail.com', 8, 'A', 'user', NULL, 73, '', 0),
(21, 'otp', 'testing', 'account', 'otp', 'aq', 'janssen.uy.pbtsc@gmail.com', 8, 'A', 'user', NULL, 2131451, 'noprofile.png', 0),
(22, 'otp', 'testing', 'account', 'otp', 'aq', 'janssen.uy.pbtsc@gmail.com', 8, 'A', 'user', NULL, 2131451, 'noprofile.png', 0),
(23, 'otp', 'testing', 'account', 'otp', 'AQ', 'janssen.uy.pbtsc@gmail.com', 8, 'B', 'user', NULL, 2131451, 'noprofile.png', 0),
(24, 'otp', 'testing', 'account', 'otp', 'AQ', 'janssen.uy.pbtsc@gmail.com', 8, 'B', 'user', NULL, 2131451, 'noprofile.png', 0),
(25, 'otp', 'testing', 'account', 'otp', 'AQ', 'janssen.uy.pbtsc@gmail.com', 8, 'B', 'user', NULL, 2131451, 'noprofile.png', 0),
(26, 'otp', 'testing', 'account', 'otp', 'AQ', 'janssen.uy.pbtsc@gmail.com', 8, 'B', 'user', NULL, 2131451, 'noprofile.png', 0),
(27, 'asda', 'asd', 'asdasd', 'asdasd', 'asd', 'adasd@gmail.com', 8, 'A', 'user', NULL, 123123, 'noprofile.png', 0),
(28, 'otp', 'otp', 'otp', 'otp', 'gaga', 'uyjanssen09@gmail.com', 8, 'A', 'user', NULL, 123123, '311570814_164319059613872_3753397182567000339_n.jpg', 1),
(29, 'otp', 'otp', 'otp', 'otp', 'gaga', 'uyjanssen09@gmail.com', 8, 'A', 'user', NULL, 123123, 'noprofile.png', 1),
(30, 'otp', 'otp', 'otp', 'otp', 'gaga', 'uyjanssen09@gmail.com', 8, 'A', 'user', NULL, 2147483647, 'noprofile.png', 1),
(31, 'otp', 'otp', 'otp', 'otp', 'gaga', 'uyjanssen09@gmail.com', 8, 'A', 'user', NULL, 2147483647, 'noprofile.png', 1),
(32, 'A', 'A', 'A', 'A', 'gaga', 'uyjanssen09@gmail.com', 8, 'A', 'user', NULL, 123123, 'noprofile.png', 1),
(33, 'A', 'A', 'A', 'A', 'gaga', 'uyjanssen09@gmail.com', 8, 'A', 'user', NULL, 123123, 'noprofile.png', 1),
(34, 'A', 'A', 'A', 'A', 'gaga', 'uyjanssen09@gmail.com', 8, 'A', 'user', NULL, 123123, 'noprofile.png', 1),
(35, 'A', 'A', 'A', 'A', 'gaga', 'uyjanssen09@gmail.com', 8, 'A', 'user', NULL, 123123, 'noprofile.png', 1),
(36, 'A', 'A', 'A', 'A', 'gaga', 'uyjanssen09@gmail.com', 8, 'A', 'user', NULL, 123123, 'noprofile.png', 1),
(37, 'A', 'A', 'A', 'A', 'gaga', 'uyjanssen09@gmail.com', 8, 'A', 'user', NULL, 123123, 'noprofile.png', 1),
(38, 'A', 'A', 'A', 'A', 'gaga', 'uyjanssen09@gmail.com', 8, 'A', 'user', NULL, 123123, 'noprofile.png', 1),
(39, 'wat', 'wat', 'wat', 'wat', 'gaga', 'uyjanssen09@gmail.com', 8, 'B', 'user', NULL, 123123, 'noprofile.png', 1),
(40, 'wat', 'wat', 'wat', 'wat', 'gaga', 'uyjanssen09@gmail.com', 8, 'A', 'user', NULL, 123123, 'noprofile.png', 1),
(41, 'wa', 'wa', 'wa', 'wa', 'gaga', 'uyjanssen09@gmail.com', 8, 'B', 'user', NULL, 2147483647, 'noprofile.png', 1),
(42, 'test', 'test', 'test', 'weee', 'gaga', 'uyjanssen09@gmail.com', 8, 'A', 'user', NULL, 123123123, 'noprofile.png', 1),
(43, 'first', 'second', 'third', 'ffff', 'qqqq', 'georgetalosig203@gmail.com', 8, 'A', 'user', NULL, 123213, 'noprofile.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(255) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `video_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `video_path`, `video_name`, `course_name`, `video_image`) VALUES
(52, 'https://www.youtube.com/embed/URUJD5NEXC8', 'Biology: Cell Structure I Nucleus Medical Media', 'biology', '../../img/thumbnailvid4.png'),
(54, 'https://www.youtube.com/embed/yTnWU04H2Tw', 'General Physics 1 | Lesson 1: UNITS', 'physics', '../../img/thumbnailvid1.png'),
(56, 'https://www.youtube.com/embed/ZM8ECpBuQYE', 'Motion in a Straight Line: Crash Course Physics #1', 'physics', '../../img/thumbnailvid2.png'),
(59, 'https://www.youtube.com/embed/t8x3wdXZGEY', 'Random', 'zoology', '../../uploadimg/physicsvid.jpg'),
(61, 'https://www.youtube.com/embed/t8x3wdXZGEY', 'Random', 'Earth Science', '../../uploadimg/chemistryvid.jpg'),
(62, 'https://www.youtube.com/watch?v=t8x3wdXZGEY', 'Random', 'Chemistry', '../../uploadimg/chemistryvid.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `videos_demo`
--

CREATE TABLE `videos_demo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_info`
--

CREATE TABLE `video_info` (
  `course_id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `video_info`
--

INSERT INTO `video_info` (`course_id`, `image`, `description`, `course_name`) VALUES
(24, '../../img/biologyvid.jpg', 'Here are Biology Video Lesson Materials', 'biology'),
(25, '../../img/physicsvid.jpg', 'Here are Physics Video Lesson Materials', 'physics'),
(28, '../../uploadimg/chemistry2.jpg', 'Interesting Lesson', 'chemistry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentsection`
--
ALTER TABLE `commentsection`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `difficulty`
--
ALTER TABLE `difficulty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_taken`
--
ALTER TABLE `exam_taken`
  ADD PRIMARY KEY (`qt_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `lesson_id` (`difficulty`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grading`
--
ALTER TABLE `grading`
  ADD PRIMARY KEY (`grading_id`);

--
-- Indexes for table `mytable`
--
ALTER TABLE `mytable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_exam`
--
ALTER TABLE `question_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_test`
--
ALTER TABLE `question_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_taken`
--
ALTER TABLE `quiz_taken`
  ADD KEY `course_id` (`course_id`),
  ADD KEY `lesson_id` (`lesson_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `science_branch`
--
ALTER TABLE `science_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score_exam`
--
ALTER TABLE `score_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score_quiz`
--
ALTER TABLE `score_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `videos_demo`
--
ALTER TABLE `videos_demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_info`
--
ALTER TABLE `video_info`
  ADD PRIMARY KEY (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `commentsection`
--
ALTER TABLE `commentsection`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `difficulty`
--
ALTER TABLE `difficulty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exam_taken`
--
ALTER TABLE `exam_taken`
  MODIFY `qt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grading`
--
ALTER TABLE `grading`
  MODIFY `grading_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mytable`
--
ALTER TABLE `mytable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question_exam`
--
ALTER TABLE `question_exam`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `question_test`
--
ALTER TABLE `question_test`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `science_branch`
--
ALTER TABLE `science_branch`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `score_exam`
--
ALTER TABLE `score_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `score_quiz`
--
ALTER TABLE `score_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `videos_demo`
--
ALTER TABLE `videos_demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `video_info`
--
ALTER TABLE `video_info`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz_taken`
--
ALTER TABLE `quiz_taken`
  ADD CONSTRAINT `quiz_taken_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `quiz_taken_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `quiz_taken_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
