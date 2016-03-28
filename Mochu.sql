-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2016 at 03:33 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Mochu`
--

-- --------------------------------------------------------

--
-- Table structure for table `AudioGuide`
--

CREATE TABLE IF NOT EXISTS `AudioGuide` (
  `au_ID` int(11) NOT NULL AUTO_INCREMENT,
  `au_name` varchar(30) DEFAULT NULL,
  `au_file` varchar(256) DEFAULT NULL,
  `fl_IMG` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`au_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `AudioGuide`
--

INSERT INTO `AudioGuide` (`au_ID`, `au_name`, `au_file`, `fl_IMG`) VALUES
(1, 'Room1-01.jpg', 'http://139.59.245.168/Mochu/audio/sampleAudio1.m4a', 'http://139.59.245.168/Mochu/img/Room1-01.jpg'),
(2, '123', '213', '4536');

-- --------------------------------------------------------

--
-- Table structure for table `Choices`
--

CREATE TABLE IF NOT EXISTS `Choices` (
  `ch_ID` int(5) NOT NULL,
  `ch_content` varchar(80) DEFAULT NULL,
  `q_ID` int(4) NOT NULL,
  `is_key` tinyint(1) NOT NULL,
  PRIMARY KEY (`ch_ID`,`q_ID`),
  KEY `q_ID` (`q_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Choices`
--

INSERT INTO `Choices` (`ch_ID`, `ch_content`, `q_ID`, `is_key`) VALUES
(1, 'choice1 q2', 2, 0),
(1, 'choice1 q3', 3, 1),
(1, 'choice1 q4', 4, 0),
(1, 'I agree', 5, 1),
(1, 'choice1 q6', 6, 0),
(1, 'choice1 q7', 7, 1),
(1, 'Eve is beautiful', 8, 0),
(1, 'Buffet', 9, 1),
(1, 'ei', 10, 1),
(2, 'choice2 q2', 2, 1),
(2, 'choice2 q3', 3, 0),
(2, 'choice2 q4', 4, 0),
(2, 'I disagree', 5, 0),
(2, 'choice2 q6', 6, 1),
(2, 'choice2 q7', 7, 0),
(2, 'Ping is very cute and smart', 8, 1),
(2, 'Buffet', 9, 0),
(2, 'eiei', 10, 0),
(3, 'choice3 q2', 2, 0),
(3, 'choice3 q3', 3, 0),
(3, 'choice3 q4', 4, 1),
(3, 'I disagree', 5, 0),
(3, 'choice3 q6', 6, 0),
(3, 'choice3 q7', 7, 0),
(3, 'Bam is tall', 8, 0),
(3, 'buffettt', 9, 0),
(3, 'eieiei', 10, 0),
(4, 'choice4 q2', 2, 0),
(4, 'choice4 q3', 3, 0),
(4, 'choice4 q4', 4, 0),
(4, 'I disagree', 5, 0),
(4, 'choice4 q6', 6, 0),
(4, 'choice4 q7', 7, 0),
(4, 'Film is pretty', 8, 0),
(4, 'buffetttt', 9, 0),
(4, 'eieieiei', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Contents`
--

CREATE TABLE IF NOT EXISTS `Contents` (
  `content_ID` int(11) NOT NULL AUTO_INCREMENT,
  `content_title` varchar(30) DEFAULT NULL,
  `content_description` varchar(256) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`content_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE IF NOT EXISTS `Events` (
  `event_ID` int(8) NOT NULL AUTO_INCREMENT,
  `start_time` time DEFAULT NULL,
  `Edate` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `organizer` varchar(50) DEFAULT NULL,
  `picture` varchar(256) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `loc_ID` int(2) NOT NULL,
  PRIMARY KEY (`event_ID`),
  KEY `loc_ID` (`loc_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`event_ID`, `start_time`, `Edate`, `end_time`, `contact`, `name`, `description`, `organizer`, `picture`, `type`, `loc_ID`) VALUES
(1, '16:00:00', '2016-03-31', '19:00:00', '0811111111', 'Kim Show', 'kimmmmmmmmmmmmmmm', 'pingza', NULL, 'Thai', 1),
(2, '13:00:00', '2016-04-01', '16:00:00', '0856773883', 'Classical', 'ldkgflkld', 'eveeiei', NULL, 'International', 2),
(3, '17:00:00', '2016-04-01', '19:00:00', '0899918881', 'Pianooo', 'kaskldksldksldkls', 'maniemena', '/var/www/html/Mochu/img/piano.jpg', 'International', 2),
(4, '10:00:00', '2016-04-04', '12:00:00', '026326667', 'Boxinggg', 'ingingingignigng', 'eieieiei', '/var/www/html/Mochu/img/Boxing.jpg', 'Thai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Feedbacks`
--

CREATE TABLE IF NOT EXISTS `Feedbacks` (
  `fdb_ID` int(8) NOT NULL AUTO_INCREMENT,
  `msg` varchar(256) DEFAULT NULL,
  `Fdate` date DEFAULT NULL,
  `rating` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`fdb_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Filters`
--

CREATE TABLE IF NOT EXISTS `Filters` (
  `flt_ID` int(2) NOT NULL AUTO_INCREMENT,
  `flt_IMG` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`flt_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Interested_In`
--

CREATE TABLE IF NOT EXISTS `Interested_In` (
  `user_ID` int(11) NOT NULL,
  `interest_ID` int(11) NOT NULL,
  PRIMARY KEY (`user_ID`,`interest_ID`),
  KEY `interest_ID` (`interest_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Interests`
--

CREATE TABLE IF NOT EXISTS `Interests` (
  `interest_ID` int(1) NOT NULL AUTO_INCREMENT,
  `interest_title` varchar(30) NOT NULL,
  PRIMARY KEY (`interest_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Locations`
--

CREATE TABLE IF NOT EXISTS `Locations` (
  `loc_ID` int(2) NOT NULL AUTO_INCREMENT,
  `loc_name` varchar(50) DEFAULT NULL,
  `total_seats` int(11) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `fl_no` int(11) DEFAULT NULL,
  `bldg` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`loc_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Locations`
--

INSERT INTO `Locations` (`loc_ID`, `loc_name`, `total_seats`, `room_no`, `fl_no`, `bldg`) VALUES
(1, 'Chula Museum', 250, 2101, 2, 'bldg 3'),
(2, 'Chula Music Hall', 300, 1103, 1, 'bldg 1');

-- --------------------------------------------------------

--
-- Table structure for table `Managers`
--

CREATE TABLE IF NOT EXISTS `Managers` (
  `role` text NOT NULL,
  `access_lvl` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Manage_Audio`
--

CREATE TABLE IF NOT EXISTS `Manage_Audio` (
  `au_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  KEY `user_ID` (`user_ID`),
  KEY `au_ID` (`au_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Manage_Contents`
--

CREATE TABLE IF NOT EXISTS `Manage_Contents` (
  `content_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  PRIMARY KEY (`content_ID`,`user_ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Manage_Events`
--

CREATE TABLE IF NOT EXISTS `Manage_Events` (
  `event_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  PRIMARY KEY (`event_ID`,`user_ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Manage_Nisitify`
--

CREATE TABLE IF NOT EXISTS `Manage_Nisitify` (
  `flt_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  PRIMARY KEY (`flt_ID`,`user_ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Manage_Questions`
--

CREATE TABLE IF NOT EXISTS `Manage_Questions` (
  `q_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  PRIMARY KEY (`user_ID`,`q_ID`),
  KEY `q_ID` (`q_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Members`
--

CREATE TABLE IF NOT EXISTS `Members` (
  `occupation` text NOT NULL,
  `quiz_score` int(11) NOT NULL,
  `fb_ID` text NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` text NOT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Members`
--

INSERT INTO `Members` (`occupation`, `quiz_score`, `fb_ID`, `register_date`, `user_ID`, `avatar`) VALUES
('actarrrr', 0, '123456789', '2016-03-27 05:03:58', 1, 'http://139.59.245.168/Mochu/img/Room1-01.jpg'),
('comedian', 0, '1448779133', '2016-03-27 05:02:58', 2, 'http://139.59.245.168/Mochu/img/Room1-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Questions`
--

CREATE TABLE IF NOT EXISTS `Questions` (
  `q_ID` int(11) NOT NULL AUTO_INCREMENT,
  `q_content` varchar(256) DEFAULT NULL,
  `q_img` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`q_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Questions`
--

INSERT INTO `Questions` (`q_ID`, `q_content`, `q_img`) VALUES
(2, 'Who is the fairest of them all?', '22'),
(3, 'What is  the biggest animal in the world?', NULL),
(4, 'Ping is so beautiful', NULL),
(5, 'Ping is so cute', NULL),
(6, 'How are you?', 'eiei'),
(7, 'How old are you?', NULL),
(8, 'What do you mean?', NULL),
(9, 'What is Eve''s favourite food?', NULL),
(10, 'Who are you?', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Reservations`
--

CREATE TABLE IF NOT EXISTS `Reservations` (
  `rsv_ID` int(11) NOT NULL AUTO_INCREMENT,
  `atd_hist` tinyint(1) NOT NULL,
  `Rdate` date NOT NULL,
  `user_ID` int(11) NOT NULL,
  PRIMARY KEY (`rsv_ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Seat_Instance`
--

CREATE TABLE IF NOT EXISTS `Seat_Instance` (
  `seat_no` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL,
  `rsv_ID` int(11) NOT NULL,
  `event_ID` int(11) NOT NULL,
  PRIMARY KEY (`seat_no`,`rsv_ID`),
  KEY `event_ID` (`event_ID`),
  KEY `rsv_ID` (`rsv_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Fname` text,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `Lname` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `Bday` date NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `token` varchar(50) NOT NULL,
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `user_ID_4` (`user_ID`),
  KEY `user_ID` (`user_ID`),
  KEY `user_ID_2` (`user_ID`),
  KEY `user_ID_3` (`user_ID`),
  KEY `user_ID_5` (`user_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_ID`, `Fname`, `email`, `password`, `Lname`, `gender`, `contact`, `Bday`, `last_login`, `status`, `token`) VALUES
(1, 'Will', 'smithmith@ei.com', 'smithza', 'Smith', 'Male', '0876543210', '2000-02-04', '2016-03-27 04:50:21', 1, ''),
(2, 'Teerakorn', 'taneiei@ei.com', 'gutanA', 'Jokmok', 'None', '0999999999', '1990-07-13', '2016-03-27 04:52:40', 1, ''),
(3, 'TEERAKORN', 'teerakorn.a@gmail.com', '123456', '', '', '', '0000-00-00', '2016-03-27 05:33:20', 1, '7dff00d5232f279fbe2b009a50f7e972da6ecfb0418ea0bc3f'),
(4, 'Saris', 'saris.oph@gmail.com', '12345', '', '', '', '0000-00-00', '2016-03-27 08:52:05', 1, '313102914059c982b1e2d9bb83276b5f1f23f084b33544c7bc'),
(5, 'hello', 'tangent_only@hotmail.com', '123456', '', '', '', '0000-00-00', '2016-03-27 09:05:49', 1, 'f1666c2b3482c2038abcf1b79c516823fc2758c264c7db5653');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Choices`
--
ALTER TABLE `Choices`
  ADD CONSTRAINT `Choices_ibfk_1` FOREIGN KEY (`q_ID`) REFERENCES `Questions` (`q_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Events`
--
ALTER TABLE `Events`
  ADD CONSTRAINT `Events_ibfk_1` FOREIGN KEY (`loc_ID`) REFERENCES `Locations` (`loc_ID`);

--
-- Constraints for table `Interested_In`
--
ALTER TABLE `Interested_In`
  ADD CONSTRAINT `Interested_In_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `Users` (`user_ID`),
  ADD CONSTRAINT `Interested_In_ibfk_2` FOREIGN KEY (`interest_ID`) REFERENCES `Interests` (`interest_ID`);

--
-- Constraints for table `Managers`
--
ALTER TABLE `Managers`
  ADD CONSTRAINT `Managers_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `Users` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Manage_Audio`
--
ALTER TABLE `Manage_Audio`
  ADD CONSTRAINT `Manage_Audio_ibfk_2` FOREIGN KEY (`au_ID`) REFERENCES `AudioGuide` (`au_ID`),
  ADD CONSTRAINT `Manage_Audio_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `Users` (`user_ID`);

--
-- Constraints for table `Manage_Contents`
--
ALTER TABLE `Manage_Contents`
  ADD CONSTRAINT `Manage_Contents_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `Users` (`user_ID`),
  ADD CONSTRAINT `Manage_Contents_ibfk_2` FOREIGN KEY (`content_ID`) REFERENCES `Contents` (`content_ID`);

--
-- Constraints for table `Manage_Events`
--
ALTER TABLE `Manage_Events`
  ADD CONSTRAINT `Manage_Events_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `Users` (`user_ID`),
  ADD CONSTRAINT `Manage_Events_ibfk_2` FOREIGN KEY (`event_ID`) REFERENCES `Events` (`event_ID`);

--
-- Constraints for table `Manage_Nisitify`
--
ALTER TABLE `Manage_Nisitify`
  ADD CONSTRAINT `Manage_Nisitify_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `Users` (`user_ID`),
  ADD CONSTRAINT `Manage_Nisitify_ibfk_2` FOREIGN KEY (`flt_ID`) REFERENCES `Filters` (`flt_ID`);

--
-- Constraints for table `Manage_Questions`
--
ALTER TABLE `Manage_Questions`
  ADD CONSTRAINT `Manage_Questions_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `Users` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Manage_Questions_ibfk_1` FOREIGN KEY (`q_ID`) REFERENCES `Questions` (`q_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Members`
--
ALTER TABLE `Members`
  ADD CONSTRAINT `Members_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `Users` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Reservations`
--
ALTER TABLE `Reservations`
  ADD CONSTRAINT `Reservations_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `Users` (`user_ID`);

--
-- Constraints for table `Seat_Instance`
--
ALTER TABLE `Seat_Instance`
  ADD CONSTRAINT `Seat_Instance_ibfk_2` FOREIGN KEY (`rsv_ID`) REFERENCES `Reservations` (`rsv_ID`),
  ADD CONSTRAINT `Seat_Instance_ibfk_1` FOREIGN KEY (`event_ID`) REFERENCES `Events` (`event_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
