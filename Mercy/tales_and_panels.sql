-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 09:56 PM
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
-- Database: `tales_and_panels`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `Bookmark_ID` int(11) NOT NULL,
  `Reader_Name` varchar(500) DEFAULT NULL,
  `Product_Name` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`Bookmark_ID`, `Reader_Name`, `Product_Name`) VALUES
(1, 'Mell', 'Boku No Hero Academia'),
(15, 'narc', 'Haikyuu'),
(17, 'narc', 'Frieren'),
(18, 'narc', 'Lord of Mysteries 2: Circle of Inevitability');

-- --------------------------------------------------------

--
-- Table structure for table `manga`
--

CREATE TABLE `manga` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Summary` mediumtext NOT NULL,
  `Rating` float NOT NULL,
  `Likes` int(11) NOT NULL DEFAULT 0,
  `Review` varchar(255) NOT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `Chapters` int(11) DEFAULT 1,
  `Covers` text NOT NULL,
  `YT_Link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manga`
--

INSERT INTO `manga` (`ID`, `Name`, `Author`, `Summary`, `Rating`, `Likes`, `Review`, `Genre`, `Chapters`, `Covers`, `YT_Link`) VALUES
(1, 'Blue Lock', 'Muneyuki Kaneshiro', 'After a disastrous defeat at the 2018 World Cup, Japan\'s team struggles to regroup. But what\'s missing? An absolute Ace Striker, who can guide them to the win. The Football Association is hell-bent on creating a striker who hungers for goals and thirsts for victory, and who can be the decisive instrument in turning around a losing match…and to do so, they\'ve gathered 300 of Japan\'s best and brightest youth players. Who will emerge to lead the team…and will they be able to out-muscle and out-ego everyone who stands in their way?', 4.8, 1, 'Intense football competition.', 'Sports', 285, '', 'https://www.youtube.com/embed/5Iv3Fi8eb7w?si=darYZW_EdKvWdreX'),
(2, 'Boku No Hero Academia', 'Kohei Horikoshi', 'Middle school student Izuku Midoriya wants to be a hero more than anything, but he hasn’t got an ounce of power in him. With no chance of ever getting into the prestigious U.A. High School for budding heroes, his life is looking more and more like a dead end. Then an encounter with All Might, the greatest hero of them all, gives him a chance to change his destiny…', 4.8, 0, 'A superhero\'s coming-of-age story.', 'Action', 437, '', 'https://www.youtube.com/embed/1oMxrHXzOsY?si=WqC8d09g2Mr8PVgA'),
(3, 'Frieren', 'Kanehito Yamada', 'Elf mage Frieren and her courageous fellow adventurers have defeated the Demon King and brought peace to the land. But Frieren will long outlive the rest of her former party. How will she come to understand what life means to the people around her?', 4.8, 1, 'A peaceful yet emotional fantasy.', 'Fantasy', 138, '', 'https://www.youtube.com/embed/OIBODIPC_8Y?si=kBP0Mfdky9CD-VRC'),
(4, 'Haikyuu', 'Haruichi Furudate', 'After losing his first and last volleyball match against Tobio Kageyama, “the King of the Court,” Shoyo Hinata swears to become his rival after graduating middle school. But what happens when the guy he wants to defeat ends up being his teammate?!', 4.8, 1, 'A volleyball masterpiece.', 'Sports', 438, '', 'https://www.youtube.com/embed/VKviyEGvb94?si=mnGL4EOwzbdHJi0V'),
(5, 'Horimiya', 'HERO and Daisuke Hagiwara', 'A sweet \"aww\"-inspiring tale of school life begins!! At school, Kyouko Hori is known for being smart, attractive, and popular. On the other hand, her classmate, the boring, gloomy Izumi Miyamura tends to get painted as a \"loser fanboy.\" But when a liberally pierced and tattooed (not to mention downright gorgeous) Miyamura appears unexpectedly on the doorstep of secretly plain-Jane homebody Hori, these two similarly dissimilar teenagers discover that there are multiple sides to every story...and person!', 4.7, 0, 'Heartwarming and relatable.', 'Romance', 146, '', 'https://www.youtube.com/embed/NXoUBMx3BJE?si=brlbNz0IE8ZXAtsX'),
(6, 'Jujutsu Kaisen', 'Gege Akutami', 'For some strange reason, Yuji Itadori, despite his insane athleticism would rather just hang out with the Occult Club. However, her soon finds out that the occult is as real as it gets when his fellow club members are attacked! Meanwhile, the mysterious Megumi Fushiguro is tracking down a special-grade cursed object, and his search leads him to Itadori...', 4.9, 0, 'Action-packed supernatural battles.', 'Action', 275, '', 'https://www.youtube.com/embed/1tk1pqwrOys?si=wJD6ES4Z-OdxuvDl'),
(7, 'Kaiju No. 8', 'Naoya Matsumoto', 'Kafka wants to clean up kaiju, but not literally! Will a sudden metamorphosis stand in the way of his dream? A man working a job far removed from his childhood dreams gets wrapped up in an unexpected situation…! Becoming a monster, he aims once again to fulfill his lifelong dream…!', 4.8, 0, 'A refreshing take on monster battles.', 'Fantasy', 81, '', 'https://www.youtube.com/embed/LYabT4zZnJQ?si=mAUGAWwQQSbxa-3t'),
(8, 'Kono Oto Tomare', 'Amyuu', 'Since the graduation of the senior members of the club, Takezou ends up being the sole member of the “Koto“ (traditional Japanese string instrument) club. Now that the new school year has begun, Takezou will have to seek out new members into the club, or the club will become terminated. Out of nowhere, a new member barges into the near-abandoned club room, demanding to join the club. How will Takezou be able to keep his club alive and deal with this rascal of a new member?', 4.7, 0, 'Passionate koto club drama.', 'Sports', 153, '', 'https://www.youtube.com/embed/t6zvLyOSyPI?si=tA-6_JZx-2Dzza-F'),
(9, 'Sakamoto Days', 'Yuto Suzuki', 'Taro Sakamoto was the ultimate assassin, feared by villains and admired by hitmen. But one day...he fell in love! Retirement, marriage, fatherhood and then... Sakamoto gained weight! The chubby guy who runs the neighborhood store is actually a former legendary hitman! Can he protect his family from danger? Get ready to experience a new kind of action comedy series!', 4.7, 0, 'A retired hitman\'s hilarious life.', 'Comedy', 193, '', 'https://www.youtube.com/embed/a_K3Wg5pr3Q?si=gZv5X0GnZ0uDJ-SM'),
(10, 'Solo Leveling', 'Chugong', 'In a world where awakened beings called “Hunters” must battle deadly monsters to protect humanity, Sung Jinwoo, nicknamed “the weakest hunter of all mankind,” finds himself in a constant struggle for survival. One day, after a brutal encounter in an overpowered dungeon wipes out his party and threatens to end his life, a mysterious System chooses him as its sole player: Jinwoo has been granted the rare opportunity to level up his abilities, possibly beyond any known limits. Follow Jinwoo’s journey as he takes on ever-stronger enemies, both human and monster, to discover the secrets deep within the dungeons and the ultimate extent of his powers.', 4.9, 0, 'An epic tale of a hunter\'s rise to greatness.', 'Action', 202, '', 'https://www.youtube.com/embed/ZGXOWPZ64DA?si=2BoK43HTpgHlQOOk'),
(11, 'Spy x Family', 'Tatsuya Endo', 'The master spy codenamed <Twilight> has spent his days on undercover missions, all for the dream of a better world. But one day, he receives a particularly difficult new order from command. For his mission, he must form a temporary family and start a new life?! A Spy/Action/Comedy about a one-of-a-kind family!', 4.9, 0, 'A wholesome family of spies.', 'Comedy', 129, '', 'https://www.youtube.com/embed/D_Oyplmhhv0?si=b1cURex3kp_Awv4C'),
(12, 'Summer Hikaru Died', 'Mokumokuren', 'It has Hikaru\'s face. It has Hikaru\'s voice. It even has Hikaru\'s memories. But whatever came down from the mountains six months ago isn\'t Yoshiki\'s best friend. Whatever it is, it\'s dangerous. Carrying on at school and hanging out as if nothing has changed—as if Hikaru isn\'t gone—would be crazy...but when it looks so very like Hikaru...and acts so very like Hikaru...', 4.6, 0, 'Chilling yet beautiful storytelling.', 'Horror', 25, '', 'https://www.youtube.com/embed/AdHSBlXGgDI?si=wC6N1xd_F1EAfIE_'),
(13, 'The Time I Got Reincarnated as a Slime', 'Fuse', 'As players of Monster Hunter and Dungeons & Dragons know, the slime is not exactly the king of the fantasy monsters. Satoru Mikami is an ordinary 37-year-old corporate worker living in Tokyo. He is almost content with his monotonous life, despite the fact that he doesn\'t have a girlfriend. During a casual encounter with his colleague, an assailant pops out of nowhere and stabs him. While succumbing to his injuries, a mysterious voice echoes in his mind and recites a series of commands which he could not make sense of. So when a 37-year-old Tokyo salaryman dies and wakes up in a unfamiliar world of elves and magic, he\'s a little disappointed to find he\'s become a blind, boneless slime monster. Mikami\'s middle age hasn\'t gone as he planned: He never found a girlfriend, he got stuck in a dead-end job, and he was abruptly stabbed to death in the street at 37. So when he wakes up in a new world straight out of a fantasy RPG, he\'s disappointed but not exactly surprised to find that he\'s not a knight or a wizard but a blind slime demon. But there are chances for even a slime to become a hero', 4.9, 0, 'Unique and entertaining isekai.', 'Fantasy', 148, '', 'https://www.youtube.com/embed/XIIqgWUtPpk?si=YoHN0nB_2_SM70Ha'),
(14, 'Wind Breaker', 'Jo Yongseok', 'Haruka Sakura wants nothing to do with weaklings — He‘s only interested in the strongest of the strong. He just started at Furin High School, a school full of near-dropouts known only for their brawling strength. A strength they use to protect their town from anyone who wishes it ill. But Saruka\'s not interested in playing the hero or being part of any sort of team. He just wants to fight his way to the top!', 4.6, 0, 'Thrilling cycling adventures.', 'Sports', 168, '', 'https://www.youtube.com/embed/yDgs3QALqDo?si=CnNkK-Y4yVWPFv1v'),
(15, 'Yona of the Dawn', 'Mizuho Kusanagi', 'Princess Yona lives an ideal life as the only princess of her kingdom. Doted on by her father, the king, and protected by her faithful guard Hak, she cherishes the time spent with the man she loves, Su-won. But everything changes on her 16th birthday when tragedy strikes her family!', 4.8, 0, 'A journey of self-discovery.', 'Romance', 261, '', 'https://www.youtube.com/embed/CmH4BAd_Wjw?si=lcmtwr_fqTQsmJC3');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `ID` int(11) NOT NULL,
  `Genre` varchar(100) NOT NULL,
  `Song_Name` varchar(255) NOT NULL,
  `Artist_Name` varchar(255) DEFAULT NULL,
  `Song_URL` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`ID`, `Genre`, `Song_Name`, `Artist_Name`, `Song_URL`) VALUES
(1, 'Fantasy', 'Die For You', 'Valorant', 'https://youtu.be/h7MYJghRWt0?si=bnpJ9pYl6LNKgd_7'),
(2, 'Action', 'Supermassive Black Hole', 'Muse', 'https://youtu.be/rinkviEmeXk?si=wKWt5YXiy_qfSsB3'),
(3, 'Romance', 'Fantastic', 'Arcane', 'https://youtu.be/t9mpyRzipww?si=m2jMIMgJAqPvYaoQ'),
(4, 'Horror', 'Coven', 'League of Legends', 'https://youtu.be/GS4KAWg2tXw?si=sJDKHm_hmvIwLJvi'),
(5, 'Sports', 'Bling Bang Bang Born', 'Creepy NUts', 'https://youtu.be/mLW35YMzELE?si=JFRhviz95wMobo6I'),
(6, 'Comedy', 'Yakety Sax', 'Boots Randolph', 'https://www.youtube.com/watch?v=ZnHmskwqCCQ'),
(7, 'Romance', 'Sailor Song', 'Gigi Pervez', 'https://youtu.be/m0NZ-aH0G1g?si=XBd09ghdZszjzQl9');

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE `reader` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT 'Reader'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reader`
--

