-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 21, 2019 at 04:21 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4rum`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `collate_existing_friends`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `collate_existing_friends`;
CREATE TABLE IF NOT EXISTS `collate_existing_friends` (
`username` tinytext
,`forename` tinytext
,`surname` tinytext
,`id` int(11)
,`friends` tinytext
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `collate_pending_friends`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `collate_pending_friends`;
CREATE TABLE IF NOT EXISTS `collate_pending_friends` (
`username` tinytext
,`forename` tinytext
,`surname` tinytext
,`id` int(11)
,`pendingfriend` tinytext
);

-- --------------------------------------------------------

--
-- Table structure for table `existingfriends`
--

DROP TABLE IF EXISTS `existingfriends`;
CREATE TABLE IF NOT EXISTS `existingfriends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `friends` tinytext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `existingfriends`
--

INSERT INTO `existingfriends` (`id`, `username`, `friends`) VALUES
(1, 'jackwright3898', 'poophead123');

-- --------------------------------------------------------

--
-- Table structure for table `pendingfriends`
--

DROP TABLE IF EXISTS `pendingfriends`;
CREATE TABLE IF NOT EXISTS `pendingfriends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `pendingfriend` tinytext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`(15))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pendingfriends`
--

INSERT INTO `pendingfriends` (`id`, `username`, `pendingfriend`) VALUES
(2, 'jackwright3898', 'jasontester9000'),
(4, 'jasontester9000', 'jackwright3898');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forename` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `surname` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `username` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `password` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `bio` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `profilepicurl` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `bannerpicurl` tinytext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`(15))
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `forename`, `surname`, `username`, `password`, `bio`, `email`, `profilepicurl`, `bannerpicurl`) VALUES
(1, 'Jack', 'Wright', 'jackwright3898', 'test', 'I am the creator of this forum! This is just here as a tester. Nothing important here. :)', 'noemail@email.com', '5ddae6fd128378.77710784jackwright3898.png', '5ddae73235f948.20238169jackwright3898.jpg'),
(2, 'Jason', 'Tester', 'jasontester9000', 'test', 'I am Jason. I am a test user on this forum site. In the future, I will not be an admin. So far, there is very little difference between me and the main account.', 'jasontest@email.com', '5dd9b850a51498.27976990jasontester9000.png', ''),
(3, 'Poop', 'Head', 'poophead123', 'test', 'I am poop.', 'jasontest@email.com', '', '');

-- --------------------------------------------------------

--
-- Structure for view `collate_existing_friends`
--
DROP TABLE IF EXISTS `collate_existing_friends`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `collate_existing_friends`  AS  select `users`.`username` AS `username`,`users`.`forename` AS `forename`,`users`.`surname` AS `surname`,`existingfriends`.`id` AS `id`,`existingfriends`.`friends` AS `friends` from (`existingfriends` join `users` on((`users`.`username` = `existingfriends`.`username`))) ;

-- --------------------------------------------------------

--
-- Structure for view `collate_pending_friends`
--
DROP TABLE IF EXISTS `collate_pending_friends`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `collate_pending_friends`  AS  select `users`.`username` AS `username`,`users`.`forename` AS `forename`,`users`.`surname` AS `surname`,`pendingfriends`.`id` AS `id`,`pendingfriends`.`pendingfriend` AS `pendingfriend` from (`pendingfriends` join `users` on((`users`.`username` = `pendingfriends`.`username`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
