-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 24 juin 2022 à 12:23
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `appli_muscu`
--

-- --------------------------------------------------------

--
-- Structure de la table `my_exercices`
--

DROP TABLE IF EXISTS `my_exercices`;
CREATE TABLE IF NOT EXISTS `my_exercices` (
  `id_exercices` int(11) NOT NULL AUTO_INCREMENT,
  `name_exercices` varchar(300) NOT NULL,
  `description_exercices` text,
  `group_muscu` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id_exercices`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `my_exercices`
--

INSERT INTO `my_exercices` (`id_exercices`, `name_exercices`, `description_exercices`, `group_muscu`, `type`) VALUES
(1, 'Curl', '', 'Biceps', 'Charge et répétition'),
(3, 'Curl marteau', '', 'Biceps', 'Charge et répétition'),
(4, 'Squat', '', 'Jambes', 'Charge et répétition'),
(5, 'Curl pupitre', '', 'Biceps', 'Charge et répétition'),
(6, 'Elévations latérales haltères', '', 'Deltoides', 'Charge et répétition'),
(7, 'Oiseau', '', 'Deltoides', 'Charge et répétition'),
(8, 'Presse à jambes', '', 'Jambes', 'Charge et répétition'),
(9, 'Développé couché haltère', '', 'Pectoraux', 'Charge et répétition'),
(10, 'Développé incliné haltère', '', 'Pectoraux', 'Charge et répétition'),
(11, 'Butterfly', '', 'Pectoraux', 'Charge et répétition'),
(12, 'Soulevé de terre', '', 'Dos', 'Charge et répétition'),
(13, 'Tirage horizontale', '', 'Dos', 'Charge et répétition'),
(14, 'Tirage verticale pronation', '', 'Dos', 'Charge et répétition'),
(15, 'Extension triceps poulie', '', 'Triceps', 'Charge et répétition'),
(16, 'Dips ', '', 'Triceps', 'Charge et répétition'),
(17, 'Leg curl allongé', '', 'Jambes', 'Charge et répétition');

-- --------------------------------------------------------

--
-- Structure de la table `my_poids`
--

DROP TABLE IF EXISTS `my_poids`;
CREATE TABLE IF NOT EXISTS `my_poids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `poids` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
