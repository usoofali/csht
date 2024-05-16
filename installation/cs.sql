-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2024 at 01:25 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csht`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `street` varchar(300) DEFAULT NULL,
  `zip_code` varchar(300) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE `allocation` (
  `allocation_id` int(11) NOT NULL,
  `contact` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `allocation_history`
--

CREATE TABLE `allocation_history` (
  `allocation_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `iso` varchar(2) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `name`, `iso`, `state_id`) VALUES
(1, 'Aba North', NULL, 1),
(2, 'Aba South', NULL, 1),
(3, 'Arochukwu', NULL, 1),
(4, 'Bende', NULL, 1),
(5, 'Ikwuano', NULL, 1),
(6, 'Isiala Ngwa North', NULL, 1),
(7, 'Isiala Ngwa South', NULL, 1),
(8, 'Isuikwuato', NULL, 1),
(9, 'Obi Ngwa', NULL, 1),
(10, 'Ohafia', NULL, 1),
(11, 'Osisioma', NULL, 1),
(12, 'Ugwunagbo', NULL, 1),
(13, 'Ukwa East', NULL, 1),
(14, 'Ukwa West', NULL, 1),
(15, 'Umuahia North', NULL, 1),
(16, 'Umuahia South', NULL, 1),
(17, 'Umu Nneochi', NULL, 1),
(18, 'Demsa', NULL, 2),
(19, 'Fufure', NULL, 2),
(20, 'Ganye', NULL, 2),
(21, 'Gayuk', NULL, 2),
(22, 'Gombi', NULL, 2),
(23, 'Grie', NULL, 2),
(24, 'Hong', NULL, 2),
(25, 'Jada', NULL, 2),
(26, 'Larmurde', NULL, 2),
(27, 'Madagali', NULL, 2),
(28, 'Maiha', NULL, 2),
(29, 'Mayo Belwa', NULL, 2),
(30, 'Michika', NULL, 2),
(31, 'Mubi North', NULL, 2),
(32, 'Mubi South', NULL, 2),
(33, 'Numan', NULL, 2),
(34, 'Shelleng', NULL, 2),
(35, 'Song', NULL, 2),
(36, 'Toungo', NULL, 2),
(37, 'Yola North', NULL, 2),
(38, 'Yola South', NULL, 2),
(39, 'Abak', NULL, 3),
(40, 'Eastern Obolo', NULL, 3),
(41, 'Eket', NULL, 3),
(42, 'Esit Eket', NULL, 3),
(43, 'Essien Udim', NULL, 3),
(44, 'Etim Ekpo', NULL, 3),
(45, 'Etinan', NULL, 3),
(46, 'Ibeno', NULL, 3),
(47, 'Ibesikpo Asutan', NULL, 3),
(48, 'Ibiono-Ibom', NULL, 3),
(49, 'Ika', NULL, 3),
(50, 'Ikono', NULL, 3),
(51, 'Ikot Abasi', NULL, 3),
(52, 'Ikot Ekpene', NULL, 3),
(53, 'Ini', NULL, 3),
(54, 'Itu', NULL, 3),
(55, 'Mbo', NULL, 3),
(56, 'Mkpat-Enin', NULL, 3),
(57, 'Nsit-Atai', NULL, 3),
(58, 'Nsit-Ibom', NULL, 3),
(59, 'Nsit-Ubium', NULL, 3),
(60, 'Obot Akara', NULL, 3),
(61, 'Okobo', NULL, 3),
(62, 'Onna', NULL, 3),
(63, 'Oron', NULL, 3),
(64, 'Oruk Anam', NULL, 3),
(65, 'Udung-Uko', NULL, 3),
(66, 'Ukanafun', NULL, 3),
(67, 'Uruan', NULL, 3),
(68, 'Urue-Offong/Oruko', NULL, 3),
(69, 'Uyo', NULL, 3),
(70, 'Aguata', NULL, 4),
(71, 'Anambra East', NULL, 4),
(72, 'Anambra West', NULL, 4),
(73, 'Anaocha', NULL, 4),
(74, 'Awka North', NULL, 4),
(75, 'Awka South', NULL, 4),
(76, 'Ayamelum', NULL, 4),
(77, 'Dunukofia', NULL, 4),
(78, 'Ekwusigo', NULL, 4),
(79, 'Idemili North', NULL, 4),
(80, 'Idemili South', NULL, 4),
(81, 'Ihiala', NULL, 4),
(82, 'Njikoka', NULL, 4),
(83, 'Nnewi North', NULL, 4),
(84, 'Nnewi South', NULL, 4),
(85, 'Ogbaru', NULL, 4),
(86, 'Onitsha North', NULL, 4),
(87, 'Onitsha South', NULL, 4),
(88, 'Orumba North', NULL, 4),
(89, 'Orumba South', NULL, 4),
(90, 'Oyi', NULL, 4),
(91, 'Alkaleri', NULL, 5),
(92, 'Bauchi', NULL, 5),
(93, 'Bogoro', NULL, 5),
(94, 'Damban', NULL, 5),
(95, 'Darazo', NULL, 5),
(96, 'Dass', NULL, 5),
(97, 'Gamawa', NULL, 5),
(98, 'Ganjuwa', NULL, 5),
(99, 'Giade', NULL, 5),
(100, 'Itas/Gadau', NULL, 5),
(101, 'Jamaare', NULL, 5),
(102, 'Katagum', NULL, 5),
(103, 'Kirfi', NULL, 5),
(104, 'Misau', NULL, 5),
(105, 'Ningi', NULL, 5),
(106, 'Shira', NULL, 5),
(107, 'Tafawa Balewa', NULL, 5),
(108, 'Toro', NULL, 5),
(109, 'Warji', NULL, 5),
(110, 'Zaki', NULL, 5),
(111, 'Brass', NULL, 6),
(112, 'Ekeremor', NULL, 6),
(113, 'Kolokuma/Opokuma', NULL, 6),
(114, 'Nembe', NULL, 6),
(115, 'Ogbia', NULL, 6),
(116, 'Sagbama', NULL, 6),
(117, 'Southern Ijaw', NULL, 6),
(118, 'Yenagoa', NULL, 6),
(119, 'Agatu', NULL, 7),
(120, 'Apa', NULL, 7),
(121, 'Ado', NULL, 7),
(122, 'Buruku', NULL, 7),
(123, 'Gboko', NULL, 7),
(124, 'Guma', NULL, 7),
(125, 'Gwer East', NULL, 7),
(126, 'Gwer West', NULL, 7),
(127, 'Katsina-Ala', NULL, 7),
(128, 'Konshisha', NULL, 7),
(129, 'Kwande', NULL, 7),
(130, 'Logo', NULL, 7),
(131, 'Makurdi', NULL, 7),
(132, 'Obi', NULL, 7),
(133, 'Ogbadibo', NULL, 7),
(134, 'Ohimini', NULL, 7),
(135, 'Oju', NULL, 7),
(136, 'Okpokwu', NULL, 7),
(137, 'Oturkpo', NULL, 7),
(138, 'Tarka', NULL, 7),
(139, 'Ukum', NULL, 7),
(140, 'Ushongo', NULL, 7),
(141, 'Vandeikya', NULL, 7),
(142, 'Abadam', NULL, 8),
(143, 'Askira/Uba', NULL, 8),
(144, 'Bama', NULL, 8),
(145, 'Bayo', NULL, 8),
(146, 'Biu', NULL, 8),
(147, 'Chibok', NULL, 8),
(148, 'Damboa', NULL, 8),
(149, 'Dikwa', NULL, 8),
(150, 'Gubio', NULL, 8),
(151, 'Guzamala', NULL, 8),
(152, 'Gwoza', NULL, 8),
(153, 'Hawul', NULL, 8),
(154, 'Jere', NULL, 8),
(155, 'Kaga', NULL, 8),
(156, 'Kala/Balge', NULL, 8),
(157, 'Konduga', NULL, 8),
(158, 'Kukawa', NULL, 8),
(159, 'Kwaya Kusar', NULL, 8),
(160, 'Mafa', NULL, 8),
(161, 'Magumeri', NULL, 8),
(162, 'Maiduguri', NULL, 8),
(163, 'Marte', NULL, 8),
(164, 'Mobbar', NULL, 8),
(165, 'Monguno', NULL, 8),
(166, 'Ngala', NULL, 8),
(167, 'Nganzai', NULL, 8),
(168, 'Shani', NULL, 8),
(169, 'Abi', NULL, 9),
(170, 'Akamkpa', NULL, 9),
(171, 'Akpabuyo', NULL, 9),
(172, 'Bakassi', NULL, 9),
(173, 'Bekwarra', NULL, 9),
(174, 'Biase', NULL, 9),
(175, 'Boki', NULL, 9),
(176, 'Calabar Municipal', NULL, 9),
(177, 'Calabar South', NULL, 9),
(178, 'Etung', NULL, 9),
(179, 'Ikom', NULL, 9),
(180, 'Obanliku', NULL, 9),
(181, 'Obubra', NULL, 9),
(182, 'Obudu', NULL, 9),
(183, 'Odukpani', NULL, 9),
(184, 'Ogoja', NULL, 9),
(185, 'Yakuur', NULL, 9),
(186, 'Yala', NULL, 9),
(187, 'Aniocha North', NULL, 10),
(188, 'Aniocha South', NULL, 10),
(189, 'Bomadi', NULL, 10),
(190, 'Burutu', NULL, 10),
(191, 'Ethiope East', NULL, 10),
(192, 'Ethiope West', NULL, 10),
(193, 'Ika North East', NULL, 10),
(194, 'Ika South', NULL, 10),
(195, 'Isoko North', NULL, 10),
(196, 'Isoko South', NULL, 10),
(197, 'Ndokwa East', NULL, 10),
(198, 'Ndokwa West', NULL, 10),
(199, 'Okpe', NULL, 10),
(200, 'Oshimili North', NULL, 10),
(201, 'Oshimili South', NULL, 10),
(202, 'Patani', NULL, 10),
(203, 'Sapele, Delta', NULL, 10),
(204, 'Udu', NULL, 10),
(205, 'Ughelli North', NULL, 10),
(206, 'Ughelli South', NULL, 10),
(207, 'Ukwuani', NULL, 10),
(208, 'Uvwie', NULL, 10),
(209, 'Warri North', NULL, 10),
(210, 'Warri South', NULL, 10),
(211, 'Warri South West', NULL, 10),
(212, 'Abakaliki', NULL, 11),
(213, 'Afikpo North', NULL, 11),
(214, 'Afikpo South', NULL, 11),
(215, 'Ebonyi', NULL, 11),
(216, 'Ezza North', NULL, 11),
(217, 'Ezza South', NULL, 11),
(218, 'Ikwo', NULL, 11),
(219, 'Ishielu', NULL, 11),
(220, 'Ivo', NULL, 11),
(221, 'Izzi', NULL, 11),
(222, 'Ohaozara', NULL, 11),
(223, 'Ohaukwu', NULL, 11),
(224, 'Onicha', NULL, 11),
(225, 'Akoko-Edo', NULL, 12),
(226, 'Egor', NULL, 12),
(227, 'Esan Central', NULL, 12),
(228, 'Esan North-East', NULL, 12),
(229, 'Esan South-East', NULL, 12),
(230, 'Esan West', NULL, 12),
(231, 'Etsako Central', NULL, 12),
(232, 'Etsako East', NULL, 12),
(233, 'Etsako West', NULL, 12),
(234, 'Igueben', NULL, 12),
(235, 'Ikpoba Okha', NULL, 12),
(236, 'Orhionmwon', NULL, 12),
(237, 'Oredo', NULL, 12),
(238, 'Ovia North-East', NULL, 12),
(239, 'Ovia South-West', NULL, 12),
(240, 'Owan East', NULL, 12),
(241, 'Owan West', NULL, 12),
(242, 'Uhunmwonde', NULL, 12),
(243, 'Ado Ekiti', NULL, 13),
(244, 'Efon', NULL, 13),
(245, 'Ekiti East', NULL, 13),
(246, 'Ekiti South-West', NULL, 13),
(247, 'Ekiti West', NULL, 13),
(248, 'Emure', NULL, 13),
(249, 'Gbonyin', NULL, 13),
(250, 'Ido Osi', NULL, 13),
(251, 'Ijero', NULL, 13),
(252, 'Ikere', NULL, 13),
(253, 'Ikole', NULL, 13),
(254, 'Ilejemeje', NULL, 13),
(255, 'Irepodun/Ifelodun', NULL, 13),
(256, 'Ise/Orun', NULL, 13),
(257, 'Moba', NULL, 13),
(258, 'Oye', NULL, 13),
(259, 'Aninri', NULL, 14),
(260, 'Awgu', NULL, 14),
(261, 'Enugu East', NULL, 14),
(262, 'Enugu North', NULL, 14),
(263, 'Enugu South', NULL, 14),
(264, 'Ezeagu', NULL, 14),
(265, 'Igbo Etiti', NULL, 14),
(266, 'Igbo Eze North', NULL, 14),
(267, 'Igbo Eze South', NULL, 14),
(268, 'Isi Uzo', NULL, 14),
(269, 'Nkanu East', NULL, 14),
(270, 'Nkanu West', NULL, 14),
(271, 'Nsukka', NULL, 14),
(272, 'Oji River', NULL, 14),
(273, 'Udenu', NULL, 14),
(274, 'Udi', NULL, 14),
(275, 'Uzo Uwani', NULL, 14),
(276, 'Abaji', NULL, 15),
(277, 'Bwari', NULL, 15),
(278, 'Gwagwalada', NULL, 15),
(279, 'Kuje', NULL, 15),
(280, 'Kwali', NULL, 15),
(281, 'Municipal Area Council', NULL, 15),
(282, 'Akko', NULL, 16),
(283, 'Balanga', NULL, 16),
(284, 'Billiri', NULL, 16),
(285, 'Dukku', NULL, 16),
(286, 'Funakaye', NULL, 16),
(287, 'Gombe', NULL, 16),
(288, 'Kaltungo', NULL, 16),
(289, 'Kwami', NULL, 16),
(290, 'Nafada', NULL, 16),
(291, 'Shongom', NULL, 16),
(292, 'Yamaltu/Deba', NULL, 16),
(293, 'Aboh Mbaise', NULL, 17),
(294, 'Ahiazu Mbaise', NULL, 17),
(295, 'Ehime Mbano', NULL, 17),
(296, 'Ezinihitte', NULL, 17),
(297, 'Ideato North', NULL, 17),
(298, 'Ideato South', NULL, 17),
(299, 'Ihitte/Uboma', NULL, 17),
(300, 'Ikeduru', NULL, 17),
(301, 'Isiala Mbano', NULL, 17),
(302, 'Isu', NULL, 17),
(303, 'Mbaitoli', NULL, 17),
(304, 'Ngor Okpala', NULL, 17),
(305, 'Njaba', NULL, 17),
(306, 'Nkwerre', NULL, 17),
(307, 'Nwangele', NULL, 17),
(308, 'Obowo', NULL, 17),
(309, 'Oguta', NULL, 17),
(310, 'Ohaji/Egbema', NULL, 17),
(311, 'Okigwe', NULL, 17),
(312, 'Orlu', NULL, 17),
(313, 'Orsu', NULL, 17),
(314, 'Oru East', NULL, 17),
(315, 'Oru West', NULL, 17),
(316, 'Owerri Municipal', NULL, 17),
(317, 'Owerri North', NULL, 17),
(318, 'Owerri West', NULL, 17),
(319, 'Unuimo', NULL, 17),
(320, 'Auyo', NULL, 18),
(321, 'Babura', NULL, 18),
(322, 'Biriniwa', NULL, 18),
(323, 'Birnin Kudu', NULL, 18),
(324, 'Buji', NULL, 18),
(325, 'Dutse', NULL, 18),
(326, 'Gagarawa', NULL, 18),
(327, 'Garki', NULL, 18),
(328, 'Gumel', NULL, 18),
(329, 'Guri', NULL, 18),
(330, 'Gwaram', NULL, 18),
(331, 'Gwiwa', NULL, 18),
(332, 'Hadejia', NULL, 18),
(333, 'Jahun', NULL, 18),
(334, 'Kafin Hausa', NULL, 18),
(335, 'Kazaure', NULL, 18),
(336, 'Kiri Kasama', NULL, 18),
(337, 'Kiyawa', NULL, 18),
(338, 'Kaugama', NULL, 18),
(339, 'Maigatari', NULL, 18),
(340, 'Malam Madori', NULL, 18),
(341, 'Miga', NULL, 18),
(342, 'Ringim', NULL, 18),
(343, 'Roni', NULL, 18),
(344, 'Sule Tankarkar', NULL, 18),
(345, 'Taura', NULL, 18),
(346, 'Yankwashi', NULL, 18),
(347, 'Birnin Gwari', NULL, 19),
(348, 'Chikun', NULL, 19),
(349, 'Giwa', NULL, 19),
(350, 'Igabi', NULL, 19),
(351, 'Ikara', NULL, 19),
(352, 'Jaba', NULL, 19),
(353, 'Jemaa', NULL, 19),
(354, 'Kachia', NULL, 19),
(355, 'Kaduna North', NULL, 19),
(356, 'Kaduna South', NULL, 19),
(357, 'Kagarko', NULL, 19),
(358, 'Kajuru', NULL, 19),
(359, 'Kaura', NULL, 19),
(360, 'Kauru', NULL, 19),
(361, 'Kubau', NULL, 19),
(362, 'Kudan', NULL, 19),
(363, 'Lere', NULL, 19),
(364, 'Makarfi', NULL, 19),
(365, 'Sabon Gari', NULL, 19),
(366, 'Sanga', NULL, 19),
(367, 'Soba', NULL, 19),
(368, 'Zangon Kataf', NULL, 19),
(369, 'Zaria', NULL, 19),
(370, 'Ajingi', NULL, 20),
(371, 'Albasu', NULL, 20),
(372, 'Bagwai', NULL, 20),
(373, 'Bebeji', NULL, 20),
(374, 'Bichi', NULL, 20),
(375, 'Bunkure', NULL, 20),
(376, 'Dala', NULL, 20),
(377, 'Dambatta', NULL, 20),
(378, 'Dawakin Kudu', NULL, 20),
(379, 'Dawakin Tofa', NULL, 20),
(380, 'Doguwa', NULL, 20),
(381, 'Fagge', NULL, 20),
(382, 'Gabasawa', NULL, 20),
(383, 'Garko', NULL, 20),
(384, 'Garun Mallam', NULL, 20),
(385, 'Gaya', NULL, 20),
(386, 'Gezawa', NULL, 20),
(387, 'Gwale', NULL, 20),
(388, 'Gwarzo', NULL, 20),
(389, 'Kabo', NULL, 20),
(390, 'Kano Municipal', NULL, 20),
(391, 'Karaye', NULL, 20),
(392, 'Kibiya', NULL, 20),
(393, 'Kiru', NULL, 20),
(394, 'Kumbotso', NULL, 20),
(395, 'Kunchi', NULL, 20),
(396, 'Kura', NULL, 20),
(397, 'Madobi', NULL, 20),
(398, 'Makoda', NULL, 20),
(399, 'Minjibir', NULL, 20),
(400, 'Nasarawa', NULL, 20),
(401, 'Rano', NULL, 20),
(402, 'Rimin Gado', NULL, 20),
(403, 'Rogo', NULL, 20),
(404, 'Shanono', NULL, 20),
(405, 'Sumaila', NULL, 20),
(406, 'Takai', NULL, 20),
(407, 'Tarauni', NULL, 20),
(408, 'Tofa', NULL, 20),
(409, 'Tsanyawa', NULL, 20),
(410, 'Tudun Wada', NULL, 20),
(411, 'Ungogo', NULL, 20),
(412, 'Warawa', NULL, 20),
(413, 'Wudil', NULL, 20),
(414, 'Bakori', NULL, 21),
(415, 'Batagarawa', NULL, 21),
(416, 'Batsari', NULL, 21),
(417, 'Baure', NULL, 21),
(418, 'Bindawa', NULL, 21),
(419, 'Charanchi', NULL, 21),
(420, 'Dandume', NULL, 21),
(421, 'Danja', NULL, 21),
(422, 'Dan Musa', NULL, 21),
(423, 'Daura', NULL, 21),
(424, 'Dutsi', NULL, 21),
(425, 'Dutsin Ma', NULL, 21),
(426, 'Faskari', NULL, 21),
(427, 'Funtua', NULL, 21),
(428, 'Ingawa', NULL, 21),
(429, 'Jibia', NULL, 21),
(430, 'Kafur', NULL, 21),
(431, 'Kaita', NULL, 21),
(432, 'Kankara', NULL, 21),
(433, 'Kankia', NULL, 21),
(434, 'Katsina', NULL, 21),
(435, 'Kurfi', NULL, 21),
(436, 'Kusada', NULL, 21),
(437, 'MaiAdua', NULL, 21),
(438, 'Malumfashi', NULL, 21),
(439, 'Mani', NULL, 21),
(440, 'Mashi', NULL, 21),
(441, 'Matazu', NULL, 21),
(442, 'Musawa', NULL, 21),
(443, 'Rimi', NULL, 21),
(444, 'Sabuwa', NULL, 21),
(445, 'Safana', NULL, 21),
(446, 'Sandamu', NULL, 21),
(447, 'Zango', NULL, 21),
(448, 'Aleiro', NULL, 22),
(449, 'Arewa Dandi', NULL, 22),
(450, 'Argungu', NULL, 22),
(451, 'Augie', NULL, 22),
(452, 'Bagudo', NULL, 22),
(453, 'Birnin Kebbi', NULL, 22),
(454, 'Bunza', NULL, 22),
(455, 'Dandi', NULL, 22),
(456, 'Fakai', NULL, 22),
(457, 'Gwandu', NULL, 22),
(458, 'Jega', NULL, 22),
(459, 'Kalgo', NULL, 22),
(460, 'Koko/Besse', NULL, 22),
(461, 'Maiyama', NULL, 22),
(462, 'Ngaski', NULL, 22),
(463, 'Sakaba', NULL, 22),
(464, 'Shanga', NULL, 22),
(465, 'Suru', NULL, 22),
(466, 'Wasagu/Danko', NULL, 22),
(467, 'Yauri', NULL, 22),
(468, 'Zuru', NULL, 22),
(469, 'Adavi', NULL, 23),
(470, 'Ajaokuta', NULL, 23),
(471, 'Ankpa', NULL, 23),
(472, 'Bassa', NULL, 23),
(473, 'Dekina', NULL, 23),
(474, 'Ibaji', NULL, 23),
(475, 'Idah', NULL, 23),
(476, 'Igalamela Odolu', NULL, 23),
(477, 'Ijumu', NULL, 23),
(478, 'Kabba/Bunu', NULL, 23),
(479, 'Kogi', NULL, 23),
(480, 'Lokoja', NULL, 23),
(481, 'Mopa Muro', NULL, 23),
(482, 'Ofu', NULL, 23),
(483, 'Ogori/Magongo', NULL, 23),
(484, 'Okehi', NULL, 23),
(485, 'Okene', NULL, 23),
(486, 'Olamaboro', NULL, 23),
(487, 'Omala', NULL, 23),
(488, 'Yagba East', NULL, 23),
(489, 'Yagba West', NULL, 23),
(490, 'Asa', NULL, 24),
(491, 'Baruten', NULL, 24),
(492, 'Edu', NULL, 24),
(493, 'Ekiti, Kwara State', NULL, 24),
(494, 'Ifelodun', NULL, 24),
(495, 'Ilorin East', NULL, 24),
(496, 'Ilorin South', NULL, 24),
(497, 'Ilorin West', NULL, 24),
(498, 'Irepodun', NULL, 24),
(499, 'Isin', NULL, 24),
(500, 'Kaiama', NULL, 24),
(501, 'Moro', NULL, 24),
(502, 'Offa', NULL, 24),
(503, 'Oke Ero', NULL, 24),
(504, 'Oyun', NULL, 24),
(505, 'Pategi', NULL, 24),
(506, 'Agege', NULL, 25),
(507, 'Ajeromi-Ifelodun', NULL, 25),
(508, 'Alimosho', NULL, 25),
(509, 'Amuwo-Odofin', NULL, 25),
(510, 'Apapa', NULL, 25),
(511, 'Badagry', NULL, 25),
(512, 'Epe', NULL, 25),
(513, 'Eti Osa', NULL, 25),
(514, 'Ibeju-Lekki', NULL, 25),
(515, 'Ifako-Ijaiye', NULL, 25),
(516, 'Ikeja', NULL, 25),
(517, 'Ikorodu', NULL, 25),
(518, 'Kosofe', NULL, 25),
(519, 'Lagos Island', NULL, 25),
(520, 'Lagos Mainland', NULL, 25),
(521, 'Mushin', NULL, 25),
(522, 'Ojo', NULL, 25),
(523, 'Oshodi-Isolo', NULL, 25),
(524, 'Shomolu', NULL, 25),
(525, 'Surulere, Lagos State', NULL, 25),
(526, 'Akwanga', NULL, 26),
(527, 'Awe', NULL, 26),
(528, 'Doma', NULL, 26),
(529, 'Karu', NULL, 26),
(530, 'Keana', NULL, 26),
(531, 'Keffi', NULL, 26),
(532, 'Kokona', NULL, 26),
(533, 'Lafia', NULL, 26),
(534, 'Nasarawa', NULL, 26),
(535, 'Nasarawa Egon', NULL, 26),
(536, 'Obi', NULL, 26),
(537, 'Toto', NULL, 26),
(538, 'Wamba', NULL, 26),
(539, 'Agaie', NULL, 27),
(540, 'Agwara', NULL, 27),
(541, 'Bida', NULL, 27),
(542, 'Borgu', NULL, 27),
(543, 'Bosso', NULL, 27),
(544, 'Chanchaga', NULL, 27),
(545, 'Edati', NULL, 27),
(546, 'Gbako', NULL, 27),
(547, 'Gurara', NULL, 27),
(548, 'Katcha', NULL, 27),
(549, 'Kontagora', NULL, 27),
(550, 'Lapai', NULL, 27),
(551, 'Lavun', NULL, 27),
(552, 'Magama', NULL, 27),
(553, 'Mariga', NULL, 27),
(554, 'Mashegu', NULL, 27),
(555, 'Mokwa', NULL, 27),
(556, 'Moya', NULL, 27),
(557, 'Paikoro', NULL, 27),
(558, 'Rafi', NULL, 27),
(559, 'Rijau', NULL, 27),
(560, 'Shiroro', NULL, 27),
(561, 'Suleja', NULL, 27),
(562, 'Tafa', NULL, 27),
(563, 'Wushishi', NULL, 27),
(564, 'Abeokuta North', NULL, 28),
(565, 'Abeokuta South', NULL, 28),
(566, 'Ado-Odo/Ota', NULL, 28),
(567, 'Egbado North', NULL, 28),
(568, 'Egbado South', NULL, 28),
(569, 'Ewekoro', NULL, 28),
(570, 'Ifo', NULL, 28),
(571, 'Ijebu East', NULL, 28),
(572, 'Ijebu North', NULL, 28),
(573, 'Ijebu North East', NULL, 28),
(574, 'Ijebu Ode', NULL, 28),
(575, 'Ikenne', NULL, 28),
(576, 'Imeko Afon', NULL, 28),
(577, 'Ipokia', NULL, 28),
(578, 'Obafemi Owode', NULL, 28),
(579, 'Odeda', NULL, 28),
(580, 'Odogbolu', NULL, 28),
(581, 'Ogun Waterside', NULL, 28),
(582, 'Remo North', NULL, 28),
(583, 'Shagamu', NULL, 28),
(584, 'Akoko North-East', NULL, 29),
(585, 'Akoko North-West', NULL, 29),
(586, 'Akoko South-West', NULL, 29),
(587, 'Akoko South-East', NULL, 29),
(588, 'Akure North', NULL, 29),
(589, 'Akure South', NULL, 29),
(590, 'Ese Odo', NULL, 29),
(591, 'Idanre', NULL, 29),
(592, 'Ifedore', NULL, 29),
(593, 'Ilaje', NULL, 29),
(594, 'Ile Oluji/Okeigbo', NULL, 29),
(595, 'Irele', NULL, 29),
(596, 'Odigbo', NULL, 29),
(597, 'Okitipupa', NULL, 29),
(598, 'Ondo East', NULL, 29),
(599, 'Ondo West', NULL, 29),
(600, 'Ose', NULL, 29),
(601, 'Owo', NULL, 29),
(602, 'Atakunmosa East', NULL, 30),
(603, 'Atakunmosa West', NULL, 30),
(604, 'Aiyedaade', NULL, 30),
(605, 'Aiyedire', NULL, 30),
(606, 'Boluwaduro', NULL, 30),
(607, 'Boripe', NULL, 30),
(608, 'Ede North', NULL, 30),
(609, 'Ede South', NULL, 30),
(610, 'Ife Central', NULL, 30),
(611, 'Ife East', NULL, 30),
(612, 'Ife North', NULL, 30),
(613, 'Ife South', NULL, 30),
(614, 'Egbedore', NULL, 30),
(615, 'Ejigbo', NULL, 30),
(616, 'Ifedayo', NULL, 30),
(617, 'Ifelodun', NULL, 30),
(618, 'Ila', NULL, 30),
(619, 'Ilesa East', NULL, 30),
(620, 'Ilesa West', NULL, 30),
(621, 'Irepodun', NULL, 30),
(622, 'Irewole', NULL, 30),
(623, 'Isokan', NULL, 30),
(624, 'Iwo', NULL, 30),
(625, 'Obokun', NULL, 30),
(626, 'Odo Otin', NULL, 30),
(627, 'Ola Oluwa', NULL, 30),
(628, 'Olorunda', NULL, 30),
(629, 'Oriade', NULL, 30),
(630, 'Orolu', NULL, 30),
(631, 'Osogbo', NULL, 30),
(632, 'Afijio', NULL, 31),
(633, 'Akinyele', NULL, 31),
(634, 'Atiba', NULL, 31),
(635, 'Atisbo', NULL, 31),
(636, 'Egbeda', NULL, 31),
(637, 'Ibadan North', NULL, 31),
(638, 'Ibadan North-East', NULL, 31),
(639, 'Ibadan North-West', NULL, 31),
(640, 'Ibadan South-East', NULL, 31),
(641, 'Ibadan South-West', NULL, 31),
(642, 'Ibarapa Central', NULL, 31),
(643, 'Ibarapa East', NULL, 31),
(644, 'Ibarapa North', NULL, 31),
(645, 'Ido', NULL, 31),
(646, 'Irepo', NULL, 31),
(647, 'Iseyin', NULL, 31),
(648, 'Itesiwaju', NULL, 31),
(649, 'Iwajowa', NULL, 31),
(650, 'Kajola', NULL, 31),
(651, 'Lagelu', NULL, 31),
(652, 'Ogbomosho North', NULL, 31),
(653, 'Ogbomosho South', NULL, 31),
(654, 'Ogo Oluwa', NULL, 31),
(655, 'Olorunsogo', NULL, 31),
(656, 'Oluyole', NULL, 31),
(657, 'Ona Ara', NULL, 31),
(658, 'Orelope', NULL, 31),
(659, 'Ori Ire', NULL, 31),
(660, 'Oyo', NULL, 31),
(661, 'Oyo East', NULL, 31),
(662, 'Saki East', NULL, 31),
(663, 'Saki West', NULL, 31),
(664, 'Surulere, Oyo State', NULL, 31),
(665, 'Bokkos', NULL, 32),
(666, 'Barkin Ladi', NULL, 32),
(667, 'Bassa', NULL, 32),
(668, 'Jos East', NULL, 32),
(669, 'Jos North', NULL, 32),
(670, 'Jos South', NULL, 32),
(671, 'Kanam', NULL, 32),
(672, 'Kanke', NULL, 32),
(673, 'Langtang South', NULL, 32),
(674, 'Langtang North', NULL, 32),
(675, 'Mangu', NULL, 32),
(676, 'Mikang', NULL, 32),
(677, 'Pankshin', NULL, 32),
(678, 'Quaan Pan', NULL, 32),
(679, 'Riyom', NULL, 32),
(680, 'Shendam', NULL, 32),
(681, 'Wase', NULL, 32),
(682, 'Abua/Odual', NULL, 33),
(683, 'Ahoada East', NULL, 33),
(684, 'Ahoada West', NULL, 33),
(685, 'Akuku-Toru', NULL, 33),
(686, 'Andoni', NULL, 33),
(687, 'Asari-Toru', NULL, 33),
(688, 'Bonny', NULL, 33),
(689, 'Degema', NULL, 33),
(690, 'Eleme', NULL, 33),
(691, 'Emuoha', NULL, 33),
(692, 'Etche', NULL, 33),
(693, 'Gokana', NULL, 33),
(694, 'Ikwerre', NULL, 33),
(695, 'Khana', NULL, 33),
(696, 'Obio/Akpor', NULL, 33),
(697, 'Ogba/Egbema/Ndoni', NULL, 33),
(698, 'Ogu/Bolo', NULL, 33),
(699, 'Okrika', NULL, 33),
(700, 'Omuma', NULL, 33),
(701, 'Opobo/Nkoro', NULL, 33),
(702, 'Oyigbo', NULL, 33),
(703, 'Port Harcourt', NULL, 33),
(704, 'Tai', NULL, 33),
(705, 'Binji', NULL, 34),
(706, 'Bodinga', NULL, 34),
(707, 'Dange Shuni', NULL, 34),
(708, 'Gada', NULL, 34),
(709, 'Goronyo', NULL, 34),
(710, 'Gudu', NULL, 34),
(711, 'Gwadabawa', NULL, 34),
(712, 'Illela', NULL, 34),
(713, 'Isa', NULL, 34),
(714, 'Kebbe', NULL, 34),
(715, 'Kware', NULL, 34),
(716, 'Rabah', NULL, 34),
(717, 'Sabon Birni', NULL, 34),
(718, 'Shagari', NULL, 34),
(719, 'Silame', NULL, 34),
(720, 'Sokoto North', NULL, 34),
(721, 'Sokoto South', NULL, 34),
(722, 'Tambuwal', NULL, 34),
(723, 'Tangaza', NULL, 34),
(724, 'Tureta', NULL, 34),
(725, 'Wamako', NULL, 34),
(726, 'Wurno', NULL, 34),
(727, 'Yabo', NULL, 34),
(728, 'Ardo Kola', NULL, 35),
(729, 'Bali', NULL, 35),
(730, 'Donga', NULL, 35),
(731, 'Gashaka', NULL, 35),
(732, 'Gassol', NULL, 35),
(733, 'Ibi', NULL, 35),
(734, 'Jalingo', NULL, 35),
(735, 'Karim Lamido', NULL, 35),
(736, 'Kumi', NULL, 35),
(737, 'Lau', NULL, 35),
(738, 'Sardauna', NULL, 35),
(739, 'Takum', NULL, 35),
(740, 'Ussa', NULL, 35),
(741, 'Wukari', NULL, 35),
(742, 'Yorro', NULL, 35),
(743, 'Zing', NULL, 35),
(744, 'Bade', NULL, 36),
(745, 'Bursari', NULL, 36),
(746, 'Damaturu', NULL, 36),
(747, 'Fika', NULL, 36),
(748, 'Fune', NULL, 36),
(749, 'Geidam', NULL, 36),
(750, 'Gujba', NULL, 36),
(751, 'Gulani', NULL, 36),
(752, 'Jakusko', NULL, 36),
(753, 'Karasuwa', NULL, 36),
(754, 'Machina', NULL, 36),
(755, 'Nangere', NULL, 36),
(756, 'Nguru', NULL, 36),
(757, 'Potiskum', NULL, 36),
(758, 'Tarmuwa', NULL, 36),
(759, 'Yunusari', NULL, 36),
(760, 'Yusufari', NULL, 36),
(761, 'Anka', NULL, 37),
(762, 'Bakura', NULL, 37),
(763, 'Birnin Magaji/Kiyaw', NULL, 37),
(764, 'Bukkuyum', NULL, 37),
(765, 'Bungudu', NULL, 37),
(766, 'Gummi', NULL, 37),
(767, 'Gusau', NULL, 37),
(768, 'Kaura Namoda', NULL, 37),
(769, 'Maradun', NULL, 37),
(770, 'Maru', NULL, 37),
(771, 'Shinkafi', NULL, 37),
(772, 'Talata Mafara', NULL, 37),
(773, 'Chafe', NULL, 37),
(774, 'Zurmi', NULL, 37);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `code` varchar(6) DEFAULT NULL,
  `unit` int(1) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_register`
--

CREATE TABLE `course_register` (
  `course_register_id` int(11) NOT NULL,
  `ca` float DEFAULT NULL,
  `exam` float DEFAULT NULL,
  `attendance` int(2) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `credential`
--

CREATE TABLE `credential` (
  `credential_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `olevel` varchar(255) DEFAULT NULL,
  `olevel2` varchar(255) DEFAULT NULL,
  `dobc` varchar(255) DEFAULT NULL,
  `indigine` varchar(255) DEFAULT NULL,
  `primary_cert` varchar(255) DEFAULT NULL,
  `other_cert` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `credential_details`
