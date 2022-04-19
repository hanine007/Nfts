-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 26 mars 2022 à 07:45
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ihm`
--

-- --------------------------------------------------------

--
-- Structure de la table `bought_nft`
--

CREATE TABLE `bought_nft` (
  `id_user` int(11) NOT NULL,
  `id_nft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'art'),
(2, 'photo'),
(3, 'music'),
(4, 'sport');

-- --------------------------------------------------------

--
-- Structure de la table `chain`
--

CREATE TABLE `chain` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chain`
--

INSERT INTO `chain` (`id`, `name`) VALUES
(1, 'ethereum'),
(2, 'bitcoin');

-- --------------------------------------------------------

--
-- Structure de la table `liked_nft`
--

CREATE TABLE `liked_nft` (
  `id_user` int(11) NOT NULL,
  `id_nft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `nft`
--

CREATE TABLE `nft` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_chain` int(11) NOT NULL,
  `dir_nft` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `nft`
--

INSERT INTO `nft` (`id`, `name`, `description`, `price`, `quantity`, `likes`, `id_user`, `id_category`, `id_chain`, `dir_nft`) VALUES
(1, 'JSK', 'logo equipe de foot ', 0.5, 0, 0, 1, 1, 1, 'article-img.jpg'),
(2, 'FCB', 'lionel messi', 0.2, 0, 0, 2, 4, 2, 'maxresdefault.jpg'),
(3, 'first nft', 'pemier test de nft', 0.06, 2, 0, 1, 2, 2, '3_191_china_02.jpg'),
(4, 'nft test 2', 'azul mon 2 nft', 0.13, 3, 0, 1, 4, 1, 'Flag_of_Europe.svg.png'),
(7, 'sdf', 'fdscqdscfgvsq', 0.1, 6, 0, 1, 4, 1, '623bacbdb855a-1648078013.png'),
(8, 'dsgd', 'dsferf', 0.05, 1, 0, 1, 2, 1, '623bc5e3d1297-1648084451.png'),
(9, 'nft wayed', 'un autre test', 0.09, 0, 0, 3, 3, 1, '623e438fabff3-1648247695.png'),
(10, 'nft de test', 'azul fell awen ayetma', 0.06, 4, 0, 3, 1, 1, '623eb3e0270d5-1648276448.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'anis', 'anishachi60@gmail.com', 'anis'),
(2, 'hachi', 'newwayanishachi@gmail.com', 'hachi'),
(3, 'kan_akka', 'anis_hachi@outlook.com', '34d8dabe68db6b2ba1d511086b599af0');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bought_nft`
--
ALTER TABLE `bought_nft`
  ADD PRIMARY KEY (`id_user`,`id_nft`),
  ADD KEY `id_nft` (`id_nft`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chain`
--
ALTER TABLE `chain`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `liked_nft`
--
ALTER TABLE `liked_nft`
  ADD PRIMARY KEY (`id_user`,`id_nft`),
  ADD KEY `id_nft` (`id_nft`);

--
-- Index pour la table `nft`
--
ALTER TABLE `nft`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_chain` (`id_chain`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `chain`
--
ALTER TABLE `chain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `nft`
--
ALTER TABLE `nft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bought_nft`
--
ALTER TABLE `bought_nft`
  ADD CONSTRAINT `bought_nft_ibfk_1` FOREIGN KEY (`id_nft`) REFERENCES `nft` (`id`),
  ADD CONSTRAINT `bought_nft_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `liked_nft`
--
ALTER TABLE `liked_nft`
  ADD CONSTRAINT `liked_nft_ibfk_1` FOREIGN KEY (`id_nft`) REFERENCES `nft` (`id`),
  ADD CONSTRAINT `liked_nft_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `nft`
--
ALTER TABLE `nft`
  ADD CONSTRAINT `nft_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `nft_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `nft_ibfk_3` FOREIGN KEY (`id_chain`) REFERENCES `chain` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
