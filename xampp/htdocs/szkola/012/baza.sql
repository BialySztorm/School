-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Kwi 2021, 14:13
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
-- Baza danych: `baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id_pracownika` int(11) NOT NULL,
  `imie` mediumtext NOT NULL,
  `nazwisko` mediumtext NOT NULL,
  `stanowisko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id_pracownika`, `imie`, `nazwisko`, `stanowisko`) VALUES
(22, 'Andrzej', 'Manderla', 1),
(26, 'Bialy', 'Sztorm', 1),
(28, 'Józef', 'Z bagien', 3),
(29, 'Dariusz', 'Incognito', 1),
(31, 'Janusz', 'Kolanko', 1),
(32, 'Klaudia', 'Machoń', 2),
(33, 'Marcelinia', 'Moniek', 3),
(35, 'Krzysztof', 'Hardline', 2),
(40, 'Mariusz', 'Stonoga', 1),
(41, 'Bogdan', 'Miedota', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stanowiska`
--

CREATE TABLE `stanowiska` (
  `id_stanowiska` int(11) NOT NULL,
  `nazwa_stanowiska` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `stanowiska`
--

INSERT INTO `stanowiska` (`id_stanowiska`, `nazwa_stanowiska`) VALUES
(1, 'elektryk'),
(2, 'informatyk'),
(3, 'księgowy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ure`
--

CREATE TABLE `ure` (
  `id_pracownika` int(11) NOT NULL,
  `data_uprawnien` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ure`
--

INSERT INTO `ure` (`id_pracownika`, `data_uprawnien`) VALUES
(22, '2021-04-27'),
(26, '2021-04-23'),
(29, '2021-04-19'),
(31, '2021-05-31'),
(40, '2021-03-25');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownika`);

--
-- Indeksy dla tabeli `stanowiska`
--
ALTER TABLE `stanowiska`
  ADD PRIMARY KEY (`id_stanowiska`);

--
-- Indeksy dla tabeli `ure`
--
ALTER TABLE `ure`
  ADD PRIMARY KEY (`id_pracownika`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id_pracownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT dla tabeli `stanowiska`
--
ALTER TABLE `stanowiska`
  MODIFY `id_stanowiska` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
