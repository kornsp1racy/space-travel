-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 01:39 AM
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
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`) VALUES
(1, 'Insulated Clothes'),
(2, 'Helmet'),
(3, 'Sunglasses'),
(4, 'Hiking Boots'),
(5, 'Camera'),
(6, 'Keyboard'),
(7, 'Solar Charger'),
(8, 'Swiss Army Laser Cutter'),
(9, 'Jetpack'),
(10, 'Insulated Tent'),
(11, 'Inflatable Spaceship'),
(12, 'Xenomorph Repellent'),
(13, 'Plasma Gun'),
(14, 'Alien language translator'),
(15, 'Hover Hammock'),
(16, 'Space Suit Repair Kit'),
(17, 'Flashlight'),
(18, 'Satellite Phone'),
(19, 'Energy Bars'),
(20, 'First Aid Kit'),
(21, 'GPS Tracker'),
(22, 'Stormproof Jacket'),
(23, 'Insulated Scuba Gear'),
(24, 'Surfboard'),
(25, 'Spikes'),
(26, 'Pickaxe'),
(27, 'Telescope');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary`
--

CREATE TABLE `itinerary` (
  `id` int(11) NOT NULL,
  `selected_trip_id` int(11) NOT NULL,
  `day` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accommodation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itinerary`
--

INSERT INTO `itinerary` (`id`, `selected_trip_id`, `day`, `activity`, `restaurant`, `accommodation`) VALUES
(10, 2, 'Wednesday', 'Cultural Experiences', 'Kentucky Fried Chicken', 'Greenhouse'),
(13, 8, 'Saturaday', 'Zero-gravity Activities', 'Wendy\'s', 'Greenhouse'),
(14, 9, 'Sunday', 'Admiring Stars', 'Subway', 'Space Shuttle'),
(48, 21, 'wednesday', 'Science Experiments', 'Taco Bell', 'Greenhouse'),
(49, 23, 'Monday', 'Exploration', 'McDonalds', 'Underground Habitat'),
(51, 23, 'Tuesday', 'Adventure Sports', 'Dominos', 'Aurora Space Station'),
(52, 23, 'Monday', 'Exploration', 'Dominos', 'Underground Habitat'),
(53, 23, 'Monday', 'Exploration', 'McDonalds', 'Greenhouse'),
(54, 22, 'wednesday', 'Science Experiments', 'Dominos', 'Greenhouse'),
(55, 22, 'Monday', 'Exploration', 'McDonalds', 'Underground Habitat');

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
(1, 1, '2023-04-12', 'Best trip ever', 'Day 1:\r\nAfter months of training and preparation, I can hardly believe that I am finally here on the Moon! The journey was long and uncomfortable, but it was all worth it to see the Earth rise over the horizon of this desolate landscape.\r\n\r\nThe first thing I noticed when I stepped out of the spacecraft was the silence. There is no sound here, no wind, no rustling of leaves, just an eerie stillness that is both peaceful and unnerving.\r\n\r\nWe spent the day exploring the landing site and setting up our equipment. Walking on the Moon is an incredible experience - the low gravity makes every step feel like you\'re bouncing and floating at the same time. It\'s going to take some getting used to, but I think I\'m going to like it here.', 'https://s.w-x.co/util/image/w/de-spacexdpa.jpg?crop=16:9&width=980&format=pjpg&auto=webp&quality=60', 25),
(2, 2, '2023-06-05', 'Even better', 'Day 2:\r\nToday we ventured further away from the landing site and explored some of the craters and valleys nearby. The landscape is unlike anything I\'ve ever seen before - it\'s both barren and beautiful at the same time. The colors are muted, but there are subtle shades of grey, brown, and even purple in the rocks and dust.\r\n\r\nI couldn\'t help but feel a sense of awe as I looked up at the sky and saw the stars shining so brightly. There\'s no atmosphere to interfere with the view, so the stars are incredibly clear and vivid.\r\n\r\nWe also had some fun playing around in the low gravity - we tried jumping as high as we could and even had a few impromptu races. It\'s amazing how much you can do with just a little bit of effort here.', 'https://i.ds.at/iU_cPw/rs:fill:1600:0/plain/2022/04/13/mondimpakt.jpg', 44);

-- --------------------------------------------------------

--
-- Table structure for table `packing_list`
--

CREATE TABLE `packing_list` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `selected_trip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packing_list`
--

INSERT INTO `packing_list` (`id`, `item_id`, `selected_trip_id`) VALUES
(4, 3, 2),
(6, 24, 2),
(7, 3, 2),
(11, 3, 2),
(12, 1, 2),
(13, 3, 2),
(14, 3, 2),
(15, 3, 2),
(16, 2, 2),
(28, 2, 8),
(29, 4, 8),
(30, 15, 10),
(46, 13, 21),
(47, 14, 21),
(50, 12, 21),
(51, 5, 22),
(52, 6, 22),
(53, 27, 22),
(54, 3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `selected_trip`
--

CREATE TABLE `selected_trip` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `trip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selected_trip`
--

INSERT INTO `selected_trip` (`id`, `user_id`, `trip_id`) VALUES
(2, NULL, 3),
(8, 2, 5),
(9, 2, 2),
(10, 2, 9),
(14, 4, 2),
(15, 4, 4),
(16, 4, 3),
(21, 3, 5),
(22, 3, 6),
(23, 3, 1);

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
(1, 'Basic', 'Moon', 5, 'Suitable for individuals who haven\'t even sit in a rocket.', 'https://cdn.mos.cms.futurecdn.net/LeZ2ZicMsBz2MDs3JA2kJn.jpg', 'Oprah Winfrey', 'Paper Rocket Medal'),
(2, 'Beginner', 'Mercury', 5, 'Suitable for individuals who have no prior experience or knowledge of the subject matter.', 'https://www.universetoday.com/wp-content/uploads/2009/08/Mercury-e1418849404713.jpg', 'Pope Francis', 'Participant Medal'),
(3, 'Elementary', 'Venus', 6, 'Suitable for individuals who have a basic understanding of the subject matter, but require more guidance and support.', 'https://www.universetoday.com/wp-content/uploads/2008/10/Venus.jpg', 'Donald Trump', 'Finisher Medal'),
(4, 'Intermediate', 'Mars', 8, 'Suitable for individuals who habe a good grasp of the subject matter and are looking to expand their knowledge and skills.', 'https://www.universetoday.com/wp-content/uploads/2014/10/True-colour_image_of_Mars_seen_by_OSIRIS.jpg', 'Elon Musk', 'Bronze Medal'),
(5, 'Advanced', 'Jupiter', 30, 'Suitable for individuals who have a thorough understanding of the subject matter and are looking to develop their expertise.', 'https://www.universetoday.com/wp-content/uploads/2014/10/Jupiter_eye-e1414524396756.jpg', 'Jeff Bezos', 'Silver Medal'),
(6, 'Expert', 'Saturn', 5, 'Suitable for individuals who have extensive knowledge and experience in the subject matter and are considered authorities in their field.', 'https://www.universetoday.com/wp-content/uploads/2013/10/saturn_20131010-e1417854764439.jpg', 'Brad Pitt', 'Gold Medal'),
(7, 'Master', 'Uranus', 72, 'Suitable for individuals who have achieved a high level proficiency in the subject matter and are capable of teaching and mentoring others.', 'https://www.universetoday.com/wp-content/uploads/2008/10/uranus_voy2.jpg', 'Lady Gaga', 'Platinum Medal'),
(8, 'Elite', 'Neptune', 5, 'Suitable for individuals who are at the top of their profession and have achieved signifiant recognition for their achievements.', 'https://www.universetoday.com/wp-content/uploads/2008/11/neptunevoyager2.jpg', 'Cristiano Ronaldo', 'Valor Medal'),
(9, 'Legendary', 'Pluto', 5, 'Suitable for individuals who are widely recognised as pioneers and innovators in their field and have made significant contributions to the advancement of knowledge and understanding.', 'https://www.ardalpha.de/wissen/weltall/astronomie/pluto/pluto-new-horizons-118~_v-img__16__9__l_-1dc0e8f74459dd04c91a0d45af4972b9069f1135.jpg?version=9d729', 'Michael Jackson Hologram', 'Diamond Medal');

-- --------------------------------------------------------

--
-- Table structure for table `trip_item`
--

CREATE TABLE `trip_item` (
  `trip_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_item`
--

INSERT INTO `trip_item` (`trip_id`, `item_id`) VALUES
(6, 5),
(6, 6),
(6, 27),
(8, 5),
(8, 23),
(8, 24),
(9, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `first_name`, `last_name`, `address`, `passport`, `phone`) VALUES
(1, 'admin@email.com', '[\"ROLE_ADMIN\"]', '$2y$13$x5KNKFT37Uj3EsANGK5MOezQBnzvZ8ijQaHvpTWfAldnziJk1w4ou', 'Adrian', 'Min', 'Straße 3, 10015 Berlin', 'pass.jpg', '1234556'),
(2, 'mustermann@email.com', '[\"ROLE_USER\"]', '$2y$13$x5KNKFT37Uj3EsANGK5MOezQBnzvZ8ijQaHvpTWfAldnziJk1w4ou', 'Max', 'Mustermann', 'Allee 15, 89005 München', 'pp.jpg', '2345435'),
(3, 'some@dude.com', '[\"ROLE_USER\"]', '$2y$13$x5KNKFT37Uj3EsANGK5MOezQBnzvZ8ijQaHvpTWfAldnziJk1w4ou', 'the', 'dude!', 'wtf 123', 'pp.jpg', '111111111'),
(4, 'admin@gmail.com', '[\"ROLE_ADMIN\",\"ROLE_USER\"]', '$2y$13$x5KNKFT37Uj3EsANGK5MOezQBnzvZ8ijQaHvpTWfAldnziJk1w4ou', 'Ad', 'Min', 'dsfjjf', 'dsfds.jpg', '454535');

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
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FF2238F64DF85090` (`selected_trip_id`);

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
-- Indexes for table `packing_list`
--
ALTER TABLE `packing_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F43062BD126F525E` (`item_id`),
  ADD KEY `IDX_F43062BD4DF85090` (`selected_trip_id`);

--
-- Indexes for table `selected_trip`
--
ALTER TABLE `selected_trip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3FF5F823A76ED395` (`user_id`),
  ADD KEY `IDX_3FF5F823A5BC2E0E` (`trip_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `itinerary`
--
ALTER TABLE `itinerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `packing_list`
--
ALTER TABLE `packing_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `selected_trip`
--
ALTER TABLE `selected_trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_reward`
--
ALTER TABLE `user_reward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD CONSTRAINT `FK_FF2238F64DF85090` FOREIGN KEY (`selected_trip_id`) REFERENCES `selected_trip` (`id`);

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
-- Constraints for table `packing_list`
--
ALTER TABLE `packing_list`
  ADD CONSTRAINT `FK_F43062BD126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `FK_F43062BD4DF85090` FOREIGN KEY (`selected_trip_id`) REFERENCES `selected_trip` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `selected_trip`
--
ALTER TABLE `selected_trip`
  ADD CONSTRAINT `FK_3FF5F823A5BC2E0E` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`id`),
  ADD CONSTRAINT `FK_3FF5F823A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL;

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
