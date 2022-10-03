-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 06 sep. 2022 à 22:31
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pictucloudbykj`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` text NOT NULL,
  `tel` text NOT NULL,
  `whatsapp` text NOT NULL,
  `adresse` text NOT NULL,
  `profession` text NOT NULL,
  `date_naissance` text NOT NULL,
  `nationalite` text NOT NULL,
  `type` text NOT NULL,
  `profil` text,
  `ref` text NOT NULL,
  `key_contact` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `tel`, `whatsapp`, `adresse`, `profession`, `date_naissance`, `nationalite`, `type`, `profil`, `ref`, `key_contact`) VALUES
(54, 'olivier', 'doe', 'john@doe.com', '065922338', '065922099', 'usa', 'homme d\'affaire', '2022-09-08', 'americain', 'game', 'd00e4483520161f7f0dd5c8e315f186dScreenshot 2022-06-11 190556.png', '32408097d00e4483520161f7f0dd5c8e315f186dkey_contacte3bd528644a30534d1e39ab723eafe37430854723788', 'key_contacte3bd528644a30534d1e39ab723eafe37'),
(53, 'maurice', 'doe', 'john@doe.com', '065922338', '065922099', 'usa', 'homme d\'affaire', '2022-09-08', 'americain', 'game', 'd00e4483520161f7f0dd5c8e315f186dScreenshot 2022-06-11 190638.png', '32408097d00e4483520161f7f0dd5c8e315f186dkey_contacta4e42ed3d136e20bc7e695ad99429ddc976013004348', 'key_contacta4e42ed3d136e20bc7e695ad99429ddc'),
(52, 'jackie le', 'doe', 'john@doe.com', '065922338', '065922099', 'usa', 'homme d\'affaire', '2022-09-08', 'americain', 'game', 'd00e4483520161f7f0dd5c8e315f186dScreenshot 2022-06-11 190709.png', '32408097d00e4483520161f7f0dd5c8e315f186dkey_contact8356d03be4ecbe37494ec091336c08ed8003073855626', 'key_contact8356d03be4ecbe37494ec091336c08ed'),
(51, 'emergence', 'doe', 'john@doe.com', '065922338', '065922099', 'usa', 'homme d\'affaire', '2022-09-08', 'americain', 'game', 'd00e4483520161f7f0dd5c8e315f186dScreenshot 2022-06-11 192008.png', '32408097d00e4483520161f7f0dd5c8e315f186dkey_contact5f56c76da9d2efcd2456d8eb7e2529425204429651444', 'key_contact5f56c76da9d2efcd2456d8eb7e252942'),
(50, 'Afghanistan ', 'krilin', 'john@doe.com', '065922338', '065922099', 'usa', 'homme d\'affaire', '2022-09-08', 'americain', 'game', 'd00e4483520161f7f0dd5c8e315f186ddownload (3).png', '32408097d00e4483520161f7f0dd5c8e315f186dkey_contact6320a046ff89f00522aee1e5c8dfca4d693075706032', 'key_contact6320a046ff89f00522aee1e5c8dfca4d'),
(49, 'bernard la mote', 'doe', 'john@doe.com', '065922338', '065922099', 'usa', 'homme d\'affaire', '2022-09-08', 'americain', 'game', 'd00e4483520161f7f0dd5c8e315f186dScreenshot 2022-06-11 192329.png', '32408097d00e4483520161f7f0dd5c8e315f186dkey_contactb7d91b547ab21d0db1380dae6f70e83c7589468398115', 'key_contactb7d91b547ab21d0db1380dae6f70e83c'),
(48, 'corossole', 'doe', 'john@doe.com', '065922338', '065922099', 'usa', 'homme d\'affaire', '2022-09-08', 'americain', 'game', 'd00e4483520161f7f0dd5c8e315f186dScreenshot 2022-06-11 192345.png', '32408097d00e4483520161f7f0dd5c8e315f186dkey_contact044b852cdeb0a104e201ecd1f4b156288980454780751', 'key_contact044b852cdeb0a104e201ecd1f4b15628'),
(46, 'farraday', 'doe', 'john@doe.com', '065922338', '065922099', 'usa', 'homme d\'affaire', '2022-09-08', 'americain', 'game', 'd00e4483520161f7f0dd5c8e315f186d2.jpg', '32408097d00e4483520161f7f0dd5c8e315f186dkey_contact7cca60fd62ceb698a51c7ab69a5cf9283216448552444', 'key_contact7cca60fd62ceb698a51c7ab69a5cf928'),
(45, 'gervis', 'doe', 'john@doe.com', '065922338', '065922099', 'usa', 'homme d\'affaire', '2022-09-08', 'americain', 'game', 'd00e4483520161f7f0dd5c8e315f186dl.jpg', '32408097d00e4483520161f7f0dd5c8e315f186dkey_contact3d6ef34f0706ff32d3bb693663f1828c6430620875075', 'key_contact3d6ef34f0706ff32d3bb693663f1828c'),
(41, 'client', ' ', '', '064390000', '', 'ville  restaurant le tawi', '4 ou 5 tuniques', '', 'M', 'client', 'd909cee9b72e2ecf39107d5bcd4266b9WhatsApp Image 2022-06-12 at 23.06.41.jpg', '32408097d909cee9b72e2ecf39107d5bcd4266b9key_contact34bc7bad36b4aac5829ff239a88235cb1488857158505', 'key_contact34bc7bad36b4aac5829ff239a88235cb'),
(42, 'helrey nakamura', 'doe', 'john@doe.com', '065922338', '065922099', 'usa', 'homme d\'affaire', '2022-09-08', 'americain', 'game', 'd00e4483520161f7f0dd5c8e315f186dl2.jpg', '32408097d00e4483520161f7f0dd5c8e315f186dkey_contactccf03a552b5b245bf345863b30c2bbb132454753551', 'key_contactccf03a552b5b245bf345863b30c2bbb1'),
(40, 'mr gesse', '', '', '055574446', '055574446', 'rafinerie 3eme camps', 'blanc orange bleu', '', 'M', 'client', 'd909cee9b72e2ecf39107d5bcd4266b92.jpg', '32408097d909cee9b72e2ecf39107d5bcd4266b9key_contact1b9d6725090e462cf61d49b344e191b0717558282076', 'key_contact1b9d6725090e462cf61d49b344e191b0'),
(43, 'kiomora', 'doe', 'john@doe.com', '065922338', '065922099', 'usa', 'homme d\'affaire', '2022-09-08', 'americain', 'game', 'd00e4483520161f7f0dd5c8e315f186dWhatsApp Image 2022-05-15 at 22.16.34.jpeg', '32408097d00e4483520161f7f0dd5c8e315f186dkey_contacte4124a5c80161edec1cbaa55cff657388557651123180', 'key_contacte4124a5c80161edec1cbaa55cff65738'),
(44, 'leonardo', 'doe', 'john@doe.com', '065922338', '065922099', 'usa', 'homme d\'affaire', '2022-09-08', 'americain', 'game', 'd00e4483520161f7f0dd5c8e315f186dl4.jpg', '32408097d00e4483520161f7f0dd5c8e315f186dkey_contact90b53d0f1e92c293c98ef24568ebdf7c2022653126337', 'key_contact90b53d0f1e92c293c98ef24568ebdf7c');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=231 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `photo`) VALUES
(228, 'd00e4483520161f7f0dd5c8e315f186dasmt18.jpg'),
(226, 'd00e4483520161f7f0dd5c8e315f186dasmt13.jpg'),
(227, 'd00e4483520161f7f0dd5c8e315f186dasmt14.jpg'),
(224, 'd00e4483520161f7f0dd5c8e315f186ddownload (2).png'),
(225, 'd00e4483520161f7f0dd5c8e315f186ddownload.jpg'),
(223, 'd00e4483520161f7f0dd5c8e315f186dasmt12.jpg'),
(221, 'd00e4483520161f7f0dd5c8e315f186ddownload (1).jfif'),
(222, 'd00e4483520161f7f0dd5c8e315f186ddownload (1).png'),
(219, 'd00e4483520161f7f0dd5c8e315f186dasmt11.png'),
(220, 'd00e4483520161f7f0dd5c8e315f186dasmt24.jpg'),
(217, 'd00e4483520161f7f0dd5c8e315f186dasmt9.png'),
(218, 'd00e4483520161f7f0dd5c8e315f186dasmt10.jpg'),
(216, 'd00e4483520161f7f0dd5c8e315f186dasmt2.jpg'),
(215, 'd00e4483520161f7f0dd5c8e315f186dasmt1.jpg'),
(214, 'd00e4483520161f7f0dd5c8e315f186dasmt.jpg'),
(213, 'd00e4483520161f7f0dd5c8e315f186dAnnotation 2022-06-13 013814.png'),
(212, 'd00e4483520161f7f0dd5c8e315f186dAnnotation 2022-06-12 180430.png'),
(211, 'd00e4483520161f7f0dd5c8e315f186daaa.png'),
(210, 'd00e4483520161f7f0dd5c8e315f186daa3.png'),
(209, 'd00e4483520161f7f0dd5c8e315f186daa1.png'),
(208, 'd00e4483520161f7f0dd5c8e315f186ddownload (4).png'),
(207, 'd00e4483520161f7f0dd5c8e315f186d7.jpg'),
(206, 'd909cee9b72e2ecf39107d5bcd4266b92.jpg'),
(205, 'd00e4483520161f7f0dd5c8e315f186dfarming-automation-getty.jpg'),
(204, 'd00e4483520161f7f0dd5c8e315f186dGirne-American-University-GAU-campus-610x236.jpg'),
(203, 'd00e4483520161f7f0dd5c8e315f186dagriculteur-utilisant-drone-robot-pour-irrigation-champ-agricole_88138-787.png'),
(202, 'd00e4483520161f7f0dd5c8e315f186d53_foto_510_350_jpg_5_100.jpg'),
(116, '81aed594ddc4ac7f3663caf53faf833983620d0d0c24e4453d71ddf10973cf6a'),
(117, '81aed594ddc4ac7f3663caf53faf833961de8381a4967ff8542408569b30e137'),
(118, '81aed594ddc4ac7f3663caf53faf8339a7f5d0f22254adb6581e28764890e7f4'),
(119, '81aed594ddc4ac7f3663caf53faf8339f1d8ba88515da9231e07d72fbdf3b6f0'),
(120, '81aed594ddc4ac7f3663caf53faf83397482e591a4eeef1e1ee645da9ca259a4'),
(121, '81aed594ddc4ac7f3663caf53faf833900842d02c46fa4c18d97ab419f28d4b8'),
(122, '7ef640dee6afe6f2851097aaf79035598c7d29de4efcfd0220b261782329ffd8'),
(123, 'c5c7e871136448d871984d8cb44b624e1efeaa4686173e1764c822091b5f9c91'),
(124, 'c5c7e871136448d871984d8cb44b624e72f7918e8a7ea29fd2335e79fd4bbfaa'),
(125, 'c5c7e871136448d871984d8cb44b624ec8bd7e131b081d8f3aed336ddf40aa64'),
(126, 'c5c7e871136448d871984d8cb44b624edbaa6c6ea3c50da9e97f49b013a46e95'),
(127, 'c5c7e871136448d871984d8cb44b624e0485ce0597d960d1e789c385e3e14e7f'),
(128, 'c5c7e871136448d871984d8cb44b624e8b410ca64aa3584484bf1fd7f7ba4552'),
(129, 'c5c7e871136448d871984d8cb44b624e33133582796008ef6ba4a7744996f41f'),
(130, 'c5c7e871136448d871984d8cb44b624e823470becf5fa104b61fa77f27cc1028'),
(131, 'c5c7e871136448d871984d8cb44b624e5994ebfcfd19411434a9c1362d143007'),
(132, 'c5c7e871136448d871984d8cb44b624e776dc1a522c3da5de6a8423c93b27a68'),
(133, 'c5c7e871136448d871984d8cb44b624e6956aa3cc164992c981a124c5af3cba3'),
(134, 'c5c7e871136448d871984d8cb44b624e7dcc9ed34e5949377f38703647fe7a78'),
(135, 'c5c7e871136448d871984d8cb44b624e2504bee96c76477be110c9fd0051a9e2'),
(136, 'c5c7e871136448d871984d8cb44b624ea1a16eef2695ce4f59af55f4cac21304'),
(137, 'c5c7e871136448d871984d8cb44b624e1aa93a473450d91decc3b5ee912522e0'),
(138, 'c5c7e871136448d871984d8cb44b624e24900338c4cf86a42177bd6d31ace5ea'),
(139, 'c5c7e871136448d871984d8cb44b624ebbdf0aff5416b637ea9e4f5da5c5331e'),
(140, 'c5c7e871136448d871984d8cb44b624e7c780a9dfdeb02cc399febb984cab796'),
(141, 'c5c7e871136448d871984d8cb44b624e33086fa9a2fecc3f065af8b9af54129e'),
(142, 'c5c7e871136448d871984d8cb44b624eea692574e88324911853ad2510965514'),
(143, 'c5c7e871136448d871984d8cb44b624ee882c5dcf5798cabf82456d2e8ea8026'),
(144, 'c5c7e871136448d871984d8cb44b624efc947ad649b385cc7c81e33ba06f21d8'),
(145, 'c5c7e871136448d871984d8cb44b624e3e4f74e30b5988064436123ba9c3fdcc'),
(146, 'c5c7e871136448d871984d8cb44b624e020a0011edddc77ea4959c54795b3b96'),
(147, 'c5c7e871136448d871984d8cb44b624e8db463b8053cffebdb76cbfa291878e2'),
(148, 'c5c7e871136448d871984d8cb44b624e5d00bd5b176fc4d7528d312242f5f0b5'),
(149, 'c5c7e871136448d871984d8cb44b624e2b6df157f8856e45127c3ad511fadde9'),
(150, 'c5c7e871136448d871984d8cb44b624e691e896b137eeb7fa72c0bd1bfc15ee9'),
(151, 'c5c7e871136448d871984d8cb44b624e6fcc9ef602cdc445a7d9c92bdf0f78c7'),
(152, 'c5c7e871136448d871984d8cb44b624e12c46840e542fb4e34b0df604a5097ff'),
(153, 'c5c7e871136448d871984d8cb44b624e2fd771a0ca6389785308af8631e4a80f'),
(154, 'c5c7e871136448d871984d8cb44b624ea01ddb84766e10ace00119fd31da119f'),
(155, 'c5c7e871136448d871984d8cb44b624e5bab257eb0a2f12ca0ee51bf1e45b018'),
(156, 'c5c7e871136448d871984d8cb44b624ec8098e546c9fc95bace320dd78df3847'),
(157, 'c5c7e871136448d871984d8cb44b624e9575f2d9aa233473316cca87820be8de'),
(158, 'c5c7e871136448d871984d8cb44b624e44995be975ab11d2f364b81c4315690f'),
(159, 'c5c7e871136448d871984d8cb44b624eb983843f7e3ac6baca3ce9c06e356f6a'),
(160, 'c5c7e871136448d871984d8cb44b624e997767332be24d389b96156a0331f220'),
(161, 'c5c7e871136448d871984d8cb44b624e0332327a0fcd3f98e7029df46968e435'),
(162, 'c5c7e871136448d871984d8cb44b624e87743df649d0c464855faadcf9fec1a9'),
(163, 'c5c7e871136448d871984d8cb44b624e24b1d9a70d6f557377232ce368098f8e'),
(164, 'c5c7e871136448d871984d8cb44b624ed393111b00d2ff635b5178a3c5c84ba9'),
(165, 'c5c7e871136448d871984d8cb44b624ec876da0d69350bb2c0f3e084cd212241'),
(166, 'c5c7e871136448d871984d8cb44b624e7de543c3a28ea8eef779e4c291181de2'),
(167, 'b91f95b3f3ab35eab2e189917b3c352a1efeaa4686173e1764c822091b5f9c91'),
(168, 'b91f95b3f3ab35eab2e189917b3c352adbaa6c6ea3c50da9e97f49b013a46e95'),
(169, 'b91f95b3f3ab35eab2e189917b3c352a462e0e3960ff55d16e9093c75d3f81cd'),
(170, 'b91f95b3f3ab35eab2e189917b3c352aa9a34bbe47ba16eff4ed53d9e5dedb80'),
(171, 'b91f95b3f3ab35eab2e189917b3c352a16ee71c7d7f5e6f22fc99ef1fc6843eb'),
(172, 'b91f95b3f3ab35eab2e189917b3c352a232f5c5c452b7fad2525b5dff012b1bc'),
(173, 'b91f95b3f3ab35eab2e189917b3c352aa9fd4a9d69839fe49fa4ec5f99fc01e9'),
(174, 'b91f95b3f3ab35eab2e189917b3c352a5e3c77c102fa404f0da9be67ad89af2e'),
(175, 'b91f95b3f3ab35eab2e189917b3c352ad176eb13398cd77cd4a4ba89c2f695e3'),
(176, 'b91f95b3f3ab35eab2e189917b3c352a9aee97cb00dae911038283bcea1a04bb'),
(177, 'b91f95b3f3ab35eab2e189917b3c352a539fcb6bda89697db3e7b624088a56cc'),
(178, 'b91f95b3f3ab35eab2e189917b3c352a8c7d29de4efcfd0220b261782329ffd8'),
(179, 'b91f95b3f3ab35eab2e189917b3c352a79a31bf6dc7e20a78aad073c6af9737d'),
(180, 'b91f95b3f3ab35eab2e189917b3c352a2bda30f6fb93d9908efd4aa2b47e2fc1'),
(181, 'b91f95b3f3ab35eab2e189917b3c352a6b8baf9bd4c70188d0ff9824ae80f1f1'),
(182, 'b91f95b3f3ab35eab2e189917b3c352a90f019e72435900e7e0c734afd76f78f'),
(183, 'b91f95b3f3ab35eab2e189917b3c352ab5676bc702d857dedf56b6bf42d6631f'),
(184, 'b91f95b3f3ab35eab2e189917b3c352a2c7614eb0d032d7fb3b3ce2607ad30b5'),
(185, 'b91f95b3f3ab35eab2e189917b3c352ac23bc271cc0d364ca800109c4f469d6c'),
(186, 'b91f95b3f3ab35eab2e189917b3c352a15792d72bc1c1a18dc5cd569a40a63ec'),
(187, 'b91f95b3f3ab35eab2e189917b3c352aa211946e92aefe8d28e76f5964e539c5'),
(188, 'b91f95b3f3ab35eab2e189917b3c352acf37cc018f76d02812c2962f5430d81d'),
(189, '4738914ed3cda42379f9d75b920a41241-1024x671.jpg'),
(190, '4738914ed3cda42379f9d75b920a41247.jpg'),
(191, '4738914ed3cda42379f9d75b920a412431c29aa60610e67dec75e65e4ae583d2-1614114515.jpg'),
(192, '4738914ed3cda42379f9d75b920a412453_foto_510_350_jpg_5_100.jpg'),
(193, '4738914ed3cda42379f9d75b920a4124agriculteur-etable-s-occupant-vaches_1303-30855.png'),
(194, '4738914ed3cda42379f9d75b920a4124agriculteur-utilisant-drone-robot-pour-irrigation-champ-agricole_88138-787.png'),
(195, '4738914ed3cda42379f9d75b920a4124agritech.jpg'),
(196, '4738914ed3cda42379f9d75b920a4124depositphotos_167778562-stock-photo-concept-of-smart-agriculture-and.jpg'),
(197, '4738914ed3cda42379f9d75b920a4124depositphotos_173440554-stock-photo-agriculture-technology-concept-man-agronomist.jpg'),
(198, '4738914ed3cda42379f9d75b920a4124download (4).jfif'),
(199, '4738914ed3cda42379f9d75b920a4124farming-automation-getty.jpg'),
(200, '4738914ed3cda42379f9d75b920a4124girne-768x496.jpg'),
(201, '4738914ed3cda42379f9d75b920a4124Girne-American-University-GAU-campus-610x236.jpg'),
(229, 'd00e4483520161f7f0dd5c8e315f186ddownload (3).jfif'),
(230, 'd00e4483520161f7f0dd5c8e315f186dUntitled.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` text NOT NULL,
  `tel` text NOT NULL,
  `whatsapp` text NOT NULL,
  `adresse` text NOT NULL,
  `profession` text,
  `date_naissance` text,
  `nationalite` text,
  `type` text,
  `profil` text,
  `password` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `key_users` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `tel`, `whatsapp`, `adresse`, `profession`, `date_naissance`, `nationalite`, `type`, `profil`, `password`, `creation_date`, `key_users`) VALUES
(37, 'kionghat', 'guewol', 'johankiong@gmail.com', '065922338', '065922338', 'la base', NULL, NULL, NULL, NULL, 'd909cee9b72e2ecf39107d5bcd4266b9Annotation 2022-06-12 180430.png', 'jkg00be277c692d9f8af5bbfcfb8021870bb163206134', '2022-09-05 09:06:09', 'd909cee9b72e2ecf39107d5bcd4266b9'),
(36, 'kionghat', 'guewol', 'johankiong@gmail.com', '065922338', '065922338', 'la base', 'musicien', '2022-09-08', 'congolais', 'utilisateur', 'd00e4483520161f7f0dd5c8e315f186dWhatsApp Image 2022-03-17 at 11.53.33.jpeg', 'jkga5c9cf1d7bef9a4737d18389d1c11e59d306b87534', '2022-09-05 00:56:59', 'd00e4483520161f7f0dd5c8e315f186d');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
