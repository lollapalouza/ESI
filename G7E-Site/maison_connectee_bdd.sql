-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 25 mai 2019 à 17:47
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `maison_connectee_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `camera`
--

DROP TABLE IF EXISTS `camera`;
CREATE TABLE IF NOT EXISTS `camera` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Contenu(Lien)` varchar(255) NOT NULL,
  `IDPiece` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

DROP TABLE IF EXISTS `catalogue`;
CREATE TABLE IF NOT EXISTS `catalogue` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Type_` varchar(20) NOT NULL,
  `Numero_de_serie` int(11) NOT NULL,
  `idCategorieProduit` int(11) NOT NULL,
  `idPiece` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `catalogue`
--

INSERT INTO `catalogue` (`ID`, `Nom`, `Type_`, `Numero_de_serie`, `idCategorieProduit`, `idPiece`) VALUES
(67, 'test', 'capteur', 123, 1, 37),
(81, 'volet 1', 'actionneur', 125, 5, 47),
(80, 'luminosité 1', 'capteur', 123, 2, 47),
(79, 'Mathieu', 'actionneur', 123, 1, 46),
(78, 'actionneur', 'actionneur', 125, 2, 45),
(74, 'capteur', 'capteur', 123, 1, 42),
(75, 'capteur', 'capteur', 123, 3, 43),
(76, 'actionneur', 'actionneur', 123, 3, 43),
(77, 'capteur2', 'capteur', 123, 1, 43);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_produit`
--

DROP TABLE IF EXISTS `categorie_produit`;
CREATE TABLE IF NOT EXISTS `categorie_produit` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie_produit`
--

INSERT INTO `categorie_produit` (`ID`, `Nom`) VALUES
(1, 'temperature'),
(2, 'luminosite'),
(3, 'humidite'),
(4, 'IR'),
(5, 'moteur'),
(6, 'lumiere'),
(7, 'ventilation');

-- --------------------------------------------------------

--
-- Structure de la table `concert`
--

DROP TABLE IF EXISTS `concert`;
CREATE TABLE IF NOT EXISTS `concert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prix` float DEFAULT NULL,
  `date_concert` date DEFAULT NULL,
  `salle_id` int(11) DEFAULT NULL,
  `groupe_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `groupe_id` (`groupe_id`),
  KEY `salle_id` (`salle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `concert`
--

INSERT INTO `concert` (`id`, `prix`, `date_concert`, `salle_id`, `groupe_id`) VALUES
(1, 100, '2017-12-11', 1, 1),
(2, 100, '2017-12-12', 2, 1),
(3, 100, '2017-12-11', 2, 2),
(4, 100, '2017-12-12', 1, 2),
(5, 100, '2017-12-11', 3, 3),
(6, 100, '2017-12-12', 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `consigne`
--

DROP TABLE IF EXISTS `consigne`;
CREATE TABLE IF NOT EXISTS `consigne` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Valeur` int(11) NOT NULL,
  `temps_début` int(11) NOT NULL,
  `temps_fin` int(11) NOT NULL,
  `Envoye` varchar(10) NOT NULL,
  `IDcatalogue` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `consigne`
--

INSERT INTO `consigne` (`ID`, `Valeur`, `temps_début`, `temps_fin`, `Envoye`, `IDcatalogue`) VALUES
(9, 1, 1, 1, '', 81);

-- --------------------------------------------------------

--
-- Structure de la table `divers`
--

DROP TABLE IF EXISTS `divers`;
CREATE TABLE IF NOT EXISTS `divers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) NOT NULL,
  `Contenu` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Question` text NOT NULL,
  `Reponse` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`ID`, `Question`, `Reponse`) VALUES
(1, 'Puis-je modifier mon mot de passe ?', 'Oui ! Pour cela, il faut accéder au profil utilisateur (passez la souris sur votre pseudo en haut à droite de l\'écran), puis suivez les instructions en écrivant votre nouveau mot de passe. Nous vous conseillons de choisir un mot de passe sécurisé, avec des majuscules et des chiffres. Évitez votre date de naissance et votre nom de famille.'),
(2, 'Je souhaite rendre ma maison connectée grâce à votre système, comment faire ?', 'Pour cela, il faut ajouter sa maison au site en remplissant les critères dans \"Choix de la maison\". Ensuite, gérez votre maison dans \"Gestion des Pièces\". Nous vous recontacterons dans les plus brefs délais pour concrétiser votre projet !'),
(3, 'Comment ajouter un capteur ?', 'Pour ajouter un capteur, rendez-vous sur la page \"Gestion des pièces\", puis sélectionner la pièce correspondante. Enfin, cliquez sur \"+\" et laissez vous guider.'),
(4, 'Je souhaite obtenir des conseils concernant l\'architecture de mes capteurs. Comment dois-je m\'y prendre ?', 'En bas de la page se trouve un lien \"Nous contacter\" qui sert à nous envoyer un mail. Nous serons ravis de vous répondre dans les plus brefs délais.'),
(5, 'J\'ai plusieurs logements et voudrais gérer indépendamment chacun d\'entre eux. Est-ce possible ?', 'Bien sûr ! Vous pouvez choisir quelle maison gérer dans \"Choix de la maison\" et en tapant le nom de la maison que vous voulez rendre active. Ensuite, gérer vos capteurs et actionneurs dans le menu \"Gestion des Pièces\".');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `style_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `style_id` (`style_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `style_id`) VALUES
(1, 'Radiohead', 1),
(2, 'Funkadelic Parliament', 2),
(3, 'PNL', 3);

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

