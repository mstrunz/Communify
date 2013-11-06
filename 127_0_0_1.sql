-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Nov 2013 um 08:42
-- Server Version: 5.6.11
-- PHP-Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `cdcol`
--
CREATE DATABASE IF NOT EXISTS `cdcol` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `cdcol`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cds`
--

CREATE TABLE IF NOT EXISTS `cds` (
  `titel` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `interpret` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `jahr` int(11) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `cds`
--

INSERT INTO `cds` (`titel`, `interpret`, `jahr`, `id`) VALUES
('Beauty', 'Ryuichi Sakamoto', 1990, 1),
('Goodbye Country (Hello Nightclub)', 'Groove Armada', 2001, 4),
('Glee', 'Bran Van 3000', 1997, 5);
--
-- Datenbank: `communify`
--
CREATE DATABASE IF NOT EXISTS `communify` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `communify`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `coins` int(11) NOT NULL,
  `taskid` int(11) DEFAULT NULL,
  `tasksuggestionid` int(11) DEFAULT NULL,
  `ideacontributionid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Daten für Tabelle `account`
--

INSERT INTO `account` (`id`, `userid`, `coins`, `taskid`, `tasksuggestionid`, `ideacontributionid`) VALUES
(1, 5, 7853, 22, NULL, 0),
(2, 5, 20, 23, NULL, 0),
(3, 6, 1000, 24, NULL, 0),
(4, 6, 555, 25, NULL, 0),
(5, 5, 500, NULL, 4, 0),
(6, 5, 333, NULL, 5, 0),
(7, 5, 500, NULL, 1, 0),
(8, 5, 4500, NULL, 1, 0),
(9, 5, 5, NULL, 4, 0),
(10, 5, 5, NULL, 3, 0),
(11, 5, 500, 26, NULL, 0),
(12, 5, 200, 27, NULL, 0),
(13, 5, 333, NULL, NULL, 6),
(14, 5, 333, NULL, NULL, 7),
(15, 5, 333, NULL, NULL, 8),
(16, 5, 100, 29, NULL, NULL),
(17, 5, 100, 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ideacontribution`
--

CREATE TABLE IF NOT EXISTS `ideacontribution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ideatopicid` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `creationdate` date NOT NULL,
  `description` text NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Daten für Tabelle `ideacontribution`
--

INSERT INTO `ideacontribution` (`id`, `ideatopicid`, `createdby`, `creationdate`, `description`, `name`) VALUES
(1, 1, 5, '2013-11-03', 'THis is a test to figure out if this is working THis is a test to figure out if this is workingTHis is a test to figure out if this is workingTHis is a test to figure out if this is workingTHis is a test to figure out if this is workingTHis is a test to figure out if this is workingTHis is a test to figure out if this is workingTHis is a test to figure out if this is workingTHis is a test to figure out if this is workingTHis is a test to figure out if this is working', 'Test Contribution'),
(2, 1, 5, '2013-11-04', 'Here is the text to contribution no 1', 'Test Contribution 1'),
(3, 1, 5, '2013-11-04', 'This is the text to contribution no 2', 'Test Contribution 2'),
(4, 2, 5, '2013-11-04', 'Is awesome', 'Mega Message Test'),
(5, 1, 5, '2013-11-04', 'asdasd', 'test account'),
(6, 1, 5, '2013-11-04', 'asdasd', 'test account'),
(7, 1, 5, '2013-11-04', 'asdasdasd', 'asdasd'),
(8, 1, 5, '2013-11-04', 'asdasdasdasd', 'asdasdasd');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ideatopic`
--

CREATE TABLE IF NOT EXISTS `ideatopic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `createdby` int(11) NOT NULL,
  `creationdate` date NOT NULL,
  `coins` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `ideatopic`
--

INSERT INTO `ideatopic` (`id`, `name`, `description`, `createdby`, `creationdate`, `coins`) VALUES
(1, 'Demo Topic', 'First try', 5, '2013-11-03', 333),
(2, 'Mega Message Test', 'test', 5, '2013-11-03', 222),
(3, 'New Topic Idea', '123456', 5, '2013-11-03', 111),
(4, 'Message System that works', 'just an idea', 5, '2013-11-03', 111),
(5, 'Anka aergern', 'ist eine tolle idee', 5, '2013-11-03', 800),
(6, 'Test long', ' asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj asdkj;kas dkalsdka;sl kasd kal;sdksdfjskgdj slkdsdfjsdklfjienfd eif jsdlkj', 5, '2013-11-03', 100);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `parent`) VALUES
(1, 'Intern', 0),
(2, 'Assistant', 1),
(3, 'Software Developer', 1),
(4, 'Software Engineer', 1),
(5, 'Junior Manager', 2),
(6, 'Project Manager', 2),
(7, 'Manager', 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  `createdby` int(11) NOT NULL,
  `duedate` date DEFAULT NULL,
  `creationdate` date NOT NULL,
  `coins` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `completiondate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Daten für Tabelle `task`
--

INSERT INTO `task` (`id`, `name`, `description`, `createdby`, `duedate`, `creationdate`, `coins`, `status`, `completiondate`) VALUES
(1, 'Create getter Methode', 'DO a lot of boilderplate code', 5, '0000-00-00', '2001-11-20', NULL, 'Completed', '0000-00-00'),
(2, 'Do Programming', 'THis is a lot of Fun', 5, '2013-11-07', '2013-11-01', 1000, 'Completed', '0000-00-00'),
(3, 'Reduce missuse', 'The manager can give himself task which he can then do them himself and therefor earning cc', 5, '0000-00-00', '2001-11-20', NULL, '', '0000-00-00'),
(4, 'Fix datepicker issue', 'wrong time format', 5, '0000-00-00', '2001-11-20', NULL, '', '0000-00-00'),
(8, 'mutlijob', 'more than one person', 5, '2013-11-22', '2013-11-01', NULL, '', '0000-00-00'),
(9, 'mutlijob2', 'mutlijob2', 5, '2013-11-08', '2013-11-01', NULL, '', '0000-00-00'),
(10, 'mutlijob2', 'mutlijob2', 5, '2013-11-08', '2013-11-01', NULL, '', '0000-00-00'),
(11, 'mutlijob2', 'mutlijob2', 5, '2013-11-08', '2013-11-01', NULL, '', '0000-00-00'),
(12, 'mutlijob2', 'mutlijob2', 5, '2013-11-08', '2013-11-01', NULL, '', '0000-00-00'),
(13, 'mutlijob2', 'mutlijob2', 5, '2013-11-08', '2013-11-01', NULL, '', '0000-00-00'),
(14, 'mutlijob2', 'mutlijob2', 5, '2013-11-08', '2013-11-01', NULL, '', '0000-00-00'),
(15, 'mutlijob2', 'mutlijob2', 5, '2013-11-08', '2013-11-01', NULL, '', '0000-00-00'),
(16, 'mutlijob2', 'mutlijob2', 5, '2013-11-08', '2013-11-01', NULL, '', '0000-00-00'),
(17, 'mutlijob2', 'mutlijob2', 5, '2013-11-08', '2013-11-01', NULL, '', '0000-00-00'),
(18, 'mutlijob2', 'mutlijob2', 5, '2013-11-08', '2013-11-01', NULL, '', '0000-00-00'),
(19, 'mutlijob2', 'mutlijob2', 5, '2013-11-08', '2013-11-01', NULL, '', '0000-00-00'),
(20, 'mutlijob2', 'mutlijob2', 5, '2013-11-08', '2013-11-01', NULL, 'Completed', '0000-00-00'),
(21, 'New Task', 'New Task', 5, '2013-11-08', '2013-11-01', 100, 'Completed', '0000-00-00'),
(22, 'Demo Task', 'NO description', 5, '2013-11-01', '2013-11-01', 7853, 'Completed', '0000-00-00'),
(23, 'Taskitask', 'test', 5, '2013-11-02', '2013-11-01', 20, 'Completed', '2013-11-01'),
(24, 'Dummy Task', 'Dummy', 5, '2013-11-08', '2013-11-01', 1000, 'Completed', '2013-11-01'),
(25, 'DUmmy Task 2', 'DUmmy Task 2', 5, '2013-11-08', '2013-11-01', 555, 'Completed', '2013-11-01'),
(26, 'Do Idea Contribution', 'Create the section Idea Contribution', 5, '2013-11-04', '2013-11-03', 500, 'Completed', '2013-11-04'),
(27, 'message system', 'check if message system works', 5, '2013-11-04', '2013-11-03', 200, 'Completed', '2013-11-04'),
(28, 'test message', '', 5, '2013-11-04', '2013-11-04', 5, 'Open', '0000-00-00'),
(29, 'Checkout Message', 'Checkout Message', 5, '2013-11-04', '2013-11-04', 100, 'Completed', '2013-11-04'),
(30, 'Fraud Prodection', 'Check oit', 5, '2013-11-05', '2013-11-05', 100, 'Completed', '2013-11-05');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tasksuggestion`
--

CREATE TABLE IF NOT EXISTS `tasksuggestion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taskid` int(11) NOT NULL,
  `suggestiontext` text NOT NULL,
  `coins` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `suggestiondate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `tasksuggestion`
--

INSERT INTO `tasksuggestion` (`id`, `taskid`, `suggestiontext`, `coins`, `userid`, `suggestiondate`) VALUES
(1, 2, 'asdasdasdasdasdasd', 4500, 5, '0000-00-00'),
(3, 20, 'Multi Suggestion', 5, 5, '0000-00-00'),
(4, 2, 'asfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asdasfdasdasdasdasda asd asd', 5, 5, '0000-00-00'),
(5, 21, 'New Task Suggestion', 0, 5, '2013-11-01'),
(6, 8, 'Finish it', 0, 5, '2013-11-03');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `manager` int(11) DEFAULT NULL,
  `ismanager` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `manager`, `ismanager`) VALUES
