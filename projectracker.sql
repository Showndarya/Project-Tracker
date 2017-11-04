-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2017 at 11:49 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectracker`
--
CREATE DATABASE projectracker;
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_un` varchar(100) NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_un`, `ad_name`, `p_id`) VALUES
(2, '	 domain_admin1', 'Admin', 1),
(4, 'domain_admin2', 'admin2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_username` varchar(50) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_username`, `emp_name`, `emp_dept`) VALUES
(1, 'domain_user1', 'User', 'Dept'),
(3, 'domain_user2', 'Mushu', 'Dept');

-- --------------------------------------------------------

--
-- Table structure for table `empro`
--

CREATE TABLE `empro` (
  `sn` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empro`
--

INSERT INTO `empro` (`sn`, `emp_id`, `p_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(8, 3, 1),
(9, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issue_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `issue_name` varchar(50) DEFAULT NULL,
  `issue_desc` varchar(200) DEFAULT NULL,
  `cat_id` int(20) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Open',
  `assign` int(11) NOT NULL,
  `assign_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`issue_id`, `emp_id`, `project_id`, `issue_name`, `issue_desc`, `cat_id`, `status`, `assign`, `assign_to`) VALUES
(1, 1, 1, 'issue1', 'this is an issue', 1, 'Closed', 1, 1),
(2, 1, 1, 'issue2', 'this is an issue2', 3, 'In Progress', 0, 0),
(9, 1, 1, 'issue3', 'this is an issue3', 5, 'Open', 1, 1),
(10, 1, 2, 'issue4', 'First issue in project 2', 0, 'In Progress', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `issuecat`
--

CREATE TABLE `issuecat` (
  `cat_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuecat`
--

INSERT INTO `issuecat` (`cat_id`, `p_id`, `cat_name`) VALUES
(1, 1, 'CAT1'),
(2, 1, 'CAT2'),
(3, 1, 'CAT3'),
(4, 1, 'CAT4'),
(5, 1, 'CAT5');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `pwd`, `admin`) VALUES
(1, 'domain_user1', 'user1', 0),
(2, 'domain_admin1', 'admin1', 1),
(3, 'domain_user2', 'user2', 0),
(4, 'domain_admin2', 'admin2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_desc` varchar(200) NOT NULL,
  `p_sd` varchar(50) NOT NULL,
  `p_ed` varchar(50) NOT NULL,
  `p_location` varchar(50) NOT NULL,
  `p_budget` int(11) NOT NULL,
  `p_client` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`p_id`, `p_name`, `p_desc`, `p_sd`, `p_ed`, `p_location`, `p_budget`, `p_client`) VALUES
(1, 'PROJ1', 'The project is P1. The admin of the project is domain_admin1.This should work.', '12/10/2017', '1/11/2017', 'Mumbai', 1200, 'Client1'),
(2, 'PROJ2', 'The project is P2. The admin of the project is domain_admin2.', '01/01/2017', '03/03/2017', 'Mumbai', 10000, 'Client2'),
(3, 'PROJ3', 'The project is P3. The admin of the project is domain_admin1.', '11/04/2017', '30/05/2017', 'Mumbai', 20000, 'Client3'),
(4, 'PROJ4', 'The project is P4. The admin of the project is domain_admin1.', '21/03/2017', '15/05/2017', 'Mumbai', 30000, 'Client4'),
(5, 'PROJ5', 'The project is P5. The admin of the project is domain_admin1.', '18/07/2017', 'Present', 'Mumbai', 40000, 'Client5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `empro`
--
ALTER TABLE `empro`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `issuecat`
--
ALTER TABLE `issuecat`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `empro`
--
ALTER TABLE `empro`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `issuecat`
--
ALTER TABLE `issuecat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `project` (`p_id`);

--
-- Constraints for table `empro`
--
ALTER TABLE `empro`
  ADD CONSTRAINT `empro_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `empro_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `project` (`p_id`);

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`p_id`);

--
-- Constraints for table `issuecat`
--
ALTER TABLE `issuecat`
  ADD CONSTRAINT `issuecat_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `project` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
