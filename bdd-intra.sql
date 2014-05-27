-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 27, 2014 at 07:56 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ldap`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sizegroup` int(10) NOT NULL,
  `nbcorrections` int(10) NOT NULL,
  `auto` int(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `id_modules` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_modules` (`id_modules`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `activities_barem_users`
--

CREATE TABLE IF NOT EXISTS `activities_barem_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `note` int(10) NOT NULL,
  `id_activities` int(10) NOT NULL,
  `uid_corrector` varchar(255) NOT NULL,
  `uid_correct` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_activities` (`id_activities`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `uid`) VALUES
(2, 'jflorimo'),
(4, 'jgil'),
(5, 'lcharpen'),
(6, 'abouvier'),
(7, 'jtoubert'),
(8, 'atorscho'),
(10, 'aarrivat');

-- --------------------------------------------------------

--
-- Table structure for table `answer_threads`
--

CREATE TABLE IF NOT EXISTS `answer_threads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `answer` text NOT NULL,
  `uid` varchar(255) NOT NULL,
  `id_threads` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`) VALUES
(1, 'Infographie', 2),
(2, 'Environnement Unix', 2),
(3, 'Algorithme', 2),
(4, 'Web', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comment_answer`
--

CREATE TABLE IF NOT EXISTS `comment_answer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `uid` varchar(255) NOT NULL,
  `id_answer_threads` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_answer_threads` (`id_answer_threads`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `element_bareme`
--

CREATE TABLE IF NOT EXISTS `element_bareme` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `points` int(10) NOT NULL,
  `comment` text NOT NULL,
  `id_activite` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_activite` (`id_activite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) NOT NULL,
  `urlpage` varchar(255) NOT NULL,
  `type` int(10) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=512 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `uid`, `urlpage`, `type`, `comment`, `date`) VALUES