DROP TABLE IF EXISTS `maison`;
CREATE TABLE IF NOT EXISTS `maison` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Nom_maison` varchar(50) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Pays` varchar(50) NOT NULL,
  `Code_postal` int(11) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`ID`, `Nom_maison`, `Ville`, `Pays`, `Code_postal`, `Adresse`, `IDutilisateur`) VALUES
(99, 'Le Mât', 'Saint-Vrain', 'France', 91770, '37 rue Saint Antoine', 19);

-- --------------------------------------------------------

--
-- Structure de la table `pack`
--

DROP TABLE IF EXISTS `pack`;
CREATE TABLE IF NOT EXISTS `pack` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(20) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Contenu` text NOT NULL,
  `IDUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

DROP TABLE IF EXISTS `piece`;
CREATE TABLE IF NOT EXISTS `piece` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Superficie` int(11) NOT NULL,
  `Type_` varchar(20) NOT NULL,
  `idMaison` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`ID`, `Nom`, `Superficie`, `Type_`, `idMaison`) VALUES
(47, 'Salon', 250, 'salon', 99),
(48, 'Chambre 1', 90, 'chambre', 99),
(49, 'Chambre 2', 90, 'chambre', 99);

-- --------------------------------------------------------

--
-- Structure de la table `privilege`
--

DROP TABLE IF EXISTS `privilege`;
CREATE TABLE IF NOT EXISTS `privilege` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(20) NOT NULL,
  `IDMaison` int(11) NOT NULL,
  `IDUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `capacite` int(11) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ville_id` (`ville_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `nom`, `capacite`, `adresse`, `ville_id`) VALUES
(1, 'Accord Hotel Arena', 5000, '75012', 1),
(2, 'Zenith', 10000, 'a lyon', 2),
(3, 'Salle des fetes', 50, 'macon', 3);

-- --------------------------------------------------------

--
-- Structure de la table `sav`
--

DROP TABLE IF EXISTS `sav`;
CREATE TABLE IF NOT EXISTS `sav` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Téléphone` int(11) NOT NULL,
  `Adresse_mail` text NOT NULL,
  `Adresse_postale` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `style`
--

DROP TABLE IF EXISTS `style`;
CREATE TABLE IF NOT EXISTS `style` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `style` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `style`
--

INSERT INTO `style` (`id`, `style`) VALUES
(1, 'Rock and Roll'),
(2, 'Funk'),
(3, 'Rap');

-- --------------------------------------------------------

--
-- Structure de la table `trame_envoyee`
--

DROP TABLE IF EXISTS `trame_envoyee`;
CREATE TABLE IF NOT EXISTS `trame_envoyee` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) NOT NULL,
  `Numero_requete` varchar(255) NOT NULL,
  `Checksum_des_informations` varchar(255) NOT NULL,
  `Valeur` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `trame_recue`
--

DROP TABLE IF EXISTS `trame_recue`;
CREATE TABLE IF NOT EXISTS `trame_recue` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Requete` varchar(255) NOT NULL,
  `Numéro d'équipe` varchar(10) NOT NULL,
  `IDCapteur/Actionneur` int(11) NOT NULL,
  `Valeur` varchar(255) NOT NULL,
  `Timestamp` varchar(255) NOT NULL,
  `Checksum des informations` varchar(255) NOT NULL,
  `idCapteur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Prénom` varchar(20) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Pseudo` varchar(20) NOT NULL,
  `Mot_de_passe` varchar(255) NOT NULL,
  `Adresse_mail` varchar(50) NOT NULL,
  `Numero_de_telephone` int(11) NOT NULL,
  `Etat_de_connexion` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `Prénom`, `Nom`, `Pseudo`, `Mot_de_passe`, `Adresse_mail`, `Numero_de_telephone`, `Etat_de_connexion`) VALUES
(19, 'Mathieu', 'SACH', 'Math_Admin', '45c78addfed543b201ed88284f7373ab3d7814a7', 'mathieu.tran2901@outlook.com', 667485207, 'none');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id`, `nom`) VALUES
(1, 'Paris'),
(2, 'Lyon'),
(3, 'Macon');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