--

CREATE TABLE `credential_details` (
  `credential_details_id` int(11) NOT NULL,
  `eng1` varchar(1) DEFAULT NULL,
  `mth1` varchar(1) DEFAULT NULL,
  `bio1` varchar(1) DEFAULT NULL,
  `che1` varchar(1) DEFAULT NULL,
  `phy1` varchar(1) DEFAULT NULL,
  `eng2` varchar(1) DEFAULT NULL,
  `mth2` varchar(1) DEFAULT NULL,
  `bio2` varchar(1) DEFAULT NULL,
  `che2` varchar(1) DEFAULT NULL,
  `phy2` varchar(1) DEFAULT NULL,
  `credential_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `dept_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `iso` varchar(55) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `certificate` varchar(100) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `about` varchar(500) DEFAULT NULL,
  `portfolio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `email_template_id` int(11) NOT NULL,
  `body` text,
  `help` text,
  `subject` varchar(40) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `experience_id` int(11) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `portfolio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facts`
--

CREATE TABLE `facts` (
  `facts_id` int(11) NOT NULL,
  `courses` int(11) DEFAULT NULL,
  `lectures` int(11) DEFAULT NULL,
  `students` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `form_id` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `choice` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `generated`
--

CREATE TABLE `generated` (
  `generated_id` int(11) NOT NULL,
  `title` varchar(55) DEFAULT NULL,
  `payer` enum('Fresh','Returning','All') DEFAULT 'All',
  `amount_payable` float DEFAULT NULL,
  `total_paid` float DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `branch_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `title` varchar(55) DEFAULT NULL,
  `payer` enum('Fresh','Returning','All') DEFAULT 'All',
  `amount` float DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `skill` varchar(100) DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL,
  `skills_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `function_id` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `experience_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `sender` int(11) DEFAULT NULL,
  `recipient` int(11) DEFAULT NULL,
  `body` varchar(500) DEFAULT NULL,
  `subject` varchar(40) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `description` varchar(350) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification_user`
--

CREATE TABLE `notification_user` (
  `notification_user_id` int(11) NOT NULL,
  `notification_read` int(1) DEFAULT '0',
  `notification_status` int(11) DEFAULT '0',
  `branch_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paid_invoice`
--

CREATE TABLE `paid_invoice` (
  `paid_invoice_id` int(11) NOT NULL,
  `amount_paid` float DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `confirmation` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `generated_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolio_id` int(11) NOT NULL,
  `iam` varchar(200) DEFAULT NULL,
  `about_me` text,
  `dobc` date DEFAULT NULL,
  `freelance` varchar(50) DEFAULT NULL,
  `degree` varchar(50) DEFAULT NULL,
  `more` text,
  `objectives` text,
  `facts` text,
  `testimonials` text,
  `contact` text,
  `branch_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(11) NOT NULL,
  `year` varchar(255) DEFAULT NULL,
  `current` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `site_name` varchar(50) DEFAULT NULL,
  `c_nit` varchar(30) DEFAULT NULL,
  `c_phone` varchar(30) DEFAULT NULL,
  `cell_phone` varchar(30) DEFAULT NULL,
  `c_address` varchar(60) DEFAULT NULL,
  `c_country` varchar(60) DEFAULT NULL,
  `c_city` varchar(60) DEFAULT NULL,
  `c_postal` varchar(30) DEFAULT NULL,
  `site_email` varchar(40) DEFAULT NULL,
  `mailer` enum('PHP','SMTP') DEFAULT 'PHP',
  `smtp_names` varchar(120) DEFAULT NULL,
  `email_address` varchar(120) DEFAULT NULL,
  `smtp_host` varchar(120) DEFAULT NULL,
  `smtp_user` varchar(120) DEFAULT NULL,
  `smtp_password` varchar(60) DEFAULT NULL,
  `smtp_port` varchar(10) DEFAULT NULL,
  `smtp_secure` varchar(10) DEFAULT NULL,
  `site_url` varchar(200) DEFAULT NULL,
  `thumb_web` varchar(10) DEFAULT NULL,
  `thumb_hweb` varchar(10) DEFAULT NULL,
  `thumb_w` varchar(4) DEFAULT NULL,
  `thumb_h` varchar(4) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `logo_web` varchar(500) DEFAULT NULL,
  `favicon` varchar(500) DEFAULT NULL,
  `backup` varchar(600) DEFAULT NULL,
  `version` varchar(5) DEFAULT NULL,
  `prefix` varchar(6) DEFAULT NULL,
  `track_digit` varchar(15) DEFAULT NULL,
  `currency` varchar(120) DEFAULT NULL,
  `for_currency` varchar(20) DEFAULT NULL,
  `for_symbol` varchar(20) DEFAULT NULL,
  `for_decimal` varchar(20) DEFAULT NULL,
  `cformat` text,
  `dec_point` text,
  `thousands_sep` text,
  `timezone` varchar(120) DEFAULT NULL,
  `language` varchar(120) DEFAULT NULL,
  `code_number` tinyint(4) DEFAULT NULL,
  `digit_random` varchar(14) DEFAULT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `info_mail` varchar(55) NOT NULL,
  `support_mail` varchar(55) NOT NULL,
  `booking_mail` varchar(55) NOT NULL,
  `customerservice_mail` varchar(55) NOT NULL,
  `operations_mail` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `site_name`, `c_nit`, `c_phone`, `cell_phone`, `c_address`, `c_country`, `c_city`, `c_postal`, `site_email`, `mailer`, `smtp_names`, `email_address`, `smtp_host`, `smtp_user`, `smtp_password`, `smtp_port`, `smtp_secure`, `site_url`, `thumb_web`, `thumb_hweb`, `thumb_w`, `thumb_h`, `logo`, `logo_web`, `favicon`, `backup`, `version`, `prefix`, `track_digit`, `currency`, `for_currency`, `for_symbol`, `for_decimal`, `cformat`, `dec_point`, `thousands_sep`, `timezone`, `language`, `code_number`, `digit_random`, `longitude`, `latitude`, `info_mail`, `support_mail`, `booking_mail`, `customerservice_mail`, `operations_mail`) VALUES
