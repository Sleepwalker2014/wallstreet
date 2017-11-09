-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 09. Nov 2017 um 16:04
-- Server Version: 5.5.58-0+deb8u1
-- PHP-Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `wallstreet`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
    `order` int(11) NOT NULL,
    `limit` float unsigned NOT NULL,
    `type` enum('bid','ask','','') NOT NULL,
    `share` int(11) NOT NULL,
    `amount` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`order`, `limit`, `type`, `share`, `amount`) VALUES
    (4, 10.3, 'ask', 1, 20),
    (5, 7, 'bid', 1, 20),
    (6, 5, 'ask', 1, 15),
    (7, 5, 'ask', 1, 15),
    (8, 100, 'bid', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shares`
--

CREATE TABLE IF NOT EXISTS `shares` (
    `share` int(11) NOT NULL,
    `course` float unsigned NOT NULL,
    `name` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `shares`
--

INSERT INTO `shares` (`share`, `course`, `name`) VALUES
    (1, 3.56, 'DAX');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
    ADD PRIMARY KEY (`order`), ADD KEY `type` (`type`), ADD KEY `share` (`share`);

--
-- Indizes für die Tabelle `shares`
--
ALTER TABLE `shares`
    ADD PRIMARY KEY (`share`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
    MODIFY `order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `shares`
--
ALTER TABLE `shares`
    MODIFY `share` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `orders`
--
ALTER TABLE `orders`
    ADD CONSTRAINT `fk_shares` FOREIGN KEY (`share`) REFERENCES `shares` (`share`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
