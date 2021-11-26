-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 26 nov. 2021 à 21:53
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_association_sportive`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(25) NOT NULL,
  `tranche_age` varchar(10) NOT NULL COMMENT 'ex :18 - 25',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_categorie`, `tranche_age`) VALUES
(1, 'MiniBad', '4 - 7'),
(2, 'Poussins', '8 - 9'),
(3, 'Benjamins', '10 - 11'),
(4, 'Minimes', '12 - 13'),
(5, 'Cadets', '14 - 15'),
(6, 'Juniors', '16 - 17'),
(7, 'Seniors', '18 - 39'),
(8, 'Vétéran 1', '35 - 39'),
(9, 'Vétéran 2', '40 - 44'),
(10, 'Vétéran 3', '45 - 49'),
(11, 'Vétéran 4', '50 - 54'),
(12, 'Vétéran 6', '60 - 64'),
(13, 'Vétéran 7', '65 - 69'),
(14, 'Vétéran 8', '70 - 99');

-- --------------------------------------------------------

--
-- Structure de la table `entrainement`
--

DROP TABLE IF EXISTS `entrainement`;
CREATE TABLE IF NOT EXISTS `entrainement` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_equipe_1` int(11) UNSIGNED NOT NULL,
  `id_equipe_2` int(11) UNSIGNED NOT NULL,
  `lieu` varchar(50) NOT NULL COMMENT 'stade - ville',
  `date_heure` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_equipe_2` (`id_equipe_2`),
  KEY `id_equipe_1` (`id_equipe_1`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entrainement`
--

INSERT INTO `entrainement` (`id`, `id_equipe_1`, `id_equipe_2`, `lieu`, `date_heure`) VALUES
(1, 1, 1, '50 rue de la poutre - LAVILLE', '2021-11-30 22:43:49');

-- --------------------------------------------------------

--
-- Structure de la table `entraineur`
--

DROP TABLE IF EXISTS `entraineur`;
CREATE TABLE IF NOT EXISTS `entraineur` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_ent` varchar(25) NOT NULL,
  `prenom_ent` varchar(25) NOT NULL,
  `id_equipe` int(11) UNSIGNED NOT NULL,
  `identifiant_ent` varchar(25) NOT NULL COMMENT 'Pour le login uniquement',
  `mdp_ent` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_equipe` (`id_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entraineur`
--

INSERT INTO `entraineur` (`id`, `nom_ent`, `prenom_ent`, `id_equipe`, `identifiant_ent`, `mdp_ent`) VALUES
(1, 'ROLL', 'Rick', 1, 'RickR', '4m_N@/Gn-G1v_U_uP'),
(2, 'LECON1', 'Jeant1', 2, '2122', '12121'),
(3, 'SMITH', 'Lili-Rose', 5, 'LiliRS', 'K0u1Z_N'),
(4, 'OUAGOUNE', 'Tomas', 6, 'TomasO', 'Tshutshu'),
(5, 'GOLDSTAR', 'Sam', 7, 'SamG', 'G0lDsT4r'),
(6, 'MOMAH', 'Brigitte', 8, 'BrigitteM', 'W0uTsh1'),
(7, 'CYRIAL-LIGNIQUE', 'Sissy', 9, 'SissyCL', 'C_kr0k-n'),
(8, 'PÉKINOIS', 'Lou', 10, 'LouP', 'S1T-P/PL'),
(9, 'CRISE', 'Jésus', 11, 'JesusC', 'AnCpQiPmf@'),
(10, 'TRISTE', 'Jésus', 12, 'JesusT', '@nCpQcMiPMF-'),
(11, 'PERRUCHE', 'Lucy', 1, 'LucyP', 'Ess@f4i_B1MB-MB0Om');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_equipe` varchar(25) CHARACTER SET utf8 NOT NULL,
  `id_categorie` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id`, `nom_equipe`, `id_categorie`) VALUES
(1, 'Corsaires Inventifs', 1),
(2, 'Miracles Argentés', 2),
(5, 'Royaux', 3),
(6, 'Orages Courageux', 4),
(7, 'Rouges-Gorges Sérieux', 5),
(8, 'Aigles', 6),
(9, 'Monarques Célestes', 7),
(10, 'Ocelots Inouïs', 8),
(11, 'Robots Géniaux', 9),
(12, 'Gigantesques', 10);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_joueur` varchar(25) NOT NULL,
  `prenom_joueur` varchar(25) NOT NULL,
  `age_joueur` tinyint(2) NOT NULL,
  `id_equipe` int(11) UNSIGNED NOT NULL,
  `identifiant_joueur` varchar(25) NOT NULL COMMENT 'Pour le login uniquement',
  `mdp_joueur` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_equipe` (`id_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`id`, `nom_joueur`, `prenom_joueur`, `age_joueur`, `id_equipe`, `identifiant_joueur`, `mdp_joueur`) VALUES
