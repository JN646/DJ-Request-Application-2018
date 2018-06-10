-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 10, 2018 at 04:40 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`collection_id`, `collection_name`, `collection_icon`) VALUES
(1, 'Top 40', ''),
(2, '90s', ''),
(3, '80s', ''),
(4, '70s', '');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

DROP TABLE IF EXISTS `crud`;
CREATE TABLE IF NOT EXISTS `crud` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Song ID',
  `name` varchar(100) NOT NULL COMMENT 'Song Name',
  `artist` varchar(100) NOT NULL COMMENT 'Song Artist',
  `album` varchar(100) DEFAULT NULL COMMENT 'Song Album',
  `genre` varchar(20) DEFAULT NULL COMMENT 'Song Genre',
  `year` int(4) DEFAULT NULL COMMENT 'Song Year',
  `collec_id` int(11) DEFAULT '0' COMMENT 'Collection ID',
  `active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Is Song Active?',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `name`, `artist`, `album`, `genre`, `year`, `collec_id`, `active`) VALUES
(1, 'Test', 'Test', 'Test', 'Pop', 2005, 3, 0),
(2, 'Soul Deep', 'The Box Tops', 'Dimensions', '', 1969, 1, 0),
(3, 'Amor De Cabaret', 'Sonora Santanera', 'Las Numero 1 De La Sonora Santanera', 'Pop', 0, 1, 0),
(4, 'Something Girls', 'Adam Ant', 'Friend Or Foe', '', 1982, 1, 0),
(5, 'Face the Ashes', 'Gob', 'Muertos Vivos', '', 27, 1, 0),
(6, 'The Moon And I (Ordinary Day Album Version)', 'Jeff And Sheri Easter', 'Ordinary Day', '', 0, 2, 0),
(7, 'Keepin It Real (Skit)', 'Rated R', 'Da Ghetto Psychic', '', 0, 2, 0),
(8, 'Drop of Rain', 'Tweeterfriendly Music', 'Gin & Phonic', '', 0, 3, 0),
(9, 'Pink World', 'Planet P Project', 'Pink World', '', 1984, 3, 0),
(10, 'Insatiable (Instrumental Version)', 'Clp', 'Superinstrumental', '', 0, 0, 0),
(11, 'Young Boy Blues', 'JennyAnyKind', 'I Need You', '', 0, 0, 0),
(12, 'The Urgency (LP Version)', 'Wayne Watson', 'The Way Home', '', 0, 0, 0),
(13, 'La Culpa', 'Andy Andy', 'Placer & Castigo', '', 0, 0, 0),
(14, 'Auguri Cha Cha', 'Bob Azzam', 'Arrivederci', '', 0, 0, 0),
(15, 'Tonight Will Be Alright', 'Lionel Richie', 'Dancing On The Ceiling', '', 1986, 0, 0),
(16, 'Floating', 'Blue Rodeo', 'Outskirts', '', 1987, 0, 0),
(17, 'High Tide', 'Richard Souther', 'Cross Currents', '', 0, 0, 0),
(18, 'Sohna Nee Sohna Data', 'Faiz Ali Faiz', 'Panjtan Ka Ghulam', '', 0, 0, 0),
(19, 'Caught In A Dream', 'Tesla', 'Gold', '', 24, 0, 0),
(20, 'Synthetic Dream', 'lextrical', 'Whatever Happened To Boredom?', '', 0, 0, 0),
(21, 'Broken-Down Merry-Go-Round', 'Jimmy Wakely', '1942-1952 Jimmy Wakely', '', 0, 0, 0),
(22, 'Kassie Jones', 'Alice Stuart', 'All The Good Times', '', 0, 0, 0),
(23, 'Setanta matins', 'Elena', 'Un cafe_ setanta matins', '', 0, 0, 0),
(24, 'Setting Fire to Sleeping Giants', 'The Dillinger Escape Plan', 'Miss Machine', '', 24, 0, 0),
(25, 'James (Hold The Ladder Steady)', 'SUE THOMPSON', 'Sue Thompson - Her Very Best', '', 1985, 0, 0),
(26, 'Made Like This (Live)', 'Five Bolt Main', 'Live', '', 0, 0, 0),
(27, 'Superconfidential', 'Clp', 'Strictly Confidential', '', 0, 0, 0),
(28, 'I Think My Wife Is Running Around On Me (Taco Hell)', 'Tim Wilson', 'The Real Twang Thang', '', 25, 0, 0),
(29, 'Spanish Grease', 'Willie Bobo', 'Willie Bobo\'s Finest Hour', '', 1997, 0, 0),
(30, 'Crazy Mixed Up World', 'Faye Adams', 'Shake A Hand', '', 1961, 0, 0),
(31, 'Do You Finally Need A Friend', 'Terry Callier', 'Occasional Rain', '', 1972, 0, 0),
(32, 'The Emperor Falls', 'John Wesley', 'The Emperor Falls', '', 0, 0, 0),
(33, 'Twist and Shout', 'The Shangri-Las', 'Best of The Shangri-Las', '', 1964, 0, 0),
(34, 'It Makes No Difference Now', 'Billie Jo Spears', '20 Of Her Best', '', 1992, 0, 0),
(35, 'Laws Patrolling (Album Version)', 'Mike Jones (Featuring CJ_ Mello & Lil\' Bran)', 'Who Is Mike Jones?', '', 0, 0, 0),
(36, 'A?DA3nde va Chichi?', 'Sierra Maestra', 'Tibiri Tabara', 'Pop', 1997, 0, 0),
(37, 'Barking Dogs', 'Butthole Surfers', 'Piouhgd + Widowermaker!', 'Pop', 0, 0, 0),
(38, 'OUTE ENA EFHARISTO', 'Despina Vandi', 'Profities', '', 0, 0, 0),
(39, 'Midnight Swim', 'Javier Navarrete', 'Cracks', '', 0, 0, 0),
(40, 'In A Subtle Way', 'Jacob Young', 'Pieces Of Time', '', 0, 0, 0),
(41, 'Spin', 'Scarlet\'s Remains', 'The Palest Grey', '', 27, 0, 0),
(42, 'Burning In The Aftermath', 'The Suicide Machines', 'A Match & Some Gasoline', '', 23, 0, 0),
(43, 'Angie (1993 Digital Remaster)', 'The Rolling Stones', 'Jump Back - The Best Of The Rolling Stones', 'Rock', 1993, 3, 0),
(44, 'Sabor Guajiro', 'Roberto Torres', 'Lo Mejor con La Orq. Broadway', '', 0, 0, 0),
(45, 'Human Cannonball', 'Loudon Wainwright III', 'Grown Man', '', 1995, 0, 0),
(46, 'Glory Be', 'R.L. Burnside', 'A Bothered Mind', '', 24, 0, 0),
(47, 'Crossfire', 'Stevie Ray Vaughan', 'Greatest Hits', '', 1992, 0, 0),
(48, 'I Can\'t Be Satisfied', 'John Hammond', 'Bluesman', '', 22, 0, 0),
(49, 'Nashville Parthenon', 'Casiotone For The Painfully Alone', 'Etiquette', '', 26, 0, 0),
(50, 'Cocain Ducks', 'Ec8or', 'Ec8or', '', 1995, 0, 0),
(51, 'Human Being', 'The New York Dolls', 'Too Much Too Soon', '', 1974, 0, 0),
(52, 'The More I See You', 'Eliane Elias', 'Bossa Nova Stories', '', 29, 0, 0),
(53, 'Certain Things We Do', 'Lost Boyz', 'Love_ Peace & Nappiness', '', 1997, 0, 0),
(54, 'Forming', 'The Germs', 'Germicide', '', 1977, 0, 0),
(55, 'MafuA!', 'Yamandu Costa', 'MafuA!', '', 0, 0, 0),
(56, 'Driving Home For Christmas', 'Chris Rea', 'The Road To Hell Part 2', '', 1986, 0, 0),
(57, 'Spooks In Space', 'Perrey And Kingsley', 'Vanguard Visionaries', '', 1966, 0, 0),
(58, 'Tous Les GarASSons Et Les Filles', 'Eurythmics', 'Be Yourself Tonight', '', 1985, 0, 0),
(59, 'Too Much Saturn', 'Francis Dunnery', 'Hometown 2001', '', 1995, 0, 0),
(60, 'Movement 4 [from Kiss] (Album Version)', 'John Cale', 'Eat / Kiss: Music For The Films By Andy Warhol', '', 1997, 0, 0),
(61, 'Stream', 'Suzanne Ciani', 'The Ultimate Most Relaxing New Age Piano in the Universe', '', 0, 0, 0),
(62, 'Make Me Over', 'Vickie Winans', 'Classic Gold: Best of All', '', 0, 0, 0),
(63, 'Deform (live)', 'The Berzerker', 'The Berzerker', '', 2, 0, 0),
(64, 'Wicker Chair', 'Kings Of Leon', 'Holy Roller Novocaine', '', 23, 0, 0),
(65, 'An ti chans\'', 'Edith Lefel', 'Jeux de dames_ vol. 1 (rA(c)alisation Ronald Rubinel)', '', 0, 0, 0),
(66, 'I Will Love Again (JJ\'s Club Radio)', 'Taras', 'I Will Love Again', '', 0, 0, 0),
(67, 'Stickin In My Eye', 'NOFX', 'White Trash ......', '', 1992, 0, 0),
(68, 'Ota kiinni', 'Murskahumppa', 'Murskapunkkia', '', 0, 0, 0),
(69, 'Entre CanAbales', 'Soda Stereo', 'CanciA3n Animal', '', 199, 0, 0),
(70, 'Rosemary Recalls', 'Bruce Rowland', 'The Man from Snowy River', '', 1985, 0, 0),
(71, 'Sudanese Dance', 'Xcultures', 'One World One People', '', 2, 0, 0),
(72, 'Where The Thunder Roars (Tales Of Wonder Album Version)', 'White Heart', 'Tales Of Wonder', '', 0, 0, 0),
(73, 'Wanna Be A Player', 'Heavy D / McGruff', 'Waterbed Hev', '', 1997, 0, 0),
(74, 'Panama (Remastered Album Version)', 'Van Halen', 'The Best Of Both Worlds', '', 0, 0, 0),
(75, 'Let\'s Get It Started', 'Black Eyed Peas', 'Total Workout Running 102 - 135 - 84bpm Ideal For Jogging_ Running_ Treadmill & General Fitness', '', 24, 0, 0),
(76, 'Metal', 'Nine Inch Nails', 'Things Falling Apart', 'Rock', 2, 0, 0),
(77, 'She Fell Away (2009 Digital Remaster)', 'Nick Cave & The Bad Seeds', 'Your Funeral... My Trial (2009 Digital Remaster)', '', 0, 0, 0),
(78, 'Next Time', 'Nadine Renee', 'Oasis of Love', '', 0, 0, 0),
(79, 'It\'s My Party', 'Lesley Gore', '60\'s Triple set', '', 1963, 0, 0),
(80, 'Complicate It', 'Smartbomb', 'Yeah.  Well_ Anyway....', '', 21, 0, 0),
(81, 'Monde De Fou', 'Suburbs', 'Un Titre de Toune', '', 25, 0, 0),
(82, 'Opus a Satana (Part 2)', 'Emperor', 'Live Inferno', '', 0, 0, 0),
(83, 'This Melody (Live)', 'Julien Clerc', 'Vendredi 13 - 1981', '', 0, 0, 0),
(84, 'I\'m Gone This Time', 'Glen Campbell', 'Unconditional Love', '', 0, 0, 0),
(85, 'You Feel Good All Over', 'T.G. Sheppard', 'The Very Best Of', '', 22, 0, 0),
(86, 'Indian Love Call', 'Slim Whitman', 'Country Lovers. Vol. 3', '', 199, 0, 0),
(87, 'You Can Still Be Free', 'Savage Garden', 'Affirmation', '', 1999, 0, 0),
(88, 'I Never Came', 'Queens Of The Stone Age', 'Lullabies To Paralyze', 'Rock', 25, 0, 0),
(89, 'Dixie', 'Hank Penny & The Lincoln Penny Orchestra', 'It\'s War Again', '', 0, 0, 0),
(90, 'Commercial Reign', 'Inspiral Carpets', 'The Singles', '', 199, 0, 0),
(91, 'Hourglass', 'Borialis', 'What You Thought You Heard', '', 0, 0, 0),
(92, 'Wake', 'The Dirty Skirts', 'Daddy Don\'t Disco', '', 0, 0, 0),
(93, 'Caricia Y Herida', 'Flor Silvestre', '15 Exitos Vol. 2 Flor Silvestre', '', 0, 0, 0),
(94, 'Le tortillard', 'BA(c)zu', 'Le top du pA\"re NAPel', '', 0, 0, 0),
(95, 'WKYA (drop)', 'Redman', 'Malpractice', '', 21, 0, 0),
(96, 'TerA$?slintu', 'Solistiyhtye Suomi', '20 Suosikkia / Rilluttele yAP', '', 0, 0, 0),
(97, 'Now\'s The Time To Fall In Love', 'Eddie Cantor', 'The Fabulous Eddie Cantor', '', 0, 0, 0),
(98, 'Grim Prospects (Gross Prospects - Bad Trip Remix)', 'Schizoid', 'Grim Prospects Remixes - Grim Prospects Will Never End', '', 0, 0, 0),
(99, 'Mangos', 'Kai Winding', 'The Incredible Kai Winding Trombones', '', 1961, 0, 0),
(100, 'New Test', 'Something New', NULL, 'Pop', 2017, 1, 0);

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
  `drink_cost` decimal(11,0) DEFAULT NULL COMMENT 'Drink Cost',
  PRIMARY KEY (`drink_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`drink_id`, `drink_name`, `drink_category`, `drink_quantity`, `drink_measurement`, `drink_cost`) VALUES
