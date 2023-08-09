-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 07:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cid` int(11) NOT NULL,
  `cname` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cid`, `cname`, `price`, `duration`, `description`) VALUES
(1, 'PHP', 5000, '6 months', 'PHP is a general-purpose scripting language geared towards web development.'),
(2, 'Javascript', 4500, '4 months', 'JavaScript, often abbreviated as JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS.'),
(3, 'Java', 15000, '6 months', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.'),
(4, 'Python beginner level', 800, '25 days', 'Python is a high-level, general-purpose programming language for basic level'),
(5, 'Python', 3500, '6 months', 'Python is a high-level, general-purpose programming language');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `eid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`eid`, `uid`, `cid`, `status`) VALUES
(1, 10, 3, 2),
(2, 6, 1, 1),
(3, 12, 2, 0),
(4, 11, 3, 0),
(5, 11, 5, 0),
(6, 13, 2, 1),
(7, 14, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `pro_pic` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `age`, `email`, `nic`, `username`, `password`, `admin`, `pro_pic`) VALUES
(6, 'kirushnathi', 27, 'kiru26@gmail.com', '908521753v', 'Kiru', 'kiru123', 0, '../img/profilePic/pic1_1691398392.jpg'),
(7, 'admin1', 27, 'admin@gmail.com', '728521753v', 'admin1', 'admin', 1, '../img/profilePic/pic2_1691398495.jpg'),
(10, 'lishanthi', 30, 'lisha@gmail.com', '698521753v', 'lisha', 'lisha', 0, '../img/profilePic/lisha_1691484828.jpg'),
(11, 'Ravi', 55, 'ravi@gmail.com', '733521753v', 'ravi', 'ravi123', 0, '../img/profilePic/ravi_1691513978.jpg'),
(12, 'jadu', 23, 'jadu@gmail.com', '744521753v', 'jadu', 'jadu123', 0, '../img/profilePic/jadu_1691514019.jpg'),
(13, 'kirushnathi', 27, 'kirushanthikiru26@gmail.com', '783521753v', 'Kirusha', 'kiru', 0, '../img/profilePic/pic1_1691525116.jpg'),
(14, 'priya', 27, 'kirushanthikiru26@gmail.com', '746521753v', 'priya', 'priya', 0, '../img/profilePic/lisha_1691557746.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `nic` (`nic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courses` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
