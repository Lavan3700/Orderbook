-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: web11
-- Erstellungszeit: 06. Sep 2023 um 15:03
-- Server-Version: 8.0.34-0ubuntu0.20.04.1
-- PHP-Version: 7.4.3-4ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `la_guestbook`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Post`
--

CREATE TABLE `Post` (
  `id` int NOT NULL,
  `datum` date NOT NULL,
  `vorname` varchar(20) NOT NULL,
  `nachname` varchar(20) NOT NULL,
  `beschreibung` varchar(999) DEFAULT NULL,
  `menge` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `Post`
--

INSERT INTO `Post` (`id`, `datum`, `vorname`, `nachname`, `beschreibung`, `menge`, `user_id`) VALUES
(136, '2023-08-14', 'Hana', 'Hans', 'hans2', 'Einzelbestellung', 1),
(137, '2023-08-14', 'Hana', 'Hans', 'Hana', 'Mehrfachbestellung', 1),
(145, '2023-08-30', 'Hana', 'Hans', 'textcox.cd', 'Einzelbestellung', 1),
(146, '2023-09-06', 'Hana', 'Hans', 'dsdas2', 'Einzelbestellung', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `User`
--

CREATE TABLE `User` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwort` varchar(50) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `User`
--

INSERT INTO `User` (`id`, `username`, `passwort`, `firstname`, `lastname`) VALUES
(1, 'admin', 'admin', 'Hana', 'Felix');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Post`
--
ALTER TABLE `Post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT für Tabelle `User`
--
ALTER TABLE `User`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
