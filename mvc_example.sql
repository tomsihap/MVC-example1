-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 08 fév. 2019 à 10:47
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mvc_example`
--
CREATE DATABASE IF NOT EXISTS `mvc_example` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `mvc_example`;

-- --------------------------------------------------------

--
-- Structure de la table `disque`
--

DROP TABLE IF EXISTS `disque`;
CREATE TABLE IF NOT EXISTS `disque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artiste` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `disque`
--

INSERT INTO `disque` (`id`, `titre`, `artiste`) VALUES
(1, 'Smells Like Teen Spirit', 'Nirvana'),
(2, 'Lemonade', 'Beyonce'),
(3, 'School\'s Out', 'Alice Cooper');

-- --------------------------------------------------------

--
-- Structure de la table `emprunteur`
--

DROP TABLE IF EXISTS `emprunteur`;
CREATE TABLE IF NOT EXISTS `emprunteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emprunteur`
--

INSERT INTO `emprunteur` (`id`, `nom`, `prenom`) VALUES
(4, 'Granger', 'Sophie'),
(5, 'test', 'test'),
(6, 'Granger', 'Sophie2'),
(7, 'test4', 'tseet4'),
(8, 'sdfsdfs', 'tsdfsdf'),
(9, 'sdfsfsdfds', 'dsfdsfdsf'),
(10, 'sdfsfsdfds', 'dsfdsfdsf'),
(11, 'ssdf', 'sfsdfs'),
(12, 'fsdfsdfsfs', 'sdfds'),
(13, 'fsdfsdfsfs', 'sdfds'),
(14, 'fsdfsdfsfs', 'sdfds');

-- --------------------------------------------------------

--
-- Structure de la table `emprunteur_disque`
--

DROP TABLE IF EXISTS `emprunteur_disque`;
CREATE TABLE IF NOT EXISTS `emprunteur_disque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_emprunteur` int(11) NOT NULL,
  `id_disque` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emprunteur_disque`
--

INSERT INTO `emprunteur_disque` (`id`, `id_emprunteur`, `id_disque`) VALUES
(3, 5, 3),
(4, 5, 1),
(5, 11, 2),
(6, 4, 1),
(7, 4, 3),
(8, 7, 2),
(9, 11, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