INSERT INTO `reader` (`ID`, `Email`, `Name`, `Password`, `Type`) VALUES
(1, 'alice.johnson@example.com', 'Alice Johnson', '482c811da5d5b4bc6d497ffa98491e38', 'Reader'),
(2, 'atika@gmail.com', 'Atika', 'atiks123', 'Admin'),
(3, 'bob.smith@example.com', 'Bob Smith', '3fc0a7acf087f549ac2b266baf94b8b1', 'Reader'),
(4, 'charlie.brown@example.com', 'Charlie Brown', '0e88c5706dc5f028ac7c7d31d6cd1538', 'Reader'),
(5, 'diana.prince@example.com', 'Diana Prince', 'c5332049d013fe6d38f6b4da5570988a', 'Reader'),
(6, 'ethan.hunt@example.com', 'Ethan Hunt', '2b1c7bfad83921b5cf3ce141d0ef7e98', 'Reader'),
(7, 'fiona.gallagher@example.com', 'Fiona Gallagher', '96b33694c4bb7dbd07391e0be54745fb', 'Reader'),
(8, 'george.harris@example.com', 'George Harris', 'fc7d1fd985c9a23bfdf8b5ac4bde76a7', 'Reader'),
(9, 'hannah.baker@example.com', 'Hannah Baker', 'f43af286e6f31c8d21db468e94521345', 'Reader'),
(10, 'ivy.carter@example.com', 'Ivy Carter', '50ec69698bcb232f5489bffebd9e0b37', 'Reader'),
(11, 'jack.daniels@example.com', 'Jack Daniels', 'b8fe4632dbd0d6a187dd98e1d1b434a8', 'Reader'),
(12, 'mercy@gmail.com', 'Mercy', 'narc123', 'Admin'),
(13, 'puja@gmail.com', 'Puja', 'pujalol', 'Admin'),
(14, 'rehanabegumec@gmail.com', 'narc', '$2y$10$EQYJXdrdDuXhwrdN8ZgHIOxlBeW4AXUm72xOC.gwd06lHZauDYcmS', 'Reader'),
(15, 'crazytangogirl@gmail.com', 'mell', '$2y$10$su1dEwjzNAiQKh8p3V0KZuBvwc0dXIcdzFipo5RG4WhW1n5ooE2iS', 'Reader');

