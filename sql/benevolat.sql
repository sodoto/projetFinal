-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 17 Septembre 2019 à 22:47
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `benevolat`
--

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `idMember` int(11) NOT NULL,
  `firstName` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastName` varchar(50) COLLATE utf8_bin NOT NULL,
  `city` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `rating` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`idMember`, `firstName`, `lastName`, `city`, `email`, `username`, `password`, `rating`) VALUES
(1, 'John', 'Rodriguez', 'Montreal', 'johnrodriguezforero1@gmail.com', 'johnrod', '123456', NULL),
(2, 'Catalina', 'Quintero', 'Montreal', 'cata@gmail.com', 'cataquint', '1234', NULL),
(3, 'Hard', 'Rock', 'Montreal', 'hr@gmail.com', 'hard', 'rock', NULL),
(4, 'College', 'Rosemont', 'Montreal', 'Rosemont@gmail.com', 'rose', '1234', NULL),
(5, 'College', 'Rosemont', 'Montreal', 'Rosemont@gmail.com', 'rose', '1234', NULL),
(6, 'Study', 'Case', 'Quebec', 'study@hotmail.com', 'case', '1234', NULL),
(9, 'Test', 'Test', 'New Jersey', 'nj@hotmail.com', 'nj', '123', NULL),
(10, 'Test', 'Test', 'New Jersey', 'nj@hotmail.com', 'nj', '123', NULL),
(11, 'testsession', 'session', 'Buenos Aires', 'session@hotmail.com', 'buenos', '1234', NULL),
(12, 'sosvite', 'benevolat', 'Dubai', 'benevolat@hotmail.com', 'sostive', '1234', NULL),
(13, 'Samuel', 'NN', 'Montreal', 'samuel@hotmail.con', 'sam', '123', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `memberskills`
--

CREATE TABLE `memberskills` (
  `idRegistre` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `idSkill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `memberskills`
--

INSERT INTO `memberskills` (`idRegistre`, `idMember`, `idSkill`) VALUES
(40, 1, 12),
(41, 1, 13),
(42, 1, 4),
(43, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `idMessage` int(11) NOT NULL,
  `message` varchar(200) COLLATE utf8_bin NOT NULL,
  `idOffer` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `offerrequest`
--

CREATE TABLE `offerrequest` (
  `idOffer` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8_bin NOT NULL,
  `dateOffer` datetime NOT NULL,
  `comment` varchar(50) COLLATE utf8_bin NOT NULL,
  `idMember` int(11) NOT NULL,
  `idRequest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `request`
--

CREATE TABLE `request` (
  `idRequest` int(11) NOT NULL,
  `skillWanted` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_bin NOT NULL,
  `dateRequest` datetime NOT NULL,
  `dateService` datetime NOT NULL,
  `location` varchar(50) COLLATE utf8_bin NOT NULL,
  `status` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `idMember` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `request`
--

INSERT INTO `request` (`idRequest`, `skillWanted`, `title`, `dateRequest`, `dateService`, `location`, `status`, `idMember`) VALUES
(1, 10, 'The car dont start', '2019-09-12 00:00:00', '2019-09-18 00:00:00', 'Montreal', '', 1),
(2, 2, 'Peinture sur les murs', '2019-09-12 00:00:00', '2019-09-18 00:00:00', 'Montreal', '', 1),
(3, 2, 'The car dont start', '2019-09-12 00:00:00', '2019-09-18 00:00:00', 'Montreal', '', 2),
(4, 3, 'Boxes in the garage', '2019-09-12 00:00:00', '2019-09-18 00:00:00', 'Montreal', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `idSkills` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `skills`
--

INSERT INTO `skills` (`idSkills`, `description`) VALUES
(1, 'Deplacer des objets'),
(2, 'Peinture(art)'),
(3, 'Peinture (murs et objets similaires)'),
(4, 'Traduire'),
(5, 'Nettoyer'),
(6, 'Transporter quelque chose'),
(7, 'Acompagner quel\'un ou quelque chose'),
(8, 'Enseigner'),
(9, 'Organiser'),
(10, 'Cuisiner'),
(11, 'Nourrir'),
(12, 'Conduire'),
(13, 'Réparer quelque chose');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`idMember`);

--
-- Index pour la table `memberskills`
--
ALTER TABLE `memberskills`
  ADD PRIMARY KEY (`idRegistre`),
  ADD KEY `idMember` (`idMember`),
  ADD KEY `idSkill` (`idSkill`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idMessage`),
  ADD KEY `idMember` (`idMember`),
  ADD KEY `idOffer` (`idOffer`);

--
-- Index pour la table `offerrequest`
--
ALTER TABLE `offerrequest`
  ADD PRIMARY KEY (`idOffer`),
  ADD KEY `idMember` (`idMember`),
  ADD KEY `idRequest` (`idRequest`);

--
-- Index pour la table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`idRequest`),
  ADD KEY `idMember` (`idMember`),
  ADD KEY `skillWanted` (`skillWanted`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`idSkills`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `idMember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `memberskills`
--
ALTER TABLE `memberskills`
  MODIFY `idRegistre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `offerrequest`
--
ALTER TABLE `offerrequest`
  MODIFY `idOffer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `request`
--
ALTER TABLE `request`
  MODIFY `idRequest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `idSkills` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `memberskills`
--
ALTER TABLE `memberskills`
  ADD CONSTRAINT `memberskills_ibfk_1` FOREIGN KEY (`idMember`) REFERENCES `members` (`idMember`),
  ADD CONSTRAINT `memberskills_ibfk_2` FOREIGN KEY (`idSkill`) REFERENCES `skills` (`idSkills`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`idMember`) REFERENCES `members` (`idMember`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`idOffer`) REFERENCES `offerrequest` (`idOffer`);

--
-- Contraintes pour la table `offerrequest`
--
ALTER TABLE `offerrequest`
  ADD CONSTRAINT `offerrequest_ibfk_1` FOREIGN KEY (`idMember`) REFERENCES `members` (`idMember`),
  ADD CONSTRAINT `offerrequest_ibfk_2` FOREIGN KEY (`idRequest`) REFERENCES `request` (`idRequest`);

--
-- Contraintes pour la table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`idMember`) REFERENCES `members` (`idMember`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`skillWanted`) REFERENCES `skills` (`idSkills`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
