-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 fév. 2023 à 16:32
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_emoubilie`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `superficie` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `montant` decimal(50,0) NOT NULL,
  `date_annonce` date NOT NULL,
  `type_annonce` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `image`, `description`, `superficie`, `adresse`, `montant`, `date_annonce`, `type_annonce`) VALUES
(1, 'appartement Tanger 70m²', './images/appartement1.jpg', 'In a prime location on rue des Petites Ecuries, on the 2nd floor of a building dating from 1885, a charming dual-aspect apartment completely redesigned and renovated by an architect. Composed of a hall, an attractive double-sized reception room with a fir', 70, 'branes 1 N 30, tanger', '7700', '2023-01-02', 'Location'),
(2, 'appartement casablanca 120m²', './images/appartement2.jpg', 'Vaugirard - Square Necker Alleray Procession In a beautiful luxury building with guardian to house, Saint Ferdinand Immobilier offers a family apartment of 120m² (Carrez law) on the 5th floor elevator. It consists of: an entrance gallery, a living room of', 120, 'anfa 2 N 30, casablanca', '11400', '2023-01-04', 'Location'),
(4, 'appartement Tanger 98m²', './images/appartement4.jpg', 'a luxury Haussmannian building with an elevator and a concierge, this dual-aspect apartment that has recently been beautifully renovated and overlooks interior courtyards comprises a beautiful entrance hall leading to a kitchen/dining room, a living room ', 98, 'achakar N 66, tanger', '800000', '2023-01-04', 'vente'),
(5, 'appartement Tanger 57m²', './images/appartement5.jpg', 'This 56,62 sqm (as defined by the Carrez law) 2-room apartment is on the second floor of a beautiful 1920\'s well-maintained building with a concierge and an elevator located in the heart of the Notre-Dame-des-Champs district, a stone\'s throw away from the', 57, 'branes 2 N 77, tanger', '500000', '2023-01-02', 'vente'),
(6, 'appartement rabat 124m²', './images/appartement6.jpg', 'On the third floor of a beautiful private mansion with a lift, Barnes is advertising this exceptional property offering 116.36m² (1,252 sq ft) of living space under the Carrez law. Renovated by an interior designer, it is composed of a hall, a guest cloak', 124, 'rue HASSAN II N 5 , rabat', '20000', '2022-12-16', 'Location'),
(7, 'appartement rabat 74m²', './images/appartement7.jpg', 'On the third floor of a building dating from 1926 with a lift on a private and secure road, this attractive 74.15m² (798 sq ft) apartment features: a hall with a window offering an unobstructed view, a double-sized living room, a separate kitchen, a bedro', 74, 'rue masira N49, rabat', '9000', '2023-01-11', 'Location'),
(8, 'appartement Tetouan 165m²', './images/appartement8.jpg', 'On the 7th floor of a semi-recent building with a live-in concierge, a very bright 165m² (1,776 sq ft) apartment with a balcony and no overlook. A large hall leads to a triple-sized living room opening onto a wide 15m² ', 165, 'ajanif rue 4 N 30, tetouan', '9800', '2023-01-19', 'Location'),
(9, 'appartement Tanger 29m²', './images/appartement9.jpg', 'Exclusive listing situated in the heart of the 6th arrondissement in the famous Odeon district, rue Princesse. The apartment of 29 sqm (24 sqm carrez law) overlooking a lovely and quiet court, consists of an entrance with closet, a small living / dining a', 29, 'sidi drisse rue 4 N 10, tanger', '200000', '2023-01-11', 'vente'),
(10, 'appartement Tanger 62m²', './images/appartement10.jpg', 'In exclusivity In the heart of the Marais, located on rue du Temple, large two-room apartment of 62m², on the second floor without elevator, including an entrance, a large bedroom on the courtyard, a bathroom, toilets, a corridor with storage space leadin', 62, 'bendiban rue jirari 1 N 3, tanger', '7000', '2023-01-24', 'Location');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
