-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 11 mai 2018 à 07:40
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `e4`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `matricule` int(20) NOT NULL AUTO_INCREMENT,
  `codeReg` int(20) NOT NULL,
  `numAgence` varchar(50) NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `numAgence` int(11) NOT NULL,
  `nomAgence` varchar(25) DEFAULT NULL,
  `adresseAgence` varchar(25) DEFAULT NULL,
  `telephoneAgence` int(11) DEFAULT NULL,
  `faxAgence` varchar(25) DEFAULT NULL,
  `codeRegion` int(50) NOT NULL,
  PRIMARY KEY (`numAgence`),
  KEY `codeRegion` (`codeRegion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`numAgence`, `nomAgence`, `adresseAgence`, `telephoneAgence`, `faxAgence`, `codeRegion`) VALUES
(1, 'TestAgence', 'TestAdresse', 333333, 'TestFax', 3);

-- --------------------------------------------------------

--
-- Structure de la table `assistanttelephonique`
--

DROP TABLE IF EXISTS `assistanttelephonique`;
CREATE TABLE IF NOT EXISTS `assistanttelephonique` (
  `matricule` int(11) NOT NULL,
  `codeRegion` int(11) DEFAULT NULL,
  PRIMARY KEY (`matricule`),
  KEY `FK_assistantTelephonique_codeRegion` (`codeRegion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `assistanttelephonique`
--

INSERT INTO `assistanttelephonique` (`matricule`, `codeRegion`) VALUES
(5, 1),
(1, 2),
(3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `numClient` int(11) NOT NULL,
  `nomClient` varchar(20) NOT NULL,
  `raisonSociale` varchar(25) DEFAULT NULL,
  `siren` varchar(25) DEFAULT NULL,
  `codeApe` int(11) DEFAULT NULL,
  `adresse` varchar(25) DEFAULT NULL,
  `telephoneClient` int(11) DEFAULT NULL,
  `faxClient` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `dureeDeplacement` double DEFAULT NULL,
  `distanceKm` double DEFAULT NULL,
  `numAgence` int(11) DEFAULT NULL,
  PRIMARY KEY (`numClient`),
  KEY `FK_Client_numAgence` (`numAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`numClient`, `nomClient`, `raisonSociale`, `siren`, `codeApe`, `adresse`, `telephoneClient`, `faxClient`, `email`, `dureeDeplacement`, `distanceKm`, `numAgence`) VALUES
(1, 'TestNom', 'TestRaison', 'TestSiren', 1234, 'TestAdresse', 65161, 'TestFax', 'TestEmailTVIRE', 3, 3898, 1);

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `idConnexion` int(50) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `matricule` int(11) NOT NULL,
  `id_droit` int(50) NOT NULL,
  PRIMARY KEY (`idConnexion`),
  KEY `matricule` (`matricule`),
  KEY `id_droit` (`id_droit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`idConnexion`, `login`, `mdp`, `matricule`, `id_droit`) VALUES
(1, 'test', 'test', 0, 0),
(2, 'admin', 'admin', 3, 1),
(3, 'assistant', 'assistant', 1, 3),
(4, 'tech', 'tech', 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `contratmaintenance`
--

DROP TABLE IF EXISTS `contratmaintenance`;
CREATE TABLE IF NOT EXISTS `contratmaintenance` (
  `numContrat` int(11) NOT NULL,
  `dateSignature` date DEFAULT NULL,
  `dateEcheance` date DEFAULT NULL,
  `refTypeContrat` varchar(25) DEFAULT NULL,
  `numClient` int(11) DEFAULT NULL,
  PRIMARY KEY (`numContrat`),
  KEY `FK_ContratMaintenance_refTypeContrat` (`refTypeContrat`),
  KEY `FK_ContratMaintenance_numClient` (`numClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contratmaintenance`
--

INSERT INTO `contratmaintenance` (`numContrat`, `dateSignature`, `dateEcheance`, `refTypeContrat`, `numClient`) VALUES
(1, '2017-11-01', '2018-01-31', 'TestTypeContrat', 1);

-- --------------------------------------------------------

--
-- Structure de la table `controler`
--

DROP TABLE IF EXISTS `controler`;
CREATE TABLE IF NOT EXISTS `controler` (
  `tempsPasse` int(11) DEFAULT NULL,
  `commentaire` varchar(25) DEFAULT NULL,
  `numSerie` int(50) NOT NULL,
  `NumIntervention` int(50) NOT NULL,
  KEY `numSerie` (`numSerie`),
  KEY `NumIntervention` (`NumIntervention`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `controler`
--

INSERT INTO `controler` (`tempsPasse`, `commentaire`, `numSerie`, `NumIntervention`) VALUES
(20, 'test', 1, 1),
(55577, 'JHUKKKJ.B.?', 0, 0),
(0, 'ntm', 0, 0),
(0, 'ntm', 0, 0),
(566, 'grgrgrg', 0, 0),
(5, 't viré', 0, 0),
(5, 't viré', 0, 0),
(5, 't viré', 0, 0),
(333, 'JJH', 0, 0),
(0, 't viré', 0, 0),
(10, 'AZERTYRAZEAZECVXFZGECehff', 0, 0),
(80, 't mort fdp', 0, 0),
(10, 'sezedf', 0, 0),
(12, 'azeazzzezzze', 0, 0),
(2, 'ae', 0, 0),
(20, 'azsasassa', 2, 2),
(522, 'grgrgr', 2, 2);

--
-- Déclencheurs `controler`
--
DROP TRIGGER IF EXISTS `addNbCommentaire`;
DELIMITER $$
CREATE TRIGGER `addNbCommentaire` AFTER INSERT ON `controler` FOR EACH ROW UPDATE nbcommentaire SET `nbcommentaire`= `nbcommentaire`+1
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id_droit` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_droit` varchar(20) NOT NULL,
  PRIMARY KEY (`id_droit`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id_droit`, `libelle_droit`) VALUES
(1, 'admin'),
(2, 'technicien'),
(3, 'assistant');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `matricule` int(11) NOT NULL,
  `nomEmploye` varchar(25) DEFAULT NULL,
  `prenomEmploye` varchar(25) DEFAULT NULL,
  `adresseEmploye` varchar(25) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`matricule`, `nomEmploye`, `prenomEmploye`, `adresseEmploye`, `dateEmbauche`) VALUES
(1, 'nom1', 'prenom', 'adresseTest', '2017-06-06'),
(2, 'nomTest2', 'prenomTest2', 'adresseTest2', '2017-03-21'),
(3, 'nomTest29', 'prenomTest3', 'adresseTest3', '2017-05-16'),
(4, 'nomTest28', 'prenomTest4', 'adresseTest4', '2017-06-13'),
(5, 'nomTest5', 'prenomTest5', 'adresseTest5', '2017-11-29');

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `codeFamille` varchar(2) NOT NULL,
  `libelleFamille` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`codeFamille`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`codeFamille`, `libelleFamille`) VALUES
('CB', 'lecteur de cartes'),
('CP', 'caisse avec processeur'),
('LO', 'lecteur optique'),
('MO', 'modem'),
('PC', 'petite caisse'),
('SE', 'serveur'),
('SS', 'souris sans fil');

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `NumIntervention` int(11) NOT NULL,
  `dateVisite` date DEFAULT NULL,
  `heureVisite` double DEFAULT NULL,
  `validation` tinyint(1) NOT NULL,
  `numClient` int(11) DEFAULT NULL,
  `telMobile` int(11) DEFAULT NULL,
  `matricule` int(11) DEFAULT NULL,
  PRIMARY KEY (`NumIntervention`),
  KEY `FK_Intervention_numClient` (`numClient`),
  KEY `FK_Intervention_telMobile` (`telMobile`),
  KEY `FK_Intervention_matricule` (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`NumIntervention`, `dateVisite`, `heureVisite`, `validation`, `numClient`, `telMobile`, `matricule`) VALUES
(0, '0000-00-00', 10, 1, 1, 4654, 4),
(1, '2017-11-23', 20, 1, 1, 6060606, 4),
(3, '2018-05-10', 22, 1, 1, 6060606, 4),
(33, '2018-05-09', 10, 1, 1, 4654, 4);

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `numSerie` int(11) NOT NULL,
  `dateDeVente` date DEFAULT NULL,
  `dateInstallation` date DEFAULT NULL,
  `emplacement` int(11) DEFAULT NULL,
  `referenceInterne` varchar(25) DEFAULT NULL,
  `numContrat` int(11) DEFAULT NULL,
  `numClient` int(11) DEFAULT NULL,
  PRIMARY KEY (`numSerie`),
  KEY `FK_Materiel_referenceInterne` (`referenceInterne`),
  KEY `FK_Materiel_numContrat` (`numContrat`),
  KEY `FK_Materiel_numClient` (`numClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`numSerie`, `dateDeVente`, `dateInstallation`, `emplacement`, `referenceInterne`, `numContrat`, `numClient`) VALUES
(1, '2017-11-01', '2017-11-07', 1, 'A 506', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `nbcommentaire`
--

DROP TABLE IF EXISTS `nbcommentaire`;
CREATE TABLE IF NOT EXISTS `nbcommentaire` (
  `nbCommentaire` int(111) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nbcommentaire`
--

INSERT INTO `nbcommentaire` (`nbCommentaire`) VALUES
(2);

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `codeRegion` int(11) NOT NULL,
  `nomRegion` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`codeRegion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`codeRegion`, `nomRegion`) VALUES
(1, 'Hauts-de-France'),
(2, 'Normandie'),
(3, 'Ile-de-France'),
(4, 'Grand-Est'),
(5, 'Bretagne');

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

DROP TABLE IF EXISTS `technicien`;
CREATE TABLE IF NOT EXISTS `technicien` (
  `telMobile` int(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `dateObtention` date NOT NULL,
  `matricule` int(50) NOT NULL,
  `numAgence` int(50) NOT NULL,
  PRIMARY KEY (`telMobile`),
  KEY `numAgence` (`numAgence`),
  KEY `matricule` (`matricule`),
  KEY `numAgence_2` (`numAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `technicien`
--

INSERT INTO `technicien` (`telMobile`, `qualification`, `dateObtention`, `matricule`, `numAgence`) VALUES
(4654, 'uyguyg', '2017-11-30', 4, 1),
(6060606, 'TestQualification', '2017-11-01', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `typecontrat`
--

DROP TABLE IF EXISTS `typecontrat`;
CREATE TABLE IF NOT EXISTS `typecontrat` (
  `refTypeContrat` varchar(25) NOT NULL,
  `delaiIntervention` double DEFAULT NULL,
  `tauxApplicable` double DEFAULT NULL,
  PRIMARY KEY (`refTypeContrat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typecontrat`
--

INSERT INTO `typecontrat` (`refTypeContrat`, `delaiIntervention`, `tauxApplicable`) VALUES
('TestTypeContrat', 11, 11);

-- --------------------------------------------------------

--
-- Structure de la table `typemateriel`
--

DROP TABLE IF EXISTS `typemateriel`;
CREATE TABLE IF NOT EXISTS `typemateriel` (
  `referenceInterne` varchar(25) NOT NULL,
  `libelleTypeMateriel` varchar(100) DEFAULT NULL,
  `codeFamille` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`referenceInterne`),
  KEY `FK_TypeMateriel_codeFamille` (`codeFamille`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typemateriel`
--

INSERT INTO `typemateriel` (`referenceInterne`, `libelleTypeMateriel`, `codeFamille`) VALUES
('A 506', 'souris sans fil logitech', 'SS');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `employe` (`matricule`),
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`matricule`) REFERENCES `intervention` (`matricule`);

--
-- Contraintes pour la table `assistanttelephonique`
--
ALTER TABLE `assistanttelephonique`
  ADD CONSTRAINT `FK_assistantTelephonique_codeRegion` FOREIGN KEY (`codeRegion`) REFERENCES `region` (`codeRegion`),
  ADD CONSTRAINT `FK_assistantTelephonique_matricule` FOREIGN KEY (`matricule`) REFERENCES `employe` (`matricule`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_Client_numAgence` FOREIGN KEY (`numAgence`) REFERENCES `agence` (`numAgence`);

--
-- Contraintes pour la table `contratmaintenance`
--
ALTER TABLE `contratmaintenance`
  ADD CONSTRAINT `FK_ContratMaintenance_numClient` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`),
  ADD CONSTRAINT `FK_ContratMaintenance_refTypeContrat` FOREIGN KEY (`refTypeContrat`) REFERENCES `typecontrat` (`refTypeContrat`);

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `FK_Intervention_matricule` FOREIGN KEY (`matricule`) REFERENCES `employe` (`matricule`),
  ADD CONSTRAINT `FK_Intervention_numClient` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`),
  ADD CONSTRAINT `FK_Intervention_telMobile` FOREIGN KEY (`telMobile`) REFERENCES `technicien` (`telMobile`);

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `FK_Materiel_numClient` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`),
  ADD CONSTRAINT `FK_Materiel_numContrat` FOREIGN KEY (`numContrat`) REFERENCES `contratmaintenance` (`numContrat`),
  ADD CONSTRAINT `FK_Materiel_referenceInterne` FOREIGN KEY (`referenceInterne`) REFERENCES `typemateriel` (`referenceInterne`);

--
-- Contraintes pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD CONSTRAINT `technicien_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `employe` (`matricule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
