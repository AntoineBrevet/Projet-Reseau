-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 fév. 2022 à 14:08
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
  `date` date NOT NULL,
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

--
-- Déchargement des données de la table `res_trames`
--

INSERT INTO `res_trames` (`id`, `identifiant`, `date`, `status`, `version`, `protocol_name`, `flags`, `ttl`, `protocol_checksum`, `header_checksum`, `port_from`, `port_dest`, `ip_from`, `ip_dest`) VALUES
(4126, '0xf30f', '2020-12-17', 'disabled', 4, 'UDP', '0x00', 128, '', 'unverified', 50046, 3481, 'c0a8014a', '3470ff25'),
(4127, '0xf30e', '2020-12-17', 'disabled', 4, 'UDP', '0x00', 128, '', 'unverified', 50046, 3481, 'c0a8014a', '3470ff25'),
(4128, '0xf30d', '2020-12-17', 'disabled', 4, 'UDP', '0x00', 128, '', 'unverified', 50046, 3481, 'c0a8014a', '3470ff25'),
(4129, '0xf30c', '2020-12-17', 'disabled', 4, 'UDP', '0x00', 128, '', 'unverified', 50046, 3481, 'c0a8014a', '3470ff25'),
(4130, '0x92ce', '2020-12-17', 'disabled', 4, 'TLSv1.2', '0x40', 128, '', 'unverified', 63440, 443, 'c0a8014a', '343111a8'),
(4131, '0x92d0', '2020-12-17', 'disabled', 4, 'TLSv1.2', '0x40', 128, '', 'unverified', 63440, 443, 'c0a8014a', '343111a8'),
(4132, '0xa132', '2020-12-17', 'good', 4, 'ICMP', '0x00', 128, '0x4353', '0x0000', 51062, 443, 'c0a8014a', 'acd913e3'),
(4133, '0xa132', '2020-12-17', 'good', 4, 'ICMP', '0x00', 99, '0x4353', '0xc31d', 51062, 443, 'acd913e3', 'c0a8014a'),
(4134, '0x9927', '2020-12-14', 'disabled', 4, 'TCP', '0x40', 128, '', 'unverified', 51062, 443, 'c0a8014a', 'd83ac6ce'),
(4135, '0x9927', '2020-12-14', 'disabled', 4, 'TCP', '0x00', 121, '', 'unverified', 51062, 443, 'd83aa80c', 'c0a8014a'),
(4136, '0xf2f9', '2020-12-02', 'good', 4, 'ICMP', '0x00', 117, '0x4352', '0xc312', 51062, 443, 'acd913e3', 'c0a8014a'),
(4137, '0xf2f9', '2020-12-02', 'good', 4, 'ICMP', '0x00', 128, '0x4352', '0x0000', 51062, 443, 'c0a8014a', 'acd913e3'),
(4138, '0xd912', '2020-12-02', 'good', 4, 'ICMP', '0x00', 128, '0x4352', '0x0000', 51062, 443, 'c0a8014a', 'acd913e3'),
(4139, '0xd914', '2020-12-02', 'good', 4, 'ICMP', '0x00', 128, '0x4355', '0x0020', 51062, 443, 'c0a8014a', 'acd913e3'),
(4140, '0xa443', '2020-12-02', 'good', 4, 'ICMP', '0x00', 128, '0x4352', '0x0000', 51062, 443, 'c0a8014a', 'acd913e3'),
(4141, '0xa443', '2020-12-02', 'good', 4, 'ICMP', '0x00', 117, '0x4352', '0xc312', 51062, 443, 'acd913e3', 'c0a8014a');

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
  `created_at` datetime DEFAULT NULL,
  `token_at` datetime DEFAULT NULL,
  `date_naissance` text NOT NULL,
  `sexe` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `res_users`
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
(25, 'dzadaz', 'dzadaz', 'oui@oui.fr', '$2y$10$rfDVT/B8FXNZDTB0j4NL8eNznggmOGd15d1.CuByBnUDzTiHba6v2', NULL, '2022-02-09 10:57:11', NULL, '2022-01-31', 'homme'),
(26, 'oswald', 'clara', 'clara.oswald@gmail.com', '$2y$10$WOlgMH84pFUt4E9/WQ8mdeWETVcOBt8ALfLa0ArT4G/fw58BtS8u6', NULL, '2022-02-16 10:31:15', NULL, '1986-11-23', 'femme'),
(27, 'Jack', 'Harkness', 'faceofboe@gmail.com', '$2y$10$3ShBoaGA.LFecZIJ5kDFqOVhDNqXjzTWARgQj9ZUvEutTkA/VPbzi', NULL, '2022-02-17 11:31:14', NULL, '1967-03-11', 'homme'),
(28, 'amy', 'pond', 'amypond@gmail.com', '$2y$10$95gOFJWkh3PEDcNQDJnZwuamhVGf6pqRyUI3R3A1B5jOF13jdFpdC', NULL, '2022-02-17 16:23:26', NULL, '', ''),
(29, 'clara', 'oswald', 'oswald.clara@gmail.com', '$2y$10$drfmcl8MGh7Ca3XIZfM4..wZlW9PE2sdxFHVLasOUbeE1k8ZIC3ti', NULL, '2022-02-18 12:03:41', NULL, '1995-03-06', 'femme'),
(31, 'amy', 'pond', 'amy.pond@gmail.com', '$2y$10$bNIcsXWjBRTmvaIIkWMElO//VGjkQwSFr7Q0ObzAeZz0LDZbIC4jK', NULL, '2022-02-18 12:26:30', NULL, '2000-03-06', 'femme'),
(33, 'peter', 'parker', 'pp4520500@gmail.com', '$2y$10$ItRfbAXhps3Mj0YaAJqlauacvpZRZZyRS3Tq8d6jWaxFli2dUUG6a', 'CC17B85386', '2022-02-18 13:40:56', '2022-02-18 13:46:16', '2000-03-06', 'homme'),
(34, 'Mai', 'Mai', 'test@lol', '$2y$10$wOweRKY8jn5LJPkwNmvU3u4DcmeCuP3rv.S4491OTGe/b2gwk8xt.', NULL, '2022-02-18 13:51:23', NULL, '2047-03-30', 'femme');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4142;

--
-- AUTO_INCREMENT pour la table `res_users`
--
ALTER TABLE `res_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
