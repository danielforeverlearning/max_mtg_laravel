-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2018 at 11:29 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id321487_000webhostcom_localmaxlee_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `red_deck`
--

DROP TABLE IF EXISTS `red_deck`;
CREATE TABLE `red_deck` (
  `id` int(11) NOT NULL,
  `pic_filename` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_count` int(11) NOT NULL,
  `card_type` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mana_cost` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effects` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `red_deck`
--

INSERT INTO `red_deck` (`id`, `pic_filename`, `card_count`, `card_type`, `mana_cost`, `effects`) VALUES
(1, 'land_mountain.jpg', 28, 'LAND', '0', 0),
(2, 'instant_lightning_bolt.jpg', 4, 'INSTANT', '1RED', 1),
(3, 'enchantment_goblin_assault.jpg', 4, 'ENCHANTMENT', '2COLORLESS_1RED', 2),
(4, 'creature_raging_goblin.jpg', 4, 'CREATURE', '1RED', 3),
(5, 'creature_goblin_gardener.jpg', 4, 'CREATURE', '3COLORLESS_1RED', 4),
(6, 'creature_goblin_chieftain.jpg', 4, 'CREATURE', '1COLORLESS_2RED', 5),
(7, 'creature_goblin_bushwhacker.jpg', 4, 'CREATURE', '1RED', 6),
(8, 'creature_goblin_arsonist.jpg', 4, 'CREATURE', '1RED', 7),
(9, 'creature_frenzied_goblin.jpg', 4, 'CREATURE', '1RED', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `red_deck`
--
ALTER TABLE `red_deck`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `red_deck`
--
ALTER TABLE `red_deck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