(1, 'MENVUSSA', 'Gérard', 12, 1, 'GerardM', 'jivouari1_4Y4Y'),
(2, 'DEUSSAVOUA', 'Tom', 15, 2, 'TomD', 'D0ubleCh1zz'),
(3, 'PEPAY', 'Gilles', 15, 1, 'GillesP', 'D_Z4rouA'),
(4, 'CLAQUAIS', 'Robernard', 40, 2, 'RobC', 'P3digrEe_OOF'),
(5, 'CATAPOUTTE', 'Jessicaren', 30, 5, 'JessC', '3ye_L1nAH'),
(6, 'ETCHEPOUËT', 'Philippe', 25, 5, 'PhilE', '0h/C_kxns@'),
(7, 'DEGNIART', 'Bronis', 49, 6, 'BronisD', 'H0m_Kxnstrui/AH'),
(8, 'IFADIA	', 'Fadi', 24, 6, 'FadiI', 'Ch3rN0B-L'),
(9, 'Monte-Hanié', 'Gilbert', 27, 7, 'GilbertM', 'F3st1vAL-Kn'),
(10, 'TRAILLETTE', 'Amy', 37, 7, 'AmyT', 'R4tat@'),
(11, 'LAMPALED', 'Stracy', 36, 8, 'StracyL', 'J4NoSkuRre'),
(12, 'SAINTI', 'Ignace', 46, 8, 'IgnaceS', 'F3At_l-O2');

-- --------------------------------------------------------

--
-- Structure de la table `match`
--

DROP TABLE IF EXISTS `match`;
CREATE TABLE IF NOT EXISTS `match` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_equipe` int(11) UNSIGNED NOT NULL,
  `lieu` varchar(50) NOT NULL COMMENT 'stade - ville',
  `date_heure` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_equipe_bis` (`id_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `match`
--

INSERT INTO `match` (`id`, `id_equipe`, `lieu`, `date_heure`) VALUES
(1, 1, '50 rue de la poutre - LAVILLE', '2021-11-30 21:23:11');

-- --------------------------------------------------------

--
-- Structure de la table `president`
--

DROP TABLE IF EXISTS `president`;
CREATE TABLE IF NOT EXISTS `president` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_pres` varchar(25) NOT NULL,
  `prenom_pres` varchar(25) NOT NULL,
  `identifiant_pres` varchar(25) NOT NULL COMMENT 'Pour le login uniquement',
  `mdp_pres` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `president`
--

INSERT INTO `president` (`id`, `nom_pres`, `prenom_pres`, `identifiant_pres`, `mdp_pres`) VALUES
(1, 'ZEMMOUR', 'Eric', 'EricZ', 'Ben_Voyons');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `entrainement`
--
ALTER TABLE `entrainement`
  ADD CONSTRAINT `entrainement_ibfk_1` FOREIGN KEY (`id_equipe_1`) REFERENCES `equipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entrainement_ibfk_2` FOREIGN KEY (`id_equipe_2`) REFERENCES `equipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entraineur`
--
ALTER TABLE `entraineur`
  ADD CONSTRAINT `entraineur_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `equipe_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `match_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
