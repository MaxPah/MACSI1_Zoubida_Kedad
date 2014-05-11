-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 11 Mai 2014 à 13:33
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
  `id_jalon` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text,
  `date` date DEFAULT NULL,
  `evenement` text,
  `id_phase` int(11) DEFAULT NULL,
  `id_projet` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jalon`),
  KEY `id_phase` (`id_phase`),
  KEY `id_projet` (`id_projet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `jalon`
--

INSERT INTO `jalon` (`id_jalon`, `nom`, `date`, `evenement`, `id_phase`, `id_projet`) VALUES
(1, 'Jalon 1', '2014-04-25', 'Livrable rendu', 1, 9),
(2, 'jal1', '2014-05-09', 'azertyuiop', 8, 10),
(3, 'j3', '2014-05-10', 'ju', 8, 10),
(4, 'Debut de l etude prealable', '2014-04-09', 'Lancement du projet', 9, 17),
(5, 'Fin de l etude prealable', '2014-04-24', 'Etude prealable terminee, le developpement peut commencer', 9, 17),
(6, 'Debut de la conception technique', '2014-04-09', 'Debut de la visualisation du site', 10, 17),
(7, 'Fin de la conception technique', '2014-05-15', 'Conception technique terminee, le developpement peut commencer', 10, 17),
(8, 'Debut de la realisation', '2014-05-20', 'Debut du developpement du site', 11, 17),
(9, 'Fin de la realisation', '2014-05-30', 'Developpement termine, le site peut etre mit en ligne', 11, 17),
(10, 'Debut de la mise en oeuvre', '2014-05-30', 'Mise en place de la publication en ligne du site', 12, 17),
(11, 'Fin de la mise en oeuvre', '2014-06-11', 'Fin du projet', 12, 17);

-- --------------------------------------------------------

--
-- Structure de la table `livrable`
--

CREATE TABLE `livrable` (
  `id_livrable` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `id_projet` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_jalon` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_livrable`),
  KEY `livrable_ibfk_1` (`id_projet`),
  KEY `id_jalon` (`id_jalon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `livrable`
--

INSERT INTO `livrable` (`id_livrable`, `nom`, `id_projet`, `description`, `id_jalon`) VALUES
(1, 'Livrable 1', 9, 'Desc livrable 1', 1),
(2, 'Livrable 2', 9, 'Desc livrable 2', 1),
(5, 'liv2', 10, 'etre liv2', NULL),
(6, 'FeuilleDeStyle.css', 17, 'Redaction des pages CSS', NULL),
(7, 'Pages X', 17, 'Toutes les pages sont redigees', 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `lot`
--

INSERT INTO `lot` (`id_lot`, `nom`, `id_projet`) VALUES
(1, 'Lot 1', 9),
(2, 'Lot2', 9),
(7, 'lot1', 10),
(8, 'Cahier des charges', 17),
(9, 'Charte graphique', 17),
(10, 'Mise en production', 17),
(11, 'Optimisation SEO', 17),
(12, 'Mise en ligne', 17);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `phase`
--

INSERT INTO `phase` (`id_phase`, `nom`, `charge`, `id_projet`) VALUES
(1, 'Phase 1', 3210, 9),
(2, 'Phase 2', 75, 9),
(8, 'ph1', 0, 10),
(9, 'Etude prealable', 0, 17),
(10, 'Conception technique', 0, 17),
(11, 'Realisation', 4000, 17),
(12, 'Mise en oeuvre', 0, 17);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `enveloppe_budg` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `datedeb` date NOT NULL,
  `datefin` date NOT NULL,
  PRIMARY KEY (`id_projet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `nom`, `enveloppe_budg`, `description`, `datedeb`, `datefin`) VALUES
(9, 'Macsi 3', 50000, 'ProjetTest', '2014-04-18', '2014-04-24'),
(10, 'Test suppressions', 7000000, 'test suppr', '2014-04-01', '2014-06-21'),
(17, 'Demonstration', 30000, 'Exemple de conduite d''un projet de creation de site web', '2014-05-09', '2014-06-12');

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

