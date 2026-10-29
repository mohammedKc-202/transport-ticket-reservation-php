-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 29 oct. 2026 à 10:15
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Database`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `mot_de_passe`) VALUES
(1, 'admin.voyages2026@gmail.com', 'password1234');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_naissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `email`, `telephone`, `mot_de_passe`, `date_naissance`) VALUES
(1000, 'Youssef', 'youssef.bennani@gmail.com', '0000000000', '12345678', '2000-07-15'),
(1033, 'Karim', 'karim.alaoui@gmail.com', '0000000000', '12345678', '1999-04-22'),
(1034, 'Salma', 'salma.idrissi@gmail.com', '0000000000', '12345678', '2002-09-05');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_res` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_voyage` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `destination` varchar(255) NOT NULL,
  `lieu_depart` varchar(255) NOT NULL,
  `passagers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_res`, `id_client`, `id_voyage`, `date`, `destination`, `lieu_depart`, `passagers`) VALUES
(1, 1000, 7, '2026-10-02', 'Fes', 'Casablanca', 3),
(2, 1000, 12, '2026-11-13', 'Fès', 'Casablanca', 4),
(6, 1000, 10, '2026-10-02', 'Fès', 'Casablanca', 1),
(7, 1000, NULL, '2026-10-02', 'Rabat', 'Casablanca', 1),
(9, 1000, 12, '2026-10-02', 'Fès', 'Casablanca', 1),
(10, 1000, 11, '2026-10-02', 'Fès', 'Casablanca', 1),
(11, 1000, 15, '2026-10-02', 'Marrakech', 'Casablanca', 1),
(12, 1000, 16, '2026-10-02', 'Agadir', 'Casablanca', 1),
(13, 1000, 17, '2026-10-02', 'Agadir', 'Casablanca', 1),
(17, 1000, 19, '2026-10-31', 'Rabat', 'Casablanca', 2),
(18, 1000, 20, '2026-10-31', 'Casablanca', 'Rabat', 3),
(19, 1000, NULL, '2026-10-02', 'Rabat', 'Casablanca', 4),
(20, 1000, NULL, '2026-11-11', 'Marrakech', 'Casablanca', 2),
(21, 1000, NULL, '2026-11-15', 'Settat', 'Marrakech', 1),
(22, 1034, 334, '2026-11-14', 'Settat', 'Casablanca', 1),
(23, 1034, 179, '2026-11-15', 'Tétouan', 'Marrakech', 1);

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

CREATE TABLE `voyage` (
  `id_voyage` int(11) NOT NULL,
  `lieu_depart` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `duree` varchar(255) DEFAULT NULL,
  `siege_disp` int(11) NOT NULL,
  `prix` float NOT NULL,
  `heure_depart` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voyage`
--

