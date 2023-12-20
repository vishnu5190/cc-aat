-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Dec 10, 2023 at 11:20 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_docker`
--

-- --------------------------------------------------------

--
-- Table structure for table `php_docker_table`
--

CREATE TABLE `php_docker_table` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date_created` date NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `php_docker_table`
--

INSERT INTO `php_docker_table` (`id`, `title`, `body`, `date_created`, `author`, `category`) VALUES
(1, 'OpenAI had a confusing week. Who came out on top? And who lost out?', 'Sam Altman A clear winner in the whole debacle is, of course, Altman himself. Unceremoniously ejected from his post on Friday, Altman quickly rallied support from the vast majority of OpenAI’s staff, who signed what was essentially a loyalty pledge underscoring the deep rift between himself and the board. His return to OpenAI, in triumph over the board that summarily fired him, reflects a kind of personal vindication that’s only likely to bolster, for better or for worse, his carefully and intentionally constructed image as a charismatic visionary who is single-handedly unlocking the secrets of the universe.\r\n', '2023-12-03', 'Shruti Dasamandam', 'Global News In Technology'),
(2, 'Welcome to the dangerous Swiss golf-baseball hybrid you’ve never heard of', 'Described as a hybrid of baseball and golf, Hornussen sees two teams of 18 take turns hitting and fielding the “Nouss” or “Hornuss,” a puck named after hornets for its buzzing sound as it whistles through the air.”\r\n\r\nArmed with a 3-meter (9.84-foot) carbon stick called a “Träf,” hitters take to a raised batting ramp in front of a playing area – the “Ries” – some 300 meters (980 feet) long and 10 meters (32 feet) wide. Their task is to strike the puck from the sloped platform, known as the “Bock,” as far as they can down the field.\r\n\r\nScoring starts if they reach the 100-meter line, with an additional point awarded for every 10 meters past the marker. Crucially though, points are only registered if the Nouss lands, with fielders spread at intervals seeking to block the puck from landing with bats, or “Schindels.”\r\n\r\n', '2023-12-01', 'Sameecha Sudheer', 'Sports'),
(3, 'Are you making one of these common exercising errors? Experts weigh in', 'Some 3.6 million people were treated in emergency departments in 2022 for various injuries involving sports and recreational equipment, according to the National Safety Council. Topping the list? Injuries from exercise and exercise equipment, which accounted for 445,642 of those emergency department visits.', '2023-12-11', 'Pragun Ashok', 'Fitness');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `php_docker_table`
--
ALTER TABLE `php_docker_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `php_docker_table`
--
ALTER TABLE `php_docker_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;