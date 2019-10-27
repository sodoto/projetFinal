-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2019 at 07:16 PM
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
  `photo_path` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'user.png',
  `firstName` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastName` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `rating` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`idMember`, `photo_path`, `firstName`, `lastName`, `city`, `email`, `username`, `password`, `rating`) VALUES
(1, 'avatar1.jpg', 'John', 'Rodriguez', 'Montreal', 'johnrodriguezforero1@gmail.com', 'johnrod', '123456', NULL),
(2, 'avatar.jpg', 'Catalina', 'Quintero', 'Montreal', 'cata@gmail.com', 'cataquint', '1234', NULL),
(13, 'user.png', 'Samuel', 'Theroux', 'Montreal', 'samuel@hotmail.con', 'sam', '123', NULL),
(17, 'mtremblay@hotmail.com_photo.jpg', 'Michel', 'Tremblay', 'Terrebonne', 'mtremblay@hotmail.com', 'mtremblay', '12345', NULL),
(18, 'domi-marie@gmail.com_photo2019.jpg', 'Marie', 'Domi', 'Montreal', 'domi-marie@gmail.com', 'mdomi', '12345', NULL),
(19, 'bushdave@hotmail.com_imag2e.jpg', 'Dave', 'Bush', 'Toronto', 'bushdave@hotmail.com', 'bushd', '12345', NULL),
(20, 'saputol@gmail.com_image1.jpg', 'Line', 'Saputo', 'Montreal', 'saputol@gmail.com', 'l.saputo', '12345', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `memberskills`
--

CREATE TABLE `memberskills` (
  `idRegistre` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `idSkill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `memberskills`
--

INSERT INTO `memberskills` (`idRegistre`, `idMember`, `idSkill`) VALUES
(40, 1, 12),
(41, 1, 13),
(42, 1, 4),
(43, 1, 6),
(73, 13, 3),
(74, 13, 4),
(75, 13, 5),
(76, 13, 7),
(77, 13, 8),
(78, 17, 3),
(79, 17, 5),
(80, 17, 7),
(81, 17, 9),
(82, 17, 12),
(83, 18, 1),
(84, 18, 2),
(85, 18, 4),
(86, 18, 5),
(87, 18, 7),
(88, 18, 8),
(89, 18, 12),
(90, 19, 4),
(91, 19, 8),
(92, 20, 3),
(93, 20, 12),
(94, 20, 13);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `idMessage` int(11) NOT NULL,
  `message` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `idRequest` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `idRecepteur` int(11) NOT NULL,
  `dateHeure` datetime NOT NULL,
  `messageLu` varchar(12) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`idMessage`, `message`, `idRequest`, `idMember`, `idRecepteur`, `dateHeure`, `messageLu`) VALUES