(1, 'Community School of Health Technology Gusau', '80012457087', '3479636014', '3479636014', 'No. 4 Along Gidan Dawa Road', 'Nigeria', 'Gusau', '577657', 'super@cshtgusau.com', 'PHP', 'Community School', 'adminsuper@cshtgusau.com', 'smtp.csht.edu.ng', 'info@.csht.edu.ng', '1234567890', '587', 'TLS', 'http://localhost/cs/', NULL, NULL, NULL, NULL, 'assets/img/logo1.jpg', 'assets/img/logo1.jpg', 'assets/img/logo1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NGN', '.', ',', 'Africa/Lagos', 'en', NULL, NULL, 0, 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `signing`
--

CREATE TABLE `signing` (
  `signing_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skills_id` int(11) NOT NULL,
  `about` varchar(100) DEFAULT NULL,
  `portfolio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `acct_no` varchar(10) DEFAULT NULL,
  `acct_name` varchar(255) DEFAULT NULL,
  `acct_bank` varchar(55) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `iso` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `name`, `iso`) VALUES
(1, 'Abia', NULL),
(2, 'Adamawa', NULL),
(3, 'Akwa Ibom', NULL),
(4, 'Anambra', NULL),
(5, 'Bauchi', NULL),
(6, 'Bayelsa', NULL),
(7, 'Benue', NULL),
(8, 'Borno', NULL),
(9, 'Cross River', NULL),
(10, 'Delta', NULL),
(11, 'Ebonyi', NULL),
(12, 'Edo', NULL),
(13, 'Ekiti', NULL),
(14, 'Enugu', NULL),
(15, 'FCT', NULL),
(16, 'Gombe', NULL),
(17, 'Imo', NULL),
(18, 'Jigawa', NULL),
(19, 'Kaduna', NULL),
(20, 'Kano', NULL),
(21, 'Katsina', NULL),
(22, 'Kebbi', NULL),
(23, 'Kogi', NULL),
(24, 'Kwara', NULL),
(25, 'Lagos', NULL),
(26, 'Nasarawa', NULL),
(27, 'Niger', NULL),
(28, 'Ogun', NULL),
(29, 'Ondo', NULL),
(30, 'Osun', NULL),
(31, 'Oyo', NULL),
(32, 'Plateau', NULL),
(33, 'Rivers', NULL),
(34, 'Sokoto', NULL),
(35, 'Taraba', NULL),
(36, 'Yobe', NULL),
(37, 'Zamfara', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `adm` varchar(25) DEFAULT NULL,
  `role` varchar(25) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `id` int(11) NOT NULL,
  `mod_style` varchar(200) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`id`, `mod_style`, `detail`, `color`, `type`) VALUES
(1, 'Pending_Collection', 'Pending Collection', '#a3a3a3', 1),
(2, 'Received Office', 'Received Office', '#36bea6', 1),
(3, 'Zone Port Services', 'In Transit', '#3a705f', 1),
(4, 'In_Warehouse', 'In Warehouse', '#e0ce07', 0),
(5, 'Distribution', 'Distribution', '#cd88ee', 0),
(6, 'Available', 'Available (only when you must retire at the offices)', '#0ae4ff', 0),
(7, 'On Route', 'En route for delivery (only when its door to door)', '#7460ee', 0),
(8, 'Delivered_to_port', 'Deliveries delivered', '#43bd00', 2),
(9, 'Cleared', 'Reserve clearance', '#ffa6a6', 2),
(10, 'Approved', 'Reserve Approved', '#ffa6a6', 0),
(11, 'Pending', 'Pending', '#ffbc34', 2),
(12, 'Rejected', 'Booking Online Canceled', '#fb8c00', 0),
(13, 'Consolidate', 'Consolidated Shipments', '#00ffbb', 0),
(14, 'Pick_up', 'Pick up package', '#2962FF', 0),
(15, 'Picked up', 'Picked up package', '#00adf2', 0),
(16, 'No Picked up', 'Not picked up package', '#ff008c', 0),
(17, 'Quotation', 'Quotation List', '#00ffc4', 0),
(18, 'Pending_quote', 'Pending quote', '#68c251', 0),
(19, 'Invoiced', 'Quotation approved quotation', '#1ac9d9', 0),
(21, 'Cancelled', 'cancelled', '#f62d51', 0),
(23, 'Pending_payment', 'pending payment', '#ffbc34', 2),
(24, 'Cargo_Loaded', 'Cargo Loaded', '#43bf09', 2),
(25, 'Dock_receipt_pending', 'Titled documents received', '#ee009a', 2),
(26, 'Inland', 'Titled documents received', '#0be39a', 2),
(27, 'Completed', 'Order succssful', '#43bd33', 2);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `testimony` text,
  `user_id` int(11) DEFAULT NULL,
  `portfolio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `timetable_id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  `period1` varchar(255) DEFAULT NULL,
  `period2` varchar(255) DEFAULT NULL,
  `period3` varchar(255) DEFAULT NULL,
  `period4` varchar(255) DEFAULT NULL,
  `period5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userlevel` tinyint(1) UNSIGNED DEFAULT NULL,
  `avatar` varchar(350) DEFAULT NULL,
  `ip` varchar(16) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `lastip` varchar(16) DEFAULT NULL,
  `notes` text,
  `phone` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `userrole` varchar(55) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `fname`, `lname`, `username`, `userlevel`, `avatar`, `ip`, `created`, `lastlogin`, `lastip`, `notes`, `phone`, `gender`, `newsletter`, `active`, `userrole`, `branch_id`, `address_id`) VALUES
(1, 'admin@marafco.com', '$2y$10$dQ/TbC/D.NVZn.tltYyl5Oms5muw.zjogSTnSB07eL9Z48MVoS16.', 'Aliyu', 'Yusuf', 'super', 9, 'uploads/images/passport.jpg', '', '2019-01-01 01:11:46', '2024-04-24 03:57:58', '::1', 'Marafco', '+2348167768410', 'Male', 1, 1, 'Super Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone_id` int(10) NOT NULL,
  `country_code` char(2) COLLATE utf8_bin NOT NULL,
  `zone_name` varchar(35) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zone_id`, `country_code`, `zone_name`) VALUES
(1, 'AD', 'Europe/Andorra'),
(2, 'AE', 'Asia/Dubai'),
(3, 'AF', 'Asia/Kabul'),
(4, 'AG', 'America/Antigua'),
(5, 'AI', 'America/Anguilla'),
(6, 'AL', 'Europe/Tirane'),
(7, 'AM', 'Asia/Yerevan'),
(8, 'AO', 'Africa/Luanda'),
(9, 'AQ', 'Antarctica/McMurdo'),
(10, 'AQ', 'Antarctica/Casey'),
(11, 'AQ', 'Antarctica/Davis'),
(12, 'AQ', 'Antarctica/DumontDUrville'),
(13, 'AQ', 'Antarctica/Mawson'),
(14, 'AQ', 'Antarctica/Palmer'),
(15, 'AQ', 'Antarctica/Rothera'),
(16, 'AQ', 'Antarctica/Syowa'),
(17, 'AQ', 'Antarctica/Troll'),
(18, 'AQ', 'Antarctica/Vostok'),
(19, 'AR', 'America/Argentina/Buenos_Aires'),
(20, 'AR', 'America/Argentina/Cordoba'),
(21, 'AR', 'America/Argentina/Salta'),
(22, 'AR', 'America/Argentina/Jujuy'),
(23, 'AR', 'America/Argentina/Tucuman'),
(24, 'AR', 'America/Argentina/Catamarca'),
(25, 'AR', 'America/Argentina/La_Rioja'),
(26, 'AR', 'America/Argentina/San_Juan'),
(27, 'AR', 'America/Argentina/Mendoza'),
(28, 'AR', 'America/Argentina/San_Luis'),
(29, 'AR', 'America/Argentina/Rio_Gallegos'),
(30, 'AR', 'America/Argentina/Ushuaia'),
(31, 'AS', 'Pacific/Pago_Pago'),
(32, 'AT', 'Europe/Vienna'),
(33, 'AU', 'Australia/Lord_Howe'),
(34, 'AU', 'Antarctica/Macquarie'),
(35, 'AU', 'Australia/Hobart'),
(36, 'AU', 'Australia/Currie'),
(37, 'AU', 'Australia/Melbourne'),
(38, 'AU', 'Australia/Sydney'),
(39, 'AU', 'Australia/Broken_Hill'),
(40, 'AU', 'Australia/Brisbane'),
(41, 'AU', 'Australia/Lindeman'),
(42, 'AU', 'Australia/Adelaide'),
(43, 'AU', 'Australia/Darwin'),
(44, 'AU', 'Australia/Perth'),
(45, 'AU', 'Australia/Eucla'),
(46, 'AW', 'America/Aruba'),
(47, 'AX', 'Europe/Mariehamn'),
(48, 'AZ', 'Asia/Baku'),
(49, 'BA', 'Europe/Sarajevo'),
(50, 'BB', 'America/Barbados'),
(51, 'BD', 'Asia/Dhaka'),
(52, 'BE', 'Europe/Brussels'),
(53, 'BF', 'Africa/Ouagadougou'),
(54, 'BG', 'Europe/Sofia'),
(55, 'BH', 'Asia/Bahrain'),
(56, 'BI', 'Africa/Bujumbura'),
(57, 'BJ', 'Africa/Porto-Novo'),
(58, 'BL', 'America/St_Barthelemy'),
(59, 'BM', 'Atlantic/Bermuda'),
(60, 'BN', 'Asia/Brunei'),
(61, 'BO', 'America/La_Paz'),
(62, 'BQ', 'America/Kralendijk'),
(63, 'BR', 'America/Noronha'),
(64, 'BR', 'America/Belem'),
(65, 'BR', 'America/Fortaleza'),
(66, 'BR', 'America/Recife'),
(67, 'BR', 'America/Araguaina'),
(68, 'BR', 'America/Maceio'),
(69, 'BR', 'America/Bahia'),
(70, 'BR', 'America/Sao_Paulo'),
(71, 'BR', 'America/Campo_Grande'),
(72, 'BR', 'America/Cuiaba'),
(73, 'BR', 'America/Santarem'),
(74, 'BR', 'America/Porto_Velho'),
(75, 'BR', 'America/Boa_Vista'),
(76, 'BR', 'America/Manaus'),
(77, 'BR', 'America/Eirunepe'),
(78, 'BR', 'America/Rio_Branco'),
(79, 'BS', 'America/Nassau'),
(80, 'BT', 'Asia/Thimphu'),
(81, 'BW', 'Africa/Gaborone'),
(82, 'BY', 'Europe/Minsk'),
(83, 'BZ', 'America/Belize'),
(84, 'CA', 'America/St_Johns'),
(85, 'CA', 'America/Halifax'),
(86, 'CA', 'America/Glace_Bay'),
(87, 'CA', 'America/Moncton'),
(88, 'CA', 'America/Goose_Bay'),
(89, 'CA', 'America/Blanc-Sablon'),
(90, 'CA', 'America/Toronto'),
(91, 'CA', 'America/Nipigon'),
(92, 'CA', 'America/Thunder_Bay'),
(93, 'CA', 'America/Iqaluit'),
(94, 'CA', 'America/Pangnirtung'),
(95, 'CA', 'America/Atikokan'),
(96, 'CA', 'America/Winnipeg'),
(97, 'CA', 'America/Rainy_River'),
(98, 'CA', 'America/Resolute'),
(99, 'CA', 'America/Rankin_Inlet'),
(100, 'CA', 'America/Regina'),
(101, 'CA', 'America/Swift_Current'),
(102, 'CA', 'America/Edmonton'),
(103, 'CA', 'America/Cambridge_Bay'),
(104, 'CA', 'America/Yellowknife'),
(105, 'CA', 'America/Inuvik'),
(106, 'CA', 'America/Creston'),
(107, 'CA', 'America/Dawson_Creek'),
(108, 'CA', 'America/Fort_Nelson'),
(109, 'CA', 'America/Vancouver'),
(110, 'CA', 'America/Whitehorse'),
(111, 'CA', 'America/Dawson'),
(112, 'CC', 'Indian/Cocos'),
(113, 'CD', 'Africa/Kinshasa'),
(114, 'CD', 'Africa/Lubumbashi'),
(115, 'CF', 'Africa/Bangui'),
(116, 'CG', 'Africa/Brazzaville'),
(117, 'CH', 'Europe/Zurich'),
(118, 'CI', 'Africa/Abidjan'),
(119, 'CK', 'Pacific/Rarotonga'),
(120, 'CL', 'America/Santiago'),
(121, 'CL', 'America/Punta_Arenas'),
(122, 'CL', 'Pacific/Easter'),
(123, 'CM', 'Africa/Douala'),
(124, 'CN', 'Asia/Shanghai'),
(125, 'CN', 'Asia/Urumqi'),
(126, 'CO', 'America/Bogota'),
(127, 'CR', 'America/Costa_Rica'),
(128, 'CU', 'America/Havana'),
(129, 'CV', 'Atlantic/Cape_Verde'),
(130, 'CW', 'America/Curacao'),
(131, 'CX', 'Indian/Christmas'),
(132, 'CY', 'Asia/Nicosia'),
(133, 'CY', 'Asia/Famagusta'),
(134, 'CZ', 'Europe/Prague'),
(135, 'DE', 'Europe/Berlin'),
(136, 'DE', 'Europe/Busingen'),
(137, 'DJ', 'Africa/Djibouti'),
(138, 'DK', 'Europe/Copenhagen'),
(139, 'DM', 'America/Dominica'),
(140, 'DO', 'America/Santo_Domingo'),
(141, 'DZ', 'Africa/Algiers'),
(142, 'EC', 'America/Guayaquil'),
(143, 'EC', 'Pacific/Galapagos'),
(144, 'EE', 'Europe/Tallinn'),
(145, 'EG', 'Africa/Cairo'),
(146, 'EH', 'Africa/El_Aaiun'),
(147, 'ER', 'Africa/Asmara'),
(148, 'ES', 'Europe/Madrid'),
(149, 'ES', 'Africa/Ceuta'),
(150, 'ES', 'Atlantic/Canary'),
(151, 'ET', 'Africa/Addis_Ababa'),
(152, 'FI', 'Europe/Helsinki'),
(153, 'FJ', 'Pacific/Fiji'),
(154, 'FK', 'Atlantic/Stanley'),
(155, 'FM', 'Pacific/Chuuk'),
(156, 'FM', 'Pacific/Pohnpei'),
(157, 'FM', 'Pacific/Kosrae'),
(158, 'FO', 'Atlantic/Faroe'),
(159, 'FR', 'Europe/Paris'),
(160, 'GA', 'Africa/Libreville'),
(161, 'GB', 'Europe/London'),
(162, 'GD', 'America/Grenada'),
(163, 'GE', 'Asia/Tbilisi'),
(164, 'GF', 'America/Cayenne'),
(165, 'GG', 'Europe/Guernsey'),
(166, 'GH', 'Africa/Accra'),
(167, 'GI', 'Europe/Gibraltar'),
(168, 'GL', 'America/Godthab'),
(169, 'GL', 'America/Danmarkshavn'),
(170, 'GL', 'America/Scoresbysund'),
(171, 'GL', 'America/Thule'),
(172, 'GM', 'Africa/Banjul'),
(173, 'GN', 'Africa/Conakry'),
(174, 'GP', 'America/Guadeloupe'),
(175, 'GQ', 'Africa/Malabo'),
(176, 'GR', 'Europe/Athens'),
(177, 'GS', 'Atlantic/South_Georgia'),
(178, 'GT', 'America/Guatemala'),
(179, 'GU', 'Pacific/Guam'),
(180, 'GW', 'Africa/Bissau'),
(181, 'GY', 'America/Guyana'),
(182, 'HK', 'Asia/Hong_Kong'),
(183, 'HN', 'America/Tegucigalpa'),
(184, 'HR', 'Europe/Zagreb'),
(185, 'HT', 'America/Port-au-Prince'),
(186, 'HU', 'Europe/Budapest'),
(187, 'ID', 'Asia/Jakarta'),
(188, 'ID', 'Asia/Pontianak'),
(189, 'ID', 'Asia/Makassar'),
(190, 'ID', 'Asia/Jayapura'),
(191, 'IE', 'Europe/Dublin'),
(192, 'IL', 'Asia/Jerusalem'),
(193, 'IM', 'Europe/Isle_of_Man'),
(194, 'IN', 'Asia/Kolkata'),
(195, 'IO', 'Indian/Chagos'),
(196, 'IQ', 'Asia/Baghdad'),
(197, 'IR', 'Asia/Tehran'),
(198, 'IS', 'Atlantic/Reykjavik'),
(199, 'IT', 'Europe/Rome'),
(200, 'JE', 'Europe/Jersey'),
(201, 'JM', 'America/Jamaica'),
(202, 'JO', 'Asia/Amman'),
(203, 'JP', 'Asia/Tokyo'),
(204, 'KE', 'Africa/Nairobi'),
(205, 'KG', 'Asia/Bishkek'),
(206, 'KH', 'Asia/Phnom_Penh'),
(207, 'KI', 'Pacific/Tarawa'),
(208, 'KI', 'Pacific/Enderbury'),
(209, 'KI', 'Pacific/Kiritimati'),
(210, 'KM', 'Indian/Comoro'),
(211, 'KN', 'America/St_Kitts'),
(212, 'KP', 'Asia/Pyongyang'),
(213, 'KR', 'Asia/Seoul'),
(214, 'KW', 'Asia/Kuwait'),
(215, 'KY', 'America/Cayman'),
(216, 'KZ', 'Asia/Almaty'),
(217, 'KZ', 'Asia/Qyzylorda'),
(218, 'KZ', 'Asia/Aqtobe'),
(219, 'KZ', 'Asia/Aqtau'),
(220, 'KZ', 'Asia/Atyrau'),
(221, 'KZ', 'Asia/Oral'),
(222, 'LA', 'Asia/Vientiane'),
(223, 'LB', 'Asia/Beirut'),
(224, 'LC', 'America/St_Lucia'),
(225, 'LI', 'Europe/Vaduz'),
(226, 'LK', 'Asia/Colombo'),
(227, 'LR', 'Africa/Monrovia'),
(228, 'LS', 'Africa/Maseru'),
(229, 'LT', 'Europe/Vilnius'),
(230, 'LU', 'Europe/Luxembourg'),
(231, 'LV', 'Europe/Riga'),
(232, 'LY', 'Africa/Tripoli'),
(233, 'MA', 'Africa/Casablanca'),
(234, 'MC', 'Europe/Monaco'),
(235, 'MD', 'Europe/Chisinau'),
(236, 'ME', 'Europe/Podgorica'),
(237, 'MF', 'America/Marigot'),
(238, 'MG', 'Indian/Antananarivo'),
(239, 'MH', 'Pacific/Majuro'),
(240, 'MH', 'Pacific/Kwajalein'),
(241, 'MK', 'Europe/Skopje'),
(242, 'ML', 'Africa/Bamako'),
(243, 'MM', 'Asia/Yangon'),
(244, 'MN', 'Asia/Ulaanbaatar'),
(245, 'MN', 'Asia/Hovd'),
(246, 'MN', 'Asia/Choibalsan'),
(247, 'MO', 'Asia/Macau'),
(248, 'MP', 'Pacific/Saipan'),
(249, 'MQ', 'America/Martinique'),
(250, 'MR', 'Africa/Nouakchott'),
(251, 'MS', 'America/Montserrat'),
(252, 'MT', 'Europe/Malta'),
(253, 'MU', 'Indian/Mauritius'),
(254, 'MV', 'Indian/Maldives'),
(255, 'MW', 'Africa/Blantyre'),
(256, 'MX', 'America/Mexico_City'),
(257, 'MX', 'America/Cancun'),
(258, 'MX', 'America/Merida'),
(259, 'MX', 'America/Monterrey'),
(260, 'MX', 'America/Matamoros'),
(261, 'MX', 'America/Mazatlan'),
(262, 'MX', 'America/Chihuahua'),
(263, 'MX', 'America/Ojinaga'),
(264, 'MX', 'America/Hermosillo'),
(265, 'MX', 'America/Tijuana'),
(266, 'MX', 'America/Bahia_Banderas'),
(267, 'MY', 'Asia/Kuala_Lumpur'),
(268, 'MY', 'Asia/Kuching'),
(269, 'MZ', 'Africa/Maputo'),
(270, 'NA', 'Africa/Windhoek'),
(271, 'NC', 'Pacific/Noumea'),
(272, 'NE', 'Africa/Niamey'),
(273, 'NF', 'Pacific/Norfolk'),
(274, 'NG', 'Africa/Lagos'),
(275, 'NI', 'America/Managua'),
(276, 'NL', 'Europe/Amsterdam'),
(277, 'NO', 'Europe/Oslo'),
(278, 'NP', 'Asia/Kathmandu'),
(279, 'NR', 'Pacific/Nauru'),
(280, 'NU', 'Pacific/Niue'),
(281, 'NZ', 'Pacific/Auckland'),
(282, 'NZ', 'Pacific/Chatham'),
(283, 'OM', 'Asia/Muscat'),
(284, 'PA', 'America/Panama'),
(285, 'PE', 'America/Lima'),
(286, 'PF', 'Pacific/Tahiti'),
(287, 'PF', 'Pacific/Marquesas'),
(288, 'PF', 'Pacific/Gambier'),
(289, 'PG', 'Pacific/Port_Moresby'),
(290, 'PG', 'Pacific/Bougainville'),
(291, 'PH', 'Asia/Manila'),
(292, 'PK', 'Asia/Karachi'),
(293, 'PL', 'Europe/Warsaw'),
(294, 'PM', 'America/Miquelon'),
(295, 'PN', 'Pacific/Pitcairn'),
(296, 'PR', 'America/Puerto_Rico'),
(297, 'PS', 'Asia/Gaza'),
(298, 'PS', 'Asia/Hebron'),
(299, 'PT', 'Europe/Lisbon'),
(300, 'PT', 'Atlantic/Madeira'),
(301, 'PT', 'Atlantic/Azores'),
(302, 'PW', 'Pacific/Palau'),
(303, 'PY', 'America/Asuncion'),
(304, 'QA', 'Asia/Qatar'),
(305, 'RE', 'Indian/Reunion'),
(306, 'RO', 'Europe/Bucharest'),
(307, 'RS', 'Europe/Belgrade'),
(308, 'RU', 'Europe/Kaliningrad'),
(309, 'RU', 'Europe/Moscow'),
(310, 'RU', 'Europe/Simferopol'),
(311, 'RU', 'Europe/Volgograd'),
(312, 'RU', 'Europe/Kirov'),
(313, 'RU', 'Europe/Astrakhan'),
(314, 'RU', 'Europe/Saratov'),
(315, 'RU', 'Europe/Ulyanovsk'),
(316, 'RU', 'Europe/Samara'),
(317, 'RU', 'Asia/Yekaterinburg'),
(318, 'RU', 'Asia/Omsk'),
(319, 'RU', 'Asia/Novosibirsk'),
(320, 'RU', 'Asia/Barnaul'),
(321, 'RU', 'Asia/Tomsk'),
(322, 'RU', 'Asia/Novokuznetsk'),
(323, 'RU', 'Asia/Krasnoyarsk'),
(324, 'RU', 'Asia/Irkutsk'),
(325, 'RU', 'Asia/Chita'),
(326, 'RU', 'Asia/Yakutsk'),
(327, 'RU', 'Asia/Khandyga'),
(328, 'RU', 'Asia/Vladivostok'),
(329, 'RU', 'Asia/Ust-Nera'),
(330, 'RU', 'Asia/Magadan'),
(331, 'RU', 'Asia/Sakhalin'),
(332, 'RU', 'Asia/Srednekolymsk'),
(333, 'RU', 'Asia/Kamchatka'),
(334, 'RU', 'Asia/Anadyr'),
(335, 'RW', 'Africa/Kigali'),
(336, 'SA', 'Asia/Riyadh'),
(337, 'SB', 'Pacific/Guadalcanal'),
(338, 'SC', 'Indian/Mahe'),
(339, 'SD', 'Africa/Khartoum'),
(340, 'SE', 'Europe/Stockholm'),
(341, 'SG', 'Asia/Singapore'),
(342, 'SH', 'Atlantic/St_Helena'),
(343, 'SI', 'Europe/Ljubljana'),
(344, 'SJ', 'Arctic/Longyearbyen'),
(345, 'SK', 'Europe/Bratislava'),
(346, 'SL', 'Africa/Freetown'),
(347, 'SM', 'Europe/San_Marino'),
(348, 'SN', 'Africa/Dakar'),
(349, 'SO', 'Africa/Mogadishu'),
(350, 'SR', 'America/Paramaribo'),
(351, 'SS', 'Africa/Juba'),
(352, 'ST', 'Africa/Sao_Tome'),
(353, 'SV', 'America/El_Salvador'),
(354, 'SX', 'America/Lower_Princes'),
(355, 'SY', 'Asia/Damascus'),
(356, 'SZ', 'Africa/Mbabane'),
(357, 'TC', 'America/Grand_Turk'),
(358, 'TD', 'Africa/Ndjamena'),
(359, 'TF', 'Indian/Kerguelen'),
(360, 'TG', 'Africa/Lome'),
(361, 'TH', 'Asia/Bangkok'),
(362, 'TJ', 'Asia/Dushanbe'),
(363, 'TK', 'Pacific/Fakaofo'),
(364, 'TL', 'Asia/Dili'),
(365, 'TM', 'Asia/Ashgabat'),
(366, 'TN', 'Africa/Tunis'),
(367, 'TO', 'Pacific/Tongatapu'),
(368, 'TR', 'Europe/Istanbul'),
(369, 'TT', 'America/Port_of_Spain'),
(370, 'TV', 'Pacific/Funafuti'),
(371, 'TW', 'Asia/Taipei'),
(372, 'TZ', 'Africa/Dar_es_Salaam'),
(373, 'UA', 'Europe/Kiev'),
(374, 'UA', 'Europe/Uzhgorod'),
(375, 'UA', 'Europe/Zaporozhye'),
(376, 'UG', 'Africa/Kampala'),
(377, 'UM', 'Pacific/Midway'),
(378, 'UM', 'Pacific/Wake'),
(379, 'US', 'America/New_York'),
(380, 'US', 'America/Detroit'),
(381, 'US', 'America/Kentucky/Louisville'),
(382, 'US', 'America/Kentucky/Monticello'),
(383, 'US', 'America/Indiana/Indianapolis'),
(384, 'US', 'America/Indiana/Vincennes'),
(385, 'US', 'America/Indiana/Winamac'),
(386, 'US', 'America/Indiana/Marengo'),
(387, 'US', 'America/Indiana/Petersburg'),
(388, 'US', 'America/Indiana/Vevay'),
(389, 'US', 'America/Chicago'),
(390, 'US', 'America/Indiana/Tell_City'),
(391, 'US', 'America/Indiana/Knox'),
(392, 'US', 'America/Menominee'),
(393, 'US', 'America/North_Dakota/Center'),
(394, 'US', 'America/North_Dakota/New_Salem'),
(395, 'US', 'America/North_Dakota/Beulah'),
(396, 'US', 'America/Denver'),
(397, 'US', 'America/Boise'),
(398, 'US', 'America/Phoenix'),
(399, 'US', 'America/Los_Angeles'),
(400, 'US', 'America/Anchorage'),
(401, 'US', 'America/Juneau'),
(402, 'US', 'America/Sitka'),
(403, 'US', 'America/Metlakatla'),
(404, 'US', 'America/Yakutat'),
(405, 'US', 'America/Nome'),
(406, 'US', 'America/Adak'),
(407, 'US', 'Pacific/Honolulu'),
(408, 'UY', 'America/Montevideo'),
(409, 'UZ', 'Asia/Samarkand'),
(410, 'UZ', 'Asia/Tashkent'),
(411, 'VA', 'Europe/Vatican'),
(412, 'VC', 'America/St_Vincent'),
(413, 'VE', 'America/Caracas'),
(414, 'VG', 'America/Tortola'),
(415, 'VI', 'America/St_Thomas'),
(416, 'VN', 'Asia/Ho_Chi_Minh'),
(417, 'VU', 'Pacific/Efate'),
(418, 'WF', 'Pacific/Wallis'),
(419, 'WS', 'Pacific/Apia'),
(420, 'YE', 'Asia/Aden'),
(421, 'YT', 'Indian/Mayotte'),
(422, 'ZA', 'Africa/Johannesburg'),
(423, 'ZM', 'Africa/Lusaka'),
(424, 'ZW', 'Africa/Harare');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`allocation_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `allocation_history`
--
ALTER TABLE `allocation_history`
  ADD PRIMARY KEY (`allocation_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `course_register`
--
ALTER TABLE `course_register`
  ADD PRIMARY KEY (`course_register_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `credential`
--
ALTER TABLE `credential`
  ADD PRIMARY KEY (`credential_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `credential_details`
--
ALTER TABLE `credential_details`
  ADD PRIMARY KEY (`credential_details_id`),
  ADD KEY `credential_id` (`credential_id`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `portfolio_id` (`portfolio_id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`email_template_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`experience_id`),
  ADD KEY `portfolio_id` (`portfolio_id`);

--
-- Indexes for table `facts`
--
ALTER TABLE `facts`
  ADD PRIMARY KEY (`facts_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `generated`
--
ALTER TABLE `generated`
  ADD PRIMARY KEY (`generated_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `skills_id` (`skills_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`function_id`),
  ADD KEY `experience_id` (`experience_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `recipient` (`recipient`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `notification_user`
--
ALTER TABLE `notification_user`
  ADD PRIMARY KEY (`notification_user_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `paid_invoice`
--
ALTER TABLE `paid_invoice`
  ADD PRIMARY KEY (`paid_invoice_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `generated_id` (`generated_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolio_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `signing`
--
ALTER TABLE `signing`
  ADD PRIMARY KEY (`signing_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skills_id`),
  ADD KEY `portfolio_id` (`portfolio_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `portfolio_id` (`portfolio_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`timetable_id`),
  ADD UNIQUE KEY `dept_id` (`dept_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zone_id`),
  ADD KEY `idx_country_code` (`country_code`),
  ADD KEY `idx_zone_name` (`zone_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocation`
--
ALTER TABLE `allocation`
  MODIFY `allocation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allocation_history`
--
ALTER TABLE `allocation_history`
  MODIFY `allocation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_register`
--
ALTER TABLE `course_register`
  MODIFY `course_register_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credential`
--
ALTER TABLE `credential`
  MODIFY `credential_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credential_details`
--
ALTER TABLE `credential_details`
  MODIFY `credential_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `email_template_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facts`
--
ALTER TABLE `facts`
  MODIFY `facts_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generated`
--
ALTER TABLE `generated`
  MODIFY `generated_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `function_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_user`
--
ALTER TABLE `notification_user`
  MODIFY `notification_user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paid_invoice`
--
ALTER TABLE `paid_invoice`
  MODIFY `paid_invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `signing`
--
ALTER TABLE `signing`
  MODIFY `signing_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skills_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `timetable_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zone_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `allocation`
--
ALTER TABLE `allocation`
  ADD CONSTRAINT `allocation_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `allocation_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `allocation_history`
--
ALTER TABLE `allocation_history`
  ADD CONSTRAINT `allocation_history_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `allocation_history_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`dept_id`);

--
-- Constraints for table `course_register`
--
ALTER TABLE `course_register`
  ADD CONSTRAINT `course_register_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `course_register_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`),
  ADD CONSTRAINT `course_register_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `course_register_ibfk_4` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `credential`
--
ALTER TABLE `credential`
  ADD CONSTRAINT `credential_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `credential_details`
--
ALTER TABLE `credential_details`
  ADD CONSTRAINT `credential_details_ibfk_1` FOREIGN KEY (`credential_id`) REFERENCES `credential` (`credential_id`);

--
-- Constraints for table `dept`
--
ALTER TABLE `dept`
  ADD CONSTRAINT `dept_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`portfolio_id`);

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`portfolio_id`);

--
-- Constraints for table `facts`
--
ALTER TABLE `facts`
  ADD CONSTRAINT `facts_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `generated`
--
ALTER TABLE `generated`
  ADD CONSTRAINT `generated_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `generated_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `generated_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`dept_id`),
  ADD CONSTRAINT `generated_ibfk_4` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`dept_id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`skills_id`) REFERENCES `skills` (`skills_id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`experience_id`) REFERENCES `experience` (`experience_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`recipient`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `notification_user`
--
ALTER TABLE `notification_user`
  ADD CONSTRAINT `notification_user_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `notification_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `paid_invoice`
--
ALTER TABLE `paid_invoice`
  ADD CONSTRAINT `paid_invoice_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `paid_invoice_ibfk_2` FOREIGN KEY (`generated_id`) REFERENCES `generated` (`generated_id`);

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `portfolio_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `generated` (`generated_id`);

--
-- Constraints for table `signing`
--
ALTER TABLE `signing`
  ADD CONSTRAINT `signing_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `signing_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`portfolio_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`dept_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD CONSTRAINT `testimonial_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `testimonial_ibfk_2` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`portfolio_id`);

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`dept_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
