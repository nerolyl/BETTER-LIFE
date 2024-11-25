-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2024 at 12:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `max_calorie` int(255) DEFAULT 0,
  `protein` int(255) DEFAULT 0,
  `max_protein` int(255) DEFAULT 0,
  `carbs` int(255) NOT NULL DEFAULT 0,
  `max_carbs` int(255) DEFAULT 0,
  `fat` int(255) NOT NULL DEFAULT 0,
  `max_fat` int(255) DEFAULT 0,
  `sunday_nutrition` varchar(255) NOT NULL DEFAULT '0, 0, 0, 0',
  `monday_nutrition` varchar(255) DEFAULT '0, 0, 0, 0',
  `tuesday_nutrition` varchar(255) DEFAULT '0,0,0,0',
  `wednesday_nutrition` varchar(255) DEFAULT '0,0,0,0',
  `thursday_nutrition` varchar(255) DEFAULT '0,0,0,0',
  `friday_nutrition` varchar(255) DEFAULT '0,0,0,0',
  `saturday_nutrition` varchar(255) DEFAULT '0,0,0,0',
  `last_login` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `points` int(11) NOT NULL DEFAULT 0,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL,
  `weight_goal` decimal(3,1) NOT NULL DEFAULT 1.0,
  `activity_level` decimal(4,3) NOT NULL DEFAULT 1.200
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `email`, `weight`, `age`, `height`, `gender`, `calorie`, `max_calorie`, `protein`, `max_protein`, `carbs`, `max_carbs`, `fat`, `max_fat`, `sunday_nutrition`, `monday_nutrition`, `tuesday_nutrition`, `wednesday_nutrition`, `thursday_nutrition`, `friday_nutrition`, `saturday_nutrition`, `last_login`, `points`, `reset_token_hash`, `reset_token_expires_at`, `weight_goal`, `activity_level`) VALUES
(9, 'JohnDoe', '$2y$12$ZQmOkO/YIk2JPLyd7djTruld0RnIMGtgO.juh0CaM7q93bDHWl7FO', 'johndoe@gmail.com', 75, 30, 180, -5, 0, 1730, 0, 94, 0, 281, 0, 154, '0, 0, 0, 0', '', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0', '2024-10-12 14:32:11.874068', 0, NULL, NULL, 1.0, 0.000),
(10, 'Jane Doe', '$2y$10$z5MIitB2Csv6Ujz2J2GOoeuC1J6Mna7C7PzIWFHkKpS2EIUKncFQO', 'racanalmuqbil@gmail.com', 63, 24, 172, 161, 0, 1709, 161, 79, 0, 194, 138, 106, '1464, 75, 238, 130', '1400, 70, 200, 100', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0', '2024-11-25 10:49:59.536578', 17, '9cb7e8f74161e1486d4bacc4c589539c2a25e0e4c72a83983308993f91d1fd2f', '2024-11-13 00:04:40', 1.0, 1.200),
(12, 'Test', '$2y$12$KzEEOZye1Bl3JTzprkqqGeFh7Zg7qtmO1x8bQP9uZGOyCwt57Xo0W', 'Test@gmail.com', 75, 30, 180, -5, 0, 1730, 0, 94, 0, 281, 0, 154, '0, 0, 0, 0', '0, 0, 0, 0', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0', '2024-10-12 14:32:11.874068', 0, NULL, NULL, 1.0, 0.000);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `insert_max_cal` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.max_calorie = (((NEW.weight * 10) + (NEW.height * 6.25) - (NEW.age * 5) - (NEW.gender)) * (NEW.activity_level)) * (NEW.weight_goal)
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
CREATE TRIGGER `update_max_cal` BEFORE UPDATE ON `users` FOR EACH ROW SET NEW.max_calorie = (((NEW.weight * 10) + (NEW.height * 6.25) - (NEW.age * 5) - (NEW.gender)) * (NEW.activity_level)) * (NEW.weight_goal)
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `reset_user_nutrients` ON SCHEDULE EVERY 1 DAY STARTS '2024-10-10 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE users SET calories = 0, protein = 0, carbs = 0, fat = 0;
END$$

CREATE DEFINER=`root`@`localhost` EVENT `update_sunday_nutrition` ON SCHEDULE EVERY 7 DAY STARTS '2024-10-13 23:59:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE users
    SET sunday_nutrition = CONCAT(calorie, ',', protein, ',', carbs, ',', fat);
END$$

CREATE DEFINER=`root`@`localhost` EVENT `update_monday_nutrition` ON SCHEDULE EVERY 1 DAY STARTS '2024-10-14 23:59:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE users
    SET monday_nutrition = CONCAT(calorie, ',', protein, ',', carbs, ',', fat);
END$$

CREATE DEFINER=`root`@`localhost` EVENT `update_tuesday_nutrition` ON SCHEDULE EVERY 7 DAY STARTS '2024-10-15 23:59:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE users
    SET tuesday_nutrition = CONCAT(calorie, ',', protein, ',', carbs, ',', fat);
END$$

CREATE DEFINER=`root`@`localhost` EVENT `update_wednesday_nutrition` ON SCHEDULE EVERY 7 DAY STARTS '2024-10-16 23:59:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE users
    SET sunday_nutrition = CONCAT(calorie, ',', protein, ',', carbs, ',', fat);
END$$

CREATE DEFINER=`root`@`localhost` EVENT `update_thursday_nutrition` ON SCHEDULE EVERY 7 DAY STARTS '2024-10-17 23:59:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE users
    SET thursday_nutrition = CONCAT(calorie, ',', protein, ',', carbs, ',', fat);
END$$

CREATE DEFINER=`root`@`localhost` EVENT `update_friday_nutrition` ON SCHEDULE EVERY 7 DAY STARTS '2024-10-18 23:59:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE users
    SET friday_nutrition = CONCAT(calorie, ',', protein, ',', carbs, ',', fat);
END$$

CREATE DEFINER=`root`@`localhost` EVENT `update_saturday_nutrition` ON SCHEDULE EVERY 7 DAY STARTS '2024-10-19 23:59:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE users
    SET saturday_nutrition = CONCAT(calorie, ',', protein, ',', carbs, ',', fat);
END$$

CREATE DEFINER=`root`@`localhost` EVENT `reset_weekly_nutrition` ON SCHEDULE EVERY 7 DAY STARTS '2024-10-06 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE users
    SET 
        sunday_nutrition = '0,0,0,0',
        monday_nutrition = '0,0,0,0',
        tuesday_nutrition = '0,0,0,0',
        wednesday_nutrition = '0,0,0,0',
        thursday_nutrition = '0,0,0,0',
        friday_nutrition = '0,0,0,0',
        saturday_nutrition = '0,0,0,0';
END$$

CREATE DEFINER=`root`@`localhost` EVENT `reset_points` ON SCHEDULE EVERY 1 WEEK STARTS '2024-10-13 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE users
    SET points = 0;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
