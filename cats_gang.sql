-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Lip 2023, 04:39
-- Wersja serwera: 10.4.13-MariaDB
-- Wersja PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cats_gang`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `polubienia`
--

CREATE TABLE `polubienia` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUzytkownika` int(10) UNSIGNED NOT NULL,
  `idPostu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `polubienia`
--

INSERT INTO `polubienia` (`id`, `idUzytkownika`, `idPostu`) VALUES
(38, 46, 1),
(43, 43, 2),
(45, 46, 2),
(47, 49, 1),
(48, 49, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posty`
--

CREATE TABLE `posty` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUzytkownika` int(10) UNSIGNED NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `obrazek` text COLLATE utf8_polish_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `posty`
--

INSERT INTO `posty` (`id`, `idUzytkownika`, `tresc`, `obrazek`, `data`) VALUES
(1, 46, 'Świetny dzień, zarobiłem dziś 5200 CatCoins!', '', '2023-07-06 19:46:55'),
(2, 44, 'Kolejny ciężki dzień w pracy.', 'maciek.png', '2023-07-05 19:47:13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sludzy`
--

CREATE TABLE `sludzy` (
  `id` int(10) UNSIGNED NOT NULL,
  `imie` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `wyglad` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `idWlasciciela` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `sludzy`
--

INSERT INTO `sludzy` (`id`, `imie`, `opis`, `cena`, `wyglad`, `idWlasciciela`) VALUES
(1, 'Ben', 'Nie daj się zwieść wyglądowi. Ben to człowiek o złotym sercu.', 900, 'obrazy/sludzy/2.png', 0),
(2, 'Will', 'Może nie jest umięśniony, ale za to jest niezwykle inteligenty.', 1200, 'obrazy/sludzy/1.png', 0),
(3, 'Bob', 'Po prostu Bob. Pochodzi z północnej Afryki.', 850, 'obrazy/sludzy/3.png', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `gang` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `wyglad` varchar(50) COLLATE utf8_polish_ci NOT NULL DEFAULT 'rudy1.png',
  `rola` varchar(50) COLLATE utf8_polish_ci NOT NULL DEFAULT 'user',
  `coins` int(11) NOT NULL DEFAULT 2000
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `gang`, `wyglad`, `rola`, `coins`) VALUES
(43, 'Paulina123', '202cb962ac59075b964b07152d234b70', 'mafia', 'rudy1.png', 'user', 2008),
(44, 'Maciek', '202cb962ac59075b964b07152d234b70', 'dachowce', 'bury1.png', 'user', 2000),
(45, 'Gangsta123', '207023ccb44feb4d7dadca005ce29a64', 'mafia', 'kolorowy1.png', 'user', 2000),
(46, 'MatiPL', '202cb962ac59075b964b07152d234b70', 'dachowce', 'czarny1.png', 'user', 1150),
(47, '123', '202cb962ac59075b964b07152d234b70', 'mafia', 'czarny1.png', 'user', 3004),
(48, 'Tester', '202cb962ac59075b964b07152d234b70', 'dachowce', 'kolorowy1.png', 'user', 2000),
(49, 'Tester2', '207023ccb44feb4d7dadca005ce29a64', 'dachowce', 'rudy1.png', 'user', 1163);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `polubienia`
--
ALTER TABLE `polubienia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUzytkownika` (`idUzytkownika`),
  ADD KEY `idPostu` (`idPostu`);

--
-- Indeksy dla tabeli `posty`
--
ALTER TABLE `posty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUzytkownika` (`idUzytkownika`);

--
-- Indeksy dla tabeli `sludzy`
--
ALTER TABLE `sludzy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idWlasciciela` (`idWlasciciela`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `polubienia`
--
ALTER TABLE `polubienia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT dla tabeli `posty`
--
ALTER TABLE `posty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `sludzy`
--
ALTER TABLE `sludzy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `polubienia`
--
ALTER TABLE `polubienia`
  ADD CONSTRAINT `polubienia_ibfk_1` FOREIGN KEY (`idPostu`) REFERENCES `posty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `polubienia_ibfk_2` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `posty`
--
ALTER TABLE `posty`
  ADD CONSTRAINT `posty_ibfk_1` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
