-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 07:40 AM
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
(5, 5, 'mod', '123', 3, 1);

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
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_peerinfo`
--

INSERT INTO `tbl_peerinfo` (`peer_id`, `firstname`, `middlename`, `lastname`, `email`, `contactnum`, `dob`, `gender`, `year`, `course`) VALUES
(1, 'Rommel', 'awda', 'Maningas', 'sanluisjohnrendel87@gmail.com', '09707060100', '2023-07-15', 'male', 'first_year', 'bsit'),
(3, 'Rendyy', 'san lu', 'asda', 'rendel@gmail.com', '102931031', '2023-07-19', 'male', 'first_year', 'bsit'),
(4, 'tutee', 'tutee', 'tutee', 'tutee@gmail.com', '09707060100', '2023-08-24', 'male', 'forth_year', 'bsed'),
(5, 'mod', 'mod', 'mod', 'mod@gmail.com', '09707060100', '2023-08-14', 'female', 'first_year', 'bsit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedules`
--

CREATE TABLE `tbl_schedules` (
  `sched_id` int(11) NOT NULL,
  `peer_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `start` time DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schedules`
--

INSERT INTO `tbl_schedules` (`sched_id`, `peer_id`, `title`, `description`, `place`, `start`, `duration`, `date`) VALUES
(34, 3, 'Math', 'Algo', 'CICT', '13:26:00', 1, '2023-08-21');

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
-- Indexes for table `tbl_inactive_accounts`
--
ALTER TABLE `tbl_inactive_accounts`
  ADD PRIMARY KEY (`peer_ia`);

--
-- Indexes for table `tbl_peerinfo`
--
ALTER TABLE `tbl_peerinfo`
  ADD PRIMARY KEY (`peer_id`);

--
-- Indexes for table `tbl_schedules`
--
ALTER TABLE `tbl_schedules`
  ADD PRIMARY KEY (`sched_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_inactive_accounts`
--
ALTER TABLE `tbl_inactive_accounts`
  MODIFY `peer_ia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_peerinfo`
--
ALTER TABLE `tbl_peerinfo`
  MODIFY `peer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_schedules`
--
ALTER TABLE `tbl_schedules`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
