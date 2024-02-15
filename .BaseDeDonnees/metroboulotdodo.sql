-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 15 fév. 2024 à 17:18
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `metroboulotdodo`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `email_admin` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_admin` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `password_admin` (`password_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `email_admin`, `password_admin`) VALUES
(1, 'ArmandDurand@gmail.com', 'ArmyBEoir');

-- --------------------------------------------------------

--
-- Structure de la table `challengespecial`
--

CREATE TABLE IF NOT EXISTS `challengespecial` (
  `id_specialchallenge` int NOT NULL AUTO_INCREMENT,
  `StartingDate_challenge` date DEFAULT NULL,
  `endingdate_challenge` date DEFAULT NULL,
  `name_challenge` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description_challenge` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `transport_challenge` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Image_challenge` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ID_Entreprise` int NOT NULL,
  PRIMARY KEY (`id_specialchallenge`),
  KEY `ID_Entreprise` (`ID_Entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `challengespecial`
--

INSERT INTO `challengespecial` (`id_specialchallenge`, `StartingDate_challenge`, `endingdate_challenge`, `name_challenge`, `description_challenge`, `transport_challenge`, `Image_challenge`, `ID_Entreprise`) VALUES
(1, '2024-02-04', '2024-02-04', 'Marche à pied', 'Marcher une distance donnée', 'A pied', 'img.jpg', 1),
(2, '2024-04-04', '2024-04-04', 'Cyclisme', 'Rouler à velo une distance donnée', 'En Velo', 'img.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `challenge_possede_mode_de_transport`
--

CREATE TABLE IF NOT EXISTS `challenge_possede_mode_de_transport` (
  `id_specialchallenge` int NOT NULL,
  `id_modedetransport` int NOT NULL,
  PRIMARY KEY (`id_specialchallenge`,`id_modedetransport`),
  KEY `id_modedetransport` (`id_modedetransport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `ID_Entreprise` int NOT NULL AUTO_INCREMENT,
  `name_entreprise` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_entreprise` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_entreprise` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `siretnumber_entreprise` varchar(14) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adresse_entreprise` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zipcode_entreprise` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city_entreprise` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Image_entreprise` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Entreprise`),
  UNIQUE KEY `siretnumber_entreprise` (`siretnumber_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ID_Entreprise`, `name_entreprise`, `email_entreprise`, `password_entreprise`, `siretnumber_entreprise`, `adresse_entreprise`, `zipcode_entreprise`, `city_entreprise`, `Image_entreprise`) VALUES
(1, 'LunaTech Solutions', 'LunaTech@gmail.com', '$2y$10$h/fagMDp5ubBAPXGIpkoOOR71itZuX8lwNsRdL2ZkoFzIf/n85Nny', '28859301929402', '8 Rue de Rivoli', '75001', 'Paris', 'img.jpg'),
(2, 'Phoenix Consulting and Design', 'PhoenixCo@yahoo.com', '$2y$10$h/fagMDp5ubBAPXGIpkoOOR71itZuX8lwNsRdL2ZkoFzIf/n85Nny', '12279402390923', '25 avenue du Général de Gaulle', '69110', 'Lyon', 'img.jpg'),
(3, 'Balenciaga', 'Balenciaga@gmail.com', '$2y$10$h/fagMDp5ubBAPXGIpkoOOR71itZuX8lwNsRdL2ZkoFzIf/n85Nny', '12345123451234', '1 rue 349 opop', '45673', 'Rouen', NULL),
(5, 'FloCorp', 'Flo@gmail.com', '$2y$10$vtIwDo6mUFur/8Z/M.KMr.IOSo5etwLE5oKo/EgciEiQbegr4hpkK', '99999999999999', '1 Karmine', '25478', 'Rouen', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `modedetransport`
--

CREATE TABLE IF NOT EXISTS `modedetransport` (
  `id_modedetransport` int NOT NULL AUTO_INCREMENT,
  `Type_modedetransport` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_modedetransport`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `modedetransport`
--

INSERT INTO `modedetransport` (`id_modedetransport`, `Type_modedetransport`) VALUES
(1, 'velo'),
(2, 'Marche à pied'),
(3, 'Skate'),
(4, 'trotinette'),
(5, 'Roller'),
(6, 'Hoverboard');

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE IF NOT EXISTS `trajet` (
  `id_trajet` int NOT NULL AUTO_INCREMENT,
  `date_trajet` date NOT NULL,
  `distance_trajet` float NOT NULL,
  `traveltime_trajet` time NOT NULL,
  `image_trajet` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_modedetransport` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  PRIMARY KEY (`id_trajet`),
  KEY `id_modedetransport` (`id_modedetransport`),
  KEY `trajet_ibfk_2` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`id_trajet`, `date_trajet`, `distance_trajet`, `traveltime_trajet`, `image_trajet`, `id_modedetransport`, `id_utilisateur`) VALUES
(166, '2024-02-01', 15245, '00:39:00', NULL, 5, 62),
(167, '2024-02-06', 2, '01:00:00', NULL, 5, 63);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `firstname_utilisateur` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname_utilisateur` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nickname_utilisateur` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthdate_utilisateur` date DEFAULT NULL,
  `email_utilisateur` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_utilisateur` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description_utilisateur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Image_utilisateur` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ID_Entreprise` int NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `email_utilisateur` (`email_utilisateur`),
  UNIQUE KEY `password_utilisateur` (`password_utilisateur`),
  KEY `ID_Entreprise` (`ID_Entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `firstname_utilisateur`, `lastname_utilisateur`, `nickname_utilisateur`, `birthdate_utilisateur`, `email_utilisateur`, `password_utilisateur`, `description_utilisateur`, `Image_utilisateur`, `ID_Entreprise`) VALUES
(61, 'jotaro', 'jo', 'josukebestjojo', '2024-02-08', 'jojojo@gmail.com', '$2y$10$LZmyU2PNYD3Crt77Unvm5.uBZkweLYDQgx5rZYe3X2CTHne1YhsZG', NULL, NULL, 1),
(62, 'HELENE', 'Poirier-Halley', 'LNWarrior', '1981-10-25', 'poirier.helene@outlook.fr', '$2y$10$QXrX4Gdxl9i807TzzLiI8uttO6sWZBxgA7dR9C5guLJ0jAW7L8LP.', NULL, NULL, 2),
(63, 'John', 'LENNON', 'beatles', '2024-02-06', 'beatle@mail.fr', '$2y$10$UWN539QZ6TUByQlrk4d3KuyPTZx9Lk2xQwTUTM0fdrH/A/8t8GyuC', NULL, NULL, 1),
(64, 'Florian', 'Malet', 'Zake', '2024-02-05', 'stephe76bis4@outlook.fr', '$2y$10$vBnnadx8LIXp.lKKJXVENOXGUcv8rLbHvhHeNI7W352DAHK8GEvzW', NULL, NULL, 1),
(70, 'Bryan', 'Festin', 'Baobab', '2023-01-13', 'festinb@gmail.com', '$2y$10$PsqDblLG/icJXp9m5k6.iO2TRZ3jtWUNu7V4xK/8X7rplMrnTwYHa', 'lkdsjlksjdlfds', 'default.png', 3),
(72, 'test', 'test', 'test', '2021-01-13', 'test@gmail.com', '$2y$10$cNvk5SuKJunRZTJBdjroLeLgX9OPsQNnW6dbGw5ks.ssROEZV1z/C', '', 'default.png', 5);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `challengespecial`
--
ALTER TABLE `challengespecial`
  ADD CONSTRAINT `challengespecial_ibfk_1` FOREIGN KEY (`ID_Entreprise`) REFERENCES `entreprise` (`ID_Entreprise`);

--
-- Contraintes pour la table `challenge_possede_mode_de_transport`
--
ALTER TABLE `challenge_possede_mode_de_transport`
  ADD CONSTRAINT `challenge_possede_mode_de_transport_ibfk_1` FOREIGN KEY (`id_specialchallenge`) REFERENCES `challengespecial` (`id_specialchallenge`),
  ADD CONSTRAINT `challenge_possede_mode_de_transport_ibfk_2` FOREIGN KEY (`id_modedetransport`) REFERENCES `modedetransport` (`id_modedetransport`);

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `trajet_ibfk_1` FOREIGN KEY (`id_modedetransport`) REFERENCES `modedetransport` (`id_modedetransport`),
  ADD CONSTRAINT `trajet_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`ID_Entreprise`) REFERENCES `entreprise` (`ID_Entreprise`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
