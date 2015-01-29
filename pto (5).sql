-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2015 at 12:44 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pto`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `date` date NOT NULL,
  `data` text NOT NULL,
  `starttime` varchar(10) DEFAULT '9',
  PRIMARY KEY (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`date`, `data`, `starttime`) VALUES
('2014-01-02', '', '9'),
('2014-01-07', 'jkhk', '9'),
('2014-01-08', 'dfdf', '9'),
('2014-01-09', 'dsf', '9'),
('2014-01-11', 'birthday', '9'),
('2014-01-15', 'ssss', '9'),
('2014-01-22', 'zxcf', '9'),
('2014-01-25', 'dfsd', '9'),
('2014-01-29', 'sdf', '9'),
('2014-01-31', 'dsf', '9'),
('2015-01-06', 'zxczxc', '9'),
('2015-01-07', 'test event', '9'),
('2015-01-08', 'sdf', '9'),
('2015-01-10', 'sdf', '9'),
('2015-01-14', 'f', '9'),
('2015-01-21', 'ddddd', '9'),
('2015-01-29', 'zzz', '9');

-- --------------------------------------------------------

--
-- Table structure for table `pto_booking_orders`
--

CREATE TABLE IF NOT EXISTS `pto_booking_orders` (
  `booking_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `class_type` int(11) DEFAULT NULL,
  `booking_session_id` int(11) DEFAULT NULL COMMENT 'we''re maintining participants with this tutor in separate table so we can use the same structure for group classes(where multiple students are enrolled in one session) and one2one classes also (where only 1 student is enrolled in the session',
  `event_id` int(11) DEFAULT NULL,
  `booking_order_amount` decimal(10,2) DEFAULT NULL COMMENT 'storing ordered / booked session amount so any change in tutor fee structure do not effect our reports',
  `order_date` datetime DEFAULT NULL,
  `order_status` tinyint(1) DEFAULT '0' COMMENT '0: not placed yet, 1: order placed, 2: order cancelled',
  `is_accepted_by_tutor` tinyint(1) DEFAULT '0' COMMENT '0: pending, 1: accepted, 2: rejected by tutor',
  `payment_status` tinyint(1) DEFAULT '0' COMMENT '0: pending, 1: paid online, 2: refunded',
  PRIMARY KEY (`booking_order_id`),
  UNIQUE KEY `ForiegnKey` (`event_id`),
  KEY `ForiegnKey2` (`class_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pto_booking_order_event`
--

CREATE TABLE IF NOT EXISTS `pto_booking_order_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_starttime` datetime DEFAULT NULL,
  `event_endtime` datetime DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pto_booking_order_session`
--

CREATE TABLE IF NOT EXISTS `pto_booking_order_session` (
  `session_id` int(11) NOT NULL COMMENT 'there can be multiple student ids (rows) against single (unique) session id',
  `student_id` int(11) NOT NULL COMMENT 'there can be multiple student ids (rows) against single (unique) session id',
  `parent_id` int(11) NOT NULL COMMENT 'allowing parent as well to let track the student activities'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pto_class`
--

CREATE TABLE IF NOT EXISTS `pto_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) DEFAULT NULL,
  `class_title` varchar(255) DEFAULT NULL,
  `class_description` text,
  `photo` varchar(255) DEFAULT NULL,
  `method` enum('Reading','Speaking') DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `pto_class`
--

INSERT INTO `pto_class` (`class_id`, `language`, `class_title`, `class_description`, `photo`, `method`) VALUES
(1, 'English', 'Pronancyy', 'jslfaaaa', '0', 'Speaking'),
(3, 'urdu', 'Grammer', 'sfjslssss', '0', 'Reading'),
(4, 'Punjabi', 'Bol Chal', 'sdfsdddd', '0', 'Reading'),
(6, 'English', 'Bol Chal', 'jslfaaaa', '0', 'Reading'),
(7, 'English', 'Bol Chal', 'dfs', '', 'Speaking'),
(8, 'English', 'Bol Chal', 'jslfaaaa', '', 'Reading'),
(9, 'English', 'Bol Chal', 'jslfjsldfjsl', '', 'Speaking'),
(13, 'English', 'Bol Chal', 'jslfjsldfjsl', NULL, 'Reading'),
(14, 'English', 'Bol Chal', 'jslfjsldfjsl', NULL, 'Reading'),
(15, 'English', 'Bol Chal', 'jslfaaaa', NULL, 'Speaking'),
(16, 'English', 'Bol Chal', 'jslfaaaa', NULL, 'Reading'),
(18, 'English', 'Bol Chal', 'jslfjsldfjsl', '0', 'Reading'),
(19, 'English', 'Bol Chal', 'jslfjsldfjsl', NULL, 'Reading'),
(20, 'English', 'Bol Chal', 'jslfjsldfjsl', '', 'Reading'),
(21, 'English', 'Bol Chal', 'jslfjsldfjsl', '', 'Reading'),
(22, 'English', 'Bol Chal', 'jslfjsldfjsl', NULL, 'Reading'),
(23, 'English', 'Bol Chal', 'jslfjsldfjsl', NULL, 'Reading'),
(24, 'English', 'Bol Chal', 'jslfjsldfjsl', '', 'Reading'),
(25, 'English', 'Bol Chal', 'jslfjsldfjsl', '', 'Reading'),
(26, 'English', 'Bol Chal', 'jslfjsldfjsl', NULL, 'Reading'),
(27, 'English', 'Bol Chal', 'jslfjsldfjsl', '', 'Reading'),
(28, 'Test', 'Test', 'description ', '10846480_944470518911575_1471571262156411491_n.jpg', 'Speaking'),
(29, 'dfdf', 'sdf', 'sdfsdf', 'template_opzet_1_(1).jpg', 'Reading');

-- --------------------------------------------------------

--
-- Table structure for table `pto_class_levels`
--

CREATE TABLE IF NOT EXISTS `pto_class_levels` (
  `class_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_level` varchar(100) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL COMMENT 'if tutor choosed ''other'' and enters any specific class name then reference tutor id comes here',
  PRIMARY KEY (`class_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pto_class_types`
--

CREATE TABLE IF NOT EXISTS `pto_class_types` (
  `class_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_type` enum('CLASS-TRIAL','CLASS-PAID','ONE2ONE-TRIAL','ONE2ONE-PAID') DEFAULT NULL,
  PRIMARY KEY (`class_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pto_event_communication`
--

CREATE TABLE IF NOT EXISTS `pto_event_communication` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `time_sent` datetime DEFAULT NULL,
  `time_read` datetime DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `message_body` text,
  `ref_doc_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL COMMENT 'a message may be related to any event or may not be (means it could be sometime a direct message even)',
  PRIMARY KEY (`message_id`),
  KEY `ForiegnKey` (`event_id`),
  KEY `ForiegnKey2` (`ref_doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pto_event_docs`
--

CREATE TABLE IF NOT EXISTS `pto_event_docs` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_label` varchar(100) DEFAULT NULL,
  `doc_uploaded_filename` varchar(100) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`doc_id`),
  KEY `ForiegnKey` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pto_event_reviews`
--

CREATE TABLE IF NOT EXISTS `pto_event_reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL COMMENT 'This is not parent id. This is only student id because only student role can place review, for group class multiple students can post review but on front end we will group them by Event_id and show agregated resutl',
  `event_id` int(11) DEFAULT NULL COMMENT 'review can be placed on an booked event',
  `tutor_id` int(11) DEFAULT NULL,
  `rating_teachingstyle` tinyint(1) DEFAULT NULL COMMENT 'range form 1-5',
  `rating_knowledge_gained` tinyint(1) DEFAULT NULL COMMENT 'range form 1-5',
  `rating_recommended4others` tinyint(1) DEFAULT NULL COMMENT 'range form 1-5',
  `review_comments` text,
  `review_posted_on` datetime DEFAULT NULL,
  `is_review_published` tinyint(1) DEFAULT NULL COMMENT 'show/hide review on tutor profile',
  `tutor_reply` text,
  `reply_posted_on` datetime DEFAULT NULL,
  `is_reply_published` tinyint(1) DEFAULT '0' COMMENT 'show/hide review reply on tutor profile',
  PRIMARY KEY (`review_id`),
  KEY `ForiegnKey` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pto_event_todos`
--

CREATE TABLE IF NOT EXISTS `pto_event_todos` (
  `todo_id` int(11) NOT NULL AUTO_INCREMENT,
  `todo_label` varchar(500) DEFAULT NULL,
  `todo_description` text,
  `ref_doc_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `completed_on` datetime DEFAULT NULL,
  PRIMARY KEY (`todo_id`),
  KEY `ForiegnKey` (`event_id`),
  KEY `ForiegnKey2` (`ref_doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pto_students`
--

CREATE TABLE IF NOT EXISTS `pto_students` (
  `student_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL COMMENT 'the user id from ''users'' table with which this student profile is connected. One parent to many students relationship',
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creation_date` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'datetime when this student was added by parent',
  `last_activity` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'datetime when this student page was opened',
  PRIMARY KEY (`student_id`),
  KEY `ForiegnKey` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pto_students`
--

INSERT INTO `pto_students` (`student_id`, `parent_id`, `first_name`, `last_name`, `address`, `mobile`, `email`, `phone`, `creation_date`, `last_activity`) VALUES
(1, 2, 'Student111', 'One', '123', '923134086188', 'student1@gmail.com', '123456', '2014-12-31 12:39:24', '2014-12-31 12:39:24'),
(2, 1, 'Student', 'Two', '', '923134086188', 'student2@gmail.com', '123456', '2014-12-31 12:39:24', '2014-12-31 12:39:24'),
(7, 2, 'Muhammad', 'Nauman', '195 F GECHS', '+923134086188', 'mhmmd.nauman@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pto_subject_specilities`
--

CREATE TABLE IF NOT EXISTS `pto_subject_specilities` (
  `subject_speciality_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL COMMENT 'if a new speciality added in system by new tutor its reference id will appear here.',
  PRIMARY KEY (`subject_speciality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pto_tutor_availabilities`
--

CREATE TABLE IF NOT EXISTS `pto_tutor_availabilities` (
  `user_id` int(11) DEFAULT NULL,
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  `day_name` enum('MON','TUE','WED','THU','FRI','SAT','SUN') NOT NULL COMMENT 'There can be multiple from-to timings even for a single day. For example: a tutor can be freen in morning and in evening so 2 records for each day or more are possible.',
  `is_active` tinyint(1) DEFAULT '1',
  KEY `ForiegnKey` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pto_tutor_class_levels`
--

CREATE TABLE IF NOT EXISTS `pto_tutor_class_levels` (
  `user_id` int(11) DEFAULT NULL,
  `class_level_id` int(11) DEFAULT NULL,
  KEY `ForiegnKey` (`user_id`),
  KEY `ForiegnKey2` (`class_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pto_tutor_subject_specialities`
--

CREATE TABLE IF NOT EXISTS `pto_tutor_subject_specialities` (
  `user_id` int(11) DEFAULT NULL,
  `subject_speciality_id` int(11) DEFAULT NULL,
  KEY `ForiegnKey` (`user_id`),
  KEY `ForiegnKey2` (`subject_speciality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pto_users`
--

CREATE TABLE IF NOT EXISTS `pto_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role_type` enum('ADMIN','MANAGER','TUTOR','PARENT-GUARDIAN','STUDENT') DEFAULT NULL,
  `security_pin` varchar(10) DEFAULT NULL COMMENT 'For securing payment sections from children',
  `registration_date` datetime DEFAULT NULL,
  `last_activity_date` datetime DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pto_users`
--

INSERT INTO `pto_users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role_type`, `security_pin`, `registration_date`, `last_activity_date`, `is_active`) VALUES
(1, 'Muhammad', 'Nauman', 'test', '5f4dcc3b5aa765d61d8327deb882cf99', 'ADMIN', 'pin', '2014-12-25 11:53:50', '2014-12-25 11:53:50', 1),
(2, 'Muhammad', 'Nauman', 'mhmmd.nauman@gmail.com', NULL, 'PARENT-GUARDIAN', NULL, NULL, NULL, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pto_booking_order_event`
--
ALTER TABLE `pto_booking_order_event`
  ADD CONSTRAINT `FK_pto_booking_order_event` FOREIGN KEY (`event_id`) REFERENCES `pto_booking_orders` (`event_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_pto_booking_order_event2` FOREIGN KEY (`event_id`) REFERENCES `pto_event_reviews` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_pto_booking_order_event3` FOREIGN KEY (`event_id`) REFERENCES `pto_event_todos` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_pto_booking_order_event4` FOREIGN KEY (`event_id`) REFERENCES `pto_event_docs` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_pto_booking_order_event5` FOREIGN KEY (`event_id`) REFERENCES `pto_event_communication` (`event_id`) ON DELETE CASCADE;

--
-- Constraints for table `pto_class_levels`
--
ALTER TABLE `pto_class_levels`
  ADD CONSTRAINT `FK_pto_class_levels` FOREIGN KEY (`class_level_id`) REFERENCES `pto_tutor_class_levels` (`class_level_id`);

--
-- Constraints for table `pto_class_types`
--
ALTER TABLE `pto_class_types`
  ADD CONSTRAINT `FK_pto_class_types` FOREIGN KEY (`class_type_id`) REFERENCES `pto_booking_orders` (`class_type`) ON DELETE NO ACTION;

--
-- Constraints for table `pto_event_docs`
--
ALTER TABLE `pto_event_docs`
  ADD CONSTRAINT `FK_pto_event_docs` FOREIGN KEY (`doc_id`) REFERENCES `pto_event_communication` (`ref_doc_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_pto_event_docs2` FOREIGN KEY (`doc_id`) REFERENCES `pto_event_todos` (`ref_doc_id`) ON DELETE NO ACTION;

--
-- Constraints for table `pto_subject_specilities`
--
ALTER TABLE `pto_subject_specilities`
  ADD CONSTRAINT `FK_pto_subject_specilities` FOREIGN KEY (`subject_speciality_id`) REFERENCES `pto_tutor_subject_specialities` (`subject_speciality_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
