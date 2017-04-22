-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2016 at 02:15 PM
-- Server version: 10.0.28-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fintechr_fintech`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `account_type` varchar(250) NOT NULL,
  `account_holder` varchar(250) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `branch_code` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_number` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user_id`, `account_type`, `account_holder`, `bank`, `branch_code`, `timestamp`, `account_number`) VALUES
(1, 1, 'Cheque', 'Luthando Dyasi', 'Standard Bank', '20993', '2016-09-20 18:30:18', '070571392'),
(2, 2, 'Savings', 'n sedisa', 'Capitec Bank', '470010', '2016-09-20 18:34:28', '1110060384'),
(3, 3, 'Savings', 'Patricia', 'Capitec Bank', '470010', '2016-09-20 18:35:51', '1364892101'),
(4, 4, 'Cheque', 'Michael Khewana', 'FNB', '250655', '2016-09-20 18:36:52', '62634580428'),
(5, 5, 'Savings', 'n sedisa', 'ABSA Bank', '632005', '2016-09-20 18:36:54', '9306388507'),
(6, 6, 'Savings', 'n sedisa', 'Nedbank', '198765', '2016-09-20 18:38:23', '1131411936'),
(7, 7, 'Savings', 'p dwane', 'Capitec Bank', '470010', '2016-09-20 18:40:19', '1420623433'),
(8, 8, 'Cheque', 'Mt gaqisa', 'Standard Bank', '20993', '2016-09-20 18:41:17', '272735590'),
(9, 9, 'Savings', 'c sengoai', 'Capitec Bank', '470010', '2016-09-20 18:45:00', '1165660553'),
(10, 10, 'Savings', 'T cewu', 'Capitec Bank', '470010', '2016-09-20 18:46:56', '1420623433'),
(11, 11, 'Savings', 'm gaqisa', 'Capitec Bank', '470010', '2016-09-20 18:47:11', '1486890898'),
(12, 12, 'Savings', 'Andile', 'Capitec Bank', '470010', '2016-09-20 18:52:25', '1305896448'),
(13, 13, 'Savings', 'Zikhona', 'Capitec Bank', '470010', '2016-09-20 19:53:40', '1280209968'),
(14, 14, 'Savings', 'L.Poswayo', 'Capitec Bank', '470010', '2016-09-20 20:06:10', '1146515039'),
(15, 15, 'Savings', 'llewellyn whitelhane', 'Capitec Bank', '470010', '2016-09-20 20:08:24', '1171958348'),
(16, 16, 'Savings', 'L.Poswayo', 'Capitec Bank', '470010', '2016-09-20 20:09:04', '1146515039'),
(17, 17, 'Savings', 'Nqaba', 'Capitec Bank', '470010', '2016-09-20 20:56:44', '1195052667'),
(18, 18, 'Savings', 'Dlamini Phumlile K', 'FNB', '281064', '2016-09-20 21:14:34', '62233329780'),
(19, 19, 'Savings', 'Nolukhanyo Dyibishe', 'Capitec Bank', '470010', '2016-09-21 04:35:05', '1419952356'),
(20, 20, 'Savings', 'Letty mkhize', 'Capitec Bank', '470010', '2016-09-21 05:41:19', '1353370249'),
(21, 31, 'Savings', 'Z Mtirara', 'Capitec Bank', '470010', '2016-09-21 06:13:51', '1295294360'),
(22, 32, 'Savings', 'NB Mbotho', 'Capitec Bank', '470010', '2016-09-21 06:30:15', '1220785774'),
(23, 33, 'Savings', 'zama mkhize', 'Standard Bank', '015001', '2016-09-21 06:30:21', '10059622219'),
(24, 34, 'Savings', 'Khumzie', 'Capitec Bank', '470010', '2016-09-21 07:38:43', '1141722699'),
(25, 35, 'Savings', 'Mthembu ZZL', 'FNB', '220830', '2016-09-21 08:17:22', '62609788370'),
(26, 36, 'Savings', 'Mushaisano', 'Capitec Bank', '470010', '2016-09-21 08:24:06', '1456257089'),
(27, 37, 'Savings', 'Gaynor Saayman', 'Capitec Bank', '470010', '2016-09-21 09:28:15', '1229427366'),
(28, 38, 'Savings', 'N SEDISA', 'Nedbank', '198765', '2016-09-21 10:28:35', '1131411986'),
(29, 39, 'Savings', 'N SEDISA', 'Nedbank', '198765', '2016-09-21 10:28:52', '1131411986'),
(30, 40, 'Savings', 'TC foromo', 'Standard Bank', '20993', '2016-09-21 10:35:26', '407613331'),
(31, 41, 'Savings', 'P.L Makaluza', 'Capitec Bank', '470010', '2016-09-21 10:56:36', '1310119005'),
(32, 42, 'Savings', 'test', 'Capitec Bank', '470010', '2016-09-21 11:16:16', '198745661'),
(33, 43, 'Cheque', 'N RWABABA', 'FNB', '250655', '2016-09-21 11:48:32', '62413564891'),
(34, 44, 'Savings', 'Mv phosiwa', 'Capitec Bank', '470010', '2016-09-21 12:32:32', '1294340067'),
(35, 45, 'Savings', 'Ndilisa Siwela', 'Capitec Bank', '470010', '2016-09-21 13:25:39', '1140510361'),
(36, 46, 'Savings', 'Andile', 'Capitec Bank', '470010', '2016-09-21 13:51:11', '1304795126'),
(37, 47, 'Savings', 'A.M. Tembe', 'Capitec Bank', '470010', '2016-09-21 15:53:05', '1290024381'),
(38, 48, 'Savings', 'SIMONE HESS', 'Capitec Bank', '470010', '2016-09-21 20:22:11', '1308937456'),
(39, 49, 'Savings', 'N. S', 'Capitec Bank', '470010', '2016-09-21 20:27:03', '1110060384'),
(40, 50, 'Savings', 'M. T gaqisa', 'Capitec Bank', '470010', '2016-09-21 20:31:31', '1486890898'),
(41, 51, 'Savings', 'm. khewana', 'FNB', '250655', '2016-09-21 20:35:25', '62634580428'),
(42, 52, 'Savings', 'thando diyasi', 'Standard Bank', '20993', '2016-09-21 20:39:51', '070571392'),
(43, 53, 'Savings', 'craig cleophas', 'FNB', '250655', '2016-09-21 21:04:01', '74589762522'),
(44, 54, 'Savings', 'P. yotsi', 'Capitec Bank', '470010', '2016-09-21 21:07:46', '1364892101'),
(45, 55, 'Savings', 't cewu', 'Capitec Bank', '470010', '2016-09-21 21:16:43', '1483258775'),
(46, 56, 'Savings', 'C. SENGOAI', 'Capitec Bank', '470010', '2016-09-21 21:20:30', '1165660553'),
(47, 57, 'Cheque', 'wgt credit repair', 'Standard Bank', '20993', '2016-09-21 21:27:42', '271045892'),
(48, 58, 'Savings', 'llewellyn whitelhane', 'Capitec Bank', '470010', '2016-09-21 21:50:28', '1171958348'),
(49, 59, 'Cheque', 'GIFT QAKAZA', 'FNB', '250655', '2016-09-21 22:46:55', '62617737484'),
(50, 60, 'Savings', 'Anelile Dlamini', 'FNB', '281064', '2016-09-22 07:38:53', '62233329780(swaziland)'),
(51, 61, 'Savings', 'Nonzukiso Bomela', 'Standard Bank', '050410', '2016-09-22 09:45:39', '375215247'),
(52, 62, 'Cheque', 'Precious Shabangu', 'Nedbank', '198765', '2016-09-22 10:51:28', '1106839935'),
(53, 63, 'Cheque', 'Precious Shabangu', 'Nedbank', '198765', '2016-09-22 11:06:03', '1106839935'),
(54, 64, 'Savings', 'Precious Shabangu', 'Nedbank', '198765', '2016-09-22 11:38:53', '1106839935'),
(55, 65, 'Savings', 'llewellyn whitelhane', 'Capitec Bank', '470010', '2016-09-22 12:50:14', '1171958348'),
(56, 66, 'Savings', 'TI Khanyile', 'Capitec Bank', '470010', '2016-09-22 12:58:05', '1358508990'),
(57, 67, 'Savings', 'TT Abrahams', 'Capitec Bank', '470010', '2016-09-22 14:56:52', '1185686906'),
(58, 68, 'Savings', 'F.C.MPITI', 'Capitec Bank', '470010', '2016-09-22 15:12:03', '1422475571'),
(59, 69, 'Savings', 'P. DWANE', 'Capitec Bank', '470010', '2016-09-22 19:46:14', '1420623433'),
(60, 70, 'Savings', 'N august', 'Capitec Bank', '470010', '2016-09-22 20:56:08', '1441550257'),
(61, 71, 'Savings', 'N august', 'Capitec Bank', '470010', '2016-09-22 20:56:13', '1441550257'),
(62, 72, 'Savings', 'N August', 'Capitec Bank', '470010', '2016-09-22 21:00:01', '1441550257'),
(63, 73, 'Savings', 'Lindiwe Macingwane', 'Nedbank', '198765', '2016-09-23 10:23:33', '1051336511'),
(64, 74, 'Savings', 'Sbusiso Michael Msweli', 'Capitec Bank', '470010', '2016-09-23 11:04:30', '1389863822'),
(65, 75, 'Savings', 'Z ntuli', 'Capitec Bank', '470010', '2016-09-23 11:52:17', '1489627675'),
(66, 76, 'Savings', 'V Balintulo', 'ABSA Bank', '632005', '2016-09-23 13:53:29', '9244034173'),
(67, 77, 'Savings', 'S Ningi Magcaba', 'Capitec Bank', '470010', '2016-09-23 18:25:19', '1258240104'),
(68, 78, 'Savings', 'craig cleophas', 'FNB', '250655', '2016-09-23 19:34:01', '74589762522'),
(69, 79, 'Savings', 'SIMONE HESS', 'Capitec Bank', '470010', '2016-09-23 19:48:05', '1308937456'),
(70, 80, 'Savings', 'Lindokuhle', 'Nedbank', '4680', '2016-09-24 00:49:45', '1877028320'),
(71, 81, 'Savings', 'Linda Mokoena Diniso', 'Nedbank', '198765', '2016-09-24 05:12:22', '1127937723'),
(72, 82, 'Savings', 'Lindiwe Macingwane', 'Nedbank', '198765', '2016-09-24 06:50:14', '1051336511'),
(73, 83, 'Savings', 'lindiwe', 'Nedbank', '198765', '2016-09-24 07:13:22', '1051336511'),
(74, 84, 'Savings', 'm.', 'FNB', '250655', '2016-09-24 07:37:00', '62634580428'),
(75, 85, 'Savings', 'p.yotsi', 'Capitec Bank', '470010', '2016-09-24 07:41:12', '1364892101'),
(76, 86, 'Savings', 'A.M TEMBE', 'Capitec Bank', '470010', '2016-09-24 07:49:33', '1290024381'),
(77, 87, 'Savings', 'A.M TEMBE', 'Capitec Bank', '470010', '2016-09-24 07:49:34', '1290024381'),
(78, 88, 'Savings', 'A.M TEMBE', 'Capitec Bank', '470010', '2016-09-24 07:49:37', '1290024381'),
(79, 89, 'Savings', 'Matshidiso', 'Capitec Bank', '470010', '2016-09-24 15:48:00', '1290024381'),
(80, 90, 'Savings', 'Nonkululeko', 'Capitec Bank', '470010', '2016-09-25 07:55:13', '1334873958'),
(81, 91, 'Savings', 'Nosipho Jojwana', 'Nedbank', '198765', '2016-09-25 15:17:12', '1118587510'),
(82, 92, 'Savings', 'Nosipho Jojwana', 'Nedbank', '198765', '2016-09-25 15:17:12', '1118587510'),
(83, 93, 'Savings', 'bacacile', 'ABSA Bank', '632005', '2016-09-25 18:09:15', '9311385756'),
(84, 94, 'Savings', 'Johannes Mauwers', 'FNB', '250655', '2016-10-01 05:14:54', '62500093159'),
(85, 95, 'Savings', 'P Dwane', 'Capitec Bank', '470010', '2016-10-03 09:05:59', '1420623433'),
(86, 96, 'Savings', 'shaun', 'Capitec Bank', '470010', '2016-12-20 10:01:13', '1265503395'),
(87, 97, 'Savings', 'Isabella Vuyelwa Qabaka', 'Capitec Bank', '470010', '2016-12-20 18:14:04', '1122444654'),
(88, 98, 'Cheque', 'Z Doni', 'Nedbank', '198765', '2016-12-20 19:16:26', '1071418807'),
(89, 99, 'Savings', 'Victoria Bobelo', 'Capitec Bank', '470010', '2016-12-20 20:39:10', '1218035119'),
(90, 100, 'Savings', 'Victoria Bobelo', 'Capitec Bank', '470010', '2016-12-20 20:41:10', '1218035119');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `username`, `password`, `timestamp`) VALUES
(1, 4, 'admin', 'thando', '2016-09-16 16:04:46'),
(2, 2, 'adminmapule', '21maps', '2016-09-20 19:08:39'),
(3, 3, 'adminpat', '09pat', '2016-09-20 19:09:08'),
(4, 4, 'adminmike', '456mike', '2016-09-20 19:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `getter_request`
--

CREATE TABLE IF NOT EXISTS `getter_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `request_amount` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `getter_request`
--

