-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Gru 2020, 23:27
-- Wersja serwera: 10.4.16-MariaDB
-- Wersja PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `language`
--

CREATE TABLE `language` (
  `ID_Language` int(11) NOT NULL,
  `Language` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `language`
--

INSERT INTO `language` (`ID_Language`, `Language`) VALUES
(1, 'brak'),
(2, 'C++'),
(3, 'C#'),
(4, 'Python'),
(5, 'Java');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `silnikigier`
--

CREATE TABLE `silnikigier` (
  `ID` int(11) NOT NULL,
  `Firma` mediumtext NOT NULL,
  `Silnik` mediumtext NOT NULL,
  `ID_Language` int(11) NOT NULL,
  `VisualScripting` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `silnikigier`
--

INSERT INTO `silnikigier` (`ID`, `Firma`, `Silnik`, `ID_Language`, `VisualScripting`) VALUES
(1, 'CDProjectRed', 'RedEngine', 2, 'brak'),
(6, 'TheFarm51', 'UnrealEngine4', 2, 'Blueprints'),
(7, 'renpy', 'Ren\'Py', 4, 'PyGame'),
(8, 'Devolver Digital', 'Unity', 3, 'Bolt'),
(9, 'Crytek', 'CryEngine', 2, 'brak');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`ID_Language`);

--
-- Indeksy dla tabeli `silnikigier`
--
ALTER TABLE `silnikigier`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `language`
--
ALTER TABLE `language`
  MODIFY `ID_Language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `silnikigier`
--
ALTER TABLE `silnikigier`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
