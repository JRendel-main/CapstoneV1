-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2023 at 04:33 PM
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
(5, 5, 'mod', '123', 1, 1),
(6, 6, 'rendel', '123', 0, 1);

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
(8, 61, 'adwa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inactive_accounts`
--

CREATE TABLE `tbl_inactive_accounts` (
  `peer_ia` int(10) NOT NULL,
  `peer_id` int(10) NOT NULL,
  `type` int(10) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='1 = declined, 2 = disabled';

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
(11, 62, 'messenger', 'sdfs');

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
(1, 'Rommel', 'awda', 'Maningas', 'sanluisjohnrendel87@gmail.com', '09707060100', '2023-07-15', 'male', 'first_year', 'bsit', ''),
(3, 'John Rendel', ' ', 'San Luis', 'rendel@gmail.com', '123131', '2023-07-19', 'male', 'first_year', 'bsit', ''),
(4, 'tutee', 'tutee', 'tutee', 'tutee@gmail.com', '09707060100', '2023-08-24', 'male', 'forth_year', 'bsed', ''),
(5, 'mod', 'mod', 'mod', 'mod@gmail.com', '09707060100', '2023-08-14', 'female', 'first_year', 'bsit', ''),
(6, 'awda', 'adaw', 'awda', 'awda', '09707060100', '2023-08-01', 'male', 'first_year', 'bsit', '369407835_968151121153018_1649012211858942269_n.jpg');

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
(34, 3, 4, 46, 3);

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
  `max_tutee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schedules`
--

INSERT INTO `tbl_schedules` (`sched_id`, `peer_id`, `title`, `description`, `mode`, `mode_id`, `start`, `duration`, `date`, `max_tutee`) VALUES
(46, 3, 'Java', 'Spring booth', 1, 0, '03:20:00', 2, '2023-08-30', 2),
(47, 3, 'Python', 'Programming', 1, 0, '03:08:00', 3, '2023-09-21', 1),
(48, 3, 'SQL', 'SQL', 0, 0, '16:30:00', 2, '2023-09-19', 2),
(60, 3, 'sdfs', 'sersa', 1, 60, '00:00:06', 1, '2023-09-13', 1),
(61, 3, 'gsdcvx', 'asdaaw', 0, 8, '16:02:00', 2, '2023-09-21', 1),
(62, 3, 'bcvxc', 'sdfsa', 1, 11, '16:02:00', 1, '2023-09-30', 1);

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
(1, 3, 'testing', 'im white', 'Web Design, Python,Database', 1, '');

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
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_f2f`
--
ALTER TABLE `tbl_f2f`
  MODIFY `mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_inactive_accounts`
--
ALTER TABLE `tbl_inactive_accounts`
  MODIFY `peer_ia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_online`
--
ALTER TABLE `tbl_online`
  MODIFY `mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_peerinfo`
--
ALTER TABLE `tbl_peerinfo`
  MODIFY `peer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_schedules`
--
ALTER TABLE `tbl_schedules`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_tutor_profile`
--
ALTER TABLE `tbl_tutor_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