(1, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 15:16:23'),
(2, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-04-30 15:16:36'),
(3, 'nschilli', 'users/yearbook?letter=Q', 1, 'yearbook_byletter', '2014-04-30 15:16:38'),
(4, 'nschilli', 'users/yearbook?letter=Y', 1, 'yearbook_byletter', '2014-04-30 15:17:23'),
(5, 'nschilli', 'users/yearbook?letter=N', 1, 'yearbook_byletter', '2014-04-30 15:17:54'),
(6, 'nschilli', 'users/account?uid=nknatek', 1, 'other_account', '2014-04-30 15:18:34'),
(7, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-04-30 15:18:35'),
(8, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 15:18:48'),
(9, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-04-30 15:18:57'),
(10, 'nschilli', 'users/account?uid=apilate', 1, 'other_account', '2014-04-30 15:18:58'),
(11, 'nschilli', 'users/account?uid=apilate', 1, 'other_account', '2014-04-30 15:21:43'),
(12, 'nschilli', 'users/logout', 1, 'logout', '2014-04-30 15:21:45'),
(13, 'nschilli', 'users/signin', 1, 'Signin', '2014-04-30 15:22:36'),
(14, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 15:22:36'),
(15, 'nschilli', 'users/logout', 1, 'logout', '2014-04-30 15:22:45'),
(16, 'nschilli', 'users/signin', 1, 'Signin', '2014-04-30 15:23:58'),
(17, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 15:23:58'),
(18, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 15:33:00'),
(19, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 15:33:13'),
(20, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 15:33:25'),
(21, 'nschilli', 'users/logout', 1, 'logout', '2014-04-30 15:33:39'),
(22, 'jflorimo', 'users/signin', 1, 'Signin', '2014-04-30 15:34:36'),
(23, 'jflorimo', 'users/account', 1, 'my_account', '2014-04-30 15:34:36'),
(24, 'jflorimo', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-04-30 15:34:40'),
(25, 'jflorimo', 'users/yearbook?letter=J', 1, 'yearbook_byletter', '2014-04-30 15:34:43'),
(26, 'jflorimo', 'users/account?uid=jblondel', 1, 'other_account', '2014-04-30 15:34:45'),
(27, 'jflorimo', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-04-30 15:34:50'),
(28, 'jflorimo', 'users/yearbook?letter=I', 1, 'yearbook_byletter', '2014-04-30 15:34:53'),
(29, 'jflorimo', 'users/account?uid=intra', 1, 'other_account', '2014-04-30 15:34:54'),
(30, 'jflorimo', 'users/logout', 1, 'logout', '2014-04-30 15:35:04'),
(31, 'nschilli', 'users/signin', 1, 'Signin', '2014-04-30 15:35:10'),
(32, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 15:35:10'),
(33, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-04-30 15:35:12'),
(34, 'nschilli', 'users/yearbook?letter=J', 1, 'yearbook_byletter', '2014-04-30 15:35:14'),
(35, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-04-30 15:35:21'),
(36, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-04-30 15:35:36'),
(37, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 15:35:38'),
(38, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 15:35:51'),
(39, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 15:35:53'),
(40, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 15:35:54'),
(41, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-04-30 15:35:59'),
(42, 'nschilli', 'users/yearbook?letter=J', 1, 'yearbook_byletter', '2014-04-30 15:36:01'),
(43, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-04-30 15:36:06'),
(44, 'nschilli', 'users/signin', 1, 'Signin', '2014-04-30 18:21:38'),
(45, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:21:38'),
(46, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:22:41'),
(47, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:22:49'),
(48, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:22:55'),
(49, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:23:02'),
(50, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:25:11'),
(51, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:25:22'),
(52, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-04-30 18:25:28'),
(53, 'nschilli', 'users/yearbook?letter=P', 1, 'yearbook_byletter', '2014-04-30 18:25:29'),
(54, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:25:30'),
(55, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:28:09'),
(56, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:29:46'),
(57, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:31:35'),
(58, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:32:04'),
(59, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:32:27'),
(60, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:32:38'),
(61, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:33:52'),
(62, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-04-30 18:34:31'),
(63, 'nschilli', 'users/account?uid=abanlin', 1, 'other_account', '2014-04-30 18:34:32'),
(64, 'nschilli', 'users/account?uid=abanlin', 1, 'other_account', '2014-04-30 18:35:13'),
(65, 'nschilli', 'users/account?uid=abanlin', 1, 'other_account', '2014-04-30 18:35:26'),
(66, 'nschilli', 'users/account?uid=abanlin', 1, 'other_account', '2014-04-30 18:35:33'),
(67, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:35:36'),
(68, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:36:14'),
(69, 'nschilli', 'users/account', 1, 'my_account', '2014-04-30 18:36:20'),
(70, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-04-30 18:36:34'),
(71, 'nschilli', 'users/yearbook?letter=J', 1, 'yearbook_byletter', '2014-04-30 18:36:36'),
(72, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-04-30 18:36:39'),
(73, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-04-30 18:38:13'),
(74, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-02 07:17:44'),
(75, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 07:17:44'),
(76, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:17:51'),
(77, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 07:35:17'),
(78, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:35:19'),
(79, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:41:59'),
(80, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:42:18'),
(81, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:45:05'),
(82, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:45:23'),
(83, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:46:13'),
(84, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:46:19'),
(85, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:47:09'),
(86, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:47:41'),
(87, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:47:48'),
(88, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:47:59'),
(89, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:48:09'),
(90, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:48:33'),
(91, 'nschilli', 'users/yearbook?letter=N', 1, 'yearbook_byletter', '2014-05-02 07:48:38'),
(92, 'nschilli', 'users/yearbook?letter=O', 1, 'yearbook_byletter', '2014-05-02 07:48:39'),
(93, 'nschilli', 'users/yearbook?letter=O', 1, 'yearbook_byletter', '2014-05-02 07:49:04'),
(94, 'nschilli', 'users/yearbook?letter=O', 1, 'yearbook_byletter', '2014-05-02 07:49:06'),
(95, 'nschilli', 'users/yearbook?letter=O', 1, 'yearbook_byletter', '2014-05-02 07:49:20'),
(96, 'nschilli', 'users/yearbook?letter=O', 1, 'yearbook_byletter', '2014-05-02 07:53:34'),
(97, 'nschilli', 'users/yearbook?letter=D', 1, 'yearbook_byletter', '2014-05-02 07:53:44'),
(98, 'nschilli', 'users/yearbook?letter=D', 1, 'yearbook_byletter', '2014-05-02 07:54:38'),
(99, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:54:49'),
(100, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 07:54:52'),
(101, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 07:54:54'),
(102, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 07:54:55'),
(103, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 07:55:13'),
(104, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:55:16'),
(105, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 07:55:29'),
(106, 'nschilli', 'users/yearbook?letter=B', 1, 'yearbook_byletter', '2014-05-02 07:55:37'),
(107, 'nschilli', 'users/yearbook?letter=C', 1, 'yearbook_byletter', '2014-05-02 07:55:42'),
(108, 'nschilli', 'users/yearbook?letter=D', 1, 'yearbook_byletter', '2014-05-02 07:55:44'),
(109, 'nschilli', 'users/yearbook?letter=D', 1, 'yearbook_byletter', '2014-05-02 08:00:43'),
(110, 'jgil', 'users/account', 1, 'my_account', '2014-05-02 08:01:16'),
(111, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:01:20'),
(112, 'nschilli', 'users/logout', 1, 'logout', '2014-05-02 08:01:39'),
(113, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-02 08:01:47'),
(114, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:01:47'),
(115, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:01:51'),
(116, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:01:53'),
(117, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:02:10'),
(118, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:02:11'),
(119, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:02:44'),
(120, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:02:46'),
(121, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:02:49'),
(122, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:02:53'),
(123, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:02:58'),
(124, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:02:59'),
(125, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:05:53'),
(126, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:05:59'),
(127, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:06:55'),
(128, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:07:01'),
(129, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:07:11'),
(130, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:07:19'),
(131, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:07:24'),
(132, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:09:10'),
(133, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:09:17'),
(134, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:09:25'),
(135, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:09:31'),
(136, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:09:40'),
(137, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:09:46'),
(138, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:09:55'),
(139, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:10:01'),
(140, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:10:08'),
(141, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:10:23'),
(142, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:10:29'),
(143, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:10:41'),
(144, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:10:49'),
(145, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:11:00'),
(146, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:11:09'),
(147, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:11:25'),
(148, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:13:29'),
(149, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:14:38'),
(150, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:14:57'),
(151, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:15:17'),
(152, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:15:55'),
(153, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:16:07'),
(154, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:16:17'),
(155, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:16:24'),
(156, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:16:32'),
(157, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:19:42'),
(158, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:20:40'),
(159, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:22:14'),
(160, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:23:23'),
(161, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:25:07'),
(162, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:25:27'),
(163, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:25:36'),
(164, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:25:37'),
(165, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:26:23'),
(166, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:26:31'),
(167, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:26:44'),
(168, 'nschilli', 'users/account?uid=jgil', 1, 'other_account', '2014-05-02 08:26:52'),
(169, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 08:26:55'),
(170, 'nschilli', 'users/account?uid=abouvier', 1, 'other_account', '2014-05-02 08:27:36'),
(171, 'nschilli', 'users/account?uid=abouvier', 1, 'other_account', '2014-05-02 08:28:01'),
(172, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 08:28:04'),
(173, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 09:46:39'),
(174, 'nschilli', 'users/account?uid=dsousa', 1, 'other_account', '2014-05-02 09:46:49'),
(175, 'nschilli', 'users/account?uid=rbenjami', 1, 'other_account', '2014-05-02 11:30:59'),
(176, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 11:31:10'),
(177, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 11:31:12'),
(178, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 11:33:27'),
(179, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 11:33:35'),
(180, 'nschilli', 'users/account?uid=abouvier', 1, 'other_account', '2014-05-02 11:33:39'),
(181, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 11:33:42'),
(182, 'nschilli', 'users/yearbook?letter=D', 1, 'yearbook_byletter', '2014-05-02 11:34:59'),
(183, 'nschilli', 'users/yearbook?letter=M', 1, 'yearbook_byletter', '2014-05-02 11:35:17'),
(184, 'nschilli', 'users/yearbook?letter=D', 1, 'yearbook_byletter', '2014-05-02 11:35:19'),
(185, 'nschilli', 'users/account?uid=dsousa', 1, 'other_account', '2014-05-02 11:35:27'),
(186, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 11:38:17'),
(187, 'nschilli', 'users/yearbook?letter=K', 1, 'yearbook_byletter', '2014-05-02 11:38:24'),
(188, 'nschilli', 'users/yearbook?letter=W', 1, 'yearbook_byletter', '2014-05-02 11:38:32'),
(189, 'nschilli', 'users/yearbook?letter=N', 1, 'yearbook_byletter', '2014-05-02 11:38:34'),
(190, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 11:38:43'),
(191, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 11:38:55'),
(192, 'nschilli', 'users/yearbook?letter=Q', 1, 'yearbook_byletter', '2014-05-02 11:39:13'),
(193, 'nschilli', 'users/account?uid=rbenjami', 1, 'other_account', '2014-05-02 11:39:28'),
(194, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 11:39:29'),
(195, 'nschilli', 'users/account?uid=zsarour', 1, 'other_account', '2014-05-02 11:46:45'),
(196, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 11:46:47'),
(197, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 11:46:50'),
(198, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:19:12'),
(199, 'nschilli', 'users/logout', 1, 'logout', '2014-05-02 12:35:00'),
(200, 'crenault', 'users/signin', 1, 'Signin', '2014-05-02 12:35:12'),
(201, 'crenault', 'users/account', 1, 'my_account', '2014-05-02 12:35:12'),
(202, 'crenault', 'users/logout', 1, 'logout', '2014-05-02 12:35:24'),
(203, 'crenault', 'users/signin', 1, 'Signin', '2014-05-02 12:35:41'),
(204, 'crenault', 'users/account', 1, 'my_account', '2014-05-02 12:35:41'),
(205, 'crenault', 'users/account', 1, 'my_account', '2014-05-02 12:35:45'),
(206, 'crenault', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:35:47'),
(207, 'crenault', 'users/account?uid=jboulet', 1, 'other_account', '2014-05-02 12:35:55'),
(208, 'crenault', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:36:00'),
(209, 'crenault', 'users/logout', 1, 'logout', '2014-05-02 12:36:02'),
(210, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-02 12:36:09'),
(211, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:36:09'),
(212, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:36:34'),
(213, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:36:47'),
(214, 'nschilli', 'users/account?uid=crenault', 1, 'other_account', '2014-05-02 12:36:58'),
(215, 'crenault', 'users/account', 1, 'my_account', '2014-05-02 12:38:02'),
(216, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:38:41'),
(217, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:39:28'),
(218, 'nschilli', 'users/account?uid=crenault', 1, 'other_account', '2014-05-02 12:39:31'),
(219, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:40:12'),
(220, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:40:18'),
(221, 'nschilli', 'users/yearbook?letter=N', 1, 'yearbook_byletter', '2014-05-02 12:40:22'),
(222, 'nschilli', 'users/yearbook?letter=R', 1, 'yearbook_byletter', '2014-05-02 12:40:28'),
(223, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:43:53'),
(224, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:01'),
(225, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:01'),
(226, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:01'),
(227, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:02'),
(228, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:05'),
(229, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:05'),
(230, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:06'),
(231, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:06'),
(232, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:06'),
(233, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:06'),
(234, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:06'),
(235, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:11'),
(236, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:11'),
(237, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:11'),
(238, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:11'),
(239, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:44:12'),
(240, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:44:12'),
(241, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:44:13'),
(242, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:44:13'),
(243, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:44:13'),
(244, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:44:13'),
(245, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:44:13'),
(246, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:44:14'),
(247, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:44:14'),
(248, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-02 12:44:14'),
(249, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:17'),
(250, 'nschilli', 'users/account', 1, 'my_account', '2014-05-02 12:44:41'),
(251, 'nschilli', 'users/logout', 1, 'logout', '2014-05-02 12:44:42'),
(252, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-03 08:13:26'),
(253, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 08:13:26'),
(254, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 08:13:29'),
(255, 'nschilli', 'users/account?uid=aandlaue', 1, 'other_account', '2014-05-03 08:13:34'),
(256, 'nschilli', 'users/account?uid=aandlaue', 1, 'other_account', '2014-05-03 08:17:56'),
(257, 'nschilli', 'users/account?uid=aandlaue', 1, 'other_account', '2014-05-03 08:17:58'),
(258, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 08:18:18'),
(259, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 08:20:39'),
(260, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 08:21:03'),
(261, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 08:21:16'),
(262, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 08:21:23'),
(263, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 08:22:19'),
(264, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 08:23:01'),
(265, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 08:23:10'),
(266, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 08:23:24'),
(267, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 08:24:31'),
(268, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 08:28:22'),
(269, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 08:28:30'),
(270, 'nschilli', 'users/account?uid=aandlaue', 1, 'other_account', '2014-05-03 08:28:32'),
(271, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 08:29:04'),
(272, 'nschilli', 'users/yearbook?letter=J', 1, 'yearbook_byletter', '2014-05-03 08:31:38'),
(273, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 08:34:40'),
(274, 'nschilli', 'users/logout', 1, 'logout', '2014-05-03 08:34:47'),
(275, 'jflorimo', 'users/signin', 1, 'Signin', '2014-05-03 08:34:56'),
(276, 'jflorimo', 'users/account', 1, 'my_account', '2014-05-03 08:34:56'),
(277, 'jflorimo', 'users/account', 1, 'my_account', '2014-05-03 08:36:02'),
(278, 'jflorimo', 'users/logout', 1, 'logout', '2014-05-03 08:36:03'),
(279, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-03 08:36:09'),
(280, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 08:36:09'),
(281, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 08:36:13'),
(282, 'nschilli', 'users/yearbook?letter=J', 1, 'yearbook_byletter', '2014-05-03 08:36:15'),
(283, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 08:36:21'),
(284, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 09:54:21'),
(285, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 09:57:44'),
(286, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 09:59:14'),
(287, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 09:59:34'),
(288, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:01:17'),
(289, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:02:32'),
(290, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:04:58'),
(291, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:05:34'),
(292, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:05:49'),
(293, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:06:08'),
(294, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:08:45'),
(295, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:08:53'),
(296, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:09:01'),
(297, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:09:08'),
(298, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:09:19'),
(299, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:20:30'),
(300, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:21:11'),
(301, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:21:36'),
(302, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:22:30'),
(303, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:23:43'),
(304, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:25:19'),
(305, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:26:52'),
(306, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:27:01'),
(307, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:27:24'),
(308, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:28:48'),
(309, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:29:21'),
(310, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:29:55'),
(311, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:30:42'),
(312, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:31:38'),
(313, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:31:46'),
(314, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:32:07'),
(315, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:32:18'),
(316, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:33:14'),
(317, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:33:30'),
(318, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:34:19'),
(319, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:34:30'),
(320, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:34:39'),
(321, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 10:35:02'),
(322, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 10:35:16'),
(323, 'nschilli', 'users/yearbook?letter=J', 1, 'yearbook_byletter', '2014-05-03 10:35:20'),
(324, 'nschilli', 'users/account?uid=jgil', 1, 'other_account', '2014-05-03 10:35:25'),
(325, 'nschilli', 'users/account?uid=jgil', 1, 'other_account', '2014-05-03 10:43:15'),
(326, 'nschilli', 'users/account?uid=jgil', 1, 'other_account', '2014-05-03 10:44:23'),
(327, 'nschilli', 'users/account?uid=jgil', 1, 'other_account', '2014-05-03 10:44:48'),
(328, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 10:45:07'),
(329, 'nschilli', 'users/yearbook?letter=L', 1, 'yearbook_byletter', '2014-05-03 10:45:09'),
(330, 'nschilli', 'users/account?uid=lcharpen', 1, 'other_account', '2014-05-03 10:45:16'),
(331, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 10:46:05'),
(332, 'nschilli', 'users/yearbook?letter=E', 1, 'yearbook_byletter', '2014-05-03 10:46:08'),
(333, 'nschilli', 'users/account?uid=elivet', 1, 'other_account', '2014-05-03 10:46:13'),
(334, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 10:46:24'),
(335, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 10:46:35'),
(336, 'nschilli', 'users/yearbook?letter=D', 1, 'yearbook_byletter', '2014-05-03 10:46:40'),
(337, 'nschilli', 'users/account?uid=dsousa', 1, 'other_account', '2014-05-03 10:47:00'),
(338, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 10:47:25'),
(339, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:48:02'),
(340, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:48:59'),
(341, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:49:14'),
(342, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:49:16'),
(343, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:49:44'),
(344, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 10:49:49'),
(345, 'nschilli', 'users/account?uid=aandlaue', 1, 'other_account', '2014-05-03 10:49:51'),
(346, 'nschilli', 'users/account?uid=aandlaue', 1, 'other_account', '2014-05-03 10:50:18'),
(347, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 10:50:20'),
(348, 'nschilli', 'users/yearbook?letter=L', 1, 'yearbook_byletter', '2014-05-03 10:50:23'),
(349, 'nschilli', 'users/account?uid=lcharpen', 1, 'other_account', '2014-05-03 10:50:30'),
(350, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:50:33'),
(351, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 10:51:25'),
(352, 'nschilli', 'users/account?uid=nschilli', 1, 'other_account', '2014-05-03 10:51:28'),
(353, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:51:33'),
(354, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:51:39'),
(355, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:51:47'),
(356, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:51:53'),
(357, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:51:56'),
(358, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:52:16'),
(359, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:52:17'),
(360, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:54:11'),
(361, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:54:14'),
(362, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:54:15'),
(363, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 10:54:17'),
(364, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 10:55:24'),
(365, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 11:12:33'),
(366, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 12:01:05'),
(367, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 12:01:07'),
(368, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 12:01:16'),
(369, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 12:01:19'),
(370, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 12:11:28'),
(371, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 12:11:30'),
(372, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 12:12:42'),
(373, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 12:14:35'),
(374, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 12:24:27'),
(375, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 12:25:23'),
(376, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 12:25:38'),
(377, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 12:25:55'),
(378, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 12:32:00'),
(379, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 12:39:17'),
(380, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 13:03:49'),
(381, 'nschilli', 'users/yearbook?letter=P', 1, 'yearbook_byletter', '2014-05-03 13:03:55'),
(382, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 13:03:58'),
(383, 'nschilli', 'users/account?uid=abouvier', 1, 'other_account', '2014-05-03 13:04:03'),
(384, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 13:11:46'),
(385, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 13:11:50'),
(386, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 13:11:58'),
(387, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-03 13:12:02'),
(388, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 13:12:04'),
(389, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 13:12:06'),
(390, 'nschilli', 'users/account?uid=abouvier', 1, 'other_account', '2014-05-03 13:12:11'),
(391, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 13:16:02'),
(392, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 13:16:05'),
(393, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 13:16:32'),
(394, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 13:17:01'),
(395, 'nschilli', 'users/logout', 1, 'logout', '2014-05-03 13:23:31'),
(396, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-03 13:23:48'),
(397, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 13:23:48'),
(398, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 13:24:01'),
(399, 'nschilli', 'users/account?uid=jgil', 1, 'other_account', '2014-05-03 13:24:04'),
(400, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 13:24:08'),
(401, 'nschilli', 'users/yearbook?letter=L', 1, 'yearbook_byletter', '2014-05-03 13:24:18'),
(402, 'nschilli', 'users/account?uid=lcharpen', 1, 'other_account', '2014-05-03 13:24:26'),
(403, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 13:43:45'),
(404, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 13:44:00'),
(405, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 13:44:09'),
(406, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 13:44:43'),
(407, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 13:44:47'),
(408, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 13:44:54'),
(409, 'nschilli', 'users/logout', 1, 'logout', '2014-05-03 13:44:57'),
(410, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-03 13:45:09'),
(411, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 13:45:09'),
(412, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-03 13:45:30'),
(413, 'nschilli', 'users/account?uid=abouvier', 1, 'other_account', '2014-05-03 13:45:36'),
(414, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 13:54:57'),
(415, 'nschilli', 'users/logout', 1, 'logout', '2014-05-03 13:55:00'),
(416, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-03 13:55:05'),
(417, 'nschilli', 'users/account', 1, 'my_account', '2014-05-03 13:55:05'),
(418, 'nschilli', 'users/logout', 1, 'logout', '2014-05-03 13:55:07'),
(419, 'dsousa', 'users/signin', 1, 'Signin', '2014-05-03 13:55:20'),
(420, 'dsousa', 'users/account', 1, 'my_account', '2014-05-03 13:55:20'),
(421, 'dsousa', 'users/logout', 1, 'logout', '2014-05-03 13:55:25'),
(422, 'jmancero', 'users/signin', 1, 'Signin', '2014-05-05 08:03:42'),
(423, 'jmancero', 'users/account', 1, 'my_account', '2014-05-05 08:03:42'),
(424, 'jmancero', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-05 08:03:46'),
(425, 'jmancero', 'users/account?uid=abosdeve', 1, 'other_account', '2014-05-05 08:03:57'),
(426, 'jmancero', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-05 08:04:29'),
(427, 'jmancero', 'users/logout', 1, 'logout', '2014-05-05 08:05:11'),
(428, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-05 08:05:18'),
(429, 'nschilli', 'users/account', 1, 'my_account', '2014-05-05 08:05:18'),
(430, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-05 08:05:24'),
(431, 'nschilli', 'users/account?uid=jmancero', 1, 'other_account', '2014-05-05 08:05:30'),
(432, 'jmancero', 'users/account', 1, 'my_account', '2014-05-05 08:07:03'),
(433, 'nschilli', 'users/account', 1, 'my_account', '2014-05-05 08:07:06'),
(434, 'jmancero', 'users/account', 1, 'my_account', '2014-05-05 08:07:23'),
(435, 'nschilli', 'users/account', 1, 'my_account', '2014-05-05 08:08:26'),
(436, 'nschilli', 'users/logout', 1, 'logout', '2014-05-05 08:12:28'),
(437, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-05 08:15:47'),
(438, 'nschilli', 'users/account', 1, 'my_account', '2014-05-05 08:15:47'),
(439, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-05 08:16:00'),
(440, 'nschilli', 'users/yearbook?letter=N', 1, 'yearbook_byletter', '2014-05-05 08:16:02'),
(441, 'nschilli', 'users/yearbook?letter=O', 1, 'yearbook_byletter', '2014-05-05 08:16:04'),
(442, 'nschilli', 'users/yearbook?letter=Q', 1, 'yearbook_byletter', '2014-05-05 08:16:05'),
(443, 'nschilli', 'users/yearbook?letter=S', 1, 'yearbook_byletter', '2014-05-05 08:16:07'),
(444, 'nschilli', 'users/yearbook?letter=T', 1, 'yearbook_byletter', '2014-05-05 08:16:08'),
(445, 'nschilli', 'users/account?uid=aderuell', 1, 'other_account', '2014-05-05 09:37:08'),
(446, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-05 09:37:10'),
(447, 'nschilli', 'users/yearbook?letter=C', 1, 'yearbook_byletter', '2014-05-05 09:37:15'),
(448, 'nschilli', 'users/account?uid=csalmon-', 1, 'other_account', '2014-05-05 09:37:25'),
(449, 'nschilli', 'users/logout', 1, 'logout', '2014-05-05 09:37:35'),
(450, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-05 09:37:55'),
(451, 'nschilli', 'users/account', 1, 'my_account', '2014-05-05 09:37:55'),
(452, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-05 09:38:00'),
(453, 'nschilli', 'users/account?uid=jtoubert', 1, 'other_account', '2014-05-05 09:38:14'),
(454, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-05 09:38:30'),
(455, 'nschilli', 'users/yearbook?letter=L', 1, 'yearbook_byletter', '2014-05-05 09:38:31'),
(456, 'nschilli', 'users/account?uid=laime', 1, 'other_account', '2014-05-05 09:38:33'),
(457, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-05 09:38:35'),
(458, 'nschilli', 'users/logout', 1, 'logout', '2014-05-05 09:38:38'),
(459, 'mbourlet', 'users/signin', 1, 'Signin', '2014-05-06 10:26:37'),
(460, 'mbourlet', 'users/account', 1, 'my_account', '2014-05-06 10:26:37'),
(461, 'mbourlet', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-06 10:27:05'),
(462, 'mbourlet', 'users/account?uid=mbourlet', 1, 'other_account', '2014-05-06 10:27:20'),
(463, 'mbourlet', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-06 10:27:22'),
(464, 'mbourlet', 'users/yearbook?letter=M', 1, 'yearbook_byletter', '2014-05-06 10:27:24'),
(465, 'mbourlet', 'users/account?uid=mcharbon', 1, 'other_account', '2014-05-06 10:27:53'),
(466, 'mbourlet', 'users/logout', 1, 'logout', '2014-05-06 10:28:02'),
(467, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-06 10:28:16'),
(468, 'nschilli', 'users/account', 1, 'my_account', '2014-05-06 10:28:16'),
(469, 'mbourlet', 'users/account', 1, 'my_account', '2014-05-06 10:28:27'),
(470, 'nschilli', 'users/account', 1, 'my_account', '2014-05-06 10:28:31'),
(471, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-06 10:29:02'),
(472, 'nschilli', 'users/account?uid=mbourlet', 1, 'other_account', '2014-05-06 10:29:08'),
(473, 'nschilli', 'users/logout', 1, 'logout', '2014-05-06 10:30:14'),
(474, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-07 11:16:06'),
(475, 'nschilli', 'users/account', 1, 'my_account', '2014-05-07 11:16:06'),
(476, 'nschilli', 'users/account', 1, 'my_account', '2014-05-07 11:16:43'),
(477, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-07 11:16:52'),
(478, 'nschilli', 'users/yearbook?letter=N', 1, 'yearbook_byletter', '2014-05-07 11:17:03'),
(479, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-07 11:17:05'),
(480, 'nschilli', 'users/account?uid=atorscho', 1, 'other_account', '2014-05-07 11:17:17'),
(481, 'atorscho', 'users/account', 1, 'my_account', '2014-05-07 11:17:38'),
(482, 'nschilli', 'users/account', 1, 'my_account', '2014-05-07 11:17:45'),
(483, 'nschilli', 'users/logout', 1, 'logout', '2014-05-07 11:17:48'),
(484, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-07 11:19:03'),
(485, 'nschilli', 'users/account', 1, 'my_account', '2014-05-07 11:19:03'),
(486, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-07 11:19:30'),
(487, 'nschilli', 'users/account?uid=jflorimo', 1, 'other_account', '2014-05-07 11:19:38'),
(488, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-13 07:38:31'),
(489, 'nschilli', 'users/account', 1, 'my_account', '2014-05-13 07:38:31'),
(490, 'nschilli', 'users/logout', 1, 'logout', '2014-05-13 07:46:46'),
(491, 'nschilli', 'users/signin', 1, 'Signin', '2014-05-21 07:38:40'),
(492, 'nschilli', 'users/account', 1, 'my_account', '2014-05-21 07:38:40'),
(493, 'nschilli', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-21 07:38:48'),
(494, 'jflorimo', 'users/signin', 1, 'Signin', '2014-05-26 15:45:49'),
(495, 'jflorimo', 'users/account', 1, 'my_account', '2014-05-26 15:45:49'),
(496, 'jflorimo', 'users/logout', 1, 'logout', '2014-05-26 15:45:54'),
(497, 'jflorimo', 'users/signin', 1, 'Signin', '2014-05-26 15:45:57'),
(498, 'jflorimo', 'users/account', 1, 'my_account', '2014-05-26 15:45:57'),
(499, 'jflorimo', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-26 16:00:41'),
(500, 'jflorimo', 'users/account?uid=aaraste', 1, 'other_account', '2014-05-26 16:00:45'),
(501, 'jflorimo', 'users/logout', 1, 'logout', '2014-05-26 16:27:19'),
(502, 'jflorimo', 'users/signin', 1, 'Signin', '2014-05-27 10:15:33'),
(503, 'jflorimo', 'users/account', 1, 'my_account', '2014-05-27 10:15:33'),
(504, 'jflorimo', 'users/signin', 1, 'Signin', '2014-05-27 14:01:20'),
(505, 'jflorimo', 'users/account', 1, 'my_account', '2014-05-27 14:01:20'),
(506, 'jflorimo', 'users/account', 1, 'my_account', '2014-05-27 14:03:10'),
(507, 'jflorimo', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-27 14:24:24'),
(508, 'jflorimo', 'users/account?uid=jbernabe', 1, 'other_account', '2014-05-27 14:24:33'),
(509, 'jflorimo', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-27 14:25:00'),
(510, 'jflorimo', 'users/yearbook?letter=A', 1, 'yearbook_byletter', '2014-05-27 14:25:01'),
(511, 'jflorimo', 'users/account?uid=aarrivat', 1, 'other_account', '2014-05-27 14:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `nbplaces` int(10) NOT NULL,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nbcredits` int(10) NOT NULL,
  `id_semestre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `semestre`
--

CREATE TABLE IF NOT EXISTS `semestre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `souscategories`
--

CREATE TABLE IF NOT EXISTS `souscategories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `id_categories` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categories` (`id_categories`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `souscategories`
--

INSERT INTO `souscategories` (`id`, `name`, `id_categories`) VALUES
(1, 'Fdf', 1),
(2, 'Wolf3d', 1),
(3, 'LS', 2),
(4, 'Libft', 3),
(5, 'Piscine', 4),
(6, 'Framework01', 4);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `uid` varchar(255) NOT NULL,
  `id_categories` int(10) NOT NULL DEFAULT '0',
  `id_souscategories` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_categories` (`id_categories`,`id_souscategories`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
