-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 30 juin 2025 à 09:33
-- Version du serveur : 8.0.30
-- Version de PHP : 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reporting`
--

-- --------------------------------------------------------

--
-- Structure de la table `acquisition_cartes`
--

CREATE TABLE `acquisition_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` bigint UNSIGNED NOT NULL,
  `plafond_rechargement` bigint UNSIGNED NOT NULL,
  `plafond_retrait_journalier` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `acquisition_cartes`
--

INSERT INTO `acquisition_cartes` (`id`, `debut_periode`, `fin_periode`, `code_type`, `tarif`, `plafond_rechargement`, `plafond_retrait_journalier`, `created_at`, `updated_at`) VALUES
(5, '2023-01-01', '2023-06-30', 'FCARTE_1_T2', 20000, 2000000, 400000, '2025-06-03 20:23:28', '2025-06-03 20:23:28'),
(6, '2023-01-01', '2023-06-30', 'FCARTE_3_T2', 20000, 2000000, 400000, '2025-06-03 20:23:28', '2025-06-03 20:23:28'),
(7, '2025-06-01', '2025-06-30', 'FCARTE_1_T2', 500, 10000, 900, '2025-06-10 08:10:50', '2025-06-10 08:10:50'),
(8, '2025-06-01', '2025-06-30', 'FCARTE_1_T1', 600, 1200, 1000, '2025-06-10 08:10:50', '2025-06-10 08:10:50'),
(9, '2023-01-01', '2023-08-30', 'FCARTE_3_T2', 2000, 5000000, 200000, '2025-06-26 06:44:04', '2025-06-26 06:44:04'),
(10, '2023-01-01', '2023-08-30', 'FCARTE_2_T1', 4500, 5000000, 500000, '2025-06-26 06:44:04', '2025-06-26 06:44:04'),
(11, '2024-01-01', '2024-06-03', 'FCARTE_3_T2', 30400, 20000000000000, 200000, '2025-06-26 06:48:02', '2025-06-26 06:48:02');

-- --------------------------------------------------------

--
-- Structure de la table `annuaires_stras`
--

CREATE TABLE `annuaires_stras` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `nbsous_agents` int NOT NULL,
  `nbpoints_service` int NOT NULL,
  `nb_emission_intra` int NOT NULL,
  `valeur_emission_intra` int NOT NULL,
  `nb_emission_hors` int NOT NULL,
  `valeur_emission_hors` int NOT NULL,
  `nb_reception_intra` int NOT NULL,
  `valeur_reception_intra` int NOT NULL,
  `nb_reception_hors` int NOT NULL,
  `valeur_reception_hors` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annuaires_stras`
--

