-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 07 août 2022 à 16:57
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
-- Base de données : `huggiitest`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220807094733', '2022-08-07 09:47:53', 192),
('DoctrineMigrations\\Version20220807094857', '2022-08-07 09:49:03', 213),
('DoctrineMigrations\\Version20220807095113', '2022-08-07 09:51:24', 160);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sujet_id` int(11) DEFAULT NULL,
  `libelle` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datepublication` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B6BD307F7C4D497E` (`sujet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `sujet_id`, `libelle`, `datepublication`) VALUES
(5, 1, 'Non, elle n\'est pas plate, fin du débat', '2022-08-07 16:06:46'),
(8, 2, 'Vu le nombre de spectateur et de téléspectateur, la question mérite d\'être posé même si l\'effort physique semble moins importante qu\'un sport \"lambda\"', '2022-08-07 16:11:04'),
(9, 3, 'L\'échec du brevet est la réussite des cons - Bertrand Peyrot', '2022-08-07 16:11:47'),
(10, 4, 'La liste et le classement des 11 meilleures universités en France en 2022 est le suivant :Université du Sorbonne,Université Paris Sud,École normale supérieure,Université Aix-Marseille,Université de Strasbourg,Université Paris-Diderot,Université Grenoble Alpes,Université Paris-Descartes.\r\nUniversité Claude-Bernard,Université Paul-Sabatier,Université de Bordeaux.', '2022-08-07 16:14:11'),
(11, 1, 'Il peut y avoir débat vu les photos que l\'on peut voir sur l\'internet ..', '2022-08-07 16:26:59'),
(12, 8, 'Je pense qu\'avec la fonte des glaces de plus en plus fréquente et importante, il est probable que le réchauffement climatique existe', '2022-08-07 16:37:33');

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

DROP TABLE IF EXISTS `sujet`;
CREATE TABLE IF NOT EXISTS `sujet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sujet`
--

INSERT INTO `sujet` (`id`, `libelle`) VALUES
(1, 'La terre est-elle plate ? '),
(2, 'L\'e-sport devrait-il être considéré comme un sport tel le football, le basketball, le tennis etc .. ? '),
(3, 'Est-il nécessaire d\'avoir le brevet pour aller au lycée ? '),
(4, 'L\'université de Lille est-elle la meilleure université française ?'),
(8, 'Le réchauffement climatique existe ?');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_B6BD307F7C4D497E` FOREIGN KEY (`sujet_id`) REFERENCES `sujet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
