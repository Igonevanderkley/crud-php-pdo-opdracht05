-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 09 mrt 2023 om 17:17
-- Serverversie: 5.7.36
-- PHP-versie: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Basicfit`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Inschrijving`
--

DROP TABLE IF EXISTS `Inschrijving`;
CREATE TABLE IF NOT EXISTS `Inschrijving` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Homeclub` varchar(50) NOT NULL,
  `Lidmaatschap` varchar(20) NOT NULL,
  `Looptijd` varchar(30) NOT NULL,
  `Extra` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Verzendtijd` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Vestiging`
--

DROP TABLE IF EXISTS `Vestiging`;
CREATE TABLE IF NOT EXISTS `Vestiging` (
  `Straatnaam` varchar(200) NOT NULL,
  `Huisnummer` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
