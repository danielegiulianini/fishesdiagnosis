-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 12, 2019 alle 00:13
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patologiepesci`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `azioni`
--

CREATE TABLE `azioni` (
  `idAzione` int(11) NOT NULL,
  `descrizione` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `caratteristicheacqua`
--

CREATE TABLE `caratteristicheacqua` (
  `nome` varchar(50) NOT NULL,
  `unitaMisura` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `cause`
--

CREATE TABLE `cause` (
  `idStatoPat` int(11) NOT NULL,
  `idConclusione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `conclusioni`
--

CREATE TABLE `conclusioni` (
  `idConclusione` int(11) NOT NULL,
  `idScheda` int(11) NOT NULL,
  `risposta` text,
  `evoluzione` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `conclusioni`
--

INSERT INTO `conclusioni` (`idConclusione`, `idScheda`, `risposta`, `evoluzione`) VALUES
(2, 8, 'test', 'test');

-- --------------------------------------------------------

--
-- Struttura della tabella `condizionamenti`
--

CREATE TABLE `condizionamenti` (
  `idLuogo` int(11) NOT NULL,
  `idStatoPat` int(11) NOT NULL,
  `gradoInfluenza` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `eventi`
--

CREATE TABLE `eventi` (
  `idEvento` int(11) NOT NULL,
  `dataEvento` datetime DEFAULT NULL,
  `dataComparsaSegniClinici` datetime DEFAULT NULL,
  `tipologia` varchar(50) DEFAULT NULL,
  `idScheda` int(11) NOT NULL,
  `provenienza` int(11) DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `influenze`
--

CREATE TABLE `influenze` (
  `idRange` int(11) NOT NULL,
  `idStatoPat` int(11) NOT NULL,
  `gradoInfluenza` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `luoghi`
--

CREATE TABLE `luoghi` (
  `idLuogo` int(11) NOT NULL,
  `stato` varchar(50) NOT NULL,
  `siglaProvincia` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `misurazioni`
--

CREATE TABLE `misurazioni` (
  `idScheda` int(11) NOT NULL,
  `caratteristicaAcqua` varchar(50) NOT NULL,
  `valore` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `pesi`
--

CREATE TABLE `pesi` (
  `nomeProbabilitaAssociata` varchar(50) NOT NULL,
  `valore` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `pesi`
--

INSERT INTO `pesi` (`nomeProbabilitaAssociata`, `valore`) VALUES
('Caratteristiche Acqua', '0.2'),
('Luogo', '0.1'),
('Rapporto', '0.3'),
('Segni', '0.4');

-- --------------------------------------------------------

--
-- Struttura della tabella `presentazioni`
--

CREATE TABLE `presentazioni` (
  `idStatoPat` int(11) NOT NULL,
  `specie` varchar(50) NOT NULL,
  `idSegno` int(11) NOT NULL,
  `gradoFrequenza` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `presentazioni`
--

INSERT INTO `presentazioni` (`idStatoPat`, `specie`, `idSegno`, `gradoFrequenza`) VALUES
(1, 'carpa', 4, '0.2'),
(1, 'carpa', 6, '0.6'),
(1, 'carpa', 7, '0.6'),
(1, 'carpa', 8, '0.2'),
(1, 'carpa', 9, '0.8'),
(1, 'carpa', 10, '0.4'),
(1, 'carpa', 11, '0.8'),
(1, 'carpa', 12, '0.4'),
(1, 'carpa', 13, '0.4'),
(1, 'carpa', 14, '0.4'),
(1, 'carpa', 16, '1.0'),
(1, 'carpa', 18, '0.6'),
(1, 'carpa', 19, '0.8'),
(1, 'carpa', 21, '0.8'),
(1, 'carpa', 22, '0.6'),
(1, 'carpa', 23, '0.6'),
(1, 'carpa', 24, '1.0'),
(1, 'carpa', 25, '0.8'),
(1, 'carpa', 26, '0.8'),
(1, 'carpa', 27, '0.2'),
(1, 'carpa', 28, '0.2'),
(1, 'carpa', 29, '0.2'),
(1, 'carpa', 30, '0.4'),
(1, 'carpa', 31, '0.2'),
(1, 'carpa', 32, '0.2'),
(1, 'carpa', 33, '1.0'),
(1, 'carpa', 34, '0.8'),
(1, 'carpa', 35, '0.8'),
(1, 'carpa', 36, '0.2'),
(1, 'carpa', 37, '0.6'),
(1, 'carpa', 38, '0.2'),
(1, 'carpa', 40, '0.6'),
(1, 'carpa', 41, '0.6'),
(1, 'carpa', 42, '0.4'),
(1, 'carpa', 43, '0.2'),
(1, 'carpa', 44, '0.6'),
(1, 'carpa', 45, '0.6'),
(1, 'carpa', 46, '0.6'),
(1, 'carpa', 48, '0.8'),
(1, 'carpa', 49, '0.8'),
(1, 'carpa', 50, '0.8'),
(1, 'carpa', 51, '0.6'),
(1, 'carpa', 52, '0.8'),
(2, 'carpa', 4, '0.2'),
(2, 'carpa', 6, '0.6'),
(2, 'carpa', 7, '0.6'),
(2, 'carpa', 8, '1.0'),
(2, 'carpa', 9, '0.2'),
(2, 'carpa', 10, '1.0'),
(2, 'carpa', 11, '0.8'),
(2, 'carpa', 12, '0.2'),
(2, 'carpa', 13, '0.6'),
(2, 'carpa', 14, '0.2'),
(2, 'carpa', 16, '0.2'),
(2, 'carpa', 17, '0.4'),
(2, 'carpa', 18, '0.2'),
(2, 'carpa', 19, '0.6'),
(2, 'carpa', 20, '1.0'),
(2, 'carpa', 22, '0.2'),
(2, 'carpa', 23, '0.4'),
(2, 'carpa', 24, '0.2'),
(2, 'carpa', 25, '0.2'),
(2, 'carpa', 26, '0.2'),
(2, 'carpa', 27, '0.8'),
(2, 'carpa', 30, '0.2'),
(2, 'carpa', 31, '0.4'),
(2, 'carpa', 34, '1.0'),
(2, 'carpa', 35, '1.0'),
(2, 'carpa', 36, '0.2'),
(2, 'carpa', 37, '0.2'),
(2, 'carpa', 39, '0.6'),
(2, 'carpa', 40, '0.2'),
(2, 'carpa', 41, '0.2'),
(2, 'carpa', 42, '0.2'),
(2, 'carpa', 43, '1.0'),
(2, 'carpa', 44, '1.0'),
(2, 'carpa', 45, '0.8'),
(2, 'carpa', 46, '0.2'),
(2, 'carpa', 48, '1.0'),
(2, 'carpa', 49, '0.2'),
(2, 'carpa', 50, '0.2'),
(2, 'carpa', 51, '1.0'),
(2, 'carpa', 52, '0.6'),
(3, 'carpa', 1, '0.4'),
(3, 'carpa', 4, '0.4'),
(3, 'carpa', 5, '1.0'),
(3, 'carpa', 6, '0.2'),
(3, 'carpa', 7, '0.2'),
(3, 'carpa', 8, '0.2'),
(3, 'carpa', 26, '0.4'),
(3, 'carpa', 27, '0.8'),
(3, 'carpa', 34, '0.6'),
(3, 'carpa', 35, '0.2'),
(3, 'carpa', 36, '0.2'),
(3, 'carpa', 37, '0.2'),
(3, 'carpa', 38, '0.4'),
(3, 'carpa', 39, '0.2'),
(3, 'carpa', 40, '0.2'),
(3, 'carpa', 41, '0.2'),
(3, 'carpa', 42, '0.2'),
(3, 'carpa', 43, '0.2'),
(3, 'carpa', 44, '0.4'),
(3, 'carpa', 45, '0.2'),
(3, 'carpa', 46, '0.2'),
(3, 'carpa', 47, '0.2'),
(3, 'carpa', 48, '0.2'),
(3, 'carpa', 49, '0.2'),
(3, 'carpa', 50, '0.2'),
(3, 'carpa', 51, '0.2'),
(3, 'carpa', 52, '0.2'),
(4, 'carpa', 1, '0.2'),
(4, 'carpa', 4, '1.0'),
(4, 'carpa', 5, '0.6'),
(4, 'carpa', 6, '0.4'),
(4, 'carpa', 7, '0.2'),
(4, 'carpa', 8, '1.0'),
(4, 'carpa', 9, '0.2'),
(4, 'carpa', 10, '1.0'),
(4, 'carpa', 11, '0.6'),
(4, 'carpa', 12, '0.6'),
(4, 'carpa', 13, '0.4'),
(4, 'carpa', 14, '0.2'),
(4, 'carpa', 16, '0.4'),
(4, 'carpa', 17, '0.2'),
(4, 'carpa', 18, '0.4'),
(4, 'carpa', 19, '0.4'),
(4, 'carpa', 20, '1.0'),
(4, 'carpa', 24, '0.2'),
(4, 'carpa', 25, '0.4'),
(4, 'carpa', 26, '0.2'),
(4, 'carpa', 27, '1.0'),
(4, 'carpa', 30, '0.6'),
(4, 'carpa', 31, '0.6'),
(4, 'carpa', 32, '0.2'),
(4, 'carpa', 34, '0.6'),
(4, 'carpa', 35, '0.8'),
(4, 'carpa', 36, '0.2'),
(4, 'carpa', 37, '0.6'),
(4, 'carpa', 38, '0.2'),
(4, 'carpa', 39, '0.2'),
(4, 'carpa', 40, '0.2'),
(4, 'carpa', 41, '0.4'),
(4, 'carpa', 42, '0.2'),
(4, 'carpa', 43, '0.2'),
(4, 'carpa', 44, '0.2'),
(4, 'carpa', 45, '0.8'),
(4, 'carpa', 46, '0.8'),
(4, 'carpa', 47, '1.0'),
(4, 'carpa', 48, '0.2'),
(4, 'carpa', 49, '0.2'),
(4, 'carpa', 50, '1.0'),
(4, 'carpa', 51, '0.4'),
(4, 'carpa', 52, '1.0'),
(5, 'carpa', 1, '1.0'),
(5, 'carpa', 4, '1.0'),
(5, 'carpa', 5, '0.6'),
(5, 'carpa', 6, '1.0'),
(5, 'carpa', 7, '1.0'),
(5, 'carpa', 8, '1.0'),
(5, 'carpa', 10, '0.4'),
(5, 'carpa', 11, '0.4'),
(5, 'carpa', 18, '0.4'),
(5, 'carpa', 19, '0.4'),
(5, 'carpa', 21, '0.2'),
(5, 'carpa', 26, '0.4'),
(5, 'carpa', 27, '0.8'),
(5, 'carpa', 29, '1.0'),
(5, 'carpa', 30, '0.2'),
(5, 'carpa', 31, '0.2'),
(5, 'carpa', 34, '0.6'),
(5, 'carpa', 35, '0.6'),
(5, 'carpa', 36, '0.2'),
(5, 'carpa', 37, '0.4'),
(5, 'carpa', 39, '0.2'),
(5, 'carpa', 40, '0.2'),
(5, 'carpa', 41, '0.6'),
(5, 'carpa', 42, '0.6'),
(5, 'carpa', 43, '0.2'),
(5, 'carpa', 44, '0.2'),
(5, 'carpa', 45, '0.6'),
(5, 'carpa', 46, '0.8'),
(5, 'carpa', 47, '0.6'),
(5, 'carpa', 48, '0.2'),
(5, 'carpa', 49, '0.2'),
(5, 'carpa', 50, '0.8'),
(5, 'carpa', 51, '0.4'),
(5, 'carpa', 52, '0.6'),
(6, 'carpa', 1, '0.2'),
(6, 'carpa', 4, '1.0'),
(6, 'carpa', 5, '0.2'),
(6, 'carpa', 6, '1.0'),
(6, 'carpa', 7, '1.0'),
(6, 'carpa', 8, '0.2'),
(6, 'carpa', 9, '0.6'),
(6, 'carpa', 11, '0.2'),
(6, 'carpa', 12, '0.2'),
(6, 'carpa', 13, '0.2'),
(6, 'carpa', 14, '0.2'),
(6, 'carpa', 16, '0.6'),
(6, 'carpa', 17, '0.4'),
(6, 'carpa', 18, '0.4'),
(6, 'carpa', 19, '0.8'),
(6, 'carpa', 20, '0.2'),
(6, 'carpa', 21, '0.8'),
(6, 'carpa', 22, '0.4'),
(6, 'carpa', 23, '0.2'),
(6, 'carpa', 24, '0.6'),
(6, 'carpa', 25, '0.4'),
(6, 'carpa', 26, '0.6'),
(6, 'carpa', 27, '0.2'),
(6, 'carpa', 28, '0.6'),
(6, 'carpa', 29, '0.8'),
(6, 'carpa', 30, '0.4'),
(6, 'carpa', 31, '0.4'),
(6, 'carpa', 34, '0.4'),
(6, 'carpa', 35, '0.6'),
(6, 'carpa', 36, '0.2'),
(6, 'carpa', 37, '0.4'),
(6, 'carpa', 39, '0.2'),
(6, 'carpa', 40, '0.2'),
(6, 'carpa', 41, '0.6'),
(6, 'carpa', 42, '0.6'),
(6, 'carpa', 44, '0.2'),
(6, 'carpa', 45, '0.6'),
(6, 'carpa', 46, '0.2'),
(6, 'carpa', 47, '0.2'),
(6, 'carpa', 48, '0.2'),
(6, 'carpa', 49, '0.2'),
(6, 'carpa', 50, '0.6'),
(6, 'carpa', 51, '0.8'),
(6, 'carpa', 52, '0.6'),
(7, 'carpa', 1, '0.2'),
(7, 'carpa', 4, '1.0'),
(7, 'carpa', 5, '0.2'),
(7, 'carpa', 6, '0.8'),
(7, 'carpa', 7, '0.8'),
(7, 'carpa', 8, '0.2'),
(7, 'carpa', 9, '1.0'),
(7, 'carpa', 10, '0.2'),
(7, 'carpa', 11, '0.2'),
(7, 'carpa', 12, '0.2'),
(7, 'carpa', 13, '0.6'),
(7, 'carpa', 14, '0.4'),
(7, 'carpa', 15, '0.4'),
(7, 'carpa', 16, '0.8'),
(7, 'carpa', 17, '0.8'),
(7, 'carpa', 18, '0.4'),
(7, 'carpa', 19, '1.0'),
(7, 'carpa', 21, '1.0'),
(7, 'carpa', 22, '0.4'),
(7, 'carpa', 23, '1.0'),
(7, 'carpa', 24, '0.4'),
(7, 'carpa', 25, '1.0'),
(7, 'carpa', 26, '0.8'),
(7, 'carpa', 27, '0.2'),
(7, 'carpa', 28, '0.6'),
(7, 'carpa', 29, '0.6'),
(7, 'carpa', 30, '0.8'),
(7, 'carpa', 31, '0.8'),
(7, 'carpa', 34, '0.6'),
(7, 'carpa', 35, '0.6'),
(7, 'carpa', 36, '0.2'),
(7, 'carpa', 37, '0.6'),
(7, 'carpa', 38, '0.2'),
(7, 'carpa', 39, '0.2'),
(7, 'carpa', 40, '0.2'),
(7, 'carpa', 41, '0.2'),
(7, 'carpa', 42, '0.6'),
(7, 'carpa', 43, '0.2'),
(7, 'carpa', 44, '0.2'),
(7, 'carpa', 45, '0.8'),
(7, 'carpa', 46, '0.2'),
(7, 'carpa', 47, '0.2'),
(7, 'carpa', 48, '0.2'),
(7, 'carpa', 49, '0.4'),
(7, 'carpa', 50, '0.8'),
(7, 'carpa', 51, '0.6'),
(7, 'carpa', 52, '0.8'),
(8, 'carpa', 1, '1.0'),
(8, 'carpa', 2, '1.0'),
(8, 'carpa', 3, '1.0'),
(8, 'carpa', 4, '0.6'),
(8, 'carpa', 5, '0.4'),
(8, 'carpa', 6, '0.4'),
(8, 'carpa', 7, '0.2'),
(8, 'carpa', 8, '0.6'),
(8, 'carpa', 10, '0.2'),
(8, 'carpa', 11, '0.2'),
(8, 'carpa', 27, '0.6'),
(8, 'carpa', 29, '0.2'),
(8, 'carpa', 34, '0.2'),
(8, 'carpa', 35, '0.2'),
(8, 'carpa', 36, '0.2'),
(8, 'carpa', 37, '0.2'),
(8, 'carpa', 39, '0.2'),
(8, 'carpa', 41, '0.2'),
(8, 'carpa', 42, '0.2'),
(8, 'carpa', 43, '0.2'),
(8, 'carpa', 44, '0.2'),
(8, 'carpa', 45, '0.2'),
(8, 'carpa', 46, '0.2'),
(8, 'carpa', 47, '0.2'),
(8, 'carpa', 48, '0.2'),
(8, 'carpa', 49, '0.2'),
(8, 'carpa', 50, '0.2'),
(8, 'carpa', 51, '0.4'),
(8, 'carpa', 52, '0.2'),
(9, 'carpa', 1, '0.4'),
(9, 'carpa', 2, '0.4'),
(9, 'carpa', 4, '0.2'),
(9, 'carpa', 8, '1.0'),
(9, 'carpa', 10, '1.0'),
(9, 'carpa', 11, '0.4'),
(9, 'carpa', 27, '0.2'),
(9, 'carpa', 32, '0.2'),
(9, 'carpa', 34, '0.4'),
(9, 'carpa', 35, '0.4'),
(9, 'carpa', 36, '0.2'),
(9, 'carpa', 37, '0.2'),
(9, 'carpa', 39, '0.2'),
(9, 'carpa', 40, '0.2'),
(9, 'carpa', 41, '0.8'),
(9, 'carpa', 42, '0.6'),
(9, 'carpa', 43, '0.2'),
(9, 'carpa', 44, '0.2'),
(9, 'carpa', 45, '0.4'),
(9, 'carpa', 46, '1.0'),
(9, 'carpa', 47, '1.0'),
(9, 'carpa', 48, '0.2'),
(9, 'carpa', 49, '0.2'),
(9, 'carpa', 50, '0.6'),
(9, 'carpa', 51, '0.8'),
(9, 'carpa', 52, '0.6');

-- --------------------------------------------------------

--
-- Struttura della tabella `rangepatologie`
--

CREATE TABLE `rangepatologie` (
  `idRange` int(11) NOT NULL,
  `specie` varchar(50) NOT NULL,
  `caratteristicaAcqua` varchar(50) NOT NULL,
  `tipologia` varchar(50) NOT NULL,
  `valoreMin` decimal(8,2) NOT NULL,
  `valoreMax` decimal(8,2) NOT NULL,
  `valoreMin2` decimal(8,2) DEFAULT NULL,
  `valoreMax2` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `schedechiamate`
--

CREATE TABLE `schedechiamate` (
  `idScheda` int(11) NOT NULL,
  `dataOraRegistrazione` datetime DEFAULT CURRENT_TIMESTAMP,
  `nomeVeterinario` varchar(50) DEFAULT NULL,
  `nomeRichiedente` varchar(50) NOT NULL,
  `telefonoRichiedente` varchar(30) DEFAULT NULL,
  `emailRichiedente` varchar(50) DEFAULT NULL,
  `sospetto` text,
  `percentualeAffetti` decimal(5,2) DEFAULT NULL,
  `numeroEsaminati` mediumint(9) DEFAULT NULL,
  `taglia` mediumint(9) DEFAULT NULL,
  `eta` smallint(6) DEFAULT NULL,
  `sesso` varchar(30) DEFAULT NULL,
  `specie` varchar(50) NOT NULL,
  `vasca` varchar(50) DEFAULT NULL,
  `origine` int(11) DEFAULT NULL,
  `note` text,
  `idUtente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `schedechiamate`
--

INSERT INTO `schedechiamate` (`idScheda`, `dataOraRegistrazione`, `nomeVeterinario`, `nomeRichiedente`, `telefonoRichiedente`, `emailRichiedente`, `sospetto`, `percentualeAffetti`, `numeroEsaminati`, `taglia`, `eta`, `sesso`, `specie`, `vasca`, `origine`, `note`, `idUtente`) VALUES
(8, '2019-07-09 00:02:37', '', 'test2', '', '', '', NULL, NULL, 17, NULL, '', 'carpa', NULL, NULL, '', 28),
(9, '2019-07-09 21:42:31', '', 'test2', '', '', '', NULL, NULL, 21, NULL, '', 'carpa', NULL, NULL, '', 28);

-- --------------------------------------------------------

--
-- Struttura della tabella `segni`
--

CREATE TABLE `segni` (
  `idSegno` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `clinico` tinyint(1) DEFAULT '0',
  `macroscopico` tinyint(1) DEFAULT '1',
  `descrizione` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `segni`
--

INSERT INTO `segni` (`idSegno`, `nome`, `clinico`, `macroscopico`, `descrizione`) VALUES
(1, 'Patina bianco-giallastra sulla cute/mucose/branchie', 0, 1, NULL),
(2, 'aree di aspetto cotonoso su branchie', 0, 1, NULL),
(3, 'aree di aspetto cotonoso sulla cute', 0, 1, NULL),
(4, 'aree cutanee bianco/grigistre (necrosi)', 0, 1, NULL),
(5, 'Noduli/placche cutanei', 0, 1, NULL),
(6, 'erosione cute/pinne', 0, 1, NULL),
(7, 'ulcere cutanee', 0, 1, NULL),
(8, 'aree branchiali bianco/grigistre (erosione/necrosi)', 0, 1, NULL),
(9, 'petecchie', 0, 1, NULL),
(10, 'branchie rigonfie (edema/iperplasia)', 0, 1, NULL),
(11, 'branchie pallide', 0, 1, NULL),
(12, 'cuore flaccido e screziato', 0, 1, NULL),
(13, 'fegato rigonfio/ingrossato', 0, 1, NULL),
(14, 'fegato pallido', 0, 1, NULL),
(15, 'fegato verdognolo', 0, 1, NULL),
(16, 'distensione addominale', 0, 1, NULL),
(17, 'Apertura anale arrossata e rigonfia (edema)', 0, 1, NULL),
(18, 'emorragie branchie', 0, 1, NULL),
(19, 'emorragie cute/pinne', 0, 1, NULL),
(20, 'enoftalmo', 0, 1, NULL),
(21, 'esoftalmo', 0, 1, NULL),
(22, 'enterite catarrale', 0, 1, NULL),
(23, 'enterite emorragica', 0, 1, NULL),
(24, 'ascite', 0, 1, NULL),
(25, 'Emorragie viscerali/organi interni', 0, 1, NULL),
(26, 'iperpigmentazione cutanea', 0, 1, NULL),
(27, 'ipersecrezione di muco cutaneo/branchiale', 0, 1, NULL),
(28, 'lepidortosi', 0, 1, NULL),
(29, 'lesione erosiva a livello delle pinne dorsale/caudale', 0, 1, NULL),
(30, 'Splenomegalia', 0, 1, NULL),
(31, 'nefromegalia/renomegalia', 0, 1, NULL),
(32, 'riduzione muco cutaneo', 0, 1, NULL),
(33, 'vescica natatoria a uovo di tacchino', 0, 1, NULL),
(34, 'alterazione del nuoto', 1, 0, NULL),
(35, 'letargia', 1, 0, NULL),
(36, 'letargia alternata a guizzi improvvisi', 1, 0, NULL),
(37, 'nuoto scoordinato', 1, 0, NULL),
(38, 'nuoto a spirale', 1, 0, NULL),
(39, 'iper-reattività agli stimoli', 1, 0, NULL),
(40, 'scarsa reattività agli stimoli', 1, 0, NULL),
(41, 'ricerca attiva di ossigeno', 1, 0, NULL),
(42, 'nuoto superficiale', 1, 0, NULL),
(43, 'posizione girati sul fianco o sul dorso', 1, 0, NULL),
(44, 'stazionamento sul fondo della vasca', 1, 0, NULL),
(45, 'anoressia', 1, 0, NULL),
(46, 'boccheggiamento', 1, 0, NULL),
(47, 'tachipnea (aumento della frequenza respiratoria)', 1, 0, NULL),
(48, 'brachipnea (riduzione della frequenza respiratoria)', 1, 0, NULL),
(49, 'morte senza segni clinici', 1, 0, NULL),
(50, 'mortalità acuta', 1, 0, NULL),
(51, 'mortalità cronica', 1, 0, NULL),
(52, 'mortalità cumulativa', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `segniassenti`
--

CREATE TABLE `segniassenti` (
  `idSegno` int(11) NOT NULL,
  `idScheda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `segniassenti`
--

INSERT INTO `segniassenti` (`idSegno`, `idScheda`) VALUES
(1, 8),
(5, 8),
(6, 8),
(7, 8),
(26, 8),
(33, 8),
(37, 8),
(1, 9),
(5, 9),
(17, 9),
(32, 9),
(33, 9),
(51, 9);

-- --------------------------------------------------------

--
-- Struttura della tabella `segnipresenti`
--

CREATE TABLE `segnipresenti` (
  `idSegno` int(11) NOT NULL,
  `idScheda` int(11) NOT NULL,
  `percentuale` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `segnipresenti`
--

INSERT INTO `segnipresenti` (`idSegno`, `idScheda`, `percentuale`) VALUES
(8, 8, '100.00'),
(10, 8, '100.00'),
(17, 8, '50.00'),
(20, 8, '100.00'),
(27, 8, '100.00'),
(35, 8, '100.00'),
(43, 8, '100.00'),
(44, 8, '100.00'),
(51, 8, '100.00'),
(52, 8, '20.00'),
(8, 9, '100.00'),
(20, 9, '100.00'),
(27, 9, '100.00'),
(35, 9, '80.00'),
(37, 9, '70.00'),
(45, 9, '100.00'),
(47, 9, '100.00'),
(50, 9, '100.00'),
(52, 9, '90.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `specie`
--

CREATE TABLE `specie` (
  `specie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `specie`
--

INSERT INTO `specie` (`specie`) VALUES
('carpa');

-- --------------------------------------------------------

--
-- Struttura della tabella `statipatologici`
--

CREATE TABLE `statipatologici` (
  `idStatoPat` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `tipologia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `statipatologici`
--

INSERT INTO `statipatologici` (`idStatoPat`, `nome`, `tipologia`) VALUES
(1, 'VPC', 'infezione'),
(2, 'KSD', 'infezione'),
(3, 'Carp Pox', 'infezione'),
(4, 'KHVD', 'infezione'),
(5, 'M. colonnare', 'infezione'),
(6, 'Eritrodermatite', 'infezione'),
(7, 'SAM', 'infezione'),
(8, 'Saprolegniosi', 'infezione'),
(9, 'Branchiomicosi', 'infezione');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipieventi`
--

CREATE TABLE `tipieventi` (
  `nome` varchar(50) NOT NULL,
  `descrizione` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `tipiinterventi`
--

CREATE TABLE `tipiinterventi` (
  `idAzione` int(11) NOT NULL,
  `idStatoPat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `idUtente` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipoUtente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`idUtente`, `username`, `password`, `tipoUtente`) VALUES
(28, 'test', 'b16ed7d24b3ecbd4164dcdad374e08c0ab7518aa07f9d3683f34c2b3c67a15830268cb4a56c1ff6f54c8e54a795f5b87c08668b51f82d0093f7baee7d2981181', 'utente'),
(29, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'admin');

-- --------------------------------------------------------

--
-- Struttura della tabella `vasche`
--

CREATE TABLE `vasche` (
  `nome` varchar(50) NOT NULL,
  `numeroAnimali` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `azioni`
--
ALTER TABLE `azioni`
  ADD PRIMARY KEY (`idAzione`);

--
-- Indici per le tabelle `caratteristicheacqua`
--
ALTER TABLE `caratteristicheacqua`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `cause`
--
ALTER TABLE `cause`
  ADD PRIMARY KEY (`idStatoPat`,`idConclusione`),
  ADD KEY `idConclusione` (`idConclusione`);

--
-- Indici per le tabelle `conclusioni`
--
ALTER TABLE `conclusioni`
  ADD PRIMARY KEY (`idConclusione`),
  ADD KEY `idScheda` (`idScheda`);

--
-- Indici per le tabelle `condizionamenti`
--
ALTER TABLE `condizionamenti`
  ADD PRIMARY KEY (`idLuogo`,`idStatoPat`),
  ADD KEY `idStatoPat` (`idStatoPat`);

--
-- Indici per le tabelle `eventi`
--
ALTER TABLE `eventi`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `idScheda` (`idScheda`),
  ADD KEY `tipologia` (`tipologia`),
  ADD KEY `provenienza` (`provenienza`);

--
-- Indici per le tabelle `influenze`
--
ALTER TABLE `influenze`
  ADD PRIMARY KEY (`idRange`,`idStatoPat`),
  ADD KEY `idStatoPat` (`idStatoPat`);

--
-- Indici per le tabelle `luoghi`
--
ALTER TABLE `luoghi`
  ADD PRIMARY KEY (`idLuogo`);

--
-- Indici per le tabelle `misurazioni`
--
ALTER TABLE `misurazioni`
  ADD PRIMARY KEY (`idScheda`,`caratteristicaAcqua`),
  ADD KEY `caratteristicaAcqua` (`caratteristicaAcqua`);

--
-- Indici per le tabelle `pesi`
--
ALTER TABLE `pesi`
  ADD PRIMARY KEY (`nomeProbabilitaAssociata`);

--
-- Indici per le tabelle `presentazioni`
--
ALTER TABLE `presentazioni`
  ADD PRIMARY KEY (`idStatoPat`,`specie`,`idSegno`),
  ADD KEY `idSegno` (`idSegno`),
  ADD KEY `specie` (`specie`);

--
-- Indici per le tabelle `rangepatologie`
--
ALTER TABLE `rangepatologie`
  ADD PRIMARY KEY (`idRange`),
  ADD KEY `specie` (`specie`),
  ADD KEY `caratteristicaAcqua` (`caratteristicaAcqua`);

--
-- Indici per le tabelle `schedechiamate`
--
ALTER TABLE `schedechiamate`
  ADD PRIMARY KEY (`idScheda`),
  ADD KEY `specie` (`specie`),
  ADD KEY `vasca` (`vasca`),
  ADD KEY `origine` (`origine`),
  ADD KEY `fk_idUtente` (`idUtente`);

--
-- Indici per le tabelle `segni`
--
ALTER TABLE `segni`
  ADD PRIMARY KEY (`idSegno`);

--
-- Indici per le tabelle `segniassenti`
--
ALTER TABLE `segniassenti`
  ADD PRIMARY KEY (`idScheda`,`idSegno`),
  ADD KEY `idSegno` (`idSegno`);

--
-- Indici per le tabelle `segnipresenti`
--
ALTER TABLE `segnipresenti`
  ADD PRIMARY KEY (`idScheda`,`idSegno`),
  ADD KEY `idSegno` (`idSegno`);

--
-- Indici per le tabelle `specie`
--
ALTER TABLE `specie`
  ADD PRIMARY KEY (`specie`);

--
-- Indici per le tabelle `statipatologici`
--
ALTER TABLE `statipatologici`
  ADD PRIMARY KEY (`idStatoPat`);

--
-- Indici per le tabelle `tipieventi`
--
ALTER TABLE `tipieventi`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `tipiinterventi`
--
ALTER TABLE `tipiinterventi`
  ADD PRIMARY KEY (`idAzione`,`idStatoPat`),
  ADD KEY `idStatoPat` (`idStatoPat`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`idUtente`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indici per le tabelle `vasche`
--
ALTER TABLE `vasche`
  ADD PRIMARY KEY (`nome`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `azioni`
--
ALTER TABLE `azioni`
  MODIFY `idAzione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `conclusioni`
--
ALTER TABLE `conclusioni`
  MODIFY `idConclusione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `eventi`
--
ALTER TABLE `eventi`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `luoghi`
--
ALTER TABLE `luoghi`
  MODIFY `idLuogo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `rangepatologie`
--
ALTER TABLE `rangepatologie`
  MODIFY `idRange` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `schedechiamate`
--
ALTER TABLE `schedechiamate`
  MODIFY `idScheda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `segni`
--
ALTER TABLE `segni`
  MODIFY `idSegno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT per la tabella `statipatologici`
--
ALTER TABLE `statipatologici`
  MODIFY `idStatoPat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `idUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `cause`
--
ALTER TABLE `cause`
  ADD CONSTRAINT `cause_ibfk_1` FOREIGN KEY (`idStatoPat`) REFERENCES `statipatologici` (`idStatoPat`),
  ADD CONSTRAINT `cause_ibfk_2` FOREIGN KEY (`idConclusione`) REFERENCES `conclusioni` (`idConclusione`);

--
-- Limiti per la tabella `conclusioni`
--
ALTER TABLE `conclusioni`
  ADD CONSTRAINT `conclusioni_ibfk_1` FOREIGN KEY (`idScheda`) REFERENCES `schedechiamate` (`idScheda`);

--
-- Limiti per la tabella `condizionamenti`
--
ALTER TABLE `condizionamenti`
  ADD CONSTRAINT `condizionamenti_ibfk_1` FOREIGN KEY (`idLuogo`) REFERENCES `luoghi` (`idLuogo`),
  ADD CONSTRAINT `condizionamenti_ibfk_2` FOREIGN KEY (`idStatoPat`) REFERENCES `statipatologici` (`idStatoPat`);

--
-- Limiti per la tabella `eventi`
--
ALTER TABLE `eventi`
  ADD CONSTRAINT `eventi_ibfk_1` FOREIGN KEY (`idScheda`) REFERENCES `schedechiamate` (`idScheda`),
  ADD CONSTRAINT `eventi_ibfk_2` FOREIGN KEY (`provenienza`) REFERENCES `luoghi` (`idLuogo`),
  ADD CONSTRAINT `eventi_ibfk_3` FOREIGN KEY (`tipologia`) REFERENCES `tipieventi` (`nome`),
  ADD CONSTRAINT `eventi_ibfk_4` FOREIGN KEY (`idScheda`) REFERENCES `schedechiamate` (`idScheda`),
  ADD CONSTRAINT `eventi_ibfk_5` FOREIGN KEY (`tipologia`) REFERENCES `tipieventi` (`nome`),
  ADD CONSTRAINT `eventi_ibfk_6` FOREIGN KEY (`provenienza`) REFERENCES `luoghi` (`idLuogo`);

--
-- Limiti per la tabella `influenze`
--
ALTER TABLE `influenze`
  ADD CONSTRAINT `influenze_ibfk_1` FOREIGN KEY (`idRange`) REFERENCES `rangepatologie` (`idRange`),
  ADD CONSTRAINT `influenze_ibfk_2` FOREIGN KEY (`idStatoPat`) REFERENCES `statipatologici` (`idStatoPat`);

--
-- Limiti per la tabella `misurazioni`
--
ALTER TABLE `misurazioni`
  ADD CONSTRAINT `misurazioni_ibfk_1` FOREIGN KEY (`idScheda`) REFERENCES `schedechiamate` (`idScheda`),
  ADD CONSTRAINT `misurazioni_ibfk_2` FOREIGN KEY (`idScheda`) REFERENCES `schedechiamate` (`idScheda`),
  ADD CONSTRAINT `misurazioni_ibfk_3` FOREIGN KEY (`idScheda`) REFERENCES `schedechiamate` (`idScheda`),
  ADD CONSTRAINT `misurazioni_ibfk_4` FOREIGN KEY (`caratteristicaAcqua`) REFERENCES `caratteristicheacqua` (`nome`);

--
-- Limiti per la tabella `presentazioni`
--
ALTER TABLE `presentazioni`
  ADD CONSTRAINT `presentazioni_ibfk_1` FOREIGN KEY (`idSegno`) REFERENCES `segni` (`idSegno`),
  ADD CONSTRAINT `presentazioni_ibfk_2` FOREIGN KEY (`specie`) REFERENCES `specie` (`specie`),
  ADD CONSTRAINT `presentazioni_ibfk_3` FOREIGN KEY (`idStatoPat`) REFERENCES `statipatologici` (`idStatoPat`);

--
-- Limiti per la tabella `rangepatologie`
--
ALTER TABLE `rangepatologie`
  ADD CONSTRAINT `rangepatologie_ibfk_1` FOREIGN KEY (`specie`) REFERENCES `specie` (`specie`),
  ADD CONSTRAINT `rangepatologie_ibfk_2` FOREIGN KEY (`caratteristicaAcqua`) REFERENCES `caratteristicheacqua` (`nome`),
  ADD CONSTRAINT `rangepatologie_ibfk_3` FOREIGN KEY (`specie`) REFERENCES `specie` (`specie`),
  ADD CONSTRAINT `rangepatologie_ibfk_4` FOREIGN KEY (`caratteristicaAcqua`) REFERENCES `caratteristicheacqua` (`nome`);

--
-- Limiti per la tabella `schedechiamate`
--
ALTER TABLE `schedechiamate`
  ADD CONSTRAINT `fk_idUtente` FOREIGN KEY (`idUtente`) REFERENCES `utenti` (`idUtente`),
  ADD CONSTRAINT `schedechiamate_ibfk_1` FOREIGN KEY (`specie`) REFERENCES `specie` (`specie`),
  ADD CONSTRAINT `schedechiamate_ibfk_2` FOREIGN KEY (`vasca`) REFERENCES `vasche` (`nome`),
  ADD CONSTRAINT `schedechiamate_ibfk_3` FOREIGN KEY (`origine`) REFERENCES `luoghi` (`idLuogo`);

--
-- Limiti per la tabella `segniassenti`
--
ALTER TABLE `segniassenti`
  ADD CONSTRAINT `segniassenti_ibfk_1` FOREIGN KEY (`idSegno`) REFERENCES `segni` (`idSegno`),
  ADD CONSTRAINT `segniassenti_ibfk_2` FOREIGN KEY (`idScheda`) REFERENCES `schedechiamate` (`idScheda`),
  ADD CONSTRAINT `segniassenti_ibfk_3` FOREIGN KEY (`idSegno`) REFERENCES `segni` (`idSegno`),
  ADD CONSTRAINT `segniassenti_ibfk_4` FOREIGN KEY (`idScheda`) REFERENCES `schedechiamate` (`idScheda`);

--
-- Limiti per la tabella `segnipresenti`
--
ALTER TABLE `segnipresenti`
  ADD CONSTRAINT `segnipresenti_ibfk_1` FOREIGN KEY (`idSegno`) REFERENCES `segni` (`idSegno`),
  ADD CONSTRAINT `segnipresenti_ibfk_2` FOREIGN KEY (`idScheda`) REFERENCES `schedechiamate` (`idScheda`),
  ADD CONSTRAINT `segnipresenti_ibfk_3` FOREIGN KEY (`idSegno`) REFERENCES `segni` (`idSegno`),
  ADD CONSTRAINT `segnipresenti_ibfk_4` FOREIGN KEY (`idScheda`) REFERENCES `schedechiamate` (`idScheda`);

--
-- Limiti per la tabella `tipiinterventi`
--
ALTER TABLE `tipiinterventi`
  ADD CONSTRAINT `tipiinterventi_ibfk_1` FOREIGN KEY (`idAzione`) REFERENCES `azioni` (`idAzione`),
  ADD CONSTRAINT `tipiinterventi_ibfk_2` FOREIGN KEY (`idStatoPat`) REFERENCES `statipatologici` (`idStatoPat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
