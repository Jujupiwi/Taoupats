-- phpMyAdmin SQL Dump
-- version 4.0.3
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mer 11 Septembre 2013 à 15:38
-- Version du serveur: 5.6.11-log
-- Version de PHP: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `taoupats`
--
CREATE DATABASE IF NOT EXISTS `taoupats` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `taoupats`;

-- --------------------------------------------------------

--
-- Structure de la table `classement`
--

CREATE TABLE IF NOT EXISTS `classement` (
  `nom_tournoi` varchar(20) NOT NULL,
  `position` int(4) NOT NULL,
  `mj_classement` int(4) NOT NULL,
  `equipe` varchar(20) NOT NULL,
  `victoire` int(4) NOT NULL,
  `nul` int(4) NOT NULL,
  `defaite` int(4) NOT NULL,
  `bp` int(10) NOT NULL,
  `bc` int(10) NOT NULL,
  `diff` int(4) NOT NULL,
  `points` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `classement`
--

INSERT INTO `classement` (`nom_tournoi`, `position`, `mj_classement`, `equipe`, `victoire`, `nul`, `defaite`, `bp`, `bc`, `diff`, `points`) VALUES
('fifa15', 1, 6, 'allemagne', 2, 0, 4, 2, 4, -2, 6),
('fifa15', 2, 6, 'etats-unis', 6, 0, 0, 6, 0, 6, 18),
('fifa15', 3, 6, 'bresil', 4, 0, 2, 4, 2, 2, 12),
('fifa15', 4, 6, 'japon', 0, 0, 6, 0, 6, -6, 0),
('415', 1, 0, 'arsenal', 0, 0, 0, 0, 0, 0, 0),
('415', 2, 0, 'atletico', 0, 0, 0, 0, 0, 0, 0),
('415', 3, 0, 'juventus', 0, 0, 0, 0, 0, 0, 0),
('415', 4, 0, 'bayern', 0, 0, 0, 0, 0, 0, 0),
('415', 5, 0, 'om', 0, 0, 0, 0, 0, 0, 0),
('415', 6, 0, 'fenerbahce', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `comment` varchar(10000) NOT NULL,
  `match` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`comment`, `match`, `name`) VALUES
('gr', 'comment-saint-araille', 'gr'),
('hr', 'comment-saint-araille', 'ger'),
('hbrehrse', 'comment-saint-araille', 'gb'),
('kyu', 'comment-saint-araille', 'kyg'),
('ky;yf', 'comment-saint-araille', 'kyt'),
('fkyluyljtrj -tfdgezrrrrrrrrrr rrggggregrrr rrrrrerhykiu_trÃ¨kjut-uttttt', 'comment-saint-araille', 'fk'),
('thy,tfyk;yyyyyyttttttttttttt tttttttttttttttt tttttttttttttttttttt tkkkkkkkkkkk kkkkkkkkkk kkkkkkkkkkkkkkk kkkkkkkkkkkkkkkk kkkkkkkkkk kkkkkkkkkkkkkkkkk kkkkkkkkkkkkkkk', 'comment-saint-araille', 'g,;h'),
('gezgze ez ', 'comment-rodeo2', 'fse'),
('rye', 'comment-rodeo2', 'gez'),
('hr', 'comment-mondonville', 'gfe'),
('hrehj', 'comment-mondonville', 'ghfr'),
('jut', 'comment-mondonville', 'ug');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `nom_tournoi` varchar(20) NOT NULL,
  `id_equipe` int(10) NOT NULL,
  `joueur` varchar(20) NOT NULL,
  `equipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`nom_tournoi`, `id_equipe`, `joueur`, `equipe`) VALUES
('fifa15', 1, 'juju', 'allemagne'),
('fifa15', 2, 'tito', 'etats-unis'),
('fifa15', 3, 'gaet', 'bresil'),
('fifa15', 4, 'thom', 'japon'),
('415', 1, 'juju', 'arsenal'),
('415', 2, 'tito', 'atletico'),
('415', 3, 'gaet', 'juventus'),
('415', 4, 'thom', 'bayern'),
('415', 5, 'tristan', 'om'),
('415', 6, 'jordan', 'fenerbahce');

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE IF NOT EXISTS `matchs` (
  `id_match` int(10) NOT NULL,
  `id_equipe_dom` int(10) NOT NULL,
  `id_equipe_ext` int(10) NOT NULL,
  `nb_equipe` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `matchs`
--

INSERT INTO `matchs` (`id_match`, `id_equipe_dom`, `id_equipe_ext`, `nb_equipe`) VALUES
(1, 1, 2, 4),
(2, 3, 4, 4),
(3, 1, 3, 4),
(4, 2, 4, 4),
(5, 1, 4, 4),
(6, 2, 3, 4),
(1, 1, 2, 5),
(2, 3, 4, 5),
(3, 5, 1, 5),
(4, 2, 3, 5),
(5, 4, 5, 5),
(6, 1, 3, 5),
(7, 2, 4, 5),
(8, 5, 3, 5),
(9, 1, 4, 5),
(10, 2, 5, 5),
(1, 1, 2, 6),
(2, 3, 4, 6),
(3, 5, 6, 6),
(4, 1, 3, 6),
(5, 2, 5, 6),
(6, 4, 6, 6),
(7, 1, 4, 6),
(8, 2, 6, 6),
(9, 5, 3, 6),
(10, 1, 5, 6),
(11, 2, 4, 6),
(12, 3, 6, 6),
(13, 1, 6, 6),
(14, 2, 3, 6),
(15, 4, 5, 6),
(7, 2, 1, 4),
(8, 4, 3, 4),
(9, 3, 1, 4),
(10, 4, 2, 4),
(11, 4, 1, 4),
(12, 3, 2, 4),
(11, 2, 1, 5),
(12, 4, 3, 5),
(13, 1, 5, 5),
(14, 3, 2, 5),
(15, 5, 4, 5),
(16, 3, 1, 5),
(17, 4, 2, 5),
(18, 3, 5, 5),
(19, 4, 1, 5),
(20, 5, 2, 5),
(16, 2, 1, 6),
(17, 4, 3, 6),
(18, 6, 5, 6),
(19, 3, 1, 6),
(20, 5, 2, 6),
(21, 6, 4, 6),
(22, 4, 1, 6),
(23, 6, 2, 6),
(24, 3, 5, 6),
(25, 5, 1, 6),
(26, 4, 2, 6),
(27, 6, 3, 6),
(28, 6, 1, 6),
(29, 3, 2, 6),
(30, 5, 4, 6),
(1, 1, 2, 7),
(2, 3, 4, 7),
(3, 5, 6, 7),
(4, 1, 7, 7),
(5, 2, 3, 7),
(6, 4, 5, 7),
(7, 6, 7, 7),
(8, 1, 3, 7),
(9, 2, 4, 7),
(10, 5, 7, 7),
(11, 1, 6, 7),
(12, 2, 5, 7),
(13, 3, 7, 7),
(14, 1, 4, 7),
(15, 2, 6, 7),
(16, 3, 5, 7),
(17, 4, 7, 7),
(18, 1, 5, 7),
(19, 3, 6, 7),
(20, 2, 7, 7),
(21, 4, 6, 7),
(22, 2, 1, 7),
(23, 4, 3, 7),
(24, 6, 5, 7),
(25, 7, 1, 7),
(26, 3, 2, 7),
(27, 5, 4, 7),
(28, 7, 6, 7),
(29, 3, 1, 7),
(30, 4, 2, 7),
(31, 7, 5, 7),
(32, 6, 1, 7),
(33, 5, 2, 7),
(34, 7, 3, 7),
(35, 4, 1, 7),
(36, 6, 2, 7),
(37, 5, 3, 7),
(38, 7, 4, 7),
(39, 5, 1, 7),
(40, 6, 3, 7),
(41, 7, 2, 7),
(42, 6, 4, 7),
(1, 1, 2, 8),
(2, 3, 4, 8),
(3, 5, 6, 8),
(4, 7, 8, 8),
(5, 1, 3, 8),
(6, 2, 4, 8),
(7, 5, 7, 8),
(8, 6, 8, 8),
(9, 1, 4, 8),
(10, 2, 3, 8),
(11, 5, 8, 8),
(12, 6, 7, 8),
(13, 1, 5, 8),
(14, 3, 6, 8),
(15, 2, 7, 8),
(16, 4, 8, 8),
(17, 1, 6, 8),
(18, 2, 5, 8),
(19, 4, 7, 8),
(20, 3, 8, 8),
(21, 1, 7, 8),
(22, 2, 6, 8),
(23, 3, 5, 8),
(24, 1, 8, 8),
(25, 4, 5, 8),
(26, 3, 7, 8),
(27, 2, 8, 8),
(28, 4, 6, 8),
(29, 2, 1, 8),
(30, 4, 3, 8),
(31, 6, 5, 8),
(32, 8, 7, 8),
(33, 3, 1, 8),
(34, 4, 2, 8),
(35, 7, 5, 8),
(36, 8, 6, 8),
(37, 4, 1, 8),
(38, 3, 2, 8),
(39, 8, 5, 8),
(40, 7, 6, 8),
(41, 5, 1, 8),
(42, 6, 3, 8),
(43, 7, 2, 8),
(44, 8, 4, 8),
(45, 6, 1, 8),
(46, 5, 2, 8),
(47, 7, 4, 8),
(48, 8, 3, 8),
(49, 7, 1, 8),
(50, 6, 2, 8),
(51, 5, 3, 8),
(52, 8, 1, 8),
(53, 5, 4, 8),
(54, 7, 3, 8),
(55, 8, 2, 8),
(56, 6, 4, 8),
(1, 1, 2, 9),
(2, 3, 4, 9),
(3, 5, 6, 9),
(4, 7, 8, 9),
(5, 9, 1, 9),
(6, 2, 3, 9),
(7, 4, 5, 9),
(8, 6, 7, 9),
(9, 8, 9, 9),
(10, 1, 3, 9),
(11, 2, 5, 9),
(12, 4, 6, 9),
(13, 7, 9, 9),
(14, 1, 8, 9),
(15, 2, 4, 9),
(16, 3, 5, 9),
(17, 6, 9, 9),
(18, 8, 4, 9),
(19, 7, 1, 9),
(20, 2, 6, 9),
(21, 3, 8, 9),
(22, 4, 7, 9),
(23, 9, 5, 9),
(24, 2, 8, 9),
(25, 3, 9, 9),
(26, 1, 6, 9),
(27, 7, 5, 9),
(28, 8, 6, 9),
(29, 4, 1, 9),
(30, 9, 2, 9),
(31, 3, 6, 9),
(32, 5, 8, 9),
(33, 2, 7, 9),
(34, 4, 9, 9),
(35, 1, 5, 9),
(36, 3, 7, 9),
(1, 1, 2, 10),
(2, 3, 4, 10),
(3, 5, 6, 10),
(4, 7, 8, 10),
(5, 9, 10, 10),
(6, 1, 3, 10),
(7, 2, 4, 10),
(8, 5, 7, 10),
(9, 6, 10, 10),
(10, 8, 9, 10),
(11, 1, 4, 10),
(12, 2, 5, 10),
(13, 3, 6, 10),
(14, 7, 9, 10),
(15, 8, 10, 10),
(16, 1, 5, 10),
(17, 2, 8, 10),
(18, 3, 10, 10),
(19, 4, 7, 10),
(20, 6, 9, 10),
(21, 1, 6, 10),
(22, 2, 7, 10),
(23, 3, 8, 10),
(24, 4, 10, 10),
(25, 5, 9, 10),
(26, 1, 7, 10),
(27, 2, 6, 10),
(28, 3, 9, 10),
(29, 4, 8, 10),
(30, 10, 5, 10),
(31, 1, 8, 10),
(32, 2, 9, 10),
(33, 3, 5, 10),
(34, 4, 6, 10),
(35, 7, 10, 10),
(36, 1, 9, 10),
(37, 2, 10, 10),
(38, 3, 7, 10),
(39, 4, 5, 10),
(40, 6, 8, 10),
(41, 1, 10, 10),
(42, 2, 3, 10),
(43, 4, 9, 10),
(44, 5, 8, 10),
(45, 6, 7, 10),
(46, 2, 1, 10),
(47, 4, 3, 10),
(48, 6, 5, 10),
(49, 8, 7, 10),
(50, 10, 9, 10),
(51, 3, 1, 10),
(52, 4, 2, 10),
(53, 7, 5, 10),
(54, 10, 6, 10),
(55, 9, 8, 10),
(56, 4, 1, 10),
(57, 5, 2, 10),
(58, 6, 3, 10),
(59, 9, 7, 10),
(60, 10, 8, 10),
(61, 5, 1, 10),
(62, 8, 2, 10),
(63, 10, 3, 10),
(64, 7, 4, 10),
(65, 9, 6, 10),
(66, 6, 1, 10),
(67, 7, 2, 10),
(68, 8, 3, 10),
(69, 10, 4, 10),
(70, 9, 5, 10),
(71, 7, 1, 10),
(72, 6, 2, 10),
(73, 9, 3, 10),
(74, 8, 4, 10),
(75, 5, 10, 10),
(76, 8, 1, 10),
(77, 9, 2, 10),
(78, 5, 3, 10),
(79, 6, 4, 10),
(80, 10, 7, 10),
(81, 9, 1, 10),
(82, 10, 2, 10),
(83, 7, 3, 10),
(84, 5, 4, 10),
(85, 8, 6, 10),
(86, 10, 1, 10),
(87, 3, 2, 10),
(88, 9, 4, 10),
(89, 8, 5, 10),
(90, 7, 6, 10),
(37, 2, 1, 9),
(38, 4, 3, 9),
(39, 6, 5, 9),
(40, 8, 7, 9),
(41, 1, 9, 9),
(42, 3, 2, 9),
(43, 5, 4, 9),
(44, 7, 6, 9),
(45, 9, 8, 9),
(46, 3, 1, 9),
(47, 5, 2, 9),
(48, 6, 4, 9),
(49, 9, 7, 9),
(50, 8, 1, 9),
(51, 4, 2, 9),
(52, 5, 3, 9),
(53, 9, 6, 9),
(54, 4, 8, 9),
(55, 1, 7, 9),
(56, 6, 2, 9),
(57, 8, 3, 9),
(58, 7, 4, 9),
(59, 5, 9, 9),
(60, 8, 2, 9),
(61, 9, 3, 9),
(62, 6, 1, 9),
(63, 5, 7, 9),
(64, 6, 8, 9),
(65, 1, 4, 9),
(66, 2, 9, 9),
(67, 6, 3, 9),
(68, 8, 5, 9),
(69, 7, 2, 9),
(70, 9, 4, 9),
(71, 5, 1, 9),
(72, 7, 3, 9);

-- --------------------------------------------------------

--
-- Structure de la table `resultats`
--

CREATE TABLE IF NOT EXISTS `resultats` (
  `nom_tournoi` varchar(20) NOT NULL,
  `equipe` varchar(20) NOT NULL,
  `points` int(10) NOT NULL,
  `victoire` int(10) NOT NULL,
  `nul` int(10) NOT NULL,
  `defaite` int(10) NOT NULL,
  `diff` int(10) NOT NULL,
  `bp` int(10) NOT NULL,
  `bc` int(10) NOT NULL,
  `id_match` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `resultats`
--

INSERT INTO `resultats` (`nom_tournoi`, `equipe`, `points`, `victoire`, `nul`, `defaite`, `diff`, `bp`, `bc`, `id_match`) VALUES
('fifa15', 'allemagne', 0, 0, 0, 1, -1, 0, 1, 1),
('fifa15', 'etats-unis', 3, 1, 0, 0, 1, 1, 0, 1),
('fifa15', 'etats-unis', 3, 1, 0, 0, 1, 1, 0, 4),
('fifa15', 'japon', 0, 0, 0, 1, -1, 0, 1, 4),
('fifa15', 'etats-unis', 3, 1, 0, 0, 1, 1, 0, 6),
('fifa15', 'bresil', 0, 0, 0, 1, -1, 0, 1, 6),
('fifa15', 'etats-unis', 3, 1, 0, 0, 1, 1, 0, 7),
('fifa15', 'allemagne', 0, 0, 0, 1, -1, 0, 1, 7),
('fifa15', 'japon', 0, 0, 0, 1, -1, 0, 1, 10),
('fifa15', 'etats-unis', 3, 1, 0, 0, 1, 1, 0, 10),
('fifa15', 'bresil', 0, 0, 0, 1, -1, 0, 1, 12),
('fifa15', 'etats-unis', 3, 1, 0, 0, 1, 1, 0, 12),
('fifa15', 'bresil', 3, 1, 0, 0, 1, 1, 0, 2),
('fifa15', 'japon', 0, 0, 0, 1, -1, 0, 1, 2),
('fifa15', 'allemagne', 0, 0, 0, 1, -1, 0, 1, 3),
('fifa15', 'bresil', 3, 1, 0, 0, 1, 1, 0, 3),
('fifa15', 'bresil', 3, 1, 0, 0, 1, 1, 0, 9),
('fifa15', 'allemagne', 0, 0, 0, 1, -1, 0, 1, 9),
('fifa15', 'japon', 0, 0, 0, 1, -1, 0, 1, 8),
('fifa15', 'bresil', 3, 1, 0, 0, 1, 1, 0, 8),
('fifa15', 'allemagne', 3, 1, 0, 0, 1, 1, 0, 5),
('fifa15', 'japon', 0, 0, 0, 1, -1, 0, 1, 5),
('fifa15', 'japon', 0, 0, 0, 1, -1, 0, 1, 11),
('fifa15', 'allemagne', 3, 1, 0, 0, 1, 1, 0, 11);

-- --------------------------------------------------------

--
-- Structure de la table `sondage`
--

CREATE TABLE IF NOT EXISTS `sondage` (
  `nom_sondage` varchar(20) NOT NULL,
  `choix` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sondage`
--

INSERT INTO `sondage` (`nom_sondage`, `choix`, `ip`, `login`) VALUES
('villaudric', 'Alexis', '', ''),
('villaudric', 'Alexis', '', ''),
('villaudric', 'Olivier', '127.0.0.1', ''),
('coteaux', 'Olivier', '127.0.0.1', ''),
('fronton', 'Alexy', '127.0.0.1', ''),
('gardouch', 'alexy', '127.0.0.1', ''),
('note-gardouch', '15', '127.0.0.1', ''),
('saint-araille2', 'alexy', '127.0.0.1', ''),
('note-saint-araille', '1', '127.0.0.1', ''),
('note-', '0', '127.0.0.1', ''),
('', '3', '127.0.0.1', ''),
('', 'MaximeS', '127.0.0.1', ''),
('', 'MaximeP', '127.0.0.1', ''),
('mondonville', 'MaximeP', '127.0.0.1', ''),
('note-mondonville', '3', '127.0.0.1', '');

-- --------------------------------------------------------

--
-- Structure de la table `tournoi`
--

CREATE TABLE IF NOT EXISTS `tournoi` (
  `nom_tournoi` varchar(20) NOT NULL,
  `mode_tournoi` varchar(20) NOT NULL,
  `nombre_tournoi` int(5) NOT NULL,
  `type_match` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tournoi`
--

INSERT INTO `tournoi` (`nom_tournoi`, `mode_tournoi`, `nombre_tournoi`, `type_match`) VALUES
('fifa15', 'champ', 4, 'oui'),
('415', 'champ', 6, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nom` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `auto` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`nom`, `ip`, `prenom`, `email`, `login`, `password`, `auto`) VALUES
('Guerrin', '90.84.144.82', 'Julien', 'julien_guerrin@yahoo.fr', 'jujupiwi', '251088', 'O'),
('Fournier', '90.60.177.147', 'Audrey', 'audrey.fournier@yahoo.fr', 'Piwi31', 'tachon', 'O'),
('Dardenne', '77.197.10.173', 'Paul', 'p.dardenne329@laposte.net', 'Polo', 'taoupats', 'O'),
('Birello', '77.197.22.238', 'Enzo', 'enzo.birello@hotmail.fr ', 'Enzo', 'moncoeur', 'O'),
('Sarlaboux', '84.5.155.204', 'Maxime', 'sarlaboux31@hotmail.fr', 'Smax', 'maxouu31', 'O'),
('Coquillat', '92.90.20.128', 'Guillaume', ' 	guillaume.coquillat@sfr.fr', 'Guibrum', 'jaunetnoir', 'O'),
('MCL', '92.90.20.126', 'Dédé', 'andre.maciel@hotmail.fr', 'Dédé', 'P0rtuGAL', 'O');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
