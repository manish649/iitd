-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2019 at 05:30 AM
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
-- Database: `corephpadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

DROP TABLE IF EXISTS `admin_accounts`;
CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `admin_type` enum('user','suadmin','uniadmin') NOT NULL DEFAULT 'user',
  `university` varchar(100) NOT NULL,
  `uni_abbr` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2354 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `user_name`, `passwd`, `admin_type`, `university`, `uni_abbr`) VALUES
(4, 'anand', '8bda8e915e629a9fd1bbca44f8099c81', 'user', 'all', 'all'),
(2345, 'amit', '0cb1eb413b8f7cee17701a37a1d74dc3', 'user', 'sharda university', 'su'),
(2346, 'manish', '59c95189ac895fcc1c6e1c38d067e244', 'user', 'sharda university', 'su'),
(2347, 'pankaj', '95deb5011a8fe1ccf6552bb5bcda2ff0', 'user', 'sharda university', 'su'),
(2348, 'dhram', '7594a1236aa50593ea08d71c5ebf1d96', 'user', 'sharda university', 'su'),
(2349, 'mandeep', '619e26758a159ab6fafda4e6ac81dcf3', 'user', 'sharda university', 'su'),
(2350, 'shruti', 'eab6930b3c87b22874b40a0e52fe1ca3', 'user', 'sharda university', 'su'),
(2351, 'neha', '262f5bdd0af9098e7443ab1f8e435290', 'user', 'sharda university', 'su'),
(2352, 'dean', '48767461cb09465362c687ae0c44753b', 'user', 'sharda university', 'su'),
(2353, 'lalit', '851ba4c0af23e50de6de795d6ee17c85', 'user', 'sharda university', 'su');

-- --------------------------------------------------------

--
-- Table structure for table `conw_component`
--

DROP TABLE IF EXISTS `conw_component`;
CREATE TABLE IF NOT EXISTS `conw_component` (
  `course_code` varchar(10) NOT NULL,
  `faculty_id` varchar(10) NOT NULL,
  `qz1` int(11) NOT NULL DEFAULT '0',
  `qz1cow` float NOT NULL DEFAULT '0',
  `qz2` int(11) NOT NULL DEFAULT '0',
  `qz2cow` float NOT NULL DEFAULT '0',
  `qz3` int(11) NOT NULL DEFAULT '0',
  `qz3cow` float NOT NULL DEFAULT '0',
  `qz4` int(11) NOT NULL DEFAULT '0',
  `qz4cow` float NOT NULL DEFAULT '0',
  `qz5` int(11) NOT NULL DEFAULT '0',
  `qz5cow` float NOT NULL DEFAULT '0',
  `asg1` int(11) NOT NULL DEFAULT '0',
  `asg1cow` float NOT NULL DEFAULT '0',
  `asg2` int(11) NOT NULL DEFAULT '0',
  `asg2cow` float NOT NULL DEFAULT '0',
  `asg3` int(11) NOT NULL DEFAULT '0',
  `asg3cow` float NOT NULL DEFAULT '0',
  `asg4` int(11) NOT NULL DEFAULT '0',
  `asg4cow` float NOT NULL DEFAULT '0',
  `ca` int(11) NOT NULL DEFAULT '0',
  `cacow` float NOT NULL DEFAULT '0',
  `prj1` int(11) NOT NULL DEFAULT '0',
  `prj1cow` float NOT NULL DEFAULT '0',
  `prj2` int(11) NOT NULL DEFAULT '0',
  `prj2cow` float NOT NULL DEFAULT '0',
  `prj3` int(11) NOT NULL DEFAULT '0',
  `prj3cow` float NOT NULL DEFAULT '0',
  `prj4` int(11) NOT NULL DEFAULT '0',
  `prj4cow` float NOT NULL DEFAULT '0',
  `prj5` int(11) NOT NULL DEFAULT '0',
  `prj5cow` float NOT NULL DEFAULT '0',
  `mq1` int(11) NOT NULL DEFAULT '0',
  `mq1cow` float NOT NULL DEFAULT '0',
  `mq2` int(11) NOT NULL DEFAULT '0',
  `mq2cow` float NOT NULL DEFAULT '0',
  `mq3` int(11) NOT NULL DEFAULT '0',
  `mq3cow` float NOT NULL DEFAULT '0',
  `mq4` int(11) NOT NULL DEFAULT '0',
  `mq4cow` float NOT NULL DEFAULT '0',
  `mq5` int(11) NOT NULL DEFAULT '0',
  `mq5cow` float NOT NULL DEFAULT '0',
  `mq6` int(11) NOT NULL DEFAULT '0',
  `mq6cow` float NOT NULL DEFAULT '0',
  `mq7` int(11) NOT NULL DEFAULT '0',
  `mq7cow` float NOT NULL DEFAULT '0',
  `mq8` int(11) NOT NULL DEFAULT '0',
  `mq8cow` float NOT NULL DEFAULT '0',
  `mq9` int(11) NOT NULL DEFAULT '0',
  `mq9cow` float NOT NULL DEFAULT '0',
  `mq10` int(11) NOT NULL DEFAULT '0',
  `mq10cow` float NOT NULL DEFAULT '0',
  `mq11` int(11) NOT NULL DEFAULT '0',
  `mq11cow` float NOT NULL DEFAULT '0',
  `mq12` int(11) NOT NULL DEFAULT '0',
  `mq12cow` float NOT NULL DEFAULT '0',
  `mq13` int(11) NOT NULL DEFAULT '0',
  `mq13cow` float NOT NULL DEFAULT '0',
  `mq14` int(11) NOT NULL DEFAULT '0',
  `mq14cow` float NOT NULL DEFAULT '0',
  `mq15` int(11) NOT NULL DEFAULT '0',
  `mq15cow` float NOT NULL DEFAULT '0',
  `mq16` int(11) NOT NULL DEFAULT '0',
  `mq16cow` float NOT NULL DEFAULT '0',
  `mq17` int(11) NOT NULL DEFAULT '0',
  `mq17cow` float NOT NULL DEFAULT '0',
  `mq18` int(11) NOT NULL DEFAULT '0',
  `mq18cow` float NOT NULL DEFAULT '0',
  `mq19` int(11) NOT NULL DEFAULT '0',
  `mq19cow` float NOT NULL DEFAULT '0',
  `mq20` int(11) NOT NULL DEFAULT '0',
  `mq20cow` float NOT NULL DEFAULT '0',
  `eq1` int(11) NOT NULL DEFAULT '0',
  `eq1cow` float NOT NULL DEFAULT '0',
  `eq2` int(11) NOT NULL DEFAULT '0',
  `eq2cow` float NOT NULL DEFAULT '0',
  `eq3` int(11) NOT NULL DEFAULT '0',
  `eq3cow` float NOT NULL DEFAULT '0',
  `eq4` int(11) NOT NULL DEFAULT '0',
  `eq4cow` float NOT NULL DEFAULT '0',
  `eq5` int(11) NOT NULL DEFAULT '0',
  `eq5cow` float NOT NULL DEFAULT '0',
  `eq6` int(11) NOT NULL DEFAULT '0',
  `eq6cow` float NOT NULL DEFAULT '0',
  `eq7` int(11) NOT NULL DEFAULT '0',
  `eq7cow` float NOT NULL DEFAULT '0',
  `eq8` int(11) NOT NULL DEFAULT '0',
  `eq8cow` float NOT NULL DEFAULT '0',
  `eq9` int(11) NOT NULL DEFAULT '0',
  `eq9cow` float NOT NULL DEFAULT '0',
  `eq10` int(11) NOT NULL DEFAULT '0',
  `eq10cow` float NOT NULL DEFAULT '0',
  `eq11` int(11) NOT NULL DEFAULT '0',
  `eq11cow` float NOT NULL DEFAULT '0',
  `eq12` int(11) NOT NULL DEFAULT '0',
  `eq12cow` float NOT NULL DEFAULT '0',
  `eq13` int(11) NOT NULL DEFAULT '0',
  `eq13cow` float NOT NULL DEFAULT '0',
  `eq14` int(11) NOT NULL DEFAULT '0',
  `eq14cow` float NOT NULL DEFAULT '0',
  `eq15` int(11) NOT NULL DEFAULT '0',
  `eq15cow` float NOT NULL DEFAULT '0',
  `eq16` int(11) NOT NULL DEFAULT '0',
  `eq16cow` float NOT NULL DEFAULT '0',
  `eq17` int(11) NOT NULL DEFAULT '0',
  `eq17cow` float NOT NULL DEFAULT '0',
  `eq18` int(11) NOT NULL DEFAULT '0',
  `eq18cow` float NOT NULL DEFAULT '0',
  `eq19` int(11) NOT NULL DEFAULT '0',
  `eq19cow` float NOT NULL DEFAULT '0',
  `eq20` int(11) NOT NULL DEFAULT '0',
  `eq20cow` float NOT NULL DEFAULT '0',
  `qz1max` float NOT NULL DEFAULT '0',
  `qz2max` float NOT NULL DEFAULT '0',
  `qz3max` float NOT NULL DEFAULT '0',
  `qz4max` float NOT NULL DEFAULT '0',
  `qz5max` float NOT NULL DEFAULT '0',
  `asg1max` float NOT NULL DEFAULT '0',
  `asg2max` float NOT NULL DEFAULT '0',
  `asg3max` float NOT NULL DEFAULT '0',
  `asg4max` float NOT NULL DEFAULT '0',
  `camax` float NOT NULL DEFAULT '0',
  `prj1max` float NOT NULL DEFAULT '0',
  `prj2max` float NOT NULL DEFAULT '0',
  `prj3max` float NOT NULL DEFAULT '0',
  `prj4max` float NOT NULL DEFAULT '0',
  `prj5max` float NOT NULL DEFAULT '0',
  `mq1max` float NOT NULL DEFAULT '0',
  `mq2max` float NOT NULL DEFAULT '0',
  `mq3max` float NOT NULL DEFAULT '0',
  `mq4max` float NOT NULL DEFAULT '0',
  `mq5max` float NOT NULL DEFAULT '0',
  `mq6max` float NOT NULL DEFAULT '0',
  `mq7max` float NOT NULL DEFAULT '0',
  `mq8max` float NOT NULL DEFAULT '0',
  `mq9max` float NOT NULL DEFAULT '0',
  `mq10max` float NOT NULL DEFAULT '0',
  `mq11max` float NOT NULL DEFAULT '0',
  `mq12max` float NOT NULL DEFAULT '0',
  `mq13max` float NOT NULL DEFAULT '0',
  `mq14max` float NOT NULL DEFAULT '0',
  `mq15max` float NOT NULL DEFAULT '0',
  `mq16max` float NOT NULL DEFAULT '0',
  `mq17max` float NOT NULL DEFAULT '0',
  `mq18max` float NOT NULL DEFAULT '0',
  `mq19max` float NOT NULL DEFAULT '0',
  `mq20max` float NOT NULL DEFAULT '0',
  `eq1max` float NOT NULL DEFAULT '0',
  `eq2max` float NOT NULL DEFAULT '0',
  `eq3max` float NOT NULL DEFAULT '0',
  `eq4max` float NOT NULL DEFAULT '0',
  `eq5max` float NOT NULL DEFAULT '0',
  `eq6max` float NOT NULL DEFAULT '0',
  `eq7max` float NOT NULL DEFAULT '0',
  `eq8max` float NOT NULL DEFAULT '0',
  `eq9max` float NOT NULL DEFAULT '0',
  `eq10max` float NOT NULL DEFAULT '0',
  `eq11max` float NOT NULL DEFAULT '0',
  `eq12max` float NOT NULL DEFAULT '0',
  `eq13max` float NOT NULL DEFAULT '0',
  `eq14max` float NOT NULL DEFAULT '0',
  `eq15max` float NOT NULL DEFAULT '0',
  `eq16max` float NOT NULL DEFAULT '0',
  `eq17max` float NOT NULL DEFAULT '0',
  `eq18max` float NOT NULL DEFAULT '0',
  `eq19max` float NOT NULL DEFAULT '0',
  `eq20max` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`course_code`,`faculty_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `copo_details`
