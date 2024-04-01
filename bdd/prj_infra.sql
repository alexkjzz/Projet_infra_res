-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 01 avr. 2024 à 11:47
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `prj_infra`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambres`
--

DROP TABLE IF EXISTS `chambres`;
CREATE TABLE IF NOT EXISTS `chambres` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TypeChambre` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `UtilisateurID` int DEFAULT NULL,
  `ChambreID` int DEFAULT NULL,
  `DateDebut` date DEFAULT NULL,
  `DateFin` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `UtilisateurID` (`UtilisateurID`),
  KEY `ChambreID` (`ChambreID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`ID`, `UtilisateurID`, `ChambreID`, `DateDebut`, `DateFin`) VALUES
(1, NULL, NULL, '2024-04-03', '2024-04-05');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Prenom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `MotDePasse` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `Nom`, `Prenom`, `Email`, `MotDePasse`) VALUES
(3, NULL, NULL, 'test2@test.fr', '$2y$10$9cIihi/kVdLAWcbTvrkalew9v0oChOQWUH1JcbUyir6S69Iny2kq6');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`UtilisateurID`) REFERENCES `utilisateurs` (`ID`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`ChambreID`) REFERENCES `chambres` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
