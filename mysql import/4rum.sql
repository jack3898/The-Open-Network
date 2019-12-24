-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 24, 2019 at 05:52 PM
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
`username` varchar(16)
,`forename` varchar(15)
,`surname` varchar(15)
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
`username` varchar(16)
,`forename` varchar(15)
,`surname` varchar(15)
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forename` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profilepicurl` varchar(48) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bannerpicurl` varchar(48) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`(25)),
  UNIQUE KEY `username` (`username`(15)) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `forename`, `surname`, `username`, `password`, `bio`, `email`, `profilepicurl`, `bannerpicurl`) VALUES
(34, 'Jack', 'Wright', 'jackwright3898', '$2y$10$XYYxXKQx6HzQUKG6knlpf.8MEX/yvDKbsdCfRM6rCdz4.q51AWI8i', NULL, '1998jwright@gmail.com', NULL, NULL);

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
