-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 04:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pictureindexdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `actorID` int(11) NOT NULL,
  `actorName` varchar(200) NOT NULL,
  `actorPic` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`actorID`, `actorName`, `actorPic`) VALUES
(500001, 'Hiroshi Nagano', './actorPics/Hiroshi Nagano.jpg'),
(500002, 'Yoshimoto Takami', './actorPics/Yoshimoto Takami.jpg'),
(500003, 'Takeshi Tsuruno', './actorPics/Takeshi Tsuruno.jpg'),
(500004, 'Takeshi Yoshioka', './actorPics/Takeshi Yoshioka.jpg'),
(500005, 'Kajiwara Gakuto', './actorPics/Kajiwara Gakuto.jpg'),
(500006, 'Murakawa Rie', './actorPics/Murakawa Rie.jpg'),
(500007, 'Koga Aoi', '/actorPics/Koga Aoi.jpg'),
(500008, 'Park Romi', ' /actorPics/Park Romi.jpg'),
(500009, 'Kugimiya Rie', ' /actorPics/Kugimiya Rie.jpg'),
(500010, 'Megumi Takamoto', '/actorPics/Megumi Takamoto.jpg'),
(500011, 'Miki Shinichiro', ' /actorPics/Miki Shinichiro.jpg'),
(500012, 'Orikasa Fumiko', ' /actorPics/Orikasa Fumiko.jpg'),
(500013, 'Miyano Mamoru', '/actorPics/Miyano Mamoru.jpg'),
(500014, 'Simu Liu', '/actorPics/Simu Liu.png'),
(500015, 'test1', NULL),
(500016, 'testing', ' /actorPics/Kamen Rider OOO.jpg'),
(500017, 'Simu Liu123121', '/actorPics/Kamen Rider Revice Symbol.png'),
(500018, 'Akabane Kenji', ' /actorPics/Akabane Kenji.jpg'),
(500019, 'Ueda Reina', ' /actorPics/Ueda Reina.jpg'),
(500020, 'Takada Yuuki', ' /actorPics/Takada Yuuki.jpg'),
(500021, 'Shimoji Shino', ' /actorPics/Shimoji Shino.jpg'),
(500022, 'Yukari Tamura', ' /actorPics/Yukari Tamura.jpg'),
(500023, 'Kensuke Takahashi', ' /actorPics/Kensuke Takahashi.png'),
(500024, 'Akane Sakanoue', '/actorPics/Akane Sakanoue.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `characterID` int(20) NOT NULL,
  `characterName` varchar(200) NOT NULL,
  `characterPic` text DEFAULT NULL,
  `characterPosition` int(11) NOT NULL,
  `showsID` int(20) DEFAULT NULL,
  `actorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`characterID`, `characterName`, `characterPic`, `characterPosition`, `showsID`, `actorID`) VALUES
(400001, 'Daigo Madoka', './characterPics/Daigo Madoka.jpg', 1, 300001, 500001),
(400002, 'Rena Yanase', './characterPics/Rena Yanase.jpg', 1, 300001, 500002),
(400003, 'Komi Shouko', './characterPics/Komi Shouko.jpg', 1, 300010, 500007),
(400004, 'Hitohito Tadano', '/characterPics/Hitohito Tadano.jpg', 1, 300010, 500005),
(400005, 'Najimi Osana', '/characterPics/Najimi Osana.jpg', 0, 300010, 500006),
(400006, 'Edward Elric', '/characterPics/Edward Elric.jpg', 1, 300024, 500008),
(400007, 'Alphonse Elric', '/characterPics/Alphonse Elric.jpg', 1, 300024, 500009),
(400008, 'Winry Rockbell', '/characterPics/Winry Rockbell.jpg', 0, 300024, 500010),
(400009, 'Roy Mustang', '/characterPics/Roy Mustang.jpg', 0, 300024, 500011),
(400010, 'Riza Hawkeye', '/characterPics/Riza Hawkeye.jpg', 0, 300024, 500012),
(400011, 'Ling Yao', '/characterPics/Ling Yao.jpg', 0, 300024, 500013),
(400012, 'Xu Shang-Chi', '/characterPics/Xu Shang-Chi.jpg', 1, 300029, 500014),
(400013, 'Xu Shang-Chi', '/characterPics/Xu Shang-Chi.jpg', 0, 300030, 500007),
(400015, 'test1', NULL, 1, 300030, NULL),
(400016, 'Edward Elric', '/characterPics/Kamen Rider Revice Symbol.png', 0, 300030, NULL),
(400017, 'Najimi Osana', NULL, 1, 300030, 500009),
(400018, 'Winry Rockbell', NULL, 1, 300030, 500015),
(400019, 'Rena Yanase', NULL, 1, 300030, 500016),
(400020, 'Lugh Tuatha Dé', '/characterPics/Lugh Tuatha Dé.jpg', 1, 300028, 500018),
(400021, 'Dia Viekone', '/characterPics/Dia Viekone.jpg', 1, 300028, 500019),
(400022, 'Tarte', '/characterPics/Tarte.jpg', 1, 300028, 500020),
(400023, 'Maha ', '/characterPics/Maha.jpg', 1, 300028, 500021),
(400024, 'Goddess', '/characterPics/Goddess.jpg', 0, 300028, 500022),
(400025, 'Daichi Ozora', '/characterPics/Daichi Ozora.jpg', 1, 300034, 500023);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genreID` int(20) NOT NULL,
  `genreName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genreID`, `genreName`) VALUES