CREATE TABLE `ressource` (
  `id_ressource` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `qualification` varchar(20) DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id_ressource`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `ressource`
--

INSERT INTO `ressource` (`id_ressource`, `nom`, `qualification`, `cout`, `type`) VALUES
(1, 'Maxime', 'Chef de projet', 2000, 'humaine'),
(2, 'Syrine', 'Secretaire', 2000, 'humaine'),
(5, 'Edouard', 'Chef de projet', 2000, 'humaine'),
(7, 'Logiciel EXCEL', 'calcul', 75, 'logicielle'),
(8, 'Albert', 'Developpeur', 1000, 'humaine'),
(9, 'Bertrand', 'Developpeur', 1000, 'humaine'),
(10, 'Christine', 'Developpeur', 1000, 'humaine'),
(11, 'Daniela', 'Graphiste', 1500, 'humaine');

-- --------------------------------------------------------

--
-- Structure de la table `sousprojet`
--

CREATE TABLE `sousprojet` (
  `id_sousprojet` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text,
  `id_lot` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sousprojet`),
  KEY `id_lot` (`id_lot`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `sousprojet`
--

INSERT INTO `sousprojet` (`id_sousprojet`, `nom`, `id_lot`) VALUES
(1, 'Sous Proj 1', 1),
(2, 'sp2', 1),
(3, 'SP3', 1),
(4, 'Sousprojet1', 2),
(11, 'sp1', 7),
(12, 'Identite visuelle', 9),
(13, 'Maquettes graphiques', 9),
(14, 'Realisation technique', 10),
(15, 'Integrations graphiques', 10),
(16, 'Modification des contenus', 11),
(17, 'Validations', 11),
(18, 'Publication', 12),
(19, 'Referencement', 12),
(20, 'Etude technique', 8),
(21, 'Etude strategique', 8);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `id_tache` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text,
  `cout` int(11) DEFAULT NULL,
  `date_debut_tot` date DEFAULT NULL,
  `date_debut_tard` date DEFAULT NULL,
  `date_fin_tot` date DEFAULT NULL,
  `date_fin_tard` date DEFAULT NULL,
  `duree` int(11) NOT NULL,
  `objectif` text,
  `journee_homme` int(5) DEFAULT NULL,
  `id_phase` int(11) DEFAULT NULL,
  `id_sousprojet` int(11) DEFAULT NULL,
  `id_livrable` int(11) DEFAULT NULL,
  `id_tache_dep` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tache`),
  KEY `id_phase` (`id_phase`),
  KEY `id_sousprojet` (`id_sousprojet`),
  KEY `tache_ibfk_3` (`id_livrable`),
  KEY `tache_ibfk_5` (`id_tache_dep`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Contenu de la table `tache`
--

INSERT INTO `tache` (`id_tache`, `nom`, `cout`, `date_debut_tot`, `date_debut_tard`, `date_fin_tot`, `date_fin_tard`, `duree`, `objectif`, `journee_homme`, `id_phase`, `id_sousprojet`, `id_livrable`, `id_tache_dep`) VALUES
(9, 'Tache2', 1000, '2014-04-13', '2014-04-26', '2014-04-27', '2014-04-25', 10, 'Etre la tache 2', 2, 1, 1, 2, NULL),
(10, 'tache 3', 0, '2014-04-25', '2014-04-25', '2014-04-27', '2014-04-27', 2, 'Etre la tache 3', 1, 1, 1, NULL, NULL),
(11, 'tache 4', 210, '2014-04-25', '2014-04-25', '2014-05-29', '2014-05-29', 30, 'Etre la tache 4', 50, 1, 1, NULL, NULL),
(12, 'tache 5', 0, '2014-04-12', '2014-04-12', '2015-04-12', '2015-04-12', 365, 'Etre la tache 5', 200, 1, 1, 1, 11),
(13, 'tache 6', 2000, '2014-04-12', '2014-04-12', '2014-05-12', '2014-05-12', 30, 'Etre la tache 6', 200, 1, 1, 1, 11),
(16, 'ta1', 0, '2014-05-09', '2014-05-09', '2014-05-10', '2014-05-10', 1, 't1', 1, 8, 11, NULL, 16),
(17, 'ta2', 0, '2014-06-30', '2014-06-30', '2014-07-01', '2014-07-01', 1, 't1', 1, 8, 11, NULL, NULL),
(18, 'ta3', 0, '2014-05-09', '2014-05-09', '2014-05-17', '2014-05-17', 8, 'etre t3', 8, 8, 11, NULL, NULL),
(19, 'ta4', 0, '2014-05-09', '2014-05-09', '2014-05-17', '2014-05-17', 8, 'etre t4', 8, 8, 11, NULL, NULL),
(20, 'Tache 8 ', 75, '2014-05-08', '2014-05-08', '2014-07-08', '2014-07-08', 60, 'Etre la tache 8', 120, 2, 1, NULL, NULL),
(21, 'Choix du langage de developpement', 0, '2014-04-09', '2014-04-09', '2014-04-16', '2014-04-16', 7, 'Choix du langage de developpement', 1, 9, 20, NULL, NULL),
(22, 'Definition arborescence', 0, '2014-04-09', '2014-04-09', '2014-04-16', '2014-04-16', 7, 'Definir l arborescence du site', 2, 10, 20, NULL, NULL),
(23, 'Definition plan d hebergement', 0, '2014-04-09', '2014-04-09', '2014-04-16', '2014-04-16', 7, 'Definir le plan d hebergement', 0, 9, 21, NULL, NULL),
(24, 'Garantie technique', 0, '2014-04-16', '2014-04-17', '2014-04-23', '2014-04-24', 7, 'Definir la garantie et la maintenance', 2, 9, 21, NULL, 23),
(25, 'Choix des couleurs, typos', 0, '2014-04-09', '2014-04-09', '2014-04-23', '2014-04-23', 14, 'Choisir les couleurs et typos', 2, 9, 12, NULL, NULL),
(26, 'Creation des logos', 0, '2014-04-23', '2014-04-23', '2014-04-30', '2014-04-30', 7, 'Creer les logos', 2, 10, 12, NULL, 25),
(27, 'Realisation des maquettes', 0, '2014-04-23', '2014-04-24', '2014-05-08', '2014-05-09', 15, 'Realiser les maquettes', 2, 10, 13, NULL, 26),
(28, 'Validation maquettes', 0, '2014-05-09', '2014-05-10', '2014-05-20', '2014-05-20', 11, 'Valider les maquettes', 2, 10, 13, NULL, 27),
(29, 'Pages X', 2300, '2014-05-20', '2014-05-20', '2014-05-27', '2014-05-27', 7, 'Creer pages X', 1, 11, 14, 7, 28),
(33, 'Creation CSS', 1700, '2014-05-14', '2014-05-15', '2014-05-17', '2014-05-18', 3, 'Creer le CSS', 1, 11, 15, 6, 28),
(34, 'Integration des textes', 0, '2014-05-27', '2014-05-27', '2014-05-29', '2014-05-29', 2, 'Integrer les textes', 1, 11, 15, NULL, 29),
(35, 'Redaction des mots cles', 0, '2014-05-27', '2014-05-27', '2014-05-30', '2014-05-30', 3, 'Rediger les mots cles', 1, 11, 16, NULL, 29),
(36, 'Redaction des balises meta', 0, '2014-05-27', '2014-05-28', '2014-05-29', '2014-05-29', 2, 'Rediger les balises meta', 1, 11, 16, NULL, 29),
(37, 'Verification validite code source', 0, '2014-05-29', '2014-05-30', '2014-06-01', '2014-06-01', 1, 'Valider code source', 1, 12, 17, NULL, 36),
(38, 'Validation W3C', 0, '2014-06-01', '2014-06-02', '2014-06-02', '2014-06-02', 1, 'Valider aux normes W3C', 1, 12, 17, NULL, 37),
(39, 'Publication sur serveur', 0, '2014-06-02', '2014-06-03', '2014-06-03', '2014-06-04', 1, 'Publier sur le serveur', 1, 12, 18, NULL, 38),
(40, 'Configuration serveur', 0, '2014-06-02', '2014-06-03', '2014-06-03', '2014-06-04', 1, 'Configurer le serveur', 1, 12, 18, NULL, 38),
(41, 'Generation du SiteMap', 0, '2014-06-04', '2014-06-05', '2014-06-06', '2014-06-07', 2, 'Generer sitemap', 1, 12, 18, NULL, 40),
(42, 'Integration moteurs de recherche', 0, '2014-06-07', '2014-06-07', '2014-06-10', '2014-06-10', 3, 'Integrer aux moteurs de recherche', 1, 12, 19, NULL, 41),
(43, 'NetLinking', 0, '2014-06-07', '2014-06-08', '2014-06-10', '2014-06-11', 3, 'Creer les liens entrants', 1, 12, 19, NULL, 41);

-- --------------------------------------------------------

--
-- Structure de la table `tacheressource`
--

CREATE TABLE `tacheressource` (
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
(9, 5, 10, 50, 9),
(11, 2, 10, 10, 9),
(13, 1, 2, 100, 9),
(20, 7, 1, 100, 9),
(29, 5, 3, 50, 17),
(29, 8, 3, 70, 17),
(29, 10, 3, 60, 17),
(33, 1, 3, 40, 17),
(33, 11, 3, 60, 17);

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
  ADD CONSTRAINT `livrable_ibfk_1` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `livrable_ibfk_2` FOREIGN KEY (`id_jalon`) REFERENCES `jalon` (`id_jalon`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tache_ibfk_3` FOREIGN KEY (`id_livrable`) REFERENCES `livrable` (`id_livrable`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tache_ibfk_5` FOREIGN KEY (`id_tache_dep`) REFERENCES `tache` (`id_tache`);

--
-- Contraintes pour la table `tacheressource`
--
ALTER TABLE `tacheressource`
  ADD CONSTRAINT `tacheressource_ibfk_1` FOREIGN KEY (`id_tache`) REFERENCES `tache` (`id_tache`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tacheressource_ibfk_2` FOREIGN KEY (`id_ressource`) REFERENCES `ressource` (`id_ressource`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tacheressource_ibfk_3` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`) ON DELETE CASCADE ON UPDATE CASCADE;
