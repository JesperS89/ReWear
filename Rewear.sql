-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:8889
-- Tid vid skapande: 16 jun 2023 kl 07:47
-- Serverversion: 5.7.39
-- PHP-version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `Rewear`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `brands`
--

CREATE TABLE `brands` (
  `id` int(12) NOT NULL,
  `brand` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `brands`
--

INSERT INTO `brands` (`id`, `brand`) VALUES
(1, 'H&M'),
(2, 'Uniqlo'),
(3, 'COS'),
(4, 'A days march'),
(5, 'Tommy Hilfiger'),
(6, 'Replay'),
(7, 'Björn Borg'),
(8, 'Calvin Klein'),
(9, 'Peak Performance'),
(10, 'Hugo Boss'),
(11, 'Nike'),
(12, 'Adidas');

-- --------------------------------------------------------

--
-- Tabellstruktur `categories`
--

CREATE TABLE `categories` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'T-shirt'),
(2, 'Sweatshirt'),
(3, 'Dress'),
(4, 'Shirt'),
(5, 'Jeans'),
(6, 'Shoe'),
(7, 'Jacket'),
(8, 'Skirt'),
(9, 'Hoodie'),
(10, 'Swim Trunks');

-- --------------------------------------------------------

--
-- Tabellstruktur `colors`
--

CREATE TABLE `colors` (
  `id` int(12) NOT NULL,
  `color` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `colors`
--

INSERT INTO `colors` (`id`, `color`) VALUES
(1, 'Black'),
(2, 'White'),
(3, 'Red'),
(4, 'Blue'),
(5, 'Green'),
(6, 'Grey'),
(7, 'Pink'),
(8, 'Darkblue');

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `id` int(12) NOT NULL,
  `seller_id` int(12) NOT NULL,
  `category_id` int(12) NOT NULL,
  `brand_id` int(12) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(12) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` int(12) NOT NULL,
  `added_date` datetime DEFAULT NULL,
  `sold_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`id`, `seller_id`, `category_id`, `brand_id`, `color_id`, `size_id`, `description`, `price`, `added_date`, `sold_date`) VALUES
(1, 1, 1, 3, 6, 3, 'Bra t-shirt', 79, '2023-05-02 00:00:00', '2023-05-30 00:00:00'),
(2, 1, 2, 5, 1, 3, 'Sparsamt använd', 799, '2023-05-30 00:00:00', '2023-06-01 00:00:00'),
(3, 2, 4, 6, 4, 3, 'Tvättad 3 gånger', 349, '2023-06-02 00:00:00', NULL),
(4, 3, 2, 7, 4, 3, '4 år gammal', 249, '2023-05-16 00:00:00', NULL),
(5, 3, 10, 7, 4, 3, 'Aldrig använda', 449, '2023-05-09 00:00:00', '2023-06-02 15:37:30'),
(7, 5, 7, 9, 3, 4, 'Jacka från 2018 som är i fint skick', 1699, '2023-06-05 10:16:36', '2023-06-14 10:16:50'),
(8, 5, 6, 11, 2, 4, 'Två år gamla skor, bra skick.', 199, '2023-06-14 09:13:10', NULL),
(9, 5, 6, 11, 2, 4, 'Två år gamla skor, bra skick.', 199, '2023-06-14 09:29:49', '2023-06-14 11:22:30'),
(10, 5, 6, 11, 2, 4, 'Två år gamla skor, bra skick.', 199, '2023-06-14 11:22:19', NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `sellers`
--

CREATE TABLE `sellers` (
  `id` int(12) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `sellers`
--

INSERT INTO `sellers` (`id`, `firstname`, `lastname`, `email`, `phone`) VALUES
(1, 'Annie', 'Lööf', 'annie@loof.se', '0703890918'),
(2, 'Jimmie', 'Åkesson', 'jimmie@akesson.se', '0703123457'),
(3, 'Stefan', 'Löfven', 'stefan@lofven.se', '0703123456'),
(4, 'Ulf', 'Kristersson', 'ulf@kristersson.se', '0703123456'),
(5, 'Nooshi', 'Dadgostar', 'nooshi@dadgostar.se', '0703123456'),
(6, 'Johan', 'Pehrsson', 'johan@pehrsson.se', '0703123456'),
(7, 'Per', 'Bolund', 'per@bolund.se', '0703123456');

-- --------------------------------------------------------

--
-- Tabellstruktur `sizes`
--

CREATE TABLE `sizes` (
  `id` int(12) NOT NULL,
  `size` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `sizes`
--

INSERT INTO `sizes` (`id`, `size`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `customer_id` (`seller_id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Index för tabell `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT för tabell `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT för tabell `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT för tabell `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
