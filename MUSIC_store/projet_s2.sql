-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 09 mai 2022 à 03:49
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
-- Base de données : `projet_s2`
--
CREATE DATABASE IF NOT EXISTS `projet_s2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projet_s2`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(3) NOT NULL AUTO_INCREMENT,
  `libelleCategorie` varchar(50) NOT NULL,
  `imgCategorie` varchar(99) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libelleCategorie`, `imgCategorie`) VALUES
(1, 'Pianos', 'cat_piano.jpg'),
(2, 'Guitares', 'cat_guitare.jpg'),
(4, 'Cordes', 'cat_violon.jpg'),
(5, 'Percussions', 'cat_percussion.jpg'),
(6, 'Vents', 'cat_vent.jpg'),
(7, 'Orientals', 'cat_oriental.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(6) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(50) NOT NULL,
  `prenomClient` varchar(50) NOT NULL,
  `emailClient` varchar(99) NOT NULL,
  `mdpClient` varchar(99) NOT NULL,
  `adresseClient` text NOT NULL,
  `rangClient` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idClient`),
  UNIQUE KEY `emailClient` (`emailClient`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nomClient`, `prenomClient`, `emailClient`, `mdpClient`, `adresseClient`, `rangClient`) VALUES
(18, 'admin', 'admin', 'admin@admin.com', 'mdpA123', 'adresse du admin', 1),
(19, 'nomdeclient1', 'prenomdeclient1', 'client1@gmail.com', 'mdpc1', 'adresse du client1', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `numCommande` int(10) NOT NULL AUTO_INCREMENT,
  `acteurCommande` int(6) NOT NULL,
  `dateCommande` datetime NOT NULL,
  `totalPrixCommande` decimal(9,3) NOT NULL,
  `statusCommande` varchar(50) NOT NULL,
  PRIMARY KEY (`numCommande`),
  KEY `fk_ClientCommande` (`acteurCommande`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`numCommande`, `acteurCommande`, `dateCommande`, `totalPrixCommande`, `statusCommande`) VALUES
(17, 19, '2022-04-07 07:11:41', '0.000', 'En preparation'),
(18, 19, '2022-04-07 07:17:05', '0.000', 'En preparation'),
(19, 19, '2022-04-07 07:17:27', '0.000', 'En preparation'),
(20, 18, '2022-04-07 07:21:51', '0.000', 'En preparation'),
(21, 18, '2022-04-07 07:22:11', '0.000', 'En preparation'),
(22, 18, '2022-04-08 03:10:34', '0.000', 'En preparation'),
(23, 18, '2022-04-08 03:12:16', '0.000', 'En preparation'),
(24, 18, '2022-04-08 03:12:36', '0.000', 'En preparation'),
(25, 18, '2022-04-08 03:12:50', '0.000', 'En preparation'),
(26, 18, '2022-04-08 03:12:59', '0.000', 'En preparation'),
(27, 18, '2022-04-08 03:13:06', '0.000', 'En preparation'),
(28, 18, '2022-04-08 03:13:17', '0.000', 'En preparation'),
(29, 18, '2022-04-08 03:15:29', '0.000', 'En preparation'),
(30, 18, '2022-04-08 03:30:23', '0.000', 'En preparation'),
(31, 18, '2022-04-08 09:13:12', '0.000', 'En preparation'),
(32, 18, '2022-04-08 11:21:43', '0.000', 'En preparation');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `idFacture` int(10) NOT NULL AUTO_INCREMENT,
  `numcommande` int(10) NOT NULL,
  `modePayment` varchar(1) NOT NULL,
  `dateFacture` datetime NOT NULL,
  PRIMARY KEY (`idFacture`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

DROP TABLE IF EXISTS `instrument`;
CREATE TABLE IF NOT EXISTS `instrument` (
  `idInstrument` int(5) NOT NULL AUTO_INCREMENT,
  `libelleInstrument` varchar(99) NOT NULL,
  `descriptionInstrument` text,
  `categorieInstrument` int(3) NOT NULL,
  `marqueInstrument` varchar(50) NOT NULL,
  `imageInstrument` varchar(99) NOT NULL,
  `quantiteDispoInstrument` int(3) NOT NULL,
  `prixInstrument` decimal(8,3) NOT NULL,
  PRIMARY KEY (`idInstrument`),
  KEY `fk_InstrumentCategorie` (`categorieInstrument`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `instrument`
--

INSERT INTO `instrument` (`idInstrument`, `libelleInstrument`, `descriptionInstrument`, `categorieInstrument`, `marqueInstrument`, `imageInstrument`, `quantiteDispoInstrument`, `prixInstrument`) VALUES
(8, 'grand-piano-151-cm-yamaha-noir-verni-avec-banquette', '                      aaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaa', 1, 'YAMAHA', 'grand-piano-151-cm-yamaha-noir-verni-avec-banquette.jpg', 2, '39999.000'),
(9, 'grand-piano-151-cm-yamaha-blanc-verni-avec-banquette', '', 1, 'YAMAHA', 'grand-piano-151-cm-yamaha-blanc-verni-avec-banquette.jpg', 2, '39999.000'),
(10, 'piano-digital-yamaha-clavinova-clp-745-ivoire-avec-banquette', 'piano-digital-yamaha-clavinova-clp-745-ivoire-avec-banquette', 1, 'YAMAHA', 'piano-digital-yamaha-clavinova-clp-745-ivoire-avec-banquette.jpg', 3, '12000.000'),
(11, 'guitare-elctro-classique-yamaha-cgx122mcc', 'guitare-elctro-classique-yamaha-cgx122mcc', 2, 'YAMAHA', 'guitare-elctro-classique-yamaha-cgx122mcc.jpg', 5, '650.000'),
(12, 'piano-droit-yamaha-u1jcp-121m-satin-dark-walnut-avec-banquette', 'piano-droit-yamaha-u1jcp-121m-satin-dark-walnut-avec-banquette', 1, 'YAMAHA', 'piano-droit-yamaha-u1jcp-121m-satin-dark-walnut-avec-banquette.jpg', 3, '20000.000'),
(13, 'guitare-bass-5-cordes-yamaha-misty-green', '                    guitare-bass-5-cordes-yamaha-misty-green                ', 2, 'YAMAHA', 'guitare-bass-5-cordes-yamaha-misty-green.jpg', 6, '540.000'),
(14, 'guitare-electrique-sterling-cutlass-ct30-sss-daphne-blue', 'guitare-electrique-sterling-cutlass-ct30-sss-daphne-blue', 2, 'Daphne', 'guitare-electrique-sterling-cutlass-ct30-sss-daphne-blue.jpg', 4, '455.000');

-- --------------------------------------------------------

--
-- Structure de la table `lignecommande`
--

DROP TABLE IF EXISTS `lignecommande`;
CREATE TABLE IF NOT EXISTS `lignecommande` (
  `numcommande` int(11) NOT NULL,
  `idInstrument` int(10) NOT NULL,
  `quantite` int(3) NOT NULL,
  PRIMARY KEY (`numcommande`,`idInstrument`),
  KEY `fk_InstrumentCommande` (`idInstrument`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lignecommande`
--

INSERT INTO `lignecommande` (`numcommande`, `idInstrument`, `quantite`) VALUES
(18, 8, 1),
(19, 8, 1),
(20, 8, 2),
(21, 9, 1),
(22, 9, 2),
(23, 8, 2),
(24, 9, 2),
(25, 8, 2),
(26, 9, 2),
(27, 9, 2),
(28, 9, 2),
(29, 8, 2),
(29, 9, 1),
(30, 8, 1),
(30, 9, 1),
(31, 8, 1),
(32, 9, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_ClientCommande` FOREIGN KEY (`acteurCommande`) REFERENCES `client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `instrument`
--
ALTER TABLE `instrument`
  ADD CONSTRAINT `fk_InstrumentCategorie` FOREIGN KEY (`categorieInstrument`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lignecommande`
--
ALTER TABLE `lignecommande`
  ADD CONSTRAINT `fk_CommandeLigne` FOREIGN KEY (`numcommande`) REFERENCES `commande` (`numCommande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_InstrumentCommande` FOREIGN KEY (`idInstrument`) REFERENCES `instrument` (`idInstrument`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
