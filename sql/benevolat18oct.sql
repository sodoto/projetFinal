-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2019 at 04:51 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benevolat`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `idMember` int(11) NOT NULL,
  `photo_path` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT 'user.png',
  `firstName` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastName` varchar(50) COLLATE utf8_bin NOT NULL,
  `city` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `rating` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`idMember`, `photo_path`, `firstName`, `lastName`, `city`, `email`, `username`, `password`, `rating`) VALUES
(1, 'avatar1.jpg', 'John', 'Rodriguez', 'Montreal', 'johnrodriguezforero1@gmail.com', 'johnrod', '123456', NULL),
(2, 'avatar.jpg', 'Catalina', 'Quintero', 'Montreal', 'cata@gmail.com', 'cataquint', '1234', NULL),
(13, 'user.png', 'Samuel', 'NN', 'Montreal', 'samuel@hotmail.con', 'sam', '123', NULL),
(14, 'test@hotmail.com_wallpaper-zelda-background.gif', 'Test', 'Test', 'Montral', 'test@hotmail.com', 'test', '123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `memberskills`
--

CREATE TABLE `memberskills` (
  `idRegistre` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `idSkill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `memberskills`
--

INSERT INTO `memberskills` (`idRegistre`, `idMember`, `idSkill`) VALUES
(40, 1, 12),
(41, 1, 13),
(42, 1, 4),
(43, 1, 6),
(44, 13, 3),
(45, 14, 2),
(46, 14, 3),
(47, 14, 6),
(48, 14, 7),
(49, 14, 9),
(50, 14, 10),
(51, 14, 12),
(52, 14, 2),
(53, 14, 3),
(54, 14, 6),
(55, 14, 7),
(56, 14, 9),
(57, 14, 10),
(58, 14, 12);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `idMessage` int(11) NOT NULL,
  `message` varchar(200) COLLATE utf8_bin NOT NULL,
  `idRequest` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `idRecepteur` int(11) NOT NULL,
  `dateHeure` datetime NOT NULL,
  `messageLu` varchar(12) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`idMessage`, `message`, `idRequest`, `idMember`, `idRecepteur`, `dateHeure`, `messageLu`) VALUES
(11, 'Je peux te donner des cours gratuits', 8, 1, 2, '2019-10-01 09:44:03', 'Yes'),
(12, 'Merci bien', 8, 2, 1, '2019-10-01 09:58:41', 'Yes'),
(13, 'Je peus t\'aider le samedi prochain', 9, 1, 13, '2019-10-01 10:06:16', 'Yes'),
(18, 'Prueba 3', 8, 2, 1, '2019-10-01 11:35:35', 'Yes'),
(19, 'Contestacion correcta sobre mensaje recibido', 8, 2, 1, '2019-10-01 11:36:43', 'Yes'),
(20, 'Contesto mensaje 1', 8, 1, 2, '2019-10-01 11:38:12', 'Yes'),
(21, 'Contesto mensaje 2', 8, 1, 2, '2019-10-01 11:38:31', 'No'),
(22, 'Hola de nuevo', 9, 1, 13, '2019-10-01 11:39:03', 'Yes'),
(23, 'Respuesta de Sam', 9, 13, 1, '2019-10-01 11:39:49', 'Yes'),
(24, 'Test de envio', 8, 1, 2, '2019-10-01 12:27:30', 'No'),
(25, 'Bonjour', 7, 13, 1, '2019-10-02 20:47:33', 'Yes'),
(26, 'Allo je vais vous aider', 10, 2, 13, '2019-10-07 11:43:32', 'Yes'),
(27, 'Merci', 10, 13, 2, '2019-10-07 11:44:31', 'Yes'),
(28, 'I can doit for you', 11, 2, 1, '2019-10-08 12:40:35', 'Yes'),
(29, 'hola\r\n', 8, 1, 2, '2019-10-08 19:48:12', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `offerrequest`
--

CREATE TABLE `offerrequest` (
  `idOffer` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8_bin NOT NULL,
  `dateOffer` datetime NOT NULL,
  `comment` varchar(50) COLLATE utf8_bin NOT NULL,
  `idMember` int(11) NOT NULL,
  `idRequest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `offerrequest`
--

INSERT INTO `offerrequest` (`idOffer`, `status`, `dateOffer`, `comment`, `idMember`, `idRequest`) VALUES
(19, 'Aide fournie', '2019-09-30 20:14:21', 'finished', 13, 7),
(20, 'Message d\'adie envoye', '2019-10-01 09:43:05', 'Awaiting', 2, 8),
(21, 'Message d\'adie envoye', '2019-10-01 09:44:03', 'Awaiting', 2, 8),
(23, 'Message d\'adie envoye', '2019-10-02 20:47:33', 'Awaiting', 13, 7),
(24, 'Aide fournie', '2019-10-07 11:43:32', 'finished', 2, 10),
(25, 'Message d\'adie envoye', '2019-10-08 12:40:35', 'Awaiting', 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `idRequest` int(11) NOT NULL,
  `skillWanted` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_request` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dateRequest` datetime NOT NULL,
  `dateService` datetime NOT NULL,
  `location` varchar(50) COLLATE utf8_bin NOT NULL,
  `status` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `idMember` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`idRequest`, `skillWanted`, `title`, `description_request`, `dateRequest`, `dateService`, `location`, `status`, `idMember`) VALUES
(7, 13, 'Reparer mon ordinateur', 'Il faut changer la memoire RAM de mon ordinateur.', '2019-09-30 20:07:08', '2019-09-30 00:00:00', 'Montreal', 'fermee', 1),
(8, 8, 'J\'ai besoin de cours d\'espagnol', 'J\'aimerais trouver un professeur pour m\'enseigner l\'espagnol.', '2019-09-30 20:08:58', '2019-09-30 00:00:00', 'Montreal', 'ouverte', 2),
(9, 5, 'Ménage extérieur des feuilles', 'J\'ai besoin d\'aide pour nettoyer les feuilles sur mon terrain.', '2019-09-30 20:12:35', '2019-10-05 00:00:00', 'Montral', 'fermee', 13),
(10, 10, 'Souper', 'J\'aimerais avoir de l\'aide pour préparer un souper pour 15 personnes.', '2019-10-07 11:42:09', '2019-10-11 00:00:00', 'Montreal', 'fermee', 13),
(11, 4, 'Traduire un document', 'J\'ai un document à traduire de 5 pages du français vers l\'anglais.', '2019-10-08 12:39:23', '2019-10-08 00:00:00', 'Montreal', 'ouverte', 1),
(62, 5, 'Nettoyer les feuilles du jardin', '', '2019-10-09 11:16:01', '2019-10-25 00:00:00', 'Montreal', 'ouverte', 13),
(63, 13, 'Reparer mon ordinateur', 'Mon écran ne fonctionne plus.', '2019-10-09 11:45:02', '2019-10-12 00:00:00', 'Montreal', 'ouverte', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requestphotos`
--

CREATE TABLE `requestphotos` (
  `IdPhoto` int(11) NOT NULL,
  `nomFichier` varchar(200) NOT NULL,
  `dateUpLoad` date NOT NULL,
  `idRequestPhoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestphotos`
--

INSERT INTO `requestphotos` (`IdPhoto`, `nomFichier`, `dateUpLoad`, `idRequestPhoto`) VALUES
(8, '1.jpg', '2019-10-09', 62),
(9, '2.jpg', '2019-10-09', 62),
(10, '3.jpg', '2019-10-09', 62),
(11, '4.jpg', '2019-10-09', 62),
(12, '5.jpg', '2019-10-09', 62),
(13, 'ordi1.jpg', '2019-10-09', 63),
(14, 'ordi2.jpg', '2019-10-09', 63),
(15, 'ordi3.jpg', '2019-10-09', 63);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `idSkills` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8_bin NOT NULL,
  `image_path` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`idSkills`, `description`, `image_path`) VALUES
(1, 'Deplacer des objets', '1.jpg'),
(2, 'Peinture(art)', '2.jpg'),
(3, 'Peinture (murs et objets similaires)', '3.jpg'),
(4, 'Traduire', '4.jpg'),
(5, 'Nettoyer', '5.jpg'),
(6, 'Transporter quelque chose', '6.jpg'),
(7, 'Acompagner quel\'un ou quelque chose', '7.jpg'),
(8, 'Enseigner', '8.jpg'),
(9, 'Organiser', '9.jpg'),
(10, 'Cuisiner', '10.jpg'),
(12, 'Conduire', '12.jpg'),
(13, 'Réparer quelque chose', '13.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`idMember`);

--
-- Indexes for table `memberskills`
--
ALTER TABLE `memberskills`
  ADD PRIMARY KEY (`idRegistre`),
  ADD KEY `idMember` (`idMember`),
  ADD KEY `idSkill` (`idSkill`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idMessage`),
  ADD KEY `idMember` (`idMember`),
  ADD KEY `idOffer` (`idRequest`);

--
-- Indexes for table `offerrequest`
--
ALTER TABLE `offerrequest`
  ADD PRIMARY KEY (`idOffer`),
  ADD KEY `idMember` (`idMember`),
  ADD KEY `idRequest` (`idRequest`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`idRequest`),
  ADD KEY `idMember` (`idMember`),
  ADD KEY `skillWanted` (`skillWanted`);

--
-- Indexes for table `requestphotos`
--
ALTER TABLE `requestphotos`
  ADD PRIMARY KEY (`IdPhoto`),
  ADD KEY `idRequest` (`idRequestPhoto`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`idSkills`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `idMember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `memberskills`
--
ALTER TABLE `memberskills`
  MODIFY `idRegistre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `offerrequest`
--
ALTER TABLE `offerrequest`
  MODIFY `idOffer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `idRequest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `requestphotos`
--
ALTER TABLE `requestphotos`
  MODIFY `IdPhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `idSkills` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `memberskills`
--
ALTER TABLE `memberskills`
  ADD CONSTRAINT `memberskills_ibfk_1` FOREIGN KEY (`idMember`) REFERENCES `members` (`idMember`),
  ADD CONSTRAINT `memberskills_ibfk_2` FOREIGN KEY (`idSkill`) REFERENCES `skills` (`idSkills`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`idMember`) REFERENCES `members` (`idMember`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`idRequest`) REFERENCES `request` (`idRequest`);

--
-- Constraints for table `offerrequest`
--
ALTER TABLE `offerrequest`
  ADD CONSTRAINT `offerrequest_ibfk_1` FOREIGN KEY (`idMember`) REFERENCES `members` (`idMember`),
  ADD CONSTRAINT `offerrequest_ibfk_2` FOREIGN KEY (`idRequest`) REFERENCES `request` (`idRequest`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`idMember`) REFERENCES `members` (`idMember`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`skillWanted`) REFERENCES `skills` (`idSkills`);

--
-- Constraints for table `requestphotos`
--
ALTER TABLE `requestphotos`
  ADD CONSTRAINT `requestphotos_ibfk_1` FOREIGN KEY (`idRequestPhoto`) REFERENCES `request` (`idRequest`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
