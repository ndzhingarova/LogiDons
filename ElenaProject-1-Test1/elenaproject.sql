-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 27 Août 2018 à 14:00
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `elenaproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CATEGORY_NAME` varchar(255) NOT NULL,
  `CATEGORY_DESC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tbl_category`
--

INSERT INTO `tbl_category` (`CATEGORY_ID`, `CATEGORY_NAME`, `CATEGORY_DESC`) VALUES
(1, 'Ameublement', 'Cette categorie contient les meubles,electromenagers, articles de cuisine, articles decoratifs de la maison,...'),
(2, 'Habillement', 'tous ce qui a rapport avec les vetements.'),
(3, 'Dons monaitaires', 'comprend les dons de cheques et les virements banquaires(de compte en compte, debits, visa, ...).');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_categ_membres`
--

CREATE TABLE `tbl_categ_membres` (
  `GROUP_ID` tinyint(1) NOT NULL,
  `GROUP_NAME` varchar(255) NOT NULL,
  `GROUP_DESC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tbl_categ_membres`
--

INSERT INTO `tbl_categ_membres` (`GROUP_ID`, `GROUP_NAME`, `GROUP_DESC`) VALUES
(1, 'administrateur', 'seulement le ou les administrateurs'),
(2, 'superviseur', 'les superviseurs'),
(3, 'employes permanents', 'regroupe tous les employes qui sont permanents.'),
(4, 'volentaires', 'regroupe tous les employes qui se sont engages comme volentaires et sont actives.');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_donnateurs`
--

CREATE TABLE `tbl_donnateurs` (
  `DONNATEUR_ID` int(11) NOT NULL,
  `DONNATEUR_NOM` varchar(255) NOT NULL,
  `DONNATEUR_EMAIL` varchar(255) NOT NULL,
  `DONNATEUR_ADRESS` varchar(255) NOT NULL,
  `DONNATEUR_TEL` varchar(255) NOT NULL,
  `MOT_DE_PASSE` varchar(255) NOT NULL,
  `DATE_CREATION` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tbl_donnateurs`
--

INSERT INTO `tbl_donnateurs` (`DONNATEUR_ID`, `DONNATEUR_NOM`, `DONNATEUR_EMAIL`, `DONNATEUR_ADRESS`, `DONNATEUR_TEL`, `MOT_DE_PASSE`, `DATE_CREATION`) VALUES
(1, 'tahar', 'tahar@tahar.ca', 'montreal', '1234567890', 'f70de0e2d1f353c8ae55bdf55d5bee7b1f80565e', '2018-08-26');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_dons`
--

CREATE TABLE `tbl_dons` (
  `DON_ID` varchar(255) NOT NULL,
  `DONNATEUR_ID` int(11) DEFAULT '0',
  `DON_CATEGORY` tinyint(2) NOT NULL,
  `NOM_DON` varchar(255) NOT NULL,
  `DESC_DON` varchar(255) NOT NULL,
  `MODE_LIVRAISON` varchar(255) NOT NULL,
  `MANTANT_DON` float DEFAULT '0',
  `DATE_PROMESSE` date NOT NULL,
  `DATE_PROMISE` date NOT NULL,
  `DATE_ANNULATION` date DEFAULT '2000-01-01',
  `DATE_ACCEPTATION` date DEFAULT '2000-01-01',
  `DATE_RECU` date DEFAULT '2000-01-01',
  `DATE_REFU` date DEFAULT '2000-01-01',
  `PHOTO_DON` varchar(255) DEFAULT 'aucune photo fournie'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_membres`
--

CREATE TABLE `tbl_membres` (
  `MEMBRE_ID` int(11) NOT NULL,
  `MEMBRE_NAME` varchar(255) NOT NULL,
  `MEMBRE_EMAIL` varchar(255) NOT NULL,
  `MEMBRE_ADRESS` varchar(255) NOT NULL,
  `MEMBRE_TEL` varchar(255) NOT NULL,
  `MOT_DE_PASSE` varchar(255) NOT NULL,
  `PENDING` tinyint(1) NOT NULL DEFAULT '0',
  `GROUP_ID` tinyint(1) NOT NULL DEFAULT '0',
  `DATE_CREATION` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tbl_membres`
--

INSERT INTO `tbl_membres` (`MEMBRE_ID`, `MEMBRE_NAME`, `MEMBRE_EMAIL`, `MEMBRE_ADRESS`, `MEMBRE_TEL`, `MOT_DE_PASSE`, `PENDING`, `GROUP_ID`, `DATE_CREATION`) VALUES
(1, 'admin', 'admin@admin.ca', 'montreal', '1234567890', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, '0000-00-00'),
(2, 'aaa', 'aa@aa', 'aaa', '1234567890', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 0, 0, '2018-08-25'),
(3, 'jean', 'jean@jean.ca', 'montreal', '1234567890', 'jean', 1, 4, '2018-08-26');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Index pour la table `tbl_categ_membres`
--
ALTER TABLE `tbl_categ_membres`
  ADD PRIMARY KEY (`GROUP_ID`);

--
-- Index pour la table `tbl_donnateurs`
--
ALTER TABLE `tbl_donnateurs`
  ADD PRIMARY KEY (`DONNATEUR_ID`);

--
-- Index pour la table `tbl_dons`
--
ALTER TABLE `tbl_dons`
  ADD PRIMARY KEY (`DON_ID`);

--
-- Index pour la table `tbl_membres`
--
ALTER TABLE `tbl_membres`
  ADD PRIMARY KEY (`MEMBRE_ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `tbl_categ_membres`
--
ALTER TABLE `tbl_categ_membres`
  MODIFY `GROUP_ID` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `tbl_donnateurs`
--
ALTER TABLE `tbl_donnateurs`
  MODIFY `DONNATEUR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tbl_membres`
--
ALTER TABLE `tbl_membres`
  MODIFY `MEMBRE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
