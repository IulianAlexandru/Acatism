-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2014 at 12:46 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acatism`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `pic` varchar(30) NOT NULL,
  `userId` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `pic` (`pic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`pic`, `userId`, `pass`, `type`) VALUES
('1921223294857', 'andu.crasi', 'pass', 'student'),
('2891213023293', 'claudia.gheorghiu', 'pass', 'teacher'),
('1740329384756', 'cornel.buraga', 'pass', 'teacher'),
('1930405384726', 'ionut.barsan', 'pass', 'student'),
('2781170461923', 'lacra.leonte', 'pass', 'secretary'),
('2921217046192', 'mihaela.cuna', 'pass', 'student'),
('1930425384726', 'vlad.iulian', 'pass', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `subjectId` int(14) NOT NULL,
  `picS` varchar(14) NOT NULL,
  `val` int(2) NOT NULL,
  KEY `picS` (`picS`),
  KEY `subjectId` (`subjectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`subjectId`, `picS`, `val`) VALUES
(431, '1921223294857', 8),
(431, '1921223294857', 8),
(432, '1921223294857', 5),
(433, '1921223294857', 3),
(431, '1930425384726', 9),
(432, '1930425384726', 10),
(433, '1930425384726', 7),
(431, '1930405384726', 7),
(432, '1930405384726', 10),
(433, '1930405384726', 6),
(431, '1921223294857', 9),
(432, '1921223294857', 6),
(433, '1921223294857', 10);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE IF NOT EXISTS `registrations` (
  `picS` varchar(14) NOT NULL,
  `picT` varchar(14) NOT NULL,
  `topicId` int(30) NOT NULL,
  UNIQUE KEY `picS` (`picS`),
  UNIQUE KEY `theme` (`topicId`),
  KEY `picT` (`picT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`picS`, `picT`, `topicId`) VALUES
('1930425384726', '1740329384756', 0);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `reqId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  PRIMARY KEY (`reqId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`reqId`, `subjectId`, `grade`) VALUES
(1, 431, 5),
(2, 432, 6),
(3, 433, 7),
(4, 432, 4),
(5, 433, 7),
(6, 431, 4);

-- --------------------------------------------------------

--
-- Table structure for table `secretary`
--

CREATE TABLE IF NOT EXISTS `secretary` (
  `pic` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  PRIMARY KEY (`pic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secretary`
--

INSERT INTO `secretary` (`pic`, `name`, `surname`) VALUES
('2781170461923', 'Lacramioara', 'Leonte');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `picS` varchar(30) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `surname` varchar(20) NOT NULL,
  `matYear` int(4) NOT NULL,
  `applied` tinyint(1) NOT NULL,
  `registered` tinyint(1) NOT NULL,
  `gitLink` varchar(255) NOT NULL,
  PRIMARY KEY (`picS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`picS`, `name`, `surname`, `matYear`, `applied`, `registered`, `gitLink`) VALUES
('1921223294857', 'Andu', 'Crasi', 2012, 0, 0, ''),
('1930405384726', 'Ionut', 'Barsan', 2012, 0, 0, ''),
('1930425384726', 'Iulian', 'Vlad', 2012, 1, 1, ''),
('2921217046192', 'Mihaela', 'Timpu', 2012, 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `subjectId` int(14) NOT NULL,
  `name` varchar(20) NOT NULL,
  `year` int(4) NOT NULL,
  `optional` tinyint(1) NOT NULL,
  PRIMARY KEY (`subjectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectId`, `name`, `year`, `optional`) VALUES
(431, 'Matematica', 1, 0),
(432, 'Logica', 1, 0),
(433, 'BD', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `picT` varchar(14) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  PRIMARY KEY (`picT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`picT`, `name`, `surname`) VALUES
('1740329384756', 'Buraga', 'Sabin-Corneliu'),
('2891213023293', 'Gheorghiu', 'Claudia');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topicId` int(11) NOT NULL,
  `picT` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `type` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  PRIMARY KEY (`topicId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topicId`, `picT`, `title`, `description`, `type`, `domain`) VALUES
(1, '1740329384756', 'Acatism', 'Sa se realizeze o aplicatie Web privind managementul tezelor de licenta/master la nivelul unei facultati. Din punctul de vedere al profesorului, sistemul va oferi posibilitatea gestionarii temelor propuse si a studentilor arondati, inclusiv crearea unei planificari a celor mai importante etape pana la momentul sustinerii. Pentru studenti, aplicatia va fi capabila sa listeze/filtreze subiectele de interes pentru fiecare profesor in parte si sa permita inscrierea unei persoane in vederea indrumarii, eventual conform unor cerinte prelabile. Sistemul va verifica indeplinirea acestor cerinte, inclusiv va notifica -- via un flux Atom sau prin e-mail -- profesorul/studentul atunci cand survin intarzieri in efectuarea unor activitati (e.g., transmiterea unui raport preliminar) sau daca apar actualizari -- de pilda, profesorul a plasat o lista de lecturi recomandate. De asemenea, aplicatia va semnala posibile probleme privind variantele intermediare ale documentelor intocmite de student referitoare la format sau standarde de redactare. Progresul implementarii tezei va putea fi monitorizat automat prin intermermediul unui sistem online de management de cod-sursa precum Github.', 'bachelor', 'tw'),
(2, '1740329384756', 'AcRe', 'Luand in consideratie pareri (barfe) deja disponibile din anii anteriori pe diverse retele sociale si statistici anonime privind notele obtinute (e.g., curba lui Gauss reala) la o materie, sa se realizeze un instrument Web ce recomanda unui student (restantier) grupa la care sa participe la orele de laborator + punctele slabe/tari ale studentului.', 'master', 'matematica'),
(3, '1740329384756', 'Kido', 'Sa se implementeze un sistem Web de monitorizare in timp real al unui copil, eventual pe baza unui senzor sau dispozitiv. Se vor oferi in orice moment atat locatia copilului pe o harta convenabil aleasa (e.g., la nivel de apartament, strada, cartier), cat si notificari daca se distanteaza la mai mult de M metri de un punct fix sau de coordonatele actuale ale parintelui/tutorelui. Suplimentar, se vor realiza notificari pe baza unui serviciu Web privind posibile accidente precum coliziuni cu masini, izbituri la sol, altercatii etc. De asemenea, se va oferi o interfata de administrare a copiilor monitorizati, inclusiv posibilitatea de a afla cu ce alti copii interactioneaza o anumita odrasla.', 'master', 'tw');

-- --------------------------------------------------------

--
-- Table structure for table `topicsreq`
--

CREATE TABLE IF NOT EXISTS `topicsreq` (
  `topicId` int(11) NOT NULL,
  `reqId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topicsreq`
--

INSERT INTO `topicsreq` (`topicId`, `reqId`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`picS`) REFERENCES `students` (`picS`),
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`subjectId`) REFERENCES `subjects` (`subjectId`);

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`picS`) REFERENCES `students` (`picS`),
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`picT`) REFERENCES `teachers` (`picT`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