(1, 'Sci-Fi'),
(2, 'Comedy'),
(3, 'Suspense'),
(4, 'Horror'),
(5, 'Adventure'),
(6, 'Action'),
(7, 'Fantasy'),
(8, 'Slice Of Life'),
(9, 'Romance'),
(10, 'Mystery'),
(11, 'Work Life'),
(12, 'Sports'),
(13, 'Gourmet'),
(14, 'Supernatural'),
(15, 'Tokusatsu'),
(16, 'Superhero'),
(17, 'Cyberpunk'),
(18, 'Detective Fiction'),
(19, 'Drama'),
(20, 'Music'),
(21, 'Game'),
(22, 'Thriller'),
(23, 'Psychological'),
(24, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `genreshows`
--

CREATE TABLE `genreshows` (
  `genreShowsID` int(11) NOT NULL,
  `genreID` int(11) DEFAULT NULL,
  `showsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genreshows`
--

INSERT INTO `genreshows` (`genreShowsID`, `genreID`, `showsID`) VALUES
(117, 1, 300001),
(118, 6, 300001),
(119, 15, 300001),
(120, 16, 300001),
(121, 6, 300002),
(122, 1, 300002),
(123, 16, 300002),
(124, 15, 300002),
(125, 6, 300003),
(126, 1, 300003),
(127, 16, 300003),
(128, 15, 300003),
(129, 6, 300004),
(130, 2, 300004),
(131, 7, 300004),
(132, 1, 300004),
(133, 16, 300004),
(134, 15, 300004),
(135, 6, 300005),
(136, 2, 300005),
(137, 17, 300005),
(138, 18, 300005),
(139, 1, 300005),
(140, 16, 300005),
(141, 15, 300005),
(146, 6, 300007),
(147, 1, 300007),
(148, 16, 300007),
(149, 15, 300007),
(174, 2, 300012),
(175, 7, 300012),
(176, 9, 300012),
(190, 5, 300013),
(191, 7, 300013),
(223, 6, 300015),
(224, 5, 300015),
(225, 7, 300015),
(264, 6, 300019),
(265, 1, 300019),
(270, 5, 300018),
(271, 7, 300018),
(272, 9, 300018),
(273, 8, 300018),
(276, 2, 300021),
(277, 4, 300021),
(278, 14, 300021),
(279, 2, 300017),
(280, 14, 300017),
(281, 1, 300016),
(282, 2, 300014),
(283, 9, 300014),
(284, 8, 300014),
(285, 6, 300011),
(286, 7, 300011),
(287, 2, 300010),
(288, 9, 300010),
(289, 8, 300010),
(290, 6, 300008),
(291, 5, 300008),
(292, 2, 300008),
(293, 19, 300008),
(294, 16, 300008),
(295, 14, 300008),
(296, 15, 300008),
(305, 19, 300025),
(306, 8, 300025),
(309, 6, 300023),
(310, 5, 300023),
(311, 2, 300023),
(312, 1, 300023),
(318, 6, 300026),
(319, 2, 300026),
(320, 7, 300026),
(321, 16, 300026),
(322, 14, 300026),
(323, 15, 300026),
(324, 6, 300006),
(325, 2, 300006),
(326, 16, 300006),
(327, 15, 300006),
(335, 6, 300028),
(336, 19, 300028),
(337, 7, 300028),
(338, 10, 300028),
(339, 9, 300028),
(340, 17, 300027),
(341, 18, 300027),
(342, 1, 300027),
(368, 5, 300031),
(369, 1, 300031),
(372, 19, 300032),
(373, 14, 300032),
(378, 6, 300033),
(379, 5, 300033),
(380, 7, 300033),
(381, 1, 300033),
(383, 6, 300024),
(384, 5, 300024),
(385, 2, 300024),
(386, 19, 300024),
(387, 7, 300024),
(388, 19, 300020),
(389, 7, 300020),
(390, 6, 300009),
(391, 7, 300009),
(392, 10, 300009),
(393, 6, 300029),
(394, 2, 300029),
(395, 16, 300029),
(396, 6, 300034),
(397, 1, 300034),
(398, 16, 300034),
(399, 15, 300034),
(401, 19, 300030),
(402, 20, 300030),
(403, 7, 300022),
(404, 21, 300022);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `memberName` varchar(200) NOT NULL,
  `status` varchar(11) NOT NULL,
  `memberPics` varchar(200) DEFAULT NULL,
  `memberEmail` varchar(50) NOT NULL,
  `memberPhone` varchar(20) NOT NULL,
  `memberGender` varchar(20) NOT NULL,
  `memberAddress` varchar(200) NOT NULL,
  `memberPassword` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `memberName`, `status`, `memberPics`, `memberEmail`, `memberPhone`, `memberGender`, `memberAddress`, `memberPassword`) VALUES
(1, 'Heisenberg', '1', '/memberPics/Phos.jpg', 'Heisenberg@gmail.com', '012-3456789', 'Male', 'Canada', 'Heisenberg123'),
(2, 'Orpheus', '1', '/memberPics/Card - Copy.jpg', 'Orpheus@hotmail.com', '012-3456789', 'Male', 'Malaysia', 'Orpheus123'),
(3, 'Pipo', '0', '/memberPics/Kamen Rider Saber Symbol.png', 'helloWorld@hotmail.com', '012-3456789', 'Male', 'Malaysia', 'pipo123'),
(4, 'Reona', '0', '/memberPics/Reona.jpg', 'Reona@gmail.com', '017-7373123', 'Female', 'Japan', 'reona123');

-- --------------------------------------------------------

--
-- Table structure for table `personal_watch_list`
--

CREATE TABLE `personal_watch_list` (
  `personalWatchListID` int(11) NOT NULL,
  `watchStatus` varchar(200) NOT NULL,
  `watchedEpisode` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `memberID` int(11) NOT NULL,
  `showsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_watch_list`
--

INSERT INTO `personal_watch_list` (`personalWatchListID`, `watchStatus`, `watchedEpisode`, `rating`, `memberID`, `showsID`) VALUES
(1, '3', 11, 1, 2, 300020),
(3, '2', 1, 8, 3, 300020),
(5, '3', 49, 10, 1, 300005),
(6, '3', 48, 10, 1, 300006),
(7, '3', 50, 10, 1, 300026),
(8, '2', 6, NULL, 1, 300019),
(9, '2', 6, NULL, 1, 300018),
(10, '1', NULL, 3, 3, 300026),
(11, '3', 51, 10, 1, 300002),
(12, '3', 48, 7, 3, 300006),
(14, '1', 0, NULL, 1, 300025),
(16, '3', 52, 10, 1, 300001),
(18, '3', 51, 7, 1, 300003),
(21, '1', NULL, 3, 3, 300001),
(22, '2', 6, NULL, 1, 300021),
(23, '3', 49, 9, 1, 300004),
(24, '2', 7, NULL, 1, 300028),
(27, '2', 5, NULL, 1, 300020),
(29, '1', 0, NULL, 1, 300022),
(33, '1', NULL, NULL, 1, 300009),
(34, '2', 12, 8, 2, 300013),
(38, '3', 1, 9, 2, 300051),
(39, '3', 9, 10, 2, 300033);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewID` int(11) NOT NULL,
  `reviewText` text NOT NULL,
  `reviewPostedDate` varchar(20) NOT NULL,
  `reviewPostedTime` text NOT NULL,
  `memberID` int(11) NOT NULL,
  `showsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewID`, `reviewText`, `reviewPostedDate`, `reviewPostedTime`, `memberID`, `showsID`) VALUES
(16, 'godd', '22/11/2021', '06:37:00pm', 1, 300010),
(17, 'yyds', '26/11/2021', '08:35:33pm', 1, 300021),
(20, 'HANS ZIMMER BASS', '20/03/2022', '10:45:12pm', 2, 300051),
(21, 'an overall show that improves everything in animation and story telling', '20/03/2022', '10:47:14pm', 2, 300033);

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `showsID` int(20) NOT NULL,
  `showsName` varchar(200) NOT NULL,
  `showsPic` text DEFAULT NULL,
  `showsType` varchar(20) NOT NULL,
  `episodes` varchar(20) NOT NULL,
  `showStatus` varchar(20) NOT NULL,
  `releaseDate` varchar(20) NOT NULL,
  `finishedDate` varchar(20) NOT NULL,
  `broadcastDay` varchar(20) NOT NULL,
  `broadcastTime` varchar(20) NOT NULL,
  `studios` varchar(200) NOT NULL,
  `score` double(20,2) NOT NULL,
  `synopsis` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`showsID`, `showsName`, `showsPic`, `showsType`, `episodes`, `showStatus`, `releaseDate`, `finishedDate`, `broadcastDay`, `broadcastTime`, `studios`, `score`, `synopsis`, `status`) VALUES
(300001, 'Ultraman Tiga', './showPics/Ultraman Tiga.jpg', 'TV Shows', '52', 'Finish Aired', '07/09/1996', '30/08/1997', 'Saturday', '18:00', 'Tsuburaya Production', 5.33, 'Set in an alternate universe in the year 2007-2010 (2049 in the U.S. dub), giant monsters and conquering aliens start to appear, as was foretold by an apocalyptic prophecy about an uncontrollable chaos over the Earth. Facing the threat, the TPC (Terrestrial Peaceable Consortium) is created along with its branch, GUTS (Global Unlimited Task Squad). Through a holographic message in a capsule found by researchers, the GUTS gets knowledge about a golden pyramid built by an ancient civilization. At the site, three statues of a race of giants who defended early human civilization on Earth about 30,000,000 years ago have been unearthed. GUTS finds the three ancient statues, but two of them are destroyed by the monsters Golza and Melba. The third one gains life from the spiritual energy of officer Daigo, descendant of the ancient race. Daigo and the remaining statue merge into a single being, made of light. Shortly after defeating the two monsters, Daigo is revealed by the hologram of the prophecy that 30 million years in the past, a great evil that not even the giants could stop, destroyed the ancient civilization. Ultraman Tiga is a hero who protects the Earth. He accompanied the children throughout their childhood.\r\n\r\nThe same evil reappears in the finale of the series, the Ruler of Darkness Gatanothor, and his servants, Gijera and Zoiger. Gatanothor defeats Ultraman Tiga with ease, withstanding the Delcalium Light Stream and a modified version of the Zeperion Ray, both Tiga\'s finishes, and turns him back into a stone statue, but the light of humanity is able to turn him into Glitter Tiga, giving him the power to defeat Gatanothor and save the Earth. However, Tiga\'s victory came at a cost. Daigo was no longer able to become Tiga after the Sparklence disintegrated into dust after his final battle. It is revealed that Tiga, although no longer bound to Daigo, and its energy now remain in the hearts of all those who believe in Tiga, inner-strength and justice. Given the right conditions such as times of despair, the sparks will gather and the Tiga statue will be revitalized.', 1),
(300002, 'Ultraman Dyna', './showPics/Ultraman Dyna.jpg', 'TV Shows', '51', 'Finish Aired', '05/09/1997', '28/08/1998', 'Friday', '18:00', 'Tsuburaya Production', 10.00, 'In the year 2019 (seven years after the final episode of Ultraman Tiga), TPC has advanced beyond Earth, and has created a new team, \"Super GUTS\". Humans have begun terraforming Mars and other planets in what is known as the \"Age of the Neo Frontier\". One day, the Neo Frontier is attacked by an alien race known as the Spheres. Shin Asuka has just joined Super GUTS and is in the middle of training maneuvers above Earth\'s atmosphere when he and his comrades are attacked. He proves himself in battle, and can hold his own against ace pilot Ryo Yumimura. However, his ship is damaged and he ejects, after which he encounters a shining light. It is then that a new giant of light merges with the bewildered Shin, saving his life. When the Spheres enter Mars\' atmosphere and merge with the Martian rocks to form monsters, Shin again participates in the battle, now equipped with a mysterious device known as the \"Reflasher\". Upon the Sphere\'s new attack, Shin suddenly transforms into a colossal giant, and manages to protect Mars from a group of monsters sent by the Spheres. The members of Super GUTS quickly catch on that this giant being is not Ultraman Tiga, but a new giant of light, \"Ultraman Dyna\".', 1),
(300003, 'Ultraman Gaia', './showPics/Ultraman Gaia.jpg', 'TV Shows', '51', 'Finish Aired', '05/09/1998', '28/08/1999', 'Saturday', '18:00', 'Tsuburaya Production', 6.50, 'The story takes place in the year 2000. Chrisis, a supercomputer developed the Alchemy Stars (a global network of young geniuses born during the 1980s), predicts around 1996–1997 that Earth and humanity would be annihilated by something known as the \"Radical Destruction Bringer\". Technology developed by the Alchemy Stars is used to form an international defence organization known as Geocentric Universal Alliance against the Radical Destruction (G.U.A.R.D.). This is done secretly, so as to avoid causing a worldwide panic. The eXpanded Interceptive Guards (X.I.G.) is the combat wing of G.U.A.R.D, operating in a floating sky fortress known as the Aerial Base.\r\n\r\n20-year-old Gamu Takayama, a scientist and member of the Alchemy Stars briefly encounters Gaia during some virtual reality experiments he performs with the secret purpose of discovering the will of the Earth, later merging with him in order to fight various monsters that threaten the safety of the Earth. During his battles, he encounters Ultraman Agul, whose human host is Hiroya Fujimiya, a former Alchemy Stars member. Both clash because of their ideals regarding the protection of the Earth but eventually resolve their differences to battle their common enemy.', 1),
(300004, 'Kamen Rider Den-O', './showPics/Kamen Rider Den-O.jpg', 'TV Shows', '49', 'Finish Aired', '28/01/2007', '20/01/2008', 'Sunday', '08:00', 'Toei Company', 9.00, 'Ryotaro Nogami is a young man with a lot of bad luck. One day, he finds a strange pass and things got stranger from a mysterious girl and a large time-traveling train to being possessed by an entity called an Imagin, beings from an alternate future whose kind are attempting to change the past. Though slightly confused about the nature of the crisis, Ryotaro, along with the aid of the hot-headed, violent Imagin, dubbed Momotaros, becomes Kamen Rider Den-O, traveling to different times on the DenLiner to battle the evil Imagin to prevent them from altering the past to affect the present and future. During his adventure, Ryotaro is joined by other Imagin who aid him as well; the lying, manipulating and womanizing Urataros, the herculean (and narcoleptic) Kintaros, and the childish yet powerful Ryutaros. He later meets the mysterious Yuto Sakurai and his bumbling Imagin partner Deneb. Yuto is not only Kamen Rider Zeronos but is the younger incarnation of Ryotaro\'s older sister Airi\'s fiancé, Sakurai, who mysteriously disappeared and is tied to the mysteries involving the Imagin and a person known as the Junction Point.', 1),
(300005, 'Kamen Rider W', './showPics/Kamen Rider W.jpg', 'TV Shows', '49', 'Finish Aired', '06/09/2009', '29/08/2010', 'Sunday', '08:00', 'Toei Company', 10.00, 'Many people live in peace and harmony in Fuuto (風都, Fūto, the \"Windy City\"), an ecologically-minded and wind-powered city. However, this peace is undermined by the Sonozaki Family, who sell mysterious flash drive-like devices called Gaia Memories to criminals and other interested parties. These individuals use the Gaia Memories to become Dopants, committing crimes with the police force powerless to stop them. To make matters worse, the Gaia Memories can cause their users to go insane, to the point where they could die from using the devices unrestrained. After the death of his boss Sokichi Narumi, the self-proclaimed hard-boiled (actually half-boiled) detective Shotaro Hidari works with the mysterious Philip, who possesses a set of purified Gaia Memories, to investigate Dopant-related crimes in Fuuto. With their Gaia Memories and the Double Driver belts, Shotaro and Philip transform and combine into Kamen Rider W to fight the Dopant menace and keep Fuuto safe. While joined in their fight by investigator Ryu Terui, who transforms into Kamen Rider Accel, the mystery of Philip\'s past, his relation to the Sonozaki Family, and their Museum organization are revealed.', 1),
(300006, 'Kamen Rider OOO', './showPics/Kamen Rider OOO.jpg', 'TV Shows', '48', 'Finish Aired', '05/09/2010', '28/08/2011', 'Sunday', '08:00', 'Toei Company', 8.50, 'Eiji Hino is a traveling man who has no place to call home and a tragic past. When metallic creatures known as the Greeed awaken after their 800-year slumber to attack humans and feed off of their desires, the disembodied arm of the Greeed named Ankh gives Eiji a belt and three Medals to fight the other Greeed as Kamen Rider OOO. The mysterious Kougami Foundation approaches Eiji and begins assisting him in his fight against the Greeed, though their true motives are not clear. As Eiji fights the Greeed and their Yummy monsters, learning more of the Greeed and Ankh, he starts to find a purpose beyond his journey.', 1),
(300007, 'Ultraman Trigger: New Generation Tiga', './showPics/Ultraman Trigger.jpg', 'TV Shows', 'Unconfirmed\n', 'On Aired', '10/07/2021', 'Unconfirmed\n', 'Saturday', '09:00', 'Tsuburaya Production', 0.00, '30 million years prior, a giant of light sealed the darkness and went into slumber in the red star. In the present day, GUTS-Select team was formed while Martian settlement Kengo Manaka lived his life as a botanist. Unfortunately his peaceful life was disturbed by a monster attack at the same time when the sealed darkness started to move. Kengo has a fated encounter the giant of light from the past and his name is Ultraman Trigger.', 1),
(300008, 'Kamen Rider Revice', './showPics/Kamen Rider Revice.jpg', 'TV Shows', 'Unconfirmed', 'On Aired', '05/09/2021', 'Unconfirmed', 'Sunday', '09:00', 'Toei Company', 0.00, 'In 1971, a scientific expedition in Latin America led to the discovery of Vistamps, artifacts that can extract a person\'s inner devil, and the remains of the first devil Giff. In the present, Giff\'s remains were stolen by a demon cult called Deadmans, who seek to resurrect him by using Proto Vistamps to convert peoples\' inner devils to their fold. Opposing Deadmans is an organization called Fenix, which developed the Revice Driver for someone who has tamed their inner devil. Ikki Igarashi, who runs a sentō with his family, ends up acquiring the belt while forming a pact with his inner devil, Vice, to fight Deadmans together as Kamen Riders Revi and Vice.\r\n\r\nIkki\'s younger brother Daiji, a Fenix operative who was intended to become Revice but failed to out of fear, begins to avoid Ikki until his own inner demon, Kagero, takes over his body and obtains the means to transform into Kamen Rider Evil, determined to defeat Ikki. In response, disgraced Fenix operative Hiromi Kadota gains the means to become Kamen Rider Demons to assist Revice against Evil and Deadmans.', 1),
(300009, 'Shingeki no Kyojin: The Final Season Part 2', './showPics/Shingeki no Kyojin_The Final Season Part 2.jpg', 'TV Shows', 'Unconfirmed', '12:00', '10/01/2022', 'Unconfirmed', 'Monday', 'Unconfirmed', 'MAPPA', 4.50, 'The season follows Gabi Braun and Falco Grice, young Eldian Warrior candidates seeking to inherit Reiner\'s Armored Titan four years after the failed mission to claim the Founding Titan. Marley plans to invade Paradis to strengthen their weakening military and recover the Founding Titan. With the Survey Corps on the Marley shoreline, Gabi, Falco, Reiner, and other Titans go to war with the Paradis soldiers as Eren Jaeger reveals his new plan of attack on the Marleyan invaders: annihilation.\r\n\r\nAs both sides take a heavy death toll, both the Marleyan Warriors and the Survey Corps must question the best approach to claiming victory over the other side. Eren\'s comrades begin to realize that he has begun to walk down a questionable path, while Gabi and Falco must combat their internal tensions over the supposed \"devils\" of Paradis.', 1),
(300010, 'Komi-san wa, Comyushou desu.', './showPics/Komi-san wa, Comyushou desu..jpg', 'TV Shows', 'Unconfirmed', 'On Aired', '07/10/2021', 'Unconfirmed', 'Thursday', '00:00', 'OLM', 0.00, 'Hitohito Tadano is an ordinary boy who heads into his first day of high school with a clear plan: to avoid trouble and do his best to blend in with others. Unfortunately, he fails right away when he takes the seat beside the school\'s madonna—Shouko Komi. His peers now recognize him as someone to eliminate for a chance to sit next to the most beautiful girl in class.\r\n\r\nGorgeous and graceful with long, dark hair, Komi is universally adored and immensely popular despite her mysterious persona. However, unbeknownst to everyone, she has crippling anxiety and a communication disorder which prevents her from wholeheartedly socializing with her classmates.\r\n\r\nWhen left alone in the classroom, a chain of events forces Komi to interact with Tadano through writing on the blackboard, as if in a one-way conversation. Being the first person to realize she cannot communicate properly, Tadano picks up the chalk and begins to write as well. He eventually discovers that Komi\'s goal is to make one hundred friends during her time in high school. To this end, he decides to lend her a helping hand, thus also becoming her first-ever friend.', 1),
(300011, 'takt op. Destiny', './showPics/takt op. Destiny.jpg', 'TV Shows', 'Unconfirmed', 'On Aired', '06/10/2021', 'Unconfirmed', 'Wednesday', '00:00', 'MAPPA', 0.00, 'The United States of America has been in chaos ever since the emergence of D2s, an invasive species originating from a black meteorite that fell to Earth. A public decree banned citizens from playing any melodies, to prevent further casualties caused by the D2s\' hatred for music—even now, in 2047, this prohibition is still in effect. Humanity\'s only form of defense against the D2s are Musicarts, young women representing pieces of classical music; and Conductors, the ones controlling them.\r\n\r\nTakt Asahina, an aloof piano prodigy, finds himself transformed into a Conductor following a spontaneous D2 attack. The same incident kills Anna Schneider\'s younger sister, Cosette, and brings Takt into contact with his Musicart, Destiny. Searching for a means of stabilizing the pact between themselves, Takt and Destiny—alongside Anna—embark on a perilous journey to the Symphonica Headquarters in New York City.\r\n\r\nTakt is in a hurry to reach the city so that he can play the piano again, even though his passion attracts the creatures he has come to despise. Meanwhile, Destiny\'s sense of duty drags the group into trouble along the way. With a D2-infested path and many more arduous obstacles ahead of them, will the trio make it to New York City in one piece?', 1),
(300012, 'Monster Musume no Iru Nichijou', './showPics/Monster Musume no Iru Nichijou.jpg', 'TV Shows', '12', 'Finish Aired', '08/07/2015', '23/09/2015', 'Wednesday', '00:30', 'Lerche', 0.00, 'With his parents abroad, Kimihito Kurusu lived a quiet, unremarkable life alone until monster girls came crowding in! This alternate reality presents cutting-edge Japan, the first country to promote the integration of non-human species into society. After the incompetence of interspecies exchange coordinator Agent Smith leaves Kimihito as the homestay caretaker of a Lamia named Miia, the newly-minted \"Darling\" quickly attracts girls of various breeds, resulting in an ever-growing harem flush with eroticism and attraction.\r\n\r\nUnfortunately for him and the ladies, sexual interactions between species is forbidden by the Interspecies Exchange Act! The only loophole is through an experimental marriage provision. Kimihito\'s life becomes fraught with an abundance of creature-specific caveats and sensitive interspecies law as the passionate, affectionate, and lusty women hound his every move, seeking his romantic and sexual affections. With new species often appearing and events materializing out of thin air, where Kimihito and his harem go is anyone\'s guess!', 1),
(300013, 'Ousama Ranking', './showPics/Ousama Ranking.jpg', 'TV Shows', '23', 'On Aired', '15/10/2021', 'Unconfirmed\n', 'Friday', '00:55', 'Wit Studio', 8.00, 'The people of the kingdom look down on the young Prince Bojji, who can neither hear nor speak. They call him \"The Useless Prince\" while jeering at his supposed foolishness.\r\n\r\nHowever, while Bojji may not be physically strong, he is certainly not weak of heart. When a chance encounter with a shadow creature should have left him traumatized, it instead makes him believe that he has found a friend amidst those who only choose to notice his shortcomings. He starts meeting with Kage, the shadow, regularly, to the point where even the otherwise abrasive creature begins to warm up to him.\r\n\r\nKage and Bojji\'s unlikely friendship lays the budding foundations of the prince\'s journey, one where he intends to conquer his fears and insecurities. Despite the constant ridicule he faces, Bojji resolves to fulfill his desire of becoming the best king he can be.', 1),
(300014, 'Senpai ga Uzai Kouhai no Hanashi', './showPics/Senpai ga Uzai Kouhai no Hanashi.jpg', 'TV Shows', 'Unconfirmed', 'On Aired', '10/10/2021', 'Unconfirmed', 'Sunday', '01:00', 'Doga Kobo', 0.00, 'At a certain trading company, saleswoman Futaba Igarashi has managed to hold her respectable job for almost two years thanks to the guidance of her senior coworker—Harumi Takeda. However, due to Igarashi\'s short stature, Takeda often teases her and treats her like a kid, leaving Igarashi constantly annoyed by his antics.\r\n\r\nDespite this, Igarashi notices Takeda\'s reliability as he is always ready to help whenever something at their workplace goes awry. As Igarashi and Takeda spend more time together, their relationship soon develops further than simply being coworkers at the office.', 1),
(300015, 'Saihate no Paladin', './showPics/Saihate no Paladin.jpg', 'TV Shows', '12', 'On Aired', '09/10/2021', 'Unconfirmed\n', 'Saturday', '22:00', 'Children\'s Playground Entertainment', 0.00, 'Born into a new world after a life of stagnancy, Will awakens to the faces of a skeleton, a ghost, and a mummy. Living in the ruins of a city long fallen, the three raise Will as their own. The skeleton— Blood—teaches him to fight; the ghost—Gus—teaches him magic; and the mummy—Mary—teaches him religion and responsibility. Most importantly, they all teach him love.\r\n\r\nAs Will grows up and learns about the world he was born into, he prepares for the day when he must finally set out on his own. For Will, this journey includes a lifelong promise. At their coming-of-age, every adult is required to swear an oath to the god of their choice, with the strength of the pledge affecting the degree of their sworn god\'s blessing.\r\n\r\nWith his departure approaching, Will must prepare to accept the truth of his undead guardians and embark into a world that even they don\'t know the state of. Will discovers, however, that every oath must be fulfilled, one way or another.', 1),
(300016, 'Tsuki to Laika to Nosferatu', './showPics/Tsuki to Laika to Nosferatu.jpg', 'TV Shows', 'Unconfirmed', 'On Aired', '04/10/2021', 'Unconfirmed', 'Monday', '01:35', 'Arvo Animation', 0.00, 'On November 23, 1957, the whole world witnessed the Federal Republic of Zirnitra\'s monumental achievement of sending the first live animal—a dog—to outer space. Since then, the space race between the confederacy and its competitor, the United Kingdom of Arnack, has intensified; the two countries hope to one day send humans to the cosmos above.\r\n\r\nAs a dog\'s biology is inherently different from a human\'s anatomy, there is no way to perfectly identify the risks involving space travel and its effects on an individual\'s body without actually sending someone for observation. However, Zirnitra\'s government has a potential solution: to experiment on vampires, whose biological similarity to humans is too significant to ignore.\r\n\r\nDespite being forcibly taken from her home in the mountains, vampire Irina Luminesk shows no resistance and is even willing to train as a test subject. Lev Leps, a former top candidate to become the first human cosmonaut, is designated to accompany Irina and act as her guide. Through their time together, Irina and Lev begin to develop a mutual love for outer space, bringing them closer together.', 1),
(300017, 'Kyuuketsuki Sugu Shinu', './showPics/Kyuuketsuki Sugu Shinu.jpg', 'TV Shows', 'Unconfirmed', 'On Aired', '04/10/2021', 'Unconfirmed', 'Monday', '23:00', 'Madhouse', 0.00, 'Vampires are known to have many weaknesses that balance out their incredible power, but the vampire lord Draluc happens to be weak to pretty much anything.\r\n\r\nThe vampire hunter Ronald receives a job to infiltrate the castle of the so-called \"Invincible Progenitor\" and rescue a woman\'s son from the monster within. But upon arriving, he is dumbfounded to discover that the vampire quickly turns to ash by something as trivial as a clap of his hands! Moreover, the child he was sent to save had merely wandered in to play the vampire lord\'s video games while he slept!\r\n\r\nIn a disastrous turn of events, Draluc\'s castle is destroyed, and the fragile vampire decides to move in with the hunter who has only just defeated him. Ronald, Draluc, and the vampire\'s pet armadillo John form quite the eccentric team as they are forced to work together while fending off Ronald\'s violent editor, the lesser vampires plaguing the city, and even their fellow vampire hunters.', 1),
(300018, 'Shin no Nakama ja Nai to Yuusha no Party wo Oidasareta node, Henkyou de Slow Life suru Koto ni Shimashita', './showPics/Shin no Nakama ja Nai to Yuusha no Party wo Oidasareta node, Henkyou de Slow Life suru Koto ni Shimashita.jpg', 'TV Shows', '13', 'On Aired', '06/10/2021', 'Unconfirmed\n', 'Wednesday', '23:30', 'Studio Flad', 0.00, 'Far away from the reaches of demons and war, near the borderland of Zoltan, D-Rank adventurer Red lives a normal existence. Through perseverance and hard work, his dream of starting his own apothecary and peaceful life in the countryside finally came true. Abruptly, Red gets a live-in partner and assistant named Rit—the princess of Duchy Loggervia and an adventurer herself—who gives everything up to join him.\r\n\r\nAlthough honest, kind, and loved by all, Red has a secret shared only with Rit: his real name is Gideon, brother of Ruti Ragnason, the \"Hero\" and a former member of her party. Ares Drowa, the \"Sage,\" kicked Red out of their party after their war against the Demon Lord after deciding he was weak and insignificant. Now, even though Red has left the Hero\'s party behind by assuming a new life together with Rit, his past has yet to let go of him.', 1),
(300019, 'Kyoukai Senki', './showPics/Kyoukai Senki.jpg', 'TV Shows', 'Unconfirmed', 'On Aired', '05/10/2021', 'Unconfirmed\n', 'Tuesday', '01:30', 'Sunrise Beyond', 0.00, 'In the year 2061 AD, Japan has lost its sovereignty. The Japanese people spend their days as oppressed citizens after being divided and ruled by the four major trade factions. The country became the forefront of the world following the deployment of AMAIM—a humanoid special mobile weapon—by each economic bloc.\r\n\r\nOne day, Amou Shiiba, a boy who loves machines, meets Gai, an autonomous thinking A.I. The encounter leads Amou to cast himself into the battle to reclaim Japan, piloting the AMAIM Kenbu that he built himself.', 1),
(300020, 'Mushoku Tensei: Isekai Ittara Honki Dasu', './showPics/Mushoku Tensei_Isekai Ittara Honki Dasu.jpg', 'TV Shows', '11', 'Finish Aired', '11/01/2021', '22/03/2021', 'Monday', '00:00', 'Studio Bind', 6.33, 'Despite being bullied, scorned, and oppressed all of his life, a thirty-four-year-old shut-in still found the resolve to attempt something heroic—only for it to end in a tragic accident. But in a twist of fate, he awakens in another world as Rudeus Greyrat, starting life again as a baby born to two loving parents.\r\n\r\nPreserving his memories and knowledge from his previous life, Rudeus quickly adapts to his new environment. With the mind of a grown adult, he starts to display magical talent that exceeds all expectations, honing his skill with the help of a mage named Roxy Migurdia. Rudeus learns swordplay from his father, Paul, and meets Sylphiette, a girl his age who quickly becomes his closest friend.\r\n\r\nAs Rudeus\' second chance at life begins, he tries to make the most of his new opportunity while conquering his traumatic past. And perhaps, one day, he may find the one thing he could not find in his old world—love.', 1),
(300021, 'Mieruko-chan', './showPics/Mieruko-chan.jpg', 'TV Shows', '12', 'On Aired', '03/10/2021', 'Unconfirmed', 'Sunday', '22:00', 'Passione', 8.00, 'Miko Yotsuya\'s eyes water as she fixates on a single spot on her phone—she ignores yet another dreadful, horrific monster that is in her face, uttering the disturbing words: \"Can you see me?\" Before now, Miko enjoyed her unassuming high school days, with late-night horror shows serving only as a form of entertainment. But ever since one fateful day, she is the only person aware of the invisible monsters walking freely among humans.\r\n\r\nCourageously, Miko makes a bold decision: she will never, under any condition, acknowledge the presence of the horrid specters. However, even though she pretends they do not exist, she can still see how they disturb the people around her, especially her best friend, the energetic and lovely Hana Yurikawa. In order to protect them from the monsters\' annoyances, Miko gives it her best to continue her school life and avoid every troublesome crisis—even when they scare her to tears.', 1),
(300022, 'Build Divide: Code Black', './showPics/Build Divide_Code Black.jpg', 'TV Shows', '12', 'On Aired', '10/10/2021', 'Unconfirmed', 'Sunday', '00:30', 'LIDENFILMS', 0.00, '\"I can see it. The way I can win...\"\r\n\r\n\"This time I will beat him. So come at me again... accept! \'Bloom, gambler of souls!\'\"\r\n\r\nIn New Kyoto, a city governed by the \"King,\" one\'s worth is determined by his or her strength in the Build Divide trading card game. Rumors swirl about New Kyoto and its King.\r\n\r\n\"If you defeat the King in Build Divide, any wish will be fulfilled.\" And in order to challenge the King, one must participate in the TCG battle known as Rebuild, and the \"Key\" must be completed.\r\n\r\nEveryone has a wish they long to have fulfilled. Teruto Kurabe, a boy who vows to take down the King, and Sakura Banka, the mysterious girl who guides him, throw themselves into the Rebuild battle. With New Kyoto as the stage, the curtain rises and the battle begins for Teruto and his friends!', 1),
(300023, 'Tengen Toppa Gurren Lagann', './showPics/Tengen Toppa Gurren Lagann.jpg', 'TV Shows', '27', 'Finish Aired', '01/04/2007', '30/09/2007', 'Sunday', '08:30', 'Gainax', 0.00, 'Simon and Kamina were born and raised in a deep, underground village, hidden from the fabled surface. Kamina is a free-spirited loose cannon bent on making a name for himself, while Simon is a timid young boy with no real aspirations. One day while excavating the earth, Simon stumbles upon a mysterious object that turns out to be the ignition key to an ancient artifact of war, which the duo dubs Lagann. Using their new weapon, Simon and Kamina fend off a surprise attack from the surface with the help of Yoko Littner, a hot-blooded redhead wielding a massive gun who wanders the world above.\r\n\r\nIn the aftermath of the battle, the sky is now in plain view, prompting Simon and Kamina to set off on a journey alongside Yoko to explore the wastelands of the surface. Soon, they join the fight against the \"Beastmen,\" humanoid creatures that terrorize the remnants of humanity in powerful robots called \"Gunmen.\" Although they face some challenges and setbacks, the trio bravely fights these new enemies alongside other survivors to reclaim the surface, while slowly unraveling a galaxy-sized mystery.', 1),
(300024, 'Fullmetal Alchemist: Brotherhood', './showPics/Fullmetal Alchemist_Brotherhood.jpg', 'TV Shows', '64', 'On Aired', '05/04/2009', '04/07/2010', 'Sunday', '17:00', 'Bones', 0.00, 'After a horrific alchemy experiment goes wrong in the Elric household, brothers Edward and Alphonse are left in a catastrophic new reality. Ignoring the alchemical principle banning human transmutation, the boys attempted to bring their recently deceased mother back to life. Instead, they suffered brutal personal loss: Alphonse\'s body disintegrated while Edward lost a leg and then sacrificed an arm to keep Alphonse\'s soul in the physical realm by binding it to a hulking suit of armor.\r\n\r\nThe brothers are rescued by their neighbor Pinako Rockbell and her granddaughter Winry. Known as a bio-mechanical engineering prodigy, Winry creates prosthetic limbs for Edward by utilizing \"automail,\" a tough, versatile metal used in robots and combat armor. After years of training, the Elric brothers set off on a quest to restore their bodies by locating the Philosopher\'s Stone—a powerful gem that allows an alchemist to defy the traditional laws of Equivalent Exchange.\r\n\r\nAs Edward becomes an infamous alchemist and gains the nickname \"Fullmetal,\" the boys\' journey embroils them in a growing conspiracy that threatens the fate of the world.', 1),
(300025, '3-gatsu no Lion', './showPics/3-gatsu no Lion.jpg', 'TV Shows', '22', 'Finish Aired', '08/10/2016', '18/03/2017', 'Saturday', '23:00', 'Shaft', 0.00, 'Having reached professional status in middle school, Rei Kiriyama is one of the few elite in the world of shogi. Due to this, he faces an enormous amount of pressure, both from the shogi community and his adoptive family. Seeking independence from his tense home life, he moves into an apartment in Tokyo. As a 17-year-old living on his own, Rei tends to take poor care of himself, and his reclusive personality ostracizes him from his peers in school and at the shogi hall.\r\n\r\nHowever, not long after his arrival in Tokyo, Rei meets Akari, Hinata, and Momo Kawamoto, a trio of sisters living with their grandfather who owns a traditional wagashi shop. Akari, the oldest of the three girls, is determined to combat Rei\'s loneliness and poorly sustained lifestyle with motherly hospitality. The Kawamoto sisters, coping with past tragedies, also share with Rei a unique familial bond that he has lacked for most of his life. As he struggles to maintain himself physically and mentally through his shogi career, Rei must learn how to interact with others and understand his own complex emotions.', 1),
(300026, 'Kamen Rider Ghost', './showPics/Kamen Rider Ghost.png', 'TV Shows', '50', 'Finish Aired', '04/10/2015', '25/09/2016', 'Sunday', '08:00', 'Toei Company', 6.50, 'Takeru Tenkūji, whose father was a ghost hunter who died 10 years earlier, dies at the hands of an evil monster known as a Gamma (眼魔, Ganma, Eye Demon) while trying to protect his childhood friend Akari Tsukimura from an attack. A mysterious hermit brings Takeru back to life and bestows upon him the Ghost Driver transformation belt and a Ghost Eyecon (ゴースト眼魂, Gōsuto Aikon, Ghost Eye Soul), an orb-shaped device which can see ghostly creatures like spirits of dead creatures, Gamma, and other Riders. The hermit tells Takeru that he has 99 days to gather 15 additional heroic Eyecons in order to be brought back to life permanently, and must fight the Gamma as Kamen Rider Ghost to obtain them. He is assisted by the Buddhist monk Onari, who previously supported his father as a ghost hunter, and Akari, who tries to find more scientific and logical reasons behind their supernatural encounters. In his way are Makoto Fukami, a mysterious living young man capable of utilizing a Ghost Driver to transform into Kamen Rider Specter (仮面ライダースペクター, Kamen Raidā Supekutā), and the Gamma led by Chikara Saionji, an associate of Takeru\'s late father, and Alain, the son of the Gamma leader, who later acquires the means to transform into the anti-hero Kamen Rider Necrom (仮面ライダーネクロム, Kamen Raidā Nekuromu).', 1),
(300027, 'Fuuto Tantei', './showPics/Black Clover 2.png', 'TV Shows', 'Unconfirmed', '12:00', 'Unconfirmed', 'Unconfirmed', 'Unconfirmed', 'Unconfirmed', 'Unconfirmed', 0.00, 'Pending up-to-date.....', 1),
(300028, 'Sekai Saikou no Ansatsusha, Isekai Kizoku ni Tensei suru', './showPics/Sekai Saikou no Ansatsusha, Isekai Kizoku ni Tensei suru.jpg', 'TV Shows', 'Unconfirmed', 'On Aired', '06/10/2021', 'Unconfirmed', 'Wednesday', '23:00', 'SILVER LINK.', 0.00, '\"I\'m going to live for myself!\"\r\n\r\nThe greatest assassin on Earth knew only how to live as a tool for his employers—until they stopped letting him live. Reborn by the grace of a goddess into a world of swords and sorcery, he\'s offered a chance to do things differently this time around, but there\'s a catch...He has to eliminate a super-powerful hero who will bring about the end of the world unless he is stopped.\r\n\r\nNow known as Lugh Tuatha Dé, the master assassin certainly has his hands full, particularly because of all the beautiful girls who constantly surround him. Lugh may have been an incomparable killer, but how will he fare against foes with powerful magic?', 1),
(300029, 'Shang-Chi and The Legend of The Ten Rings', './showPics/Shang-Chi and The Legend of The Ten Rings.jpg', 'Movie', '1', 'Finish Aired', '03/09/2021', '03/09/2021', 'Friday', '00:00', 'Marvel Studios', 0.00, 'Shang-Chi, the master of weaponry-based Kung Fu, is forced to confront his past after being drawn into the Ten Rings organization.', 1),
(300030, 'Selection Project', './showPics/Selection Project.jpg', 'TV Shows', '13', 'On Aired', '01/10/2021', 'Unconfirmed', 'Friday', '22:00', 'Doga Kobo', 0.00, 'Due to a weak heart, Suzune Miyama has remained bedridden for most of her childhood. However, despite her illness, she has always dreamed of becoming an idol. Eventually, her opportunity comes in the form of the seventh Selection Project—a brutal series of competitions best known as the starting point of the legendary idol Akari Amasawa.\r\n\r\nAnxious but excited, Suzune enters the preliminary round of Selection Project. Though her singing dazzles the judges and her fellow competitors, Suzune is unfortunately overcome by her nerves and freezes up in the middle of her performance. She recovers quickly, but the stumble is great enough that she loses the winning spot and is disqualified.\r\n\r\nOr so it seems—until Seira Kurusu, the girl Suzune lost to, announces that she plans to drop out of Selection Project, believing Suzune is a more talented singer and therefore deserves the right to compete. Suzune is caught off guard by the decision, but promises Seira that they will meet again as top idols. She prepares herself for the challenging obstacles that lie ahead.', 1),
(300031, 'Sakugan', './showPics/Sakugan.jpg', 'TV Shows', '12', 'On Aired', '07/10/2021', 'Unconfirmed', 'Thursday', '23:30', 'Satelight', 0.00, 'The \"Labyrinth\" is an expansive space deep underground where humans live in clusters known as \"colonies.\" Over the years, the surface has become a distant memory—even perhaps only a fantasy to those who have never experienced its wonders.\r\n\r\nMaking sure humanity survives the harsh conditions of the underground, a colony\'s citizens can take on a variety of specialized jobs. These include \"Workers,\" who mine precious ore to fuel the colonies, and \"Markers,\" who journey into the Labyrinth\'s surprisingly lush environment to bring back information that eases navigation. However, humanity also faces a threat to its existence—creatures called \"kaijuu\" whose sizes range from that of a small child to an enormous building, and are hostile to any human they see. Moreover, kaijuu that are large enough can force their way into the colonies, further increasing their threat level.\r\n\r\nMemenpu is a nine-year-old college graduate whose inventions have greatly benefitted the Workers in her local colony. Recently, however, she has been dreaming of a place with a neverending ceiling not bound by bedrock. These aspirations fuel her desire to become a Marker and explore the Labyrinth\'s vast unknown in search of such a fantastical place. Despite her father Gagumber\'s vehement disagreement, a certain incident with the kaijuu jumpstarts a dangerous yet exciting adventure that will surely alter humanity\'s course forever.', 1),
(300032, 'Platinum End', './showPics/Platinum End.jpg', 'TV Shows', '24', 'On Aired', '08/10/2021', '24/10/2021', 'Friday', '01:18', 'Signal.MD', 0.00, 'Ever since he lost his family in an explosion, Mirai Kakehashi has lived a life of pain and despair. Every day, he endures abuse at the hands of relatives who took him in. As his anguish steadily chips away at his will to live, he is eventually pushed to the brink. Prepared to throw it all away, he stands on the edge of a precipice and takes the leap. However, instead of falling to his death, he enters a trance where he meets a winged being who claims to be his guardian angel. Named Nasse, the angel offers him two priceless abilities and convinces him to go on living.\r\n\r\nWhen Mirai experiences the marvel of his new powers firsthand, he gets a taste of the freedom that was locked away from him for so long. Armed with Nasse\'s gifts, Mirai is flung into a showdown with 12 other individuals, one of which will be chosen to become the next God. In stark contrast to when he wanted to end his life, Mirai is now prepared to do whatever it takes to protect his bleak chance at happiness, lest it be wrenched from his grasp forever.', 1),
(300033, 'Arcane: League of Legends', './showPics/Arcane_League of Legends.jpg', 'Online Shows', '9', 'Finish Aired', '06/11/2021', '20/11/2021', 'Saturday', '23:00', 'Riot Games', 10.00, 'Arcane (titled onscreen as Arcane: League of Legends) is a 2021 animated streaming television series. It is set in the League of Legends universe. The series was announced at the League of Legends tenth anniversary celebration. It was produced by Riot Games and Fortiche, a French animation studio based in Paris. Set in the past relative to the League of Legends universe, Arcane serves as a prequel to the game and retells the origin stories of several characters from Piltover and Zaun. Like the game which it is based on, Arcane is aimed at a \"16+\" audience.\r\n\r\nThe series has received widespread universal acclaim from critics, who praised the blend of hand-drawn and CGI animation as well as the story, world-building, characters and voice acting. It also set the record as Netflix\'s best-rated show so far within a week of its premiere and ranked number one on the Netflix Top 10 chart in 52 countries as well as reaching number two in the United States. On November 20, 2021, following the conclusion of Arcane\'s first season, Riot Games and Netflix announced that a second season was in production for a post-2022 release.', 1),
(300034, 'Ultraman X', './showPics/Ultraman X.jpg', 'TV Shows', '25', 'Finish Aired', '14/07/2015', '05/01/2016', 'Tuesday', '18:00', 'Tsuburaya Production', 0.00, 'A solar flare called the Ultra Flare (ウルトラフレア, Urutora Furea) has awakened mysterious OOPArts known as Spark Dolls from the depths of the earth and the ocean, materializing them into rampaging monsters that terrorize the Earth. Due to this, UNVER was formed to gather, collect and secure unstable Spark Dolls and a new attack team was formed, Xio to combat monster threats.\r\n\r\nFifteen years later, Daichi Ozora, a member of Xio\'s Lab Team who was orphaned when his parents got lost in the Ultra Flare, bonds and transforms into Ultraman X to battle threats from both aliens and monsters. He soon learns of the truth behind Ultra Flare and resolves to help Ultraman X to regain his physical body after the incident had trapped him in the form of computer data.', 1),
(300035, 'Requiem for a Dream', './showPics/Requiem for a Dream.jpg', 'Movie', '1', 'Aired', '27/10/2000', '27/10/2000', 'Friday', '12:00', 'Thousand Words Protozoa Pictures', 0.00, 'Sara, a widow who lives a retired life, develops an obsession to lose weight and starts taking pills. However, she gets addicted to the medication and it takes a toll on her mental health.', 1),
(300036, 'Joker', './showPics/Joker.jpg', 'Movie', '1', 'Aired', '04/10/2019', '04/10/2019', 'Friday', '12:00', 'Warner Bros. Pictures', 0.00, 'Arthur Fleck, a party clown, leads an impoverished life with his ailing mother. However, when society shuns him and brands him as a freak, he decides to embrace the life of crime and chaos.', 1),
(300037, 'Shutter Island', './showPics/Shutter Island.jpg', 'Movie', '1', 'Aired', '15/04/2010', '15/04/2010', 'Thursday', '12:00', 'Warner Bros. Pictures', 0.00, 'Teddy Daniels and Chuck Aule, two US marshals, are sent to an asylum on a remote island in order to investigate the disappearance of a patient, where Teddy uncovers a shocking truth about the place.', 1),
(300038, 'We Need To Talk About Kevin', './showPics/We Need To Talk About Kevin.jpg', 'Movie', '1', 'Aired', '21/10/2011', '21/10/2011', 'Friday', '12:00', 'BBC Films UK', 0.00, 'Eva Khatchadourian (Tilda Swinton) is a travel writer/publisher who gives up her beloved freedom and bohemian lifestyle to have a child with her husband, Franklin (John C. Reilly). Pregnancy does not seem to agree with Eva, but whats worse, when she does give birth to a baby boy named Kevin, she cant seem to bond with him. When Kevin grows from a fussy, demanding toddler (Rocky Duer) into a sociopathic teen (Ezra Miller), Eva is forced to deal with the aftermath of her sons horrific act.', 1),
(300039, 'The Pianist', './showPics/The Pianist.jpg', 'Movie', '1', 'Aired', '06/09/2002', '06/09/2002', 'Friday', '12:00', 'Canal+', 0.00, 'During the WWII, acclaimed Polish musician Wladyslaw faces various struggles as he loses contact with his family. As the situation worsens, he hides in the ruins of Warsaw in order to survive.', 1),
(300040, 'Confessions', './showPics/Confessions.jpg', 'Movie', '1', 'Aired', '05/05/2010', '05/05/2010', 'Saturday', '12:00', 'Toho Company', 0.00, 'A grieving mother turns into a cold-blooded avenger to pay back the people responsible for her daughters death.', 1),
(300041, 'Dancer in the Dark', './showPics/Dancer In The Dark.jpg', 'Movie', '1', 'Aired', '08/09/2000', '08/09/2000', 'Friday', '12:00', 'Zentropa Entertainments', 0.00, 'Selma, a Czech immigrant, moves to the US with her son Gene and works hard, despite her blindness, to save up for an operation that would save him from a hereditary degenerative eye disease.', 1),
(300042, 'The Batman', './showPics/The Batman.jpg', 'Movie', '1', 'Aired', '04/03/2022', '04/03/2022', 'Friday', '12:00', 'Warner Bros. Pictures', 0.00, 'Batman ventures into Gotham Citys underworld when a sadistic killer leaves behind a trail of cryptic clues. As the evidence begins to lead closer to home and the scale of the perpetrators plans become clear, he must forge new relationships, unmask the culprit and bring justice to the abuse of power and corruption that has long plagued the metropolis.', 1),
(300043, 'Whiplash', './showPics/Whiplash.jpg', 'Movie', '1', 'Aired', '10/10/2014', '10/10/2014', 'Friday', '12:00', 'Sony Pictures Classics', 0.00, 'Andrew enrols in a music conservatory to become a drummer. But he is mentored by Terence Fletcher, whose unconventional training methods push him beyond the boundaries of reason and sensibility.', 1),
(300044, 'Schindler\'s List', './showPics/Schindlers List.jpg', 'Movie', '1', 'Aired', '04/02/1994', '04/02/1994', 'Friday', '12:00', 'Universal Pictures', 0.00, 'Oskar Schindler, a German industrialist and member of the Nazi party, tries to save his Jewish employees after witnessing the persecution of Jews in Poland.', 1),
(300045, 'Black Swan', './showPics/Black Swan.jpg', 'Movie', '1', 'Aired', '24/02/2010', '24/02/2010', 'Wednesday', '12:00', 'Searchlight Pictures', 0.00, 'Nina, a ballerina, gets the chance to play the White Swan, Princess Odette. But she finds herself slipping into madness when Thomas, the artistic director, decides that Lily might fit the role better.', 1),
(300046, 'Mother!', './showPics/Mother!.jpg', 'Movie', '1', 'Aired', '15/09/2017', '15/09/2017', 'Friday', '12:00', 'Thousand Words Protozoa Pictures', 0.00, 'A poet and his wife lead a tranquil existence in a burnt-out house. However, when uninvited guests come barging in, the couple life turns chaotic and shocking events unfold.', 1),
(300047, 'Vivarium', './showPics/Vivarium.jpg', 'Movie', '1', 'Aired', '18/05/2019', '18/05/2019', 'Saturday', '12:00', 'Vertigo Films', 0.00, 'While looking for a house, Tom and Gemma get stuck in a maze of identical houses. As they try to figure out a way to escape, they receive a package containing a child and are asked to raise him.', 1),
(300048, 'Inception', './showPics/Inception.jpg', 'Movie', '1', 'Aired', '15/07/2010', '15/07/2010', 'Thursday', '12:00', 'Warner Bros. Pictures', 0.00, 'Cobb steals information from his targets by entering their dreams. Saito offers to wipe clean Cobbs criminal history as payment for performing an inception on his sick competitors son.', 1),
(300049, 'A Tale of two Sisters', './showPics/A Tale of two Sisters.jpg', 'Movie', '1', 'Aired', '13/06/2003', '13/06/2003', 'Friday', '12:00', 'B.O.M. Film Productions', 0.00, 'On returning home from a mental health facility, two sisters find that along with their stepmother, they have to find a way to deal with their late mothers ghost who begins to haunt them.', 1),
(300050, 'I Saw the Devil', './showPics/I Saw The Devil.jpg', 'Movie', '1', 'Aired', '12/08/2010', '12/08/2010', 'Thursday', '12:00', 'Showbox', 0.00, 'On a dark road, taxi driver Kyung-chul (Choi Min-sik) comes across a scared female motorist stranded in a broken-down vehicle. He pulls over -- but not to help her. When the womans head is discovered in a local river, her devastated fiancé, Kim Soo-hyeon (Lee Byung-hun), a trained secret agent, becomes obsessed with hunting down her killer. Once he finds Kyung-chul, things get twisted. After brutally beating the murderer, Kim lets him go free, and a demented game of cat and mouse begins.', 1),
(300051, 'Intersteller', './showPics/Intersteller.jpg', 'Movie', '1', 'Aired', '06/11/2014', '06/11/2014', 'Thursday', '12:00', 'Warner Bros. Pictures', 9.00, 'When Earth becomes uninhabitable in the future, a farmer and ex-NASA pilot, Joseph Cooper, is tasked to pilot a spacecraft, along with a team of researchers, to find a new planet for humans.', 1),
(300052, 'The Martian', './showPics/The Martian.jpg', 'Movie', '1', 'Aired', '01/10/2015', '01/10/2015', 'Thursday', '12:00', '20th Century Studios', 0.00, 'Mark Watney is stranded on the planet of Mars after his crew leaves him behind, presuming him to be dead due to a storm. With minimum supplies, Mark struggles to keep himself alive.', 1),
(300053, 'Mr.Nobody', './showPics/Mr.Nobody.jpg', 'Movie', '1', 'Aired', '13/01/2010', '13/01/2010', 'Wednesday', '12:00', 'Pan-Européenne', 0.00, 'When humans become immortal, a 118-year-old Nemo, Earths last mortal, recounts his life story to a reporter, explaining to him things that he did at various junctures of his life.', 1),
(300054, 'Funny Games', './showPics/Funny Games.jpg', 'Movie', '1', 'Aired', '07/05/1997', '07/05/1997', 'Wednesday', '12:00', 'Österreichischer Rundfunk', 0.00, 'An idyllic lakeside vacation home is terrorized by Paul (Arno Frisch) and Peter (Frank Giering), a pair of deeply disturbed young men. When the fearful Anna (Susanne Lothar) is home alone, the two men drop by for a visit that quickly turns violent and terrifying. Husband Georg (Ulrich Mühe) comes to her rescue, but Paul and Peter take the family hostage and subject them to nightmarish abuse and humiliation. From time to time, Paul talks to the films audience, making it complicit in the horror.', 1),
(300055, 'Memento', './showPics/Memento.jpg', 'Movie', '1', 'Aired', '16/03/2001', '16/03/2001', 'Friday', '12:00', 'Pathé', 0.00, 'Leonard Shelby, an insurance investigator, suffers from anterograde amnesia and uses notes and tattoos to hunt for the man he thinks killed his wife, which is the last thing he remembers.', 1),
(300056, 'Benny\'s Video', './showPics/Benny\'s Video.jpg', 'Movie', '1', 'Aired', '13/05/1992', '13/05/1992', 'Wednesday', '12:00', 'Lang Film', 0.00, 'Bennys Video is a 1992 Austrian-Swiss psychological horror film directed by Michael Haneke and set in Vienna. The plot of the film centers on Benny, a teenager who views much of his life as distilled through video images, and his well-to-do parents Anna and Georg, who enable Bennys focus on video cameras and images', 1),
(300057, 'Girl, Interrupted', './showPics/Girl, Interrupted.jpg', 'Movie', '1', 'Aired', '24/02/2000', '24/02/2000', 'Thursday', '12:00', 'Columbia Pictures', 0.00, 'A directionless teenager, Susanna, is rushed to Claymoore, a mental institution, after a supposed suicide attempt. There, she befriends a group of troubled women who deeply influence her life.', 1),
(300058, 'The Butterfly Effect', './showPics/The Butterfly Effect.jpg', 'Movie', '1', 'Aired', '23/01/2004', '23/01/2004', 'Friday', '12:00', 'New Line Cinema', 0.00, 'Evan gets severe headaches that cause him to suffer blackouts. While unconscious, he is able to travel back in time and alter the past but this causes drastic changes in his present life.', 1),
(300059, 'The Irishman', './showPics/The Irishman.jpg', 'Movie', '1', 'Aired', '27/09/2019', '27/09/2019', 'Friday', '12:00', 'TriBeCa Productions', 0.00, 'In the 1950s, truck driver Frank Sheeran gets involved with Russell Bufalino and his Pennsylvania crime family. As Sheeran climbs the ranks to become a top hit man, he also goes to work for Jimmy Hoffa -- a powerful Teamster tied to organized crime.', 1);
INSERT INTO `shows` (`showsID`, `showsName`, `showsPic`, `showsType`, `episodes`, `showStatus`, `releaseDate`, `finishedDate`, `broadcastDay`, `broadcastTime`, `studios`, `score`, `synopsis`, `status`) VALUES
(300060, 'Mr.Robot', './showPics/Mr.Robot.jpg', 'TV Show', '45', 'Aired', '24/06/2015', '22/12/2019', 'Wednesday', '10 p.m.', 'Anonymous Content', 0.00, 'Elliot, a cyber-security engineer suffering from anxiety, works for a corporation and hacks felons by night. Panic strikes him after Mr Robot, a cryptic anarchist, recruits him to ruin his company.', 1),
(300061, 'Breaking Bad', './showPics/Breaking Bad.jpg', 'TV Show', '62', 'Aired', '20/01/2008', '29/09/2013', 'Sunday', '12:00', 'High Bridge Entertainment', 0.00, 'Walter White, a chemistry teacher, discovers that he has cancer and decides to get into the meth-making business to repay his medical debts. His priorities begin to change when he partners with Jesse.', 1),
(300062, 'Dark', './showPics/Dark.jpg', 'TV Show', '26', 'Aired', '01/12/2017', '27/06/2020', 'Friday', '12:00', 'Wiedemann & Berg Television', 0.00, 'When two children go missing in a small German town, its sinful past is exposed along with the double lives and fractured relationships that exist among four families as they search for the kids. The mystery-drama series introduces an intricate puzzle filled with twists that includes a web of curious characters, all of whom have a connection to the town\'s troubled history -- whether they know it or not. The story includes supernatural elements that tie back to the same town in 1986. \"Dark\" represents the first German original series produced for Netflix.', 1),
(300063, 'Barry', './showPics/Barry.jpg', 'TV Show', '12:00', 'Airing', '25/03/2018', '12:00', 'Sunday', '12:00', 'Warner Bros. Television Distribution', 0.00, 'Barry, who kills to earn a living, discovers the joy of acting while he is looking for his target. Surprisingly, he loves it so much that he is ready to leave his old life behind.', 1),
(300064, 'Squid Game', './showPics/Squid Game.jpg', 'TV Show', '12:00', 'Airing', '17/09/2021', '12:00', 'Friday', '12:00', 'Siren Pictures Inc.', 0.00, 'Hundreds of cash-strapped contestants accept an invitation to compete in childrens games for a tempting prize, but the stakes are deadly.', 1),
(300065, 'Utopia', './showPics/Utopia.jpg', 'TV Show', '12', 'Aired', '15/01/2013', '12/08/2014', 'Tuesday', '12:00', 'Kudos', 0.00, 'A group of people who meet online have a manuscript that supposedly predicted the disasters of the previous century. This makes them the target of a clandestine organization.', 1),
(300066, 'Euphoria', './showPics/Euphoria.jpg', 'TV Show', '12:00', 'Airing', '16/06/2019', '12:00', 'Sunday', '12:00', 'A24', 0.00, 'A group of high school students struggle with drugs, love, social media and money as they come of age while trying to establish their identity.', 1),
(300067, 'You', './showPics/You.jpg', 'TV Show', '12:00', 'Airing', '09/09/2018', '12:00', 'Sunday', '12:00', 'Man Sewing Dinosaur', 0.00, 'What would you do for love? For a brilliant male bookstore manager who crosses paths with an aspiring female writer, this question is put to the test. A charming yet awkward crush becomes something even more sinister when the writer becomes the managers obsession. Using social media and the internet, he uses every tool at his disposal to become close to her, even going so far as to remove any obstacle --including people -- that stands in his way of getting to her.', 1),
(300068, 'Trailer Park Boys', './showPics/Trailer Park Boys.jpg', 'TV Show', '12:00', 'Airing', '22/04/2001', '12:00', 'Sunday', '12:00', 'Showcase Television', 0.00, 'Nova Scotias trailer parks are colorful thanks to residents Ricky, Bubbles and Julian. Together, they plan mad capers, usually get-rich-quick schemes, with plenty of screw-ups along the way. They\'re constantly being hunted by their former trailer park supervisor, Jim Lahey, and his perpetually shirtless, pot-belled assistant, Randy. There are a host of other quirky characters that make up this zany locale of below-income characters in this Canadian mockumentary series that has spawned two feature films.', 1),
(300069, 'Vikings', './showPics/Vikings.jpg', 'TV Show', '89', 'Aired', '03/03/2013', '30/12/2020', 'Sunday', '12:00', 'Showcase Television', 0.00, 'Ragnar Lothbrok, a legendary Norse hero, is a mere farmer who rises up to become a fearless warrior and commander of the Viking tribes with the support of his equally ferocious family.', 1),
(300070, 'Black Mirror', './showPics/Black Mirror.jpg', 'TV Show', '22', 'Aired', '04/12/2014', '05/06/2019', 'Thursday', '12:00', 'Zeppotron', 0.00, 'In an abstrusely dystopian future, several individuals grapple with the manipulative effects of cutting edge technology in their personal lives and behaviours.', 1),
(300071, 'Alice in Borderland', './showPics/Alice In Borderland.jpg', 'TV Show', '12:00', 'Airing', '10/12/2020', '12:00', 'Thursday', '12:00', 'Robot Communications Inc.', 0.00, 'Obsessed gamer Arisu suddenly finds himself in a strange, emptied-out version of Tokyo in which he and his friends must compete in dangerous games in order to survive.', 1),
(300072, 'Daredevil', './showPics/Daredevil.jpg', 'TV Show', '39', 'Aired', '10/04/2015', '19/10/2018', 'Friday', '12:00', 'Marvel Television', 0.00, 'Matt Murdock manages to overcome the challenges that he faces due to him being blind since childhood and fights criminals as a lawyer and Daredevil.', 1),
(300073, 'Punisher', './showPics/Punisher.jpg', 'TV Show', '26', 'Aired', '17/11/2017', '18/01/2018', 'Friday', '12:00', 'Marvel Television', 0.00, 'Following the death of his family by the hands of a group of ruthless criminals, Frank Castle seeks to take revenge and punish those who are responsible for his tragedy.', 1),
(300074, 'The Office', './showPics/The Office.jpg', 'TV Show', '201 ', 'Aired', '24/03/2005', '16/05/2013', 'Thursday', '12:00', 'Deedle-Dee Productions', 0.00, 'A motley group of office workers go through hilarious misadventures at the Scranton, Pennsylvania, branch of the Dunder Mifflin Paper Company.', 1),
(300075, 'Better Call Saul', './showPics/Better Call Saul.jpg', 'TV Show', '12:00', 'Airing', '08/02/2015', '12:00', 'Sunday', '12:00', 'High Bridge Productions', 0.00, 'Ex-con artist Jimmy McGill turns into a small-time attorney and goes through a series of trials and tragedies, as he transforms into his alter ego Saul Goodman, a morally challenged criminal lawyer.', 1),
(300076, 'Peaky Blinders', './showPics/Peaky Blinders.jpg', 'TV Show', '12:00', 'Airing', '12/09/2013', '12:00', 'Thursday', '12:00', 'BBC Studios', 0.00, 'Tommy Shelby, a dangerous man, leads the Peaky Blinders, a gang based in Birmingham. Soon, Chester Campbell, an inspector, decides to nab him and put an end to the criminal activities.', 1),
(300077, 'Stranger Things', './showPics/Stranger Things.jpg', 'TV Show', '12:00', 'Airing', '15/07/2016', '12:00', 'Friday', '12:00', '21 Laps Entertainment', 0.00, 'In 1980s Indiana, a group of young friends witness supernatural forces and secret government exploits. As they search for answers, the children unravel a series of extraordinary mysteries.', 1),
(300078, 'Riverdale', './showPics/Riverdale.jpg', 'TV Show', '12:00', 'Airing', '26/01/2017', '12:00', 'Thursday', '12:00', 'Berlanti Productions', 0.00, 'Archie, Betty, Jughead and Veronica tackle being teenagers in a town that is rife with sinister happenings and blood-thirsty criminals.', 1),
(300079, 'Cobra Kai', './showPics/Cobra Kai.jpg', 'TV Show', '12:00', 'Airing', '02/05/2018', '12:00', 'Thursday', '12:00', 'Sony Pictures Television Studios', 0.00, 'Thirty four years after events of the 1984 All Valley Karate Tournament, a down-and-out Johnny Lawrence seeks redemption by reopening the infamous Cobra Kai dojo, reigniting his rivalry with a now successful Daniel LaRusso.', 1),
(300080, '13 Reasons Why', './showPics/13 Reasons Why.jpg', 'TV Show', '49', 'Aired', '31/03/2017', '05/06/2020', 'Friday', '12:00', 'July Moon Productions', 0.00, 'Newcomer Katherine Langford plays the role of Hannah, a young woman who takes her own life. Two weeks after her tragic death, a classmate named Clay finds a mysterious box on his porch. Inside the box are recordings made by Hannah --- on whom Clay had a crush --- in which she explains the 13 reasons why she chose to commit suicide. If Clay decides to listen to the recordings, he will find out if and how he made the list. This intricate and heart-wrenching tale is told through Clay and Hannah\'s dual narratives.', 1),
(300081, 'Sex Education', './showPics/Sex Education.jpg', 'TV Show', '12:00', 'Airing', '31/03/2017', '12:00', 'Friday', '12:00', 'Eleven Film', 0.00, 'Socially awkward high school student Otis may not have much experience in the lovemaking department, but he gets good guidance on the topic in his personal sex ed course -- living with mom Jean, who is a sex therapist. Being surrounded by manuals, videos and tediously open conversations about sex, Otis has become a reluctant expert on the subject. When his classmates learn about his home life, Otis decides to use his insider knowledge to improve his status at school, so he teams with whip-smart bad girl Maeve to set up an underground sex therapy clinic to deal with their classmates problems. But through his analysis of teenage sexuality, Otis realizes that he may need some therapy of his own.', 1),
(300082, 'Strangers From Hell', './showPics/Strangers From Hell.jpg', 'TV Show', '10', 'Aired', '31/08/2019', '06/10/2019', 'Saturday', '12:00', 'Woo Sang Film', 0.00, 'A young man moves into a cheap apartment and must share the kitchen and bathroom with weird and suspicious residents.', 1),
(300083, 'All of us are Dead', './showPics/All of Us Are Dead.jpg', 'TV Show', '12:00', 'Airing', '28/01/2022', '12:00', 'Friday', '12:00', 'Kim Jong-hak Production', 0.00, 'Trapped students must escape their high school which has become ground zero for a zombie virus outbreak.', 1),
(300084, 'Sweet Home', './showPics/Sweet Home.jpg', 'TV Show', '12:00', 'Airing', '18/12/2020', '12:00', 'Friday', '12:00', 'Studio Dragon', 0.00, 'As humans turn into savage monsters, one troubled teenager and his neighbours fight to survive and to hold onto their humanity.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(6) NOT NULL,
  `staffName` varchar(100) NOT NULL,
  `staffPassword` varchar(100) NOT NULL,
  `staffEmail` varchar(100) NOT NULL,
  `staffPhoneNum` varchar(100) NOT NULL,
  `staffGender` varchar(10) NOT NULL,
  `staffAddress` varchar(250) NOT NULL,
  `dateJoin` varchar(20) NOT NULL,
  `staffRole` varchar(20) NOT NULL,
  `wages` double(8,2) NOT NULL,
  `staffProfilePic` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `staffPassword`, `staffEmail`, `staffPhoneNum`, `staffGender`, `staffAddress`, `dateJoin`, `staffRole`, `wages`, `staffProfilePic`, `status`) VALUES
(100001, 'abcd', '12345', 'abc123@gmail.com', '012-3456789', 'Male', 'Hello World !!', '2021-10-31', 'Admin', 3000.00, './staffPics/Ultraman Dyna.jpg', 'Deactivate'),
(100003, 'Asmi', '67890', 'def456@hotmail.com', '012-3456789', 'Male', 'Japan', '2021-10-31', 'General', 2800.00, './staffPics/Kamen Rider Revice Symbol.png', 'Active'),
(100004, 'hij', '112803', 'def456@hotmail.com', '012-3456789', 'Male', 'hello world!!! my friend', '2021-11-05', 'General', 3400.00, './staffPics/Ultraman Tiga.jpg', 'Active'),
(100005, 'abc', '112803', 'mail.com', '012-3456789', 'Male', 'iygiuguiguogu', '2021-11-13', 'General', 90.00, './staffPics/Black Clover 2.png', 'Active'),
(100006, 'test', '112803', 'mail.com', '012-3456789', 'Male', 'iygiuguiguogu', '2021-11-13', 'General', 90.00, './staffPics/Ultraman Dyna.jpg', 'Active'),
(100007, 'test2', '112803', 'mail.com', '012-3456789', 'Male', 'iygiuguiguogu', '2021-11-13', 'General', 90.00, './staffPics/Ultraman Gaia.jpg', 'Active'),
(100008, 'tiga', '112803', 'test@gmail.com', '012-3456789', 'Male', 'jybhjkbvyb', '2021-11-13', 'Admin', 5600.00, './staffPics/Ultraman Tiga.jpg', 'Active'),
(100009, 'dyna', '112803', 'abc123@gmail.com', '012-2013083', 'Male', 'Japan', '2021-11-13', 'General', 2900.00, './staffPics/Ultraman Dyna.jpg', 'Active'),
(100010, 'gaia', '123', 'test@gmail.com', '012-3456789', 'Male', '4t43gqfg4gq2g43g', '2021-11-13', 'Admin', 23223.00, './staffPics/Ultraman Gaia.jpg', 'Active'),
(100011, 'cosmos', '12345', 'abc123@gmail.com', '012-3456789', 'Male', 'rjaehh35y3', '2021-11-13', 'Admin', 999999.99, './staffPics/Ultraman Gaia.jpg', 'Active'),
(100012, 'revice', '112803', 'test@gmail.com', '012-3456789', 'Male', 'qwdqwrwqd', '2021-12-10', 'General', 2414.00, './staffPics/Kamen Rider Revice Symbol.png', 'Active'),
(100013, 'zero one', '123', 'test@gmail.com', '012-3456789', 'Male', 'wefefqfqfqfqef', '2021-11-13', 'Admin', 5680.00, './staffPics/Kamen Rider Zero-One Symbol.png', 'Active'),
(100014, 'test4', '112803', 'test@gmail.com', '012-3456789', 'Male', 'qeqeqeqq', '2021-11-13', 'Admin', 999999.99, './staffPics/Black Clover 2.png', 'Active'),
(100015, 'test5', '12345', 'test@gmail.com', '012-3456789', 'Male', '21312e12', '2021-11-13', 'General', 123.00, './staffPics/Heisei Kamen Rider.png', 'Active'),
(100016, 'test6', '12345', 'test@gmail.com', '012-3456789', 'Male', 'eqeqee', '2021-11-13', 'Admin', 4533.00, './staffPics/Kamen Rider Den-O.jpg', 'Active'),
(100017, 'djw', '112803', 'abc123@gmail.com', '012-3456789', 'Male', 'qwe2q', '2021-11-13', 'Admin', 45747.00, './staffPics/Black Clover 2.png', 'Active'),
(100018, 'test7', '232325322423', 'abc123@gmail.com', '012-3456789', 'Male', '121', '2021-11-13', 'Admin', 123.00, './staffPics/Komi-san wa, Comyushou desu..jpg', 'Active'),
(100019, 'OOO', '12345', 'test@gmail.com', '012-3456789', 'Male', 'Hogami', '2021-11-13', 'General', 12345.00, './staffPics/Kamen Rider OOO.jpg', 'Active'),
(100020, 'xyz', '234782huieqh', 'abc123@gmail.com', '012-3456789', 'Male', 'jkjgukjvuiti', '2021-12-09', 'Admin', 1231.00, './staffPics/Black Clover 2.png', 'Active'),
(100021, 'Allen', '234782huieqh', 'test@gmail.com', '012-3456789', 'Male', '4g5h6v', '2021-11-13', 'Admin', 0.01, './staffPics/3-gatsu no Lion.jpg', 'Active'),
(100022, 'den-o', '234782huieqh', 'abc123@gmail.com', '012-2013083', 'Male', 'e2r', '2021-11-14', 'General', 999999.99, './staffPics/Heisei Rider Symbol.png', 'Deactivate'),
(100023, 'Pipo', 'pipo123', 'pipo@gmail.com', '012-3456789', 'Male', 'Melaka Cannon', '2021-11-21', 'Admin', 300.00, './staffPics/Yoroziya Family.png', 'Deactivate'),
(100024, 'Lee Yong Siong', '123456', 'test@gmail.com', '012-23456789', 'Male', 'Hello world', '2021-11-22', 'Admin', 127.99, './staffPics/Kamen Rider Saber Symbol.png', 'Active'),
(100025, 'srtewfewf', '1234565655tttt1qrq', 'test@gmail.com', '012-3456789', 'Male', '124214', '2021-11-26', 'Admin', 124.00, './staffPics/3-gatsu no Lion.jpg', 'Deactivate'),
(100026, 'Barry', '1234567', 'abc123@gmail.com', '012-3456789', 'Male', 'vuyfuifjfkuyfu', '2021-12-06', 'Admin', 800.00, './staffPics/Shingeki no Kyojin_The Final Season Part 2.jpg', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`actorID`);

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`characterID`),
  ADD KEY `characterShow` (`showsID`),
  ADD KEY `actorCharacter` (`actorID`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genreID`);

--
-- Indexes for table `genreshows`
--
ALTER TABLE `genreshows`
  ADD PRIMARY KEY (`genreShowsID`),
  ADD KEY `showgenre` (`showsID`),
  ADD KEY `genreshow` (`genreID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `personal_watch_list`
--
ALTER TABLE `personal_watch_list`
  ADD PRIMARY KEY (`personalWatchListID`),
  ADD KEY `memberList` (`memberID`),
  ADD KEY `showList` (`showsID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `memberReview` (`memberID`),
  ADD KEY `showReview` (`showsID`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`showsID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `actorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500025;

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `characterID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400026;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genreID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `genreshows`
--
ALTER TABLE `genreshows`
  MODIFY `genreShowsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_watch_list`
--
ALTER TABLE `personal_watch_list`
  MODIFY `personalWatchListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `showsID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300085;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100027;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `characters`
--
ALTER TABLE `characters`
  ADD CONSTRAINT `actorCharacter` FOREIGN KEY (`actorID`) REFERENCES `actors` (`actorID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `characterShow` FOREIGN KEY (`showsID`) REFERENCES `shows` (`showsID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `genreshows`
--
ALTER TABLE `genreshows`
  ADD CONSTRAINT `genreshow` FOREIGN KEY (`genreID`) REFERENCES `genres` (`genreID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `personal_watch_list`
--
ALTER TABLE `personal_watch_list`
  ADD CONSTRAINT `memberList` FOREIGN KEY (`memberID`) REFERENCES `members` (`memberID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `showList` FOREIGN KEY (`showsID`) REFERENCES `shows` (`showsID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `memberReview` FOREIGN KEY (`memberID`) REFERENCES `members` (`memberID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `showReview` FOREIGN KEY (`showsID`) REFERENCES `shows` (`showsID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
