-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Lis 2020, 10:47
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.9

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
-- Struktura tabeli dla tabeli `dane_osobowe`
--

CREATE TABLE `dane_osobowe` (
  `ID` int(11) NOT NULL,
  `Imie` mediumtext NOT NULL,
  `Nazwisko` mediumtext NOT NULL,
  `Ulica` mediumtext NOT NULL,
  `Numer_domu` text NOT NULL,
  `Numer_mieszkania` text NOT NULL,
  `Miasto_zamieszkania` mediumtext NOT NULL,
  `Data_urodzenia` date NOT NULL,
  `Miasto_urodzenia` mediumtext NOT NULL,
  `Wojewodztwo_urodzenia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `dane_osobowe`
--

INSERT INTO `dane_osobowe` (`ID`, `Imie`, `Nazwisko`, `Ulica`, `Numer_domu`, `Numer_mieszkania`, `Miasto_zamieszkania`, `Data_urodzenia`, `Miasto_urodzenia`, `Wojewodztwo_urodzenia`) VALUES
(18, 'Klaudia', 'Musk', 'Highway', '66', '6', 'Las Vegas', '1999-12-11', 'Los Angeles', 0),
(20, 'Lucifer', 'MorningStar', 'Makuszyńskiego', '666', '1', 'Kołobrzeg', '1989-06-16', 'Jastrzębie-Zdrój', 11),
(49, 'Andrzej', 'Manderla', 'Wyszyńskiego', '45', '6', 'Warszawa', '2002-03-20', 'Wodzisław Śląski', 12),
(50, 'Andrzej', 'Manderla', 'Wyszyńskiego', '45', '6', 'Warszawa', '2002-03-20', 'Wodzisław Śląski', 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wojewodztwa`
--

CREATE TABLE `wojewodztwa` (
  `ID_woj` int(11) NOT NULL,
  `Nazwa_wojewodztwa` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wojewodztwa`
--

INSERT INTO `wojewodztwa` (`ID_woj`, `Nazwa_wojewodztwa`) VALUES
(1, 'Dolnośląskie'),
(2, 'Kujawsko-pomorskie'),
(3, 'Lubelskie'),
(4, 'Lubuskie'),
(5, 'Łódzkie'),
(6, 'Małopolskie'),
(7, 'Mazowieckie'),
(8, 'Opolskie'),
(9, 'Podkarpackie'),
(10, 'Podlaskie'),
(11, 'Pomorskie'),
(12, 'Śląskie'),
(13, 'Świętokrzyskie'),
(14, 'Warmińsko-mazurskie'),
(15, 'Wielkopolskie'),
(16, 'Zachodniopomorskie');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane_osobowe`
--
ALTER TABLE `dane_osobowe`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `wojewodztwa`
--
ALTER TABLE `wojewodztwa`
  ADD PRIMARY KEY (`ID_woj`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `dane_osobowe`
--
ALTER TABLE `dane_osobowe`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT dla tabeli `wojewodztwa`
--
ALTER TABLE `wojewodztwa`
  MODIFY `ID_woj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
