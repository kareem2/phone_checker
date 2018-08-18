-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 18, 2018 at 09:23 PM
-- Server version: 5.6.17-log
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
-- Database: `phones`
--

-- --------------------------------------------------------

--
-- Structure for view `phone_details`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `phone_details`  AS  select `prefix`.`id` AS `id`,`prefix`.`code` AS `code`,`prefix`.`county` AS `county`,`prefix`.`city` AS `city`,`prefix`.`usage_id` AS `usage_id`,`prefix`.`company_id` AS `company_id`,`prefix`.`area_code` AS `area_code`,`prefix`.`p_usage` AS `p_usage`,`prefix`.`company` AS `company`,`prefix`.`state_id` AS `state_id`,`state`.`name` AS `state_name`,`state`.`time_zone` AS `time_zone`,`country`.`name` AS `country_name`,`area`.`major_city` AS `major_city` from (((`prefix` join `state`) join `area`) join `country`) where ((`state`.`id` = `prefix`.`state_id`) and (`area`.`code` = `prefix`.`area_code`) and (`country`.`id` = `state`.`country_id`)) ;

--
-- VIEW  `phone_details`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