INSERT INTO `annuaires_stras` (`id`, `debut_periode`, `fin_periode`, `nbsous_agents`, `nbpoints_service`, `nb_emission_intra`, `valeur_emission_intra`, `nb_emission_hors`, `valeur_emission_hors`, `nb_reception_intra`, `valeur_reception_intra`, `nb_reception_hors`, `valeur_reception_hors`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-03-30', 11214, 12087, 50, 34, 50, 60, 70, 10, 30, 60, '2025-06-08 13:02:57', '2025-06-08 13:02:57'),
(3, '2023-01-01', '2023-06-30', 222, 22, 33, 0, 2, 0, 5, 0, 42, 0, '2025-06-16 13:19:41', '2025-06-16 13:19:41'),
(15, '2024-01-01', '2024-01-31', 66, 66, 0, 0, 0, 0, 66, 0, 66, 0, '2025-06-26 10:26:48', '2025-06-26 10:26:48');

-- --------------------------------------------------------

--
-- Structure de la table `annuaire_services`
--

CREATE TABLE `annuaire_services` (
  `id` bigint UNSIGNED NOT NULL,
  `annuaire_stra_id` bigint UNSIGNED NOT NULL,
  `operateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_service` text COLLATE utf8mb4_unicode_ci,
  `date_lancement` date DEFAULT NULL,
  `perimetre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mecanisme_compensation_reglement` text COLLATE utf8mb4_unicode_ci,
  `nbsous_agents` int NOT NULL DEFAULT '0',
  `nbpoints_service` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annuaire_services`
--

INSERT INTO `annuaire_services` (`id`, `annuaire_stra_id`, `operateur`, `code_service`, `description_service`, `date_lancement`, `perimetre`, `mecanisme_compensation_reglement`, `nbsous_agents`, `nbpoints_service`, `created_at`, `updated_at`) VALUES
(1, 1, 'MOGR', 'STRA_MOGR', 'Transfert d\'argent vers presque tous les pays du monde en agence', '2021-01-01', 'INTRA_ET_HORS_UEMOA', 'Compensation via SICA-UEMOA et règlement à travers STAR-UEMOA', 4333, 5750, '2025-06-08 13:02:57', '2025-06-08 13:02:57'),
(2, 1, 'ETABLISSEMENT', 'STRA_RAPTR', 'Transfert d\'argent vers presque tous les pays du monde en agence', '2021-01-01', 'INTRA_UEMOA', 'Compensation et règlement à travers RTGS', 6881, 6337, '2025-06-08 13:02:57', '2025-06-08 13:02:57'),
(4, 3, 'TTTTTT', 'STRA_RAPTR', 'Transfert d\'argent vers presque tous les pays du monde en agence', '2023-03-03', 'INTRA_ET_HORS_UEMOA', 'Compensation via SICA-UEMOA et règlement à travers STAR-UEMOA', 222, 22, '2025-06-16 13:19:41', '2025-06-16 13:19:41'),
(5, 15, 'ETABLISSEMENT', 'STRA_WEUN', 'Transfert d\'argent vers presque tous les pays du monde en agence', '2023-01-20', 'INTRA_ET_HORS_UEMOA', 'Compensation via SICA-UEMOA et règlement à travers STAR-UEMOA', 66, 66, '2025-06-26 10:26:48', '2025-06-26 10:26:48');

-- --------------------------------------------------------

--
-- Structure de la table `annuaire_transactions`
--

CREATE TABLE `annuaire_transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `annuaire_service_id` bigint UNSIGNED NOT NULL,
  `type_transaction` enum('emission','reception') COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode_envoi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_reception` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_intra` int NOT NULL DEFAULT '0',
  `valeur_intra` bigint NOT NULL DEFAULT '0',
  `nb_hors` int NOT NULL DEFAULT '0',
  `valeur_hors` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annuaire_transactions`
--

INSERT INTO `annuaire_transactions` (`id`, `annuaire_service_id`, `type_transaction`, `mode_envoi`, `mode_reception`, `nb_intra`, `valeur_intra`, `nb_hors`, `valeur_hors`, `created_at`, `updated_at`) VALUES
(1, 1, 'emission', 'APPLICATION_WEB', 'COMPTE_BANCAIRE', 25, 125, 25, 125, '2025-06-08 13:02:57', '2025-06-08 13:02:57'),
(2, 2, 'emission', 'SOUS_AGENTS', 'ESPECE_GUICHET', 25, 125, 25, 125, '2025-06-08 13:02:57', '2025-06-08 13:02:57'),
(5, 4, 'reception', 'APPLICATION_WEB', 'DS', 5, 444, 42, 43, '2025-06-16 13:19:41', '2025-06-16 13:19:41'),
(6, 4, 'emission', '333', 'PORTE_MONNAIE_ELECTRONIQUE', 33, 22, 2, 33, '2025-06-16 13:19:41', '2025-06-16 13:19:41'),
(7, 5, 'reception', NULL, 'COMPTE_BANCAIRE', 66, 66, 66, 66, '2025-06-26 10:26:48', '2025-06-26 10:26:48');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('reporting_cache_acalmy@gmail.com|127.0.0.1', 'i:1;', 1750951135),
('reporting_cache_acalmy@gmail.com|127.0.0.1:timer', 'i:1750951135;', 1750951135),
('reporting_cache_gilbert.afantohou@ubagroup.com|127.0.0.1', 'i:1;', 1750328932),
('reporting_cache_gilbert.afantohou@ubagroup.com|127.0.0.1:timer', 'i:1750328932;', 1750328932),
('reporting_cache_lo@gmail.com|127.0.0.1', 'i:1;', 1750333699),
('reporting_cache_lo@gmail.com|127.0.0.1:timer', 'i:1750333699;', 1750333699),
('reporting_cache_oscafolitse@gmail.com|127.0.0.1', 'i:1;', 1751269526),
('reporting_cache_oscafolitse@gmail.com|127.0.0.1:timer', 'i:1751269526;', 1751269526);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `code_financiers`
--

CREATE TABLE `code_financiers` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `code_financiers`
--

INSERT INTO `code_financiers` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'IFIN_1', 'Chiffre d\'affaires', NULL, NULL),
(2, 'IFIN_2', 'Excédent brut d\'exploitation', NULL, NULL),
(3, 'IFIN_3', 'Résultat d\'exploitation', NULL, NULL),
(4, 'IFIN_4', 'Trésorerie Nette', NULL, NULL),
(5, 'IFIN_5', 'Capitaux propres', NULL, NULL),
(6, 'IFIN_6', 'Dettes Financières', NULL, NULL),
(7, 'IFIN_7', 'Ressources stables', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `code_fraudes`
--

CREATE TABLE `code_fraudes` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `code_fraudes`
--

INSERT INTO `code_fraudes` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'DFRA_1', 'Fraude suite à un vol de téléphone', NULL, NULL),
(2, 'DFRA_2', 'Fraude via le transfert P2P intra-réseau', NULL, NULL),
(3, 'DFRA_3', 'Fraude via le transfert P2P hors-réseau (ou avec code)', NULL, NULL),
(4, 'DFRA_4', 'Fraude via le code OTP', NULL, NULL),
(5, 'DFRA_5', 'Fraude initiée par l\'agent distributeur', NULL, NULL),
(6, 'DFRA_6', 'Fraude via les réseaux (facebook, instagram, etc)', NULL, NULL),
(7, 'DFRA_7', 'Fraude via les sites de commerce en ligne', NULL, NULL),
(8, 'DFRA_8', 'Fraude initiée par les marchands accepteurs des paiements via la monnaie électronique', NULL, NULL),
(9, 'DFRA_9', 'Fraude via les transferts intra-régioaux', NULL, NULL),
(10, 'DFRA_10', 'Fraude via les transferts intra-internationaux en réception', NULL, NULL),
(11, 'DFRA_11', 'Fraude via les opérations GAB/DAB', NULL, NULL),
(12, 'DFRA_12', 'Fraude liée à l\'utilisation du NFC', NULL, NULL),
(13, 'DFRA_13', 'Fraude liée à l\'usurpation d\'identité du porteur', NULL, NULL),
(14, 'DFRA_14', 'Fraude liée au service de collecte de fonds', NULL, NULL),
(15, 'DFRA_15', 'Fraude liée aux services de seconde génération (crédit et épargne numérique)', NULL, NULL),
(16, 'DFRA_16', 'Fraude liés à un produit d\'assurance', NULL, NULL),
(17, 'DFRA_17', 'Fraude initiée par un gestionnaire de la plateforme de monnaie électronique', NULL, NULL),
(18, 'DFRA_18', 'Fraude lie à une ingénieure sociale (arnaques telles que : gain d\'un tirage au sort, emploi, etc)', NULL, NULL),
(19, 'DFRA_19', 'Fraude sur un compte inactif', NULL, NULL),
(20, 'DFRA_20', 'Autres (à préciser)', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `code_incidents`
--

CREATE TABLE `code_incidents` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `code_incidents`
--

INSERT INTO `code_incidents` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'DINC_1', 'Nombre d\'incidents constatés (1)', NULL, NULL),
(2, 'DINC_2', 'Durée moyenne de résolution des incidents en heure', NULL, NULL),
(3, 'DINC_3', 'Durée de résolution d\'incidents la plus longue (en heure)', NULL, NULL),
(4, 'DINC_4', 'Nombre de cartes en opposition', NULL, NULL),
(5, 'DINC_5', 'Nombre de cartes capturées (2)', NULL, NULL),
(6, 'DINC_6', 'Nombre de réclamations enregistrées', NULL, NULL),
(7, 'DINC_7', 'Nombre de fois que les plate-formes techniques ont connu des pannes', NULL, NULL),
(8, 'DINC_8', 'Durée moyenne de résolution des pannes sur les plateformes techniques', NULL, NULL),
(9, 'DINC_9', 'Durée de résolution de pannes la plus longue (en heure)', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `code_ratios`
--

CREATE TABLE `code_ratios` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `code_ratios`
--

INSERT INTO `code_ratios` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'RTO_1', 'Ratio de couverture de la monnaie électronique (capitaux propres/engagement en monnaie électronique)', NULL, NULL),
(2, 'RTO_2', 'Valeur des placements financiers liés à la monnaie électronique/ Valeur de la monnaie électronique en circulation', NULL, NULL),
(3, 'RTO_3', 'Ratio d\'équivalence (valeur des placements financiers liés à la monnaie électronique et des dépôts à vue/ valeur de la monnaie électronique en circulation)', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `code_service_financiers`
--

CREATE TABLE `code_service_financiers` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `code_service_financiers`
--

INSERT INTO `code_service_financiers` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'SFM01_01', 'Nombre total de comptes de monnaie électronique ouverts', NULL, NULL),
(2, 'SFM01_02', 'Nombre de comptes de monnaie électronique actifs (au moins une transaction au cours des 90 derniers jours)', NULL, NULL),
(3, 'SFM01_03', 'Nombre de bénéficiaires de transfert non titulaires de porte-monnaie électronique / non-inscrits (reçoivent et retirent uniquement avec un code)', NULL, NULL),
(4, 'SFM02_01', 'Nombre total de transactions (avec code et sans code)', NULL, NULL),
(5, 'SFM02_02', 'Valeur totale des transactions avec code et sans code (ne pas contracter les valeurs )', NULL, NULL),
(6, 'SFM02_03', 'Nombre de transferts d\'un titulaire d\'un compte de monnaie électronique vers un non titulaire de compte de monnaie électronique', NULL, NULL),
(7, 'SFM02_04', 'Valeur des transferts d\'un titulaire d\'un compte de monnaie électronique vers un non titulaire de compte de monnaie électronique', NULL, NULL),
(8, 'SFM03_01', 'Nombre de GAB permettant les transactions avec le téléphone portable', NULL, NULL),
(9, 'SFM03_02', 'Nombre de sous-distributeurs', NULL, NULL),
(10, 'SFM03_03', 'Nombre de distributeurs principaux', NULL, NULL),
(11, 'SFM03_04', 'Nombre total de points de services (GAB- Sous-distributeurs – distributeurs principaux)', NULL, NULL),
(12, 'SFM03_05', 'Nombre total de points de services actifs (au moins une transaction au cours des 90 derniers jours)', NULL, NULL),
(25, 'SFM04_01', 'Nombre de commerces inscrits pour effectuer des transactions (paiement marchand)', NULL, NULL),
(26, 'SFM04_02', 'Nombre de commerces actifs (ayant au moins une transaction au cours des 90 derniers jours)', NULL, NULL),
(27, 'SFM04_03', 'Nombre de commerçants acceptant les paiements mobiles via le TPE', NULL, NULL),
(28, 'SFM04_04', 'Nombre de commerçants acceptant les paiements en ligne', NULL, NULL),
(29, 'SFM04_05', 'Nombres de sociétés privées inscrites pour accepter des transactions via la téléphonie mobile (paiement de factures, eau, électricité, éducation, transport, abonnement TV, etc.)', NULL, NULL),
(30, 'SFM04_06', 'Nombres de sociétés privées actives (ayant au moins une transaction au cours des 90 derniers jours)', NULL, NULL),
(31, 'SFM04_07', 'Nombre de ministères ou sociétés agissant au nom des autorités publiques, inscrits pour effectuer des transactions (impôt, taxes, salaires, bourses, transport, éducation, etc.)', NULL, NULL),
(32, 'SFM04_08', 'Nombre de ministères ou sociétés agissant au nom des autorités publiques actifs (ayant au moins une transaction au cours des 90 derniers jours)', NULL, NULL),
(34, 'SFM05_01', 'Nombre de Rechargements cash (dépôt – versement)', NULL, NULL),
(35, 'SFM05_02', 'Valeur de Rechargements cash (dépôt – versement)', NULL, NULL),
(36, 'SFM05_03', 'Nombre de Retraits cash – espèces', NULL, NULL),
(37, 'SFM05_04', 'Valeur de Retraits cash – espèces', NULL, NULL),
(38, 'SFM05_05', 'Nombre de Transferts personne à personne', NULL, NULL),
(39, 'SFM05_06', 'Valeur des Transferts personne à personne', NULL, NULL),
(40, 'SFM05_07', 'Nombre de Transferts de fonds à partir de comptes bancaires de particuliers vers le porte-monnaie électronique', NULL, NULL),
(41, 'SFM05_08', 'Valeur des Transferts de fonds à partir de comptes bancaires de particuliers vers le porte-monnaie électronique', NULL, NULL),
(42, 'SFM05_09', 'Nombre de transferts de fonds émis à partir des porte-monnaie électroniques vers les comptes bancaires de particuliers', NULL, NULL),
(43, 'SFM05_10', 'Valeur des transferts de fonds émis à partir des porte-monnaie électroniques vers les comptes bancaires de particuliers', NULL, NULL),
(44, 'SFM05_11', 'Nombre de Réceptions de transactions de transfert rapide d\'argent sur un porte-monnaie électronique', NULL, NULL),
(45, 'SFM05_12', 'Valeur des Réceptions de transactions de transfert rapide d\'argent sur un porte-monnaie électronique', NULL, NULL),
(46, 'SFM05_13', 'Nombre de Transactions intra-UEMOA (émission et réception entre pays de l\'Union)', NULL, NULL),
(47, 'SFM05_14', 'Valeur des Transactions intra-UEMOA (émission et réception entre pays de l\'Union)', NULL, NULL),
(48, 'SFM05_15', 'Nombre de Transferts de fonds internationaux (réception et uniquement émission réservée aux activités bancaires, via comptes de téléphonie mobile)', NULL, NULL),
(49, 'SFM05_16', 'Valeur des Transferts de fonds internationaux (réception et uniquement émission réservée aux activités bancaires, via comptes de téléphonie mobile)', NULL, NULL),
(50, 'SFM05_17', 'Nombre de Rechargements téléphoniques (achat de crédit téléphonique)', NULL, NULL),
(51, 'SFM05_18', 'Valeur des Rechargements téléphoniques (achat de crédit téléphonique)', NULL, NULL),
(52, 'SFM05_19', 'Nombre de Transferts personne à entreprise (Paiement marchand)', NULL, NULL),
(53, 'SFM05_20', 'Valeur des Transferts personne à entreprise (Paiement marchand)', NULL, NULL),
(54, 'SFM05_21', 'Nombre de Paiements de factures', NULL, NULL),
(55, 'SFM05_22', 'Valeur des Paiements de factures', NULL, NULL),
(78, 'SFM05_23', 'Nombre de Transactions en émission d\'un porte-monnaie électronique vers les administrations publiques (impôts, taxes, etc)', NULL, NULL),
(79, 'SFM05_24', 'Valeur des Transactions en émission d\'un porte-monnaie électronique vers les administrations publiques (impôts, taxes, etc)', NULL, NULL),
(80, 'SFM05_25', 'Nombre de Paiement de salaires, de prestations diverses par les sociétés privées', NULL, NULL),
(81, 'SFM05_26', 'Valeur des Paiement de salaires, de prestations diverses par les sociétés privées', NULL, NULL),
(82, 'SFM05_27', 'Nombre de Transactions en réception sur un porte-monnaie électronique à partir des administrations publiques (bourses, indemnités sociales, etc)', NULL, NULL),
(83, 'SFM05_28', 'Valeur des Transactions en réception sur un porte-monnaie électronique à partir des administrations publiques (bourses, indemnités sociales, etc)', NULL, NULL),
(84, 'SFM05_29', 'Nombre de Transactions (émission et réception entre entreprises, sociétés, ou organismes non étatiques)', NULL, NULL),
(85, 'SFM05_30', 'Valeur des Transactions (émission et réception entre entreprises, sociétés, ou organismes non étatiques)', NULL, NULL),
(86, 'SFM05_31', 'Nombre des paiements (émission) des entreprises vers l\'Etat', NULL, NULL),
(87, 'SFM05_32', 'Valeur des paiements (émission) des entreprises vers l\'Etat', NULL, NULL),
(88, 'SFM05_33', 'Nombre des paiements (émission) de L\'Etat vers les entreprises', NULL, NULL),
(89, 'SFM05_34', 'Valeur des paiements (émission) de L\'Etat vers les entreprises', NULL, NULL),
(102, 'SFM06_01', 'Nombre de Services de micro-crédit (à communiquer par les banques et', NULL, NULL),
(103, 'SFM06_02', 'es SFD)Valeur des Services de micro-crédit (à communiquer par les banques et les SFD)', NULL, NULL),
(104, 'SFM06_03', 'Nombre de Services de micro-assurance (à communiquer par la Société d\'Assurance)', NULL, NULL),
(105, 'SFM06_04', 'Valeur des Services de micro-assurance (à communiquer par la Société d\'Assurance)', NULL, NULL),
(106, 'SFM06_05', 'Nombre de Services de micro-épargne (à communiquer par les banques et les SFD)', NULL, NULL),
(107, 'SFM06_06', 'Valeur des Services de micro-épargne (à communiquer par les banques et les SFD)', NULL, NULL),
(114, 'SFM07_01', 'Bénin Volume des transferts en émission', NULL, NULL),
(115, 'SFM07_02', 'Bénin Valeur des transferts en émission', NULL, NULL),
(116, 'SFM07_03', 'Burkina Volume des transferts en émission', NULL, NULL),
(117, 'SFM07_04', 'Burkina Valeur des transferts en émission', NULL, NULL),
(118, 'SFM07_05', 'Côte d\'Ivoire Volume des transferts en émission', NULL, NULL),
(119, 'SFM07_06', 'Côte d\'Ivoire Valeur des transferts en émission', NULL, NULL),
(120, 'SFM07_07', 'Guinée-Bissau Volume des transferts en émission', NULL, NULL),
(121, 'SFM07_08', 'Guinée-Bissau Valeur des transferts en émission', NULL, NULL),
(122, 'SFM07_09', 'Mali Volume des transferts en émission', NULL, NULL),
(123, 'SFM07_10', 'Mali Valeur des transferts en émission', NULL, NULL),
(124, 'SFM07_11', 'Niger Volume des transferts en émission', NULL, NULL),
(125, 'SFM07_12', 'Niger Valeur des transferts en émission', NULL, NULL),
(126, 'SFM07_13', 'Sénégal Volume des transferts en émission', NULL, NULL),
(127, 'SFM07_14', 'Sénégal Valeur des transferts en émission', NULL, NULL),
(128, 'SFM07_15', 'Togo Valeur des transferts en émission', NULL, NULL),
(129, 'SFM07_16', 'Togo Volume des transferts en émission', NULL, NULL),
(146, 'SFM08_01', 'Bénin Volume des transferts en réception', NULL, NULL),
(147, 'SFM08_02', 'Bénin Valeur des transferts en réception', NULL, NULL),
(148, 'SFM08_03', 'Burkina Volume des transferts en réception', NULL, NULL),
(149, 'SFM08_04', 'Burkina Valeur des transferts en réception', NULL, NULL),
(150, 'SFM08_05', 'Côte d\'Ivoire Volume des transferts en réception', NULL, NULL),
(151, 'SFM08_06', 'Côte d\'Ivoire Valeur des transferts en réception', NULL, NULL),
(152, 'SFM08_07', 'Guinée-Bissau Volume des transferts en réception', NULL, NULL),
(153, 'SFM08_08', 'Guinée-Bissau Valeur des transferts en réception', NULL, NULL),
(154, 'SFM08_09', 'Mali Volume des transferts en réception', NULL, NULL),
(155, 'SFM08_10', 'Mali Valeur des transferts en réception', NULL, NULL),
(156, 'SFM08_11', 'Niger Volume des transferts en réception', NULL, NULL),
(157, 'SFM08_12', 'Niger Valeur des transferts en réception', NULL, NULL),
(158, 'SFM08_13', 'Sénégal Volume des transferts en réception', NULL, NULL),
(159, 'SFM08_14', 'Sénégal Valeur des transferts en réception', NULL, NULL),
(160, 'SFM08_15', 'Togo Volume des transferts en réception', NULL, NULL),
(161, 'SFM08_16', 'Togo Valeur des transferts en réception', NULL, NULL),
(178, 'SFM09_01', 'Pays Africains hors UEMOA - Nombre de transferts en réception', NULL, NULL),
(179, 'SFM09_02', 'Pays Africains hors UEMOA - Valeur des transferts en réception', NULL, NULL),
(180, 'SFM09_03', 'Union Européenne - Nombre de transferts en réception', NULL, NULL),
(181, 'SFM09_04', 'Union Européenne - Valeur des transferts en réception', NULL, NULL),
(182, 'SFM09_05', 'Etats-Unis / Canada - Nombre de transferts en réception', NULL, NULL),
(183, 'SFM09_06', 'Etats-Unis / Canada – Valeur des transferts en réception', NULL, NULL),
(184, 'SFM09_07', 'Amérique du Sud - Nombre de transferts en réception', NULL, NULL),
(185, 'SFM09_08', 'Amérique du Sud - Valeur des transferts en réception', NULL, NULL),
(186, 'SFM09_09', 'Asie - Nombre de transferts en réception', NULL, NULL),
(187, 'SFM09_10', 'Asie – Valeur des transferts en réception', NULL, NULL),
(188, 'SFM09_11', 'Autres Pays - Nombre de transferts en réception', NULL, NULL),
(189, 'SFM09_12', 'Autres Pays – Valeur des transferts en réception', NULL, NULL),
(202, 'SFM11_01', 'Nombre total de titulaires de comptes de monnaie électronique (depuis le démarrage jusqu\'à la période considérée)', NULL, NULL),
(203, 'SFM11_02', 'Nombre de titulaires de comptes adultes (âgés de 15 ans et plus depuis le démarrage jusqu\'à la période considérée)', NULL, NULL),
(204, 'SFM11_03', 'Nombre de femmes titulaires de comptes de monnaie électronique', NULL, NULL),
(205, 'SFM11_04', 'Nombre de femmes âgées de 15 ans et plus titulaires de comptes de monnaie électronique', NULL, NULL),
(210, 'SFM12_01', 'Volume des retraits au GAB', NULL, NULL),
(211, 'SFM12_02', 'Valeur des retraits au GAB', NULL, NULL),
(214, 'SFM13_01', 'Volume des paiements effectués via le TPE', NULL, NULL),
(215, 'SFM13_02', 'Valeur des paiements effectués via le TPE', NULL, NULL),
(218, 'SFM14_01', 'Volume des paiements effectués en ligne', NULL, NULL),
(219, 'SFM14_02', 'Valeur des paiements effectués en ligne', NULL, NULL),
(222, 'SFM15_01', 'Nombres de bénéficiaires de micro-crédit via la téléphonie mobile', NULL, NULL),
(223, 'SFM15_02', 'Valeur totale des prêts', NULL, NULL),
(224, 'SFM15_03', 'Taux d\'intérêt moyen', NULL, NULL),
(225, 'SFM15_04', 'Nombres de femmes bénéficiaires de micro-crédit via la téléphonie mobile', NULL, NULL),
(226, 'SFM15_05', 'Valeur totale des prêts accordés aux femmes', NULL, NULL),
(232, 'SFM16_01', 'Nombre de bénéficiaires des services de micro-assurance', NULL, NULL),
(233, 'SFM16_02', 'Valeur globale des primes d\'assurance collectées via la téléphonie mobile', NULL, NULL),
(234, 'SFM16_03', 'Nombre d\'indemnités payées (prestations, dédommagements, etc.)', NULL, NULL),
(235, 'SFM16_04', 'Valeur globale des indemnités payées', NULL, NULL),
(236, 'SFM16_05', 'Nombre de femmes bénéficiaires des services de micro-assurance', NULL, NULL),
(237, 'SFM16_06', 'Valeur des primes cotisées par les femmes via la téléphonie mobile', NULL, NULL),
(238, 'SFM16_07', 'Nombre d\'indemnités payées aux femmes (prestations, dédommagements, etc.)', NULL, NULL),
(239, 'SFM16_08', 'Valeur des indemnités payées aux femmes', NULL, NULL),
(248, 'SFM17_01', 'Nombre de titulaires de comptes de micro-épargne', NULL, NULL),
(249, 'SFM17_02', 'Valeur de l\'épargne', NULL, NULL),
(250, 'SFM17_03', 'Taux d\'intérêt moyen', NULL, NULL),
(251, 'SFM17_04', 'Nombre de femmes titulaires de comptes de micro-épargne', NULL, NULL),
(252, 'SFM17_05', 'Valeur de l\'épargne des femmes', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `controle_encours`
--

CREATE TABLE `controle_encours` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `valeurinitiale` bigint NOT NULL,
  `nouvelleemission` bigint NOT NULL,
  `destructionmonnaie` bigint NOT NULL,
  `valeurfinale` bigint NOT NULL,
  `soldecomptecantonnement` bigint DEFAULT NULL,
  `soldecomptabilite` bigint NOT NULL,
  `ecartcantonnementvaleurfinale` bigint NOT NULL,
  `ecartcomptabilitevaleurfinale` bigint NOT NULL,
  `ecartcomptabilitecantonnement` bigint NOT NULL,
  `nbtransaction` bigint NOT NULL,
  `valeurtransaction` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `controle_encours`
--

INSERT INTO `controle_encours` (`id`, `debut_periode`, `fin_periode`, `valeurinitiale`, `nouvelleemission`, `destructionmonnaie`, `valeurfinale`, `soldecomptecantonnement`, `soldecomptabilite`, `ecartcantonnementvaleurfinale`, `ecartcomptabilitevaleurfinale`, `ecartcomptabilitecantonnement`, `nbtransaction`, `valeurtransaction`, `created_at`, `updated_at`) VALUES
(1, '2018-01-01', '2018-03-31', 3000000, 500000, 0, 3500000, 3450000, 3500000, -50000, 0, 50000, 15000000, 1000000, '2025-06-29 20:10:07', '2025-06-29 20:10:07');

-- --------------------------------------------------------

--
-- Structure de la table `declarationsfm`
--

CREATE TABLE `declarationsfm` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valeur` bigint DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `declarationsfm`
--

INSERT INTO `declarationsfm` (`id`, `debut_periode`, `fin_periode`, `code`, `valeur`, `details`, `created_at`, `updated_at`) VALUES
(1, '2018-01-01', '2018-03-31', 'SFM01_01', 150, 'xxxxxxxxxxxxxxxxxxxxxxxxxxx', '2025-06-29 15:24:27', '2025-06-29 15:24:27'),
(2, '2018-01-01', '2018-03-31', 'SFM01_02', 1000, 'xxxxxxxxxxxxxxxxxxxxxxxxxxx', '2025-06-29 15:24:27', '2025-06-29 15:24:27'),
(3, '2018-01-01', '2018-03-31', 'SFM02_01', 515, 'xxxxxxxxxxxxxxxxxxxxxxxxxxx', '2025-06-29 15:24:27', '2025-06-29 15:24:27'),
(4, '2028-02-02', '2028-04-04', 'SFM04_03', 323, 'xxxxxxxxxxxxxxxxxxxxxxxxxxx', '2025-06-29 15:25:59', '2025-06-29 15:25:59');

-- --------------------------------------------------------

--
-- Structure de la table `declaration_fraudes`
--

CREATE TABLE `declaration_fraudes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbtransaction` int NOT NULL,
  `valeurtransaction` bigint NOT NULL,
  `dispositifgestion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `declaration_fraudes`
--

INSERT INTO `declaration_fraudes` (`id`, `debut_periode`, `fin_periode`, `code`, `description`, `nbtransaction`, `valeurtransaction`, `dispositifgestion`, `created_at`, `updated_at`) VALUES
(2, '2018-01-01', '2018-03-31', 'DFRA_1', '', 75, 7000000, 'Des actions de sensibilisation ont été menées à l\'endroit des clients', '2025-06-29 14:03:55', '2025-06-29 14:03:55'),
(3, '2018-01-01', '2018-03-31', 'DFRA_8', '', 250, 6000000, 'Suspension du marchand concerné du réseau d\'acceptation]', '2025-06-29 14:03:55', '2025-06-29 14:03:55'),
(4, '2018-01-01', '2018-03-31', 'DFRA_3', '', 100, 5000000, 'Des actions de sensibilisation ont été menées à l\'endroit des clients', '2025-06-29 14:03:55', '2025-06-29 14:03:55');

-- --------------------------------------------------------

--
-- Structure de la table `declaration_incidents`
--

CREATE TABLE `declaration_incidents` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `elements_constitutifs` json DEFAULT NULL,
  `incidents` json DEFAULT NULL,
  `captures` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `declaration_incidents`
--

INSERT INTO `declaration_incidents` (`id`, `debut_periode`, `fin_periode`, `elements_constitutifs`, `incidents`, `captures`, `created_at`, `updated_at`) VALUES
(1, '2018-01-01', '2018-03-31', '[{\"code\": \"DINC_1\", \"valeur\": \"1\", \"intitule\": \"Nombre d\'incidents constatés (1)\"}, {\"code\": \"DINC_2\", \"valeur\": \"1\", \"intitule\": \"Durée moyenne de résolution des incidents en heure\"}]', '[{\"nombre\": \"25\", \"descriptif\": \"Fiche descriptive des incidents\", \"mesureprise\": \"Fiche des motifs de capture\"}, {\"nombre\": \"34\", \"descriptif\": \"Dysfonctionnement du GAB\", \"mesureprise\": \"Maintenance du système\"}]', '[{\"motif\": \"Indisponibilité du réseau\", \"nombre\": \"65\", \"mesureprise\": \"Dysfonctionnement du GAB\"}, {\"motif\": \"Éléments constitutifs\", \"nombre\": \"23\", \"mesureprise\": \"Dysfonctionnement du GAB\"}]', '2025-06-29 17:03:22', '2025-06-29 17:03:22');

-- --------------------------------------------------------

--
-- Structure de la table `declaration_ratios`
--

CREATE TABLE `declaration_ratios` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intitule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taux` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `declaration_ratios`
--

INSERT INTO `declaration_ratios` (`id`, `debut_periode`, `fin_periode`, `code`, `intitule`, `taux`, `created_at`, `updated_at`) VALUES
(1, '2018-01-01', '2018-03-31', 'RTO_1', 'Ratio de couverture de la monnaie électronique (capitaux propres/engagement en monnaie électronique)', 7.00, '2025-06-29 12:59:46', '2025-06-29 12:59:46'),
(2, '2018-01-01', '2018-03-31', 'RTO_2', 'Valeur des placements financiers liés à la monnaie électronique/ Valeur de la monnaie électronique en circulation', 22.00, '2025-06-29 12:59:46', '2025-06-29 12:59:46'),
(3, '2018-01-01', '2018-03-31', 'RTO_3', 'Ratio d\'équivalence (valeur des placements financiers liés à la monnaie électronique et des dépôts à vue/ valeur de la monnaie électronique en circulation)', 150.00, '2025-06-29 12:59:46', '2025-06-29 12:59:46');

-- --------------------------------------------------------

--
-- Structure de la table `declaration_reclamations`
--

CREATE TABLE `declaration_reclamations` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `nbenregistre` int NOT NULL,
  `nbtraite` int NOT NULL,
  `detail_nbenregistre` int NOT NULL,
  `detail_nbtraite` int NOT NULL,
  `motif` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `declaration_reclamations`
--

INSERT INTO `declaration_reclamations` (`id`, `debut_periode`, `fin_periode`, `nbenregistre`, `nbtraite`, `detail_nbenregistre`, `detail_nbtraite`, `motif`, `created_at`, `updated_at`) VALUES
(1, '2018-01-01', '2018-03-31', 75, 40, 45, 10, 'Motif de la reclamation...', '2025-06-29 19:36:10', '2025-06-29 19:36:10'),
(2, '2018-01-01', '2018-03-31', 75, 40, 30, 30, 'Motif de la reclamation...', '2025-06-29 19:36:10', '2025-06-29 19:36:10');

-- --------------------------------------------------------

--
-- Structure de la table `details_risques_stras`
--

CREATE TABLE `details_risques_stras` (
  `id` bigint UNSIGNED NOT NULL,
  `risque_stra_id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `risque` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mecanisme_maitrise` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `details_risques_stras`
--

INSERT INTO `details_risques_stras` (`id`, `risque_stra_id`, `code`, `risque`, `mecanisme_maitrise`, `created_at`, `updated_at`) VALUES
(3, 6, 'FRIS_3_RIS_4', 'Le manque de régulateur ayant occasionné l\'interruption brusque de l’appareil', 'Une feuille de route élaborée et mise en oeuvre de maîtriser le risque', '2025-06-08 20:55:10', '2025-06-08 20:55:10'),
(4, 6, 'FRIS_1_RIS_3', 'La non mise à jour du système a engendré le dysfonctionnement de la plate-forme', 'Des actions en vue de maîtriser le risque ont été identifiées et mise en oeuvre', '2025-06-08 20:55:10', '2025-06-08 20:55:10'),
(5, 7, 'FRIS_3_RIS_4', 'FGFFGF', 'GFGFG', '2025-06-17 10:44:04', '2025-06-17 10:44:04'),
(6, 8, 'FRIS_3_RIS_4', 'FGFFGF', 'GFGFG', '2025-06-17 10:44:17', '2025-06-17 10:44:17'),
(7, 9, 'FRIS_3_RIS_4', 'FGFFGF', 'GFGFG', '2025-06-17 10:44:24', '2025-06-17 10:44:24');

-- --------------------------------------------------------

--
-- Structure de la table `ecosystemes`
--

CREATE TABLE `ecosystemes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `nbsous_agents` int NOT NULL,
  `nbpoints_service` int NOT NULL,
  `modalite_controle_sousagents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_offert` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_service` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `operateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays_operateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perimetre_partenariat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debut_partenariat` date NOT NULL,
  `fin_partenariat` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ecosystemes`
--

INSERT INTO `ecosystemes` (`id`, `debut_periode`, `fin_periode`, `nbsous_agents`, `nbpoints_service`, `modalite_controle_sousagents`, `service_offert`, `description_service`, `operateur`, `pays_operateur`, `perimetre_partenariat`, `debut_partenariat`, `fin_partenariat`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-01-31', 5, 50, 'Contrôle sur place de l’activité. Transmission mensuelle des reporting par les sous agents', 'STRA_MOGR', 'MoneyGram fournit des services de transfert d\'argent et d\'autres services financiers dans le monde entier avec des plateformes numériques et des points de vente.', 'MOGR', 'US', 'INTRA_ET_HORS_UEMOA', '2021-02-01', NULL, '2025-06-13 06:45:48', '2025-06-13 06:45:48'),
(2, '2023-01-01', '2023-01-31', 5, 50, 'Contrôle sur place de l’activité. Transmission mensuelle des reporting par les sous agents', 'STRA_MOCA', 'Services de transfert d\'argent.', 'MOGR', 'US', 'INTRA_ET_HORS_UEMOA', '2018-04-01', '2022-06-11', '2025-06-13 06:45:48', '2025-06-13 06:45:48'),
(3, '2024-01-01', '2024-06-30', 22, 34, 'service_offert', 'STRA_MOGR', 'Aucune compensation possible...', 'MOGR', 'US', 'INTRA_ET_HORS_UEMOA', '2024-02-02', '2024-04-04', '2025-06-26 07:23:31', '2025-06-26 07:23:31'),
(4, '2025-01-01', '2025-06-30', 44, 457, 'perimetre_partenariat', 'RIA', 'Aucune compensation possible CHACAL', 'ETABLISSEMENT', 'BJ', 'INTRA_ET_HORS_UEMOA', '2025-02-02', '2025-03-03', '2025-06-26 07:25:40', '2025-06-26 07:25:40');

-- --------------------------------------------------------

--
-- Structure de la table `emission_cartes`
--

CREATE TABLE `emission_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `totalcarte` int NOT NULL,
  `codefamille` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codetype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbcarte` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emission_cartes`
--

INSERT INTO `emission_cartes` (`id`, `debut_periode`, `fin_periode`, `totalcarte`, `codefamille`, `codetype`, `description`, `nbcarte`, `created_at`, `updated_at`) VALUES
(10, '2023-01-01', '2023-06-30', 4900, 'FCARTE_1', 'FCARTE_1_T1', 'Cartes adossées à un compte courant', 200, '2025-06-03 20:03:08', '2025-06-03 20:03:08'),
(11, '2023-01-01', '2023-06-30', 4900, 'FCARTE_1', 'FCARTE_1_T2', 'Cartes adossées à un compte épargne', 800, '2025-06-03 20:03:08', '2025-06-03 20:03:08'),
(12, '2023-01-01', '2023-06-30', 4900, 'FCARTE_2', 'FCARTE_2_T1', 'Cartes adossées à un compte de monnaie électronique', 2500, '2025-06-03 20:03:08', '2025-06-03 20:03:08'),
(13, '2023-01-01', '2023-06-30', 4900, 'FCARTE_3', 'FCARTE_3_T2', 'Cartes Mastercard', 1400, '2025-06-03 20:03:08', '2025-06-03 20:03:08');

-- --------------------------------------------------------

--
-- Structure de la table `explication_ecarts`
--

CREATE TABLE `explication_ecarts` (
  `id` bigint UNSIGNED NOT NULL,
  `controle_encours_id` bigint UNSIGNED NOT NULL,
  `type_ecart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateoperation` date NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `natureoperation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` bigint NOT NULL,
  `observations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `explication_ecarts`
--

INSERT INTO `explication_ecarts` (`id`, `controle_encours_id`, `type_ecart`, `dateoperation`, `reference`, `natureoperation`, `montant`, `observations`, `created_at`, `updated_at`) VALUES
(1, 1, 'ecartcantonnementvaleurfinale', '2018-07-03', 'AAAAAAAA', 'Opération de dépôt', 50000, 'Ecart lié à la date de valeur au niveau de la banque', '2025-06-29 20:10:07', '2025-06-29 20:10:07'),
(2, 1, 'ecartcomptabilitecantonnement', '2018-07-03', 'AAAAAAAA', 'Opération de dépôt', 15000, 'Ecart lié à la date de valeur au niveau de la banque', '2025-06-29 20:10:07', '2025-06-29 20:10:07');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `famille_cartes`
--

CREATE TABLE `famille_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `famille_cartes`
--

INSERT INTO `famille_cartes` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'FCARTE_1', '', NULL, NULL),
(3, 'FCARTE_2', '', NULL, NULL),
(5, 'FCARTE_3', '', NULL, NULL),
(7, 'FRACHEQUE_1', NULL, NULL, NULL),
(9, 'FRACHEQUE_2', NULL, NULL, NULL),
(11, 'FRCARTE_1', NULL, NULL, NULL),
(13, 'FRCARTE_2', NULL, NULL, NULL),
(15, 'FRCARTE_3', NULL, NULL, NULL),
(17, 'IPCARTE_1', NULL, NULL, NULL),
(19, 'IPCARTE_2', NULL, NULL, NULL),
(21, 'IPCARTE_3', NULL, NULL, NULL),
(23, 'IPCARTE_4', NULL, NULL, NULL),
(25, 'IPCARTE_5', NULL, NULL, NULL),
(27, 'IPCARTE_6', NULL, NULL, NULL),
(29, 'IPCHEQUE_1', NULL, NULL, NULL),
(31, 'IPCHEQUE_2', NULL, NULL, NULL),
(33, 'IPCHEQUE_3', NULL, NULL, NULL),
(35, 'IPCHEQUE_4', NULL, NULL, NULL),
(37, 'IPCHEQUE_5', NULL, NULL, NULL),
(39, 'IPCHEQUE_6', NULL, NULL, NULL),
(41, 'IPCHEQUE_7', NULL, NULL, NULL),
(42, 'IPCHEQUE_8', NULL, NULL, NULL),
(45, 'UTLCARTE_1', NULL, NULL, NULL),
(47, 'UTLCARTE_2', NULL, NULL, NULL),
(49, 'UTLCARTE_3', NULL, NULL, NULL),
(50, 'UTLCARTE_4', NULL, NULL, NULL),
(58, 'UTLCARTE_5', NULL, NULL, NULL),
(59, 'UTLCARTE_6', NULL, NULL, NULL),
(62, 'UTLCARTE_7', NULL, NULL, NULL),
(63, 'UTLCARTE_8', NULL, NULL, NULL),
(66, 'UTLCHEQUE_1', NULL, NULL, NULL),
(67, 'UTLCHEQUE_2', NULL, NULL, NULL),
(70, 'UTLCHEQUE_3', NULL, NULL, NULL),
(72, 'TCHEQUE_1', NULL, NULL, NULL),
(73, 'TCHEQUE_2', NULL, NULL, NULL),
(76, 'TCHEQUE_4', NULL, NULL, NULL),
(77, 'TCHEQUE_5', NULL, NULL, NULL),
(81, 'FRACHEQUE_3\r\n', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `famille_cheques`
--

CREATE TABLE `famille_cheques` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `famille_cheques`
--

INSERT INTO `famille_cheques` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'FRACHEQUE_1\r\n', NULL, NULL, NULL),
(2, 'FRACHEQUE_2\r\n', NULL, NULL, NULL),
(3, 'FRACHEQUE_3', NULL, NULL, NULL),
(4, 'IPCHEQUE_1', NULL, NULL, NULL),
(5, 'IPCHEQUE_2', NULL, NULL, NULL),
(6, 'IPCHEQUE_3', NULL, NULL, NULL),
(7, 'IPCHEQUE_4', NULL, NULL, NULL),
(8, 'IPCHEQUE_5', NULL, NULL, NULL),
(9, 'IPCHEQUE_6', NULL, NULL, NULL),
(10, 'UTLCHEQUE_1', NULL, NULL, NULL),
(11, 'UTLCHEQUE_2', NULL, NULL, NULL),
(12, 'UTLCHEQUE_3', NULL, NULL, NULL),
(13, 'UTLCHEQUE_4', NULL, NULL, NULL),
(14, 'UTLCHEQUE_5', '', NULL, NULL),
(15, 'TCHEQUE_1', '', NULL, NULL),
(16, 'TCHEQUE_2', NULL, NULL, NULL),
(17, 'TCHEQUE_3', NULL, NULL, NULL),
(18, 'TCHEQUE_4', NULL, NULL, NULL),
(19, 'TCHEQUE_5', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `famille_cheque_cartes`
--

CREATE TABLE `famille_cheque_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `famille_cheque_cartes`
--

INSERT INTO `famille_cheque_cartes` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'FCARTE_1', NULL, NULL, NULL),
(2, 'FCARTE_2', NULL, NULL, NULL),
(3, 'FCARTE_3', NULL, NULL, NULL),
(4, 'FCARTE_4', NULL, NULL, NULL),
(5, 'FCARTE_5', NULL, NULL, NULL),
(6, 'FRCARTE_1', NULL, NULL, NULL),
(7, 'FRCARTE_2', NULL, NULL, NULL),
(8, 'FRCARTE_3', NULL, NULL, NULL),
(9, 'FRCARTE_4', NULL, NULL, NULL),
(10, 'FRCARTE_5', NULL, NULL, NULL),
(11, 'IPCARTE_1', NULL, NULL, NULL),
(12, 'IPCARTE_2', NULL, NULL, NULL),
(13, 'IPCARTE_3', NULL, NULL, NULL),
(14, 'IPCARTE_4', NULL, NULL, NULL),
(15, 'IPCARTE_5', NULL, NULL, NULL),
(16, 'UTLCARTE_1', NULL, NULL, NULL),
(17, 'UTLCARTE_2', NULL, NULL, NULL),
(18, 'UTLCARTE_3', NULL, NULL, NULL),
(19, 'UTLCARTE_4', NULL, NULL, NULL),
(20, 'UTLCARTE_5', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fraudestras`
--

CREATE TABLE `fraudestras` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `fraude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_fraude` int NOT NULL,
  `valeur_fraude` bigint NOT NULL,
  `mesures_correctives` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode_operatoire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `debut_fraude` date NOT NULL,
  `fin_fraude` date NOT NULL,
  `total_fraude` int NOT NULL,
  `total_valeur_fraude` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fraudestras`
--

INSERT INTO `fraudestras` (`id`, `debut_periode`, `fin_periode`, `fraude`, `service`, `nb_fraude`, `valeur_fraude`, `mesures_correctives`, `mode_operatoire`, `debut_fraude`, `fin_fraude`, `total_fraude`, `total_valeur_fraude`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-01-31', 'DFRA_1', 'STRA_WEUN', 2, 2000, 'Mise en oeuvre des procédures de détection des identifiants', 'Fait de profiter de personnes vulnérables pour obtenir leurs mots de passe personnels', '2023-01-04', '2023-04-01', 3, 12000, '2025-06-13 06:52:26', '2025-06-13 06:52:26'),
(2, '2023-01-01', '2023-01-31', 'DFRA_10', 'STRA_MOGR', 1, 10000, 'Collecte d’information sur la fraude et annulation des opérations frauduleuses', 'l\'émission de transactions fictives', '2023-01-04', '2023-04-12', 3, 12000, '2025-06-13 06:52:26', '2025-06-13 06:52:26'),
(3, '2022-01-03', '2022-05-31', 'DFRA_4', 'STRA_RIA', 33333, 45000, 'Fait de profiter de personnes vulnérables pour obtenir leurs mots de passe personnels', 'Mise en oeuvre des procédures de détection des identifiants', '2022-01-05', '2022-04-07', 33333, 45000, '2025-06-26 07:47:39', '2025-06-26 07:47:39');

-- --------------------------------------------------------

--
-- Structure de la table `fraude_cheque_cartes`
--

CREATE TABLE `fraude_cheque_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecheque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datefraude` date NOT NULL,
  `libellefraude` text COLLATE utf8mb4_unicode_ci,
  `mesurescorrectives` text COLLATE utf8mb4_unicode_ci,
  `modeoperatoire` text COLLATE utf8mb4_unicode_ci,
  `nbfraude` int NOT NULL,
  `valeurcfa` bigint NOT NULL,
  `totalfraude` int NOT NULL,
  `totalvaleurcfa` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fraude_cheque_cartes`
--

INSERT INTO `fraude_cheque_cartes` (`id`, `debut_periode`, `fin_periode`, `type`, `codecheque`, `datefraude`, `libellefraude`, `mesurescorrectives`, `modeoperatoire`, `nbfraude`, `valeurcfa`, `totalfraude`, `totalvaleurcfa`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'CHEQUE', 'FRACHEQUE_2', '2023-04-02', 'Chèque falsifié', 'Appeler le client pour confirmer les détails du chèques', 'Le chèque est intercepté et le bénéficiaire est modifié.', 5, 10, 20, 40, '2025-06-03 23:42:41', '2025-06-03 23:42:41'),
(2, '2023-01-01', '2023-06-30', 'CARTE', 'FRCARTE_1', '2023-01-21', 'Carte falsifiée ou contrefaite', 'Confiscation de la carte', 'Se produit lorsqu\'un criminel copie les données contenues sur la bande magnétique d\'une carte de crédit ou de débit légitime', 5, 10, 20, 40, '2025-06-03 23:42:41', '2025-06-03 23:42:41'),
(3, '2023-01-01', '2023-06-30', 'CHEQUE', 'FRACHEQUE_3', '2023-05-12', 'Chèque contrefait', 'saisie du chèque', 'chèque qui n\'est ni fait ni autorisé par le titulaire légitime du compte', 10, 20, 20, 40, '2025-06-03 23:42:41', '2025-06-03 23:42:41');

-- --------------------------------------------------------

--
-- Structure de la table `fraude_codes`
--

CREATE TABLE `fraude_codes` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fraude_codes`
--

INSERT INTO `fraude_codes` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'DFRA_1', NULL, NULL),
(2, 'DFRA_2', NULL, NULL),
(3, 'DFRA_3', NULL, NULL),
(4, 'DFRA_4', NULL, NULL),
(5, 'DFRA_5', NULL, NULL),
(6, 'DFRA_6', NULL, NULL),
(7, 'DFRA_7', NULL, NULL),
(8, 'DFRA_8', NULL, NULL),
(9, 'DFRA_9', NULL, NULL),
(10, 'DFRA_10', NULL, NULL),
(21, 'DFRA_11', NULL, NULL),
(22, 'DFRA_12', NULL, NULL),
(23, 'DFRA_13', NULL, NULL),
(24, 'DFRA_14', NULL, NULL),
(25, 'DFRA_15', NULL, NULL),
(26, 'DFRA_16', NULL, NULL),
(27, 'DFRA_17', NULL, NULL),
(28, 'DFRA_18', NULL, NULL),
(29, 'DFRA_19', NULL, NULL),
(30, 'DFRA_20', NULL, NULL),
(36, 'DFRA_16', NULL, NULL),
(37, 'DFRA_17', NULL, NULL),
(38, 'DFRA_18', NULL, NULL),
(39, 'DFRA_19', NULL, NULL),
(40, 'DFRA_20', NULL, NULL),
(41, 'DFRA_16', NULL, NULL),
(42, 'DFRA_17', NULL, NULL),
(43, 'DFRA_18', NULL, NULL),
(44, 'DFRA_19', NULL, NULL),
(45, 'DFRA_20', NULL, NULL),
(46, 'DFRA_16', NULL, NULL),
(47, 'DFRA_17', NULL, NULL),
(48, 'DFRA_18', NULL, NULL),
(49, 'DFRA_19', NULL, NULL),
(50, 'DFRA_20', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `incident_cheque_cartes`
--

CREATE TABLE `incident_cheque_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateincident` date NOT NULL,
  `libelleincident` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `risque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nboccurrence` int NOT NULL,
  `descriptiondetaillee` text COLLATE utf8mb4_unicode_ci,
  `mesurescorrectives` text COLLATE utf8mb4_unicode_ci,
  `impactfinancier` bigint NOT NULL,
  `statutincident` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecloture` date DEFAULT NULL,
  `infoscomplementaires` text COLLATE utf8mb4_unicode_ci,
  `totalincidents` int NOT NULL,
  `totalimpactfinancier` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `incident_cheque_cartes`
--

INSERT INTO `incident_cheque_cartes` (`id`, `debut_periode`, `fin_periode`, `type`, `dateincident`, `libelleincident`, `risque`, `nboccurrence`, `descriptiondetaillee`, `mesurescorrectives`, `impactfinancier`, `statutincident`, `datecloture`, `infoscomplementaires`, `totalincidents`, `totalimpactfinancier`, `created_at`, `updated_at`) VALUES
(4, '2023-01-01', '2023-06-30', 'CARTE', '2023-04-01', 'Vol de cartes', 'financier', 3, 'La carte du client a été volée', 'carte bloquée', 500, 'T', '2023-04-03', 'Pas d\'informations particulières', 10, 7000, '2025-06-04 09:54:37', '2025-06-04 09:54:37'),
(5, '2023-01-01', '2023-06-30', 'CHEQUE', '2023-04-01', 'Refus de paiement de chèques pour défaut ou insuffisance de provision', 'financier', 6, 'Le client n\'a pas assez de fonds pour l\'opération.', 'Le client a été invité à approvisionner le compte.', 1500, 'P', '2023-04-06', 'Pas d\'informations particulières', 10, 7000, '2025-06-04 09:54:37', '2025-06-04 09:54:37'),
(6, '2023-01-01', '2023-06-30', 'CHEQUE', '2023-04-01', 'Infraction aux interdictions bancaires et judiciaires', 'juridique', 1, 'émission de plusieurs chèques sans provision', 'inscrire sur le Fichier Central des Chèques', 5000, 'N', '2023-04-02', 'Pas d\'informations particulières', 10, 7000, '2025-06-04 09:54:37', '2025-06-04 09:54:37');

-- --------------------------------------------------------

--
-- Structure de la table `incident_paiement_cartes`
--

CREATE TABLE `incident_paiement_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbcarte` int NOT NULL,
  `valeurcfa` bigint DEFAULT NULL,
  `totalnombre` int NOT NULL,
  `totalvaleurcfa` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `incident_paiement_cartes`
--

INSERT INTO `incident_paiement_cartes` (`id`, `debut_periode`, `fin_periode`, `code`, `description`, `nbcarte`, `valeurcfa`, `totalnombre`, `totalvaleurcfa`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'IPCARTE_3', 'Perte de cartes', 4, 4, 27, 20, '2025-06-04 11:40:41', '2025-06-04 11:40:41'),
(2, '2023-01-01', '2023-06-30', 'IPCARTE_4', 'Cartes capturées', 8, NULL, 27, 20, '2025-06-04 11:40:41', '2025-06-04 11:40:41'),
(3, '2023-01-01', '2023-06-30', 'IPCARTE_2', 'Vol de cartes', 3, 4, 27, 20, '2025-06-04 11:40:41', '2025-06-04 11:40:41'),
(4, '2023-01-01', '2023-06-30', 'IPCARTE_5', 'Cartes en opposition', 8, 8, 27, 20, '2025-06-04 11:40:41', '2025-06-04 11:40:41'),
(5, '2023-01-01', '2023-06-30', 'IPCARTE_6', 'Autres à préciser', 4, 4, 27, 20, '2025-06-04 11:40:41', '2025-06-04 11:40:41');

-- --------------------------------------------------------

--
-- Structure de la table `incident_paiement_cheques`
--

CREATE TABLE `incident_paiement_cheques` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbcheque` int NOT NULL,
  `valeurcfa` bigint DEFAULT NULL,
  `totalnombre` int NOT NULL,
  `totalvaleurcfa` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `incident_paiement_cheques`
--

INSERT INTO `incident_paiement_cheques` (`id`, `debut_periode`, `fin_periode`, `code`, `description`, `nbcheque`, `valeurcfa`, `totalnombre`, `totalvaleurcfa`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'IPCHEQUE_3', 'Interdictions bancaires d\'émettre des chèques', 2, NULL, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46'),
(2, '2023-01-01', '2023-06-30', 'IPCHEQUE_1', 'Refus de paiement de chèques pour defaut ou insuffisance de provision', 2, 5, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46'),
(3, '2023-01-01', '2023-06-30', 'IPCHEQUE_2', 'Avertissements adressés aux titulaires de comptes qui ont émis des chèques sans provision', 5, NULL, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46'),
(4, '2023-01-01', '2023-06-30', 'IPCHEQUE_4', 'Infractions aux interdictions bancaires et judiciaires', 3, NULL, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46'),
(5, '2023-01-01', '2023-06-30', 'IPCHEQUE_5', 'Oppositions pour perte ou vol de formules de chèques', 2, 8, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46'),
(6, '2023-01-01', '2023-06-30', 'IPCHEQUE_8', 'Levées des interdictions bancaires d\'émettre des chèques', 1, NULL, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46'),
(7, '2023-01-01', '2023-06-30', 'IPCHEQUE_6', 'Formules de faux chèques et/ou chèques falsifiés', 3, NULL, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46'),
(8, '2023-01-01', '2023-06-30', 'IPCHEQUE_7', 'Régularisation d\'incidents de paiement sur chèque', 1, 8, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46');

-- --------------------------------------------------------

--
-- Structure de la table `incident_stras`
--

CREATE TABLE `incident_stras` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `plateformetechnique` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `risque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateincident` date NOT NULL,
  `libelleincident` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nboccurrence` int NOT NULL,
  `descriptiondetaillee` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mesurescorrectives` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `impactfinancier` bigint DEFAULT NULL,
  `statutincident` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecloture` date DEFAULT NULL,
  `naturedeclaration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `totalincidents` int DEFAULT NULL,
  `totalimpactfinancier` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `incident_stras`
--

INSERT INTO `incident_stras` (`id`, `debut_periode`, `fin_periode`, `plateformetechnique`, `risque`, `dateincident`, `libelleincident`, `nboccurrence`, `descriptiondetaillee`, `mesurescorrectives`, `impactfinancier`, `statutincident`, `datecloture`, `naturedeclaration`, `reference`, `created_at`, `updated_at`, `totalincidents`, `totalimpactfinancier`) VALUES
(8, '2023-01-01', '2023-01-31', 'STRA_MOGR', 'Risque opérationnel', '2023-01-02', 'Dysfonctionnement de la plate-forme', 2, 'Arrêt du fonctionnement de la plate-forme pendant 2 heures.', 'Un diagnostic des incidents ainsi que des mises à jour ont été effectuées.', 20000000, 'N', '2023-01-06', 'Commentaire / Informations complémentaires', 'INC002/01/2023', '2025-06-10 08:08:44', '2025-06-10 08:08:44', 5, 25000000),
(9, '2023-01-01', '2023-01-31', 'STRA_ORYX', 'Risque opérationnel', '2023-01-06', 'Interruptions instantanées récurrentes de la plate-forme', 3, 'Demande de mise à jour brusque sur la plateforme occasionnant des interruptions', 'rationaliser le processus de mise à jour', 5000000, 'T', '2023-01-12', 'Commentaire / Informations complémentaires', 'INC003/01/2023', '2025-06-10 08:08:44', '2025-06-10 08:08:44', 5, 25000000);

-- --------------------------------------------------------

--
-- Structure de la table `indicateur_financiers`
--

CREATE TABLE `indicateur_financiers` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intitule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valeur` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `indicateur_financiers`
--

INSERT INTO `indicateur_financiers` (`id`, `debut_periode`, `fin_periode`, `code`, `intitule`, `valeur`, `created_at`, `updated_at`) VALUES
(1, '2018-01-01', '2018-03-31', 'IFIN_1', 'Chiffre d\'affaires', 15000000, '2025-06-29 14:48:02', '2025-06-29 14:48:02'),
(2, '2018-01-01', '2018-03-31', 'IFIN_2', 'Excédent brut d\'exploitation', 2500000, '2025-06-29 14:48:02', '2025-06-29 14:48:02'),
(3, '2018-01-01', '2018-03-31', 'IFIN_3', 'Résultat d\'exploitation', 5000000, '2025-06-29 14:48:02', '2025-06-29 14:48:02'),
(4, '2018-01-01', '2018-03-31', 'IFIN_4', 'Trésorerie Nette', 1500000, '2025-06-29 14:48:02', '2025-06-29 14:48:02'),
(5, '2018-01-01', '2018-03-31', 'IFIN_5', 'Capitaux propres', 350000000, '2025-06-29 14:48:02', '2025-06-29 14:48:02');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_02_123529_create_type_cartes_table', 1),
(5, '2025_06_02_123530_create_acquisition_cartes_table', 1),
(6, '2025_06_02_150440_create_emission_cartes_table', 2),
(7, '2025_06_02_150441_create_famille_cartes_table', 2),
(8, '2025_06_03_220030_create_fraude_cheque_cartes_table', 3),
(9, '2025_06_03_234509_create_incident_cheque_cartes_table', 4),
(10, '2025_06_04_121448_create_incident_paiement_cartes_table', 5),
(11, '2025_06_04_131650_create_incident_paiement_cheques_table', 6),
(12, '2025_06_04_142439_create_reclamation_cheque_cartes_table', 7),
(13, '2025_06_04_145215_create_tarification_cheque_cartes_table', 8),
(14, '2025_06_04_151126_create_typologie_cheques_table', 9),
(15, '2025_06_04_182224_create_utilisation_cartes_table', 10),
(16, '2025_06_04_183118_create_utilisation_cheques_table', 11),
(17, '2025_06_07_192952_create_annuaire_stras_table', 12),
(18, '2025_06_07_192953_create_annuaire_services_table', 12),
(19, '2025_06_07_192954_create_annuaire_transactions_table', 12),
(20, '2025_06_07_200207_create_services_table', 13),
(21, '2025_06_07_200252_create_modes_envoi_table', 13),
(22, '2025_06_07_200305_create_modes_reception_table', 13),
(23, '2025_06_08_160321_create_risques_stras_table', 14),
(24, '2025_06_08_160927_create_details_risques_stras_table', 14),
(25, '2025_06_08_164108_create_type_risque_stras_table', 14),
(26, '2025_06_08_173616_create_incident_stras_table', 15),
(27, '2025_06_10_083912_add_totaux_to_incident_stras_table', 16),
(28, '2025_06_10_105021_create_famille_cheques_table', 17),
(29, '2025_06_10_112354_create_famille_cheque_cartes_table', 18),
(30, '2025_06_12_092531_create_ecosystemes_table', 19),
(31, '2025_06_12_101714_create_fraude_stras_table', 20),
(32, '2025_06_12_104209_create_operation_stras_table', 21),
(33, '2025_06_12_110259_create_reclamation_stras_table', 22),
(34, '2025_06_19_105403_add_role_to_users_table', 23),
(35, '2025_06_25_114330_create_xml_exports_table', 24),
(36, '2025_06_25_174838_create_plateforme_techniques_table', 25),
(37, '2025_06_25_180210_create_service_offerts_table', 26),
(38, '2025_06_25_180422_create_operateurs_table', 27),
(39, '2025_06_25_212645_create_perations_table', 28),
(40, '2025_06_25_215222_create_operateurs_table', 29),
(41, '2025_06_25_220634_create_pays_operateurs_table', 30),
(42, '2025_06_25_224239_create_perimetre_partenariats_table', 31),
(43, '2025_06_25_232141_create_fraude_codes_table', 32),
(44, '2025_06_25_234610_create_motifs_table', 33),
(45, '2025_06_26_165942_create_code_ratios_table', 34),
(46, '2025_06_26_170925_create_code_financiers_table', 35),
(47, '2025_06_26_171508_create_code_financiers_table', 36),
(48, '2025_06_26_172028_create_code_incidents_table', 37),
(49, '2025_06_26_172722_create_code_fraudes_table', 38),
(50, '2025_06_26_173810_create_code_service_financiers_table', 39),
(51, '2025_06_27_172532_create_declaration_ratios_table', 40),
(52, '2025_06_29_141850_create_declaration_fraudes_table', 41),
(53, '2025_06_29_151247_create_indicateur_financiers_table', 42),
(54, '2025_06_29_155934_create_declaration_sfm_table', 43),
(55, '2025_06_29_172336_create_declaration_incidents_table', 44),
(56, '2025_06_29_202416_create_declaration_reclamations_table', 45),
(57, '2025_06_29_203907_create_controle_encours_table', 46),
(58, '2025_06_29_205021_create_solde_compte_cantonnements_table', 46),
(59, '2025_06_29_205049_create_explication_ecarts_table', 46),
(60, '2025_06_29_211352_create_placement_financiers_table', 47);

-- --------------------------------------------------------

--
-- Structure de la table `modes_envoi`
--

CREATE TABLE `modes_envoi` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `modes_reception`
--

CREATE TABLE `modes_reception` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `motifs`
--

CREATE TABLE `motifs` (
  `id` bigint UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `motifs`
--

INSERT INTO `motifs` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'ASSISTANCE_FAMILIALE', NULL, NULL),
(2, 'AIDE_SCOLAIRE', NULL, NULL),
(3, 'ASSISTANCE_FAMILIALE', NULL, NULL),
(4, 'ACQUISITION_IMMOBILIERE_FONCIERE', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `operateurs`
--

CREATE TABLE `operateurs` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `operateurs`
--

INSERT INTO `operateurs` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'MOGR', '', NULL, NULL),
(2, 'MOCA', '', NULL, NULL),
(5, 'ETABLISSEMENT', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `operationstras`
--

CREATE TABLE `operationstras` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_transaction_emission` int NOT NULL,
  `valeur_transaction_emission` bigint NOT NULL,
  `nb_transaction_reception` int NOT NULL,
  `valeur_transaction_reception` bigint NOT NULL,
  `total_nb_emission` int NOT NULL,
  `total_valeur_emission` bigint NOT NULL,
  `total_nb_reception` int NOT NULL,
  `total_valeur_reception` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `operationstras`
--

INSERT INTO `operationstras` (`id`, `debut_periode`, `fin_periode`, `service`, `pays`, `motif`, `nb_transaction_emission`, `valeur_transaction_emission`, `nb_transaction_reception`, `valeur_transaction_reception`, `total_nb_emission`, `total_valeur_emission`, `total_nb_reception`, `total_valeur_reception`, `created_at`, `updated_at`) VALUES
(1, '2023-12-01', '2023-12-31', 'STRA_WEUN', 'SN', 'ASSISTANCE_FAMILIALE', 10, 10, 10, 10, 20, 30, 25, 30, '2025-06-13 08:31:50', '2025-06-13 08:31:50'),
(2, '2023-12-01', '2023-12-31', 'STRA_WEUN', 'SN', 'AIDE_SCOLAIRE', 5, 10, 10, 10, 20, 30, 25, 30, '2025-06-13 08:31:50', '2025-06-13 08:31:50'),
(3, '2023-12-01', '2023-12-31', 'RIA', 'BJ', 'ACQUISITION_IMMOBILIERE_FONCIERE', 5, 10, 5, 10, 20, 30, 25, 30, '2025-06-13 08:31:50', '2025-06-13 08:31:50'),
(4, '2025-01-01', '2025-12-01', 'STRA_WEUN', 'BJ', 'ASSISTANCE_FAMILIALE', 34, 340005, 45, 650000, 34, 340005, 45, 650000, '2025-06-26 08:15:10', '2025-06-26 08:15:10');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pays_operateurs`
--

CREATE TABLE `pays_operateurs` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pays_operateurs`
--

INSERT INTO `pays_operateurs` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'US', NULL, NULL),
(2, 'NG', NULL, NULL),
(5, 'BJ', NULL, NULL),
(7, 'SN', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `perimetre_partenariats`
--

CREATE TABLE `perimetre_partenariats` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `perimetre_partenariats`
--

INSERT INTO `perimetre_partenariats` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'INTRA_ET_HORS_UEMOA', NULL, NULL),
(2, 'INTRA_ET_HORS_UEMOA', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `placement_financiers`
--

CREATE TABLE `placement_financiers` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `depotavue` bigint NOT NULL,
  `depotaterme` bigint NOT NULL,
  `titreacquis` bigint NOT NULL,
  `total` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `placement_financiers`
--

INSERT INTO `placement_financiers` (`id`, `debut_periode`, `fin_periode`, `depotavue`, `depotaterme`, `titreacquis`, `total`, `created_at`, `updated_at`) VALUES
(1, '2018-01-01', '2018-03-31', 4000000, 1000000, 500000, 5500000, '2025-06-29 20:22:14', '2025-06-29 20:22:14');

-- --------------------------------------------------------

--
-- Structure de la table `plateforme_techniques`
--

CREATE TABLE `plateforme_techniques` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plateforme_techniques`
--

INSERT INTO `plateforme_techniques` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'STRA_MOGR', NULL, NULL),
(2, 'STRA_ORYX', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reclamation_cheque_cartes`
--

CREATE TABLE `reclamation_cheque_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etattraitement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mesurescorrectives` text COLLATE utf8mb4_unicode_ci,
  `nbre` int NOT NULL,
  `totalcarte` int DEFAULT NULL,
  `totalcheque` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reclamation_cheque_cartes`
--

INSERT INTO `reclamation_cheque_cartes` (`id`, `debut_periode`, `fin_periode`, `type`, `motif`, `etattraitement`, `mesurescorrectives`, `nbre`, `totalcarte`, `totalcheque`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'carte', 'Cartes non fonctionnelles au guichet', 'P', 'Rappel des cartes non fonctionnelles et ou erronées', 65, 65, 50, '2025-06-04 20:53:09', '2025-06-04 20:53:09'),
(2, '2023-01-01', '2023-06-30', 'cheque', 'Remise de chèque non encaissée', 'T', 'Suivi du traitement des chèques déposés pour encaissement', 50, 65, 50, '2025-06-04 20:53:09', '2025-06-04 20:53:09');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation_stras`
--

CREATE TABLE `reclamation_stras` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_recu` int NOT NULL,
  `nb_traite` int NOT NULL,
  `motif_reclamation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedure_traitement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_recu` int DEFAULT NULL,
  `total_traite` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reclamation_stras`
--

INSERT INTO `reclamation_stras` (`id`, `debut_periode`, `fin_periode`, `service`, `nb_recu`, `nb_traite`, `motif_reclamation`, `procedure_traitement`, `total_recu`, `total_traite`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-01-31', 'STRA_WEUN', 15, 15, 'Validations erronées des opérations', 'Correction des opérations erronées validées', 35, 30, '2025-06-13 08:34:37', '2025-06-13 08:34:37'),
(2, '2023-01-01', '2023-01-31', 'STRA_RIA', 20, 15, 'Erreurs de validation des opérations', 'Revue et correction des opérations erronées validées', 35, 30, '2025-06-13 08:34:37', '2025-06-13 08:34:37'),
(3, '2025-01-01', '2025-06-30', 'STRA_MOGR', 2, 2, 'details', 'detailsdetailsdetailsdetailsdetailsdetailsdetailsdetailsdetails', 2, 2, '2025-06-26 08:27:52', '2025-06-26 08:27:52');

-- --------------------------------------------------------

--
-- Structure de la table `risques_stras`
--

CREATE TABLE `risques_stras` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `nb_risque` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `risques_stras`
--

INSERT INTO `risques_stras` (`id`, `debut_periode`, `fin_periode`, `nb_risque`, `created_at`, `updated_at`) VALUES
(6, '2023-01-01', '2023-01-31', 2, '2025-06-08 20:55:10', '2025-06-08 20:55:10'),
(7, '2025-06-17', '2025-06-17', 1, '2025-06-17 10:44:04', '2025-06-17 10:44:04'),
(8, '2025-06-17', '2025-06-17', 1, '2025-06-17 10:44:17', '2025-06-17 10:44:17'),
(9, '2025-06-17', '2025-06-17', 1, '2025-06-17 10:44:23', '2025-06-17 10:44:23');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `code`, `libelle`) VALUES
(1, 'STRA_MOGR', ''),
(2, 'STRA_RAPTR', ''),
(4, 'STRA_WEUN', ''),
(6, 'RIA', ''),
(8, 'STRA_RIA', '');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DPwUgKsU6EaxA9BeF80vAOIrHAaKIGvEHEazkzKX', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMWQ4ZmtPa0wxRzZMcUlGVTRsM1ZpajVwVnA4c1U5bUVtN0wzc2FNeSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ3OiJodHRwOi8vcmVwb3J0aW5nLmxvY2FsL2RlY2xhcmF0aW9ucmF0aW9zL2NyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1751269383),
('qpqnsVbPf8K4YjHI573hezeUIFhwj5zMU67RjiBE', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV2VwR3BzbVpLaGprbkNrV050ZmJaNXNBaWNBcVFFRWVpcTg4blEybiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9yZXBvcnRpbmcubG9jYWwveG1sX2V4cG9ydHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1751275419);

-- --------------------------------------------------------

--
-- Structure de la table `solde_compte_cantonnements`
--

CREATE TABLE `solde_compte_cantonnements` (
  `id` bigint UNSIGNED NOT NULL,
  `controle_encours_id` bigint UNSIGNED NOT NULL,
  `banque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numerocompte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intitulecompte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solde` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `solde_compte_cantonnements`
--

INSERT INTO `solde_compte_cantonnements` (`id`, `controle_encours_id`, `banque`, `numerocompte`, `intitulecompte`, `solde`, `created_at`, `updated_at`) VALUES
(1, 1, 'xxxxxxx', 'xxxxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxx', 2000000, '2025-06-29 20:10:07', '2025-06-29 20:10:07'),
(2, 1, 'xxxxxxx', 'xxxxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxx', 1450000, '2025-06-29 20:10:07', '2025-06-29 20:10:07');

-- --------------------------------------------------------

--
-- Structure de la table `tarification_cheque_cartes`
--

CREATE TABLE `tarification_cheque_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coutminimum` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tarification_cheque_cartes`
--

INSERT INTO `tarification_cheque_cartes` (`id`, `debut_periode`, `fin_periode`, `type`, `code`, `coutminimum`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'carte', 'UTLCARTE_1', 10, '2025-06-04 21:12:06', '2025-06-04 21:12:06'),
(2, '2023-01-01', '2023-06-30', 'carte', 'UTLCARTE_4', 62, '2025-06-04 21:12:06', '2025-06-04 21:12:06'),
(3, '2023-01-01', '2023-06-30', 'carte', 'UTLCARTE_2', 20, '2025-06-04 21:12:06', '2025-06-04 21:12:06'),
(4, '2023-01-01', '2023-06-30', 'carte', 'UTLCARTE_3', 21, '2025-06-04 21:12:06', '2025-06-04 21:12:06'),
(5, '2023-01-01', '2023-06-30', 'carte', 'UTLCARTE_5', 85, '2025-06-04 21:12:06', '2025-06-04 21:12:06'),
(6, '2023-01-01', '2023-06-30', 'cheque', 'UTLCHEQUE_1', 40, '2025-06-04 21:12:06', '2025-06-04 21:12:06'),
(7, '2023-01-01', '2023-06-30', 'cheque', 'UTLCHEQUE_2', 45, '2025-06-04 21:12:06', '2025-06-04 21:12:06');

-- --------------------------------------------------------

--
-- Structure de la table `type_cartes`
--

CREATE TABLE `type_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_cartes`
--

INSERT INTO `type_cartes` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'FCARTE_1_T2', 'Cartes adossées à un compte épargne', NULL, NULL),
(3, 'FCARTE_3_T2', 'Cartes Mastercard', NULL, NULL),
(7, 'FCARTE_1_T1', ' Cartes adossées à un compte courant', NULL, NULL),
(8, 'FCARTE_2_T1', 'Cartes adossées à un compte de monnaie électronique', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_risque_stras`
--

CREATE TABLE `type_risque_stras` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_risque_stras`
--

INSERT INTO `type_risque_stras` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'FRIS_3_RIS_4', 'Manque de régulateur', NULL, NULL),
(2, 'FRIS_1_RIS_3', 'Risque système non mis à jour', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `typologie_cheques`
--

CREATE TABLE `typologie_cheques` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbcheque` int NOT NULL,
  `totalcheque` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typologie_cheques`
--

INSERT INTO `typologie_cheques` (`id`, `debut_periode`, `fin_periode`, `code`, `description`, `nbcheque`, `totalcheque`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'TCHEQUE_1', 'Chèque barré', 2, 49, '2025-06-04 21:28:36', '2025-06-04 21:28:36'),
(2, '2023-01-01', '2023-06-30', 'TCHEQUE_4', 'Chèque certifié', 20, 49, '2025-06-04 21:28:36', '2025-06-04 21:28:36'),
(3, '2023-01-01', '2023-06-30', 'TCHEQUE_3', 'Chèque avalisé', 27, 49, '2025-06-04 21:28:36', '2025-06-04 21:28:36');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'OSCAR', 'oscarfolitse@gmail.com', NULL, '$2y$12$ntOQq6XBZqG1.o49eBynS.3XzdRt0/sGs4iULkzJFCOfwrpzbAdRO', NULL, '2025-06-02 13:05:30', '2025-06-18 13:11:21', 'admin'),
(2, 'M. Gilbert', 'gilbert.afantohou@gmail.com', NULL, '$2y$12$w4wG.9C72pTJMX5a2XTS0.8YkNlXnHxaKklVP59whXr7yDTTquDwy', NULL, '2025-06-18 13:19:56', '2025-06-18 14:30:04', 'admin'),
(5, 'Jonh Doe', 'jonh@gmail.com', NULL, '$2y$12$Ucir6EQI1hr8aJux3Lvil.wfklyrln5t2925yuVx9urARO7cB0Cx6', NULL, '2025-06-19 16:07:29', '2025-06-19 16:07:29', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `utilisation_cartes`
--

CREATE TABLE `utilisation_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbcarte` int NOT NULL,
  `valeurcfa` bigint NOT NULL,
  `totalnbcarte` int NOT NULL,
  `totalvaleurcfa` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisation_cartes`
--

INSERT INTO `utilisation_cartes` (`id`, `debut_periode`, `fin_periode`, `code`, `description`, `nbcarte`, `valeurcfa`, `totalnbcarte`, `totalvaleurcfa`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'UTLCARTE_1', 'Retraits effectués par nos clients sur nos GAB/DAB', 50, 250000, 200, 450000, '2025-06-04 21:49:44', '2025-06-04 21:49:44'),
(2, '2023-01-01', '2023-06-30', 'UTLCARTE_3', 'Dépôts d\'espèces sur nos GAB/DAB', 145, 50000, 200, 450000, '2025-06-04 21:49:44', '2025-06-04 21:49:44'),
(3, '2023-01-01', '2023-06-30', 'UTLCARTE_5', 'Paiement via les TPE', 5, 150000, 200, 450000, '2025-06-04 21:49:44', '2025-06-04 21:49:44');

-- --------------------------------------------------------

--
-- Structure de la table `utilisation_cheques`
--

CREATE TABLE `utilisation_cheques` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbcheque` int NOT NULL,
  `valeurcfa` bigint NOT NULL,
  `totalnbcheque` int NOT NULL,
  `totalvaleurcfa` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisation_cheques`
--

INSERT INTO `utilisation_cheques` (`id`, `debut_periode`, `fin_periode`, `code`, `description`, `nbcheque`, `valeurcfa`, `totalnbcheque`, `totalvaleurcfa`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'UTLCHEQUE_1', 'Chèques encaissés au guichet', 5, 70000, 14, 500000, '2025-06-04 21:55:40', '2025-06-04 21:55:40'),
(2, '2023-01-01', '2023-06-30', 'UTLCHEQUE_3', 'Chèques reçus à la compensation', 5, 30000, 14, 500000, '2025-06-04 21:55:40', '2025-06-04 21:55:40'),
(3, '2023-01-01', '2023-06-30', 'UTLCHEQUE_2', 'Chèques présentés à la compensation', 4, 400000, 14, 500000, '2025-06-04 21:55:40', '2025-06-04 21:55:40');

-- --------------------------------------------------------

--
-- Structure de la table `xml_exports`
--

CREATE TABLE `xml_exports` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en_attente',
  `motif_refus` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `xml_exports`
--

INSERT INTO `xml_exports` (`id`, `type`, `debut_periode`, `fin_periode`, `filename`, `status`, `motif_refus`, `created_at`, `updated_at`) VALUES
(1, 'acquisition', '2023-01-01', '2023-06-30', 'acquisition_2023-01-01.xml', 'en_attente', NULL, '2025-06-25 12:33:49', '2025-06-25 12:59:17'),
(2, 'acquisition', '2023-01-01', '2023-06-30', 'acquisition_2023-01-01.xml', 'valide', NULL, '2025-06-25 12:51:36', '2025-06-25 13:02:03'),
(3, 'emission', '2023-01-01', '2023-06-30', 'emission_2023-01-01_2023-06-30.xml', 'valide', NULL, '2025-06-25 13:13:46', '2025-06-27 11:35:46'),
(4, 'emission', '2023-01-01', '2023-06-30', 'emission_2023-01-01_2023-06-30.xml', 'en_attente', NULL, '2025-06-25 13:34:45', '2025-06-25 13:34:45'),
(5, 'fraudechequecarte', '2023-01-01', '2023-06-30', 'fraudechequecarte_2023-01-01_2023-06-30.xml', 'en_attente', NULL, '2025-06-25 13:44:29', '2025-06-25 14:42:37'),
(6, 'acquisition', '2023-01-01', '2023-06-30', 'acquisition_2023-01-01.xml', 'en_attente', NULL, '2025-06-25 14:41:34', '2025-06-29 23:27:04'),
(7, 'emission', '2023-01-01', '2023-06-30', 'emission_2023-01-01_2023-06-30.xml', 'valide', NULL, '2025-06-25 14:55:48', '2025-06-25 14:56:01'),
(8, 'fraudechequecarte', '2023-01-01', '2023-06-30', 'fraudechequecarte_2023-01-01_2023-06-30.xml', 'valide', NULL, '2025-06-25 15:02:53', '2025-06-25 15:14:21'),
(9, 'acquisition', '2024-01-01', '2024-06-03', 'acquisition_2024-01-01.xml', 'non_valide', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2025-06-26 06:49:55', '2025-06-30 08:22:13'),
(10, 'acquisition', '2023-01-01', '2023-06-30', 'acquisition_2023-01-01.xml', 'en_attente', NULL, '2025-06-27 11:31:27', '2025-06-27 11:31:27'),
(11, 'declarationincident', '2018-01-01', '2018-03-31', 'declarationincident_2018-01-01_2018-03-31.xml', 'en_attente', NULL, '2025-06-29 21:02:54', '2025-06-29 21:02:54'),
(12, 'declarationratios', '2018-01-01', '2018-03-31', 'declarationratios_2018-01-01_2018-03-31.xml', 'valide', NULL, '2025-06-29 21:08:56', '2025-06-30 06:50:11'),
(13, 'declarationreclamation', '2018-01-01', '2018-03-31', 'declarationreclamation_2018-01-01_2018-03-31.xml', 'valide', NULL, '2025-06-29 21:15:16', '2025-06-30 06:50:21'),
(14, 'declarationreclamation', '2018-01-01', '2018-03-31', 'declarationreclamation_2018-01-01_2018-03-31.xml', 'en_attente', NULL, '2025-06-29 21:25:30', '2025-06-29 21:25:30'),
(15, 'declarationfraude', '2018-01-01', '2018-03-31', 'declarationfraude_2018-01-01_2018-03-31.xml', 'en_attente', NULL, '2025-06-29 22:04:49', '2025-06-29 22:04:49'),
(16, 'indicateurfinancier', '2018-01-01', '2018-03-31', 'indicateurfinancier_2018-01-01_2018-03-31.xml', 'en_attente', NULL, '2025-06-29 22:09:23', '2025-06-29 22:09:23'),
(17, 'declarationsfm', '2018-01-01', '2018-03-31', 'declarationsfm_2018-01-01_2018-03-31.xml', 'en_attente', NULL, '2025-06-29 22:13:52', '2025-06-29 22:13:52'),
(18, 'placementfinancier', '2018-01-01', '2018-03-31', 'placementfinancier_2018-01-01_2018-03-31.xml', 'non_valide', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2025-06-29 22:18:13', '2025-06-30 08:22:59'),
(19, 'declarationreclamation', '2018-01-01', '2018-03-31', 'declarationreclamation_2018-01-01_2018-03-31.xml', 'en_attente', NULL, '2025-06-30 06:58:33', '2025-06-30 06:58:33'),
(20, 'annuaire', '2023-01-01', '2023-06-30', 'annuairestra2023-01-01_2023-06-30.xml', 'en_attente', NULL, '2025-06-30 07:42:43', '2025-06-30 07:42:43'),
(21, 'ecosysteme', '2023-01-01', '2023-01-31', 'ecosysteme2023-01-01_2023-01-31.xml', 'en_attente', NULL, '2025-06-30 07:45:50', '2025-06-30 07:45:50'),
(22, 'reclamationstra', '2023-01-01', '2023-01-31', 'reclamationstra2023-01-01_2023-01-31.xml', 'en_attente', NULL, '2025-06-30 07:48:34', '2025-06-30 07:48:34'),
(23, 'operationstra', '2023-12-01', '2023-12-31', 'operationstra2023-12-01_2023-12-31.xml', 'en_attente', NULL, '2025-06-30 07:49:35', '2025-06-30 07:49:35'),
(24, 'fraudestra', '2023-01-01', '2023-01-31', 'fraudestra2023-01-01_2023-01-31.xml', 'en_attente', NULL, '2025-06-30 07:52:45', '2025-06-30 07:52:45'),
(25, 'incidentstra', '2023-01-01', '2023-01-31', 'incidentstra2023-01-01_2023-01-31.xml', 'en_attente', NULL, '2025-06-30 07:53:06', '2025-06-30 07:53:06'),
(26, 'risquestra', '2023-01-01', '2023-01-31', 'risquestra2023-01-01_2023-01-31.xml', 'non_valide', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2025-06-30 07:57:15', '2025-06-30 08:23:38'),
(27, 'utilisationcheque', '2023-01-01', '2023-06-30', 'utilisationcheque2023-01-01_2023-06-30.xml', 'en_attente', NULL, '2025-06-30 07:59:30', '2025-06-30 07:59:30'),
(28, 'utilisationcarte', '2023-01-01', '2023-06-30', 'utilisationcarte2023-01-01_2023-06-30.xml', 'en_attente', NULL, '2025-06-30 08:00:29', '2025-06-30 08:00:29'),
(29, 'tarificationchequecarte', '2023-01-01', '2023-06-30', 'tarificationchequecarte2023-01-01_2023-06-30.xml', 'en_attente', NULL, '2025-06-30 08:01:20', '2025-06-30 08:01:20'),
(30, 'reclamationchequecarte', '2023-01-01', '2023-06-30', 'reclamationchequecarte2023-01-01_2023-06-30.xml', 'en_attente', NULL, '2025-06-30 08:08:18', '2025-06-30 08:08:18'),
(31, 'incidentpaiementcheque', '2023-01-01', '2023-06-30', 'incidentpaiementcheque2023-01-01_2023-06-30.xml', 'en_attente', NULL, '2025-06-30 08:08:36', '2025-06-30 08:08:36'),
(32, 'incidentpaiementcarte', '2023-01-01', '2023-06-30', 'incidentpaiementcarte2023-01-01_2023-06-30.xml', 'en_attente', NULL, '2025-06-30 08:08:54', '2025-06-30 08:08:54'),
(33, 'incidentchequecarte', '2023-01-01', '2023-06-30', 'incidentchequecarte2023-01-01_2023-06-30.xml', 'en_attente', NULL, '2025-06-30 08:09:23', '2025-06-30 08:09:23'),
(34, 'fraudechequecarte', '2023-01-01', '2023-06-30', 'fraudechequecarte2023-01-01_2023-06-30.xml', 'en_attente', NULL, '2025-06-30 08:10:39', '2025-06-30 08:10:39'),
(35, 'emission', '2023-01-01', '2023-06-30', 'emission_2023-01-01_2023-06-30.xml', 'valide', NULL, '2025-06-30 08:10:55', '2025-06-30 08:16:55'),
(36, 'emission', '2023-01-01', '2023-06-30', 'emission2023-01-01_2023-06-30.xml', 'en_attente', NULL, '2025-06-30 08:10:55', '2025-06-30 08:10:55'),
(37, 'acquisition', '2023-01-01', '2023-06-30', 'acquisition_2023-01-01.xml', 'en_attente', NULL, '2025-06-30 08:11:20', '2025-06-30 08:11:20'),
(38, 'acquisition', '2023-01-01', '2023-06-30', 'acquisition2023-01-01_2023-06-30.xml', 'en_attente', NULL, '2025-06-30 08:11:20', '2025-06-30 08:11:20'),
(39, 'acquisition', '2023-01-01', '2023-06-30', 'acquisition_2023-01-01.xml', 'non_valide', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2025-06-30 08:11:54', '2025-06-30 08:23:18'),
(40, 'acquisition', '2023-01-01', '2023-06-30', 'acquisition2023-01-01_2023-06-30.xml', 'en_attente', NULL, '2025-06-30 08:11:54', '2025-06-30 08:17:23');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acquisition_cartes`
--
ALTER TABLE `acquisition_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annuaires_stras`
--
ALTER TABLE `annuaires_stras`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annuaire_services`
--
ALTER TABLE `annuaire_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annuaire_services_annuaire_stra_id_foreign` (`annuaire_stra_id`);

--
-- Index pour la table `annuaire_transactions`
--
ALTER TABLE `annuaire_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annuaire_transactions_annuaire_service_id_foreign` (`annuaire_service_id`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `code_financiers`
--
ALTER TABLE `code_financiers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_financiers_code_unique` (`code`);

--
-- Index pour la table `code_fraudes`
--
ALTER TABLE `code_fraudes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_fraudes_code_unique` (`code`);

--
-- Index pour la table `code_incidents`
--
ALTER TABLE `code_incidents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_incidents_code_unique` (`code`);

--
-- Index pour la table `code_ratios`
--
ALTER TABLE `code_ratios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_ratios_code_unique` (`code`);

--
-- Index pour la table `code_service_financiers`
--
ALTER TABLE `code_service_financiers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_service_financiers_code_unique` (`code`);

--
-- Index pour la table `controle_encours`
--
ALTER TABLE `controle_encours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `declarationsfm`
--
ALTER TABLE `declarationsfm`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `declaration_fraudes`
--
ALTER TABLE `declaration_fraudes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `declaration_incidents`
--
ALTER TABLE `declaration_incidents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `declaration_ratios`
--
ALTER TABLE `declaration_ratios`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `declaration_reclamations`
--
ALTER TABLE `declaration_reclamations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `details_risques_stras`
--
ALTER TABLE `details_risques_stras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `details_risques_stras_risque_stra_id_foreign` (`risque_stra_id`);

--
-- Index pour la table `ecosystemes`
--
ALTER TABLE `ecosystemes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emission_cartes`
--
ALTER TABLE `emission_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `explication_ecarts`
--
ALTER TABLE `explication_ecarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `explication_ecarts_controle_encours_id_foreign` (`controle_encours_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `famille_cartes`
--
ALTER TABLE `famille_cartes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `famille_cartes_code_unique` (`code`);

--
-- Index pour la table `famille_cheques`
--
ALTER TABLE `famille_cheques`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `famille_cheques_code_unique` (`code`);

--
-- Index pour la table `famille_cheque_cartes`
--
ALTER TABLE `famille_cheque_cartes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `famille_cheque_cartes_code_unique` (`code`);

--
-- Index pour la table `fraudestras`
--
ALTER TABLE `fraudestras`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fraude_cheque_cartes`
--
ALTER TABLE `fraude_cheque_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fraude_codes`
--
ALTER TABLE `fraude_codes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `incident_cheque_cartes`
--
ALTER TABLE `incident_cheque_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `incident_paiement_cartes`
--
ALTER TABLE `incident_paiement_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `incident_paiement_cheques`
--
ALTER TABLE `incident_paiement_cheques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `incident_stras`
--
ALTER TABLE `incident_stras`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `indicateur_financiers`
--
ALTER TABLE `indicateur_financiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modes_envoi`
--
ALTER TABLE `modes_envoi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modes_envoi_code_unique` (`code`);

--
-- Index pour la table `modes_reception`
--
ALTER TABLE `modes_reception`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modes_reception_code_unique` (`code`);

--
-- Index pour la table `motifs`
--
ALTER TABLE `motifs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `operateurs`
--
ALTER TABLE `operateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `operateurs_code_unique` (`code`);

--
-- Index pour la table `operationstras`
--
ALTER TABLE `operationstras`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `pays_operateurs`
--
ALTER TABLE `pays_operateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `perimetre_partenariats`
--
ALTER TABLE `perimetre_partenariats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `placement_financiers`
--
ALTER TABLE `placement_financiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plateforme_techniques`
--
ALTER TABLE `plateforme_techniques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reclamation_cheque_cartes`
--
ALTER TABLE `reclamation_cheque_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reclamation_stras`
--
ALTER TABLE `reclamation_stras`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `risques_stras`
--
ALTER TABLE `risques_stras`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_code_unique` (`code`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `solde_compte_cantonnements`
--
ALTER TABLE `solde_compte_cantonnements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solde_compte_cantonnements_controle_encours_id_foreign` (`controle_encours_id`);

--
-- Index pour la table `tarification_cheque_cartes`
--
ALTER TABLE `tarification_cheque_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_cartes`
--
ALTER TABLE `type_cartes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_cartes_code_unique` (`code`);

--
-- Index pour la table `type_risque_stras`
--
ALTER TABLE `type_risque_stras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_risque_stras_code_unique` (`code`);

--
-- Index pour la table `typologie_cheques`
--
ALTER TABLE `typologie_cheques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `utilisation_cartes`
--
ALTER TABLE `utilisation_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisation_cheques`
--
ALTER TABLE `utilisation_cheques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `xml_exports`
--
ALTER TABLE `xml_exports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acquisition_cartes`
--
ALTER TABLE `acquisition_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `annuaires_stras`
--
ALTER TABLE `annuaires_stras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `annuaire_services`
--
ALTER TABLE `annuaire_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `annuaire_transactions`
--
ALTER TABLE `annuaire_transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `code_financiers`
--
ALTER TABLE `code_financiers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `code_fraudes`
--
ALTER TABLE `code_fraudes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `code_incidents`
--
ALTER TABLE `code_incidents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `code_ratios`
--
ALTER TABLE `code_ratios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `code_service_financiers`
--
ALTER TABLE `code_service_financiers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT pour la table `controle_encours`
--
ALTER TABLE `controle_encours`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `declarationsfm`
--
ALTER TABLE `declarationsfm`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `declaration_fraudes`
--
ALTER TABLE `declaration_fraudes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `declaration_incidents`
--
ALTER TABLE `declaration_incidents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `declaration_ratios`
--
ALTER TABLE `declaration_ratios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `declaration_reclamations`
--
ALTER TABLE `declaration_reclamations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `details_risques_stras`
--
ALTER TABLE `details_risques_stras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `ecosystemes`
--
ALTER TABLE `ecosystemes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `emission_cartes`
--
ALTER TABLE `emission_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `explication_ecarts`
--
ALTER TABLE `explication_ecarts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `famille_cartes`
--
ALTER TABLE `famille_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `famille_cheques`
--
ALTER TABLE `famille_cheques`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `famille_cheque_cartes`
--
ALTER TABLE `famille_cheque_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `fraudestras`
--
ALTER TABLE `fraudestras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `fraude_cheque_cartes`
--
ALTER TABLE `fraude_cheque_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `fraude_codes`
--
ALTER TABLE `fraude_codes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `incident_cheque_cartes`
--
ALTER TABLE `incident_cheque_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `incident_paiement_cartes`
--
ALTER TABLE `incident_paiement_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `incident_paiement_cheques`
--
ALTER TABLE `incident_paiement_cheques`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `incident_stras`
--
ALTER TABLE `incident_stras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `indicateur_financiers`
--
ALTER TABLE `indicateur_financiers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `modes_envoi`
--
ALTER TABLE `modes_envoi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `modes_reception`
--
ALTER TABLE `modes_reception`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `motifs`
--
ALTER TABLE `motifs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `operateurs`
--
ALTER TABLE `operateurs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `operationstras`
--
ALTER TABLE `operationstras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `pays_operateurs`
--
ALTER TABLE `pays_operateurs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `perimetre_partenariats`
--
ALTER TABLE `perimetre_partenariats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `placement_financiers`
--
ALTER TABLE `placement_financiers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `plateforme_techniques`
--
ALTER TABLE `plateforme_techniques`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reclamation_cheque_cartes`
--
ALTER TABLE `reclamation_cheque_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reclamation_stras`
--
ALTER TABLE `reclamation_stras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `risques_stras`
--
ALTER TABLE `risques_stras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `solde_compte_cantonnements`
--
ALTER TABLE `solde_compte_cantonnements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tarification_cheque_cartes`
--
ALTER TABLE `tarification_cheque_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `type_cartes`
--
ALTER TABLE `type_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `type_risque_stras`
--
ALTER TABLE `type_risque_stras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `typologie_cheques`
--
ALTER TABLE `typologie_cheques`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisation_cartes`
--
ALTER TABLE `utilisation_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisation_cheques`
--
ALTER TABLE `utilisation_cheques`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `xml_exports`
--
ALTER TABLE `xml_exports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annuaire_services`
--
ALTER TABLE `annuaire_services`
  ADD CONSTRAINT `annuaire_services_annuaire_stra_id_foreign` FOREIGN KEY (`annuaire_stra_id`) REFERENCES `annuaires_stras` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `annuaire_transactions`
--
ALTER TABLE `annuaire_transactions`
  ADD CONSTRAINT `annuaire_transactions_annuaire_service_id_foreign` FOREIGN KEY (`annuaire_service_id`) REFERENCES `annuaire_services` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `details_risques_stras`
--
ALTER TABLE `details_risques_stras`
  ADD CONSTRAINT `details_risques_stras_risque_stra_id_foreign` FOREIGN KEY (`risque_stra_id`) REFERENCES `risques_stras` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `explication_ecarts`
--
ALTER TABLE `explication_ecarts`
  ADD CONSTRAINT `explication_ecarts_controle_encours_id_foreign` FOREIGN KEY (`controle_encours_id`) REFERENCES `controle_encours` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `solde_compte_cantonnements`
--
ALTER TABLE `solde_compte_cantonnements`
  ADD CONSTRAINT `solde_compte_cantonnements_controle_encours_id_foreign` FOREIGN KEY (`controle_encours_id`) REFERENCES `controle_encours` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
