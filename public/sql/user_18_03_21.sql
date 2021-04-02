-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 18 mars 2021 à 13:40
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_agria`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_avatar_user_id` int(11) DEFAULT NULL,
  `id_badge_user_id` int(11) DEFAULT NULL,
  `login_user` varchar(180) NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT=' Définition des users';

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `id_avatar_user_id`, `id_badge_user_id`, `login_user`, `roles`, `password`, `email_user`, `name_user`) VALUES
(2, NULL, NULL, 'test', '[]', '$argon2id$v=19$m=65536,t=4,p=1$8nInBMu52A1C6VThKmgL2A$4qfi6Vc9s7nhozlN7wMWA4qT9IcE03twdNersz3BYiU', 'aurelien.lapasserelle@outlook.com', 'test'),
(3, NULL, NULL, 'test2', '[]', '$argon2id$v=19$m=65536,t=4,p=1$nmhrUIyFUOt67jJsEVcTeg$rGMqNlegaFPZIoD5si3gQIQxy2KyeVYL28XEsWKyzXs', 'test.lapasserelle@outlook.com', 'test2'),
(4, NULL, NULL, 'test3', '[]', '$argon2id$v=19$m=65536,t=4,p=1$Its7dV7rDNSO+2IKFOmkJA$mHNXyQeSBa/ry2QEWz1qOtbMmGgf+XKsQBqoSxn+Czk', 'test.lapasserelle@outlook.com', 'test3'),
(5, NULL, NULL, 'Aurel', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$OyGOGNAMV0I/EaOKudhMIA$IenfBz/Cs429Q02myI+w9gV1DuDeg+KabKyfDp1/qlI', 'aurelien.lapasserelle@outlook.com', 'Aurel');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D6494BE15D0C` (`login_user`),
  ADD KEY `IDX_8D93D6494C66614D` (`id_avatar_user_id`),
  ADD KEY `IDX_8D93D6491FC20B4C` (`id_badge_user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
