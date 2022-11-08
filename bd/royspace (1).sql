-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 18 août 2022 à 02:17
-- Version du serveur : 5.7.36
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gedmmpe`
--

-- --------------------------------------------------------

--
-- Structure de la table `acces`
--

DROP TABLE IF EXISTS `acces`;
CREATE TABLE IF NOT EXISTS `acces` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acces`
--

INSERT INTO `acces` (`id`, `libelle`) VALUES
(1, 'Lecture , Edition , Suppression'),
(2, 'Lecture , Edition'),
(3, 'Lecture');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `datecrea` date NOT NULL,
  `heurecrea` time NOT NULL,
  `iduser` int(99) NOT NULL,
  `lu` tinyint(4) NOT NULL DEFAULT '0',
  `info` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `titre`, `message`, `datecrea`, `heurecrea`, `iduser`, `lu`, `info`) VALUES
(1, 'Gedmmpe AMDIN', 'Bienvenue sur votre espace administrateur Gedmmpe !', '2022-08-15', '19:45:36', 1, 1, NULL),
(2, 'Photo de profil modifiée', 'Vous avez modifié votre photo de profil.', '2022-08-15', '20:50:24', 1, 1, NULL),
(3, 'Informations mises à jour', 'Vous avez modifié les informations de votre compte Gedmmpe Admin', '2022-08-15', '20:50:39', 1, 1, NULL),
(4, 'Mot de passe modifié', 'Vous avez modifié votre mot de passe.', '2022-08-15', '20:50:54', 1, 1, NULL),
(5, 'Mot de passe modifié', 'Vous avez modifié votre mot de passe.', '2022-08-15', '20:51:07', 1, 1, NULL),
(6, 'Photo de profil modifiée', 'Vous avez modifié votre photo de profil.', '2022-08-15', '20:52:19', 1, 1, NULL),
(7, 'Photo de profil modifiée', 'Vous avez modifié votre photo de profil.', '2022-08-16', '15:19:11', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `admin_profil`
--

DROP TABLE IF EXISTS `admin_profil`;
CREATE TABLE IF NOT EXISTS `admin_profil` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin_profil`
--

INSERT INTO `admin_profil` (`id`, `libelle`) VALUES
(1, 'Super Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(99) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '1',
  `profil` tinyint(1) NOT NULL,
  `acces` tinyint(1) NOT NULL,
  `datecrea` date DEFAULT NULL,
  `photo` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `actif`, `profil`, `acces`, `datecrea`, `photo`) VALUES
(1, 'AMADOU GEOFFROY FRANKIE', 'amadougeoffroy@gmail.com', '123456', 1, 1, 2, NULL, 'OfF0k5BBkvSfTmNYCgrMlgq6WxMKleO5NdaUvYxC.webp'),
(6, 'SOGEMAD', 'yves.tano@transtelecom.ci', 'L|~@?R', 1, 1, 1, '2022-08-01', 'default_avatar.webp'),
(8, 'LETY', 'eklarideci@gmail.com', '&64e&8', 1, 1, 1, '2022-08-15', 'default_avatar.webp');

-- --------------------------------------------------------

--
-- Structure de la table `app_choix_raisons`
--

DROP TABLE IF EXISTS `app_choix_raisons`;
CREATE TABLE IF NOT EXISTS `app_choix_raisons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` varchar(20) NOT NULL,
  `raison` tinyint(2) NOT NULL COMMENT 'table raison_inscription',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `app_pyramide`
--

DROP TABLE IF EXISTS `app_pyramide`;
CREATE TABLE IF NOT EXISTS `app_pyramide` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `iduser` varchar(20) NOT NULL,
  `accepte` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-enattend,1-accepté',
  `date_accepte` date NOT NULL,
  `liaison` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `app_pyramide`
--

INSERT INTO `app_pyramide` (`id`, `iduser`, `accepte`, `date_accepte`, `liaison`) VALUES
(1, 'XXXXXX0111', 0, '2022-08-16', 'XCODE'),
(2, 'ISYBNIPPJ4', 0, '2022-08-16', 'XCODE-XXODE'),
(3, 'XXXXXX0112', 0, '2022-08-16', 'XCODE-XXXOD'),
(4, 'ISYDFFPPJ4', 0, '2022-08-16', 'XCODE-XXXOD-CODXX');

-- --------------------------------------------------------

--
-- Structure de la table `app_raisons_inscription`
--

DROP TABLE IF EXISTS `app_raisons_inscription`;
CREATE TABLE IF NOT EXISTS `app_raisons_inscription` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `app_raisons_inscription`
--

INSERT INTO `app_raisons_inscription` (`id`, `libelle`) VALUES
(1, 'Améliorer ma condition sociale'),
(2, 'Investir dans un business'),
(3, 'Aider des proches'),
(4, 'Autres raisons');

-- --------------------------------------------------------

--
-- Structure de la table `app_tarifs`
--

DROP TABLE IF EXISTS `app_tarifs`;
CREATE TABLE IF NOT EXISTS `app_tarifs` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `app_tarifs`
--

INSERT INTO `app_tarifs` (`id`, `libelle`, `montant`) VALUES
(1, 'Inscription à Gedmmpe', 22000),
(2, 'Déblocage', 20000),
(3, 'Bloqué pour réinscription automatique', 20000),
(4, 'RoyPrime', 18000);

-- --------------------------------------------------------

--
-- Structure de la table `app_users`
--

DROP TABLE IF EXISTS `app_users`;
CREATE TABLE IF NOT EXISTS `app_users` (
  `iduser` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenoms` varchar(150) NOT NULL,
  `nationalite` varchar(60) NOT NULL,
  `pays_residence` varchar(60) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `prefixe` int(6) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `datecrea` date DEFAULT NULL,
  `heurecrea` time DEFAULT NULL,
  `paye` tinyint(1) DEFAULT NULL COMMENT '1-si l''inscription a été payé',
  `actif` tinyint(1) NOT NULL DEFAULT '2' COMMENT '2-en attente, 1-actif ,0-inactif',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-encourse, 2-bloqué, 3-terminé',
  `code_parrainage` varchar(5) NOT NULL,
  `code_parrain` varchar(5) DEFAULT NULL,
  `rang` bigint(10) NOT NULL,
  `niveau` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'table niveau',
  `nbre_filleul` int(1) DEFAULT NULL,
  `gain_total` int(9) NOT NULL,
  `gain_disponible` int(9) NOT NULL,
  `gain_retire` int(9) NOT NULL,
  `photo` text,
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `app_users`
--

INSERT INTO `app_users` (`iduser`, `email`, `password`, `nom`, `prenoms`, `nationalite`, `pays_residence`, `ville`, `prefixe`, `numero`, `contact`, `datecrea`, `heurecrea`, `paye`, `actif`, `status`, `code_parrainage`, `code_parrain`, `rang`, `niveau`, `nbre_filleul`, `gain_total`, `gain_disponible`, `gain_retire`, `photo`) VALUES
('XXXXXX0111', 'amadougeoffroy@gmail.com', '123456', 'AMADOU', 'GEOFFROY', 'Ivoirienne', 'Côte d\'Ivoire', 'Abidjan', 225, '0757820485', '2250757820485', '2022-07-26', '11:10:55', NULL, 2, 1, 'XCODE', NULL, 1, 2, NULL, 0, 0, 0, 'default_avatar.webp'),
('XXXXXX0112', 'didieng@gmail.com', '123456', 'DIENG', 'NAE', 'Ivoirienne', '', '', 0, '', '', '2022-07-06', '12:13:02', NULL, 2, 1, 'XXXOD', 'XCODE', 0, 1, NULL, 0, 0, 0, 'default_avatar.webp'),
('ISYBNIPPJ4', 'serydieng@gmail.com', '123456', 'KONATE', 'OLIVIER', 'Ivoirienne', '', '', 0, '', '', '2022-07-01', '12:15:07', NULL, 2, 1, 'XXODE', 'XCODE', 0, 1, NULL, 0, 0, 0, 'default_avatar.webp'),
('ISYDFFPPJ4', 'seryedieng@gmail.com', '123456', 'DIANE', 'OLIVIER', 'Ivoirienne', '', '', 0, '', '', '2022-07-01', '12:15:07', NULL, 2, 1, 'CODXX', 'XXXOD', 0, 1, NULL, 0, 0, 0, 'default_avatar.webp');

-- --------------------------------------------------------

--
-- Structure de la table `app_users_niveau`
--

DROP TABLE IF EXISTS `app_users_niveau`;
CREATE TABLE IF NOT EXISTS `app_users_niveau` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `prime` int(9) NOT NULL,
  `couleur` varchar(10) NOT NULL,
  `icone` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `app_users_niveau`
--

INSERT INTO `app_users_niveau` (`id`, `libelle`, `prime`, `couleur`, `icone`) VALUES
(1, 'Sujet', 0, '#d0065e', ''),
(2, 'Soldat', 0, '#edd778', ''),
(3, 'Valet secondaire', 10000, '#ad8845', ''),
(4, 'Valet principal', 20000, '', ''),
(5, 'Prince secondaire', 20000, '#6b06d0', ''),
(6, 'Prince principal', 20000, '', ''),
(7, 'Roi secondaire', 55000, '', ''),
(8, 'Roi principal', 55000, '', ''),
(9, 'As secondaire', 160000, '', ''),
(10, 'As principal', 160000, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `app_users_transactions`
--

DROP TABLE IF EXISTS `app_users_transactions`;
CREATE TABLE IF NOT EXISTS `app_users_transactions` (
  `id` int(99) NOT NULL AUTO_INCREMENT,
  `codepaiement` varchar(100) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1-paiement, 2-retrait',
  `montant` int(9) NOT NULL,
  `iduser` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'table statuspaiement',
  `modepaiement` tinyint(2) NOT NULL COMMENT 'table modepaiement',
  `coderetour` tinyint(3) DEFAULT NULL,
  `cleretour` text,
  `moyenPaiement` varchar(100) DEFAULT NULL,
  `numTel` varchar(20) DEFAULT NULL,
  `referencePaiement` text,
  `payment_token` text,
  `payment_url` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `modepaiement`
--

DROP TABLE IF EXISTS `modepaiement`;
CREATE TABLE IF NOT EXISTS `modepaiement` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  `logo` text NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modepaiement`
--

INSERT INTO `modepaiement` (`id`, `libelle`, `logo`, `actif`) VALUES
(1, 'Trésor Money', 'tresor.jpeg', 0),
(2, 'Mobile Money', 'mobilemoney.png', 0),
(3, 'Virement Bancaire', 'virement.png', 1),
(4, 'Wave', 'wave.png', 0);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL,
  `fr` varchar(255) NOT NULL,
  `en` varchar(255) DEFAULT NULL,
  `indicatif` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `code`, `fr`, `en`, `indicatif`) VALUES
(1, 'AF', 'Afghanistan', 'Afghanistan', NULL),
(2, 'ZA', 'Afrique du Sud', 'South Africa', NULL),
(3, 'AL', 'Albanie', 'Albania', NULL),
(4, 'DZ', 'Algérie', 'Algeria', NULL),
(5, 'DE', 'Allemagne', 'Germany', NULL),
(6, 'AD', 'Andorre', 'Andorra', NULL),
(7, 'AO', 'Angola', 'Angola', NULL),
(8, 'AI', 'Anguilla', 'Anguilla', NULL),
(9, 'AQ', 'Antarctique', 'Antarctica', NULL),
(10, 'AG', 'Antigua-et-Barbuda', 'Antigua & Barbuda', NULL),
(11, 'AN', 'Antilles néerlandaises', 'Netherlands Antilles', NULL),
(12, 'SA', 'Arabie saoudite', 'Saudi Arabia', NULL),
(13, 'AR', 'Argentine', 'Argentina', NULL),
(14, 'AM', 'Arménie', 'Armenia', NULL),
(15, 'AW', 'Aruba', 'Aruba', NULL),
(16, 'AU', 'Australie', 'Australia', NULL),
(17, 'AT', 'Autriche', 'Austria', NULL),
(18, 'AZ', 'Azerbaïdjan', 'Azerbaijan', NULL),
(19, 'BJ', 'Bénin', 'Benin', NULL),
(20, 'BS', 'Bahamas', 'Bahamas, The', NULL),
(21, 'BH', 'Bahreïn', 'Bahrain', NULL),
(22, 'BD', 'Bangladesh', 'Bangladesh', NULL),
(23, 'BB', 'Barbade', 'Barbados', NULL),
(24, 'PW', 'Belau', 'Palau', NULL),
(25, 'BE', 'Belgique', 'Belgium', NULL),
(26, 'BZ', 'Belize', 'Belize', NULL),
(27, 'BM', 'Bermudes', 'Bermuda', NULL),
(28, 'BT', 'Bhoutan', 'Bhutan', NULL),
(29, 'BY', 'Biélorussie', 'Belarus', NULL),
(30, 'MM', 'Birmanie', 'Myanmar (ex-Burma)', NULL),
(31, 'BO', 'Bolivie', 'Bolivia', NULL),
(32, 'BA', 'Bosnie-Herzégovine', 'Bosnia and Herzegovina', NULL),
(33, 'BW', 'Botswana', 'Botswana', NULL),
(34, 'BR', 'Brésil', 'Brazil', NULL),
(35, 'BN', 'Brunei', 'Brunei Darussalam', NULL),
(36, 'BG', 'Bulgarie', 'Bulgaria', NULL),
(37, 'BF', 'Burkina Faso', 'Burkina Faso', NULL),
(38, 'BI', 'Burundi', 'Burundi', NULL),
(39, 'CI', 'Côte d\'Ivoire', 'Ivory Coast (see Cote d\'Ivoire)', 225),
(40, 'KH', 'Cambodge', 'Cambodia', NULL),
(41, 'CM', 'Cameroun', 'Cameroon', NULL),
(42, 'CA', 'Canada', 'Canada', NULL),
(43, 'CV', 'Cap-Vert', 'Cape Verde', NULL),
(44, 'CL', 'Chili', 'Chile', NULL),
(45, 'CN', 'Chine', 'China', NULL),
(46, 'CY', 'Chypre', 'Cyprus', NULL),
(47, 'CO', 'Colombie', 'Colombia', NULL),
(48, 'KM', 'Comores', 'Comoros', NULL),
(49, 'CG', 'Congo', 'Congo', NULL),
(50, 'KP', 'Corée du Nord', 'Korea, Demo. People\'s Rep. of', NULL),
(51, 'KR', 'Corée du Sud', 'Korea, (South) Republic of', NULL),
(52, 'CR', 'Costa Rica', 'Costa Rica', NULL),
(53, 'HR', 'Croatie', 'Croatia', NULL),
(54, 'CU', 'Cuba', 'Cuba', NULL),
(55, 'DK', 'Danemark', 'Denmark', NULL),
(56, 'DJ', 'Djibouti', 'Djibouti', NULL),
(57, 'DM', 'Dominique', 'Dominica', NULL),
(58, 'EG', 'Égypte', 'Egypt', NULL),
(59, 'AE', 'Émirats arabes unis', 'United Arab Emirates', NULL),
(60, 'EC', 'Équateur', 'Ecuador', NULL),
(61, 'ER', 'Érythrée', 'Eritrea', NULL),
(62, 'ES', 'Espagne', 'Spain', NULL),
(63, 'EE', 'Estonie', 'Estonia', NULL),
(64, 'US', 'États-Unis', 'United States', NULL),
(65, 'ET', 'Éthiopie', 'Ethiopia', NULL),
(66, 'FI', 'Finlande', 'Finland', NULL),
(67, 'FR', 'France', 'France', NULL),
(68, 'GE', 'Géorgie', 'Georgia', NULL),
(69, 'GA', 'Gabon', 'Gabon', NULL),
(70, 'GM', 'Gambie', 'Gambia, the', NULL),
(71, 'GH', 'Ghana', 'Ghana', NULL),
(72, 'GI', 'Gibraltar', 'Gibraltar', NULL),
(73, 'GR', 'Grèce', 'Greece', NULL),
(74, 'GD', 'Grenade', 'Grenada', NULL),
(75, 'GL', 'Groenland', 'Greenland', NULL),
(76, 'GP', 'Guadeloupe', 'Guinea, Equatorial', NULL),
(77, 'GU', 'Guam', 'Guam', NULL),
(78, 'GT', 'Guatemala', 'Guatemala', NULL),
(79, 'GN', 'Guinée', 'Guinea', NULL),
(80, 'GQ', 'Guinée équatoriale', 'Equatorial Guinea', NULL),
(81, 'GW', 'Guinée-Bissao', 'Guinea-Bissau', NULL),
(82, 'GY', 'Guyana', 'Guyana', NULL),
(83, 'GF', 'Guyane française', 'Guiana, French', NULL),
(84, 'HT', 'Haïti', 'Haiti', NULL),
(85, 'HN', 'Honduras', 'Honduras', NULL),
(86, 'HK', 'Hong Kong', 'Hong Kong, (China)', NULL),
(87, 'HU', 'Hongrie', 'Hungary', NULL),
(88, 'BV', 'Ile Bouvet', 'Bouvet Island', NULL),
(89, 'CX', 'Ile Christmas', 'Christmas Island', NULL),
(90, 'NF', 'Ile Norfolk', 'Norfolk Island', NULL),
(91, 'KY', 'Iles Cayman', 'Cayman Islands', NULL),
(92, 'CK', 'Iles Cook', 'Cook Islands', NULL),
(93, 'FO', 'Iles Féroé', 'Faroe Islands', NULL),
(94, 'FK', 'Iles Falkland', 'Falkland Islands (Malvinas)', NULL),
(95, 'FJ', 'Iles Fidji', 'Fiji', NULL),
(96, 'GS', 'Iles Géorgie du Sud et Sandwich du Sud', 'S. Georgia and S. Sandwich Is.', NULL),
(97, 'HM', 'Iles Heard et McDonald', 'Heard and McDonald Islands', NULL),
(98, 'MH', 'Iles Marshall', 'Marshall Islands', NULL),
(99, 'PN', 'Iles Pitcairn', 'Pitcairn Island', NULL),
(100, 'SB', 'Iles Salomon', 'Solomon Islands', NULL),
(101, 'SJ', 'Iles Svalbard et Jan Mayen', 'Svalbard and Jan Mayen Islands', NULL),
(102, 'TC', 'Iles Turks-et-Caicos', 'Turks and Caicos Islands', NULL),
(103, 'VI', 'Iles Vierges américaines', 'Virgin Islands, U.S.', NULL),
(104, 'VG', 'Iles Vierges britanniques', 'Virgin Islands, British', NULL),
(105, 'CC', 'Iles des Cocos (Keeling)', 'Cocos (Keeling) Islands', NULL),
(106, 'UM', 'Iles mineures éloignées des États-Unis', 'US Minor Outlying Islands', NULL),
(107, 'IN', 'Inde', 'India', NULL),
(108, 'ID', 'Indonésie', 'Indonesia', NULL),
(109, 'IR', 'Iran', 'Iran, Islamic Republic of', NULL),
(110, 'IQ', 'Iraq', 'Iraq', NULL),
(111, 'IE', 'Irlande', 'Ireland', NULL),
(112, 'IS', 'Islande', 'Iceland', NULL),
(113, 'IL', 'Israël', 'Israel', NULL),
(114, 'IT', 'Italie', 'Italy', NULL),
(115, 'JM', 'Jamaïque', 'Jamaica', NULL),
(116, 'JP', 'Japon', 'Japan', NULL),
(117, 'JO', 'Jordanie', 'Jordan', NULL),
(118, 'KZ', 'Kazakhstan', 'Kazakhstan', NULL),
(119, 'KE', 'Kenya', 'Kenya', NULL),
(120, 'KG', 'Kirghizistan', 'Kyrgyzstan', NULL),
(121, 'KI', 'Kiribati', 'Kiribati', NULL),
(122, 'KW', 'Koweït', 'Kuwait', NULL),
(123, 'LA', 'Laos', 'Lao People\'s Democratic Republic', NULL),
(124, 'LS', 'Lesotho', 'Lesotho', NULL),
(125, 'LV', 'Lettonie', 'Latvia', NULL),
(126, 'LB', 'Liban', 'Lebanon', NULL),
(127, 'LR', 'Liberia', 'Liberia', NULL),
(128, 'LY', 'Libye', 'Libyan Arab Jamahiriya', NULL),
(129, 'LI', 'Liechtenstein', 'Liechtenstein', NULL),
(130, 'LT', 'Lituanie', 'Lithuania', NULL),
(131, 'LU', 'Luxembourg', 'Luxembourg', NULL),
(132, 'MO', 'Macao', 'Macao, (China)', NULL),
(133, 'MG', 'Madagascar', 'Madagascar', NULL),
(134, 'MY', 'Malaisie', 'Malaysia', NULL),
(135, 'MW', 'Malawi', 'Malawi', NULL),
(136, 'MV', 'Maldives', 'Maldives', NULL),
(137, 'ML', 'Mali', 'Mali', NULL),
(138, 'MT', 'Malte', 'Malta', NULL),
(139, 'MP', 'Mariannes du Nord', 'Northern Mariana Islands', NULL),
(140, 'MA', 'Maroc', 'Morocco', NULL),
(141, 'MQ', 'Martinique', 'Martinique', NULL),
(142, 'MU', 'Maurice', 'Mauritius', NULL),
(143, 'MR', 'Mauritanie', 'Mauritania', NULL),
(144, 'YT', 'Mayotte', 'Mayotte', NULL),
(145, 'MX', 'Mexique', 'Mexico', NULL),
(146, 'FM', 'Micronésie', 'Micronesia, Federated States of', NULL),
(147, 'MD', 'Moldavie', 'Moldova, Republic of', NULL),
(148, 'MC', 'Monaco', 'Monaco', NULL),
(149, 'MN', 'Mongolie', 'Mongolia', NULL),
(150, 'MS', 'Montserrat', 'Montserrat', NULL),
(151, 'MZ', 'Mozambique', 'Mozambique', NULL),
(152, 'NP', 'Népal', 'Nepal', NULL),
(153, 'NA', 'Namibie', 'Namibia', NULL),
(154, 'NR', 'Nauru', 'Nauru', NULL),
(155, 'NI', 'Nicaragua', 'Nicaragua', NULL),
(156, 'NE', 'Niger', 'Niger', NULL),
(157, 'NG', 'Nigeria', 'Nigeria', NULL),
(158, 'NU', 'Nioué', 'Niue', NULL),
(159, 'NO', 'Norvège', 'Norway', NULL),
(160, 'NC', 'Nouvelle-Calédonie', 'New Caledonia', NULL),
(161, 'NZ', 'Nouvelle-Zélande', 'New Zealand', NULL),
(162, 'OM', 'Oman', 'Oman', NULL),
(163, 'UG', 'Ouganda', 'Uganda', NULL),
(164, 'UZ', 'Ouzbékistan', 'Uzbekistan', NULL),
(165, 'PE', 'Pérou', 'Peru', NULL),
(166, 'PK', 'Pakistan', 'Pakistan', NULL),
(167, 'PA', 'Panama', 'Panama', NULL),
(168, 'PG', 'Papouasie-Nouvelle-Guinée', 'Papua New Guinea', NULL),
(169, 'PY', 'Paraguay', 'Paraguay', NULL),
(170, 'NL', 'Pays-Bas', 'Netherlands', NULL),
(171, 'PH', 'Philippines', 'Philippines', NULL),
(172, 'PL', 'Pologne', 'Poland', NULL),
(173, 'PF', 'Polynésie française', 'French Polynesia', NULL),
(174, 'PR', 'Porto Rico', 'Puerto Rico', NULL),
(175, 'PT', 'Portugal', 'Portugal', NULL),
(176, 'QA', 'Qatar', 'Qatar', NULL),
(177, 'CF', 'République centrafricaine', 'Central African Republic', NULL),
(178, 'CD', 'République démocratique du Congo', 'Congo, Democratic Rep. of the', NULL),
(179, 'DO', 'République dominicaine', 'Dominican Republic', NULL),
(180, 'CZ', 'République tchèque', 'Czech Republic', NULL),
(181, 'RE', 'Réunion', 'Reunion', NULL),
(182, 'RO', 'Roumanie', 'Romania', NULL),
(183, 'GB', 'Royaume-Uni', 'Saint Pierre and Miquelon', NULL),
(184, 'RU', 'Russie', 'Russia (Russian Federation)', NULL),
(185, 'RW', 'Rwanda', 'Rwanda', NULL),
(186, 'SN', 'Sénégal', 'Senegal', NULL),
(187, 'EH', 'Sahara occidental', 'Western Sahara', NULL),
(188, 'KN', 'Saint-Christophe-et-Niévès', 'Saint Kitts and Nevis', NULL),
(189, 'SM', 'Saint-Marin', 'San Marino', NULL),
(190, 'PM', 'Saint-Pierre-et-Miquelon', 'Saint Pierre and Miquelon', NULL),
(191, 'VA', 'Saint-Siège ', 'Vatican City State (Holy See)', NULL),
(192, 'VC', 'Saint-Vincent-et-les-Grenadines', 'Saint Vincent and the Grenadines', NULL),
(193, 'SH', 'Sainte-Hélène', 'Saint Helena', NULL),
(194, 'LC', 'Sainte-Lucie', 'Saint Lucia', NULL),
(195, 'SV', 'Salvador', 'El Salvador', NULL),
(196, 'WS', 'Samoa', 'Samoa', NULL),
(197, 'AS', 'Samoa américaines', 'American Samoa', NULL),
(198, 'ST', 'Sao Tomé-et-Principe', 'Sao Tome and Principe', NULL),
(199, 'SC', 'Seychelles', 'Seychelles', NULL),
(200, 'SL', 'Sierra Leone', 'Sierra Leone', NULL),
(201, 'SG', 'Singapour', 'Singapore', NULL),
(202, 'SI', 'Slovénie', 'Slovenia', NULL),
(203, 'SK', 'Slovaquie', 'Slovakia', NULL),
(204, 'SO', 'Somalie', 'Somalia', NULL),
(205, 'SD', 'Soudan', 'Sudan', NULL),
(206, 'LK', 'Sri Lanka', 'Sri Lanka (ex-Ceilan)', NULL),
(207, 'SE', 'Suède', 'Sweden', NULL),
(208, 'CH', 'Suisse', 'Switzerland', NULL),
(209, 'SR', 'Suriname', 'Suriname', NULL),
(210, 'SZ', 'Swaziland', 'Swaziland', NULL),
(211, 'SY', 'Syrie', 'Syrian Arab Republic', NULL),
(212, 'TW', 'Taïwan', 'Taiwan', NULL),
(213, 'TJ', 'Tadjikistan', 'Tajikistan', NULL),
(214, 'TZ', 'Tanzanie', 'Tanzania, United Republic of', NULL),
(215, 'TD', 'Tchad', 'Chad', NULL),
(216, 'TF', 'Terres australes françaises', 'French Southern Territories - TF', NULL),
(217, 'IO', 'Territoire britannique de l\'Océan Indien', 'British Indian Ocean Territory', NULL),
(218, 'TH', 'Thaïlande', 'Thailand', NULL),
(219, 'TL', 'Timor Oriental', 'Timor-Leste (East Timor)', NULL),
(220, 'TG', 'Togo', 'Togo', NULL),
(221, 'TK', 'Tokélaou', 'Tokelau', NULL),
(222, 'TO', 'Tonga', 'Tonga', NULL),
(223, 'TT', 'Trinité-et-Tobago', 'Trinidad & Tobago', NULL),
(224, 'TN', 'Tunisie', 'Tunisia', NULL),
(225, 'TM', 'Turkménistan', 'Turkmenistan', NULL),
(226, 'TR', 'Turquie', 'Turkey', NULL),
(227, 'TV', 'Tuvalu', 'Tuvalu', NULL),
(228, 'UA', 'Ukraine', 'Ukraine', NULL),
(229, 'UY', 'Uruguay', 'Uruguay', NULL),
(230, 'VU', 'Vanuatu', 'Vanuatu', NULL),
(231, 'VE', 'Venezuela', 'Venezuela', NULL),
(232, 'VN', 'Viêt Nam', 'Viet Nam', NULL),
(233, 'WF', 'Wallis-et-Futuna', 'Wallis and Futuna', NULL),
(234, 'YE', 'Yémen', 'Yemen', NULL),
(235, 'YU', 'Yougoslavie', 'Saint Pierre and Miquelon', NULL),
(236, 'ZM', 'Zambie', 'Zambia', NULL),
(237, 'ZW', 'Zimbabwe', 'Zimbabwe', NULL),
(238, 'MK', 'ex-République yougoslave de Macédoine', 'Macedonia, TFYR', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `statuspaiement`
--

DROP TABLE IF EXISTS `statuspaiement`;
CREATE TABLE IF NOT EXISTS `statuspaiement` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statuspaiement`
--

INSERT INTO `statuspaiement` (`id`, `libelle`) VALUES
(1, 'En attente'),
(2, 'Echoué'),
(3, 'Annulé'),
(4, 'Effectué');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