(2, 'Bonjour, je suis disponible samedi prochain pour vous aider avec la peinture de votre chambre!', 11, 20, 17, '2019-10-27 14:28:37', 'Yes'),
(3, 'Bonjour madame, c\'est parfait, je suis chez moi entre 12h et 18h. J\'ai le matériel et la peinture.', 11, 17, 20, '2019-10-27 14:29:53', 'Yes'),
(4, 'Parfait, j\'ai mon matériel aussi. À samedi monsieur tremblay!', 11, 20, 17, '2019-10-27 14:32:13', 'No'),
(5, 'Je peux vous aider ce soir!', 17, 18, 19, '2019-10-27 14:51:30', 'Yes'),
(6, 'Merci beaucoup je vous attends, 123 rue beaubien, montreal!', 17, 19, 18, '2019-10-27 14:52:09', 'Yes'),
(7, 'Merci beaucoup de votre aide ce soir!', 17, 19, 18, '2019-10-27 14:52:37', 'No'),
(8, 'Ça me fait plaisir, n\'hésitez pas si vous avez besoin d\'aide pour autre chose :)', 17, 18, 19, '2019-10-27 14:53:30', 'No'),
(9, 'Je peux vous aider, par contre seulement dans 2 jours si vous le désirez.', 20, 17, 20, '2019-10-27 15:08:42', 'Yes'),
(10, 'Merci je vous écris ce soir si j\'ai toujours besoin!', 20, 20, 17, '2019-10-27 15:09:43', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `offerrequest`
--

CREATE TABLE `offerrequest` (
  `idOffer` int(11) NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dateOffer` datetime NOT NULL,
  `comment` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `idMember` int(11) NOT NULL,
  `idRequest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offerrequest`
--

INSERT INTO `offerrequest` (`idOffer`, `status`, `dateOffer`, `comment`, `idMember`, `idRequest`) VALUES
(2, 'Message d\'adie envoye', '2019-10-27 14:28:37', 'Awaiting', 20, 11),
(3, 'Aide fournie', '2019-10-27 14:51:30', 'finished', 18, 17),
(4, 'Message d\'adie envoye', '2019-10-27 15:08:42', 'Awaiting', 17, 20);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `idRequest` int(11) NOT NULL,
  `skillWanted` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description_request` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dateRequest` datetime NOT NULL,
  `dateService` datetime NOT NULL,
  `location` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `idMember` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`idRequest`, `skillWanted`, `title`, `description_request`, `dateRequest`, `dateService`, `location`, `status`, `idMember`) VALUES
(10, 13, 'Réparer radio', 'Ma radio ne fonctionne plus très bien, je crois que c\'est l\'antenne.', '2019-10-27 14:24:11', '2019-10-30 00:00:00', 'Terrebonne', 'ouverte', 17),
(11, 3, 'Peinture chambre', 'La chambre d\'amis est à peinturer. Elle mesure 10x10 pieds. Seulement les murs.', '2019-10-27 14:25:39', '2019-10-25 00:00:00', 'Terrebonne', 'ouverte', 17),
(12, 4, 'Traduire une recette', 'J\'ai trouvé une recette sur un site web italien, j\'aimerais l\'avoir en français ou anglais.', '2019-10-27 14:26:55', '2019-10-29 00:00:00', 'Montreal', 'ouverte', 18),
(16, 1, 'Sofa à déplacer', 'J\'ai un sofa à déplacer du 1er étage à mon sous-sol. c\'est un 2 places, pas très lourd. ', '2019-10-27 14:42:14', '2019-10-29 00:00:00', 'Montreal', 'ouverte', 18),
(17, 5, 'Nettoyer goutière', 'J\'aimerais avoir de l\'aide pour nettoyer les goutière de ma maison, je me suis fouler une cheville, donc c\'est difficile pour moi.', '2019-10-27 14:45:18', '2019-11-02 00:00:00', 'Toronto', 'fermee', 19),
(18, 8, 'J\'aimerais apprendre la programmation', 'Bonjour, j\'aimerais apprendre comment me faire un petit site web.', '2019-10-27 14:46:38', '2019-10-30 00:00:00', 'Toronto', 'ouverte', 19),
(19, 10, 'Gâteau pour ma petite fille', 'J\'ai besoin d\'un petit gâteau pour ma petite fille sur le thème du roi lion.', '2019-10-27 14:48:59', '2019-11-09 00:00:00', 'Laval', 'ouverte', 20),
(20, 13, 'Crevaison', 'Quelqu\'un pourrait m\'aider à mettre mon pneu de secours svp.', '2019-10-27 14:50:08', '2019-10-28 00:00:00', 'Laval', 'ouverte', 20);

-- --------------------------------------------------------

--
-- Table structure for table `requestphotos`
--

CREATE TABLE `requestphotos` (
  `IdPhoto` int(11) NOT NULL,
  `nomFichier` varchar(200) CHARACTER SET latin1 NOT NULL,
  `dateUpLoad` date NOT NULL,
  `idRequestPhoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `requestphotos`
--

INSERT INTO `requestphotos` (`IdPhoto`, `nomFichier`, `dateUpLoad`, `idRequestPhoto`) VALUES
(2, 'norvege-adieu-radio-fm.jpeg', '2019-10-27', 10),
(3, '6a5f8ed70280b6db1be10a93765a2f12.jpg', '2019-10-27', 11),
(6, '$_59.JPG', '2019-10-27', 16),
(7, '$_597.jpg', '2019-10-27', 16),
(8, '0b2cd281ff663ac0833c62c716b78fb3.jpg', '2019-10-27', 19),
(9, '5da809a8d6800f0e26a00fec70036bf9.jpg', '2019-10-27', 19),
(10, '5e8b5e51a0261fcabbf8811b6395e8c2.jpg', '2019-10-27', 19);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `idSkills` int(11) NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image_path` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`idSkills`, `description`, `image_path`) VALUES
(1, 'Déplacement d\'objets', '1.jpg'),
(2, 'Peinture(art)', '2.jpg'),
(3, 'Peinture(murs et objets similaires)', '3.jpg'),
(4, 'Traduction', '4.jpg'),
(5, 'Nettoyage', '5.jpg'),
(6, 'Transport d\'objets', '6.jpg'),
(7, 'Accompagnement', '7.jpg'),
(8, 'Enseignement', '8.jpg'),
(9, 'Organisation', '9.jpg'),
(10, 'Cuisine', '10.jpg'),
(12, 'Accompagnement en voiture', '12.jpg'),
(13, 'Réparation', '13.jpg');

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
  ADD KEY `idRequest` (`idRequestPhoto`),
  ADD KEY `idRequestPhoto` (`idRequestPhoto`);

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
  MODIFY `idMember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `memberskills`
--
ALTER TABLE `memberskills`
  MODIFY `idRegistre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `offerrequest`
--
ALTER TABLE `offerrequest`
  MODIFY `idOffer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `idRequest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `requestphotos`
--
ALTER TABLE `requestphotos`
  MODIFY `IdPhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  ADD CONSTRAINT `requestphotos_ibfk_1` FOREIGN KEY (`idRequestPhoto`) REFERENCES `request` (`idRequest`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
