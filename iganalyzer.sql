-- phpMyAdmin SQL Dump
-- version 5.1.1
-- Server version: 10.4.22-MariaDB
-- PHP version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `follower` (
  `id` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `picture` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `likes` int(20) NOT NULL DEFAULT 0,
  `comments` int(25) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

CREATE TABLE `following` (
  `id` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `picture` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;


CREATE TABLE `months` (
  `month` tinyint(1) NOT NULL,
  `followers` int(25) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

INSERT INTO `months` (`month`, `followers`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0);


CREATE TABLE `stalker` (
  `id` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `picture` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `likes` int(25) NOT NULL DEFAULT 0,
  `comments` int(25) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

ALTER TABLE `follower`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `following`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `months`
  ADD PRIMARY KEY (`month`);

ALTER TABLE `stalker`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
