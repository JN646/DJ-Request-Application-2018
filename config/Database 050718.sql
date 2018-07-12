-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 05, 2018 at 01:41 PM
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
  `request_active` tinyint(1) DEFAULT '0' COMMENT 'Has the song been requested',
  `number_requests` int(11) NOT NULL DEFAULT '0' COMMENT 'Number of Requests',
  `request_pinned` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Is the request pinned?',
  `request_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Last Requested',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `name`, `artist`, `album`, `genre`, `year`, `collec_id`, `active`, `request_active`, `number_requests`, `request_pinned`, `request_time`) VALUES
(1, 'Test', 'Test', 'Test', 'Pop', 2005, 3, 1, 1, 5, 0, '2018-07-01 16:09:38'),
(2, 'Soul Deep', 'The Box Tops', 'Dimensions', '', 1969, 1, 0, 0, 0, 0, NULL),
(3, 'Amor De Cabaret', 'Sonora Santanera', 'Las Numero 1 De La Sonora Santanera', 'Pop', 0, 1, 0, 0, 0, 0, NULL),
(4, 'Something Girls', 'Adam Ant', 'Friend Or Foe', '', 1982, 1, 0, 0, 0, 0, NULL),
(5, 'Face the Ashes', 'Gob', 'Muertos Vivos', '', 0, 1, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(6, 'The Moon And I (Ordinary Day Album Version)', 'Jeff And Sheri Easter', 'Ordinary Day', '', 0, 2, 0, 0, 0, 0, NULL),
(7, 'Keepin It Real (Skit)', 'Rated R', 'Da Ghetto Psychic', '', 0, 2, 0, 0, 0, 0, NULL),
(8, 'Drop of Rain', 'Tweeterfriendly Music', 'Gin & Phonic', '', 0, 3, 0, 0, 0, 0, NULL),
(9, 'Pink World', 'Planet P Project', 'Pink World', '', 1984, 3, 0, 0, 0, 0, NULL),
(10, 'Insatiable (Instrumental Version)', 'Clp', 'Superinstrumental', '', 0, 0, 0, 0, 0, 0, NULL),
(11, 'Young Boy Blues', 'JennyAnyKind', 'I Need You', '', 0, 0, 0, 0, 0, 0, NULL),
(12, 'The Urgency (LP Version)', 'Wayne Watson', 'The Way Home', '', 0, 0, 0, 0, 0, 0, NULL),
(13, 'La Culpa', 'Andy Andy', 'Placer & Castigo', '', 0, 0, 0, 0, 0, 0, NULL),
(14, 'Auguri Cha Cha', 'Bob Azzam', 'Arrivederci', 'Rock', 0, 0, 0, 0, 0, 0, '2018-06-17 20:12:50'),
(15, 'Tonight Will Be Alright', 'Lionel Richie', 'Dancing On The Ceiling', '', 1986, 0, 0, 0, 0, 0, NULL),
(16, 'Floating', 'Blue Rodeo', 'Outskirts', '', 1987, 0, 0, 0, 0, 0, NULL),
(17, 'High Tide', 'Richard Souther', 'Cross Currents', '', 0, 0, 0, 0, 0, 0, NULL),
(18, 'Sohna Nee Sohna Data', 'Faiz Ali Faiz', 'Panjtan Ka Ghulam', '', 0, 0, 0, 0, 0, 0, NULL),
(19, 'Caught In A Dream', 'Tesla', 'Gold', '', 0, 0, 0, 0, 0, 0, '2018-06-18 16:51:06'),
(20, 'Synthetic Dream', 'lextrical', 'Whatever Happened To Boredom?', '', 0, 0, 0, 0, 0, 0, NULL),
(21, 'Broken-Down Merry-Go-Round', 'Jimmy Wakely', '1942-1952 Jimmy Wakely', 'Pop', 0, 0, 0, 0, 0, 0, '2018-06-17 20:11:12'),
(22, 'Kassie Jones', 'Alice Stuart', 'All The Good Times', '', 0, 0, 0, 0, 0, 0, NULL),
(23, 'Setanta matins', 'Elena', 'Un cafe_ setanta matins', '', 0, 0, 0, 0, 0, 0, NULL),
(24, 'Setting Fire to Sleeping Giants', 'The Dillinger Escape Plan', 'Miss Machine', '', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(25, 'James (Hold The Ladder Steady)', 'SUE THOMPSON', 'Sue Thompson - Her Very Best', '', 1985, 0, 0, 0, 0, 0, NULL),
(26, 'Made Like This (Live)', 'Five Bolt Main', 'Live', '', 0, 0, 0, 0, 0, 0, NULL),
(27, 'Superconfidential', 'Clp', 'Strictly Confidential', '', 0, 0, 0, 0, 0, 0, NULL),
(28, 'I Think My Wife Is Running Around On Me (Taco Hell)', 'Tim Wilson', 'The Real Twang Thang', '', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(29, 'Spanish Grease', 'Willie Bobo', 'Willie Bobo\'s Finest Hour', '', 1997, 0, 0, 0, 0, 0, NULL),
(30, 'Crazy Mixed Up World', 'Faye Adams', 'Shake A Hand', '', 1961, 0, 0, 0, 0, 0, NULL),
(31, 'Do You Finally Need A Friend', 'Terry Callier', 'Occasional Rain', '', 1972, 0, 0, 0, 0, 0, NULL),
(32, 'The Emperor Falls', 'John Wesley', 'The Emperor Falls', '', 0, 0, 0, 0, 0, 0, NULL),
(33, 'Twist and Shout', 'The Shangri-Las', 'Best of The Shangri-Las', '', 1964, 0, 0, 0, 0, 0, NULL),
(34, 'It Makes No Difference Now', 'Billie Jo Spears', '20 Of Her Best', '', 1992, 0, 0, 0, 0, 0, NULL),
(35, 'Laws Patrolling (Album Version)', 'Mike Jones (Featuring CJ_ Mello & Lil\' Bran)', 'Who Is Mike Jones?', '', 0, 0, 0, 0, 0, 0, NULL),
(36, 'A?DA3nde va Chichi?', 'Sierra Maestra', 'Tibiri Tabara', 'Pop', 1997, 0, 0, 0, 0, 0, NULL),
(37, 'Barking Dogs', 'Butthole Surfers', 'Piouhgd + Widowermaker!', 'Pop', 0, 0, 0, 1, 1, 0, '2018-06-17 20:38:54'),
(38, 'OUTE ENA EFHARISTO', 'Despina Vandi', 'Profities', '', 0, 0, 0, 0, 0, 0, NULL),
(39, 'Midnight Swim', 'Javier Navarrete', 'Cracks', '', 0, 0, 0, 0, 0, 0, NULL),
(40, 'In A Subtle Way', 'Jacob Young', 'Pieces Of Time', '', 0, 0, 0, 0, 0, 0, NULL),
(41, 'Spin', 'Scarlet\'s Remains', 'The Palest Grey', '', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(42, 'Burning In The Aftermath', 'The Suicide Machines', 'A Match & Some Gasoline', '', 0, 0, 0, 1, 2, 0, '2018-06-17 14:55:11'),
(43, 'Angie (1993 Digital Remaster)', 'The Rolling Stones', 'Jump Back - The Best Of The Rolling Stones', 'Rock', 1993, 3, 0, 0, 0, 0, NULL),
(44, 'Sabor Guajiro', 'Roberto Torres', 'Lo Mejor con La Orq. Broadway', '', 0, 0, 0, 0, 0, 0, NULL),
(45, 'Human Cannonball', 'Loudon Wainwright III', 'Grown Man', '', 1995, 0, 0, 0, 0, 0, NULL),
(46, 'Glory Be', 'R.L. Burnside', 'A Bothered Mind', '', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(47, 'Crossfire', 'Stevie Ray Vaughan', 'Greatest Hits', '', 1992, 0, 0, 0, 0, 0, NULL),
(48, 'I Can\'t Be Satisfied', 'John Hammond', 'Bluesman', '', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(49, 'Nashville Parthenon', 'Casiotone For The Painfully Alone', 'Etiquette', '', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(50, 'Cocain Ducks', 'Ec8or', 'Ec8or', 'Rock', 1995, 0, 0, 0, 0, 0, NULL),
(51, 'Human Being', 'The New York Dolls', 'Too Much Too Soon', '', 1974, 0, 0, 0, 0, 0, NULL),
(52, 'The More I See You', 'Eliane Elias', 'Bossa Nova Stories', '', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(53, 'Certain Things We Do', 'Lost Boyz', 'Love_ Peace & Nappiness', '', 1997, 0, 0, 0, 0, 0, NULL),
(54, 'Forming', 'The Germs', 'Germicide', '', 1977, 0, 0, 0, 0, 0, NULL),
(55, 'MafuA!', 'Yamandu Costa', 'MafuA!', '', 0, 0, 0, 0, 0, 0, NULL),
(56, 'Driving Home For Christmas', 'Chris Rea', 'The Road To Hell Part 2', '', 1986, 0, 0, 0, 0, 0, NULL),
(57, 'Spooks In Space', 'Perrey And Kingsley', 'Vanguard Visionaries', '', 1966, 0, 0, 0, 0, 0, NULL),
(58, 'Tous Les GarASSons Et Les Filles', 'Eurythmics', 'Be Yourself Tonight', 'Pop', 1985, 0, 0, 0, 0, 0, '2018-06-17 15:24:52'),
(59, 'Too Much Saturn', 'Francis Dunnery', 'Hometown 2001', '', 1995, 0, 0, 0, 0, 0, NULL),
(60, 'Movement 4 [from Kiss] (Album Version)', 'John Cale', 'Eat / Kiss: Music For The Films By Andy Warhol', '', 1997, 0, 0, 0, 0, 0, NULL),
(61, 'Stream', 'Suzanne Ciani', 'The Ultimate Most Relaxing New Age Piano in the Universe', '', 0, 0, 0, 0, 0, 0, NULL),
(62, 'Make Me Over', 'Vickie Winans', 'Classic Gold: Best of All', '', 0, 0, 0, 0, 0, 0, NULL),
(63, 'Deform (live)', 'The Berzerker', 'The Berzerker', 'Rock', 0, 0, 0, 0, 0, 0, '2018-06-17 15:26:24'),
(64, 'Wicker Chair', 'Kings Of Leon', 'Holy Roller Novocaine', 'Rock', 1995, 1, 0, 0, 0, 0, NULL),
(65, 'An ti chans\'', 'Edith Lefel', 'Jeux de dames_ vol. 1 (rA(c)alisation Ronald Rubinel)', '', 0, 0, 0, 0, 0, 0, NULL),
(66, 'I Will Love Again (JJ\'s Club Radio)', 'Taras', 'I Will Love Again', '', 0, 0, 0, 0, 0, 0, NULL),
(67, 'Stickin In My Eye', 'NOFX', 'White Trash ......', '', 1992, 0, 0, 0, 0, 0, NULL),
(68, 'Ota kiinni', 'Murskahumppa', 'Murskapunkkia', '', 0, 0, 0, 0, 0, 0, NULL),
(69, 'Entre CanAbales', 'Soda Stereo', 'CanciA3n Animal', '', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(70, 'Rosemary Recalls', 'Bruce Rowland', 'The Man from Snowy River', '', 1985, 0, 0, 0, 0, 0, NULL),
(71, 'Sudanese Dance', 'Xcultures', 'One World One People', '', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(72, 'Where The Thunder Roars (Tales Of Wonder Album Version)', 'White Heart', 'Tales Of Wonder', '', 0, 0, 0, 0, 0, 0, NULL),
(73, 'Wanna Be A Player', 'Heavy D / McGruff', 'Waterbed Hev', '', 1997, 0, 0, 0, 0, 0, NULL),
(74, 'Panama (Remastered Album Version)', 'Van Halen', 'The Best Of Both Worlds', '', 0, 0, 0, 0, 0, 0, NULL),
(75, 'Let\'s Get It Started', 'Black Eyed Peas', 'Elephunk', '', 2004, 0, 0, 0, 0, 0, '2018-06-17 20:21:42'),
(102, 'Windows Theme', 'Microsoft', 'Bad Things', 'Other', 1989, 1, 0, 0, 0, 0, NULL),
(76, 'Metal', 'Nine Inch Nails', 'Things Falling Apart', 'Rock', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(77, 'She Fell Away (2009 Digital Remaster)', 'Nick Cave & The Bad Seeds', 'Your Funeral... My Trial (2009 Digital Remaster)', '', 0, 0, 0, 0, 0, 0, NULL),
(78, 'Next Time', 'Nadine Renee', 'Oasis of Love', '', 0, 0, 0, 0, 0, 0, NULL),
(79, 'It\'s My Party', 'Lesley Gore', '60\'s Triple set', '', 1963, 0, 0, 0, 0, 0, NULL),
(80, 'Complicate It', 'Smartbomb', 'Yeah.  Well_ Anyway....', '', 0, 0, 0, 0, 1, 0, '2018-06-17 20:39:41'),
(81, 'Monde De Fou', 'Suburbs', 'Un Titre de Toune', '', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(82, 'Opus a Satana (Part 2)', 'Emperor', 'Live Inferno', 'Classical', 0, 0, 0, 0, 0, 0, NULL),
(83, 'This Melody (Live)', 'Julien Clerc', 'Vendredi 13 - 1981', '', 0, 0, 0, 0, 0, 0, NULL),
(84, 'I\'m Gone This Time', 'Glen Campbell', 'Unconditional Love', '', 0, 0, 0, 0, 0, 0, NULL),
(85, 'You Feel Good All Over', 'T.G. Sheppard', 'The Very Best Of', '', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(86, 'Indian Love Call', 'Slim Whitman', 'Country Lovers. Vol. 3', '', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(87, 'You Can Still Be Free', 'Savage Garden', 'Affirmation', '', 1999, 0, 0, 0, 0, 0, NULL),
(88, 'I Never Came', 'Queens Of The Stone Age', 'Lullabies To Paralyze', 'Rock', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(89, 'Dixie', 'Hank Penny & The Lincoln Penny Orchestra', 'It\'s War Again', '', 0, 0, 0, 0, 0, 0, NULL),
(90, 'Commercial Reign', 'Inspiral Carpets', 'The Singles', 'Pop', 0, 0, 0, 0, 0, 0, '2018-06-17 20:12:30'),
(91, 'Hourglass', 'Borialis', 'What You Thought You Heard', '', 0, 0, 0, 0, 0, 0, NULL),
(92, 'Wake', 'The Dirty Skirts', 'Daddy Don\'t Disco', '', 0, 0, 0, 0, 0, 0, NULL),
(93, 'Caricia Y Herida', 'Flor Silvestre', '15 Exitos Vol. 2 Flor Silvestre', '', 0, 0, 0, 0, 0, 0, NULL),
(94, 'Le tortillard', 'BA(c)zu', 'Le top du pA\"re NAPel', '', 0, 0, 0, 0, 0, 0, NULL),
(95, 'WKYA (drop)', 'Redman', 'Malpractice', '', 0, 0, 0, 0, 0, 0, '2018-06-17 14:55:11'),
(96, 'TerA$?slintu', 'Solistiyhtye Suomi', '20 Suosikkia / Rilluttele yAP', '', 0, 0, 0, 0, 0, 0, NULL),
(97, 'Now\'s The Time To Fall In Love', 'Eddie Cantor', 'The Fabulous Eddie Cantor', '', 0, 0, 0, 0, 0, 0, NULL),
(98, 'Grim Prospects (Gross Prospects - Bad Trip Remix)', 'Schizoid', 'Grim Prospects Remixes - Grim Prospects Will Never End', '', 0, 0, 0, 0, 0, 0, NULL),
(99, 'Mangos', 'Kai Winding', 'The Incredible Kai Winding Trombones', '', 1961, 0, 0, 0, 0, 0, NULL),
(100, 'New Test', 'Something New', 'Some Modern Album With A Long Title', 'Other', 2017, 1, 0, 0, 0, 0, NULL),
(101, 'New Test', 'Someone Important', 'National Anthems', 'Pop', 1990, 0, 0, 0, 0, 0, NULL),
(103, 'Dancing in the Moonlight', 'Toploader', 'Moonlight', 'Pop', 1990, 0, 0, 0, 0, 0, NULL),
(104, 'Bang a Gong', 'T.Rex', '', 'Rock', 1970, 0, 0, 0, 0, 0, NULL);

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
