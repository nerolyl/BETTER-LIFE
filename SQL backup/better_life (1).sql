-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 10:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `better_life`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `weight` int(255) NOT NULL,
  `age` int(255) NOT NULL,
  `height` int(255) NOT NULL,
  `gender` int(255) DEFAULT NULL,
  `calorie` int(255) NOT NULL DEFAULT 0,
  `max_calorie` int(255) DEFAULT NULL,
  `protein` int(255) NOT NULL DEFAULT 0,
  `max_protein` int(255) DEFAULT 0,
  `carbs` int(255) NOT NULL DEFAULT 0,
  `max_carbs` int(255) DEFAULT NULL,
  `fat` int(255) NOT NULL DEFAULT 0,
  `max_fat` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `email`, `weight`, `age`, `height`, `gender`, `calorie`, `max_calorie`, `protein`, `max_protein`, `carbs`, `max_carbs`, `fat`, `max_fat`) VALUES
(1, 'John', 'J123', 'john@gmail.com', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'JaneDoe', 'Jane123', 'Jane@gmail.com', 65, 20, 180, 161, 0, 1514, 0, 81, 0, 246, 0, 135);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `insert_max_cal` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.max_calorie = (NEW.weight * 10) + (NEW.height * 6.25) - (NEW.age * 5) - (NEW.gender)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_max_carbs` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.max_carbs = (NEW.max_calorie * 0.65) / 4
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_max_fat` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.max_fat = (NEW.max_calorie * 0.80) / 9
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_max_protein` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.max_protein = (NEW.weight / 0.8)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_max_cal` BEFORE UPDATE ON `users` FOR EACH ROW SET NEW.max_calorie = (NEW.weight * 10) + (NEW.height * 6.25) - (NEW.age * 5) - (NEW.gender)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_max_carbs` BEFORE UPDATE ON `users` FOR EACH ROW SET NEW.max_carbs = (NEW.max_calorie * 0.65) / 4
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_max_fat` BEFORE UPDATE ON `users` FOR EACH ROW SET NEW.max_fat = (NEW.max_calorie * 0.80) / 9
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_max_protein` BEFORE UPDATE ON `users` FOR EACH ROW SET NEW.max_protein = (NEW.weight / 0.8)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
