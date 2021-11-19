-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 19 nov. 2021 à 22:06
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
  `identifiant_ent` varchar(25) NOT NULL COMMENT 'Pour le login uniquement',
  `mdp_ent` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entraineur`
--

INSERT INTO `entraineur` (`id`, `nom_ent`, `prenom_ent`, `identifiant_ent`, `mdp_ent`) VALUES
(1, 'LECON', 'Jean', 'JeanLECON', 'AZERTY');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_equipe` varchar(25) NOT NULL,
  `id_categorie` int(11) UNSIGNED NOT NULL,
  `id_joueurs_1` int(11) UNSIGNED NOT NULL,
  `id_joueurs_2` int(11) UNSIGNED NOT NULL,
  `id_entraineur` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_entraineur` (`id_entraineur`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_joueurs_1` (`id_joueurs_1`),
  KEY `id_joueurs_2` (`id_joueurs_2`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id`, `nom_equipe`, `id_categorie`, `id_joueurs_1`, `id_joueurs_2`, `id_entraineur`) VALUES
(1, 'LES BOSS', 8, 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

DROP TABLE IF EXISTS `joueurs`;
CREATE TABLE IF NOT EXISTS `joueurs` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_joueur` varchar(25) NOT NULL,
  `prenom_joueur` varchar(25) NOT NULL,
  `age_joueur` tinyint(2) NOT NULL,
  `identifiant_joueur` varchar(25) NOT NULL COMMENT 'Pour le login uniquement',
  `mdp_joueur` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `joueurs`
--

INSERT INTO `joueurs` (`id`, `nom_joueur`, `prenom_joueur`, `age_joueur`, `identifiant_joueur`, `mdp_joueur`) VALUES
(1, 'Gaming', 'Titouan', 12, 'TitouanG', 'pass_word'),
(2, 'LOL', 'LOL', 15, 'LOL', 'azerty');

-- --------------------------------------------------------

--
-- Structure de la table `match_equipes`
--

DROP TABLE IF EXISTS `match_equipes`;
CREATE TABLE IF NOT EXISTS `match_equipes` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_equipe` int(11) UNSIGNED NOT NULL,
  `lieu` varchar(50) NOT NULL COMMENT 'stade - ville',
  `date_heure` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_equipe_bis` (`id_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `match_equipes`
--

INSERT INTO `match_equipes` (`id`, `id_equipe`, `lieu`, `date_heure`) VALUES
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
  ADD CONSTRAINT `id_equipe_1` FOREIGN KEY (`id_equipe_1`) REFERENCES `equipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_equipe_2` FOREIGN KEY (`id_equipe_2`) REFERENCES `equipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_entraineur` FOREIGN KEY (`id_entraineur`) REFERENCES `entraineur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_joueurs_1` FOREIGN KEY (`id_joueurs_1`) REFERENCES `joueurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_joueurs_2` FOREIGN KEY (`id_joueurs_2`) REFERENCES `joueurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `match_equipes`
--
ALTER TABLE `match_equipes`
  ADD CONSTRAINT `id_equipe_bis` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
