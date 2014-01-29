-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 29 Janvier 2014 à 10:21
-- Version du serveur: 5.5.33
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `macsi1`
--

-- --------------------------------------------------------

--
-- Structure de la table `jalon`
--

CREATE TABLE `jalon` (
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

-- --------------------------------------------------------

--
-- Structure de la table `livrable`
--

CREATE TABLE `livrable` (
  `id_livrable` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_livrable`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `lot`
--

CREATE TABLE `lot` (
  `id_lot` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `id_projet` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lot`),
  KEY `id_projet` (`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `phase`
--

CREATE TABLE `phase` (
  `id_phase` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `charge` int(11) DEFAULT NULL,
  `id_projet` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_phase`),
  KEY `id_projet` (`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `enveloppe_budg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_projet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `nom`, `enveloppe_budg`) VALUES
(1, 'Macsi 1', 1),
(8, 'Macsi 2', 1),
(9, 'Macsi 3', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

CREATE TABLE `ressource` (
  `id_ressource` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `qualification` varchar(20) DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ressource`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sousprojet`
--

CREATE TABLE `sousprojet` (
  `id_sousprojet` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `id_lot` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sousprojet`),
  KEY `id_lot` (`id_lot`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
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
  PRIMARY KEY (`id_tache`),
  KEY `id_phase` (`id_phase`),
  KEY `id_sousprojet` (`id_sousprojet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tacheressource`
--

CREATE TABLE `tacheressource` (
  `id_tache` int(11) NOT NULL AUTO_INCREMENT,
  `id_ressource` int(11) NOT NULL DEFAULT '0',
  `duree` int(11) DEFAULT NULL,
  `taux_affectation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tache`,`id_ressource`),
  KEY `id_ressource` (`id_ressource`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tachetache`
--

CREATE TABLE `tachetache` (
  `id_tache_base` int(11) NOT NULL,
  `id_tache_ref` int(11) NOT NULL,
  PRIMARY KEY (`id_tache_base`,`id_tache_ref`),
  KEY `id_tache_ref` (`id_tache_ref`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD CONSTRAINT `tache_ibfk_2` FOREIGN KEY (`id_sousprojet`) REFERENCES `sousprojet` (`id_sousprojet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tacheressource`
--
ALTER TABLE `tacheressource`
  ADD CONSTRAINT `tacheressource_ibfk_1` FOREIGN KEY (`id_tache`) REFERENCES `tache` (`id_tache`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tacheressource_ibfk_2` FOREIGN KEY (`id_ressource`) REFERENCES `ressource` (`id_ressource`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tachetache`
--
ALTER TABLE `tachetache`
  ADD CONSTRAINT `tachetache_ibfk_1` FOREIGN KEY (`id_tache_base`) REFERENCES `tache` (`id_tache`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tachetache_ibfk_2` FOREIGN KEY (`id_tache_ref`) REFERENCES `tache` (`id_tache`) ON DELETE CASCADE ON UPDATE CASCADE;
