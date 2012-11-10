-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: us01-user01.crtks9njytxu.us-east-1.rds.amazonaws.com
-- Generation Time: Nov 10, 2012 at 10:36 PM
-- Server version: 5.5.8-log
-- PHP Version: 5.3.10-1ubuntu3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `d8fa082c41a004a98804199d41495603f`
--
CREATE DATABASE `d8fa082c41a004a98804199d41495603f` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `d8fa082c41a004a98804199d41495603f`;

-- --------------------------------------------------------

--
-- Table structure for table `boxwh`
--

CREATE TABLE IF NOT EXISTS `boxwh` (
  `boxid` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse` int(11) NOT NULL,
  PRIMARY KEY (`boxid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=104 ;

--
-- Dumping data for table `boxwh`
--

INSERT INTO `boxwh` (`boxid`, `warehouse`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 2),
(9, 2),
(10, 1),
(11, 2),
(12, 1),
(13, 1),
(14, 1),
(15, 2),
(16, 1),
(17, 2),
(18, 1),
(19, 2),
(20, 2),
(21, 1),
(22, 1),
(23, 2),
(24, 2),
(25, 1),
(26, 2),
(27, 1),
(28, 2),
(29, 1),
(30, 2),
(31, 1),
(32, 2),
(33, 1),
(34, 2),
(35, 2),
(36, 2),
(37, 1),
(38, 2),
(39, 2),
(40, 1),
(41, 1),
(42, 2),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 2),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 2),
(56, 1),
(57, 1),
(58, 1),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 1),
(64, 2),
(65, 2),
(66, 1),
(67, 1),
(68, 2),
(69, 2),
(70, 1),
(71, 2),
(72, 1),
(73, 2),
(74, 1),
(75, 2),
(76, 1),
(77, 1),
(78, 2),
(79, 1),
(80, 2),
(81, 2),
(82, 1),
(83, 1),
(84, 2),
(85, 2),
(86, 1),
(87, 1),
(88, 2),
(89, 1),
(90, 2),
(91, 1),
(92, 1),
(93, 2),
(94, 1),
(95, 2),
(96, 2),
(97, 1),
(98, 2),
(99, 1),
(100, 1),
(101, 2),
(102, 2),
(103, 1);

-- --------------------------------------------------------

--
-- Table structure for table `edata`
--

