-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 08:52 PM
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
  `Name` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Rating` float NOT NULL,
  `Review` varchar(255) NOT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `Chapters` int(11) DEFAULT 1,
  `Covers` varchar(255) NOT NULL,
  `YT_Link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manga`
--

INSERT INTO `manga` (`Manga_ID`, `Name`, `Author`, `Rating`, `Review`, `Genre`, `Chapters`, `Covers`, `YT_Link`) VALUES
(5, 'Blue Lock', 'Muneyuki Kaneshiro', 4.8, 'Intense football competition.', 'Sports', NULL, '', ''),
(13, 'Boku no Hero Academia', 'Kohei Horikoshi', 4.8, 'A superhero\'s coming-of-age story.', 'Action', NULL, '', ''),
(12, 'Frieren', 'Kanehito Yamada', 4.8, 'A peaceful yet emotional fantasy.', 'Fantasy', NULL, '', ''),
(1, 'Haikyuu', 'Haruichi Furudate', 4.8, 'A volleyball masterpiece.', 'Sports', NULL, 'https://drive.google.com/file/d/15Eek1WAuvObvz6qOVe--veNg-45VVUTU/view?usp=drive_link', 'https://youtu.be/ZL3Y_0jhgZo?si=XeoFqoBZ5wY0eQ8Q'),
(2, 'Horimiya', 'HERO and Daisuke Hagiwara', 4.7, 'Heartwarming and relatable.', 'Romance', NULL, '', ''),
(10, 'Jujutsu Kaisen', 'Gege Akutami', 4.9, 'Action-packed supernatural battles.', 'Action', NULL, '', ''),
(14, 'Kaiju No. 8', 'Naoya Matsumoto', 4.8, 'A refreshing take on monster battles.', 'Fantasy', NULL, '', ''),
(7, 'Kono Oto Tomare', 'Amyuu', 4.7, 'Passionate koto club drama.', 'Sports', NULL, '', ''),
(6, 'Sakamoto Days', 'Yuto Suzuki', 4.7, 'A retired hitman\'s hilarious life.', 'Comedy', NULL, '', ''),
(15, 'Solo Leveling', 'Chugong', 4.9, 'An epic tale of a hunter\'s rise to greatness.', 'Action/Fantasy', 14, '', ''),
(4, 'Spy x Family', 'Tatsuya Endo', 4.9, 'A wholesome family of spies.', 'Comedy', NULL, '', ''),
(11, 'Summer Hikaru Died', 'Mokumokuren', 4.6, 'Chilling yet beautiful storytelling.', 'Horror', NULL, '', ''),
(8, 'The Time I Got Reincarnated as a Slime', 'Fuse', 4.9, 'Unique and entertaining isekai.', 'Fantasy', NULL, '', ''),
(3, 'Wind Breaker', 'Jo Yongseok', 4.6, 'Thrilling cycling adventures.', 'Sports', NULL, '', ''),
(9, 'Yona of the Dawn', 'Mizuho Kusanagi', 4.8, 'A journey of self-discovery.', 'Romance', NULL, '', '');

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
(1, 'Fantasy', 'Die For You', 'Unknown Artist', 'https://youtu.be/h7MYJghRWt0?si=SdSY_hX-h10SiXnb'),
(2, 'Action', 'Supermassive Black Hole', 'Unknown Artist', 'https://youtu.be/rinkviEmeXk?si=1OxV1NSY9yQk06sP'),
(3, 'Romance', 'Fantastic', 'Unknown Artist', 'https://youtu.be/t9mpyRzipww?si=m2jMIMgJAqPvYaoQ'),
(4, 'Horror', 'Coven', 'Unknown Artist', 'https://youtu.be/GS4KAWg2tXw?si=wees7cnFHP6Xe2c4'),
(5, 'Sports', 'Bling Bang Bang Born', 'Unknown Artist', 'https://youtu.be/mLW35YMzELE?si=JFRhviz95wMobo6I'),
(6, 'Comedy', 'Yakety Sax', 'Boots Randolph', 'https://www.youtube.com/watch?v=ZnHmskwqCCQ');

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE `reader` (
  `Email` varchar(255) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT 'Reader'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reader`
--

