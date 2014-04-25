-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le : Ven 25 Avril 2014 à 14:33
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `macsi1`
--

-- --------------------------------------------------------

--
-- Structure de la table `jalon`
--

CREATE TABLE IF NOT EXISTS `jalon` (
  `id_jalon` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `evenement` varchar(20) DEFAULT NULL,
  `id_phase` int(11) DEFAULT NULL,
  `id_projet` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jalon`),
  KEY `id_phase` (`id_phase`),
  KEY `id_projet` (`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jalon`
--

INSERT INTO `jalon` (`id_jalon`, `nom`, `date`, `evenement`, `id_phase`, `id_projet`) VALUES
(1, 'Jalon 1', '2014-04-25', 'Livrable rendu', 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `livrable`
--

CREATE TABLE IF NOT EXISTS `livrable` (
  `id_livrable` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `id_projet` int(11) NOT NULL,
  PRIMARY KEY (`id_livrable`),
  KEY `livrable_ibfk_1` (`id_projet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `livrable`
--

INSERT INTO `livrable` (`id_livrable`, `nom`, `id_projet`) VALUES
(1, 'Livrable 1', 9),
(2, 'Livrable 2', 9);

-- --------------------------------------------------------

--
-- Structure de la table `lot`
--

CREATE TABLE IF NOT EXISTS `lot` (
  `id_lot` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `id_projet` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lot`),
  KEY `id_projet` (`id_projet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `lot`
--

INSERT INTO `lot` (`id_lot`, `nom`, `id_projet`) VALUES
(1, 'Lot 1', 9),
(2, 'Lot2', 9),
(4, 'Lot 1 Projet Test', 10);

-- --------------------------------------------------------

--
-- Structure de la table `phase`
--

CREATE TABLE IF NOT EXISTS `phase` (
  `id_phase` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `charge` int(11) DEFAULT NULL,
  `id_projet` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_phase`),
  KEY `id_projet` (`id_projet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `phase`
--

INSERT INTO `phase` (`id_phase`, `nom`, `charge`, `id_projet`) VALUES
(1, 'Phase 1', 1000, 9),
(2, 'Phase 2', 30, 9),
(3, 'Phase test 1', 123, 10),
(4, 'Phase 1', 50, 15);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `enveloppe_budg` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `datedeb` date NOT NULL,
  `datefin` date NOT NULL,
  PRIMARY KEY (`id_projet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `nom`, `enveloppe_budg`, `description`, `datedeb`, `datefin`) VALUES
(1, 'Macsi 1', 12000, 'macsi1', '2014-02-04', '2014-10-10'),
(8, 'Macsi 2', 1, '', '2014-04-08', '2014-04-26'),
(9, 'Macsi 3', 50000, 'ProjetTest', '2014-04-18', '2014-04-24'),
(10, 'Test suppressions', 7000000, 'test suppr', '2014-04-01', '2014-06-21'),
(14, 'Projet 1', 65000, 'Ceci est un projet test', '2014-04-21', '2014-04-30'),
(15, 'Projet 2', 2000, 'grtvzfreoi', '2014-04-24', '2014-04-25');

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

CREATE TABLE IF NOT EXISTS `ressource` (
  `id_ressource` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `qualification` varchar(20) DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id_ressource`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `ressource`
--

INSERT INTO `ressource` (`id_ressource`, `nom`, `qualification`, `cout`, `type`) VALUES
(1, 'Maxime', 'Chef de projet', 2000, 'humaine'),
(2, 'Syrine', 'Secretaire', 2000, 'humaine'),
(3, 'Parapluie', 'Proteger de la pluie', 10, 'materielle'),
(4, 'Pierre', 'Chef de projet', 2000, 'humaine');

-- --------------------------------------------------------

--
-- Structure de la table `sousprojet`
--

CREATE TABLE IF NOT EXISTS `sousprojet` (
  `id_sousprojet` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `id_lot` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sousprojet`),
  KEY `id_lot` (`id_lot`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `sousprojet`
--

INSERT INTO `sousprojet` (`id_sousprojet`, `nom`, `id_lot`) VALUES
(1, 'Sous Proj 1', 1),
(2, 'sp2', 1),
(3, 'SP3', 1),
(4, 'Sousprojet1', 2),
(8, 'Suppr test 2 SP', 4);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE IF NOT EXISTS `tache` (
  `id_tache` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `date_debut_tot` date DEFAULT NULL,
  `date_debut_tard` date DEFAULT NULL,
  `date_fin_tot` date DEFAULT NULL,
  `date_fin_tard` date DEFAULT NULL,
  `duree` int(11) NOT NULL,
  `objectif` varchar(50) DEFAULT NULL,
  `journee_homme` varchar(3) DEFAULT NULL,
  `id_phase` int(11) DEFAULT NULL,
  `id_sousprojet` int(11) DEFAULT NULL,
  `id_livrable` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tache`),
  KEY `id_phase` (`id_phase`),
  KEY `id_sousprojet` (`id_sousprojet`),
  KEY `tache_ibfk_3` (`id_livrable`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `tache`
--

INSERT INTO `tache` (`id_tache`, `nom`, `cout`, `date_debut_tot`, `date_debut_tard`, `date_fin_tot`, `date_fin_tard`, `duree`, `objectif`, `journee_homme`, `id_phase`, `id_sousprojet`, `id_livrable`) VALUES
(8, 'tache1', 200, '2014-04-21', '2014-04-22', '2014-04-25', '2014-05-01', 30, 'Etre la tache 1', '10', 1, 1, 2),
(9, 'Tache2', 10, '2014-04-13', '2014-04-26', '2014-04-27', '2014-04-25', 10, 'Etre la tache 2', '2', 1, 1, 2),
(10, 'tache 3', 500, '2014-04-20', '2014-04-20', '2014-04-21', '2014-04-21', 2, 'Etre la tache 3', '2', 1, 1, NULL),
(11, 'tache 4', 30, '2014-04-22', '2014-04-22', '2014-04-27', '2014-04-28', 5, 'Etre la tache 4', '30', 2, 2, NULL),
(12, 'tache 5', 60, '2014-07-22', '2014-07-22', '2014-08-24', '2014-08-24', 0, 'Etre la tache 5', '0', 1, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tacheressource`
--

CREATE TABLE IF NOT EXISTS `tacheressource` (
  `id_tache` int(11) NOT NULL,
  `id_ressource` int(11) NOT NULL DEFAULT '0',
  `duree` int(11) DEFAULT NULL,
  `taux_affectation` int(11) DEFAULT NULL,
  `id_projet` int(11) NOT NULL,
  PRIMARY KEY (`id_tache`,`id_ressource`),
  KEY `id_ressource` (`id_ressource`),
  KEY `tacheressource_ibfk_3` (`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tacheressource`
--

INSERT INTO `tacheressource` (`id_tache`, `id_ressource`, `duree`, `taux_affectation`, `id_projet`) VALUES
(8, 1, 2, 20, 9),
(8, 3, 2, 100, 9);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `jalon`
--
ALTER TABLE `jalon`
  ADD CONSTRAINT `jalon_ibfk_2` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jalon_ibfk_3` FOREIGN KEY (`id_phase`) REFERENCES `phase` (`id_phase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livrable`
--
ALTER TABLE `livrable`
  ADD CONSTRAINT `livrable_ibfk_1` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lot`
--
ALTER TABLE `lot`
  ADD CONSTRAINT `lot_ibfk_1` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `phase`
--
ALTER TABLE `phase`
  ADD CONSTRAINT `phase_ibfk_1` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sousprojet`
--
ALTER TABLE `sousprojet`
  ADD CONSTRAINT `sousprojet_ibfk_1` FOREIGN KEY (`id_lot`) REFERENCES `lot` (`id_lot`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `tache_ibfk_1` FOREIGN KEY (`id_phase`) REFERENCES `phase` (`id_phase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tache_ibfk_2` FOREIGN KEY (`id_sousprojet`) REFERENCES `sousprojet` (`id_sousprojet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tache_ibfk_3` FOREIGN KEY (`id_livrable`) REFERENCES `livrable` (`id_livrable`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `tacheressource`
--
ALTER TABLE `tacheressource`
  ADD CONSTRAINT `tacheressource_ibfk_3` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tacheressource_ibfk_1` FOREIGN KEY (`id_tache`) REFERENCES `tache` (`id_tache`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tacheressource_ibfk_2` FOREIGN KEY (`id_ressource`) REFERENCES `ressource` (`id_ressource`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