(1, 'Fosters', 'Lager', 1, 'Pint', '3'),
(2, 'John Smiths', 'Ale', 1, 'Pint', '2'),
(3, 'Gin', 'Spirit', 1, 'Single', '2');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Request ID',
  `request_s_name` varchar(50) DEFAULT NULL COMMENT 'Song Name',
  `request_s_artist` varchar(50) NOT NULL COMMENT 'Song Artist',
  `request_s_album` varchar(50) DEFAULT NULL COMMENT 'Song Album',
  `request_s_genre` varchar(15) NOT NULL COMMENT 'Song Genre',
  `request_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Active Request',
  `request_pinned` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Is the request Pinned?',
  `request_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time Requested',
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `request_s_name`, `request_s_artist`, `request_s_album`, `request_s_genre`, `request_active`, `request_pinned`, `request_time`) VALUES
(1, 'Broken-Down Merry-Go-Round', 'Jimmy Wakely', NULL, '', 1, 0, '2018-06-07 16:18:57'),
(2, 'Amor De Cabaret', 'Sonora Santanera', NULL, '', 0, 0, '2018-06-07 16:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `smart`
--

DROP TABLE IF EXISTS `smart`;
CREATE TABLE IF NOT EXISTS `smart` (
  `smart_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Smart ID',
  `smart_name` varchar(100) NOT NULL COMMENT 'Smart Name',
  `smart_type` varchar(100) NOT NULL COMMENT 'Smart Type',
  PRIMARY KEY (`smart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smart`
--

INSERT INTO `smart` (`smart_id`, `smart_name`, `smart_type`) VALUES
(1, 'Test Device 1', 'Test'),
(2, 'Test Device 2', 'Test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