INSERT INTO `reader` (`Email`, `Name`, `Password`, `Type`) VALUES
('alice.johnson@example.com', 'Alice Johnson', '482c811da5d5b4bc6d497ffa98491e38', 'Reader'),
('atika@gmail.com', 'Atika', 'atiks123', 'Admin'),
('bob.smith@example.com', 'Bob Smith', '3fc0a7acf087f549ac2b266baf94b8b1', 'Reader'),
('charlie.brown@example.com', 'Charlie Brown', '0e88c5706dc5f028ac7c7d31d6cd1538', 'Reader'),
('diana.prince@example.com', 'Diana Prince', 'c5332049d013fe6d38f6b4da5570988a', 'Reader'),
('ethan.hunt@example.com', 'Ethan Hunt', '2b1c7bfad83921b5cf3ce141d0ef7e98', 'Reader'),
('fiona.gallagher@example.com', 'Fiona Gallagher', '96b33694c4bb7dbd07391e0be54745fb', 'Reader'),
('george.harris@example.com', 'George Harris', 'fc7d1fd985c9a23bfdf8b5ac4bde76a7', 'Reader'),
('hannah.baker@example.com', 'Hannah Baker', 'f43af286e6f31c8d21db468e94521345', 'Reader'),
('ivy.carter@example.com', 'Ivy Carter', '50ec69698bcb232f5489bffebd9e0b37', 'Reader'),
('jack.daniels@example.com', 'Jack Daniels', 'b8fe4632dbd0d6a187dd98e1d1b434a8', 'Reader'),
('mercy@gmail.com', 'Mercy', 'narc123', 'Admin'),
('puja@gmail.com', 'Puja', 'pujalol', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `webnovels`
--

CREATE TABLE `webnovels` (
  `Webnovel_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Rating` float NOT NULL,
  `Review` varchar(255) NOT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `Chapter_Count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webnovels`
--

INSERT INTO `webnovels` (`Webnovel_ID`, `Name`, `Author`, `Rating`, `Review`, `Genre`, `Chapter_Count`) VALUES
(1, 'Advent of the Three Calamities', 'Zhao Yu', 4.7, 'A high-stakes fantasy with a dark twist.', 'Fantasy', NULL),
(2, 'Cultivation Online', 'Lars Lehoux', 4.6, 'A captivating story with online elements.', 'Fantasy', NULL),
(12, 'I Was Mistaken as a Monstrous Genius Actor', 'Si Yeong', 4.5, 'A hilarious yet heartfelt journey.', 'Comedy', NULL),
(7, 'Lord of Mysteries 2: Circle of Inevitability', 'Cuttlefish That Loves Diving', 4.6, 'A great sequel with twists and turns.', 'Fantasy', NULL),
(4, 'Lord of the Mysteries', 'Cuttlefish That Loves Diving', 4.8, 'A complex and mind-bending story.', 'Action', NULL),
(13, 'Overgeared', 'Park Saenal', 4.8, 'A story of redemption and growth.', 'Action', NULL),
(11, 'Return of the Mount Hua Sect', 'Benguil', 4.7, 'A martial arts tale filled with tension.', 'Action', NULL),
(5, 'Reverend Insanity', 'Gu Zhen Ren', 4.7, 'A dark tale of cultivation and strategy.', 'Action', NULL),
(3, 'Shadow Slave', 'Yoo Heon', 4.5, 'A thrilling dark fantasy.', 'Fantasy', NULL),
(15, 'SSS-Class Suicide Hunter', 'Geun Lee', 4.9, 'An intense tale of survival and revenge.', 'Action', NULL),
(10, 'The Author\'s POV', 'Jin Shuang', 4.5, 'An intriguing story with a twist on the narrative.', 'Fantasy', NULL),
(6, 'The Beginning After The End', 'TurtleMe', 4.9, 'An excellent reincarnation story with depth.', 'Action', NULL),
(9, 'The Legendary Mechanic', 'Zhu Xian', 4.6, 'A story about technology and progression.', 'Action', NULL),
(8, 'Trash of the Count\'s Family', 'Yoo Ryeo Han', 4.7, 'A blend of comedy, drama, and adventure.', 'Comedy', NULL),
(14, 'Under the Oak Tree', 'Kim So-Ra', 4.6, 'A heartwarming yet tragic romance.', 'Romance', NULL);

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
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `Product_ID` (`Manga_ID`),
  ADD KEY `Volume_Count` (`Chapters`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`Playlist_ID`);

--
-- Indexes for table `reader`
--
ALTER TABLE `reader`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `webnovels`
--
ALTER TABLE `webnovels`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `Bookmark_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `Playlist_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`Reader_Email`) REFERENCES `reader` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
