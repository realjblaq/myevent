-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2018 at 10:07 PM
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
-- Table structure for table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `evaluation_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `eid`, `name`, `email`, `rating`, `comment`, `evaluation_time`) VALUES
(1, 48, 'justice', 'info@justice.com', 'poor', '', '2018-12-17 19:06:22'),
(2, 48, 'Makafui', 'info@makafui.com', 'excellent', 'I like it ', '2018-12-17 19:20:16'),
(3, 58, 'Justice', 'info@justice.com', 'excellent', 'I was a really interesting experience, I would like to attend this again next year.', '2018-12-17 19:50:45'),
(4, 58, 'Joyce Blessing', 'info@joy.com', 'fair', 'I was ok but not what I expected.', '2018-12-17 19:51:16');

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
  `about` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `edate` datetime NOT NULL,
  `ticket_qty` int(11) DEFAULT NULL,
  `ticket_price` decimal(10,2) DEFAULT '0.00',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `evaluate` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`eid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eid`, `uid`, `ename`, `etype`, `about`, `image`, `video`, `location`, `edate`, `ticket_qty`, `ticket_price`, `date_created`, `evaluate`) VALUES
(34, 72, 'Night Party', 'free', 'Come lets party all night!', 'fdaf9232da837d070ca72aa2e9dba1cb.jpg', '63cf0442b43a4a968c1074892b8fffde.mp4', 'Staples Center', '2018-12-05 12:00:00', 0, '0.00', '2018-11-24 11:33:15', '0'),
(35, 73, 'Sov food challenge', 'free', 'Who can eat more? Come, be there and see for yourself.', '2c468e7c21d09c7c36888190c69b8bf2.jpg', 'd818b3b2167455019d4417457db8be3d.mp4', 'SOV Hostel', '2018-11-06 06:30:00', 0, '0.00', '2018-11-06 23:37:11', '0'),
(36, 73, 'Wedding Invitation', 'paid', 'Migel and Rose Joins.', 'f57748772d9af8dae97696b8d91c87d1.jpg', '62f7c5aeecb767c753753494d587ff4a.mp4', 'Top Hill Church', '2018-12-29 08:00:00', 7, '30.00', '2018-12-17 21:52:30', '0'),
(37, 73, 'funeral announcement ', 'free', 'Burial service of Franklina Maame Yaa Tebua Nkansah', '9610eefaca8ef4fd463daf0fee15f745.jpg', 'f0ed092a42892a5f04c1f01067d23ab1.mp4', 'Prince of Peace Catholic Church', '2019-03-03 08:00:00', 0, '0.00', '2018-11-06 23:44:19', '0'),
(38, 68, 'proposal defense', 'paid', 'Level 400 students defend their final year projects.', 'e7940cbb75061f766101fbae87a80e4e.jpg', 'ba595718b5aa3376364fcfe9cc1323ab.mp4', 'Lab 1,  CS dept., VVU', '2018-11-23 08:30:00', 30, '10.00', '2018-12-15 20:22:53', '0'),
(39, 68, 'opening Ceremony', 'free', 'the grand opening of Shiloh Baptist Church', 'b488d8043c152a3a418c59098fde75c5.png', '9cc7b8818c2133c5693128485c93fda3.mp4', 'Shiloh Baptist Church', '2019-01-06 09:30:00', 0, '0.00', '2018-11-06 23:56:03', '0'),
(42, 72, 'Be Counted', 'free', 'One Note in collaboration with Sentinels presents, Be Counted.\r\nPerforming live. Vocal Path.', '39231a2bcea238d906e7c6186b36f395.jpeg', 'f86ab8bc9fe8247fabb7f90d7f215ee7.', 'Berean Worship Centre, VVU', '2018-11-30 19:00:00', 0, '0.00', '2018-11-23 17:56:19', '0'),
(48, 72, 'Tig This is Gospel', 'free', 'Radio Premiere of Vocal Path Ft. Julia Love at Home. ', 'ccb2eb1ac36fbe7056a4ec2427a67ef3.jpeg', '604ccc2a80ef78a402fbcf54c9578bfe.mp4', 'Hitz 109.3 FM', '2018-12-16 09:00:00', 0, '0.00', '2018-12-17 21:52:30', '0'),
(53, 72, 'Salvation Sunday', 'free', 'Seek the Lord while you can find (Isaiah 55:6)', 'e028be71e6c13e765c6017c0d21ddf19.jpeg', '7aef8f9548c8644185bed9f45fe7b29c.', 'First Love Centre, Behind Allied Oil, Trinity College, UPSA Road, Legon', '2018-12-23 10:30:00', 0, '0.00', '2018-12-14 15:24:53', '0'),
(54, 72, 'Holy Night', 'free', 'Power edition with PD BOTCHEY, ALEXANDRAH, E-ROCK, and KWABENA. Also ministring: DAVE DA MUSICBOX, CONSICREATED INC., GRACIOUS LADIES.', '214b2edca0d40f6fda291b9bea3d7d17.jpeg', '50a758f7d2032a7b395b1848255bbb6b.', 'ICGC Yaweh Temple', '2018-12-27 14:00:00', 0, '0.00', '2018-12-14 15:51:37', '0'),
(55, 72, 'Naughty School Boy Issue #1', 'paid', 'ROMANUS INCOMPLETE. Come and laugh like never before.', 'c0e7f2df2c022c73ca78ea8008f15c70.jpeg', '00b57beea24956e8daa55f34f1b0f5bf.', 'National Theatre', '2018-12-23 19:00:00', 100, '100.00', '2018-12-14 21:16:29', '0'),
(56, 74, 'Scott cunninghum', 'free', 'From the Baseline 40 years Beneath the Rim. Hawks.com/scott', '7ddfc9c1b6d9bbabee689b6f426bb0d6.jpg', '9bfb224023e24d9976ca1a89635c22cf.', 'Westside Cultural Side Center', '2019-08-03 07:00:00', 0, '0.00', '2018-12-17 09:30:47', '0'),
(57, 74, 'Shadrach & Theodocia', 'free', 'A fresh new day, and its ours. A day of happy beginnings when we, Shadrach & Theodocia pledge our love as one. Together with our parents, we invite you to celebrate the joy of our marriage ceremony. RSVP [Dante: 0245352340] [Angela: 0244156796] [Nelson: 0244268341] [Francis: 0241697133]', '91aba368e1fd1995167262e7fd8e138c.jpeg', 'f231e298f19270e6499205478847db02.', 'Adenta, Followed by reception at Timora Gardens.', '2019-01-19 07:30:00', 0, '0.00', '2018-12-17 10:49:54', '0'),
(58, 73, 'Red Cupz 3.0', 'paid', 'The official end of year party RED CUPZ 3.0. Doors open at 9AM and free for ladies before 1AM. [King Yaw: 0506415226] [Kross: 0552565356] [Rhymes: 0209345519] [Crack: 0278520986]. For VIP Reservations CALL KING YAW.', '8c737d462f36b5df69ca6b18bf30b557.jpeg', 'a47d4d028e02a277404f13a0371c8977.', 'Vanity Night Club', '2018-12-28 21:00:00', 6, '25.00', '2018-12-17 21:52:30', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `eid`, `file_name`) VALUES
(17, 34, 'birds-in-love.jpg'),
(18, 34, '2018-2019-sam.pdf'),
(19, 42, 'New-Wesite-webgrids.com-.png'),
(20, 53, '2018-2019-sam.pdf'),
(21, 48, '2018-2019-sam.pdf'),
(22, 58, '2018-2019-sam (1).pdf');

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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_outline`
--

