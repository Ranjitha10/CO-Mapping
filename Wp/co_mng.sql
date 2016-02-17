-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2015 at 12:27 PM
-- Server version: 5.5.40
-- PHP Version: 5.3.10-1ubuntu3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `co_mng`
--

-- --------------------------------------------------------

--
-- Table structure for table `attainment`
--

CREATE TABLE IF NOT EXISTS `attainment` (
  `c_code_attain` varchar(10) NOT NULL,
  `co_level` varchar(5) NOT NULL,
  `req_marks` int(10) NOT NULL,
  `coobj` varchar(300) NOT NULL,
  KEY `c_code_attain` (`c_code_attain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attainment`
--

INSERT INTO `attainment` (`c_code_attain`, `co_level`, `req_marks`, `coobj`) VALUES
('12IS68', 'CO1', 45, ''),
('12IS68', 'CO2', 78, ''),
('12IS68', 'CO3', 96, ''),
('12IS68', 'CO4', 36, ''),
('12IS64', 'CO1', 45, 'hghg'),
('12IS64', 'CO2', 78, 'hjhjh'),
('12IS64', 'CO3', 92, 'opoip'),
('12IS64', 'CO4', 44, '8u'),
('12IS6C1', 'CO1', 23, 'eeee'),
('12IS6C1', 'CO2', 33, 'ffff'),
('12IS6C1', 'CO3', 42, 'ggg'),
('12IS6C1', 'CO4', 51, 'hjaskd'),
('12is90', 'CO1', 23, 'csaada'),
('12is90', 'CO2', 33, 'dasacs'),
('12is90', 'CO3', 49, 'kkkcsa'),
('12is90', 'CO4', 88, 'llcsa');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `c_code` varchar(10) NOT NULL,
  `cname` varchar(40) NOT NULL,
  `t_un` varchar(20) NOT NULL,
  PRIMARY KEY (`c_code`),
  KEY `t_un` (`t_un`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_code`, `cname`, `t_un`) VALUES
('12IS11', 'UNIX', 'smitha'),
('12IS32', 'Advanced Algorithms', 'anisha'),
('12IS44', 'Software Testing', 'rashmi'),
('12IS45', 'Human Computer Interaction', 'hod'),
('12IS49', 'Operating Systems', 'smitha'),
('12IS61', 'Cloud Applications', 'padmashree'),
('12IS64', 'Database Management Systems', 'hod'),
('12IS68', 'Java', 'anisha'),
('12IS6C1', 'Information Security', 'padmashree'),
('12IS6D4', 'Mobile Application Development', 'anisha'),
('12IS72', 'Computer Networks', 'hod'),
('12IS77', 'Compiler Design', 'rashmi'),
('12IS82', 'Big data', 'anisha'),
('12IS88', 'Software Engineering', 'rashmi'),
('12is90', 'Compiler Design', 'hod'),
('12IS92', 'Web programming', 'rashmi');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE IF NOT EXISTS `evaluation` (
  `c_code_eval` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `eval_num` int(5) NOT NULL,
  `type` varchar(30) NOT NULL,
  `noofquiz` int(11) NOT NULL,
  `time` time NOT NULL,
  KEY `type` (`type`),
  KEY `c_code_eval` (`c_code_eval`),
  KEY `noofquiz` (`noofquiz`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`c_code_eval`, `date`, `eval_num`, `type`, `noofquiz`, `time`) VALUES
('12IS64', '2015-04-17', 2, 'Test', 4, '12:30:00'),
('12IS68', '2015-04-06', 3, 'Test', 3, '00:00:00'),
('12IS64', '2015-04-06', 1, 'Test', 3, '00:00:00'),
('12IS64', '2015-12-11', 2, 'Test', 2, '00:00:00'),
('12IS11', '2013-03-12', 2, 'Test', 5, '12:30:00'),
('12IS77', '2014-04-11', 1, 'Test', 9, '02:30:00'),
('12IS88', '2013-03-12', 2, 'Test', 9, '02:30:00'),
('12IS6C1', '2013-03-12', 2, 'Test', 5, '12:30:00'),
('12IS6D4', '2014-04-11', 1, 'Test', 9, '02:30:00'),
('12IS72', '2011-02-10', 1, 'Test', 6, '11:30:00'),
('12IS90', '2013-03-12', 3, 'Test', 5, '12:30:00'),
('12IS11', '2014-04-11', 3, 'Test', 9, '02:30:00'),
('12IS88', '2011-02-10', 3, 'Test', 6, '11:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `eval_questions`
--

CREATE TABLE IF NOT EXISTS `eval_questions` (
  `c_code_evq` varchar(10) NOT NULL,
  `ques_num` varchar(5) NOT NULL,
  `co_level` varchar(5) NOT NULL,
  `max_marks` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `eval_num` int(11) NOT NULL,
  KEY `c_code_evq` (`c_code_evq`),
  KEY `type` (`type`,`eval_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eval_questions`
--

INSERT INTO `eval_questions` (`c_code_evq`, `ques_num`, `co_level`, `max_marks`, `type`, `eval_num`) VALUES
('12IS64', '1', 'CO2', '1', 'Test', 2),
('12IS64', '2', 'CO3', '2', 'Test', 2),
('12IS64', '3', 'CO2', '2', 'Test', 2),
('12IS64', '4', 'CO1', '2', 'Test', 2),
('12IS68', '1', 'CO3', '1', 'Test', 3),
('12IS68', '2', 'CO4', '2', 'Test', 3),
('12IS68', '3', 'CO1', '1', 'Test', 3),
('12IS64', '1', 'CO2', '1', 'Test', 1),
('12IS64', '2', 'CO3', '2', 'Test', 1),
('12IS64', '3', 'CO1', '1', 'Test', 1),
('12IS64', '1', 'CO2', '2', 'Test', 2),
('12IS64', '2', 'CO4', '2', 'Test', 2);

-- --------------------------------------------------------

--
-- Table structure for table `eval_theory_ques`
--

CREATE TABLE IF NOT EXISTS `eval_theory_ques` (
  `c_code` varchar(10) NOT NULL,
  `ques_num` varchar(5) NOT NULL,
  `co_level` varchar(5) NOT NULL,
  `type` varchar(10) NOT NULL,
  `max_marks` varchar(5) NOT NULL,
  `eval_num` int(11) NOT NULL,
  KEY `c_code` (`c_code`,`ques_num`,`co_level`,`type`,`max_marks`),
  KEY `eval_num` (`eval_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eval_theory_ques`
--

INSERT INTO `eval_theory_ques` (`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES
('12IS64', '1a', 'CO3', 'Test', '10', 2),
('12IS64', '2a', 'CO1', 'Test', '10', 2),
('12IS64', '3a', 'CO4', 'Test', '10', 2),
('12IS68', '1a', 'CO3', 'Test', '10', 3),
('12IS68', '2a', 'CO4', 'Test', '10', 3),
('12IS68', '3a', 'CO3', 'Test', '10', 3),
('12IS68', '4a', 'CO2', 'Test', '10', 3),
('12IS68', '5a', 'CO1', 'Test', '10', 3),
('12IS64', '1a', 'CO1', 'Test', '10', 1),
('12IS64', '2a', 'CO4', 'Test', '10', 1),
('12IS64', '3a', 'CO2', 'Test', '10', 1),
('12IS64', '4a', 'CO3', 'Test', '10', 1),
('12IS64', '5a', 'CO1', 'Test', '10', 1),
('12IS64', '1a', 'CO2', 'Test', '5', 2),
('12IS64', '2a', 'CO1', 'Test', '5', 2),
('12IS64', '3a', 'CO1', 'Test', '5', 2),
('12IS64', '3c', 'CO2', 'Test', '5', 2),
('12IS64', '4a', 'CO1', 'Test', '5', 2),
('12IS64', '5a', 'CO1', 'Test', '10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `excel`
--

CREATE TABLE IF NOT EXISTS `excel` (
  `usn` varchar(10) NOT NULL,
  `co1` float NOT NULL,
  `co2` float NOT NULL,
  `co3` float NOT NULL,
  `co4` float NOT NULL,
  PRIMARY KEY (`usn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `excel`
--

INSERT INTO `excel` (`usn`, `co1`, `co2`, `co3`, `co4`) VALUES
('1RV12IS001', 83.78, 66.67, 75, 91.67),
('1RV12IS002', 51.35, 53.33, 58.33, 58.33),
('1RV12IS003', 54.05, 60, 58.33, 75),
('1RV12IS005', 67.57, 73.33, 75, 66.67),
('1RV12IS007', 64.86, 73.33, 75, 66.67),
('1RV12IS008', 48.65, 66.67, 66.67, 8.33),
('1RV12IS009', 0, 0, 0, 0),
('1RV12IS013', 47.62, 72.73, 58.33, 60),
('2222333', 0, 0, 0, 0),
('3444', 0, 0, 0, 0),
('5w35', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `username` varchar(20) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `designation` varchar(30) NOT NULL,
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`username`, `fname`, `lname`, `designation`) VALUES
('anisha', 'Anisha', 'B S', 'Assistant Professor'),
('padmashree', 'Padmashree', 'T', 'Assistant Professor'),
('rashmi', 'Rashmi', 'R', 'Assistant Professor'),
('smitha', 'Smitha', 'R', 'Assistant Professor'),
('hod', 'Dr. N K Cauvery', ' ', 'HoD');

-- --------------------------------------------------------

--
-- Table structure for table `log_in`
--

CREATE TABLE IF NOT EXISTS `log_in` (
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_in`
--

INSERT INTO `log_in` (`username`, `password`) VALUES
('anisha', 'fe3f05b6bff245324aa95806c9601bb8'),
('hod', '2885f619a4ccca125c8ba4b825d1d772'),
('padmashree', '779f7f90ba95b120f04f7cdab02b2ea3'),
('rashmi', 'ab529ce104b38fa0e58a9cefdd99c49f'),
('smitha', '72a769810d93b73801d822ee2344b8d9');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `usn` varchar(10) NOT NULL,
  `c_code_stu` varchar(10) NOT NULL,
  PRIMARY KEY (`usn`),
  KEY `c_code_stu` (`c_code_stu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`usn`, `c_code_stu`) VALUES
('1RV12IS001', '12IS64'),
('1RV12IS002', '12IS64'),
('1RV12IS003', '12IS64'),
('1RV12IS005', '12IS64'),
('1RV12IS007', '12IS64'),
('1RV12IS008', '12IS64'),
('1RV12IS013', '12IS64'),
('2222333', '12IS64'),
('2323234', '12IS64'),
('3444', '12IS64'),
('5w35', '12IS64'),
('1RV12IS009', '12IS90');

-- --------------------------------------------------------

--
-- Table structure for table `stu_attainment`
--

CREATE TABLE IF NOT EXISTS `stu_attainment` (
  `c_code_attain` varchar(10) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `eval_num_appear` int(5) NOT NULL,
  `type_appear` varchar(30) NOT NULL,
  `ques_num_appear` varchar(5) NOT NULL,
  `marks_scored` varchar(5) NOT NULL,
  KEY `usn` (`usn`,`eval_num_appear`,`type_appear`),
  KEY `c_code_attain` (`c_code_attain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_attainment`
--

INSERT INTO `stu_attainment` (`c_code_attain`, `usn`, `eval_num_appear`, `type_appear`, `ques_num_appear`, `marks_scored`) VALUES
('12IS64', '1RV12IS001', 2, 'Test', '1', '1'),
('12IS64', '1RV12IS001', 2, 'Test', '2', '1'),
('12IS64', '1RV12IS001', 2, 'Test', '2', '2'),
('12IS64', '1RV12IS001', 2, 'Test', '4', '1'),
('12IS64', '1RV12IS001', 2, 'Test', '1a', '8'),
('12IS64', '1RV12IS001', 2, 'Test', '2a', '10'),
('12IS64', '1RV12IS001', 2, 'Test', '3a', '10'),
('12IS64', '1RV12IS002', 2, 'Test', '1', '1'),
('12IS64', '1RV12IS002', 2, 'Test', '2', '2'),
('12IS64', '1RV12IS002', 2, 'Test', '3', '1'),
('12IS64', '1RV12IS002', 2, 'Test', '4', '2'),
('12IS64', '1RV12IS002', 2, 'Test', '1a', '5'),
('12IS64', '1RV12IS002', 2, 'Test', '2a', '6'),
('12IS64', '1RV12IS002', 2, 'Test', '3a', '5'),
('12IS64', '1RV12IS003', 2, 'Test', '1', '1'),
('12IS64', '1RV12IS003', 2, 'Test', '2', '2'),
('12IS64', '1RV12IS003', 2, 'Test', '3', '2'),
('12IS64', '1RV12IS003', 2, 'Test', '4', '1'),
('12IS64', '1RV12IS003', 2, 'Test', '1a', '5'),
('12IS64', '1RV12IS003', 2, 'Test', '2a', '6'),
('12IS64', '1RV12IS003', 2, 'Test', '3a', '7'),
('12IS64', '1RV12IS008', 2, 'Test', '1', '1'),
('12IS64', '1RV12IS008', 2, 'Test', '2', '1'),
('12IS64', '1RV12IS008', 2, 'Test', '3', '1'),
('12IS64', '1RV12IS008', 2, 'Test', '4', '2'),
('12IS64', '1RV12IS008', 2, 'Test', '1a', '7'),
('12IS64', '1RV12IS008', 2, 'Test', '2a', '8'),
('12IS64', '1RV12IS008', 2, 'Test', '3a', '0'),
('12IS64', '1RV12IS005', 2, 'Test', '1', '1'),
('12IS64', '1RV12IS005', 2, 'Test', '2', '2'),
('12IS64', '1RV12IS005', 2, 'Test', '3', '2'),
('12IS64', '1RV12IS005', 2, 'Test', '4', '1'),
('12IS64', '1RV12IS005', 2, 'Test', '1a', '7'),
('12IS64', '1RV12IS005', 2, 'Test', '2a', '9'),
('12IS64', '1RV12IS005', 2, 'Test', '3a', '6'),
('12IS64', '1RV12IS007', 2, 'Test', '1', '1'),
('12IS64', '1RV12IS007', 2, 'Test', '2', '2'),
('12IS64', '1RV12IS007', 2, 'Test', '3', '2'),
('12IS64', '1RV12IS007', 2, 'Test', '4', '2'),
('12IS64', '1RV12IS007', 2, 'Test', '1a', '7'),
('12IS64', '1RV12IS007', 2, 'Test', '2a', '8'),
('12IS64', '1RV12IS007', 2, 'Test', '3a', '6'),
('12IS64', '1RV12IS007', 2, 'Test', '1', '1'),
('12IS64', '1RV12IS007', 2, 'Test', '2', '2'),
('12IS64', '1RV12IS007', 2, 'Test', '3', '2'),
('12IS64', '1RV12IS007', 2, 'Test', '4', '2'),
('12IS64', '1RV12IS007', 2, 'Test', '1a', '7'),
('12IS64', '1RV12IS007', 2, 'Test', '2a', '8'),
('12IS64', '1RV12IS007', 2, 'Test', '3a', '6'),
('12IS68', '1RV12IS002', 3, 'Test', '1', '1'),
('12IS68', '1RV12IS002', 3, 'Test', '2', '2'),
('12IS68', '1RV12IS002', 3, 'Test', '3', '1'),
('12IS68', '1RV12IS002', 3, 'Test', '1a', '7'),
('12IS68', '1RV12IS002', 3, 'Test', '2a', '6'),
('12IS68', '1RV12IS002', 3, 'Test', '3a', '7'),
('12IS68', '1RV12IS002', 3, 'Test', '4a', '8'),
('12IS68', '1RV12IS002', 3, 'Test', '5a', '6'),
('12IS68', '1RV12IS007', 3, 'Test', '1', '1'),
('12IS68', '1RV12IS007', 3, 'Test', '2', '2'),
('12IS68', '1RV12IS007', 3, 'Test', '3', '1'),
('12IS68', '1RV12IS007', 3, 'Test', '1a', '7'),
('12IS68', '1RV12IS007', 3, 'Test', '2a', '8'),
('12IS68', '1RV12IS007', 3, 'Test', '3a', '9'),
('12IS68', '1RV12IS007', 3, 'Test', '4a', '6'),
('12IS68', '1RV12IS007', 3, 'Test', '5a', '5'),
('12IS68', '1RV12IS005', 3, 'Test', '1', '1'),
('12IS68', '1RV12IS005', 3, 'Test', '2', '1'),
('12IS68', '1RV12IS005', 3, 'Test', '3', '1'),
('12IS68', '1RV12IS005', 3, 'Test', '1a', '6'),
('12IS68', '1RV12IS005', 3, 'Test', '2a', '7'),
('12IS68', '1RV12IS005', 3, 'Test', '3a', '8'),
('12IS68', '1RV12IS005', 3, 'Test', '4a', '5'),
('12IS68', '1RV12IS005', 3, 'Test', '5a', '6'),
('12IS64', '1RV12IS002', 1, 'Test', '1', '1'),
('12IS64', '1RV12IS002', 1, 'Test', '2', '1'),
('12IS64', '1RV12IS002', 1, 'Test', '3', '1'),
('12IS64', '1RV12IS002', 1, 'Test', '1a', '0'),
('12IS64', '1RV12IS002', 1, 'Test', '2a', '5'),
('12IS64', '1RV12IS002', 1, 'Test', '3a', '6'),
('12IS64', '1RV12IS002', 1, 'Test', '4a', '7'),
('12IS64', '1RV12IS002', 1, 'Test', '5a', '8'),
('12IS64', '1RV12IS007', 1, 'Test', '1', '1'),
('12IS64', '1RV12IS007', 1, 'Test', '2', '2'),
('12IS64', '1RV12IS007', 1, 'Test', '3', '1'),
('12IS64', '1RV12IS007', 1, 'Test', '1a', '10'),
('12IS64', '1RV12IS007', 1, 'Test', '2a', '2'),
('12IS64', '1RV12IS007', 1, 'Test', '3a', '3'),
('12IS64', '1RV12IS007', 1, 'Test', '4a', '6'),
('12IS64', '1RV12IS007', 1, 'Test', '5a', '6'),
('12IS64', '1RV12IS009', 1, 'Test', '1', '1'),
('12IS64', '1RV12IS009', 1, 'Test', '2', '2'),
('12IS64', '1RV12IS009', 1, 'Test', '3', '1'),
('12IS64', '1RV12IS009', 1, 'Test', '1a', '5'),
('12IS64', '1RV12IS009', 1, 'Test', '2a', '6'),
('12IS64', '1RV12IS009', 1, 'Test', '3a', '7'),
('12IS64', '1RV12IS009', 1, 'Test', '4a', '8'),
('12IS64', '1RV12IS009', 1, 'Test', '5a', '9'),
('12IS64', '1RV12IS013', 1, 'Test', '1', '1'),
('12IS64', '1RV12IS013', 1, 'Test', '2', '2'),
('12IS64', '1RV12IS013', 1, 'Test', '3', '1'),
('12IS64', '1RV12IS013', 1, 'Test', '1a', '5'),
('12IS64', '1RV12IS013', 1, 'Test', '2a', '6'),
('12IS64', '1RV12IS013', 1, 'Test', '3a', '7'),
('12IS64', '1RV12IS013', 1, 'Test', '4a', '5'),
('12IS64', '1RV12IS013', 1, 'Test', '5a', '4'),
('12IS64', '1RV12IS007', 1, 'Test', '1', '1'),
('12IS64', '1RV12IS007', 1, 'Test', '2', '2'),
('12IS64', '1RV12IS007', 1, 'Test', '3', '1'),
('12IS64', '1RV12IS007', 1, 'Test', '1a', '10'),
('12IS64', '1RV12IS007', 1, 'Test', '2a', '2'),
('12IS64', '1RV12IS007', 1, 'Test', '3a', '3'),
('12IS64', '1RV12IS007', 1, 'Test', '4a', '6'),
('12IS64', '1RV12IS007', 1, 'Test', '5a', '6'),
('12IS64', '1RV12IS007', 1, 'Test', '1', '1'),
('12IS64', '1RV12IS007', 1, 'Test', '2', '2'),
('12IS64', '1RV12IS007', 1, 'Test', '3', '1'),
('12IS64', '1RV12IS007', 1, 'Test', '1a', '10'),
('12IS64', '1RV12IS007', 1, 'Test', '2a', '2'),
('12IS64', '1RV12IS007', 1, 'Test', '3a', '3'),
('12IS64', '1RV12IS007', 1, 'Test', '4a', '6'),
('12IS64', '1RV12IS007', 1, 'Test', '5a', '6'),
('12IS64', '5w35', 1, 'Test', '1', ''),
('12IS64', '5w35', 1, 'Test', '2', ''),
('12IS64', '5w35', 1, 'Test', '3', ''),
('12IS64', '5w35', 1, 'Test', '1a', ''),
('12IS64', '5w35', 1, 'Test', '2a', ''),
('12IS64', '5w35', 1, 'Test', '3a', ''),
('12IS64', '5w35', 1, 'Test', '4a', ''),
('12IS64', '5w35', 1, 'Test', '5a', ''),
('12IS64', '3444', 2, 'Test', '1', ''),
('12IS64', '3444', 2, 'Test', '2', ''),
('12IS64', '3444', 2, 'Test', '3', ''),
('12IS64', '3444', 2, 'Test', '4', ''),
('12IS64', '3444', 2, 'Test', '1a', ''),
('12IS64', '3444', 2, 'Test', '2a', ''),
('12IS64', '3444', 2, 'Test', '3a', ''),
('12IS64', '2222333', 2, 'Test', '1', ''),
('12IS64', '2222333', 2, 'Test', '2', ''),
('12IS64', '2222333', 2, 'Test', '3', ''),
('12IS64', '2222333', 2, 'Test', '4', ''),
('12IS64', '2222333', 2, 'Test', '1a', ''),
('12IS64', '2222333', 2, 'Test', '2a', ''),
('12IS64', '2222333', 2, 'Test', '3a', ''),
('12IS64', '1RV12is009', 2, 'Test', '1', ''),
('12IS64', '1RV12is009', 2, 'Test', '2', ''),
('12IS64', '1RV12is009', 2, 'Test', '3', ''),
('12IS64', '1RV12is009', 2, 'Test', '4', ''),
('12IS64', '1RV12is009', 2, 'Test', '1a', ''),
('12IS64', '1RV12is009', 2, 'Test', '2a', ''),
('12IS64', '1RV12is009', 2, 'Test', '3a', ''),
('12IS64', '1RV12is009', 1, 'Test', '1', ''),
('12IS64', '1RV12is009', 1, 'Test', '2', ''),
('12IS64', '1RV12is009', 1, 'Test', '3', ''),
('12IS64', '1RV12is009', 1, 'Test', '1a', ''),
('12IS64', '1RV12is009', 1, 'Test', '2a', ''),
('12IS64', '1RV12is009', 1, 'Test', '3a', ''),
('12IS64', '1RV12is009', 1, 'Test', '4a', ''),
('12IS64', '1RV12is009', 1, 'Test', '5a', '');

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE IF NOT EXISTS `total` (
  `co_code` varchar(10) NOT NULL,
  `co1` varchar(5) NOT NULL,
  `co2` varchar(5) NOT NULL,
  `co3` varchar(5) NOT NULL,
  `co4` varchar(5) NOT NULL,
  PRIMARY KEY (`co_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total`
--

INSERT INTO `total` (`co_code`, `co1`, `co2`, `co3`, `co4`) VALUES
('', '37.98', '42.36', '42.42', '38.78'),
('12IS64', '37.98', '42.36', '42.42', '38.78');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attainment`
--
ALTER TABLE `attainment`
  ADD CONSTRAINT `attainment_ibfk_1` FOREIGN KEY (`c_code_attain`) REFERENCES `course` (`c_code`) ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`t_un`) REFERENCES `log_in` (`username`);

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`c_code_eval`) REFERENCES `course` (`c_code`);

--
-- Constraints for table `eval_questions`
--
ALTER TABLE `eval_questions`
  ADD CONSTRAINT `eval_questions_ibfk_1` FOREIGN KEY (`c_code_evq`) REFERENCES `course` (`c_code`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`username`) REFERENCES `log_in` (`username`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`c_code_stu`) REFERENCES `course` (`c_code`);

--
-- Constraints for table `stu_attainment`
--
ALTER TABLE `stu_attainment`
  ADD CONSTRAINT `stu_attainment_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`),
  ADD CONSTRAINT `stu_attainment_ibfk_2` FOREIGN KEY (`c_code_attain`) REFERENCES `course` (`c_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
