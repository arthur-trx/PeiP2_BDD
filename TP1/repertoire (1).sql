-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 17 jan. 2023 à 18:51
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `repertoire`
--

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `num_personne` int(11) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `prenom` varchar(128) DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`num_personne`, `nom`, `prenom`, `date_de_naissance`) VALUES
(13, 'tarroux', 'arthur', '2003-12-15'),
(14, 'guerchon', 'mickael', '2003-12-15'),
(15, 'guettier', 'alexis', '2001-01-01'),
(16, 'ZÃ©narie', 'Loic', '1970-01-01'),
(17, 'test', 'bjgfutg', '1970-01-01'),
(18, 'tarroux', 'arthur', '2003-12-15'),
(19, 'tarroux', 'arthur', '2003-12-15');

-- --------------------------------------------------------

--
-- Structure de la table `personne_a_telephone`
--

CREATE TABLE `personne_a_telephone` (
  `num_personne` int(11) NOT NULL,
  `num_telephone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne_a_telephone`
--

INSERT INTO `personne_a_telephone` (`num_personne`, `num_telephone`) VALUES
(13, 7),
(14, 8),
(15, 9),
(16, 16),
(17, 10),
(18, 18),
(14, 11),
(13, 12),
(19, 13),
(19, 14),
(13, 15);

-- --------------------------------------------------------

--
-- Structure de la table `telephone`
--

CREATE TABLE `telephone` (
  `num_telephone` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `telephone`
--

INSERT INTO `telephone` (`num_telephone`, `numero`, `type`) VALUES
(7, 637436871, 'PrF'),
(8, 637438899, 'PeF'),
(9, 789456123, 'PrM'),
(10, 6376, 'PeM'),
(15, 9, 'PeF');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`num_personne`);

--
-- Index pour la table `telephone`
--
ALTER TABLE `telephone`
  ADD PRIMARY KEY (`num_telephone`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `num_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `telephone`
--
ALTER TABLE `telephone`
  MODIFY `num_telephone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
