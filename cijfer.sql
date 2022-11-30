-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 nov 2022 om 13:46
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cijfersysteem`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cijfer`
--

CREATE TABLE `cijfer` (
  `id` int(9) NOT NULL,
  `leerling` varchar(255) NOT NULL,
  `vak` varchar(255) NOT NULL,
  `cijfer` float(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `cijfer`
--

INSERT INTO `cijfer` (`id`, `leerling`, `vak`, `cijfer`) VALUES
(1, 'dawad', 'awd', 7.0),
(2, 'dwad', 'thgh', 2.0),
(3, 'hjhgjmgh', 'dfsvxd', 9.0),
(4, 'hgnhgjn', 'hjgj,m,mkm', 9.2);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cijfer`
--
ALTER TABLE `cijfer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cijfer`
--
ALTER TABLE `cijfer`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
