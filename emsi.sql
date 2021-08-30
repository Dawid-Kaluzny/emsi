-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Sie 2021, 13:41
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `emsi`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `delegations`
--

CREATE TABLE `delegations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `place_departure` varchar(50) NOT NULL,
  `place_arrival` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `delegations`
--

INSERT INTO `delegations` (`id`, `user_id`, `date_from`, `date_to`, `place_departure`, `place_arrival`) VALUES
(1, 1, '2001-08-01', '2001-08-31', 'Gdańsk', 'Poznań'),
(2, 2, '1993-09-01', '1993-10-03', 'Lincoln', 'Mogadisz'),
(3, 3, '1874-03-24', '1926-10-31', 'Budapeszt', 'Detroit'),
(4, 4, '1926-09-04', '2002-12-02', 'Wiedeń', 'Brema'),
(5, 5, '1921-11-06', '1977-05-09', 'Robinson', 'Southampton'),
(6, 1, '1928-02-09', '2010-05-10', 'Brooklyn', 'Fort Myers');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`) VALUES
(1, 'Frank', 'Frazetta'),
(2, 'Gary', 'Gordon'),
(3, 'Harry', 'Houdini'),
(4, 'Ivan', 'Illich'),
(5, 'James', 'Jones');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `delegations`
--
ALTER TABLE `delegations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `delegations`
--
ALTER TABLE `delegations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
