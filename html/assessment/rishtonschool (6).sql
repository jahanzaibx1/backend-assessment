-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2024 at 01:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rishtonschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parentid` int(11) NOT NULL,
  `parentname` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `emailadd` varchar(100) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `parentname2optional` varchar(100) NOT NULL,
  `parent2address` varchar(255) NOT NULL,
  `parent2emailadd` varchar(100) DEFAULT NULL,
  `parent2phonenumber` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parentid`, `parentname`, `address`, `emailadd`, `phonenumber`, `parentname2optional`, `parent2address`, `parent2emailadd`, `parent2phonenumber`) VALUES
(1, 'parent test 1', 'abcd', 'abc@gmail.com', '123456789', 'parent 2 test 1', 'abc', 'abc@hotmail.com', '123456789'),
(2, 'parent test 2', 'abcdefg address', 'xyz@yahoo.com', '83726128909', 'parent 2 test 2', 'zfxgj address', 'wxyz@gmail.com', '819279019009'),
(3, 'parent test 3', 'ygeguq address', 'qwert@yahho.com', '819129019', 'parent2 test 3', 'gsagjqali address', 'tfws2ui@hotmail.com', '8913863019'),
(4, 'parent test 4', 'gusjk address', 'dghjbsa@gmail.com', '72189010910', 'parent 2 test 4', 'hjvqbjh address', 'vhbjkq@yahoo.com', '89120382189'),
(5, 'parent test 5', 'gdksqajbdj address', 'xyz@yahoo.com', '8921899001096', 'parent 2 test 5', 'saghajj address', 'abcdef@gamil.com', '178218098');

-- --------------------------------------------------------

--
-- Table structure for table `pupilparents`
--

CREATE TABLE `pupilparents` (
  `pupilid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pupilparents`
--

INSERT INTO `pupilparents` (`pupilid`, `parentid`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pupils`
--

CREATE TABLE `pupils` (
  `pupilid` int(11) NOT NULL,
  `pupilname` varchar(80) NOT NULL,
  `pupiladdress` varchar(255) NOT NULL,
  `pupilgender` varchar(60) NOT NULL,
  `pupilphonenumber` varchar(15) DEFAULT NULL,
  `medicalinfo` text DEFAULT NULL,
  `classid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pupils`
--

INSERT INTO `pupils` (`pupilid`, `pupilname`, `pupiladdress`, `pupilgender`, `pupilphonenumber`, `medicalinfo`, `classid`) VALUES
(1, 'student test ', 'abc', 'Male', '987654321', 'Na', 3),
(2, 'student test 2', 'abcd address', 'Female', '892628711', 'not have', 6),
(3, 'student test 3', 'qwert address', 'Female', '892190079', 'no', 7),
(4, 'student test 4', 'ugksjalk address', 'Male', '8921370989', 'Yes', 4),
(5, 'student test 5', 'xyz address', 'Female', '6938912890', 'NA', 2);

-- --------------------------------------------------------

--
-- Table structure for table `schoolclasses`
--

CREATE TABLE `schoolclasses` (
  `classid` int(11) NOT NULL,
  `classname` varchar(60) NOT NULL,
  `classcapacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolclasses`
--

INSERT INTO `schoolclasses` (`classid`, `classname`, `classcapacity`) VALUES
(1, 'Reception Year', 25),
(2, 'Year One', 25),
(3, 'Year Two', 25),
(4, 'Year Three', 25),
(5, 'Year Four', 25),
(6, 'Year Five', 25),
(7, 'Year Six', 25);

-- --------------------------------------------------------

--
-- Table structure for table `schoolteachers`
--

CREATE TABLE `schoolteachers` (
  `teacherid` int(11) NOT NULL,
  `teachername` varchar(80) NOT NULL,
  `teacheraddress` varchar(255) NOT NULL,
  `teacherphonenumber` varchar(15) DEFAULT NULL,
  `annualsalary` decimal(10,2) DEFAULT NULL,
  `background` tinyint(1) DEFAULT NULL,
  `classid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolteachers`
--

INSERT INTO `schoolteachers` (`teacherid`, `teachername`, `teacheraddress`, `teacherphonenumber`, `annualsalary`, `background`, `classid`) VALUES
(1, 'teacher test 1', 'abcde address', '278218739831', 900000.00, 1, 1),
(2, 'teacher test 2', 't2 address ', '783246982109', 80000.00, 1, 2),
(3, 'teacher test 3', 't3 address', '78928623', 600000.00, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parentid`);

--
-- Indexes for table `pupilparents`
--
ALTER TABLE `pupilparents`
  ADD PRIMARY KEY (`pupilid`,`parentid`),
  ADD KEY `parentid` (`parentid`);

--
-- Indexes for table `pupils`
--
ALTER TABLE `pupils`
  ADD PRIMARY KEY (`pupilid`),
  ADD KEY `classid` (`classid`);

--
-- Indexes for table `schoolclasses`
--
ALTER TABLE `schoolclasses`
  ADD PRIMARY KEY (`classid`);

--
-- Indexes for table `schoolteachers`
--
ALTER TABLE `schoolteachers`
  ADD PRIMARY KEY (`teacherid`),
  ADD UNIQUE KEY `classid` (`classid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pupils`
--
ALTER TABLE `pupils`
  MODIFY `pupilid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schoolclasses`
--
ALTER TABLE `schoolclasses`
  MODIFY `classid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `schoolteachers`
--
ALTER TABLE `schoolteachers`
  MODIFY `teacherid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pupilparents`
--
ALTER TABLE `pupilparents`
  ADD CONSTRAINT `pupilparents_ibfk_1` FOREIGN KEY (`pupilid`) REFERENCES `pupils` (`pupilid`),
  ADD CONSTRAINT `pupilparents_ibfk_2` FOREIGN KEY (`parentid`) REFERENCES `parents` (`parentid`);

--
-- Constraints for table `pupils`
--
ALTER TABLE `pupils`
  ADD CONSTRAINT `pupils_ibfk_1` FOREIGN KEY (`classid`) REFERENCES `schoolclasses` (`classid`);

--
-- Constraints for table `schoolteachers`
--
ALTER TABLE `schoolteachers`
  ADD CONSTRAINT `schoolteachers_ibfk_1` FOREIGN KEY (`classid`) REFERENCES `schoolclasses` (`classid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
