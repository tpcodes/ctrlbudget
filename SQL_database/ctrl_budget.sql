-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2020 at 08:45 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctrl_budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_new_expense`
--

DROP TABLE IF EXISTS `add_new_expense`;
CREATE TABLE IF NOT EXISTS `add_new_expense` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `person_id` int(50) NOT NULL,
  `expense_title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `amount_spent` int(50) NOT NULL,
  `per_name` varchar(255) DEFAULT NULL,
  `image_path` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `new_plan`
--

DROP TABLE IF EXISTS `new_plan`;
CREATE TABLE IF NOT EXISTS `new_plan` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `initial_budget` int(50) NOT NULL,
  `num_people` int(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `person_details`
--

DROP TABLE IF EXISTS `person_details`;
CREATE TABLE IF NOT EXISTS `person_details` (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `plan_id` int(50) NOT NULL,
  PRIMARY KEY (`pr_id`),
  KEY `p_id` (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`) VALUES
(1, 'Tushar pandey', 'tusharpandey586@gmail.com', '32cb30d99b71fbce7a28b5674080b513', 7007914949);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_new_expense`
--
ALTER TABLE `add_new_expense`
  ADD CONSTRAINT `add_new_expense_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person_details` (`pr_id`);

--
-- Constraints for table `new_plan`
--
ALTER TABLE `new_plan`
  ADD CONSTRAINT `new_plan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `person_details`
--
ALTER TABLE `person_details`
  ADD CONSTRAINT `person_details_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `new_plan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
