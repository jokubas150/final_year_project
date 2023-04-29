-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 03:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fetch_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_review`
--

CREATE TABLE `car_review` (
  `rId` int(11) NOT NULL,
  `review` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `member_review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_review`
--

INSERT INTO `car_review` (`rId`, `review`, `vehicle_id`, `member_review_id`) VALUES
(25, 'Review From website', 38, 13),
(26, 'Brilliant car', 26, 13),
(28, 'Nice car', 26, 13),
(29, 'Brilliant car', 26, 13),
(33, 'Lovely Car', 26, 15);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `DVLA_code` varchar(20) DEFAULT NULL,
  `member_type` varchar(6) DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `DVLA_code`, `member_type`) VALUES
(13, 'Jokubas', 'Example', 'example@gmail.com', '$2y$10$Gygpr.VI2rYBgbP190v8iOvvNQ2jCsZQUZq8qVF7qXFMqxaL9mLN2', '52050560', '1234', 'member'),
(14, 'Jokubas', 'Bucas', 'jb1732q@gre.ac.uk', '$2y$10$hzXRhTDZsCjYqX0nCH51PuPB2h6x4yzVjzWHnyt55JyqKqjSPgVVe', '07845165181', '12', 'admin'),
(15, 'Jokubas', 'Test', 'jokubas150@gmail.com', '$2y$10$NrVlgCZOh5eZcD/A/D7Vvucl0zu2cCQkYhCaYhTuWa9hYdf9kMVqa', '52050560', '11111111', 'member'),
(18, 'Jokubas', 'Test', '23232@gmail.com', '$2y$10$KQ.9tdhgeM90geYMMB7zrefAPvUtaEh4wArCZhM0/1c7YgssVewTS', '123123123', '123', 'member'),
(20, 'Jokubas', 'Bucas', 'testing@gre.ac.uk', '$2y$10$/z4Qa1CvXig/e8NQAwDrU.BA99JU3l3NrRUK3wS2NVHXfx1HEF/2u', '44489494651', 'DVLA', 'member'),
(21, 'Jokubas', 'Bucas', 'test@gre.ac.uk', '$2y$10$wrgc48/dJudy3xKkI3O1ROb.8OT4iKFOzJ04XqyLkzaYfWbodwvHq', '44489494651', 'DVLA', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `reset_id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reset_password`
--

INSERT INTO `reset_password` (`reset_id`, `email`, `code`) VALUES
(1, 'example@gmail.com', 'tOjW'),
(2, 'jb1732q@gre.ac.uk', 'AAIy');

-- --------------------------------------------------------

--
-- Table structure for table `route_comments`
--

CREATE TABLE `route_comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  `rout_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route_comments`
--

INSERT INTO `route_comments` (`comment_id`, `comment`, `member_id`, `rout_id`) VALUES
(12, 'Comment', 13, 7);

-- --------------------------------------------------------

--
-- Table structure for table `route_posts`
--

CREATE TABLE `route_posts` (
  `post_id` int(11) NOT NULL,
  `going_from` varchar(255) NOT NULL,
  `going_to` varchar(255) NOT NULL,
  `post_message` varchar(255) NOT NULL,
  `date_posted` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route_posts`
--

INSERT INTO `route_posts` (`post_id`, `going_from`, `going_to`, `post_message`, `date_posted`, `image`, `member_id`) VALUES
(7, 'Tottenham Hotspur Stadium', 'Kensington Palace', 'Going home after the match. Anyone wants to join for this route?', '2023-04-17 14:37:52', 'images/OtgtckBg/google-route.png', 14),
(10, 'Walmthamstow Bus Station', 'Manchester', 'Someone would like to join?', '2023-04-22 14:24:12', 'images/SOwxM5LO/google-route2.jpg', 13);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `tId` int(11) NOT NULL,
  `order_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `car_date` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `car_time` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`tId`, `order_number`, `created`, `car_date`, `car_time`, `vehicle_id`, `member_id`) VALUES