INSERT INTO `getter_request` (`id`, `user_id`, `request_amount`, `timestamp`) VALUES
(1, 95, 1000, '2016-10-03 09:20:28'),
(2, 96, 1000, '2016-12-20 10:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `helper_user_id` int(100) NOT NULL,
  `getter_user_id` int(100) NOT NULL,
  `amount_paid` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `date_chosen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `due_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reward_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `helper_user_id`, `getter_user_id`, `amount_paid`, `status`, `date_chosen`, `due_date`, `reward_date`) VALUES
(1, 18, 12, '2000', 2, '2016-09-22 18:54:07', '2016-09-24 09:16:16', '2016-09-27 09:16:16'),
(2, 5, 6, '10000', 2, '2016-09-21 10:19:32', '2016-09-24 09:58:21', '2016-09-27 09:58:21'),
(3, 6, 5, '20000', 3, '2016-09-24 22:00:50', '2016-09-24 10:22:11', '2016-09-27 10:22:11'),
(4, 5, 38, '3000', 3, '2016-09-24 22:00:50', '2016-09-24 10:38:57', '2016-09-27 10:38:57'),
(5, 18, 53, '1000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(6, 15, 7, '8000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(7, 15, 10, '8000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(8, 15, 2, '10000', 2, '2016-09-22 11:03:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(9, 15, 4, '10000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(10, 15, 8, '10000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(11, 15, 3, '6000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(12, 15, 9, '6000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(13, 60, 51, '1000', 2, '2016-09-22 09:02:53', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(14, 61, 1, '5000', 2, '2016-09-22 13:22:39', '2016-09-25 10:07:55', '2016-09-28 10:07:55'),
(15, 48, 58, '3000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(16, 48, 15, '10000', 2, '2016-09-22 11:26:31', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(17, 63, 48, '20000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(18, 15, 49, '1000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(19, 15, 49, '1000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(20, 15, 49, '1000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(21, 15, 54, '1000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(22, 15, 57, '1000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(23, 15, 56, '1000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(24, 15, 50, '1000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(25, 15, 52, '1000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(26, 15, 55, '1000', 2, '2016-09-23 20:05:36', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(27, 15, 37, '2000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(28, 15, 41, '2000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(29, 15, 11, '4000', 3, '2016-09-25 22:16:05', '2016-09-25 10:00:00', '2016-09-28 10:00:00'),
(30, 18, 60, '2000', 2, '2016-09-23 07:16:56', '2016-09-26 10:00:00', '2016-09-29 10:00:00'),
(31, 45, 65, '3000', 2, '2016-09-23 10:41:33', '2016-09-26 10:37:22', '2016-09-29 10:37:22'),
(32, 77, 69, '1000', 3, '2016-09-26 23:16:03', '2016-09-26 10:00:00', '2016-09-29 10:00:00'),
(33, 48, 15, '2000', 2, '2016-09-24 07:50:09', '2016-09-27 10:00:00', '2016-09-30 10:00:00'),
(34, 48, 15, '2000', 2, '2016-09-24 07:49:54', '2016-09-27 10:00:00', '2016-09-30 10:00:00'),
(35, 15, 48, '1000', 3, '2016-09-28 03:42:59', '2016-09-27 10:00:00', '2016-09-30 10:00:00'),
(36, 14, 79, '3000', 2, '2016-09-24 08:01:12', '2016-09-27 10:00:00', '2016-09-30 10:00:00'),
(37, 94, 84, '1000', 3, '2016-12-20 06:36:08', '2016-10-04 10:00:00', '2016-10-07 10:00:00'),
(38, 7, 85, '1000', 3, '2016-12-20 06:36:08', '2016-10-06 09:16:17', '2016-10-09 09:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `cell_number` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `refferal_number` varchar(40) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `cell_number`, `gender`, `email`, `refferal_number`, `password`, `username`, `status`, `timestamp`) VALUES
(1, 'Luthando', 'Dyasi', '0620051842', 'Male', 'dyasithando@gmail.com', '0837168144', 'Dya@4500', 'luthando1', 1, '2016-09-20 19:21:49'),
(2, 'mapule', 'sedisa', '0737685833', 'Female', NULL, NULL, 'matuka', 'retha', 1, '2016-09-20 19:22:09'),
(3, 'Patricia', 'Yotsi', '0782549561', 'Female', 'yotsijuni@gmail.com', '0782549561', 'nqobile', 'Patpat', 1, '2016-09-20 19:22:37'),
(4, 'michael', 'khewana', '0837168144', 'Male', 'mikaeelkhewana@gmail.com', '0782549561', 'aisha', 'mikaeel', 1, '2016-09-20 19:23:25'),
(5, 'mapule1', 'sedisa', '0737685833', 'Female', 'msedisa@yahoo.com', NULL, 'matuka', 'retha1', 1, '2016-09-20 19:23:54'),
(6, 'mapule2', 'sedisa', '0746566650', 'Female', NULL, NULL, 'matuka', 'retha2', 1, '2016-09-20 19:28:55'),
(7, 'tumelo', 'dwane', '0746566650', 'Male', NULL, NULL, 'phumelele', 'tumid', 1, '2016-09-20 19:24:59'),
(8, 'Mongezi', 'Gaqisa', 'O795364322', 'Male', 'yotsijuni@gmail.com', '0782549561', 'patricia', 'Patpat', 1, '2016-09-20 19:25:54'),
(9, 'charmaine', 'sengoai', '0726647846', 'Female', 'csengoai@gmail.com', '0737685833', 'fatima', 'aisha', 1, '2016-09-20 19:27:18'),
(10, 'Thabo', 'Cewu', '0766482411', 'Male', 'yotsijuni@gmail.com', '0782549561', 'thabocewu', 'pyotsi', 1, '2016-09-21 09:12:43'),
(11, 'mongezi', 'gaqisa', '0795364322', 'Male', NULL, NULL, 'gaqisa', 'nqobile', 1, '2016-09-21 09:13:16'),
(12, 'Andile', 'Bobotyane', '0620051842', 'Male', 'lasiyasiya3@gmail.com', '0620051842', 'aija', 'andile1', 1, '2016-09-20 19:28:29'),
(13, 'Imange', 'Xuza', '0786662455', 'Female', NULL, NULL, 'zikhona87', 'Zish', 0, '2016-09-20 19:53:40'),
(14, 'Lungelwa', 'Poswayo', '0724591732', 'Female', 'lungelwaposwayo@gmail.com', '078 2549561', 'ntshontsho', 'Lungelwa Poswayo', 0, '2016-09-20 20:06:10'),
(15, 'llewellyn', 'whitelhane', '0620650477', 'Male', 'lecharn@gmail.com', '0737685833', 'newbegin', 'lecharn', 1, '2016-09-21 09:13:40'),
(16, 'Lungelwa', 'Poswayo', '0724591732', 'Female', NULL, '078 2549561', 'ntshontsho', 'Lungelwa Poswayo', 0, '2016-09-20 20:09:04'),
(17, 'Bongiwe', 'Ncamazana', '0732993775', 'Female', 'bodza1016@gmail.com', '0620650477', 'Meza1016', 'Bodza', 0, '2016-09-20 20:56:44'),
(18, 'Phumlile', 'Dlamini', '+26876477568', 'Female', 'pamdlamini6000@gmail.com', NULL, '76892898', 'Phumlilek', 0, '2016-09-20 21:14:34'),
(19, 'Sweetness', 'Dyibishe', '0633366094', 'Female', 'khanyogqadu@gmail.com', '0732993775', 'nolha0909', 'Sweetness09', 0, '2016-09-21 04:35:05'),
(20, 'Lettie', 'Sikhosana', '0733946274', 'Female', 'letty.mkhize1985@gmail.com', NULL, 'letty1985', 'Lettie', 0, '2016-09-21 05:41:19'),
(31, 'Zodwa', 'Mtirara', '0733702764', 'Female', 'zodwa.mtirara@gmail.com', NULL, 'Liwa2013', 'zodz2013', 0, '2016-09-21 06:13:51'),
(32, 'Lelo', 'Mdluli', '0725039809', 'Female', 'mbotho.mpume@gmail.com', NULL, 'mpumetom32', 'Raindrops', 0, '2016-09-21 06:30:15'),
(33, 'zama', 'mkhize', '0789411410', 'Female', 'zamakhambula@gmail.com', '0789411410', 'makhambula2', 'lubanzi', 0, '2016-09-21 06:30:21'),
(34, 'Bucie', 'Khumie', '0822152937', 'Female', 'bckhm4@gmail.com', NULL, 'BucieK@1906', 'Bucie', 0, '2016-09-21 07:38:42'),
(35, 'Lehlonono', 'Mthembu', '0725471695', 'Female', NULL, NULL, '212sexy', 'Zenhlanhla', 0, '2016-09-21 08:17:22'),
(36, 'Mushaisano', 'Netshimboni', '0839781877', 'Female', 'Mush.netshimboni@gmail.com', NULL, 'zwoluga2', 'Mush', 0, '2016-09-21 08:24:06'),
(37, 'Gaynor', 'Saayman', '0725218208', 'Female', NULL, NULL, 'miguel', 'Gaynor', 1, '2016-09-21 10:58:50'),
(38, 'ellen', 'sedidi', '0746566650', 'Female', 'sedisamapulane@gmail.com', '0737685833', 'matuka', 'ellen', 1, '2016-09-21 10:31:53'),
(39, 'ellen', 'sedidi', '0746566650', 'Female', 'sedisamapulane@gmail.com', '0737685833', 'matuka', 'ellen', 0, '2016-09-21 10:28:52'),
(40, 'Chesney', 'foromo', '0835891569', 'Male', 'foromotc@gmail.com', '0620650477', 'Forom@2', 'Leo', 0, '2016-09-21 10:35:26'),
(41, 'phathiswa', 'makaluza', '0740349577', 'Female', 'letitia.makaluza@gmail.com', '0737685833', '0740349577', 'endie', 1, '2016-09-21 10:58:26'),
(43, 'LELO', 'RWABABA', '0621144717', 'Female', 'mpumyr@gmail.com', NULL, 'Moola2016', 'LEE', 0, '2016-09-21 11:48:32'),
(44, 'Mahlatse', 'Phosiwa', '0795694545', 'Male', 'mv.phosiwa@gmail.com', NULL, 'Phosiwa@84', 'Hlacks', 0, '2016-09-21 12:32:32'),
(45, 'Ndilisa', 'Siwela', '0608862613', 'Female', 'Ndilisa.siwela@uct.ac.za', '0782549561', 'zusakhe1', 'ndilisasiwela', 0, '2016-09-21 13:25:39'),
(46, 'Andy', 'Leh', '0748021893', 'Male', 'mgcuzu@gmail.com', NULL, 'Leh8021893', 'Andilencayiyana', 0, '2016-09-21 13:51:10'),
(47, 'Matshidiso', 'Tembe', '0828014381', 'Female', NULL, '0737685833', 'tembea', 'matemeku', 0, '2016-09-21 15:53:05'),
(48, 'SIMONE', 'HESS', '0765607297', 'Female', 'patty@gmail.com', '0620650477', 'newbegin', 'simone', 1, '2016-09-21 20:23:40'),
(49, 'aphiwe', 'dwane', '0746566650', 'Male', 'aphiwe@gmail.com', NULL, 'newbegin', 'aphiwe', 1, '2016-09-21 20:27:49'),
(50, 'nqobile', 'gaqisa', '0795364322', 'Male', 'nqobile@gmail.com', NULL, 'newbegin', 'nqobile', 1, '2016-09-21 20:32:23'),
(51, 'mikaeel', 'gqoboza', '0837168144', 'Male', 'mikaeel@gmail.com', NULL, 'newbegin', 'mikaeel', 1, '2016-09-21 20:36:16'),
(52, 'sinethemba', 'mawawa', '0620051842', 'Male', 'thando@gmail.com', NULL, 'newbegin', 'thando', 1, '2016-09-21 20:40:40'),
(53, 'craig', 'cleophas', '0762758528', 'Male', 'craig44@gmail.com', NULL, 'newbegin', 'craig', 1, '2016-09-21 21:04:46'),
(54, 'zandile', 'ntuli', '0749153728', 'Female', 'zandil107@webmail.com', NULL, 'newbegin', 'zandile', 1, '2016-09-21 21:08:40'),
(55, 'mandisi', 'cewu', '0766482411', 'Male', 'mandisi244@gmail.com', NULL, 'newbegin', 'mandisi', 1, '2016-09-21 21:17:35'),
(56, 'charmaine', 'sengoai', '0726647846', 'Female', 'charmainesen@gmail.com', NULL, 'newbegin', 'charmaine', 1, '2016-09-21 21:21:19'),
(57, 'arlene', 'arendse', '0790606713', 'Male', 'arlenearendse@gmail.com', NULL, 'newbegin', 'arlene', 1, '2016-09-21 21:28:42'),
(58, 'llewellyn', 'whitelhane', '0620650477', 'Male', 'llewellynwh@gmail.com', NULL, 'newbegin', 'llewellyn', 1, '2016-09-21 21:51:09'),
(59, 'GIFT', 'Qakaza', '0622077294', 'Male', 'altimodruggs@gmail.com', NULL, 'THANDOWAMI', 'GIFT', 0, '2016-09-21 22:46:54'),
(60, 'Anelile', 'Dlamini', '78043717', 'Female', NULL, NULL, '78043717', 'Anelile', 0, '2016-09-22 07:38:53'),
(61, 'Nonzukiso', 'Bomela', '0732372207', 'Female', 'teaxob@gmail.com', NULL, 'taxiebbm', '0732372207', 0, '2016-09-22 09:45:39'),
(62, 'Precious', 'Shabangu', '0818427072', 'Female', 'shabangupbl@gmail.com', '0620650477', '2003uvo', 'shabangupbl@gmail.com', 0, '2016-09-22 10:51:28'),
(63, 'Precious', 'Shabangu', '0818427072', 'Female', 'shabangupbl@gmail.com', '0620650477', '2003luvo', 'shabangupbl@gmail.com', 0, '2016-09-22 11:06:03'),
(64, 'Precious Shabangu', 'Shabangu', '0613733703', 'Male', 'shabangupbl@gmail.com', NULL, '2003luvo', 'shabangupbl@gmail.com', 0, '2016-09-22 11:38:52'),
(65, 'llewellyn', 'whitelhane', '0620650477', 'Male', 'llewellynwhite@gmail.com', NULL, 'newbegin', 'whitelhane', 1, '2016-09-22 12:51:17'),
(66, 'Thobeka', 'Khanyile', '0785945621', 'Female', NULL, NULL, 'P@ssp0rt123', 'thobekak', 0, '2016-09-22 12:58:05'),
(67, 'Thando Abrahams', 'Abrahams', '763905303', 'Male', 'thando.abrahams@gmail.com', NULL, 'triggersslikhanyise123', 'Triggerss', 0, '2016-09-22 14:56:52'),
(68, 'MPITI', '', '', 'Male', 'charlesmpiti@yahoo.com', NULL, 'rethabile2011', 'MPITI56', 0, '2016-09-22 15:12:03'),
(69, 'phumelele', 'dwane', '844795195', 'Male', 'dwane234@gmail.com', NULL, 'newbegin', 'dwane', 1, '2016-09-22 19:47:36'),
(70, 'Nono', 'August', '744874112', 'Female', 'augustdisso@gmail.com', NULL, 'sizanati', 'lizalese', 0, '2016-09-22 20:56:08'),
(71, 'Nono', 'August', '744874112', 'Female', 'augustdisso@gmail.com', NULL, 'sizanati', 'lizalese', 0, '2016-09-22 20:56:13'),
(72, 'Nono', 'August', '744874112', 'Female', 'zukieaugust@gmail.com', NULL, 'lizalise', 'disso', 0, '2016-09-22 21:00:00'),
(73, 'Lindiwe Nombasa', 'Macingwane', '744632112', 'Female', 'victor.macingwane001@gmail.com', '0744632112', 'zanele20', '0744632112', 0, '2016-09-23 10:23:33'),
(74, 'Toyz', 'Seme', '735932352', 'Male', 'smsweli2@gmail.com', NULL, 'hoopersa3', 'Toyz', 0, '2016-09-23 11:04:30'),
(75, 'Zandile', 'Ntuli', '749153728', 'Female', 'yotsijuni@gmail.com', '0782549561', 'zandile', 'Zanzan', 0, '2016-09-23 11:52:17'),
(76, 'Victoria', 'Balintulo', '837497518', 'Female', 'mbalintulo@gmail.com', '0837685833', 'makhaya', 'mambongo', 0, '2016-09-23 13:53:29'),
(77, 'ningi', 'Magcaba', '787928154', 'Female', 'ninginingie2@gmail.com', '0620650477', '170408', 'ningie', 0, '2016-09-23 18:25:19'),
(78, 'craig', 'cleophas', '611486592', 'Male', 'ccleophas@gmail.com', NULL, 'newbegin', 'cleophas', 1, '2016-09-23 19:36:30'),
(79, 'SIMONE', 'HESS', '765607297', 'Male', 'hess@gmail.com', NULL, 'newbegin', 'hess', 1, '2016-09-23 19:49:54'),
(80, 'Lindokuhle', 'Mqadi', '738327379', 'Male', 'lindohmqadi@gmail.com', '0620650477', '8571010', 'Mlindoz85', 0, '2016-09-24 00:49:45'),
(81, 'Linda', 'Mokoena Diniso', '792568083', 'Female', NULL, '0724591732', 'Lilitha', 'Linda Mokoena Diniso', 0, '2016-09-24 05:12:22'),
(82, 'Lindiwe Nombasa', 'Macingwane', '744632112', 'Female', 'lindiwe.macingwane@gmail.com', '0744632112', 'zanele20', '0744632112', 0, '2016-09-24 06:50:14'),
(83, 'lindiwe', 'macingwa', '744632112', 'Male', 'zanele@gmail.com', '0620650477', 'zanele21', 'lindiwe', 1, '2016-09-24 07:16:09'),
(84, 'mikaeel', 'gqoboza', '837168144', 'Male', 'mikaeel1@gmail.com', NULL, 'newbegin', 'mikaeel', 1, '2016-09-24 07:42:26'),
(85, 'patricia', 'yotsi', '782549561', 'Male', 'patryotsi@gmail.com', NULL, 'newbegin', 'patricia', 1, '2016-09-24 07:42:47'),
(86, 'Matshidiso', 'Tembe', '828014381', 'Female', 'matemeku@webmail.co.za', NULL, 'tembea', 'Tshidi', 0, '2016-09-24 07:49:33'),
(87, 'Matshidiso', 'Tembe', '828014381', 'Female', 'matemeku@webmail.co.za', NULL, 'tembea', 'Tshidi', 0, '2016-09-24 07:49:34'),
(88, 'Matshidiso', 'Tembe', '828014381', 'Female', 'matemeku@webmail.co.za', NULL, 'tembea', 'Tshidi', 0, '2016-09-24 07:49:37'),
(89, 'Matshidiso', 'tembe', '828014381', 'Female', 'matshidiso@gmail.com', NULL, 'Matshidisotembe1', 'Matshidiso', 1, '2016-09-24 15:50:07'),
(90, 'Nonkululeko', 'Ngcobo', '721121458', 'Female', 'simongcobo@icloud.com', '0828014381', 'nkule1', 'Nkule', 0, '2016-09-25 07:55:13'),
(91, 'Nosipho', 'Jojwana', '835515208', 'Female', 'nosipho.jojwana@gmail.com', NULL, 'nosipho.1', 'Nosie22', 0, '2016-09-25 15:17:12'),
(92, 'Nosipho', 'Jojwana', '835515208', 'Female', 'nosipho.jojwana@gmail.com', NULL, 'nosipho.1', 'Nosie22', 0, '2016-09-25 15:17:12'),
(93, 'Celiwe Memela', '', '717359721', 'Female', 'memelabaca1@gmail.com', '0737685833', 'bacacile84', 'celiwe', 0, '2016-09-25 18:09:15'),
(94, 'Johannes', 'Mauwers', '728735483', 'Male', 'Jmauwers@gmail.com', '0728735483', 'qwertyuioP9105', 'johannesmauwers@gmail.com', 0, '2016-10-01 05:14:54'),
(95, 'Phumelele', 'Dwane', '746566650', 'Male', 'petrussedisa@gmail.com', '0737685933', 'dwane', 'Phumelele', 1, '2016-10-03 09:09:57'),
(96, 'shawn', 'tebo', '739482644', 'Male', NULL, NULL, 'shawn1950', 'shawn', 0, '2016-12-20 10:01:13'),
(97, 'Vuyelwa', 'Qabaka', '727971225', 'Female', 'isabellaqabs@gmail.com', 'N/A', '072 797 1225', 'mavuyi', 0, '2016-12-20 18:14:04'),
(98, 'Zam', 'Doni', '791272719', 'Female', 'zamanid1012@gmail.com', '0791272719', 'mani1012', 'Zam', 0, '2016-12-20 19:16:26'),
(99, 'Victoria', 'Bobelo', '719761117', 'Female', 'victoriakobe1@gmail.com', '1967', '1026', 'lisak', 0, '2016-12-20 20:39:09'),
(100, 'Victoria', 'Bobelo', '719761117', 'Male', 'victoriakobe1@gmail.com', '1967', '1026', 'lisak', 0, '2016-12-20 20:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE IF NOT EXISTS `user_status` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '1',
  `amount_expected` double NOT NULL,
  `tranction_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 - Not Chosen 1- Pending 2- Paid 3 - Overdue',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `user_id`, `user_type`, `amount_expected`, `tranction_status`, `timestamp`) VALUES
(1, 1, 1, 5000, 2, '2016-09-22 13:22:39'),
(2, 2, 1, 10000, 2, '2016-09-22 11:03:05'),
(3, 3, 1, 6000, 3, '2016-09-26 08:55:22'),
(4, 4, 1, 10000, 3, '2016-09-26 08:55:22'),
(5, 5, 1, 8000, 3, '2016-09-26 08:55:22'),
(6, 7, 1, 8000, 3, '2016-09-26 08:55:22'),
(7, 8, 1, 10000, 3, '2016-09-26 08:55:22'),
(8, 9, 1, 6000, 3, '2016-09-26 08:55:22'),
(9, 12, 1, 2000, 2, '2016-09-22 18:54:07'),
(10, 6, 1, 10000, 2, '2016-09-21 10:19:32'),
(11, 10, 1, 8000, 3, '2016-09-26 08:55:22'),
(12, 11, 1, 4000, 3, '2016-09-26 08:55:22'),
(13, 15, 1, 10000, 2, '2016-09-24 07:49:54'),
(14, 18, 2, 4000, 0, '2016-09-22 18:54:07'),
(15, 5, 2, 20000, 3, '2016-09-26 08:55:22'),
(16, 6, 2, 40000, 1, '2016-09-21 10:22:16'),
(17, 38, 1, 3000, 3, '2016-09-26 08:55:22'),
(18, 5, 2, 6000, 3, '2016-09-26 08:55:22'),
(19, 41, 1, 2000, 3, '2016-09-26 08:55:22'),
(20, 37, 1, 2000, 3, '2016-09-26 08:55:22'),
(21, 48, 1, 1000, 3, '2016-09-26 08:55:22'),
(22, 49, 1, 1000, 3, '2016-09-26 08:55:22'),
(23, 50, 1, 1000, 3, '2016-09-26 08:55:22'),
(24, 51, 1, 1000, 2, '2016-09-22 09:02:53'),
(25, 52, 1, 1000, 3, '2016-09-26 08:55:22'),
(26, 53, 1, 1000, 3, '2016-09-26 08:55:22'),
(27, 54, 1, 1000, 3, '2016-09-26 08:55:22'),
(28, 55, 1, 1000, 2, '2016-09-23 20:05:36'),
(29, 56, 1, 1000, 3, '2016-09-26 08:55:22'),
(30, 57, 1, 1000, 3, '2016-09-26 08:55:22'),
(31, 58, 1, 3000, 3, '2016-09-26 08:55:22'),
(32, 18, 2, 2000, 0, '2016-09-22 18:54:07'),
(33, 15, 2, 16000, 2, '2016-09-24 07:49:54'),
(34, 15, 2, 16000, 2, '2016-09-24 07:49:54'),
(35, 15, 2, 20000, 2, '2016-09-24 07:49:54'),
(36, 15, 2, 20000, 2, '2016-09-24 07:49:54'),
(37, 15, 2, 20000, 2, '2016-09-24 07:49:54'),
(38, 15, 2, 12000, 2, '2016-09-24 07:49:54'),
(39, 15, 2, 12000, 2, '2016-09-24 07:49:54'),
(40, 60, 2, 2000, 2, '2016-09-23 07:16:56'),
(41, 61, 2, 10000, 0, '2016-09-22 13:22:39'),
(42, 48, 2, 6000, 3, '2016-09-26 08:55:22'),
(43, 48, 2, 20000, 3, '2016-09-26 08:55:22'),
(44, 63, 2, 40000, 1, '2016-09-22 11:39:32'),
(45, 65, 1, 3000, 2, '2016-09-23 10:41:33'),
(46, 15, 2, 2000, 2, '2016-09-24 07:49:54'),
(47, 15, 2, 2000, 2, '2016-09-24 07:49:54'),
(48, 15, 2, 2000, 2, '2016-09-24 07:49:54'),
(49, 15, 2, 2000, 2, '2016-09-24 07:49:54'),
(50, 15, 2, 2000, 2, '2016-09-24 07:49:54'),
(51, 15, 2, 2000, 2, '2016-09-24 07:49:54'),
(52, 15, 2, 2000, 2, '2016-09-24 07:49:54'),
(53, 15, 2, 2000, 2, '2016-09-24 07:49:54'),
(54, 15, 2, 2000, 2, '2016-09-24 07:49:54'),
(55, 15, 2, 4000, 2, '2016-09-24 07:49:54'),
(56, 15, 2, 4000, 2, '2016-09-24 07:49:54'),
(57, 15, 2, 8000, 2, '2016-09-24 07:49:54'),
(58, 69, 1, 1000, 3, '2016-09-27 11:59:02'),
(59, 18, 2, 4000, 0, '2016-09-23 07:16:56'),
(60, 45, 2, 6000, 0, '2016-09-23 10:41:33'),
(61, 77, 2, 2000, 1, '2016-09-23 19:01:55'),
(62, 78, 1, 5000, 0, '2016-09-23 19:36:30'),
(63, 79, 1, 3000, 2, '2016-09-24 08:01:12'),
(64, 83, 1, 2000, 0, '2016-09-24 07:16:09'),
(65, 48, 2, 4000, 3, '2016-09-26 08:55:22'),
(66, 48, 2, 4000, 3, '2016-09-26 08:55:22'),
(67, 84, 1, 1000, 1, '2016-10-01 05:16:42'),
(68, 85, 1, 1000, 1, '2016-10-03 09:13:41'),
(69, 15, 2, 2000, 1, '2016-09-24 07:51:34'),
(70, 14, 2, 6000, 0, '2016-09-24 08:01:12'),
(71, 89, 1, 2000, 0, '2016-09-24 15:50:07'),
(72, 94, 2, 2000, 1, '2016-10-01 05:16:42'),
(73, 95, 1, 0, 0, '2016-10-03 09:09:57'),
(74, 7, 2, 2000, 3, '2016-10-03 09:15:43');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