--

DROP TABLE IF EXISTS `copo_details`;
CREATE TABLE IF NOT EXISTS `copo_details` (
  `course_code` varchar(10) NOT NULL,
  `faculty_id` varchar(10) NOT NULL,
  `cono` int(11) NOT NULL,
  `po1` int(11) NOT NULL,
  `po2` int(11) NOT NULL,
  `po3` int(11) NOT NULL,
  `po4` int(11) NOT NULL,
  `po5` int(11) NOT NULL,
  `po6` int(11) NOT NULL,
  `po7` int(11) NOT NULL,
  `po8` int(11) NOT NULL,
  `po9` int(11) NOT NULL,
  `po10` int(11) NOT NULL,
  `po11` int(11) NOT NULL,
  `po12` int(11) NOT NULL,
  `peo1` int(11) NOT NULL,
  `peo2` int(11) NOT NULL,
  `peo3` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`course_code`,`faculty_id`,`cono`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `school` varchar(50) NOT NULL,
  `prog` varchar(100) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_desc` varchar(400) NOT NULL,
  `co1` varchar(400) NOT NULL,
  `co2` varchar(400) NOT NULL,
  `co3` varchar(400) NOT NULL,
  `co4` varchar(400) NOT NULL,
  `co5` varchar(400) NOT NULL,
  `co6` varchar(400) NOT NULL,
  `user` varchar(100) NOT NULL,
  PRIMARY KEY (`prog`,`sem`,`course_code`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course_coordinator`
--

DROP TABLE IF EXISTS `course_coordinator`;
CREATE TABLE IF NOT EXISTS `course_coordinator` (
  `emp_id` varchar(16) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `co_component`
--

DROP TABLE IF EXISTS `co_component`;
CREATE TABLE IF NOT EXISTS `co_component` (
  `course_code` varchar(10) NOT NULL,
  `faculty_id` varchar(10) NOT NULL,
  `cono` int(11) NOT NULL,
  `qz1` int(11) NOT NULL DEFAULT '0',
  `qz2` int(11) NOT NULL DEFAULT '0',
  `qz3` int(11) NOT NULL DEFAULT '0',
  `qz4` int(11) NOT NULL DEFAULT '0',
  `qz5` int(11) NOT NULL DEFAULT '0',
  `asg1` int(4) NOT NULL,
  `asg2` int(11) NOT NULL,
  `asg3` int(11) NOT NULL,
  `asg4` int(11) NOT NULL,
  `ca` int(11) NOT NULL DEFAULT '0',
  `mq1` int(11) NOT NULL DEFAULT '0',
  `mq2` int(11) NOT NULL DEFAULT '0',
  `mq3` int(11) NOT NULL DEFAULT '0',
  `mq4` int(11) NOT NULL DEFAULT '0',
  `mq5` int(11) NOT NULL DEFAULT '0',
  `mq6` int(11) NOT NULL DEFAULT '0',
  `mq7` int(11) NOT NULL DEFAULT '0',
  `mq8` int(11) NOT NULL DEFAULT '0',
  `mq9` int(11) NOT NULL DEFAULT '0',
  `mq10` int(11) NOT NULL DEFAULT '0',
  `mq11` int(11) NOT NULL DEFAULT '0',
  `mq12` int(11) NOT NULL DEFAULT '0',
  `mq13` int(11) NOT NULL DEFAULT '0',
  `mq14` int(11) NOT NULL DEFAULT '0',
  `mq15` int(11) NOT NULL DEFAULT '0',
  `mq16` int(11) NOT NULL DEFAULT '0',
  `mq17` int(11) NOT NULL DEFAULT '0',
  `mq18` int(11) NOT NULL DEFAULT '0',
  `mq19` int(11) NOT NULL DEFAULT '0',
  `mq20` int(11) NOT NULL DEFAULT '0',
  `eq1` int(11) NOT NULL DEFAULT '0',
  `eq2` int(11) NOT NULL DEFAULT '0',
  `eq3` int(11) NOT NULL DEFAULT '0',
  `eq4` int(11) NOT NULL DEFAULT '0',
  `eq5` int(11) NOT NULL DEFAULT '0',
  `eq6` int(11) NOT NULL DEFAULT '0',
  `eq7` int(11) NOT NULL DEFAULT '0',
  `eq8` int(11) NOT NULL DEFAULT '0',
  `eq9` int(11) NOT NULL DEFAULT '0',
  `eq10` int(11) NOT NULL DEFAULT '0',
  `eq11` int(11) NOT NULL DEFAULT '0',
  `eq12` int(11) NOT NULL DEFAULT '0',
  `eq13` int(11) NOT NULL DEFAULT '0',
  `eq14` int(11) NOT NULL DEFAULT '0',
  `eq15` int(11) NOT NULL DEFAULT '0',
  `eq16` int(11) NOT NULL DEFAULT '0',
  `eq17` int(11) NOT NULL DEFAULT '0',
  `eq18` int(11) NOT NULL DEFAULT '0',
  `eq19` int(11) NOT NULL DEFAULT '0',
  `eq20` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`course_code`,`faculty_id`,`cono`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `co_status`
--

DROP TABLE IF EXISTS `co_status`;
CREATE TABLE IF NOT EXISTS `co_status` (
  `faculty_id` varchar(8) NOT NULL,
  `course_code` varchar(8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`faculty_id`,`course_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `f_name`, `l_name`, `gender`, `address`, `city`, `state`, `phone`, `email`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(12, 'Chetan', 'Shenai', 'male', 'Priyadarshini', 'mumbai', 'Maharashtra', '34343432', 'chetanshenai9@gmail.com', '1995-06-05', NULL, NULL),
(18, 'bhushan', 'Chhadva', 'male', 'Padmavati', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '1991-06-18', NULL, NULL),
(19, 'Jayant', 'atre', 'male', 'Priyadarshini A102, adwa2', 'wad', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '1998-05-18', NULL, NULL),
(21, 'bhushan', 'sutar', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '2016-11-24', NULL, NULL),
(23, 'Paolo', ' Accorti', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '1992-02-04', NULL, NULL),
(24, 'Roland', ' Mendel', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '2016-11-30', NULL, NULL),
(25, 'John', 'doe', 'male', 'City, view', '', 'Maharashtra', '8875207658', 'john@abc.com', '2017-01-27', NULL, NULL),
(26, 'Maria', 'Anders', 'female', 'New york city', '', 'Maharashtra', '8856705387', 'chetanshenai9@gmail.com', '2017-01-28', NULL, NULL),
(27, 'Ana', ' Trujillo', 'female', 'Street view', '', 'Maharashtra', '9975658478', 'chetanshenai9@gmail.com', '1992-07-16', NULL, NULL),
(28, 'Thomas', 'Hardy', 'male', '120 Hanover Sq', '', 'Maharashtra', '885115323', 'abc@abc.com', '1985-06-24', NULL, NULL),
(29, 'Christina', 'Berglund', 'female', 'Berguvsvägen 8', '', 'Maharashtra', '9985125366', 'chetanshenai9@gmail.com', '1997-02-12', NULL, NULL),
(30, 'Ann', 'Devon', 'male', '35 King George', '', 'Maharashtra', '8865356988', 'abc@abc.com', '1988-02-09', NULL, NULL),
(31, 'Helen', 'Bennett', 'female', 'Garden House Crowther Way', '', 'Maharashtra', '75207654', 'chetanshenai9@gmail.com', '1983-06-15', NULL, NULL),
(32, 'Annette', 'Roulet', 'female', '1 rue Alsace-Lorraine', '', ' ', '3410005687', 'abc@abc.com', '1992-01-13', NULL, NULL),
(33, 'Yoshi', 'Tannamuri', 'male', '1900 Oak St.', '', 'Maharashtra', '8855647899', 'chetanshenai9@gmail.com', '1994-07-28', NULL, NULL),
(34, 'Carlos', 'González', 'male', 'Barquisimeto', '', 'Maharashtra', '9966447554', 'abc@abc.com', '1997-06-24', NULL, NULL),
(35, 'Fran', ' Wilson', 'male', 'Priyadarshini ', '', 'Maharashtra', '5844775565', 'fran@abc.com', '1997-01-27', NULL, NULL),
(36, 'Jean', ' Fresnière', 'female', '43 rue St. Laurent', '', 'Maharashtra', '9975586123', 'chetanshenai9@gmail.com', '2002-01-28', NULL, NULL),
(37, 'Jose', 'Pavarotti', 'male', '187 Suffolk Ln.', '', 'Maharashtra', '875213654', ' Pavarotti@gmail.com', '1997-02-04', NULL, NULL),
(38, 'Palle', 'Ibsen', 'female', 'Smagsløget 45', '', 'Maharashtra', '9975245588', 'Palle@gmail.com', '1991-06-17', NULL, '2018-01-14 17:11:42'),
(39, 'Paula', 'Parente', 'male', 'Rua do Mercado, 12', '', 'Maharashtra', '659984878', 'abc@gmail.com', '1996-02-06', NULL, NULL),
(40, 'Matti', ' Karttunen', 'female', 'Keskuskatu 45', '', 'Maharashtra', '845555125', 'abc@abc.com', '1984-06-19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ete`
--

DROP TABLE IF EXISTS `ete`;
CREATE TABLE IF NOT EXISTS `ete` (
  `roll_no` int(11) NOT NULL,
  `name` text NOT NULL,
  `course_code` varchar(6) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `facultyId` varchar(20) NOT NULL,
  `eq1` int(11) DEFAULT NULL,
  `eq2` int(11) DEFAULT NULL,
  `eq3` int(11) DEFAULT NULL,
  `eq4` int(11) DEFAULT NULL,
  `eq5` int(11) DEFAULT NULL,
  `eq6` int(11) DEFAULT NULL,
  `eq7` int(11) DEFAULT NULL,
  `eq8` int(11) DEFAULT NULL,
  `eq9` int(11) DEFAULT NULL,
  `eq10` int(11) DEFAULT NULL,
  `eq11` int(11) DEFAULT NULL,
  `eq12` int(11) DEFAULT NULL,
  `eq13` int(11) DEFAULT NULL,
  `eq14` int(11) DEFAULT NULL,
  `eq15` int(11) DEFAULT NULL,
  `eq16` int(11) DEFAULT NULL,
  `eq17` int(11) DEFAULT NULL,
  `eq18` int(11) DEFAULT NULL,
  `eq19` int(11) DEFAULT NULL,
  `eq20` int(11) DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`roll_no`,`course_code`,`facultyId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ete_detail`
--

DROP TABLE IF EXISTS `ete_detail`;
CREATE TABLE IF NOT EXISTS `ete_detail` (
  `school` varchar(10) NOT NULL,
  `prog` varchar(10) NOT NULL,
  `sem` varchar(6) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `quiz_no` varchar(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `dirname` varchar(80) NOT NULL,
  `filename` varchar(80) NOT NULL,
  `oldfilename` varchar(50) NOT NULL,
  `time` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mte`
--

DROP TABLE IF EXISTS `mte`;
CREATE TABLE IF NOT EXISTS `mte` (
  `roll_no` int(11) NOT NULL,
  `name` text NOT NULL,
  `course_code` varchar(6) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `facultyId` varchar(20) NOT NULL,
  `mq1` int(11) DEFAULT NULL,
  `mq2` int(11) DEFAULT NULL,
  `mq3` int(11) DEFAULT NULL,
  `mq4` int(11) DEFAULT NULL,
  `mq5` int(11) DEFAULT NULL,
  `mq6` int(11) DEFAULT NULL,
  `mq7` int(11) DEFAULT NULL,
  `mq8` int(11) DEFAULT NULL,
  `mq9` int(11) DEFAULT NULL,
  `mq10` int(11) DEFAULT NULL,
  `mq11` int(11) DEFAULT NULL,
  `mq12` int(11) DEFAULT NULL,
  `mq13` int(11) DEFAULT NULL,
  `mq14` int(11) DEFAULT NULL,
  `mq15` int(11) DEFAULT NULL,
  `mq16` int(11) DEFAULT NULL,
  `mq17` int(11) DEFAULT NULL,
  `mq18` int(11) DEFAULT NULL,
  `mq19` int(11) DEFAULT NULL,
  `mq20` int(11) DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`roll_no`,`course_code`,`facultyId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mte_detail`
--

DROP TABLE IF EXISTS `mte_detail`;
CREATE TABLE IF NOT EXISTS `mte_detail` (
  `school` varchar(10) NOT NULL,
  `prog` varchar(10) NOT NULL,
  `sem` varchar(6) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `quiz_no` varchar(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `dirname` varchar(80) NOT NULL,
  `filename` varchar(80) NOT NULL,
  `oldfilename` varchar(50) NOT NULL,
  `time` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `roll_no` int(11) NOT NULL,
  `name` text NOT NULL,
  `course_code` varchar(6) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `facultyId` varchar(20) NOT NULL,
  `proj_eval1` float DEFAULT NULL,
  `proj_eval2` float DEFAULT NULL,
  `proj_eval3` float DEFAULT NULL,
  `proj_eval4` float DEFAULT NULL,
  `proj_eval5` float DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`roll_no`,`course_code`,`facultyId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_detail`
--

DROP TABLE IF EXISTS `project_detail`;
CREATE TABLE IF NOT EXISTS `project_detail` (
  `school` varchar(10) NOT NULL,
  `prog` varchar(10) NOT NULL,
  `sem` varchar(6) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `project_no` varchar(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `dirname` varchar(80) NOT NULL,
  `filename` varchar(80) NOT NULL,
  `oldfilename` varchar(50) NOT NULL,
  `time` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `roll_no` int(11) NOT NULL,
  `name` text NOT NULL,
  `course_code` varchar(6) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `facultyId` varchar(20) NOT NULL,
  `quiz1` int(11) DEFAULT NULL,
  `quiz2` int(11) DEFAULT NULL,
  `quiz3` int(11) DEFAULT NULL,
  `quiz4` int(11) DEFAULT NULL,
  `quiz5` int(11) DEFAULT NULL,
  `assign1` int(11) DEFAULT NULL,
  `assign2` int(11) DEFAULT NULL,
  `assign3` int(11) DEFAULT NULL,
  `assign4` int(11) DEFAULT NULL,
  `ca` int(11) DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`roll_no`,`course_code`,`facultyId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`roll_no`, `name`, `course_code`, `batch`, `facultyId`, `quiz1`, `quiz2`, `quiz3`, `quiz4`, `quiz5`, `assign1`, `assign2`, `assign3`, `assign4`, `ca`, `updated_on`) VALUES
(2016017812, 'ABCD 1', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017813, 'ABCD 2', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017814, 'ABCD 3', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017815, 'ABCD 4', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017816, 'ABCD 5', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017817, 'ABCD 6', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017818, 'ABCD 7', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017819, 'ABCD 8', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017820, 'ABCD 9', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017821, 'ABCD 10', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017822, 'ABCD 11', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017823, 'ABCD 12', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017824, 'ABCD 13', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017825, 'ABCD 14', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017826, 'ABCD 15', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017827, 'ABCD 16', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017828, 'ABCD 17', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017829, 'ABCD 18', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017830, 'ABCD 19', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017831, 'ABCD 20', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017832, 'ABCD 21', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017833, 'ABCD 22', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017834, 'ABCD 23', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017835, 'ABCD 24', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017836, 'ABCD 25', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017837, 'ABCD 26', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017838, 'ABCD 27', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017839, 'ABCD 28', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017840, 'ABCD 29', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017841, 'ABCD 30', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017842, 'ABCD 31', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017843, 'ABCD 32', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017844, 'ABCD 33', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017845, 'ABCD 34', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:52'),
(2016017846, 'ABCD 35', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:53'),
(2016017847, 'ABCD 36', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:53'),
(2016017848, 'ABCD 37', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:53'),
(2016017849, 'ABCD 38', 'cse100', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2019-04-21 02:51:53'),
(2017000685, 'Ashreeya Pant', 'cse219', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:32:35'),
(2017001398, 'Garvit Chaudhary', 'cse219', 'batch_a', 'anand', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017001754, 'Bipin Karki', 'cse219', 'batch_a', 'anand', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017002162, 'Alok Singh Negi', 'cse219', 'batch_a', 'anand', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017002760, 'Samiullah Ghousi', 'cse219', 'batch_a', 'anand', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017002814, 'Manish 0', 'cse219', 'batch_a', 'anand', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017003305, 'Animesh Chauhan', 'cse219', 'batch_a', 'anand', 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017004597, 'Anshul Vankar', 'cse219', 'batch_a', 'anand', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017004609, 'Gauri Shivhare', 'cse219', 'batch_a', 'anand', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017005136, 'Prateek Aggarwal', 'cse219', 'batch_a', 'anand', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017007144, 'Pratyaksh Soni', 'cse219', 'batch_a', 'anand', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017007524, 'Pratham Bhattrai', 'cse219', 'batch_a', 'anand', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017007631, 'Anupam Bhattarai', 'cse219', 'batch_a', 'anand', 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017008195, 'Anubhav Nandan', 'cse219', 'batch_a', 'anand', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017008213, 'Aditya Singh', 'cse219', 'batch_a', 'anand', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017008235, 'Harsh Chainwala', 'cse219', 'batch_a', 'anand', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017008749, 'Aryan Attri', 'cse219', 'batch_a', 'anand', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017009226, 'Ashutosh Kumar', 'cse219', 'batch_a', 'anand', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017009931, 'Kanchan Sapkota', 'cse219', 'batch_a', 'anand', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017010424, 'Choudhury Md Shahadat Kauser', 'cse219', 'batch_a', 'anand', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017010766, 'Anish Karki', 'cse219', 'batch_a', 'anand', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017010978, 'Ayush Gupta', 'cse219', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017011410, 'Aditya Kumar Singh', 'cse219', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017012497, 'Gagny Diawara', 'cse219', 'batch_a', 'anand', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017013988, 'Ankit 0', 'cse219', 'batch_a', 'anand', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(2017014176, 'Shubham Shukla', 'cse219', 'batch_a', 'anand', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 07:38:59'),
(170101007, 'Abhishek,Rana', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101008, 'Abinash,Senapati', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101020, 'Akshit,Vatsa', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101025, 'Amit,Malik', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101028, 'Anishka,.', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101029, 'Ankaj,Kumar', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101031, 'Ankit,Anand', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101039, 'Anvay,Mall', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101040, 'Apoorva,Goswami', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101045, 'Arpit,Singh', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101048, 'Ashish,Gaurav', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101050, 'Ashish,Poddar', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101055, 'Ashutosh,Kumar Thakur', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101059, 'Atul,Pandey', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101068, 'Ayush,Kumar', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101074, 'Charu,Goyal', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101085, 'Divyansh,Yadav', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101088, 'Ganesh Kumar,Shah', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101094, 'Hardik,Vij', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101097, 'Harsh,Kumar Pal', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101103, 'Himanshu,Upreti', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101104, 'Hrithik,Raunak', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101106, 'Imaduddin,Khoobtar', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101107, 'Jai,Kishan', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101108, 'Janamat Mani,MANI Devkota', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101123, 'Mahesh,Kumar', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101124, 'Manish,Singh', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101126, 'Manish Singh,Bhandari', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101131, 'Md Aklhaque,Ali', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101143, 'Mohit,Madaan', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101157, 'Prajwal,Adhikari', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101159, 'Pranshu,Singh', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101162, 'Pratibha,Chauhan', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101163, 'Prince,Raj', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101167, 'Punya,Bansal', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101171, 'Rishabh,Mishra', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101177, 'Rishabh,Thakur', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101179, 'Ritesh,Gupta', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101180, 'Robin,Singh', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101183, 'S M Kaif,Ali', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101191, 'Samik,Bhushal', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101195, 'Sarthak,Gupta', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101198, 'Satyam,Kaushik', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101202, 'Shabaz,Malik', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101207, 'Shashank,Aditya', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101222, 'Sm Taha,Nizami', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101224, 'Somen,Gupta', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101225, 'Sonu,Kumar Mahto', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101234, 'Suraj,Kumar Sharma', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101249, 'Utkarsh,Raj', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101251, 'Vaibhav,Maheshwari', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101257, 'Vipin,Sharma', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101267, 'Aashirwad,,', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101602, 'Shivendra,Pratap Singh', 'cse121', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 11:59:07'),
(170101007, 'Abhishek,Rana', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:55'),
(170101008, 'Abinash,Senapati', 'cse101', 'batch_a', 'anand', 6, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:55'),
(170101020, 'Akshit,Vatsa', 'cse101', 'batch_a', 'anand', 6, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:55'),
(170101025, 'Amit,Malik', 'cse101', 'batch_a', 'anand', 7, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:55'),
(170101028, 'Anishka,.', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:55'),
(170101029, 'Ankaj,Kumar', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:55'),
(170101031, 'Ankit,Anand', 'cse101', 'batch_a', 'anand', 7, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:55'),
(170101039, 'Anvay,Mall', 'cse101', 'batch_a', 'anand', 8, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:55'),
(170101040, 'Apoorva,Goswami', 'cse101', 'batch_a', 'anand', 7, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:55'),
(170101045, 'Arpit,Singh', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:55'),
(170101048, 'Ashish,Gaurav', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:55'),
(170101050, 'Ashish,Poddar', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101055, 'Ashutosh,Kumar Thakur', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101059, 'Atul,Pandey', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101068, 'Ayush,Kumar', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101074, 'Charu,Goyal', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101085, 'Divyansh,Yadav', 'cse101', 'batch_a', 'anand', 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101088, 'Ganesh Kumar,Shah', 'cse101', 'batch_a', 'anand', 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101094, 'Hardik,Vij', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101097, 'Harsh,Kumar Pal', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101103, 'Himanshu,Upreti', 'cse101', 'batch_a', 'anand', 6, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101104, 'Hrithik,Raunak', 'cse101', 'batch_a', 'anand', 6, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101106, 'Imaduddin,Khoobtar', 'cse101', 'batch_a', 'anand', 7, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101107, 'Jai,Kishan', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101108, 'Janamat Mani,MANI Devkota', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101123, 'Mahesh,Kumar', 'cse101', 'batch_a', 'anand', 7, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101124, 'Manish,Singh', 'cse101', 'batch_a', 'anand', 8, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101126, 'Manish Singh,Bhandari', 'cse101', 'batch_a', 'anand', 7, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101131, 'Md Aklhaque,Ali', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101143, 'Mohit,Madaan', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101157, 'Prajwal,Adhikari', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101159, 'Pranshu,Singh', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101162, 'Pratibha,Chauhan', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101163, 'Prince,Raj', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101167, 'Punya,Bansal', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101171, 'Rishabh,Mishra', 'cse101', 'batch_a', 'anand', 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101177, 'Rishabh,Thakur', 'cse101', 'batch_a', 'anand', 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101179, 'Ritesh,Gupta', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101180, 'Robin,Singh', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101183, 'S M Kaif,Ali', 'cse101', 'batch_a', 'anand', 6, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101191, 'Samik,Bhushal', 'cse101', 'batch_a', 'anand', 6, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101195, 'Sarthak,Gupta', 'cse101', 'batch_a', 'anand', 7, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101198, 'Satyam,Kaushik', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101202, 'Shabaz,Malik', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101207, 'Shashank,Aditya', 'cse101', 'batch_a', 'anand', 7, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101222, 'Sm Taha,Nizami', 'cse101', 'batch_a', 'anand', 8, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101224, 'Somen,Gupta', 'cse101', 'batch_a', 'anand', 7, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101225, 'Sonu,Kumar Mahto', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101234, 'Suraj,Kumar Sharma', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101249, 'Utkarsh,Raj', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101251, 'Vaibhav,Maheshwari', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101257, 'Vipin,Sharma', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101267, 'Aashirwad,,', 'cse101', 'batch_a', 'anand', 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(170101602, 'Shivendra,Pratap Singh', 'cse101', 'batch_a', 'anand', 5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-06 12:03:56'),
(2017011410, 'Aditya Kumar Singh', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017002162, 'Alok Singh Negi', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017003305, 'Animesh Chauhan', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017013991, 'Ankit .', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017004597, 'Anshul Vankar', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017007631, 'Anupam Bhattarai', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017000685, 'Ashreeya Pant', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017009226, 'Ashutosh Kumar', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017010978, 'Ayush Gupta', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017001754, 'Bipin Karki', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017010424, 'Choudhury Md Shahadat Kauser', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017001398, 'Garvit Chaudhary', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017004609, 'Gauri Shivhare', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008235, 'Harsh Chainwala', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017009931, 'Kanchan Sapkota', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008749, 'Aryan Attri', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017005136, 'Prateek Aggarwal', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017007144, 'Pratyaksh Soni', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017012497, 'Gagny Diawara', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008213, 'Aditya Singh', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017010766, 'Anish Karki', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008195, 'Anubhav Nandan', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017002814, 'Manish .', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017007524, 'Pratham Bhattrai', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017002760, 'Samiullah Ghousi', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017014176, 'Shubham Shukla', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017012972, 'Manish Verma', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017011576, 'Mansi Verma', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008855, 'Maryam Mahmood Ur Rahman', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017011875, 'Naveen Bansal', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017013358, 'Neeraj Narang', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017003148, 'Nikita Chauhan', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017011500, 'Paras Gogia', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017003905, 'Pobhu Moinyak', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017011888, 'Puja Kumari', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017003484, 'Rishabh Sharma', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017006101, 'Sabin Khadka', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017004200, 'Sagar Kumar', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017010939, 'Sailesh Rana', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017005060, 'Santosh Khandal', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017009686, 'Saumya Vishnoi', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017002582, 'Shahid Shabir Dar', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017002886, 'Shailendra Kumar Singh', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017007315, 'Shrey Agarwal', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017009808, 'Shubham Sharma', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008248, 'Sruthi Chintalpudi', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017004723, 'Sudhanshu Shekhar', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017002283, 'Suhail Ali', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017001586, 'Syed Atif Alam', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017009286, 'Uttam Kumar Mishra', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017013993, 'Vikas Prateek Mishra', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017007171, 'Vivek Kumar Singh', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017010263, 'Yugaraj Tamang', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017007299, 'Kumari Supriya', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017014575, 'Abhishek Rana', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008600, 'Abinash Senapati', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008793, 'Akshit Vatsa', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017002359, 'Amit Malik', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017005803, 'Anishka .', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017009006, 'Ankaj Kumar', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017015249, 'Ankit Anand', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008542, 'Anvay Mall', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017001881, 'Apoorva Goswami', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017007056, 'Arpit Singh', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017010166, 'Ashish Gaurav', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017009315, 'Ashish Poddar', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017009782, 'Ashutosh Kumar Thakur', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017012849, 'Atul Pandey', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017010792, 'Ayush Kumar', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017011463, 'Charu Goyal', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017005900, 'Divyansh Yadav', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017014963, 'Ganesh Kumar Shah', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008907, 'Hardik Vij', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017004108, 'Harsh Kumar Pal', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008653, 'Himanshu Upreti', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017005644, 'Hrithik Raunak', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017010915, 'Imaduddin Khoobtar', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017014056, 'Jai Kishan', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017012689, 'Janamat Mani Mani Devkota', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017004670, 'Mahesh Kumar', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017007504, 'Manish Singh', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017002770, 'Dhananjay Joshi', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017009906, 'Manish Singh Bhandari', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017012005, 'Md Aklhaque Ali', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017004971, 'Mohit Madaan', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017000921, 'Prajwal Adhikari', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017009840, 'Pranshu Singh', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017010543, 'Pratibha Chauhan', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017004057, 'Prince Raj', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008475, 'Punya Bansal', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017013790, 'Rishabh Mishra', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017002913, 'Rishabh Thakur', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017014114, 'Ritesh Gupta', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017004673, 'Robin Singh', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008252, 'S M Kaif Ali', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017004683, 'Samik Bhushal', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017003135, 'Sarthak Gupta', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017010729, 'Satyam Kaushik', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017012950, 'Shabaz Malik', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017012242, 'Shashank Aditya', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017012684, 'Sm Taha Nizami', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017004688, 'Somen Gupta', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008872, 'Sonu Kumar Mahto', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008936, 'Suraj Kumar Sharma', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008601, 'Utkarsh Raj', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017008322, 'Vaibhav Maheshwari', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017005791, 'Vipin Sharma', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017001039, 'Aashirwad ', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2017012516, 'Shivendra Pratap Singh', 'mca203', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 05:12:20'),
(2016015811, 'Ahmad Baba,Mala', 'cse207', 'batch_a', 'pankaj', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016015977, 'Ahmad Ibrahim,Ahmad', 'cse207', 'batch_a', 'pankaj', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016013313, 'Arpit,Gupta', 'cse207', 'batch_a', 'pankaj', 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016011228, 'Ashren Mohd,Khan', 'cse207', 'batch_a', 'pankaj', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016012717, 'Bipluck,Shrestha', 'cse207', 'batch_a', 'pankaj', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2017012300, 'Blessing,Nengomasha', 'cse207', 'batch_a', 'pankaj', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016014160, 'Deepak Kumar,Sharma', 'cse207', 'batch_a', 'pankaj', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016008132, 'Deepak,Bhandari', 'cse207', 'batch_a', 'pankaj', 6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016010943, 'Deepak,Sharma', 'cse207', 'batch_a', 'pankaj', 6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016013138, 'Divyanshi,Nigam', 'cse207', 'batch_a', 'pankaj', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016004195, 'Divyanshu,Tyagi', 'cse207', 'batch_a', 'pankaj', 6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016008354, 'Grishma Raj,Gautam', 'cse207', 'batch_a', 'pankaj', 7, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016001562, 'Herbert T,Murata', 'cse207', 'batch_a', 'pankaj', 6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016007932, 'Kshitiz,Karki', 'cse207', 'batch_a', 'pankaj', 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016006524, 'Kunal,Passi', 'cse207', 'batch_a', 'pankaj', 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016015789, 'Manisha,Giri', 'cse207', 'batch_a', 'pankaj', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016004329, 'Marufu Chantelle,Paidamoyo', 'cse207', 'batch_a', 'pankaj', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016002668, 'Mayank,Dham', 'cse207', 'batch_a', 'pankaj', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016000601, 'Megbleto Carnel Zinssou,Lordswill', 'cse207', 'batch_a', 'pankaj', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016010646, 'Mohd.,Gulfam', 'cse207', 'batch_a', 'pankaj', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016015269, 'Muhammad Hilal,Abdullahi', 'cse207', 'batch_a', 'pankaj', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016014034, 'Neville Mesu Kashama,Ntumba', 'cse207', 'batch_a', 'pankaj', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016013051, 'Nishu,Verma', 'cse207', 'batch_a', 'pankaj', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016004041, 'Praveen,Bhati', 'cse207', 'batch_a', 'pankaj', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016005358, 'Rajat,Goyal', 'cse207', 'batch_a', 'pankaj', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016014765, 'Rohit,Kumar', 'cse207', 'batch_a', 'pankaj', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016009796, 'Rohit,Yadav', 'cse207', 'batch_a', 'pankaj', 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016007520, 'Roshan,Kumar', 'cse207', 'batch_a', 'pankaj', 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016014502, 'Sahil,Tyagi', 'cse207', 'batch_a', 'pankaj', 6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016016065, 'Said Saleh,Maisallah', 'cse207', 'batch_a', 'pankaj', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016014161, 'Sandeep,Bose', 'cse207', 'batch_a', 'pankaj', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016007148, 'Sandeep,Singh', 'cse207', 'batch_a', 'pankaj', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016005790, 'Sourav,Sharma', 'cse207', 'batch_a', 'pankaj', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016005964, 'Sumit,Singh', 'cse207', 'batch_a', 'pankaj', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016008301, 'Syed,Talib Ahmed', 'cse207', 'batch_a', 'pankaj', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016013018, 'Vaibhav,Sah', 'cse207', 'batch_a', 'pankaj', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016006028, 'Vijaya Kumar,Arvind', 'cse207', 'batch_a', 'pankaj', 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2016012642, 'Vishal,Yadav', 'cse207', 'batch_a', 'pankaj', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-30 08:37:49'),
(2017008749, 'Aryan,Attri', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:03'),
(2017005136, 'Prateek,Aggarwal', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:03'),
(2017007144, 'Pratyaksh,Soni', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017012497, 'Gagny,Diawara', 'cse206', 'batch_a', 'anand', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017008213, 'Aditya,Singh', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017010766, 'Anish,Karki', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017008195, 'Anubhav,Nandan', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017002814, 'Manish', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017007524, 'Pratham,Bhattrai', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017002760, 'Samiullah,Ghousi', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017014176, 'Shubham,Shukla', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017011410, 'Aditya,Kumar Singh', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017002162, 'Alok,Singh Negi', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017003305, 'Animesh,Chauhan', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017013991, 'Ankit,.', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017004597, 'Anshul,Vankar', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017007631, 'Anupam,Bhattarai', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017000685, 'Ashreeya,Pant', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017009226, 'Ashutosh,Kumar', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017010978, 'Ayush,Gupta', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017001754, 'Bipin,Karki', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017010424, 'Choudhury Md Shahadat,Kauser', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017001398, 'Garvit,Chaudhary', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017004609, 'Gauri,Shivhare', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017008235, 'Harsh,Chainwala', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017009931, 'Kanchan,Sapkota', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017011513, 'Low Prakash,Kumar', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017012972, 'Manish,Verma', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017011576, 'Mansi,Verma', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017008855, 'Maryam,Mahmood Ur Rahman', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017011875, 'Naveen,Bansal', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017013358, 'Neeraj,Narang', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017003148, 'Nikita,Chauhan', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017011500, 'Paras,Gogia', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017003905, 'Pobhu,Moinyak', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017011888, 'Puja,Kumari', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017003484, 'Rishabh,Sharma', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017006101, 'Sabin,Khadka', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017004200, 'Sagar,Kumar', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017010939, 'Sailesh,Rana', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04');
INSERT INTO `quiz` (`roll_no`, `name`, `course_code`, `batch`, `facultyId`, `quiz1`, `quiz2`, `quiz3`, `quiz4`, `quiz5`, `assign1`, `assign2`, `assign3`, `assign4`, `ca`, `updated_on`) VALUES
(2017009686, 'Saumya,Vishnoi', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017002582, 'Shahid Shabir,Dar', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017002886, 'Shailendra,Kumar Singh', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017007315, 'Shrey,Agarwal', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017009808, 'Shubham,Sharma', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017008248, 'Sruthi,Chintalpudi', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017004723, 'Sudhanshu,Shekhar', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017002283, 'Suhail,Ali', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017001586, 'Syed Atif,Alam', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017009286, 'Uttam,Kumar Mishra', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017013993, 'Vikas Prateek,Mishra', 'cse206', 'batch_a', 'anand', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017007171, 'Vivek Kumar,Singh', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017010263, 'Yugaraj,Tamang', 'cse206', 'batch_a', 'anand', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31 06:58:04'),
(2017013974, 'Aaditya Gupta Shah', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017014308, 'Abdul Ahad', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017010786, 'Abhishek Anand', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017012748, 'Abhishek Kumar', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017015500, 'Adamya Singh', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017004845, 'Adarsh Pal', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017010899, 'Ahmed Khan', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017010683, 'Aman Singh Rawat', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017008259, 'Amit Kumar Agrawal', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017006023, 'Anmol .', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017006151, 'Anuj Tailwal', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017007218, 'Anupam Alok', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017005986, 'Ashish Kumar Pandey', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017010828, 'Ashish Raj Mahato', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017013573, 'Atif Equbal', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017008688, 'Avinash Kumar Singh', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017009688, 'Avinash Tiwari', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017013205, 'Aviral Bansal', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017005810, 'Bhaskar Jain', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017013267, 'Chetan Singh', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017007422, 'Gaurav Gautam', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017009744, 'Gaurav Tayal', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017010445, 'Harit Nagar', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017007254, 'Hemant Kumar', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017007505, 'Himanshu Sah', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017014731, 'Dilawar Ali', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017008750, 'Deepika Bansal', 'cse000', 'batch_c', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-01 15:37:51'),
(2017013974, 'Aaditya Gupta Shah', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:36'),
(2017014308, 'Abdul Ahad', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:36'),
(2017010786, 'Abhishek Anand', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:36'),
(2017012748, 'Abhishek Kumar', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:36'),
(2017015500, 'Adamya Singh', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:36'),
(2017004845, 'Adarsh Pal', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:36'),
(2017010899, 'Ahmed Khan', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017010683, 'Aman Singh Rawat', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017008259, 'Amit Kumar Agrawal', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017006023, 'Anmol .', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017006151, 'Anuj Tailwal', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017007218, 'Anupam Alok', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017005986, 'Ashish Kumar Pandey', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017010828, 'Ashish Raj Mahato', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017013573, 'Atif Equbal', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017008688, 'Avinash Kumar Singh', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017009688, 'Avinash Tiwari', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017013205, 'Aviral Bansal', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017005810, 'Bhaskar Jain', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017013267, 'Chetan Singh', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017007422, 'Gaurav Gautam', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017009744, 'Gaurav Tayal', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017010445, 'Harit Nagar', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017007254, 'Hemant Kumar', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017007505, 'Himanshu Sah', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017014731, 'Dilawar Ali', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017008750, 'Deepika Bansal', 'qwe123', 'batch_h', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-04 03:44:37'),
(2017008749, 'Aryan,Attri', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:23:59'),
(2017005136, 'Prateek,Aggarwal', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017007144, 'Pratyaksh,Soni', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017012497, 'Gagny,Diawara', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017008213, 'Aditya,Singh', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017010766, 'Anish,Karki', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017008195, 'Anubhav,Nandan', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017002814, 'Manish', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017007524, 'Pratham,Bhattrai', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017002760, 'Samiullah,Ghousi', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017014176, 'Shubham,Shukla', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017011410, 'Aditya,Kumar Singh', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017002162, 'Alok,Singh Negi', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017003305, 'Animesh,Chauhan', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017013991, 'Ankit,.', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017004597, 'Anshul,Vankar', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017007631, 'Anupam,Bhattarai', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017000685, 'Ashreeya,Pant', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017009226, 'Ashutosh,Kumar', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017010978, 'Ayush,Gupta', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017001754, 'Bipin,Karki', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017010424, 'Choudhury Md Shahadat,Kauser', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017001398, 'Garvit,Chaudhary', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017004609, 'Gauri,Shivhare', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017008235, 'Harsh,Chainwala', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017009931, 'Kanchan,Sapkota', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017011513, 'Low Prakash,Kumar', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017012972, 'Manish,Verma', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017011576, 'Mansi,Verma', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017008855, 'Maryam,Mahmood Ur Rahman', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017011875, 'Naveen,Bansal', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017013358, 'Neeraj,Narang', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017003148, 'Nikita,Chauhan', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017011500, 'Paras,Gogia', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017003905, 'Pobhu,Moinyak', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017011888, 'Puja,Kumari', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017003484, 'Rishabh,Sharma', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017006101, 'Sabin,Khadka', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017004200, 'Sagar,Kumar', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017010939, 'Sailesh,Rana', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017009686, 'Saumya,Vishnoi', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017002582, 'Shahid Shabir,Dar', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017002886, 'Shailendra,Kumar Singh', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017007315, 'Shrey,Agarwal', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017009808, 'Shubham,Sharma', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017008248, 'Sruthi,Chintalpudi', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017004723, 'Sudhanshu,Shekhar', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017002283, 'Suhail,Ali', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017001586, 'Syed Atif,Alam', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017009286, 'Uttam,Kumar Mishra', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017013993, 'Vikas Prateek,Mishra', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017007171, 'Vivek Kumar,Singh', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2017010263, 'Yugaraj,Tamang', 'cse207', 'batch_a', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 08:24:00'),
(2016017812, 'XYz1', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017813, 'XYz2', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017814, 'XYz3', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017815, 'XYz4', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017816, 'XYz5', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017817, 'XYz6', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017818, 'XYz7', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017819, 'XYz8', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017820, 'XYz9', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017821, 'XYz10', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017822, 'XYz11', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017823, 'XYz12', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017824, 'XYz13', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017825, 'XYz14', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017826, 'XYz15', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017827, 'XYz16', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017828, 'XYz17', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017829, 'XYz18', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017830, 'XYz19', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017831, 'XYz20', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017832, 'XYz21', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017833, 'XYz22', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017834, 'XYz23', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017835, 'XYz24', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017836, 'XYz25', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017837, 'XYz26', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017838, 'XYz27', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017839, 'XYz28', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017840, 'XYz29', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017841, 'XYz30', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017842, 'XYz31', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017843, 'XYz32', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017844, 'XYz33', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017845, 'XYz34', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017846, 'XYz35', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017847, 'XYz36', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017848, 'XYz37', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(2016017849, 'XYz38', 'cse002', 'batch_f', 'anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 05:50:00'),
(12321, 'abcd1', 'cse219', 'batch_a', 'anand', 8, 8, 8, 8, 0, 8, 0, 5, 5, 8, '2019-06-18 04:28:29'),
(12322, 'abcd2', 'cse219', 'batch_a', 'anand', 1, 1, 1, 1, 0, 1, 0, 3, 3, 1, '2019-06-18 04:28:29'),
(12323, 'abcd3', 'cse219', 'batch_a', 'anand', 1, 1, 1, 1, 9, 1, 9, 4, 4, 1, '2019-06-18 04:28:29'),
(12324, 'abcd4', 'cse219', 'batch_a', 'anand', 5, 5, 5, 5, 3, 5, 3, 15, 15, 5, '2019-06-18 04:28:29'),
(12325, 'abcd5', 'cse219', 'batch_a', 'anand', 10, 10, 10, 10, 1, 10, 1, 7, 7, 10, '2019-06-18 04:28:29'),
(12326, 'abcd6', 'cse219', 'batch_a', 'anand', 3, 3, 3, 3, 7, 3, 7, 17, 17, 3, '2019-06-18 04:28:29'),
(12327, 'abcd7', 'cse219', 'batch_a', 'anand', 3, 3, 3, 3, 6, 3, 6, 14, 14, 3, '2019-06-18 04:28:29'),
(12328, 'abcd8', 'cse219', 'batch_a', 'anand', 5, 5, 5, 5, 14, 5, 14, 12, 12, 5, '2019-06-18 04:28:29'),
(12329, 'abcd9', 'cse219', 'batch_a', 'anand', 9, 9, 9, 9, 3, 9, 3, 4, 4, 9, '2019-06-18 04:28:29'),
(12330, 'abcd10', 'cse219', 'batch_a', 'anand', 0, 0, 0, 0, 5, 0, 5, 20, 20, 0, '2019-06-18 04:28:29'),
(12331, 'abcd11', 'cse219', 'batch_a', 'anand', 2, 2, 2, 2, 3, 2, 3, 11, 11, 2, '2019-06-18 04:28:29'),
(12332, 'abcd12', 'cse219', 'batch_a', 'anand', 2, 2, 2, 2, 5, 2, 5, 19, 19, 2, '2019-06-18 04:28:29'),
(12333, 'abcd13', 'cse219', 'batch_a', 'anand', 2, 2, 2, 2, 13, 2, 13, 17, 17, 2, '2019-06-18 04:28:29'),
(12334, 'abcd14', 'cse219', 'batch_a', 'anand', 5, 5, 5, 5, 8, 5, 8, 9, 9, 5, '2019-06-18 04:28:29'),
(12335, 'abcd15', 'cse219', 'batch_a', 'anand', 6, 6, 6, 6, 1, 6, 1, 9, 9, 6, '2019-06-18 04:28:29'),
(12336, 'abcd16', 'cse219', 'batch_a', 'anand', 10, 10, 10, 10, 10, 10, 10, 16, 16, 10, '2019-06-18 04:28:29'),
(12337, 'abcd17', 'cse219', 'batch_a', 'anand', 9, 9, 9, 9, 7, 9, 7, 8, 8, 9, '2019-06-18 04:28:29'),
(12338, 'abcd18', 'cse219', 'batch_a', 'anand', 0, 0, 0, 0, 13, 0, 13, 11, 11, 0, '2019-06-18 04:28:29'),
(12339, 'abcd19', 'cse219', 'batch_a', 'anand', 10, 10, 10, 10, 2, 10, 2, 3, 3, 10, '2019-06-18 04:28:29'),
(12340, 'abcd20', 'cse219', 'batch_a', 'anand', 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, '2019-06-18 04:28:29'),
(12341, 'abcd21', 'cse219', 'batch_a', 'anand', 0, 0, 0, 0, 9, 0, 9, 11, 11, 0, '2019-06-18 04:28:29'),
(12342, 'abcd22', 'cse219', 'batch_a', 'anand', 8, 8, 8, 8, 8, 8, 8, 10, 10, 8, '2019-06-18 04:28:29'),
(12343, 'abcd23', 'cse219', 'batch_a', 'anand', 0, 0, 0, 0, 2, 0, 2, 7, 7, 0, '2019-06-18 04:28:29'),
(12344, 'abcd24', 'cse219', 'batch_a', 'anand', 7, 7, 7, 7, 2, 7, 2, 14, 14, 7, '2019-06-18 04:28:29'),
(12345, 'abcd25', 'cse219', 'batch_a', 'anand', 9, 9, 9, 9, 9, 9, 9, 17, 17, 9, '2019-06-18 04:28:29'),
(12346, 'abcd26', 'cse219', 'batch_a', 'anand', 3, 3, 3, 3, 11, 3, 11, 11, 11, 3, '2019-06-18 04:28:29'),
(12347, 'abcd27', 'cse219', 'batch_a', 'anand', 10, 10, 10, 10, 6, 10, 6, 17, 17, 10, '2019-06-18 04:28:29'),
(12348, 'abcd28', 'cse219', 'batch_a', 'anand', 9, 9, 9, 9, 5, 9, 5, 8, 8, 9, '2019-06-18 04:28:29'),
(12349, 'abcd29', 'cse219', 'batch_a', 'anand', 4, 4, 4, 4, 1, 4, 1, 11, 11, 4, '2019-06-18 04:28:29'),
(12350, 'abcd30', 'cse219', 'batch_a', 'anand', 8, 8, 8, 8, 7, 8, 7, 5, 5, 8, '2019-06-18 04:28:29'),
(12351, 'abcd31', 'cse219', 'batch_a', 'anand', 4, 4, 4, 4, 7, 4, 7, 16, 16, 4, '2019-06-18 04:28:29'),
(12352, 'abcd32', 'cse219', 'batch_a', 'anand', 3, 3, 3, 3, 15, 3, 15, 8, 8, 3, '2019-06-18 04:28:29'),
(12353, 'abcd33', 'cse219', 'batch_a', 'anand', 1, 1, 1, 1, 15, 1, 15, 12, 12, 1, '2019-06-18 04:28:29'),
(12354, 'abcd34', 'cse219', 'batch_a', 'anand', 10, 10, 10, 10, 2, 10, 2, 1, 1, 10, '2019-06-18 04:28:29'),
(12355, 'abcd35', 'cse219', 'batch_a', 'anand', 0, 0, 0, 0, 2, 0, 2, 10, 10, 0, '2019-06-18 04:28:29'),
(12356, 'abcd36', 'cse219', 'batch_a', 'anand', 5, 5, 5, 5, 2, 5, 2, 8, 8, 5, '2019-06-18 04:28:29'),
(12357, 'abcd37', 'cse219', 'batch_a', 'anand', 7, 7, 7, 7, 4, 7, 4, 6, 6, 7, '2019-06-18 04:28:29'),
(12358, 'abcd38', 'cse219', 'batch_a', 'anand', 6, 6, 6, 6, 4, 6, 4, 8, 8, 6, '2019-06-18 04:28:29'),
(12359, 'abcd39', 'cse219', 'batch_a', 'anand', 6, 6, 6, 6, 3, 6, 3, 6, 6, 6, '2019-06-18 04:28:29'),
(12360, 'abcd40', 'cse219', 'batch_a', 'anand', 0, 0, 0, 0, 11, 0, 11, 6, 6, 0, '2019-06-18 04:28:29'),
(12361, 'abcd41', 'cse219', 'batch_a', 'anand', 10, 10, 10, 10, 15, 10, 15, 2, 2, 10, '2019-06-18 04:28:29'),
(12362, 'abcd42', 'cse219', 'batch_a', 'anand', 5, 5, 5, 5, 13, 5, 13, 5, 5, 5, '2019-06-18 04:28:29'),
(12363, 'abcd43', 'cse219', 'batch_a', 'anand', 2, 2, 2, 2, 12, 2, 12, 11, 11, 2, '2019-06-18 04:28:29'),
(12364, 'abcd44', 'cse219', 'batch_a', 'anand', 7, 7, 7, 7, 6, 7, 6, 7, 7, 7, '2019-06-18 04:28:29'),
(12365, 'abcd45', 'cse219', 'batch_a', 'anand', 0, 0, 0, 0, 11, 0, 11, 9, 9, 0, '2019-06-18 04:28:29'),
(12366, 'abcd46', 'cse219', 'batch_a', 'anand', 5, 5, 5, 5, 3, 5, 3, 16, 16, 5, '2019-06-18 04:28:29'),
(12367, 'abcd47', 'cse219', 'batch_a', 'anand', 1, 1, 1, 1, 15, 1, 15, 9, 9, 1, '2019-06-18 04:28:29'),
(12368, 'abcd48', 'cse219', 'batch_a', 'anand', 2, 2, 2, 2, 0, 2, 0, 3, 3, 2, '2019-06-18 04:28:29'),
(12369, 'abcd49', 'cse219', 'batch_a', 'anand', 8, 8, 8, 8, 10, 8, 10, 10, 10, 8, '2019-06-18 04:28:29'),
(12370, 'abcd50', 'cse219', 'batch_a', 'anand', 10, 10, 10, 10, 0, 10, 0, 12, 12, 10, '2019-06-18 04:28:29'),
(12371, 'abcd51', 'cse219', 'batch_a', 'anand', 4, 4, 4, 4, 11, 4, 11, 14, 14, 4, '2019-06-18 04:28:29'),
(12372, 'abcd52', 'cse219', 'batch_a', 'anand', 4, 4, 4, 4, 1, 4, 1, 16, 16, 4, '2019-06-18 04:28:29'),
(12373, 'abcd53', 'cse219', 'batch_a', 'anand', 7, 7, 7, 7, 9, 7, 9, 9, 9, 7, '2019-06-18 04:28:29'),
(12374, 'abcd54', 'cse219', 'batch_a', 'anand', 4, 4, 4, 4, 8, 4, 8, 9, 9, 4, '2019-06-18 04:28:29'),
(12375, 'abcd55', 'cse219', 'batch_a', 'anand', 3, 3, 3, 3, 0, 3, 0, 9, 9, 3, '2019-06-18 04:28:29'),
(12376, 'abcd56', 'cse219', 'batch_a', 'anand', 9, 9, 9, 9, 15, 9, 15, 16, 16, 9, '2019-06-18 04:28:29'),
(12377, 'abcd57', 'cse219', 'batch_a', 'anand', 0, 0, 0, 0, 10, 0, 10, 15, 15, 0, '2019-06-18 04:28:29'),
(12378, 'abcd58', 'cse219', 'batch_a', 'anand', 10, 10, 10, 10, 2, 10, 2, 2, 2, 10, '2019-06-18 04:28:29'),
(12379, 'abcd59', 'cse219', 'batch_a', 'anand', 9, 9, 9, 9, 12, 9, 12, 7, 7, 9, '2019-06-18 04:28:29'),
(12380, 'abcd60', 'cse219', 'batch_a', 'anand', 9, 9, 9, 9, 12, 9, 12, 5, 5, 9, '2019-06-18 04:28:29'),
(12381, 'abcd61', 'cse219', 'batch_a', 'anand', 4, 4, 4, 4, 6, 4, 6, 6, 6, 4, '2019-06-18 04:28:29'),
(12382, 'abcd62', 'cse219', 'batch_a', 'anand', 10, 10, 10, 10, 11, 10, 11, 14, 14, 10, '2019-06-18 04:28:29'),
(12383, 'abcd63', 'cse219', 'batch_a', 'anand', 1, 1, 1, 1, 9, 1, 9, 13, 13, 1, '2019-06-18 04:28:29'),
(12384, 'abcd64', 'cse219', 'batch_a', 'anand', 8, 8, 8, 8, 2, 8, 2, 5, 5, 8, '2019-06-18 04:28:29'),
(12385, 'abcd65', 'cse219', 'batch_a', 'anand', 9, 9, 9, 9, 11, 9, 11, 12, 12, 9, '2019-06-18 04:28:29'),
(12386, 'abcd66', 'cse219', 'batch_a', 'anand', 10, 10, 10, 10, 0, 10, 0, 12, 12, 10, '2019-06-18 04:28:29'),
(12387, 'abcd67', 'cse219', 'batch_a', 'anand', 5, 5, 5, 5, 8, 5, 8, 11, 11, 5, '2019-06-18 04:28:29'),
(12388, 'abcd68', 'cse219', 'batch_a', 'anand', 3, 3, 3, 3, 4, 3, 4, 16, 16, 3, '2019-06-18 04:28:29'),
(12389, 'abcd69', 'cse219', 'batch_a', 'anand', 2, 2, 2, 2, 5, 2, 5, 3, 3, 2, '2019-06-18 04:28:29'),
(12390, 'abcd70', 'cse219', 'batch_a', 'anand', 1, 1, 1, 1, 10, 1, 10, 11, 11, 1, '2019-06-18 04:28:29'),
(12391, 'abcd71', 'cse219', 'batch_a', 'anand', 1, 1, 1, 1, 15, 1, 15, 11, 11, 1, '2019-06-18 04:28:29'),
(12392, 'abcd72', 'cse219', 'batch_a', 'anand', 3, 3, 3, 3, 10, 3, 10, 10, 10, 3, '2019-06-18 04:28:29'),
(12393, 'abcd73', 'cse219', 'batch_a', 'anand', 6, 6, 6, 6, 10, 6, 10, 14, 14, 6, '2019-06-18 04:28:29'),
(12394, 'abcd74', 'cse219', 'batch_a', 'anand', 0, 0, 0, 0, 3, 0, 3, 1, 1, 0, '2019-06-18 04:28:29'),
(12395, 'abcd75', 'cse219', 'batch_a', 'anand', 7, 7, 7, 7, 3, 7, 3, 17, 17, 7, '2019-06-18 04:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_detail`
--

DROP TABLE IF EXISTS `quiz_detail`;
CREATE TABLE IF NOT EXISTS `quiz_detail` (
  `school` varchar(10) NOT NULL,
  `prog` varchar(10) NOT NULL,
  `sem` varchar(6) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `quiz_no` varchar(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `dirname` varchar(80) NOT NULL,
  `filename` varchar(80) NOT NULL,
  `oldfilename` varchar(50) NOT NULL,
  `time` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `empid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `dept` varchar(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL DEFAULT 'Sharda University',
  `email` varchar(80) NOT NULL,
  `cabin` varchar(6) NOT NULL,
  `intercom` int(8) NOT NULL,
  `website` varchar(100) NOT NULL,
  PRIMARY KEY (`empid`,`university`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`empid`, `name`, `designation`, `qualification`, `dept`, `school`, `university`, `email`, `cabin`, `intercom`, `website`) VALUES
(3428, 'NIDHI SINGH', 'AP', NULL, 'CSE', 'set', 'Sharda University', 'manishverma649@gmail.com', '215', -1, 'www.manishverma.com'),
(1, 'ojaswi', 'prof', NULL, 'cse', 'School of Engineering and technology', 'Sharda University', 'ojas@gmail.com', '215', 22, 'www.ojas.com');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
CREATE TABLE IF NOT EXISTS `school` (
  `University` varchar(100) NOT NULL,
  `school_id` int(11) NOT NULL,
  `school_abr` varchar(10) NOT NULL,
  `school_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

DROP TABLE IF EXISTS `syllabus`;
CREATE TABLE IF NOT EXISTS `syllabus` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` varchar(30) NOT NULL,
  `course_code` varchar(8) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `prerequisite` varchar(300) NOT NULL,
  `lecture` int(11) NOT NULL,
  `tutorial` int(11) NOT NULL,
  `practical` int(11) NOT NULL,
  `unit1` longtext NOT NULL,
  `unit2` longtext NOT NULL,
  `unit3` longtext NOT NULL,
  `unit4` longtext NOT NULL,
  `unit5` longtext NOT NULL,
  `text1` varchar(300) NOT NULL,
  `text2` varchar(300) NOT NULL,
  `text3` varchar(300) NOT NULL,
  `ref1` varchar(300) NOT NULL,
  `ref2` varchar(300) NOT NULL,
  `ref3` varchar(300) NOT NULL,
  PRIMARY KEY (`faculty_id`,`course_code`),
  UNIQUE KEY `sno` (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
