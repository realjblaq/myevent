-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2018 at 01:26 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myevent`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`eid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eid`, `uid`, `ename`, `about`, `image`, `video`, `location`, `date`, `date_created`) VALUES
(1, 69, 'sov games night', 'meet as friends and have fun.', '2', '2', 'SOV Hostel', '2018-11-01 20:00:00', '2018-11-04 01:19:36'),
(2, 62, 'food challenge', 'a game to declare who can eat more.', '5', '5', 'Refugees Hostel', '2018-11-01 13:00:00', '2018-11-04 01:19:20'),
(3, 61, 'advice', 'Take advice from Furguson', '6', '6', 'stanbic bank', '2018-11-28 07:00:00', '2018-11-03 22:50:08'),
(4, 67, 'football galla', 'football match', '4', '4', 'VVU School Park', '2018-11-06 06:00:00', '2018-11-04 01:03:43'),
(5, 68, 'back to school', 'buy all you need.', '8', '8', 'UGL', '2018-11-04 00:00:00', '2018-11-04 00:52:48'),
(6, 59, 'hackathon', 'who codes the fastest?', '9', '9', 'refugees', '2018-11-04 00:00:00', '2018-11-04 00:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `email`, `username`, `password`, `gender`, `registration_date`) VALUES
(57, 'Justice', 'Markwei', 'info@jblaq.com', '', 'e3afed0047b08059d0fada10f400c1e5', 'm', '2018-10-31 00:53:50'),
(58, 'rek', 'ed', 'we@sd.sd', '', 'e10adc3949ba59abbe56e057f20f883e', 'm', '2018-10-31 18:41:18'),
(59, 'rek', 'ed', 'reked@live.com', '', 'e10adc3949ba59abbe56e057f20f883e', 'm', '2018-10-31 18:42:58'),
(60, 'Jona', 'Gb', 'jb@gmail.com', '', '0cc175b9c0f1b6a831c399e269772661', 'm', '2018-11-01 00:13:23'),
(61, 'joce', 'phine', 'jose@gmail.com', '', '099b3b060154898840f0ebdfb46ec78f', 'f', '2018-11-02 09:32:52'),
(62, 'Josephene', 'Mwakanma', 'info@josephine.com', '', '099b3b060154898840f0ebdfb46ec78f', 'f', '2018-11-02 13:50:56'),
(63, 'Admin', 'Admin', 'info@admin.com', '', 'e3afed0047b08059d0fada10f400c1e5', 'm', '2018-11-02 16:29:04'),
(64, 'Admin2', 'Admin2', 'info@admin2.com', '', 'e3afed0047b08059d0fada10f400c1e5', 'm', '2018-11-02 17:10:15'),
(65, 'Admin3', 'Admin3', 'info@admin3.com', '', 'e80781f4fbd081acd71d9d34e0eec378', 'm', '2018-11-02 17:10:50'),
(66, 'yes', 'yes', 'yes@yes', '', 'a6105c0a611b41b08f1209506350279e', 'f', '2018-11-02 17:11:29'),
(67, 'Jonatus', 'Gbajastic', 'jonathangbaja@gmail.com', '', '2bbd1ea68fb4d1d6f0897cd9180df52f', 'm', '2018-11-02 18:36:14'),
(68, 'Mercy', 'Markwei', 'mercymarkwei@gmail.com', 'tsotsoo', 'e3afed0047b08059d0fada10f400c1e5', 'f', '2018-11-03 08:10:33'),
(69, 'Justice', 'Mark', 'justice@mark.com', 'jblaq', 'e3afed0047b08059d0fada10f400c1e5', 'm', '2018-11-03 08:33:28'),
(70, 'rek', 'ed', 'reked@live.com', 'rek', 'e10adc3949ba59abbe56e057f20f883e', 'f', '2018-11-03 11:17:25');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
