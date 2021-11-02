-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Maj 2021, 19:36
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
-- Struktura tabeli dla tabeli `lyzwiarze`
--

CREATE TABLE `lyzwiarze` (
  `ID` int(11) NOT NULL,
  `Imie` mediumtext NOT NULL,
  `Nazwisko` mediumtext NOT NULL,
  `Kraj` mediumtext NOT NULL,
  `PersonalBest` float NOT NULL,
  `Trener` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `lyzwiarze`
--

INSERT INTO `lyzwiarze` (`ID`, `Imie`, `Nazwisko`, `Kraj`, `PersonalBest`, `Trener`) VALUES
(1, 'Yuzuru', 'Hanyu', 'Japonia', 322.59, 'Brian Orser'),
(2, 'Nathan', 'Chen', 'USA', 335.3, 'Rafael Arutiunian');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawody`
--

CREATE TABLE `zawody` (
  `ID` int(11) NOT NULL,
  `Kategoria` mediumtext NOT NULL,
  `ID_lyzwiarza` int(11) NOT NULL,
  `Punkty_Short` float NOT NULL,
  `Punkty_Free` float NOT NULL,
  `Punkty_All` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zawody`
--

INSERT INTO `zawody` (`ID`, `Kategoria`, `ID_lyzwiarza`, `Punkty_Short`, `Punkty_Free`, `Punkty_All`) VALUES
(1, 'Men', 1, 102.21, 204.64, 306.85),
(2, 'Men', 2, 102.32, 198.6, 300.92);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `lyzwiarze`
--
ALTER TABLE `lyzwiarze`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `zawody`
--
ALTER TABLE `zawody`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `lyzwiarze`
--
ALTER TABLE `lyzwiarze`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zawody`
--
ALTER TABLE `zawody`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
