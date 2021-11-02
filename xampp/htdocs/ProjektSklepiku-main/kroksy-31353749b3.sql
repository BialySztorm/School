-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: shareddb-x.hosting.stackcp.net
-- Czas generowania: 25 Paź 2020, 15:24
-- Wersja serwera: 10.4.14-MariaDB-log
-- Wersja PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kroksy-31353749b3`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Menu`
--

CREATE TABLE `Menu` (
  `ProduktID` int(11) NOT NULL,
  `nazwa` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `cena` double(11,2) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `Menu`
--

INSERT INTO `Menu` (`ProduktID`, `nazwa`, `cena`, `ilosc`) VALUES
(1, 'Kawa espresso', 2.50, 15),
(2, 'Kawa parzona', 1.50, 5),
(3, 'Kawa rozpuszczalna', 1.50, 20),
(4, 'Kawa zbożowa', 1.50, 25),
(5, 'Monte Diu', 15.00, 0),
(6, 'Cappucinno', 2.50, 30),
(7, 'Herbata', 1.50, 24),
(8, 'Herbata owocowa', 1.50, 24),
(9, 'Hot-Dog', 3.50, 13),
(10, 'Panini z szynką', 3.50, 12),
(11, 'Panini z kurczakiem', 4.00, 9),
(12, 'Duża bułka', 4.50, 12),
(13, 'Mała zwykła bułka', 3.80, 8),
(14, 'Mała ziarnista bułka', 3.80, 12),
(15, 'Mała pizza', 3.00, 6),
(16, 'Tartaletka', 3.50, 8),
(17, 'Sałatka', 5.00, 4),
(18, 'Kołaczyk', 3.00, 4),
(19, 'Jogurt', 2.00, 7),
(20, 'Owoce', 1.00, 26);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `login` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'admin', 'Local1234');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie`
--

CREATE TABLE `zamowienie` (
  `zamowienieID` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `orderString` text COLLATE utf8_unicode_ci NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `zamowienie`
--

INSERT INTO `zamowienie` (`zamowienieID`, `name`, `orderString`, `time`) VALUES
(1, 'Andrzej Manderla', '0x4;7x2;3x1;', '08:45:00'),
(5, 'Dawid Krok', '0x1;13x2;', '00:00:00'),
(8, 'Dawid Krok', '1x1;10x1;', '13:05:00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`ProduktID`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD PRIMARY KEY (`zamowienieID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Menu`
--
ALTER TABLE `Menu`
  MODIFY `ProduktID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `zamowienieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
