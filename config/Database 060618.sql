-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2018 at 12:00 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `djapp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
CREATE TABLE IF NOT EXISTS `collections` (
  `collection_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The ID of the Collection',
  `collection_name` varchar(30) NOT NULL COMMENT 'The Collection Name',
  `collection_icon` varchar(50) DEFAULT NULL COMMENT 'FontAwesome Icon Code.',
  PRIMARY KEY (`collection_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`collection_id`, `collection_name`, `collection_icon`) VALUES
(1, 'Top 40', ''),
(2, '90s', ''),
(3, '80s', ''),
(4, '70s', ''),
(5, 'Drinks', ''),
(6, 'Smart Things', '');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

DROP TABLE IF EXISTS `crud`;
CREATE TABLE IF NOT EXISTS `crud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `artist` varchar(50) NOT NULL,
  `album` varchar(50) DEFAULT NULL COMMENT 'Song Album',
  `genre` varchar(20) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `collec_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Collection ID',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `name`, `artist`, `album`, `genre`, `year`, `collec_id`, `active`) VALUES
(1, 'Song 1', 'Person C', NULL, 'Pop', 2000, 0, 0),
(2, '22', 'Taylor Swift', 'RED', 'Pop', 2016, 0, 0),
(3, 'Shape Of You', 'Ed Sheeran', NULL, 'Pop', 2015, 1, 0),
(4, 'Whole Lotta Shakin\' Going On', 'Jerry Lee Lewis', NULL, 'Rock', 1958, 1, 0),
(5, 'Tutti Fruiti', 'Little Richard', NULL, 'Rock', 1959, 1, 0),
(6, 'Billie Jean', 'Michael Jackson', 'Thriller', 'Pop', 1981, 3, 0),
(7, 'Don\'t Stop Me Now', 'Queen', NULL, 'Rock', 1984, 3, 0),
(8, 'Something Else', '', NULL, 'Pop', 2002, 3, 0),
(9, 'Hot Stuff', 'Donna Summers', NULL, 'Dance', 1985, 3, 0),
(10, 'Pokemon', 'Someone Important', NULL, 'Pop', 1990, 3, 0),
(11, 'God\'s Plan', 'Drake', NULL, 'RnB', 2018, 1, 0),
(12, 'This is America', 'Childish Gambino', NULL, 'Pop', 2018, 1, 0),
(13, 'I Like It', 'Cardi B, Bad Bunny & J Balvin', NULL, 'Pop', 2018, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

DROP TABLE IF EXISTS `drinks`;
CREATE TABLE IF NOT EXISTS `drinks` (
  `drink_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Drink ID',
  `drink_name` varchar(30) NOT NULL COMMENT 'Drink Name',
  `drink_category` varchar(30) DEFAULT NULL COMMENT 'Drink Category',
  `drink_quantity` int(11) DEFAULT NULL COMMENT 'Drink Quantity',
  `drink_measurement` varchar(20) DEFAULT NULL COMMENT 'Drink Measurement',
  `drink_cost` int(11) DEFAULT NULL COMMENT 'Drink Cost',
  PRIMARY KEY (`drink_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`drink_id`, `drink_name`, `drink_category`, `drink_quantity`, `drink_measurement`, `drink_cost`) VALUES
(1, 'Fosters', 'Lager', 1, 'Pint', 3);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_s_name` varchar(50) DEFAULT NULL,
  `request_s_artist` varchar(50) NOT NULL,
  `request_s_album` varchar(50) DEFAULT NULL,
  `request_s_genre` varchar(15) NOT NULL,
  `request_active` tinyint(1) NOT NULL DEFAULT '1',
  `request_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `request_s_name`, `request_s_artist`, `request_s_album`, `request_s_genre`, `request_active`, `request_time`) VALUES
(1, '22', 'Taylor Swift', 'RED', 'Pop', 0, '2018-05-24 14:31:40'),
(2, 'Song 1', 'Person C', NULL, 'Pop', 1, '2018-06-05 17:22:48'),
(5, 'Tutti Fruiti', 'Little Richard', NULL, 'Rock', 1, '2018-06-05 17:47:20'),
(4, 'Shape Of You', 'Ed Sheeran', NULL, 'Pop', 1, '2018-06-05 17:27:46'),
(6, 'Hot Stuff', 'Donna Summers', NULL, 'Dance', 1, '2018-06-05 17:51:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
