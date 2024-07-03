-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2024 at 12:54 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_pemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `euro2024`
--

CREATE TABLE `euro2024` (
  `kdeuro` int NOT NULL,
  `groupeuro` varchar(255) NOT NULL,
  `tim` varchar(255) NOT NULL,
  `menang` int NOT NULL,
  `seri` int NOT NULL,
  `kalah` int NOT NULL,
  `poin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `euro2024`
--

INSERT INTO `euro2024` (`kdeuro`, `groupeuro`, `tim`, `menang`, `seri`, `kalah`, `poin`) VALUES
(7, 'B', 'Spanyol', 3, 0, 0, 9),
(8, 'B', 'Italia', 1, 1, 1, 4),
(9, 'B', 'Kroasia', 0, 2, 1, 2),
(10, 'B', 'Albania', 0, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nim` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nim`, `password`) VALUES
(1, '211011400975', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `euro2024`
--
ALTER TABLE `euro2024`
  ADD PRIMARY KEY (`kdeuro`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `euro2024`
--
ALTER TABLE `euro2024`
  MODIFY `kdeuro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
