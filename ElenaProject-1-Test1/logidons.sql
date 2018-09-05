-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 05 Septembre 2018 à 17:07
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

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`ID`, `NOM`, `DESCRIPTION`) VALUES
(1, 'ameublement', 'touy ce qui conserne les meubles de la maison,les meubles de bureau,...'),
(2, 'monnaie', 'tout ce qui conserne les cheques, les virments banquaires, les virements par cartes,...'),
(3, 'electroniques', 'tout ce qui consernes les appareils electroniques: TV, les postes redio,les ordinateurs, les routeurs, les switchs, ...'),
(4, 'electromenagers', 'tout ce qui conserne le frigidaires, lave-vaisselles, lave-linges, ...');

-- --------------------------------------------------------

--
-- Structure de la table `don`
--

CREATE TABLE `don` (
  `ID` int(11) NOT NULL,
  `MEMBRE_ID` int(11) NOT NULL,
  `EMPLOYE_ID` int(11) NOT NULL,
  `CATEGORIE_ID` int(11) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `QUANTITE` int(4) NOT NULL,
  `MODE_LIVRAISON` varchar(255) NOT NULL,
  `MONTANT` float NOT NULL DEFAULT '0',
  `DATE_PROMESSE` date DEFAULT NULL,
  `DATE_PROMISE` date DEFAULT NULL,
  `DATE_ANNULATION` date DEFAULT NULL,
  `DATE_ACCEPTATION` date DEFAULT NULL,
  `DATE_RECU` date DEFAULT NULL,
  `DATE_REFUS` date DEFAULT NULL,
  `PHOTO` varchar(255) DEFAULT 'aucune photo fournie'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `don`
--

INSERT INTO `don` (`ID`, `MEMBRE_ID`, `EMPLOYE_ID`, `CATEGORIE_ID`, `NOM`, `DESCRIPTION`, `QUANTITE`, `MODE_LIVRAISON`, `MONTANT`, `DATE_PROMESSE`, `DATE_PROMISE`, `DATE_ANNULATION`, `DATE_ACCEPTATION`, `DATE_RECU`, `DATE_REFUS`, `PHOTO`) VALUES
(15, 15, 3, 3, 'hnf', 'hrsngdbz', 5, 'hf', 52, '2018-09-05', '2018-09-06', NULL, NULL, NULL, NULL, ''),
(16, 15, 4, 1, 'chaise', 'rsvc', 5, 'non', 47, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(17, 15, 5, 2, 'chaise', 'rhngsbd', 5, 'n', 50, '2018-09-05', '2018-09-06', NULL, NULL, NULL, NULL, ''),
(19, 15, 2, 1, 'chaise', 'nbgrfv', 5, 'gh', 46, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(20, 15, 3, 1, 'chaise', 'jmhtngrfsd', 1, 'n', 50, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(21, 15, 4, 1, 'table', 'jmhtngrfsd', 1, 'n', 50, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(22, 15, 5, 1, 'armoire', 'ngrdab', 2, 'non', 48, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(23, 15, 6, 1, 'armoire', 'ngrdab', 2, 'non', 48, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(24, 15, 2, 1, 'armoire', 'yyyyyyyre', 5, 'non', 9, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(25, 15, 3, 1, 'armoire', 'yyyyyyyre', 5, 'non', 9, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(26, 15, 4, 1, 'miroir', 'thbefd', 5, 'non', 65, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(27, 15, 5, 1, 'miroir', 'thbefd', 5, 'non', 65, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(28, 43, 6, 1, 'porte', 'fevwdc', 2, 'non', 62, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(29, 44, 2, 1, 'chaise bureau', ',jfgbvd', 2, 'non', 20, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(30, 15, 3, 1, 'chose', 'nrbcfv', 2, 'non', 54, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(31, 6, 4, 1, 'chose2', 'kmjhtgfb', 2, 'non', 30, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(32, 6, 5, 1, 'chose3', 'kujyeh', 5, 'non', 50, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, ''),
(33, 46, 3, 1, 'chaise', 'du bois', 1, 'non', 20, '2018-09-05', '2018-09-07', NULL, NULL, NULL, NULL, '');

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
  `MOT_DE_PASSE` varchar(255) DEFAULT NULL,
  `ACTIF` tinyint(1) NOT NULL DEFAULT '1',
  `GROUP_ID` int(8) DEFAULT NULL,
  `DATE_CREATION` date DEFAULT NULL,
  `NUM_JETON` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`ID`, `NOM`, `COURRIEL`, `ADRESSE`, `TELEPHONE`, `MOT_DE_PASSE`, `ACTIF`, `GROUP_ID`, `DATE_CREATION`, `NUM_JETON`) VALUES
(1, 'admin', 'admin@admin.ca', 'montreal', '123', 'admin', 1, 1, '2018-09-01', 0),
(2, 'tahar', 'tahar@tahar.ca', 'montreal', '123', 'tahar', 1, 3, '2018-09-01', 0),
(3, 'manesh', 'manesh@manesh.ca', 'montreal', '123', 'manesh', 1, 3, '2018-09-01', 1),
(4, 'guy', 'guy@guy.ca', 'montreal', '123', 'guy', 1, 3, '2018-09-01', 0),
(5, 'nikoleta', 'niko@leta.ca', 'montreal', '123', 'nikoleta', 1, 3, '2018-09-01', 0),
(6, 'daryl', 'daryl@daryl.ca', 'laval', '123', 'daryl', 1, 3, '2018-09-01', 0),
(7, 'yo', 'yo@yo.ca', 'montreal', '123', 'yo', 0, 5, '2018-09-01', 0),
(11, 'Teodora', 'tedi@tedi.bg', 'Varna', '5142222222', NULL, 1, 5, NULL, 0),
(13, 'Ivana', 'iv@iv.com', 'Varna', '514214', NULL, 1, 5, NULL, 0),
(15, 'Nikoleta', 'n.dzhingarova@gmail.com', 'Montreal', '464153', NULL, 1, 5, NULL, 0),
(39, 'Nikoleta', 'n.dzhingarova@gmail.com', 'hnbgvf', '41345456', NULL, 1, 5, NULL, 0),
(40, 'Nikoleta', 'n.dzhingarova@gmail.com', 'jyh5gtrfv', '41345456', NULL, 1, 5, NULL, 0),
(41, 'Nikoleta', 'n.dzhingarova@gmail.com', 'kutttttf', '7465513', NULL, 1, 5, NULL, 0),
(42, 'Nikoleta', 'n.dzhingarova@gmail.com', 'kutttttf', '7465513', NULL, 1, 5, NULL, 0),
(43, 'Teodora', 'tedi@gmail.com', 'iyrjmhd', '84531', NULL, 1, 5, NULL, 0),
(44, 'MAria', 'maria@mr.com', 'mhntdsf', '436413', NULL, 1, 5, NULL, 0),
(45, '', '', '', '', NULL, 1, 5, NULL, 0),
(46, 'Mary', 'm@m.com', 'Montreal', '5142224545', NULL, 1, 5, NULL, 0);

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
(4, 'volentaires', 'regroupe tous les employes qui se sont engages comme volentaires et sont actives.'),
(5, 'donateur', 'regroupe les donateurs');

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
  ADD KEY `MEMBRE_ID` (`MEMBRE_ID`),
  ADD KEY `EMPLOYE_ID` (`EMPLOYE_ID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `don`
--
ALTER TABLE `don`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT pour la table `typemembre`
--
ALTER TABLE `typemembre`
  MODIFY `GROUP_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `don`
--
ALTER TABLE `don`
  ADD CONSTRAINT `don_ibfk_1` FOREIGN KEY (`MEMBRE_ID`) REFERENCES `membre` (`ID`),
  ADD CONSTRAINT `don_ibfk_2` FOREIGN KEY (`EMPLOYE_ID`) REFERENCES `membre` (`ID`);

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `membre_ibfk_1` FOREIGN KEY (`GROUP_ID`) REFERENCES `typemembre` (`GROUP_ID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
