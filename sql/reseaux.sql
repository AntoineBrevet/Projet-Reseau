-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 07 fév. 2022 à 13:41
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reseaux`
--

-- --------------------------------------------------------

--
-- Structure de la table `res_trames`
--

CREATE TABLE `res_trames` (
  `id` int(11) NOT NULL,
  `identifiant` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'success',
  `version` int(2) NOT NULL,
  `protocol_name` varchar(10) NOT NULL,
  `flags` varchar(10) NOT NULL,
  `ttl` int(5) NOT NULL,
  `protocol_checksum` varchar(15) NOT NULL,
  `header_checksum` varchar(15) NOT NULL,
  `port_from` int(6) NOT NULL,
  `port_dest` int(6) NOT NULL,
  `ip_from` varchar(15) NOT NULL,
  `ip_dest` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `res_users`
--

CREATE TABLE `res_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `token_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `res_users`
--

INSERT INTO `res_users` (`id`, `name`, `surname`, `email`, `password`, `token`, `created_at`, `token_at`) VALUES
(12, 'admin', 'admin', 'admin@gmail.com', '$2y$10$ymvUZPlushnr.DkzDHI.eOdd3w5PfwlLZ2TFi1CKVfQL7LyEiBacm', NULL, '2022-01-28 14:44:32', NULL),
(13, 'amy', 'pond', 'amy@gmail.com', '$2y$10$uf1h78uGVoOzFRF.UXZCKeRkMvwApok872h985eiN502PpbQuD2GG', NULL, '2022-02-07 13:36:34', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `res_trames`
--
ALTER TABLE `res_trames`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `res_users`
--
ALTER TABLE `res_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `res_trames`
--
ALTER TABLE `res_trames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=942;

--
-- AUTO_INCREMENT pour la table `res_users`
--
ALTER TABLE `res_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
