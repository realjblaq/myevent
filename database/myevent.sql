-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2018 at 09:57 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

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
  `etype` enum('free','paid') NOT NULL,
  `about` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `edate` datetime NOT NULL,
  `ticket_qty` int(11) DEFAULT NULL,
  `ticket_price` decimal(10,2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`eid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eid`, `uid`, `ename`, `etype`, `about`, `image`, `video`, `location`, `edate`, `ticket_qty`, `ticket_price`, `date_created`) VALUES
(34, 72, 'Night Party', 'free', 'Come lets party all night!', 'fdaf9232da837d070ca72aa2e9dba1cb.jpg', '63cf0442b43a4a968c1074892b8fffde.mp4', 'Staples Center', '2018-12-05 12:00:00', 0, '0.00', '2018-11-24 11:33:15'),
(35, 73, 'Sov food challenge', 'free', 'Who can eat more? Come, be there and see for yourself.', '2c468e7c21d09c7c36888190c69b8bf2.jpg', 'd818b3b2167455019d4417457db8be3d.mp4', 'SOV Hostel', '2018-11-06 06:30:00', 0, '0.00', '2018-11-06 23:37:11'),
(36, 73, 'Wedding Invitation', 'free', 'Migel and Rose Joins.', 'f57748772d9af8dae97696b8d91c87d1.jpg', '62f7c5aeecb767c753753494d587ff4a.mp4', 'Top Hill Church', '2018-11-08 09:00:00', 0, '0.00', '2018-11-06 23:41:21'),
(37, 73, 'funeral announcement ', 'free', 'Burial service of Franklina Maame Yaa Tebua Nkansah', '9610eefaca8ef4fd463daf0fee15f745.jpg', 'f0ed092a42892a5f04c1f01067d23ab1.mp4', 'Prince of Peace Catholic Church', '2019-03-03 08:00:00', 0, '0.00', '2018-11-06 23:44:19'),
(38, 68, 'proposal defense', 'paid', 'Level 400 students defend their final year projects.', 'e7940cbb75061f766101fbae87a80e4e.jpg', 'ba595718b5aa3376364fcfe9cc1323ab.mp4', 'Lab 1,  CS dept., VVU', '2018-11-23 08:30:00', 30, '5.00', '2018-11-06 23:48:57'),
(39, 68, 'opening Ceremony', 'free', 'the grand opening of Shiloh Baptist Church', 'b488d8043c152a3a418c59098fde75c5.png', '9cc7b8818c2133c5693128485c93fda3.mp4', 'Shiloh Baptist Church', '2019-01-06 09:30:00', 0, '0.00', '2018-11-06 23:56:03'),
(42, 72, 'Be Counted', 'free', 'One Note in collaboration with Sentinels presents, Be Counted.\r\nPerforming live. Vocal Path.', '39231a2bcea238d906e7c6186b36f395.jpeg', 'f86ab8bc9fe8247fabb7f90d7f215ee7.', 'Berean Worship Centre, VVU', '2018-11-30 19:00:00', 0, '0.00', '2018-11-23 17:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `eid`, `file_name`) VALUES
(17, 34, 'birds-in-love.jpg'),
(18, 34, '2018-2019-sam.pdf'),
(19, 42, 'New-Wesite-webgrids.com-.png');

-- --------------------------------------------------------

--
-- Table structure for table `program_outline`
--

DROP TABLE IF EXISTS `program_outline`;
CREATE TABLE IF NOT EXISTS `program_outline` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `role` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `program_time` time NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_outline`
--

INSERT INTO `program_outline` (`pid`, `eid`, `role`, `name`, `program_time`) VALUES
(29, 34, 'MC', 'Mercy', '00:00:00'),
(28, 34, 'MC', 'Mercy', '00:00:00'),
(27, 42, 'Sermon', 'Bride\'s family', '00:00:00'),
(26, 42, 'Sermon', 'Bride\'s family', '00:00:00'),
(25, 42, 'Sermon', 'Bride\'s family', '00:00:00'),
(24, 42, 'Sermon', 'Bride\'s family', '00:00:00'),
(23, 42, 'Sermon', 'Ezekiel', '12:00:00'),
(22, 42, 'Photography', 'All', '00:00:00'),
(21, 42, 'Photography', 'All', '00:00:00'),
(13, 42, 'MC', 'Justice Markwei', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `register_event`
--

DROP TABLE IF EXISTS `register_event`;
CREATE TABLE IF NOT EXISTS `register_event` (
  `regid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `expectation` text NOT NULL,
  PRIMARY KEY (`regid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_event`
--

INSERT INTO `register_event` (`regid`, `eid`, `fullname`, `email`, `expectation`) VALUES
(1, 34, 'Justice', '', 'I am expecting it to be wild.'),
(14, 42, 'Justice', '', 'I expect it to be lit'),
(15, 42, 'Justice', '', 'I expect it to be lit'),
(16, 38, 'Mercy', '', 'lit\r\n'),
(17, 38, 'Mercy', '', 'lit\r\n'),
(18, 38, 'Mark', 'info@mark.com', 'lit'),
(19, 38, 'Mark', 'info@mark.com', 'lit'),
(20, 38, 'Mark', 'info@mark.com', 'lit'),
(21, 34, 'jay', 'info@jay.com', 'lkjfs'),
(22, 34, 'jay', 'info@jay.com', 'lkjfs'),
(23, 34, 'jay', 'info@jay.com', 'lkjfs'),
(24, 34, 'lizzy', 'info@lizzy.com', 'lkdjfkidfj'),
(25, 34, 'lizzy', 'info@lizzy.com', 'lkdjfkidfj'),
(26, 34, 'essien', 'info@essiean.com', 'alkdjfkdj'),
(27, 34, 'essien', 'info@essiean.com', 'alkdjfkdj'),
(28, 34, 'essien', 'info@essiean.com', 'alkdjfkdj'),
(29, 34, 'ek', 'info@ek.com', 'kdj'),
(30, 34, 'ek', 'info@ek.com', 'kdj');

-- --------------------------------------------------------

--
-- Table structure for table `test_file`
--

DROP TABLE IF EXISTS `test_file`;
CREATE TABLE IF NOT EXISTS `test_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_file`
--

INSERT INTO `test_file` (`id`, `file_name`) VALUES
(1, 'Assignment 2.pdf'),
(2, 'FSMA Convert lengths student.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `bought_by` int(11) NOT NULL,
  `ticket_number` varchar(255) NOT NULL,
  `date_bought` datetime NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `email`, `username`, `password`, `gender`, `registration_date`) VALUES
(68, 'Mercy', 'Markwei', 'mercymarkwei@gmail.com', 'tsotsoo', 'e3afed0047b08059d0fada10f400c1e5', 'f', '2018-11-03 08:10:33'),
(69, 'Justice', 'Mark', 'justice@mark.com', 'jblaq', 'e3afed0047b08059d0fada10f400c1e5', 'm', '2018-11-03 08:33:28'),
(72, 'jay', 'mark', 'info@jblaq.com', 'jblaq', 'e3afed0047b08059d0fada10f400c1e5', 'f', '2018-11-04 13:13:49'),
(73, 'Josephine', 'Gebe', 'info@josephine.com', 'josephine', 'bf1c2f751f3286030a13fd2fef560069', 'f', '2018-11-06 23:33:08');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `events` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `register_event`
--
ALTER TABLE `register_event`
  ADD CONSTRAINT `event_registration` FOREIGN KEY (`eid`) REFERENCES `events` (`eid`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `events` (`eid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
