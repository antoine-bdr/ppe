-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 11 juin 2019 à 12:07
-- Version du serveur :  10.3.15-MariaDB
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `code_de_la_route`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `idConnexion` int(11) NOT NULL,
  `login` varchar(75) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `dateDerniereConnexion` int(11) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `id_droit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`idConnexion`, `login`, `password`, `dateDerniereConnexion`, `idutilisateur`, `id_droit`) VALUES
(1, 'membreFree', 'membreFree', NULL, 1, 2),
(2, 'admin', 'admin', NULL, 2, 1),
(3, 'membrePre', 'membrePre', NULL, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `id_droit` int(11) NOT NULL,
  `libelle_droit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id_droit`, `libelle_droit`) VALUES
(1, 'admin'),
(2, 'membreFree'),
(3, 'membrePremium');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `idImage_Image` int(11) NOT NULL,
  `nomImage_Image` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `idQuestion_Question` int(11) NOT NULL,
  `intituleQuestionA_Question` varchar(250) DEFAULT NULL,
  `intituleQuestionB_Question` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `idReponse_Reponse` int(11) NOT NULL,
  `intituleReponse_Reponse` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

CREATE TABLE `serie` (
  `idSerie_Serie` int(11) NOT NULL,
  `seriePremium_Serie` tinyint(1) DEFAULT NULL,
  `serieEvenement_Serie` tinyint(1) DEFAULT NULL,
  `nombreQuestion_Serie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `themequestion`
--

CREATE TABLE `themequestion` (
  `idTheme_ThemeQuestion` int(11) NOT NULL,
  `nomTheme` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur_Utilisateur` int(11) NOT NULL,
  `nom_Utilisateur` varchar(50) DEFAULT NULL,
  `prenom_Utilisateur` varchar(50) DEFAULT NULL,
  `mail_Utilisateur` varchar(75) DEFAULT NULL,
  `adresse_Utilisateur` varchar(75) DEFAULT NULL,
  `code_postal_Utilisateur` int(11) DEFAULT NULL,
  `connexion_idconnexion_connexion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur_Utilisateur`, `nom_Utilisateur`, `prenom_Utilisateur`, `mail_Utilisateur`, `adresse_Utilisateur`, `code_postal_Utilisateur`, `connexion_idconnexion_connexion`) VALUES
(1, 'Dupont', 'Nicolas', 'dupont.nicolas@gmail.com', '14 rue du molinel', 59000, NULL),
(2, 'Mercier', 'Manon', 'mercier.manon@gmail.com', '52 rue de la cité', 59500, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`idConnexion`),
  ADD KEY `idutilisateur` (`idutilisateur`),
  ADD KEY `id_droit` (`id_droit`);

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id_droit`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idImage_Image`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`idQuestion_Question`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`idReponse_Reponse`);

--
-- Index pour la table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`idSerie_Serie`);

--
-- Index pour la table `themequestion`
--
ALTER TABLE `themequestion`
  ADD PRIMARY KEY (`idTheme_ThemeQuestion`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur_Utilisateur`),
  ADD UNIQUE KEY `idConnexion` (`connexion_idconnexion_connexion`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `idConnexion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `idImage_Image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `idQuestion_Question` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `idReponse_Reponse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `serie`
--
ALTER TABLE `serie`
  MODIFY `idSerie_Serie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `themequestion`
--
ALTER TABLE `themequestion`
  MODIFY `idTheme_ThemeQuestion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur_Utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
