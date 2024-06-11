-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 09:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave_tbl`
--

CREATE TABLE `leave_tbl` (
  `id` int(2) NOT NULL,
  `user_id` int(3) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `time_period` int(2) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(2) NOT NULL COMMENT '0-pending.1-approved.2-rejected',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_tbl`
--

INSERT INTO `leave_tbl` (`id`, `user_id`, `start_date`, `end_date`, `time_period`, `description`, `status`, `date`) VALUES
(1, 2, '2023-05-12', '2023-05-13', 0, 'for travel', 1, '2023-05-12 13:42:58'),
(2, 6, '2023-05-27', '2023-05-28', 0, 'Summer holiday', 1, '2023-05-13 18:20:20'),
(3, 6, '2023-06-02', '2023-06-04', 0, 'cousin wedding ', 2, '2023-05-13 18:22:09'),
(4, 2, '2023-05-21', '2023-05-23', 0, 'for wedding of my close friend', 1, '2023-05-19 17:28:32'),
(5, 13, '2023-06-08', '2023-06-08', 0, 'none', 0, '2023-06-08 13:59:58'),
(6, 2, '2023-06-10', '2023-06-23', 0, 'summer vacation', 2, '2023-06-09 11:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `profile_tbl`
--

CREATE TABLE `profile_tbl` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(3) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(150) NOT NULL,
  `pincode` int(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1=admin,0=employee',
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_tbl`
--

INSERT INTO `profile_tbl` (`id`, `user_name`, `f_name`, `l_name`, `email`, `phone`, `gender`, `age`, `dob`, `address`, `pincode`, `password`, `status`, `salary`) VALUES
(1, 'admin', 'Admin', 'admin', 'admin@admin.com', 1234567890, 'Male', 38, '1987-06-28', 'noewhere land', 309999, 'admin', 1, 500000),
(2, 'emp', 'Employee', 'joe', 'emp@emp.com', 9783417290, 'Male', 20, '2003-06-12', 'near london street', 120032, 'emp', 0, 250000),
(3, 'peter_parker', '', '', 'peter@parker.com', 0, '', 0, '0000-00-00', '', 0, 'MJ', 1, NULL),
(5, 'Jaime_lanister', '', '', 'jaime@lanister.com', 0, '', 0, '0000-00-00', '', 0, 'sersi', 0, NULL),
(6, 'sersi_lanister', '', '', 'sersi@lanister.com', 0, '', 0, '0000-00-00', '', 0, 'jaime', 0, NULL),
(8, 'NewAdmin', '', '', 'admin@new.com', 0, '', 0, '0000-00-00', '', 0, 'newadmin', 1, NULL),
(11, 'NewAdmin', '', '', 'new@myadmin.com', 0, '', 0, '0000-00-00', '', 0, 'mynewadmin', 1, NULL),
(12, 'arpanvala', '', '', 'aaryanvala06@gmail.com', 0, '', 0, '0000-00-00', '', 0, '123', 0, NULL),
(14, 'user_emp', '', '', 'user@emp.com', 0, 'Male', 0, '0000-00-00', '', 0, 'user', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1=admin,0=employee',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `email`, `password`, `status`, `date`) VALUES
(1, 'admin', 'admin@admin.com', 'admin1', 1, '2023-05-12 13:32:04'),
(2, 'emp', 'emp@emp.com', 'emp', 0, '2023-05-12 13:36:42'),
(3, 'peter_parker', 'peter@parker.com', 'MJ', 1, '2023-05-12 13:37:45'),
(5, 'Jaime_lanister', 'jaime@lanister.com', 'sersi', 0, '2023-05-13 17:18:39'),
(6, 'sersi_lanister', 'sersi@lanister.com', 'jaime', 0, '2023-05-13 17:25:22'),
(8, 'NewAdmin', 'admin@new.com', 'newadmin', 1, '2023-05-19 15:30:59'),
(11, 'NewAdmin', 'new@myadmin.com', 'mynewadmin', 1, '2023-05-19 17:25:19'),
(14, 'user_emp', 'user@emp.com', 'user', 0, '2023-06-08 14:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `work_tbl`
--

CREATE TABLE `work_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(35) NOT NULL,
  `description` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `duedate` date NOT NULL,
  `enddate` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=incomplete 1=complete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_tbl`
--

INSERT INTO `work_tbl` (`id`, `user_id`, `title`, `description`, `startdate`, `duedate`, `enddate`, `status`) VALUES
(1, 2, 'Employee Managment ', 'Create an EMS that contains major aspects of managing employee.', '2023-05-13', '2023-05-14', '0000-00-00', 1),
(2, 2, 'Employee Managment ', 'Create an EMS that contains major aspects of managing employee.', '2023-05-13', '2023-05-14', '0000-00-00', 1),
(3, 2, 'wkefijjf', 'kjwerhn', '2023-05-13', '2023-05-13', '0000-00-00', 1),
(4, 5, 'Portfolio', 'Create a portfolio and prepare CV', '2023-05-13', '2023-05-13', '0000-00-00', 1),
(5, 5, 'Portfolio', 'Create a portfolio and prepare CV', '2023-05-13', '2023-05-13', '2023-05-13', 1),
(6, 6, 'Graphic Image generator', 'create fully computarized graphic image genrator application', '2023-05-13', '2023-05-23', '0000-00-00', 0),
(7, 5, 'portfolio ', 'Create portfolio that contains all information about new employee', '2023-05-19', '2023-05-26', '0000-00-00', 0),
(8, 2, 'attendance managment system', 'create attendance taking project', '2023-06-30', '2023-07-01', '2023-06-08', 1),
(9, 2, 'portfolio', 'assign portfolioi', '2023-06-09', '2023-06-09', '2023-06-09', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_tbl`
--
ALTER TABLE `profile_tbl`
  ADD PRIMARY KEY (`id`,`email`,`password`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`,`email`,`password`);

--
-- Indexes for table `work_tbl`
--
ALTER TABLE `work_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile_tbl`
--
ALTER TABLE `profile_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `work_tbl`
--
ALTER TABLE `work_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
