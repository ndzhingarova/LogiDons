-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 30 Août 2018 à 19:54
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `logidons`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `don`
--

CREATE TABLE `don` (
  `ID` int(32) NOT NULL,
  `DONATEUR_ID` int(11) DEFAULT '0',
  `CATEGORIE` int(11) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `MODE_LIVRAISON` varchar(255) NOT NULL,
  `MONTANT` float DEFAULT '0',
  `DATE_PROMESSE` date NOT NULL,
  `DATE_PROMISE` date NOT NULL,
  `DATE_ANNULATION` date DEFAULT '2000-01-01',
  `DATE_ACCEPTATION` date DEFAULT '2000-01-01',
  `DATE_RECU` date DEFAULT '2000-01-01',
  `DATE_REFUS` date DEFAULT '2000-01-01',
  `PHOTO` varchar(255) DEFAULT 'aucune photo fournie'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `COURRIEL` varchar(255) NOT NULL,
  `ADRESSE` varchar(255) NOT NULL,
  `TELEPHONE` varchar(255) NOT NULL,
  `MOT_DE_PASSE` varchar(255) NOT NULL,
  `ACTIF` tinyint(1) NOT NULL DEFAULT '1',
  `GROUP_ID` int(8) NOT NULL DEFAULT '0',
  `DATE_CREATION` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`ID`, `NOM`, `COURRIEL`, `ADRESSE`, `TELEPHONE`, `MOT_DE_PASSE`, `ACTIF`, `GROUP_ID`, `DATE_CREATION`) VALUES
(1, 'admin', 'admin@admin.ca', 'montreal', '1234567890', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, '0000-00-00'),
(2, 'aaa', 'aa@aa', 'aaa', '1234567890', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 0, 3, '2018-08-25'),
(3, 'jean', 'jean@jean.ca', 'montreal', '1234567890', 'jean', 1, 4, '2018-08-26');

-- --------------------------------------------------------

--
-- Structure de la table `typemembre`
--

CREATE TABLE `typemembre` (
  `GROUP_ID` int(8) NOT NULL,
  `GROUP_NAME` varchar(255) NOT NULL,
  `GROUP_DESC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `typemembre`
--

INSERT INTO `typemembre` (`GROUP_ID`, `GROUP_NAME`, `GROUP_DESC`) VALUES
(1, 'administrateur', 'seulement le ou les administrateurs'),
(2, 'superviseur', 'les superviseurs'),
(3, 'employes permanents', 'regroupe tous les employes qui sont permanents.'),
(4, 'volentaires', 'regroupe tous les employes qui se sont engages comme volentaires et sont actives.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `don`
--
ALTER TABLE `don`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DONATEUR_ID` (`DONATEUR_ID`),
  ADD KEY `CATEGORIE` (`CATEGORIE`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `GROUP_ID` (`GROUP_ID`);

--
-- Index pour la table `typemembre`
--
ALTER TABLE `typemembre`
  ADD PRIMARY KEY (`GROUP_ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `don`
--
ALTER TABLE `don`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `typemembre`
--
ALTER TABLE `typemembre`
  MODIFY `GROUP_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `don`
--
ALTER TABLE `don`
  ADD CONSTRAINT `don_ibfk_1` FOREIGN KEY (`DONATEUR_ID`) REFERENCES `membre` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `don_ibfk_2` FOREIGN KEY (`CATEGORIE`) REFERENCES `categorie` (`ID`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `membre_ibfk_1` FOREIGN KEY (`GROUP_ID`) REFERENCES `typemembre` (`GROUP_ID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
