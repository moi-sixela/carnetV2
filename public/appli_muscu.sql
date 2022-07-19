-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 19 juil. 2022 à 16:24
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
-- Structure de la table `authentification`
--

DROP TABLE IF EXISTS `authentification`;
CREATE TABLE IF NOT EXISTS `authentification` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` char(60) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `authentification`
--

INSERT INTO `authentification` (`id_user`, `first_name`, `last_name`, `email`, `username`, `password`, `date_naissance`, `age`) VALUES
(1, 'Alexis', 'CONTAMIN', 'alexiscontamin@gmail.com', 'Alexis', '$2y$10$n.GLoy7AnVX3IsXmtWWg8eLr96qTk8pIhbFl.rM/3mSEVSGWvj9CO', '2003-11-15', 18),
(5, 'test', 'test', 'test@test.test', 'test', '$2y$10$qT5NeLwX9Xh/GzDNec9J3.n0sZjsi6l8ypAzGO8J4AvUwkoB73ADe', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `charge_repetition`
--

DROP TABLE IF EXISTS `charge_repetition`;
CREATE TABLE IF NOT EXISTS `charge_repetition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_exercices` int(11) NOT NULL,
  `id_entrainement` int(11) NOT NULL,
  `charges` int(11) NOT NULL,
  `repetitions` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `charge_repetition`
--

INSERT INTO `charge_repetition` (`id`, `id_user`, `id_exercices`, `id_entrainement`, `charges`, `repetitions`) VALUES
(16, 1, 42, 9, 7, 10),
(17, 5, 44, 10, 4, 12);

-- --------------------------------------------------------

--
-- Structure de la table `entrainement`
--

DROP TABLE IF EXISTS `entrainement`;
CREATE TABLE IF NOT EXISTS `entrainement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `name_entrainement` text NOT NULL,
  `description_entrainement` text,
  `date` date NOT NULL,
  `descriptiongenerale` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entrainement`
--

INSERT INTO `entrainement` (`id`, `id_user`, `name_entrainement`, `description_entrainement`, `date`, `descriptiongenerale`) VALUES
(9, 1, 'Jambes', '', '2022-07-19', NULL),
(10, 5, 'Jambes', 'aze', '2022-07-19', 'azeazeazeazerazrazra');

-- --------------------------------------------------------

--
-- Structure de la table `exercices_entrainement`
--

DROP TABLE IF EXISTS `exercices_entrainement`;
CREATE TABLE IF NOT EXISTS `exercices_entrainement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_entrainement` int(11) DEFAULT NULL,
  `name_exercices` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `exercices_entrainement`
--

INSERT INTO `exercices_entrainement` (`id`, `id_user`, `id_entrainement`, `name_exercices`) VALUES
(42, 1, 9, 'Curl'),
(43, 1, 9, 'Tirage horizontale'),
(44, 5, 10, 'Elévations latérales haltères'),
(45, 5, 10, 'Oiseau'),
(46, 5, 10, 'Soulevé de terre');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
(17, 'Leg curl allongé', '', 'Jambes', 'Charge et répétition'),
(18, 'Pompes', '', 'Pectoraux', 'Charge et répétition');

-- --------------------------------------------------------

--
-- Structure de la table `my_height`
--

DROP TABLE IF EXISTS `my_height`;
CREATE TABLE IF NOT EXISTS `my_height` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `height` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `my_height`
--

INSERT INTO `my_height` (`id`, `id_user`, `date`, `height`) VALUES
(1, 1, '2022-07-19', 181);

-- --------------------------------------------------------

--
-- Structure de la table `my_poids`
--

DROP TABLE IF EXISTS `my_poids`;
CREATE TABLE IF NOT EXISTS `my_poids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `poids` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `my_poids`
--

INSERT INTO `my_poids` (`id`, `id_user`, `date`, `poids`) VALUES
(14, 5, '2022-07-19', 2),
(13, 5, '2022-07-19', 185),
(12, 1, '2022-07-19', 75);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