CREATE TABLE IF NOT EXISTS `edata` (
  `ekey` int(11) NOT NULL AUTO_INCREMENT,
  `eval` varchar(30) NOT NULL,
  `enum` int(11) NOT NULL,
  PRIMARY KEY (`ekey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `edata`
--

INSERT INTO `edata` (`ekey`, `eval`, `enum`) VALUES
(1, 'asd', 123),
(2, 'fdg', 453),
(3, 'fgs', 432),
(4, 'hfaa', 47),
(5, 'qwe', 85),
(6, 'sdf', 374);

-- --------------------------------------------------------

--
-- Table structure for table `navigate`
--

CREATE TABLE IF NOT EXISTS `navigate` (
  `location` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `destination` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `instruction` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `navigate`
--

INSERT INTO `navigate` (`location`, `destination`, `instruction`) VALUES
('rack1', 'rack10', 'walk ten steps straight'),
('rack2', 'rack20', 'walk 10 steps straight, take a right, and walk 20 steps '),
('rack3', 'rack30', 'take a right, walk to the elevator, get on the second floor, rack is to immediate right');

-- --------------------------------------------------------

--
-- Table structure for table `rth_volunteer`
--

CREATE TABLE IF NOT EXISTS `rth_volunteer` (
  `volunteerID` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `volunteerName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_Reg` date NOT NULL,
  `Address` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cellNumber` int(10) NOT NULL,
  `hours` int(11) NOT NULL,
  PRIMARY KEY (`volunteerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `boxid` int(11) NOT NULL,
  `expiry` date NOT NULL,
  `depositdate` date NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=206 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `source`, `qty`, `type`, `boxid`, `expiry`, `depositdate`) VALUES
(101, 'Cassidy', 10, 'Dough', 50, '2012-12-31', '2012-11-03'),
(102, 'Aiko', 68, 'Dairy', 94, '2013-03-26', '2012-11-03'),
(103, 'Stephanie', 2, 'Vegetables', 70, '2013-01-26', '2012-11-02'),
(104, 'Keaton', 19, 'Bread', 52, '2013-11-11', '2012-11-09'),
(105, 'Beatrice', 43, 'Cake', 86, '2013-06-20', '2012-11-03'),
(106, 'Travis', 85, 'Cake', 56, '2014-05-29', '2012-11-09'),
(107, 'Alexandra', 56, 'Bread', 60, '2013-09-04', '2012-11-09'),
(108, 'Bradley', 23, 'Pizza', 42, '2013-09-14', '2012-11-05'),
(109, 'Cedric', 88, 'Deli', 56, '2014-02-12', '2012-11-07'),
(110, 'Dillon', 86, 'Eggs', 38, '2013-09-29', '2012-11-03'),
(111, 'Ivana', 90, 'Fruit', 60, '2013-07-24', '2012-11-04'),
(112, 'Thane', 14, 'Fruit', 47, '2013-05-23', '2012-10-31'),
(113, 'Jemima', 97, 'Eggs', 15, '2014-01-04', '2012-11-01'),
(114, 'Susan', 44, 'Vegetables', 85, '2013-12-25', '2012-11-08'),
(115, 'Tanek', 48, 'Pantry', 96, '2013-10-21', '2012-11-05'),
(116, 'Hope', 37, 'Dairy', 43, '2013-05-11', '2012-11-02'),
(117, 'Donna', 14, 'Deli', 42, '2014-01-19', '2012-11-01'),
(118, 'Carly', 26, 'Pantry', 50, '2014-03-20', '2012-10-31'),
(119, 'Shay', 69, 'Deli', 99, '2013-11-11', '2012-11-08'),
(120, 'Julian', 48, 'Canned', 89, '2013-10-24', '2012-11-05'),
(121, 'Dalton', 26, 'Vegetables', 17, '2013-02-28', '2012-11-02'),
(122, 'Lev', 82, 'Dairy', 24, '2013-07-15', '2012-10-31'),
(123, 'Pandora', 83, 'Eggs', 21, '2014-02-10', '2012-11-03'),
(124, 'Murphy', 43, 'Soup', 94, '2013-12-14', '2012-10-30'),
(125, 'Willow', 34, 'Canned', 1, '2014-03-16', '2012-11-09'),
(126, 'Martena', 93, 'Pie', 86, '2012-11-15', '2012-11-07'),
(127, 'Orson', 96, 'Poultry', 35, '2013-04-07', '2012-11-08'),
(128, 'Brynn', 93, 'Pantry', 97, '2013-09-22', '2012-11-01'),
(129, 'Neville', 4, 'Dough', 64, '2014-04-05', '2012-11-08'),
(130, 'Brenna', 34, 'Canned', 49, '2014-03-18', '2012-11-08'),
(131, 'Shannon', 1, 'Vegetables', 8, '2013-09-19', '2012-10-30'),
(132, 'Dahlia', 64, 'Poultry', 62, '2013-02-12', '2012-11-04'),
(133, 'Merrill', 30, 'Pie', 16, '2013-09-28', '2012-11-07'),
(134, 'Violet', 30, 'Pie', 72, '2013-12-06', '2012-11-05'),
(135, 'Beck', 58, 'Pie', 33, '2013-02-07', '2012-11-08'),
(136, 'Briar', 8, 'Eggs', 78, '2014-03-18', '2012-11-06'),
(137, 'Josephine', 57, 'Vegetables', 71, '2013-10-19', '2012-11-04'),
(138, 'Joel', 6, 'Cookie', 55, '2013-09-18', '2012-10-30'),
(139, 'Morgan', 53, 'Canned', 32, '2014-05-08', '2012-11-06'),
(140, 'Joan', 93, 'Eggs', 25, '2013-01-10', '2012-10-30'),
(141, 'Quintessa', 86, 'Meat', 50, '2013-03-07', '2012-11-03'),
(142, 'Grace', 60, 'Soup', 1, '2013-09-29', '2012-11-04'),
(143, 'Gregory', 24, 'Meat', 90, '2014-03-29', '2012-11-03'),
(144, 'Chelsea', 31, 'Pantry', 88, '2013-11-03', '2012-11-04'),
(145, 'Robin', 54, 'Vegetables', 41, '2013-01-09', '2012-11-02'),
(146, 'Quon', 50, 'Poultry', 5, '2013-10-12', '2012-11-03'),
(147, 'Hashim', 37, 'Cookie', 10, '2013-02-21', '2012-10-30'),
(148, 'Adrienne', 73, 'Soup', 64, '2013-01-13', '2012-11-06'),
(149, 'Naomi', 48, 'Pie', 73, '2013-11-04', '2012-11-02'),
(150, 'Roth', 66, 'Poultry', 80, '2013-07-26', '2012-11-07'),
(151, 'Adara', 71, 'Soup', 19, '2012-11-10', '2012-11-02'),
(152, 'Alec', 33, 'Dough', 81, '2013-06-10', '2012-11-05'),
(153, 'Clare', 90, 'Deli', 57, '2013-01-21', '2012-11-09'),
(154, 'Arden', 43, 'Fruit', 5, '2012-12-27', '2012-11-01'),
(155, 'Logan', 11, 'Canned', 58, '2014-02-26', '2012-11-08'),
(156, 'Cynthia', 34, 'Dairy', 38, '2013-01-12', '2012-11-08'),
(157, 'Philip', 23, 'Dough', 92, '2013-11-23', '2012-11-01'),
(158, 'Keelie', 74, 'Pantry', 100, '2014-03-23', '2012-11-02'),
(159, 'Xander', 12, 'Pizza', 42, '2013-10-04', '2012-11-04'),
(160, 'Odysseus', 13, 'Deli', 13, '2014-03-12', '2012-10-30'),
(161, 'Jenna', 37, 'Pie', 71, '2014-04-23', '2012-11-05'),
(162, 'Halla', 87, 'Cake', 20, '2013-10-09', '2012-11-03'),
(163, 'Jameson', 31, 'Eggs', 53, '2013-12-22', '2012-10-30'),
(164, 'Cairo', 28, 'Dairy', 79, '2013-10-17', '2012-11-08'),
(165, 'Lamar', 25, 'Cake', 27, '2014-03-03', '2012-11-06'),
(166, 'Keith', 71, 'Bread', 39, '2013-10-31', '2012-11-08'),
(167, 'Ulysses', 54, 'Poultry', 8, '2013-09-01', '2012-10-31'),
(168, 'Jacob', 55, 'Pantry', 25, '2012-12-12', '2012-11-09'),
(169, 'Alana', 31, 'Cake', 0, '2014-05-15', '2012-11-06'),
(170, 'Wylie', 44, 'Pantry', 8, '2013-10-26', '2012-11-08'),
(171, 'Violet', 94, 'Meat', 99, '2014-03-30', '2012-11-05'),
(172, 'Wayne', 63, 'Deli', 37, '2014-05-07', '2012-11-08'),
(173, 'Dillon', 69, 'Cookie', 67, '2013-01-05', '2012-10-30'),
(174, 'Hall', 79, 'Deli', 41, '2014-04-17', '2012-11-04'),
(175, 'Vivien', 41, 'Pizza', 30, '2013-05-15', '2012-11-06'),
(176, 'Chadwick', 48, 'Canned', 61, '2013-08-18', '2012-11-05'),
(177, 'Elaine', 48, 'Eggs', 60, '2012-11-26', '2012-11-09'),
(178, 'Yuri', 80, 'Cookie', 82, '2013-07-19', '2012-11-04'),
(179, 'Venus', 87, 'Cake', 20, '2013-12-13', '2012-10-31'),
(180, 'Carissa', 6, 'Pantry', 42, '2013-08-16', '2012-11-02'),
(181, 'Faith', 97, 'Meat', 19, '2013-04-15', '2012-11-06'),
(182, 'Hilel', 54, 'Pizza', 44, '2013-05-29', '2012-11-01'),
(183, 'Kylie', 68, 'Bread', 34, '2013-10-02', '2012-11-03'),
(184, 'Hamish', 61, 'Eggs', 12, '2013-11-02', '2012-10-30'),
(185, 'Kim', 39, 'Eggs', 29, '2014-04-14', '2012-11-06'),
(186, 'Herman', 95, 'Eggs', 15, '2013-05-04', '2012-10-30'),
(187, 'Danielle', 8, 'Meat', 58, '2014-05-26', '2012-11-09'),
(188, 'Stephanie', 42, 'Pie', 67, '2013-07-29', '2012-10-31'),
(189, 'Lynn', 75, 'Pie', 88, '2014-02-26', '2012-11-03'),
(190, 'Grady', 81, 'Deli', 82, '2014-04-18', '2012-11-09'),
(191, 'Jasper', 82, 'Dough', 97, '2012-12-28', '2012-11-02'),
(192, 'Gwendolyn', 79, 'Soup', 14, '2013-04-06', '2012-10-31'),
(193, 'Clio', 9, 'Dairy', 55, '2014-03-19', '2012-11-05'),
(194, 'Azalia', 46, 'Meat', 81, '2014-04-29', '2012-11-05'),
(195, 'Lucy', 6, 'Vegetables', 77, '2014-04-25', '2012-11-01'),
(196, 'Raymond', 80, 'Fruit', 64, '2012-11-19', '2012-11-08'),
(197, 'Brooke', 50, 'Cookie', 85, '2014-05-09', '2012-11-06'),
(198, 'Reagan', 66, 'Pizza', 67, '2013-04-26', '2012-11-04'),
(199, 'Carl', 10, 'Cookie', 67, '2013-08-02', '2012-11-01'),
(200, 'Ariana', 47, 'Dough', 63, '2012-11-14', '2012-11-08'),
(201, 'Walmart', 58, 'Meat', 98, '2013-11-10', '2012-11-08'),
(202, 'Target', 75, 'Vegetables', 79, '2013-01-02', '2012-11-02'),
(203, 'Tom Thumb', 25, 'Fruit', 101, '2012-12-12', '2012-10-11'),
(204, 'Sprouts', 36, 'Vegetables', 102, '2012-12-21', '2012-11-10'),
(205, 'Sprouts', 59, 'Poultry', 103, '2012-12-12', '2012-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `type-nutrition`
--

CREATE TABLE IF NOT EXISTS `type-nutrition` (
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `calorie` int(11) NOT NULL,
  `carb` int(11) NOT NULL,
  `fat` int(11) NOT NULL,
  `protein` int(11) NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type-nutrition`
--

INSERT INTO `type-nutrition` (`type`, `calorie`, `carb`, `fat`, `protein`) VALUES
('Bread', 60, 205, 111, 132),
('Cake', 257, 38, 151, 1),
('Canned', 229, 256, 109, 139),
('Cookie', 39, 76, 32, 96),
('Dairy', 84, 237, 187, 22),
('Deli', 10, 254, 139, 1),
('Dough', 286, 264, 187, 70),
('Eggs', 238, 169, 75, 259),
('Fruit', 158, 167, 175, 225),
('Meat', 236, 175, 48, 55),
('Pantry', 143, 193, 179, 234),
('Pie', 17, 147, 33, 62),
('Pizza', 157, 265, 98, 24),
('Poultry', 55, 137, 31, 95),
('Soup', 5, 164, 12, 76),
('Vegetables', 113, 190, 3, 221);

-- --------------------------------------------------------

--
-- Table structure for table `type-storage`
--

CREATE TABLE IF NOT EXISTS `type-storage` (
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `storage` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type-storage`
--

INSERT INTO `type-storage` (`type`, `storage`) VALUES
('Bread', 'Dry'),
('Cake', 'Refrigirated'),
('Canned', 'Refrigirated'),
('Cookie', 'Refrigirated'),
('Dairy', 'Dry'),
('Deli', 'Refrigirated'),
('Dough', 'Refrigirated'),
('Eggs', 'Refrigirated'),
('Fruit', 'Refrigirated'),
('Meat', 'Freezer'),
('Pantry', 'Refrigirated'),
('Pie', 'Dry'),
('Pizza', 'Freezer'),
('Poultry', 'Freezer'),
('Soup', 'Refrigirated'),
('Vegetables', 'Refrigirated');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer-pref`
--

CREATE TABLE IF NOT EXISTS `volunteer-pref` (
  `volunteerID` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `preferredDate` date NOT NULL,
  `acknowledgment` tinyint(1) NOT NULL,
  PRIMARY KEY (`volunteerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