(10, '#Audi9BjliUgWtd', '2023-04-11 18:00:05', '2023-02-23', '16:59', 20, 13),
(11, '#AudiiqUkFZNHWu', '2023-04-12 15:34:13', '23123-03-12', '12:03', 20, 13),
(12, '#KiajeB0JOHPmb', '2023-04-17 19:07:38', '2023-04-24', '23:30', 33, 13);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vId` int(11) NOT NULL,
  `model` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `engine_size` varchar(20) NOT NULL,
  `fuel_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `year` varchar(4) NOT NULL,
  `transmission` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `keyless` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `doors` varchar(10) NOT NULL,
  `price_min` varchar(10) NOT NULL,
  `price_h` varchar(10) NOT NULL,
  `price_day` varchar(10) NOT NULL,
  `price_mile` varchar(10) NOT NULL,
  `vehicle_location` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `vehicle_make_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vId`, `model`, `engine_size`, `fuel_type`, `year`, `transmission`, `keyless`, `doors`, `price_min`, `price_h`, `price_day`, `price_mile`, `vehicle_location`, `image`, `vehicle_type_id`, `vehicle_make_id`, `member_id`) VALUES
(20, 'A3', '1200', 'Petrol', '2020', 'Automatic', 'Yes', '3', '0.12', '3.90', '60', '0.14', 'London Old Royal Naval College SE10 9LS', 'images/Vb1SJWqW/audi-a6.jpg', 3, 8, 13),
(24, 'Ionic', '1200', 'Electric', '2019', 'Automatic', 'Yes', '5', '3', '23', '50', '0.95', 'London Old Royal Naval College SE10 9LS', 'images/FzhwrlWd/kiagreen.jpg', 4, 63, 13),
(26, '500e', '1000', 'Electric', '2022', 'Automatic', 'Yes', '3', '0.60', '6.30', '70', '0.70', 'London Old Royal Naval College SE10 9LS', 'images/fbHG9WG8/fiat500e.jpg', 3, 51, 14),
(27, 'iX', '76', 'Electric', '2023', 'Automatic', 'Yes', '5', '0.60', '7.1', '85', '0.60', 'London Old Royal Naval College SE10 9LS', 'images/SwPSUn5v/bmw-ix.jpg', 4, 10, 14),
(31, '2', '76', 'Electric', '2023', 'Automatic', 'Yes', '5', '0.90', '0.95', '120', '0.95', 'London Old Royal Naval College SE10 9LS', 'images/UMtPrk6a/polestar2.jpg', 1, 90, 14),
(33, 'EV6', '76', 'Electric', '2023', 'Automatic', 'Yes', '5', '0.90', '9.00', '120', '0.23', 'London Old Royal Naval College SE10 9LS', 'images/MAfyykvk/kia-ev6.jpg', 3, 63, 14),
(38, '330i', '3000', 'Petrol', '2023', 'Automatic', 'Yes', '1.25', '1.20', '9.60', '140', '1.20', 'London Old Royal Naval College SE10 9LS', 'images/mD6nuIbk/bmw330.jpg', 2, 10, 14),
(40, 'A6 Avant', '2000', 'Diesel', '2023', 'Automatic', 'Partially', '5', '0.80', '8.00', '90', '0.89', 'London Old Royal Naval College SE10 9LS', 'images/WaqXBq8y/audi-a6.jpg', 2, 8, 14);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_make`
--

CREATE TABLE `vehicle_make` (
  `id` int(11) NOT NULL,
  `make` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_make`
--

