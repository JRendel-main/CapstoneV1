-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 03:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstonev1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth`
--

CREATE TABLE `tbl_auth` (
  `auth_id` int(11) NOT NULL,
  `peer_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `acc_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_auth`
--

INSERT INTO `tbl_auth` (`auth_id`, `peer_id`, `username`, `password`, `cat_id`, `acc_status`) VALUES
(1, 1, '1', '1', 0, 1),
(3, 3, 'tutor', '123', 2, 1),
(4, 4, 'tutee', '123', 1, 1),
(5, 5, 'mod', '123', 3, 1),
(6, 6, 'rendel', '123', 0, 1),
(7, 7, 'carlos', '123', 2, 1),
(10, 10, 'tricia', '123', 1, 1),
(11, 11, 'triciaa', '123', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_alias` varchar(255) DEFAULT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `course_alias`, `date_created`) VALUES
(1, 'Bachelor of Science in Information Technology', 'CICT', '0000-00-00'),
(2, 'Bachelor of Science in Architecture', 'COA', '0000-00-00'),
(3, 'Bachelor of Science in Criminology', 'COC', '0000-00-00'),
(4, 'Bachelor of Elementary Education', 'COED', '0000-00-00'),
(5, 'Bachelor of Physical Education', 'COED', '0000-00-00'),
(6, 'Bachelor of Secondary Education', 'COED', '0000-00-00'),
(7, 'Bachelor of Technology and Livelihood Education', 'COED', '0000-00-00'),
(8, 'Bachelor of Science in Industrial Education', 'COED', '0000-00-00'),
(9, 'Bachelor of Science in Physical Education', 'COED', '0000-00-00'),
(10, 'Bachelor of Special Needs Education with specialization in Early Childhood Education', 'COED', '0000-00-00'),
(11, 'Certificate in Professional Teacher Education', 'COED', '0000-00-00'),
(12, 'Bachelor of Science in Civil Engineering', 'COE', '0000-00-00'),
(13, 'Bachelor of Science in Electrical Engineering', 'COE', '0000-00-00'),
(14, 'Bachelor of Science in Mechanical Engineering', 'COE', '0000-00-00'),
(15, 'Bachelor of Science in Business Administration', 'CMBT', '0000-00-00'),
(16, 'Bachelor of Science in Entrepreneurship', 'CMBT', '0000-00-00'),
(17, 'Bachelor of Science in Hospitality Management', 'CMBT', '0000-00-00'),
(18, 'Bachelor of Science in Hotel and Restaurant Management', 'CMBT', '0000-00-00'),
(19, 'Bachelor of Science in Tourism Management', 'CMBT', '0000-00-00'),
(20, 'Bachelor of Public Administration', 'CPADM', '0000-00-00'),
(21, 'Bachelor of Public Administration Major in Disaster Management', 'CPADM', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disabled_scheds`
--

CREATE TABLE `tbl_disabled_scheds` (
  `disabled_id` int(11) NOT NULL,
  `sched_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_disabled_scheds`
--

INSERT INTO `tbl_disabled_scheds` (`disabled_id`, `sched_id`, `type`, `reason`, `date`) VALUES
(7, 65, 'disabled', 'testt', '2023-09-11 19:30:31'),
(8, 64, 'disabled', 'test', '2023-09-11 21:25:31'),
(9, 63, 'disabled', 'SELECT * from tbl_schedule', '2023-09-11 21:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documentation`
--

CREATE TABLE `tbl_documentation` (
  `docu_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `picture_path` varchar(255) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_documentation`
--

INSERT INTO `tbl_documentation` (`docu_id`, `request_id`, `picture_path`, `feedback`) VALUES
(17, 39, '../documentation/RobloxScreenShot20230602_150222706.png', 'test'),
(18, 41, '../documentation/RobloxScreenShot20230802_120400054.png1', 'testt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_f2f`
--

CREATE TABLE `tbl_f2f` (
  `mode_id` int(11) NOT NULL,
  `sched_id` int(11) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_f2f`
--

INSERT INTO `tbl_f2f` (`mode_id`, `sched_id`, `place`) VALUES
(1, 40, '1'),
(2, 44, 'agassd'),
(3, 48, 'CICT'),
(4, 49, 'adwa'),
(5, 51, 'gg'),
(6, 52, ''),
(7, 53, ''),
(8, 61, 'adwa'),
(9, 64, 'CICT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inactive_accounts`
--

CREATE TABLE `tbl_inactive_accounts` (
  `peer_ia` int(10) NOT NULL,
  `peer_id` int(10) NOT NULL,
  `type` int(10) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='1 = declined, 2 = disabled';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `log_id` int(11) NOT NULL,
  `peer_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`log_id`, `peer_id`, `action`, `date`) VALUES
(1, 6, 'Login', '2023-09-11 22:26:01'),
(3, 6, 'Login', '2023-09-11 22:29:12'),
(5, 7, 'Login', '2023-09-11 22:29:51'),
(6, 7, 'Logout', '2023-09-11 22:29:55'),
(7, 6, 'Login', '2023-09-11 22:30:08'),
(8, 6, 'Logout', '2023-09-11 22:39:31'),
(9, 3, 'Login', '2023-09-11 22:39:37'),
(10, 3, 'Logout', '2023-09-11 22:40:10'),
(11, 6, 'Login', '2023-09-11 22:40:14'),
(12, 6, 'Logout', '2023-09-11 23:03:41'),
(13, 3, 'Login', '2023-09-11 23:03:59'),
(14, 3, 'Logout', '2023-09-11 23:57:19'),
(15, 5, 'Login', '2023-09-11 23:57:25'),
(16, 5, 'Logout', '2023-09-11 23:57:48'),
(17, 6, 'Login', '2023-09-11 23:58:09'),
(18, 6, 'Login', '2023-09-12 01:07:31'),
(19, 6, 'Logout', '2023-09-12 01:37:27'),
(20, 3, 'Login', '2023-09-12 01:37:33'),
(21, 3, 'Logout', '2023-09-12 01:37:40'),
(22, 6, 'Login', '2023-09-12 19:13:31'),
(23, 6, 'Logout', '2023-09-12 19:21:57'),
(24, 3, 'Login', '2023-09-12 19:21:59'),
(25, 3, 'Logout', '2023-09-12 19:22:03'),
(26, 4, 'Login', '2023-09-12 19:22:06'),
(27, 4, 'Logout', '2023-09-12 20:22:26'),
(28, 3, 'Login', '2023-09-12 20:22:29'),
(29, 3, 'Logout', '2023-09-12 20:26:04'),
(30, 4, 'Login', '2023-09-12 20:26:09'),
(31, 4, 'Login', '2023-09-12 23:59:56'),
(32, 4, 'Logout', '2023-09-13 01:36:09'),
(33, 7, 'Login', '2023-09-13 01:36:13'),
(34, 7, 'Logout', '2023-09-13 01:36:19'),
(35, 10, 'Login', '2023-09-13 01:36:37'),
(36, 10, 'Logout', '2023-09-13 01:39:54'),
(37, 4, 'Login', '2023-09-13 01:39:57'),
(38, 6, 'Login', '2023-09-13 18:44:57'),
(39, 6, 'Logout', '2023-09-13 18:45:01'),
(40, 4, 'Login', '2023-09-13 18:45:06'),
(41, 4, 'Logout', '2023-09-13 19:27:27'),
(42, 4, 'Login', '2023-09-13 19:30:23'),
(43, 4, 'Logout', '2023-09-13 19:31:38'),
(44, 4, 'Login', '2023-09-13 19:31:41'),
(45, 4, 'Logout', '2023-09-13 19:31:44'),
(46, 3, 'Login', '2023-09-13 19:31:46'),
(47, 3, 'Logout', '2023-09-13 19:55:04'),
(48, 6, 'Login', '2023-09-13 20:00:52'),
(49, 6, 'Logout', '2023-09-13 20:00:56'),
(50, 6, 'Login', '2023-09-13 20:01:00'),
(51, 6, 'Logout', '2023-09-13 20:01:03'),
(52, 4, 'Login', '2023-09-13 20:01:07'),
(53, 4, 'Logout', '2023-09-13 20:05:24'),
(54, 4, 'Login', '2023-09-13 20:05:51'),
(55, 4, 'Logout', '2023-09-13 21:09:55'),
(56, 3, 'Login', '2023-09-13 21:09:58'),
(57, 3, 'Logout', '2023-09-13 21:58:04'),
(58, 7, 'Login', '2023-09-13 21:58:10'),
(59, 7, 'Logout', '2023-09-13 22:15:31'),
(60, 4, 'Login', '2023-09-13 22:15:35'),
(61, 4, 'Logout', '2023-09-13 22:25:02'),
(62, 3, 'Login', '2023-09-13 22:25:05'),
(63, 3, 'Logout', '2023-09-13 22:26:04'),
(64, 4, 'Login', '2023-09-13 22:26:08'),
(65, 4, 'Logout', '2023-09-13 22:26:53'),
(66, 3, 'Login', '2023-09-13 22:26:57'),
(67, 7, 'Login', '2023-09-14 20:35:58'),
(68, 7, 'Login', '2023-09-14 20:35:58'),
(69, 7, 'Logout', '2023-09-14 20:36:04'),
(70, 4, 'Login', '2023-09-14 20:36:07'),
(71, 4, 'Logout', '2023-09-14 20:38:41'),
(72, 5, 'Login', '2023-09-14 20:40:54'),
(73, 5, 'Logout', '2023-09-14 21:23:53'),
(74, 4, 'Login', '2023-09-14 21:23:56'),
(75, 6, 'Login', '2023-09-15 19:23:24'),
(76, 6, 'Logout', '2023-09-15 21:26:44'),
(77, 3, 'Login', '2023-09-15 21:26:47'),
(78, 3, 'Logout', '2023-09-15 21:26:55'),
(79, 6, 'Login', '2023-09-15 21:26:59'),
(80, 6, 'Login', '2023-09-16 12:52:37'),
(81, 6, 'Login', '2023-09-16 19:57:27'),
(82, 6, 'Logout', '2023-09-17 00:15:05'),
(83, 6, 'Login', '2023-09-17 00:15:09'),
(84, 6, 'Logout', '2023-09-17 00:15:18'),
(85, 4, 'Login', '2023-09-17 00:15:24'),
(86, 6, 'Login', '2023-09-17 19:32:25'),
(87, 6, 'Logout', '2023-09-17 19:35:05'),
(88, 4, 'Login', '2023-09-17 19:35:08'),
(89, 4, 'Logout', '2023-09-17 19:36:54'),
(90, 7, 'Login', '2023-09-17 19:37:00'),
(91, 7, 'Logout', '2023-09-17 19:37:35'),
(92, 3, 'Login', '2023-09-17 19:37:37'),
(93, 3, 'Logout', '2023-09-17 19:38:36'),
(94, 5, 'Login', '2023-09-17 19:38:42'),
(95, 5, 'Logout', '2023-09-17 19:40:03'),
(96, 3, 'Login', '2023-09-17 19:40:06'),
(97, 3, 'Logout', '2023-09-17 19:40:09'),
(98, 6, 'Login', '2023-09-17 19:40:21'),
(99, 6, 'Logout', '2023-09-17 20:01:41'),
(100, 5, 'Login', '2023-09-17 20:01:48'),
(101, 5, 'Logout', '2023-09-17 20:17:11'),
(102, 4, 'Login', '2023-09-17 20:17:15'),
(103, 4, 'Logout', '2023-09-17 20:19:31'),
(104, 6, 'Login', '2023-09-17 20:45:23'),
(105, 6, 'Logout', '2023-09-17 20:45:29'),
(106, 4, 'Login', '2023-09-17 20:45:33'),
(107, 4, 'Logout', '2023-09-17 21:35:29'),
(108, 3, 'Login', '2023-09-17 21:35:35'),
(109, 3, 'Logout', '2023-09-17 21:35:55'),
(110, 4, 'Login', '2023-09-17 21:35:57'),
(111, 4, 'Logout', '2023-09-17 21:36:11'),
(112, 3, 'Login', '2023-09-17 21:36:16'),
(113, 3, 'Logout', '2023-09-17 21:39:31'),
(114, 7, 'Login', '2023-09-17 21:39:35'),
(115, 7, 'Logout', '2023-09-17 21:40:04'),
(116, 4, 'Login', '2023-09-17 21:40:08'),
(117, 4, 'Logout', '2023-09-17 21:40:27'),
(118, 7, 'Login', '2023-09-17 21:40:30'),
(119, 7, 'Logout', '2023-09-17 21:47:57'),
(120, 7, 'Login', '2023-09-17 21:48:07'),
(121, 10, 'Login', '2023-09-17 21:48:11'),
(122, 7, 'Logout', '2023-09-17 21:54:42'),
(123, 6, 'Login', '2023-09-17 21:54:46'),
(124, 6, 'Logout', '2023-09-17 21:54:50'),
(125, 6, 'Login', '2023-09-17 21:54:53'),
(126, 6, 'Logout', '2023-09-17 22:00:03'),
(127, 5, 'Login', '2023-09-17 22:00:06'),
(128, 5, 'Logout', '2023-09-17 22:00:37'),
(129, 3, 'Login', '2023-09-17 22:00:40'),
(130, 3, 'Logout', '2023-09-17 22:03:00'),
(131, 3, 'Login', '2023-09-17 22:03:04'),
(132, 3, 'Logout', '2023-09-17 22:20:20'),
(133, 10, 'Logout', '2023-09-17 22:54:25'),
(134, 4, 'Login', '2023-09-17 22:54:30'),
(135, 4, 'Logout', '2023-09-17 23:09:58'),
(136, 6, 'Login', '2023-09-17 23:10:02'),
(137, 6, 'Login', '2023-09-18 14:09:51'),
(138, 6, 'Login', '2023-09-18 14:09:51'),
(139, 6, 'Logout', '2023-09-18 15:02:49'),
(140, 4, 'Login', '2023-09-18 15:02:53'),
(141, 4, 'Logout', '2023-09-18 15:09:16'),
(142, 5, 'Login', '2023-09-18 15:09:20'),
(143, 5, 'Logout', '2023-09-18 18:22:07'),
(144, 6, 'Login', '2023-09-18 18:22:10'),
(145, 6, 'Logout', '2023-09-18 18:22:34'),
(146, 4, 'Login', '2023-09-18 18:22:38'),
(147, 4, 'Logout', '2023-09-18 18:28:21'),
(148, 3, 'Login', '2023-09-18 18:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_online`
--

CREATE TABLE `tbl_online` (
  `mode_id` int(11) NOT NULL,
  `sched_id` int(11) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_online`
--

INSERT INTO `tbl_online` (`mode_id`, `sched_id`, `platform`, `link`) VALUES
(1, 45, 'messenger', 'adwada'),
(2, 46, 'messenger', 'fb.com'),
(3, 47, 'discord', '21'),
(4, 50, 'discord', 'awda'),
(5, 54, 'skype', 'fsdf'),
(6, 55, '', ''),
(7, 56, '', ''),
(8, 57, '', ''),
(9, 58, 'discord', '2132'),
(10, 60, 'messenger', 'adwa'),
(11, 62, 'messenger', 'sdfs'),
(12, 63, 'discord', '2'),
(13, 65, 'messenger', 'messenger.com'),
(14, 66, 'googlemeet', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peerinfo`
--

CREATE TABLE `tbl_peerinfo` (
  `peer_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactnum` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `cor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_peerinfo`
--

INSERT INTO `tbl_peerinfo` (`peer_id`, `firstname`, `middlename`, `lastname`, `email`, `contactnum`, `dob`, `gender`, `year`, `course`, `cor`) VALUES
(1, 'Rommel', 'awda', 'Maningas', 'sanluisjohnrendel87@gmail.com', '09707060100', '2023-07-15', 'male', 'first_year', '1', ''),
(3, 'John Rendel', ' ', 'San Luis', 'rendel@gmail.com', '123131', '2023-07-19', 'male', 'first_year', '3', ''),
(4, 'tutee', 'tutee', 'tutee', 'tutee@gmail.com', '09707060100', '2023-08-24', 'male', 'forth_year', '6', ''),
(5, 'mod', 'mod', 'mod', 'mod@gmail.com', '09707060100', '2023-08-14', 'female', 'first_year', '1', ''),
(6, 'awda', 'adaw', 'awda', 'awda', '09707060100', '2023-08-01', 'male', 'first_year', '2', '369407835_968151121153018_1649012211858942269_n.jpg'),
(7, 'Carlos', 'Mari', 'Ellerma', 'carlos@gmail.com', '1231', '2023-09-05', 'male', 'first_year', '1', 'photo.PNG'),
(10, 'tricia', 'mae', 'cortez', 'johnrendel87@gmail.com', '09123131231', '2023-09-06', 'female', 'third_year', '13', 'RobloxScreenShot20230602_150222706.png'),
(11, 'tricia', 'mae', 'cortez', 'johnrendel87@gmail.com', '19238019', '2023-08-28', 'female', 'forth_year', '14', 'RobloxScreenShot20230710_175557328.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ratings`
--

CREATE TABLE `tbl_ratings` (
  `rating_id` int(11) NOT NULL,
  `peer_id` int(11) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `avg_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ratings`
--

INSERT INTO `tbl_ratings` (`rating_id`, `peer_id`, `rank`, `points`, `avg_rating`) VALUES
(1, 3, 'Novice', 29, 4),
(2, 7, 'Novice', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `report_id` int(11) NOT NULL,
  `peer_id` int(11) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `priority_level` int(11) DEFAULT NULL,
  `report` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`report_id`, `peer_id`, `subject`, `priority_level`, `report`) VALUES
(1, 4, 'test', 4, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `request_id` int(11) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `tutee_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `request_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`request_id`, `tutor_id`, `tutee_id`, `schedule_id`, `request_status`) VALUES
(39, 3, 4, 64, 3),
(40, 7, 4, 65, 1),
(41, 3, 4, 66, 3),
(42, 3, 4, 61, 1),
(43, 7, 10, 65, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedules`
--

CREATE TABLE `tbl_schedules` (
  `sched_id` int(11) NOT NULL,
  `peer_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `mode` int(11) DEFAULT NULL,
  `mode_id` int(11) NOT NULL,
  `start` time DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `max_tutee` int(11) NOT NULL,
  `sched_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schedules`
--

INSERT INTO `tbl_schedules` (`sched_id`, `peer_id`, `title`, `description`, `mode`, `mode_id`, `start`, `duration`, `date`, `max_tutee`, `sched_status`) VALUES
(61, 3, 'gsdcvx', 'asdaaw', 0, 8, '22:25:00', 2, '2023-09-21', 1, 1),
(63, 3, 'Test', 'test', 1, 12, '22:30:00', 2, '2023-09-07', 1, 1),
(64, 3, 'Python', 'Test', 0, 9, '09:40:00', 2, '2023-09-08', 5, 1),
(65, 7, 'English Proficency', 'Enlosh', 1, 13, '18:45:00', 2, '2023-09-28', 2, 1),
(66, 3, 'test', 'test', 1, 14, '10:45:10', 2, '2023-09-11', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonials`
--

CREATE TABLE `tbl_testimonials` (
  `testimonial_id` int(11) NOT NULL,
  `peer_id` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutor_profile`
--

CREATE TABLE `tbl_tutor_profile` (
  `profile_id` int(11) NOT NULL,
  `peer_id` int(11) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `about_me` varchar(255) DEFAULT NULL,
  `expertise_id` varchar(255) DEFAULT NULL,
  `rating_id` int(11) DEFAULT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tutor_profile`
--

INSERT INTO `tbl_tutor_profile` (`profile_id`, `peer_id`, `bio`, `about_me`, `expertise_id`, `rating_id`, `profile`) VALUES
(1, 3, 'testing', 'im white', 'Web Design, Python,Database', 1, ''),
(2, 7, 'test', NULL, 'test,test2', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  ADD PRIMARY KEY (`auth_id`),
  ADD KEY `peer_id` (`peer_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_disabled_scheds`
--
ALTER TABLE `tbl_disabled_scheds`
  ADD PRIMARY KEY (`disabled_id`);

--
-- Indexes for table `tbl_documentation`
--
ALTER TABLE `tbl_documentation`
  ADD PRIMARY KEY (`docu_id`);

--
-- Indexes for table `tbl_f2f`
--
ALTER TABLE `tbl_f2f`
  ADD PRIMARY KEY (`mode_id`);

--
-- Indexes for table `tbl_inactive_accounts`
--
ALTER TABLE `tbl_inactive_accounts`
  ADD PRIMARY KEY (`peer_ia`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_online`
--
ALTER TABLE `tbl_online`
  ADD PRIMARY KEY (`mode_id`);

--
-- Indexes for table `tbl_peerinfo`
--
ALTER TABLE `tbl_peerinfo`
  ADD PRIMARY KEY (`peer_id`);

--
-- Indexes for table `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_schedules`
--
ALTER TABLE `tbl_schedules`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `tbl_tutor_profile`
--
ALTER TABLE `tbl_tutor_profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_disabled_scheds`
--
ALTER TABLE `tbl_disabled_scheds`
  MODIFY `disabled_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_documentation`
--
ALTER TABLE `tbl_documentation`
  MODIFY `docu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_f2f`
--
ALTER TABLE `tbl_f2f`
  MODIFY `mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_inactive_accounts`
--
ALTER TABLE `tbl_inactive_accounts`
  MODIFY `peer_ia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `tbl_online`
--
ALTER TABLE `tbl_online`
  MODIFY `mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_peerinfo`
--
ALTER TABLE `tbl_peerinfo`
  MODIFY `peer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_schedules`
--
ALTER TABLE `tbl_schedules`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tutor_profile`
--
ALTER TABLE `tbl_tutor_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  ADD CONSTRAINT `tbl_auth_ibfk_1` FOREIGN KEY (`peer_id`) REFERENCES `tbl_peerinfo` (`peer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
