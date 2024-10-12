-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 11:06 PM
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
  `saturday_nutrition` varchar(255) DEFAULT '0,0,0,0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `email`, `weight`, `age`, `height`, `gender`, `calorie`, `max_calorie`, `protein`, `max_protein`, `carbs`, `max_carbs`, `fat`, `max_fat`, `sunday_nutrition`, `monday_nutrition`, `tuesday_nutrition`, `wednesday_nutrition`, `thursday_nutrition`, `friday_nutrition`, `saturday_nutrition`) VALUES
(1, 'John', 'J123', 'john@gmail.com', 0, 0, 0, -5, 0, 5, 0, 0, 0, 1, 0, 0, '0, 0, 0, 0', '', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0'),
(2, 'JaneDoe', 'Jane123', 'Jane@gmail.com', 65, 20, 180, 161, 0, 1514, 0, 81, 0, 246, 0, 135, '0, 0, 0, 0', '', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0'),
(6, 'Jonathan Doe', 'J123', 'Jonathan@gmail.com', 75, 30, 180, -5, 0, 1730, 0, 94, 0, 281, 0, 154, '0, 0, 0, 0', '', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0'),
(9, 'JohnDoe', '$2y$12$ZQmOkO/YIk2JPLyd7djTruld0RnIMGtgO.juh0CaM7q93bDHWl7FO', 'johndoe@gmail.com', 75, 30, 180, -5, 0, 1730, 0, 94, 0, 281, 0, 154, '0, 0, 0, 0', '', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0'),
(10, 'Jane Doe', '$2y$12$sefkgQs6NGYt8cy1Z9kCj.f0Y.WEjVxUqdLylhN4.4eWng7dCcl4q', 'JaneDoe@gmail.com', 60, 20, 180, 161, 0, 1464, 0, 75, 0, 238, 0, 130, '1464, 75, 238, 130', '1400, 70, 200, 100', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0', '0,0,0,0');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;