-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Maj 2021, 15:06
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
-- Baza danych: `baza1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dyspozytorzy`
--

CREATE TABLE `dyspozytorzy` (
  `dyspozytor_id` int(11) NOT NULL,
  `dyspozytor_imie` mediumtext NOT NULL,
  `dyspozytor_nazwisko` mediumtext NOT NULL,
  `dyspozytor_stanowisko` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `dyspozytorzy`
--

INSERT INTO `dyspozytorzy` (`dyspozytor_id`, `dyspozytor_imie`, `dyspozytor_nazwisko`, `dyspozytor_stanowisko`) VALUES
(3, 'Zbigniew', 'Łonda', 'C'),
(4, 'Józef', 'Staniak', 'D'),
(5, 'Arkadiusz', 'Łęcki', 'A');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ratownicy`
--

CREATE TABLE `ratownicy` (
  `ratownik_id` int(11) NOT NULL,
  `ratownik_imie` mediumtext NOT NULL,
  `ratownik_nazwisko` mediumtext NOT NULL,
  `ratownik_zespol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ratownicy`
--

INSERT INTO `ratownicy` (`ratownik_id`, `ratownik_imie`, `ratownik_nazwisko`, `ratownik_zespol`) VALUES
(2, 'Andrzej', 'Morsztyn', 1),
(3, 'Olgierd', 'Cichy', 1),
(4, 'Zuzanna', 'Olszewska', 2),
(5, 'Jacek', 'Sikora', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zespoly`
--

CREATE TABLE `zespoly` (
  `zespol_ID` int(11) NOT NULL,
  `zespol_nazwa` mediumtext NOT NULL,
  `zespol_lekarz` mediumtext NOT NULL,
  `zespol_logo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zespoly`
--

INSERT INTO `zespoly` (`zespol_ID`, `zespol_nazwa`, `zespol_lekarz`, `zespol_logo`) VALUES
(1, 'Zespół I', 'Adam Nawałowicz', 'grafika/ZespolI.png'),
(2, 'Zespół II', 'Monika Jędryśko', 'grafika/ZespolII.png'),
(3, 'Zespół III', 'Józef Morycz', 'grafika/ZespolIII.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenia`
--

CREATE TABLE `zgloszenia` (
  `zgloszenie_id` int(11) NOT NULL,
  `zgloszenie_opis` longtext NOT NULL,
  `zgloszenie_data` date NOT NULL,
  `zgloszenie_zespol` int(11) NOT NULL,
  `zgloszenie_dyspozytor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zgloszenia`
--

INSERT INTO `zgloszenia` (`zgloszenie_id`, `zgloszenie_opis`, `zgloszenie_data`, `zgloszenie_zespol`, `zgloszenie_dyspozytor`) VALUES
(8, 'Zawał mięśnia sercowego', '2021-05-17', 2, 4),
(9, 'Wypadek samochodowy, 2 rannych', '2021-05-17', 1, 3),
(10, 'Ból brzucha', '2021-05-18', 3, 4);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dyspozytorzy`
--
ALTER TABLE `dyspozytorzy`
  ADD PRIMARY KEY (`dyspozytor_id`);

--
-- Indeksy dla tabeli `ratownicy`
--
ALTER TABLE `ratownicy`
  ADD PRIMARY KEY (`ratownik_id`);

--
-- Indeksy dla tabeli `zespoly`
--
ALTER TABLE `zespoly`
  ADD PRIMARY KEY (`zespol_ID`);

--
-- Indeksy dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD PRIMARY KEY (`zgloszenie_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dyspozytorzy`
--
ALTER TABLE `dyspozytorzy`
  MODIFY `dyspozytor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `ratownicy`
--
ALTER TABLE `ratownicy`
  MODIFY `ratownik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `zespoly`
--
ALTER TABLE `zespoly`
  MODIFY `zespol_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  MODIFY `zgloszenie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
