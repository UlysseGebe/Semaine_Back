-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 12 avr. 2019 à 02:58
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

CREATE TABLE `boisson` (
  `id` int(11) NOT NULL,
  `id_Party` int(11) NOT NULL,
  `drinkName` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `boisson`
--

INSERT INTO `boisson` (`id`, `id_Party`, `drinkName`) VALUES
(1, 65, 'Cola bomb');

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

CREATE TABLE `musique` (
  `id` int(11) NOT NULL,
  `id_Party` int(11) NOT NULL,
  `datas` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `musique`
--

INSERT INTO `musique` (`id`, `id_Party`, `datas`) VALUES
(37, 65, 'Believer|Imagine Dragons|https://lastfm-img2.akamaized.net/i/u/174s/d645cfa73e13eb828349968ec2d0e234.png'),
(38, 65, 'Believe Me Natalie|The Killers|https://lastfm-img2.akamaized.net/i/u/174s/3ed37777196a6f2c29c02a1a58a93e4d.png'),
(39, 65, 'Believe|Cher|https://lastfm-img2.akamaized.net/i/u/174s/879a88760860cc472d826ca4e7fc5ad6.png');

-- --------------------------------------------------------

--
-- Structure de la table `parties`
--

CREATE TABLE `parties` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parties`
--

INSERT INTO `parties` (`id`, `name`, `password`, `time`, `description`, `address`, `phone`) VALUES
(58, 'PartyHard', '$2y$10$zNGUp4iC5hAbI0Cg1IC8rOCgF28jTo9.hCre.L8UTXbvPPb3KY5pS', '4444-03-12', 'oefzi', 'fzoeifze', '444555555'),
(57, 'QLF GANG', '$2y$10$jN.oCVLE9b/.76gPyvs4UuN5iI.xUxWGY401J0lZwI76PGL6JZ4OC', '2019-04-12', '', 'Corbeil', '0656543312'),
(55, 'Meltdown', '$2y$10$YEnleJBXf0KmVwe7rc.xbe991GXeG4qLF8/5NOqYVUtx5Rg9xJZzy', '2019-04-20', 'Venez nombreux', 'A HETIC', '0123435643'),
(54, 'Mon anniversaire', '$2y$10$5NySixVFQOz6azJyNRkLIOg3Y7CZYoFXQrahvSbEMIY4ix2zroL/O', '2134-11-24', '18H', 'Che moi', '0654343422'),
(52, 'La soirÃ©e de ma vie ', '$2y$10$DxkrxSHSjbeiDuCyNQ9oeub4Ja.iw2EV/5vr1SZCrhpk3zXUz20sK', '2019-05-20', '18H', 'Chez toi', '0654563212'),
(63, 'uufe', '$2y$10$owIAIeZbAR/nrylO5ngjue87pAFzEjci0QwVd/rfm8yf1L8/G2am2', '0045-04-23', '', '1233', 'iadza'),
(62, 'oiaefoi', '$2y$10$jjNYz/0lqZ1qTMhu3lHks.lZegMQYJvWBm2hQ0u1g.58oK5S1Mw2K', '0344-03-12', 'oeiez', 'ezfoifo', '67777'),
(64, 'Alex\'s birthday', '$2y$10$e4n/UiTNcL3B5d8Mxw25BOI6LKSmylch3QfaB5cDRQ9JuOoyDZnKC', '2019-11-23', 'Venez sah', 'Chez lui', '0645324312'),
(65, 'Ulysse Anniv', '$2y$10$vBSx4/ZWfeydMjRIFNE8G.rHaMLiVFRAjkqXk3ehkDIiO3c7XtArm', '3333-02-12', 'ugieguez', 'cuhcua', '767666666'),
(66, 'gzdk', '$2y$10$YHGeslgEIvgGqsTIKnHVy./0tQG0PFFDTv2gRevK9bu0dVj1/lkJC', '0222-02-12', 'meoooez', 'mej', 'aoeihzda'),
(67, 'Soiré', '$2y$10$xHbtVQy9efOcwSPAqkdJIeemTTFpn8Oj/4D8N0EAOHnQXko7BRuey', '1999-01-16', 'Oui', '27', '0606665840'),
(68, 'rzsvv', '$2y$10$96xj1EtbzZ2eWP07m.PujuRj7wq90wiKC6VbbPdcTxoSsAust1dM2', '0010-10-10', 'dbsdtfb', 'sfsbdfbs', '234235245'),
(69, 'sqf', '$2y$10$.HiRGi4bT5R1RGk40Sv/IeE/0B4o9CKDBZ/tNF1.CrtdkgLRK8Rdi', '0001-01-01', 'dfhdsth', 'sqdg<sb', '45756E7');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `id_Party` int(11) NOT NULL,
  `foodName` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `id_Party`, `foodName`) VALUES
(20, 65, 'Chips saveur barbecue'),
(21, 65, 'Les natures à l\'ancienne'),
(22, 65, 'Chips saveur barbecue'),
(23, 65, 'Les natures à l\'ancienne'),
(26, 65, 'Chips saveur barbecue');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `id_party` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `id_party`) VALUES
(7, 'Alban', 52),
(10, 'LumKee', 54),
(11, 'Jules', 54),
(12, 'Nils', 54),
(13, 'HETIC', 55),
(14, 'Antoine', 55),
(19, 'Jason', 54),
(20, 'Ademo', 57),
(21, 'NOS', 57),
(22, 'Joel', 57),
(23, 'Antoine', 57),
(24, 'Luc', 57),
(32, 'Manolo', 57),
(34, 'effezfe', 62),
(35, 'Anthony', 62),
(36, 'ert', 63),
(37, 'oiaa', 57),
(38, 'uadhdaef', 54),
(39, 'Bernard', 57),
(40, 'Raphael', 54),
(41, 'Manolo', 64),
(42, 'Ademo', 64),
(43, 'Florian', 57),
(44, 'Jacques', 57),
(45, 'uadzbea', 57),
(46, 'Ulysse', 65),
(47, 'cagl', 66),
(48, 'lmjezez', 65),
(49, 'Ulysse-The_best_ever', 67),
(50, 'utu', 65),
(51, 'uld', 65),
(52, 'hbh', 65),
(53, 'sv', 65),
(54, 'se f <', 65),
(55, 'sfxb', 65),
(56, 'qdgv', 65),
(57, 'sdgsg', 65),
(58, 'fsgsdrgb', 65),
(59, 'sdwbdfw', 65),
(60, 'Ulysse-The', 68),
(61, 'swbdswb', 65),
(62, 'swbn', 65),
(63, 'he_best_ever', 69),
(64, 's<bdsv', 65),
(65, 'sbxßdw', 65),
(66, 's<bdwn', 65),
(67, 'utnhtius', 65),
(68, 'svnksbkkk', 65),
(69, 'jhihiyjtnjr', 65),
(70, 'kjtirjnfjv', 65),
(71, 'pfifhfigfhyeghfioehfogfhrh', 65),
(72, 'hfjfkrnfbvjbfgg', 65),
(73, 'ppouyt', 65),
(74, 'oihygftrd', 65),
(75, 'qguenbcir', 65);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `musique`
--
ALTER TABLE `musique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `boisson`
--
ALTER TABLE `boisson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `musique`
--
ALTER TABLE `musique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
