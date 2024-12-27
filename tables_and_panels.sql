-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 01:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tables_and_panels`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `Bookmark_ID` int(11) NOT NULL,
  `Reader_Email` varchar(255) DEFAULT NULL,
  `Product_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manga`
--

CREATE TABLE `manga` (
  `Manga_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Volume_Count` int(11) DEFAULT NULL,
  `Genre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manga`
--

INSERT INTO `manga` (`Manga_ID`, `Product_ID`, `Volume_Count`, `Genre`) VALUES
(58, 1, 45, 'Sports'),
(59, 2, 16, 'Romance/Comedy'),
(60, 3, 5, 'Sports/Drama'),
(61, 4, 13, 'Action/Comedy'),
(62, 5, 24, 'Sports/Thriller'),
(63, 6, 12, 'Action/Comedy'),
(64, 7, 27, 'Music/Drama'),
(65, 8, 23, 'Isekai/Fantasy'),
(66, 9, 41, 'Adventure/Romance'),
(67, 10, 25, 'Action/Supernatural'),
(68, 11, 2, 'Horror/Drama'),
(69, 12, 12, 'Fantasy/Adventure'),
(70, 13, 39, 'Superhero/Action'),
(71, 14, 10, 'Action/Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `Playlist_ID` int(11) NOT NULL,
  `Genre` varchar(100) NOT NULL,
  `Song_Name` varchar(255) NOT NULL,
  `Artist_Name` varchar(255) DEFAULT NULL,
  `Song_URL` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`Playlist_ID`, `Genre`, `Song_Name`, `Artist_Name`, `Song_URL`) VALUES
(1, 'Fantasy', 'Mythical Journey', 'Unknown Artist', 'https://www.youtube.com/watch?v=XXXXXXXX'),
(2, 'Action', 'Battle Symphony', 'Unknown Artist', 'https://www.youtube.com/watch?v=XXXXXXXX'),
(3, 'Romance', 'Love in Bloom', 'Unknown Artist', 'https://www.youtube.com/watch?v=XXXXXXXX'),
(4, 'Horror', 'Whispers in the Dark', 'Unknown Artist', 'https://www.youtube.com/watch?v=XXXXXXXX'),
(5, 'Sports', 'Victory Lap', 'Unknown Artist', 'https://www.youtube.com/watch?v=XXXXXXXX');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Author_Name` varchar(255) DEFAULT NULL,
  `Rating` float DEFAULT NULL,
  `Review` text DEFAULT NULL,
  `Genre` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Product_Name`, `Author_Name`, `Rating`, `Review`, `Genre`, `Type`) VALUES
(1, 'Haikyuu', 'Haruichi Furudate', 4.8, 'A volleyball masterpiece.', 'Sports', 'Manga'),
(2, 'Horimiya', 'HERO and Daisuke Hagiwara', 4.7, 'Heartwarming and relatable.', 'Romance/Comedy', 'Manga'),
(3, 'Wind Breaker', 'Jo Yongseok', 4.6, 'Thrilling cycling adventures.', 'Sports/Drama', 'Manga'),
(4, 'Spy x Family', 'Tatsuya Endo', 4.9, 'A wholesome family of spies.', 'Action/Comedy', 'Manga'),
(5, 'Blue Lock', 'Muneyuki Kaneshiro', 4.8, 'Intense football competition.', 'Sports/Thriller', 'Manga'),
(6, 'Sakamoto Days', 'Yuto Suzuki', 4.7, 'A retired hitman\'s hilarious life.', 'Action/Comedy', 'Manga'),
(7, 'Kono Oto Tomare', 'Amyuu', 4.7, 'Passionate koto club drama.', 'Music/Drama', 'Manga'),
(8, 'The Time I Got Reincarnated as a Slime', 'Fuse', 4.9, 'Unique and entertaining isekai.', 'Isekai/Fantasy', 'Manga'),
(9, 'Yona of the Dawn', 'Mizuho Kusanagi', 4.8, 'A journey of self-discovery.', 'Adventure/Romance', 'Manga'),
(10, 'Jujutsu Kaisen', 'Gege Akutami', 4.9, 'Action-packed supernatural battles.', 'Action/Supernatural', 'Manga'),
(11, 'Summer Hikaru Died', 'Mokumokuren', 4.6, 'Chilling yet beautiful storytelling.', 'Horror/Drama', 'Manga'),
(12, 'Frieren', 'Kanehito Yamada', 4.8, 'A peaceful yet emotional fantasy.', 'Fantasy/Adventure', 'Manga'),
(13, 'Boku no Hero Academia', 'Kohei Horikoshi', 4.8, 'A superhero\'s coming-of-age story.', 'Superhero/Action', 'Manga'),
(14, 'Kaiju No. 8', 'Naoya Matsumoto', 4.8, 'A refreshing take on monster battles.', 'Action/Fantasy', 'Manga'),
(31, 'Shadow Slave', 'Yoo Heon', 4.5, 'A thrilling dark fantasy.', 'Fantasy', 'Webnovel'),
(32, 'Lord of the Mysteries', 'Cuttlefish That Loves Diving', 4.8, 'A complex and mind-bending story.', 'Mystery', 'Webnovel'),
(33, 'Reverend Insanity', 'Gu Zhen Ren', 4.7, 'A dark tale of cultivation and strategy.', 'Cultivation', 'Webnovel'),
(34, 'The Beginning After The End', 'TurtleMe', 4.9, 'An excellent reincarnation story with depth.', 'Action/Adventure', 'Webnovel'),
(35, 'Lord of Mysteries 2: Circle of Inevitability', 'Cuttlefish That Loves Diving', 4.6, 'A great sequel with twists and turns.', 'Fantasy', 'Webnovel'),
(36, 'Omniscient Reader\'s Viewpoint', 'Sing Shong', 4.8, 'A unique take on the reincarnation genre.', '', ''),
(37, 'Trash of the Count\'s Family', 'Yoo Ryeo Han', 4.7, 'A blend of comedy, drama, and adventure.', 'Drama/Action', 'Webnovel'),
(38, 'The Legendary Mechanic', 'Zhu Xian', 4.6, 'A story about technology and progression.', 'Sci-Fi/Action', 'Webnovel'),
(39, 'The Author\'s POV', 'Jin Shuang', 4.5, 'An intriguing story with a twist on the narrative.', 'Slice of Life/Fantasy', 'Webnovel'),
(40, 'Return of the Mount Hua Sect', 'Benguil', 4.7, 'A martial arts tale filled with tension.', 'Martial Arts', 'Webnovel'),
(41, 'Cultivation Online', 'Lars Lehoux', 4.6, 'A captivating story with online elements.', 'Fantasy', 'Webnovel'),
(42, 'I Was Mistaken as a Monstrous Genius Actor', 'Si Yeong', 4.5, 'A hilarious yet heartfelt journey.', 'Comedy/Fantasy', 'Webnovel'),
(43, 'Overgeared', 'Park Saenal', 4.8, 'A story of redemption and growth.', 'Action/Adventure', 'Webnovel'),
(44, 'A Regressor\'s Tale of Cultivation', 'The First Cultivator', 4.7, 'A cultivation story with a unique twist.', '', ''),
(45, 'Under the Oak Tree', 'Kim So-Ra', 4.6, 'A heartwarming yet tragic romance.', 'Romance/Fantasy', 'Webnovel'),
(46, 'Advent of the Three Calamities', 'Zhao Yu', 4.7, 'A high-stakes fantasy with a dark twist.', 'Fantasy/Action', 'Webnovel'),
(47, 'SSS-Class Suicide Hunter', 'Geun Lee', 4.9, 'An intense tale of survival and revenge.', 'Action', 'Webnovel'),
(48, 'The Novel\'s Extra', 'Jin Shuo', 4.6, 'A fascinating take on the life of an extra.', 'Action', 'Webnovel'),
(49, 'The Innkeeper', 'The Innkeeper', 4.5, 'A refreshing and light-hearted read.', 'Slice of Life', 'Webnovel'),
(50, 'My House of Horrors', 'Xu Yifan', 4.8, 'A creepy yet intriguing horror story.', 'Horror', 'Webnovel'),
(51, 'Solo Levelling', 'Chugong', 4.9, 'An action-packed journey of power and growth.', 'Action/Fantasy', 'Webnovel');

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE `reader` (
  `Email` varchar(255) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webnovels`
--

CREATE TABLE `webnovels` (
  `Webnovel_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Chapter_Count` int(11) DEFAULT NULL,
  `Genre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webnovels`
--

INSERT INTO `webnovels` (`Webnovel_ID`, `Product_ID`, `Chapter_Count`, `Genre`) VALUES
(1, 2, 270, 'Fantasy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`Bookmark_ID`),
  ADD KEY `Reader_Email` (`Reader_Email`);

--
-- Indexes for table `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`Manga_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`Playlist_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `reader`
--
ALTER TABLE `reader`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `webnovels`
--
ALTER TABLE `webnovels`
  ADD PRIMARY KEY (`Webnovel_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `Bookmark_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manga`
--
ALTER TABLE `manga`
  MODIFY `Manga_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `Playlist_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `webnovels`
--
ALTER TABLE `webnovels`
  MODIFY `Webnovel_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`Reader_Email`) REFERENCES `reader` (`Email`);

--
-- Constraints for table `manga`
--
ALTER TABLE `manga`
  ADD CONSTRAINT `manga_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `webnovels`
--
ALTER TABLE `webnovels`
  ADD CONSTRAINT `webnovels_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
