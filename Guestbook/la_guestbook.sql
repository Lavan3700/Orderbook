-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: web11
-- Erstellungszeit: 24. Mai 2023 um 10:26
-- Server-Version: 8.0.33-0ubuntu0.20.04.2
-- PHP-Version: 7.4.3-4ubuntu2.18

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
  `menge` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `Post`
--

INSERT INTO `Post` (`id`, `datum`, `vorname`, `nachname`, `beschreibung`, `menge`) VALUES
(1, '2022-08-15', 'Andree', 'Vonderladen', 'Keine grosse Verpackund verwenden', 'Einzelbestellung'),
(2, '2022-08-21', 'Xavier', 'Snom', NULL, 'Einzelbestellung'),
(3, '2023-03-10', 'Patrick', 'Amen', 'Samstag nicht verfügbar', 'Mehrfachbestellung'),
(4, '2002-02-20', 'Fisch', 'Meyer', 'Hallo', 'Einzelbestellung'),
(5, '2002-02-20', 'Fisch', 'Xier', 'Hallo', 'Mehrfachbestellung'),
(104, '2003-03-20', 'FS', 'FS', 'haha', 'Einzelbestellung'),
(105, '2023-04-07', 'FS2', 'FS2', 'FS2', 'Mehrfachbestellung'),
(106, '2023-04-07', 'FS2', 'FS2', 'FS2', 'Mehrfachbestellung'),
(107, '2023-04-13', 'Lavan', 'sdas', 'ads', 'Einzelbestellung'),
(108, '2023-04-14', 'Fisch', '111', 'kpiko', 'Einzelbestellung'),
(109, '2023-04-13', 'Fisch', 'Meyer', '12', 'Einzelbestellung'),
(110, '2023-03-30', 'Fisch', 'Meyer', 'sefd', 'Einzelbestellung'),
(111, '2023-04-21', 'Amaru', 'Shane', 'dasds', 'Einzelbestellung'),
(112, '2023-04-21', 'Franz', 'Franz', 'sdad', 'Einzelbestellung'),
(113, '2023-05-05', 'Fisch', '111', 'fdffffff', 'Einzelbestellung'),
(114, '2023-05-11', 'Fisch', '111', 'hgj', 'Einzelbestellung'),
(115, '2023-05-03', 'sad', 'sdad', 'dsad', 'Einzelbestellung'),
(116, '2023-05-23', 'Test', 'Test', 'Test', 'Mehrfachbestellung'),
(117, '2023-05-30', 'ffssfdsf', 'sdfdsfds', 'sfsfsfd', 'Einzelbestellung'),
(118, '2023-05-27', 'dd', 'd', 'dd', 'Einzelbestellung'),
(119, '2023-05-25', 'Fisch', 'hjg', 'hgj', 'Einzelbestellung'),
(120, '2023-06-02', 'j', '111', 'j', 'Einzelbestellung');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `User`
--

CREATE TABLE `User` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwort` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `User`
--

INSERT INTO `User` (`id`, `username`, `passwort`) VALUES
(1, 'admin', 'admin'),
(2, 'lavan', 'lavan'),
(3, 'lavan', '1234'),
(4, 'felix', 'felix'),
(5, 'baum', 'baum'),
(6, 'hallo', 'hallo'),
(7, 'test', 'test'),
(9, 'fisch', 'fisch'),
(12, 'ig', 'ig'),
(14, 'sand', 'sand'),
(15, 'admin', 'admin1234'),
(16, 'Registrieren', 'Registrieren');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT für Tabelle `User`
--
ALTER TABLE `User`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
