-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 jan 2017 om 10:10
-- Serverversie: 5.6.26
-- PHP-versie: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bed_breakfast_alba`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `arrival` date NOT NULL,
  `departure` date NOT NULL,
  `room_id` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `address`, `arrival`, `departure`, `room_id`) VALUES
(1, 1, 'Sperwerhorst, 104', '2017-11-20', '2017-11-22', 1),
(2, 1, 'Ridderspoorlaan 34', '2017-12-20', '2017-12-22', 2),
(3, 1, 'Sperwerhorst, 104', '2018-11-22', '2018-12-22', 3),
(4, 2, 'Van Doornenplantsoen 11', '2017-03-12', '2017-03-13', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(255) NOT NULL,
  `room_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`) VALUES
(1, 'single'),
(2, 'double'),
(3, 'family'),
(6, 'Honeymoon'),
(7, 'Winter');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'janmoes', 'janmoes96@live.nl', '$2y$10$Pp60IF/cKAH9IT9Aa4aA9.gx0bKNLaJb0MWbEA1I8GaTx0HyNyKuK'),
(2, 'bakker', 'bakker@live.nl', '$2y$10$seN4I1fwdDyNexSqc.iMAuXaQ6WWyEzeFqblPsg8TGB4KVGncvArq');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
