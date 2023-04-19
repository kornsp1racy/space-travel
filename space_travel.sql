-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 04:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `space_travel`
--
CREATE DATABASE IF NOT EXISTS `space_travel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `space_travel`;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230419100254', '2023-04-19 10:03:04', 496),
('DoctrineMigrations\\Version20230419131155', '2023-04-19 13:12:31', 59),
('DoctrineMigrations\\Version20230419133930', '2023-04-19 13:39:34', 54),
('DoctrineMigrations\\Version20230419134736', '2023-04-19 13:48:14', 13);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_user`
--

CREATE TABLE `item_user` (
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itinerary`
--

CREATE TABLE `itinerary` (
  `id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_trip_id` int(11) NOT NULL,
  `day` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accomodation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itinerary`
--

INSERT INTO `itinerary` (`id`, `fk_user_id`, `fk_trip_id`, `day`, `activity`, `restaurant`, `accomodation`) VALUES
(1, 2, 2, 'Monday', 'Exploration', 'McDonalds', 'Underground Habitat'),
(2, 2, 1, 'Tuesday', 'Adventure Sports', 'Burger King', 'Modular Habitat'),
(3, 2, 5, 'Wednesday', 'Cultural Experiences', 'Kentucky Fried Chicken', 'Greenhouse'),
(4, 2, 3, 'Thursday', 'Earth Observation', 'Domino\'s', 'Aurora Space Station'),
(5, 2, 4, 'Friday', 'Science Experiments', 'Taco Bell', 'Space Shuttle'),
(6, 2, 6, 'Saturday', 'Zero-gravity Activities', 'Wendy\'s', 'Greenhouse'),
(7, 2, 7, 'Sunday', 'Admiring Stars', 'Subway', 'Space Shuttle');

-- --------------------------------------------------------

--
-- Table structure for table `mandatory_item_trip`
--

CREATE TABLE `mandatory_item_trip` (
  `id` int(11) NOT NULL,
  `fk_item_id` int(11) NOT NULL,
  `fk_trip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `fk_user_id`, `date`, `title`, `content`, `image`, `likes`) VALUES
(1, 2, '2023-04-12', 'Best trip ever', 'Day 1:\r\nAfter months of training and preparation, I can hardly believe that I am finally here on the Moon! The journey was long and uncomfortable, but it was all worth it to see the Earth rise over the horizon of this desolate landscape.\r\n\r\nThe first thing I noticed when I stepped out of the spacecraft was the silence. There is no sound here, no wind, no rustling of leaves, just an eerie stillness that is both peaceful and unnerving.\r\n\r\nWe spent the day exploring the landing site and setting up our equipment. Walking on the Moon is an incredible experience - the low gravity makes every step feel like you\'re bouncing and floating at the same time. It\'s going to take some getting used to, but I think I\'m going to like it here.', 'https://s.w-x.co/util/image/w/de-spacexdpa.jpg?crop=16:9&width=980&format=pjpg&auto=webp&quality=60', 25),
(2, 2, '2023-04-13', 'Even better', 'Day 2:\r\nToday we ventured further away from the landing site and explored some of the craters and valleys nearby. The landscape is unlike anything I\'ve ever seen before - it\'s both barren and beautiful at the same time. The colors are muted, but there are subtle shades of grey, brown, and even purple in the rocks and dust.\r\n\r\nI couldn\'t help but feel a sense of awe as I looked up at the sky and saw the stars shining so brightly. There\'s no atmosphere to interfere with the view, so the stars are incredibly clear and vivid.\r\n\r\nWe also had some fun playing around in the low gravity - we tried jumping as high as we could and even had a few impromptu races. It\'s amazing how much you can do with just a little bit of effort here.', 'https://i.ds.at/iU_cPw/rs:fill:1600:0/plain/2022/04/13/mondimpakt.jpg', 44),
(3, 2, '2023-04-14', 'out of ideas', 'Day 3:\r\nToday we conducted some scientific experiments and took some samples of the rocks and soil. It\'s incredible to think that these samples have been untouched for billions of years - they could hold clues to the origins of our solar system and the universe itself.\r\n\r\nWe also had some time to just relax and take in the view. It\'s so peaceful here, without the noise and chaos of life on Earth. I feel like I could stay here forever, just gazing out at the landscape and pondering the mysteries of the universe.', 'https://s.w-x.co/util/image/w/de-mond-astronaut-GettyImages-1353996620%20Kopie.jpg?crop=16:9&width=980&format=pjpg&auto=webp&quality=60', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `characteristics` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `award` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`id`, `name`, `destination`, `duration`, `characteristics`, `image`, `host`, `award`) VALUES
(1, 'Basic', 'Moon', 1, 'Suitable for individuals who haven\'t even sit in a rocket.', 'https://cdn.mos.cms.futurecdn.net/LeZ2ZicMsBz2MDs3JA2kJn.jpg', 'Donald Trump', 'Paper Rocket Medal'),
(2, 'Beginner', 'Mercury', 5, 'Suitable for individuals who have no prior experience or knowledge of the subject matter.', 'https://www.universetoday.com/wp-content/uploads/2009/08/Mercury-e1418849404713.jpg', 'Pope Francis', 'Participant Medal'),
(3, 'Elementary', 'Venus', 6, 'Suitable for individuals who have a basic understanding of the subject matter, but require more guidance and support.', 'https://www.universetoday.com/wp-content/uploads/2008/10/Venus.jpg', 'Donald Trump', 'Finisher Medal'),
(4, 'Intermediate', 'Mars', 8, 'Suitable for individuals who habe a good grasp of the subject matter and are looking to expand their knowledge and skills.', 'https://www.universetoday.com/wp-content/uploads/2014/10/True-colour_image_of_Mars_seen_by_OSIRIS.jpg', 'Elon Musk', 'Bronze Medal'),
(5, 'Advanced', 'Jupiter', 30, 'Suitable for individuals who have a thorough understanding of the subject matter and are looking to develop their expertise.', 'https://www.universetoday.com/wp-content/uploads/2014/10/Jupiter_eye-e1414524396756.jpg', 'Jeff Bezos', 'Silver Medal'),
(6, 'Expert', 'Saturn', 42, 'Suitable for individuals who have extensive knowledge and experience in the subject matter and are considered authorities in their field.', 'https://www.universetoday.com/wp-content/uploads/2013/10/saturn_20131010-e1417854764439.jpg', 'Brad Pitt', 'Gold Medal'),
(7, 'Master', 'Uranus', 72, 'Suitable for individuals who have achieved a high level proficiency in the subject matter and are capable of teaching and mentoring others.', 'https://www.universetoday.com/wp-content/uploads/2008/10/uranus_voy2.jpg', 'Lady Gaga', 'Platinum Medal'),
(8, 'Elite', 'Neptune', 108, 'Suitable for individuals who are at the top of their profession and have achieved signifiant recognition for their achievements.', 'https://www.universetoday.com/wp-content/uploads/2008/11/neptunevoyager2.jpg', 'Cristiano Ronaldo', 'Valor Medal'),
(9, 'Legendary', 'Pluto', 120, 'Suitable for individuals who are widely recogniced as pioneers and innovators in their field and have made significant contributions to the advancement of knowledge and understanding.', 'https://www.ardalpha.de/wissen/weltall/astronomie/pluto/pluto-new-horizons-118~_v-img__16__9__l_-1dc0e8f74459dd04c91a0d45af4972b9069f1135.jpg?version=9d729', 'Michael Jackson Hologram', 'Diamond Medal');

-- --------------------------------------------------------

--
-- Table structure for table `trip_item`
--

CREATE TABLE `trip_item` (
  `trip_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `address`, `passwort`, `passport`, `phone`, `status`, `image`) VALUES
(1, 'Adrian', 'Min', 'admin@email.com', 'Straße 3, 10015 Berlin', '123123', 'pass.jpg', '1234556', 'Admin', 'pic.png'),
(2, 'Max', 'Mustermann', 'mustermann@email.com', 'Allee 15, 89005 München', '123123', 'pp.jpg', '2345435', 'User', 'profil.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_reward`
--

CREATE TABLE `user_reward` (
  `id` int(11) NOT NULL,
  `fk_user_id_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_user`
--
ALTER TABLE `item_user`
  ADD PRIMARY KEY (`item_id`,`user_id`),
  ADD KEY `IDX_45A392B2126F525E` (`item_id`),
  ADD KEY `IDX_45A392B2A76ED395` (`user_id`);

--
-- Indexes for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FF2238F65741EEB9` (`fk_user_id`),
  ADD KEY `IDX_FF2238F655931322` (`fk_trip_id`);

--
-- Indexes for table `mandatory_item_trip`
--
ALTER TABLE `mandatory_item_trip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2D6C75CDE2406F72` (`fk_item_id`),
  ADD KEY `IDX_2D6C75CD55931322` (`fk_trip_id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CFBDFA145741EEB9` (`fk_user_id`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_item`
--
ALTER TABLE `trip_item`
  ADD PRIMARY KEY (`trip_id`,`item_id`),
  ADD KEY `IDX_3423B675A5BC2E0E` (`trip_id`),
  ADD KEY `IDX_3423B675126F525E` (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reward`
--
ALTER TABLE `user_reward`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2B83696E6DE8AF9C` (`fk_user_id_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itinerary`
--
ALTER TABLE `itinerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mandatory_item_trip`
--
ALTER TABLE `mandatory_item_trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_reward`
--
ALTER TABLE `user_reward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_user`
--
ALTER TABLE `item_user`
  ADD CONSTRAINT `FK_45A392B2126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_45A392B2A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD CONSTRAINT `FK_FF2238F655931322` FOREIGN KEY (`fk_trip_id`) REFERENCES `trip` (`id`),
  ADD CONSTRAINT `FK_FF2238F65741EEB9` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `mandatory_item_trip`
--
ALTER TABLE `mandatory_item_trip`
  ADD CONSTRAINT `FK_2D6C75CD55931322` FOREIGN KEY (`fk_trip_id`) REFERENCES `trip` (`id`),
  ADD CONSTRAINT `FK_2D6C75CDE2406F72` FOREIGN KEY (`fk_item_id`) REFERENCES `item` (`id`);

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_CFBDFA145741EEB9` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `trip_item`
--
ALTER TABLE `trip_item`
  ADD CONSTRAINT `FK_3423B675126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3423B675A5BC2E0E` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_reward`
--
ALTER TABLE `user_reward`
  ADD CONSTRAINT `FK_2B83696E6DE8AF9C` FOREIGN KEY (`fk_user_id_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
