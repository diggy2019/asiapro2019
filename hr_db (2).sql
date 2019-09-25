-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2019 at 12:30 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `day1` varchar(100) NOT NULL,
  `day2` varchar(20) NOT NULL,
  `day3` varchar(11) NOT NULL,
  `day4` varchar(20) NOT NULL,
  `day5` varchar(11) NOT NULL,
  `day6` varchar(11) NOT NULL,
  `day7` varchar(11) NOT NULL,
  `day8` varchar(11) NOT NULL,
  `day9` varchar(11) NOT NULL,
  `day10` varchar(11) NOT NULL,
  `day11` varchar(11) NOT NULL,
  `day12` varchar(11) NOT NULL,
  `day13` varchar(11) NOT NULL,
  `day14` varchar(11) NOT NULL,
  `day15` varchar(11) NOT NULL,
  `day16` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `contact_person` varchar(20) NOT NULL,
  `branch_place` varchar(30) NOT NULL,
  `number` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `contact_person`, `branch_place`, `number`, `password`) VALUES
(3, 'test', 'test', 'test', '09106736116', '12345'),
(4, 'jolibee', 'matthew', 'san sebastian', '09106736116', '12345'),
(5, 'Office', 'matthew', 'bacolod city', '09106736116', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE `deduction` (
  `deduction_id` int(11) NOT NULL,
  `deduction_name` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`deduction_id`, `deduction_name`, `amount`) VALUES
(2, ' SSS ', 245),
(3, 'Pag-Ibig', 300);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthdate` varchar(30) NOT NULL,
  `contact_info` varchar(20) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `branch_id` int(30) DEFAULT '5',
  `void` varchar(30) NOT NULL DEFAULT 'Not yet assign',
  `file` varchar(30) NOT NULL,
  `month_enter` varchar(30) NOT NULL DEFAULT 'not yet'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `birthdate`, `contact_info`, `gender`, `branch_id`, `void`, `file`, `month_enter`) VALUES
(3, 'matthew', 'blancada', '2019-09-02', '09106736116', 'male', 3, 'true', 'payroll.pdf', 'not yet');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_report`
--

CREATE TABLE `monthly_report` (
  `report_id` int(11) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Dept` varchar(50) NOT NULL,
  `Shift` varchar(30) NOT NULL,
  `Work_day` varchar(20) NOT NULL,
  `Day_Attended` varchar(11) NOT NULL,
  `Absent_day` varchar(11) NOT NULL,
  `Late_Mins` varchar(30) NOT NULL,
  `Late_Times` varchar(30) NOT NULL,
  `Early_Mins` varchar(20) NOT NULL,
  `Early_Times` varchar(20) NOT NULL,
  `OT_hours` varchar(20) NOT NULL,
  `Holidays` varchar(20) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthly_report`
--

INSERT INTO `monthly_report` (`report_id`, `employee_id`, `Name`, `Dept`, `Shift`, `Work_day`, `Day_Attended`, `Absent_day`, `Late_Mins`, `Late_Times`, `Early_Mins`, `Early_Times`, `OT_hours`, `Holidays`, `branch_id`) VALUES
(1, 1, 'Admin ', 'Office ', 'Shift1 ', ' 10.9', '  5.5', '  5.5', '107', '2', '87', '1', '', '', 3),
(2, 2, '2 ', 'Office ', 'Shift1 ', ' 10.9', '  0.5', ' 10.5', '96', '1', '79', '1', '', '', 3),
(3, 3, 'Matthew ', 'Office ', 'Shift1 ', ' 10.9', '0', ' 10.9', '', '', '', '', '0', '', 3),
(4, 4, 'Jol ', 'Office ', 'Shift1 ', ' 10.9', '', ' 10.9', '', '', '', '', '', '', 3),
(5, 5, 'Rene ', 'Office ', 'Shift1 ', ' 10.9', '  5.0', '  5.9', '2', '1', '', '', '', '', 3),
(6, 6, 'Emiko ', ' ', 'Shift1 ', ' 10.9', '  1.0', '  9.9', '', '', '', '', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `statistics_id` int(11) NOT NULL,
  `employees` int(50) NOT NULL,
  `month` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`statistics_id`, `employees`, `month`) VALUES
(1, 0, 'Jan'),
(2, 0, 'Feb'),
(3, 0, 'Mar'),
(4, 1, 'Apr'),
(5, 0, 'May'),
(6, 0, 'Jun'),
(7, 0, 'Jul'),
(8, 0, 'Aug'),
(9, 100, 'Sep'),
(10, 0, 'Oct'),
(11, 0, 'Nov'),
(12, 0, 'Dec');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`deduction_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `monthly_report`
--
ALTER TABLE `monthly_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`statistics_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `deduction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monthly_report`
--
ALTER TABLE `monthly_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `statistics_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`);

--
-- Constraints for table `monthly_report`
--
ALTER TABLE `monthly_report`
  ADD CONSTRAINT `monthly_report_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
