-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 16 Décembre 2016 à 11:59
-- Version du serveur :  5.7.16-0ubuntu0.16.04.1
-- Version de PHP :  7.0.13-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mediatek`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `author` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `book`
--

INSERT INTO `book` (`id`, `document_id`, `author`, `year`) VALUES
(1, 3, 'Honoré de Balzac', 1835),
(2, 4, 'Honoré de Balzac', 1831),
(3, 5, 'Honoré de Balzac', 1829),
(4, 6, 'Jean-Paul Sartre', 1938),
(5, 7, 'Jean-Paul Sartre', 1939);

-- --------------------------------------------------------

--
-- Structure de la table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `borrowing` datetime DEFAULT NULL,
  `planned_return` datetime DEFAULT NULL,
  `effective_return` datetime DEFAULT NULL,
  `reservation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `borrow`
--

INSERT INTO `borrow` (`id`, `document_id`, `user_id`, `borrowing`, `planned_return`, `effective_return`, `reservation`) VALUES
(1, 3, 3, NULL, NULL, NULL, '2016-12-14 00:00:00'),
(3, 8, 3, '2016-12-15 00:00:00', '2017-01-14 00:00:00', NULL, '2016-12-14 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `cd`
--

CREATE TABLE `cd` (
  `id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `composer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cd`
--

INSERT INTO `cd` (`id`, `document_id`, `composer`, `year`) VALUES
(1, 8, 'Sven Väth', 2016),
(2, 9, 'Sven Väth', 2000);

-- --------------------------------------------------------

--
-- Structure de la table `comic`
--

CREATE TABLE `comic` (
  `id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `cartoonist` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `document`
--

INSERT INTO `document` (`id`, `date`, `title`, `cover`) VALUES
(3, '2016-12-13 00:00:00', 'Le Père Goriot', 'uploads/leperegoriot.png'),
(4, '2016-12-13 00:00:00', 'La Peau de chagrin', 'uploads/lapeaudechagrin.png'),
(5, '2016-12-13 00:00:00', 'Les Chouans', 'uploads/leschouans.png'),
(6, '2016-09-13 00:00:00', 'La Nausée', 'uploads/lanausée.jpeg'),
(7, '2016-08-23 00:00:00', 'Le Mur', 'uploads/lemur.jpg'),
(8, '2016-12-01 00:00:00', 'The Sound of the 17th Season', 'uploads/17saison.jpg'),
(9, '2016-11-09 00:00:00', 'Contact', 'uploads/contact.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id`, `date`, `title`, `description`, `cover`) VALUES
(1, '2016-12-21 18:00:00', 'U4 ', '4 livres, 4 auteurs, 4 livres, 4 rendez-vous !', 'uploads/U4.jpg'),
(2, '2016-12-09 21:00:00', 'Soirée jeux de société', 'Venez jouer au dernier jeu avec toutes l\'équipes de la médiathèque.', 'uploads/U4.jpg'),
(3, '2017-01-10 18:00:00', 'U4', '4 livres, 4 auteurs, 4 livres, 4 rendez-vous !', 'uploads/U4.jpg'),
(4, '2017-01-09 21:00:00', 'Soirée jeux de société', 'Venez jouer au dernier jeu avec toutes l\'équipes de la médiathèque.', 'uploads/U4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(3, 'root', 'root', 'truc@much.fr', 'truc@much.fr', 1, NULL, '$2y$13$mK/M2xOaKD1mW/Sw8su/x.jqH0OlyJ0Zd8cmmRaz6hlCadKbN983K', '2016-12-15 16:19:50', NULL, NULL, 'a:0:{}');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_CBE5A331C33F7837` (`document_id`),
  ADD KEY `work_id` (`document_id`);

--
-- Index pour la table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_55DBA8B0C33F7837` (`document_id`),
  ADD KEY `IDX_55DBA8B0A76ED395` (`user_id`),
  ADD KEY `user_id` (`user_id`,`document_id`);

--
-- Index pour la table `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_45D68FDAC33F7837` (`document_id`),
  ADD KEY `work_id` (`document_id`);

--
-- Index pour la table `comic`
--
ALTER TABLE `comic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_5B7EA5AAC33F7837` (`document_id`),
  ADD KEY `work_id` (`document_id`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_id` (`document_id`),
  ADD KEY `user_id` (`user_id`,`document_id`),
  ADD KEY `IDX_42C84955A76ED395` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `cd`
--
ALTER TABLE `cd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `comic`
--
ALTER TABLE `comic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FK_CBE5A331C33F7837` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`);

--
-- Contraintes pour la table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `FK_55DBA8B0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_55DBA8B0C33F7837` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`);

--
-- Contraintes pour la table `cd`
--
ALTER TABLE `cd`
  ADD CONSTRAINT `FK_45D68FDAC33F7837` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`);

--
-- Contraintes pour la table `comic`
--
ALTER TABLE `comic`
  ADD CONSTRAINT `FK_5B7EA5AAC33F7837` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_42C84955A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_42C84955C33F7837` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
