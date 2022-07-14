-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 14 juil. 2022 à 20:45
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
-- Structure de la table `charge_repetition`
--

DROP TABLE IF EXISTS `charge_repetition`;
CREATE TABLE IF NOT EXISTS `charge_repetition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_exercices` int(11) NOT NULL,
  `charges` int(11) NOT NULL,
  `repetitions` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `charge_repetition`
--

INSERT INTO `charge_repetition` (`id`, `id_exercices`, `charges`, `repetitions`) VALUES
(1, 15, 10, 4),
(2, 15, 10, 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
