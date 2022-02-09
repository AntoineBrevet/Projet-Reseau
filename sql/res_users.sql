-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2022 at 10:28 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reseaux`
--

-- --------------------------------------------------------

--
-- Table structure for table `res_users`
--

CREATE TABLE `res_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `token_at` datetime DEFAULT NULL,
  `date_naissance` text NOT NULL,
  `sexe` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `res_users`
--

INSERT INTO `res_users` (`id`, `name`, `surname`, `email`, `password`, `token`, `created_at`, `token_at`, `date_naissance`, `sexe`) VALUES
(12, 'admin', 'admin', 'admin@gmail.com', '$2y$10$ymvUZPlushnr.DkzDHI.eOdd3w5PfwlLZ2TFi1CKVfQL7LyEiBacm', NULL, '2022-01-28 14:44:32', NULL, '', ''),
(13, 'amy', 'pond', 'amy@gmail.com', '$2y$10$uf1h78uGVoOzFRF.UXZCKeRkMvwApok872h985eiN502PpbQuD2GG', NULL, '2022-02-07 13:36:34', NULL, '', ''),
(19, 'jhjh', 'hjh', 'test@test.frrdzd', '$2y$10$NYoPEEgnRfN6DNFN3RPKI.UcK3yP/f9DDiaebcRZQeo5egMkPa.06', NULL, '2022-02-08 16:40:43', NULL, '2022-02-22', 'femme'),
(20, 'hhhh', 'dzdh', 'test@tespooppot.fr', '$2y$10$qFUq3i89lYsOIw08./jDI.RejyPNkz2tg1BT.LiU/0QzKmr9fLrHO', NULL, '2022-02-08 16:51:56', NULL, '2022-01-31', 'femme'),
(21, 'ezfzefz', 'fzefezf', 'test@test.com', '$2y$10$NmLkhYYgTJkyqsN.fdH33enl3jWhn0nXUx32bcQt0aNXVwmF3UD8q', NULL, '2022-02-09 09:59:41', NULL, '2022-02-15', 'femme'),
(22, 'dzeedzed', 'zedez', 'gigg@mzadazd.fr', '$2y$10$e7V1lLE/oy9f6sSsX6bntubyhsPpq0MN58fWukpb8KugRUEH/8ADC', NULL, '2022-02-09 10:20:31', NULL, '2022-02-08', 'homme'),
(23, 'dzadazdazd', 'dzeadaz', 'ezfzef@meaife.fr', '$2y$10$EheIMy2ax1wCr03vmyeyHeIkxwnYynWAVxwfhIscjkZwpghR5gtJW', NULL, '2022-02-09 10:31:50', NULL, '2022-02-01', 'femme'),
(24, 'dezdezdze', 'ezcezadazd', 'o@o.fr', '$2y$10$5FAwtphJ5qLxZBOvKzHREugQ89rSu5g6dEIqcpJIs7XD2YRsrQk/G', NULL, '2022-02-09 10:47:18', NULL, '2022-02-01', 'femme'),
(25, 'dzadaz', 'dzadaz', 'oui@oui.fr', '$2y$10$rfDVT/B8FXNZDTB0j4NL8eNznggmOGd15d1.CuByBnUDzTiHba6v2', NULL, '2022-02-09 10:57:11', NULL, '2022-01-31', 'homme');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `res_users`
--
ALTER TABLE `res_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `res_users`
--
ALTER TABLE `res_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
