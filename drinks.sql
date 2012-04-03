-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2012 at 12:34 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `drinks`
--
DROP DATABASE IF EXISTS drinks;
CREATE DATABASE `drinks` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
GRANT ALL PRIVILEGES ON drinks.* to 'admin'@'localhost' identified by 'drinks';
USE `drinks`;

-- --------------------------------------------------------

--
-- Table structure for table `difficulty`
--

CREATE TABLE IF NOT EXISTS `difficulty` (
  `difficulty_id` int(11) NOT NULL AUTO_INCREMENT,
  `points` int(11) NOT NULL DEFAULT '0',
  `difficulty` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`difficulty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `difficulty`
--

INSERT INTO `difficulty` (`difficulty_id`, `points`, `difficulty`) VALUES
(1, 5, 'easy'),
(2, 15, 'hard'),
(3, 10, 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `directions`
--

CREATE TABLE IF NOT EXISTS `directions` (
  `direction_id` int(11) NOT NULL AUTO_INCREMENT,
  `directions` blob,
  PRIMARY KEY (`direction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `directions`
--

INSERT INTO `directions` (`direction_id`, `directions`) VALUES
(1, 0x41646420766f646b6120616e64207065616368200a7363686e6170707320746f2061206869676862616c6c20676c6173732e2046696c6c207769746820657175616c206d65617375726573206f66206372616e6265727279206a7569636520616e642067726170656672756974206a756963652c20616e6420737469722e),
(2, 0x436f6d62696e6520746865207665726d6f7574682c20626f7572626f6e20776869736b65792c20616e64200a6269747465727320776974682032202d20332069636520637562657320696e2061206d6978696e6720676c6173732e20537469722067656e746c792c20646f6e27742062727569736520746865207370697269747320616e6420636c6f756420746865206472696e6b2e20506c616365207468652063686572727920696e2061206368696c6c656420636f636b7461696c0a676c61737320616e642073747261696e2074686520776869736b6579206d697874757265206f76657220746865206368657272792e2052756220746865206375742065646765206f6620746865206f72616e6765207065656c206f766572207468652072696d206f662074686520676c61737320616e64207477697374206974206f76657220746865206472696e6b200a746f2072656c6561736520746865206f696c732062757420646f6e27742064726f7020697420696e2e),
(3, 0x46696c6c2061206d6978696e6720676c6173732077697468206963652e20416464206c6971756f727320616e64206c656d6f6e206a756963652028627574204e4f542074686520636f6c61292e205368616b6520616e642073747261696e20696e746f206120636f6c6c696e7320676c6173732066696c6c65642077697468206963652063756265732e200a46696c6c207769746820636f6c612e204761726e6973682077697468206120736c696365206f66206c656d6f6e20616e642061207370726967206f66206d696e7420616e642073657276652077697468206120737472617720616e6420616e2069636564207465612073706f6f6e2e),
(4, 0x46696c6c2061206d6978696e6720676c6173732077697468206963652e204164642072756d2c206c696d65206a756963652c200a616e6420706f7764657265642073756761722e205368616b6520616e642073747261696e20696e746f2061206368696c6c656420636f636b7461696c20676c6173732e204761726e69736820776974682061206c696d6520736c6963652e),
(5, 0x4e6f6e65),
(6, 0x506c61636520616c6c20696e6772656469656e747320696e206120626c656e64657220616e640a20626c656e6420617420686967682073657474696e6720756e74696c20736d6f6f7468202d2d2061626f7574203330207365636f6e64732e2053747261696e20696e746f206869676862616c6c206f7220636f6c6c696e7320676c61737320616e64206761726e6973682077697468206f72616e676520736c69636520616e64206368657272792e),
(7, 0x506f7572206c696768742072756d2c200a6372656d6520646520616c6d6f6e6420616e6420747269706c65207365632c20696e206f726465722c20696e746f206120636f6c6c696e7320676c6173732e20416c6d6f73742066696c6c207769746820657175616c207061727473206f6620737765657420616e6420736f7572206d697820616e642070696e656170706c65206a756963652e200a416464206461726b2072756d2c2061206c617267652073747261772c20616e6420736572766520756e737469727265642e),
(8, 0x506f7572206d6172676172697461206f72206f74686572200a636f617273652d67726f756e642073616c74206f6e206120736d616c6c20706c6174652e20527562207468652072696d206f66206120636f636b7461696c20676c617373207769746820746865206c696d6520776564676520616e6420646970207468652072696d206f662074686520676c61737320756e74696c20697420697320636f61746564200a776974682073616c742e2046696c6c2074686520636f636b7461696c20676c6173732077697468206963652063756265732e2046696c6c2061206d6978696e6720676c617373207769746820637261636b6564206963652e),
(9, 0x69636520287368616b652920726f636b73),
(10, 0x6e6f206d69782069636520726f636b73206f722075702028447279206d65616e73206c657373205665726d6f75746829);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `ingredient_id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient` varchar(30) DEFAULT NULL,
  `ingredient_amount` decimal(4,2) DEFAULT NULL,
  `drink_id` int(11) NOT NULL,
  PRIMARY KEY (`ingredient_id`),
  KEY `mix_drinks_drink_id_fk` (`drink_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredient_id`, `ingredient`, `ingredient_amount`, `drink_id`) VALUES
(1, 'vodka', 1.00, 1),
(2, 'vodka', 0.50, 2),
(3, 'rum', 2.00, 3),
(4, 'triple sec', 0.50, 4),
(5, 'bourbon', 2.00, 5),
(6, 'rum', 1.00, 6),
(7, 'white rum', 1.00, 7),
(8, 'tequila', 1.50, 8),
(9, 'gin', 2.00, 9),
(10, 'vodka', 1.00, 10),
(11, 'triple sec', 0.50, 1),
(12, 'gin', 0.50, 2),
(13, 'rum', 1.50, 4),
(14, 'sweet vermouth', 0.75, 5),
(15, 'coconut cream', 1.00, 6),
(16, 'spearmint schnapps', 1.00, 7),
(17, 'triple sec', 0.50, 8),
(18, 'dry vermouth', 0.16, 9),
(19, 'peach schnapps', 0.75, 10),
(20, 'rum', 0.50, 2),
(21, 'creme de almond', 0.50, 4),
(22, 'angostura bitter', 0.16, 5),
(23, 'crushed pineapple', 1.00, 6),
(24, 'triple sec', 1.00, 7),
(25, 'lime juice', 1.00, 8),
(26, 'cranberry juice', 0.75, 10),
(27, 'tequila', 0.25, 2),
(28, 'pineapple juice', 0.50, 4),
(29, 'crushed ice', 0.25, 6),
(30, 'lime juice', 0.33, 7),
(31, 'powdered suger', 0.16, 8),
(32, 'grapefruit juice', 0.75, 10),
(33, 'triple sec', 0.50, 2),
(34, 'sweet and sour mix', 0.50, 4),
(35, 'limeade mix', 0.50, 1),
(36, 'lemon juice', 0.50, 2),
(37, 'lime juice', 1.50, 3),
(38, 'cranberry juice', 0.50, 1),
(39, 'cola', 6.00, 2),
(40, 'powdered sugar', 0.16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `junction`
--

CREATE TABLE IF NOT EXISTS `junction` (
  `user_id` int(11) NOT NULL,
  `drink_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`drink_id`),
  KEY `drink_id` (`drink_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mix_drinks`
--

CREATE TABLE IF NOT EXISTS `mix_drinks` (
  `drink_id` int(11) NOT NULL AUTO_INCREMENT,
  `drink_name` varchar(30) DEFAULT NULL,
  `direction_id` int(11) DEFAULT NULL,
  `strength_id` int(11) DEFAULT NULL,
  `difficulty_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT 'unverified',
  PRIMARY KEY (`drink_id`),
  KEY `strength_id` (`strength_id`),
  KEY `difficulty_id` (`difficulty_id`),
  KEY `user_id` (`user_id`),
  KEY `mix_drink_names` (`drink_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mix_drinks`
--

INSERT INTO `mix_drinks` (`drink_id`, `drink_name`, `direction_id`, `strength_id`, `difficulty_id`, `user_id`, `image`) VALUES
(1, 'Cosmopolitan', 1, 2, 1, 0, 'cosmo.jpg'),
(2, 'Long Island Iced Tea', 2, 2, 1, 0, 'long island.jpg'),
(3, 'Daiquiri', 3, 2, 1, 0, 'daiquiri.jpg'),
(4, 'Mai Tai', 4, 2, 1, 0, 'mai tai.jpg'),
(5, 'Manhattan', 5, 1, 1, 0, 'manhattan.jpg'),
(6, 'Pina Colada', 6, 2, 1, 0, 'pina.jpg'),
(7, 'Mojito', 7, 2, 2, 0, 'mojito.jpg'),
(8, 'Maragarita', 8, 2, 3, 0, 'margarita.jpg'),
(9, 'Martini', 9, 2, 2, 0, 'martini.jpg'),
(10, 'Sex on the Beach', 10, 3, 1, 0, 'beach.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `strength`
--

CREATE TABLE IF NOT EXISTS `strength` (
  `strength_id` int(11) NOT NULL AUTO_INCREMENT,
  `strength` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`strength_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `strength`
--

INSERT INTO `strength` (`strength_id`, `strength`) VALUES
(1, 'weak'),
(2, 'regular'),
(3, 'strong');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `email`) VALUES
(0, 'admin', '5a8f2d9144133bd60aac76a1bd9310ca43d4fff4', 'admin@email.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `mix_drinks_drink_id_fk` FOREIGN KEY (`drink_id`) REFERENCES `mix_drinks` (`drink_id`);

--
-- Constraints for table `junction`
--
ALTER TABLE `junction`
  ADD CONSTRAINT `junction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `junction_ibfk_2` FOREIGN KEY (`drink_id`) REFERENCES `mix_drinks` (`drink_id`);

--
-- Constraints for table `mix_drinks`
--
ALTER TABLE `mix_drinks`
  ADD CONSTRAINT `mix_drinks_ibfk_2` FOREIGN KEY (`strength_id`) REFERENCES `strength` (`strength_id`),
  ADD CONSTRAINT `mix_drinks_ibfk_3` FOREIGN KEY (`difficulty_id`) REFERENCES `difficulty` (`difficulty_id`),
  ADD CONSTRAINT `mix_drinks_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
