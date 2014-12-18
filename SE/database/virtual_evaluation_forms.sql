-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2014 at 02:29 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `virtual_evaluation_forms`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `fullname`, `username`, `email`, `password`) VALUES
(1, 'Mohammed-Hanif Abdulai', 'ymhanif', 'ymhanif07@gmail.com', '1234567a'),
(2, 'Mohammed-Hanif Abdulai', 'ymhanif2014', 'ymhanif07@gmail.com', 'abcdefgh1'),
(3, 'Edem Anaglo', 'loptial', 'edem@gmail.com', '12345678'),
(4, 'Aba Debrah', 'aba_d', 'abd@hotmail.com', 'abadebrah2004'),
(5, 'Kingston Coker', 'k_coker', 'kingston.coker@gmail.com', 'abc12345'),
(6, 'Kwabena Ohene-Bonsu', 'k_bonsu', 'kwabena@yahoo.com', 'kobbybonsu'),
(7, 'Daniel Ankomah', 'daniel', 'daniel@gmail.com', '12345'),
(8, 'Gloria Yeboah', 'gloria', 'gyeboah@gmail.com', 'gloria123'),
(9, 'Kirk Amoah', 'kirk.amoah', 'kirk.amoah@ashesi.edu.gh', 'kirk123'),
(10, 'Cecil Arthur', 'cecil', 'cecil.arthur@ashesi.edu.gh', 'rac123'),
(11, 'Todd Warren', 'toddwseattle', 'twarren@ashesi.edu.gh', '12345'),
(12, 'Cecil Arthur', 'cecil', 'cecil.arthur@ashesi.edu.gh', 'cecil');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `course_number` varchar(10) NOT NULL,
  `num_of_teams` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `fi_email` varchar(50) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `year` varchar(4) NOT NULL,
  `description` varchar(100) NOT NULL,
  `questions` varchar(1000) NOT NULL,
  `questionsset` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_lecturer` (`lecturer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `course_number`, `num_of_teams`, `lecturer_id`, `fi_email`, `semester`, `year`, `description`, `questions`, `questionsset`) VALUES
(4, 'Software Engineering', 'CS009', 5, 7, 'wumpini.hussein@ashesi.edu.gh', 'Fall Semester', '2014', 'asdsadfsafd', '[{"type":"rating","prompt":"How good was the presentation?"},{"type":"yes_no","prompt":"In you opini', '1'),
(5, 'Mobile Web Technologies', 'CS09', 5, 7, 'delali.vorgbe@ashesi.edu,gh', 'Fall Semester', '2014', 'The course teaches the latest technologies in the world of mobile web', '', '0'),
(6, 'Ghanaian Popular Culture', 'AF214', 4, 7, 'jessica.boifio@ashesi.edu.gh', 'Fall Semester', '2014', 'Brings to light, the importance of Ghanaian popular culture.', '', '0'),
(8, 'Data Structures', 'CS009', 5, 9, 'kwabena.bonsu@gmail.com', 'Summer School', '2014', 'A course about Computer Data Structures', '', '0'),
(10, 'Animation 101', 'AM101', 5, 10, 'delali.vorgbe@ashesi.edu,gh', 'Summer School', '2015', 'An introductory course to the world of animation.', '[{"type":"yes_no","prompt":"How are you?"},{"type":"yes_no","prompt":"How are you?"},{"type":"yes_no","prompt":"How are you?"}]', '1'),
(11, 'Entrepreneurship', 'AM101', 4, 10, 'jessica.boifio@ashesi.edu.gh', 'Spring Semester', '2015', 'An introductory course to the world of videography', '', '0'),
(12, 'Software Engineering', '123', 8, 11, 'rwarren@ashesi.edu.gh', 'Fall Semester', '2014', 'this is the killer SE class', '[{"type":"rating","prompt":"The client requirments were clearly articulated"},{"type":"rating","prompt":"the team had a good understanding of the users of the system and the problem/scenario"},{"type":"yes_no","prompt":"the team had a good breakfast"},{"type":"yes_no","prompt":"they were dressed business casual+"},{"type":"rating","prompt":"I thin this team did alot of stuff"},{"type":"comment","prompt":"what did you think of the demo?"},{"type":"comment","prompt":"what did you think of the presenatation"},{"type":"rating","prompt":"anything else"}]', '1'),
(13, 'Software Engineering', 'AF214', 3, 12, 'delali.vorgbe@ashesi.edu,gh', 'Fall Semester', '2014', 'A course about Computer Data Structures', '', '0'),
(15, 'Mobile Web Technologies', '12', 4, 12, 'kokbe@yahoo.com', 'Fall Semester', '2015', 'its good', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `filled_forms`
--

CREATE TABLE IF NOT EXISTS `filled_forms` (
  `filled_form_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `form_data` varchar(1000) NOT NULL,
  PRIMARY KEY (`filled_form_id`),
  KEY `FK_course_id` (`course_id`),
  KEY `FK_teamid` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `filled_forms`
--


-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `project_description` varchar(50) NOT NULL,
  `team_members` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_courseid` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `course_id`, `project_description`, `team_members`) VALUES
(1, 'Team One', 6, 'Working on project one', 'Team Member 1\r\nTeam Member 2'),
(2, 'Team 2', 6, 'Project 2', 'Team Member 2\r\nTeam Member 3'),
(3, 'Team 3', 6, 'Project 3', 'Team Member 3\r\nTeam Member 4'),
(4, 'Team 4', 6, 'Project 4', 'Team Member 4\r\nTeam Member 5'),
(5, 'Team One', 4, 'Working on Project One', 'John Doe 1\r\nJohn Doe 2\r\nJohn Doe 3\r\nJohn Doe 4'),
(6, 'Team Two', 4, 'Working on Project Two', 'John Doe 1\r\nJohn Doe 2\r\nJohn Doe 3\r\nJohn Doe 4'),
(7, 'Team Three', 4, 'Working on Project Three', 'John Doe 1\r\nJohn Doe 2\r\nJohn Doe 3\r\nJohn Doe 4'),
(8, 'Team Four', 4, 'Working on Project Four', 'John Doe 1\r\nJohn Doe 2\r\nJohn Doe 3\r\nJohn Doe 4'),
(9, 'Team Five', 4, 'Working on Project Five', 'John Doe 1\r\nJohn Doe 2\r\nJohn Doe 3\r\nJohn Doe 4'),
(14, 'Piru', 15, 'eVal form', 'john cecil'),
(15, 'team 1', 15, '', ''),
(16, '', 15, '', ''),
(17, '', 15, '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `FK_lecturer` FOREIGN KEY (`lecturer_id`) REFERENCES `administrators` (`id`);

--
-- Constraints for table `filled_forms`
--
ALTER TABLE `filled_forms`
  ADD CONSTRAINT `FK_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_teamid` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `FK_courseid` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
