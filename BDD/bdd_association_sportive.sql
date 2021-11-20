-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 20 nov. 2021 à 01:41
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

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

CREATE TABLE `categorie` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom_categorie` varchar(25) NOT NULL,
  `tranche_age` varchar(10) NOT NULL COMMENT 'ex :18 - 25'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `entrainement` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_equipe_1` int(11) UNSIGNED NOT NULL,
  `id_equipe_2` int(11) UNSIGNED NOT NULL,
  `lieu` varchar(50) NOT NULL COMMENT 'stade - ville',
  `date_heure` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entrainement`
--

INSERT INTO `entrainement` (`id`, `id_equipe_1`, `id_equipe_2`, `lieu`, `date_heure`) VALUES
(1, 1, 1, '50 rue de la poutre - LAVILLE', '2021-11-30 22:43:49');

-- --------------------------------------------------------

--
-- Structure de la table `entraineur`
--

CREATE TABLE `entraineur` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom_ent` varchar(25) NOT NULL,
  `prenom_ent` varchar(25) NOT NULL,
  `id_equipe` int(11) UNSIGNED NOT NULL,
  `identifiant_ent` varchar(25) NOT NULL COMMENT 'Pour le login uniquement',
  `mdp_ent` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entraineur`
--

INSERT INTO `entraineur` (`id`, `nom_ent`, `prenom_ent`, `id_equipe`, `identifiant_ent`, `mdp_ent`) VALUES
(1, 'LECON', 'Jean', 1, 'JeanLECON', 'AZERTY');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom_equipe` varchar(25) CHARACTER SET utf8 NOT NULL,
  `id_categorie` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id`, `nom_equipe`, `id_categorie`) VALUES
(1, 'LES BOSS', 4),
(2, 'LES BG', 5);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom_joueur` varchar(25) NOT NULL,
  `prenom_joueur` varchar(25) NOT NULL,
  `age_joueur` tinyint(2) NOT NULL,
  `id_equipe` int(11) UNSIGNED NOT NULL,
  `identifiant_joueur` varchar(25) NOT NULL COMMENT 'Pour le login uniquement',
  `mdp_joueur` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`id`, `nom_joueur`, `prenom_joueur`, `age_joueur`, `id_equipe`, `identifiant_joueur`, `mdp_joueur`) VALUES
(1, 'Gaming', 'Titouan', 12, 1, 'TitouanG', 'pass_word'),
(2, 'LOL', 'LOL', 15, 2, 'LOL', 'azerty');

-- --------------------------------------------------------

--
-- Structure de la table `match`
--

CREATE TABLE `match` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_equipe` int(11) UNSIGNED NOT NULL,
  `lieu` varchar(50) NOT NULL COMMENT 'stade - ville',
  `date_heure` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `match`
--

INSERT INTO `match` (`id`, `id_equipe`, `lieu`, `date_heure`) VALUES
(1, 1, '50 rue de la poutre - LAVILLE', '2021-11-30 21:23:11');

-- --------------------------------------------------------

--
-- Structure de la table `president`
--

CREATE TABLE `president` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom_pres` varchar(25) NOT NULL,
  `prenom_pres` varchar(25) NOT NULL,
  `identifiant_pres` varchar(25) NOT NULL COMMENT 'Pour le login uniquement',
  `mdp_pres` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `president`
--

INSERT INTO `president` (`id`, `nom_pres`, `prenom_pres`, `identifiant_pres`, `mdp_pres`) VALUES
(1, 'ZEMMOUR', 'Eric', 'EricZ', 'Ben_Voyons');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entrainement`
--
ALTER TABLE `entrainement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equipe_2` (`id_equipe_2`),
  ADD KEY `id_equipe_1` (`id_equipe_1`) USING BTREE;

--
-- Index pour la table `entraineur`
--
ALTER TABLE `entraineur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equipe` (`id_equipe`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equipe` (`id_equipe`);

--
-- Index pour la table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equipe_bis` (`id_equipe`);

--
-- Index pour la table `president`
--
ALTER TABLE `president`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `entrainement`
--
ALTER TABLE `entrainement`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `entraineur`
--
ALTER TABLE `entraineur`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `match`
--
ALTER TABLE `match`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `president`
--
ALTER TABLE `president`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