INSERT INTO `program_outline` (`pid`, `eid`, `role`, `name`, `program_time`) VALUES
(31, 48, 'Mc', 'Justice', '00:00:00'),
(30, 53, 'MC', 'Francis Tetteh', '07:30:00'),
(29, 34, 'MC', 'Mercy', '00:00:00'),
(28, 34, 'MC', 'Mercy', '00:00:00'),
(27, 42, 'Sermon', 'Bride\'s family', '00:00:00'),
(26, 42, 'Sermon', 'Bride\'s family', '00:00:00'),
(25, 42, 'Sermon', 'Bride\'s family', '00:00:00'),
(24, 42, 'Sermon', 'Bride\'s family', '00:00:00'),
(23, 42, 'Sermon', 'Ezekiel', '12:00:00'),
(22, 42, 'Photography', 'All', '00:00:00'),
(21, 42, 'Photography', 'All', '00:00:00'),
(13, 42, 'MC', 'Justice Markwei', '00:00:00'),
(32, 48, 'Ministration', 'Julia', '00:00:00'),
(33, 36, 'Photoshoot', 'Bride\'s family', '09:00:00'),
(34, 58, 'mc', 'john', '00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

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
(30, 34, 'ek', 'info@ek.com', 'kdj'),
(31, 55, 'j', 'j@m.com', 'a'),
(32, 57, 'Justice Korley Markwei', 'info@justice.com', 'Im goin to dance till im tired.'),
(33, 56, 'Essien Edwoard', 'info@Essian.com', 'After this I expect to say fit. And I also expect it to happen again.'),
(34, 56, 'Gloria Timbau', 'info@gloria.com', 'I want to see what will happen this time.'),
(35, 58, 'Julia Asante ', 'info@jules.com', 'I wanna have fun'),
(36, 58, 'Justice Markwei', 'info@justice.com', 'Lets see how it will go.'),
(37, 58, 'Justice Markwei', 'info@justice.com', 'Lets see how it will go.');

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
  `phone` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `profile_pic` longtext,
  `linkedin` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `email`, `username`, `password`, `gender`, `registration_date`, `phone`, `profession`, `profile_pic`, `linkedin`, `facebook`, `twitter`, `instagram`) VALUES
(68, 'Mercy', 'Markwei', 'mercymarkwei@gmail.com', 'tsotsoo', 'e3afed0047b08059d0fada10f400c1e5', 'f', '2018-12-17 08:58:36', '', '', 'pp.jpg', '', '', '', ''),
(72, 'Justice', 'Markwei', 'info@jblaq.com', ' jblaq', 'e3afed0047b08059d0fada10f400c1e5', 'm', '2018-12-17 09:21:50', '0272343540', 'Developer', '5afa078bfaf73f4ff0fa0a961b996324_resize (1).jpg', 'JusticeMark', 'Justicemarkwei', 'realjblaq', 'realjblaq'),
(73, 'Josephine', 'Nwakanma', 'info@josephine.com', 'josephine', 'bf1c2f751f3286030a13fd2fef560069', 'f', '2018-12-17 15:28:03', '0548976541', 'Developer; Clert', 'pp.jpg', 'JosephineNwak', 'Josephine Nwakanma', 'josephh', 'jooo_inst'),
(74, 'Jonathan', 'Gbaja', 'info@gbaja.com', 'jonathan', 'e3afed0047b08059d0fada10f400c1e5', 'm', '2018-12-17 09:20:20', '05642154569', 'Engineer', 'avatar.png', 'Jonathan Ghanaja', 'JonaKelil', 'kelil', 'jonathan_ball'),
(75, 'Test', 'Test', 'info@test.com', 'test', '098f6bcd4621d373cade4e832627b4f6', 'm', '2018-12-17 09:43:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `events` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

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