(2, 'max', 'asd', '', 5, 0),
(5, 'maxas', 'e10adc3949ba59abbe56e057f20f883e', 'awsome@webmax.de', NULL, 1),
(6, 'anka', 'a7f59e46ff64d625a5f302f0fb1eb52a', 'anka@anka.de', 5, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `useraward`
--

CREATE TABLE IF NOT EXISTS `useraward` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `coins` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Daten für Tabelle `useraward`
--

INSERT INTO `useraward` (`id`, `name`, `coins`, `userid`) VALUES
(15, 'First Login', 500, 5),
(16, 'First Contribution', 500, 5),
(17, 'Five Contributions', 1000, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userjob`
--

CREATE TABLE IF NOT EXISTS `userjob` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `current` tinyint(1) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Daten für Tabelle `userjob`
--

INSERT INTO `userjob` (`id`, `userid`, `jobid`, `current`, `level`) VALUES
(50, 5, 1, 0, 0),
(51, 5, 2, 0, 1),
(52, 5, 5, 0, 2),
(53, 5, 7, 0, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `usertask`
--

CREATE TABLE IF NOT EXISTS `usertask` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Daten für Tabelle `usertask`
--

INSERT INTO `usertask` (`id`, `userid`, `taskid`) VALUES
(1, 5, 2),
(2, 6, 8),
(3, 5, 20),
(4, 6, 20),
(5, 5, 0),
(6, 5, 21),
(7, 5, 22),
(8, 5, 23),
(9, 5, 24),
(10, 6, 24),
(11, 5, 25),
(12, 6, 25),
(13, 5, 26),
(14, 5, 27),
(15, 5, 28),
(16, 5, 29),
(17, 5, 30);
--
-- Datenbank: `data`
--
CREATE DATABASE IF NOT EXISTS `data` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `data`;
--
-- Datenbank: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma_bookmark`
--

CREATE TABLE IF NOT EXISTS `pma_bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma_column_info`
--

CREATE TABLE IF NOT EXISTS `pma_column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=61 ;

--
-- Daten für Tabelle `pma_column_info`
--

INSERT INTO `pma_column_info` (`id`, `db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`) VALUES
(1, 'communify', 'user', 'id', '', '', '_', ''),
(2, 'communify', 'user', 'username', '', '', '_', ''),
(3, 'communify', 'user', 'password', '', '', '_', ''),
(4, 'communify', 'user', 'email', '', '', '_', ''),
(5, 'communify', 'task', 'id', '', '', '_', ''),
(6, 'communify', 'task', 'name', '', '', '_', ''),
(7, 'communify', 'task', 'description', '', '', '_', ''),
(8, 'communify', 'task', 'createdby', '', '', '_', ''),
(19, 'communify', 'task', 'coins', '', '', '_', ''),
(10, 'communify', 'task', 'duedate', '', '', '_', ''),
(11, 'communify', 'task', 'creationdate', '', '', '_', ''),
(12, 'communify', 'user', 'manager', '', '', '_', ''),
(13, 'communify', 'user', 'ismanager', '', '', '_', ''),
(14, 'communify', 'task', 'coints', '', '', '_', ''),
(15, 'communify', 'task', 'status', '', '', '_', ''),
(16, 'communify', 'usertask', 'id', '', '', '_', ''),
(17, 'communify', 'usertask', 'userid', '', '', '_', ''),
(18, 'communify', 'usertask', 'taskid', '', '', '_', ''),
(20, 'communify', 'account', 'id', '', '', '_', ''),
(21, 'communify', 'account', 'userid', '', '', '_', ''),
(22, 'communify', 'account', 'coins', '', '', '_', ''),
(23, 'communify', 'account', 'task', '', '', '_', ''),
(24, 'communify', 'account', 'taskid', '', '', '_', ''),
(25, 'communify', 'task', 'completiondate', '', '', '_', ''),
(26, 'communify', 'tasksuggestion', 'id', '', '', '_', ''),
(27, 'communify', 'tasksuggestion', 'taskid', '', '', '_', ''),
(28, 'communify', 'tasksuggestion', 'suggestiontext', '', '', '_', ''),
(29, 'communify', 'tasksuggestion', 'coins', '', '', '_', ''),
(30, 'communify', 'tasksuggestion', 'userid', '', '', '_', ''),
(31, 'communify', 'account', 'tasksuggestionid', '', '', '_', ''),
(32, 'communify', 'tasksuggestion', 'suggestiondate', '', '', '_', ''),
(33, 'communify', 'jobs', 'id', '', '', '_', ''),
(34, 'communify', 'jobs', 'name', '', '', '_', ''),
(35, 'communify', 'jobs', 'parent', '', '', '_', ''),
(36, 'communify', 'userjob', 'id', '', '', '_', ''),
(37, 'communify', 'userjob', 'userid', '', '', '_', ''),
(38, 'communify', 'userjob', 'jobid', '', '', '_', ''),
(39, 'communify', 'userjob', 'current', '', '', '_', ''),
(40, 'communify', 'userjob', 'level', '', '', '_', ''),
(41, 'communify', 'useraward', 'id', '', '', '_', ''),
(42, 'communify', 'useraward', 'name', '', '', '_', ''),
(43, 'communify', 'useraward', 'coins', '', '', '_', ''),
(44, 'communify', 'useraward', 'userid', '', '', '_', ''),
(45, 'communify', 'ideatopic', 'id', '', '', '_', ''),
(46, 'communify', 'ideatopic', 'name', '', '', '_', ''),
(47, 'communify', 'ideatopic', 'description', '', '', '_', ''),
(48, 'communify', 'ideatopic', 'createdby', '', '', '_', ''),
(49, 'communify', 'ideatopic', 'creationdate', '', '', '_', ''),
(50, 'communify', 'ideatopic', 'coins', '', '', '_', ''),
(51, 'communify', 'ideacontribution', 'id', '', '', '_', ''),
(52, 'communify', 'ideacontribution', 'ideatopicid', '', '', '_', ''),
(53, 'communify', 'ideacontribution', 'userid', '', '', '_', ''),
(54, 'communify', 'ideacontribution', 'creationdate', '', '', '_', ''),
(55, 'communify', 'ideacontribution', 'contributiontext', '', '', '_', ''),
(56, 'communify', 'ideacontribution', 'contributionname', '', '', '_', ''),
(57, 'communify', 'ideacontribution', 'description', '', '', '_', ''),
(58, 'communify', 'ideacontribution', 'name', '', '', '_', ''),
(59, 'communify', 'ideacontribution', 'createdby', '', '', '_', ''),
(60, 'communify', 'account', 'ideacontributionid', '', '', '_', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma_designer_coords`
--

CREATE TABLE IF NOT EXISTS `pma_designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma_history`
--

CREATE TABLE IF NOT EXISTS `pma_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma_pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma_pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma_recent`
--

CREATE TABLE IF NOT EXISTS `pma_recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Daten für Tabelle `pma_recent`
--

INSERT INTO `pma_recent` (`username`, `tables`) VALUES
('root', '[{"db":"communify","table":"userjob"},{"db":"communify","table":"jobs"},{"db":"communify","table":"ideacontribution"},{"db":"communify","table":"account"},{"db":"communify","table":"ideatopic"},{"db":"communify","table":"useraward"},{"db":"communify","table":"task"},{"db":"communify","table":"user"},{"db":"communify","table":"userreward"},{"db":"communify","table":"tasksuggestion"}]');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma_relation`
--

CREATE TABLE IF NOT EXISTS `pma_relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma_table_coords`
--

CREATE TABLE IF NOT EXISTS `pma_table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma_table_info`
--

CREATE TABLE IF NOT EXISTS `pma_table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma_table_uiprefs`
--

CREATE TABLE IF NOT EXISTS `pma_table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Daten für Tabelle `pma_table_uiprefs`
--

INSERT INTO `pma_table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'communify', 'task', '{"sorted_col":"`task`.`completiondate` DESC"}', '2013-11-01 15:54:46');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma_tracking`
--

CREATE TABLE IF NOT EXISTS `pma_tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma_userconfig`
--

CREATE TABLE IF NOT EXISTS `pma_userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Daten für Tabelle `pma_userconfig`
--

INSERT INTO `pma_userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2013-11-03 20:11:33', '{"lang":"de","Export\\/file_template_database":"DB1485085"}');
--
-- Datenbank: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

DELIMITER $$
--
-- Prozeduren
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;
--
-- Datenbank: `webauth`
--
CREATE DATABASE IF NOT EXISTS `webauth` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `webauth`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_pwd`
--

CREATE TABLE IF NOT EXISTS `user_pwd` (
  `name` char(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pass` char(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Daten für Tabelle `user_pwd`
--

INSERT INTO `user_pwd` (`name`, `pass`) VALUES
('xampp', 'wampp');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
