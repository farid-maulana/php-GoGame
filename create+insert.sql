-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 09:54 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gogame`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `difficulty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `name`, `description`, `image`, `difficulty`) VALUES
(1, 'Valorant', 'Valorant is a tactical shooting game involving two teams with 5 players in each team. Every player can sign in and play remotely from anywhere in the world.', 'valorant.jpg', 'Moderate'),
(2, 'Dota 2', 'Dota 2 is a multiplayer online battle arena (MOBA) video game developed. Dota 2 is played in matches between two teams of five players, with each team occupying and defending their own separate base on the map.', 'dota.jpg', 'Moderate'),
(3, 'Ragnarok', 'Ragnarok Online is a massive multiplayer online role-playing game created by Gravity based on the manhwa Ragnarok by Lee Myung-jin.', 'ragnarok.jpg', 'Intermediate'),
(4, 'Dead by Daylight', 'Dead by Daylight is an asymmetrical multiplayer horror game where one player takes on the role of a brutal Killer and the other four play as Survivors.', 'dead-by-daylight.jpg', 'Moderate'),
(5, 'Genshin Impact', 'MiHoYo created and released Genshin Impact, an action role-playing game with an open world environment and an action-based battle system.', 'Genshin-Impact.png', 'Intermediate'),
(6, 'Mobile Legend', 'Mobile Legends is a multiplayer online battle arena game that The two opposing teams fight to destroy the enemy\'s base while defending their own base for control of a path, the three lanes known as top, middle and bottom, which connects the bases.', 'MLBB.jpg', 'Easy'),
(7, 'Lost Saga', 'Lost Saga pits players against one another in a battle for the ages. Players face off with heroes from fantasy, science-fiction and history, including everything from boxing champs to iron knights, pirates to ninjas, and even cowboys to dark shamans.', 'Lost-Saga.jpg', 'Intermediate'),
(8, 'Grand Chase', 'Grand Chase is a free-to-play game, where players need to earn currency known as GP or Game Points from completing dungeon quests or PvP to buy equipment and items, but some items could only be purchased with real-world currency.', 'grand-chase.jpg', 'Easy');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`) VALUES
(1, 'budiman', 'budi', '$2y$10$SQOQvWEoByINekGJXg1tB.KdHKkKsjR9EtjOr/qW98gJLZR/QK47i'),
(2, 'NobodyKnowMe', 'NobodyKnowMe', '$2y$10$tqO8W4B5AxY7lqduywn7HeI5PzjGIk2NflI3frIlt6yUO4hxY0vUC'),
(3, 'TryHard', 'TryHard', '$2y$10$ffKsa4XlzMTAInRuFHx.VO64GljU2YcJJjbSkrHpAk6aByUbVSUjS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