-- --------------------------------------------------------

--
-- Table structure for table `webnovels`
--

CREATE TABLE `webnovels` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Summary` mediumtext NOT NULL,
  `Rating` float NOT NULL,
  `Likes` int(11) NOT NULL DEFAULT 0,
  `Review` varchar(255) NOT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `Chapters` int(11) DEFAULT NULL,
  `Covers` varchar(1000) NOT NULL DEFAULT '',
  `YT_Link` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webnovels`
--

INSERT INTO `webnovels` (`ID`, `Name`, `Author`, `Summary`, `Rating`, `Likes`, `Review`, `Genre`, `Chapters`, `Covers`, `YT_Link`) VALUES
(1, 'Advent of the Three Calamities', 'Zhao Yu', '[From the Author of Author\'s POV...]  Emotions are like a drug to us.  The more we experience them, the more we become addicted.', 4.7, 0, 'A high-stakes fantasy with a dark twist.', 'Fantasy', 522, '', 'https://www.youtube.com/embed/B8vtnVWrR64?si=crftg4ZDN1McLkzr'),
(2, 'Cultivation Online', 'Lars Lehoux', 'Yuan was born with an incurable illness that left him blind at a young age and crippled a few years later, rendering everything below his head useless. Deemed hopeless and irredeemable, his parents quickly gave up on him, and the world ignored him.  In this dark and still world, his younger sister became his sole reason for living.', 4.6, 0, 'A captivating story with online elements.', 'Fantasy', 1820, '', 'https://www.youtube.com/embed/q8oQHLxGWsw?si=Hv2SFfQQoMx1msEE'),
(3, 'I Was Mistaken as a Monstrous Genius Actor', 'Si Yeong', 'I, Kang Woojin, was quitting my design work and became a jobless person. The next day, my friend took me to auditions and I was forced to perform. As i was given a script, the void space appeared in my mind and forced me to relive the character. I got stabbed. Became a serial killer. Became an Exorcist. As I become an actor, the misunderstandings keeps growing day by day.', 4.5, 0, 'A hilarious yet heartfelt journey.', 'Comedy', 200, '', 'https://www.youtube.com/embed/ox3SAwascO0?si=WHsfUBB7E17SnC-s'),
(4, 'Lord of Mysteries 2: Circle of Inevitability', 'Cuttlefish That Loves Diving', 'Sequel to Lord of Mysteries', 4.6, 1, 'A great sequel with twists and turns.', 'Fantasy', 1162, '', 'https://www.youtube.com/embed/11AqozFdq9E?si=iQ4sR_Wrn--AaAFA'),
(5, 'Lord of the Mysteries', 'Cuttlefish That Loves Diving', 'With the rising tide of steam power and machinery, who can come close to being a Beyonder? Shrouded in the fog of history and darkness, who or what is the lurking evil that murmurs into our ears?  Waking up to be faced with a string of mysteries, Zhou Mingrui finds himself reincarnated as Klein Moretti in an alternate Victorian era world where he sees a world filled with machinery, cannons, dreadnoughts, airships, difference machines, as well as Potions, Divination, Hexes,', 4.8, 0, 'A complex and mind-bending story.', 'Action', 1409, '', 'https://www.youtube.com/embed/11AqozFdq9E?si=iQ4sR_Wrn--AaAFA'),
(6, 'Overgeared', 'Park Saenal', 'As Shin Youngwoo has had an unfortunate life and is now stuck carrying bricks on construction sites. He even had to do labor in the VR game, Satisfy! However, luck would soon enter his hopeless life. His character, ‘Grid’, would discover the Northern End Cave for a quest, and in that place, he would find ‘Pagma’s Rare Book’ and become a legendary class player…', 4.8, 0, 'A story of redemption and growth.', 'Action', 500, '', 'https://www.youtube.com/embed/a0TqzhgafLg?si=UrIgl_hVxEes7pow'),
(7, 'Return of the Mount Hua Sect', 'Benguil', 'The 13th disciple of the Mount Hua Sect, one of the greatest third generation swordsmen, the Plum Blossom Sword Saint: Chung Myung. After defeating the Heavenly Demon and ending his reign of chaos, Chung Myung breathed his last on the summit of the Heavenly Demon Sect’s mountain.  Hundreds of years passed, and he was revived as a child.', 4.7, 0, 'A martial arts tale filled with tension.', 'Action', 1600, '', 'https://www.youtube.com/embed/JYDwTQC5TlE?si=AwcKuhyXjv7gfSp_'),
(8, 'Reverend Insanity', 'Gu Zhen Ren', 'With his Three Fundamental Views* unrighteous, the demon is reborn. An old dream in the ancient days, a new author with an identical name. An old story about a time traveler who was constantly being reborn. An eccentric world that grows, cultivates, and uses Gu. The Spring Autumn Cicada, Moonlight Gu, Liquor worm, Comprehensive Golden Light Worm, Fine Black Hair Gu, Hope Gu. . . . . ', 4.7, 0, 'A dark tale of cultivation and strategy.', 'Action', 2334, '', 'https://www.youtube.com/embed/8sekyV_o2pM?si=pZFZdFum4W86D7MU'),
(9, 'Shadow Slave', 'Yoo Heon', 'Growing up in poverty, Sunny never expected anything good from life. However, even he did not anticipate being chosen by the Nightmare Spell and becoming one of the Awakened - an elite group of people gifted with supernatural powers. Transported into a ruined magical world, he found himself facing against terrible monsters - and other Awakened - in a deadly battle of survival. What\'s worse, the divine power he received happened to possess a small, but potentially fatal side effect...', 4.5, 0, 'A thrilling dark fantasy.', 'Fantasy', 2085, '', 'https://www.youtube.com/embed/aXwoeXetD4A?si=O3Y_fLOM2op3f6aq'),
(10, 'SSS-Class Suicide Hunter', 'Geun Lee', 'I want an S-Rank skill too! I want it so badly; I could die for it!  [You have awakened an S-Rank skill.] [But you die if you use this skill.] …But it’s not like I will really die because it says that, right. RIGHT?', 4.9, 0, 'An intense tale of survival and revenge.', 'Action', 491, '', 'https://www.youtube.com/embed/Gj-jmBi0aK8?si=scg4a3SfbadoOv9h'),
(11, 'The Author\'s POV', 'Jin Shuang', 'The person whom the world revolves around.  The person who defeats all of his opponents, and ultimately gets the beautiful girl.  The sole existence all villains fear.', 4.5, 0, 'An intriguing story with a twist on the narrative.', 'Fantasy', 864, '', 'https://www.youtube.com/embed/E2Rj2gQAyPA?si=08GjUCI0S3z-bytQ'),
(12, 'The Beginning After The End', 'TurtleMe', 'King Grey has unrivaled strength, wealth, and prestige in a world governed by martial ability. However, solitude lingers closely behind those with great power. Beneath the glamorous exterior of a powerful king lurks the shell of man, devoid of purpose and will.', 4.9, 0, 'An excellent reincarnation story with depth.', 'Action', 550, '', 'https://www.youtube.com/embed/JpQOtc-YgUY?si=SnWT3e87O-IgoFcG'),
(13, 'The Legendary Mechanic', 'Zhu Xian', 'What do you do when you wake up and find yourself inside the very game that you love? What do you do when you realize you that you have not only become an NPC - you have even been thrown back in time to before the game even launched! What will happen when our protagonist\'s two realities coincide? Han Xiao was a professional power leveler before his transmigration. Using his past life\'s knowledge, Han Xiao sweeps through the universe', 4.6, 0, 'A story about technology and progression.', 'Action', 1463, '', 'https://www.youtube.com/embed/mlJWzAOprrI?si=wq7PSYA5hDyzdOXm'),
(14, 'Trash of the Count\'s Family', 'Yoo Ryeo Han', 'When I opened my eyes, I was inside a novel.  [The Birth of a Hero].  [The Birth of a Hero] was a novel focused on the adventures of the main character, Choi Han, a high school boy who was transported to a different dimension from Earth, along with the birth of the numerous heroes of the continent.  I became a part of that novel as the trash of the Count’s family, the family that oversaw the territory where the first village that Choi Han visits is located.  The problem is that Choi Han becomes twisted after that village, and everyone in it, are destroyed by assassins.  The bigger problem is the fact that this stupid trash who I’ve become doesn’t know about what happened in the village and messes with Choi Han, only to get beaten to a pulp.  “…This is going to be a problem.”  I feel like something serious has happened to me.   But it was worth trying to make this my new life.', 4.7, 0, 'A blend of comedy, drama, and adventure.', 'Comedy', 890, '', 'https://www.youtube.com/embed/ZOjssmKaaa4?si=Hae5U3L6fZMcjhtk'),
(15, 'Under the Oak Tree', 'Kim So-Ra', 'A flawless love story of the flawed. Stuttering lady Maximilian is forced into a marriage with Sir Riftan, but he leaves on a campaign after their wedding night. 3 years later, he triumphantly returns, ready to cherish her. As life with her husband finally begins, she only has one question — does she deserve this love and happiness?', 4.6, 0, 'A heartwarming yet tragic romance.', 'Romance', 360, '', 'https://www.youtube.com/embed/J4Goax1_kbE?si=pCnYv2Y_KTxJ-kn2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`Bookmark_ID`);

--
-- Indexes for table `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reader`
--
ALTER TABLE `reader`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `webnovels`
--
ALTER TABLE `webnovels`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `Bookmark_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `manga`
--
ALTER TABLE `manga`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reader`
--
ALTER TABLE `reader`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `webnovels`
--
ALTER TABLE `webnovels`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