INSERT INTO `vehicle_make` (`id`, `make`) VALUES
(1, 'Abarth'),
(2, 'AC'),
(3, 'Aixam'),
(4, 'Alfa Romeo'),
(5, 'Alpine'),
(6, 'Ariel'),
(7, 'Aston Martin'),
(8, 'Audi'),
(9, 'Austin'),
(10, 'BMW'),
(11, 'Bentley'),
(12, 'Bowler'),
(13, 'Bugatti'),
(14, 'CUPRA'),
(15, 'Cadillac'),
(16, 'Caterham'),
(17, 'Chevrolet'),
(18, 'Chrysler'),
(40, 'Citroen'),
(41, 'Corvette'),
(42, 'DFSK'),
(43, 'DS AUTOMOBILES'),
(44, 'Dacia'),
(45, 'Daewoo'),
(46, 'Daihatsu'),
(47, 'Daimler'),
(48, 'Datsun'),
(49, 'Dodge'),
(50, 'Ferrari'),
(51, 'Fiat'),
(52, 'Ford'),
(53, 'GMC'),
(54, 'Honda'),
(55, 'Hummer'),
(56, 'Hyundai'),
(57, 'Infiniti'),
(58, 'Isuzu'),
(59, 'Iveco'),
(60, 'Jaguar'),
(61, 'Jeep'),
(62, 'Jensen'),
(63, 'Kia'),
(64, 'LEVC'),
(65, 'Lamborghini'),
(66, 'Lancia'),
(67, 'Land Rover'),
(68, 'Lexus'),
(69, 'Lincoln'),
(70, 'Lotus'),
(71, 'MG'),
(72, 'MINI'),
(73, 'MOKE'),
(74, 'Maserati'),
(75, 'Maybach'),
(76, 'Mazda'),
(77, 'McLaren'),
(78, 'Mercedes-Benz'),
(79, 'Microcar'),
(80, 'Mitsubishi'),
(81, 'Morgan'),
(82, 'Morris'),
(83, 'Nissan'),
(84, 'Noble'),
(85, 'Opel'),
(86, 'Panther'),
(87, 'Perodua'),
(88, 'Peugeot'),
(89, 'Polaris'),
(90, 'Polestar'),
(91, 'Pontiac'),
(92, 'Porsche'),
(93, 'Proton'),
(94, 'Renault'),
(95, 'Rolls-Royce'),
(96, 'Rover'),
(97, 'SEAT'),
(98, 'SKODA'),
(99, 'Saab'),
(100, 'Smart'),
(101, 'SsangYong'),
(102, 'Subaru'),
(103, 'Suzuki'),
(104, 'Tesla'),
(105, 'Toyota'),
(140, 'Vauxhall'),
(141, 'Volkswagen'),
(142, 'Volvo'),
(143, 'Yamaha');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`type_id`, `type`) VALUES
(1, 'Sedan'),
(2, 'Station Wagon'),
(3, 'Hatchback'),
(4, 'SUV'),
(5, 'Minivan'),
(6, 'Van');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_review`
--
ALTER TABLE `car_review`
  ADD PRIMARY KEY (`rId`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `member_id` (`member_review_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `route_comments`
--
ALTER TABLE `route_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `rout_id` (`rout_id`);

--
-- Indexes for table `route_posts`
--
ALTER TABLE `route_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tId`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vId`),
  ADD KEY `vehicle_make_id` (`vehicle_make_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `vehicle_type_id` (`vehicle_type_id`);

--
-- Indexes for table `vehicle_make`
--
ALTER TABLE `vehicle_make`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_review`
--
ALTER TABLE `car_review`
  MODIFY `rId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `route_comments`
--
ALTER TABLE `route_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `route_posts`
--
ALTER TABLE `route_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `vehicle_make`
--
ALTER TABLE `vehicle_make`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_review`
--
ALTER TABLE `car_review`
  ADD CONSTRAINT `car_review_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vId`) ON DELETE CASCADE,
  ADD CONSTRAINT `car_review_ibfk_2` FOREIGN KEY (`member_review_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `route_comments`
--
ALTER TABLE `route_comments`
  ADD CONSTRAINT `route_comments_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `route_comments_ibfk_2` FOREIGN KEY (`rout_id`) REFERENCES `route_posts` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `route_posts`
--
ALTER TABLE `route_posts`
  ADD CONSTRAINT `route_posts_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vId`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`vehicle_make_id`) REFERENCES `vehicle_make` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vehicle_ibfk_3` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_type` (`type_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