INSERT INTO `voyage` (`id_voyage`, `lieu_depart`, `destination`, `date`, `duree`, `siege_disp`, `prix`, `heure_depart`) VALUES
(7, 'Casablanca', 'Rabat', '2026-11-13', '1h', 27, 40, '08:00:00'),
(8, 'Casablanca', 'Rabat', '2026-11-14', '1h', 27, 40, '15:30:00'),
(10, 'Casablanca', 'Fès', '2026-11-14', '4h 30min', 24, 120, '08:00:00'),
(11, 'Casablanca', 'Fès', '2026-11-13', '4h 30min', 24, 120, '15:30:00'),
(12, 'Casablanca', 'Fès', '2026-11-14', '4h 30min', 30, 120, '21:45:00'),
(13, 'Casablanca', 'Marrakech', '2026-11-15', '3h 15min', 26, 100, '08:00:00'),
(14, 'Casablanca', 'Marrakech', '2026-11-14', '3h 15min', 30, 100, '15:30:00'),
(15, 'Casablanca', 'Marrakech', '2026-11-14', '3h 15min', 32, 100, '21:45:00'),
(16, 'Casablanca', 'Agadir', '2026-11-13', '5h', 29, 150, '08:00:00'),
(17, 'Casablanca', 'Agadir', '2026-11-15', '5h', 29, 150, '15:30:00'),
(18, 'Casablanca', 'Agadir', '2026-11-14', '5h', 35, 150, '21:45:00'),
(19, 'Casablanca', 'Rabat', '2026-10-31', '3h', 41, 135, '17:05:00'),
(20, 'Rabat', 'Casablanca', '2026-10-31', '1h45min', 30, 95, '14:00:00'),
(21, 'El Jadida', 'Marrakech', '2026-10-31', '4h', 45, 96, '08:45:00'),
(22, 'Marrakech', 'El Jadida', '2026-10-31', '4h', 45, 99, '08:45:00'),
(25, 'Oujda', 'khouribga', '2026-11-15', '3h', 32, 229, '16:00:00'),
(26, 'Casablanca', 'Agadir', '2026-11-14', '4h', 40, 130, '08:00:00'),
(32, 'Casablanca', 'Marrakech', '2026-11-01', '4h', 44, 120, '15:27:00'),
(36, 'Casablanca', 'Rabat', '2026-11-03', '2h10min', 43, 66, '16:00:00'),
(39, 'Casablanca', 'Fès', '2026-11-05', '4h', 24, 180, '16:00:00'),
(43, 'Meknès', 'Khouribga', '2026-11-13', '3h 23min', 48, 99, '12:00:00'),
(44, 'Meknès', 'Larache', '2026-11-15', '5h 45min', 42, 176, '14:00:00'),
(45, 'Taza', 'Nador', '2026-11-15', '4h 55min', 59, 89, '16:00:00'),
(46, 'Rabat', 'Mohammedia', '2026-11-15', '3h 48min', 55, 128, '14:00:00'),
(47, 'Khemisset', 'Taza', '2026-11-15', '1h 12min', 32, 184, '14:00:00'),
(48, 'Larache', 'Laayoune', '2026-11-13', '1h 2min', 55, 173, '10:00:00'),
(49, 'Berkane', 'Mohammedia', '2026-11-14', '1h 40min', 37, 173, '18:00:00'),
(50, 'Taza', 'El Jadida', '2026-11-14', '3h 54min', 54, 113, '16:00:00'),
(51, 'Tanger', 'Meknès', '2026-11-15', '5h 10min', 42, 197, '18:00:00'),
(52, 'Khouribga', 'Safi', '2026-11-15', '4h 4min', 48, 164, '12:00:00'),
(53, 'Marrakech', 'Meknès', '2026-11-15', '1h 19min', 36, 166, '18:00:00'),
(54, 'Casablanca', 'Nador', '2026-11-14', '1h 19min', 40, 191, '14:00:00'),
(55, 'Safi', 'Beni Mellal', '2026-11-14', '1h 45min', 51, 95, '08:00:00'),
(56, 'El Jadida', 'Larache', '2026-11-13', '3h 52min', 31, 190, '14:00:00'),
(57, 'Kenitra', 'Khouribga', '2026-11-13', '1h 8min', 43, 192, '14:00:00'),
(58, 'Nador', 'Khemisset', '2026-11-13', '2h 38min', 40, 139, '18:00:00'),
(59, 'Settat', 'Meknès', '2026-11-14', '1h 46min', 40, 124, '14:00:00'),
(60, 'Laayoune', 'Essaouira', '2026-11-15', '4h 18min', 51, 79, '16:00:00'),
(61, 'Meknès', 'Kenitra', '2026-11-13', '5h 19min', 37, 90, '18:00:00'),
(62, 'Beni Mellal', 'Khemisset', '2026-11-15', '4h 49min', 34, 142, '14:00:00'),
(63, 'El Jadida', 'Mohammedia', '2026-11-13', '4h 32min', 43, 112, '14:00:00'),
(64, 'Nador', 'Taza', '2026-11-13', '2h 48min', 41, 184, '18:00:00'),
(65, 'Marrakech', 'Settat', '2026-11-14', '4h 43min', 55, 130, '18:00:00'),
(66, 'Khemisset', 'Tétouan', '2026-11-15', '3h 17min', 44, 150, '18:00:00'),
(67, 'Taza', 'Khouribga', '2026-11-13', '1h 23min', 57, 195, '16:00:00'),
(68, 'Safi', 'Meknès', '2026-11-15', '2h 22min', 36, 127, '12:00:00'),
(69, 'Essaouira', 'Agadir', '2026-11-13', '2h 31min', 52, 129, '14:00:00'),
(70, 'Meknès', 'Fès', '2026-11-14', '2h 48min', 54, 115, '18:00:00'),
(71, 'Nador', 'Marrakech', '2026-11-14', '4h 32min', 40, 150, '10:00:00'),
(72, 'Fès', 'Larache', '2026-11-14', '4h 13min', 60, 73, '12:00:00'),
(73, 'Safi', 'El Jadida', '2026-11-15', '2h 0min', 36, 106, '12:00:00'),
(74, 'Laayoune', 'Berkane', '2026-11-15', '2h 5min', 43, 85, '18:00:00'),
(75, 'Larache', 'Casablanca', '2026-11-13', '2h 11min', 56, 125, '16:00:00'),
(76, 'Mohammedia', 'Meknès', '2026-11-13', '2h 54min', 47, 188, '12:00:00'),
(77, 'Khemisset', 'Nador', '2026-11-13', '2h 30min', 50, 191, '18:00:00'),
(78, 'Casablanca', 'Rabat', '2026-11-15', '5h 1min', 56, 90, '14:00:00'),
(79, 'Essaouira', 'Rabat', '2026-11-15', '1h 22min', 42, 99, '08:00:00'),
(80, 'Marrakech', 'Safi', '2026-11-13', '3h 51min', 54, 167, '08:00:00'),
(81, 'Tétouan', 'Nador', '2026-11-14', '2h 17min', 51, 139, '12:00:00'),
(82, 'Tanger', 'Khouribga', '2026-11-13', '1h 39min', 40, 121, '16:00:00'),
(83, 'Berkane', 'Laayoune', '2026-11-15', '1h 26min', 53, 157, '08:00:00'),
(84, 'Beni Mellal', 'El Jadida', '2026-11-13', '3h 54min', 39, 78, '14:00:00'),
(85, 'Casablanca', 'Oujda', '2026-11-15', '4h 7min', 47, 88, '08:00:00'),
(86, 'Tanger', 'Nador', '2026-11-15', '4h 50min', 41, 149, '10:00:00'),
(87, 'Laayoune', 'Berkane', '2026-11-14', '2h 4min', 55, 84, '14:00:00'),
(88, 'Berkane', 'Meknès', '2026-11-13', '2h 15min', 55, 112, '08:00:00'),
(89, 'Safi', 'Khouribga', '2026-11-15', '4h 47min', 47, 188, '12:00:00'),
(90, 'Khemisset', 'Safi', '2026-11-13', '3h 36min', 38, 144, '10:00:00'),
(91, 'Khouribga', 'Meknès', '2026-11-13', '3h 40min', 38, 178, '14:00:00'),
(92, 'Tanger', 'Khouribga', '2026-11-15', '5h 49min', 40, 102, '12:00:00'),
(93, 'Settat', 'Mohammedia', '2026-11-15', '2h 51min', 57, 198, '18:00:00'),
(94, 'Beni Mellal', 'Meknès', '2026-11-13', '3h 28min', 40, 124, '12:00:00'),
(95, 'El Jadida', 'Fès', '2026-11-15', '2h 26min', 41, 179, '10:00:00'),
(96, 'Meknès', 'Laayoune', '2026-11-14', '5h 41min', 38, 78, '12:00:00'),
(97, 'Casablanca', 'Taza', '2026-11-13', '4h 25min', 40, 142, '10:00:00'),
(98, 'Meknès', 'Essaouira', '2026-11-14', '5h 7min', 58, 96, '14:00:00'),
(99, 'Laayoune', 'Agadir', '2026-11-13', '1h 44min', 43, 118, '12:00:00'),
(100, 'Marrakech', 'Fès', '2026-11-14', '1h 57min', 42, 178, '12:00:00'),
(101, 'Tétouan', 'Oujda', '2026-11-14', '2h 43min', 54, 146, '10:00:00'),
(102, 'Oujda', 'Kenitra', '2026-11-15', '5h 50min', 31, 163, '08:00:00'),
(103, 'Khemisset', 'Larache', '2026-11-14', '5h 29min', 57, 79, '18:00:00'),
(104, 'Larache', 'Nador', '2026-11-15', '5h 20min', 49, 157, '08:00:00'),
(105, 'Mohammedia', 'Khemisset', '2026-11-14', '1h 16min', 45, 90, '18:00:00'),
(106, 'Nador', 'Kenitra', '2026-11-13', '1h 54min', 30, 198, '14:00:00'),
(107, 'Essaouira', 'Agadir', '2026-11-13', '4h 8min', 42, 193, '10:00:00'),
(108, 'El Jadida', 'Kenitra', '2026-11-15', '3h 48min', 34, 189, '10:00:00'),
(109, 'Beni Mellal', 'Khouribga', '2026-11-14', '3h 35min', 37, 176, '16:00:00'),
(110, 'Safi', 'Berkane', '2026-11-15', '2h 7min', 32, 103, '14:00:00'),
(111, 'Meknès', 'Casablanca', '2026-11-15', '2h 56min', 60, 149, '14:00:00'),
(112, 'Mohammedia', 'Berkane', '2026-11-15', '3h 35min', 34, 77, '16:00:00'),
(113, 'Fès', 'Beni Mellal', '2026-11-15', '4h 14min', 52, 170, '10:00:00'),
(114, 'Agadir', 'Taza', '2026-11-15', '1h 3min', 41, 93, '08:00:00'),
(115, 'El Jadida', 'Larache', '2026-11-14', '4h 55min', 47, 187, '10:00:00'),
(116, 'Oujda', 'Essaouira', '2026-11-15', '2h 28min', 60, 143, '18:00:00'),
(117, 'Casablanca', 'Berkane', '2026-11-15', '2h 44min', 42, 160, '10:00:00'),
(118, 'Nador', 'Tanger', '2026-11-15', '4h 6min', 40, 185, '10:00:00'),
(119, 'Agadir', 'Meknès', '2026-11-13', '5h 56min', 51, 168, '12:00:00'),
(120, 'Tétouan', 'Rabat', '2026-11-13', '4h 54min', 60, 169, '14:00:00'),
(121, 'Tétouan', 'Khouribga', '2026-11-15', '3h 14min', 57, 170, '12:00:00'),
(122, 'Laayoune', 'Meknès', '2026-11-15', '4h 17min', 40, 178, '18:00:00'),
(123, 'Meknès', 'Kenitra', '2026-11-14', '5h 54min', 48, 189, '14:00:00'),
(124, 'Essaouira', 'Taza', '2026-11-15', '3h 4min', 59, 77, '14:00:00'),
(125, 'Safi', 'Taza', '2026-11-14', '1h 15min', 60, 72, '12:00:00'),
(126, 'Beni Mellal', 'Taza', '2026-11-13', '4h 35min', 40, 142, '16:00:00'),
(127, 'Khouribga', 'Larache', '2026-11-14', '5h 41min', 54, 86, '10:00:00'),
(128, 'Safi', 'Oujda', '2026-11-13', '2h 8min', 50, 133, '10:00:00'),
(129, 'Berkane', 'Kenitra', '2026-11-15', '5h 22min', 51, 79, '08:00:00'),
(130, 'Essaouira', 'Khemisset', '2026-11-13', '4h 47min', 38, 173, '08:00:00'),
(131, 'El Jadida', 'Tanger', '2026-11-14', '1h 14min', 31, 177, '14:00:00'),
(132, 'Meknès', 'Mohammedia', '2026-11-15', '3h 14min', 47, 186, '16:00:00'),
(133, 'Safi', 'Oujda', '2026-11-13', '3h 23min', 47, 157, '16:00:00'),
(134, 'Khouribga', 'Oujda', '2026-11-15', '1h 29min', 30, 112, '12:00:00'),
(135, 'Larache', 'Beni Mellal', '2026-11-15', '3h 25min', 57, 158, '08:00:00'),
(136, 'Fès', 'El Jadida', '2026-11-13', '2h 37min', 53, 113, '14:00:00'),
(137, 'Safi', 'Khemisset', '2026-11-13', '4h 0min', 45, 186, '16:00:00'),
(138, 'Taza', 'Berkane', '2026-11-15', '3h 4min', 57, 74, '18:00:00'),
(139, 'El Jadida', 'Laayoune', '2026-11-13', '3h 37min', 50, 148, '12:00:00'),
(140, 'Berkane', 'Marrakech', '2026-11-13', '4h 18min', 45, 71, '10:00:00'),
(141, 'Laayoune', 'El Jadida', '2026-11-15', '4h 45min', 48, 108, '12:00:00'),
(142, 'Settat', 'Larache', '2026-11-14', '4h 8min', 36, 113, '08:00:00'),
(143, 'Tanger', 'Fès', '2026-11-15', '5h 45min', 51, 195, '16:00:00'),
(144, 'Berkane', 'Meknès', '2026-11-14', '2h 45min', 59, 194, '12:00:00'),
(145, 'Tanger', 'Beni Mellal', '2026-11-13', '1h 45min', 45, 143, '10:00:00'),
(146, 'Kenitra', 'Beni Mellal', '2026-11-14', '5h 45min', 30, 139, '08:00:00'),
(147, 'Oujda', 'El Jadida', '2026-11-14', '5h 45min', 34, 190, '16:00:00'),
(148, 'Agadir', 'Rabat', '2026-11-14', '2h 45min', 39, 136, '16:00:00'),
(149, 'Fès', 'Marrakech', '2026-11-14', '1h 45min', 46, 72, '08:00:00'),
(150, 'Kenitra', 'Safi', '2026-11-15', '1h 45min', 40, 83, '18:00:00'),
(151, 'Rabat', 'Essaouira', '2026-11-13', '5h 45min', 54, 111, '16:00:00'),
(152, 'Mohammedia', 'Safi', '2026-11-14', '4h 45min', 41, 139, '16:00:00'),
(153, 'Tanger', 'Marrakech', '2026-11-15', '1h 45min', 33, 163, '14:00:00'),
(154, 'Tétouan', 'Laayoune', '2026-11-14', '5h 45min', 59, 128, '16:00:00'),
(155, 'Laayoune', 'Tétouan', '2026-11-14', '3h 45min', 50, 165, '08:00:00'),
(156, 'Marrakech', 'El Jadida', '2026-11-14', '1h 45min', 36, 73, '08:00:00'),
(157, 'Safi', 'Meknès', '2026-11-13', '3h 45min', 43, 158, '14:00:00'),
(158, 'Meknès', 'Essaouira', '2026-11-14', '2h 45min', 55, 166, '12:00:00'),
(159, 'Nador', 'Berkane', '2026-11-14', '4h 45min', 59, 151, '12:00:00'),
(160, 'Marrakech', 'Berkane', '2026-11-13', '1h 45min', 48, 82, '12:00:00'),
(161, 'Agadir', 'Taza', '2026-11-13', '1h 45min', 60, 141, '16:00:00'),
(162, 'Berkane', 'Mohammedia', '2026-11-14', '3h 45min', 34, 173, '08:00:00'),
(163, 'Mohammedia', 'El Jadida', '2026-11-15', '1h 45min', 37, 81, '16:00:00'),
(164, 'Beni Mellal', 'Agadir', '2026-11-13', '2h 45min', 52, 194, '16:00:00'),
(165, 'Khouribga', 'Casablanca', '2026-11-13', '3h 45min', 35, 151, '14:00:00'),
(166, 'Oujda', 'Mohammedia', '2026-11-13', '4h 45min', 40, 141, '08:00:00'),
(167, 'Oujda', 'Fès', '2026-11-13', '1h 45min', 51, 113, '14:00:00'),
(168, 'El Jadida', 'Rabat', '2026-11-14', '4h 45min', 31, 108, '08:00:00'),
(169, 'Khemisset', 'Safi', '2026-11-14', '5h 45min', 36, 185, '16:00:00'),
(170, 'Tanger', 'Marrakech', '2026-11-15', '4h 45min', 53, 192, '10:00:00'),
(171, 'Casablanca', 'Rabat', '2026-11-13', '5h 45min', 34, 154, '10:00:00'),
(172, 'Khouribga', 'El Jadida', '2026-11-15', '2h 45min', 36, 72, '16:00:00'),
(173, 'Casablanca', 'Tétouan', '2026-11-15', '3h 45min', 49, 97, '10:00:00'),
(174, 'Larache', 'El Jadida', '2026-11-15', '1h 45min', 57, 118, '12:00:00'),
(175, 'Khouribga', 'Larache', '2026-11-14', '1h 45min', 42, 117, '12:00:00'),
(176, 'Settat', 'Agadir', '2026-11-14', '1h 45min', 40, 134, '16:00:00'),
(177, 'Laayoune', 'Agadir', '2026-11-14', '4h 45min', 39, 137, '12:00:00'),
(178, 'Marrakech', 'Kenitra', '2026-11-13', '3h 45min', 30, 200, '14:00:00'),
(179, 'Marrakech', 'Tétouan', '2026-11-15', '3h 45min', 38, 168, '10:00:00'),
(180, 'Marrakech', 'Berkane', '2026-11-14', '3h 45min', 47, 177, '14:00:00'),
(181, 'Essaouira', 'Mohammedia', '2026-11-13', '5h 45min', 57, 132, '18:00:00'),
(182, 'Agadir', 'Oujda', '2026-11-15', '5h 45min', 57, 95, '14:00:00'),
(183, 'Mohammedia', 'Casablanca', '2026-11-14', '2h 45min', 47, 89, '18:00:00'),
(184, 'El Jadida', 'Beni Mellal', '2026-11-14', '4h 45min', 41, 73, '18:00:00'),
(185, 'Essaouira', 'Oujda', '2026-11-13', '4h 45min', 30, 180, '08:00:00'),
(186, 'Safi', 'Essaouira', '2026-11-14', '3h 45min', 45, 162, '18:00:00'),
(187, 'Taza', 'Tanger', '2026-11-15', '5h 45min', 55, 79, '08:00:00'),
(188, 'Meknès', 'Nador', '2026-11-14', '4h 45min', 55, 124, '18:00:00'),
(189, 'Essaouira', 'Marrakech', '2026-11-15', '4h 45min', 58, 86, '08:00:00'),
(190, 'Essaouira', 'Safi', '2026-11-15', '3h 45min', 51, 109, '16:00:00'),
(191, 'Khouribga', 'Safi', '2026-11-13', '5h 45min', 51, 95, '18:00:00'),
(192, 'Khemisset', 'Fès', '2026-11-14', '3h 45min', 33, 93, '18:00:00'),
(193, 'Kenitra', 'Tanger', '2026-11-15', '1h 45min', 38, 157, '16:00:00'),
(194, 'Khouribga', 'El Jadida', '2026-11-14', '2h 45min', 38, 128, '08:00:00'),
(195, 'Taza', 'Berkane', '2026-11-14', '5h 45min', 35, 102, '10:00:00'),
(196, 'Larache', 'Fès', '2026-11-13', '4h 45min', 30, 173, '16:00:00'),
(197, 'Oujda', 'Tanger', '2026-11-13', '1h 45min', 42, 80, '16:00:00'),
(198, 'Mohammedia', 'Oujda', '2026-11-15', '4h 45min', 48, 91, '10:00:00'),
(199, 'Tanger', 'Larache', '2026-11-15', '2h 45min', 33, 109, '16:00:00'),
(200, 'Kenitra', 'Marrakech', '2026-11-13', '1h 45min', 36, 96, '08:00:00'),
(201, 'Kenitra', 'Essaouira', '2026-11-15', '5h 45min', 53, 92, '12:00:00'),
(203, 'Laayoune', 'Kenitra', '2026-11-14', '3h 45min', 46, 188, '10:00:00'),
(204, 'Meknès', 'Casablanca', '2026-11-13', '5h 45min', 59, 120, '16:00:00'),
(205, 'Essaouira', 'Khouribga', '2026-11-14', '2h 45min', 39, 145, '14:00:00'),
(206, 'Taza', 'Berkane', '2026-11-13', '5h 45min', 54, 179, '10:00:00'),
(207, 'Taza', 'Laayoune', '2026-11-13', '5h 45min', 44, 80, '14:00:00'),
(208, 'Taza', 'Fès', '2026-11-15', '4h 45min', 42, 196, '16:00:00'),
(209, 'Safi', 'Fès', '2026-11-13', '4h 45min', 41, 113, '12:00:00'),
(210, 'Berkane', 'Essaouira', '2026-11-13', '3h 45min', 39, 152, '18:00:00'),
(211, 'Agadir', 'Berkane', '2026-11-14', '4h 45min', 52, 161, '18:00:00'),
(212, 'Berkane', 'Nador', '2026-11-13', '3h 45min', 30, 95, '10:00:00'),
(213, 'Berkane', 'Meknès', '2026-11-15', '5h 45min', 54, 80, '10:00:00'),
(214, 'Fès', 'Agadir', '2026-11-14', '2h 45min', 46, 107, '18:00:00'),
(215, 'Casablanca', 'El Jadida', '2026-11-13', '4h 45min', 35, 94, '18:00:00'),
(216, 'Tanger', 'Tétouan', '2026-11-15', '5h 45min', 41, 153, '12:00:00'),
(217, 'Agadir', 'Tétouan', '2026-11-15', '3h 45min', 57, 84, '12:00:00'),
(218, 'Laayoune', 'Casablanca', '2026-11-13', '4h 45min', 30, 199, '14:00:00'),
(219, 'Safi', 'Casablanca', '2026-11-13', '1h 45min', 43, 165, '08:00:00'),
(220, 'Mohammedia', 'Khouribga', '2026-11-13', '1h 45min', 58, 105, '08:00:00'),
(221, 'Fès', 'Kenitra', '2026-11-13', '2h 45min', 56, 200, '16:00:00'),
(222, 'Oujda', 'Taza', '2026-11-13', '5h 45min', 43, 123, '14:00:00'),
(223, 'Essaouira', 'Agadir', '2026-11-14', '3h 45min', 30, 123, '12:00:00'),
(224, 'Laayoune', 'Agadir', '2026-11-14', '1h 45min', 38, 159, '16:00:00'),
(225, 'Mohammedia', 'Beni Mellal', '2026-11-14', '2h 45min', 40, 154, '10:00:00'),
(226, 'Oujda', 'Tanger', '2026-11-14', '3h 45min', 39, 77, '18:00:00'),
(227, 'Meknès', 'Larache', '2026-11-15', '4h 45min', 52, 81, '12:00:00'),
(228, 'Oujda', 'Nador', '2026-11-15', '1h 45min', 48, 105, '08:00:00'),
(229, 'Settat', 'Taza', '2026-11-14', '4h 45min', 42, 196, '14:00:00'),
(230, 'Meknès', 'Larache', '2026-11-15', '2h 45min', 52, 170, '14:00:00'),
(231, 'Berkane', 'Larache', '2026-11-14', '4h 45min', 38, 149, '08:00:00'),
(232, 'Fès', 'Meknès', '2026-11-13', '5h 45min', 34, 117, '08:00:00'),
(233, 'Beni Mellal', 'Mohammedia', '2026-11-13', '3h 45min', 50, 115, '16:00:00'),
(234, 'Mohammedia', 'Marrakech', '2026-11-15', '1h 45min', 41, 77, '12:00:00'),
(235, 'Settat', 'Kenitra', '2026-11-14', '5h 45min', 60, 139, '10:00:00'),
(236, 'Kenitra', 'Marrakech', '2026-11-13', '1h 45min', 60, 109, '08:00:00'),
(237, 'Rabat', 'Essaouira', '2026-11-14', '1h 45min', 30, 83, '08:00:00'),
(238, 'Essaouira', 'Berkane', '2026-11-15', '2h 45min', 49, 137, '08:00:00'),
(239, 'Nador', 'Laayoune', '2026-11-15', '5h 45min', 55, 153, '08:00:00'),
(240, 'Tétouan', 'Fès', '2026-11-13', '1h 45min', 52, 128, '12:00:00'),
(241, 'Beni Mellal', 'Marrakech', '2026-11-15', '4h 45min', 35, 199, '14:00:00'),
(242, 'Khemisset', 'Khouribga', '2026-11-13', '1h 45min', 55, 138, '08:00:00'),
(243, 'Khouribga', 'Oujda', '2026-11-13', '1h 15min', 45, 178, '08:00:00'),
(244, 'Kenitra', 'Marrakech', '2026-11-15', '5h 30min', 38, 192, '10:00:00'),
(245, 'Khemisset', 'Settat', '2026-11-14', '5h 0min', 42, 139, '08:00:00'),
(246, 'Tétouan', 'Taza', '2026-11-13', '4h 30min', 33, 193, '08:00:00'),
(247, 'Safi', 'Casablanca', '2026-11-14', '1h 15min', 56, 118, '08:00:00'),
(248, 'Marrakech', 'Tanger', '2026-11-13', '3h 45min', 42, 165, '10:00:00'),
(249, 'Nador', 'Safi', '2026-11-15', '1h 15min', 58, 141, '16:00:00'),
(250, 'Khemisset', 'Rabat', '2026-11-14', '1h 15min', 44, 142, '12:00:00'),
(251, 'Larache', 'Khemisset', '2026-11-15', '3h 45min', 59, 95, '10:00:00'),
(252, 'Tétouan', 'Kenitra', '2026-11-14', '4h 45min', 44, 109, '10:00:00'),
(253, 'Oujda', 'Khemisset', '2026-11-13', '1h 0min', 36, 134, '14:00:00'),
(254, 'Khouribga', 'Essaouira', '2026-11-13', '5h 45min', 50, 155, '16:00:00'),
(255, 'Casablanca', 'Khemisset', '2026-11-14', '1h 15min', 41, 193, '16:00:00'),
(256, 'Marrakech', 'Essaouira', '2026-11-14', '1h 30min', 48, 186, '14:00:00'),
(257, 'Rabat', 'Fès', '2026-11-15', '2h 0min', 32, 228, '10:00:00'),
(258, 'Taza', 'Oujda', '2026-11-13', '4h 0min', 37, 185, '16:00:00'),
(259, 'Mohammedia', 'Nador', '2026-11-13', '2h 45min', 38, 181, '18:00:00'),
(260, 'Khemisset', 'Berkane', '2026-11-14', '1h 0min', 33, 147, '12:00:00'),
(261, 'Oujda', 'Meknès', '2026-11-15', '3h 0min', 46, 429, '12:00:00'),
(262, 'Essaouira', 'Oujda', '2026-11-13', '1h 0min', 30, 110, '12:00:00'),
(263, 'Casablanca', 'Rabat', '2026-11-14', '4h', 45, 69, '17:00:00'),
(264, 'Casablanca', 'Tanger', '2026-11-15', '3h 0min', 42, 383, '10:00:00'),
(265, 'Casablanca', 'Meknès', '2026-11-14', '2h 0min', 57, 257, '14:00:00'),
(266, 'Casablanca', 'Meknès', '2026-11-15', '2h 15min', 34, 242, '12:00:00'),
(267, 'Casablanca', 'Fès', '2026-11-13', '2h 45min', 54, 336, '14:00:00'),
(268, 'Casablanca', 'Agadir', '2026-11-15', '4h 15min', 54, 492, '08:00:00'),
(269, 'Casablanca', 'Agadir', '2026-11-14', '4h 45min', 54, 477, '14:00:00'),
(270, 'Casablanca', 'Tanger', '2026-11-13', '3h 45min', 51, 364, '14:00:00'),
(271, 'Casablanca', 'Marrakech', '2026-11-15', '2h 30min', 60, 281, '16:00:00'),
(272, 'Casablanca', 'Meknès', '2026-11-15', '2h 0min', 49, 250, '10:00:00'),
(273, 'Casablanca', 'Agadir', '2026-11-13', '4h 0min', 46, 472, '08:00:00'),
(274, 'Casablanca', 'Marrakech', '2026-11-13', '2h 0min', 54, 291, '16:00:00'),
(275, 'Casablanca', 'Fès', '2026-11-15', '2h 30min', 56, 314, '10:00:00'),
(276, 'Casablanca', 'Meknès', '2026-11-14', '2h 45min', 46, 246, '12:00:00'),
(277, 'Casablanca', 'Marrakech', '2026-11-13', '2h 30min', 54, 253, '16:00:00'),
(278, 'Casablanca', 'Meknès', '2026-11-15', '2h 0min', 32, 276, '10:00:00'),
(279, 'Casablanca', 'Agadir', '2026-11-13', '4h 0min', 38, 511, '08:00:00'),
(280, 'Casablanca', 'Fès', '2026-11-14', '2h 45min', 53, 333, '14:00:00'),
(281, 'Casablanca', 'Meknès', '2026-11-14', '2h 0min', 58, 246, '18:00:00'),
(282, 'Casablanca', 'Fès', '2026-11-15', '2h 15min', 57, 340, '10:00:00'),
(283, 'Casablanca', 'Agadir', '2026-11-15', '4h 45min', 46, 500, '12:00:00'),
(284, 'Casablanca', 'Rabat', '2026-11-15', '0h 55min', 34, 86, '10:00:00'),
(285, 'Casablanca', 'Fès', '2026-11-15', '2h 45min', 54, 306, '08:00:00'),
(286, 'Casablanca', 'Agadir', '2026-11-15', '4h 0min', 55, 501, '12:00:00'),
(287, 'Casablanca', 'Rabat', '2026-11-15', '0h 45min', 53, 107, '08:00:00'),
(288, 'Casablanca', 'Rabat', '2026-11-15', '1h', 37, 128, '14:00:00'),
(289, 'Casablanca', 'Rabat', '2026-11-13', '0h 30min', 37, 105, '08:00:00'),
(290, 'Kenitra', 'Safi', '2026-11-15', '1h 30min', 54, 105, '18:00:00'),
(291, 'Kenitra', 'Beni Mellal', '2026-11-14', '1h 30min', 50, 170, '10:00:00'),
(292, 'Kenitra', 'Mohammedia', '2026-11-13', '5h 30min', 58, 112, '14:00:00'),
(293, 'Kenitra', 'El Jadida', '2026-11-14', '4h 30min', 40, 187, '18:00:00'),
(294, 'Kenitra', 'Safi', '2026-11-13', '4h 45min', 37, 130, '16:00:00'),
(295, 'Kenitra', 'Safi', '2026-11-15', '2h 45min', 37, 163, '12:00:00'),
(296, 'Kenitra', 'Khouribga', '2026-11-15', '3h 30min', 43, 128, '10:00:00'),
(297, 'Kenitra', 'Khouribga', '2026-11-15', '1h 45min', 44, 157, '18:00:00'),
(298, 'Kenitra', 'Tétouan', '2026-11-13', '4h 45min', 42, 193, '18:00:00'),
(299, 'Kenitra', 'El Jadida', '2026-11-15', '1h 30min', 59, 88, '12:00:00'),
(300, 'Taza', 'Khemisset', '2026-11-14', '2h 45min', 45, 164, '16:00:00'),
(301, 'Taza', 'Khemisset', '2026-11-15', '1h 0min', 34, 103, '08:00:00'),
(302, 'Taza', 'Essaouira', '2026-11-13', '1h 45min', 32, 97, '08:00:00'),
(303, 'Taza', 'Khemisset', '2026-11-13', '3h 15min', 33, 158, '18:00:00'),
(304, 'Taza', 'Khemisset', '2026-11-14', '1h 15min', 36, 146, '12:00:00'),
(305, 'Taza', 'Settat', '2026-11-13', '2h 0min', 53, 83, '10:00:00'),
(306, 'Taza', 'Berkane', '2026-11-14', '5h 15min', 50, 160, '14:00:00'),
(307, 'Taza', 'Berkane', '2026-11-15', '5h 30min', 31, 75, '14:00:00'),
(308, 'Taza', 'Essaouira', '2026-11-13', '3h 15min', 56, 195, '10:00:00'),
(309, 'Taza', 'Nador', '2026-11-13', '5h 45min', 45, 129, '16:00:00'),
(310, 'Taza', 'Essaouira', '2026-11-13', '1h 15min', 55, 87, '18:00:00'),
(311, 'Taza', 'Khemisset', '2026-11-14', '5h 0min', 49, 131, '08:00:00'),
(312, 'Taza', 'Laayoune', '2026-11-13', '4h 0min', 33, 123, '12:00:00'),
(313, 'Taza', 'Larache', '2026-11-14', '3h 45min', 57, 110, '16:00:00'),
(314, 'Taza', 'Settat', '2026-11-14', '5h 45min', 31, 80, '18:00:00'),
(315, 'Taza', 'Larache', '2026-11-15', '5h 30min', 34, 122, '18:00:00'),
(316, 'Taza', 'Khemisset', '2026-11-14', '4h 15min', 44, 123, '10:00:00'),
(317, 'Taza', 'Laayoune', '2026-11-13', '1h 15min', 50, 97, '10:00:00'),
(318, 'Taza', 'Nador', '2026-11-13', '4h 45min', 43, 75, '10:00:00'),
(319, 'Taza', 'Berkane', '2026-11-15', '2h 30min', 48, 104, '18:00:00'),
(320, 'Casablanca', 'Settat', '2026-11-14', '0h 45min', 51, 75, '08:00:00'),
(321, 'Casablanca', 'Settat', '2026-11-13', '0h 30min', 30, 100, '18:00:00'),
(322, 'Casablanca', 'Settat', '2026-11-13', '0h 30min', 34, 114, '14:00:00'),
(323, 'Casablanca', 'Settat', '2026-11-15', '0h 30min', 37, 94, '12:00:00'),
(324, 'Casablanca', 'Settat', '2026-11-15', '0h 45min', 39, 91, '16:00:00'),
(325, 'Casablanca', 'Settat', '2026-11-15', '0h 30min', 36, 72, '08:00:00'),
(326, 'Casablanca', 'Settat', '2026-11-13', '0h 45min', 52, 81, '08:00:00'),
(327, 'Casablanca', 'Settat', '2026-11-13', '0h 30min', 44, 81, '16:00:00'),
(328, 'Casablanca', 'Settat', '2026-11-13', '0h 30min', 47, 117, '14:00:00'),
(329, 'Casablanca', 'Settat', '2026-11-13', '0h 30min', 49, 80, '12:00:00'),
(330, 'Casablanca', 'Settat', '2026-11-15', '0h 30min', 60, 88, '12:00:00'),
(331, 'Casablanca', 'Settat', '2026-11-14', '1h', 44, 86, '08:00:00'),
(332, 'Casablanca', 'Settat', '2026-11-14', '0h 30min', 55, 110, '10:00:00'),
(333, 'Casablanca', 'Settat', '2026-11-13', '0h 30min', 56, 77, '08:00:00'),
(334, 'Casablanca', 'Settat', '2026-11-14', '0h 45min', 38, 77, '16:00:00'),
(335, 'Casablanca', 'Settat', '2026-11-15', '0h 30min', 32, 74, '10:00:00'),
(336, 'Casablanca', 'Settat', '2026-11-14', '0h 30min', 53, 106, '12:00:00'),
(337, 'Casablanca', 'Settat', '2026-11-15', '0h 30min', 48, 98, '08:00:00'),
(338, 'Casablanca', 'Settat', '2026-11-13', '0h 30min', 40, 85, '10:00:00'),
(339, 'Casablanca', 'Settat', '2026-11-14', '0h 45min', 42, 82, '14:00:00'),
(340, 'Casablanca', 'El Jadida', '2026-11-13', '1h 15min', 32, 119, '12:00:00'),
(341, 'Casablanca', 'Marrakech', '2026-11-13', '2h 30min', 41, 281, '16:00:00'),
(342, 'Casablanca', 'Settat', '2026-11-15', '0h 30min', 35, 118, '14:00:00'),
(343, 'Casablanca', 'Essaouira', '2026-11-13', '3h 30min', 60, 384, '08:00:00'),
(344, 'Casablanca', 'Kenitra', '2026-11-13', '1h 0min', 38, 145, '14:00:00'),
(345, 'Casablanca', 'Larache', '2026-11-13', '2h 15min', 44, 301, '18:00:00'),
(346, 'Casablanca', 'Kenitra', '2026-11-14', '1h 0min', 47, 155, '08:00:00'),
(347, 'Casablanca', 'Laayoune', '2026-11-14', '12h 0min', 55, 1250, '12:00:00'),
(348, 'Casablanca', 'Marrakech', '2026-11-14', '2h 0min', 34, 283, '16:00:00'),
(349, 'Casablanca', 'Fès', '2026-11-15', '2h 45min', 55, 315, '16:00:00'),
(350, 'Casablanca', 'Oujda', '2026-11-15', '5h 15min', 32, 544, '18:00:00'),
(351, 'Casablanca', 'Rabat', '2026-11-13', '0h 30min', 56, 135, '10:00:00'),
(352, 'Casablanca', 'Tétouan', '2026-11-14', '3h 15min', 58, 376, '12:00:00'),
(353, 'Casablanca', 'Larache', '2026-11-14', '2h 0min', 59, 333, '16:00:00'),
(354, 'Casablanca', 'Safi', '2026-11-15', '2h 0min', 44, 277, '08:00:00'),
(355, 'Casablanca', 'Fès', '2026-11-14', '2h 15min', 49, 336, '18:00:00'),
(356, 'Casablanca', 'Berkane', '2026-11-14', '5h 45min', 55, 590, '10:00:00'),
(357, 'Casablanca', 'Taza', '2026-11-13', '2h 15min', 46, 320, '16:00:00'),
(358, 'Casablanca', 'Khemisset', '2026-11-14', '1h 30min', 38, 176, '16:00:00'),
(359, 'Casablanca', 'Laayoune', '2026-11-14', '12h 30min', 40, 1226, '08:00:00'),
(360, 'Casablanca', 'Oujda', '2026-11-14', '5h 45min', 43, 577, '10:00:00'),
(361, 'Casablanca', 'Marrakech', '2026-11-15', '2h 0min', 50, 286, '16:00:00'),
(362, 'Casablanca', 'El Jadida', '2026-11-15', '1h 30min', 48, 113, '12:00:00'),
(363, 'Casablanca', 'Fès', '2026-11-14', '2h 0min', 33, 299, '08:00:00'),
(364, 'Casablanca', 'Larache', '2026-11-14', '2h 0min', 44, 318, '16:00:00'),
(365, 'Casablanca', 'Safi', '2026-11-14', '2h 15min', 54, 250, '10:00:00'),
(366, 'Casablanca', 'Rabat', '2026-11-15', '0h 45min', 43, 108, '14:00:00'),
(367, 'Casablanca', 'Taza', '2026-11-14', '2h 0min', 52, 330, '08:00:00'),
(368, 'Casablanca', 'Taza', '2026-11-15', '2h 30min', 49, 312, '12:00:00'),
(369, 'Casablanca', 'Meknès', '2026-11-15', '2h 30min', 45, 231, '12:00:00'),
(370, 'Casablanca', 'Khemisset', '2026-11-15', '1h 30min', 48, 162, '18:00:00'),
(371, 'Casablanca', 'Essaouira', '2026-11-13', '3h 0min', 42, 397, '14:00:00'),
(372, 'Casablanca', 'Mohammedia', '2026-11-15', '0h 45min', 56, 31, '14:00:00'),
(373, 'Casablanca', 'Tétouan', '2026-11-14', '3h 0min', 49, 396, '14:00:00'),
(374, 'Casablanca', 'Berkane', '2026-11-14', '5h 0min', 41, 625, '16:00:00'),
(375, 'Casablanca', 'Berkane', '2026-11-14', '5h 30min', 32, 632, '18:00:00'),
(376, 'Casablanca', 'Nador', '2026-11-14', '4h 15min', 44, 513, '18:00:00'),
(377, 'Casablanca', 'Mohammedia', '2026-11-13', '0h 0min', 40, 27, '08:00:00'),
(378, 'Casablanca', 'Mohammedia', '2026-11-13', '0h 45min', 55, 26, '14:00:00'),
(379, 'Casablanca', 'Settat', '2026-11-15', '0h 45min', 43, 70, '14:00:00'),
(380, 'Casablanca', 'Laayoune', '2026-11-14', '12h 30min', 33, 1263, '16:00:00'),
(381, 'Casablanca', 'Beni Mellal', '2026-11-14', '1h 30min', 56, 229, '08:00:00'),
(382, 'Casablanca', 'Kenitra', '2026-11-13', '1h 45min', 32, 143, '08:00:00'),
(383, 'Casablanca', 'Tanger', '2026-11-15', '3h 0min', 50, 380, '14:00:00'),
(384, 'Casablanca', 'Khemisset', '2026-11-14', '1h 30min', 48, 174, '18:00:00'),
(385, 'Casablanca', 'Rabat', '2026-11-13', '0h 45min', 45, 103, '18:00:00'),
(386, 'Casablanca', 'Oujda', '2026-11-14', '5h 30min', 51, 545, '18:00:00'),
(387, 'Casablanca', 'El Jadida', '2026-11-15', '1h 15min', 38, 136, '08:00:00'),
(388, 'Casablanca', 'Berkane', '2026-11-15', '5h 0min', 50, 600, '16:00:00'),
(389, 'Casablanca', 'Marrakech', '2026-11-15', '2h 15min', 40, 278, '08:00:00'),
(390, 'Casablanca', 'El Jadida', '2026-11-14', '1h 0min', 48, 120, '12:00:00'),
(391, 'Casablanca', 'Khouribga', '2026-11-13', '1h 30min', 33, 141, '14:00:00'),
(392, 'Casablanca', 'Mohammedia', '2026-11-13', '0h 0min', 38, 42, '10:00:00'),
(393, 'Casablanca', 'Oujda', '2026-11-13', '5h 30min', 40, 552, '10:00:00'),
(394, 'Casablanca', 'Marrakech', '2026-11-15', '2h 45min', 37, 274, '16:00:00'),
(395, 'Casablanca', 'Tanger', '2026-11-14', '3h 30min', 47, 349, '14:00:00'),
(396, 'Casablanca', 'Fès', '2026-11-13', '2h 15min', 37, 299, '12:00:00'),
(397, 'Casablanca', 'Berkane', '2026-11-14', '5h 30min', 46, 590, '18:00:00'),
(398, 'Casablanca', 'Settat', '2026-11-15', '0h 45min', 40, 108, '08:00:00'),
(399, 'Casablanca', 'Fès', '2026-11-15', '2h 0min', 42, 297, '16:00:00'),
(400, 'Casablanca', 'Mohammedia', '2026-11-14', '0h 45min', 30, 60, '14:00:00'),
(401, 'Casablanca', 'Oujda', '2026-11-13', '5h 0min', 34, 541, '12:00:00'),
(402, 'Casablanca', 'El Jadida', '2026-11-13', '1h 0min', 31, 141, '18:00:00'),
(403, 'Casablanca', 'Agadir', '2026-11-14', '4h 45min', 59, 498, '08:00:00'),
(404, 'Casablanca', 'Khemisset', '2026-11-13', '1h 0min', 58, 164, '16:00:00'),
(405, 'Casablanca', 'El Jadida', '2026-11-15', '1h 30min', 43, 109, '08:00:00'),
(406, 'Casablanca', 'Mohammedia', '2026-11-13', '0h 0min', 32, 25, '12:00:00'),
(407, 'Casablanca', 'Laayoune', '2026-11-14', '12h 0min', 59, 1246, '12:00:00'),
(408, 'Casablanca', 'Beni Mellal', '2026-11-15', '1h 30min', 55, 198, '08:00:00'),
(409, 'Casablanca', 'Rabat', '2026-11-15', '0h 30min', 41, 133, '14:00:00'),
(410, 'Casablanca', 'Laayoune', '2026-11-15', '12h 15min', 41, 1255, '08:00:00'),
(411, 'Casablanca', 'Berkane', '2026-11-13', '5h 30min', 42, 627, '12:00:00'),
(412, 'Casablanca', 'Fès', '2026-11-15', '2h 0min', 32, 300, '14:00:00'),
(413, 'Casablanca', 'Meknès', '2026-11-14', '2h 30min', 45, 276, '16:00:00'),
(414, 'Casablanca', 'Khemisset', '2026-11-14', '1h 45min', 43, 166, '10:00:00'),
(415, 'Casablanca', 'Rabat', '2026-11-15', '0h 45min', 58, 104, '08:00:00'),
(416, 'Casablanca', 'Beni Mellal', '2026-11-15', '1h 30min', 59, 228, '10:00:00'),
(417, 'Casablanca', 'Marrakech', '2026-11-13', '2h 0min', 30, 278, '08:00:00'),
(418, 'Casablanca', 'Taza', '2026-11-13', '2h 0min', 59, 312, '14:00:00'),
(419, 'Casablanca', 'Meknès', '2026-11-13', '2h 15min', 34, 247, '08:00:00'),
(420, 'Casablanca', 'Nador', '2026-11-14', '4h 30min', 34, 500, '16:00:00'),
(421, 'Casablanca', 'Khemisset', '2026-11-13', '1h 15min', 31, 158, '14:00:00'),
(422, 'Casablanca', 'Rabat', '2026-11-13', '0h 30min', 45, 119, '14:00:00'),
(423, 'Casablanca', 'Tanger', '2026-11-14', '3h 45min', 46, 343, '08:00:00'),
(424, 'Casablanca', 'Meknès', '2026-11-14', '2h 45min', 35, 258, '12:00:00'),
(425, 'Casablanca', 'Tanger', '2026-11-15', '3h 30min', 32, 374, '10:00:00'),
(426, 'Casablanca', 'Berkane', '2026-11-15', '5h 30min', 43, 626, '10:00:00'),
(427, 'Casablanca', 'Oujda', '2026-11-14', '5h 15min', 52, 555, '18:00:00'),
(428, 'Casablanca', 'Essaouira', '2026-11-13', '3h 30min', 49, 370, '16:00:00'),
(429, 'Casablanca', 'Tétouan', '2026-11-15', '3h 45min', 35, 373, '12:00:00'),
(430, 'Casablanca', 'El Jadida', '2026-11-13', '1h 15min', 40, 118, '12:00:00'),
(431, 'Casablanca', 'Essaouira', '2026-11-13', '3h 0min', 31, 408, '12:00:00'),
(432, 'Casablanca', 'Oujda', '2026-11-13', '5h 15min', 45, 541, '10:00:00'),
(433, 'Casablanca', 'El Jadida', '2026-11-15', '1h 0min', 33, 134, '16:00:00'),
(434, 'Casablanca', 'Essaouira', '2026-11-15', '3h 30min', 44, 391, '10:00:00'),
(435, 'Casablanca', 'Meknès', '2026-11-14', '2h 45min', 46, 243, '14:00:00'),
(436, 'Casablanca', 'Mohammedia', '2026-11-15', '0h 45min', 54, 65, '16:00:00'),
(437, 'Casablanca', 'Essaouira', '2026-11-15', '3h 45min', 43, 380, '10:00:00'),
(438, 'Casablanca', 'Safi', '2026-11-15', '2h 15min', 42, 280, '12:00:00'),
(439, 'Casablanca', 'Beni Mellal', '2026-11-13', '1h 15min', 44, 195, '14:00:00'),
(440, 'Oujda', 'Larache', '2026-11-14', '2h 45min', 34, 145, '14:00:00'),
(441, 'Fès', 'Safi', '2026-11-14', '3h 45min', 47, 389, '14:00:00'),
(442, 'Settat', 'Agadir', '2026-11-15', '4h 15min', 50, 446, '16:00:00'),
(443, 'Beni Mellal', 'El Jadida', '2026-11-13', '3h 45min', 33, 109, '14:00:00'),
(444, 'Settat', 'El Jadida', '2026-11-14', '5h 15min', 56, 136, '18:00:00'),
(445, 'Khouribga', 'Taza', '2026-11-13', '4h 45min', 56, 125, '10:00:00'),
(446, 'Fès', 'Agadir', '2026-11-14', '6h 15min', 38, 732, '18:00:00'),
(447, 'Berkane', 'Essaouira', '2026-11-15', '1h 45min', 49, 110, '08:00:00'),
(448, 'Marrakech', 'Safi', '2026-11-14', '1h 30min', 42, 174, '10:00:00'),
(449, 'Khouribga', 'Tanger', '2026-11-15', '3h 45min', 32, 404, '14:00:00'),
(450, 'Casablanca', 'Marrakech', '2026-11-15', '2h 15min', 33, 250, '14:00:00'),
(451, 'Tanger', 'Settat', '2026-11-14', '3h 30min', 47, 438, '10:00:00'),
(452, 'Kenitra', 'Beni Mellal', '2026-11-14', '5h 15min', 31, 149, '12:00:00'),
(453, 'Meknès', 'Marrakech', '2026-11-14', '4h 30min', 42, 475, '12:00:00'),
(454, 'El Jadida', 'Mohammedia', '2026-11-14', '1h 15min', 54, 165, '14:00:00'),
(455, 'El Jadida', 'Fès', '2026-11-14', '3h 45min', 33, 393, '18:00:00'),
(456, 'Beni Mellal', 'Laayoune', '2026-11-13', '5h 30min', 33, 117, '10:00:00'),
(457, 'Safi', 'Tanger', '2026-11-14', '4h 0min', 35, 516, '16:00:00'),
(458, 'Berkane', 'Oujda', '2026-11-15', '2h 45min', 42, 121, '10:00:00'),
(459, 'Settat', 'Tétouan', '2026-11-13', '1h 15min', 55, 181, '16:00:00'),
(460, 'Khouribga', 'Berkane', '2026-11-15', '4h 45min', 56, 189, '08:00:00'),
(461, 'Kenitra', 'Marrakech', '2026-11-15', '3h 15min', 51, 391, '10:00:00'),
(462, 'Tétouan', 'Meknès', '2026-11-13', '3h 45min', 41, 413, '18:00:00'),
(463, 'Taza', 'Tétouan', '2026-11-13', '5h 45min', 58, 188, '10:00:00'),
(464, 'Taza', 'Rabat', '2026-11-14', '3h 0min', 43, 305, '08:00:00'),
(465, 'Laayoune', 'Taza', '2026-11-15', '1h 15min', 41, 182, '14:00:00'),
(466, 'Agadir', 'Settat', '2026-11-14', '4h 30min', 55, 427, '14:00:00'),
(467, 'Berkane', 'Essaouira', '2026-11-15', '2h 30min', 36, 89, '12:00:00'),
(468, 'Berkane', 'Essaouira', '2026-11-15', '1h 0min', 41, 110, '12:00:00'),
(469, 'Kenitra', 'Larache', '2026-11-15', '2h 15min', 40, 178, '10:00:00'),
(470, 'Meknès', 'Tétouan', '2026-11-15', '3h 45min', 43, 410, '10:00:00'),
(471, 'Laayoune', 'Safi', '2026-11-13', '5h 45min', 49, 195, '08:00:00'),
(472, 'Essaouira', 'El Jadida', '2026-11-15', '5h 15min', 38, 121, '08:00:00'),
(473, 'Casablanca', 'Oujda', '2026-11-13', '5h 15min', 54, 561, '08:00:00'),
(474, 'Essaouira', 'Oujda', '2026-11-13', '4h 30min', 56, 102, '08:00:00'),
(475, 'Taza', 'Rabat', '2026-11-14', '3h 30min', 38, 351, '16:00:00'),
(476, 'Marrakech', 'Khouribga', '2026-11-14', '2h 15min', 59, 262, '10:00:00'),
(477, 'Meknès', 'Essaouira', '2026-11-13', '5h 30min', 47, 536, '18:00:00'),
(478, 'Casablanca', 'Laayoune', '2026-11-15', '12h 45min', 32, 1237, '10:00:00'),
(479, 'Nador', 'Essaouira', '2026-11-14', '3h 30min', 35, 96, '10:00:00'),
(480, 'Settat', 'Khouribga', '2026-11-15', '5h 0min', 51, 99, '12:00:00'),
(481, 'Berkane', 'Tanger', '2026-11-14', '6h 15min', 49, 658, '18:00:00'),
(482, 'Essaouira', 'Khouribga', '2026-11-14', '5h 0min', 55, 91, '18:00:00'),
(483, 'Khemisset', 'Tétouan', '2026-11-14', '3h 30min', 53, 196, '08:00:00'),
(484, 'Beni Mellal', 'Nador', '2026-11-13', '4h 30min', 31, 80, '08:00:00'),
(485, 'Tétouan', 'Marrakech', '2026-11-13', '5h 45min', 55, 600, '12:00:00'),
(486, 'Rabat', 'Tanger', '2026-11-14', '2h 45min', 52, 295, '10:00:00'),
(487, 'Beni Mellal', 'El Jadida', '2026-11-15', '1h 45min', 52, 177, '16:00:00'),
(488, 'Safi', 'Marrakech', '2026-11-15', '1h 15min', 52, 160, '12:00:00'),
(489, 'Fès', 'Oujda', '2026-11-14', '3h 15min', 55, 337, '18:00:00'),
(490, 'Agadir', 'Taza', '2026-11-15', '7h 30min', 31, 772, '12:00:00'),
(491, 'Tanger', 'Settat', '2026-11-15', '3h 15min', 39, 428, '18:00:00'),
(492, 'Berkane', 'Tanger', '2026-11-13', '6h 15min', 35, 636, '12:00:00'),
(493, 'Settat', 'Agadir', '2026-11-15', '4h 45min', 50, 450, '10:00:00'),
(494, 'Settat', 'Larache', '2026-11-15', '2h 30min', 51, 138, '10:00:00'),
(495, 'Kenitra', 'Casablanca', '2026-11-15', '1h 45min', 60, 163, '10:00:00'),
(496, 'Agadir', 'Khemisset', '2026-11-15', '5h 0min', 47, 620, '14:00:00'),
(497, 'Casablanca', 'Beni Mellal', '2026-11-13', '1h 15min', 32, 199, '12:00:00'),
(498, 'Laayoune', 'Settat', '2026-11-13', '3h 15min', 38, 183, '12:00:00'),
(499, 'Essaouira', 'Agadir', '2026-11-15', '1h 15min', 56, 193, '14:00:00'),
(500, 'Khemisset', 'Kenitra', '2026-11-15', '3h 0min', 57, 142, '16:00:00'),
(501, 'Casablanca', 'Nador', '2026-11-14', '4h 15min', 42, 499, '08:00:00'),
(502, 'Kenitra', 'Larache', '2026-11-14', '1h 0min', 56, 81, '16:00:00'),
(503, 'Safi', 'Tanger', '2026-11-13', '4h 45min', 43, 500, '18:00:00'),
(504, 'Tanger', 'Beni Mellal', '2026-11-14', '1h 0min', 42, 79, '08:00:00'),
(505, 'Safi', 'Rabat', '2026-11-14', '3h 30min', 47, 330, '12:00:00'),
(506, 'Kenitra', 'Berkane', '2026-11-14', '1h 15min', 35, 183, '16:00:00'),
(507, 'Berkane', 'Khouribga', '2026-11-14', '2h 15min', 47, 182, '16:00:00'),
(508, 'Tétouan', 'Khemisset', '2026-11-13', '3h 45min', 57, 158, '14:00:00'),
(509, 'Meknès', 'Taza', '2026-11-15', '1h 30min', 32, 218, '16:00:00'),
(510, 'El Jadida', 'Laayoune', '2026-11-14', '1h 45min', 31, 104, '18:00:00'),
(511, 'Essaouira', 'Berkane', '2026-11-14', '5h 45min', 34, 176, '10:00:00'),
(512, 'Essaouira', 'Rabat', '2026-11-13', '4h 30min', 54, 444, '10:00:00'),
(513, 'Larache', 'Tétouan', '2026-11-13', '2h 30min', 55, 104, '16:00:00'),
(514, 'Settat', 'Nador', '2026-11-14', '5h 15min', 45, 115, '14:00:00'),
(515, 'Meknès', 'Essaouira', '2026-11-13', '5h 15min', 52, 522, '16:00:00'),
(516, 'El Jadida', 'Khouribga', '2026-11-14', '3h 45min', 49, 98, '14:00:00'),
(517, 'Larache', 'Khouribga', '2026-11-14', '4h 45min', 39, 113, '16:00:00'),
(518, 'Taza', 'Tétouan', '2026-11-15', '4h 30min', 31, 188, '12:00:00'),
(519, 'Marrakech', 'El Jadida', '2026-11-14', '1h 15min', 56, 222, '12:00:00'),
(520, 'Kenitra', 'Oujda', '2026-11-14', '2h 30min', 53, 82, '12:00:00'),
(521, 'Beni Mellal', 'Oujda', '2026-11-15', '2h 45min', 34, 106, '18:00:00'),
(522, 'Khouribga', 'Meknès', '2026-11-14', '1h 45min', 36, 182, '12:00:00'),
(523, 'Laayoune', 'El Jadida', '2026-11-13', '1h 45min', 36, 145, '16:00:00'),
(524, 'Tanger', 'El Jadida', '2026-11-14', '4h 45min', 48, 421, '12:00:00'),
(525, 'El Jadida', 'Safi', '2026-11-14', '1h 30min', 40, 139, '08:00:00'),
(526, 'Meknès', 'Beni Mellal', '2026-11-15', '2h 30min', 58, 71, '16:00:00'),
(527, 'Mohammedia', 'Essaouira', '2026-11-15', '2h 30min', 58, 136, '16:00:00'),
(528, 'El Jadida', 'Fès', '2026-11-14', '3h 0min', 48, 362, '16:00:00'),
(529, 'Nador', 'Laayoune', '2026-11-15', '2h 0min', 60, 183, '12:00:00'),
(530, 'Meknès', 'Taza', '2026-11-14', '1h 30min', 55, 202, '16:00:00'),
(531, 'Marrakech', 'Kenitra', '2026-11-14', '3h 45min', 57, 358, '18:00:00'),
(532, 'Marrakech', 'Beni Mellal', '2026-11-15', '3h 0min', 39, 132, '18:00:00'),
(533, 'Taza', 'Rabat', '2026-11-13', '3h 15min', 36, 337, '14:00:00'),
(534, 'Laayoune', 'Nador', '2026-11-13', '3h 45min', 36, 76, '12:00:00'),
(535, 'Nador', 'Taza', '2026-11-14', '2h 30min', 60, 129, '08:00:00'),
(536, 'Nador', 'Tanger', '2026-11-13', '4h 0min', 47, 532, '12:00:00'),
(537, 'Beni Mellal', 'Settat', '2026-11-13', '3h 45min', 60, 77, '10:00:00'),
(538, 'Casablanca', 'Berkane', '2026-11-13', '5h 45min', 43, 614, '16:00:00'),
(539, 'Khemisset', 'Mohammedia', '2026-11-13', '3h 0min', 51, 125, '18:00:00'),
(540, 'Laayoune', 'Safi', '2026-11-14', '4h 15min', 57, 183, '16:00:00'),
(541, 'Mohammedia', 'Nador', '2026-11-14', '2h 15min', 59, 135, '08:00:00'),
(542, 'Safi', 'Mohammedia', '2026-11-13', '2h 45min', 55, 197, '18:00:00'),
(543, 'Nador', 'Fès', '2026-11-15', '2h 45min', 49, 282, '12:00:00'),
(544, 'Khouribga', 'Meknès', '2026-11-14', '1h 30min', 32, 160, '12:00:00'),
(545, 'Safi', 'Tétouan', '2026-11-13', '1h 45min', 48, 145, '08:00:00'),
(546, 'Essaouira', 'Settat', '2026-11-13', '3h 15min', 30, 113, '12:00:00'),
(547, 'Tétouan', 'Rabat', '2026-11-13', '2h 15min', 44, 313, '16:00:00'),
(548, 'El Jadida', 'Fès', '2026-11-15', '3h 15min', 40, 391, '10:00:00'),
(549, 'Mohammedia', 'Oujda', '2026-11-15', '1h 30min', 52, 82, '14:00:00'),
(550, 'El Jadida', 'Mohammedia', '2026-11-13', '3h 30min', 33, 101, '08:00:00'),
(551, 'Settat', 'Tanger', '2026-11-14', '3h 30min', 52, 420, '12:00:00'),
(552, 'Larache', 'Khemisset', '2026-11-13', '4h 45min', 36, 88, '18:00:00'),
(553, 'Berkane', 'El Jadida', '2026-11-13', '1h 30min', 43, 191, '14:00:00'),
(554, 'Laayoune', 'Safi', '2026-11-14', '3h 30min', 36, 168, '18:00:00'),
(555, 'Rabat', 'Kenitra', '2026-11-13', '0h 30min', 59, 56, '14:00:00'),
(556, 'Fès', 'Essaouira', '2026-11-14', '5h 0min', 34, 597, '18:00:00'),
(557, 'Rabat', 'Settat', '2026-11-13', '1h 30min', 43, 175, '16:00:00'),
(558, 'Taza', 'Laayoune', '2026-11-15', '3h 15min', 42, 126, '16:00:00'),
(559, 'Mohammedia', 'Meknès', '2026-11-14', '2h 15min', 30, 249, '18:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_res`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_voyage` (`id_voyage`);

--
-- Index pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`id_voyage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1035;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `id_voyage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=560;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_voyage`) REFERENCES `voyage` (`id_voyage`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
