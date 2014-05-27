-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2014 at 05:42 PM
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
-- Table structure for table `deadlines`
--

CREATE TABLE IF NOT EXISTS `deadlines` (
  `deadlineId` int(11) NOT NULL AUTO_INCREMENT,
  `picT` varchar(15) NOT NULL,
  `value` varchar(255) NOT NULL,
  `additional` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`deadlineId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `deadlines`
--

INSERT INTO `deadlines` (`deadlineId`, `picT`, `value`, `additional`, `date`) VALUES
(1, '1740329384756', 'First chapter documentation', '', '2014-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `declinedstudents`
--

CREATE TABLE IF NOT EXISTS `declinedstudents` (
  `picT` varchar(15) NOT NULL,
  `picS` varchar(15) NOT NULL,
  UNIQUE KEY `picT` (`picT`,`picS`),
  UNIQUE KEY `picT_2` (`picT`,`picS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `declinedstudents`
--

INSERT INTO `declinedstudents` (`picT`, `picS`) VALUES
('1740329384756', '2921217046192');

-- --------------------------------------------------------

--
-- Table structure for table `donedeadlines`
--

CREATE TABLE IF NOT EXISTS `donedeadlines` (
  `deadlineId` int(11) NOT NULL,
  `picS` varchar(14) NOT NULL,
  `done` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donedeadlines`
--

INSERT INTO `donedeadlines` (`deadlineId`, `picS`, `done`) VALUES
(1, '1921223294857', 0),
(1, '1930425384726', 1);

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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`from`, `to`, `message`, `type`) VALUES
('1740329384756', '1930425384726', 'The topic has been changed. Please check', 'notif'),
('1740329384756', '1930425384726', 'The topic has been changed. Please check', 'notif'),
('1740329384756', '1930425384726', 'The topic has been changed. Please check', 'notif'),
('1740329384756', '1930425384726', 'The topic has been changed. Please check', 'notif'),
('1740329384756', '1930425384726', 'Your topic has been deleted. Please choose another one or contact me', 'notif'),
('1740329384756', '1921223294857', 'You have been rejected!', 'notif'),
('1740329384756', '1921223294857', 'You have been accepted!', 'notif'),
('1740329384756', '5', 'You have been rejected!', 'notif'),
('1740329384756', '5', 'You have been rejected!', 'notif'),
('1740329384756', '5', 'You have been rejected!', 'notif'),
('1740329384756', '5', 'You have been rejected!', 'notif'),
('1740329384756', '5', 'You have been rejected!', 'notif'),
('1740329384756', '', 'You have been rejected!', 'notif'),
('1740329384756', '', 'You have been rejected!', 'notif'),
('1740329384756', '5', 'You have been rejected!', 'notif'),
('1740329384756', '1930425384726', 'You have been rejected!', 'notif'),
('1740329384756', '1930425384726', 'You have been accepted!', 'notif'),
('1740329384756', '1930425384726', 'You have been accepted!', 'notif'),
('1740329384756', '2921217046192', 'You have been accepted!', 'notif'),
('1740329384756', '1930405384726', 'You have been accepted!', 'notif'),
('1740329384756', '1930405384726', 'Your topic has been deleted. Please choose another one or contact me', 'notif'),
('1740329384756', '1930405384726', 'You have been rejected!', 'notif'),
('1740329384756', '2921217046192', 'You can not work with me anymore!', 'notif'),
('1740329384756', '1930425384726', 'You can not work with me anymore!', 'notif'),
('1740329384756', '1930425384726', 'You have been accepted!', 'notif'),
('1740329384756', '1930425384726', 'You can not work with me anymore!', 'notif'),
('1740329384756', '2921217046192', 'You have been accepted!', 'notif'),
('1740329384756', '1930425384726', 'You have been rejected!', 'notif'),
('1740329384756', '1930425384726', 'You have been accepted!', 'notif'),
('1740329384756', '2921217046192', 'You can not work with me anymore!', 'notif'),
('1740329384756', '1921223294857', 'Subject :  salut', 'notif');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE IF NOT EXISTS `registrations` (
  `picS` varchar(14) NOT NULL,
  `picT` varchar(14) NOT NULL,
  `topicId` int(30) NOT NULL,
  UNIQUE KEY `picS` (`picS`),
  UNIQUE KEY `topicId` (`topicId`),
  KEY `picT` (`picT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`picS`, `picT`, `topicId`) VALUES
('1921223294857', '1740329384756', -1),
('1930425384726', '1740329384756', 10);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `reqId` int(11) NOT NULL AUTO_INCREMENT,
  `subjectId` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  PRIMARY KEY (`reqId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`reqId`, `subjectId`, `grade`) VALUES
(1, 431, 5),
(2, 432, 6),
(3, 433, 7),
(4, 432, 4),
(5, 433, 7),
(6, 431, 4),
(7, 431, 4),
(8, 432, 5),
(9, 433, 2),
(10, 431, 0),
(11, 431, 0),
(12, 431, 0),
(13, 431, 0),
(14, 431, 0),
(15, 431, 0),
(16, 431, 5),
(17, 432, 6),
(18, 433, 5),
(19, 433, 5),
(20, 431, 5),
(21, 431, 5),
(22, 431, 5),
(23, 431, 5),
(24, 431, 5),
(25, 431, 5),
(26, 431, 5),
(27, 431, 5),
(28, 431, 5),
(29, 431, 5),
(30, 432, 1),
(31, 431, 5),
(32, 431, 5),
(33, 431, 5),
(34, 432, 5),
(35, 432, 5),
(36, 433, 3),
(37, 432, 5),
(38, 431, 5),
(39, 431, 5),
(40, 432, 5),
(41, 433, 1),
(42, 432, 5),
(43, 433, 3),
(44, 432, 5),
(45, 433, 1),
(46, 432, 1),
(47, 431, 5),
(48, 431, 5),
(49, 432, 5),
(50, 431, 5),
(51, 431, 5),
(52, 432, 5),
(53, 431, 5),
(54, 431, 5),
(55, 431, 5),
(56, 432, 5),
(57, 432, 5),
(58, 431, 5),
(59, 431, 5),
(60, 431, 5),
(61, 431, 5),
(62, 431, 5),
(63, 431, 5),
(64, 432, 5),
(65, 432, 5),
(66, 431, 5),
(67, 432, 5),
(68, 431, 5),
(69, 432, 5),
(70, 431, 5),
(71, 432, 5),
(72, 431, 5),
(73, 432, 5),
(74, 433, 5),
(75, 433, 5),
(76, 433, 5),
(77, 433, 5),
(78, 433, 5),
(79, 433, 5),
(80, 433, 5),
(81, 433, 5),
(82, 433, 5),
(83, 433, 5),
(84, 433, 5),
(85, 433, 5),
(86, 433, 5),
(87, 433, 5),
(88, 433, 5),
(89, 431, 5),
(90, 432, 5);

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
  `topicId` int(11) NOT NULL AUTO_INCREMENT,
  `picT` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `type` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  PRIMARY KEY (`topicId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topicId`, `picT`, `title`, `description`, `type`, `domain`) VALUES
(-3, '1740329384756', 'Kido', 'Sa se implementeze un sistem Web de monitorizare in timp real al unui copil, eventual pe baza unui senzor sau dispozitiv. Se vor oferi in orice moment atat locatia copilului pe o harta convenabil aleasa (e.g., la nivel de apartament, strada, cartier), cat si notificari daca se distanteaza la mai mult de M metri de un punct fix sau de coordonatele actuale ale parintelui/tutorelui. Suplimentar, se vor realiza notificari pe baza unui serviciu Web privind posibile accidente precum coliziuni cu masini, izbituri la sol, altercatii etc. De asemenea, se va oferi o interfata de administrare a copiilor monitorizati, inclusiv posibilitatea de a afla cu ce alti copii interactioneaza o anumita odrasla.', 'master', 'web'),
(-2, '1740329384756', 'AcRe', 'Luand in consideratie pareri (barfe) deja disponibile din anii anteriori pe diverse retele sociale si statistici anonime privind notele obtinute (e.g., curba lui Gauss reala) la o materie, sa se realizeze un instrument Web ce recomanda unui student (restantier) grupa la care sa participe la orele de laborator + punctele slabe/tari ale studentului.', 'master', 'matematica'),
(-1, '1740329384756', 'Acatism', 'Sa se realizeze o aplicatie Web privind managementul tezelor de licenta/master la nivelul unei facultati. Din punctul de vedere al profesorului, sistemul va oferi posibilitatea gestionarii temelor propuse si a studentilor arondati, inclusiv crearea unei planificari a celor mai importante etape pana la momentul sustinerii. Pentru studenti, aplicatia va fi capabila sa listeze/filtreze subiectele de interes pentru fiecare profesor in parte si sa permita inscrierea unei persoane in vederea indrumarii, eventual conform unor cerinte prelabile. Sistemul va verifica indeplinirea acestor cerinte, inclusiv va notifica -- via un flux Atom sau prin e-mail -- profesorul/studentul atunci cand survin intarzieri in efectuarea unor activitati (e.g., transmiterea unui raport preliminar) sau daca apar actualizari -- de pilda, profesorul a plasat o lista de lecturi recomandate. De asemenea, aplicatia va semnala posibile probleme privind variantele intermediare ale documentelor intocmite de student referitoare la format sau standarde de redactare. Progresul implementarii tezei va putea fi monitorizat automat prin intermermediul unui sistem online de management de cod-sursa precum Github.', 'bachelor', 'web'),
(5, '1740329384756', 'Yelp', 'Se doreste dezvoltarea unei aplicatii Web oferind o solutie inovativa de utilizare (vizualizare, filtrare, mixare) a datelor puse la dispozitie de Yelp.', 'bachelor', 'web'),
(8, '1740329384756', 'BotStats', 'Sa se implementeze un robot care numara paginile disponibile pe Web (eventual doar pentru anumite situri, e.g. cele din domeniul ''.ro'' sau/si ''.net''). Instrumentul va putea genera o lista cu toate siturile contorizate si va oferi posibilitati de filtrare ale acestora (de exemplu, furnizarea URL-urilor ce corespund siturilor academice ori celor privind oferte de stagii de practica pentru studenti). La cererea utilizatorului, se va intocmi o statistica referitoare la standardele Web utilizate (e.g. HTML 4.01, XHTML 1.0, HTML5, recurgerea la proprietati CSS -- nivelul 3, documente invalide si altele.', 'master', 'web'),
(10, '1740329384756', 'GuS (Guess the Star)', 'Sa se dezvolte o aplicatie Web care permite utilizatorilor ghicirea numelor unor personalitati celebre cu ajutorul imaginilor (preluate local sau folosind un serviciu online precum Flickr), fie prin tastarea directa a numelor (gen Spanzuratoarea), fie prin apelarea la metode ajutatoare (variante de alegeri sau cu ajutorul unui prieten). Utilizatorii autentificati vor avea la dispozitie un istoric al punctajelor proprii obtinute pe baza sesiunilor de joc. Clasamentele vor putea fi facute publice atat ca document HTML, cat si ca flux de stiri Atom.', 'bachelor', 'web');

-- --------------------------------------------------------

--
-- Table structure for table `topicsreq`
--

CREATE TABLE IF NOT EXISTS `topicsreq` (
  `topicId` int(11) NOT NULL,
  `reqId` int(11) NOT NULL,
  UNIQUE KEY `topicId` (`topicId`,`reqId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topicsreq`
--

INSERT INTO `topicsreq` (`topicId`, `reqId`) VALUES
(-1, 72),
(-1, 73),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9),
(7, 31),
(7, 32),
(7, 33),
(8, 34),
(10, 37),
(43, 42),
(43, 43),
(45, 44),
(45, 45),
(46, 46);

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
  ADD CONSTRAINT `registrations_ibfk_3` FOREIGN KEY (`topicId`) REFERENCES `topics` (`topicId`),
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`picS`) REFERENCES `students` (`picS`),
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`picT`) REFERENCES `teachers` (`picT`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
