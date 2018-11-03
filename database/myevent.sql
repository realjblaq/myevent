-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2018 at 12:14 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `email`, `username`, `password`, `gender`, `registration_date`) VALUES
(67, 'Jonatus', 'Gbajastic', 'jonathangbaja@gmail.com', '', '2bbd1ea68fb4d1d6f0897cd9180df52f', 'm', '2018-11-02 18:36:14'),
(66, 'yes', 'yes', 'yes@yes', '', 'a6105c0a611b41b08f1209506350279e', 'f', '2018-11-02 17:11:29'),
(65, 'Admin3', 'Admin3', 'info@admin3.com', '', 'e80781f4fbd081acd71d9d34e0eec378', 'm', '2018-11-02 17:10:50'),
(64, 'Admin2', 'Admin2', 'info@admin2.com', '', 'e3afed0047b08059d0fada10f400c1e5', 'm', '2018-11-02 17:10:15'),
(63, 'Admin', 'Admin', 'info@admin.com', '', 'e3afed0047b08059d0fada10f400c1e5', 'm', '2018-11-02 16:29:04'),
(62, 'Josephene', 'Mwakanma', 'info@josephine.com', '', '099b3b060154898840f0ebdfb46ec78f', 'f', '2018-11-02 13:50:56'),
(61, 'joce', 'phine', 'jose@gmail.com', '', '099b3b060154898840f0ebdfb46ec78f', 'f', '2018-11-02 09:32:52'),
(60, 'Jona', 'Gb', 'jb@gmail.com', '', '0cc175b9c0f1b6a831c399e269772661', 'm', '2018-11-01 00:13:23'),
(59, 'rek', 'ed', 'reked@live.com', '', 'e10adc3949ba59abbe56e057f20f883e', 'm', '2018-10-31 18:42:58'),
(58, 'rek', 'ed', 'we@sd.sd', '', 'e10adc3949ba59abbe56e057f20f883e', 'm', '2018-10-31 18:41:18'),
(57, 'Justice', 'Markwei', 'info@jblaq.com', '', 'e3afed0047b08059d0fada10f400c1e5', 'm', '2018-10-31 00:53:50'),
(68, 'Mercy', 'Markwei', 'mercymarkwei@gmail.com', 'tsotsoo', 'e3afed0047b08059d0fada10f400c1e5', 'f', '2018-11-03 08:10:33'),
(69, 'Justice', 'Mark', 'justice@mark.com', 'jblaq', 'e3afed0047b08059d0fada10f400c1e5', 'm', '2018-11-03 08:33:28'),
(70, 'rek', 'ed', 'reked@live.com', 'rek', 'e10adc3949ba59abbe56e057f20f883e', 'f', '2018-11-03 11:17:25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
