-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 27 juil. 2026 à 11:16
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
-- Base de données : `gestion_stagiaires`
--

-- --------------------------------------------------------

--
-- Structure de la table `encadrant`
--

CREATE TABLE `encadrant` (
  `id_encadrant` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `fonction` varchar(100) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `encadrant`
--

INSERT INTO `encadrant` (`id_encadrant`, `nom`, `prenom`, `fonction`, `telephone`, `email`) VALUES
(1, 'Rakoto', 'Jean', 'Responsable RSI', '0341234567', 'rakoto@asecna.mg'),
(7, 'RAKOTO', 'Nomena', 'Chef RSI', '0346358396', 'paul.rabe@gmail.com'),
(8, 'RASOLO', 'Bera', 'Chef RSI', '0323225669', 'great@gmail.com'),
(9, 'RAZAFY', 'jACKIE', 'Responsable Informatique', '0325986597', 'jackie@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `nom_service` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `nom_service`, `description`) VALUES
(1, 'RSI', 'Réseaux\r\n'),
(2, 'RSI', 'Création et réalisation d une application web de gestion de stagiaires\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `id_stagiaire` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `sexe` enum('Masculin','Féminin') NOT NULL,
  `date_naissance` date NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `etablissement` varchar(150) NOT NULL,
  `filiere` varchar(100) NOT NULL,
  `niveau` varchar(50) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_encadrant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stagiaire`
--

INSERT INTO `stagiaire` (`id_stagiaire`, `nom`, `prenom`, `sexe`, `date_naissance`, `telephone`, `email`, `etablissement`, `filiere`, `niveau`, `date_debut`, `date_fin`, `id_service`, `id_encadrant`) VALUES
(1, 'RAKOTO', 'Nomena', 'Masculin', '2005-11-07', '0323079359', 'fabricerazafindahy@gmail.com', 'LIPSS', 'Informatique et électronique', 'licence 3', '2026-07-15', '2026-10-15', 1, 1),
(3, 'RAZAFINDAHY', 'Nomena', 'Masculin', '2006-02-10', '0346358396', 'fabricerazafindahy@gmail.com', 'LIPSS', 'Informatique et électronique', 'licence 3', '2026-07-12', '2026-09-12', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `mot_de_passe`) VALUES
(1, 'Admin', 'RSI', 'admin@gmail.com', 'admin123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `encadrant`
--
ALTER TABLE `encadrant`
  ADD PRIMARY KEY (`id_encadrant`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Index pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD PRIMARY KEY (`id_stagiaire`),
  ADD KEY `fk_service` (`id_service`),
  ADD KEY `fk_encadrant` (`id_encadrant`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `encadrant`
--
ALTER TABLE `encadrant`
  MODIFY `id_encadrant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  MODIFY `id_stagiaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `fk_encadrant` FOREIGN KEY (`id_encadrant`) REFERENCES `encadrant` (`id_encadrant`),
  ADD CONSTRAINT `fk_service` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
