-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 11 mars 2021 à 11:09
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_agria`
--
CREATE DATABASE IF NOT EXISTS `db_agria` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_agria`;

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `name_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diet_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `population_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_picture_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `avatar`
--

CREATE TABLE `avatar` (
  `id` int(11) NOT NULL,
  `name_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `badge`
--

CREATE TABLE `badge` (
  `id` int(11) NOT NULL,
  `name_badge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_badge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_badge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `continent`
--

CREATE TABLE `continent` (
  `id` int(11) NOT NULL,
  `name_continent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `continent`
--

INSERT INTO `continent` (`id`, `name_continent`) VALUES
(1, 'Afrique'),
(2, 'Amérique du Nord'),
(3, 'Amérique du Sud'),
(4, 'Antarctique'),
(5, 'Asie'),
(6, 'Europe'),
(7, 'Océanie'),
(8, 'Océan Arctique'),
(9, 'Océan Atlantique'),
(10, 'Océan Austral'),
(11, 'Océan Indien'),
(12, 'Océan Pacifique');

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `id_continent_country_id` int(11) NOT NULL,
  `name_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude_country` double NOT NULL,
  `longitude_country` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`id`, `id_continent_country_id`, `name_country`, `latitude_country`, `longitude_country`) VALUES
(1, 6, 'Andorra', 42.5, 1.5),
(2, 5, 'United Arab Emirates', 24, 54),
(3, 5, 'Afghanistan', 33, 65),
(4, 2, 'Antigua and Barbuda', 17.05, -61.8),
(5, 2, 'Anguilla', 18.25, -63.1667),
(6, 6, 'Albania', 41, 20),
(7, 6, 'Armenia', 40, 45),
(8, 2, 'Netherlands Antilles', 12.25, -68.75),
(9, 1, 'Angola', -12.5, 18.5),
(10, 4, 'Antarctica', -90, 0),
(11, 3, 'Argentina', -34, -64),
(12, 7, 'American Samoa', -14.3333, -170),
(13, 6, 'Austria', 47.3333, 13.3333),
(14, 7, 'Australia', -27, 133),
(15, 3, 'Aruba', 12.5, -69.9667),
(16, 6, 'Aland IslandsAland Islands', 0.1, 0.1),
(17, 5, 'Azerbaijan', 40.5, 47.5),
(18, 6, 'Bosnia and Herzegovina', 44, 18),
(19, 2, 'Barbados', 13.1667, -59.5333),
(20, 5, 'Bangladesh', 24, 90),
(21, 6, 'Belgium', 50.8333, 4),
(22, 1, 'Burkina Faso', 13, -2),
(23, 6, 'Bulgaria', 43, 25),
(24, 5, 'Bahrain', 26, 50.55),
(25, 1, 'Burundi', -3.5, 30),
(26, 1, 'Benin', 9.5, 2.25),
(27, 2, 'Saint Barthlemy', 17.897318709651124, -62.837118280565655),
(28, 2, 'Bermuda', 32.3333, -64.75),
(29, 5, 'Brunei Darussalam', 4.5, 114.6667),
(30, 3, 'BoliviaBolivia, Plurinational state of', -17, -65),
(31, 3, 'Brazil', -10, -55),
(32, 2, 'Bahamas', 24.25, -76),
(33, 5, 'Bhutan', 27.5, 90.5),
(34, 9, 'Bouvet Island', -54.4333, 3.4),
(35, 1, 'Botswana', -22, 24),
(36, 6, 'Belarus', 53, 28),
(37, 2, 'Belize', 17.25, -88.75),
(38, 2, 'Canada', 60, -95),
(39, 3, 'Cocos (Keeling) Islands', -12.5, 96.8333),
(40, 1, 'Congo, The Democratic Republic of the', -4.038333, 21.758664),
(41, 1, 'Central African Republic', 7, 21),
(42, 1, 'Congo', -1, 15),
(43, 6, 'Switzerland', 47, 8),
(44, 1, "Côte d'Ivoire", 8, -5),
(45, 7, 'Cook Islands', -21.2333, -159.7667),
(46, 3, 'Chile', -30, -71),
(47, 1, 'Cameroon', 6, 12),
(48, 5, 'China', 35, 105),
(49, 3, 'Colombia', 4, -72),
(50, 3, 'Costa Rica', 10, -84),
(51, 2, 'Cuba', 21.5, -80),
(52, 1, 'Cape Verde', 16, -24),
(53, 5, 'Christmas Island', -10.5, 105.6667),
(54, 6, 'Cyprus', 35, 33),
(55, 6, 'Czech Republic', 49.75, 15.5),
(56, 6, 'Germany', 51, 9),
(57, 1, 'Djibouti', 11.5, 43),
(58, 6, 'Denmark', 56, 10),
(59, 2, 'Dominica', 15.4167, -61.3333),
(60, 2, 'Dominican Republic', 19, -70.6667),
(61, 1, 'Algeria', 28, 3),
(62, 3, 'Ecuador', -2, -77.5),
(63, 6, 'Estonia', 59, 26),
(64, 1, 'Egypt', 27, 30),
(65, 1, 'Western Sahara', 24.5, -13),
(66, 1, 'Eritrea', 15, 39),
(67, 6, 'Spain', 40, -4),
(68, 1, 'Ethiopia', 8, 38),
(69, 6, 'Finland', 64, 26),
(70, 7, 'Fiji', -18, 175),
(71, 3, 'Falkland Islands (Malvinas)', -51.75, -59),
(72, 7, 'Micronesia, Federated States of', 6.9167, 158.25),
(73, 6, 'Faroe Islands', 62, -7),
(74, 6, 'France', 46, 2),
(75, 1, 'Gabon', -1, 11.75),
(76, 6, 'United Kingdom', 54, -2),
(77, 2, 'Grenada', 12.1167, -61.6667),
(78, 6, 'Georgia', 42, 43.5),
(79, 3, 'French Guiana', 4, -53),
(80, 6, 'Guernsey', 49.465691, -2.585278),
(81, 1, 'Ghana', 8, -2),
(82, 6, 'Gibraltar', 36.1833, -5.3667),
(83, 2, 'Greenland', 72, -40),
(84, 1, 'Gambia', 13.4667, -16.5667),
(85, 1, 'Guinea', 11, -10),
(86, 2, 'Guadeloupe', 16.25, -61.5833),
(87, 1, 'Equatorial Guinea', 2, 10),
(88, 6, 'Greece', 39, 22),
(89, 6, 'South Georgia and the South Sandwich Islands', -54.5, -37),
(90, 3, 'Guatemala', 15.5, -90.25),
(91, 7, 'Guam', 13.4667, 144.7833),
(92, 1, 'Guinea-Bissau', 12, -15),
(93, 3, 'Guyana', 5, -59),
(94, 5, 'Hong Kong', 22.25, 114.1667),
(95, 7, 'Heard Island and McDonald Islands', -53.1, 72.5167),
(96, 3, 'Honduras', 15, -86.5),
(97, 6, 'Croatia', 45.1667, 15.5),
(98, 2, 'Haiti', 19, -72.4167),
(99, 6, 'Hungary', 47, 20),
(100, 5, 'Indonesia', -5, 120),
(101, 6, 'Ireland', 53, -8),
(102, 5, 'Israel', 31.5, 34.75),
(103, 6, 'Isle of Man', 54.236107, -4.548056),
(104, 5, 'India', 20, 77),
(105, 5, 'British Indian Ocean Territory', -6, 71.5),
(106, 5, 'Iraq', 33, 44),
(107, 5, 'Iran, Islamic Republic of', 32, 53),
(108, 6, 'Iceland', 65, -18),
(109, 6, 'Italy', 42.8333, 12.8333),
(110, 6, 'Jersey', 49.214439, -2.13125),
(111, 2, 'Jamaica', 18.25, -77.5),
(112, 5, 'Jordan', 31, 36),
(113, 5, 'Japan', 36, 138),
(114, 1, 'Kenya', 1, 38),
(115, 5, 'Kyrgyzstan', 41, 75),
(116, 5, 'Cambodia', 13, 105),
(117, 7, 'Kiribati', 1.4167, 173),
(118, 1, 'Comoros', -12.1667, 44.25),
(119, 2, 'Saint Kitts and Nevis', 17.3333, -62.75),
(120, 5, "Korea, Democratic People's Republic of", 40, 127),
(121, 5, 'Korea, Republic of', 37, 127.5),
(122, 5, 'Kuwait', 29.5, 45.75),
(123, 2, 'Cayman Islands', 19.5, -80.5),
(124, 5, 'Kazakhstan', 48, 68),
(125, 5, "Lao People's Democratic Republic", 18, 105),
(126, 5, 'Lebanon', 33.8333, 35.8333),
(127, 2, 'Saint Lucia', 13.8833, -61.1333),
(128, 6, 'Liechtenstein', 47.1667, 9.5333),
(129, 5, 'Sri Lanka', 7, 81),
(130, 1, 'Liberia', 6.5, -9.5),
(131, 1, 'Lesotho', -29.5, 28.5),
(132, 6, 'Lithuania', 56, 24),
(133, 6, 'Luxembourg', 49.75, 6.1667),
(134, 6, 'Latvia', 57, 25),
(135, 1, 'Libyan Arab Jamahiriya', 25, 17),
(136, 1, 'Morocco', 32, -5),
(137, 6, 'Monaco', 43.7333, 7.4),
(138, 6, 'Moldova, Republic of', 47, 29),
(139, 6, 'Montenegro', 42.572638, 18.807756),
(140, 2, 'Saint Martin', 18.067605410825966, -63.04961942510952),
(141, 1, 'Madagascar', -20, 47),
(142, 7, 'Marshall Islands', 9, 168),
(143, 6, 'Macedonia', 41.8333, 22),
(144, 1, 'Mali', 17, -4),
(145, 5, 'Myanmar', 21.913965, 95.956223),
(146, 5, 'Mongolia', 46, 105),
(147, 5, 'Macao', 22.1667, 113.55),
(148, 7, 'Northern Mariana Islands', 15.2, 145.75),
(149, 2, 'Martinique', 14.6667, -61),
(150, 1, 'Mauritania', 20, -12),
(151, 2, 'Montserrat', 16.75, -62.2),
(152, 6, 'Malta', 35.8333, 14.5833),
(153, 1, 'Mauritius', -20.2833, 57.55),
(154, 5, 'Maldives', 3.25, 73),
(155, 1, 'Malawi', -13.5, 34),
(156, 3, 'Mexico', 23, -102),
(157, 5, 'Malaysia', 2.5, 112.5),
(158, 1, 'Mozambique', -18.25, 35),
(159, 1, 'Namibia', -22, 17),
(160, 7, 'New Caledonia', -21.5, 165.5),
(161, 1, 'Niger', 16, 8),
(162, 7, 'Norfolk Island', -29.0333, 167.95),
(163, 1, 'Nigeria', 10, 8),
(164, 3, 'Nicaragua', 13, -85),
(165, 6, 'Netherlands', 52.5, 5.75),
(166, 6, 'Norway', 62, 10),
(167, 5, 'Nepal', 28, 84),
(168, 7, 'Nauru', -0.5333, 166.9167),
(169, 7, 'Niue', -19.0333, -169.8667),
(170, 7, 'New Zealand', -41, 174),
(171, 5, 'Oman', 21, 57),
(172, 3, 'Panama', 9, -80),
(173, 3, 'Peru', -10, -76),
(174, 7, 'French Polynesia', -15, -140),
(175, 7, 'Papua New Guinea', -6, 147),
(176, 5, 'Philippines', 13, 122),
(177, 5, 'Pakistan', 30, 70),
(178, 6, 'Poland', 52, 20),
(179, 2, 'Saint Pierre and Miquelon', 46.8333, -56.3333),
(180, 7, 'Pitcairn', -24.703615, -127.439308),
(181, 2, 'Puerto Rico', 18.25, -66.5),
(182, 5, 'Palestinian Territory, Occupied', 32, 35.25),
(183, 6, 'Portugal', 39.5, -8),
(184, 7, 'Palau', 7.5, 134.5),
(185, 3, 'Paraguay', -23, -58),
(186, 5, 'Qatar', 25.5, 51.25),
(187, 1, 'Réunion', -21.1, 55.6),
(188, 6, 'Romania', 46, 25),
(189, 6, 'Serbia', 44.015194, 20.729164),
(190, 5, 'Russian Federation', 60, 100),
(191, 1, 'Rwanda', -2, 30),
(192, 5, 'Saudi Arabia', 25, 45),
(193, 5, 'Solomon Islands', -8, 159),
(194, 1, 'Seychelles', -4.5833, 55.6667),
(195, 1, 'Sudan', 15, 30),
(196, 6, 'Sweden', 62, 15),
(197, 5, 'Singapore', 1.3667, 103.8),
(198, 1, 'Saint Helena', -15.9333, -5.7),
(199, 6, 'Slovenia', 46, 15),
(200, 6, 'Svalbard and Jan Mayen', 78, 20),
(201, 6, 'Slovakia', 48.6667, 19.5),
(202, 1, 'Sierra Leone', 8.5, -11.5),
(203, 6, 'San Marino', 43.7667, 12.4167),
(204, 1, 'Senegal', 14, -14),
(205, 1, 'Somalia', 10, 49),
(206, 3, 'Suriname', 4, -56),
(207, 1, 'Sao Tome and Principe', 1, 7),
(208, 3, 'El Salvador', 13.8333, -88.9167),
(209, 5, 'Syrian Arab Republic', 35, 38),
(210, 1, 'Swaziland', -26.5, 31.5),
(211, 2, 'Turks and Caicos Islands', 21.75, -71.5833),
(212, 1, 'Chad', 15, 19),
(213, 11, 'French Southern Territories', -49.44996, 70.024982),
(214, 1, 'Togo', 8, 1.1667),
(215, 5, 'Thailand', 15, 100),
(216, 5, 'Tajikistan', 39, 71),
(217, 7, 'Tokelau', -9, -172),
(218, 5, 'Timor-Leste', -8.874217, 125.727539),
(219, 5, 'Turkmenistan', 40, 60),
(220, 1, 'Tunisia', 34, 9),
(221, 7, 'Tonga', -20, -175),
(222, 5, 'Turkey', 39, 35),
(223, 2, 'Trinidad and Tobago', 11, -61),
(224, 7, 'Tuvalu', -8, 178),
(225, 5, 'Taiwan', 23.5, 121),
(226, 1, 'Tanzania, United Republic of', -6, 35),
(227, 6, 'Ukraine', 49, 32),
(228, 1, 'Uganda', 1, 32),
(229, 2, 'United States Minor Outlying Islands', 19.2833, 166.6),
(230, 2, 'United States', 38, -97),
(231, 3, 'Uruguay', -33, -56),
(232, 5, 'Uzbekistan', 41, 64),
(233, 6, 'Holy See (Vatican City State)', 41.9, 12.45),
(234, 2, 'Saint Vincent and the Grenadines', 13.25, -61.2),
(235, 3, 'Venezuela, Bolivarian Republic of', 8, -66),
(236, 2, 'Virgin Islands, British', 18.5, -64.5),
(237, 2, 'Virgin Islands, U.S.', 18.3333, -64.8333),
(238, 5, 'Viet Nam', 16, 106),
(239, 7, 'Vanuatu', -16, 167),
(240, 7, 'Wallis and Futuna', -13.3, -176.2),
(241, 7, 'Samoa', -13.5833, -172.3333),
(242, 5, 'Yemen', 15, 48),
(243, 1, 'Mayotte', -12.8333, 45.1667),
(244, 1, 'South Africa', -29, 24),
(245, 1, 'Zambia', -15, 30),
(246, 1, 'Zimbabwe', -20, 30);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210311100252', '2021-03-11 10:03:47', 781),
('DoctrineMigrations\\Version20210311101750', '2021-03-11 10:18:02', 70),
('DoctrineMigrations\\Version20210311103050', '2021-03-11 10:31:02', 81);

-- --------------------------------------------------------

--
-- Structure de la table `habitat`
--

CREATE TABLE `habitat` (
  `id` int(11) NOT NULL,
  `name_habitat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `habitat_animal`
--

CREATE TABLE `habitat_animal` (
  `habitat_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `id_animal_picture_id` int(11) NOT NULL,
  `url_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pin`
--

CREATE TABLE `pin` (
  `id` int(11) NOT NULL,
  `id_region_pin_id` int(11) NOT NULL,
  `id_animal_pin_id` int(11) NOT NULL,
  `longitude_pin` double NOT NULL,
  `latitude_pin` double NOT NULL,
  `style_pin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `name_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_1_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_2_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_3_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_4_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `difficulty_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `id_country_region_id` int(11) NOT NULL,
  `name_region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude_region` double DEFAULT NULL,
  `longitude_region` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trophy`
--

CREATE TABLE `trophy` (
  `id` int(11) NOT NULL,
  `name_trophy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_trophy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_trophy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_avatar_user_id` int(11) NOT NULL,
  `id_badge_user_id` int(11) NOT NULL,
  `login_user` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_trophy`
--

CREATE TABLE `user_trophy` (
  `user_id` int(11) NOT NULL,
  `trophy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `badge`
--
ALTER TABLE `badge`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `continent`
--
ALTER TABLE `continent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5373C9662372C463` (`id_continent_country_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `habitat`
--
ALTER TABLE `habitat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `habitat_animal`
--
ALTER TABLE `habitat_animal`
  ADD PRIMARY KEY (`habitat_id`,`animal_id`),
  ADD KEY `IDX_C0FE85A4AFFE2D26` (`habitat_id`),
  ADD KEY `IDX_C0FE85A48E962C16` (`animal_id`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_16DB4F89C2870D4C` (`id_animal_picture_id`);

--
-- Index pour la table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B5852DF3C1C7087C` (`id_region_pin_id`),
  ADD KEY `IDX_B5852DF368E231F5` (`id_animal_pin_id`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F62F176DCF26C22` (`id_country_region_id`);

--
-- Index pour la table `trophy`
--
ALTER TABLE `trophy`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D6494BE15D0C` (`login_user`),
  ADD KEY `IDX_8D93D6494C66614D` (`id_avatar_user_id`),
  ADD KEY `IDX_8D93D6491FC20B4C` (`id_badge_user_id`);

--
-- Index pour la table `user_trophy`
--
ALTER TABLE `user_trophy`
  ADD PRIMARY KEY (`user_id`,`trophy_id`),
  ADD KEY `IDX_7478E1D4A76ED395` (`user_id`),
  ADD KEY `IDX_7478E1D4F59AEEEF` (`trophy_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `badge`
--
ALTER TABLE `badge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `continent`
--
ALTER TABLE `continent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT pour la table `habitat`
--
ALTER TABLE `habitat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pin`
--
ALTER TABLE `pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trophy`
--
ALTER TABLE `trophy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `country`
--
ALTER TABLE `country`
  ADD CONSTRAINT `FK_5373C9662372C463` FOREIGN KEY (`id_continent_country_id`) REFERENCES `continent` (`id`);

--
-- Contraintes pour la table `habitat_animal`
--
ALTER TABLE `habitat_animal`
  ADD CONSTRAINT `FK_C0FE85A48E962C16` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C0FE85A4AFFE2D26` FOREIGN KEY (`habitat_id`) REFERENCES `habitat` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `FK_16DB4F89C2870D4C` FOREIGN KEY (`id_animal_picture_id`) REFERENCES `animal` (`id`);

--
-- Contraintes pour la table `pin`
--
ALTER TABLE `pin`
  ADD CONSTRAINT `FK_B5852DF368E231F5` FOREIGN KEY (`id_animal_pin_id`) REFERENCES `animal` (`id`),
  ADD CONSTRAINT `FK_B5852DF3C1C7087C` FOREIGN KEY (`id_region_pin_id`) REFERENCES `region` (`id`);

--
-- Contraintes pour la table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `FK_F62F176DCF26C22` FOREIGN KEY (`id_country_region_id`) REFERENCES `country` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6491FC20B4C` FOREIGN KEY (`id_badge_user_id`) REFERENCES `badge` (`id`),
  ADD CONSTRAINT `FK_8D93D6494C66614D` FOREIGN KEY (`id_avatar_user_id`) REFERENCES `avatar` (`id`);

--
-- Contraintes pour la table `user_trophy`
--
ALTER TABLE `user_trophy`
  ADD CONSTRAINT `FK_7478E1D4A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7478E1D4F59AEEEF` FOREIGN KEY (`trophy_id`) REFERENCES `trophy` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
